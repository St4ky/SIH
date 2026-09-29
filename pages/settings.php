<?php
require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../includes/db.php';
requireLogin();

$user = getCurrentUser();
$userId = (int)$user['id'];

$successMsg = '';
$errorMsg = '';

// Handle Profile Updates
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_profile'])) {
    $designation = trim($_POST['designation'] ?? '');
    $posting = trim($_POST['posting'] ?? '');
    $newPass = trim($_POST['new_password'] ?? '');

    if ($designation !== '' && $posting !== '') {
        if ($newPass !== '') {
            $hash = password_hash($newPass, PASSWORD_BCRYPT);
            $stmt = $pdo->prepare('UPDATE users SET designation = ?, posting = ?, password_hash = ? WHERE id = ?');
            $stmt->execute([$designation, $posting, $hash, $userId]);
        } else {
            $stmt = $pdo->prepare('UPDATE users SET designation = ?, posting = ? WHERE id = ?');
            $stmt->execute([$designation, $posting, $userId]);
        }

        // Update session
        $_SESSION['user']['designation'] = $designation;
        $_SESSION['user']['posting']     = $posting;
        $user = getCurrentUser();
        $successMsg = 'Cadre profile and credentials successfully updated in MoSPI Roster.';
    } else {
        $errorMsg = 'Designation and Posting Division are required fields.';
    }
}

$userName = htmlspecialchars($user['name'] ?? 'Dr. Rajesh Sharma, ISS');
$userCadre = htmlspecialchars($user['cadre'] ?? 'ISS');
$userDesignation = htmlspecialchars($user['designation'] ?? 'Joint Director, NAD / CSO');
$userEmpId = htmlspecialchars($user['employee_id'] ?? 'ISS-2008-0412');
$initials = '';
$cleanName = preg_replace('/^(Dr\.|Shri|Smt\.|Mr\.|Ms\.)\s+/i', '', $user['name'] ?? 'Rajesh Sharma');
$words = explode(' ', trim($cleanName));
foreach ($words as $w) {
    if (!empty($w)) $initials .= strtoupper($w[0]);
}
$initials = substr($initials, 0, 2) ?: 'RS';
?>
<!DOCTYPE html>

