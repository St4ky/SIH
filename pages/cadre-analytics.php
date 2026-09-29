<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';

requireLogin();
$user = currentUser();
$userId = (int)$user['id'];
?>
<!DOCTYPE html>

<html lang="en"><head><meta charset="utf-8"/><meta content="width=device-width, initial-scale=1.0" name="viewport"/><meta content="web_dashboard" name="shell-type"/><title>Gap2Grow - MoSPI / NSSTA Statistical Cadre Intelligence</title><link href="https://fonts.googleapis.com" rel="preconnect"/><link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/><link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;600;700&amp;display=swap" rel="stylesheet"/><link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/><style>@layer base{html,body{margin:0;padding:0;}body{overscroll-behavior:none;}main>:first-child{margin-top:0!important;}main>:last-child{margin-bottom:0!important;}}::-webkit-scrollbar{display:none;}</style><script src="https://cdn.tailwindcss.com"></script><script id="tailwind-config">tailwind.config = { darkMode: "class", theme: { extend: { "colors": { "on-tertiary": "#ffffff", "inverse-surface": "#233144", "outline-variant": "#c4c6cf", "tertiary-fixed": "#dce1ff", "on-secondary-container": "#531800", "surface-dim": "#ccdbf4", "on-background": "#0d1c2f", "inverse-on-surface": "#ebf1ff", "on-tertiary-fixed-variant": "#264191", "on-primary": "#ffffff", "surface-container": "#e6eeff", "on-tertiary-container": "#7088dc", "surface-container-low": "#eff4ff", "surface-container-high": "#dde9ff", "on-surface": "#0d1c2f", "secondary-fixed-dim": "#ffb59a", "outline": "#74777f", "surface-container-lowest": "#ffffff", "secondary": "#a83900", "secondary-fixed": "#ffdbcf", "tertiary-container": "#001e63", "primary": "#001026", "on-primary-fixed": "#001c3b", "surface-variant": "#d5e3fd", "on-secondary": "#ffffff", "error-container": "#ffdad6", "primary-fixed": "#d5e3ff", "on-primary-fixed-variant": "#314769", "secondary-container": "#fc6018", "surface": "#f8f9ff", "tertiary": "#000c34", "tertiary-fixed-dim": "#b6c4ff", "error": "#ba1a1a", "primary-container": "#0b2545", "background": "#f8f9ff", "surface-tint": "#495f82", "on-error": "#ffffff", "surface-bright": "#f8f9ff", "on-error-container": "#93000a", "on-secondary-fixed-variant": "#802a00", "on-secondary-fixed": "#380d00", "on-surface-variant": "#44474e", "surface-container-highest": "#d5e3fd", "primary-fixed-dim": "#b1c7f0", "inverse-primary": "#b1c7f0", "on-primary-container": "#778db2", "on-tertiary-fixed": "#00164e" }, "borderRadius": { "DEFAULT": "0.125rem", "lg": "0.25rem", "xl": "0.5rem", "full": "0.75rem" }, "spacing": { "gutter": "1.5rem", "margin": "2rem", "space-xl": "2.5rem", "space-lg": "1.5rem", "gutter-mobile": "0.75rem", "margin-mobile": "1rem", "space-xs": "0.25rem", "space-md": "1rem", "space-sm": "0.5rem" }, "fontFamily": { "headline-xl-mobile": ["Public Sans"], "label-lg": ["Public Sans"], "body-lg": ["Public Sans"], "label-md": ["Public Sans"], "headline-lg": ["Public Sans"], "headline-lg-mobile": ["Public Sans"], "headline-md": ["Public Sans"], "headline-xl": ["Public Sans"], "body-sm": ["Public Sans"], "body-md": ["Public Sans"], "label-sm": ["Public Sans"], "headline-sm": ["Public Sans"] }, "fontSize": { "headline-xl-mobile": ["28px", { "lineHeight": "36px", "letterSpacing": "-0.01em", "fontWeight": "700" }], "label-lg": ["14px", { "lineHeight": "20px", "letterSpacing": "0.01em", "fontWeight": "600" }], "body-lg": ["16px", { "lineHeight": "24px", "fontWeight": "400" }], "label-md": ["12px", { "lineHeight": "16px", "letterSpacing": "0.02em", "fontWeight": "600" }], "headline-lg": ["28px", { "lineHeight": "36px", "letterSpacing": "-0.01em", "fontWeight": "700" }], "headline-lg-mobile": ["22px", { "lineHeight": "30px", "letterSpacing": "0em", "fontWeight": "700" }], "headline-md": ["22px", { "lineHeight": "28px", "fontWeight": "600" }], "headline-xl": ["36px", { "lineHeight": "44px", "letterSpacing": "-0.02em", "fontWeight": "700" }], "body-sm": ["12px", { "lineHeight": "18px", "fontWeight": "400" }], "body-md": ["14px", { "lineHeight": "20px", "fontWeight": "400" }], "label-sm": ["11px", { "lineHeight": "14px", "letterSpacing": "0.03em", "fontWeight": "600" }], "headline-sm": ["18px", { "lineHeight": "24px", "fontWeight": "600" }] } } } }</script></head><body class="bg-surface font-body-md text-body-md text-on-surface antialiased"><aside class="fixed left-0 top-0 h-screen w-72 bg-primary-container z-50 flex flex-col justify-between overflow-y-auto shadow-[0_1px_8px_rgba(0,0,0,0.04)]"><div class="flex flex-col"><div class="p-space-md bg-primary flex items-center gap-space-sm"><div class="w-9 h-9 rounded-lg bg-surface-container-lowest/10 flex items-center justify-center"><span class="material-symbols-outlined text-secondary-container text-[22px]">account_balance</span></div><div class="flex flex-col"><span class="font-label-md text-label-md text-on-primary tracking-tight uppercase">Gap2Grow | MoSPI</span><span class="font-label-sm text-label-sm text-on-primary-container">NSSTA Academy Portal</span></div></div><div class="m-space-md p-space-sm rounded-lg bg-primary/40"><div class="flex items-center gap-space-sm mb-space-xs"><div class="w-8 h-8 rounded-full bg-secondary-container flex items-center justify-center font-label-md text-label-md text-on-secondary">RS</div><div class="flex flex-col min-w-0 flex-1"><span class="font-label-md text-label-md text-on-primary truncate">Dr. Rajesh Sharma, ISS</span><span class="font-label-sm text-label-sm text-on-primary-container truncate">Joint Director, NAD / CSO</span></div></div><div class="flex items-center justify-between pt-space-xs"><span class="font-label-sm text-label-sm text-on-primary-container">ID: ISS-2008-0412</span><span class="font-label-sm text-label-sm text-secondary-container bg-secondary-container/10 px-1.5 py-0.5 rounded">Verified</span></div></div><nav class="flex flex-col px-space-sm gap-1" data-active-classes="bg-surface-container-highest text-on-surface font-label-md"><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-primary-container hover:bg-surface-container-highest hover:text-on-surface transition-colors" data-path="learner-dashboard" href="<?= BASE_URL ?>/pages/dashboard.php"><span class="material-symbols-outlined text-[20px]">space_dashboard</span><span class="font-label-md text-label-md">Learner Dashboard</span></a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-primary-container hover:bg-surface-container-highest hover:text-on-surface transition-colors" data-path="skill-gap-analysis" href="<?= BASE_URL ?>/pages/skill-gap.php"><span class="material-symbols-outlined text-[20px]">analytics</span><span class="font-label-md text-label-md">Skill-Gap Analysis</span></a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-primary-container hover:bg-surface-container-highest hover:text-on-surface transition-colors" data-path="my-learning-path" href="<?= BASE_URL ?>/pages/learning-path.php"><span class="material-symbols-outlined text-[20px]">route</span><span class="font-label-md text-label-md">My Learning Path</span></a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-primary-container hover:bg-surface-container-highest hover:text-on-surface transition-colors" data-path="ai-assessment-generator" href="<?= BASE_URL ?>/pages/assessment-generator.php"><span class="material-symbols-outlined text-[20px]">psychology</span><span class="font-label-md text-label-md">AI Assessment Generator</span></a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-primary-container hover:bg-surface-container-highest hover:text-on-surface transition-colors" data-path="igot-course-catalog" href="<?= BASE_URL ?>/pages/igot-courses.php"><span class="material-symbols-outlined text-[20px]">local_library</span><span class="font-label-md text-label-md">iGOT Course Catalog</span></a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-primary-container hover:bg-surface-container-highest hover:text-on-surface transition-colors" data-path="nssta-tpac-nominations" href="<?= BASE_URL ?>/pages/nssta-programmes.php"><span class="material-symbols-outlined text-[20px]">assignment_turned_in</span><span class="font-label-md text-label-md">NSSTA TPAC Nominations</span></a><a aria-current="page" class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg transition-colors bg-surface-container-highest text-on-surface font-label-md" data-path="cadre-analytics" href="<?= BASE_URL ?>/pages/cadre-analytics.php"><span class="material-symbols-outlined text-[20px]">insights</span><span class="font-label-md text-label-md">Cadre Analytics</span></a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-primary-container hover:bg-surface-container-highest hover:text-on-surface transition-colors" data-path="emerging-skill-forecast" href="<?= BASE_URL ?>/pages/emerging-skills.php"><span class="material-symbols-outlined text-[20px]">trending_up</span><span class="font-label-md text-label-md">Emerging Skill Forecast</span></a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-primary-container hover:bg-surface-container-highest hover:text-on-surface transition-colors" data-path="ai-cadre-copilot" href="<?= BASE_URL ?>/pages/ai-assistant.php"><span class="material-symbols-outlined text-[20px]">smart_toy</span><span class="font-label-md text-label-md">AI Cadre Copilot</span></a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-primary-container hover:bg-surface-container-highest hover:text-on-surface transition-colors" data-path="admin-workforce-hub" href="<?= BASE_URL ?>/pages/admin-dashboard.php"><span class="material-symbols-outlined text-[20px]">lan</span><span class="font-label-md text-label-md">Admin Workforce Hub</span></a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-primary-container hover:bg-surface-container-highest hover:text-on-surface transition-colors" data-path="settings-and-profile" href="<?= BASE_URL ?>/pages/settings.php"><span class="material-symbols-outlined text-[20px]">settings</span><span class="font-label-md text-label-md">Settings &amp; Profile</span></a></nav></div><div class="p-space-md flex flex-col gap-space-sm bg-primary/30"><div class="flex flex-col gap-1"><span class="font-label-sm text-label-sm uppercase tracking-wider text-on-primary-container">Integration Node Telemetry</span><div class="flex flex-wrap gap-1"><span class="inline-flex items-center gap-1 font-label-sm text-label-sm px-2 py-0.5 rounded-full bg-surface-container-lowest/10 text-on-primary"><span class="w-1.5 h-1.5 rounded-full bg-secondary-container"></span>iGOT v2.4 Live</span><span class="inline-flex items-center gap-1 font-label-sm text-label-sm px-2 py-0.5 rounded-full bg-surface-container-lowest/10 text-on-primary"><span class="w-1.5 h-1.5 rounded-full bg-surface-tint"></span>SPARROW Active</span><span class="inline-flex items-center gap-1 font-label-sm text-label-sm px-2 py-0.5 rounded-full bg-surface-container-lowest/10 text-on-primary">GIGW 3.0</span><span class="inline-flex items-center gap-1 font-label-sm text-label-sm px-2 py-0.5 rounded-full bg-surface-container-lowest/10 text-on-primary">NSSTA-ISS Node</span></div></div><a class="flex items-center justify-between px-space-sm py-2 rounded-lg bg-surface-container-lowest/5 text-on-primary-container hover:bg-surface-container-highest hover:text-on-surface transition-colors" href="<?= BASE_URL ?>/logout.php"><span class="font-label-md text-label-md">Sign Out</span><span class="material-symbols-outlined text-[18px]">logout</span></a></div></aside><div class="pl-72"><header class="fixed top-0 left-72 right-0 h-16 bg-surface-container-lowest/95 backdrop-blur-xl shadow-[0_1px_8px_rgba(0,0,0,0.04)] z-40 flex items-center justify-between px-margin"><div class="flex items-center gap-space-md"><div class="flex flex-col"><div class="flex items-center gap-space-sm"><span class="font-label-sm text-label-sm text-primary font-bold tracking-tight uppercase">à¤­à¤¾à¤°à¤¤ à¤¸à¤°à¤•à¤¾à¤° | MoSPI</span><span class="w-1 h-1 rounded-full bg-outline-variant"></span><span class="font-label-sm text-label-sm text-on-surface-variant">Statistical Cadre Intelligence &amp; Administrative Cell</span></div><div class="flex items-center gap-space-xs mt-0.5"><span class="inline-flex items-center gap-1 font-label-sm text-label-sm px-2 py-0.5 rounded bg-surface-container text-on-surface font-semibold"><span class="material-symbols-outlined text-[14px] text-secondary">verified_user</span>NAD / Cadre Control Authority</span><span class="inline-flex items-center gap-1 font-label-sm text-label-sm px-2 py-0.5 rounded bg-surface-container text-on-surface-variant"><span class="material-symbols-outlined text-[14px]">lock</span>e-HRMS Cryptographic Seal: ISS-V4</span></div></div></div><div class="flex items-center gap-space-md"><div class="flex items-center gap-space-xs bg-surface-container-low px-space-sm py-1 rounded-lg"><span class="font-label-sm text-label-sm text-on-surface-variant font-medium">Role:</span><span class="font-label-sm text-label-sm text-on-surface font-semibold">Cadre Joint Director</span><span class="material-symbols-outlined text-[18px] text-on-surface-variant cursor-pointer">arrow_drop_down</span></div><div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center"><span class="material-symbols-outlined text-on-primary text-[18px]">person</span></div></div></header><main class="w-full pt-16 bg-surface"><div class="flex flex-col w-full">
<!-- Sovereign Control Strip & Command Context -->
<div class="w-full bg-surface-container-low px-margin py-space-md shadow-sm">
<div class="max-w-[1440px] mx-auto flex flex-col gap-space-md">
<!-- Screen Header with Authority Badging -->
<div class="flex flex-col md:flex-row md:items-end justify-between gap-space-sm">
<div class="flex flex-col">
<div class="flex items-center gap-space-xs mb-1">
<span class="font-label-sm text-label-sm uppercase tracking-widest px-2 py-0.5 rounded bg-primary text-on-primary font-semibold">CONFIDENTIAL // DOPT-CADRE CELL</span>
<span class="font-label-sm text-label-sm text-on-surface-variant font-medium">MoSPI Statistical Cadre Intelligence Node #409</span>
<span class="w-1 h-1 rounded-full bg-outline-variant"></span>
<span class="font-label-sm text-label-sm text-secondary font-semibold flex items-center gap-0.5">
<span class="material-symbols-outlined text-[14px]">bolt</span>NSSTA Academic Council Verified
            </span>
