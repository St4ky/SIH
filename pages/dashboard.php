<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';

requireLogin();
$user = currentUser();
$userId = (int)$user['id'];

// 1. Overall Competency Score (average current_score)
$stmt = $pdo->prepare('SELECT ROUND(AVG(current_score), 0) as avg_score FROM skill_gaps WHERE user_id = ?');
$stmt->execute([$userId]);
$overallScore = (int)($stmt->fetchColumn() ?: 74);

// Cadre Average benchmark
$cadreAvg = 68;

// 2. Priority Skill Gaps Count
$stmt = $pdo->prepare("SELECT COUNT(*) FROM skill_gaps WHERE user_id = ? AND priority = 'high'");
$stmt->execute([$userId]);
$priorityGapCount = (int)$stmt->fetchColumn();

// 3. Mandatory Training Hours
$mandatoryHoursMet = 38;
$mandatoryHoursTotal = 60;

// 4. Active Nominations & Certifications
$stmt = $pdo->prepare("SELECT COUNT(*) FROM nominations WHERE user_id = ? AND status = 'pending'");
$stmt->execute([$userId]);
$activeNominations = (int)$stmt->fetchColumn();

$stmt = $pdo->prepare('SELECT COUNT(*) FROM certifications WHERE user_id = ?');
$stmt->execute([$userId]);
$certCount = (int)$stmt->fetchColumn();

// 5. Latest Assessment Score
$stmt = $pdo->prepare('SELECT final_score FROM diagnostic_sessions WHERE user_id = ? AND completed_at IS NOT NULL ORDER BY completed_at DESC LIMIT 1');
$stmt->execute([$userId]);
$latestScore = $stmt->fetchColumn();
$latestScoreVal = ($latestScore !== false && $latestScore !== null) ? $latestScore : 86;
?>
<!DOCTYPE html>

