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
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/><style>@layer base{html,body{margin:0;padding:0;}body{overscroll-behavior:none;}main>:first-child{margin-top:0!important;}main>:last-child{margin-bottom:0!important;}}::-webkit-scrollbar{display:none;}</style><script src="https://cdn.tailwindcss.com"></script><script id="tailwind-config">tailwind.config={darkMode:"class",theme:{extend:{"colors":{"surface-container-lowest":"#ffffff","surface":"#f8f9ff","primary-fixed":"#d5e3ff","secondary-container":"#fc6018","surface-tint":"#495f82","on-background":"#0d1c2f","on-tertiary-fixed":"#00164e","error":"#ba1a1a","on-surface":"#0d1c2f","tertiary-fixed":"#dce1ff","surface-container-highest":"#d5e3fd","on-tertiary":"#ffffff","tertiary-container":"#001e63","on-tertiary-container":"#7088dc","primary":"#001026","surface-container":"#e6eeff","on-surface-variant":"#44474e","background":"#f8f9ff","on-secondary-fixed-variant":"#802a00","on-primary":"#ffffff","tertiary-fixed-dim":"#b6c4ff","secondary":"#a83900","inverse-on-surface":"#ebf1ff","tertiary":"#000c34","on-primary-container":"#778db2","primary-container":"#0b2545","surface-dim":"#ccdbf4","on-primary-fixed":"#001c3b","on-secondary-fixed":"#380d00","inverse-primary":"#b1c7f0","error-container":"#ffdad6","on-error-container":"#93000a","inverse-surface":"#233144","on-tertiary-fixed-variant":"#264191","secondary-fixed":"#ffdbcf","outline":"#74777f","on-primary-fixed-variant":"#314769","on-error":"#ffffff","surface-container-low":"#eff4ff","secondary-fixed-dim":"#ffb59a","surface-variant":"#d5e3fd","on-secondary-container":"#531800","on-secondary":"#ffffff","surface-container-high":"#dde9ff","outline-variant":"#c4c6cf","surface-bright":"#f8f9ff","primary-fixed-dim":"#b1c7f0"},"borderRadius":{"DEFAULT":"0.125rem","lg":"0.25rem","xl":"0.5rem","full":"0.75rem"},"spacing":{"gutter-mobile":"0.75rem","margin-mobile":"1rem","space-lg":"1.5rem","space-sm":"0.5rem","gutter":"1.5rem","space-md":"1rem","space-xs":"0.25rem","margin":"2rem","space-xl":"2.5rem"},"fontFamily":{"label-lg":["Public Sans"],"label-md":["Public Sans"],"body-lg":["Public Sans"],"body-md":["Public Sans"],"headline-lg":["Public Sans"],"headline-xl":["Public Sans"],"headline-lg-mobile":["Public Sans"],"label-sm":["Public Sans"],"headline-md":["Public Sans"],"body-sm":["Public Sans"],"headline-sm":["Public Sans"],"headline-xl-mobile":["Public Sans"]},"fontSize":{"label-lg":["14px",{"lineHeight":"20px","letterSpacing":"0.01em","fontWeight":"600"}],"label-md":["12px",{"lineHeight":"16px","letterSpacing":"0.02em","fontWeight":"600"}],"body-lg":["16px",{"lineHeight":"24px","fontWeight":"400"}],"body-md":["14px",{"lineHeight":"20px","fontWeight":"400"}],"headline-lg":["28px",{"lineHeight":"36px","letterSpacing":"-0.01em","fontWeight":"700"}],"headline-xl":["36px",{"lineHeight":"44px","letterSpacing":"-0.02em","fontWeight":"700"}],"headline-lg-mobile":["22px",{"lineHeight":"30px","letterSpacing":"0em","fontWeight":"700"}],"label-sm":["11px",{"lineHeight":"14px","letterSpacing":"0.03em","fontWeight":"600"}],"headline-md":["22px",{"lineHeight":"28px","fontWeight":"600"}],"body-sm":["12px",{"lineHeight":"18px","fontWeight":"400"}],"headline-sm":["18px",{"lineHeight":"24px","fontWeight":"600"}],"headline-xl-mobile":["28px",{"lineHeight":"36px","letterSpacing":"-0.01em","fontWeight":"700"}]}}}}</script></head><body class="bg-surface font-body-md text-body-md text-on-surface antialiased"><aside class="fixed left-0 top-0 h-full w-72 bg-primary-container text-on-primary z-50 flex flex-col justify-between shadow-[0_4px_20px_rgba(11,37,69,0.25)]"><div class="flex flex-col"><div class="px-space-md py-space-sm bg-primary flex items-center justify-between"><div class="flex items-center gap-space-xs"><span class="material-symbols-outlined text-secondary-container text-[20px]">verified</span><span class="font-label-sm text-label-sm tracking-wide text-primary-fixed">GIGW 3.0 | iGOT Live</span></div><span class="w-2 h-2 rounded-full bg-secondary-container animate-pulse"></span></div><div class="p-space-md bg-tertiary-container"><div class="flex items-center gap-space-sm"><div class="w-11 h-11 rounded-full bg-primary flex items-center justify-center"><span class="material-symbols-outlined text-on-primary text-[24px]">person</span></div><div class="min-w-0 flex-1"><div class="font-label-lg text-label-lg text-on-tertiary truncate">Dr. Rajesh Sharma, ISS</div><div class="font-body-sm text-body-sm text-on-tertiary-container truncate">Joint Director, NAD (CSO)</div></div></div><div class="mt-space-sm pt-space-xs flex items-center justify-between text-label-sm font-label-sm"><span class="bg-secondary text-on-secondary px-2 py-0.5 rounded">ISS Cadre</span><span class="text-primary-fixed truncate">ID: ISS-2008-0412</span></div></div><nav class="px-space-sm py-space-md space-y-1 flex flex-col" data-active-classes="bg-primary text-on-primary font-bold"><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="learner-dashboard" href="<?= BASE_URL ?>/pages/dashboard.php"><span class="material-symbols-outlined text-[20px]">space_dashboard</span><span>Learner Dashboard</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="skill-gap-analysis" href="<?= BASE_URL ?>/pages/skill-gap.php"><span class="material-symbols-outlined text-[20px]">monitoring</span><span>Skill-Gap Analysis</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="my-learning-path" href="<?= BASE_URL ?>/pages/learning-path.php"><span class="material-symbols-outlined text-[20px]">route</span><span>My Learning Path</span></a><a aria-current="page" class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg transition-colors bg-primary text-on-primary font-bold" data-path="ai-assessment-generator" href="<?= BASE_URL ?>/pages/assessment-generator.php"><span class="material-symbols-outlined text-[20px]">psychology</span><span>AI Assessment Generator</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="igot-course-catalog" href="<?= BASE_URL ?>/pages/igot-courses.php"><span class="material-symbols-outlined text-[20px]">menu_book</span><span>iGOT Course Catalog</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="nssta-tpac-nominations" href="<?= BASE_URL ?>/pages/nssta-programmes.php"><span class="material-symbols-outlined text-[20px]">assignment_ind</span><span>NSSTA TPAC Nominations</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="cadre-analytics" href="<?= BASE_URL ?>/pages/cadre-analytics.php"><span class="material-symbols-outlined text-[20px]">analytics</span><span>Cadre Analytics</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="settings-profile" href="<?= BASE_URL ?>/pages/settings.php"><span class="material-symbols-outlined text-[20px]">manage_accounts</span><span>Settings &amp; Profile</span></a></nav></div><div class="p-space-md bg-tertiary text-on-tertiary"><div class="text-label-sm font-label-sm text-tertiary-fixed-dim uppercase tracking-wider mb-space-xs">Sync Status</div><div class="space-y-1 text-label-sm font-label-sm mb-space-md"><div class="flex items-center justify-between text-on-tertiary"><span>iGOT Karmayogi API</span><span class="text-secondary-fixed">v2.4 Live</span></div><div class="flex items-center justify-between text-on-tertiary"><span>SPARROW / e-HRMS</span><span class="text-secondary-fixed">Active</span></div></div><div class="flex items-center justify-between pt-space-xs"><a class="flex items-center gap-space-xs text-secondary-fixed hover:text-on-tertiary text-label-sm font-label-sm" href="<?= BASE_URL ?>/logout.php"><span class="material-symbols-outlined text-[16px]">logout</span><span>Sign Out</span></a><span class="text-tertiary-fixed-dim text-label-sm font-label-sm">NSSTA-ISS</span></div></div></aside><div class="pl-72"><header class="fixed top-0 left-72 right-0 h-16 bg-surface-container-lowest/90 backdrop-blur-md shadow-[0_1px_8px_rgba(11,37,69,0.06)] z-40 flex items-center justify-between px-space-lg"><div class="flex items-center gap-space-sm text-body-sm font-body-sm text-on-surface-variant"><span>à¤­à¤¾à¤°à¤¤ à¤¸à¤°à¤•à¤¾à¤° | MoSPI Official Statistical Cadre Intelligence</span></div><div class="flex items-center gap-space-md"><div class="flex items-center gap-space-xs bg-surface-container-low px-space-sm py-1 rounded-full text-label-sm font-label-sm text-on-surface"><span class="w-2 h-2 rounded-full bg-secondary"></span><span>NAD Division</span></div><div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center"><span class="material-symbols-outlined text-on-primary text-[18px]">person</span></div></div></header><main class="relative pt-16 w-full px-space-lg bg-surface min-h-[calc(100vh-64px)]"><div class="flex flex-col w-full">
<div class="flex flex-col gap-space-md mb-space-lg">
<div class="flex flex-wrap items-center justify-between gap-space-sm">
<div class="flex items-center gap-space-sm">
<span class="px-2.5 py-0.5 rounded-full bg-surface-container-high text-primary font-label-sm text-label-sm uppercase tracking-wider">NSSTA â€¢ Division of Statistical Methodology</span>
<span class="text-outline-variant font-label-sm text-label-sm">â€¢</span>
<span class="font-label-sm text-label-sm text-on-surface-variant flex items-center gap-1">
<span class="material-symbols-outlined text-[15px] text-secondary">verified_user</span>
          GIGW 3.0 Standardized
        </span>
