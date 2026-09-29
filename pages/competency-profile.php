<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';

requireLogin();
$user = currentUser();
$userId = (int)$user['id'];

// Fetch proctored skill gaps
$stmtGaps = $pdo->prepare('SELECT sg.*, cd.name as domain_name FROM skill_gaps sg JOIN competency_domains cd ON cd.id = sg.domain_id WHERE sg.user_id = ?');
$stmtGaps->execute([$userId]);
$gaps = $stmtGaps->fetchAll();

// Fetch self-declared skills
$stmtSelf = $pdo->prepare('SELECT * FROM self_declared_skills WHERE user_id = ?');
$stmtSelf->execute([$userId]);
$selfDeclared = [];
foreach ($stmtSelf->fetchAll() as $s) {
    $selfDeclared[$s['skill_name']] = (int)$s['claimed_level'];
}

// Side-by-side comparison synthesis (Assessed vs Self-Declared)
$comparisonData = [];
foreach ($gaps as $g) {
    $sName = $g['skill_name'];
    $assessed = (int)$g['current_score'];
    $benchmark = (int)$g['benchmark_score'];
    $claimed = $selfDeclared[$sName] ?? (int)max(1, min(5, round(($assessed / 100) * 5)));
    $claimedPct = $claimed * 20;
    $variance = $claimedPct - $assessed;
    
    $comparisonData[] = [
        'skill_name' => $sName,
        'domain_name' => $g['domain_name'] ?? 'Statistical Competency',
        'domain_id' => $g['domain_id'] ?? 1,
        'assessed_score' => $assessed,
        'benchmark_score' => $benchmark,
        'claimed_level' => $claimed,
        'claimed_pct' => $claimedPct,
        'variance' => $variance,
        'priority' => $g['priority'] ?? 'medium'
    ];
}
?>
<!DOCTYPE html>

<html lang="en"><head><meta charset="utf-8"/><meta content="width=device-width, initial-scale=1.0" name="viewport"/><meta content="web_dashboard" name="shell-type"/><link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/><link href="https://fonts.googleapis.com" rel="preconnect"/><link href="https://fonts.gstatic.com" rel="preconnect"/><link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/><style>@layer base{html,body{margin:0;padding:0;}body{overscroll-behavior:none;}main>:first-child{margin-top:0!important;}main>:last-child{margin-bottom:0!important;}}::-webkit-scrollbar{display:none;}</style><script src="https://cdn.tailwindcss.com"></script><script id="tailwind-config">tailwind.config={darkMode:"class",theme:{extend:{"colors":{"surface-container-lowest":"#ffffff","surface":"#f8f9ff","primary-fixed":"#d5e3ff","secondary-container":"#fc6018","surface-tint":"#495f82","on-background":"#0d1c2f","on-tertiary-fixed":"#00164e","error":"#ba1a1a","on-surface":"#0d1c2f","tertiary-fixed":"#dce1ff","surface-container-highest":"#d5e3fd","on-tertiary":"#ffffff","tertiary-container":"#001e63","on-tertiary-container":"#7088dc","primary":"#001026","surface-container":"#e6eeff","on-surface-variant":"#44474e","background":"#f8f9ff","on-secondary-fixed-variant":"#802a00","on-primary":"#ffffff","tertiary-fixed-dim":"#b6c4ff","secondary":"#a83900","inverse-on-surface":"#ebf1ff","tertiary":"#000c34","on-primary-container":"#778db2","primary-container":"#0b2545","surface-dim":"#ccdbf4","on-primary-fixed":"#001c3b","on-secondary-fixed":"#380d00","inverse-primary":"#b1c7f0","error-container":"#ffdad6","on-error-container":"#93000a","inverse-surface":"#233144","on-tertiary-fixed-variant":"#264191","secondary-fixed":"#ffdbcf","outline":"#74777f","on-primary-fixed-variant":"#314769","on-error":"#ffffff","surface-container-low":"#eff4ff","secondary-fixed-dim":"#ffb59a","surface-variant":"#d5e3fd","on-secondary-container":"#531800","on-secondary":"#ffffff","surface-container-high":"#dde9ff","outline-variant":"#c4c6cf","surface-bright":"#f8f9ff","primary-fixed-dim":"#b1c7f0"},"borderRadius":{"DEFAULT":"0.125rem","lg":"0.25rem","xl":"0.5rem","full":"0.75rem"},"spacing":{"gutter-mobile":"0.75rem","margin-mobile":"1rem","space-lg":"1.5rem","space-sm":"0.5rem","gutter":"1.5rem","space-md":"1rem","space-xs":"0.25rem","margin":"2rem","space-xl":"2.5rem"},"fontFamily":{"label-lg":["Public Sans"],"label-md":["Public Sans"],"body-lg":["Public Sans"],"body-md":["Public Sans"],"headline-lg":["Public Sans"],"headline-xl":["Public Sans"],"headline-lg-mobile":["Public Sans"],"label-sm":["Public Sans"],"headline-md":["Public Sans"],"body-sm":["Public Sans"],"headline-sm":["Public Sans"],"headline-xl-mobile":["Public Sans"]},"fontSize":{"label-lg":["14px",{"lineHeight":"20px","letterSpacing":"0.01em","fontWeight":"600"}],"label-md":["12px",{"lineHeight":"16px","letterSpacing":"0.02em","fontWeight":"600"}],"body-lg":["16px",{"lineHeight":"24px","fontWeight":"400"}],"body-md":["14px",{"lineHeight":"20px","fontWeight":"400"}],"headline-lg":["28px",{"lineHeight":"36px","letterSpacing":"-0.01em","fontWeight":"700"}],"headline-xl":["36px",{"lineHeight":"44px","letterSpacing":"-0.02em","fontWeight":"700"}],"headline-lg-mobile":["22px",{"lineHeight":"30px","letterSpacing":"0em","fontWeight":"700"}],"label-sm":["11px",{"lineHeight":"14px","letterSpacing":"0.03em","fontWeight":"600"}],"headline-md":["22px",{"lineHeight":"28px","fontWeight":"600"}],"body-sm":["12px",{"lineHeight":"18px","fontWeight":"400"}],"headline-sm":["18px",{"lineHeight":"24px","fontWeight":"600"}],"headline-xl-mobile":["28px",{"lineHeight":"36px","letterSpacing":"-0.01em","fontWeight":"700"}]}}}}</script></head><body class="bg-surface font-body-md text-body-md text-on-surface antialiased"><aside class="fixed left-0 top-0 h-full w-72 bg-primary-container text-on-primary z-50 flex flex-col justify-between shadow-[0_4px_20px_rgba(11,37,69,0.25)]"><div class="flex flex-col"><div class="px-space-md py-space-sm bg-primary flex items-center justify-between"><div class="flex items-center gap-space-xs"><span class="material-symbols-outlined text-secondary-container text-[20px]">verified</span><span class="font-label-sm text-label-sm tracking-wide text-primary-fixed">GIGW 3.0 | iGOT Live</span></div><span class="w-2 h-2 rounded-full bg-secondary-container animate-pulse"></span></div><div class="p-space-md bg-tertiary-container"><div class="flex items-center gap-space-sm"><div class="w-11 h-11 rounded-full bg-primary flex items-center justify-center"><span class="material-symbols-outlined text-on-primary text-[24px]">person</span></div><div class="min-w-0 flex-1"><div class="font-label-lg text-label-lg text-on-tertiary truncate">Dr. Rajesh Sharma, ISS</div><div class="font-body-sm text-body-sm text-on-tertiary-container truncate">Joint Director, NAD (CSO)</div></div></div><div class="mt-space-sm pt-space-xs flex items-center justify-between text-label-sm font-label-sm"><span class="bg-secondary text-on-secondary px-2 py-0.5 rounded">ISS Cadre</span><span class="text-primary-fixed truncate">ID: ISS-2008-0412</span></div></div><nav class="px-space-sm py-space-md space-y-1 flex flex-col" data-active-classes="bg-primary text-on-primary font-bold"><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="learner-dashboard" href="<?= BASE_URL ?>/pages/dashboard.php"><span class="material-symbols-outlined text-[20px]">space_dashboard</span><span>Learner Dashboard</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="skill-gap-analysis" href="<?= BASE_URL ?>/pages/skill-gap.php"><span class="material-symbols-outlined text-[20px]">monitoring</span><span>Skill-Gap Analysis</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="my-learning-path" href="<?= BASE_URL ?>/pages/learning-path.php"><span class="material-symbols-outlined text-[20px]">route</span><span>My Learning Path</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="ai-assessment-generator" href="<?= BASE_URL ?>/pages/assessment-generator.php"><span class="material-symbols-outlined text-[20px]">psychology</span><span>AI Assessment Generator</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="igot-course-catalog" href="<?= BASE_URL ?>/pages/igot-courses.php"><span class="material-symbols-outlined text-[20px]">menu_book</span><span>iGOT Course Catalog</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="nssta-tpac-nominations" href="<?= BASE_URL ?>/pages/nssta-programmes.php"><span class="material-symbols-outlined text-[20px]">assignment_ind</span><span>NSSTA TPAC Nominations</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="cadre-analytics" href="<?= BASE_URL ?>/pages/cadre-analytics.php"><span class="material-symbols-outlined text-[20px]">analytics</span><span>Cadre Analytics</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="settings-profile" href="<?= BASE_URL ?>/pages/settings.php"><span class="material-symbols-outlined text-[20px]">manage_accounts</span><span>Settings &amp; Profile</span></a></nav></div><div class="p-space-md bg-tertiary text-on-tertiary"><div class="text-label-sm font-label-sm text-tertiary-fixed-dim uppercase tracking-wider mb-space-xs">Sync Status</div><div class="space-y-1 text-label-sm font-label-sm mb-space-md"><div class="flex items-center justify-between text-on-tertiary"><span>iGOT Karmayogi API</span><span class="text-secondary-fixed">v2.4 Live</span></div><div class="flex items-center justify-between text-on-tertiary"><span>SPARROW / e-HRMS</span><span class="text-secondary-fixed">Active</span></div></div><div class="flex items-center justify-between pt-space-xs"><a class="flex items-center gap-space-xs text-secondary-fixed hover:text-on-tertiary text-label-sm font-label-sm" href="<?= BASE_URL ?>/logout.php"><span class="material-symbols-outlined text-[16px]">logout</span><span>Sign Out</span></a><span class="text-tertiary-fixed-dim text-label-sm font-label-sm">NSSTA-ISS</span></div></div></aside><div class="pl-72"><header class="fixed top-0 left-72 right-0 h-16 bg-surface-container-lowest/90 backdrop-blur-md shadow-[0_1px_8px_rgba(11,37,69,0.06)] z-40 flex items-center justify-between px-space-lg"><div class="flex items-center gap-space-sm text-body-sm font-body-sm text-on-surface-variant"><span>भारत सरकार | MoSPI Official Statistical Cadre Intelligence</span></div><div class="flex items-center gap-space-md"><div class="flex items-center gap-space-xs bg-surface-container-low px-space-sm py-1 rounded-full text-label-sm font-label-sm text-on-surface"><span class="w-2 h-2 rounded-full bg-secondary"></span><span>NAD Division</span></div><div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center"><span class="material-symbols-outlined text-on-primary text-[18px]">person</span></div></div></header><main class="relative pt-16 w-full px-space-lg bg-surface min-h-[calc(100vh-64px)]"><div class="flex flex-col w-full pb-space-xl">
<!-- Status Flash Ribbon (Sovereign Notification) -->
<div class="w-full bg-surface-container-low px-space-md py-2.5 flex flex-wrap items-center justify-between gap-space-sm mb-space-md rounded-xl">
<div class="flex items-center gap-space-sm min-w-0">
<span class="flex h-2.5 w-2.5 rounded-full bg-secondary animate-pulse"></span>
<span class="font-label-sm text-label-sm text-secondary uppercase tracking-wider">Official Roster Cycle 2024-25</span>
<span class="hidden md:inline font-body-sm text-body-sm text-on-surface-variant">• Cadre Competency Review Window closes in 14 days</span>
</div>
<div class="flex items-center gap-space-md">
<span class="font-label-sm text-label-sm text-on-surface-variant flex items-center gap-1">
<span class="material-symbols-outlined text-[16px] text-secondary">verified_user</span>
        SPARROW Cadre Hash: #ISS-2008-0482-VER
      </span>
