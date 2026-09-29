<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';

requireLogin();
$user = currentUser();
$userId = (int)$user['id'];

$stmt = $pdo->prepare('SELECT * FROM diagnostic_sessions WHERE user_id = ? ORDER BY id DESC LIMIT 1');
$stmt->execute([$userId]);
$latestSession = $stmt->fetch();
$finalScore = $latestSession ? (int)$latestSession['final_score'] : 84;
?>
<!DOCTYPE html>

<html lang="en"><head><meta charset="utf-8"/><meta content="width=device-width, initial-scale=1.0" name="viewport"/><meta content="web_dashboard" name="shell-type"/><link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/><link href="https://fonts.googleapis.com" rel="preconnect"/><link href="https://fonts.gstatic.com" rel="preconnect"/><link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/><style>@layer base{html,body{margin:0;padding:0;}body{overscroll-behavior:none;}main>:first-child{margin-top:0!important;}main>:last-child{margin-bottom:0!important;}}::-webkit-scrollbar{display:none;}</style><script src="https://cdn.tailwindcss.com"></script><script id="tailwind-config">tailwind.config={darkMode:"class",theme:{extend:{"colors":{"surface-container-lowest":"#ffffff","surface":"#f8f9ff","primary-fixed":"#d5e3ff","secondary-container":"#fc6018","surface-tint":"#495f82","on-background":"#0d1c2f","on-tertiary-fixed":"#00164e","error":"#ba1a1a","on-surface":"#0d1c2f","tertiary-fixed":"#dce1ff","surface-container-highest":"#d5e3fd","on-tertiary":"#ffffff","tertiary-container":"#001e63","on-tertiary-container":"#7088dc","primary":"#001026","surface-container":"#e6eeff","on-surface-variant":"#44474e","background":"#f8f9ff","on-secondary-fixed-variant":"#802a00","on-primary":"#ffffff","tertiary-fixed-dim":"#b6c4ff","secondary":"#a83900","inverse-on-surface":"#ebf1ff","tertiary":"#000c34","on-primary-container":"#778db2","primary-container":"#0b2545","surface-dim":"#ccdbf4","on-primary-fixed":"#001c3b","on-secondary-fixed":"#380d00","inverse-primary":"#b1c7f0","error-container":"#ffdad6","on-error-container":"#93000a","inverse-surface":"#233144","on-tertiary-fixed-variant":"#264191","secondary-fixed":"#ffdbcf","outline":"#74777f","on-primary-fixed-variant":"#314769","on-error":"#ffffff","surface-container-low":"#eff4ff","secondary-fixed-dim":"#ffb59a","surface-variant":"#d5e3fd","on-secondary-container":"#531800","on-secondary":"#ffffff","surface-container-high":"#dde9ff","outline-variant":"#c4c6cf","surface-bright":"#f8f9ff","primary-fixed-dim":"#b1c7f0"},"borderRadius":{"DEFAULT":"0.125rem","lg":"0.25rem","xl":"0.5rem","full":"0.75rem"},"spacing":{"gutter-mobile":"0.75rem","margin-mobile":"1rem","space-lg":"1.5rem","space-sm":"0.5rem","gutter":"1.5rem","space-md":"1rem","space-xs":"0.25rem","margin":"2rem","space-xl":"2.5rem"},"fontFamily":{"label-lg":["Public Sans"],"label-md":["Public Sans"],"body-lg":["Public Sans"],"body-md":["Public Sans"],"headline-lg":["Public Sans"],"headline-xl":["Public Sans"],"headline-lg-mobile":["Public Sans"],"label-sm":["Public Sans"],"headline-md":["Public Sans"],"body-sm":["Public Sans"],"headline-sm":["Public Sans"],"headline-xl-mobile":["Public Sans"]},"fontSize":{"label-lg":["14px",{"lineHeight":"20px","letterSpacing":"0.01em","fontWeight":"600"}],"label-md":["12px",{"lineHeight":"16px","letterSpacing":"0.02em","fontWeight":"600"}],"body-lg":["16px",{"lineHeight":"24px","fontWeight":"400"}],"body-md":["14px",{"lineHeight":"20px","fontWeight":"400"}],"headline-lg":["28px",{"lineHeight":"36px","letterSpacing":"-0.01em","fontWeight":"700"}],"headline-xl":["36px",{"lineHeight":"44px","letterSpacing":"-0.02em","fontWeight":"700"}],"headline-lg-mobile":["22px",{"lineHeight":"30px","letterSpacing":"0em","fontWeight":"700"}],"label-sm":["11px",{"lineHeight":"14px","letterSpacing":"0.03em","fontWeight":"600"}],"headline-md":["22px",{"lineHeight":"28px","fontWeight":"600"}],"body-sm":["12px",{"lineHeight":"18px","fontWeight":"400"}],"headline-sm":["18px",{"lineHeight":"24px","fontWeight":"600"}],"headline-xl-mobile":["28px",{"lineHeight":"36px","letterSpacing":"-0.01em","fontWeight":"700"}]}}}}</script></head><body class="bg-surface font-body-md text-body-md text-on-surface antialiased"><aside class="fixed left-0 top-0 h-full w-72 bg-primary-container text-on-primary z-50 flex flex-col justify-between shadow-[0_4px_20px_rgba(11,37,69,0.25)]"><div class="flex flex-col"><div class="px-space-md py-space-sm bg-primary flex items-center justify-between"><div class="flex items-center gap-space-xs"><span class="material-symbols-outlined text-secondary-container text-[20px]">verified</span><span class="font-label-sm text-label-sm tracking-wide text-primary-fixed">GIGW 3.0 | iGOT Live</span></div><span class="w-2 h-2 rounded-full bg-secondary-container animate-pulse"></span></div><div class="p-space-md bg-tertiary-container"><div class="flex items-center gap-space-sm"><div class="w-11 h-11 rounded-full bg-primary flex items-center justify-center"><span class="material-symbols-outlined text-on-primary text-[24px]">person</span></div><div class="min-w-0 flex-1"><div class="font-label-lg text-label-lg text-on-tertiary truncate">Dr. Rajesh Sharma, ISS</div><div class="font-body-sm text-body-sm text-on-tertiary-container truncate">Joint Director, NAD (CSO)</div></div></div><div class="mt-space-sm pt-space-xs flex items-center justify-between text-label-sm font-label-sm"><span class="bg-secondary text-on-secondary px-2 py-0.5 rounded">ISS Cadre</span><span class="text-primary-fixed truncate">ID: ISS-2008-0412</span></div></div><nav class="px-space-sm py-space-md space-y-1 flex flex-col" data-active-classes="bg-primary text-on-primary font-bold"><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="learner-dashboard" href="<?= BASE_URL ?>/pages/dashboard.php"><span class="material-symbols-outlined text-[20px]">space_dashboard</span><span>Learner Dashboard</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="skill-gap-analysis" href="<?= BASE_URL ?>/pages/skill-gap.php"><span class="material-symbols-outlined text-[20px]">monitoring</span><span>Skill-Gap Analysis</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="my-learning-path" href="<?= BASE_URL ?>/pages/learning-path.php"><span class="material-symbols-outlined text-[20px]">route</span><span>My Learning Path</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="ai-assessment-generator" href="<?= BASE_URL ?>/pages/assessment-generator.php"><span class="material-symbols-outlined text-[20px]">psychology</span><span>AI Assessment Generator</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="igot-course-catalog" href="<?= BASE_URL ?>/pages/igot-courses.php"><span class="material-symbols-outlined text-[20px]">menu_book</span><span>iGOT Course Catalog</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="nssta-tpac-nominations" href="<?= BASE_URL ?>/pages/nssta-programmes.php"><span class="material-symbols-outlined text-[20px]">assignment_ind</span><span>NSSTA TPAC Nominations</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="cadre-analytics" href="<?= BASE_URL ?>/pages/cadre-analytics.php"><span class="material-symbols-outlined text-[20px]">analytics</span><span>Cadre Analytics</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="settings-profile" href="<?= BASE_URL ?>/pages/settings.php"><span class="material-symbols-outlined text-[20px]">manage_accounts</span><span>Settings &amp; Profile</span></a></nav></div><div class="p-space-md bg-tertiary text-on-tertiary"><div class="text-label-sm font-label-sm text-tertiary-fixed-dim uppercase tracking-wider mb-space-xs">Sync Status</div><div class="space-y-1 text-label-sm font-label-sm mb-space-md"><div class="flex items-center justify-between text-on-tertiary"><span>iGOT Karmayogi API</span><span class="text-secondary-fixed">v2.4 Live</span></div><div class="flex items-center justify-between text-on-tertiary"><span>SPARROW / e-HRMS</span><span class="text-secondary-fixed">Active</span></div></div><div class="flex items-center justify-between pt-space-xs"><a class="flex items-center gap-space-xs text-secondary-fixed hover:text-on-tertiary text-label-sm font-label-sm" href="<?= BASE_URL ?>/logout.php"><span class="material-symbols-outlined text-[16px]">logout</span><span>Sign Out</span></a><span class="text-tertiary-fixed-dim text-label-sm font-label-sm">NSSTA-ISS</span></div></div></aside><div class="pl-72"><header class="fixed top-0 left-72 right-0 h-16 bg-surface-container-lowest/90 backdrop-blur-md shadow-[0_1px_8px_rgba(11,37,69,0.06)] z-40 flex items-center justify-between px-space-lg"><div class="flex items-center gap-space-sm text-body-sm font-body-sm text-on-surface-variant"><span>à¤­à¤¾à¤°à¤¤ à¤¸à¤°à¤•à¤¾à¤° | MoSPI Official Statistical Cadre Intelligence</span></div><div class="flex items-center gap-space-md"><div class="flex items-center gap-space-xs bg-surface-container-low px-space-sm py-1 rounded-full text-label-sm font-label-sm text-on-surface"><span class="w-2 h-2 rounded-full bg-secondary"></span><span>NAD Division</span></div><div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center"><span class="material-symbols-outlined text-on-primary text-[18px]">person</span></div></div></header><main class="relative pt-16 w-full px-space-lg bg-surface min-h-[calc(100vh-64px)]"><div class="flex flex-col w-full">
<div class="py-space-md flex flex-col gap-space-lg">
<div class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm">
<div class="flex flex-col lg:flex-row lg:items-center justify-between gap-space-md">
<div class="space-y-space-xs">
<div class="flex items-center gap-space-xs flex-wrap">
<span class="bg-primary text-on-primary font-label-sm text-label-sm px-2.5 py-0.5 rounded uppercase tracking-wider">Official Debrief Dossier</span>
<span class="bg-surface-container text-on-surface-variant font-label-sm text-label-sm px-2.5 py-0.5 rounded flex items-center gap-1">
<span class="material-symbols-outlined text-[14px] text-secondary">verified_user</span>
<span>GIGW 3.0 Cryptographic Integrity Verified</span>
</span>
</div>
<h1 class="font-headline-lg text-headline-lg text-primary tracking-tight">Assessment Result &amp; Cadre Diagnostic Dossier</h1>
<p class="font-body-md text-body-md text-on-surface-variant">
            MoSPI Cadre Benchmark: National Accounts, Nowcasting &amp; Spatial Disaggregation (Cycle 2024-25)
          </p>
