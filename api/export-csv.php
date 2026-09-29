<?php
// =======================================================
// Gap2Grow: Administrative CSV Dossier Exporter
// =======================================================

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';

// Allow admin or logged-in officers exporting their dossier
requireLogin();

$filename = 'MoSPI_Cadre_Competency_Dossier_' . date('Ymd_His') . '.csv';

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename="' . $filename . '"');
header('Pragma: no-cache');
header('Expires: 0');

$output = fopen('php://output', 'w');

// UTF-8 BOM for Excel compatibility
fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF));

// Header row
fputcsv($output, [
    'Officer ID',
    'Full Name',
    'Cadre Stream',
    'Designation',
    'Posting Division',
    'Competency Domain',
    'Specific Competency / Skill',
    'Diagnostic Assessed Score',
    'Cadre Benchmark Target',
    'Net Gap Delta',
    'Urgency Priority',
    'Last Audit Timestamp'
]);

$query = "
    SELECT 
        u.employee_id,
        u.name,
        u.cadre,
        u.designation,
        u.posting,
        cd.name as domain_name,
        sg.skill_name,
        sg.current_score,
        sg.benchmark_score,
        (sg.benchmark_score - sg.current_score) as net_gap,
        sg.priority,
        sg.updated_at
    FROM users u
    JOIN skill_gaps sg ON sg.user_id = u.id
    JOIN competency_domains cd ON cd.id = sg.domain_id
";

$params = [];
// If not admin, restrict to own profile
if (!isAdmin()) {
    $query .= " WHERE u.id = ?";
    $params[] = (int)$_SESSION['user_id'];
}

$query .= " ORDER BY u.cadre, u.name, cd.id, sg.current_score ASC";

$stmt = $pdo->prepare($query);
$stmt->execute($params);

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    fputcsv($output, [
        $row['employee_id'],
        $row['name'],
        $row['cadre'],
        $row['designation'],
        $row['posting'],
        $row['domain_name'],
        $row['skill_name'],
        $row['current_score'] . '%',
        $row['benchmark_score'] . '%',
        '-' . $row['net_gap'] . '%',
        strtoupper($row['priority']),
        $row['updated_at']
    ]);
}

fclose($output);
exit;
