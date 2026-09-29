<?php
// =======================================================
// Gap2Grow: Real-Time Gap-to-Course Recommendation Engine
// =======================================================

define('IS_API', true);
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';

header('Content-Type: application/json; charset=utf-8');

$userId = isset($_GET['user_id']) ? (int)$_GET['user_id'] : ($_SESSION['user_id'] ?? 2);
$requestedSkillId = isset($_GET['skill_id']) ? (int)$_GET['skill_id'] : 0;

/*
 * =====================================================================
 * RECOMMENDATION ALGORITHM — Server-Side Multi-Factor Match Model
 * =====================================================================
 * 
 * Step 1: Identify Target Deficit
 *   Locate user's lowest-scoring skill_gap row (or requested skill_id).
 *   gap_delta = benchmark_score - current_score
 * 
 * Step 2: Ideal Difficulty Determination
 *   If gap_delta >= 30: requires Advanced Level 3 (Deep Remediation)
 *   If gap_delta >= 15: requires Intermediate Level 2 (Reinforcement)
 *   Else: requires Foundational Level 1 (Proficiency Maintenance)
 * 
 * Step 3: Candidate Resource Sourcing & Scoring
 *   Fetch courses from unified `resources` table.
 *   Calculate three weighted components:
 *     A. Domain Match Weight   : 50 pts (exact domain alignment = 50, related = 30)
 *     B. Difficulty Fit Weight : 30 pts based on delta: 30 * (1 - abs(difficulty - ideal) / 2)
 *     C. Recency & Relevance   : 20 pts based on freshness of cached course indexing
 *   
 *   match_percentage = A + B + C (Clamped 40.0% – 99.4%)
 * 
 * Step 4: Output Stream
 *   Returns ranked recommendations sorted DESC by match_percentage.
 * =====================================================================
 */

// 1. Fetch the target skill gap
if ($requestedSkillId > 0) {
    $gapStmt = $pdo->prepare('
        SELECT sg.*, cd.name as domain_name 
        FROM skill_gaps sg 
        JOIN competency_domains cd ON cd.id = sg.domain_id 
        WHERE sg.id = ? AND sg.user_id = ?
    ');
    $gapStmt->execute([$requestedSkillId, $userId]);
    $targetGap = $gapStmt->fetch();
} else {
    // Pick the most acute priority deficit (lowest current_score)
    $gapStmt = $pdo->prepare('
        SELECT sg.*, cd.name as domain_name 
        FROM skill_gaps sg 
        JOIN competency_domains cd ON cd.id = sg.domain_id 
        WHERE sg.user_id = ? 
        ORDER BY sg.current_score ASC, (sg.benchmark_score - sg.current_score) DESC 
        LIMIT 1
    ');
    $gapStmt->execute([$userId]);
    $targetGap = $gapStmt->fetch();
}

if (!$targetGap) {
    // Fallback gap structure if user has no gaps yet
    $targetGap = [
        'id'              => 0,
        'domain_id'       => 2,
        'domain_name'     => 'Technical & Computational Skills',
        'skill_name'      => 'GIS & Remote Sensing in Surveys',
        'current_score'   => 44,
        'benchmark_score' => 80,
        'priority'        => 'high'
    ];
}

$gapDelta = (int)$targetGap['benchmark_score'] - (int)$targetGap['current_score'];
$domainId = (int)$targetGap['domain_id'];

// Ideal target difficulty: 1 (Easy), 2 (Medium), 3 (Hard)
$idealDifficulty = ($gapDelta >= 30) ? 3 : (($gapDelta >= 15) ? 2 : 1);

// 2. Fetch candidate resources
$resStmt = $pdo->prepare('
    SELECT r.*, cd.name as domain_name,
           DATEDIFF(NOW(), IFNULL(r.cached_at, NOW())) as days_cached
    FROM resources r
    LEFT JOIN competency_domains cd ON cd.id = r.domain_id
    ORDER BY (r.domain_id = ?) DESC, r.difficulty DESC
');
$resStmt->execute([$domainId]);
$candidates = $resStmt->fetchAll();

// 3. Compute matching scores
$ranked = [];
foreach ($candidates as $res) {
    $resDomain = (int)($res['domain_id'] ?? 0);
    $resDiff = (int)($res['difficulty'] ?? 2);
    $days = (int)($res['days_cached'] ?? 0);

    // Component A: Domain Alignment (max 50)
    $domainScore = ($resDomain === $domainId) ? 50.0 : 25.0;

    // Component B: Difficulty Proximity (max 30)
    $diffDelta = abs($resDiff - $idealDifficulty);
    $diffScore = max(0.0, 30.0 * (1.0 - ($diffDelta / 2.0)));

    // Component C: Recency & Validity (max 20)
    $recencyScore = max(10.0, 20.0 * (1.0 - min(100, $days) / 150.0));

    // Total Match Percentage
    $matchPct = round(min(98.8, max(52.0, $domainScore + $diffScore + $recencyScore)), 1);

    $sourceLabel = ($res['source'] === 'coursera' || $res['source'] === 'igot')
        ? 'iGOT Karmayogi (Beta Catalog)'
        : 'NSSTA (Beta Catalog)';

    $ranked[] = [
        'id'             => (int)$res['id'],
        'title'          => $res['title'],
        'description'    => $res['description'],
        'source'         => $res['source'],
        'source_label'   => $sourceLabel,
        'domain_id'      => $resDomain,
        'domain_name'    => $res['domain_name'] ?? 'Official Statistics',
        'duration'       => $res['duration'],
        'difficulty'     => $resDiff,
        'url'            => $res['url'],
        'match_pct'      => $matchPct,
        'domain_weight'  => $domainScore,
        'diff_weight'    => round($diffScore, 1),
        'recency_weight' => round($recencyScore, 1),
        'fit_reason'     => ($resDomain === $domainId)
            ? "Directly remediates deficit in {$targetGap['skill_name']} ({$gapDelta}% gap)"
            : "Cross-domain strengthening in official analytical methods"
    ];
}

// Sort by match_pct descending
usort($ranked, function($a, $b) {
    return $b['match_pct'] <=> $a['match_pct'];
});

// Take top 6 recommendations
$topRecommendations = array_slice($ranked, 0, 6);

echo json_encode([
    'success'         => true,
    'user_id'         => $userId,
    'analyzed_gap'    => [
        'id'              => $targetGap['id'],
        'skill_name'      => $targetGap['skill_name'],
        'domain_id'       => $targetGap['domain_id'],
        'domain_name'     => $targetGap['domain_name'],
        'current_score'   => (int)$targetGap['current_score'],
        'benchmark_score' => (int)$targetGap['benchmark_score'],
        'net_deficit'     => $gapDelta,
        'priority'        => $targetGap['priority'],
        'ideal_level'     => $idealDifficulty
    ],
    'algorithm'       => 'Weighted Domain (50%) + Difficulty Proximity (30%) + Recency Index (20%)',
    'total_candidates'=> count($candidates),
    'recommendations' => $topRecommendations
]);