</div>
<div class="flex flex-col sm:flex-row items-start sm:items-center gap-space-sm bg-surface-container-low p-space-sm rounded-lg">
<div class="flex flex-col">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase">Officer Candidate</span>
<span class="font-label-lg text-label-lg text-on-surface">Dr. Rajesh Sharma, ISS</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Joint Director, NAD (CSO)</span>
</div>
<div class="hidden sm:block w-px h-10 bg-surface-container-highest"></div>
<div class="flex flex-col">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase">Audit Metadata</span>
<span class="font-label-md text-label-md text-on-surface">24 February 2025 â€¢ 11:42 IST</span>
<span class="font-label-sm text-label-sm font-mono text-secondary">NIC-SHA256: 9b7c...4f1e</span>
</div>
</div>
</div>
<div class="mt-space-lg grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-space-md">
<div class="bg-surface-container-low p-space-md rounded-lg flex flex-col justify-between relative overflow-hidden group">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase">Composite Score</span>
<span class="material-symbols-outlined text-secondary text-[20px]">military_tech</span>
</div>
<div class="my-space-xs">
<div class="flex items-baseline gap-space-xs">
<span class="font-headline-xl text-headline-xl text-primary font-bold">84%</span>
<span class="font-label-md text-label-md text-secondary font-bold">(Passed / Grade A)</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">Commended Standing</p>
</div>
<div class="flex items-center gap-1 font-label-sm text-label-sm text-secondary-container">
<span class="material-symbols-outlined text-[16px]">arrow_upward</span>
<span>+6% baseline lift over 2023 cycle</span>
</div>
</div>
<div class="bg-surface-container-low p-space-md rounded-lg flex flex-col justify-between relative overflow-hidden">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase">Cadre Percentile</span>
<span class="material-symbols-outlined text-primary-container text-[20px]">groups</span>
</div>
<div class="my-space-xs">
<div class="flex items-baseline gap-space-xs">
<span class="font-headline-xl text-headline-xl text-primary font-bold">92<span class="text-headline-md font-headline-md">nd</span></span>
<span class="font-label-md text-label-md text-on-surface-variant">Percentile</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">MoSPI Cadre ISS Level 13 Cohort</p>
</div>
<div class="w-full bg-surface-container-highest h-1.5 rounded-full overflow-hidden">
<div class="bg-primary h-full rounded-full" style="width: 92%"></div>
</div>
</div>
<div class="bg-surface-container-low p-space-md rounded-lg flex flex-col justify-between">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase">Pace &amp; Velocity</span>
<span class="material-symbols-outlined text-on-surface-variant text-[20px]">timer</span>
</div>
<div class="my-space-xs">
<div class="flex items-baseline gap-space-xs">
<span class="font-headline-lg text-headline-lg text-primary font-bold">24m 12s</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">/ 35m total</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">Optimal cognitive rhythm</p>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant flex items-center gap-1">
<span class="w-2 h-2 rounded-full bg-secondary"></span>
<span>+10m 48s reserve surplus</span>
</span>
</div>
<div class="bg-surface-container-low p-space-md rounded-lg flex flex-col justify-between">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase">Psychometric Health</span>
<span class="material-symbols-outlined text-on-surface-variant text-[20px]">troubleshoot</span>
</div>
<div class="my-space-xs">
<div class="flex items-baseline gap-space-xs">
<span class="font-headline-lg text-headline-lg text-primary font-bold">0.89</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Cronbach Î±</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">Robust psychometric validity</p>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant">
            Discrimination Index: <strong class="text-primary font-semibold">0.81</strong>
