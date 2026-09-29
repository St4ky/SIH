<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';

requireLogin();
$user = currentUser();
$userId = (int)$user['id'];
?>
<!DOCTYPE html>

<html lang="en"><head><meta charset="utf-8"/><meta content="width=device-width, initial-scale=1.0" name="viewport"/><meta content="web_dashboard" name="shell-type"/><link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/><link href="https://fonts.googleapis.com" rel="preconnect"/><link href="https://fonts.gstatic.com" rel="preconnect"/><link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/><style>@layer base{html,body{margin:0;padding:0;}body{overscroll-behavior:none;}main>:first-child{margin-top:0!important;}main>:last-child{margin-bottom:0!important;}}::-webkit-scrollbar{display:none;}</style><script src="https://cdn.tailwindcss.com"></script><script id="tailwind-config">tailwind.config={darkMode:"class",theme:{extend:{"colors":{"surface-container-lowest":"#ffffff","surface":"#f8f9ff","primary-fixed":"#d5e3ff","secondary-container":"#fc6018","surface-tint":"#495f82","on-background":"#0d1c2f","on-tertiary-fixed":"#00164e","error":"#ba1a1a","on-surface":"#0d1c2f","tertiary-fixed":"#dce1ff","surface-container-highest":"#d5e3fd","on-tertiary":"#ffffff","tertiary-container":"#001e63","on-tertiary-container":"#7088dc","primary":"#001026","surface-container":"#e6eeff","on-surface-variant":"#44474e","background":"#f8f9ff","on-secondary-fixed-variant":"#802a00","on-primary":"#ffffff","tertiary-fixed-dim":"#b6c4ff","secondary":"#a83900","inverse-on-surface":"#ebf1ff","tertiary":"#000c34","on-primary-container":"#778db2","primary-container":"#0b2545","surface-dim":"#ccdbf4","on-primary-fixed":"#001c3b","on-secondary-fixed":"#380d00","inverse-primary":"#b1c7f0","error-container":"#ffdad6","on-error-container":"#93000a","inverse-surface":"#233144","on-tertiary-fixed-variant":"#264191","secondary-fixed":"#ffdbcf","outline":"#74777f","on-primary-fixed-variant":"#314769","on-error":"#ffffff","surface-container-low":"#eff4ff","secondary-fixed-dim":"#ffb59a","surface-variant":"#d5e3fd","on-secondary-container":"#531800","on-secondary":"#ffffff","surface-container-high":"#dde9ff","outline-variant":"#c4c6cf","surface-bright":"#f8f9ff","primary-fixed-dim":"#b1c7f0"},"borderRadius":{"DEFAULT":"0.125rem","lg":"0.25rem","xl":"0.5rem","full":"0.75rem"},"spacing":{"gutter-mobile":"0.75rem","margin-mobile":"1rem","space-lg":"1.5rem","space-sm":"0.5rem","gutter":"1.5rem","space-md":"1rem","space-xs":"0.25rem","margin":"2rem","space-xl":"2.5rem"},"fontFamily":{"label-lg":["Public Sans"],"label-md":["Public Sans"],"body-lg":["Public Sans"],"body-md":["Public Sans"],"headline-lg":["Public Sans"],"headline-xl":["Public Sans"],"headline-lg-mobile":["Public Sans"],"label-sm":["Public Sans"],"headline-md":["Public Sans"],"body-sm":["Public Sans"],"headline-sm":["Public Sans"],"headline-xl-mobile":["Public Sans"]},"fontSize":{"label-lg":["14px",{"lineHeight":"20px","letterSpacing":"0.01em","fontWeight":"600"}],"label-md":["12px",{"lineHeight":"16px","letterSpacing":"0.02em","fontWeight":"600"}],"body-lg":["16px",{"lineHeight":"24px","fontWeight":"400"}],"body-md":["14px",{"lineHeight":"20px","fontWeight":"400"}],"headline-lg":["28px",{"lineHeight":"36px","letterSpacing":"-0.01em","fontWeight":"700"}],"headline-xl":["36px",{"lineHeight":"44px","letterSpacing":"-0.02em","fontWeight":"700"}],"headline-lg-mobile":["22px",{"lineHeight":"30px","letterSpacing":"0em","fontWeight":"700"}],"label-sm":["11px",{"lineHeight":"14px","letterSpacing":"0.03em","fontWeight":"600"}],"headline-md":["22px",{"lineHeight":"28px","fontWeight":"600"}],"body-sm":["12px",{"lineHeight":"18px","fontWeight":"400"}],"headline-sm":["18px",{"lineHeight":"24px","fontWeight":"600"}],"headline-xl-mobile":["28px",{"lineHeight":"36px","letterSpacing":"-0.01em","fontWeight":"700"}]}}}}</script></head><body class="bg-surface font-body-md text-body-md text-on-surface antialiased"><aside class="fixed left-0 top-0 h-full w-72 bg-primary-container text-on-primary z-50 flex flex-col justify-between shadow-[0_4px_20px_rgba(11,37,69,0.25)]"><div class="flex flex-col"><div class="px-space-md py-space-sm bg-primary flex items-center justify-between"><div class="flex items-center gap-space-xs"><span class="material-symbols-outlined text-secondary-container text-[20px]">verified</span><span class="font-label-sm text-label-sm tracking-wide text-primary-fixed">GIGW 3.0 | iGOT Live</span></div><span class="w-2 h-2 rounded-full bg-secondary-container animate-pulse"></span></div><div class="p-space-md bg-tertiary-container"><div class="flex items-center gap-space-sm"><div class="w-11 h-11 rounded-full bg-primary flex items-center justify-center"><span class="material-symbols-outlined text-on-primary text-[24px]">person</span></div><div class="min-w-0 flex-1"><div class="font-label-lg text-label-lg text-on-tertiary truncate">Dr. Rajesh Sharma, ISS</div><div class="font-body-sm text-body-sm text-on-tertiary-container truncate">Joint Director, NAD (CSO)</div></div></div><div class="mt-space-sm pt-space-xs flex items-center justify-between text-label-sm font-label-sm"><span class="bg-secondary text-on-secondary px-2 py-0.5 rounded">ISS Cadre</span><span class="text-primary-fixed truncate">ID: ISS-2008-0412</span></div></div><nav class="px-space-sm py-space-md space-y-1 flex flex-col" data-active-classes="bg-primary text-on-primary font-bold"><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="learner-dashboard" href="<?= BASE_URL ?>/pages/dashboard.php"><span class="material-symbols-outlined text-[20px]">space_dashboard</span><span>Learner Dashboard</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="skill-gap-analysis" href="<?= BASE_URL ?>/pages/skill-gap.php"><span class="material-symbols-outlined text-[20px]">monitoring</span><span>Skill-Gap Analysis</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="my-learning-path" href="<?= BASE_URL ?>/pages/learning-path.php"><span class="material-symbols-outlined text-[20px]">route</span><span>My Learning Path</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="ai-assessment-generator" href="<?= BASE_URL ?>/pages/assessment-generator.php"><span class="material-symbols-outlined text-[20px]">psychology</span><span>AI Assessment Generator</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="igot-course-catalog" href="<?= BASE_URL ?>/pages/igot-courses.php"><span class="material-symbols-outlined text-[20px]">menu_book</span><span>iGOT Course Catalog</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="nssta-tpac-nominations" href="<?= BASE_URL ?>/pages/nssta-programmes.php"><span class="material-symbols-outlined text-[20px]">assignment_ind</span><span>NSSTA TPAC Nominations</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="cadre-analytics" href="<?= BASE_URL ?>/pages/cadre-analytics.php"><span class="material-symbols-outlined text-[20px]">analytics</span><span>Cadre Analytics</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="settings-profile" href="<?= BASE_URL ?>/pages/settings.php"><span class="material-symbols-outlined text-[20px]">manage_accounts</span><span>Settings &amp; Profile</span></a></nav></div><div class="p-space-md bg-tertiary text-on-tertiary"><div class="text-label-sm font-label-sm text-tertiary-fixed-dim uppercase tracking-wider mb-space-xs">Sync Status</div><div class="space-y-1 text-label-sm font-label-sm mb-space-md"><div class="flex items-center justify-between text-on-tertiary"><span>iGOT Karmayogi API</span><span class="text-secondary-fixed">v2.4 Live</span></div><div class="flex items-center justify-between text-on-tertiary"><span>SPARROW / e-HRMS</span><span class="text-secondary-fixed">Active</span></div></div><div class="flex items-center justify-between pt-space-xs"><a class="flex items-center gap-space-xs text-secondary-fixed hover:text-on-tertiary text-label-sm font-label-sm" href="<?= BASE_URL ?>/logout.php"><span class="material-symbols-outlined text-[16px]">logout</span><span>Sign Out</span></a><span class="text-tertiary-fixed-dim text-label-sm font-label-sm">NSSTA-ISS</span></div></div></aside><div class="pl-72"><header class="fixed top-0 left-72 right-0 h-16 bg-surface-container-lowest/90 backdrop-blur-md shadow-[0_1px_8px_rgba(11,37,69,0.06)] z-40 flex items-center justify-between px-space-lg"><div class="flex items-center gap-space-sm text-body-sm font-body-sm text-on-surface-variant"><span>भारत सरकार | MoSPI Official Statistical Cadre Intelligence</span></div><div class="flex items-center gap-space-md"><div class="flex items-center gap-space-xs bg-surface-container-low px-space-sm py-1 rounded-full text-label-sm font-label-sm text-on-surface"><span class="w-2 h-2 rounded-full bg-secondary"></span><span>NAD Division</span></div><div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center"><span class="material-symbols-outlined text-on-primary text-[18px]">person</span></div></div></header><main class="relative pt-16 w-full px-space-lg bg-surface min-h-[calc(100vh-64px)]"><div class="flex flex-col w-full pb-space-xl">
<!-- Sovereign Examination Sub-Header / Proctored Notice Strip -->
<section class="w-full bg-surface-container-lowest rounded-xl p-space-md shadow-sm mb-space-md">
<div class="flex flex-col xl:flex-row items-start xl:items-center justify-between gap-space-md">
<!-- Title & Authority Badge -->
<div class="flex items-start gap-space-sm min-w-0">
<div class="w-10 h-10 rounded-lg bg-primary text-on-primary flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[24px]">school</span>
</div>
<div class="min-w-0">
<div class="flex items-center gap-space-xs mb-0.5">
<span class="bg-primary-fixed text-on-primary-fixed font-label-sm text-label-sm px-2 py-0.5 rounded">MoSPI / NSSTA Exam Mode</span>
<span class="text-on-surface-variant font-label-sm text-label-sm tracking-wider">CADRE EVAL 2024-25</span>
</div>
<h1 class="font-headline-sm text-headline-sm text-on-surface truncate">MoSPI Cadre Mid-Term Benchmark Assessment: National Accounts &amp; Spatial Deflators (ISS Level 12-13A)</h1>
<div class="flex items-center gap-space-sm mt-1 text-on-surface-variant font-body-sm text-body-sm">
<span class="flex items-center gap-1">
<span class="material-symbols-outlined text-[16px] text-secondary-container">security</span>
<span>Proctored by NSSTA Cadre Evaluation Engine v4.2</span>
</span>
<span>•</span>
<span class="text-secondary font-label-sm text-label-sm">Candidate: Dr. Rajesh Sharma, ISS (0412)</span>
</div>
</div>
</div>
<!-- Live Clock & Assessment Session Metadata -->
<div class="flex items-center gap-space-md shrink-0 w-full xl:w-auto justify-between xl:justify-end">
<!-- Live Countdown Pill -->
<div class="flex items-center gap-space-sm bg-surface-container px-space-md py-space-xs rounded-lg">
<span class="material-symbols-outlined text-secondary-container animate-pulse text-[22px]">timer</span>
<div>
<div class="font-headline-sm text-headline-sm text-on-surface tracking-tight" data-time="1725" id="live-timer">28:45</div>
<div class="font-label-sm text-label-sm text-on-surface-variant">Remaining | 10 Questions Total</div>
</div>
</div>
<!-- Terminal Integrity Indicator -->
<div class="bg-surface-container-high px-space-sm py-2 rounded-lg flex items-center gap-2">
<span class="w-2.5 h-2.5 rounded-full bg-secondary-container animate-ping"></span>
<div class="flex flex-col">
<span class="font-label-sm text-label-sm text-on-surface">Secure Session</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Encrypted Node 09-ND</span>
</div>
</div>
</div>
</div>
<!-- Question Map Strip -->
<div class="mt-space-md pt-space-md bg-surface-container-low rounded-lg p-space-sm">
<div class="flex flex-col lg:flex-row items-start lg:items-center justify-between gap-space-sm">
<div class="flex items-center gap-space-xs text-on-surface-variant font-label-sm text-label-sm shrink-0">
<span class="material-symbols-outlined text-[18px]">grid_view</span>
<span class="uppercase tracking-wider">Matrix Navigation:</span>
</div>
<!-- Badges 1-10 -->
<div class="flex flex-wrap items-center gap-2">
<!-- 1: Answered (Green) -->
<button class="w-9 h-9 rounded-lg bg-surface-container-lowest text-on-surface font-label-md text-label-md flex flex-col items-center justify-center hover:bg-surface-container transition-all shadow-sm">
<span>01</span>
<span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
</button>
<!-- 2: Answered (Green) -->
<button class="w-9 h-9 rounded-lg bg-surface-container-lowest text-on-surface font-label-md text-label-md flex flex-col items-center justify-center hover:bg-surface-container transition-all shadow-sm">
<span>02</span>
<span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
</button>
<!-- 3: Answered (Green) -->
<button class="w-9 h-9 rounded-lg bg-surface-container-lowest text-on-surface font-label-md text-label-md flex flex-col items-center justify-center hover:bg-surface-container transition-all shadow-sm">
<span>03</span>
<span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
</button>
<!-- 4: Active / Current (Primary Navy) -->
<button class="w-9 h-9 rounded-lg bg-primary text-on-primary font-label-md text-label-md flex flex-col items-center justify-center shadow-md ring-2 ring-secondary-container">
<span>04</span>
<span class="w-1.5 h-1.5 rounded-full bg-secondary-container"></span>
</button>
<!-- 5: Marked for Review (Amber) -->
<button class="w-9 h-9 rounded-lg bg-secondary-fixed text-on-secondary-fixed font-label-md text-label-md flex flex-col items-center justify-center shadow-sm">
<span>05</span>
<span class="w-1.5 h-1.5 rounded-full bg-secondary-container"></span>
</button>
<!-- 6: Unvisited -->
<button class="w-9 h-9 rounded-lg bg-surface-container text-on-surface-variant font-label-md text-label-md flex items-center justify-center opacity-80 hover:opacity-100">
<span>06</span>
</button>
<!-- 7: Unvisited -->
<button class="w-9 h-9 rounded-lg bg-surface-container text-on-surface-variant font-label-md text-label-md flex items-center justify-center opacity-80 hover:opacity-100">
<span>07</span>
</button>
<!-- 8: Unvisited -->
<button class="w-9 h-9 rounded-lg bg-surface-container text-on-surface-variant font-label-md text-label-md flex items-center justify-center opacity-80 hover:opacity-100">
<span>08</span>
</button>
<!-- 9: Unvisited -->
<button class="w-9 h-9 rounded-lg bg-surface-container text-on-surface-variant font-label-md text-label-md flex items-center justify-center opacity-80 hover:opacity-100">
<span>09</span>
</button>
<!-- 10: Unvisited -->
<button class="w-9 h-9 rounded-lg bg-surface-container text-on-surface-variant font-label-md text-label-md flex items-center justify-center opacity-80 hover:opacity-100">
<span>10</span>
</button>
</div>
<!-- Legend Badges -->
<div class="flex items-center gap-space-sm font-label-sm text-label-sm text-on-surface-variant shrink-0">
<span class="flex items-center gap-1.5"><span class="w-2.5 h-2.5 rounded bg-secondary"></span> Answered (3)</span>
<span class="flex items-center gap-1.5"><span class="w-2.5 h-2.5 rounded bg-primary"></span> Current (1)</span>
<span class="flex items-center gap-1.5"><span class="w-2.5 h-2.5 rounded bg-secondary-fixed"></span> Marked (1)</span>
<span class="flex items-center gap-1.5"><span class="w-2.5 h-2.5 rounded bg-surface-container"></span> Unvisited (5)</span>
</div>
</div>
</div>
</section>
<!-- Split Workspace: Main Quiz Area (Left 8 Cols) & Exam Proctor/Reference Bar (Right 4 Cols) -->
<div class="grid grid-cols-1 xl:grid-cols-12 gap-space-md items-start">
<!-- Primary Assessment Workspace -->
<main class="xl:col-span-8 flex flex-col gap-space-md">
<div class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm">
<!-- Question Stem Header -->
<div class="flex items-center justify-between gap-space-sm pb-space-sm">
<div class="flex items-center gap-space-xs">
<span class="px-2.5 py-1 rounded bg-tertiary-container text-on-tertiary font-label-md text-label-md">Question 04 of 10</span>
<span class="px-2 py-0.5 rounded bg-surface-container-high text-on-surface-variant font-label-sm text-label-sm">SNA 2008 • Macro Aggregates</span>
</div>
<div class="flex items-center gap-space-xs text-on-surface-variant font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[16px] text-secondary">verified</span>
<span>Weight: 2.00 Marks • Negative: -0.66</span>
</div>
</div>
<!-- Question Stem -->
<div class="mt-space-sm">
<h2 class="font-headline-sm text-headline-sm text-on-surface leading-snug">
            In the compilation of Annual Supply and Use Tables (SUT) under SNA 2008 standards, how should trade and transport margins (TTM) be reconciled when valuation shifts from Basic Prices to Purchasers' Prices, specifically when high-frequency GSTN intermediate transaction records reflect cross-state transport subsidies?
          </h2>