<span class="font-label-sm text-label-sm text-primary font-bold bg-surface-container px-2 py-0.5 rounded">GIGW 3.0 / DOPT Validated</span>
</div>
</div>
<!-- Page Header Panel: Title, Cadre Context, Actions -->
<div class="w-full bg-surface-container-lowest rounded-xl p-space-lg shadow-sm mb-space-lg">
<div class="flex flex-col xl:flex-row xl:items-center justify-between gap-space-md">
<div class="min-w-0">
<div class="flex items-center gap-2 mb-1">
<span class="font-label-sm text-label-sm bg-primary-container text-on-primary px-2 py-0.5 rounded uppercase tracking-wider">MoSPI ISS Cadre Roster</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">e-HRMS Node: 10482</span>
</div>
<h1 class="font-headline-lg text-headline-lg text-primary tracking-tight">Competency Profile &amp; Skill Declaration Studio</h1>
<p class="font-body-md text-body-md text-on-surface-variant mt-1">
<strong class="text-on-surface">Dr. Rajesh Sharma, ISS</strong> | Grade: Level 13A (Senior Selection Grade) | ID: MoSPI-ISS-0482 | 
          <span class="text-secondary font-semibold">Verification Status: 85% Verified by NSSTA Academy Board</span>
</p>
</div>
<!-- Action Toolbar -->
<div class="flex flex-wrap items-center gap-space-sm pt-2 xl:pt-0">
<button class="flex items-center gap-1.5 px-3.5 py-2 rounded-lg bg-surface-container hover:bg-surface-container-high text-on-surface transition-colors font-label-md text-label-md" type="button">
<span class="material-symbols-outlined text-[18px]">save</span>
<span>Save Draft</span>
</button>
<button class="flex items-center gap-1.5 px-3.5 py-2 rounded-lg bg-surface-container hover:bg-surface-container-high text-on-surface transition-colors font-label-md text-label-md" type="button">
<span class="material-symbols-outlined text-[18px]">picture_as_pdf</span>
<span>Export Cadre Dossier (PDF)</span>
</button>
<button class="flex items-center gap-1.5 px-4 py-2 rounded-lg bg-secondary text-on-secondary hover:bg-on-secondary-container transition-all shadow-sm font-label-md text-label-md" type="button">
<span class="material-symbols-outlined text-[18px]">verified</span>
<span>Submit for Peer / DPC Verification</span>
</button>
</div>
</div>
</div>
<!-- Multi-Step Progress Ribbon (Institutional 4-stage stepper) -->
<div class="w-full bg-surface-container-lowest rounded-xl p-space-md shadow-sm mb-space-lg">
<div class="grid grid-cols-1 md:grid-cols-4 gap-space-sm">
<!-- Step 1 -->
<div class="flex items-center gap-space-sm p-space-sm rounded-lg bg-surface-container-low">
<div class="w-8 h-8 rounded-full bg-primary-container text-on-primary flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[18px]">check</span>
</div>
<div class="min-w-0">
<div class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Step 01</div>
<div class="font-label-md text-label-md text-on-surface truncate">Demographic &amp; Post Details</div>
<div class="font-body-sm text-body-sm text-secondary font-semibold">Completed</div>
</div>
</div>
<!-- Step 2 (Active) -->
<div class="flex items-center gap-space-sm p-space-sm rounded-lg bg-primary text-on-primary shadow-sm">
<div class="w-8 h-8 rounded-full bg-secondary-container text-on-secondary flex items-center justify-center font-bold text-label-md shrink-0">
          02
        </div>