<html lang="en"><head><meta charset="utf-8"/><meta content="width=device-width, initial-scale=1.0" name="viewport"/><meta content="web_dashboard" name="shell-type"/><link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/><link href="https://fonts.googleapis.com" rel="preconnect"/><link href="https://fonts.gstatic.com" rel="preconnect"/><link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/><style>@layer base{html,body{margin:0;padding:0;}body{overscroll-behavior:none;}main>:first-child{margin-top:0!important;}main>:last-child{margin-bottom:0!important;}}::-webkit-scrollbar{display:none;}</style><script src="https://cdn.tailwindcss.com"></script><script id="tailwind-config">tailwind.config={darkMode:"class",theme:{extend:{"colors":{"surface-container-lowest":"#ffffff","surface":"#f8f9ff","primary-fixed":"#d5e3ff","secondary-container":"#fc6018","surface-tint":"#495f82","on-background":"#0d1c2f","on-tertiary-fixed":"#00164e","error":"#ba1a1a","on-surface":"#0d1c2f","tertiary-fixed":"#dce1ff","surface-container-highest":"#d5e3fd","on-tertiary":"#ffffff","tertiary-container":"#001e63","on-tertiary-container":"#7088dc","primary":"#001026","surface-container":"#e6eeff","on-surface-variant":"#44474e","background":"#f8f9ff","on-secondary-fixed-variant":"#802a00","on-primary":"#ffffff","tertiary-fixed-dim":"#b6c4ff","secondary":"#a83900","inverse-on-surface":"#ebf1ff","tertiary":"#000c34","on-primary-container":"#778db2","primary-container":"#0b2545","surface-dim":"#ccdbf4","on-primary-fixed":"#001c3b","on-secondary-fixed":"#380d00","inverse-primary":"#b1c7f0","error-container":"#ffdad6","on-error-container":"#93000a","inverse-surface":"#233144","on-tertiary-fixed-variant":"#264191","secondary-fixed":"#ffdbcf","outline":"#74777f","on-primary-fixed-variant":"#314769","on-error":"#ffffff","surface-container-low":"#eff4ff","secondary-fixed-dim":"#ffb59a","surface-variant":"#d5e3fd","on-secondary-container":"#531800","on-secondary":"#ffffff","surface-container-high":"#dde9ff","outline-variant":"#c4c6cf","surface-bright":"#f8f9ff","primary-fixed-dim":"#b1c7f0"},"borderRadius":{"DEFAULT":"0.125rem","lg":"0.25rem","xl":"0.5rem","full":"0.75rem"},"spacing":{"gutter-mobile":"0.75rem","margin-mobile":"1rem","space-lg":"1.5rem","space-sm":"0.5rem","gutter":"1.5rem","space-md":"1rem","space-xs":"0.25rem","margin":"2rem","space-xl":"2.5rem"},"fontFamily":{"label-lg":["Public Sans"],"label-md":["Public Sans"],"body-lg":["Public Sans"],"body-md":["Public Sans"],"headline-lg":["Public Sans"],"headline-xl":["Public Sans"],"headline-lg-mobile":["Public Sans"],"label-sm":["Public Sans"],"headline-md":["Public Sans"],"body-sm":["Public Sans"],"headline-sm":["Public Sans"],"headline-xl-mobile":["Public Sans"]},"fontSize":{"label-lg":["14px",{"lineHeight":"20px","letterSpacing":"0.01em","fontWeight":"600"}],"label-md":["12px",{"lineHeight":"16px","letterSpacing":"0.02em","fontWeight":"600"}],"body-lg":["16px",{"lineHeight":"24px","fontWeight":"400"}],"body-md":["14px",{"lineHeight":"20px","fontWeight":"400"}],"headline-lg":["28px",{"lineHeight":"36px","letterSpacing":"-0.01em","fontWeight":"700"}],"headline-xl":["36px",{"lineHeight":"44px","letterSpacing":"-0.02em","fontWeight":"700"}],"headline-lg-mobile":["22px",{"lineHeight":"30px","letterSpacing":"0em","fontWeight":"700"}],"label-sm":["11px",{"lineHeight":"14px","letterSpacing":"0.03em","fontWeight":"600"}],"headline-md":["22px",{"lineHeight":"28px","fontWeight":"600"}],"body-sm":["12px",{"lineHeight":"18px","fontWeight":"400"}],"headline-sm":["18px",{"lineHeight":"24px","fontWeight":"600"}],"headline-xl-mobile":["28px",{"lineHeight":"36px","letterSpacing":"-0.01em","fontWeight":"700"}]}}}}</script></head><body class="bg-surface font-body-md text-body-md text-on-surface antialiased"><aside class="fixed left-0 top-0 h-full w-72 bg-primary-container text-on-primary z-50 flex flex-col justify-between shadow-[0_4px_20px_rgba(11,37,69,0.25)]"><div class="flex flex-col"><div class="px-space-md py-space-sm bg-primary flex items-center justify-between"><div class="flex items-center gap-space-xs"><span class="material-symbols-outlined text-secondary-container text-[20px]">verified</span><span class="font-label-sm text-label-sm tracking-wide text-primary-fixed">GIGW 3.0 | iGOT Live</span></div><span class="w-2 h-2 rounded-full bg-secondary-container animate-pulse"></span></div><div class="p-space-md bg-tertiary-container"><div class="flex items-center gap-space-sm"><div class="w-11 h-11 rounded-full bg-primary flex items-center justify-center"><span class="material-symbols-outlined text-on-primary text-[24px]">person</span></div><div class="min-w-0 flex-1"><div class="font-label-lg text-label-lg text-on-tertiary truncate">Dr. Rajesh Sharma, ISS</div><div class="font-body-sm text-body-sm text-on-tertiary-container truncate">Joint Director, NAD (CSO)</div></div></div><div class="mt-space-sm pt-space-xs flex items-center justify-between text-label-sm font-label-sm"><span class="bg-secondary text-on-secondary px-2 py-0.5 rounded">ISS Cadre</span><span class="text-primary-fixed truncate">ID: ISS-2008-0412</span></div></div><nav class="px-space-sm py-space-md space-y-1 flex flex-col" data-active-classes="bg-primary text-on-primary font-bold"><a aria-current="page" class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg transition-colors bg-primary text-on-primary font-bold" data-path="learner-dashboard" href="<?= BASE_URL ?>/pages/dashboard.php"><span class="material-symbols-outlined text-[20px]">space_dashboard</span><span>Learner Dashboard</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="skill-gap-analysis" href="<?= BASE_URL ?>/pages/skill-gap.php"><span class="material-symbols-outlined text-[20px]">monitoring</span><span>Skill-Gap Analysis</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="my-learning-path" href="<?= BASE_URL ?>/pages/learning-path.php"><span class="material-symbols-outlined text-[20px]">route</span><span>My Learning Path</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="ai-assessment-generator" href="<?= BASE_URL ?>/pages/assessment-generator.php"><span class="material-symbols-outlined text-[20px]">psychology</span><span>AI Assessment Generator</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="igot-course-catalog" href="<?= BASE_URL ?>/pages/igot-courses.php"><span class="material-symbols-outlined text-[20px]">menu_book</span><span>iGOT Course Catalog</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="nssta-tpac-nominations" href="<?= BASE_URL ?>/pages/nssta-programmes.php"><span class="material-symbols-outlined text-[20px]">assignment_ind</span><span>NSSTA TPAC Nominations</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="cadre-analytics" href="<?= BASE_URL ?>/pages/cadre-analytics.php"><span class="material-symbols-outlined text-[20px]">analytics</span><span>Cadre Analytics</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="settings-profile" href="<?= BASE_URL ?>/pages/settings.php"><span class="material-symbols-outlined text-[20px]">manage_accounts</span><span>Settings &amp; Profile</span></a></nav></div><div class="p-space-md bg-tertiary text-on-tertiary"><div class="text-label-sm font-label-sm text-tertiary-fixed-dim uppercase tracking-wider mb-space-xs">Sync Status</div><div class="space-y-1 text-label-sm font-label-sm mb-space-md"><div class="flex items-center justify-between text-on-tertiary"><span>iGOT Karmayogi API</span><span class="text-secondary-fixed">v2.4 Live</span></div><div class="flex items-center justify-between text-on-tertiary"><span>SPARROW / e-HRMS</span><span class="text-secondary-fixed">Active</span></div></div><div class="flex items-center justify-between pt-space-xs"><a class="flex items-center gap-space-xs text-secondary-fixed hover:text-on-tertiary text-label-sm font-label-sm" href="<?= BASE_URL ?>/logout.php"><span class="material-symbols-outlined text-[16px]">logout</span><span>Sign Out</span></a><span class="text-tertiary-fixed-dim text-label-sm font-label-sm">NSSTA-ISS</span></div></div></aside><div class="pl-72"><header class="fixed top-0 left-72 right-0 h-16 bg-surface-container-lowest/90 backdrop-blur-md shadow-[0_1px_8px_rgba(11,37,69,0.06)] z-40 flex items-center justify-between px-space-lg"><div class="flex items-center gap-space-sm text-body-sm font-body-sm text-on-surface-variant"><span>भारत सरकार | MoSPI Official Statistical Cadre Intelligence</span></div><div class="flex items-center gap-space-md"><div class="flex items-center gap-space-xs bg-surface-container-low px-space-sm py-1 rounded-full text-label-sm font-label-sm text-on-surface"><span class="w-2 h-2 rounded-full bg-secondary"></span><span>NAD Division</span></div><div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center"><span class="material-symbols-outlined text-on-primary text-[18px]">person</span></div></div></header><main class="relative pt-16 w-full px-space-lg bg-surface min-h-[calc(100vh-64px)]"><div class="flex flex-col w-full pb-space-xl">
<!-- Sovereign Identity & Executive Meta Strip -->
<section class="relative w-full rounded-xl bg-surface-container-lowest shadow-sm p-space-lg mb-space-lg overflow-hidden">
<div class="absolute -right-16 -top-16 w-80 h-80 bg-gradient-to-br from-primary-fixed/20 via-surface-container to-transparent rounded-full pointer-events-none blur-2xl"></div>
<div class="relative z-10 flex flex-col xl:flex-row items-start xl:items-center justify-between gap-space-md">
<div class="flex flex-col md:flex-row items-start md:items-center gap-space-md min-w-0">
<div class="relative flex-shrink-0">
<img class="w-20 h-20 rounded-xl object-cover shadow-sm bg-surface-container-high" data-alt="Official portrait photograph of Dr. Rajesh Sharma, an esteemed Indian Statistical Service senior executive officer in navy formal suit with Ashok Stambh civil lapel pin, neutral studio lighting, sharp dignified government bureaucrat aesthetic" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA5V_SPwQDa13sheHfFfVclizEOJGMGFiKxW94D4BWUtTrN4cgolMSkCT5RCE3XMqMr0MS7x11qV_BqYILzlpV0Klu_ESPjI2966CAWLTutWTAMjaKabmpu2nSH7LmehlSClvvzyABrDcfSPXbFnOphG0F2xQ_Q3Jjqjt7zCEy_ihQh82a1tDZVuM_TIIovYx8vVJsWjuXkK1QZLKLlkXbMNVyR939Xm2fK-HuqxiRl7jBX26f5f9-8"/>
<span class="absolute -bottom-1 -right-1 bg-secondary text-on-secondary text-[10px] font-bold px-1.5 py-0.5 rounded shadow-sm">ISS '08</span>
</div>
<div class="flex flex-col min-w-0">
<div class="flex flex-wrap items-center gap-space-xs">
<span class="font-headline-lg text-headline-lg text-primary tracking-tight">Dr. Rajesh Sharma, ISS</span>
<span class="bg-surface-container-high text-primary font-label-sm text-label-sm px-2.5 py-0.5 rounded-full flex items-center gap-1">
<span class="material-symbols-outlined text-[14px] text-secondary">verified_user</span>
              MoSPI-ISS-0482
            </span>