</div>
<h1 class="font-headline-lg text-headline-lg text-primary tracking-tight">Cadre Analytics &amp; Capability Matrix Intelligence</h1>
<p class="font-body-md text-body-md text-on-surface-variant max-w-4xl mt-0.5">
            Multi-dimensional psychometric diagnostics, competency dispersion, and cross-cadre comparative performance analytics for Indian Statistical Service &amp; SSS personnel.
          </p>
</div>
<div class="flex items-center gap-space-xs shrink-0">
<button class="flex items-center gap-space-xs px-space-sm py-2 rounded bg-surface-container text-on-surface font-label-md text-label-md hover:bg-surface-container-high transition-colors shadow-sm">
<span class="material-symbols-outlined text-[18px]">sim_card_download</span>
<span>Export DPC Dossier</span>
</button>
<button class="flex items-center gap-space-xs px-space-sm py-2 rounded bg-secondary-container text-on-secondary font-label-md text-label-md hover:opacity-95 transition-opacity shadow-sm">
<span class="material-symbols-outlined text-[18px]">publish</span>
<span>Sync iGOT Cadre Stream</span>
</button>
</div>
</div>
<!-- Dimensional Filter Bar -->
<div class="bg-surface-container-lowest p-space-sm rounded-lg shadow-sm flex flex-wrap items-center justify-between gap-space-sm">
<div class="flex flex-wrap items-center gap-space-sm">
<div class="flex items-center gap-1.5 pl-2 text-on-surface-variant">
<span class="material-symbols-outlined text-[18px]">tune</span>
<span class="font-label-sm text-label-sm uppercase tracking-wider font-bold">Parameters:</span>
</div>
<!-- Cadre Type Filter -->
<div class="relative">
<select class="appearance-none bg-surface-container-low font-label-md text-label-md text-on-surface pl-3 pr-8 py-1.5 rounded focus:outline-none focus:bg-surface-container cursor-pointer">
<option>Cadre: ISS (Indian Statistical Service)</option>
<option>Cadre: SSS (Subordinate Statistical Service)</option>
<option>Cadre: State DES Statistical Officers</option>
<option>Cadre: Combined All-India Service</option>
</select>
<span class="material-symbols-outlined pointer-events-none absolute right-2 top-2 text-[18px] text-on-surface-variant">keyboard_arrow_down</span>
</div>
<!-- Grade Band Filter -->
<div class="relative">
<select class="appearance-none bg-surface-container-low font-label-md text-label-md text-on-surface pl-3 pr-8 py-1.5 rounded focus:outline-none focus:bg-surface-container cursor-pointer">
<option>Grade: All Bands (Level 10 - Level 17)</option>
<option>Grade: Level 10-12 (JTS / STS)</option>
<option selected="">Grade: Level 13-13A (JAG / NFSG)</option>
<option>Grade: Level 14+ (SAG / HAG / Apex)</option>
</select>
<span class="material-symbols-outlined pointer-events-none absolute right-2 top-2 text-[18px] text-on-surface-variant">keyboard_arrow_down</span>
</div>
<!-- Domain Specialization Filter -->
<div class="relative">
<select class="appearance-none bg-surface-container-low font-label-md text-label-md text-on-surface pl-3 pr-8 py-1.5 rounded focus:outline-none focus:bg-surface-container cursor-pointer">
<option>Domain: All Core Streams</option>
<option selected="">Domain: National Accounts &amp; Macro Aggregates</option>
<option>Domain: Field Survey Methodology &amp; CAPI</option>
<option>Domain: Machine Learning Nowcasting</option>
<option>Domain: Sovereign DPI &amp; DPDPA 2023</option>
</select>
<span class="material-symbols-outlined pointer-events-none absolute right-2 top-2 text-[18px] text-on-surface-variant">keyboard_arrow_down</span>
</div>
<!-- Statistical Period -->
<div class="relative">
<select class="appearance-none bg-surface-container-low font-label-md text-label-md text-on-surface pl-3 pr-8 py-1.5 rounded focus:outline-none focus:bg-surface-container cursor-pointer">
<option>Period: FY 2024-25 Q3 (Current Audit)</option>
<option>Period: FY 2024-25 Q2</option>
<option>Period: FY 2023-24 Annual Benchmark</option>
</select>
<span class="material-symbols-outlined pointer-events-none absolute right-2 top-2 text-[18px] text-on-surface-variant">keyboard_arrow_down</span>
</div>
</div>
<div class="flex items-center gap-space-xs text-on-surface-variant">
<span class="font-label-sm text-label-sm">Records evaluated: <span class="font-bold text-primary">1,248 active officers</span></span>
<button class="p-1 hover:bg-surface-container rounded transition-colors text-on-surface" title="Refresh Telemetry">
<span class="material-symbols-outlined text-[18px]">sync</span>
</button>
</div>
</div>
</div>
</div>
<!-- Main Content Space -->
<div class="w-full px-margin py-space-lg">
<div class="max-w-[1440px] mx-auto flex flex-col gap-space-lg">
<!-- Top Analytical Overview Metric Cards (Bento 4-Column) -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-space-md">
<!-- Metric 1: Mean Proficiency Index -->
<div class="bg-surface-container-lowest p-space-md rounded-lg shadow-sm flex flex-col justify-between relative overflow-hidden">
<div class="absolute -right-6 -bottom-6 w-24 h-24 rounded-full bg-primary/5 pointer-events-none"></div>
<div>
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider font-semibold">Mean Proficiency Index</span>
<span class="material-symbols-outlined text-primary text-[20px]">psychology</span>
</div>
<div class="flex items-baseline gap-space-xs mt-2">
<span class="font-headline-xl text-headline-xl text-primary font-bold">76.4</span>
<span class="font-body-sm text-body-sm text-on-surface-variant font-medium">/ 100</span>
</div>
</div>
<div class="mt-4 pt-2">
<div class="flex items-center justify-between text-on-surface-variant mb-1">
<span class="font-label-sm text-label-sm">Benchmark delta</span>
<span class="font-label-sm text-label-sm text-secondary font-bold">+3.8 pts YoY</span>
</div>
<div class="w-full h-1.5 bg-surface-container rounded-full overflow-hidden">
<div class="h-full bg-primary rounded-full" style="width: 76.4%"></div>
</div>
</div>
</div>
<!-- Metric 2: Median Assessment Score -->
<div class="bg-surface-container-lowest p-space-md rounded-lg shadow-sm flex flex-col justify-between relative overflow-hidden">
<div class="absolute -right-6 -bottom-6 w-24 h-24 rounded-full bg-secondary-container/10 pointer-events-none"></div>
<div>
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider font-semibold">Median Assessment Score</span>
<span class="material-symbols-outlined text-secondary text-[20px]">equalizer</span>
</div>
<div class="flex items-baseline gap-space-xs mt-2">
<span class="font-headline-xl text-headline-xl text-primary font-bold">78.2%</span>
<span class="font-label-sm text-label-sm px-1.5 py-0.5 rounded bg-surface-container text-on-surface font-semibold">SD: Â±6.4</span>
</div>
</div>
<div class="mt-4 pt-2">
<div class="flex items-center justify-between text-on-surface-variant mb-1">
<span class="font-label-sm text-label-sm">NSSTA Target: 75.0%</span>
<span class="font-label-sm text-label-sm text-on-surface font-semibold">Passed (928 off.)</span>
</div>
<div class="w-full h-1.5 bg-surface-container rounded-full overflow-hidden">
<div class="h-full bg-secondary-container rounded-full" style="width: 78.2%"></div>
</div>
</div>
</div>
<!-- Metric 3: High-Deficit Cluster Volume -->
<div class="bg-surface-container-lowest p-space-md rounded-lg shadow-sm flex flex-col justify-between relative overflow-hidden">
<div class="absolute -right-6 -bottom-6 w-24 h-24 rounded-full bg-error-container/40 pointer-events-none"></div>
<div>
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm text-error uppercase tracking-wider font-semibold">High-Deficit Cluster</span>
<span class="material-symbols-outlined text-error text-[20px]">warning</span>
</div>
<div class="flex items-baseline gap-space-xs mt-2">
<span class="font-headline-xl text-headline-xl text-error font-bold">18.4%</span>
<span class="font-body-sm text-body-sm text-on-surface-variant font-medium">of cadre</span>
</div>
</div>
<div class="mt-4 pt-2">
<div class="flex items-center justify-between text-on-surface-variant mb-1">
<span class="font-label-sm text-label-sm text-on-surface-variant">Urgent Geospatial / Py Deficit</span>
<span class="font-label-sm text-label-sm text-error font-bold">230 Officers</span>
</div>
<div class="w-full h-1.5 bg-surface-container rounded-full overflow-hidden">
<div class="h-full bg-error rounded-full" style="width: 18.4%"></div>
</div>
</div>
</div>
<!-- Metric 4: Promotion DPC Clearance Ratio -->
<div class="bg-surface-container-lowest p-space-md rounded-lg shadow-sm flex flex-col justify-between relative overflow-hidden">
<div class="absolute -right-6 -bottom-6 w-24 h-24 rounded-full bg-surface-variant/40 pointer-events-none"></div>
<div>
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider font-semibold">Promotion DPC Clearance</span>
<span class="material-symbols-outlined text-primary text-[20px]">fact_check</span>
</div>
<div class="flex items-baseline gap-space-xs mt-2">
<span class="font-headline-xl text-headline-xl text-primary font-bold">82.1%</span>
<span class="font-label-sm text-label-sm px-1.5 py-0.5 rounded bg-surface-container text-on-surface font-semibold">Level 14 Gate</span>
</div>
</div>
<div class="mt-4 pt-2">
<div class="flex items-center justify-between text-on-surface-variant mb-1">
<span class="font-label-sm text-label-sm">SAG Criteria Cleared</span>
<span class="font-label-sm text-label-sm text-primary font-bold">115 / 140 Roster</span>
</div>
<div class="w-full h-1.5 bg-surface-container rounded-full overflow-hidden">
<div class="h-full bg-surface-tint rounded-full" style="width: 82.1%"></div>
</div>
</div>
</div>
</div>
<!-- Deep Analytics Primary Workspaces (60% / 40% Split) -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-space-md items-start">
<!-- Left Area (60% / 7 cols in 12-grid) -->
<div class="lg:col-span-7 flex flex-col gap-space-md">
<!-- Visual 1: Radar & Dispersion Analysis -->
<div class="bg-surface-container-lowest p-space-md rounded-lg shadow-sm">
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-space-xs pb-space-sm">
<div class="flex flex-col">
<div class="flex items-center gap-space-xs">
<span class="w-2.5 h-2.5 rounded-sm bg-primary"></span>
<h2 class="font-headline-sm text-headline-sm text-primary">Domain Competency Radar &amp; Dispersion Comparison</h2>
</div>
<span class="font-body-sm text-body-sm text-on-surface-variant">Hexagonal skill assessment against Indian Official Statistical System standard benchmarks</span>
</div>
<div class="flex items-center gap-space-sm shrink-0">
<span class="inline-flex items-center gap-1 font-label-sm text-label-sm text-on-surface-variant">
<span class="w-3 h-1 bg-primary rounded"></span> Cadre Mean
                </span>