<html lang="en"><head><meta charset="utf-8"/><meta content="width=device-width, initial-scale=1.0" name="viewport"/><meta content="web_dashboard" name="shell-type"/><title>Gap2Grow - MoSPI / NSSTA Settings &amp; Profile</title><link href="https://fonts.googleapis.com" rel="preconnect"/><link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/><link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;600;700&amp;display=swap" rel="stylesheet"/><link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/><style>@layer base{html,body{margin:0;padding:0;}body{overscroll-behavior:none;}main>:first-child{margin-top:0!important;}main>:last-child{margin-bottom:0!important;}}::-webkit-scrollbar{display:none;}</style><script src="https://cdn.tailwindcss.com"></script><script id="tailwind-config">tailwind.config = { darkMode: "class", theme: { extend: { "colors": { "on-tertiary": "#ffffff", "inverse-surface": "#233144", "outline-variant": "#c4c6cf", "tertiary-fixed": "#dce1ff", "on-secondary-container": "#531800", "surface-dim": "#ccdbf4", "on-background": "#0d1c2f", "inverse-on-surface": "#ebf1ff", "on-tertiary-fixed-variant": "#264191", "on-primary": "#ffffff", "surface-container": "#e6eeff", "on-tertiary-container": "#7088dc", "surface-container-low": "#eff4ff", "surface-container-high": "#dde9ff", "on-surface": "#0d1c2f", "secondary-fixed-dim": "#ffb59a", "outline": "#74777f", "surface-container-lowest": "#ffffff", "secondary": "#a83900", "secondary-fixed": "#ffdbcf", "tertiary-container": "#001e63", "primary": "#001026", "on-primary-fixed": "#001c3b", "surface-variant": "#d5e3fd", "on-secondary": "#ffffff", "error-container": "#ffdad6", "primary-fixed": "#d5e3ff", "on-primary-fixed-variant": "#314769", "secondary-container": "#fc6018", "surface": "#f8f9ff", "tertiary": "#000c34", "tertiary-fixed-dim": "#b6c4ff", "error": "#ba1a1a", "primary-container": "#0b2545", "background": "#f8f9ff", "surface-tint": "#495f82", "on-error": "#ffffff", "surface-bright": "#f8f9ff", "on-error-container": "#93000a", "on-secondary-fixed-variant": "#802a00", "on-secondary-fixed": "#380d00", "on-surface-variant": "#44474e", "surface-container-highest": "#d5e3fd", "primary-fixed-dim": "#b1c7f0", "inverse-primary": "#b1c7f0", "on-primary-container": "#778db2", "on-tertiary-fixed": "#00164e" }, "borderRadius": { "DEFAULT": "0.125rem", "lg": "0.25rem", "xl": "0.5rem", "full": "0.75rem" }, "spacing": { "gutter": "1.5rem", "margin": "2rem", "space-xl": "2.5rem", "space-lg": "1.5rem", "gutter-mobile": "0.75rem", "margin-mobile": "1rem", "space-xs": "0.25rem", "space-md": "1rem", "space-sm": "0.5rem" }, "fontFamily": { "headline-xl-mobile": ["Public Sans"], "label-lg": ["Public Sans"], "body-lg": ["Public Sans"], "label-md": ["Public Sans"], "headline-lg": ["Public Sans"], "headline-lg-mobile": ["Public Sans"], "headline-md": ["Public Sans"], "headline-xl": ["Public Sans"], "body-sm": ["Public Sans"], "body-md": ["Public Sans"], "label-sm": ["Public Sans"], "headline-sm": ["Public Sans"] }, "fontSize": { "headline-xl-mobile": ["28px", { "lineHeight": "36px", "letterSpacing": "-0.01em", "fontWeight": "700" }], "label-lg": ["14px", { "lineHeight": "20px", "letterSpacing": "0.01em", "fontWeight": "600" }], "body-lg": ["16px", { "lineHeight": "24px", "fontWeight": "400" }], "label-md": ["12px", { "lineHeight": "16px", "letterSpacing": "0.02em", "fontWeight": "600" }], "headline-lg": ["28px", { "lineHeight": "36px", "letterSpacing": "-0.01em", "fontWeight": "700" }], "headline-lg-mobile": ["22px", { "lineHeight": "30px", "letterSpacing": "0em", "fontWeight": "700" }], "headline-md": ["22px", { "lineHeight": "28px", "fontWeight": "600" }], "headline-xl": ["36px", { "lineHeight": "44px", "letterSpacing": "-0.02em", "fontWeight": "700" }], "body-sm": ["12px", { "lineHeight": "18px", "fontWeight": "400" }], "body-md": ["14px", { "lineHeight": "20px", "fontWeight": "400" }], "label-sm": ["11px", { "lineHeight": "14px", "letterSpacing": "0.03em", "fontWeight": "600" }], "headline-sm": ["18px", { "lineHeight": "24px", "fontWeight": "600" }] } } } }</script></head><body class="bg-surface font-body-md text-body-md text-on-surface antialiased"><aside class="fixed left-0 top-0 h-screen w-72 bg-primary-container z-50 flex flex-col justify-between overflow-y-auto shadow-[0_1px_8px_rgba(0,0,0,0.04)]"><div class="flex flex-col"><div class="p-space-md bg-primary flex items-center gap-space-sm"><div class="w-9 h-9 rounded-lg bg-surface-container-lowest/10 flex items-center justify-center"><span class="material-symbols-outlined text-secondary-container text-[22px]">account_balance</span></div><div class="flex flex-col"><span class="font-label-md text-label-md text-on-primary tracking-tight uppercase">Gap2Grow | MoSPI</span><span class="font-label-sm text-label-sm text-on-primary-container">NSSTA Academy Portal</span></div></div><div class="m-space-md p-space-sm rounded-lg bg-primary/40"><div class="flex items-center gap-space-sm mb-space-xs"><div class="w-8 h-8 rounded-full bg-secondary-container flex items-center justify-center font-label-md text-label-md text-on-secondary"><?= $initials ?></div><div class="flex flex-col min-w-0 flex-1"><span class="font-label-md text-label-md text-on-primary truncate"><?= $userName ?></span><span class="font-label-sm text-label-sm text-on-primary-container truncate"><?= $userDesignation ?></span></div></div><div class="flex items-center justify-between pt-space-xs"><span class="font-label-sm text-label-sm text-on-primary-container">ID: <?= $userEmpId ?></span><span class="font-label-sm text-label-sm text-secondary-container bg-secondary-container/10 px-1.5 py-0.5 rounded">Verified</span></div></div><nav class="flex flex-col px-space-sm gap-1" data-active-classes="bg-surface-container-highest text-on-surface font-label-md"><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-primary-container hover:bg-surface-container-highest hover:text-on-surface transition-colors" data-path="learner-dashboard" href="/SIH/pages/dashboard.php"><span class="material-symbols-outlined text-[20px]">space_dashboard</span><span class="font-label-md text-label-md">Learner Dashboard</span></a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-primary-container hover:bg-surface-container-highest hover:text-on-surface transition-colors" data-path="skill-gap-analysis" href="/SIH/pages/skill-gap.php"><span class="material-symbols-outlined text-[20px]">analytics</span><span class="font-label-md text-label-md">Skill-Gap Analysis</span></a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-primary-container hover:bg-surface-container-highest hover:text-on-surface transition-colors" data-path="my-learning-path" href="/SIH/pages/learning-path.php"><span class="material-symbols-outlined text-[20px]">route</span><span class="font-label-md text-label-md">My Learning Path</span></a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-primary-container hover:bg-surface-container-highest hover:text-on-surface transition-colors" data-path="competency-profile" href="/SIH/pages/competency-profile.php"><span class="material-symbols-outlined text-[20px]">badge</span><span class="font-label-md text-label-md">Competency Profile</span></a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-primary-container hover:bg-surface-container-highest hover:text-on-surface transition-colors" data-path="ai-assessment-generator" href="/SIH/pages/assessment-generator.php"><span class="material-symbols-outlined text-[20px]">psychology</span><span class="font-label-md text-label-md">AI Assessment Generator</span></a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-primary-container hover:bg-surface-container-highest hover:text-on-surface transition-colors" data-path="igot-course-catalog" href="/SIH/pages/igot-courses.php"><span class="material-symbols-outlined text-[20px]">local_library</span><span class="font-label-md text-label-md">iGOT Course Catalog</span></a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-primary-container hover:bg-surface-container-highest hover:text-on-surface transition-colors" data-path="nssta-tpac-nominations" href="/SIH/pages/nssta-programmes.php"><span class="material-symbols-outlined text-[20px]">assignment_turned_in</span><span class="font-label-md text-label-md">NSSTA TPAC Nominations</span></a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-primary-container hover:bg-surface-container-highest hover:text-on-surface transition-colors" data-path="certifications" href="/SIH/pages/certifications.php"><span class="material-symbols-outlined text-[20px]">workspace_premium</span><span class="font-label-md text-label-md">My Certifications</span></a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-primary-container hover:bg-surface-container-highest hover:text-on-surface transition-colors" data-path="cadre-analytics" href="/SIH/pages/cadre-analytics.php"><span class="material-symbols-outlined text-[20px]">insights</span><span class="font-label-md text-label-md">Cadre Analytics</span></a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-primary-container hover:bg-surface-container-highest hover:text-on-surface transition-colors" data-path="emerging-skill-forecast" href="/SIH/pages/emerging-skills.php"><span class="material-symbols-outlined text-[20px]">trending_up</span><span class="font-label-md text-label-md">Emerging Skill Forecast</span></a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-primary-container hover:bg-surface-container-highest hover:text-on-surface transition-colors" data-path="ai-cadre-copilot" href="/SIH/pages/ai-assistant.php"><span class="material-symbols-outlined text-[20px]">smart_toy</span><span class="font-label-md text-label-md">AI Cadre Copilot</span></a><?php if (hasRole('admin')): ?><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-primary-container hover:bg-surface-container-highest hover:text-on-surface transition-colors" data-path="admin-workforce-hub" href="/SIH/pages/admin-dashboard.php"><span class="material-symbols-outlined text-[20px]">lan</span><span class="font-label-md text-label-md">Admin Workforce Hub</span></a><?php endif; ?><a aria-current="page" class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg transition-colors bg-surface-container-highest text-on-surface font-label-md" data-path="settings-and-profile" href="/SIH/pages/settings.php"><span class="material-symbols-outlined text-[20px]">settings</span><span class="font-label-md text-label-md">Settings &amp; Profile</span></a></nav></div><div class="p-space-md flex flex-col gap-space-sm bg-primary/30"><div class="flex flex-col gap-1"><span class="font-label-sm text-label-sm uppercase tracking-wider text-on-primary-container">Integration Node Telemetry</span><div class="flex flex-wrap gap-1"><span class="inline-flex items-center gap-1 font-label-sm text-label-sm px-2 py-0.5 rounded-full bg-surface-container-lowest/10 text-on-primary"><span class="w-1.5 h-1.5 rounded-full bg-secondary-container"></span>iGOT v2.4 Live</span><span class="inline-flex items-center gap-1 font-label-sm text-label-sm px-2 py-0.5 rounded-full bg-surface-container-lowest/10 text-on-primary"><span class="w-1.5 h-1.5 rounded-full bg-surface-tint"></span>SPARROW Active</span><span class="inline-flex items-center gap-1 font-label-sm text-label-sm px-2 py-0.5 rounded-full bg-surface-container-lowest/10 text-on-primary">GIGW 3.0</span><span class="inline-flex items-center gap-1 font-label-sm text-label-sm px-2 py-0.5 rounded-full bg-surface-container-lowest/10 text-on-primary">NSSTA-ISS Node</span></div></div><a class="flex items-center justify-between px-space-sm py-2 rounded-lg bg-surface-container-lowest/5 text-on-primary-container hover:bg-surface-container-highest hover:text-on-surface transition-colors" data-path="login" href="/SIH/logout.php"><span class="font-label-md text-label-md">Sign Out</span><span class="material-symbols-outlined text-[18px]">logout</span></a></div></aside><div class="pl-72"><header class="fixed top-0 left-72 right-0 h-16 bg-surface-container-lowest/95 backdrop-blur-xl shadow-[0_1px_8px_rgba(0,0,0,0.04)] z-40 flex items-center justify-between px-margin"><div class="flex items-center gap-space-md"><div class="flex flex-col"><div class="flex items-center gap-space-sm"><span class="font-label-sm text-label-sm text-primary font-bold tracking-tight uppercase">भारत सरकार | MoSPI</span><span class="w-1 h-1 rounded-full bg-outline-variant"></span><span class="font-label-sm text-label-sm text-on-surface-variant">Statistical Cadre Intelligence &amp; Administrative Cell</span></div><div class="flex items-center gap-space-xs mt-0.5"><span class="inline-flex items-center gap-1 font-label-sm text-label-sm px-2 py-0.5 rounded bg-surface-container text-on-surface font-semibold"><span class="material-symbols-outlined text-[14px] text-secondary">verified_user</span>NAD / Cadre Control Authority</span><span class="inline-flex items-center gap-1 font-label-sm text-label-sm px-2 py-0.5 rounded bg-surface-container text-on-surface-variant"><span class="material-symbols-outlined text-[14px]">lock</span>e-HRMS Cryptographic Seal: ISS-V4</span></div></div></div><div class="flex items-center gap-space-md"><div class="flex items-center gap-space-xs bg-surface-container-low px-space-sm py-1 rounded-lg"><span class="font-label-sm text-label-sm text-on-surface-variant font-medium">Role:</span><span class="font-label-sm text-label-sm text-on-surface font-semibold"><?= htmlspecialchars($user['role'] === 'admin' ? 'NSSTA Director / Admin' : ($user['designation'] ?? 'Cadre Officer')) ?></span></div><div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center font-label-sm text-on-primary font-bold"><?= $initials ?></div></div></header><main class="w-full pt-16 bg-surface"><div class="flex flex-col w-full">
<div class="w-full px-margin py-space-md flex flex-col gap-space-xl">

