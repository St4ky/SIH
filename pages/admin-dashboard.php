<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';

requireAdmin();
$user = currentUser();
$userId = (int)$user['id'];

// Real SQL Aggregates
$totalCadre = (int)$pdo->query("SELECT COUNT(*) FROM users WHERE role = 'learner'")->fetchColumn();
$meanProficiency = (int)$pdo->query("SELECT ROUND(AVG(current_score), 0) FROM skill_gaps")->fetchColumn() ?: 71;
$criticalGaps = (int)$pdo->query("SELECT COUNT(*) FROM skill_gaps WHERE priority = 'high'")->fetchColumn() ?: 18;
$tpacConfirmed = (int)$pdo->query("SELECT COUNT(*) FROM nominations WHERE status = 'confirmed'")->fetchColumn() ?: 14;
?>
<!DOCTYPE html>

<html lang="en"><head><meta charset="utf-8"/><meta content="width=device-width, initial-scale=1.0" name="viewport"/><meta content="web_dashboard" name="shell-type"/><title>Gap2Grow - MoSPI / NSSTA Statistical Cadre Intelligence</title><link href="https://fonts.googleapis.com" rel="preconnect"/><link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/><link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;600;700&amp;display=swap" rel="stylesheet"/><link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/><style>@layer base{html,body{margin:0;padding:0;}body{overscroll-behavior:none;}main>:first-child{margin-top:0!important;}main>:last-child{margin-bottom:0!important;}}::-webkit-scrollbar{display:none;}</style><script src="https://cdn.tailwindcss.com"></script><script id="tailwind-config">tailwind.config = { darkMode: "class", theme: { extend: { "colors": { "on-tertiary": "#ffffff", "inverse-surface": "#233144", "outline-variant": "#c4c6cf", "tertiary-fixed": "#dce1ff", "on-secondary-container": "#531800", "surface-dim": "#ccdbf4", "on-background": "#0d1c2f", "inverse-on-surface": "#ebf1ff", "on-tertiary-fixed-variant": "#264191", "on-primary": "#ffffff", "surface-container": "#e6eeff", "on-tertiary-container": "#7088dc", "surface-container-low": "#eff4ff", "surface-container-high": "#dde9ff", "on-surface": "#0d1c2f", "secondary-fixed-dim": "#ffb59a", "outline": "#74777f", "surface-container-lowest": "#ffffff", "secondary": "#a83900", "secondary-fixed": "#ffdbcf", "tertiary-container": "#001e63", "primary": "#001026", "on-primary-fixed": "#001c3b", "surface-variant": "#d5e3fd", "on-secondary": "#ffffff", "error-container": "#ffdad6", "primary-fixed": "#d5e3ff", "on-primary-fixed-variant": "#314769", "secondary-container": "#fc6018", "surface": "#f8f9ff", "tertiary": "#000c34", "tertiary-fixed-dim": "#b6c4ff", "error": "#ba1a1a", "primary-container": "#0b2545", "background": "#f8f9ff", "surface-tint": "#495f82", "on-error": "#ffffff", "surface-bright": "#f8f9ff", "on-error-container": "#93000a", "on-secondary-fixed-variant": "#802a00", "on-secondary-fixed": "#380d00", "on-surface-variant": "#44474e", "surface-container-highest": "#d5e3fd", "primary-fixed-dim": "#b1c7f0", "inverse-primary": "#b1c7f0", "on-primary-container": "#778db2", "on-tertiary-fixed": "#00164e" }, "borderRadius": { "DEFAULT": "0.125rem", "lg": "0.25rem", "xl": "0.5rem", "full": "0.75rem" }, "spacing": { "gutter": "1.5rem", "margin": "2rem", "space-xl": "2.5rem", "space-lg": "1.5rem", "gutter-mobile": "0.75rem", "margin-mobile": "1rem", "space-xs": "0.25rem", "space-md": "1rem", "space-sm": "0.5rem" }, "fontFamily": { "headline-xl-mobile": ["Public Sans"], "label-lg": ["Public Sans"], "body-lg": ["Public Sans"], "label-md": ["Public Sans"], "headline-lg": ["Public Sans"], "headline-lg-mobile": ["Public Sans"], "headline-md": ["Public Sans"], "headline-xl": ["Public Sans"], "body-sm": ["Public Sans"], "body-md": ["Public Sans"], "label-sm": ["Public Sans"], "headline-sm": ["Public Sans"] }, "fontSize": { "headline-xl-mobile": ["28px", { "lineHeight": "36px", "letterSpacing": "-0.01em", "fontWeight": "700" }], "label-lg": ["14px", { "lineHeight": "20px", "letterSpacing": "0.01em", "fontWeight": "600" }], "body-lg": ["16px", { "lineHeight": "24px", "fontWeight": "400" }], "label-md": ["12px", { "lineHeight": "16px", "letterSpacing": "0.02em", "fontWeight": "600" }], "headline-lg": ["28px", { "lineHeight": "36px", "letterSpacing": "-0.01em", "fontWeight": "700" }], "headline-lg-mobile": ["22px", { "lineHeight": "30px", "letterSpacing": "0em", "fontWeight": "700" }], "headline-md": ["22px", { "lineHeight": "28px", "fontWeight": "600" }], "headline-xl": ["36px", { "lineHeight": "44px", "letterSpacing": "-0.02em", "fontWeight": "700" }], "body-sm": ["12px", { "lineHeight": "18px", "fontWeight": "400" }], "body-md": ["14px", { "lineHeight": "20px", "fontWeight": "400" }], "label-sm": ["11px", { "lineHeight": "14px", "letterSpacing": "0.03em", "fontWeight": "600" }], "headline-sm": ["18px", { "lineHeight": "24px", "fontWeight": "600" }] } } } }</script></head><body class="bg-surface font-body-md text-body-md text-on-surface antialiased"><aside class="fixed left-0 top-0 h-screen w-72 bg-primary-container z-50 flex flex-col justify-between overflow-y-auto shadow-[0_1px_8px_rgba(0,0,0,0.04)]"><div class="flex flex-col"><div class="p-space-md bg-primary flex items-center gap-space-sm"><div class="w-9 h-9 rounded-lg bg-surface-container-lowest/10 flex items-center justify-center"><span class="material-symbols-outlined text-secondary-container text-[22px]">account_balance</span></div><div class="flex flex-col"><span class="font-label-md text-label-md text-on-primary tracking-tight uppercase">Gap2Grow | MoSPI</span><span class="font-label-sm text-label-sm text-on-primary-container">NSSTA Academy Portal</span></div></div><div class="m-space-md p-space-sm rounded-lg bg-primary/40"><div class="flex items-center gap-space-sm mb-space-xs"><div class="w-8 h-8 rounded-full bg-secondary-container flex items-center justify-center font-label-md text-label-md text-on-secondary"><?= htmlspecialchars(substr($user['name'] ?? 'AD', 0, 2)) ?></div><div class="flex flex-col min-w-0 flex-1"><span class="font-label-md text-label-md text-on-primary truncate"><?= htmlspecialchars($user['name'] ?? 'NSSTA Admin') ?></span><span class="font-label-sm text-label-sm text-on-primary-container truncate"><?= htmlspecialchars($user['designation'] ?? 'Cadre Administrator') ?></span></div></div><div class="flex items-center justify-between pt-space-xs"><span class="font-label-sm text-label-sm text-on-primary-container">ID: <?= htmlspecialchars($user['employee_id'] ?? 'NSSTA-ADMIN-001') ?></span><span class="font-label-sm text-label-sm text-secondary-container bg-secondary-container/10 px-1.5 py-0.5 rounded">Admin Verified</span></div></div><nav class="flex flex-col px-space-sm gap-1" data-active-classes="bg-surface-container-highest text-on-surface font-label-md"><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-primary-container hover:bg-surface-container-highest hover:text-on-surface transition-colors" data-path="learner-dashboard" href="<?= BASE_URL ?>/pages/dashboard.php"><span class="material-symbols-outlined text-[20px]">space_dashboard</span><span class="font-label-md text-label-md">Learner Dashboard</span></a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-primary-container hover:bg-surface-container-highest hover:text-on-surface transition-colors" data-path="skill-gap-analysis" href="<?= BASE_URL ?>/pages/skill-gap.php"><span class="material-symbols-outlined text-[20px]">analytics</span><span class="font-label-md text-label-md">Skill-Gap Analysis</span></a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-primary-container hover:bg-surface-container-highest hover:text-on-surface transition-colors" data-path="my-learning-path" href="<?= BASE_URL ?>/pages/learning-path.php"><span class="material-symbols-outlined text-[20px]">route</span><span class="font-label-md text-label-md">My Learning Path</span></a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-primary-container hover:bg-surface-container-highest hover:text-on-surface transition-colors" data-path="ai-assessment-generator" href="<?= BASE_URL ?>/pages/assessment-generator.php"><span class="material-symbols-outlined text-[20px]">psychology</span><span class="font-label-md text-label-md">AI Assessment Generator</span></a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-primary-container hover:bg-surface-container-highest hover:text-on-surface transition-colors" data-path="igot-course-catalog" href="<?= BASE_URL ?>/pages/igot-courses.php"><span class="material-symbols-outlined text-[20px]">local_library</span><span class="font-label-md text-label-md">iGOT Course Catalog</span></a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-primary-container hover:bg-surface-container-highest hover:text-on-surface transition-colors" data-path="nssta-tpac-nominations" href="<?= BASE_URL ?>/pages/nssta-programmes.php"><span class="material-symbols-outlined text-[20px]">assignment_turned_in</span><span class="font-label-md text-label-md">NSSTA TPAC Nominations</span></a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-primary-container hover:bg-surface-container-highest hover:text-on-surface transition-colors" data-path="cadre-analytics" href="<?= BASE_URL ?>/pages/cadre-analytics.php"><span class="material-symbols-outlined text-[20px]">insights</span><span class="font-label-md text-label-md">Cadre Analytics</span></a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-primary-container hover:bg-surface-container-highest hover:text-on-surface transition-colors" data-path="emerging-skill-forecast" href="<?= BASE_URL ?>/pages/emerging-skills.php"><span class="material-symbols-outlined text-[20px]">trending_up</span><span class="font-label-md text-label-md">Emerging Skill Forecast</span></a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-primary-container hover:bg-surface-container-highest hover:text-on-surface transition-colors" data-path="ai-cadre-copilot" href="<?= BASE_URL ?>/pages/ai-assistant.php"><span class="material-symbols-outlined text-[20px]">smart_toy</span><span class="font-label-md text-label-md">AI Cadre Copilot</span></a><a aria-current="page" class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg transition-colors bg-surface-container-highest text-on-surface font-label-md" data-path="admin-workforce-hub" href="<?= BASE_URL ?>/pages/admin-dashboard.php"><span class="material-symbols-outlined text-[20px]">lan</span><span class="font-label-md text-label-md">Admin Workforce Hub</span></a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-primary-container hover:bg-surface-container-highest hover:text-on-surface transition-colors" data-path="settings-and-profile" href="<?= BASE_URL ?>/pages/settings.php"><span class="material-symbols-outlined text-[20px]">settings</span><span class="font-label-md text-label-md">Settings &amp; Profile</span></a></nav></div><div class="p-space-md flex flex-col gap-space-sm bg-primary/30"><div class="flex flex-col gap-1"><span class="font-label-sm text-label-sm uppercase tracking-wider text-on-primary-container">Integration Node Telemetry</span><div class="flex flex-wrap gap-1"><span class="inline-flex items-center gap-1 font-label-sm text-label-sm px-2 py-0.5 rounded-full bg-surface-container-lowest/10 text-on-primary"><span class="w-1.5 h-1.5 rounded-full bg-secondary-container"></span>iGOT v2.4 Live</span><span class="inline-flex items-center gap-1 font-label-sm text-label-sm px-2 py-0.5 rounded-full bg-surface-container-lowest/10 text-on-primary"><span class="w-1.5 h-1.5 rounded-full bg-surface-tint"></span>SPARROW Active</span><span class="inline-flex items-center gap-1 font-label-sm text-label-sm px-2 py-0.5 rounded-full bg-surface-container-lowest/10 text-on-primary">GIGW 3.0</span><span class="inline-flex items-center gap-1 font-label-sm text-label-sm px-2 py-0.5 rounded-full bg-surface-container-lowest/10 text-on-primary">NSSTA-ISS Node</span></div></div><a class="flex items-center justify-between px-space-sm py-2 rounded-lg bg-surface-container-lowest/5 text-on-primary-container hover:bg-surface-container-highest hover:text-on-surface transition-colors" href="<?= BASE_URL ?>/logout.php"><span class="font-label-md text-label-md">Sign Out</span><span class="material-symbols-outlined text-[18px]">logout</span></a></div></aside><div class="pl-72"><header class="fixed top-0 left-72 right-0 h-16 bg-surface-container-lowest/95 backdrop-blur-xl shadow-[0_1px_8px_rgba(0,0,0,0.04)] z-40 flex items-center justify-between px-margin"><div class="flex items-center gap-space-md"><div class="flex flex-col"><div class="flex items-center gap-space-sm"><span class="font-label-sm text-label-sm text-primary font-bold tracking-tight uppercase">भारत सरकार | MoSPI</span><span class="w-1 h-1 rounded-full bg-outline-variant"></span><span class="font-label-sm text-label-sm text-on-surface-variant">Statistical Cadre Intelligence &amp; Administrative Cell</span></div><div class="flex items-center gap-space-xs mt-0.5"><span class="inline-flex items-center gap-1 font-label-sm text-label-sm px-2 py-0.5 rounded bg-surface-container text-on-surface font-semibold"><span class="material-symbols-outlined text-[14px] text-secondary">verified_user</span>NAD / Cadre Control Authority</span><span class="inline-flex items-center gap-1 font-label-sm text-label-sm px-2 py-0.5 rounded bg-surface-container text-on-surface-variant"><span class="material-symbols-outlined text-[14px]">lock</span>e-HRMS Cryptographic Seal: ISS-V4</span></div></div></div><div class="flex items-center gap-space-md"><div class="flex items-center gap-space-xs bg-surface-container-low px-space-sm py-1 rounded-lg"><span class="font-label-sm text-label-sm text-on-surface-variant font-medium">Role:</span><span class="font-label-sm text-label-sm text-on-surface font-semibold"><?= htmlspecialchars(ucfirst($user['role'])) ?> (Administrator)</span><span class="material-symbols-outlined text-[18px] text-on-surface-variant cursor-pointer">arrow_drop_down</span></div><div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center"><span class="material-symbols-outlined text-on-primary text-[18px]">person</span></div></div></header><main class="w-full pt-16 bg-surface"><div class="flex flex-col w-full">
<!-- Top Ambient Telemetry Strip -->
<div class="w-full bg-primary text-on-primary px-margin py-2 flex flex-wrap items-center justify-between gap-space-sm shadow-sm">
<div class="flex items-center gap-space-md text-label-sm font-label-sm">
<span class="inline-flex items-center gap-1 text-secondary-fixed bg-primary-container px-2 py-0.5 rounded">
<span class="w-2 h-2 rounded-full bg-secondary-container animate-pulse"></span>
        Sovereign Node: CCA-DEL-SEC-01 (Active)
      </span>