<span class="inline-flex items-center gap-1 font-label-sm text-label-sm text-on-surface-variant">
<span class="w-3 h-1 bg-secondary-container rounded"></span> Target Benchmark
                </span>
<span class="inline-flex items-center gap-1 font-label-sm text-label-sm text-on-surface-variant">
<span class="w-3 h-1 bg-surface-tint rounded"></span> Top 10th %ile
                </span>
</div>
</div>
<!-- Radar Visualizer Canvas + Metric Footnote -->
<div class="grid grid-cols-1 md:grid-cols-12 gap-space-md items-center pt-2">
<div class="md:col-span-8 flex justify-center py-2 relative">
<svg class="w-full max-w-[380px] h-auto overflow-visible select-none" viewbox="0 0 420 380">
<!-- Hexagonal concentric background rings -->
<polygon class="text-surface-container-high" fill="none" points="210,40 340,115 340,265 210,340 80,265 80,115" stroke="currentColor" stroke-dasharray="3 3" stroke-width="1.2"></polygon>
<polygon class="text-surface-container-high" fill="none" points="210,75 305,130 305,240 210,295 115,240 115,130" stroke="currentColor" stroke-width="1.2"></polygon>
<polygon class="text-surface-container-high" fill="none" points="210,110 270,145 270,215 210,250 150,215 150,145" stroke="currentColor" stroke-width="1"></polygon>
<polygon class="text-surface-container" fill="none" points="210,145 235,160 235,190 210,205 185,190 185,160" stroke="currentColor" stroke-width="1"></polygon>
<!-- Axis Radials -->
<line class="text-surface-container-high" stroke="currentColor" stroke-width="1" x1="210" x2="210" y1="190" y2="40"></line>
<line class="text-surface-container-high" stroke="currentColor" stroke-width="1" x1="210" x2="340" y1="190" y2="115"></line>
<line class="text-surface-container-high" stroke="currentColor" stroke-width="1" x1="210" x2="340" y1="190" y2="265"></line>
<line class="text-surface-container-high" stroke="currentColor" stroke-width="1" x1="210" x2="210" y1="190" y2="340"></line>
<line class="text-surface-container-high" stroke="currentColor" stroke-width="1" x1="210" x2="80" y1="190" y2="265"></line>
<line class="text-surface-container-high" stroke="currentColor" stroke-width="1" x1="210" x2="80" y1="190" y2="115"></line>
<!-- Target Benchmark Polygon (Orange / secondary-container outline) -->
<polygon fill="#fc6018" fill-opacity="0.08" points="210,65 315,125 310,250 210,310 100,250 105,125" stroke="#fc6018" stroke-dasharray="4 2" stroke-width="2"></polygon>
<!-- Top 10th Percentile (Surface-tint/Navy subtle) -->
<polygon fill="none" points="210,50 330,120 335,260 210,330 90,260 95,120" stroke="#495f82" stroke-width="1.5"></polygon>
<!-- Cadre Average Polygon (Primary solid navy fill) -->
<polygon fill="#0b2545" fill-opacity="0.32" points="210,88 322,128 260,225 210,270 120,230 110,128" stroke="#001026" stroke-width="2.5"></polygon>
<!-- Axis Vertex Data Nodes (Cadre average nodes) -->
<circle cx="210" cy="88" fill="#001026" r="4"></circle>
<circle cx="322" cy="128" fill="#001026" r="4"></circle>
<circle cx="260" cy="225" fill="#001026" r="4"></circle>
<circle cx="210" cy="270" fill="#001026" r="4"></circle>
<circle cx="120" cy="230" fill="#001026" r="4"></circle>
<circle cx="110" cy="128" fill="#001026" r="4"></circle>
<!-- Category Axis Labels -->
<text class="fill-current text-primary font-label-sm text-[11px] font-bold" text-anchor="middle" x="210" y="24">Macro Aggregates (84.1%)</text>
<text class="fill-current text-primary font-label-sm text-[11px] font-bold" text-anchor="start" x="350" y="112">Survey Sampling (88.5%)</text>
<text class="fill-current text-error font-label-sm text-[11px] font-bold" text-anchor="start" x="350" y="272">Spatial GIS (46.2%)</text>
<text class="fill-current text-error font-label-sm text-[11px] font-bold" text-anchor="middle" x="210" y="362">Data Eng / DuckDB (52.8%)</text>
<text class="fill-current text-on-surface font-label-sm text-[11px] font-bold" text-anchor="end" x="70" y="272">ML Nowcasting (61.0%)</text>
<text class="fill-current text-primary font-label-sm text-[11px] font-bold" text-anchor="end" x="70" y="112">DPDPA Compliance (82.7%)</text>
</svg>
</div>
<!-- Right Axis Breakdown Cards -->
<div class="md:col-span-4 flex flex-col gap-space-xs">
<div class="p-2.5 rounded bg-surface-container-low">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm font-semibold text-primary">Macro &amp; Accounts</span>
<span class="font-label-sm text-label-sm text-on-surface font-bold">84 / 100</span>
</div>
<div class="w-full h-1 bg-surface-container mt-1 rounded-full overflow-hidden">
<div class="bg-primary h-full rounded-full" style="width: 84%"></div>
</div>
<span class="font-body-sm text-[11px] text-on-surface-variant block mt-0.5">+5% above target</span>
</div>
<div class="p-2.5 rounded bg-surface-container-low">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm font-semibold text-primary">Survey Sampling</span>
<span class="font-label-sm text-label-sm text-on-surface font-bold">89 / 100</span>
</div>
<div class="w-full h-1 bg-surface-container mt-1 rounded-full overflow-hidden">
<div class="bg-primary h-full rounded-full" style="width: 89%"></div>
</div>
<span class="font-body-sm text-[11px] text-on-surface-variant block mt-0.5">Foundational cadre strength</span>
</div>
<div class="p-2.5 rounded bg-error-container/20">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm font-semibold text-error">Spatial GIS &amp; RS</span>
<span class="font-label-sm text-label-sm text-error font-bold">46 / 100</span>
</div>
<div class="w-full h-1 bg-surface-container mt-1 rounded-full overflow-hidden">
<div class="bg-error h-full rounded-full" style="width: 46%"></div>
</div>
<span class="font-body-sm text-[11px] text-error block mt-0.5">Deficit: -34% below target</span>
</div>
<div class="p-2.5 rounded bg-error-container/20">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm font-semibold text-error">Data Eng / DuckDB</span>
<span class="font-label-sm text-label-sm text-error font-bold">53 / 100</span>
</div>
<div class="w-full h-1 bg-surface-container mt-1 rounded-full overflow-hidden">
<div class="bg-error h-full rounded-full" style="width: 53%"></div>
</div>
<span class="font-body-sm text-[11px] text-error block mt-0.5">Deficit: -22% below target</span>
</div>
<div class="p-2.5 rounded bg-surface-container-low">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm font-semibold text-primary">DPDPA 2023 &amp; DPI</span>
<span class="font-label-sm text-label-sm text-on-surface font-bold">83 / 100</span>
</div>
<div class="w-full h-1 bg-surface-container mt-1 rounded-full overflow-hidden">
<div class="bg-primary h-full rounded-full" style="width: 83%"></div>
</div>
<span class="font-body-sm text-[11px] text-on-surface-variant block mt-0.5">DoPT Compliance met</span>
</div>
</div>
</div>
<!-- Insight Footnote Banner -->
<div class="mt-space-sm p-space-sm rounded bg-surface-container-low flex items-start gap-space-sm">
<span class="material-symbols-outlined text-secondary text-[20px] shrink-0 mt-0.5">lightbulb</span>
<div class="flex flex-col">
<span class="font-label-md text-label-md text-primary font-bold">Cadre Architecture Advisory:</span>
<p class="font-body-sm text-body-sm text-on-surface-variant">
                  While classical estimation and sampling methodology exhibit high stability, spatial aggregation (GIS polygon geo-tagging for Urban Frame Survey) shows an acute talent deficit across JAG/NFSG officers. 120-day intensive NSSTA module recommended.
                </p>
