<?php
// =======================================================
// Gap2Grow: Course & TPAC Nomination Handler
// =======================================================

define('IS_API', true);
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';

header('Content-Type: application/json; charset=utf-8');

if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode(['success' => false, 'message' => 'Authentication required']);
    exit;
}

$userId = (int)$_SESSION['user_id'];
$raw = file_get_contents('php://input');
$data = json_decode($raw, true);

if (!$data) {
    $data = $_POST;
}

$resourceId = isset($data['resource_id']) ? (int)$data['resource_id'] : 0;

if ($resourceId <= 0) {
    echo json_encode(['success' => false, 'message' => 'Invalid resource ID']);
    exit;
}

// Verify resource exists
$checkRes = $pdo->prepare('SELECT id, title FROM resources WHERE id = ?');
$checkRes->execute([$resourceId]);
$resource = $checkRes->fetch();

if (!$resource) {
    echo json_encode(['success' => false, 'message' => 'Course or programme not found']);
    exit;
}

// Check existing nomination
$checkNom = $pdo->prepare('SELECT id, status FROM nominations WHERE user_id = ? AND resource_id = ?');
$checkNom->execute([$userId, $resourceId]);
$existing = $checkNom->fetch();

if ($existing) {
    echo json_encode([
        'success'       => true,
        'nomination_id' => (int)$existing['id'],
        'status'        => $existing['status'],
        'message'       => 'You are already nominated for this programme (' . ucfirst($existing['status']) . ')'
    ]);
    exit;
}

// Create nomination
$insert = $pdo->prepare('
    INSERT INTO nominations (user_id, resource_id, status, nominated_at)
    VALUES (?, ?, "pending", NOW())
');
$insert->execute([$userId, $resourceId]);
$newId = (int)$pdo->lastInsertId();

echo json_encode([
    'success'       => true,
    'nomination_id' => $newId,
    'status'        => 'pending',
    'message'       => 'Nomination submitted successfully to NSSTA Cadre Control Board'
]);
