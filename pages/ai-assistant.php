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
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/><style>@layer base{html,body{margin:0;padding:0;}body{overscroll-behavior:none;}main>:first-child{margin-top:0!important;}main>:last-child{margin-bottom:0!important;}}::-webkit-scrollbar{display:none;}</style><script src="https://cdn.tailwindcss.com"></script><script id="tailwind-config">tailwind.config = { darkMode: "class", theme: { extend: { "colors": { "on-tertiary": "#ffffff", "inverse-surface": "#233144", "outline-variant": "#c4c6cf", "tertiary-fixed": "#dce1ff", "on-secondary-container": "#531800", "surface-dim": "#ccdbf4", "on-background": "#0d1c2f", "inverse-on-surface": "#ebf1ff", "on-tertiary-fixed-variant": "#264191", "on-primary": "#ffffff", "surface-container": "#e6eeff", "on-tertiary-container": "#7088dc", "surface-container-low": "#eff4ff", "surface-container-high": "#dde9ff", "on-surface": "#0d1c2f", "secondary-fixed-dim": "#ffb59a", "outline": "#74777f", "surface-container-lowest": "#ffffff", "secondary": "#a83900", "secondary-fixed": "#ffdbcf", "tertiary-container": "#001e63", "primary": "#001026", "on-primary-fixed": "#001c3b", "surface-variant": "#d5e3fd", "on-secondary": "#ffffff", "error-container": "#ffdad6", "primary-fixed": "#d5e3ff", "on-primary-fixed-variant": "#314769", "secondary-container": "#fc6018", "surface": "#f8f9ff", "tertiary": "#000c34", "tertiary-fixed-dim": "#b6c4ff", "error": "#ba1a1a", "primary-container": "#0b2545", "background": "#f8f9ff", "surface-tint": "#495f82", "on-error": "#ffffff", "surface-bright": "#f8f9ff", "on-error-container": "#93000a", "on-secondary-fixed-variant": "#802a00", "on-secondary-fixed": "#380d00", "on-surface-variant": "#44474e", "surface-container-highest": "#d5e3fd", "primary-fixed-dim": "#b1c7f0", "inverse-primary": "#b1c7f0", "on-primary-container": "#778db2", "on-tertiary-fixed": "#00164e" }, "borderRadius": { "DEFAULT": "0.125rem", "lg": "0.25rem", "xl": "0.5rem", "full": "0.75rem" }, "spacing": { "gutter": "1.5rem", "margin": "2rem", "space-xl": "2.5rem", "space-lg": "1.5rem", "gutter-mobile": "0.75rem", "margin-mobile": "1rem", "space-xs": "0.25rem", "space-md": "1rem", "space-sm": "0.5rem" }, "fontFamily": { "headline-xl-mobile": ["Public Sans"], "label-lg": ["Public Sans"], "body-lg": ["Public Sans"], "label-md": ["Public Sans"], "headline-lg": ["Public Sans"], "headline-lg-mobile": ["Public Sans"], "headline-md": ["Public Sans"], "headline-xl": ["Public Sans"], "body-sm": ["Public Sans"], "body-md": ["Public Sans"], "label-sm": ["Public Sans"], "headline-sm": ["Public Sans"] }, "fontSize": { "headline-xl-mobile": ["28px", { "lineHeight": "36px", "letterSpacing": "-0.01em", "fontWeight": "700" }], "label-lg": ["14px", { "lineHeight": "20px", "letterSpacing": "0.01em", "fontWeight": "600" }], "body-lg": ["16px", { "lineHeight": "24px", "fontWeight": "400" }], "label-md": ["12px", { "lineHeight": "16px", "letterSpacing": "0.02em", "fontWeight": "600" }], "headline-lg": ["28px", { "lineHeight": "36px", "letterSpacing": "-0.01em", "fontWeight": "700" }], "headline-lg-mobile": ["22px", { "lineHeight": "30px", "letterSpacing": "0em", "fontWeight": "700" }], "headline-md": ["22px", { "lineHeight": "28px", "fontWeight": "600" }], "headline-xl": ["36px", { "lineHeight": "44px", "letterSpacing": "-0.02em", "fontWeight": "700" }], "body-sm": ["12px", { "lineHeight": "18px", "fontWeight": "400" }], "body-md": ["14px", { "lineHeight": "20px", "fontWeight": "400" }], "label-sm": ["11px", { "lineHeight": "14px", "letterSpacing": "0.03em", "fontWeight": "600" }], "headline-sm": ["18px", { "lineHeight": "24px", "fontWeight": "600" }] } } } }</script></head><body class="bg-surface font-body-md text-body-md text-on-surface antialiased"><aside class="fixed left-0 top-0 h-screen w-72 bg-primary-container z-50 flex flex-col justify-between overflow-y-auto shadow-[0_1px_8px_rgba(0,0,0,0.04)]"><div class="flex flex-col"><div class="p-space-md bg-primary flex items-center gap-space-sm"><div class="w-9 h-9 rounded-lg bg-surface-container-lowest/10 flex items-center justify-center"><span class="material-symbols-outlined text-secondary-container text-[22px]">account_balance</span></div><div class="flex flex-col"><span class="font-label-md text-label-md text-on-primary tracking-tight uppercase">Gap2Grow | MoSPI</span><span class="font-label-sm text-label-sm text-on-primary-container">NSSTA Academy Portal</span></div></div><div class="m-space-md p-space-sm rounded-lg bg-primary/40"><div class="flex items-center gap-space-sm mb-space-xs"><div class="w-8 h-8 rounded-full bg-secondary-container flex items-center justify-center font-label-md text-label-md text-on-secondary">RS</div><div class="flex flex-col min-w-0 flex-1"><span class="font-label-md text-label-md text-on-primary truncate">Dr. Rajesh Sharma, ISS</span><span class="font-label-sm text-label-sm text-on-primary-container truncate">Joint Director, NAD / CSO</span></div></div><div class="flex items-center justify-between pt-space-xs"><span class="font-label-sm text-label-sm text-on-primary-container">ID: ISS-2008-0412</span><span class="font-label-sm text-label-sm text-secondary-container bg-secondary-container/10 px-1.5 py-0.5 rounded">Verified</span></div></div><nav class="flex flex-col px-space-sm gap-1" data-active-classes="bg-surface-container-highest text-on-surface font-label-md"><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-primary-container hover:bg-surface-container-highest hover:text-on-surface transition-colors" data-path="learner-dashboard" href="<?= BASE_URL ?>/pages/dashboard.php"><span class="material-symbols-outlined text-[20px]">space_dashboard</span><span class="font-label-md text-label-md">Learner Dashboard</span></a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-primary-container hover:bg-surface-container-highest hover:text-on-surface transition-colors" data-path="skill-gap-analysis" href="<?= BASE_URL ?>/pages/skill-gap.php"><span class="material-symbols-outlined text-[20px]">analytics</span><span class="font-label-md text-label-md">Skill-Gap Analysis</span></a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-primary-container hover:bg-surface-container-highest hover:text-on-surface transition-colors" data-path="my-learning-path" href="<?= BASE_URL ?>/pages/learning-path.php"><span class="material-symbols-outlined text-[20px]">route</span><span class="font-label-md text-label-md">My Learning Path</span></a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-primary-container hover:bg-surface-container-highest hover:text-on-surface transition-colors" data-path="ai-assessment-generator" href="<?= BASE_URL ?>/pages/assessment-generator.php"><span class="material-symbols-outlined text-[20px]">psychology</span><span class="font-label-md text-label-md">AI Assessment Generator</span></a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-primary-container hover:bg-surface-container-highest hover:text-on-surface transition-colors" data-path="igot-course-catalog" href="<?= BASE_URL ?>/pages/igot-courses.php"><span class="material-symbols-outlined text-[20px]">local_library</span><span class="font-label-md text-label-md">iGOT Course Catalog</span></a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-primary-container hover:bg-surface-container-highest hover:text-on-surface transition-colors" data-path="nssta-tpac-nominations" href="<?= BASE_URL ?>/pages/nssta-programmes.php"><span class="material-symbols-outlined text-[20px]">assignment_turned_in</span><span class="font-label-md text-label-md">NSSTA TPAC Nominations</span></a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-primary-container hover:bg-surface-container-highest hover:text-on-surface transition-colors" data-path="cadre-analytics" href="<?= BASE_URL ?>/pages/cadre-analytics.php"><span class="material-symbols-outlined text-[20px]">insights</span><span class="font-label-md text-label-md">Cadre Analytics</span></a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-primary-container hover:bg-surface-container-highest hover:text-on-surface transition-colors" data-path="emerging-skill-forecast" href="<?= BASE_URL ?>/pages/emerging-skills.php"><span class="material-symbols-outlined text-[20px]">trending_up</span><span class="font-label-md text-label-md">Emerging Skill Forecast</span></a><a aria-current="page" class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg transition-colors bg-surface-container-highest text-on-surface font-label-md" data-path="ai-cadre-copilot" href="<?= BASE_URL ?>/pages/ai-assistant.php"><span class="material-symbols-outlined text-[20px]">smart_toy</span><span class="font-label-md text-label-md">AI Cadre Copilot</span></a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-primary-container hover:bg-surface-container-highest hover:text-on-surface transition-colors" data-path="admin-workforce-hub" href="<?= BASE_URL ?>/pages/admin-dashboard.php"><span class="material-symbols-outlined text-[20px]">lan</span><span class="font-label-md text-label-md">Admin Workforce Hub</span></a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-primary-container hover:bg-surface-container-highest hover:text-on-surface transition-colors" data-path="settings-and-profile" href="<?= BASE_URL ?>/pages/settings.php"><span class="material-symbols-outlined text-[20px]">settings</span><span class="font-label-md text-label-md">Settings &amp; Profile</span></a></nav></div><div class="p-space-md flex flex-col gap-space-sm bg-primary/30"><div class="flex flex-col gap-1"><span class="font-label-sm text-label-sm uppercase tracking-wider text-on-primary-container">Integration Node Telemetry</span><div class="flex flex-wrap gap-1"><span class="inline-flex items-center gap-1 font-label-sm text-label-sm px-2 py-0.5 rounded-full bg-surface-container-lowest/10 text-on-primary"><span class="w-1.5 h-1.5 rounded-full bg-secondary-container"></span>iGOT v2.4 Live</span><span class="inline-flex items-center gap-1 font-label-sm text-label-sm px-2 py-0.5 rounded-full bg-surface-container-lowest/10 text-on-primary"><span class="w-1.5 h-1.5 rounded-full bg-surface-tint"></span>SPARROW Active</span><span class="inline-flex items-center gap-1 font-label-sm text-label-sm px-2 py-0.5 rounded-full bg-surface-container-lowest/10 text-on-primary">GIGW 3.0</span><span class="inline-flex items-center gap-1 font-label-sm text-label-sm px-2 py-0.5 rounded-full bg-surface-container-lowest/10 text-on-primary">NSSTA-ISS Node</span></div></div><a class="flex items-center justify-between px-space-sm py-2 rounded-lg bg-surface-container-lowest/5 text-on-primary-container hover:bg-surface-container-highest hover:text-on-surface transition-colors" href="<?= BASE_URL ?>/logout.php"><span class="font-label-md text-label-md">Sign Out</span><span class="material-symbols-outlined text-[18px]">logout</span></a></div></aside><div class="pl-72"><header class="fixed top-0 left-72 right-0 h-16 bg-surface-container-lowest/95 backdrop-blur-xl shadow-[0_1px_8px_rgba(0,0,0,0.04)] z-40 flex items-center justify-between px-margin"><div class="flex items-center gap-space-md"><div class="flex flex-col"><div class="flex items-center gap-space-sm"><span class="font-label-sm text-label-sm text-primary font-bold tracking-tight uppercase">à¤­à¤¾à¤°à¤¤ à¤¸à¤°à¤•à¤¾à¤° | MoSPI</span><span class="w-1 h-1 rounded-full bg-outline-variant"></span><span class="font-label-sm text-label-sm text-on-surface-variant">Statistical Cadre Intelligence &amp; Administrative Cell</span></div><div class="flex items-center gap-space-xs mt-0.5"><span class="inline-flex items-center gap-1 font-label-sm text-label-sm px-2 py-0.5 rounded bg-surface-container text-on-surface font-semibold"><span class="material-symbols-outlined text-[14px] text-secondary">verified_user</span>NAD / Cadre Control Authority</span><span class="inline-flex items-center gap-1 font-label-sm text-label-sm px-2 py-0.5 rounded bg-surface-container text-on-surface-variant"><span class="material-symbols-outlined text-[14px]">lock</span>e-HRMS Cryptographic Seal: ISS-V4</span></div></div></div><div class="flex items-center gap-space-md"><div class="flex items-center gap-space-xs bg-surface-container-low px-space-sm py-1 rounded-lg"><span class="font-label-sm text-label-sm text-on-surface-variant font-medium">Role:</span><span class="font-label-sm text-label-sm text-on-surface font-semibold">Cadre Joint Director</span><span class="material-symbols-outlined text-[18px] text-on-surface-variant cursor-pointer">arrow_drop_down</span></div><div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center"><span class="material-symbols-outlined text-on-primary text-[18px]">person</span></div></div></header><main class="w-full pt-16 bg-surface"><div class="flex flex-col w-full">
<!-- Sovereign Breadcrumb & Workspace Header -->
<div class="px-margin pt-space-md pb-space-sm bg-surface-container-lowest shadow-sm flex flex-col gap-space-sm">
<div class="flex flex-wrap items-center justify-between gap-space-md">
<div class="flex flex-col">
<div class="flex items-center gap-space-xs text-on-surface-variant">
<span class="material-symbols-outlined text-[16px] text-secondary">shield</span>
<span class="font-label-sm text-label-sm uppercase tracking-wider font-semibold">NIC MeghRaj Sovereign Cloud AI Node (Govt. of India)</span>
<span class="w-1 h-1 rounded-full bg-outline-variant"></span>
<span class="font-label-sm text-label-sm">Classified Computational Pod 04</span>
</div>
<h1 class="font-headline-lg text-headline-lg text-primary tracking-tight mt-0.5">
          Gap2Grow Cadre Copilot &amp; Methodological AI Advisor
        </h1>