</div>
</div>
</div>
<!-- Visual 2: Seniority vs Technical Competency Correlation Scatterplot Matrix -->
<div class="bg-surface-container-lowest p-space-md rounded-lg shadow-sm">
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-space-xs pb-space-sm">
<div class="flex flex-col">
<div class="flex items-center gap-space-xs">
<span class="w-2.5 h-2.5 rounded-sm bg-secondary"></span>
<h2 class="font-headline-sm text-headline-sm text-primary">Cadre Seniority vs Technical Competency Correlation</h2>
</div>
<span class="font-body-sm text-body-sm text-on-surface-variant">Mapping junior stack capability vs senior institutional survey governance to isolate bidirectional mentoring nodes</span>
</div>
<span class="font-label-sm text-label-sm px-2 py-0.5 rounded bg-surface-container text-on-surface font-semibold shrink-0">
                Inverse Correlation: r = -0.68
              </span>
</div>
<!-- Scatterplot Visualizer (SVG) -->
<div class="w-full overflow-x-auto py-2">
<svg class="w-full min-w-[580px] h-64 overflow-visible select-none" viewbox="0 0 680 280">
<!-- Axes -->
<line class="text-outline-variant" stroke="currentColor" stroke-width="1.5" x1="50" x2="650" y1="230" y2="230"></line>
<line class="text-outline-variant" stroke="currentColor" stroke-width="1.5" x1="50" x2="50" y1="20" y2="230"></line>
<!-- Gridlines -->
<line class="text-surface-container-high" stroke="currentColor" stroke-dasharray="2 2" stroke-width="1" x1="50" x2="650" y1="175" y2="175"></line>
<line class="text-surface-container-high" stroke="currentColor" stroke-dasharray="2 2" stroke-width="1" x1="50" x2="650" y1="120" y2="120"></line>
<line class="text-surface-container-high" stroke="currentColor" stroke-dasharray="2 2" stroke-width="1" x1="50" x2="650" y1="65" y2="65"></line>
<line class="text-surface-container-high" stroke="currentColor" stroke-dasharray="2 2" stroke-width="1" x1="200" x2="200" y1="20" y2="230"></line>
<line class="text-surface-container-high" stroke="currentColor" stroke-dasharray="2 2" stroke-width="1" x1="350" x2="350" y1="20" y2="230"></line>
<line class="text-surface-container-high" stroke="currentColor" stroke-dasharray="2 2" stroke-width="1" x1="500" x2="500" y1="20" y2="230"></line>
<!-- Y-Axis Labels (Modern Tech Stack: Python/SQL/GIS) -->
<text class="fill-current text-on-surface-variant font-label-sm text-[10px]" text-anchor="end" x="42" y="234">20%</text>
<text class="fill-current text-on-surface-variant font-label-sm text-[10px]" text-anchor="end" x="42" y="179">40%</text>
<text class="fill-current text-on-surface-variant font-label-sm text-[10px]" text-anchor="end" x="42" y="124">60%</text>
<text class="fill-current text-on-surface-variant font-label-sm text-[10px]" text-anchor="end" x="42" y="69">80%</text>
<text class="fill-current text-on-surface-variant font-label-sm text-[10px]" text-anchor="end" x="42" y="24">100%</text>
<!-- X-Axis Labels (Years of Service / Seniority) -->
<text class="fill-current text-on-surface-variant font-label-sm text-[10px]" text-anchor="middle" x="50" y="248">0-3 Yrs (JTS)</text>
<text class="fill-current text-on-surface-variant font-label-sm text-[10px]" text-anchor="middle" x="200" y="248">5-8 Yrs (STS)</text>
<text class="fill-current text-on-surface-variant font-label-sm text-[10px]" text-anchor="middle" x="350" y="248">10-15 Yrs (JAG)</text>
<text class="fill-current text-on-surface-variant font-label-sm text-[10px]" text-anchor="middle" x="500" y="248">16-22 Yrs (NFSG)</text>
<text class="fill-current text-on-surface-variant font-label-sm text-[10px]" text-anchor="middle" x="630" y="248">25+ Yrs (SAG/HAG)</text>
<!-- Axis Titles -->
<text class="fill-current text-primary font-label-sm text-[11px] font-bold" text-anchor="middle" transform="rotate(-90 20 120)" x="20" y="120">Python / Distributed Data Score</text>
<text class="fill-current text-primary font-label-sm text-[11px] font-bold" text-anchor="middle" x="350" y="270">Cadre Seniority &amp; Administrative Standing</text>
<!-- Bidirectional Crossover Zone Overlay (JAG/STS window) -->
<rect fill="#fc6018" fill-opacity="0.08" height="200" rx="4" width="160" x="260" y="25"></rect>
<text class="fill-current text-secondary font-label-sm text-[10px] font-bold uppercase tracking-wider" text-anchor="middle" x="340" y="42">Optimal Peer-Exchange Crossover</text>
<!-- Regression Trend Curve -->
<path d="M 60,45 Q 220,90 350,140 T 630,215" fill="none" stroke="#fc6018" stroke-linecap="round" stroke-width="2.5"></path>
<!-- Officer Scatter Points (Categorized by cadre cohort) -->
<!-- Junior Officers: High modern tech, low seniority -->
<circle cx="70" cy="40" fill="#0b2545" fill-opacity="0.8" r="5"></circle>
<circle cx="85" cy="55" fill="#0b2545" fill-opacity="0.8" r="4.5"></circle>
<circle cx="95" cy="48" fill="#0b2545" fill-opacity="0.8" r="6"></circle>
<circle cx="110" cy="62" fill="#0b2545" fill-opacity="0.8" r="5"></circle>
<circle cx="125" cy="72" fill="#0b2545" fill-opacity="0.8" r="4"></circle>
<circle cx="140" cy="58" fill="#0b2545" fill-opacity="0.8" r="5.5"></circle>
<circle cx="160" cy="80" fill="#0b2545" fill-opacity="0.8" r="5"></circle>
<circle cx="180" cy="88" fill="#0b2545" fill-opacity="0.8" r="5"></circle>
<circle cx="195" cy="75" fill="#0b2545" fill-opacity="0.8" r="4.5"></circle>
<!-- Mid-Level (Crossover) -->
<circle cx="280" cy="118" fill="#fc6018" r="6"></circle>
<circle cx="300" cy="130" fill="#fc6018" r="5.5"></circle>
<circle cx="320" cy="122" fill="#fc6018" r="5"></circle>
<circle cx="340" cy="148" fill="#fc6018" r="7"></circle>
<circle cx="370" cy="135" fill="#fc6018" r="5"></circle>
<circle cx="390" cy="155" fill="#fc6018" r="6"></circle>
<circle cx="410" cy="142" fill="#fc6018" r="5"></circle>
<!-- Senior Officers: Strong governance, legacy computation, need tech bridge -->
<circle cx="480" cy="180" fill="#495f82" r="5.5"></circle>
<circle cx="510" cy="190" fill="#495f82" r="5"></circle>
<circle cx="530" cy="175" fill="#495f82" r="6"></circle>
<circle cx="560" cy="205" fill="#495f82" r="5.5"></circle>
<circle cx="585" cy="198" fill="#495f82" r="6"></circle>
<circle cx="610" cy="212" fill="#495f82" r="5"></circle>
<circle cx="625" cy="218" fill="#495f82" r="4.5"></circle>
</svg>
</div>
<!-- Quadrant Operational Guidance -->
<div class="grid grid-cols-1 sm:grid-cols-2 gap-space-sm pt-space-xs mt-space-xs">
<div class="p-space-sm rounded bg-surface-container-low flex flex-col gap-1">
<div class="flex items-center gap-1.5">
<span class="w-2 h-2 rounded-full bg-primary"></span>
<span class="font-label-sm text-label-sm font-bold text-primary">Junior Cadre (ISS 2018-2023)</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">
                  High proficiency in Apache Arrow, Python automated scraping, and Docker, but require practical immersion in statutory Price Statistics &amp; Administrative DPC guidelines.
                </p>