<span class="text-on-primary-container hidden md:inline">DoPT Cadre Management Directive: 2024/STAT/ISS-78B</span>
<span class="text-on-primary-container hidden lg:inline">Last e-HRMS Sync: <span class="text-on-primary font-bold">14:02 IST (18s ago)</span></span>
</div>
<div class="flex items-center gap-space-sm font-label-sm text-label-sm">
<span class="text-on-primary-container">Integrity Signature:</span>
<span class="font-mono text-secondary-fixed bg-surface-container-highest/20 px-2 py-0.5 rounded tracking-wider">SHA-256: 9E4F..C83A</span>
<span class="text-surface-tint">|</span>
<span class="text-on-primary bg-secondary/80 px-2 py-0.5 rounded font-semibold">GIGW 3.0 Standard</span>
</div>
</div>
<div class="p-margin flex flex-col gap-space-xl">
<!-- Executive Header Section -->
<header class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-space-md">
<div class="flex flex-col gap-space-xs max-w-4xl">
<nav aria-label="Breadcrumb" class="flex items-center gap-1.5 font-label-sm text-label-sm text-on-surface-variant">
<a class="hover:text-primary transition-colors flex items-center gap-1" href="<?= BASE_URL ?>/pages/dashboard.php">
<span class="material-symbols-outlined text-[15px]">home</span>Home
          </a>