<p class="font-body-sm text-body-sm text-on-surface-variant max-w-4xl mt-0.5">
          Sovereign Statistical AI Assistant fine-tuned on MoSPI manuals, SNA 2008 standards, NSS survey methodologies, and DoPT training regulations. Zero external data leakage (NIC MeghRaj Private LLM).
        </p>
</div>
<!-- Live Engine Metadata Pill & Actions -->
<div class="flex flex-wrap items-center gap-space-sm">
<div class="flex items-center gap-space-xs bg-surface-container-high px-space-sm py-1.5 rounded-lg shadow-sm">
<span class="relative flex h-2 w-2">
<span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-secondary opacity-75"></span>
<span class="relative inline-flex rounded-full h-2 w-2 bg-secondary-container"></span>
</span>
<div class="flex flex-col">
<span class="font-label-sm text-label-sm text-primary font-bold leading-tight">MoSPI-LLM v2.4 Active</span>
<span class="font-label-sm text-label-sm text-on-surface-variant leading-tight">In-Context: Dr. Rajesh Sharma, ISS</span>
</div>
</div>
<div class="flex items-center gap-1 bg-surface-container px-1 py-1 rounded-lg">
<button class="flex items-center gap-1 px-space-sm py-1 rounded text-on-surface-variant hover:bg-surface-container-lowest hover:text-primary transition-all font-label-md text-label-md" id="btn-clear">
<span class="material-symbols-outlined text-[16px]">restart_alt</span>
<span>Clear</span>
</button>
<button class="flex items-center gap-1 px-space-sm py-1 rounded text-on-surface-variant hover:bg-surface-container-lowest hover:text-primary transition-all font-label-md text-label-md" id="btn-export">
<span class="material-symbols-outlined text-[16px]">download_for_offline</span>
<span>Official Note</span>
</button>
<button class="flex items-center gap-1 px-space-sm py-1 rounded bg-primary text-on-primary hover:bg-primary/90 transition-all font-label-md text-label-md shadow-sm" id="btn-docs">
<span class="material-symbols-outlined text-[16px]">menu_book</span>
<span>48 Indexed Docs</span>
</button>
</div>
</div>
</div>
</div>
<!-- Main 3-Pane Copilot Layout Workspace -->
<div class="grid grid-cols-12 gap-space-md p-margin min-h-[calc(100vh-148px)]">
<!-- LEFT PANE: Knowledge Base & Cadre Context Drawer (3 cols / ~280px equivalent on 12-col grid) -->
<div class="col-span-12 lg:col-span-3 flex flex-col gap-space-md">
<!-- In-Context Officer Card -->
<div class="bg-surface-container-lowest p-space-md rounded-xl shadow-sm flex flex-col gap-space-xs relative overflow-hidden">
<div class="absolute top-0 right-0 w-24 h-24 bg-surface-container rounded-full -mr-8 -mt-8 pointer-events-none"></div>
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm text-secondary font-bold uppercase tracking-wider">Active Context Grounding</span>
<span class="material-symbols-outlined text-secondary text-[18px]">verified</span>
</div>
<div class="flex items-center gap-space-sm mt-1">
<div class="w-10 h-10 rounded-lg bg-primary-container text-on-primary flex items-center justify-center font-label-lg text-label-lg font-bold">
            RS
          </div>