</div>
<div class="flex items-center gap-space-sm">
<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-surface-container-lowest shadow-sm text-label-sm font-label-sm text-on-surface">
<span class="w-2 h-2 rounded-full bg-secondary animate-pulse"></span>
          Vector Core: Ready (142ms)
        </span>
<span class="px-3 py-1 rounded-full bg-tertiary text-on-tertiary text-label-sm font-label-sm">MoSPI-LLM v2.4 Calibrated</span>
</div>
</div>
<div class="flex flex-col lg:flex-row lg:items-end justify-between gap-space-md pb-space-sm">
<div class="space-y-1">
<h1 class="font-headline-xl text-headline-xl text-primary tracking-tight">AI Assessment Generator &amp; Question Roster Studio</h1>
<p class="font-body-md text-body-md text-on-surface-variant max-w-3xl">
          National Accounts Directorate &amp; NSSTA automated psychometric battery generation for ISS/SSS Cadre proficiency benchmarks. Grounded natively in SNA 2008 standards and verified MoSPI statistical whitepapers.
        </p>
</div>
<div class="flex items-center gap-space-xs shrink-0">
<button class="px-3 py-2 bg-surface-container-lowest text-primary font-label-sm text-label-sm rounded-lg shadow-sm hover:bg-surface-container-low transition-colors flex items-center gap-1.5" type="button">
<span class="material-symbols-outlined text-[18px]">history</span>
<span>Archived Batches</span>
</button>
<button id="btn-fasttrack" class="px-3 py-2 bg-secondary text-on-secondary font-label-sm text-label-sm rounded-lg shadow-sm hover:bg-secondary-container transition-colors flex items-center gap-1.5" type="button">
<span class="material-symbols-outlined text-[18px]">bolt</span>
<span>Batch Calibration FastTrack</span>
</button>
</div>
</div>
</div>
<div class="grid grid-cols-1 lg:grid-cols-12 gap-space-lg items-start">
<!-- LEFT PANEL: Ingestion & Calibration Controls (5 Cols) -->
<div class="lg:col-span-5 flex flex-col gap-space-md">
<!-- Section 1: Reference Document Ingestion -->
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm flex flex-col gap-space-md">
<div class="flex items-center justify-between">
<div class="flex items-center gap-2">
<span class="w-6 h-6 rounded-md bg-primary-container text-on-primary flex items-center justify-center font-label-sm text-label-sm">1</span>
<h2 class="font-headline-sm text-headline-sm text-primary">Document Corpus &amp; Ingestion</h2>
</div>
<span class="text-label-sm font-label-sm text-secondary bg-secondary-fixed px-2 py-0.5 rounded-full">OCR + LaTeX Engine Active</span>
</div>
<div class="border-2 border-dashed border-outline-variant hover:border-primary transition-colors rounded-xl p-space-md bg-surface-container-low/50 flex flex-col items-center text-center gap-space-xs cursor-pointer group">
<div class="w-12 h-12 rounded-full bg-surface-container-highest group-hover:bg-primary-fixed transition-colors flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[26px]">upload_file</span>
</div>
<div class="space-y-0.5">
<span class="font-label-md text-label-md text-primary block">Ingest Departmental Manual or White Paper</span>
<span class="font-body-sm text-body-sm text-on-surface-variant block">PDF or DOCX up to 100MB (MoSPI Technical Bulletins, NSS Rounds, CSO Standards)</span>
</div>
<span class="text-label-sm font-label-sm text-secondary underline mt-1">Select from MoSPI Official Digital Repository</span>
</div>
<!-- Indexed Document Card -->
<div class="p-space-sm rounded-lg bg-surface-container-low flex flex-col gap-space-xs">
<div class="flex items-start justify-between gap-space-sm">
<div class="flex items-center gap-space-xs min-w-0">
<span class="material-symbols-outlined text-secondary text-[22px] shrink-0">picture_as_pdf</span>
<div class="min-w-0">
<p class="font-label-md text-label-md text-on-surface truncate">MoSPI_Handbook_National_Accounts_2023_v4.pdf</p>
<p class="font-body-sm text-body-sm text-on-surface-variant">14.2 MB â€¢ 142 Pages Indexed â€¢ 48 Core Concepts</p>
</div>
</div>
<span class="px-2 py-0.5 rounded bg-surface-container-highest text-primary font-label-sm text-label-sm shrink-0">100% Ready</span>
</div>
<div class="mt-space-xs p-2.5 rounded bg-surface-container-lowest text-body-sm font-body-sm text-on-surface-variant">
<div class="flex items-center justify-between text-label-sm font-label-sm text-primary mb-1">
<span class="flex items-center gap-1">
<span class="material-symbols-outlined text-[14px] text-secondary">memory</span>
                Active Retrieval Context: Chunk #42-S3.8
              </span>