</div>
<div class="p-space-sm rounded bg-surface-container-low flex flex-col gap-1">
<div class="flex items-center gap-1.5">
<span class="w-2 h-2 rounded-full bg-surface-tint"></span>
<span class="font-label-sm text-label-sm font-bold text-primary">Senior Leadership (ISS 1998-2010)</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">
                  Superlative institutional knowledge in Survey Framing and UN-SNA 2008 accounts; prioritized for executive masterclasses in AI-Assisted Governance &amp; Cloud Data Warehouses.
                </p>
</div>
</div>
</div>
<!-- Cross-Cadre Roster Table with High-Volume Audit Clarity -->
<div class="bg-surface-container-lowest p-space-md rounded-lg shadow-sm">
<div class="flex items-center justify-between pb-space-sm">
<div class="flex flex-col">
<h3 class="font-headline-sm text-headline-sm text-primary">Cadre Capability Audit Roster</h3>
<span class="font-body-sm text-body-sm text-on-surface-variant">Sampled senior personnel under DPC review for Level-14 elevation</span>
</div>
<span class="font-label-sm text-label-sm px-2 py-0.5 rounded bg-surface-container text-on-surface font-mono font-medium">SHOWING 4 OF 140 DOSSIERS</span>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left font-body-sm text-body-sm">
<thead>
<tr class="bg-surface-container-low text-on-surface-variant text-[11px] font-label-sm uppercase tracking-wider">
<th class="py-2.5 px-3">Officer &amp; Cadre ID</th>
<th class="py-2.5 px-3">Current Deployment</th>
<th class="py-2.5 px-3">Composite Index</th>
<th class="py-2.5 px-3">Primary Strength</th>
<th class="py-2.5 px-3">Identified Deficit</th>
<th class="py-2.5 px-3 text-right">DPC Status</th>
</tr>
</thead>
<tbody class="text-on-surface">
<tr class="hover:bg-surface-container-low transition-colors">
<td class="py-2.5 px-3">
<div class="flex flex-col">
<span class="font-label-md text-label-md font-bold text-primary">Dr. Rajesh Sharma</span>
<span class="font-mono text-[11px] text-on-surface-variant">ISS-2008-0412</span>
</div>
</td>
<td class="py-2.5 px-3">Joint Director, NAD</td>
<td class="py-2.5 px-3">
<div class="flex items-center gap-1.5 font-bold font-mono">
<span>89.2</span>
<span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
</div>
</td>
<td class="py-2.5 px-3">
<span class="px-2 py-0.5 rounded-full bg-surface-container font-label-sm text-label-sm text-on-surface">SUT Balancing</span>
</td>
<td class="py-2.5 px-3">
<span class="px-2 py-0.5 rounded-full bg-surface-container-high font-label-sm text-label-sm text-on-surface-variant">Geo-Spatial GIS</span>
</td>
<td class="py-2.5 px-3 text-right">
<span class="inline-flex items-center gap-1 font-label-sm text-label-sm text-on-surface font-semibold bg-surface-container px-2 py-0.5 rounded">
<span class="material-symbols-outlined text-[14px] text-secondary">check_circle</span>Eligible
                      </span>