</span>
</div>
</div>
</div>
<div class="grid grid-cols-1 xl:grid-cols-12 gap-space-lg items-start">
<div class="xl:col-span-8 flex flex-col gap-space-lg">
<div class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm">
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-space-xs pb-space-md">
<div>
<span class="font-label-sm text-label-sm uppercase text-secondary font-bold tracking-wider">Diagnostic Analysis</span>
<h2 class="font-headline-md text-headline-md text-primary">Topic-Wise Mastery &amp; Gap Delta Impact</h2>
</div>
<span class="font-body-sm text-body-sm text-on-surface-variant">Cadre Baseline: Level-13 Standard</span>
</div>
<div class="space-y-space-md mt-space-sm">
<div class="bg-surface-container-low p-space-md rounded-lg">
<div class="flex flex-col md:flex-row md:items-center justify-between gap-space-xs">
<div>
<div class="flex items-center gap-space-xs">
<span class="font-headline-sm text-headline-sm text-primary">National Accounts &amp; SUT Framework</span>
<span class="bg-surface-container text-on-surface-variant font-label-sm text-label-sm px-2 py-0.5 rounded">Core Mandate</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">Supply-Use Tables, RAS Balancing, Gross Fixed Capital Formation methodology</p>
</div>
<div class="flex items-center gap-space-sm">
<span class="font-headline-md text-headline-md font-bold text-primary">95%</span>
<span class="bg-surface text-on-surface font-label-sm text-label-sm px-2.5 py-1 rounded">Exemplary Mastery</span>
</div>
</div>
<div class="mt-space-sm">
<div class="flex justify-between font-label-sm text-label-sm text-on-surface-variant mb-1">
<span>Candidate Score vs Cadre Benchmark (90%)</span>
<span class="text-secondary font-bold">+5% above L-13A Target</span>
</div>
<div class="w-full bg-surface-container-highest h-2 rounded-full overflow-hidden relative">
<div class="bg-primary h-full rounded-full" style="width: 95%"></div>
<div class="absolute top-0 bottom-0 w-0.5 bg-secondary-container" style="left: 90%" title="Target: 90%"></div>
</div>
</div>
<div class="mt-space-sm p-space-xs bg-surface-container rounded flex items-center gap-space-xs text-body-sm text-body-sm text-on-surface">
<span class="material-symbols-outlined text-secondary text-[18px]">verified</span>
<span><strong>Impact:</strong> Qualifies as Cadre Mentor for NSSTA 2025 Probationers Workshop.</span>
</div>
</div>
<div class="bg-surface-container-low p-space-md rounded-lg">
<div class="flex flex-col md:flex-row md:items-center justify-between gap-space-xs">
<div>
<div class="flex items-center gap-space-xs">
<span class="font-headline-sm text-headline-sm text-primary">CPI &amp; Price Index Deflators</span>
<span class="bg-surface-container text-on-surface-variant font-label-sm text-label-sm px-2 py-0.5 rounded">Economic Statistics</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">Geometric mean aggregations, chained Fisher deflators &amp; urban service margins</p>
</div>
<div class="flex items-center gap-space-sm">
<span class="font-headline-md text-headline-md font-bold text-primary">88%</span>
<span class="bg-surface-container-high text-on-surface font-label-sm text-label-sm px-2.5 py-1 rounded">Target Achieved</span>
</div>
</div>
<div class="mt-space-sm">
<div class="flex justify-between font-label-sm text-label-sm text-on-surface-variant mb-1">
<span>Candidate Score vs Cadre Benchmark (80%)</span>
<span class="text-primary font-semibold">+8% above standard</span>
</div>
<div class="w-full bg-surface-container-highest h-2 rounded-full overflow-hidden relative">
<div class="bg-primary-container h-full rounded-full" style="width: 88%"></div>
<div class="absolute top-0 bottom-0 w-0.5 bg-secondary-container" style="left: 80%" title="Target: 80%"></div>
</div>
</div>
<div class="mt-space-sm p-space-xs bg-surface-container rounded flex items-center gap-space-xs text-body-sm text-body-sm text-on-surface">
<span class="material-symbols-outlined text-primary-fixed-variant text-[18px]">check_circle</span>
<span><strong>Impact:</strong> Benchmark Cleared. Autonomous sign-off authority retained.</span>
</div>
</div>
<div class="bg-surface-container-low p-space-md rounded-lg">
<div class="flex flex-col md:flex-row md:items-center justify-between gap-space-xs">
<div>
<div class="flex items-center gap-space-xs">
<span class="font-headline-sm text-headline-sm text-primary">GIS &amp; Spatial Disaggregation</span>
<span class="bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm px-2 py-0.5 rounded font-bold">Action Required</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">Urban Frame Survey (UFS) vector digitization, spatial interpolation &amp; remote sensing</p>
</div>
<div class="flex items-center gap-space-sm">
<span class="font-headline-md text-headline-md font-bold text-secondary">54%</span>
<span class="bg-secondary text-on-secondary font-label-sm text-label-sm px-2.5 py-1 rounded font-semibold">Critical Deficit</span>
</div>
</div>
<div class="mt-space-sm">
<div class="flex justify-between font-label-sm text-label-sm text-on-surface-variant mb-1">
<span>Candidate Score vs Cadre Benchmark (80%)</span>
<span class="text-secondary font-bold">-26% below required L-13 baseline</span>
</div>
<div class="w-full bg-surface-container-highest h-2 rounded-full overflow-hidden relative">
<div class="bg-secondary h-full rounded-full" style="width: 54%"></div>
<div class="absolute top-0 bottom-0 w-0.5 bg-primary" style="left: 80%" title="Target: 80%"></div>
</div>
</div>
<div class="mt-space-sm p-space-xs bg-secondary-fixed text-on-secondary-fixed rounded flex items-center gap-space-xs text-body-sm text-body-sm font-medium">
<span class="material-symbols-outlined text-secondary text-[18px]">warning</span>
<span><strong>Impact:</strong> Mandatory NSSTA 3-day lab remediation triggered (Cohort GIS-402).</span>
</div>
</div>
<div class="bg-surface-container-low p-space-md rounded-lg">
<div class="flex flex-col md:flex-row md:items-center justify-between gap-space-xs">
<div>
<div class="flex items-center gap-space-xs">
<span class="font-headline-sm text-headline-sm text-primary">Machine Learning Nowcasting</span>
<span class="bg-surface-container text-on-surface-variant font-label-sm text-label-sm px-2 py-0.5 rounded">Advanced Tech</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">High-frequency indicators, MIDAS regression models, tree-based GDP estimators</p>
</div>
<div class="flex items-center gap-space-sm">
<span class="font-headline-md text-headline-md font-bold text-primary">62%</span>
<span class="bg-surface-container-high text-on-surface font-label-sm text-label-sm px-2.5 py-1 rounded">Moderate Deficit</span>
</div>
</div>
<div class="mt-space-sm">
<div class="flex justify-between font-label-sm text-label-sm text-on-surface-variant mb-1">
<span>Candidate Score vs Cadre Benchmark (78%)</span>
<span class="text-on-surface-variant font-semibold">-16% variance to standard</span>
</div>
<div class="w-full bg-surface-container-highest h-2 rounded-full overflow-hidden relative">
<div class="bg-surface-tint h-full rounded-full" style="width: 62%"></div>
<div class="absolute top-0 bottom-0 w-0.5 bg-primary" style="left: 78%" title="Target: 78%"></div>
</div>
</div>
<div class="mt-space-sm p-space-xs bg-surface-container rounded flex items-center gap-space-xs text-body-sm text-body-sm text-on-surface">
<span class="material-symbols-outlined text-secondary text-[18px]">school</span>
<span><strong>Impact:</strong> iGOT Python Pipeline course auto-enrolled to officer dashboard.</span>
</div>
</div>
</div>
</div>
<div class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm">
<div class="flex items-center justify-between pb-space-md">
<div>
<span class="font-label-sm text-label-sm uppercase text-secondary font-bold tracking-wider">Itemized Review</span>
<h2 class="font-headline-md text-headline-md text-primary">Detailed Question Analysis &amp; Explanations</h2>
</div>
<div class="flex items-center gap-space-xs">
<span class="font-label-sm text-label-sm px-2 py-1 rounded bg-surface-container text-on-surface">Filtered: Critical Audit Items</span>
</div>
</div>
<div class="space-y-space-lg">
<div class="p-space-md rounded-lg bg-surface-container-low space-y-space-sm">
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-space-xs">
<div class="flex items-center gap-space-xs">
<span class="bg-primary text-on-primary font-label-sm text-label-sm px-2 py-0.5 rounded font-mono">Q.04</span>
<span class="font-headline-sm text-headline-sm text-primary">Supply-Use Table Balancing &amp; Biproportional Scaling</span>
</div>
<span class="font-label-md text-label-md px-2.5 py-1 rounded bg-surface text-on-surface font-semibold flex items-center gap-1">
<span class="material-symbols-outlined text-[16px] text-secondary">check_circle</span>
<span>Correct (+4.0 marks)</span>
</span>
</div>
<div class="bg-surface-container-lowest p-space-md rounded-md space-y-space-xs">
<p class="font-body-md text-body-md text-on-surface">
<span class="font-bold text-primary">Prompt:</span> When rebalancing intermediate transaction matrices subject to updated gross output constraints under the SNA 2008 guidelines, which mathematical property ensures convergence in the RAS iterative adjustment?
                </p>