<!-- Action Panel Header -->
<div class="w-full bg-surface-container-lowest rounded-xl p-space-lg shadow-sm">
  <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-space-md">
    <div>
      <div class="flex items-center gap-space-xs mb-1">
        <span class="font-label-sm text-label-sm bg-primary-container text-on-primary px-2.5 py-0.5 rounded-full uppercase tracking-wider">
          MoSPI Official Cadre Registry
        </span>
        <span class="font-label-sm text-label-sm text-secondary font-bold">e-HRMS 2.0 / SPARROW Linked</span>
      </div>
      <h1 class="font-headline-lg text-headline-lg text-primary tracking-tight">Officer Settings &amp; Cadre Profile</h1>
      <p class="font-body-md text-body-md text-on-surface-variant mt-0.5">
        Manage your official single sign-on preferences, notification alerts, and institutional data synchronization settings.
      </p>
    </div>
    <div class="flex items-center gap-space-sm">
      <a href="/SIH/logout.php" class="px-space-md py-2.5 bg-error text-on-error hover:bg-error/90 rounded-lg font-label-md text-label-md transition-colors shadow-sm flex items-center gap-1.5">
        <span class="material-symbols-outlined text-[18px]">logout</span>
        <span>Sign Out of Session</span>
      </a>
    </div>
  </div>