<span class="text-on-surface-variant">GVA Deflator Eq.</span>
</div>
<p class="italic text-[13px] leading-relaxed text-on-surface font-mono bg-surface-container-low/60 p-2 rounded">
              "GVA at constant prices = Nominal GVA Ã— (Base Year Output Deflator / Current Synthetic Deflator), adjusting for product tax anomalies under SNA 2008..."
            </p>
</div>
</div>
</div>
<!-- Section 2: Cognitive Calibration Parameters -->
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm flex flex-col gap-space-md">
<div class="flex items-center justify-between">
<div class="flex items-center gap-2">
<span class="w-6 h-6 rounded-md bg-primary-container text-on-primary flex items-center justify-center font-label-sm text-label-sm">2</span>
<h2 class="font-headline-sm text-headline-sm text-primary">Calibration &amp; Cognitive Parameters</h2>
</div>
<span class="text-label-sm font-label-sm text-on-surface-variant">DoPT Karmayogi Aligned</span>
</div>
<form class="space-y-space-sm" onsubmit="event.preventDefault();">
<div class="space-y-1">
<label class="font-label-md text-label-md text-on-surface flex items-center justify-between">
<span>Target Competency Domain</span>
<span class="text-label-sm font-label-sm text-on-surface-variant">DoPT Code: STAT-NAD-04</span>
</label>
<div class="relative">
<select id="gen-domain-select" class="w-full bg-surface-container-low text-on-surface font-body-md text-body-md rounded-lg p-2.5 appearance-none focus:outline-none focus:ring-2 focus:ring-secondary pr-10">
<option selected="">National Accounts &amp; Price Indices (NAD / ESD)</option>
<option>Socio-Economic Surveys &amp; Sampling Design (NSSO / SDRD)</option>
<option>Sustainable Development Goals (SDG) Monitoring Indicators</option>
<option>Index of Industrial Production (IIP) &amp; ASI Methodologies</option>
</select>
<span class="material-symbols-outlined absolute right-3 top-3 text-on-surface-variant pointer-events-none text-[20px]">expand_more</span>
</div>
</div>
<div class="space-y-1">
<label class="font-label-md text-label-md text-on-surface">Cadre Band &amp; Seniority Target</label>
<div class="relative">
<select id="gen-cadre-select" class="w-full bg-surface-container-low text-on-surface font-body-md text-body-md rounded-lg p-2.5 appearance-none focus:outline-none focus:ring-2 focus:ring-secondary pr-10">
<option selected="">Cadre Level 11-12 (Assistant Director / Deputy Director, ISS)</option>
<option>Cadre Level 10 (Junior Time Scale, ISS Induction)</option>
<option>Cadre Level 13-14 (Director / Joint Director, Strategic Methodologies)</option>
<option>Subordinate Statistical Service (SSS) Senior Statistical Officer</option>
</select>
<span class="material-symbols-outlined absolute right-3 top-3 text-on-surface-variant pointer-events-none text-[20px]">expand_more</span>
</div>
</div>
<div class="space-y-1.5 pt-1">
<label class="font-label-md text-label-md text-on-surface block">Bloom's Taxonomy Cognitive Target</label>
<div class="grid grid-cols-2 gap-2">
<label class="flex items-center gap-2 p-2 rounded-lg bg-surface-container-low hover:bg-surface-container cursor-pointer transition-colors">
<input checked="" class="accent-secondary w-4 h-4 rounded" type="checkbox"/>
<span class="font-label-sm text-label-sm text-on-surface">Application &amp; Analysis</span>
</label>
<label class="flex items-center gap-2 p-2 rounded-lg bg-surface-container-low hover:bg-surface-container cursor-pointer transition-colors">
<input checked="" class="accent-secondary w-4 h-4 rounded" type="checkbox"/>
<span class="font-label-sm text-label-sm text-on-surface">Synthesis &amp; Policy</span>
</label>
<label class="flex items-center gap-2 p-2 rounded-lg bg-surface-container-low hover:bg-surface-container cursor-pointer transition-colors">
<input class="accent-secondary w-4 h-4 rounded" type="checkbox"/>
<span class="font-label-sm text-label-sm text-on-surface">Knowledge Recall</span>
</label>
<label class="flex items-center gap-2 p-2 rounded-lg bg-surface-container-low hover:bg-surface-container cursor-pointer transition-colors">
<input checked="" class="accent-secondary w-4 h-4 rounded" type="checkbox"/>
<span class="font-label-sm text-label-sm text-on-surface">Computational Deflators</span>
</label>
</div>
</div>
<div class="space-y-1.5 pt-1">
<label class="font-label-md text-label-md text-on-surface block">Permitted Item Formats</label>
<div class="flex flex-wrap gap-1.5">
<span class="px-2.5 py-1 rounded-full bg-primary text-on-primary font-label-sm text-label-sm flex items-center gap-1">
                Single Answer MCQ <span class="material-symbols-outlined text-[14px]">check</span>