<span class="bg-primary-fixed text-on-primary-fixed font-label-sm text-label-sm px-2 py-0.5 rounded">GIGW 3.0 Verified</span>
</div>
<p class="font-body-md text-body-md text-on-surface-variant mt-0.5">
            Joint Director • National Accounts Division (NAD), Central Statistics Office, Sardar Patel Bhawan, New Delhi
          </p>
<div class="flex flex-wrap items-center gap-x-space-md gap-y-1 font-body-sm text-body-sm text-on-surface-variant/80 mt-2">
<span class="flex items-center gap-1"><span class="material-symbols-outlined text-[15px]">domain</span>SNA Revision Taskforce (2025 Base)</span>
<span class="flex items-center gap-1"><span class="material-symbols-outlined text-[15px]">badge</span>Cadre Status: Confirmed Regular</span>
<span class="flex items-center gap-1"><span class="material-symbols-outlined text-[15px]">schedule</span>DoPT Mandate Cycle: FY 2024–25</span>
</div>
</div>
</div>
<div class="flex flex-wrap items-center gap-space-sm w-full xl:w-auto mt-2 xl:mt-0">
<button onclick="window.location.href='<?= BASE_URL ?>/api/export-csv.php'" class="flex-1 xl:flex-none flex items-center justify-center gap-space-xs bg-surface-container-high text-primary hover:bg-surface-container-highest px-space-md py-2.5 rounded text-label-md font-label-md transition-all shadow-sm">
<span class="material-symbols-outlined text-[18px]">download_for_offline</span>
<span>Download Competency Passport (PDF)</span>
</button>
<button onclick="window.location.href='<?= BASE_URL ?>/pages/take-assessment.php'" class="flex-1 xl:flex-none flex items-center justify-center gap-space-xs bg-secondary-container text-on-primary hover:opacity-95 px-space-md py-2.5 rounded text-label-md font-label-md transition-all shadow-sm">
<span class="material-symbols-outlined text-[18px]">bolt</span>
<span>Take Diagnostic Assessment</span>
</button>
</div>
</div>
</section>
<!-- Top Summary KPI Matrix -->
<section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-space-md mb-space-lg">
<!-- KPI 1 -->
<div class="bg-surface-container-lowest p-space-md rounded-xl shadow-sm flex flex-col justify-between">
<div class="flex items-center justify-between">
<span class="text-label-sm font-label-sm text-on-surface-variant tracking-wider uppercase">Overall Competency</span>
<span class="material-symbols-outlined text-primary-container text-[20px]">equalizer</span>
</div>
<div class="my-space-sm flex items-baseline gap-2">
<span class="text-headline-xl font-headline-xl text-primary leading-none">74</span>
<span class="text-body-sm font-body-sm text-on-surface-variant">/ 100</span>
</div>
<div class="flex items-center justify-between text-label-sm font-label-sm">
<span class="text-secondary font-bold flex items-center gap-0.5">
<span class="material-symbols-outlined text-[14px]">arrow_upward</span>+6% Q-o-Q
        </span>
<span class="text-on-surface-variant/80">Cadre Avg: 68</span>
</div>
</div>
<!-- KPI 2 -->
<div class="bg-surface-container-lowest p-space-md rounded-xl shadow-sm flex flex-col justify-between">
<div class="flex items-center justify-between">
<span class="text-label-sm font-label-sm text-on-surface-variant tracking-wider uppercase">Priority Skill Gaps</span>
<span class="material-symbols-outlined text-secondary-container text-[20px]">warning</span>
</div>
<div class="my-space-sm flex items-baseline gap-2">
<span class="text-headline-xl font-headline-xl text-secondary leading-none">04</span>
<span class="text-label-md font-label-md text-error bg-error-container/40 px-2 py-0.5 rounded">2 Urgent</span>
</div>
<div class="text-body-sm font-body-sm text-on-surface-variant truncate">
        Flagged for 80th NSS Round
      </div>
</div>
<!-- KPI 3 -->
<div class="bg-surface-container-lowest p-space-md rounded-xl shadow-sm flex flex-col justify-between">
<div class="flex items-center justify-between">
<span class="text-label-sm font-label-sm text-on-surface-variant tracking-wider uppercase">Mandatory Training</span>
<span class="material-symbols-outlined text-primary-container text-[20px]">timelapse</span>
</div>
<div class="my-space-sm flex items-baseline gap-1.5">
<span class="text-headline-xl font-headline-xl text-primary leading-none">38</span>
<span class="text-body-md font-body-md text-on-surface-variant">/ 60 hrs</span>
</div>
<div class="flex items-center justify-between text-body-sm font-body-sm">
<div class="w-24 h-1.5 bg-surface-container-high rounded-full overflow-hidden">
<div class="h-full bg-primary-container rounded-full" style="width: 63%"></div>
</div>
<span class="font-label-sm text-label-sm text-primary font-bold">63% Met</span>
</div>
</div>
<!-- KPI 4 -->
<div class="bg-surface-container-lowest p-space-md rounded-xl shadow-sm flex flex-col justify-between">
<div class="flex items-center justify-between">
<span class="text-label-sm font-label-sm text-on-surface-variant tracking-wider uppercase">iGOT &amp; NSSTA Roster</span>
<span class="material-symbols-outlined text-primary text-[20px]">school</span>
</div>
<div class="my-space-sm flex items-center gap-2">
<span class="text-headline-xl font-headline-xl text-primary leading-none">02</span>
<span class="text-body-sm font-body-sm text-on-surface-variant">Active</span>
<span class="text-body-md font-body-md text-on-surface-variant/40">|</span>
<span class="text-headline-lg font-headline-lg text-on-surface leading-none">05</span>
<span class="text-body-sm font-body-sm text-on-surface-variant">Cert.</span>
</div>
<div class="text-body-sm font-body-sm text-on-surface-variant flex items-center gap-1 truncate">
<span class="w-2 h-2 rounded-full bg-secondary-container"></span>
<span>Oct 14 @ NSSTA Noida</span>
</div>
</div>
<!-- KPI 5 -->
<div class="bg-surface-container-lowest p-space-md rounded-xl shadow-sm flex flex-col justify-between">
<div class="flex items-center justify-between">
<span class="text-label-sm font-label-sm text-on-surface-variant tracking-wider uppercase">Latest Assessment</span>
<span class="material-symbols-outlined text-secondary text-[20px]">workspace_premium</span>
</div>
<div class="my-space-sm flex items-baseline gap-2">
<span class="text-headline-xl font-headline-xl text-primary leading-none">86%</span>
<span class="text-label-sm font-label-sm bg-surface-container text-primary font-bold px-2 py-0.5 rounded">Exemplary</span>
</div>
<div class="text-body-sm font-body-sm text-on-surface-variant truncate">
        SNA 2008 &amp; Supply-Use Tables
      </div>