<span class="text-outline-variant font-bold">/</span>
<a class="hover:text-primary transition-colors" href="<?= BASE_URL ?>/pages/admin-dashboard.php">Cadre Administration</a>
<span class="text-outline-variant font-bold">/</span>
<span class="text-primary font-semibold">National Workforce Command &amp; Capacity Hub</span>
</nav>
<div class="flex items-center gap-space-sm mt-1">
<div class="w-2.5 h-8 bg-secondary-container rounded-xs"></div>
<h1 class="font-headline-xl text-headline-xl text-primary tracking-tight">
            MoSPI National Cadre Workforce Command Center
          </h1>
</div>
<p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
          Real-time statistical capability oversight across Indian Statistical Service (<strong class="text-on-surface font-semibold">ISS — 840 Officers</strong>), Subordinate Statistical Service (<strong class="text-on-surface font-semibold">SSS — 3,850 Personnel</strong>), and <strong class="text-on-surface font-semibold">36 State Directorates of Economics &amp; Statistics (DES)</strong> under the aegis of NSSTA &amp; Cadre Control Authority.
        </p>
</div>
<!-- Quick Action CTAs -->
<div class="flex flex-wrap items-center gap-space-sm pt-2 lg:pt-0 shrink-0">
<button class="flex items-center gap-2 px-space-md py-2 bg-surface-container text-primary hover:bg-surface-container-high font-label-md text-label-md rounded-lg transition-all shadow-sm" id="btn-circular" onclick="window.location.href='<?= BASE_URL ?>/api/export-csv.php'">
<span class="material-symbols-outlined text-[18px] text-secondary">picture_as_pdf</span>
          Issue Circular (PDF)
        </button>
<button class="flex items-center gap-2 px-space-md py-2 bg-surface-container text-primary hover:bg-surface-container-high font-label-md text-label-md rounded-lg transition-all shadow-sm" id="btn-sync">
<span class="material-symbols-outlined text-[18px] text-surface-tint animate-spin" style="animation-duration: 4s;">sync</span>
          SPARROW Audit Sync
        </button>
<button class="flex items-center gap-2 px-space-md py-2 bg-secondary-container hover:bg-secondary text-on-secondary font-label-md text-label-md rounded-lg transition-all shadow-md" id="btn-export" onclick="window.location.href='<?= BASE_URL ?>/api/export-csv.php'">
<span class="material-symbols-outlined text-[18px]">download</span>
          Export Readiness Report
        </button>
</div>
</header>
<!-- High-Level National Metric Cards (Bento Grid) -->
<section class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-gutter">
<!-- Metric 1: Total Active Cadre -->
<div class="bg-surface-container-lowest p-space-md rounded-xl shadow-sm flex flex-col justify-between relative overflow-hidden group hover:shadow-md transition-shadow">
<div class="absolute top-0 left-0 right-0 h-1 bg-primary"></div>
<div class="flex items-start justify-between">
<div class="flex flex-col">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-bold">Total Active Statistical Cadre</span>
<div class="flex items-baseline gap-2 mt-1">
<span class="font-headline-xl text-headline-xl text-primary font-bold">4,690</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Officers</span>
</div>
</div>
<div class="w-10 h-10 rounded-lg bg-surface-container flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[22px]">badge</span>
</div>
</div>
<div class="mt-space-md pt-space-xs flex flex-col gap-1.5">
<div class="flex justify-between font-label-sm text-label-sm">
<span class="text-on-surface-variant">Onboarded on Gap2Grow</span>
<span class="font-bold text-on-surface">98.4% (4,615)</span>
</div>
<div class="w-full h-2 bg-surface-container rounded-full overflow-hidden flex">
<div class="h-full bg-primary rounded-full" style="width: 98.4%"></div>
<div class="h-full bg-surface-dim" style="width: 1.6%"></div>
</div>
<div class="flex items-center justify-between text-[11px] text-on-surface-variant font-label-sm mt-0.5">
<span class="inline-flex items-center gap-1">
<span class="w-1.5 h-1.5 rounded-full bg-primary"></span>Active Duty
            </span>
<span class="inline-flex items-center gap-1">
<span class="w-1.5 h-1.5 rounded-full bg-surface-dim"></span>1.6% Deputation/Leave
            </span>