</td>
</tr>
<tr class="hover:bg-surface-container-low transition-colors">
<td class="py-2.5 px-3">
<div class="flex flex-col">
<span class="font-label-md text-label-md font-bold text-primary">Smt. Meenakshi Sundaram</span>
<span class="font-mono text-[11px] text-on-surface-variant">ISS-2010-0628</span>
</div>
</td>
<td class="py-2.5 px-3">Director, NSSO (FOD) Kolkata</td>
<td class="py-2.5 px-3">
<div class="flex items-center gap-1.5 font-bold font-mono">
<span>91.4</span>
<span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
</div>
</td>
<td class="py-2.5 px-3">
<span class="px-2 py-0.5 rounded-full bg-surface-container font-label-sm text-label-sm text-on-surface">Two-Stage Sampling</span>
</td>
<td class="py-2.5 px-3">
<span class="px-2 py-0.5 rounded-full bg-surface-container-high font-label-sm text-label-sm text-on-surface-variant">ML Nowcasting</span>
</td>
<td class="py-2.5 px-3 text-right">
<span class="inline-flex items-center gap-1 font-label-sm text-label-sm text-on-surface font-semibold bg-surface-container px-2 py-0.5 rounded">
<span class="material-symbols-outlined text-[14px] text-secondary">check_circle</span>Eligible
                      </span>
</td>
</tr>
<tr class="hover:bg-surface-container-low transition-colors">
<td class="py-2.5 px-3">
<div class="flex flex-col">
<span class="font-label-md text-label-md font-bold text-primary">Shri Vikramaditya Rao</span>
<span class="font-mono text-[11px] text-on-surface-variant">ISS-2009-0551</span>
</div>
</td>
<td class="py-2.5 px-3">Director, Price Statistics Div</td>
<td class="py-2.5 px-3">
<div class="flex items-center gap-1.5 font-bold font-mono text-error">
<span>64.8</span>
<span class="w-1.5 h-1.5 rounded-full bg-error"></span>
</div>
</td>
<td class="py-2.5 px-3">
<span class="px-2 py-0.5 rounded-full bg-surface-container font-label-sm text-label-sm text-on-surface">CPI Aggregation</span>
</td>
<td class="py-2.5 px-3">
<span class="px-2 py-0.5 rounded-full bg-error-container text-error font-label-sm text-label-sm font-semibold">Hedonic Imputation</span>
</td>
<td class="py-2.5 px-3 text-right">
<span class="inline-flex items-center gap-1 font-label-sm text-label-sm text-error font-semibold bg-error-container/30 px-2 py-0.5 rounded">
<span class="material-symbols-outlined text-[14px]">pending_actions</span>Deficit Hold
                      </span>