</div>
</section>
<!-- Main Grid Workspace: Left (Primary Cadre Architecture) + Right (AI Copilot & Toolkits) -->
<div class="grid grid-cols-1 xl:grid-cols-12 gap-space-lg items-start">
<!-- Left Column (8 cols): Competencies, Interventions, Programs, Growth -->
<div class="xl:col-span-8 flex flex-col gap-space-lg min-w-0">
<!-- Cadre Competency Architecture & Matrix -->
<section class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm">
<div class="flex flex-col sm:flex-row sm:items-center justify-between pb-space-md gap-2">
<div>
<div class="flex items-center gap-space-xs">
<span class="text-label-sm font-label-sm uppercase tracking-wider text-secondary font-bold">Official Standard</span>
<span class="text-body-sm font-body-sm text-on-surface-variant">• DoPT ISS Role Matrix 2024</span>
</div>
<h2 class="text-headline-md font-headline-md text-primary mt-0.5">Cadre Competency Architecture &amp; Benchmark</h2>
</div>
<div class="flex items-center gap-space-md text-label-sm font-label-sm text-on-surface-variant">
<span class="flex items-center gap-1.5"><span class="w-3 h-3 rounded-sm bg-primary"></span>Current Level</span>
<span class="flex items-center gap-1.5"><span class="w-1.5 h-3 rounded-sm bg-secondary"></span>ISS Cadre Target</span>
</div>
</div>
<div class="space-y-space-md mt-space-sm">
<!-- Domain 1 -->
<div class="bg-surface-container-low p-space-md rounded-lg">
<div class="flex items-center justify-between mb-space-xs">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-[20px]">analytics</span>
<span class="font-headline-sm text-headline-sm text-primary">Statistical &amp; Economic Competencies</span>
</div>
<div class="flex items-center gap-2">
<span class="text-label-md font-label-md text-primary bg-surface-container-lowest px-2.5 py-0.5 rounded shadow-sm">Overall: 84%</span>
<span class="text-label-sm font-label-sm text-on-surface-variant">Benchmark: 80%</span>
</div>
</div>
<div class="w-full bg-surface-container-high h-2 rounded-full overflow-hidden mb-space-sm relative">
<div class="bg-primary h-full rounded-full" style="width: 84%;"></div>
<div class="absolute top-0 bottom-0 w-1 bg-secondary" style="left: 80%;" title="Cadre Target 80%"></div>
</div>
<div class="grid grid-cols-2 sm:grid-cols-4 gap-space-sm pt-space-xs">
<div class="bg-surface-container-lowest p-2 rounded">
<div class="text-body-sm font-body-sm text-on-surface-variant">National Accounts</div>
<div class="font-label-lg text-label-lg text-primary mt-0.5 flex items-center justify-between">
<span>92%</span>
<span class="text-[11px] font-bold text-secondary font-label-sm">+12%</span>
</div>
</div>
<div class="bg-surface-container-lowest p-2 rounded">
<div class="text-body-sm font-body-sm text-on-surface-variant">Survey Sampling</div>
<div class="font-label-lg text-label-lg text-primary mt-0.5 flex items-center justify-between">
<span>88%</span>
<span class="text-[11px] font-bold text-secondary font-label-sm">+8%</span>
</div>
</div>
<div class="bg-surface-container-lowest p-2 rounded">
<div class="text-body-sm font-body-sm text-on-surface-variant">Price Indices (CPI/WPI)</div>
<div class="font-label-lg text-label-lg text-primary mt-0.5 flex items-center justify-between">
<span>80%</span>
<span class="text-[11px] font-bold text-on-surface-variant font-label-sm">Par</span>
</div>
</div>
<div class="bg-surface-container-lowest p-2 rounded">
<div class="text-body-sm font-body-sm text-on-surface-variant">SDG National Framework</div>
<div class="font-label-lg text-label-lg text-primary mt-0.5 flex items-center justify-between">
<span>76%</span>
<span class="text-[11px] font-bold text-on-surface-variant font-label-sm">-4%</span>
</div>
</div>
</div>
</div>
<!-- Domain 2 -->
<div class="bg-surface-container-low p-space-md rounded-lg">
<div class="flex items-center justify-between mb-space-xs">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-secondary text-[20px]">terminal</span>
<span class="font-headline-sm text-headline-sm text-primary">Technical &amp; Computational Skills</span>
</div>
<div class="flex items-center gap-2">
<span class="text-label-md font-label-md text-error bg-error-container/50 px-2.5 py-0.5 rounded">Overall: 62%</span>
<span class="text-label-sm font-label-sm text-on-surface-variant">Benchmark: 75%</span>
</div>
</div>
<div class="w-full bg-surface-container-high h-2 rounded-full overflow-hidden mb-space-sm relative">
<div class="bg-secondary h-full rounded-full" style="width: 62%;"></div>
<div class="absolute top-0 bottom-0 w-1 bg-primary" style="left: 75%;" title="Cadre Target 75%"></div>
</div>
<div class="grid grid-cols-2 sm:grid-cols-4 gap-space-sm pt-space-xs">
<div class="bg-surface-container-lowest p-2 rounded">
<div class="text-body-sm font-body-sm text-on-surface-variant">SQL for Microdata</div>
<div class="font-label-lg text-label-lg text-primary mt-0.5 flex items-center justify-between">
<span>78%</span>
<span class="text-[11px] font-bold text-secondary font-label-sm">+3%</span>
</div>
</div>
<div class="bg-surface-container-lowest p-2 rounded">
<div class="text-body-sm font-body-sm text-on-surface-variant">R / R-Shiny Studio</div>
<div class="font-label-lg text-label-lg text-primary mt-0.5 flex items-center justify-between">
<span>70%</span>
<span class="text-[11px] font-bold text-on-surface-variant font-label-sm">-5%</span>
</div>
</div>
<div class="bg-surface-container-lowest p-2 rounded">
<div class="text-body-sm font-body-sm text-error">Python Data Stack</div>
<div class="font-label-lg text-label-lg text-error mt-0.5 flex items-center justify-between">
<span>58%</span>
<span class="text-[11px] font-bold bg-error-container/40 px-1 rounded">Deficit -17%</span>
</div>
</div>
<div class="bg-surface-container-lowest p-2 rounded">
<div class="text-body-sm font-body-sm text-error">GIS &amp; Remote Sensing</div>
<div class="font-label-lg text-label-lg text-error mt-0.5 flex items-center justify-between">
<span>44%</span>
<span class="text-[11px] font-bold bg-error-container/40 px-1 rounded">Critical -36%</span>
</div>
</div>
</div>
</div>
<!-- Domain 3 & 4 (2 Column Split) -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-space-md">
<!-- Domain 3 -->
<div class="bg-surface-container-low p-space-md rounded-lg">
<div class="flex items-center justify-between mb-space-xs">
<div class="flex items-center gap-1.5">
<span class="material-symbols-outlined text-primary text-[18px]">gavel</span>
<span class="font-headline-sm text-headline-sm text-primary">Governance &amp; DPDP</span>
</div>
<span class="text-label-md font-label-md text-primary bg-surface-container-lowest px-2 py-0.5 rounded">78% / 75%</span>
</div>
<div class="w-full bg-surface-container-high h-2 rounded-full overflow-hidden mb-space-sm relative">
<div class="bg-primary h-full rounded-full" style="width: 78%;"></div>
<div class="absolute top-0 bottom-0 w-1 bg-secondary" style="left: 75%;"></div>
</div>
<div class="flex gap-space-sm text-body-sm font-body-sm">
<span class="bg-surface-container-lowest px-2 py-1 rounded flex-1">DPDP Act &amp; Privacy: <strong>85%</strong></span>
<span class="bg-surface-container-lowest px-2 py-1 rounded flex-1">Govt Cloud &amp; DPI: <strong>72%</strong></span>
</div>
</div>
<!-- Domain 4 -->
<div class="bg-surface-container-low p-space-md rounded-lg">
<div class="flex items-center justify-between mb-space-xs">
<div class="flex items-center gap-1.5">
<span class="material-symbols-outlined text-primary text-[18px]">group</span>
<span class="font-headline-sm text-headline-sm text-primary">Leadership &amp; Dissemination</span>
</div>
<span class="text-label-md font-label-md text-primary bg-surface-container-lowest px-2 py-0.5 rounded">72% / 70%</span>
</div>
<div class="w-full bg-surface-container-high h-2 rounded-full overflow-hidden mb-space-sm relative">
<div class="bg-primary h-full rounded-full" style="width: 72%;"></div>
<div class="absolute top-0 bottom-0 w-1 bg-secondary" style="left: 70%;"></div>
</div>
<div class="flex gap-space-sm text-body-sm font-body-sm">
<span class="bg-surface-container-lowest px-2 py-1 rounded flex-1">Cadre Leadership: <strong>75%</strong></span>
<span class="bg-surface-container-lowest px-2 py-1 rounded flex-1">Dissemination: <strong>68%</strong></span>
</div>
</div>
</div>
</div>
</section>
<!-- Automated Priority Skill-Gap Interventions -->
<section class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm">
<div class="flex items-center justify-between pb-space-sm">
<div>
<div class="text-label-sm font-label-sm uppercase tracking-wider text-secondary font-bold">NSSTA Automated Recommendation Engine</div>
<h2 class="text-headline-md font-headline-md text-primary mt-0.5">Priority Skill-Gap Interventions (80th NSS Cycle)</h2>
</div>
<span class="material-symbols-outlined text-primary-container text-[24px]">troubleshoot</span>
</div>
<div class="space-y-space-md mt-space-sm">
<!-- Intervention 1 -->
<div class="p-space-md rounded-lg bg-surface-container-low flex flex-col md:flex-row md:items-center justify-between gap-space-md">
<div class="space-y-1.5 min-w-0 flex-1">
<div class="flex flex-wrap items-center gap-2">
<span class="bg-error text-on-error text-label-sm font-label-sm font-bold px-2 py-0.5 rounded">Critical Deficit (-36%)</span>
<span class="font-label-md text-label-md text-on-surface">Target: ISS Senior Executive Requirement (80%)</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-primary">GIS &amp; Spatial Data Integration in Agricultural Surveys</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-2">
                Identified gap in geo-referencing frame integration for Land &amp; Livestock Holdings survey data. Recommended by NSSTA Technical Advisory Council.
              </p>