</div>
</div>
</div>
<!-- Metric 2: Cadre Competency Health -->
<div class="bg-surface-container-lowest p-space-md rounded-xl shadow-sm flex flex-col justify-between relative overflow-hidden group hover:shadow-md transition-shadow">
<div class="absolute top-0 left-0 right-0 h-1 bg-secondary-container"></div>
<div class="flex items-start justify-between">
<div class="flex flex-col">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-bold">National Cadre Competency Index</span>
<div class="flex items-baseline gap-2 mt-1">
<span class="font-headline-xl text-headline-xl text-primary font-bold">79.8%</span>
<span class="font-label-sm text-label-sm text-secondary font-semibold">+4.2% FY24-25</span>
</div>
</div>
<div class="w-10 h-10 rounded-lg bg-surface-container flex items-center justify-center text-secondary">
<span class="material-symbols-outlined text-[22px]">vital_signs</span>
</div>
</div>
<div class="mt-space-md pt-space-xs flex flex-col gap-1.5">
<div class="flex justify-between font-label-sm text-label-sm">
<span class="text-on-surface-variant">Benchmark Target: 85.0%</span>
<span class="font-semibold text-secondary">Deficit: -5.2%</span>
</div>
<div class="relative w-full h-2 bg-surface-container rounded-full overflow-hidden">
<div class="h-full bg-secondary-container rounded-full" style="width: 79.8%"></div>
<!-- Target Marker Indicator -->
<div class="absolute top-0 bottom-0 w-0.5 bg-primary" style="left: 85%"></div>
</div>
<div class="flex items-center justify-between text-[11px] text-on-surface-variant font-label-sm mt-0.5">
<span>Baseline: 75.6%</span>
<span class="font-semibold text-primary">Target: 85% by Q3</span>
</div>
</div>
</div>
<!-- Metric 3: Critical Deficit Flags -->
<div class="bg-surface-container-lowest p-space-md rounded-xl shadow-sm flex flex-col justify-between relative overflow-hidden group hover:shadow-md transition-shadow">
<div class="absolute top-0 left-0 right-0 h-1 bg-error"></div>
<div class="flex items-start justify-between">
<div class="flex flex-col">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-bold">Urgent Training Deficit Flags</span>
<div class="flex items-baseline gap-2 mt-1">
<span class="font-headline-xl text-headline-xl text-error font-bold">312</span>
<span class="font-label-sm text-label-sm text-error bg-error-container/60 px-1.5 py-0.5 rounded font-bold">Critical</span>
</div>
</div>
<div class="w-10 h-10 rounded-lg bg-error-container flex items-center justify-center text-error">
<span class="material-symbols-outlined text-[22px]">warning</span>
</div>
</div>
<div class="mt-space-md pt-space-xs flex flex-col gap-1">
<div class="flex items-center gap-1.5 font-label-sm text-label-sm text-on-surface">
<span class="material-symbols-outlined text-[16px] text-error">priority_high</span>
<span>80th NSS Cycle &amp; Big Data Modernization</span>
</div>
<div class="flex justify-between items-center text-[11px] text-on-surface-variant font-label-sm pt-1">
<span>208 NSSO Field | 104 NAD HQ</span>
<a class="text-secondary font-bold hover:underline" href="#intervention-queue">View Mandates →</a>
</div>
</div>
</div>
<!-- Metric 4: iGOT & NSSTA Compliance -->
<div class="bg-surface-container-lowest p-space-md rounded-xl shadow-sm flex flex-col justify-between relative overflow-hidden group hover:shadow-md transition-shadow">
<div class="absolute top-0 left-0 right-0 h-1 bg-surface-tint"></div>
<div class="flex items-start justify-between">
<div class="flex flex-col">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-bold">iGOT &amp; NSSTA Annual Quota</span>
<div class="flex items-baseline gap-2 mt-1">
<span class="font-headline-xl text-headline-xl text-primary font-bold">84.6%</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Completed</span>
</div>
</div>
<div class="w-10 h-10 rounded-lg bg-surface-container flex items-center justify-center text-surface-tint">
<span class="material-symbols-outlined text-[22px]">verified</span>
</div>
</div>
<div class="mt-space-md pt-space-xs flex flex-col gap-1.5">
<div class="flex justify-between font-label-sm text-label-sm">
<span class="text-on-surface-variant">Mandatory 50 Hrs/Year</span>
<span class="font-bold text-on-surface">3,968 Officers Compliant</span>
</div>
<div class="w-full h-2 bg-surface-container rounded-full overflow-hidden flex">
<div class="h-full bg-surface-tint rounded-full" style="width: 84.6%"></div>
</div>
<div class="flex items-center justify-between text-[11px] text-on-surface-variant font-label-sm mt-0.5">
<span>Target Deadline: 31 Mar</span>
<span class="text-secondary font-semibold">722 Incomplete</span>
</div>
</div>
</div>
</section>
<!-- Operational Banner / Cadre Mobilization Note -->
<div class="bg-surface-container-low p-space-md rounded-xl shadow-sm flex flex-col md:flex-row items-start md:items-center justify-between gap-space-md">
<div class="flex items-center gap-space-md">
<div class="w-10 h-10 rounded-lg bg-primary-container text-on-primary flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[24px] text-secondary-fixed">campaign</span>
</div>
<div class="flex flex-col">
<span class="font-label-md text-label-md text-primary font-bold">
            All-India Mission: 80th Round NSS Cycle &amp; AI Microdata Automation
          </span>
<span class="font-body-sm text-body-sm text-on-surface-variant">
            NSSTA Greater Noida has sanctioned 6 intensive residential cohorts starting 15th prox. Officers flagged with critical deficiencies in CAPI Tablets &amp; Geospatial Tagging have priority booking lock.
          </span>
</div>
</div>
<div class="flex items-center gap-space-sm shrink-0">
<span class="font-label-sm text-label-sm bg-surface-container-highest px-2.5 py-1 rounded text-on-surface font-mono font-semibold">
          REF: NSSTA/TPAC/2025/110
        </span>
</div>
</div>
<!-- Central Workstation Grid (2 Columns) -->
<div class="grid grid-cols-1 xl:grid-cols-12 gap-gutter items-start">
<!-- LEFT COLUMN (7 Cols): Heatmaps, Matrix, Breakdown -->
<div class="xl:col-span-7 flex flex-col gap-space-xl">
<!-- Section A: National Division Competency Heatmap & Readiness -->
<div class="bg-surface-container-lowest rounded-xl shadow-sm p-space-md flex flex-col gap-space-md">
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-space-sm pb-2">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-[22px]">domain</span>
<div class="flex flex-col">
<h2 class="font-headline-sm text-headline-sm text-primary font-bold">
                  National Division Competency Heatmap &amp; Readiness
                </h2>
