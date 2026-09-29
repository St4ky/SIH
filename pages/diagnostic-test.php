<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';

requireLogin();
$user = currentUser();
$userId = (int)$user['id'];

// Fetch all domains with available question count
$stmt = $pdo->query('
    SELECT cd.*, COUNT(dq.id) as question_count
    FROM competency_domains cd
    LEFT JOIN diagnostic_questions dq ON dq.domain_id = cd.id
    GROUP BY cd.id, cd.name
    ORDER BY cd.id ASC
');
$domains = $stmt->fetchAll();

// User previous completed assessment sessions
$stmt = $pdo->prepare('
    SELECT ds.*, cd.name as domain_name
    FROM diagnostic_sessions ds
    JOIN competency_domains cd ON cd.id = ds.domain_id
    WHERE ds.user_id = ? AND ds.completed_at IS NOT NULL
    ORDER BY ds.completed_at DESC
    LIMIT 6
');
$stmt->execute([$userId]);
$pastSessions = $stmt->fetchAll();

$pageTitle = 'Skill Self-Assessment / Diagnostic Test — Gap2Grow';
$currentPage = 'assessment-generator';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/sidebar.php';
?>

<!-- Action Panel Header -->
<div class="w-full bg-surface-container-lowest rounded-xl p-space-lg shadow-sm mb-space-lg">
  <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-space-md">
    <div>
      <div class="flex items-center gap-space-xs mb-1">
        <span class="font-label-sm text-label-sm bg-primary-container text-on-primary px-2.5 py-0.5 rounded-full uppercase tracking-wider">
          NSSTA Proctored Diagnostic Roster
        </span>
        <span class="font-label-sm text-label-sm text-on-surface-variant">Annual Cadre Verification 2024–25</span>
      </div>
      <h1 class="font-headline-lg text-headline-lg text-primary tracking-tight">Competency Diagnostic Testing Center</h1>
      <p class="font-body-md text-body-md text-on-surface-variant mt-0.5">
        Select a competency domain to initiate a timed 10-question diagnostic assessment. Submissions automatically recalculate your deficit index in <code class="text-secondary font-mono">skill_gaps</code>.
      </p>
    </div>
  </div>
</div>

<!-- 4 Domain Selector Bento Grid -->
<section class="grid grid-cols-1 md:grid-cols-2 gap-space-lg mb-space-xl">
  <?php foreach ($domains as $d): 
    $icon = ($d['id'] == 1) ? 'analytics' : (($d['id'] == 2) ? 'terminal' : (($d['id'] == 3) ? 'gavel' : 'group'));
  ?>
    <div class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between border-t-4 border-primary">
      <div>
        <div class="flex items-center justify-between mb-space-sm">
          <div class="w-12 h-12 rounded-xl bg-primary text-on-primary flex items-center justify-center">
            <span class="material-symbols-outlined text-[26px] text-secondary-container"><?= $icon ?></span>
          </div>
          <span class="px-2.5 py-1 rounded bg-surface-container text-primary font-mono text-label-sm font-semibold">
            <?= $d['question_count'] ?> Verified Items
          </span>
        </div>

        <h2 class="font-headline-sm text-headline-sm text-primary"><?= htmlspecialchars($d['name']) ?></h2>
        <p class="font-body-sm text-body-sm text-on-surface-variant mt-2 leading-relaxed">
          <?php if ($d['id'] == 1): ?>
            Covers SNA 2008 Supply-Use Tables, Consumer Price Index (CPI), IIP, and Multi-Stage Sample Survey Design for NSS field rounds.
          <?php elseif ($d['id'] == 2): ?>
            Evaluates Python (Pandas/NumPy), SQL for billion-row survey microdata, QGIS spatial disaggregation, and econometric nowcasting.
          <?php elseif ($d['id'] == 3): ?>
            Tests compliance with DPDP Act 2023, data fiduciary obligations, GIGW 3.0 accessibility, and sovereign cloud architectures.
          <?php else: ?>
            Focuses on field survey team leadership, ethical dissemination, and inter-ministerial data reconciliation protocols.
          <?php endif; ?>
        </p>
      </div>

      <div class="mt-space-lg pt-space-sm border-t border-surface-container flex items-center justify-between">
        <span class="text-label-sm font-label-sm text-on-surface-variant flex items-center gap-1">
          <span class="material-symbols-outlined text-[16px]">schedule</span> 10 Questions • 28 Mins
        </span>
        <a href="<?= BASE_URL ?>/pages/take-assessment.php?domain_id=<?= $d['id'] ?>" class="px-space-md py-2 bg-secondary text-on-secondary hover:bg-on-secondary-fixed-variant rounded-lg font-label-md text-label-md transition-colors flex items-center gap-1 shadow-sm">
          <span>Start Assessment</span>
          <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
        </a>
      </div>
    </div>
  <?php endforeach; ?>
</section>

<!-- Previous Assessment History Table -->
<section class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm">
  <div class="flex items-center justify-between pb-space-sm border-b border-surface-container mb-space-md">
    <div>
      <h3 class="font-headline-sm text-headline-sm text-primary">Your Assessment History &amp; Audit Trail</h3>
      <p class="font-body-sm text-body-sm text-on-surface-variant">Past proctored examination sessions recorded in your official MoSPI competency passport.</p>
    </div>
    <span class="text-label-sm font-label-sm text-on-surface-variant">SHA-256 Ledger Backed</span>
  </div>

  <?php if (empty($pastSessions)): ?>
    <p class="text-body-sm text-on-surface-variant py-4 text-center">No past assessment records found. Take an assessment above to establish your baseline score.</p>
  <?php else: ?>
    <div class="table-responsive">
      <table class="w-full text-left border-collapse">
        <thead>
          <tr class="bg-surface-container-low text-label-sm font-label-sm text-on-surface-variant uppercase tracking-wider">
            <th class="py-3 px-4 font-semibold">Session ID</th>
            <th class="py-3 px-4 font-semibold">Domain</th>
            <th class="py-3 px-4 font-semibold">Completion Date</th>
            <th class="py-3 px-4 font-semibold">Assessed Score</th>
            <th class="py-3 px-4 font-semibold">Result Dossier</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-surface-container text-body-md font-body-md">
          <?php foreach ($pastSessions as $ps): 
            $sc = (int)$ps['final_score'];
          ?>
            <tr class="hover:bg-surface-container-low/50 transition-colors">
              <td class="py-3 px-4 font-mono text-label-sm text-primary">#SESS-<?= sprintf('%04d', $ps['id']) ?></td>
              <td class="py-3 px-4 font-semibold text-primary"><?= htmlspecialchars($ps['domain_name']) ?></td>
              <td class="py-3 px-4 text-body-sm text-on-surface-variant"><?= date('d M Y • H:i', strtotime($ps['completed_at'])) ?></td>
              <td class="py-3 px-4">
                <span class="px-2.5 py-0.5 rounded font-bold font-mono text-label-md <?= $sc >= 70 ? 'bg-emerald-100 text-emerald-800' : 'bg-error-container text-error' ?>">
                  <?= $sc ?>% (<?= $sc >= 70 ? 'Passed' : 'Needs Review' ?>)
                </span>
              </td>
              <td class="py-3 px-4">
                <a href="<?= BASE_URL ?>/pages/performance-gap.php?session_id=<?= $ps['id'] ?>" class="text-secondary font-label-sm font-semibold hover:underline flex items-center gap-0.5">
                  <span>View Full Dossier</span>
                  <span class="material-symbols-outlined text-[14px]">chevron_right</span>
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php endif; ?>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