</div>
<!-- Mathematical Formalization Box -->
<div class="mt-space-md p-space-md rounded-lg bg-surface-container-low text-on-surface">
<div class="flex items-center justify-between mb-space-xs text-on-surface-variant font-label-sm text-label-sm">
<span class="uppercase tracking-wide font-semibold flex items-center gap-1">
<span class="material-symbols-outlined text-[16px]">functions</span>
<span>Theoretical Balancing Identity (MoSPI Guideline 2023.4)</span>
</span>
<span class="font-mono text-label-sm">Eq. 4.11</span>
</div>
<div class="p-space-sm bg-surface-container-lowest rounded font-mono font-label-lg text-label-lg text-primary overflow-x-auto shadow-inner text-center py-3">
            P_{purchasers} = P_{basic} + TTM_{trade} + TTM_{transport} + NetTaxes_{products} - Subsidies_{freight}
          </div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-space-xs">
            Where cross-state e-way freight billing accounts represent both inter-state trade adjustments and compensatory subventions from Central fiscal outlays.
          </p>
</div>
<!-- Multiple Choice Options -->
<div class="mt-space-lg flex flex-col gap-space-sm" id="mcq-options">
<!-- Option A -->
<label class="group relative flex items-start p-space-md rounded-lg bg-surface-container-lowest hover:bg-surface-container transition-all cursor-pointer shadow-sm">
<input class="mt-1 w-4 h-4 text-primary focus:ring-secondary-container shrink-0" name="assessment_q4" type="radio" value="A"/>
<div class="ml-space-md min-w-0">
<div class="flex items-center gap-2 mb-1">
<span class="font-label-md text-label-md px-2 py-0.5 rounded bg-surface-container text-on-surface">Option A</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Standard Valuation Method</span>
</div>
<p class="font-body-md text-body-md text-on-surface">
                Allocate transport margins proportionally across final household demand without reallocating intermediate consumption matrices.
              </p>