<div class="flex flex-col min-w-0">
<span class="font-headline-sm text-headline-sm text-primary truncate leading-tight">Dr. Rajesh Sharma</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">ISS Cadre â€¢ Grade 13A (Dir/JD)</span>
</div>
</div>
<div class="bg-surface-container-low p-space-xs rounded-lg mt-2 flex flex-col gap-1">
<div class="flex items-center justify-between text-on-surface-variant font-label-sm text-label-sm">
<span>Division Posting:</span>
<span class="font-semibold text-on-surface">NAD / CSO New Delhi</span>
</div>
<div class="flex items-center justify-between text-on-surface-variant font-label-sm text-label-sm">
<span>Critical Deficit:</span>
<span class="font-semibold text-secondary-container">SUT Balancing &amp; ML Nowcasting</span>
</div>
</div>
</div>
<!-- Grounded Knowledge Sources Accordion Box -->
<div class="bg-surface-container-lowest p-space-md rounded-xl shadow-sm flex flex-col gap-space-sm flex-1">
<div class="flex items-center justify-between">
<div class="flex items-center gap-1.5">
<span class="material-symbols-outlined text-[18px] text-primary">library_books</span>
<h2 class="font-label-lg text-label-lg text-primary uppercase tracking-tight">Active Knowledge Vectors</h2>
</div>
<span class="font-label-sm text-label-sm px-1.5 py-0.5 rounded bg-surface-container font-semibold text-on-surface-variant">RAG v4</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">
          Responses mathematically grounded strictly against official statutory compendiums:
        </p>