<div class="min-w-0">
<div class="font-label-sm text-label-sm text-primary-fixed uppercase tracking-wider">Step 02 (Active)</div>
<div class="font-label-md text-label-md text-on-primary truncate">Self-Declared Skills &amp; Proficiency</div>
<div class="font-body-sm text-body-sm text-primary-fixed-dim">In Progress • 14 Declared</div>
</div>
</div>
<!-- Step 3 -->
<div class="flex items-center gap-space-sm p-space-sm rounded-lg bg-surface-container-lowest">
<div class="w-8 h-8 rounded-full bg-surface-container-high text-on-surface-variant flex items-center justify-center font-bold text-label-md shrink-0">
          03
        </div>
<div class="min-w-0">
<div class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Step 03</div>
<div class="font-label-md text-label-md text-on-surface truncate">Institutional Training History</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">iGOT &amp; NSSTA Synced</div>
</div>
</div>
<!-- Step 4 -->
<div class="flex items-center gap-space-sm p-space-sm rounded-lg bg-surface-container-lowest">
<div class="w-8 h-8 rounded-full bg-surface-container-high text-on-surface-variant flex items-center justify-center font-bold text-label-md shrink-0">
          04
        </div>
<div class="min-w-0">
<div class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Step 04</div>
<div class="font-label-md text-label-md text-on-surface truncate">Cadre DPC Endorsement</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">Awaiting Submission</div>
</div>
</div>
</div>
</div>
<!-- Primary Sub-View Navigation Tabs: Assessed vs Self-Declared & Side-by-Side Comparison -->
<div class="w-full bg-surface-container-lowest rounded-xl p-2 shadow-sm mb-space-lg flex flex-wrap items-center justify-between gap-2 border border-surface-container">
  <div class="flex items-center gap-1.5" id="profile-tabs">
    <button onclick="switchProfileTab('side-by-side')" id="tab-btn-side-by-side" class="profile-tab-btn active px-4 py-2.5 rounded-lg bg-primary text-on-primary font-label-md text-label-md font-bold transition-all shadow-sm flex items-center gap-2">
      <span class="material-symbols-outlined text-[18px]">compare_arrows</span>
      <span>Assessed Scores (Side-by-Side Comparison)</span>
      <span class="px-2 py-0.5 rounded-full bg-secondary text-on-secondary text-[11px] font-bold">Side-by-Side</span>
    </button>
    <button onclick="switchProfileTab('self-declared')" id="tab-btn-self-declared" class="profile-tab-btn px-4 py-2.5 rounded-lg text-on-surface hover:bg-surface-container font-label-md text-label-md font-bold transition-all flex items-center gap-2">
      <span class="material-symbols-outlined text-[18px] text-secondary">checklist</span>
      <span>Self-Declared Skills Checklist</span>
      <span class="px-2 py-0.5 rounded-full bg-surface-container-high text-primary text-[11px] font-bold">Checklist</span>
    </button>
  </div>
  <div class="flex items-center gap-2 px-3 py-1.5 text-label-sm font-label-sm text-on-surface-variant">
    <span class="material-symbols-outlined text-[16px] text-secondary">sync</span>
    <span>SPARROW 2-Way Cadre Synchronized</span>
  </div>
</div>

<!-- Primary Workspace: 2-Column Asymmetric Layout -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-space-lg">
<!-- Left / Center 8 Columns: Grouped Competency Declaration Forms -->
<div class="lg:col-span-8 flex flex-col gap-space-lg">

<!-- TAB PANE 1: SIDE-BY-SIDE RECONCILIATION MATRIX (Assessed vs. Self-Declared) -->
<div id="tab-pane-side-by-side" class="profile-tab-pane flex flex-col gap-space-md">
  <div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm">
    <div class="flex flex-wrap items-center justify-between gap-space-sm mb-space-sm pb-space-xs border-b border-surface-container">
      <div>
        <h2 class="font-headline-sm text-headline-sm text-primary flex items-center gap-2">
          <span class="material-symbols-outlined text-secondary text-[22px]">compare_arrows</span>
          <span>Side-by-Side Competency Reconciliation (Assessed vs. Self-Declared)</span>
        </h2>
        <p class="font-body-sm text-body-sm text-on-surface-variant">
          Empirical comparison between NSSTA proctored diagnostic scores and officer self-declared proficiencies.
        </p>
      </div>
      <span class="px-3 py-1 rounded-full bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm font-bold">
        <?= count($comparisonData) ?> Competencies Analyzed
      </span>
    </div>

    <!-- Table Container -->
    <div class="overflow-x-auto">
      <table class="w-full text-left border-collapse">
        <thead>
          <tr class="bg-surface-container-low text-on-surface-variant font-label-sm text-label-sm uppercase tracking-wider">
            <th class="py-3 px-4">Competency & Domain</th>
            <th class="py-3 px-4 text-center">Assessed Score (Diagnostic)</th>
            <th class="py-3 px-4 text-center">Self-Declared (Rating)</th>
            <th class="py-3 px-4 text-center">Variance / Alignment</th>
            <th class="py-3 px-4 text-right">Cadre Action</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-surface-container text-body-sm font-body-sm text-on-surface">
          <?php foreach ($comparisonData as $item): 
            $statusClass = $item['assessed_score'] >= $item['benchmark_score'] ? 'text-primary bg-primary-fixed' : 'text-error bg-error-container';
            $diffText = $item['variance'] > 0 ? "+{$item['variance']}% (Over-claimed)" : ($item['variance'] < 0 ? "{$item['variance']}% (Under-reported)" : "0% (Perfect Alignment)");
            $diffBadge = abs($item['variance']) <= 10 ? 'bg-emerald-100 text-emerald-800' : ($item['variance'] > 10 ? 'bg-amber-100 text-amber-900' : 'bg-blue-100 text-blue-900');
          ?>
          <tr class="hover:bg-surface-container-low/50 transition-colors">
            <td class="py-3 px-4">
              <div class="font-bold text-on-surface"><?= htmlspecialchars($item['skill_name']) ?></div>
              <div class="text-[12px] text-on-surface-variant"><?= htmlspecialchars($item['domain_name']) ?></div>
            </td>
            <td class="py-3 px-4 text-center">
              <div class="inline-flex flex-col items-center">
                <span class="font-headline-sm text-headline-sm font-bold <?= $item['assessed_score'] >= $item['benchmark_score'] ? 'text-primary' : 'text-secondary' ?>">
                  <?= $item['assessed_score'] ?>%
                </span>
                <span class="text-[11px] text-on-surface-variant">Norm: <?= $item['benchmark_score'] ?>%</span>
              </div>
            </td>
            <td class="py-3 px-4 text-center">
              <div class="inline-flex flex-col items-center">
                <div class="flex items-center gap-0.5 text-secondary">
                  <?php for ($star = 1; $star <= 5; $star++): ?>
                    <span onclick="updateSkillLevel('<?= addslashes($item['skill_name']) ?>', <?= $item['domain_id'] ?>, <?= $star ?>)" class="material-symbols-outlined text-[18px] cursor-pointer hover:scale-125 transition-transform" style="<?= $star <= $item['claimed_level'] ? "font-variation-settings: 'FILL' 1;" : "color: #74777f;" ?>">star</span>
                  <?php endfor; ?>
                </div>
                <span class="text-[11px] font-bold text-primary mt-0.5">Level <?= $item['claimed_level'] ?> / 5 (<?= $item['claimed_pct'] ?>%)</span>
              </div>
            </td>
            <td class="py-3 px-4 text-center">
              <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full font-label-sm text-label-sm font-bold <?= $diffBadge ?>">
                <?= $diffText ?>
              </span>
            </td>
            <td class="py-3 px-4 text-right">
              <?php if ($item['assessed_score'] < $item['benchmark_score']): ?>
                <a href="/SIH/pages/learning-path.php" class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg bg-secondary text-on-secondary font-label-sm text-label-sm font-bold hover:bg-secondary-container transition-colors">
                  <span class="material-symbols-outlined text-[16px]">school</span>
                  <span>Remediate</span>
                </a>
              <?php else: ?>
                <span class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg bg-surface-container text-primary font-label-sm text-label-sm font-bold">
                  <span class="material-symbols-outlined text-[16px] text-secondary">verified</span>
                  <span>NSSTA Certified</span>
                </span>
              <?php endif; ?>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- TAB PANE 2: SELF-DECLARED SKILLS CHECKLIST -->