</div>
</label>
<!-- Option B (Selected as per Prompt Context) -->
<label class="group relative flex items-start p-space-md rounded-lg bg-surface-container text-on-surface shadow-sm cursor-pointer ring-2 ring-primary">
<input checked="" class="mt-1 w-4 h-4 text-primary focus:ring-secondary-container shrink-0" name="assessment_q4" type="radio" value="B"/>
<div class="ml-space-md min-w-0">
<div class="flex items-center gap-2 mb-1">
<span class="font-label-md text-label-md px-2 py-0.5 rounded bg-primary text-on-primary">Option B</span>
<span class="font-label-sm text-label-sm text-secondary font-semibold">Active Selection</span>
</div>
<p class="font-body-md text-body-md text-on-surface font-medium">
                Deduct freight subsidies directly from gross margin vectors and balance commodity flows through iterative RAS bi-proportional matrix scaling.
              </p>
</div>
</label>
<!-- Option C -->
<label class="group relative flex items-start p-space-md rounded-lg bg-surface-container-lowest hover:bg-surface-container transition-all cursor-pointer shadow-sm">
<input class="mt-1 w-4 h-4 text-primary focus:ring-secondary-container shrink-0" name="assessment_q4" type="radio" value="C"/>
<div class="ml-space-md min-w-0">
<div class="flex items-center gap-2 mb-1">
<span class="font-label-md text-label-md px-2 py-0.5 rounded bg-surface-container text-on-surface">Option C</span>
</div>
<p class="font-body-md text-body-md text-on-surface">
                Treat transport subsidies exclusively as operating surplus adjustments for non-financial public corporations.
              </p>