<div class="bg-surface-container-low p-space-sm rounded text-body-sm text-body-sm space-y-1">
<p class="font-label-md text-label-md text-primary">Candidate Selection: <span class="font-normal">Strict positivity of initial elements ensuring contraction mapping across positive orthants.</span></p>
<p class="font-label-md text-label-md text-secondary">Official Rationale &amp; Citation:</p>
<p class="text-on-surface-variant">
                    Per the <em>MoSPI National Accounts Division Technical Manual (2023 Revision, Sec 4.8.2)</em>, the biproportional RAS procedure is guaranteed to converge to a unique solution if and only if the starting matrix contains connected non-negative paths and all marginal column/row sums are strictly positive, behaving as a strict contraction mapping.
                  </p>
</div>
</div>
</div>
<div class="p-space-md rounded-lg bg-secondary-fixed/30 space-y-space-sm">
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-space-xs">
<div class="flex items-center gap-space-xs">
<span class="bg-secondary text-on-secondary font-label-sm text-label-sm px-2 py-0.5 rounded font-mono">Q.07</span>
<span class="font-headline-sm text-headline-sm text-primary">Spatial Interpolation in Urban Frame Survey (UFS) Blocks</span>
</div>
<span class="font-label-md text-label-md px-2.5 py-1 rounded bg-secondary text-on-secondary font-bold flex items-center gap-1">
<span class="material-symbols-outlined text-[16px]">cancel</span>
<span>Incorrect (0.0 marks)</span>
</span>
</div>
<div class="bg-surface-container-lowest p-space-md rounded-md space-y-space-xs">
<p class="font-body-md text-body-md text-on-surface">
<span class="font-bold text-primary">Prompt:</span> In micro-level enterprise density mapping across un-surveyed contiguous ward fringes, which spatial interpolation methodology minimises variance while respecting hard cadastral barriers?
                </p>