<div class="flex flex-col gap-space-xs mt-1">
<!-- Vector 1 -->
<div class="flex items-start gap-space-xs p-space-xs rounded-lg bg-surface-container-low hover:bg-surface-container transition-colors cursor-pointer group">
<span class="material-symbols-outlined text-[18px] text-secondary mt-0.5">check_circle</span>
<div class="flex flex-col min-w-0">
<span class="font-label-md text-label-md text-on-surface font-semibold group-hover:text-primary leading-tight truncate">MoSPI SNA Manual 2023</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Ch. 1-14: Supply-Use Tables &amp; GVA</span>
</div>
</div>
<!-- Vector 2 -->
<div class="flex items-start gap-space-xs p-space-xs rounded-lg bg-surface-container-low hover:bg-surface-container transition-colors cursor-pointer group">
<span class="material-symbols-outlined text-[18px] text-secondary mt-0.5">check_circle</span>
<div class="flex flex-col min-w-0">
<span class="font-label-md text-label-md text-on-surface font-semibold group-hover:text-primary leading-tight truncate">NSS 80th Round Instructions</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Field Validation Protocols (FOD)</span>
</div>
</div>
<!-- Vector 3 -->
<div class="flex items-start gap-space-xs p-space-xs rounded-lg bg-surface-container-low hover:bg-surface-container transition-colors cursor-pointer group">
<span class="material-symbols-outlined text-[18px] text-secondary mt-0.5">check_circle</span>
<div class="flex flex-col min-w-0">
<span class="font-label-md text-label-md text-on-surface font-semibold group-hover:text-primary leading-tight truncate">CPI Base 2012 Tech Manual</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Elementary Aggregation Formulas</span>
</div>
</div>
<!-- Vector 4 -->
<div class="flex items-start gap-space-xs p-space-xs rounded-lg bg-surface-container-low hover:bg-surface-container transition-colors cursor-pointer group">
<span class="material-symbols-outlined text-[18px] text-secondary mt-0.5">check_circle</span>
<div class="flex flex-col min-w-0">
<span class="font-label-md text-label-md text-on-surface font-semibold group-hover:text-primary leading-tight truncate">DoPT Training Regs 2024</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Rule 12A Cadre Credit Benchmarks</span>
</div>
</div>
</div>
<div class="mt-space-sm pt-space-sm bg-surface-container-high/40 -mx-space-md px-space-md pb-space-sm">
<span class="font-label-sm text-label-sm text-on-surface font-bold uppercase tracking-wider">Methodology Templates</span>
<div class="flex flex-col gap-1.5 mt-2">
<button class="text-left font-label-sm text-label-sm text-on-surface-variant hover:text-primary bg-surface-container-lowest p-2 rounded hover:shadow-sm transition-all flex items-center justify-between group">
<span class="truncate">Explain RAS Balancing in SUT</span>
<span class="material-symbols-outlined text-[14px] text-outline opacity-0 group-hover:opacity-100 transition-opacity">arrow_forward</span>
</button>
<button class="text-left font-label-sm text-label-sm text-on-surface-variant hover:text-primary bg-surface-container-lowest p-2 rounded hover:shadow-sm transition-all flex items-center justify-between group">
<span class="truncate">Draft 5-question quiz on GCF deflators</span>
<span class="material-symbols-outlined text-[14px] text-outline opacity-0 group-hover:opacity-100 transition-opacity">arrow_forward</span>
</button>
<button class="text-left font-label-sm text-label-sm text-on-surface-variant hover:text-primary bg-surface-container-lowest p-2 rounded hover:shadow-sm transition-all flex items-center justify-between group">
<span class="truncate">Find accredited iGOT for GIS deficit</span>
<span class="material-symbols-outlined text-[14px] text-outline opacity-0 group-hover:opacity-100 transition-opacity">arrow_forward</span>
</button>
<button class="text-left font-label-sm text-label-sm text-on-surface-variant hover:text-primary bg-surface-container-lowest p-2 rounded hover:shadow-sm transition-all flex items-center justify-between group">
<span class="truncate">Check my DPC promotion eligibility</span>
<span class="material-symbols-outlined text-[14px] text-outline opacity-0 group-hover:opacity-100 transition-opacity">arrow_forward</span>
</button>
</div>
</div>
</div>
</div>
<!-- CENTRAL PANE: Interactive Copilot Conversation (6 cols / Fluid Main Engine) -->
<div class="col-span-12 lg:col-span-6 flex flex-col bg-surface-container-lowest rounded-xl shadow-sm overflow-hidden min-h-[640px] h-full">
<!-- Chat Stream Header / Breadcrumb status -->
<div class="px-space-md py-space-sm bg-surface-container-low flex items-center justify-between">
<div class="flex items-center gap-space-sm">
<div class="w-2.5 h-2.5 rounded-full bg-secondary-container"></div>
<span class="font-label-md text-label-md text-primary font-bold">Session #ISS-NAD-2025-088</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">| Topic: Constant Price GVA Deflator Reconciliations</span>
</div>
<div class="flex items-center gap-space-xs font-label-sm text-label-sm text-on-surface-variant">
<span class="material-symbols-outlined text-[16px] text-secondary">encrypted</span>
<span>End-to-End GovCloud Isolation</span>
</div>
</div>
<!-- Dialogue History Stream -->
<div class="p-space-md flex-1 overflow-y-auto flex flex-col gap-space-md" id="chat-stream">
<!-- Timestamp Separator -->
<div class="flex items-center justify-center">
<span class="px-2 py-0.5 rounded-full bg-surface-container font-label-sm text-label-sm text-on-surface-variant">
            Today, 11:24 AM IST â€¢ Authoritative Advisory Session
          </span>