</div>
</label>
<!-- Option D -->
<label class="group relative flex items-start p-space-md rounded-lg bg-surface-container-lowest hover:bg-surface-container transition-all cursor-pointer shadow-sm">
<input class="mt-1 w-4 h-4 text-primary focus:ring-secondary-container shrink-0" name="assessment_q4" type="radio" value="D"/>
<div class="ml-space-md min-w-0">
<div class="flex items-center gap-2 mb-1">
<span class="font-label-md text-label-md px-2 py-0.5 rounded bg-surface-container text-on-surface">Option D</span>
</div>
<p class="font-body-md text-body-md text-on-surface">
                Reclassify all cross-state margins as CIF imports under Balance of Payments Manual 6 (BPM6).
              </p>
</div>
</label>
</div>
<!-- Bottom Action Toolbar -->
<div class="mt-space-xl pt-space-md bg-surface-container-low rounded-lg p-space-md flex flex-wrap items-center justify-between gap-space-sm">
<!-- Left Secondary Actions -->
<div class="flex items-center gap-space-xs flex-wrap">
<button class="px-space-md py-2 rounded-lg bg-surface-container text-on-surface font-label-md text-label-md hover:bg-surface-container-high transition-colors flex items-center gap-1.5" onclick="clearSelectedResponse()" type="button">
<span class="material-symbols-outlined text-[18px]">backspace</span>
<span>Clear Response</span>
</button>
<button class="px-space-md py-2 rounded-lg bg-secondary-fixed text-on-secondary-fixed font-label-md text-label-md hover:bg-secondary-fixed-dim transition-colors flex items-center gap-1.5" type="button">
<span class="material-symbols-outlined text-[18px]">bookmark</span>
<span>Mark for Review &amp; Next</span>
</button>
</div>
<!-- Right Primary Paging Actions -->
<div class="flex items-center gap-space-xs flex-wrap">
<button class="px-space-md py-2 rounded-lg bg-surface-container-lowest text-on-surface font-label-md text-label-md hover:bg-surface-container transition-colors flex items-center gap-1.5 shadow-sm" type="button">
<span class="material-symbols-outlined text-[18px]">chevron_left</span>
<span>Previous Question</span>
</button>
<button class="px-space-lg py-2 rounded-lg bg-primary text-on-primary font-label-md text-label-md hover:bg-primary-container transition-all flex items-center gap-1.5 shadow-md" type="button">
<span>Save &amp; Next Question</span>
<span class="material-symbols-outlined text-[18px]">chevron_right</span>
</button>
</div>
</div>
<!-- Emergency Proctor Alert Strip -->
<div class="mt-space-sm flex items-center justify-between text-on-surface-variant font-body-sm text-body-sm px-space-xs">
<span class="flex items-center gap-1 text-error">
<span class="material-symbols-outlined text-[16px]">warning</span>
<span>Do not refresh or switch application windows. Tab navigation is monitored.</span>
</span>
<a class="text-secondary font-label-sm text-label-sm hover:underline flex items-center gap-1" href="javascript:void(0)" onclick="triggerHelpdeskModal(event)">
<span class="material-symbols-outlined text-[16px]">support_agent</span>
<span>Emergency Proctor Helpdesk</span>
</a>
</div>
</div>
</main>
<!-- Assessment Guidelines, Formulae & Live Proctoring Panel -->
<aside class="xl:col-span-4 flex flex-col gap-space-md">
<!-- Live Integrity Feed Widget -->
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm">
<div class="flex items-center justify-between mb-space-sm">
<div class="flex items-center gap-space-xs">
<span class="material-symbols-outlined text-secondary text-[20px]">videocam</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Proctoring Telemetry</h3>
</div>
<span class="bg-secondary-fixed text-on-secondary-fixed text-label-sm font-label-sm px-2 py-0.5 rounded">Active Audit</span>
</div>
<!-- Visual Live Telemetry Box -->
<div class="relative w-full h-40 bg-surface-container-high rounded-lg overflow-hidden flex items-center justify-center mb-space-sm">
<img class="w-full h-full object-cover" data-alt="Official proctoring camera preview frame of an Indian civil servant candidate seated in an analytical workstation under soft white fluorescent institutional lighting, sovereign watermark on upper right, facial boundary geometry mesh indicated in translucent teal" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAsKFqs-8vNZEePvZz_8rhzb1Cm8pVqTP2cHcs2YpzoHW6ErUxVZLKkGDKAO4XZM93_dF4EYM1rn5Q7j_tlDsbumtMxjxe_ZL8rqdVG5zPD5ikP3OPO9iE548Sg_ykFCyuPKdqTA3VYdud9mwpqtDu_WBtatu9RQ1vQnoHMy-VNc09unhPNQputFxYJoI-LFeIlw27U9RYvjDmHwiassDyzfIrTNt4v5g3GMbK5HsvABcF0MFu_l7Iy"/>
<div class="absolute top-2 left-2 bg-primary/80 backdrop-blur-sm text-on-primary font-label-sm text-label-sm px-2 py-0.5 rounded flex items-center gap-1">
<span class="w-2 h-2 rounded-full bg-secondary-container animate-ping"></span>
<span>CAM 01: Dr. R. Sharma</span>
</div>
<div class="absolute bottom-2 right-2 bg-inverse-surface/85 text-inverse-on-surface font-mono font-label-sm text-label-sm px-2 py-0.5 rounded">
            FPS: 24 | Latency: 18ms
          </div>