</td>
</tr>
<tr class="hover:bg-surface-container-low transition-colors">
<td class="py-2.5 px-3">
<div class="flex flex-col">
<span class="font-label-md text-label-md font-bold text-primary">Dr. Sunita Pathak</span>
<span class="font-mono text-[11px] text-on-surface-variant">ISS-2012-0789</span>
</div>
</td>
<td class="py-2.5 px-3">Joint Director, Data Informatics</td>
<td class="py-2.5 px-3">
<div class="flex items-center gap-1.5 font-bold font-mono">
<span>86.0</span>
<span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
</div>
</td>
<td class="py-2.5 px-3">
<span class="px-2 py-0.5 rounded-full bg-surface-container font-label-sm text-label-sm text-on-surface">Data Pipelines (Arrow)</span>
</td>
<td class="py-2.5 px-3">
<span class="px-2 py-0.5 rounded-full bg-surface-container-high font-label-sm text-label-sm text-on-surface-variant">National Accounts Base</span>
</td>
<td class="py-2.5 px-3 text-right">
<span class="inline-flex items-center gap-1 font-label-sm text-label-sm text-on-surface font-semibold bg-surface-container px-2 py-0.5 rounded">
<span class="material-symbols-outlined text-[14px] text-secondary">check_circle</span>Eligible
                      </span>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