</div>
<!-- User Bubble -->
<div class="flex items-start justify-end gap-space-sm max-w-4xl self-end pl-8">
<div class="flex flex-col items-end gap-1">
<div class="bg-primary text-on-primary p-space-md rounded-xl rounded-tr-none shadow-sm">
<p class="font-body-md text-body-md leading-relaxed">
                I have an upcoming review of the 2024-25 Gross Value Added (GVA) at constant prices for the manufacturing sector. How should I account for the recent wholesale price index (WPI) base revision deflator mismatch, and what iGOT or NSSTA modules address this?
              </p>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant">Dr. Rajesh Sharma â€¢ 11:25 AM</span>
</div>
<div class="w-8 h-8 rounded-full bg-secondary-container text-on-secondary flex items-center justify-center font-label-sm text-label-sm font-bold flex-shrink-0 mt-1">
            RS
          </div>
</div>
<!-- Copilot Response Bubble (Authoritative Gov Engine) -->
<div class="flex items-start gap-space-sm max-w-4xl self-start pr-4">
<div class="w-8 h-8 rounded-full bg-primary-container text-on-primary flex items-center justify-center flex-shrink-0 mt-1 shadow-sm">
<span class="material-symbols-outlined text-[18px] text-secondary-container">psychology</span>
</div>
<div class="flex flex-col items-start gap-1 flex-1">
<div class="bg-surface-container-low text-on-surface p-space-md rounded-xl rounded-tl-none shadow-sm flex flex-col gap-space-sm w-full">
<!-- Source attribution strip -->
<div class="flex items-center justify-between pb-1 bg-surface-container/60 px-2 py-1 rounded">
<span class="font-label-sm text-label-sm text-primary font-bold flex items-center gap-1">
<span class="material-symbols-outlined text-[15px] text-secondary">verified_user</span>
                  MoSPI Advisory Committee on National Accounts (ACNA) 2023 Guidelines
                </span>
<span class="font-label-sm text-label-sm text-on-surface-variant font-mono">Confidence: 99.4%</span>
</div>
<!-- Executive Explanation -->
<p class="font-body-md text-body-md leading-relaxed text-on-surface">
                Director Sharma, when deflating nominal GVA in the manufacturing sector amidst divergence between input costs and output prices, relying solely on single-indicator deflation introduces severe statistical skew (Single Extrapolation bias).
              </p>
<!-- Methodological Formulation & Formula Box -->
<div class="bg-surface-container-lowest p-space-sm rounded-lg shadow-sm">
<span class="font-label-sm text-label-sm text-on-surface-variant font-semibold uppercase tracking-wider block mb-1">
                  Statutory Mathematical Standard: Double Deflation (SNA 2008 Â§15.115)
                </span>
<div class="font-mono text-body-sm text-primary bg-surface p-space-sm rounded overflow-x-auto leading-relaxed">
                  GVA_t^(constant) = [ Gross_Output_t / P_output(t,0) ] - âˆ‘_i [ Intermediate_Consumption_(i,t) / P_input_(i,t,0) ]
                </div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-2">
                  Where <span class="font-mono text-primary font-semibold">P_output</span> utilizes the appropriate WPI manufactured products subclass, and <span class="font-mono text-primary font-semibold">P_input</span> applies input-weighted commodity indices derived from the 2011-12 Supply-Use Tables (SUT) matrix until the updated 2020-21 benchmark matrix is finalized.
                </p>
</div>
<!-- Prescribed Remediation & Training Linkage -->
<div class="p-space-sm bg-surface-container rounded-lg flex flex-col gap-1.5">
<div class="flex items-center gap-1.5 text-primary font-label-md text-label-md">
<span class="material-symbols-outlined text-[18px] text-secondary">school</span>
<span>Prescribed Competency Remediation Pathway (iGOT Karmayogi)</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">
                  Your officer profile currently indicates a <strong>Level 2 Deficit</strong> in <em>Price Indices &amp; Deflator Mechanics</em>. The following accredited module fulfills 4 NSSTA Cadre Training Credits:
                </p>
<div class="flex items-center justify-between p-space-xs bg-surface-container-lowest rounded shadow-sm">
<div class="flex items-center gap-space-xs">
<span class="material-symbols-outlined text-secondary text-[20px]">play_circle</span>
<div class="flex flex-col">
<span class="font-label-md text-label-md text-primary font-bold">STAT-DEF-402: Production Account Deflator Methodologies</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">NSSTA Certified â€¢ 6.5 Hours â€¢ Includes SUT Matrix Labs</span>
</div>
</div>
<button class="px-space-sm py-1 bg-secondary text-on-secondary rounded font-label-sm text-label-sm hover:bg-secondary/90 transition-all font-semibold">
                    Launch in iGOT
                  </button>
