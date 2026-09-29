<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';

requireLogin();
$user = currentUser();
$userId = (int)$user['id'];

// Fetch user's overall index and benchmark
$stmtIndex = $pdo->prepare('
    SELECT ROUND(AVG(current_score), 0) as current_idx,
           ROUND(AVG(benchmark_score), 0) as target_idx
    FROM skill_gaps WHERE user_id = ?
');
$stmtIndex->execute([$userId]);
$indices = $stmtIndex->fetch();
$currentIndex = (int)($indices['current_idx'] ?? 74);
$targetIndex = (int)($indices['target_idx'] ?? 85);
$netDeficit = $targetIndex - $currentIndex;

// Fetch all skill gaps for user
$stmt = $pdo->prepare('SELECT * FROM skill_gaps WHERE user_id = ? ORDER BY (benchmark_score - current_score) DESC');
$stmt->execute([$userId]);
$userGaps = $stmt->fetchAll();
?>
<!DOCTYPE html>

<html lang="en"><head><meta charset="utf-8"/><meta content="width=device-width, initial-scale=1.0" name="viewport"/><meta content="web_dashboard" name="shell-type"/><link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/><link href="https://fonts.googleapis.com" rel="preconnect"/><link href="https://fonts.gstatic.com" rel="preconnect"/><link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/><style>@layer base{html,body{margin:0;padding:0;}body{overscroll-behavior:none;}main>:first-child{margin-top:0!important;}main>:last-child{margin-bottom:0!important;}}::-webkit-scrollbar{display:none;}</style><script src="https://cdn.tailwindcss.com"></script><script id="tailwind-config">tailwind.config={darkMode:"class",theme:{extend:{"colors":{"surface-container-lowest":"#ffffff","surface":"#f8f9ff","primary-fixed":"#d5e3ff","secondary-container":"#fc6018","surface-tint":"#495f82","on-background":"#0d1c2f","on-tertiary-fixed":"#00164e","error":"#ba1a1a","on-surface":"#0d1c2f","tertiary-fixed":"#dce1ff","surface-container-highest":"#d5e3fd","on-tertiary":"#ffffff","tertiary-container":"#001e63","on-tertiary-container":"#7088dc","primary":"#001026","surface-container":"#e6eeff","on-surface-variant":"#44474e","background":"#f8f9ff","on-secondary-fixed-variant":"#802a00","on-primary":"#ffffff","tertiary-fixed-dim":"#b6c4ff","secondary":"#a83900","inverse-on-surface":"#ebf1ff","tertiary":"#000c34","on-primary-container":"#778db2","primary-container":"#0b2545","surface-dim":"#ccdbf4","on-primary-fixed":"#001c3b","on-secondary-fixed":"#380d00","inverse-primary":"#b1c7f0","error-container":"#ffdad6","on-error-container":"#93000a","inverse-surface":"#233144","on-tertiary-fixed-variant":"#264191","secondary-fixed":"#ffdbcf","outline":"#74777f","on-primary-fixed-variant":"#314769","on-error":"#ffffff","surface-container-low":"#eff4ff","secondary-fixed-dim":"#ffb59a","surface-variant":"#d5e3fd","on-secondary-container":"#531800","on-secondary":"#ffffff","surface-container-high":"#dde9ff","outline-variant":"#c4c6cf","surface-bright":"#f8f9ff","primary-fixed-dim":"#b1c7f0"},"borderRadius":{"DEFAULT":"0.125rem","lg":"0.25rem","xl":"0.5rem","full":"0.75rem"},"spacing":{"gutter-mobile":"0.75rem","margin-mobile":"1rem","space-lg":"1.5rem","space-sm":"0.5rem","gutter":"1.5rem","space-md":"1rem","space-xs":"0.25rem","margin":"2rem","space-xl":"2.5rem"},"fontFamily":{"label-lg":["Public Sans"],"label-md":["Public Sans"],"body-lg":["Public Sans"],"body-md":["Public Sans"],"headline-lg":["Public Sans"],"headline-xl":["Public Sans"],"headline-lg-mobile":["Public Sans"],"label-sm":["Public Sans"],"headline-md":["Public Sans"],"body-sm":["Public Sans"],"headline-sm":["Public Sans"],"headline-xl-mobile":["Public Sans"]},"fontSize":{"label-lg":["14px",{"lineHeight":"20px","letterSpacing":"0.01em","fontWeight":"600"}],"label-md":["12px",{"lineHeight":"16px","letterSpacing":"0.02em","fontWeight":"600"}],"body-lg":["16px",{"lineHeight":"24px","fontWeight":"400"}],"body-md":["14px",{"lineHeight":"20px","fontWeight":"400"}],"headline-lg":["28px",{"lineHeight":"36px","letterSpacing":"-0.01em","fontWeight":"700"}],"headline-xl":["36px",{"lineHeight":"44px","letterSpacing":"-0.02em","fontWeight":"700"}],"headline-lg-mobile":["22px",{"lineHeight":"30px","letterSpacing":"0em","fontWeight":"700"}],"label-sm":["11px",{"lineHeight":"14px","letterSpacing":"0.03em","fontWeight":"600"}],"headline-md":["22px",{"lineHeight":"28px","fontWeight":"600"}],"body-sm":["12px",{"lineHeight":"18px","fontWeight":"400"}],"headline-sm":["18px",{"lineHeight":"24px","fontWeight":"600"}],"headline-xl-mobile":["28px",{"lineHeight":"36px","letterSpacing":"-0.01em","fontWeight":"700"}]}}}}</script></head><body class="bg-surface font-body-md text-body-md text-on-surface antialiased"><aside class="fixed left-0 top-0 h-full w-72 bg-primary-container text-on-primary z-50 flex flex-col justify-between shadow-[0_4px_20px_rgba(11,37,69,0.25)]"><div class="flex flex-col"><div class="px-space-md py-space-sm bg-primary flex items-center justify-between"><div class="flex items-center gap-space-xs"><span class="material-symbols-outlined text-secondary-container text-[20px]">verified</span><span class="font-label-sm text-label-sm tracking-wide text-primary-fixed">GIGW 3.0 | iGOT Live</span></div><span class="w-2 h-2 rounded-full bg-secondary-container animate-pulse"></span></div><div class="p-space-md bg-tertiary-container"><div class="flex items-center gap-space-sm"><div class="w-11 h-11 rounded-full bg-primary flex items-center justify-center"><span class="material-symbols-outlined text-on-primary text-[24px]">person</span></div><div class="min-w-0 flex-1"><div class="font-label-lg text-label-lg text-on-tertiary truncate">Dr. Rajesh Sharma, ISS</div><div class="font-body-sm text-body-sm text-on-tertiary-container truncate">Joint Director, NAD (CSO)</div></div></div><div class="mt-space-sm pt-space-xs flex items-center justify-between text-label-sm font-label-sm"><span class="bg-secondary text-on-secondary px-2 py-0.5 rounded">ISS Cadre</span><span class="text-primary-fixed truncate">ID: ISS-2008-0412</span></div></div><nav class="px-space-sm py-space-md space-y-1 flex flex-col" data-active-classes="bg-primary text-on-primary font-bold"><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="learner-dashboard" href="<?= BASE_URL ?>/pages/dashboard.php"><span class="material-symbols-outlined text-[20px]">space_dashboard</span><span>Learner Dashboard</span></a><a aria-current="page" class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg transition-colors bg-primary text-on-primary font-bold" data-path="skill-gap-analysis" href="<?= BASE_URL ?>/pages/skill-gap.php"><span class="material-symbols-outlined text-[20px]">monitoring</span><span>Skill-Gap Analysis</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="my-learning-path" href="<?= BASE_URL ?>/pages/learning-path.php"><span class="material-symbols-outlined text-[20px]">route</span><span>My Learning Path</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="ai-assessment-generator" href="<?= BASE_URL ?>/pages/assessment-generator.php"><span class="material-symbols-outlined text-[20px]">psychology</span><span>AI Assessment Generator</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="igot-course-catalog" href="<?= BASE_URL ?>/pages/igot-courses.php"><span class="material-symbols-outlined text-[20px]">menu_book</span><span>iGOT Course Catalog</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="nssta-tpac-nominations" href="<?= BASE_URL ?>/pages/nssta-programmes.php"><span class="material-symbols-outlined text-[20px]">assignment_ind</span><span>NSSTA TPAC Nominations</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="cadre-analytics" href="<?= BASE_URL ?>/pages/cadre-analytics.php"><span class="material-symbols-outlined text-[20px]">analytics</span><span>Cadre Analytics</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="settings-profile" href="<?= BASE_URL ?>/pages/settings.php"><span class="material-symbols-outlined text-[20px]">manage_accounts</span><span>Settings &amp; Profile</span></a></nav></div><div class="p-space-md bg-tertiary text-on-tertiary"><div class="text-label-sm font-label-sm text-tertiary-fixed-dim uppercase tracking-wider mb-space-xs">Sync Status</div><div class="space-y-1 text-label-sm font-label-sm mb-space-md"><div class="flex items-center justify-between text-on-tertiary"><span>iGOT Karmayogi API</span><span class="text-secondary-fixed">v2.4 Live</span></div><div class="flex items-center justify-between text-on-tertiary"><span>SPARROW / e-HRMS</span><span class="text-secondary-fixed">Active</span></div></div><div class="flex items-center justify-between pt-space-xs"><a class="flex items-center gap-space-xs text-secondary-fixed hover:text-on-tertiary text-label-sm font-label-sm" href="<?= BASE_URL ?>/logout.php"><span class="material-symbols-outlined text-[16px]">logout</span><span>Sign Out</span></a><span class="text-tertiary-fixed-dim text-label-sm font-label-sm">NSSTA-ISS</span></div></div></aside><div class="pl-72"><header class="fixed top-0 left-72 right-0 h-16 bg-surface-container-lowest/90 backdrop-blur-md shadow-[0_1px_8px_rgba(11,37,69,0.06)] z-40 flex items-center justify-between px-space-lg"><div class="flex items-center gap-space-sm text-body-sm font-body-sm text-on-surface-variant"><span>भारत सरकार | MoSPI Official Statistical Cadre Intelligence</span></div><div class="flex items-center gap-space-md"><div class="flex items-center gap-space-xs bg-surface-container-low px-space-sm py-1 rounded-full text-label-sm font-label-sm text-on-surface"><span class="w-2 h-2 rounded-full bg-secondary"></span><span>NAD Division</span></div><div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center"><span class="material-symbols-outlined text-on-primary text-[18px]">person</span></div></div></header><main class="relative pt-16 w-full px-space-lg bg-surface min-h-[calc(100vh-64px)]"><div class="flex flex-col w-full pb-space-xl">
<!-- Top Sovereign Operational Bar & Officer Dossier Header -->
<section class="w-full bg-surface-container-lowest rounded-xl shadow-sm p-space-lg mb-space-lg relative overflow-hidden">
<div class="absolute right-0 top-0 w-96 h-full bg-gradient-to-l from-primary-fixed/30 to-transparent pointer-events-none"></div>
<div class="flex flex-col lg:flex-row lg:items-center justify-between gap-space-md relative z-10">
<!-- Officer Profile Identification -->
<div class="flex items-start gap-space-md">
<div class="relative">
<div class="w-16 h-16 rounded-full bg-primary text-on-primary flex items-center justify-center font-headline-md text-headline-md shadow-md">
            RS
          </div>
<span class="absolute bottom-0 right-0 w-4 h-4 rounded-full bg-secondary border-2 border-surface-container-lowest" title="Active ISS Senior Cadre"></span>
</div>
<div class="flex flex-col">
<div class="flex flex-wrap items-center gap-space-xs">
<h1 class="font-headline-md text-headline-md text-on-surface">Dr. Rajesh Sharma, ISS</h1>
<span class="bg-primary-container text-on-primary text-label-sm font-label-sm px-2.5 py-0.5 rounded-full uppercase tracking-wider">
              CADRE ID: ISS-2008-0412
            </span>
<span class="bg-surface-container-high text-on-surface-variant text-label-sm font-label-sm px-2 py-0.5 rounded">
              GIGW 3.0 Verified
            </span>
</div>
<p class="font-body-md text-body-md text-on-surface-variant mt-0.5">
            Joint Director • National Accounts Division (NAD), Central Statistics Office
          </p>
<div class="flex items-center gap-space-xs text-label-sm font-label-sm text-secondary font-semibold mt-1">
<span class="material-symbols-outlined text-[16px]">stars</span>
<span>Target Benchmark: Director / Level-13A (National Accounts &amp; Macroeconomic Aggregates)</span>
</div>
</div>
</div>
<!-- Live Competency Gap KPI Pills -->
<div class="flex flex-wrap items-center gap-space-sm bg-surface-container-low p-space-sm rounded-xl">
<!-- Current Assessed -->
<div class="px-space-md py-2 bg-surface-container-lowest rounded-lg shadow-sm">
<span class="font-label-sm text-label-sm text-on-surface-variant block uppercase">Current Index</span>
<div class="flex items-baseline gap-1 mt-0.5">
<span class="font-headline-md text-headline-md text-on-surface font-bold">74</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">/100</span>
</div>
</div>
<!-- Target Requirement -->
<div class="px-space-md py-2 bg-surface-container-lowest rounded-lg shadow-sm">
<span class="font-label-sm text-label-sm text-on-surface-variant block uppercase">L-13A Target</span>
<div class="flex items-baseline gap-1 mt-0.5">
<span class="font-headline-md text-headline-md text-on-surface font-bold">85</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">/100</span>
</div>
</div>
<!-- Net Competency Gap -->
<div class="px-space-md py-2 bg-error-container text-on-error-container rounded-lg shadow-sm">
<span class="font-label-sm text-label-sm text-on-error-container font-semibold block uppercase">Net Deficit</span>
<div class="flex items-baseline gap-1 mt-0.5">
<span class="font-headline-md text-headline-md text-error font-bold">-11</span>
<span class="font-label-sm text-label-sm text-on-error-container">pts</span>
</div>
</div>
<!-- Bridge Load -->
<div class="px-space-md py-2 bg-primary-container text-on-primary rounded-lg shadow-sm">
<span class="font-label-sm text-label-sm text-primary-fixed-dim block uppercase">Target Load</span>
<div class="flex items-baseline gap-1 mt-0.5">
<span class="font-headline-md text-headline-md text-on-primary font-bold">34</span>
<span class="font-label-sm text-label-sm text-primary-fixed">Hrs / 4 Modules</span>
</div>
</div>
</div>
</div>
<!-- AI Cadre Diagnostic Rationale Banner -->
<div class="mt-space-md pt-space-md bg-surface-container p-space-md rounded-xl flex flex-col md:flex-row items-start md:items-center justify-between gap-space-md">
<div class="flex items-start gap-space-sm max-w-4xl">
<span class="material-symbols-outlined text-secondary text-[24px] mt-0.5 shrink-0" style="font-variation-settings: 'FILL' 1;">psychology</span>
<div>
<span class="font-label-md text-label-md text-on-surface uppercase tracking-wide font-bold">Official AI Cadre Diagnosis Summary</span>
<p class="font-body-md text-body-md text-on-surface-variant mt-0.5 leading-relaxed">
            4 critical competencies require targeted upskilling for promotion transition to Level-13A. Empirical review validates exceptional mastery in <strong class="text-on-surface">National Accounting &amp; Input-Output modeling (+2% over standard)</strong>, while detecting strategic capabilities gaps in <strong class="text-secondary">High-Frequency Machine Learning Nowcasting</strong> and <strong class="text-secondary">Spatial GIS Microdata Disaggregation</strong>.
          </p>
</div>
</div>
<div class="flex items-center gap-space-xs shrink-0 w-full md:w-auto">
<button class="px-space-md h-10 rounded-lg bg-surface-container-lowest text-on-surface hover:bg-surface-container-high transition-colors font-label-md text-label-md flex items-center justify-center gap-1.5 shadow-sm w-full md:w-auto" onclick="document.getElementById('audit-dialog').classList.remove('hidden')">
<span class="material-symbols-outlined text-[18px]">verified</span>
<span>View Audit Stamp</span>
</button>
<button class="px-space-md h-10 rounded-lg bg-secondary text-on-secondary hover:bg-on-secondary-container transition-colors font-label-md text-label-md flex items-center justify-center gap-1.5 shadow-md w-full md:w-auto" onclick="window.location.href='<?= BASE_URL ?>/pages/learning-path.php'">
<span class="material-symbols-outlined text-[18px]">play_arrow</span>
<span>Start AI Pathway</span>
</button>
</div>
</div>
</section>
<!-- Competency Domain Navigation Tabs -->
<nav aria-label="Skill-Gap Domains" class="flex flex-wrap items-center justify-between gap-space-sm mb-space-lg">
<div class="flex flex-wrap items-center gap-space-xs bg-surface-container-lowest p-1.5 rounded-xl shadow-sm">
<button class="px-space-md py-2 rounded-lg bg-primary text-on-primary font-label-md text-label-md shadow-sm transition-all flex items-center gap-1.5">
<span>All Competencies</span>
<span class="px-1.5 py-0.5 rounded-full bg-surface-container-lowest/20 text-on-primary text-label-sm font-label-sm">9</span>
</button>
<button class="px-space-md py-2 rounded-lg text-on-surface-variant hover:bg-surface-container-high font-label-md text-label-md transition-colors flex items-center gap-1.5">
<span>Statistical Core</span>
<span class="px-1.5 py-0.5 rounded-full bg-surface-container text-on-surface-variant text-label-sm font-label-sm">3</span>
</button>
<button class="px-space-md py-2 rounded-lg text-on-surface-variant hover:bg-surface-container-high font-label-md text-label-md transition-colors flex items-center gap-1.5">
<span>Technical &amp; Big Data</span>
<span class="px-1.5 py-0.5 rounded-full bg-surface-container text-on-surface-variant text-label-sm font-label-sm">3</span>
</button>
<button class="px-space-md py-2 rounded-lg text-on-surface-variant hover:bg-surface-container-high font-label-md text-label-md transition-colors flex items-center gap-1.5">
<span>Digital Governance &amp; DPI</span>
<span class="px-1.5 py-0.5 rounded-full bg-surface-container text-on-surface-variant text-label-sm font-label-sm">2</span>
</button>
<button class="px-space-md py-2 rounded-lg text-on-surface-variant hover:bg-surface-container-high font-label-md text-label-md transition-colors flex items-center gap-1.5">
<span>Executive Leadership</span>
<span class="px-1.5 py-0.5 rounded-full bg-surface-container text-on-surface-variant text-label-sm font-label-sm">1</span>
</button>
</div>
<!-- Active Urgency Filter Pill -->
<div class="flex items-center gap-space-xs bg-surface-container-lowest px-space-md py-2 rounded-xl shadow-sm text-label-md font-label-md text-on-surface">
<span class="w-2.5 h-2.5 rounded-full bg-error animate-pulse"></span>
<span class="text-on-surface-variant">Urgency Filter:</span>
<span class="text-error font-bold">Critical &amp; High Priority (3)</span>
</div>
</nav>
<!-- Dual Workspace: 8-Col Analytical Diagnosis + 4-Col Induction Pathway -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-space-lg items-start">
<!-- LEFT COLUMN: Comparative Skill-Gap Cards (8 cols) -->
<div class="lg:col-span-8 space-y-space-md">
<!-- Card 1: GIS & Spatial Data Modeling -->
<article class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm hover:shadow-md transition-shadow relative overflow-hidden">
<div class="w-1.5 absolute left-0 top-0 bottom-0 bg-error"></div>
<div class="flex flex-col md:flex-row md:items-start justify-between gap-space-sm mb-space-sm pl-space-xs">
<div>
<div class="flex items-center gap-space-xs">
<span class="bg-error-container text-on-error-container px-2.5 py-0.5 rounded-full font-label-sm text-label-sm font-bold flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">warning</span> Critical Priority
              </span>
<span class="text-label-sm font-label-sm text-on-surface-variant">Domain: Statistical Modernization</span>
</div>
<h2 class="font-headline-sm text-headline-sm text-on-surface mt-1.5">GIS &amp; Spatial Data Disaggregation</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">Cadre Skill Code: <span class="font-mono text-on-surface">STAT-GIS-MOD-402</span> • Required for Urban Frame Survey (UFS) Geospatial Shift</p>
</div>
<div class="flex flex-col items-end shrink-0">
<span class="font-label-lg text-label-lg text-error font-bold">-36% Critical Gap</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Assessed: Level 2 • Target: Level 4</span>
</div>
</div>
<!-- Comparative Meter -->
<div class="pl-space-xs my-space-md bg-surface-container-low p-space-md rounded-lg">
<div class="flex items-center justify-between text-label-sm font-label-sm text-on-surface-variant mb-1">
<span class="flex items-center gap-1"><span class="w-2.5 h-2.5 rounded-sm bg-error"></span> Current Proficiency: <strong>44%</strong></span>
<span class="flex items-center gap-1"><span class="w-2.5 h-2.5 rounded-sm bg-primary-container"></span> Level-13A Target Benchmark: <strong>80%</strong></span>
</div>
<div class="relative w-full h-3 bg-surface-container-highest rounded-full overflow-hidden">
<!-- Current fill -->
<div class="absolute top-0 left-0 h-full bg-error rounded-full" style="width: 44%"></div>
<!-- Target marker -->
<div class="absolute top-0 bottom-0 w-1 bg-primary-container" style="left: 80%" title="Target 80%"></div>
</div>
<div class="flex justify-between text-label-sm font-label-sm text-on-surface-variant mt-1">
<span>Level 1 (Fundamental)</span>
<span>Level 2 (Working)</span>
<span class="text-error font-semibold">â† Current (44%)</span>
<span class="text-primary-container font-semibold">↑ Target Benchmark (80%)</span>
<span>Level 5 (Cadre SME)</span>
</div>
</div>
<!-- Diagnostic Rationale & Recommendation -->
<div class="pl-space-xs grid grid-cols-1 md:grid-cols-2 gap-space-sm pt-space-xs">
<div class="bg-surface-container p-space-sm rounded-lg">
<div class="flex items-center gap-1 text-label-sm font-label-sm text-on-surface font-semibold mb-1">
<span class="material-symbols-outlined text-[16px] text-secondary">analytics</span>
<span>AI Diagnostic Rationale</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
              Assessment logs indicate lack of automated QGIS/ArcGIS script pipelines for the ongoing National Census &amp; Urban Frame Survey digital transformation. Microdata remains bound to tabular CSVs without geospatial shapefile tagging.
            </p>
</div>
<div class="bg-primary-container text-on-primary p-space-sm rounded-lg">
<div class="flex items-center justify-between text-label-sm font-label-sm text-primary-fixed mb-1">
<span class="flex items-center gap-1">
<span class="material-symbols-outlined text-[16px] text-secondary-container">school</span>
<span>Prescribed Remediation</span>
</span>
<span class="text-secondary-fixed bg-tertiary-container px-1.5 py-0.2 rounded text-[10px]">NSSTA Accredited</span>
</div>
<p class="font-body-sm text-body-sm text-on-primary-container">
              Enrol in <strong class="text-on-primary">iGOT #MOSPI-GIS-204</strong> + attend the 3-day Residential Lab at NSSTA Greater Noida.
            </p>
<div class="mt-2 flex items-center justify-between font-label-sm text-label-sm text-primary-fixed-dim">
<span>Duration: 14.0 Study Hours</span>
<a class="text-secondary-fixed font-semibold hover:underline flex items-center gap-0.5" href="<?= BASE_URL ?>/pages/igot-courses.php">Enroll Module <span class="material-symbols-outlined text-[14px]">chevron_right</span></a>
</div>
</div>
</div>
</article>
<!-- Card 2: Machine Learning & Big Data Analytics -->
<article class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm hover:shadow-md transition-shadow relative overflow-hidden">
<div class="w-1.5 absolute left-0 top-0 bottom-0 bg-secondary"></div>
<div class="flex flex-col md:flex-row md:items-start justify-between gap-space-sm mb-space-sm pl-space-xs">
<div>
<div class="flex items-center gap-space-xs">
<span class="bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm px-2.5 py-0.5 rounded-full font-bold flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">priority_high</span> High Priority
              </span>
<span class="text-label-sm font-label-sm text-on-surface-variant">Domain: Macroeconomic Analytics</span>
</div>
<h2 class="font-headline-sm text-headline-sm text-on-surface mt-1.5">Machine Learning &amp; High-Frequency Nowcasting</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">Cadre Skill Code: <span class="font-mono text-on-surface">NAD-BIGDATA-501</span> • Core to Monthly Real-Time GDP Nowcasting</p>
</div>
<div class="flex flex-col items-end shrink-0">
<span class="font-label-lg text-label-lg text-secondary font-bold">-26% Significant Gap</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Assessed: Level 2.5 • Target: Level 4</span>
</div>
</div>
<!-- Comparative Meter -->
<div class="pl-space-xs my-space-md bg-surface-container-low p-space-md rounded-lg">
<div class="flex items-center justify-between text-label-sm font-label-sm text-on-surface-variant mb-1">
<span class="flex items-center gap-1"><span class="w-2.5 h-2.5 rounded-sm bg-secondary"></span> Current Proficiency: <strong>52%</strong></span>
<span class="flex items-center gap-1"><span class="w-2.5 h-2.5 rounded-sm bg-primary-container"></span> Level-13A Target Benchmark: <strong>78%</strong></span>
</div>
<div class="relative w-full h-3 bg-surface-container-highest rounded-full overflow-hidden">
<div class="absolute top-0 left-0 h-full bg-secondary rounded-full" style="width: 52%"></div>
<div class="absolute top-0 bottom-0 w-1 bg-primary-container" style="left: 78%" title="Target 78%"></div>
</div>
<div class="flex justify-between text-label-sm font-label-sm text-on-surface-variant mt-1">
<span>Level 1</span>
<span class="text-secondary font-semibold">Current (52%)</span>
<span class="text-primary-container font-semibold">↑ Target Benchmark (78%)</span>
<span>Level 5</span>
</div>
</div>
<!-- Diagnostic Rationale & Recommendation -->
<div class="pl-space-xs grid grid-cols-1 md:grid-cols-2 gap-space-sm pt-space-xs">
<div class="bg-surface-container p-space-sm rounded-lg">
<div class="flex items-center gap-1 text-label-sm font-label-sm text-on-surface font-semibold mb-1">
<span class="material-symbols-outlined text-[16px] text-secondary">neurology</span>
<span>AI Diagnostic Rationale</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
              Officer shows strong econometric regression skills (EViews/Stata) but requires conversion to Scikit-Learn/Python libraries to ingest e-Way bills and GSTN high-frequency transactional feeds for Flash GDP nowcasts.
            </p>
</div>
<div class="bg-primary-container text-on-primary p-space-sm rounded-lg">
<div class="flex items-center justify-between text-label-sm font-label-sm text-primary-fixed mb-1">
<span class="flex items-center gap-1">
<span class="material-symbols-outlined text-[16px] text-secondary-container">play_circle</span>
<span>Curated Track</span>
</span>
<span class="text-primary-fixed bg-tertiary-container px-1.5 py-0.2 rounded text-[10px]">iGOT Karmayogi v2.4</span>
</div>
<p class="font-body-sm text-body-sm text-on-primary-container">
              Track: <strong class="text-on-primary">Python Machine Learning for Official Macro Data (Level II)</strong>. Self-paced interactive Jupyter notebooks.
            </p>
<div class="mt-2 flex items-center justify-between font-label-sm text-label-sm text-primary-fixed-dim">
<span>Duration: 12.0 Hours</span>
<a class="text-secondary-fixed font-semibold hover:underline flex items-center gap-0.5" href="<?= BASE_URL ?>/pages/learning-path.php">Launch Sandbox <span class="material-symbols-outlined text-[14px]">chevron_right</span></a>
</div>
</div>
</div>
</article>
<!-- Card 3: APIs & Digital Public Infrastructure (DPI) -->
<article class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm hover:shadow-md transition-shadow relative overflow-hidden">
<div class="w-1.5 absolute left-0 top-0 bottom-0 bg-secondary"></div>
<div class="flex flex-col md:flex-row md:items-start justify-between gap-space-sm mb-space-sm pl-space-xs">
<div>
<div class="flex items-center gap-space-xs">
<span class="bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm px-2.5 py-0.5 rounded-full font-bold flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">hub</span> High Priority
              </span>
<span class="text-label-sm font-label-sm text-on-surface-variant">Domain: Interoperability &amp; Governance</span>
</div>
<h2 class="font-headline-sm text-headline-sm text-on-surface mt-1.5">APIs &amp; Digital Public Infrastructure (DPI) Pipelines</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">Cadre Skill Code: <span class="font-mono text-on-surface">GOV-API-DPI-309</span> • RBI-MoSPI Data Warehouse Linkage</p>
</div>
<div class="flex flex-col items-end shrink-0">
<span class="font-label-lg text-label-lg text-secondary font-bold">-26% Interop Gap</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Assessed: Level 2.8 • Target: Level 4</span>
</div>
</div>
<div class="pl-space-xs my-space-md bg-surface-container-low p-space-md rounded-lg">
<div class="flex items-center justify-between text-label-sm font-label-sm text-on-surface-variant mb-1">
<span class="flex items-center gap-1"><span class="w-2.5 h-2.5 rounded-sm bg-secondary"></span> Current Proficiency: <strong>56%</strong></span>
<span class="flex items-center gap-1"><span class="w-2.5 h-2.5 rounded-sm bg-primary-container"></span> Level-13A Target Benchmark: <strong>82%</strong></span>
</div>
<div class="relative w-full h-3 bg-surface-container-highest rounded-full overflow-hidden">
<div class="absolute top-0 left-0 h-full bg-secondary rounded-full" style="width: 56%"></div>
<div class="absolute top-0 bottom-0 w-1 bg-primary-container" style="left: 82%" title="Target 82%"></div>
</div>
</div>
<div class="pl-space-xs grid grid-cols-1 md:grid-cols-2 gap-space-sm pt-space-xs">
<div class="bg-surface-container p-space-sm rounded-lg">
<div class="flex items-center gap-1 text-label-sm font-label-sm text-on-surface font-semibold mb-1">
<span class="material-symbols-outlined text-[16px] text-secondary">cloud_sync</span>
<span>AI Diagnostic Rationale</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
              Interoperability audit reveals reliance on manual batch SFTP file exchanges. Needs transition to secure API keys, JSON payloads, and automated pulls from Open Government Data (OGD) and RBI DBIE pipelines.
            </p>
</div>
<div class="bg-primary-container text-on-primary p-space-sm rounded-lg">
<div class="flex items-center justify-between text-label-sm font-label-sm text-primary-fixed mb-1">
<span class="flex items-center gap-1">
<span class="material-symbols-outlined text-[16px] text-secondary-container">developer_board</span>
<span>Remediation Track</span>
</span>
<span class="text-primary-fixed bg-tertiary-container px-1.5 py-0.2 rounded text-[10px]">NIC Certified</span>
</div>
<p class="font-body-sm text-body-sm text-on-primary-container">
              Course: <strong class="text-on-primary">DPI Protocols &amp; Sovereign REST API Architecture</strong>. Complete with Postman test harnesses.
            </p>
<div class="mt-2 flex items-center justify-between font-label-sm text-label-sm text-primary-fixed-dim">
<span>Duration: 8.0 Hours</span>
<a class="text-secondary-fixed font-semibold hover:underline flex items-center gap-0.5" href="<?= BASE_URL ?>/pages/igot-courses.php">Start Unit <span class="material-symbols-outlined text-[14px]">chevron_right</span></a>
</div>
</div>
</div>
</article>
<!-- Card 4: National Accounts & Supply-Use Tables (Cadre Excellence Benchmark) -->
<article class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm hover:shadow-md transition-shadow relative overflow-hidden">
<div class="w-1.5 absolute left-0 top-0 bottom-0 bg-secondary-container"></div>
<div class="flex flex-col md:flex-row md:items-start justify-between gap-space-sm mb-space-sm pl-space-xs">
<div>
<div class="flex items-center gap-space-xs">
<span class="bg-surface-container-highest text-on-surface px-2.5 py-0.5 rounded-full font-label-sm text-label-sm font-bold flex items-center gap-1">
<span class="material-symbols-outlined text-[14px] text-secondary">verified</span> Cadre Excellence • Mentor Level
              </span>
<span class="text-label-sm font-label-sm text-on-surface-variant">Domain: Core Economics</span>
</div>
<h2 class="font-headline-sm text-headline-sm text-on-surface mt-1.5">National Accounts Compilation &amp; Supply-Use Tables (SUT)</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">Cadre Skill Code: <span class="font-mono text-on-surface">SNA-2008-IO-001</span> • Senior Expert &amp; Training Evaluator</p>
</div>
<div class="flex flex-col items-end shrink-0">
<span class="font-label-lg text-label-lg text-on-surface font-bold text-secondary-container">+2% Exceeded</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Assessed: Level 4.6 • Target: Level 4.5</span>
</div>
</div>
<div class="pl-space-xs my-space-md bg-surface-container-low p-space-md rounded-lg">
<div class="flex items-center justify-between text-label-sm font-label-sm text-on-surface-variant mb-1">
<span class="flex items-center gap-1"><span class="w-2.5 h-2.5 rounded-sm bg-secondary-container"></span> Assessed Level: <strong>92%</strong></span>
<span class="flex items-center gap-1"><span class="w-2.5 h-2.5 rounded-sm bg-primary-container"></span> Level-13A Target: <strong>90%</strong></span>
</div>
<div class="relative w-full h-3 bg-surface-container-highest rounded-full overflow-hidden">
<div class="absolute top-0 left-0 h-full bg-secondary-container rounded-full" style="width: 92%"></div>
<div class="absolute top-0 bottom-0 w-1 bg-primary-container" style="left: 90%" title="Target 90%"></div>
</div>
</div>
<div class="pl-space-xs bg-surface-container p-space-sm rounded-lg flex items-center justify-between">
<div class="flex items-center gap-space-sm">
<span class="material-symbols-outlined text-secondary text-[24px]">workspace_premium</span>
<p class="font-body-sm text-body-sm text-on-surface">
<strong class="font-semibold">Cadre Recommendation:</strong> Recommended as Faculty Mentor for NSSTA 47th ISS Induction Batch on System of National Accounts (SNA 2025 rev).
            </p>
</div>
<span class="bg-surface-container-lowest text-on-surface font-label-sm text-label-sm px-3 py-1 rounded-full shadow-sm shrink-0">
            Designated Cadre Mentor
          </span>
</div>
</article>
</div>
<!-- RIGHT COLUMN: Targeted Induction Pathway & Official Verification (4 cols) -->
<div class="lg:col-span-4 space-y-space-md" id="pathway-section">
<!-- Target Induction Summary Card -->
<div class="bg-primary text-on-primary rounded-xl p-space-lg shadow-md relative overflow-hidden">
<div class="absolute -right-12 -top-12 w-40 h-40 bg-secondary-container/20 rounded-full blur-2xl pointer-events-none"></div>
<div class="flex items-center justify-between border-b border-surface-tint/30 pb-space-sm mb-space-md">
<div class="flex items-center gap-1.5">
<span class="material-symbols-outlined text-secondary-fixed text-[20px]">route</span>
<span class="font-label-lg text-label-lg font-bold text-on-primary">Targeted Induction Pathway</span>
</div>
<span class="bg-secondary text-on-secondary text-label-sm font-label-sm px-2 py-0.5 rounded font-semibold uppercase">
            Fast-Track
          </span>
</div>
<!-- Metric Projection -->
<div class="grid grid-cols-2 gap-space-sm mb-space-md">
<div class="bg-primary-container p-space-sm rounded-lg">
<span class="font-label-sm text-label-sm text-primary-fixed-dim uppercase block">Mandatory Load</span>
<span class="font-headline-sm text-headline-sm font-bold text-on-primary">34.0 <span class="text-body-sm font-normal text-primary-fixed">Hrs</span></span>
<span class="text-[11px] text-primary-fixed-dim block mt-0.5">Flexible 6-week window</span>
</div>
<div class="bg-primary-container p-space-sm rounded-lg">
<span class="font-label-sm text-label-sm text-primary-fixed-dim uppercase block">Projected Score</span>
<span class="font-headline-sm text-headline-sm font-bold text-secondary-fixed">88.4 <span class="text-body-sm font-normal text-primary-fixed">/100</span></span>
<span class="text-[11px] text-secondary-fixed block mt-0.5">+14.4 Net Growth</span>
</div>
</div>
<!-- Call to Action -->
<button class="w-full py-3 px-space-md rounded-lg bg-secondary hover:bg-secondary-container transition-colors text-on-secondary font-label-lg text-label-lg flex items-center justify-center gap-2 shadow-lg mb-space-xs">
<span class="material-symbols-outlined text-[20px]">flag</span>
<span>Commence 5-Phase Pathway</span>
</button>
<p class="text-[11px] text-center text-primary-fixed-dim">Auto-syncs with DoPT e-HRMS and SPARROW appraisal ledger</p>
</div>
<!-- Personalized Learning Roadmap (5 Strategic Phases) -->
<div class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm">
<h3 class="font-headline-sm text-headline-sm text-on-surface mb-space-md flex items-center justify-between">
<span>Cadre Strategic Roadmap</span>
<span class="text-label-sm font-label-sm text-on-surface-variant font-normal">5 Phases</span>
</h3>
<div class="relative pl-6 space-y-space-md before:content-[''] before:absolute before:left-2 before:top-2 before:bottom-2 before:w-0.5 before:bg-surface-container-highest">
<!-- Phase 1 -->
<div class="relative group">
<span class="absolute -left-[27px] top-1 w-4 h-4 rounded-full bg-secondary border-2 border-surface-container-lowest shadow-sm"></span>
<div>
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md text-secondary font-bold">Phase 1: Foundation</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">8.0 Hrs</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface font-semibold mt-0.5">Python &amp; API Data Pipelines for Official Statistics</p>
<span class="inline-block mt-1 font-label-sm text-label-sm text-on-surface-variant bg-surface-container-low px-2 py-0.5 rounded">iGOT Micro-learning Track</span>
</div>
</div>
<!-- Phase 2 -->
<div class="relative group">
<span class="absolute -left-[27px] top-1 w-4 h-4 rounded-full bg-surface-container-highest border-2 border-surface-container-lowest"></span>
<div>
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md text-on-surface font-bold">Phase 2: Applied Learning</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">12.0 Hrs</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">Machine Learning on High-Frequency Economic Indicators</p>
<span class="inline-block mt-1 font-label-sm text-label-sm text-on-surface-variant bg-surface-container-low px-2 py-0.5 rounded">e-Way &amp; GSTN Data Sandbox</span>
</div>
</div>
<!-- Phase 3 -->
<div class="relative group">
<span class="absolute -left-[27px] top-1 w-4 h-4 rounded-full bg-surface-container-highest border-2 border-surface-container-lowest"></span>
<div>
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md text-on-surface font-bold">Phase 3: NSSTA Lab</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">14.0 Hrs</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">Spatial GIS Microdata Disaggregation Workshop</p>
<span class="inline-block mt-1 font-label-sm text-label-sm text-on-surface-variant bg-surface-container-low px-2 py-0.5 rounded">Greater Noida • 3-Day Residential</span>
</div>
</div>
<!-- Phase 4 -->
<div class="relative group">
<span class="absolute -left-[27px] top-1 w-4 h-4 rounded-full bg-surface-container-highest border-2 border-surface-container-lowest"></span>
<div>
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md text-on-surface font-bold">Phase 4: Adaptive Audit</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">1.0 Hr</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">AI Proctored Simulation: 45 Scenario Inquiries</p>
<span class="inline-block mt-1 font-label-sm text-label-sm text-on-surface-variant bg-surface-container-low px-2 py-0.5 rounded">Adaptive Competency Validation</span>
</div>
</div>
<!-- Phase 5 -->
<div class="relative group">
<span class="absolute -left-[27px] top-1 w-4 h-4 rounded-full bg-surface-container-highest border-2 border-surface-container-lowest"></span>
<div>
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md text-on-surface font-bold">Phase 5: Cadre Endorsement</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Final</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">Level-13A Promotion Clearance &amp; NIC Signature Token</p>
<span class="inline-block mt-1 font-label-sm text-label-sm text-on-surface-variant bg-surface-container-low px-2 py-0.5 rounded">Director NSSTA Sign-off</span>
</div>
</div>
</div>
</div>
<!-- Institutional Verification Box -->
<div class="bg-surface-container-low rounded-xl p-space-md shadow-sm">
<div class="flex items-center gap-space-xs text-primary font-label-md text-label-md font-bold mb-1">
<span class="material-symbols-outlined text-[18px]">security</span>
<span>Official Audit Protocol</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">
          Dossier Ref: <span class="font-mono text-on-surface">#MOSPI/NSSTA/2025/ISS-8492</span><br/>
          Validated by: Automated Competency Engine v4.2 under DoPT Mission Karmayogi Framework.
        </p>
<button class="w-full mt-space-sm py-2 px-space-sm bg-surface-container-lowest hover:bg-surface-container-high transition-colors rounded-lg font-label-md text-label-md text-on-surface flex items-center justify-center gap-1.5 shadow-sm" onclick="document.getElementById('audit-dialog').classList.remove('hidden')">
<span class="material-symbols-outlined text-[16px]">print</span>
<span>Export Official Audit (PDF w/ NIC Stamp)</span>
</button>
</div>
</div>
</div>
<!-- NIC Audit & Verification Dialog (Modal) -->
<div class="fixed inset-0 bg-primary/60 backdrop-blur-sm z-50 flex items-center justify-center p-space-md hidden" id="audit-dialog">
<div class="bg-surface-container-lowest rounded-xl max-w-xl w-full shadow-2xl overflow-hidden p-space-lg relative animate-in fade-in zoom-in duration-150">
<!-- Close Button -->
<button class="absolute top-4 right-4 text-on-surface-variant hover:text-on-surface p-1 rounded-lg" onclick="document.getElementById('audit-dialog').classList.add('hidden')">
<span class="material-symbols-outlined text-[20px]">close</span>
</button>
<!-- Sovereign Seal Header -->
<div class="text-center pb-space-md border-b border-surface-container-highest">
<div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-primary text-on-primary mb-2 shadow-md">
<span class="material-symbols-outlined text-[24px]">verified_user</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface">National Statistical Systems Training Academy (NSSTA)</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">Ministry of Statistics and Programme Implementation • Government of India</p>
<div class="mt-2 inline-block px-3 py-1 bg-surface-container text-label-sm font-label-sm text-on-surface font-mono rounded">
          CERTIFICATE OF CADRE COMPETENCY DIAGNOSIS #ISS-2025-0412-AUD
        </div>
</div>
<!-- Dossier Metadata Grid -->
<div class="my-space-md space-y-space-xs font-body-sm text-body-sm">
<div class="flex justify-between py-1 border-b border-surface-container-low">
<span class="text-on-surface-variant">Officer Name:</span>
<span class="font-semibold text-on-surface">Dr. Rajesh Sharma, ISS</span>
</div>
<div class="flex justify-between py-1 border-b border-surface-container-low">
<span class="text-on-surface-variant">Cadre Batch &amp; ID:</span>
<span class="font-mono text-on-surface">2008 • ISS-2008-0412</span>
</div>
<div class="flex justify-between py-1 border-b border-surface-container-low">
<span class="text-on-surface-variant">Current Designation:</span>
<span class="text-on-surface">Joint Director, National Accounts Division</span>
</div>
<div class="flex justify-between py-1 border-b border-surface-container-low">
<span class="text-on-surface-variant">Evaluation Benchmark:</span>
<span class="text-on-surface font-semibold">Director / Level-13A Screening</span>
</div>
<div class="flex justify-between py-1 border-b border-surface-container-low">
<span class="text-on-surface-variant">Diagnostic Outcome:</span>
<span class="text-secondary font-bold">Conditional Fit (4 Core Modules Required)</span>
</div>
<div class="flex justify-between py-1 border-b border-surface-container-low">
<span class="text-on-surface-variant">Digital Signature:</span>
<span class="font-mono text-[11px] text-on-surface-variant">SHA256: 8f9b7c2d1e...4a08ef (NIC Gateway)</span>
</div>
</div>
<!-- Modal Footer -->
<div class="pt-space-sm flex items-center justify-end gap-space-xs">
<button class="px-space-md h-10 rounded-lg bg-surface-container text-on-surface font-label-md text-label-md hover:bg-surface-container-high transition-colors" onclick="document.getElementById('audit-dialog').classList.add('hidden')">
          Close
        </button>
<button class="px-space-md h-10 rounded-lg bg-primary text-on-primary font-label-md text-label-md hover:bg-primary/90 transition-colors flex items-center gap-1.5 shadow-sm" onclick="window.print()">
<span class="material-symbols-outlined text-[18px]">download</span>
<span>Download Certified PDF</span>
</button>
</div>
</div>
</div>
<script>
    function scrollToPathway() {
      const el = document.getElementById('pathway-section');
      if (el) {
        el.scrollIntoView({ behavior: 'smooth' });
      }
    }
  </script>
</div></main><footer class="w-full bg-surface-container-low text-on-surface-variant py-space-md px-space-lg mt-space-lg"><div class="flex flex-col md:flex-row items-center justify-between gap-space-sm text-body-sm font-body-sm"><span>Gap2Grow Cadre Portal • National Statistical Systems Training Academy (NSSTA) • MoSPI</span><span>GIGW-3.0 Compliant • NIC Gateway Secure Node</span></div></footer></div></body></html>
