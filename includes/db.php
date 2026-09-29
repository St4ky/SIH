<?php
// =======================================================
// Gap2Grow: Database Connection (PDO)
// =======================================================

require_once __DIR__ . '/config.php';

try {
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
} catch (PDOException $e) {
    // In production or API, handle failure gracefully
    if (defined('IS_API') && IS_API) {
        header('Content-Type: application/json');
        echo json_encode(['success' => false, 'error' => 'Database connection unavailable']);
        exit;
    }
    die('Database connection error: ' . htmlspecialchars($e->getMessage()));
}