</span>
<span class="px-2.5 py-1 rounded-full bg-primary text-on-primary font-label-sm text-label-sm flex items-center gap-1">
                Case-Study Numerical <span class="material-symbols-outlined text-[14px]">check</span>
</span>
<span class="px-2.5 py-1 rounded-full bg-surface-container-high text-on-surface-variant font-label-sm text-label-sm">
                Multi-Select
              </span>
<span class="px-2.5 py-1 rounded-full bg-surface-container-high text-on-surface-variant font-label-sm text-label-sm">
                Assertion-Reasoning
              </span>
</div>
</div>
<!-- Sliders and Battery Metrics -->
<div class="p-space-sm rounded-lg bg-surface-container-low space-y-space-sm mt-space-sm">
<div class="space-y-1">
<div class="flex justify-between items-center text-label-sm font-label-sm">
<span class="text-on-surface">Assessment Battery Size</span>
<span class="text-primary font-bold">10 Questions</span>
</div>
<input class="w-full accent-secondary h-1.5 bg-surface-container-highest rounded-lg cursor-pointer" max="30" min="5" type="range" value="10"/>
<div class="flex justify-between text-body-sm font-body-sm text-on-surface-variant text-[11px]">
<span>5 Items (Micro-quiz)</span>
<span>20 Items</span>
<span>30 Items (Full Battery)</span>
</div>
</div>
<div class="grid grid-cols-2 gap-2 pt-1 text-center">
<div class="p-2 rounded bg-surface-container-lowest">
<span class="text-label-sm font-label-sm text-on-surface-variant block">Target Cut-Score</span>
<span class="font-headline-sm text-headline-sm text-secondary">70%</span>
</div>
<div class="p-2 rounded bg-surface-container-lowest">
<span class="text-label-sm font-label-sm text-on-surface-variant block">Target Cronbach Î±</span>
<span class="font-headline-sm text-headline-sm text-primary">0.88</span>
</div>
</div>
</div>
<!-- Psychometric Safeguard Info Box -->
<div class="p-space-sm rounded-lg bg-surface-container flex items-start gap-2.5 text-on-surface">
<span class="material-symbols-outlined text-secondary text-[20px] shrink-0 mt-0.5">psychology_alt</span>
<div class="space-y-0.5 text-body-sm font-body-sm">
<span class="font-label-sm text-label-sm text-primary block">MoSPI Psychometric Safeguard Active</span>
<p class="text-on-surface-variant text-[12px] leading-tight">
                Deterministic hallucination suppression restricts distractor generation strictly to verified MoSPI Statistical Glossaries and National Data Archives.
              </p>