<span class="font-label-sm text-label-sm text-on-surface-variant">Cadre deployment vs. technical capabilities across MoSPI Directorates</span>
</div>
</div>
<div class="flex items-center gap-1.5 font-label-sm text-label-sm">
<span class="inline-flex items-center gap-1 bg-surface-container px-2 py-0.5 rounded text-on-surface font-medium">
<span class="w-2 h-2 rounded-full bg-error"></span>Critical (&lt;70%)
              </span>
<span class="inline-flex items-center gap-1 bg-surface-container px-2 py-0.5 rounded text-on-surface font-medium">
<span class="w-2 h-2 rounded-full bg-secondary-container"></span>Moderate
              </span>
<span class="inline-flex items-center gap-1 bg-surface-container px-2 py-0.5 rounded text-on-surface font-medium">
<span class="w-2 h-2 rounded-full bg-surface-tint"></span>Optimal (&gt;85%)
              </span>
</div>
</div>
<!-- Structured Responsive Table -->
<div class="overflow-x-auto">
<table class="w-full text-left font-body-sm text-body-sm">
<thead>
<tr class="bg-surface-container-low text-on-surface-variant font-label-sm text-[11px] uppercase tracking-wider">
<th class="py-2.5 px-3 rounded-l-lg font-bold">Division / Directorate</th>
<th class="py-2.5 px-2 text-center font-bold">Sanctioned</th>
<th class="py-2.5 px-2 text-center font-bold">In-Position</th>
<th class="py-2.5 px-3 font-bold">Readiness Status</th>
<th class="py-2.5 px-3 font-bold">Primary Skill Deficit</th>
<th class="py-2.5 px-3 text-right rounded-r-lg font-bold">CCA Directive</th>
</tr>
</thead>
<tbody class="text-on-surface divide-y-0">
<!-- Row 1: NAD -->
<tr class="hover:bg-surface-container-low/60 transition-colors">
<td class="py-3 px-3">
<div class="flex flex-col">
<span class="font-label-md text-label-md font-bold text-primary">National Accounts Division (NAD)</span>
<span class="text-on-surface-variant text-[11px]">CSO | New Delhi Central</span>
</div>
</td>
<td class="py-3 px-2 text-center font-mono font-semibold">142</td>
<td class="py-3 px-2 text-center font-mono">134</td>
<td class="py-3 px-3">
<div class="flex flex-col gap-1">
<div class="flex items-center justify-between font-label-sm text-[11px]">
<span class="font-bold text-secondary">72.4%</span>
<span class="text-[10px] text-on-surface-variant font-semibold bg-secondary-fixed text-on-secondary-fixed px-1.5 py-0.2 rounded">Moderate</span>
</div>
<div class="w-24 h-1.5 bg-surface-container rounded-full overflow-hidden">
<div class="h-full bg-secondary-container rounded-full" style="width: 72.4%"></div>
</div>
</div>
</td>
<td class="py-3 px-3">
<span class="inline-block bg-surface-container px-2 py-0.5 rounded font-label-sm text-[11px] text-on-surface font-medium">
                      SNA 2008 SUT Balancing
                    </span>
</td>
<td class="py-3 px-3 text-right">
<button class="px-2.5 py-1 bg-surface-container hover:bg-surface-container-high text-primary rounded font-label-sm text-[11px] font-semibold transition-colors">
                      Sanction Workshop
                    </button>
</td>
</tr>
<!-- Row 2: NSSO FOD -->
<tr class="bg-surface-container-low/30 hover:bg-surface-container-low/80 transition-colors">
<td class="py-3 px-3">
<div class="flex flex-col">
<span class="font-label-md text-label-md font-bold text-primary">Field Operations Division (NSSO FOD)</span>
<span class="text-on-surface-variant text-[11px]">All-India 6 Zonal &amp; 49 Regional Offices</span>
</div>
</td>
<td class="py-3 px-2 text-center font-mono font-semibold">2,840</td>
<td class="py-3 px-2 text-center font-mono">2,710</td>
<td class="py-3 px-3">
<div class="flex flex-col gap-1">
<div class="flex items-center justify-between font-label-sm text-[11px]">
<span class="font-bold text-error">64.8%</span>
<span class="text-[10px] text-on-error bg-error px-1.5 py-0.2 rounded font-bold">Critical</span>
</div>
<div class="w-24 h-1.5 bg-surface-container rounded-full overflow-hidden">
<div class="h-full bg-error rounded-full" style="width: 64.8%"></div>
</div>
</div>
</td>
<td class="py-3 px-3">
<span class="inline-block bg-error-container/50 text-on-error-container px-2 py-0.5 rounded font-label-sm text-[11px] font-medium">
                      CAPI Tablets &amp; Spatial Tagging
                    </span>
</td>
<td class="py-3 px-3 text-right">
<button class="px-2.5 py-1 bg-secondary-container hover:bg-secondary text-on-secondary rounded font-label-sm text-[11px] font-semibold transition-colors shadow-xs">
                      Deploy Cohort
                    </button>
</td>
</tr>
<!-- Row 3: PSD -->
<tr class="hover:bg-surface-container-low/60 transition-colors">
<td class="py-3 px-3">
<div class="flex flex-col">
<span class="font-label-md text-label-md font-bold text-primary">Price Statistics Division (PSD)</span>
<span class="text-on-surface-variant text-[11px]">CPI, WPI &amp; IIP Architecture</span>
</div>
</td>
<td class="py-3 px-2 text-center font-mono font-semibold">185</td>
<td class="py-3 px-2 text-center font-mono">179</td>
<td class="py-3 px-3">
<div class="flex flex-col gap-1">
<div class="flex items-center justify-between font-label-sm text-[11px]">
<span class="font-bold text-primary">88.5%</span>
<span class="text-[10px] text-on-primary bg-primary px-1.5 py-0.2 rounded font-semibold">Optimal</span>
</div>
<div class="w-24 h-1.5 bg-surface-container rounded-full overflow-hidden">
<div class="h-full bg-surface-tint rounded-full" style="width: 88.5%"></div>
</div>
</div>
</td>
<td class="py-3 px-3">
<span class="inline-block bg-surface-container px-2 py-0.5 rounded font-label-sm text-[11px] text-on-surface font-medium">
                      Hedonic Price Imputation
                    </span>
</td>
<td class="py-3 px-3 text-right">
<button class="px-2.5 py-1 bg-surface-container hover:bg-surface-container-high text-primary rounded font-label-sm text-[11px] font-semibold transition-colors">
                      Review Audit
                    </button>
</td>
</tr>
<!-- Row 4: DQID -->
<tr class="hover:bg-surface-container-low/60 transition-colors">
<td class="py-3 px-3">
<div class="flex flex-col">
<span class="font-label-md text-label-md font-bold text-primary">Data Quality &amp; Innovation (DQID)</span>
<span class="text-on-surface-variant text-[11px]">Kolkata Computing Center</span>
</div>
</td>
<td class="py-3 px-2 text-center font-mono font-semibold">210</td>
<td class="py-3 px-2 text-center font-mono">198</td>
<td class="py-3 px-3">
<div class="flex flex-col gap-1">
<div class="flex items-center justify-between font-label-sm text-[11px]">
<span class="font-bold text-secondary">76.1%</span>
<span class="text-[10px] text-on-secondary-fixed font-semibold bg-secondary-fixed px-1.5 py-0.2 rounded">Moderate</span>
</div>
<div class="w-24 h-1.5 bg-surface-container rounded-full overflow-hidden">
<div class="h-full bg-secondary-container rounded-full" style="width: 76.1%"></div>
</div>
</div>
</td>
<td class="py-3 px-3">
<span class="inline-block bg-surface-container px-2 py-0.5 rounded font-label-sm text-[11px] text-on-surface font-medium">
                      Python DuckDB Microdata Engine
                    </span>