<div class="flex items-center gap-space-md text-body-sm font-body-sm text-on-surface-variant pt-1">
<span class="flex items-center gap-1"><span class="material-symbols-outlined text-[16px]">schedule</span>14 Hours Dedicated</span>
<span class="flex items-center gap-1"><span class="material-symbols-outlined text-[16px]">map</span>Bhuvan &amp; QGIS Focus</span>
<span class="flex items-center gap-1"><span class="material-symbols-outlined text-[16px]">verified</span>12 Cadre Credits</span>
</div>
</div>
<div class="flex md:flex-col gap-2 shrink-0">
<button class="flex items-center justify-center gap-1 bg-secondary text-on-secondary px-space-md py-2 rounded text-label-md font-label-md hover:bg-secondary/90 transition-colors shadow-sm">
<span class="material-symbols-outlined text-[16px]">play_arrow</span>
<span>Start Micro-Path</span>
</button>
<button class="flex items-center justify-center gap-1 bg-surface-container-highest text-primary px-space-md py-2 rounded text-label-md font-label-md hover:bg-surface-container transition-colors">
<span class="material-symbols-outlined text-[16px]">description</span>
<span>View Syllabus</span>
</button>
</div>
</div>
<!-- Intervention 2 -->
<div class="p-space-md rounded-lg bg-surface-container-low flex flex-col md:flex-row md:items-center justify-between gap-space-md">
<div class="space-y-1.5 min-w-0 flex-1">
<div class="flex flex-wrap items-center gap-2">
<span class="bg-secondary-container text-on-primary text-label-sm font-label-sm font-bold px-2 py-0.5 rounded">Substantial Gap (-26%)</span>
<span class="font-label-md text-label-md text-on-surface">Target: Modern Official Statistical Modeling (78%)</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-primary">Machine Learning &amp; Predictive Modeling in Official Stats</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-2">
                High-frequency proxy indicator estimation using administrative datasets (GSTN, EPFO, MCA-21) for rapid National Accounts projections.
              </p>