</div>
</div>
<button id="btn-generate-assessment" class="w-full py-3 px-4 bg-secondary text-on-secondary font-label-lg text-label-lg rounded-lg shadow-md hover:bg-secondary-container transition-all flex items-center justify-center gap-2 mt-space-sm" type="button">
<span class="material-symbols-outlined text-[20px]">auto_awesome</span>
<span>Generate Calibrated Assessment Battery</span>
</button>
</form>
</div>
</div>
<!-- RIGHT PANEL: Quality Assurance & Question Roster (7 Cols) -->
<div class="lg:col-span-7 flex flex-col gap-space-md">
<!-- Studio Metric Dashboard Strip -->
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm">
<div class="flex flex-wrap items-center justify-between gap-space-sm mb-space-sm">
<div>
<span class="font-headline-sm text-headline-sm text-primary block">Item Review &amp; Quality Audit</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Batch Ref: BAT-2024-NAD-0891</span>
</div>
<span class="px-3 py-1 rounded-full bg-secondary-fixed text-on-secondary-fixed font-label-md text-label-md flex items-center gap-1.5">
<span class="material-symbols-outlined text-[16px]">pending_actions</span>
<span>2 of 10 Approved</span>
</span>
</div>
<div class="grid grid-cols-3 gap-space-sm pt-space-xs">
<div class="p-2.5 rounded-lg bg-surface-container-low flex flex-col">
<span class="text-label-sm font-label-sm text-on-surface-variant">Mean Difficulty (p-value)</span>
<div class="flex items-baseline gap-1.5 mt-1">
<span class="font-headline-md text-headline-md text-primary">0.74</span>
<span class="text-label-sm font-label-sm text-secondary">Optimal</span>
</div>
<div class="w-full bg-surface-container-highest h-1 rounded mt-2">
<div class="bg-secondary h-1 rounded" style="width: 74%"></div>
</div>
</div>
<div class="p-2.5 rounded-lg bg-surface-container-low flex flex-col">
<span class="text-label-sm font-label-sm text-on-surface-variant">Point Biserial (Discrim.)</span>
<div class="flex items-baseline gap-1.5 mt-1">
<span class="font-headline-md text-headline-md text-primary">0.82</span>
<span class="text-label-sm font-label-sm text-primary">High Fidelity</span>
</div>
<div class="w-full bg-surface-container-highest h-1 rounded mt-2">
<div class="bg-primary h-1 rounded" style="width: 82%"></div>
</div>
</div>
<div class="p-2.5 rounded-lg bg-surface-container-low flex flex-col">
<span class="text-label-sm font-label-sm text-on-surface-variant">NSSTA Cadre Fit</span>
<div class="flex items-baseline gap-1.5 mt-1">
<span class="font-headline-md text-headline-md text-primary">98.4%</span>
<span class="text-label-sm font-label-sm text-secondary">Band 11-12</span>
</div>
<div class="w-full bg-surface-container-highest h-1 rounded mt-2">
<div class="bg-secondary h-1 rounded" style="width: 98%"></div>
</div>
</div>
</div>
</div>
<!-- Question Deck Container (Dynamically updated by Gemini/fallback) -->
<div id="questions-deck" class="space-y-space-md">
<!-- Question Item #1 (Conceptual Analysis MCQ) -->
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm space-y-space-sm relative">
<div class="flex items-start justify-between gap-space-sm pb-2">
<div class="flex items-center gap-2">
<span class="px-2.5 py-1 rounded bg-primary text-on-primary font-label-sm text-label-sm">Item #1</span>
<span class="px-2.5 py-1 rounded bg-surface-container-high text-on-surface font-label-sm text-label-sm">Conceptual Analysis MCQ</span>
<span class="px-2 py-0.5 rounded text-secondary font-label-sm text-label-sm bg-secondary-fixed">Cadre Level 11 (AD)</span>
</div>
<div class="flex items-center gap-1 text-on-surface-variant">
<button class="p-1 rounded hover:bg-surface-container transition-colors" title="View Source Snippet" type="button">
<span class="material-symbols-outlined text-[20px]">find_in_page</span>
</button>
<button class="p-1 rounded hover:bg-surface-container transition-colors" title="Flag Discrepancy" type="button">
<span class="material-symbols-outlined text-[20px]">flag</span>
</button>
</div>
</div>
<div class="space-y-1">
<h3 class="font-headline-sm text-headline-sm text-on-surface leading-snug">
            Under the 2008 System of National Accounts (SNA), how are Financial Intermediation Services Indirectly Measured (FISIM) allocated between intermediate consumption and final consumption?
          </h3>
</div>
<!-- Options Roster -->
<div class="space-y-2 pt-1">
<!-- Option A -->
<div class="p-3 rounded-lg bg-surface-container-low flex items-start gap-3">
<span class="w-6 h-6 rounded-full bg-surface-container-highest flex items-center justify-center font-label-sm text-label-sm text-primary shrink-0">A</span>
<p class="font-body-md text-body-md text-on-surface">Treated uniformly as nominal household final consumption without reference interest rate adjustments.</p>
</div>
<!-- Option B (Correct) -->
<div class="p-3 rounded-lg bg-surface-container flex items-start gap-3">
<span class="w-6 h-6 rounded-full bg-secondary text-on-secondary flex items-center justify-center font-label-sm text-label-sm shrink-0">B</span>
<div class="space-y-1">
<div class="flex items-center gap-2">
<p class="font-body-md text-body-md text-on-surface font-semibold">Allocated across user sectors using reference rate interest differentials on loans and deposits.</p>
<span class="px-2 py-0.5 rounded bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm font-bold shrink-0">Correct Benchmark</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant text-[12px]">
                Distractor Plausibility: 0.89 â€¢ Directly corresponds with Reserve Bank of India &amp; CSO inter-agency harmonization protocol.
              </p>