</div>

<?php if ($successMsg): ?>
  <div class="p-space-md rounded-xl bg-emerald-100 text-emerald-900 border border-emerald-300 flex items-center gap-space-sm shadow-sm">
    <span class="material-symbols-outlined text-[24px] text-emerald-700">check_circle</span>
    <span class="font-body-md text-body-md font-medium"><?= htmlspecialchars($successMsg) ?></span>
  </div>
<?php endif; ?>

<?php if ($errorMsg): ?>
  <div class="p-space-md rounded-xl bg-error-container text-on-error-container border border-error/30 flex items-center gap-space-sm shadow-sm">
    <span class="material-symbols-outlined text-[24px] text-error">error</span>
    <span class="font-body-md text-body-md font-medium"><?= htmlspecialchars($errorMsg) ?></span>
  </div>
<?php endif; ?>

<div class="grid grid-cols-1 lg:grid-cols-12 gap-space-lg items-start">
  
  <!-- Left 7 Cols: Profile Update Form -->
  <div class="lg:col-span-7 flex flex-col gap-space-lg">
    <div class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm">
      <h2 class="font-headline-sm text-headline-sm text-primary mb-space-md pb-space-xs border-b border-surface-container flex items-center gap-2">
        <span class="material-symbols-outlined text-secondary text-[22px]">manage_accounts</span>
        <span>Official Cadre Designation &amp; Posting</span>
      </h2>

      <form method="POST" action="/SIH/pages/settings.php" class="space-y-space-md">
        <input type="hidden" name="update_profile" value="1"/>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-space-md">
          <div>
            <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Full Name</label>
            <input type="text" value="<?= htmlspecialchars($user['name']) ?>" disabled class="w-full bg-surface-container-low text-on-surface rounded-lg p-2.5 font-body-sm text-body-sm opacity-80 cursor-not-allowed"/>
          </div>
          <div>
            <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Cadre Stream</label>
            <input type="text" value="<?= htmlspecialchars($user['cadre']) ?> Cadre" disabled class="w-full bg-surface-container-low text-on-surface rounded-lg p-2.5 font-body-sm text-body-sm opacity-80 cursor-not-allowed"/>
          </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-space-md">
          <div>
            <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Employee ID / PPO No.</label>
            <input type="text" value="<?= htmlspecialchars($user['employee_id']) ?>" disabled class="w-full bg-surface-container-low text-on-surface rounded-lg p-2.5 font-body-sm text-body-sm font-mono opacity-80 cursor-not-allowed"/>
          </div>
          <div>
            <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Official Email</label>
            <input type="email" value="<?= htmlspecialchars($user['email']) ?>" disabled class="w-full bg-surface-container-low text-on-surface rounded-lg p-2.5 font-body-sm text-body-sm opacity-80 cursor-not-allowed"/>
          </div>
        </div>

        <div>
          <label class="block font-label-sm text-label-sm text-primary mb-1">Official Designation</label>
          <input type="text" name="designation" value="<?= htmlspecialchars($user['designation']) ?>" required class="w-full bg-surface-container-low text-on-surface rounded-lg p-2.5 font-body-sm text-body-sm focus:outline-none focus:ring-2 focus:ring-secondary"/>
        </div>

        <div>
          <label class="block font-label-sm text-label-sm text-primary mb-1">Posting Division &amp; Headquarters</label>
          <input type="text" name="posting" value="<?= htmlspecialchars($user['posting']) ?>" required class="w-full bg-surface-container-low text-on-surface rounded-lg p-2.5 font-body-sm text-body-sm focus:outline-none focus:ring-2 focus:ring-secondary"/>
        </div>

        <div>
          <label class="block font-label-sm text-label-sm text-primary mb-1">Update Parichay Password (Leave blank to keep unchanged)</label>
          <input type="password" name="new_password" placeholder="Enter new password (min 8 chars)" class="w-full bg-surface-container-low text-on-surface rounded-lg p-2.5 font-body-sm text-body-sm focus:outline-none focus:ring-2 focus:ring-secondary"/>
        </div>

        <div class="pt-space-sm border-t border-surface-container flex justify-end">
          <button type="submit" class="px-space-lg py-2.5 bg-secondary hover:bg-on-secondary-fixed-variant text-on-secondary rounded-lg font-label-md text-label-md transition-colors shadow-sm flex items-center gap-1.5">
            <span class="material-symbols-outlined text-[18px]">save</span>
            <span>Save Profile Changes</span>
          </button>
        </div>
      </form>
    </div>
  </div>

  <!-- Right 5 Cols: Security & Ecosystem Linkages -->
  <div class="lg:col-span-5 flex flex-col gap-space-lg">
    
    <!-- Institutional Linkages Card -->
    <div class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm space-y-space-md">
      <h3 class="font-headline-sm text-headline-sm text-primary flex items-center gap-2">
        <span class="material-symbols-outlined text-secondary text-[20px]">link</span>
        <span>Institutional Ecosystem Gateways</span>
      </h3>

      <div class="space-y-space-sm text-body-sm">
        <div class="p-space-sm rounded-lg bg-surface-container-low flex items-center justify-between">
          <div>
            <div class="font-semibold text-primary">Parichay / Jan Parichay SSO</div>
            <div class="text-[12px] text-on-surface-variant">Linked to <?= htmlspecialchars($user['email']) ?></div>
          </div>
          <span class="text-[11px] font-bold px-2 py-0.5 rounded bg-emerald-100 text-emerald-800">Active</span>
        </div>

        <div class="p-space-sm rounded-lg bg-surface-container-low flex items-center justify-between">
          <div>
            <div class="font-semibold text-primary">iGOT Karmayogi Bharat Hub</div>
            <div class="text-[12px] text-on-surface-variant">Sync: Every 6 Hours</div>
          </div>
          <span class="text-[11px] font-bold px-2 py-0.5 rounded bg-emerald-100 text-emerald-800">Connected</span>
        </div>

        <div class="p-space-sm rounded-lg bg-surface-container-low flex items-center justify-between">
          <div>
            <div class="font-semibold text-primary">SPARROW e-APAR Sync</div>
            <div class="text-[12px] text-on-surface-variant">Annual Cycle FY 2024–25</div>
          </div>
          <span class="text-[11px] font-bold px-2 py-0.5 rounded bg-emerald-100 text-emerald-800">Linked</span>
        </div>

        <div class="p-space-sm rounded-lg bg-surface-container-low flex items-center justify-between">
          <div>
            <div class="font-semibold text-primary">NIC Sandes 2FA Mobile</div>
            <div class="text-[12px] text-on-surface-variant">+91 98102 *****</div>
          </div>
          <span class="text-[11px] font-bold px-2 py-0.5 rounded bg-emerald-100 text-emerald-800">Verified</span>
        </div>
      </div>
    </div>

    <!-- Security & Privacy Stems -->
    <div class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm">
      <h3 class="font-headline-sm text-headline-sm text-primary mb-space-xs">Compliance Verification</h3>
      <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
        This instance operates under GIGW 3.0 government accessibility standards, ISO 27001 data protection protocols, and DPDP Act 2023 statutory mandates.
      </p>
      <div class="mt-space-md pt-space-xs flex flex-wrap gap-2 text-[11px] font-mono text-primary">
        <span class="bg-surface-container px-2 py-1 rounded">GIGW 3.0</span>
        <span class="bg-surface-container px-2 py-1 rounded">STQC Audited</span>
        <span class="bg-surface-container px-2 py-1 rounded">MeghRaj Cloud</span>
      </div>
    </div>

  </div>

</div>

</div>
</div></main></div></body></html>