<div class="flex items-center gap-space-md text-body-sm font-body-sm text-on-surface-variant pt-1">
<span class="flex items-center gap-1"><span class="material-symbols-outlined text-[16px]">schedule</span>18 Hours Effort</span>
<span class="flex items-center gap-1"><span class="material-symbols-outlined text-[16px]">hub</span>Nowcasting &amp; ARIMA-ML</span>
<span class="flex items-center gap-1"><span class="material-symbols-outlined text-[16px]">military_tech</span>15 Credits</span>
</div>
</div>
<div class="flex md:flex-col gap-2 shrink-0">
<button class="flex items-center justify-center gap-1 bg-primary text-on-primary px-space-md py-2 rounded text-label-md font-label-md hover:opacity-90 transition-colors shadow-sm">
<span class="material-symbols-outlined text-[16px]">route</span>
<span>Enroll Pathway</span>
</button>
<button class="flex items-center justify-center gap-1 bg-surface-container-highest text-primary px-space-md py-2 rounded text-label-md font-label-md hover:bg-surface-container transition-colors">
<span class="material-symbols-outlined text-[16px]">description</span>
<span>View Syllabus</span>
</button>
</div>
</div>
</div>
</section>
<!-- Enrolled Academic & Digital Courses -->
<section class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm">
<div class="flex items-center justify-between pb-space-sm">
<div>
<div class="text-label-sm font-label-sm uppercase tracking-wider text-secondary font-bold">Active Cadre Enrolment</div>
<h2 class="text-headline-md font-headline-md text-primary mt-0.5">Academic &amp; Digital Courses</h2>
</div>
<a class="text-label-md font-label-md text-secondary hover:underline flex items-center gap-1" href="<?= BASE_URL ?>/pages/igot-courses.php">
<span>View Full Roster</span>
<span class="material-symbols-outlined text-[16px]">chevron_right</span>
</a>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-space-md mt-space-sm">
<!-- iGOT Course -->
<div class="p-space-md rounded-lg bg-surface-container-low flex flex-col justify-between">
<div>
<div class="flex items-center justify-between mb-space-xs">
<span class="bg-primary text-on-primary text-label-sm font-label-sm px-2 py-0.5 rounded flex items-center gap-1">
<span class="material-symbols-outlined text-[13px]">cloud_sync</span>iGOT Karmayogi
                </span>
<span class="font-label-sm text-label-sm text-on-surface-variant font-mono">IGOT-STAT-410</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-primary mb-1">
                Modern Data Science with Python for Statistical Officers
              </h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mb-space-sm">
                Pandas, NumPy, and Statsmodels applied to large-scale PLFS &amp; ASI data pipelines.
              </p>
</div>
<div>
<div class="flex items-center justify-between font-label-sm text-label-sm text-on-surface-variant mb-1.5">
<span>Progress: 4 of 6 Modules (65%)</span>
<span class="text-primary font-bold">4.5 hrs left</span>
</div>
<div class="w-full bg-surface-container-high h-2 rounded-full overflow-hidden mb-space-sm">
<div class="bg-secondary-container h-full rounded-full" style="width: 65%;"></div>
</div>
<button class="w-full py-2 bg-primary-container text-on-primary rounded text-label-md font-label-md hover:bg-primary transition-colors flex items-center justify-center gap-1">
<span class="material-symbols-outlined text-[16px]">play_circle</span>
<span>Resume Module 5: Automated Imputation</span>
</button>
</div>
</div>
<!-- NSSTA On-Campus TPAC -->
<div class="p-space-md rounded-lg bg-surface-container-low flex flex-col justify-between">
<div>
<div class="flex items-center justify-between mb-space-xs">
<span class="bg-secondary text-on-secondary text-label-sm font-label-sm px-2 py-0.5 rounded flex items-center gap-1">
<span class="material-symbols-outlined text-[13px]">apartment</span>NSSTA TPAC
                </span>
<span class="font-label-sm text-label-sm bg-surface-container-high text-primary px-2 py-0.5 rounded font-bold">Nominated &amp; Confirmed</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-primary mb-1">
                Advanced National Accounting &amp; Capital Stock Estimation
              </h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mb-space-sm">
                5-Day Intensive Executive Residential Program on Perpetual Inventory Method (PIM) and SUT.
              </p>
</div>
<div>
<div class="bg-surface-container-lowest p-space-sm rounded mb-space-sm flex items-center justify-between text-body-sm font-body-sm">
<div class="flex items-center gap-1.5">
<span class="material-symbols-outlined text-[16px] text-secondary">calendar_month</span>
<span>Oct 14 – Oct 18, 2025</span>
</div>
<div class="font-label-sm text-label-sm text-primary font-bold">35 Cadre Credit Hours</div>
</div>
<div class="flex items-center justify-between gap-2">
<span class="text-body-sm font-body-sm text-on-surface-variant flex items-center gap-1">
<span class="material-symbols-outlined text-[16px] text-primary">location_on</span>NSSTA Campus, Greater Noida
                </span>
<button class="px-space-md py-1.5 bg-surface-container-highest text-primary text-label-sm font-label-sm rounded hover:bg-surface-container transition-colors">
                  View Joining Letter
                </button>