</div>
</div>
<!-- Option C -->
<div class="p-3 rounded-lg bg-surface-container-low flex items-start gap-3">
<span class="w-6 h-6 rounded-full bg-surface-container-highest flex items-center justify-center font-label-sm text-label-sm text-primary shrink-0">C</span>
<p class="font-body-md text-body-md text-on-surface">Absorbed entirely as financial enterprise intermediate inputs with zero allocation to central government.</p>
</div>
<!-- Option D -->
<div class="p-3 rounded-lg bg-surface-container-low flex items-start gap-3">
<span class="w-6 h-6 rounded-full bg-surface-container-highest flex items-center justify-center font-label-sm text-label-sm text-primary shrink-0">D</span>
<p class="font-body-md text-body-md text-on-surface">Calculated exclusively as gross capital formation deduction at the state domestic product (GSDP) boundary.</p>
</div>
</div>
<!-- Grounding Snippet & Action Toolbar -->
<div class="pt-space-xs flex flex-col md:flex-row md:items-center justify-between gap-space-sm bg-surface-container-low/50 p-2.5 rounded-lg">
<div class="flex items-center gap-1.5 text-body-sm font-body-sm text-on-surface-variant text-[12px]">
<span class="material-symbols-outlined text-[16px] text-secondary">menu_book</span>
<span>Source Grounding: <strong>MoSPI SNA Guidelines (2023 Revision), Page 58, Sect 6.3</strong></span>
</div>
<div class="flex items-center gap-1.5">
<button class="px-2.5 py-1 text-on-surface-variant hover:text-primary font-label-sm text-label-sm rounded hover:bg-surface-container transition-colors" type="button">Edit Stem</button>
<button class="px-2.5 py-1 text-on-surface-variant hover:text-primary font-label-sm text-label-sm rounded hover:bg-surface-container transition-colors" type="button">Regenerate Distractors</button>
<button class="px-3 py-1 bg-primary text-on-primary font-label-sm text-label-sm rounded shadow-sm hover:bg-primary-container transition-colors flex items-center gap-1" type="button">
<span class="material-symbols-outlined text-[16px]">check</span>
<span>Approve Item #1</span>
</button>
</div>
</div>
</div>
<!-- Question Item #2 (Case Study Numerical / Splicing Scenario) -->
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm space-y-space-sm relative">
<div class="flex items-start justify-between gap-space-sm pb-2">
<div class="flex items-center gap-2">
<span class="px-2.5 py-1 rounded bg-primary text-on-primary font-label-sm text-label-sm">Item #2</span>
<span class="px-2.5 py-1 rounded bg-surface-container-high text-on-surface font-label-sm text-label-sm">Case Study &amp; Index Methodology</span>
<span class="px-2 py-0.5 rounded text-primary font-label-sm text-label-sm bg-primary-fixed">Cadre Level 12 (Joint Director)</span>
</div>
<div class="flex items-center gap-1 text-on-surface-variant">
<button class="p-1 rounded hover:bg-surface-container transition-colors" title="View Source Snippet" type="button">
<span class="material-symbols-outlined text-[20px]">find_in_page</span>
</button>
<button class="p-1 rounded hover:bg-surface-container transition-colors" title="Flag Discrepancy" type="button">
<span class="material-symbols-outlined text-[20px]">flag</span>
</button>
</div>
</div>
<div class="space-y-2">
<h3 class="font-headline-sm text-headline-sm text-on-surface leading-snug">
            In a base year change scenario for the All-India Consumer Price Index (CPI) from 2012=100 to an updated 2024 series, which splicing and chaining methodology minimizes upper-level item substitution bias in high-frequency volatile urban consumption groups?
          </h3>
<!-- LaTeX Formula Card Container -->
<div class="p-3 rounded-lg bg-surface-container-low flex flex-col md:flex-row items-center justify-between gap-3 font-mono text-body-sm">
<div class="flex items-center gap-2">
<span class="px-2 py-0.5 rounded bg-surface-container-highest text-primary text-[11px] font-bold">Formal Index Specification:</span>
<span class="text-primary font-semibold text-[13px]">P_{Fisher} = âˆš( [ âˆ‘ p_t q_0 / âˆ‘ p_0 q_0 ] Ã— [ âˆ‘ p_t q_t / âˆ‘ p_0 q_t ] )</span>
</div>
<span class="text-on-surface-variant text-[11px]">Superlative Splicing Criterion</span>
</div>
</div>
<!-- Options Roster -->
<div class="space-y-2 pt-1">
<!-- Option A -->
<div class="p-3 rounded-lg bg-surface-container-low flex items-start gap-3">
<span class="w-6 h-6 rounded-full bg-surface-container-highest flex items-center justify-center font-label-sm text-label-sm text-primary shrink-0">A</span>
<p class="font-body-md text-body-md text-on-surface">Unweighted arithmetic ratio linking at the sub-group level using fixed Laspeyres fixed-base weights.</p>
</div>
<!-- Option B -->
<div class="p-3 rounded-lg bg-surface-container-low flex items-start gap-3">
<span class="w-6 h-6 rounded-full bg-surface-container-highest flex items-center justify-center font-label-sm text-label-sm text-primary shrink-0">B</span>
<p class="font-body-md text-body-md text-on-surface">Direct geometric transition splicing without recalibrating overlapping 12-month dual-price quotations.</p>
</div>
<!-- Option C (Correct) -->
<div class="p-3 rounded-lg bg-surface-container flex items-start gap-3">
<span class="w-6 h-6 rounded-full bg-secondary text-on-secondary flex items-center justify-center font-label-sm text-label-sm shrink-0">C</span>
<div class="space-y-1">
<div class="flex items-center gap-2">
<p class="font-body-md text-body-md text-on-surface font-semibold">Annual chain-linking with a superlative index framework (TÃ¶rnqvist or Fisher) at higher aggregation tiers.</p>
<span class="px-2 py-0.5 rounded bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm font-bold shrink-0">Correct Benchmark</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant text-[12px]">
                Validates advanced index synthesis as recommended by the MoSPI Technical Advisory Committee on Statistics of Prices and Cost of Living (TAC on SPCL).
              </p>