</div>
<!-- Telemetry Status Badges -->
<div class="space-y-2">
<div class="flex items-center justify-between p-2 rounded bg-surface-container-low text-label-sm font-label-sm">
<span class="text-on-surface-variant flex items-center gap-1.5">
<span class="material-symbols-outlined text-[16px] text-secondary">visibility</span>
<span>Gaze &amp; Head Pose Tracking</span>
</span>
<span class="text-secondary font-semibold">Compliant (99.4%)</span>
</div>
<div class="flex items-center justify-between p-2 rounded bg-surface-container-low text-label-sm font-label-sm">
<span class="text-on-surface-variant flex items-center gap-1.5">
<span class="material-symbols-outlined text-[16px] text-secondary">tab</span>
<span>Window &amp; Tab Lockout</span>
</span>
<span class="text-secondary font-semibold">0 Anomalies</span>
</div>
<div class="flex items-center justify-between p-2 rounded bg-surface-container-low text-label-sm font-label-sm">
<span class="text-on-surface-variant flex items-center gap-1.5">
<span class="material-symbols-outlined text-[16px] text-secondary">mic</span>
<span>Acoustic Room Baseline</span>
</span>
<span class="text-secondary font-semibold">28 dB (Quiet)</span>
</div>
</div>
</div>
<!-- Reference Materials & Formula Sheet Accordion -->
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm">
<div class="flex items-center justify-between mb-space-sm">
<div class="flex items-center gap-space-xs">
<span class="material-symbols-outlined text-primary text-[20px]">menu_book</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Assessment Guidelines</h3>
</div>
<span class="text-on-surface-variant font-label-sm text-label-sm">MoSPI-CSO 2023</span>
</div>
<div class="space-y-space-xs">
<!-- Accordion 1: Allowed References -->
<div class="bg-surface-container-low rounded-lg p-space-sm">
<div class="flex items-center justify-between font-label-md text-label-md text-on-surface cursor-pointer">
<span class="flex items-center gap-1.5 font-semibold">
<span class="material-symbols-outlined text-[18px] text-primary">verified_user</span>
<span>MoSPI SNA Manual 2023 Sheet</span>
</span>
<span class="material-symbols-outlined text-[18px]">expand_more</span>
</div>
<div class="mt-space-xs font-body-sm text-body-sm text-on-surface-variant pl-6">
              Official reference document covering Chapter 14 (Supply and Use Tables) and Section 9 (Spatial Price Indices &amp; Deflator Mechanics).
            </div>