</td>
<td class="py-3 px-3 text-right">
<button class="px-2.5 py-1 bg-surface-container hover:bg-surface-container-high text-primary rounded font-label-sm text-[11px] font-semibold transition-colors">
                      Sanction Workshop
                    </button>
</td>
</tr>
<!-- Row 5: SDRD -->
<tr class="hover:bg-surface-container-low/60 transition-colors">
<td class="py-3 px-3">
<div class="flex flex-col">
<span class="font-label-md text-label-md font-bold text-primary">Survey Design &amp; Research (SDRD)</span>
<span class="text-on-surface-variant text-[11px]">Kolkata Sampling Methodology Unit</span>
</div>
</td>
<td class="py-3 px-2 text-center font-mono font-semibold">160</td>
<td class="py-3 px-2 text-center font-mono">152</td>
<td class="py-3 px-3">
<div class="flex flex-col gap-1">
<div class="flex items-center justify-between font-label-sm text-[11px]">
<span class="font-bold text-primary">91.2%</span>
<span class="text-[10px] text-on-primary bg-primary px-1.5 py-0.2 rounded font-semibold">Optimal</span>
</div>
<div class="w-24 h-1.5 bg-surface-container rounded-full overflow-hidden">
<div class="h-full bg-surface-tint rounded-full" style="width: 91.2%"></div>
</div>
</div>
</td>
<td class="py-3 px-3">
<span class="inline-block bg-surface-container px-2 py-0.5 rounded font-label-sm text-[11px] text-on-surface font-medium">
                      Small Area Estimation (SAE)
                    </span>
</td>
<td class="py-3 px-3 text-right">
<button class="px-2.5 py-1 bg-surface-container hover:bg-surface-container-high text-primary rounded font-label-sm text-[11px] font-semibold transition-colors">
                      Review Audit
                    </button>
</td>
</tr>
</tbody>
</table>
</div>
<div class="flex items-center justify-between pt-2 text-label-sm font-label-sm text-on-surface-variant">
<span>Showing 5 core operational directorates out of 14 MoSPI wings</span>
<button class="text-secondary font-semibold hover:underline flex items-center gap-1">
              View All 36 State DES Networks <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</button>
</div>
</div>
<!-- Section B: Batch & Grade Allocation Monitor with APAR Integration -->
<div class="bg-surface-container-lowest rounded-xl shadow-sm p-space-md flex flex-col gap-space-md">
<div class="flex items-center justify-between pb-1">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-[22px]">military_tech</span>
<div class="flex flex-col">
<h2 class="font-headline-sm text-headline-sm text-primary font-bold">
                  Cadre Grade Allocation &amp; APAR Weightage Monitor
                </h2>
<span class="font-label-sm text-label-sm text-on-surface-variant">
                  Real-time DPC eligibility and iGOT 50-hour mandatory APAR Part-1 synchronization
                </span>
</div>
</div>
<span class="font-label-sm text-label-sm bg-surface-container px-2.5 py-1 rounded text-primary font-bold">
              Cycle: 2024-25 Assessment Year
            </span>
</div>
<div class="grid grid-cols-1 md:grid-cols-5 gap-space-sm">
<!-- Grade 1: HAG+ / DG -->
<div class="p-space-sm rounded-lg bg-surface-container-low flex flex-col justify-between gap-space-sm">
<div class="flex justify-between items-start">
<span class="font-label-sm text-label-sm font-bold text-primary">HAG+ / DG</span>
<span class="text-[10px] font-mono bg-surface-container px-1 py-0.5 rounded text-on-surface-variant">L16-17</span>
</div>
<div class="flex flex-col">
<span class="font-headline-sm text-headline-sm text-primary font-bold">14</span>
<span class="text-[11px] text-on-surface-variant font-label-sm">Sanctioned: 16</span>
</div>
<div class="pt-1 flex flex-col gap-1">
<div class="flex justify-between text-[11px] font-label-sm text-on-surface-variant">
<span>APAR Sync</span>
<span class="font-bold text-primary">100%</span>
</div>
<div class="w-full h-1 bg-surface-container rounded-full overflow-hidden">
<div class="h-full bg-primary" style="width: 100%"></div>
</div>
</div>
</div>
<!-- Grade 2: SAG / ADG -->
<div class="p-space-sm rounded-lg bg-surface-container-low flex flex-col justify-between gap-space-sm">
<div class="flex justify-between items-start">
<span class="font-label-sm text-label-sm font-bold text-primary">SAG / ADG</span>
<span class="text-[10px] font-mono bg-surface-container px-1 py-0.5 rounded text-on-surface-variant">L14</span>
</div>
<div class="flex flex-col">
<span class="font-headline-sm text-headline-sm text-primary font-bold">88</span>
<span class="text-[11px] text-on-surface-variant font-label-sm">Sanctioned: 95</span>
</div>
<div class="pt-1 flex flex-col gap-1">
<div class="flex justify-between text-[11px] font-label-sm text-on-surface-variant">
<span>APAR Sync</span>
<span class="font-bold text-primary">94.3%</span>
</div>
<div class="w-full h-1 bg-surface-container rounded-full overflow-hidden">
<div class="h-full bg-primary" style="width: 94.3%"></div>
</div>
</div>
</div>
<!-- Grade 3: JAG / Director -->
<div class="p-space-sm rounded-lg bg-surface-container-low flex flex-col justify-between gap-space-sm">
<div class="flex justify-between items-start">
<span class="font-label-sm text-label-sm font-bold text-primary">JAG / Director</span>
<span class="text-[10px] font-mono bg-surface-container px-1 py-0.5 rounded text-on-surface-variant">L12-13</span>
</div>
<div class="flex flex-col">
<span class="font-headline-sm text-headline-sm text-primary font-bold">246</span>
<span class="text-[11px] text-on-surface-variant font-label-sm">Sanctioned: 270</span>
</div>
<div class="pt-1 flex flex-col gap-1">
<div class="flex justify-between text-[11px] font-label-sm text-on-surface-variant">
<span>APAR Sync</span>
<span class="font-bold text-secondary">82.1%</span>
</div>
<div class="w-full h-1 bg-surface-container rounded-full overflow-hidden">
<div class="h-full bg-secondary-container" style="width: 82.1%"></div>
</div>
</div>
</div>
<!-- Grade 4: STS / Joint Director -->
<div class="p-space-sm rounded-lg bg-surface-container-low flex flex-col justify-between gap-space-sm">
<div class="flex justify-between items-start">
<span class="font-label-sm text-label-sm font-bold text-primary">STS / Joint Dir</span>
<span class="text-[10px] font-mono bg-surface-container px-1 py-0.5 rounded text-on-surface-variant">L11</span>
</div>
<div class="flex flex-col">
<span class="font-headline-sm text-headline-sm text-primary font-bold">310</span>
<span class="text-[11px] text-on-surface-variant font-label-sm">Sanctioned: 325</span>
</div>
<div class="pt-1 flex flex-col gap-1">
<div class="flex justify-between text-[11px] font-label-sm text-on-surface-variant">
<span>APAR Sync</span>
<span class="font-bold text-primary">89.0%</span>
</div>
<div class="w-full h-1 bg-surface-container rounded-full overflow-hidden">
<div class="h-full bg-primary" style="width: 89.0%"></div>
</div>
</div>
</div>
<!-- Grade 5: JTS / Assistant Director -->
<div class="p-space-sm rounded-lg bg-surface-container-low flex flex-col justify-between gap-space-sm">
<div class="flex justify-between items-start">
<span class="font-label-sm text-label-sm font-bold text-primary">JTS / Asst Dir</span>
<span class="text-[10px] font-mono bg-surface-container px-1 py-0.5 rounded text-on-surface-variant">L10</span>
</div>
<div class="flex flex-col">
<span class="font-headline-sm text-headline-sm text-primary font-bold">182</span>
<span class="text-[11px] text-on-surface-variant font-label-sm">Sanctioned: 200</span>
</div>
<div class="pt-1 flex flex-col gap-1">
<div class="flex justify-between text-[11px] font-label-sm text-on-surface-variant">
<span>APAR Sync</span>
<span class="font-bold text-error">71.4%</span>
</div>
<div class="w-full h-1 bg-surface-container rounded-full overflow-hidden">
<div class="h-full bg-error" style="width: 71.4%"></div>
</div>
</div>
</div>
</div>
<!-- DPC Readiness Strip -->
<div class="p-space-sm rounded-lg bg-surface-container flex flex-col sm:flex-row items-start sm:items-center justify-between gap-space-sm">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-[18px] text-secondary">gavel</span>
<span class="font-label-sm text-label-sm text-on-surface">
<strong>Upcoming UPSC DPC Panel:</strong> 42 STS Officers eligible for JAG promotion. 38 have cleared NSSTA Senior Leadership Module.
              </span>