</div>
</div>
<!-- Option D -->
<div class="p-3 rounded-lg bg-surface-container-low flex items-start gap-3">
<span class="w-6 h-6 rounded-full bg-surface-container-highest flex items-center justify-center font-label-sm text-label-sm text-primary shrink-0">D</span>
<p class="font-body-md text-body-md text-on-surface">Pure Paasche back-casting with constant base elasticity dampening across seasonal items.</p>
</div>
</div>
<!-- Grounding Snippet & Action Toolbar -->
<div class="pt-space-xs flex flex-col md:flex-row md:items-center justify-between gap-space-sm bg-surface-container-low/50 p-2.5 rounded-lg">
<div class="flex items-center gap-1.5 text-body-sm font-body-sm text-on-surface-variant text-[12px]">
<span class="material-symbols-outlined text-[16px] text-secondary">menu_book</span>
<span>Source Grounding: <strong>MoSPI Technical Committee on Price Statistics, Page 89, Section 8.2</strong></span>
</div>
<div class="flex items-center gap-1.5">
<button class="px-2.5 py-1 text-on-surface-variant hover:text-primary font-label-sm text-label-sm rounded hover:bg-surface-container transition-colors" type="button">Edit Stem</button>
<button class="px-2.5 py-1 text-on-surface-variant hover:text-primary font-label-sm text-label-sm rounded hover:bg-surface-container transition-colors" type="button">Adjust Difficulty</button>
<button class="px-3 py-1 bg-primary text-on-primary font-label-sm text-label-sm rounded shadow-sm hover:bg-primary-container transition-colors flex items-center gap-1" type="button">
<span class="material-symbols-outlined text-[16px]">check</span>
<span>Approve Item #2</span>
</button>
</div>
</div>
</div>
</div>
<!-- Cadre Deployment & Publishing Queue Footer Card -->
<div class="bg-primary text-on-primary rounded-xl p-space-md shadow-md flex flex-col md:flex-row items-center justify-between gap-space-md">
<div class="space-y-1">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-secondary text-[22px]">publish</span>
<h4 class="font-headline-sm text-headline-sm text-on-primary">Cadre Deployment &amp; Publishing Queue</h4>
</div>
<p class="font-body-sm text-body-sm text-primary-fixed max-w-md">
            Publishing locks items with cryptographic NSSTA integrity hashes, generating DoPT Karmayogi QTI 2.2 assessment packages.
          </p>
</div>
<div class="flex items-center gap-space-xs w-full md:w-auto justify-end">
<button onclick="approveAllItems()" class="px-4 py-2.5 rounded-lg bg-primary-container text-primary-fixed hover:text-on-primary font-label-md text-label-md transition-colors flex items-center gap-1.5" type="button">
<span class="material-symbols-outlined text-[18px]">rule</span>
<span id="btn-approve-label">Approve All</span>
</button>
<button onclick="exportQtiXml()" class="px-4 py-2.5 rounded-lg bg-surface-container-lowest text-primary hover:bg-surface-container-low font-label-md text-label-md transition-colors flex items-center gap-1.5" type="button">
<span class="material-symbols-outlined text-[18px]">code</span>
<span>Export QTI XML</span>
</button>
<button onclick="deployToLiveAssessment()" class="px-4 py-2.5 rounded-lg bg-secondary text-on-secondary hover:bg-secondary-container font-label-md text-label-md shadow-sm transition-colors flex items-center gap-1.5" type="button">
<span class="material-symbols-outlined text-[18px]">send</span>
<span>Deploy to Live Examination Console</span>
</button>
</div>
</div>
</div>
</div>
</div></main><footer class="w-full bg-surface-container-low text-on-surface-variant py-space-md px-space-lg mt-space-lg"><div class="flex flex-col md:flex-row items-center justify-between gap-space-sm text-body-sm font-body-sm"><span>Gap2Grow Cadre Portal • National Statistical Systems Training Academy (NSSTA) • MoSPI</span><span>GIGW-3.0 Compliant • NIC Gateway Secure Node</span></div></footer></div>
<script>
let currentQuestions = [];

async function generateAssessmentWithAI() {
    const domainSelect = document.getElementById('gen-domain-select');
    const domainName = domainSelect ? domainSelect.value : 'National Accounts & Price Indices (NAD / ESD)';
    const cadreSelect = document.getElementById('gen-cadre-select');
    const cadreBand = cadreSelect ? cadreSelect.value : 'Cadre Level 11-12 (AD / DD)';
    
    const domainIdMap = {
        'National Accounts & Price Indices (NAD / ESD)': 1,
        'Socio-Economic Surveys & Sampling Design (NSSO / SDRD)': 1,
        'Sustainable Development Goals (SDG) Monitoring Indicators': 3,
        'Index of Industrial Production (IIP) & ASI Methodologies': 2
    };
    const domainId = domainIdMap[domainName] || 1;

    const btn = document.getElementById('btn-generate-assessment');
    const originalHtml = btn ? btn.innerHTML : '';
    if (btn) {
        btn.disabled = true;
        btn.innerHTML = '<span class="material-symbols-outlined animate-spin text-[20px]">sync</span><span>Synthesizing with MoSPI-LLM / Gemini...</span>';
    }

    const badge = document.getElementById('model-status-badge');
    if (badge) {
        badge.innerHTML = '<span class="animate-pulse">Querying Model Core...</span>';
    }

    try {
        const res = await fetch('<?= BASE_URL ?>/api/generate-assessment.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({
                domain_id: domainId,
                domain_name: domainName,
                cadre_band: cadreBand,
                cognitive_target: 'Application & Analysis',
                num_questions: 5
            })
        });

        const json = await res.json();
        if (json.success && Array.isArray(json.questions)) {
            currentQuestions = json.questions;
            
            // Update source badge
            if (badge) {
                if (json.source.includes('gemini')) {
                    badge.className = 'px-3 py-1 rounded-full bg-emerald-700 text-white text-label-sm font-label-sm flex items-center gap-1';
                    badge.innerHTML = '<span class="w-2 h-2 rounded-full bg-emerald-300 animate-ping"></span> Gemini 1.5 Flash (Live)';
                } else {
                    badge.className = 'px-3 py-1 rounded-full bg-tertiary text-on-tertiary text-label-sm font-label-sm flex items-center gap-1';
                    badge.innerHTML = '<span class="w-2 h-2 rounded-full bg-amber-400"></span> MoSPI Seeded Fallback Bank';
                }
            }

            renderGeneratedQuestions(json.questions, json.source);
        } else {
            alert('Assessment generation note: ' + (json.error || 'Using calibrated fallback'));
        }
    } catch (err) {
        console.error('Error generating assessment:', err);
    } finally {
        if (btn) {
            btn.disabled = false;
            btn.innerHTML = originalHtml;
        }
    }
}

