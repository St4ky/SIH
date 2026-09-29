<?php
// =======================================================
// Gap2Grow: Diagnostic Scoring Engine & Gap Computation
// =======================================================

define('IS_API', true);
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';

header('Content-Type: application/json; charset=utf-8');

if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode(['success' => false, 'error' => 'Authentication required']);
    exit;
}

$userId = (int)$_SESSION['user_id'];
$rawInput = file_get_contents('php://input');
$data = json_decode($rawInput, true);

if (!$data) {
    $data = $_POST;
}

$sessionId = isset($data['session_id']) ? (int)$data['session_id'] : 0;
$domainId  = isset($data['domain_id']) ? (int)$data['domain_id'] : 1;
$answers   = isset($data['answers']) && is_array($data['answers']) ? $data['answers'] : [];

if (empty($answers)) {
    echo json_encode(['success' => false, 'error' => 'No answers submitted']);
    exit;
}

/*
 * =====================================================================
 * SCORING FORMULA — NSSTA Cadre Evaluation Diagnostic Engine
 * =====================================================================
 * 
 * 1. Difficulty Weighting:
 *    - Easy questions   : 1.0 point weight
 *    - Medium questions : 1.5 points weight
 *    - Hard questions   : 2.0 points weight
 *
 * 2. Question-level evaluation:
 *    For each answered question i:
 *      is_correct[i] = (selected_option == correct_option) ? 1 : 0
 *      earned_points += (is_correct[i] * weight[i])
 *      max_possible_points += weight[i]
 *
 * 3. Scaled Domain Competency Score:
 *      current_score = ROUND( (earned_points / max_possible_points) * 100 )
 *      Boundary clamped: MIN(100, MAX(0, current_score))
 *
 * 4. Net Gap & Urgency Priority Mapping:
 *      gap = benchmark_score (typically 80) - current_score
 *      priority = (gap >= 25) ? 'high' : ((gap >= 10) ? 'medium' : 'low')
 *
 * 5. Persistence:
 *    - Writes individual records to `diagnostic_responses`
 *    - Marks `diagnostic_sessions` with completed_at and final_score
 *    - UPSERTS `skill_gaps` table with the freshly calculated `current_score`
 * =====================================================================
 */

$weights = [
    'easy'   => 1.0,
    'medium' => 1.5,
    'hard'   => 2.0
];

$earnedPoints = 0.0;
$maxPossiblePoints = 0.0;
$correctCount = 0;
$totalCount = 0;

$respStmt = $pdo->prepare('
    INSERT INTO diagnostic_responses (user_id, question_id, session_id, selected_option, is_correct, taken_at)
    VALUES (?, ?, ?, ?, ?, NOW())
');

foreach ($answers as $ans) {
    $qId = (int)($ans['question_id'] ?? 0);
    $selected = (int)($ans['selected_option'] ?? -1);

    if ($qId <= 0) continue;

    // Fetch official question details
    $qStmt = $pdo->prepare('SELECT difficulty, correct_option FROM diagnostic_questions WHERE id = ?');
    $qStmt->execute([$qId]);
    $question = $qStmt->fetch();

    if (!$question) continue;

    $diff = $question['difficulty'] ?? 'medium';
    $weight = $weights[$diff] ?? 1.5;
    $isCorrect = ($selected === (int)$question['correct_option']) ? 1 : 0;

    if ($isCorrect) {
        $earnedPoints += $weight;
        $correctCount++;
    }
    $maxPossiblePoints += $weight;
    $totalCount++;

    // Write audit response row
    try {
        $respStmt->execute([
            $userId,
            $qId,
            $sessionId ?: null,
            $selected,
            $isCorrect
        ]);
    } catch (Exception $e) {}
}

// Compute final computed score (0-100)
$computedScore = ($maxPossiblePoints > 0)
    ? (int)round(($earnedPoints / $maxPossiblePoints) * 100)
    : 0;

$computedScore = min(100, max(0, $computedScore));

// Benchmark standards
$benchmarkScore = 80;
$gap = $benchmarkScore - $computedScore;
$priority = ($gap >= 25) ? 'high' : (($gap >= 10) ? 'medium' : 'low');

// Get domain name
$domStmt = $pdo->prepare('SELECT name FROM competency_domains WHERE id = ?');
$domStmt->execute([$domainId]);
$domainName = $domStmt->fetchColumn() ?: 'Core Official Statistics';

// Update session record
if ($sessionId > 0) {
    $updateSess = $pdo->prepare('
        UPDATE diagnostic_sessions 
        SET completed_at = NOW(), final_score = ?
        WHERE id = ? AND user_id = ?
    ');
    $updateSess->execute([$computedScore, $sessionId, $userId]);
}

// Write/Upsert into `skill_gaps` table for this user & domain
$upsertGap = $pdo->prepare('
    INSERT INTO skill_gaps (user_id, domain_id, skill_name, current_score, benchmark_score, priority, updated_at)
    VALUES (?, ?, ?, ?, ?, ?, NOW())
    ON DUPLICATE KEY UPDATE 
        current_score = VALUES(current_score),
        benchmark_score = VALUES(benchmark_score),
        priority = VALUES(priority),
        updated_at = NOW()
');
$upsertGap->execute([
    $userId,
    $domainId,
    $domainName,
    $computedScore,
    $benchmarkScore,
    $priority
]);

echo json_encode([
    'success'         => true,
    'session_id'      => $sessionId,
    'domain_id'       => $domainId,
    'domain_name'     => $domainName,
    'computed_score'  => $computedScore,
    'benchmark_score' => $benchmarkScore,
    'net_gap'         => $gap,
    'priority'        => $priority,
    'correct_count'   => $correctCount,
    'total_questions' => $totalCount,
    'earned_points'   => round($earnedPoints, 2),
    'max_points'      => round($maxPossiblePoints, 2),
    'formula_note'    => 'Difficulty-weighted point accumulation mapped into 100-pt competency index'
]);