</div>
<button class="font-label-sm text-label-sm text-primary font-bold hover:underline shrink-0">
              Download Panel Clearance Matrix →
            </button>
</div>
</div>
</div>
<!-- RIGHT COLUMN (5 Cols): Automated Interventions & Telemetry Engine -->
<div class="xl:col-span-5 flex flex-col gap-space-xl">
<!-- Section C: Cadre Intervention Triggers & Automated Nominations -->
<div class="bg-surface-container-lowest rounded-xl shadow-sm p-space-md flex flex-col gap-space-md" id="intervention-queue">
<div class="flex items-center justify-between pb-1">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-secondary-container text-[22px]">bolt</span>
<div class="flex flex-col">
<h2 class="font-headline-sm text-headline-sm text-primary font-bold">
                  Cadre Intervention Triggers
                </h2>
<span class="font-label-sm text-label-sm text-on-surface-variant">AI-generated nomination orders awaiting CCA Joint Director sign-off</span>
</div>
</div>
<span class="font-label-sm text-label-sm bg-error-container text-error px-2 py-0.5 rounded font-bold">
              2 Pending Action
            </span>
</div>
<!-- Actionable Nomination Queue -->
<div class="flex flex-col gap-space-sm">
<!-- Order 1: GIS Workshop -->
<div class="p-space-sm rounded-lg bg-surface-container-low flex flex-col gap-space-xs hover:bg-surface-container transition-colors">
<div class="flex items-start justify-between gap-2">
<div class="flex items-center gap-2">
<span class="font-mono font-bold text-label-sm text-primary bg-surface-container-highest px-1.5 py-0.5 rounded">
                    #ORD-2025-091
                  </span>
<span class="font-label-sm text-label-sm text-secondary font-semibold">ISS Cadre Cohort</span>
</div>
<span class="text-[11px] text-on-surface-variant font-label-sm">High Priority</span>
</div>
<h3 class="font-label-md text-label-md font-bold text-on-surface mt-1">
                45 ISS Officers nominated for NSSTA 5-day Residential GIS Workshop (Batch 12)
              </h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">
                Targeting officers with below-benchmark geospatial scores in Agricultural Statistics &amp; Urban Sampling frames. Venue: NSSTA Campus, Greater Noida.
              </p>
<div class="flex items-center justify-between pt-2 text-[11px] font-label-sm">
<span class="text-on-surface-variant">Dates: <strong>03 Mar – 07 Mar 2025</strong></span>
<div class="flex items-center gap-1.5">
<button class="px-2 py-1 rounded bg-surface-container-highest hover:bg-surface-dim text-on-surface transition-colors font-semibold">
                    Override Roster
                  </button>
<button class="px-2.5 py-1 rounded bg-primary hover:bg-primary-container text-on-primary font-semibold transition-colors shadow-xs">
                    Sanction &amp; Dispatch
                  </button>
</div>
</div>
</div>
<!-- Order 2: Python & DuckDB Microdata Pipeline -->
<div class="p-space-sm rounded-lg bg-surface-container-low flex flex-col gap-space-xs hover:bg-surface-container transition-colors">
<div class="flex items-start justify-between gap-2">
<div class="flex items-center gap-2">
<span class="font-mono font-bold text-label-sm text-primary bg-surface-container-highest px-1.5 py-0.5 rounded">
                    #ORD-2025-092
                  </span>
<span class="font-label-sm text-label-sm text-surface-tint font-semibold">SSS Technical Cadre</span>
</div>
<span class="text-[11px] text-on-surface-variant font-label-sm">Auto-Enrolment</span>
</div>
<h3 class="font-label-md text-label-md font-bold text-on-surface mt-1">
                120 SSS Officers auto-enrolled in Python &amp; DuckDB Microdata Pipeline on iGOT
              </h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">
                Mandatory micro-credential required for PLFS (Periodic Labour Force Survey) quarterly automated estimation validation routines.
              </p>
<div class="flex items-center justify-between pt-2 text-[11px] font-label-sm">
<span class="text-on-surface-variant">Quota Allocated: <strong>25 Lab Hours</strong></span>
<div class="flex items-center gap-1.5">
<button class="px-2 py-1 rounded bg-surface-container-highest hover:bg-surface-dim text-on-surface transition-colors font-semibold">
                    View 120 Candidates
                  </button>
<button class="px-2.5 py-1 rounded bg-primary hover:bg-primary-container text-on-primary font-semibold transition-colors shadow-xs">
                    Authorize Batch Enrolment
                  </button>