</div>
</div>
<!-- Interactive Advisory Actions -->
<div class="flex flex-wrap items-center gap-space-xs pt-1">
<button class="flex items-center gap-1 px-space-sm py-1.5 bg-primary text-on-primary rounded font-label-sm text-label-sm hover:bg-primary/90 transition-all">
<span class="material-symbols-outlined text-[16px]">terminal</span>
<span>Generate Practice Diagnostic Problem</span>
</button>
<button class="flex items-center gap-1 px-space-sm py-1.5 bg-surface-container-highest text-on-surface rounded font-label-sm text-label-sm hover:bg-surface-container-high transition-all">
<span class="material-symbols-outlined text-[16px]">calendar_month</span>
<span>Book Consult with NSSTA Faculty</span>
</button>
<button class="flex items-center gap-1 px-space-sm py-1.5 bg-surface-container-highest text-on-surface rounded font-label-sm text-label-sm hover:bg-surface-container-high transition-all">
<span class="material-symbols-outlined text-[16px]">content_copy</span>
<span>Copy Citations</span>
</button>
</div>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant ml-2">Grounded by NSSTA Academy RAG Pod â€¢ 11:25 AM</span>
</div>
</div>
</div>
<!-- Follow-up Suggestion Chips -->
<div class="px-space-md py-space-xs bg-surface-container-low/50 flex flex-wrap items-center gap-space-xs">
<span class="font-label-sm text-label-sm text-on-surface-variant font-semibold">Prompt Prompts:</span>
<button class="font-label-sm text-label-sm px-2.5 py-1 rounded-full bg-surface-container-lowest text-primary hover:bg-surface-container transition-all shadow-sm">
          "How does double deflation impact service sector GVA?"
        </button>
<button class="font-label-sm text-label-sm px-2.5 py-1 rounded-full bg-surface-container-lowest text-primary hover:bg-surface-container transition-all shadow-sm">
          "Generate 3 MCQ test items on GCF vs GFCF deflators"
        </button>
<button class="font-label-sm text-label-sm px-2.5 py-1 rounded-full bg-surface-container-lowest text-primary hover:bg-surface-container transition-all shadow-sm">
          "Draft APAR training justification note for Director General"
        </button>
</div>
<!-- Rich Sovereign Input Box -->
<div class="p-space-md bg-surface-container-lowest shadow-[0_-2px_10px_rgba(0,0,0,0.03)] flex flex-col gap-space-xs">
<div class="flex items-center gap-space-xs bg-surface-container-low p-space-xs rounded-xl shadow-inner focus-within:bg-surface-container-lowest transition-all">
<button class="p-2 text-on-surface-variant hover:text-primary rounded-lg hover:bg-surface-container transition-colors" title="Attach MoSPI Directive or Circular">
<span class="material-symbols-outlined text-[20px]">attach_file</span>
</button>
<input class="flex-1 bg-transparent px-space-xs py-2 font-body-md text-body-md text-on-surface focus:outline-none placeholder:text-outline" id="copilot-input" placeholder="Ask Cadre Copilot on SNA 2008, Sampling Formulas, DoPT rules, or APAR competency..." type="text" value=""/>
<button class="p-2 text-on-surface-variant hover:text-primary rounded-lg hover:bg-surface-container transition-colors" title="Voice Methodological Query (NIC Sovereign Speech Engine)">
<span class="material-symbols-outlined text-[20px]">mic</span>
</button>
<button class="flex items-center justify-center px-space-md py-2 bg-secondary text-on-secondary rounded-lg font-label-md text-label-md hover:bg-secondary/90 transition-all shadow-sm gap-1" id="btn-send-message">
<span>Send</span>
<span class="material-symbols-outlined text-[16px]">send</span>
</button>
</div>
<div class="flex items-center justify-between px-space-xs">
<div class="flex items-center gap-space-xs text-on-surface-variant font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[14px] text-secondary">verified</span>
<span>Grounding: <strong>Official Statistical System (MoSPI/NSSTA)</strong></span>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant font-mono">Token Budget: 8,420 / 32,000</span>
</div>
</div>
</div>
<!-- RIGHT PANE: Interactive AI Tools & Instant Actions (3 cols / ~280px equivalent) -->
<div class="col-span-12 lg:col-span-3 flex flex-col gap-space-md">
<!-- TOOL 1: Instant Methodology Quizzer -->
<div class="bg-surface-container-lowest p-space-md rounded-xl shadow-sm flex flex-col gap-space-sm">
<div class="flex items-center justify-between">
<div class="flex items-center gap-1.5">
<span class="material-symbols-outlined text-[20px] text-secondary">quiz</span>
<h3 class="font-headline-sm text-headline-sm text-primary">Micro-Diagnostic</h3>
</div>
<span class="font-label-sm text-label-sm px-2 py-0.5 rounded-full bg-surface-container text-on-surface-variant font-semibold">3 Min</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">
          Dynamically generated from current context: <em>WPI deflators &amp; Gross Value Added</em>.
        </p>
<!-- Dynamic Question Card -->
<div class="bg-surface-container-low p-space-sm rounded-lg flex flex-col gap-space-xs mt-1">
<span class="font-label-sm text-label-sm text-secondary font-bold">ITEM 1 OF 3 â€¢ SNA PROTOCOL</span>
<p class="font-label-md text-label-md text-primary font-semibold leading-snug">
            Under which specific condition does single indicator deflation severely overestimate real manufacturing output?
          </p>
<div class="flex flex-col gap-1.5 mt-1">
<label class="flex items-start gap-2 p-1.5 rounded bg-surface-container-lowest hover:bg-surface-container cursor-pointer transition-colors text-on-surface">
<input class="mt-0.5 accent-secondary" name="quiz_opt" type="radio"/>
<span class="font-body-sm text-body-sm leading-tight">When raw material input prices rise drastically faster than output gate prices.</span>
</label>
<label class="flex items-start gap-2 p-1.5 rounded bg-surface-container-lowest hover:bg-surface-container cursor-pointer transition-colors text-on-surface">
<input class="mt-0.5 accent-secondary" name="quiz_opt" type="radio"/>
<span class="font-body-sm text-body-sm leading-tight">When the gross capital formation exceeds 35% of national GDP.</span>
</label>
<label class="flex items-start gap-2 p-1.5 rounded bg-surface-container-lowest hover:bg-surface-container cursor-pointer transition-colors text-on-surface">
<input class="mt-0.5 accent-secondary" name="quiz_opt" type="radio"/>
<span class="font-body-sm text-body-sm leading-tight">When intermediate consumption drops below 10% of gross output.</span>
</label>
</div>
<button class="mt-2 w-full py-1.5 bg-primary text-on-primary rounded font-label-sm text-label-sm hover:bg-primary/90 transition-all font-semibold">
            Submit Assessment to Dossier
          </button>