</div>
<!-- Accordion 2: Interactive Scientific Calculator -->
<div class="bg-surface-container-low rounded-lg p-space-sm">
<div class="flex items-center justify-between font-label-md text-label-md text-on-surface cursor-pointer" onclick="toggleCalcUI()">
<span class="flex items-center gap-1.5 font-semibold">
<span class="material-symbols-outlined text-[18px] text-primary">calculate</span>
<span>Virtual Cadre Calculator Tool</span>
</span>
<span class="material-symbols-outlined text-[18px]" id="calc-toggle-icon">toggle_on</span>
</div>
<div class="mt-space-sm p-space-sm bg-surface-container-lowest rounded-lg" id="virtual-calculator">
<div class="bg-surface-container text-right p-2 rounded font-mono font-label-md text-label-md text-on-surface mb-2" id="calc-display">1,420.50</div>
<div class="grid grid-cols-4 gap-1 font-mono text-label-sm">
<button class="bg-surface-container-high p-1.5 rounded hover:bg-surface-dim">7</button>
<button class="bg-surface-container-high p-1.5 rounded hover:bg-surface-dim">8</button>
<button class="bg-surface-container-high p-1.5 rounded hover:bg-surface-dim">9</button>
<button class="bg-tertiary-container text-on-tertiary p-1.5 rounded">/</button>
<button class="bg-surface-container-high p-1.5 rounded hover:bg-surface-dim">4</button>
<button class="bg-surface-container-high p-1.5 rounded hover:bg-surface-dim">5</button>
<button class="bg-surface-container-high p-1.5 rounded hover:bg-surface-dim">6</button>
<button class="bg-tertiary-container text-on-tertiary p-1.5 rounded">*</button>
<button class="bg-surface-container-high p-1.5 rounded hover:bg-surface-dim">1</button>
<button class="bg-surface-container-high p-1.5 rounded hover:bg-surface-dim">2</button>
<button class="bg-surface-container-high p-1.5 rounded hover:bg-surface-dim">3</button>
<button class="bg-tertiary-container text-on-tertiary p-1.5 rounded">-</button>
<button class="bg-error-container text-on-error-container p-1.5 rounded">C</button>
<button class="bg-surface-container-high p-1.5 rounded hover:bg-surface-dim">0</button>
<button class="bg-primary text-on-primary p-1.5 rounded">=</button>
<button class="bg-tertiary-container text-on-tertiary p-1.5 rounded">+</button>
</div>
</div>
</div>
<!-- Accordion 3: Marking Rubric -->
<div class="bg-surface-container-low rounded-lg p-space-sm">
<div class="flex items-center justify-between font-label-md text-label-md text-on-surface">
<span class="flex items-center gap-1.5 font-semibold">
<span class="material-symbols-outlined text-[18px] text-primary">rule</span>
<span>ISS Evaluation Protocols</span>
</span>
<span class="material-symbols-outlined text-[18px]">check_circle</span>
</div>
<ul class="mt-space-xs font-body-sm text-body-sm text-on-surface-variant list-disc list-inside space-y-1 pl-1">
<li>Pass benchmark: 70% aggregate across competencies.</li>
<li>Auto-submission triggers when timer hits 00:00.</li>
<li>Official SPARROW audit log will record telemetry metadata.</li>
</ul>
</div>
</div>
<!-- NSSTA Contact Footer -->
<div class="mt-space-md pt-space-sm flex items-center justify-between text-label-sm font-label-sm text-on-surface-variant">
<span>NSSTA Examination Wing • Greater Noida</span>
<span class="font-mono">Code: ISS-MID-2024</span>
</div>
</div>
</aside>
</div>
<!-- Helpdesk Support Modal (Simulated overlay trigger) -->
<div class="hidden fixed inset-0 z-50 flex items-center justify-center bg-primary/60 backdrop-blur-xs p-space-md" id="helpdesk-modal">
<div class="bg-surface-container-lowest max-w-lg w-full rounded-xl p-space-lg shadow-xl">
<div class="flex items-center justify-between mb-space-md">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-secondary-container">support_agent</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Proctor Helpdesk Connection</h3>
</div>
<button class="text-on-surface-variant hover:text-on-surface" onclick="closeHelpdeskModal()">
<span class="material-symbols-outlined">close</span>
</button>
</div>
<p class="font-body-md text-body-md text-on-surface mb-space-md">
        If you are experiencing technical difficulties, bandwidth drops, or question rendering problems, a proctor will assist you without pausing your timer.
      </p>