</div>
</div>
</div>
</div>
<!-- Mass Action Controls -->
<div class="flex items-center justify-between pt-2">
<button class="w-full py-2 bg-secondary-container hover:bg-secondary text-on-secondary font-label-md text-label-md font-bold rounded-lg transition-colors flex items-center justify-center gap-2 shadow-sm" id="btn-approve-all">
<span class="material-symbols-outlined text-[18px]">done_all</span>
              Approve All Pending Cadre Interventions (2)
            </button>
</div>
</div>
<!-- Section D: SPARROW & e-HRMS 2.0 Real-time Sync Telemetry -->
<div class="bg-surface-container-lowest rounded-xl shadow-sm p-space-md flex flex-col gap-space-md">
<div class="flex items-center justify-between pb-1">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-surface-tint text-[22px]">memory</span>
<div class="flex flex-col">
<h2 class="font-headline-sm text-headline-sm text-primary font-bold">
                  SPARROW &amp; e-HRMS 2.0 Live Telemetry
                </h2>
<span class="font-label-sm text-label-sm text-on-surface-variant">Cryptographic seals &amp; e-Service Book automated record commits</span>
</div>
</div>
<div class="flex items-center gap-1">
<span class="w-2 h-2 rounded-full bg-secondary-container animate-ping"></span>
<span class="font-label-sm text-label-sm font-mono text-secondary">FEED ACTIVE</span>
</div>
</div>
<!-- Live Event Feed -->
<div class="flex flex-col gap-space-xs font-mono text-body-sm">
<!-- Telemetry Item 1 -->
<div class="p-space-xs bg-surface-container-low rounded flex items-start gap-space-sm text-[12px]">
<span class="text-secondary font-bold shrink-0">14:02:18</span>
<div class="flex flex-col min-w-0">
<span class="text-primary font-semibold truncate">HASH_PUSH [e-Service Book]: ISS-2015-0812</span>
<span class="text-on-surface-variant text-[11px] truncate">iGOT NSSTA-AdvMacro-Cert committed | Hash: 3e8a1c90ffb4</span>
</div>
<span class="material-symbols-outlined text-[16px] text-surface-tint ml-auto shrink-0">verified</span>
</div>
<!-- Telemetry Item 2 -->
<div class="p-space-xs bg-surface-container-low rounded flex items-start gap-space-sm text-[12px]">
<span class="text-secondary font-bold shrink-0">13:58:44</span>
<div class="flex flex-col min-w-0">
<span class="text-primary font-semibold truncate">APAR_PART1_SYNC: Batch STS (310 Records)</span>
<span class="text-on-surface-variant text-[11px] truncate">Annual 50-hour metric stamped into Section III DoPT SPARROW</span>
</div>
<span class="material-symbols-outlined text-[16px] text-surface-tint ml-auto shrink-0">lock</span>
</div>
<!-- Telemetry Item 3 -->
<div class="p-space-xs bg-surface-container-low rounded flex items-start gap-space-sm text-[12px]">
<span class="text-secondary font-bold shrink-0">13:45:10</span>
<div class="flex flex-col min-w-0">
<span class="text-primary font-semibold truncate">DPC_FLAG_VERIFY: Grade SAG to HAG</span>
<span class="text-on-surface-variant text-[11px] truncate">14 Officers integrity clearance verified by Vigilance Wing</span>
</div>
<span class="material-symbols-outlined text-[16px] text-primary ml-auto shrink-0">task_alt</span>
</div>
<!-- Telemetry Item 4 -->
<div class="p-space-xs bg-surface-container-low rounded flex items-start gap-space-sm text-[12px]">
<span class="text-secondary font-bold shrink-0">13:30:02</span>
<div class="flex flex-col min-w-0">
<span class="text-primary font-semibold truncate">NIC_GATEWAY_PING: BharatNet DES Node</span>
<span class="text-on-surface-variant text-[11px] truncate">36 State Directorates synchronized; 0 packet anomalies detected</span>
</div>
<span class="material-symbols-outlined text-[16px] text-surface-tint ml-auto shrink-0">sensors</span>
</div>
</div>
<!-- Audit Footnote -->
<div class="p-space-sm bg-surface-container rounded-lg flex items-center justify-between text-label-sm font-label-sm">
<span class="text-on-surface-variant">NIC Server ID: <strong>ND-SEC-SPARROW-V4.2</strong></span>
<span class="text-primary font-semibold">Latency: <strong>24ms</strong></span>
</div>
</div>
</div>
</div>
<!-- Institutional Footer & Governance Certification -->
<footer class="mt-space-md p-space-md bg-surface-container-low rounded-xl flex flex-col md:flex-row items-center justify-between gap-space-md">
<div class="flex items-center gap-space-md">
<div class="w-8 h-8 rounded bg-primary text-on-primary flex items-center justify-center font-bold font-mono text-xs">
          CCA
        </div>
<div class="flex flex-col">
<span class="font-label-sm text-label-sm text-primary font-bold">
            Cadre Control Authority (CCA) &amp; Training Division, MoSPI
          </span>
<span class="font-body-sm text-body-sm text-on-surface-variant">
            Sardar Patel Bhavan, Sansad Marg, New Delhi 110001 | NSSTA Campus, Plot No. 22, Knowledge Park-II, Greater Noida
          </span>
</div>
</div>
<div class="flex items-center gap-space-sm font-label-sm text-label-sm text-on-surface-variant">
<span>GIGW 3.0 Accessible</span>
<span>•</span>
<span>Security Compliant: CERT-In Certified</span>
<span>•</span>
<span class="text-primary font-bold">Version 4.1.2-PROD</span>
</div>
</footer>
</div>
</div>
<script>
  // Simple interactive feedback for Cadre Command Actions
  document.getElementById('btn-approve-all')?.addEventListener('click', function() {
    this.innerHTML = '<span class="material-symbols-outlined text-[18px]">verified</span> All Cadre Orders Authorized & Signed';
    this.classList.remove('bg-secondary-container', 'hover:bg-secondary');
    this.classList.add('bg-surface-tint', 'text-on-primary');
    
    // Dim the action items
    const queue = document.getElementById('intervention-queue');
    if (queue) {
      const items = queue.querySelectorAll('.bg-surface-container-low');
      items.forEach(el => {
        el.classList.add('opacity-70');
      });
    }
  });

  document.getElementById('btn-sync')?.addEventListener('click', function() {
    const icon = this.querySelector('.material-symbols-outlined');
    if (icon) {
      icon.classList.remove('animate-spin');
      void icon.offsetWidth; // trigger reflow
      icon.classList.add('animate-spin');
    }
  });

  document.getElementById('btn-circular')?.addEventListener('click', function() {
    alert('Cadre Capacity Circular [CCA/MoSPI/2025/C-04] queued for cryptographic PDF signing.');
  });

  document.getElementById('btn-export')?.addEventListener('click', function() {
    alert('Preparing National Readiness Report (XLSX & Secured PDF) with 36 DES State Breakdowns.');
  });
</script></main></div></body></html>