<!-- Right Area (40% / 5 cols in 12-grid) -->
<div class="lg:col-span-5 flex flex-col gap-space-md">
<!-- Visual 3: Regional & Field Office Disparity Index -->
<div class="bg-surface-container-lowest p-space-md rounded-lg shadow-sm">
<div class="flex flex-col pb-space-sm">
<div class="flex items-center justify-between">
<div class="flex items-center gap-space-xs">
<span class="w-2.5 h-2.5 rounded-sm bg-primary"></span>
<h2 class="font-headline-sm text-headline-sm text-primary">Regional &amp; Field Office Disparity</h2>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant">6 NSSO Zones</span>
</div>
<span class="font-body-sm text-body-sm text-on-surface-variant">Audit telemetry measuring CAPI capture error rates and non-sampling reduction</span>
</div>
<!-- Regional Bar Visualizer List -->
<div class="flex flex-col gap-space-sm pt-1">
<!-- Zone 1: Southern Zone (Top Performer) -->
<div class="p-space-sm rounded bg-surface-container-low flex flex-col gap-1">
<div class="flex items-center justify-between">
<div class="flex items-center gap-1.5">
<span class="font-label-md text-label-md font-bold text-primary">Southern Zone (Bengaluru HQ)</span>
<span class="font-label-sm text-[10px] px-1.5 py-0.2 rounded bg-surface-container text-on-surface font-semibold">CAPI v4.2</span>
</div>
<span class="font-mono font-bold text-label-md text-primary">2.1% Error Rate</span>
</div>
<div class="w-full h-2 bg-surface-container rounded-full overflow-hidden flex">
<div class="bg-primary h-full rounded-full" style="width: 94%"></div>
</div>
<div class="flex items-center justify-between text-on-surface-variant font-label-sm text-[11px]">
<span>Field Audit Compliance: 97.4%</span>
<span class="font-semibold text-primary">High Accuracy</span>
</div>
</div>
<!-- Zone 2: Western Zone -->
<div class="p-space-sm rounded bg-surface-container-low flex flex-col gap-1">
<div class="flex items-center justify-between">
<div class="flex items-center gap-1.5">
<span class="font-label-md text-label-md font-bold text-primary">Western Zone (Mumbai HQ)</span>
<span class="font-label-sm text-[10px] px-1.5 py-0.2 rounded bg-surface-container text-on-surface font-semibold">CAPI v4.2</span>
</div>
<span class="font-mono font-bold text-label-md text-primary">3.4% Error Rate</span>
</div>
<div class="w-full h-2 bg-surface-container rounded-full overflow-hidden flex">
<div class="bg-primary h-full rounded-full" style="width: 88%"></div>
</div>
<div class="flex items-center justify-between text-on-surface-variant font-label-sm text-[11px]">
<span>Field Audit Compliance: 94.1%</span>
<span class="font-semibold text-primary">High Accuracy</span>
</div>
</div>
<!-- Zone 3: Northern Zone -->
<div class="p-space-sm rounded bg-surface-container-low flex flex-col gap-1">
<div class="flex items-center justify-between">
<div class="flex items-center gap-1.5">
<span class="font-label-md text-label-md font-bold text-primary">Northern Zone (New Delhi HQ)</span>
<span class="font-label-sm text-[10px] px-1.5 py-0.2 rounded bg-surface-container text-on-surface font-semibold">CAPI v4.1</span>
</div>
<span class="font-mono font-bold text-label-md text-on-surface">5.8% Error Rate</span>
</div>
<div class="w-full h-2 bg-surface-container rounded-full overflow-hidden flex">
<div class="bg-surface-tint h-full rounded-full" style="width: 78%"></div>
</div>
<div class="flex items-center justify-between text-on-surface-variant font-label-sm text-[11px]">
<span>Field Audit Compliance: 88.6%</span>
<span class="font-semibold text-on-surface-variant">Moderate Variance</span>
</div>
</div>
<!-- Zone 4: Eastern Zone -->
<div class="p-space-sm rounded bg-surface-container-low flex flex-col gap-1">
<div class="flex items-center justify-between">
<div class="flex items-center gap-1.5">
<span class="font-label-md text-label-md font-bold text-primary">Eastern Zone (Kolkata HQ)</span>
<span class="font-label-sm text-[10px] px-1.5 py-0.2 rounded bg-surface-container text-on-surface font-semibold">CAPI v4.1</span>
</div>
<span class="font-mono font-bold text-label-md text-on-surface">6.2% Error Rate</span>
</div>
<div class="w-full h-2 bg-surface-container rounded-full overflow-hidden flex">
<div class="bg-surface-tint h-full rounded-full" style="width: 75%"></div>
</div>
<div class="flex items-center justify-between text-on-surface-variant font-label-sm text-[11px]">
<span>Field Audit Compliance: 85.2%</span>
<span class="font-semibold text-on-surface-variant">Moderate Variance</span>
</div>
</div>
<!-- Zone 5: Central Zone -->
<div class="p-space-sm rounded bg-surface-container-low flex flex-col gap-1">
<div class="flex items-center justify-between">
<div class="flex items-center gap-1.5">
<span class="font-label-md text-label-md font-bold text-primary">Central Zone (Nagpur HQ)</span>
<span class="font-label-sm text-[10px] px-1.5 py-0.2 rounded bg-surface-container text-on-surface font-semibold">CAPI v4.0</span>
</div>
<span class="font-mono font-bold text-label-md text-error">8.9% Error Rate</span>
</div>
<div class="w-full h-2 bg-surface-container rounded-full overflow-hidden flex">
<div class="bg-secondary-container h-full rounded-full" style="width: 62%"></div>
</div>
<div class="flex items-center justify-between text-on-surface-variant font-label-sm text-[11px]">
<span>Field Audit Compliance: 79.8%</span>
<span class="font-semibold text-error">Intervention Needed</span>
</div>
</div>
<!-- Zone 6: North-Eastern Zone (Critical Gap) -->
<div class="p-space-sm rounded bg-error-container/20 flex flex-col gap-1">
<div class="flex items-center justify-between">
<div class="flex items-center gap-1.5">
<span class="font-label-md text-label-md font-bold text-error">North-Eastern Zone (Guwahati HQ)</span>
<span class="font-label-sm text-[10px] px-1.5 py-0.2 rounded bg-error-container text-error font-semibold">CAPI v3.9</span>
</div>
<span class="font-mono font-bold text-label-md text-error">13.4% Error Rate</span>
</div>
<div class="w-full h-2 bg-surface-container rounded-full overflow-hidden flex">
<div class="bg-error h-full rounded-full" style="width: 48%"></div>
</div>
<div class="flex items-center justify-between text-on-surface-variant font-label-sm text-[11px]">
<span class="text-error font-medium">Field Audit Compliance: 68.2%</span>
<span class="font-bold text-error">Critical Training Deficit</span>
</div>
</div>
</div>
</div>
<!-- Visual 4: Key Competency Bottlenecks Ranking -->
<div class="bg-surface-container-lowest p-space-md rounded-lg shadow-sm">
<div class="flex flex-col pb-space-sm">
<div class="flex items-center justify-between">
<div class="flex items-center gap-space-xs">
<span class="w-2.5 h-2.5 rounded-sm bg-error"></span>
<h2 class="font-headline-sm text-headline-sm text-primary">Top 5 Critical Skill Bottlenecks</h2>
</div>
<span class="font-label-sm text-label-sm text-error font-bold tracking-tight">SERVICE-WIDE DEFICIT</span>
</div>
<span class="font-body-sm text-body-sm text-on-surface-variant">Ranked by negative variance from prescribed Ministry benchmark competencies</span>
</div>
<div class="flex flex-col gap-space-sm pt-1">
<!-- Item 1 -->
<div class="p-space-sm rounded bg-surface-container-low flex flex-col gap-1">
<div class="flex items-start justify-between gap-space-sm">
<div class="flex items-start gap-space-xs">
<span class="w-5 h-5 rounded bg-error text-on-error font-mono text-[11px] font-bold flex items-center justify-center shrink-0 mt-0.5">1</span>
<div class="flex flex-col">
<span class="font-label-md text-label-md font-bold text-primary">Spatial Microdata Polygon Tagging</span>
<span class="font-body-sm text-[12px] text-on-surface-variant">Urban Frame Survey (UFS) GIS digital integration</span>
</div>
</div>
<span class="font-mono text-label-md font-bold text-error whitespace-nowrap">-34% var</span>
</div>
<div class="w-full h-1.5 bg-surface-container rounded-full overflow-hidden mt-1">
<div class="bg-error h-full rounded-full" style="width: 34%"></div>
</div>
</div>
<!-- Item 2 -->
<div class="p-space-sm rounded bg-surface-container-low flex flex-col gap-1">
<div class="flex items-start justify-between gap-space-sm">
<div class="flex items-start gap-space-xs">
<span class="w-5 h-5 rounded bg-error text-on-error font-mono text-[11px] font-bold flex items-center justify-center shrink-0 mt-0.5">2</span>
<div class="flex flex-col">
<span class="font-label-md text-label-md font-bold text-primary">Chained Index Linking &amp; Hedonic Pricing</span>
<span class="font-body-sm text-[12px] text-on-surface-variant">Consumer Price Index (CPI) revision methodology</span>
</div>
</div>
<span class="font-mono text-label-md font-bold text-error whitespace-nowrap">-28% var</span>
</div>
<div class="w-full h-1.5 bg-surface-container rounded-full overflow-hidden mt-1">
<div class="bg-error h-full rounded-full" style="width: 28%"></div>
</div>
</div>
<!-- Item 3 -->
<div class="p-space-sm rounded bg-surface-container-low flex flex-col gap-1">
<div class="flex items-start justify-between gap-space-sm">
<div class="flex items-start gap-space-xs">
<span class="w-5 h-5 rounded bg-secondary text-on-secondary font-mono text-[11px] font-bold flex items-center justify-center shrink-0 mt-0.5">3</span>
<div class="flex flex-col">
<span class="font-label-md text-label-md font-bold text-primary">Time-Series Seasonality Adjustment (X-13ARIMA)</span>
<span class="font-body-sm text-[12px] text-on-surface-variant">Quarterly GDP rapid nowcast &amp; IIP deseasonalization</span>
</div>
</div>
<span class="font-mono text-label-md font-bold text-secondary whitespace-nowrap">-22% var</span>
</div>
<div class="w-full h-1.5 bg-surface-container rounded-full overflow-hidden mt-1">
<div class="bg-secondary h-full rounded-full" style="width: 22%"></div>
</div>
</div>
<!-- Item 4 -->
<div class="p-space-sm rounded bg-surface-container-low flex flex-col gap-1">
<div class="flex items-start justify-between gap-space-sm">
<div class="flex items-start gap-space-xs">
<span class="w-5 h-5 rounded bg-secondary text-on-secondary font-mono text-[11px] font-bold flex items-center justify-center shrink-0 mt-0.5">4</span>
<div class="flex flex-col">
<span class="font-label-md text-label-md font-bold text-primary">Differential Privacy &amp; Synthetic Microdata</span>
<span class="font-body-sm text-[12px] text-on-surface-variant">Public release anonymization under DPDPA 2023</span>
</div>
</div>
<span class="font-mono text-label-md font-bold text-secondary whitespace-nowrap">-19% var</span>
</div>
<div class="w-full h-1.5 bg-surface-container rounded-full overflow-hidden mt-1">
<div class="bg-secondary h-full rounded-full" style="width: 19%"></div>
</div>
</div>
<!-- Item 5 -->
<div class="p-space-sm rounded bg-surface-container-low flex flex-col gap-1">
<div class="flex items-start justify-between gap-space-sm">
<div class="flex items-start gap-space-xs">
<span class="w-5 h-5 rounded bg-surface-tint text-on-primary font-mono text-[11px] font-bold flex items-center justify-center shrink-0 mt-0.5">5</span>
<div class="flex flex-col">
<span class="font-label-md text-label-md font-bold text-primary">Supply-Use Table (SUT) Matrix Inversion</span>
<span class="font-body-sm text-[12px] text-on-surface-variant">RAS iterative balancing algorithms for SNA 2008</span>
</div>
</div>
<span class="font-mono text-label-md font-bold text-primary whitespace-nowrap">-11% var</span>
</div>
<div class="w-full h-1.5 bg-surface-container rounded-full overflow-hidden mt-1">
<div class="bg-primary h-full rounded-full" style="width: 11%"></div>
</div>
</div>
</div>
<!-- Action Card for NSSTA Academic Council -->
<div class="mt-space-sm p-space-sm rounded bg-surface-container flex items-center justify-between gap-space-sm">
<div class="flex items-center gap-space-xs">
<span class="material-symbols-outlined text-secondary text-[20px]">assignment_turned_in</span>
<span class="font-label-sm text-label-sm text-on-surface font-semibold">Auto-generate NSSTA Curriculum Directive for Top 3 Deficits</span>
</div>
<button class="px-2.5 py-1.5 rounded bg-primary text-on-primary font-label-sm text-label-sm hover:opacity-90 transition-opacity whitespace-nowrap">
                Dispatch Notice
              </button>
</div>
</div>
<!-- Quick Cadre Health Micro-Summary -->
<div class="bg-primary-container text-on-primary p-space-md rounded-lg shadow-sm flex flex-col justify-between">
<div class="flex items-start justify-between">
<div>
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-primary-container">Statutory Cadre Resilience Ratio</span>
<div class="flex items-baseline gap-2 mt-1">
<span class="font-headline-lg text-headline-lg font-bold text-on-primary">94.3%</span>
<span class="font-label-sm text-label-sm text-secondary-container font-semibold">Sovereign Benchmark Met</span>
</div>
</div>
<div class="w-9 h-9 rounded bg-surface-container-lowest/10 flex items-center justify-center text-secondary-container">
<span class="material-symbols-outlined text-[22px]">shield</span>
</div>
</div>
<p class="font-body-sm text-body-sm text-on-primary-container mt-3">
              Cryptographically verified against DoPT Integrated Statistical Officer Directory and e-HRMS 2.0. Next cadre review scheduled for 15 May 2025.
            </p>
</div>
</div>
</div>
</div>
</div>
</div></main></div></body></html>