<div id="tab-pane-self-declared" class="profile-tab-pane flex flex-col gap-space-lg" style="display: none;">

<!-- Scale Legend Bar -->
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm flex flex-wrap items-center justify-between gap-space-sm text-body-sm font-body-sm text-on-surface-variant">
<span class="font-label-md text-label-md text-on-surface font-bold flex items-center gap-1">
<span class="material-symbols-outlined text-[18px] text-secondary">tune</span>
          Proficiency Scale Benchmark:
        </span>
<div class="flex flex-wrap items-center gap-space-sm text-label-sm font-label-sm">
<span class="px-2 py-0.5 rounded bg-surface-container text-on-surface">1 - Fundamental</span>
<span class="px-2 py-0.5 rounded bg-surface-container text-on-surface">2 - Working</span>
<span class="px-2 py-0.5 rounded bg-surface-container text-on-surface">3 - Competent</span>
<span class="px-2 py-0.5 rounded bg-surface-container text-on-surface">4 - Advanced SME</span>
<span class="px-2 py-0.5 rounded bg-primary-container text-on-primary">5 - Master Mentor</span>
</div>
</div>
<!-- DOMAIN 1: STATISTICAL COMPETENCIES -->
<div class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex flex-col gap-space-md">
<div class="flex items-center justify-between pb-space-xs">
<div class="flex items-center gap-space-sm">
<div class="w-9 h-9 rounded-lg bg-primary flex items-center justify-center text-on-primary">
<span class="material-symbols-outlined text-[20px]">query_stats</span>
</div>
<div>
<h2 class="font-headline-sm text-headline-sm text-primary">Domain 1: Core Official Statistical Competencies</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant">Mandatory for National Accounts Division (NAD) &amp; Central Statistics Operations</p>
</div>
</div>
<span class="px-2.5 py-1 rounded-full text-label-sm font-label-sm bg-surface-container-low text-primary font-bold">
            4 of 4 Completed
          </span>
</div>
<!-- Competency Card: National Accounts (SNA 2008) -->
<div class="bg-surface rounded-xl p-space-md flex flex-col gap-space-sm transition-all hover:bg-surface-container-low">
<div class="flex flex-col md:flex-row md:items-center justify-between gap-space-sm">
<div class="min-w-0">
<div class="flex items-center gap-2">
<span class="font-label-lg text-label-lg text-primary font-bold">National Accounts (System of National Accounts - SNA 2008)</span>
<span class="px-2 py-0.5 rounded-full text-label-sm font-label-sm bg-surface-container-high text-primary font-semibold flex items-center gap-1">
<span class="material-symbols-outlined text-[14px] text-secondary">verified</span> NSSTA Audited
                </span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">Gross Domestic Product estimation, GVA at basic prices, and institutional sector accounts compilation.</p>
</div>
<div class="shrink-0 flex items-center gap-2">
<span class="font-label-md text-label-md text-primary font-bold">Level 5 / 5</span>
<span class="px-2 py-0.5 rounded text-label-sm font-label-sm bg-primary-container text-on-primary">Master Mentor</span>
</div>
</div>
<!-- Step Rating Bar Interactive -->
<div class="flex items-center gap-2 pt-1">
<span class="font-label-sm text-label-sm text-on-surface-variant w-24">Self-Rating:</span>
<div class="flex items-center gap-1">
<span class="material-symbols-outlined text-secondary text-[22px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-secondary text-[22px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-secondary text-[22px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-secondary text-[22px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-secondary text-[22px]" style="font-variation-settings: 'FILL' 1;">star</span>
</div>
<span class="font-body-sm text-body-sm text-on-surface-variant ml-2">Benchmark: 4/5 (Exceeds Cadre Norm)</span>
</div>
<!-- Evidence Attach Pill & Verification Record -->
<div class="flex flex-wrap items-center justify-between gap-space-sm pt-2 bg-surface-container-lowest p-2.5 rounded-lg">
<div class="flex items-center gap-2 text-label-sm font-label-sm text-on-surface">
<span class="material-symbols-outlined text-[18px] text-on-surface-variant">description</span>
<span class="font-semibold">Linked Dossier:</span>
<span class="text-secondary underline decoration-secondary cursor-pointer">MoSPI_NAD_Methodology_SNA2008_Rev4.pdf</span>
<span class="text-on-surface-variant">(Verified 12 Oct 2024 by ADG NAD)</span>
</div>
<button class="text-label-sm font-label-sm text-primary hover:text-secondary flex items-center gap-1 font-bold" type="button">
<span class="material-symbols-outlined text-[16px]">upload_file</span> Update Evidence
            </button>
</div>
</div>
<!-- Competency Card: Survey Sampling & UFS -->
<div class="bg-surface rounded-xl p-space-md flex flex-col gap-space-sm transition-all hover:bg-surface-container-low">
<div class="flex flex-col md:flex-row md:items-center justify-between gap-space-sm">
<div class="min-w-0">
<div class="flex items-center gap-2">
<span class="font-label-lg text-label-lg text-primary font-bold">Survey Sampling &amp; Urban Frame Survey (UFS)</span>
<span class="px-2 py-0.5 rounded-full text-label-sm font-label-sm bg-surface-container-high text-primary font-semibold flex items-center gap-1">
<span class="material-symbols-outlined text-[14px] text-secondary">verified</span> NSSTA Audited
                </span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">Stratified multi-stage design, PPSWR, post-stratification weighting, and NSS frame renewal protocols.</p>