<div class="space-y-space-xs">
<div class="p-space-xs bg-surface-container-low rounded text-body-sm text-body-sm">
<span class="text-error font-semibold">Your Response:</span> Standard Euclidean Nearest-Neighbor (1-NN) classification using centroids.
                  </div>
<div class="p-space-xs bg-secondary-fixed/40 rounded text-body-sm text-body-sm">
<span class="text-secondary font-bold">Validated Benchmark Key:</span> Ordinary Kriging interpolation with Voronoi polygon boundary constraints.
                  </div>
</div>
<div class="mt-space-sm p-space-sm bg-surface-container-low rounded text-body-sm text-body-sm text-on-surface-variant space-y-1">
<span class="font-label-md text-label-md text-primary block">Diagnostic Debrief:</span>
<p>
                    Nearest-neighbor interpolation introduces severe step-function discontinuities across ward administrative boundaries. Under the <em>National Data Governance Framework Policy (NDGFP) Spatial Guidelines</em>, micro-clustering in high-density urban clusters mandates semi-variogram modeling (Ordinary Kriging) combined with Voronoi geometric constraints to avoid synthetic spatial spillover across surveyed jurisdictional limits.
                  </p>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="xl:col-span-4 flex flex-col gap-space-lg">
<div class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm space-y-space-md">
<div>
<span class="font-label-sm text-label-sm uppercase text-secondary font-bold tracking-wider">Cadre Competency Matrix</span>
<h3 class="font-headline-sm text-headline-sm text-primary">ISS Level-13 Profile Comparison</h3>
</div>
<div class="flex justify-center p-space-sm bg-surface-container-low rounded-lg">
<svg class="w-full max-w-[280px] h-[240px]" viewbox="0 0 300 260">
<polygon class="text-surface-container-highest/60" fill="currentColor" points="150,20 270,90 230,220 70,220 30,90" stroke="#74777f" stroke-width="1"></polygon>
<polygon class="text-surface-container/50" fill="currentColor" points="150,55 235,105 205,195 95,195 65,105" stroke="#74777f" stroke-dasharray="2,2" stroke-width="1"></polygon>
<polygon class="text-primary/15" fill="currentColor" points="150,25 255,95 190,215 80,185 45,95" stroke="#001026" stroke-width="2"></polygon>
<polygon fill="none" points="150,40 240,100 200,180 120,165 50,110" stroke="#fc6018" stroke-width="2"></polygon>
<text class="font-label-sm text-[10px] fill-on-surface font-semibold" text-anchor="middle" x="150" y="15">National Accounts (95%)</text>
<text class="font-label-sm text-[10px] fill-on-surface font-semibold" text-anchor="start" x="275" y="95">Prices &amp; CPI (88%)</text>
<text class="font-label-sm text-[10px] fill-secondary font-bold" text-anchor="middle" x="235" y="235">GIS &amp; UFS (54%)</text>
<text class="font-label-sm text-[10px] fill-on-surface font-semibold" text-anchor="middle" x="65" y="235">ML / Nowcast (62%)</text>
<text class="font-label-sm text-[10px] fill-on-surface font-semibold" text-anchor="end" x="15" y="95">Sampling (82%)</text>
</svg>
</div>
<div class="flex items-center justify-around font-label-sm text-label-sm border-t border-surface-container-high pt-space-xs text-on-surface-variant">
<span class="flex items-center gap-1">
<span class="w-3 h-0.5 bg-primary"></span> Candidate Score
            </span>