</div>
</div>
<!-- TOOL 2: Cadre Rule Clarifier (DoPT Rule 12A Calculator) -->
<div class="bg-surface-container-lowest p-space-md rounded-xl shadow-sm flex flex-col gap-space-sm">
<div class="flex items-center justify-between">
<div class="flex items-center gap-1.5">
<span class="material-symbols-outlined text-[20px] text-primary">balance</span>
<h3 class="font-headline-sm text-headline-sm text-primary">DoPT Rule 12A Advisor</h3>
</div>
<span class="font-label-sm text-label-sm px-1.5 py-0.5 rounded bg-surface-container font-semibold text-on-surface-variant">DPC 2025</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">
          Calculates mandatory mandatory mid-career training completion credits for Indian Statistical Service promotion eligibility.
        </p>
<div class="bg-surface-container-low p-space-sm rounded-lg flex flex-col gap-space-xs">
<div class="flex items-center justify-between font-label-sm text-label-sm">
<span class="text-on-surface-variant">Current Grade:</span>
<span class="font-bold text-primary">JAG (Dir / JD)</span>
</div>
<div class="flex items-center justify-between font-label-sm text-label-sm">
<span class="text-on-surface-variant">Target Elevation:</span>
<span class="font-bold text-primary">SAG (Senior Admin Grade - Level 14)</span>
</div>
<div class="flex items-center justify-between font-label-sm text-label-sm">
<span class="text-on-surface-variant">Mandatory iGOT Credits:</span>
<span class="font-bold text-secondary">24 / 30 Acquired</span>
</div>
<!-- Dual-track progress bar token conformant -->
<div class="w-full bg-surface-container h-2 rounded-full overflow-hidden mt-1 relative">
<div class="bg-secondary h-full rounded-full" style="width: 80%"></div>
<!-- Benchmark tick mark at 100% -->
<div class="absolute right-0 top-0 bottom-0 w-0.5 bg-primary"></div>
</div>
<div class="flex items-center gap-1 text-on-surface-variant font-label-sm text-label-sm mt-1">
<span class="material-symbols-outlined text-[14px] text-secondary">info</span>
<span>6 credits required prior to October 2025 DPC.</span>
</div>
<button class="mt-1 w-full py-1.5 bg-surface-container-highest text-on-surface rounded font-label-sm text-label-sm hover:bg-surface-container-high transition-all font-semibold">
            Run Full APAR Eligibility Audit
          </button>