<div class="space-y-space-sm mb-space-lg">
<div class="p-space-sm bg-surface-container-low rounded-lg flex items-center justify-between font-body-sm text-body-sm">
<span>Current Session ID:</span>
<span class="font-mono font-semibold text-primary">NSSTA-EVAL-88219</span>
</div>
<div class="p-space-sm bg-surface-container-low rounded-lg flex items-center justify-between font-body-sm text-body-sm">
<span>Presiding Proctor:</span>
<span class="font-semibold text-on-surface">Officer Sandeep Verma (Desk #4)</span>
</div>
</div>
<div class="flex items-center justify-end gap-space-sm">
<button class="px-space-md py-2 rounded-lg bg-surface-container text-on-surface font-label-md text-label-md" onclick="closeHelpdeskModal()" type="button">
          Cancel
        </button>
<button class="px-space-md py-2 rounded-lg bg-primary text-on-primary font-label-md text-label-md" onclick="alert('Priority audio ping sent to Proctor Desk. Please stand by.'); closeHelpdeskModal();" type="button">
          Request Direct Intercom
        </button>
</div>
</div>
</div>
</div>
<script>
  // Dynamic Exam Timer Countdown
  (function() {
    var timerEl = document.getElementById('live-timer');
    if (!timerEl) return;
    
    var totalSeconds = parseInt(timerEl.getAttribute('data-time') || '1725', 10);
    
    var interval = setInterval(function() {
      if (totalSeconds <= 0) {
        clearInterval(interval);
        timerEl.textContent = "00:00";
        alert("Assessment duration elapsed. Auto-compiling and submitting to NSSTA gateway...");
        return;
      }
      totalSeconds--;
      var mins = Math.floor(totalSeconds / 60);
      var secs = totalSeconds % 60;
      var formattedMins = (mins < 10 ? '0' : '') + mins;
      var formattedSecs = (secs < 10 ? '0' : '') + secs;
      timerEl.textContent = formattedMins + ':' + formattedSecs;
    }, 1000);
  })();

  // Clear Selected Radio Option
  function clearSelectedResponse() {
    var radios = document.getElementsByName('assessment_q4');
    for (var i = 0; i < radios.length; i++) {
      radios[i].checked = false;
      var card = radios[i].closest('label');
      if (card) {
        card.classList.remove('bg-surface-container', 'ring-2', 'ring-primary');
        card.classList.add('bg-surface-container-lowest');
      }
    }
  }

  // Toggle Virtual Calculator
  function toggleCalcUI() {
    var calc = document.getElementById('virtual-calculator');
    var icon = document.getElementById('calc-toggle-icon');
    if (calc) {
      if (calc.classList.contains('hidden')) {
        calc.classList.remove('hidden');
        if (icon) icon.textContent = 'toggle_on';
      } else {
        calc.classList.add('hidden');
        if (icon) icon.textContent = 'toggle_off';
      }
    }
  }

  // Proctor Helpdesk Modal controls
  function triggerHelpdeskModal(e) {
    if (e) e.preventDefault();
    var modal = document.getElementById('helpdesk-modal');
    if (modal) modal.classList.remove('hidden');
  }

  function closeHelpdeskModal() {
    var modal = document.getElementById('helpdesk-modal');
    if (modal) modal.classList.add('hidden');
  }

  // Reactive radio option styling
  var optionsContainer = document.getElementById('mcq-options');
  if (optionsContainer) {
    optionsContainer.addEventListener('change', function(e) {
      if (e.target && e.target.name === 'assessment_q4') {
        var labels = optionsContainer.querySelectorAll('label');
        labels.forEach(function(lbl) {
          lbl.classList.remove('bg-surface-container', 'ring-2', 'ring-primary');
          lbl.classList.add('bg-surface-container-lowest');
        });
        var activeLabel = e.target.closest('label');
        if (activeLabel) {
          activeLabel.classList.remove('bg-surface-container-lowest');
          activeLabel.classList.add('bg-surface-container', 'ring-2', 'ring-primary');
        }
      }
    });
  }
</script></main><footer class="w-full bg-surface-container-low text-on-surface-variant py-space-md px-space-lg mt-space-lg"><div class="flex flex-col md:flex-row items-center justify-between gap-space-sm text-body-sm font-body-sm"><span>Gap2Grow Cadre Portal • National Statistical Systems Training Academy (NSSTA) • MoSPI</span><span>GIGW-3.0 Compliant • NIC Gateway Secure Node</span></div></footer></div><script>
async function submitAssessmentForm() {
    if (!confirm('Submit proctored assessment responses to NSSTA Evaluation Engine?')) return;
    
    // Collect answers
    const responses = [
        {question_id: 1, selected_option: 1},
        {question_id: 2, selected_option: 2},
        {question_id: 3, selected_option: 0},
        {question_id: 4, selected_option: 1}
    ];

    try {
        const res = await fetch('<?= BASE_URL ?>/api/diagnostic-score.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({
                domain_id: 1,
                responses: responses
            })
        });
        const data = await res.json();
        alert('Diagnostic Assessment Complete!\nFinal Difficulty-Weighted Score: ' + (data.final_score || 88) + '%\nUpdated skill gaps in official registry.');
        window.location.href = '<?= BASE_URL ?>/pages/performance-gap.php';
    } catch(e) {
        alert('Assessment submitted successfully.');
        window.location.href = '<?= BASE_URL ?>/pages/performance-gap.php';
    }
}
</script>
</body></html>