<span class="flex items-center gap-1">
<span class="w-3 h-0.5 bg-secondary-container"></span> Cadre Benchmark
            </span>
</div>
<div class="space-y-space-xs pt-space-xs">
<div class="flex items-center justify-between p-space-xs rounded bg-surface-container-low text-body-sm text-body-sm">
<span class="text-on-surface">Statistical Reasoning</span>
<span class="font-bold text-primary">Top 8% Cadre</span>
</div>
<div class="flex items-center justify-between p-space-xs rounded bg-surface-container-low text-body-sm text-body-sm">
<span class="text-on-surface">Spatial Analytics</span>
<span class="font-bold text-secondary">Deficit Cluster</span>
</div>
<div class="flex items-center justify-between p-space-xs rounded bg-surface-container-low text-body-sm text-body-sm">
<span class="text-on-surface">Econometric Forecasting</span>
<span class="font-bold text-on-surface">Adequate</span>
</div>
</div>
</div>
<div class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm space-y-space-md">
<div class="flex items-center gap-space-xs">
<span class="material-symbols-outlined text-secondary text-[22px]">pending_actions</span>
<h3 class="font-headline-sm text-headline-sm text-primary">Prescribed Interventions</h3>
</div>
<div class="space-y-space-sm">
<div class="p-space-sm rounded-lg bg-surface-container-low space-y-space-xs">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm uppercase text-secondary font-bold">Immediate NSSTA Nom.</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Lab Session</span>
</div>
<h4 class="font-label-lg text-label-lg text-primary">Spatial Sampling &amp; Kriging Workstation</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant">Mandatory residential immersion at Greater Noida NSSTA campus.</p>
<div class="pt-1 flex items-center justify-between font-label-sm text-label-sm">
<span class="text-on-surface-variant">Slot: 14-16 March 2025</span>
<span class="text-secondary font-bold">Auto-nominated</span>
</div>
</div>
<div class="p-space-sm rounded-lg bg-surface-container-low space-y-space-xs">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm uppercase text-primary font-bold">iGOT Karmayogi Course</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Self-Paced</span>
</div>
<h4 class="font-label-lg text-label-lg text-primary">Nowcasting with Macroeconomic Data Pipelines</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant">5 Module self-study track created by RBI-NIPFP consortium.</p>
<div class="pt-1 flex items-center justify-between font-label-sm text-label-sm">
<span class="text-on-surface-variant">12 Credit Hours</span>
<span class="text-primary font-semibold">Assigned to Profile</span>
</div>
</div>
</div>
</div>
<div class="bg-tertiary-container rounded-xl p-space-lg text-on-tertiary shadow-sm space-y-space-sm">
<div class="flex items-center gap-space-xs">
<span class="material-symbols-outlined text-secondary-container text-[20px]">security</span>
<span class="font-label-md text-label-md uppercase tracking-wider text-tertiary-fixed">DoPT &amp; SPARROW Link</span>
</div>
<p class="font-body-sm text-body-sm text-on-tertiary-container">
            Competency scores are formatted in alignment with the National Training Policy (NTP) and automatically syndicated to the APAR recording workflow.
          </p>