</div>
<div class="shrink-0 flex items-center gap-2">
<span class="font-label-md text-label-md text-primary font-bold">Level 4 / 5</span>
<span class="px-2 py-0.5 rounded text-label-sm font-label-sm bg-surface-container text-on-surface">Advanced SME</span>
</div>
</div>
<div class="flex items-center gap-2 pt-1">
<span class="font-label-sm text-label-sm text-on-surface-variant w-24">Self-Rating:</span>
<div class="flex items-center gap-1">
<span class="material-symbols-outlined text-secondary text-[22px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-secondary text-[22px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-secondary text-[22px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-secondary text-[22px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-outline text-[22px]">star</span>
</div>
<span class="font-body-sm text-body-sm text-on-surface-variant ml-2">Benchmark: 4/5 (Meets Cadre Norm)</span>
</div>
<div class="flex flex-wrap items-center justify-between gap-space-sm pt-2 bg-surface-container-lowest p-2.5 rounded-lg">
<div class="flex items-center gap-2 text-label-sm font-label-sm text-on-surface">
<span class="material-symbols-outlined text-[18px] text-on-surface-variant">link</span>
<span class="font-semibold">Linked Dossier:</span>
<span class="text-secondary underline decoration-secondary cursor-pointer">PLFS_Field_Sampling_Manual_v3.pdf</span>
<span class="text-on-surface-variant">(NSSTA Ref #TPAC-2023-88)</span>
</div>
<button class="text-label-sm font-label-sm text-primary hover:text-secondary flex items-center gap-1 font-bold" type="button">
<span class="material-symbols-outlined text-[16px]">upload_file</span> Update Evidence
            </button>
</div>
</div>
<!-- Competency Card: Price Indices & Deflator Mechanics -->
<div class="bg-surface rounded-xl p-space-md flex flex-col gap-space-sm transition-all hover:bg-surface-container-low">
<div class="flex flex-col md:flex-row md:items-center justify-between gap-space-sm">
<div class="min-w-0">
<div class="flex items-center gap-2">
<span class="font-label-lg text-label-lg text-primary font-bold">Price Indices &amp; Deflator Mechanics (CPI / WPI)</span>
<span class="px-2 py-0.5 rounded-full text-label-sm font-label-sm bg-surface-container text-on-surface-variant font-semibold">
                  Self-Reported
                </span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">Hedonic adjustments, chain-linking index methodology, and quarterly constant-price deflator reconciliation.</p>
</div>
<div class="shrink-0 flex items-center gap-2">
<span class="font-label-md text-label-md text-primary font-bold">Level 4 / 5</span>
<span class="px-2 py-0.5 rounded text-label-sm font-label-sm bg-surface-container text-on-surface">Advanced SME</span>
</div>
</div>
<div class="flex items-center gap-2 pt-1">
<span class="font-label-sm text-label-sm text-on-surface-variant w-24">Self-Rating:</span>
<div class="flex items-center gap-1">
<span class="material-symbols-outlined text-secondary text-[22px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-secondary text-[22px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-secondary text-[22px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-secondary text-[22px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-outline text-[22px]">star</span>
</div>
<span class="font-body-sm text-body-sm text-on-surface-variant ml-2">Benchmark: 3/5 (Exceeds Cadre Norm)</span>
</div>
<div class="flex flex-wrap items-center justify-between gap-space-sm pt-2 bg-surface-container-lowest p-2.5 rounded-lg">
<div class="flex items-center gap-2 text-label-sm font-label-sm text-on-surface">
<span class="material-symbols-outlined text-[18px] text-on-surface-variant">upload</span>
<span class="font-semibold">Evidence:</span>
<span class="text-on-surface-variant italic">No publication bulletin linked yet</span>
</div>
<button class="text-label-sm font-label-sm text-secondary hover:underline flex items-center gap-1 font-bold" type="button">
<span class="material-symbols-outlined text-[16px]">add_circle</span> Attach Published Bulletin
            </button>
</div>
</div>
<!-- Competency Card: Supply-Use Tables (SUT) -->
<div class="bg-surface rounded-xl p-space-md flex flex-col gap-space-sm transition-all hover:bg-surface-container-low">
<div class="flex flex-col md:flex-row md:items-center justify-between gap-space-sm">
<div class="min-w-0">
<div class="flex items-center gap-2">
<span class="font-label-lg text-label-lg text-primary font-bold">Supply-Use Tables (SUT) &amp; Input-Output Matrix</span>
<span class="px-2 py-0.5 rounded-full text-label-sm font-label-sm bg-surface-container-high text-primary font-semibold flex items-center gap-1">
<span class="material-symbols-outlined text-[14px] text-secondary">verified</span> NSSTA Audited
                </span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">RAS matrix balancing technique, commodity flows, import matrices, and inter-industry linkages.</p>
</div>
<div class="shrink-0 flex items-center gap-2">
<span class="font-label-md text-label-md text-primary font-bold">Level 5 / 5</span>
<span class="px-2 py-0.5 rounded text-label-sm font-label-sm bg-primary-container text-on-primary">Master Mentor</span>
</div>
</div>
<div class="flex items-center gap-2 pt-1">
<span class="font-label-sm text-label-sm text-on-surface-variant w-24">Self-Rating:</span>
<div class="flex items-center gap-1">
<span class="material-symbols-outlined text-secondary text-[22px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-secondary text-[22px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-secondary text-[22px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-secondary text-[22px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-secondary text-[22px]" style="font-variation-settings: 'FILL' 1;">star</span>
</div>
<span class="font-body-sm text-body-sm text-on-surface-variant ml-2">Benchmark: 4/5 (Lead Resource Faculty)</span>
</div>
<div class="flex flex-wrap items-center justify-between gap-space-sm pt-2 bg-surface-container-lowest p-2.5 rounded-lg">
<div class="flex items-center gap-2 text-label-sm font-label-sm text-on-surface">
<span class="material-symbols-outlined text-[18px] text-on-surface-variant">menu_book</span>
<span class="font-semibold">Linked Dossier:</span>
<span class="text-secondary underline decoration-secondary cursor-pointer">SUT_2018-19_Benchmarking_Monograph.pdf</span>
</div>
<button class="text-label-sm font-label-sm text-primary hover:text-secondary flex items-center gap-1 font-bold" type="button">
<span class="material-symbols-outlined text-[16px]">upload_file</span> Update Evidence
            </button>
</div>
</div>
</div>
<!-- DOMAIN 2: TECHNICAL & MODERN TECH -->
<div class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex flex-col gap-space-md">
<div class="flex items-center justify-between pb-space-xs">
<div class="flex items-center gap-space-sm">
<div class="w-9 h-9 rounded-lg bg-primary-container flex items-center justify-center text-on-primary">
<span class="material-symbols-outlined text-[20px]">terminal</span>
</div>
<div>
<h2 class="font-headline-sm text-headline-sm text-primary">Domain 2: Modern Computational &amp; Statistical Tech</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant">Microdata handling, geospatial analytics, and sovereign machine learning</p>
</div>
</div>
<span class="px-2.5 py-1 rounded-full text-label-sm font-label-sm bg-error-container text-on-error-container font-bold">
            2 Deficits Flagged
          </span>
</div>
<!-- Competency: Python for Microdata -->
<div class="bg-surface rounded-xl p-space-md flex flex-col gap-space-sm">
<div class="flex flex-col md:flex-row md:items-center justify-between gap-space-sm">
<div>
<div class="flex items-center gap-2">
<span class="font-label-lg text-label-lg text-primary font-bold">Python for Official Survey Microdata (Pandas, Polars, DuckDB)</span>
<span class="px-2 py-0.5 rounded-full text-label-sm font-label-sm bg-surface-container text-on-surface-variant font-semibold">Self-Reported</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">Automated pipeline parsing of raw ASI / PLFS fixed-width and unit-level ASCII sets.</p>
</div>
<div class="shrink-0 flex items-center gap-2">
<span class="font-label-md text-label-md text-primary font-bold">Level 3 / 5</span>
<span class="px-2 py-0.5 rounded text-label-sm font-label-sm bg-surface-container text-on-surface">Competent</span>
</div>
</div>
<div class="flex items-center gap-2 pt-1">
<span class="font-label-sm text-label-sm text-on-surface-variant w-24">Self-Rating:</span>
<div class="flex items-center gap-1">
<span class="material-symbols-outlined text-secondary text-[22px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-secondary text-[22px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-secondary text-[22px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-outline text-[22px]">star</span>
<span class="material-symbols-outlined text-outline text-[22px]">star</span>
</div>
<span class="font-body-sm text-body-sm text-on-surface-variant ml-2">Benchmark: 3/5</span>
</div>
<div class="flex flex-wrap items-center justify-between gap-space-sm pt-2 bg-surface-container-lowest p-2.5 rounded-lg">
<div class="flex items-center gap-2 text-label-sm font-label-sm text-on-surface">
<span class="material-symbols-outlined text-[18px] text-on-surface-variant">code</span>
<span class="font-semibold">GitHub / NIC Repo:</span>
<span class="text-secondary underline decoration-secondary cursor-pointer">nic-gov/rsharma-plfs-micro-etl</span>
</div>
<button class="text-label-sm font-label-sm text-primary hover:text-secondary flex items-center gap-1 font-bold" type="button">
<span class="material-symbols-outlined text-[16px]">edit</span> Update Link
            </button>
</div>
</div>
<!-- Competency: R/Shiny Dashboards -->
<div class="bg-surface rounded-xl p-space-md flex flex-col gap-space-sm">
<div class="flex flex-col md:flex-row md:items-center justify-between gap-space-sm">
<div>
<div class="flex items-center gap-2">
<span class="font-label-lg text-label-lg text-primary font-bold">R/Shiny Production Dashboards (Tidyverse &amp; Data.table)</span>
<span class="px-2 py-0.5 rounded-full text-label-sm font-label-sm bg-surface-container text-on-surface-variant font-semibold">Self-Reported</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">Interactive dissemination dashboards for quarterly national accounts releases.</p>
</div>
<div class="shrink-0 flex items-center gap-2">
<span class="font-label-md text-label-md text-primary font-bold">Level 3 / 5</span>
<span class="px-2 py-0.5 rounded text-label-sm font-label-sm bg-surface-container text-on-surface">Competent</span>
</div>
</div>
<div class="flex items-center gap-2 pt-1">
<span class="font-label-sm text-label-sm text-on-surface-variant w-24">Self-Rating:</span>
<div class="flex items-center gap-1">
<span class="material-symbols-outlined text-secondary text-[22px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-secondary text-[22px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-secondary text-[22px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-outline text-[22px]">star</span>
<span class="material-symbols-outlined text-outline text-[22px]">star</span>
</div>
<span class="font-body-sm text-body-sm text-on-surface-variant ml-2">Benchmark: 3/5</span>
</div>
</div>
<!-- Deficit Competency: Spatial GIS / Bhuvan Mapping -->
<div class="bg-surface rounded-xl p-space-md flex flex-col gap-space-sm bg-error-container/20">
<div class="flex flex-col md:flex-row md:items-center justify-between gap-space-sm">
<div>
<div class="flex items-center gap-2">
<span class="font-label-lg text-label-lg text-primary font-bold">Spatial GIS / ISRO Bhuvan Geo-Statistical Layering</span>
<span class="px-2 py-0.5 rounded-full text-label-sm font-label-sm bg-error text-on-error font-bold">Deficit Flagged</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">Cadastral boundary reconciliation, remote-sensing crop estimation linkages, and shapefile geocoding.</p>
</div>
<div class="shrink-0 flex items-center gap-2">
<span class="font-label-md text-label-md text-error font-bold">Level 2 / 5 (Required: 4/5)</span>
<span class="px-2 py-0.5 rounded text-label-sm font-label-sm bg-surface-container text-on-surface">Working</span>
</div>
</div>
<div class="flex items-center gap-2 pt-1">
<span class="font-label-sm text-label-sm text-on-surface-variant w-24">Self-Rating:</span>
<div class="flex items-center gap-1">
<span class="material-symbols-outlined text-secondary text-[22px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-secondary text-[22px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-outline text-[22px]">star</span>
<span class="material-symbols-outlined text-outline text-[22px]">star</span>
<span class="material-symbols-outlined text-outline text-[22px]">star</span>
</div>
<span class="font-body-sm text-body-sm text-error font-semibold ml-2">Gap: -2 Levels for Senior Director Eligibility</span>
</div>
<div class="p-space-sm rounded-lg bg-surface-container-lowest flex items-center justify-between">
<div class="flex items-center gap-2 text-label-sm font-label-sm text-on-surface">
<span class="material-symbols-outlined text-[18px] text-secondary">school</span>
<span>Recommended Remediation: <strong>NSSTA 5-day Residential Course on Bhuvan Spatial Analytics (Jan 2025)</strong></span>
</div>
<button class="px-2.5 py-1 bg-secondary text-on-secondary rounded text-label-sm font-label-sm font-semibold hover:bg-on-secondary-container" type="button">
              Auto-Nominate
            </button>
</div>
</div>
<!-- Deficit Competency: ML Nowcasting -->
<div class="bg-surface rounded-xl p-space-md flex flex-col gap-space-sm bg-error-container/20">
<div class="flex flex-col md:flex-row md:items-center justify-between gap-space-sm">
<div>
<div class="flex items-center gap-2">
<span class="font-label-lg text-label-lg text-primary font-bold">Machine Learning Nowcasting for High-Frequency Indicators</span>
<span class="px-2 py-0.5 rounded-full text-label-sm font-label-sm bg-error text-on-error font-bold">Deficit Flagged</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">Dynamic Factor Models (DFM), Mixed-data sampling (MIDAS), and LSTM recurrent neural nets for GDP lead indicators.</p>
</div>
<div class="shrink-0 flex items-center gap-2">
<span class="font-label-md text-label-md text-error font-bold">Level 2 / 5 (Required: 3/5)</span>
<span class="px-2 py-0.5 rounded text-label-sm font-label-sm bg-surface-container text-on-surface">Working</span>
</div>
</div>
<div class="flex items-center gap-2 pt-1">
<span class="font-label-sm text-label-sm text-on-surface-variant w-24">Self-Rating:</span>
<div class="flex items-center gap-1">
<span class="material-symbols-outlined text-secondary text-[22px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-secondary text-[22px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-outline text-[22px]">star</span>
<span class="material-symbols-outlined text-outline text-[22px]">star</span>
<span class="material-symbols-outlined text-outline text-[22px]">star</span>
</div>
<span class="font-body-sm text-body-sm text-error font-semibold ml-2">Gap: -1 Level</span>
</div>
<div class="p-space-sm rounded-lg bg-surface-container-lowest flex items-center justify-between">
<div class="flex items-center gap-2 text-label-sm font-label-sm text-on-surface">
<span class="material-symbols-outlined text-[18px] text-secondary">play_lesson</span>
<span>Self-Paced Track: <strong>iGOT Module: Advanced Time-Series &amp; Nowcasting (12 hrs)</strong></span>
</div>
<button class="px-2.5 py-1 bg-primary text-on-primary rounded text-label-sm font-label-sm font-semibold hover:bg-primary-container" type="button">
              Start on iGOT
            </button>
</div>
</div>
<!-- Competency: SQL & Relational Databases -->
<div class="bg-surface rounded-xl p-space-md flex flex-col gap-space-sm">
<div class="flex flex-col md:flex-row md:items-center justify-between gap-space-sm">
<div>
<div class="flex items-center gap-2">
<span class="font-label-lg text-label-lg text-primary font-bold">SQL &amp; Relational Databases (PostgreSQL / Oracle MoSPI Cluster)</span>
<span class="px-2 py-0.5 rounded-full text-label-sm font-label-sm bg-surface-container-high text-primary font-semibold flex items-center gap-1">
<span class="material-symbols-outlined text-[14px] text-secondary">verified</span> NSSTA Audited
                </span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">Complex queries, indexed view materialization, and database partitioning for 500M+ record census tables.</p>
</div>
<div class="shrink-0 flex items-center gap-2">
<span class="font-label-md text-label-md text-primary font-bold">Level 4 / 5</span>
<span class="px-2 py-0.5 rounded text-label-sm font-label-sm bg-surface-container text-on-surface">Advanced SME</span>
</div>
</div>
<div class="flex items-center gap-2 pt-1">
<span class="font-label-sm text-label-sm text-on-surface-variant w-24">Self-Rating:</span>
<div class="flex items-center gap-1">
<span class="material-symbols-outlined text-secondary text-[22px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-secondary text-[22px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-secondary text-[22px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-secondary text-[22px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-outline text-[22px]">star</span>
</div>
<span class="font-body-sm text-body-sm text-on-surface-variant ml-2">Benchmark: 4/5</span>
</div>
</div>
</div>
<!-- DOMAIN 3: DIGITAL GOVERNANCE & DPI -->
<div class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex flex-col gap-space-md">
<div class="flex items-center justify-between pb-space-xs">
<div class="flex items-center gap-space-sm">
<div class="w-9 h-9 rounded-lg bg-tertiary-container flex items-center justify-center text-on-tertiary">
<span class="material-symbols-outlined text-[20px]">policy</span>
</div>
<div>
<h2 class="font-headline-sm text-headline-sm text-primary">Domain 3: Digital Governance &amp; Sovereign DPI</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant">Statutory compliance, sovereign cloud architecture, and open data interoperability</p>
</div>
</div>
<span class="px-2.5 py-1 rounded-full text-label-sm font-label-sm bg-surface-container text-primary font-bold">
            3 of 3 Declared
          </span>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-space-md">
<!-- Item 1: DPDPA 2023 -->
<div class="p-space-md rounded-xl bg-surface flex flex-col justify-between gap-space-sm">
<div>
<span class="font-label-md text-label-md text-primary font-bold block">DPDPA 2023 Compliance</span>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Anonymization, Differential Privacy, Data Fiduciary Protocols.</p>
</div>
<div class="pt-2">
<div class="flex items-center justify-between mb-1">
<span class="font-label-sm text-label-sm text-on-surface-variant">Level 3 / 5</span>
<span class="font-label-sm text-label-sm text-secondary font-bold">Competent</span>
</div>
<div class="w-full h-1.5 bg-surface-container-high rounded-full overflow-hidden">
<div class="h-full bg-secondary w-3/5"></div>
</div>
</div>
</div>
<!-- Item 2: NDAP Data Lake APIs -->
<div class="p-space-md rounded-xl bg-surface flex flex-col justify-between gap-space-sm">
<div>
<span class="font-label-md text-label-md text-primary font-bold block">NDAP Data Lake APIs</span>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">RESTful integrations with NITI Aayog's National Data and Analytics Platform.</p>
</div>
<div class="pt-2">
<div class="flex items-center justify-between mb-1">
<span class="font-label-sm text-label-sm text-on-surface-variant">Level 3 / 5</span>
<span class="font-label-sm text-label-sm text-secondary font-bold">Competent</span>
</div>
<div class="w-full h-1.5 bg-surface-container-high rounded-full overflow-hidden">
<div class="h-full bg-secondary w-3/5"></div>
</div>
</div>
</div>
<!-- Item 3: NIC Sovereign Cloud -->
<div class="p-space-md rounded-xl bg-surface flex flex-col justify-between gap-space-sm">
<div>
<span class="font-label-md text-label-md text-primary font-bold block">NIC Sovereign Cloud</span>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">MeghRaj security controls, MoSPI VM provisioning, air-gapped staging.</p>
</div>
<div class="pt-2">
<div class="flex items-center justify-between mb-1">
<span class="font-label-sm text-label-sm text-on-surface-variant">Level 4 / 5</span>
<span class="font-label-sm text-label-sm text-primary font-bold">Proficient</span>
</div>
<div class="w-full h-1.5 bg-surface-container-high rounded-full overflow-hidden">
<div class="h-full bg-primary w-4/5"></div>
</div>
</div>
</div>
</div>
</div>
<!-- DOMAIN 4: LEADERSHIP & FIELD ADMINISTRATION -->
<div class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex flex-col gap-space-md">
<div class="flex items-center justify-between pb-space-xs">
<div class="flex items-center gap-space-sm">
<div class="w-9 h-9 rounded-lg bg-secondary-container flex items-center justify-center text-on-secondary">
<span class="material-symbols-outlined text-[20px]">groups</span>
</div>
<div>
<h2 class="font-headline-sm text-headline-sm text-primary">Domain 4: Field Administration &amp; Cadre Leadership</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant">NSS field supervision, regional office inspections, and probationer mentoring</p>
</div>
</div>
<span class="px-2.5 py-1 rounded-full text-label-sm font-label-sm bg-surface-container-high text-primary font-bold">
            2 of 2 Verified
          </span>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-space-md">
<!-- Item 1 -->
<div class="bg-surface rounded-xl p-space-md flex flex-col justify-between gap-space-sm">
<div>
<div class="flex items-center justify-between">
<span class="font-label-lg text-label-lg text-primary font-bold">NSS Field Operations Supervision</span>
<span class="px-2 py-0.5 rounded text-label-sm font-label-sm bg-primary-container text-on-primary">Master Mentor (5/5)</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-2">
                Directed multi-state field inspection rosters across Western Zone (Maharashtra &amp; Goa). Supervised 140+ Field Investigators.
              </p>
</div>
<div class="pt-2 flex items-center justify-between text-label-sm font-label-sm text-on-surface-variant border-t-0 bg-surface-container-lowest p-2 rounded">
<span>Verified: Regional Office Pune Dossier</span>
<span class="material-symbols-outlined text-[16px] text-secondary">verified</span>
</div>
</div>
<!-- Item 2 -->
<div class="bg-surface rounded-xl p-space-md flex flex-col justify-between gap-space-sm">
<div>
<div class="flex items-center justify-between">
<span class="font-label-lg text-label-lg text-primary font-bold">Cadre Mentorship &amp; TPAC Faculty</span>
<span class="px-2 py-0.5 rounded text-label-sm font-label-sm bg-surface-container text-on-surface">Advanced SME (4/5)</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-2">
                Lead instructor for 45 ISS Probationers (Batches 44 &amp; 45) in National Accounting Mechanics at NSSTA Greater Noida.
              </p>
</div>
<div class="pt-2 flex items-center justify-between text-label-sm font-label-sm text-on-surface-variant border-t-0 bg-surface-container-lowest p-2 rounded">
<span>Verified: NSSTA Dean Office Record</span>
<span class="material-symbols-outlined text-[16px] text-secondary">verified</span>
</div>
</div>
</div>
</div>
</div> <!-- End tab-pane-self-declared -->
</div>
<!-- Right Rail 4 Columns: Profile Completeness, Gap Diagnostics, & Cadre Promotion Readiness -->
<div class="lg:col-span-4 flex flex-col gap-space-lg">
<!-- Card: Profile Completeness & Audit -->
<div class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex flex-col gap-space-md">
<div class="flex items-center justify-between">
<h3 class="font-headline-sm text-headline-sm text-primary">Dossier Completeness</h3>
<span class="material-symbols-outlined text-[20px] text-secondary">fact_check</span>
</div>
<!-- Donut / Arc Progress Meter Representation -->
<div class="p-space-md bg-surface rounded-xl flex items-center gap-space-md">
<div class="relative w-24 h-24 shrink-0 flex items-center justify-center">
<!-- Inline SVG Gauge Chart -->
<svg class="w-full h-full transform -rotate-90" viewbox="0 0 36 36">
<path class="text-surface-container-high" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-width="3.5"></path>
<path class="text-secondary" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-dasharray="78, 100" stroke-linecap="round" stroke-width="3.5"></path>
</svg>
<div class="absolute inset-0 flex flex-col items-center justify-center">
<span class="font-headline-md text-headline-md text-primary font-bold">78%</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Overall</span>
</div>
</div>
<div class="min-w-0">
<div class="font-label-md text-label-md text-on-surface font-bold">Audit Status: Pending Attachments</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">11 Competencies Audited by NSSTA. 3 Pending peer validation.</p>
</div>
</div>
<!-- Cadre Promotion Readiness Block -->
<div class="p-space-md rounded-xl bg-surface-container-low flex flex-col gap-space-xs">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Promotion Readiness</span>
<span class="px-2 py-0.5 rounded text-label-sm font-label-sm bg-surface-container-high text-primary font-bold">Grade 14 Selection</span>
</div>
<div class="font-label-md text-label-md text-primary font-bold mt-1">Senior Director Promotion Track</div>
<p class="font-body-sm text-body-sm text-error font-medium">
            Missing 2 mandatory micro-certifications: Spatial GIS Bhuvan and ML Nowcasting.
          </p>
<div class="w-full bg-surface-container-highest h-2 rounded-full mt-1 overflow-hidden">
<div class="bg-secondary h-full rounded-full" style="width: 70%"></div>
</div>
</div>
<!-- Mandatory Refresher Calendar Date -->
<div class="flex items-center gap-space-sm p-space-sm rounded-lg bg-surface">
<span class="material-symbols-outlined text-secondary text-[24px]">event_repeat</span>
<div class="min-w-0">
<div class="font-label-sm text-label-sm text-on-surface-variant">Next Mandatory NSSTA Refresher</div>
<div class="font-label-md text-label-md text-primary font-bold">November 2025 (Residential)</div>
</div>
</div>
<button class="w-full py-2.5 rounded-lg bg-primary text-on-primary font-label-md text-label-md font-bold hover:bg-primary-container transition-colors flex items-center justify-center gap-2" type="button">
<span class="material-symbols-outlined text-[18px]">rule</span>
<span>Run DPC Pre-Screening Audit</span>
</button>
</div>
<!-- Card: Institutional Endorsements Log -->
<div class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex flex-col gap-space-md">
<h3 class="font-headline-sm text-headline-sm text-primary">NSSTA Verification Trail</h3>
<div class="space-y-space-sm">
<!-- Trail Item 1 -->
<div class="flex gap-space-sm">
<div class="flex flex-col items-center">
<span class="w-2.5 h-2.5 rounded-full bg-primary mt-1.5"></span>
<span class="w-0.5 h-full bg-surface-container-high"></span>
</div>
<div class="min-w-0 pb-3">
<div class="font-label-sm text-label-sm text-primary font-bold">SNA 2008 &amp; SUT Framework Verified</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">Validated by Dr. P. K. Ghosh, DDG (NAD) via e-Office</div>
<div class="font-label-sm text-label-sm text-on-surface-variant/80 mt-0.5">14 Oct 2024 • 11:20 IST</div>
</div>
</div>
<!-- Trail Item 2 -->
<div class="flex gap-space-sm">
<div class="flex flex-col items-center">
<span class="w-2.5 h-2.5 rounded-full bg-primary mt-1.5"></span>
<span class="w-0.5 h-full bg-surface-container-high"></span>
</div>
<div class="min-w-0 pb-3">
<div class="font-label-sm text-label-sm text-primary font-bold">Survey Sampling Monograph Endorsed</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">Auto-ingested from NSSTA TPAC Portal #TPAC-2023-88</div>
<div class="font-label-sm text-label-sm text-on-surface-variant/80 mt-0.5">02 Aug 2024 • 16:45 IST</div>
</div>
</div>
<!-- Trail Item 3 -->
<div class="flex gap-space-sm">
<div class="flex flex-col items-center">
<span class="w-2.5 h-2.5 rounded-full bg-secondary-container mt-1.5"></span>
</div>
<div class="min-w-0">
<div class="font-label-sm text-label-sm text-secondary font-bold">Self-Declaration Submitted for Review</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">Dr. Rajesh Sharma updated Python &amp; DPDPA competencies</div>
<div class="font-label-sm text-label-sm text-on-surface-variant/80 mt-0.5">Today • 09:12 IST</div>
</div>
</div>
</div>
</div>
<!-- Institutional Notice Box -->
<div class="bg-surface-container-low rounded-xl p-space-md flex flex-col gap-2">
<div class="flex items-center gap-2 text-primary font-label-md text-label-md font-bold">
<span class="material-symbols-outlined text-[18px]">verified</span>
<span>DOPT Rule 12(A) Governance</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
          Competency declarations are legally binding cadre records under the Indian Statistical Service Rules. Exaggerated proficiencies may result in de-panelment from specialized UN/IMF statistical missions.
        </p>
</div>
</div>
</div>
</div></main><footer class="w-full bg-surface-container-low text-on-surface-variant py-space-md px-space-lg mt-space-lg"><div class="flex flex-col md:flex-row items-center justify-between gap-space-sm text-body-sm font-body-sm"><span>Gap2Grow Cadre Portal • National Statistical Systems Training Academy (NSSTA) • MoSPI</span><span>GIGW-3.0 Compliant • NIC Gateway Secure Node</span></div></footer></div><script>
function switchProfileTab(tab) {
    document.querySelectorAll('.profile-tab-btn').forEach(b => {
        b.classList.remove('bg-primary', 'text-on-primary', 'shadow-sm', 'active');
        b.classList.add('text-on-surface');
    });
    const activeBtn = document.getElementById('tab-btn-' + tab);
    if (activeBtn) {
        activeBtn.classList.add('bg-primary', 'text-on-primary', 'shadow-sm', 'active');
        activeBtn.classList.remove('text-on-surface');
    }
    const sideBySidePane = document.getElementById('tab-pane-side-by-side');
    const selfDeclaredPane = document.getElementById('tab-pane-self-declared');
    if (tab === 'side-by-side') {
        if (sideBySidePane) sideBySidePane.style.display = 'flex';
        if (selfDeclaredPane) selfDeclaredPane.style.display = 'none';
    } else if (tab === 'self-declared') {
        if (sideBySidePane) sideBySidePane.style.display = 'none';
        if (selfDeclaredPane) selfDeclaredPane.style.display = 'flex';
    }
}

async function updateSkillLevel(skillName, domainId, level) {
    try {
        const res = await fetch('<?= BASE_URL ?>/api/self-declared.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({skill_name: skillName, domain_id: domainId, claimed_level: level})
        });
        const data = await res.json();
        if (data.status === 'success') {
            alert('Self-declaration updated: ' + skillName + ' set to Level ' + level + ' / 5.\nLogged to MoSPI Verification Audit Trail.');
            location.reload();
        }
    } catch(e) {
        console.error(e);
    }
}
</script>
</body></html>