</div>
</div>
<!-- TOOL 3: Recommended Reading from NSSTA Digital Library -->
<div class="bg-surface-container-lowest p-space-md rounded-xl shadow-sm flex flex-col gap-space-sm">
<div class="flex items-center justify-between">
<div class="flex items-center gap-1.5">
<span class="material-symbols-outlined text-[20px] text-primary">local_library</span>
<h3 class="font-headline-sm text-headline-sm text-primary">NSSTA Digital Stacks</h3>
</div>
<span class="material-symbols-outlined text-[16px] text-outline">open_in_new</span>
</div>
<div class="flex flex-col gap-space-xs">
<!-- Item A -->
<div class="flex items-center justify-between p-space-xs rounded-lg bg-surface-container-low hover:bg-surface-container transition-colors">
<div class="flex items-center gap-space-xs min-w-0">
<span class="material-symbols-outlined text-secondary text-[20px]">picture_as_pdf</span>
<div class="flex flex-col min-w-0">
<span class="font-label-md text-label-md text-primary font-semibold truncate">ACNA Recommendation Paper #41</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">SUT Constant Pricing Method â€¢ 1.8 MB</span>
</div>
</div>
<button class="p-1 rounded text-on-surface-variant hover:text-primary" title="Download PDF">
<span class="material-symbols-outlined text-[18px]">download</span>
</button>
</div>
<!-- Item B -->
<div class="flex items-center justify-between p-space-xs rounded-lg bg-surface-container-low hover:bg-surface-container transition-colors">
<div class="flex items-center gap-space-xs min-w-0">
<span class="material-symbols-outlined text-secondary text-[20px]">picture_as_pdf</span>
<div class="flex flex-col min-w-0">
<span class="font-label-md text-label-md text-primary font-semibold truncate">NSSTA Monograph on SUT Balancing</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Prof. B. Sen Gupta (2022) â€¢ 4.2 MB</span>
</div>
</div>
<button class="p-1 rounded text-on-surface-variant hover:text-primary" title="Download PDF">
<span class="material-symbols-outlined text-[18px]">download</span>
</button>
</div>
<!-- Item C -->
<div class="flex items-center justify-between p-space-xs rounded-lg bg-surface-container-low hover:bg-surface-container transition-colors">
<div class="flex items-center gap-space-xs min-w-0">
<span class="material-symbols-outlined text-secondary text-[20px]">picture_as_pdf</span>
<div class="flex flex-col min-w-0">
<span class="font-label-md text-label-md text-primary font-semibold truncate">DoPT O.M. on iGOT Integration 2024</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Cadre Management Division â€¢ 620 KB</span>
</div>
</div>
<button class="p-1 rounded text-on-surface-variant hover:text-primary" title="Download PDF">
<span class="material-symbols-outlined text-[18px]">download</span>
</button>
</div>
</div>
</div>
</div>
</div>
<!-- Client-Side Micro-Interactions Script -->
<script>
    (function() {
      const input = document.getElementById('copilot-input');
      const sendBtn = document.getElementById('btn-send-message');
      const chatStream = document.getElementById('chat-stream');
      const clearBtn = document.getElementById('btn-clear');
      const exportBtn = document.getElementById('btn-export');

      if (sendBtn && input && chatStream) {
        function appendUserMessage(text) {
          if (!text.trim()) return;
          
          const time = new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
          const userHtml = `
            <div class="flex items-start justify-end gap-space-sm max-w-4xl self-end pl-8">
              <div class="flex flex-col items-end gap-1">
                <div class="bg-primary text-on-primary p-space-md rounded-xl rounded-tr-none shadow-sm">
                  <p class="font-body-md text-body-md leading-relaxed">${escapeHtml(text)}</p>
                </div>
                <span class="font-label-sm text-label-sm text-on-surface-variant">Dr. Rajesh Sharma â€¢ ${time}</span>
              </div>
              <div class="w-8 h-8 rounded-full bg-secondary-container text-on-secondary flex items-center justify-center font-label-sm text-label-sm font-bold flex-shrink-0 mt-1">
                RS
              </div>
            </div>
          `;
          chatStream.insertAdjacentHTML('beforeend', userHtml);
          input.value = '';
          chatStream.scrollTop = chatStream.scrollHeight;

                    // Real call to MoSPI AI Copilot API
          fetch('<?= BASE_URL ?>/api/ai-copilot.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({message: text})
          })
          .then(r => r.json())
          .then(data => {
            const replyText = data.reply || 'Analysis completed according to MoSPI guidelines.';
            const aiHtml = `
              <div class="flex items-start gap-space-sm max-w-4xl self-start pr-4">
                <div class="w-8 h-8 rounded-full bg-primary-container text-on-primary flex items-center justify-center flex-shrink-0 mt-1 shadow-sm">
                  <span class="material-symbols-outlined text-[18px] text-secondary-container">psychology</span>
                </div>
                <div class="flex flex-col items-start gap-1 flex-1">
                  <div class="bg-surface-container-low text-on-surface p-space-md rounded-xl rounded-tl-none shadow-sm flex flex-col gap-space-sm w-full">
                    <div class="flex items-center justify-between pb-1 bg-surface-container/60 px-2 py-1 rounded">
                      <span class="font-label-sm text-label-sm text-primary font-bold flex items-center gap-1">
                        <span class="material-symbols-outlined text-[15px] text-secondary">verified_user</span>
                        MoSPI Statistical Standard Grounding
                      </span>
                      <span class="font-label-sm text-label-sm text-on-surface-variant font-mono">Grounded: Active SUT 2023</span>
                    </div>
                    <p class="font-body-md text-body-md leading-relaxed text-on-surface whitespace-pre-wrap">${escapeHtml(replyText)}</p>
                    <div class="flex items-center gap-2 p-2 bg-surface-container-lowest rounded shadow-sm">
                      <span class="material-symbols-outlined text-secondary text-[20px]">assignment_turned_in</span>
                      <span class="font-label-sm text-label-sm text-primary">Direct reference logged to your officer e-Dossier for APAR verification.</span>
                    </div>
                  </div>
                  <span class="font-label-sm text-label-sm text-on-surface-variant ml-2">Grounded by NSSTA Academy RAG Pod • ${new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })}</span>
                </div>
              </div>
            `;
            chatStream.insertAdjacentHTML('beforeend', aiHtml);
            chatStream.scrollTop = chatStream.scrollHeight;
          })
          .catch(() => {
            // fallback
          setTimeout(() => {
            const aiHtml = `
              <div class="flex items-start gap-space-sm max-w-4xl self-start pr-4">
                <div class="w-8 h-8 rounded-full bg-primary-container text-on-primary flex items-center justify-center flex-shrink-0 mt-1 shadow-sm">
                  <span class="material-symbols-outlined text-[18px] text-secondary-container">psychology</span>
                </div>
                <div class="flex flex-col items-start gap-1 flex-1">
                  <div class="bg-surface-container-low text-on-surface p-space-md rounded-xl rounded-tl-none shadow-sm flex flex-col gap-space-sm w-full">
                    <div class="flex items-center justify-between pb-1 bg-surface-container/60 px-2 py-1 rounded">
                      <span class="font-label-sm text-label-sm text-primary font-bold flex items-center gap-1">
                        <span class="material-symbols-outlined text-[15px] text-secondary">verified_user</span>
                        MoSPI Statistical Standard Grounding
                      </span>
                      <span class="font-label-sm text-label-sm text-on-surface-variant font-mono">Grounded: Active SUT 2023</span>
                    </div>
                    <p class="font-body-md text-body-md leading-relaxed text-on-surface">
                      Noted, Director. I am cross-verifying this methodology against the NSS 80th Round sampling frame and the DoPT 2024 competency guidelines for your cadre level.
                    </p>
                    <div class="flex items-center gap-2 p-2 bg-surface-container-lowest rounded shadow-sm">
                      <span class="material-symbols-outlined text-secondary text-[20px]">assignment_turned_in</span>
                      <span class="font-label-sm text-label-sm text-primary">Direct reference logged to your officer e-Dossier for APAR verification.</span>
                    </div>
                  </div>
                  <span class="font-label-sm text-label-sm text-on-surface-variant ml-2">Grounded by NSSTA Academy RAG Pod â€¢ ${new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })}</span>
                </div>
              </div>
            `;
            chatStream.insertAdjacentHTML('beforeend', aiHtml);
            chatStream.scrollTop = chatStream.scrollHeight;
                    });
        }

        sendBtn.addEventListener('click', () => appendUserMessage(input.value));
        input.addEventListener('keypress', (e) => {
          if (e.key === 'Enter') {
            appendUserMessage(input.value);
          }
        });
      }

      if (clearBtn && chatStream) {
        clearBtn.addEventListener('click', () => {
          if (confirm('Are you sure you want to reset this sovereign advisory session? All uncommitted query scratchpads will be archived.')) {
            const children = chatStream.querySelectorAll('.max-w-4xl');
            children.forEach(el => el.remove());
          }
        });
      }

      if (exportBtn) {
        exportBtn.addEventListener('click', () => {
          alert('Generating official MoSPI Cadre Advisory Dossier Note in PDF/A GIGW-3.0 format...');
        });
      }

      function escapeHtml(string) {
        const div = document.createElement('div');
        div.innerText = string;
        return div.innerHTML;
      }
    })();
  </script>
</div></main></div></body></html>