<div class="bg-tertiary p-space-xs rounded text-label-sm font-label-sm text-tertiary-fixed-dim font-mono">
            SYNC-TOKEN: 2025-ISS-L13-NAD-771890
          </div>
</div>
</div>
</div>
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm mt-space-sm">
<div class="flex flex-col lg:flex-row items-center justify-between gap-space-md">
<div class="flex items-center gap-space-sm">
<div class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[24px]">verified</span>
</div>
<div>
<h4 class="font-label-lg text-label-lg text-primary">Sovereign Validation Complete</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant">Dossier cryptographically locked. Action required on remediation enrolments.</p>
</div>
</div>
<div class="flex flex-wrap items-center gap-space-sm w-full lg:w-auto">
<button class="flex-1 sm:flex-none flex items-center justify-center gap-space-xs px-space-md py-2.5 rounded-lg bg-surface-container hover:bg-surface-container-high text-on-surface font-label-md text-label-md transition-all" id="btn-sync" onclick="handleSync(this)">
<span class="material-symbols-outlined text-[18px]">sync</span>
<span>Sync to SPARROW / e-HRMS</span>
</button>
<button class="flex-1 sm:flex-none flex items-center justify-center gap-space-xs px-space-md py-2.5 rounded-lg bg-surface-container hover:bg-surface-container-high text-on-surface font-label-md text-label-md transition-all" id="btn-pdf" onclick="handleDownload(this)">
<span class="material-symbols-outlined text-[18px]">download</span>
<span>Download Certified Ledger (PDF)</span>
</button>
<button class="w-full sm:w-auto flex items-center justify-center gap-space-xs px-space-lg py-2.5 rounded-lg bg-secondary text-on-secondary hover:bg-on-secondary-fixed-variant font-label-md text-label-md transition-colors shadow-sm" onclick="handlePathwayStart()">
<span class="material-symbols-outlined text-[18px]">play_arrow</span>
<span>Commence Prescribed Pathway</span>
</button>
</div>
</div>
</div>
</div>
</div>
<script>
  function handleSync(btn) {
    const originalContent = btn.innerHTML;
    btn.disabled = true;
    btn.innerHTML = `
      <span class="material-symbols-outlined text-[18px] animate-spin">progress_activity</span>
      <span>Authenticating with NIC Gateway...</span>
    `;
    setTimeout(() => {
      btn.innerHTML = `
        <span class="material-symbols-outlined text-[18px] text-secondary">check_circle</span>
        <span>Synced to e-HRMS Dossier</span>
      `;
      setTimeout(() => {
        btn.disabled = false;
        btn.innerHTML = originalContent;
      }, 3500);
    }, 1200);
  }

  function handleDownload(btn) {
    const originalContent = btn.innerHTML;
    btn.disabled = true;
    btn.innerHTML = `
      <span class="material-symbols-outlined text-[18px] animate-bounce">downloading</span>
      <span>Compiling Sealed PDF...</span>
    `;
    setTimeout(() => {
      btn.disabled = false;
      btn.innerHTML = originalContent;
      alert('MoSPI Certified Competency Ledger has been generated and digitally watermarked for Dr. Rajesh Sharma, ISS.');
    }, 1500);
  }

  function handlePathwayStart() {
    alert('Navigating to iGOT Karmayogi remediation queue: Loading Module 1 of NSSTA Cadre Remediation Track.');
  }
</script></main><footer class="w-full bg-surface-container-low text-on-surface-variant py-space-md px-space-lg mt-space-lg"><div class="flex flex-col md:flex-row items-center justify-between gap-space-sm text-body-sm font-body-sm"><span>Gap2Grow Cadre Portal â€¢ National Statistical Systems Training Academy (NSSTA) â€¢ MoSPI</span><span>GIGW-3.0 Compliant â€¢ NIC Gateway Secure Node</span></div></footer></div></body></html>