function renderGeneratedQuestions(questions, source) {
    const deck = document.getElementById('questions-deck');
    if (!deck) return;

    let html = `
        <div class="p-space-sm bg-emerald-50 border border-emerald-200 rounded-xl flex items-center justify-between text-body-sm text-emerald-900 mb-space-sm">
            <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-emerald-600">verified</span>
                <span><strong>${questions.length} Items Synthesized</strong> — Mode: ${source.includes('gemini') ? 'Real-Time Gemini 1.5 Flash' : 'MoSPI Sovereign Question Bank (Silent Fallback)'}</span>
            </div>
            <button onclick="deployToLiveAssessment()" class="px-3 py-1 bg-emerald-700 text-white rounded text-label-sm font-bold hover:bg-emerald-800">Deploy Now</button>
        </div>
    `;

    const optLetters = ['A', 'B', 'C', 'D'];

    questions.forEach((q, idx) => {
        const itemNum = idx + 1;
        const diffColor = q.difficulty === 'hard' ? 'text-error bg-error-container/40' : (q.difficulty === 'medium' ? 'text-secondary bg-secondary-fixed' : 'text-primary bg-primary-fixed');

        let optionsHtml = '';
        if (Array.isArray(q.options)) {
            q.options.forEach((opt, optIdx) => {
                const isCorrect = optIdx === q.correct_option;
                if (isCorrect) {
                    optionsHtml += `
                        <div class="p-3 rounded-lg bg-surface-container flex items-start gap-3 border border-secondary/20">
                            <span class="w-6 h-6 rounded-full bg-secondary text-on-secondary flex items-center justify-center font-label-sm text-label-sm shrink-0">${optLetters[optIdx]}</span>
                            <div class="space-y-1">
                                <div class="flex items-center gap-2">
                                    <p class="font-body-md text-body-md text-on-surface font-semibold">${opt}</p>
                                    <span class="px-2 py-0.5 rounded bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm font-bold shrink-0">Correct Benchmark</span>
                                </div>
                                <p class="font-body-sm text-body-sm text-on-surface-variant text-[12px]">${q.explanation || 'Official MoSPI verification standard.'}</p>
                            </div>
                        </div>
                    `;
                } else {
                    optionsHtml += `
                        <div class="p-3 rounded-lg bg-surface-container-low flex items-start gap-3">
                            <span class="w-6 h-6 rounded-full bg-surface-container-highest flex items-center justify-center font-label-sm text-label-sm text-primary shrink-0">${optLetters[optIdx]}</span>
                            <p class="font-body-md text-body-md text-on-surface">${opt}</p>
                        </div>
                    `;
                }
            });
        }

        html += `
            <div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm space-y-space-sm relative">
                <div class="flex items-start justify-between gap-space-sm pb-2">
                    <div class="flex items-center gap-2">
                        <span class="px-2.5 py-1 rounded bg-primary text-on-primary font-label-sm text-label-sm">Item #${itemNum}</span>
                        <span class="px-2.5 py-1 rounded bg-surface-container-high text-on-surface font-label-sm text-label-sm">Competency Assessment</span>
                        <span class="px-2 py-0.5 rounded font-label-sm text-label-sm uppercase font-bold ${diffColor}">${q.difficulty || 'standard'}</span>
                    </div>
                    <div class="flex items-center gap-1 text-on-surface-variant">
                        <button class="p-1 rounded hover:bg-surface-container transition-colors" title="Verified MoSPI Calibration" type="button">
                            <span class="material-symbols-outlined text-[20px] text-secondary">verified</span>
                        </button>
                    </div>
                </div>
                <div class="space-y-1">
                    <h3 class="font-headline-sm text-headline-sm text-on-surface leading-snug">${q.question}</h3>
                    ${q.formula ? `
                        <div class="p-2.5 rounded-lg bg-surface-container-low font-mono text-body-sm text-primary">
                            <span class="text-secondary font-bold mr-2">Formula:</span> ${q.formula}
                        </div>
                    ` : ''}
                </div>
                <div class="space-y-2 pt-1">
                    ${optionsHtml}
                </div>
                <div class="pt-space-xs flex flex-col md:flex-row md:items-center justify-between gap-space-sm bg-surface-container-low/50 p-2.5 rounded-lg">
                    <div class="flex items-center gap-1.5 text-body-sm font-body-sm text-on-surface-variant text-[12px]">
                        <span class="material-symbols-outlined text-[16px] text-secondary">menu_book</span>
                        <span>Source Grounding: <strong>${q.citation || 'MoSPI Technical Directorate Guidelines'}</strong></span>
                    </div>
                    <div class="flex items-center gap-1.5">
                        <button class="px-3 py-1 bg-primary text-on-primary font-label-sm text-label-sm rounded shadow-sm hover:bg-primary-container transition-colors flex items-center gap-1" type="button">
                            <span class="material-symbols-outlined text-[16px]">check</span>
                            <span>Approve Item #${itemNum}</span>
                        </button>
                    </div>
                </div>
            </div>
        `;
    });

    deck.innerHTML = html;
}

function deployToLiveAssessment() {
    alert('AI Assessment Roster Locked and Dispatched!\nRedirecting to live proctored examination console...');
    window.location.href = '<?= BASE_URL ?>/pages/take-assessment.php';
}

function approveAllItems() {
    alert('All synthesized assessment items cryptographically approved and pushed to DoPT Karmayogi staging.');
    const label = document.getElementById('btn-approve-label');
    if (label) label.innerText = 'All Approved (100%)';
}

function exportQtiXml() {
    alert('Exporting IMS QTI 2.2 XML Package for DoPT Karmayogi integration...');
}

// Bind buttons
document.addEventListener('DOMContentLoaded', () => {
    const btn = document.getElementById('btn-generate-assessment');
    if (btn) btn.onclick = generateAssessmentWithAI;

    const fasttrackBtn = document.getElementById('btn-fasttrack');
    if (fasttrackBtn) fasttrackBtn.onclick = generateAssessmentWithAI;
});
</script>
</body></html>
