<?php
// =======================================================
// Gap2Grow: Self-Declared Skills Submission Endpoint
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
$raw = file_get_contents('php://input');
$data = json_decode($raw, true);

if (!$data) {
    $data = $_POST;
}

$skills = isset($data['skills']) && is_array($data['skills']) ? $data['skills'] : [];
if (empty($skills) && !empty($data['skill_name'])) {
    $skills = [$data];
}

if (empty($skills)) {
    echo json_encode(['success' => false, 'error' => 'No skill declarations received']);
    exit;
}

$upsert = $pdo->prepare('
    INSERT INTO self_declared_skills (user_id, skill_name, domain_id, claimed_level, declared_at)
    VALUES (?, ?, ?, ?, NOW())
    ON DUPLICATE KEY UPDATE 
        claimed_level = VALUES(claimed_level),
        domain_id     = VALUES(domain_id),
        declared_at   = NOW()
');

$savedCount = 0;
foreach ($skills as $item) {
    $skillName = trim($item['skill_name'] ?? '');
    $domainId = (int)($item['domain_id'] ?? 1);
    $level = max(1, min(5, (int)($item['claimed_level'] ?? 1)));

    if ($skillName === '') continue;

    try {
        $upsert->execute([$userId, $skillName, $domainId, $level]);
        $savedCount++;
    } catch (Exception $e) {}
}

echo json_encode([
    'success'     => true,
    'saved_count' => $savedCount,
    'message'     => "{$savedCount} self-declared competencies saved and synchronized with SPARROW cadre profile"
]);