</div>
</div>
</div>
</div>
</section>
<!-- Growth Trend Chart: Quarterly Competency Progression -->
<section class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm">
<div class="flex flex-col sm:flex-row sm:items-center justify-between pb-space-md gap-2">
<div>
<div class="text-label-sm font-label-sm uppercase tracking-wider text-secondary font-bold">Longitudinal Cadre Progress</div>
<h2 class="text-headline-md font-headline-md text-primary mt-0.5">Quarterly Competency Progression (2024–25)</h2>
</div>
<div class="flex items-center gap-space-md text-label-sm font-label-sm">
<span class="flex items-center gap-1.5 text-primary"><span class="w-3 h-1 bg-primary"></span>Dr. Rajesh Sharma</span>
<span class="flex items-center gap-1.5 text-secondary"><span class="w-3 h-0.5 border-t-2 border-dashed border-secondary"></span>Target Benchmark (82)</span>
</div>
</div>
<!-- Inline SVG Visualization -->
<div class="w-full bg-surface-container-low rounded-lg p-space-md">
<div class="relative w-full h-56 flex items-end">
<svg class="w-full h-full overflow-visible" preserveaspectratio="none" viewbox="0 0 700 200">
<defs>
<lineargradient id="scoreGradient" x1="0" x2="0" y1="0" y2="1">
<stop offset="0%" stop-color="#0b2545" stop-opacity="0.35"></stop>
<stop offset="100%" stop-color="#0b2545" stop-opacity="0.0"></stop>
</lineargradient>
</defs>
<!-- Grid Horizontal Lines -->
<line stroke="#c4c6cf" stroke-dasharray="3 3" stroke-width="0.5" x1="50" x2="680" y1="20" y2="20"></line>
<line stroke="#c4c6cf" stroke-dasharray="3 3" stroke-width="0.5" x1="50" x2="680" y1="70" y2="70"></line>
<line stroke="#c4c6cf" stroke-dasharray="3 3" stroke-width="0.5" x1="50" x2="680" y1="120" y2="120"></line>
<line stroke="#c4c6cf" stroke-width="0.5" x1="50" x2="680" y1="170" y2="170"></line>
<!-- Axis Y Labels -->
<text fill="#74777f" font-family="Public Sans" font-size="11" x="15" y="24">100</text>
<text fill="#74777f" font-family="Public Sans" font-size="11" x="15" y="74">80</text>
<text fill="#74777f" font-family="Public Sans" font-size="11" x="15" y="124">60</text>
<text fill="#74777f" font-family="Public Sans" font-size="11" x="15" y="174">40</text>
<!-- Cadre Target Reference Line (at 82 -> y = 65) -->
<line stroke="#a83900" stroke-dasharray="6 4" stroke-width="1.8" x1="50" x2="680" y1="65" y2="65"></line>
<text fill="#a83900" font-family="Public Sans" font-size="11" font-weight="600" x="590" y="58">Cadre Target (82)</text>
<!-- Area Fill Under Path -->
<!-- Q1-24: 58 (y=125), Q2-24: 62 (y=115), Q3-24: 65 (y=107.5), Q4-24: 68 (y=100), Current Q1-25: 74 (y=85) -->
<!-- x coords: 100, 240, 380, 520, 650 -->
<polygon fill="url(#scoreGradient)" points="100,170 100,125 240,115 380,107.5 520,100 650,85 650,170"></polygon>
<!-- Progression Line -->
<polyline fill="none" points="100,125 240,115 380,107.5 520,100 650,85" stroke="#0b2545" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"></polyline>
<!-- Data Nodes -->
<circle cx="100" cy="125" fill="#0b2545" r="5" stroke="#ffffff" stroke-width="2"></circle>
<text fill="#0b2545" font-size="11" font-weight="600" text-anchor="middle" x="100" y="115">58</text>
<circle cx="240" cy="115" fill="#0b2545" r="5" stroke="#ffffff" stroke-width="2"></circle>
<text fill="#0b2545" font-size="11" font-weight="600" text-anchor="middle" x="240" y="105">62</text>
<circle cx="380" cy="107.5" fill="#0b2545" r="5" stroke="#ffffff" stroke-width="2"></circle>
<text fill="#0b2545" font-size="11" font-weight="600" text-anchor="middle" x="380" y="97">65</text>
<circle cx="520" cy="100" fill="#0b2545" r="5" stroke="#ffffff" stroke-width="2"></circle>
<text fill="#0b2545" font-size="11" font-weight="600" text-anchor="middle" x="520" y="90">68</text>
<!-- Current Highlighted Node -->
<circle cx="650" cy="85" fill="#fc6018" r="7" stroke="#ffffff" stroke-width="2.5"></circle>
<text fill="#fc6018" font-size="12" font-weight="700" text-anchor="middle" x="650" y="73">74 ★</text>
</svg>
</div>
<!-- Quarter Labels -->
<div class="grid grid-cols-5 text-center mt-2 font-label-sm text-label-sm text-on-surface-variant">
<span>Q1 2024</span>
<span>Q2 2024</span>
<span>Q3 2024</span>
<span>Q4 2024</span>
<span class="text-primary font-bold">CURRENT (Q1 '25)</span>
</div>
</div>
</section>
</div>
<!-- Right Column (4 cols): AI Learning Copilot, Officer Toolkits, Impending Deadlines -->
<div class="xl:col-span-4 flex flex-col gap-space-lg">
<!-- Gap2Grow Copilot Card -->
<section class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm">
<div class="flex items-center justify-between pb-space-sm">
<div class="flex items-center gap-space-xs">
<div class="w-8 h-8 rounded-lg bg-primary flex items-center justify-center text-on-primary">
<span class="material-symbols-outlined text-[18px]">psychology</span>
</div>
<div>
<h3 class="font-headline-sm text-headline-sm text-primary leading-tight">Gap2Grow Copilot</h3>
<div class="flex items-center gap-1 font-label-sm text-label-sm text-secondary font-bold">
<span class="w-2 h-2 rounded-full bg-secondary animate-pulse"></span>
<span>MoSPI-LLM v2.4 Live</span>
</div>
</div>
</div>
<span class="bg-surface-container-high text-primary font-label-sm text-label-sm px-2 py-0.5 rounded">NAD Context</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-2 mb-space-md">
          Personalized AI advisory tailored to Joint Director responsibilities in National Accounts &amp; GVA Compilation.
        </p>
<!-- Prompt Suggestions -->
<div class="space-y-space-xs mb-space-md">
<div class="text-label-sm font-label-sm text-on-surface-variant uppercase tracking-wider mb-1">Suggested Inquiries</div>
<button class="w-full text-left p-2.5 rounded-lg bg-surface-container-low hover:bg-surface-container text-body-sm font-body-sm text-on-surface transition-colors flex items-start gap-2" onclick="document.getElementById('copilot-query').value = this.innerText">
<span class="material-symbols-outlined text-[16px] text-secondary mt-0.5 shrink-0">help</span>
<span>Why is Python recommended for my National Accounts role?</span>
</button>
<button class="w-full text-left p-2.5 rounded-lg bg-surface-container-low hover:bg-surface-container text-body-sm font-body-sm text-on-surface transition-colors flex items-start gap-2" onclick="document.getElementById('copilot-query').value = this.innerText">
<span class="material-symbols-outlined text-[16px] text-secondary mt-0.5 shrink-0">help</span>
<span>Generate a 5-question quick quiz on GVA Deflators.</span>
</button>
<button class="w-full text-left p-2.5 rounded-lg bg-surface-container-low hover:bg-surface-container text-body-sm font-body-sm text-on-surface transition-colors flex items-start gap-2" onclick="document.getElementById('copilot-query').value = this.innerText">
<span class="material-symbols-outlined text-[16px] text-secondary mt-0.5 shrink-0">help</span>
<span>Explain difference between CPI-Rural &amp; Urban weighting.</span>
</button>
</div>
<!-- Copilot Query Input -->
<div class="relative">
<input class="w-full bg-surface-container-low text-on-surface placeholder:text-on-surface-variant/60 font-body-sm text-body-sm px-space-md py-3 pr-10 rounded-lg outline-none focus:ring-2 focus:ring-primary shadow-inner" id="copilot-query" placeholder="Ask statistical methodology or cadre advice..." type="text"/>
<button class="absolute right-2 top-2 p-1.5 bg-primary text-on-primary rounded hover:opacity-90 transition-opacity">
<span class="material-symbols-outlined text-[16px]">send</span>
</button>
</div>
</section>
<!-- Milestones & Gazettes Alert Card -->
<section class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm">
<div class="flex items-center justify-between pb-space-xs">
<div class="flex items-center gap-space-xs">
<span class="material-symbols-outlined text-secondary text-[20px]">notifications_active</span>
<h3 class="font-headline-sm text-headline-sm text-primary">Milestones &amp; Gazettes</h3>
</div>
<span class="text-label-sm font-label-sm bg-secondary/10 text-secondary font-bold px-2 py-0.5 rounded">Action Items</span>
</div>
<div class="divide-y divide-surface-container mt-space-sm">
<!-- Item 1 -->
<div class="py-space-sm flex items-start gap-3">
<div class="bg-error-container/40 text-error p-2 rounded-lg shrink-0 mt-0.5">
<span class="material-symbols-outlined text-[18px]">timer</span>
</div>
<div class="flex-1 min-w-0">
<div class="flex items-center justify-between">
<span class="text-label-sm font-label-sm font-bold text-error">Deadline: 3 Days Left</span>
<span class="text-[11px] text-on-surface-variant">Sept 18</span>
</div>
<p class="font-body-sm text-body-sm text-primary font-semibold mt-0.5">
                Mid-term Knowledge Quiz on Quarterly GDP Estimation
              </p>
<p class="font-body-sm text-body-sm text-on-surface-variant">Required for Q3 iGOT certification cycle.</p>
</div>
</div>
<!-- Item 2 -->
<div class="py-space-sm flex items-start gap-3">
<div class="bg-primary-fixed text-primary p-2 rounded-lg shrink-0 mt-0.5">
<span class="material-symbols-outlined text-[18px]">campaign</span>
</div>
<div class="flex-1 min-w-0">
<div class="flex items-center justify-between">
<span class="text-label-sm font-label-sm font-bold text-primary">NSSTA TPAC Circular</span>
<span class="text-[11px] text-on-surface-variant">Gazette 41/B</span>
</div>
<p class="font-body-sm text-body-sm text-primary font-semibold mt-0.5">
                Nominations open for SEEA-2012 Environmental Accounting
              </p>
<p class="font-body-sm text-body-sm text-on-surface-variant">MoSPI Official Delegate selection closes Friday.</p>
</div>
</div>
</div>
</section>
<!-- MoSPI Officer Toolkits & Direct Portals -->
<section class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm">
<div class="flex items-center justify-between pb-space-xs">
<h3 class="font-headline-sm text-headline-sm text-primary">MoSPI Officer Toolkits</h3>
<span class="material-symbols-outlined text-on-surface-variant text-[18px]">apps</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mb-space-sm">
          Quick-access official references for National Accounts Compilation.
        </p>
<div class="grid grid-cols-2 gap-space-xs">
<a class="p-space-sm rounded-lg bg-surface-container-low hover:bg-surface-container transition-colors flex flex-col items-start gap-1" href="<?= BASE_URL ?>/pages/competency-framework.php">
<span class="material-symbols-outlined text-primary text-[20px]">menu_book</span>
<span class="font-label-md text-label-md text-primary">SNA 2008 Guide</span>
<span class="text-[11px] text-on-surface-variant">Framework &amp; CSO Spec</span>
</a>
<a class="p-space-sm rounded-lg bg-surface-container-low hover:bg-surface-container transition-colors flex flex-col items-start gap-1" href="https://ndap.niti.gov.in" target="_blank" rel="noopener">
<span class="material-symbols-outlined text-secondary text-[20px]">database</span>
<span class="font-label-md text-label-md text-primary">NDAP Microdata</span>
<span class="text-[11px] text-on-surface-variant">Official Access Node</span>
</a>
<a class="p-space-sm rounded-lg bg-surface-container-low hover:bg-surface-container transition-colors flex flex-col items-start gap-1" href="<?= BASE_URL ?>/pages/certifications.php">
<span class="material-symbols-outlined text-primary text-[20px]">history_edu</span>
<span class="font-label-md text-label-md text-primary">e-SPARROW</span>
<span class="text-[11px] text-on-surface-variant">PAR &amp; Cadre Records</span>
</a>
<a class="p-space-sm rounded-lg bg-surface-container-low hover:bg-surface-container transition-colors flex flex-col items-start gap-1" href="<?= BASE_URL ?>/pages/helpdesk.php">
<span class="material-symbols-outlined text-secondary text-[20px]">support_agent</span>
<span class="font-label-md text-label-md text-primary">NSSTA Helpdesk</span>
<span class="text-[11px] text-on-surface-variant">G. Noida Support</span>
</a>
</div>
</section>
<!-- Sovereign Verification Notice -->
<div class="p-space-md rounded-xl bg-surface-container-high/60 flex items-center gap-space-sm text-body-sm font-body-sm text-on-surface-variant">
<span class="material-symbols-outlined text-primary text-[22px]">policy</span>
<div class="min-w-0">
<span class="font-semibold text-primary">Cadre Compliance:</span> All assessments are logged directly to the DoPT Karmayogi Competency Ledger per Gazette order ISS/2023/Trg-09.
        </div>
</div>
</div>
</div>
</div></main><footer class="w-full bg-surface-container-low text-on-surface-variant py-space-md px-space-lg mt-space-lg"><div class="flex flex-col md:flex-row items-center justify-between gap-space-sm text-body-sm font-body-sm"><span>Gap2Grow Cadre Portal • National Statistical Systems Training Academy (NSSTA) • MoSPI</span><span>GIGW-3.0 Compliant • NIC Gateway Secure Node</span></div></footer></div><script>
async function sendCopilotQuery() {
    const input = document.getElementById('copilot-query');
    const query = input.value.trim();
    if (!query) return;
    
    input.disabled = true;
    input.placeholder = 'Consulting MoSPI AI Knowledge Base...';
    try {
        const res = await fetch('<?= BASE_URL ?>/api/ai-copilot.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({message: query})
        });
        const data = await res.json();
        alert('Gap2Grow Copilot Response:\n\n' + (data.reply || 'No response'));
    } catch(e) {
        alert('Gap2Grow Copilot: ' + query + '\n\nRecommendation: Please review the National Accounts methodology guidelines on the iGOT catalog.');
    } finally {
        input.disabled = false;
        input.value = '';
        input.placeholder = 'Ask statistical methodology or cadre advice...';
    }
}

document.getElementById('copilot-query')?.addEventListener('keypress', function(e) {
    if (e.key === 'Enter') sendCopilotQuery();
});
document.querySelector('#copilot-query + button')?.addEventListener('click', sendCopilotQuery);
</script>
</body></html>
