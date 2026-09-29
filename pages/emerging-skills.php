<?php
require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../includes/db.php';
requireLogin();

$user = getCurrentUser();
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

<html lang="en"><head><meta charset="utf-8"/><meta content="width=device-width, initial-scale=1.0" name="viewport"/><meta content="web_dashboard" name="shell-type"/><title>Gap2Grow - MoSPI / NSSTA Emerging Skill Forecast</title><link href="https://fonts.googleapis.com" rel="preconnect"/><link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/><link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;600;700&amp;display=swap" rel="stylesheet"/><link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/><style>@layer base{html,body{margin:0;padding:0;}body{overscroll-behavior:none;}main>:first-child{margin-top:0!important;}main>:last-child{margin-bottom:0!important;}}::-webkit-scrollbar{display:none;}</style><script src="https://cdn.tailwindcss.com"></script><script id="tailwind-config">tailwind.config = { darkMode: "class", theme: { extend: { "colors": { "on-tertiary": "#ffffff", "inverse-surface": "#233144", "outline-variant": "#c4c6cf", "tertiary-fixed": "#dce1ff", "on-secondary-container": "#531800", "surface-dim": "#ccdbf4", "on-background": "#0d1c2f", "inverse-on-surface": "#ebf1ff", "on-tertiary-fixed-variant": "#264191", "on-primary": "#ffffff", "surface-container": "#e6eeff", "on-tertiary-container": "#7088dc", "surface-container-low": "#eff4ff", "surface-container-high": "#dde9ff", "on-surface": "#0d1c2f", "secondary-fixed-dim": "#ffb59a", "outline": "#74777f", "surface-container-lowest": "#ffffff", "secondary": "#a83900", "secondary-fixed": "#ffdbcf", "tertiary-container": "#001e63", "primary": "#001026", "on-primary-fixed": "#001c3b", "surface-variant": "#d5e3fd", "on-secondary": "#ffffff", "error-container": "#ffdad6", "primary-fixed": "#d5e3ff", "on-primary-fixed-variant": "#314769", "secondary-container": "#fc6018", "surface": "#f8f9ff", "tertiary": "#000c34", "tertiary-fixed-dim": "#b6c4ff", "error": "#ba1a1a", "primary-container": "#0b2545", "background": "#f8f9ff", "surface-tint": "#495f82", "on-error": "#ffffff", "surface-bright": "#f8f9ff", "on-error-container": "#93000a", "on-secondary-fixed-variant": "#802a00", "on-secondary-fixed": "#380d00", "on-surface-variant": "#44474e", "surface-container-highest": "#d5e3fd", "primary-fixed-dim": "#b1c7f0", "inverse-primary": "#b1c7f0", "on-primary-container": "#778db2", "on-tertiary-fixed": "#00164e" }, "borderRadius": { "DEFAULT": "0.125rem", "lg": "0.25rem", "xl": "0.5rem", "full": "0.75rem" }, "spacing": { "gutter": "1.5rem", "margin": "2rem", "space-xl": "2.5rem", "space-lg": "1.5rem", "gutter-mobile": "0.75rem", "margin-mobile": "1rem", "space-xs": "0.25rem", "space-md": "1rem", "space-sm": "0.5rem" }, "fontFamily": { "headline-xl-mobile": ["Public Sans"], "label-lg": ["Public Sans"], "body-lg": ["Public Sans"], "label-md": ["Public Sans"], "headline-lg": ["Public Sans"], "headline-lg-mobile": ["Public Sans"], "headline-md": ["Public Sans"], "headline-xl": ["Public Sans"], "body-sm": ["Public Sans"], "body-md": ["Public Sans"], "label-sm": ["Public Sans"], "headline-sm": ["Public Sans"] }, "fontSize": { "headline-xl-mobile": ["28px", { "lineHeight": "36px", "letterSpacing": "-0.01em", "fontWeight": "700" }], "label-lg": ["14px", { "lineHeight": "20px", "letterSpacing": "0.01em", "fontWeight": "600" }], "body-lg": ["16px", { "lineHeight": "24px", "fontWeight": "400" }], "label-md": ["12px", { "lineHeight": "16px", "letterSpacing": "0.02em", "fontWeight": "600" }], "headline-lg": ["28px", { "lineHeight": "36px", "letterSpacing": "-0.01em", "fontWeight": "700" }], "headline-lg-mobile": ["22px", { "lineHeight": "30px", "letterSpacing": "0em", "fontWeight": "700" }], "headline-md": ["22px", { "lineHeight": "28px", "fontWeight": "600" }], "headline-xl": ["36px", { "lineHeight": "44px", "letterSpacing": "-0.02em", "fontWeight": "700" }], "body-sm": ["12px", { "lineHeight": "18px", "fontWeight": "400" }], "body-md": ["14px", { "lineHeight": "20px", "fontWeight": "400" }], "label-sm": ["11px", { "lineHeight": "14px", "letterSpacing": "0.03em", "fontWeight": "600" }], "headline-sm": ["18px", { "lineHeight": "24px", "fontWeight": "600" }] } } } }</script></head><body class="bg-surface font-body-md text-body-md text-on-surface antialiased"><aside class="fixed left-0 top-0 h-screen w-72 bg-primary-container z-50 flex flex-col justify-between overflow-y-auto shadow-[0_1px_8px_rgba(0,0,0,0.04)]"><div class="flex flex-col"><div class="p-space-md bg-primary flex items-center gap-space-sm"><div class="w-9 h-9 rounded-lg bg-surface-container-lowest/10 flex items-center justify-center"><span class="material-symbols-outlined text-secondary-container text-[22px]">account_balance</span></div><div class="flex flex-col"><span class="font-label-md text-label-md text-on-primary tracking-tight uppercase">Gap2Grow | MoSPI</span><span class="font-label-sm text-label-sm text-on-primary-container">NSSTA Academy Portal</span></div></div><div class="m-space-md p-space-sm rounded-lg bg-primary/40"><div class="flex items-center gap-space-sm mb-space-xs"><div class="w-8 h-8 rounded-full bg-secondary-container flex items-center justify-center font-label-md text-label-md text-on-secondary"><?= $initials ?></div><div class="flex flex-col min-w-0 flex-1"><span class="font-label-md text-label-md text-on-primary truncate"><?= $userName ?></span><span class="font-label-sm text-label-sm text-on-primary-container truncate"><?= $userDesignation ?></span></div></div><div class="flex items-center justify-between pt-space-xs"><span class="font-label-sm text-label-sm text-on-primary-container">ID: <?= $userEmpId ?></span><span class="font-label-sm text-label-sm text-secondary-container bg-secondary-container/10 px-1.5 py-0.5 rounded">Verified</span></div></div><nav class="flex flex-col px-space-sm gap-1" data-active-classes="bg-surface-container-highest text-on-surface font-label-md"><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-primary-container hover:bg-surface-container-highest hover:text-on-surface transition-colors" data-path="learner-dashboard" href="/SIH/pages/dashboard.php"><span class="material-symbols-outlined text-[20px]">space_dashboard</span><span class="font-label-md text-label-md">Learner Dashboard</span></a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-primary-container hover:bg-surface-container-highest hover:text-on-surface transition-colors" data-path="skill-gap-analysis" href="/SIH/pages/skill-gap.php"><span class="material-symbols-outlined text-[20px]">analytics</span><span class="font-label-md text-label-md">Skill-Gap Analysis</span></a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-primary-container hover:bg-surface-container-highest hover:text-on-surface transition-colors" data-path="my-learning-path" href="/SIH/pages/learning-path.php"><span class="material-symbols-outlined text-[20px]">route</span><span class="font-label-md text-label-md">My Learning Path</span></a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-primary-container hover:bg-surface-container-highest hover:text-on-surface transition-colors" data-path="competency-profile" href="/SIH/pages/competency-profile.php"><span class="material-symbols-outlined text-[20px]">badge</span><span class="font-label-md text-label-md">Competency Profile</span></a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-primary-container hover:bg-surface-container-highest hover:text-on-surface transition-colors" data-path="ai-assessment-generator" href="/SIH/pages/assessment-generator.php"><span class="material-symbols-outlined text-[20px]">psychology</span><span class="font-label-md text-label-md">AI Assessment Generator</span></a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-primary-container hover:bg-surface-container-highest hover:text-on-surface transition-colors" data-path="igot-course-catalog" href="/SIH/pages/igot-courses.php"><span class="material-symbols-outlined text-[20px]">local_library</span><span class="font-label-md text-label-md">iGOT Course Catalog</span></a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-primary-container hover:bg-surface-container-highest hover:text-on-surface transition-colors" data-path="nssta-tpac-nominations" href="/SIH/pages/nssta-programmes.php"><span class="material-symbols-outlined text-[20px]">assignment_turned_in</span><span class="font-label-md text-label-md">NSSTA TPAC Nominations</span></a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-primary-container hover:bg-surface-container-highest hover:text-on-surface transition-colors" data-path="certifications" href="/SIH/pages/certifications.php"><span class="material-symbols-outlined text-[20px]">workspace_premium</span><span class="font-label-md text-label-md">My Certifications</span></a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-primary-container hover:bg-surface-container-highest hover:text-on-surface transition-colors" data-path="cadre-analytics" href="/SIH/pages/cadre-analytics.php"><span class="material-symbols-outlined text-[20px]">insights</span><span class="font-label-md text-label-md">Cadre Analytics</span></a><a aria-current="page" class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg transition-colors bg-surface-container-highest text-on-surface font-label-md" data-path="emerging-skill-forecast" href="/SIH/pages/emerging-skills.php"><span class="material-symbols-outlined text-[20px]">trending_up</span><span class="font-label-md text-label-md">Emerging Skill Forecast</span></a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-primary-container hover:bg-surface-container-highest hover:text-on-surface transition-colors" data-path="ai-cadre-copilot" href="/SIH/pages/ai-assistant.php"><span class="material-symbols-outlined text-[20px]">smart_toy</span><span class="font-label-md text-label-md">AI Cadre Copilot</span></a><?php if (hasRole('admin')): ?><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-primary-container hover:bg-surface-container-highest hover:text-on-surface transition-colors" data-path="admin-workforce-hub" href="/SIH/pages/admin-dashboard.php"><span class="material-symbols-outlined text-[20px]">lan</span><span class="font-label-md text-label-md">Admin Workforce Hub</span></a><?php endif; ?><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-primary-container hover:bg-surface-container-highest hover:text-on-surface transition-colors" data-path="settings-and-profile" href="/SIH/pages/settings.php"><span class="material-symbols-outlined text-[20px]">settings</span><span class="font-label-md text-label-md">Settings &amp; Profile</span></a></nav></div><div class="p-space-md flex flex-col gap-space-sm bg-primary/30"><div class="flex flex-col gap-1"><span class="font-label-sm text-label-sm uppercase tracking-wider text-on-primary-container">Integration Node Telemetry</span><div class="flex flex-wrap gap-1"><span class="inline-flex items-center gap-1 font-label-sm text-label-sm px-2 py-0.5 rounded-full bg-surface-container-lowest/10 text-on-primary"><span class="w-1.5 h-1.5 rounded-full bg-secondary-container"></span>iGOT v2.4 Live</span><span class="inline-flex items-center gap-1 font-label-sm text-label-sm px-2 py-0.5 rounded-full bg-surface-container-lowest/10 text-on-primary"><span class="w-1.5 h-1.5 rounded-full bg-surface-tint"></span>SPARROW Active</span><span class="inline-flex items-center gap-1 font-label-sm text-label-sm px-2 py-0.5 rounded-full bg-surface-container-lowest/10 text-on-primary">GIGW 3.0</span><span class="inline-flex items-center gap-1 font-label-sm text-label-sm px-2 py-0.5 rounded-full bg-surface-container-lowest/10 text-on-primary">NSSTA-ISS Node</span></div></div><a class="flex items-center justify-between px-space-sm py-2 rounded-lg bg-surface-container-lowest/5 text-on-primary-container hover:bg-surface-container-highest hover:text-on-surface transition-colors" data-path="login" href="/SIH/logout.php"><span class="font-label-md text-label-md">Sign Out</span><span class="material-symbols-outlined text-[18px]">logout</span></a></div></aside><div class="pl-72"><header class="fixed top-0 left-72 right-0 h-16 bg-surface-container-lowest/95 backdrop-blur-xl shadow-[0_1px_8px_rgba(0,0,0,0.04)] z-40 flex items-center justify-between px-margin"><div class="flex items-center gap-space-md"><div class="flex flex-col"><div class="flex items-center gap-space-sm"><span class="font-label-sm text-label-sm text-primary font-bold tracking-tight uppercase">भारत सरकार | MoSPI</span><span class="w-1 h-1 rounded-full bg-outline-variant"></span><span class="font-label-sm text-label-sm text-on-surface-variant">Statistical Cadre Intelligence &amp; Administrative Cell</span></div><div class="flex items-center gap-space-xs mt-0.5"><span class="inline-flex items-center gap-1 font-label-sm text-label-sm px-2 py-0.5 rounded bg-surface-container text-on-surface font-semibold"><span class="material-symbols-outlined text-[14px] text-secondary">verified_user</span>NAD / Cadre Control Authority</span><span class="inline-flex items-center gap-1 font-label-sm text-label-sm px-2 py-0.5 rounded bg-surface-container text-on-surface-variant"><span class="material-symbols-outlined text-[14px]">lock</span>e-HRMS Cryptographic Seal: ISS-V4</span></div></div></div><div class="flex items-center gap-space-md"><div class="flex items-center gap-space-xs bg-surface-container-low px-space-sm py-1 rounded-lg"><span class="font-label-sm text-label-sm text-on-surface-variant font-medium">Role:</span><span class="font-label-sm text-label-sm text-on-surface font-semibold"><?= htmlspecialchars($user['role'] === 'admin' ? 'NSSTA Director / Admin' : ($user['designation'] ?? 'Cadre Officer')) ?></span></div><div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center font-label-sm text-on-primary font-bold"><?= $initials ?></div></div></header><main class="w-full pt-16 bg-surface"><div class="flex flex-col w-full">
<div class="w-full px-margin py-space-md flex flex-col gap-space-xl">
<!-- Executive Sovereign Context & Telemetry Bar -->
<section class="relative overflow-hidden rounded-xl bg-primary-container text-on-primary p-space-lg shadow-md">
<div class="absolute -right-16 -top-16 w-96 h-96 rounded-full bg-secondary-container/10 blur-3xl pointer-events-none"></div>
<div class="absolute left-1/3 -bottom-20 w-80 h-80 rounded-full bg-tertiary-fixed-dim/5 blur-2xl pointer-events-none"></div>
<div class="relative z-10 flex flex-col gap-space-md">
<!-- Breadcrumb & Classification Pill -->
<div class="flex flex-wrap items-center justify-between gap-space-sm">
<div class="flex items-center gap-space-xs text-on-primary-container">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary-fixed">Strategic Intelligence Vector</span>
<span>/</span>
<span class="font-label-sm text-label-sm text-primary-fixed">MoSPI Policy Planning Cell</span>
<span>/</span>
<span class="font-label-sm text-label-sm">NSSTA Academic Council</span>
</div>
<div class="flex items-center gap-2">
<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-surface-container-lowest/10 text-primary-fixed text-label-sm font-label-sm">
<span class="w-2 h-2 rounded-full bg-secondary-container animate-pulse"></span>
              Simulation Cycle: Q1-2025 Refined
            </span>
<span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-tertiary text-tertiary-fixed text-label-sm font-label-sm">
<span class="material-symbols-outlined text-[14px]">shield</span>
              Official Sovereign Projection
            </span>
</div>
</div>
<!-- Title & Subtitle Grid -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-space-md items-end">
<div class="lg:col-span-8 flex flex-col gap-space-xs">
<h1 class="font-headline-xl text-headline-xl text-on-primary tracking-tight">
              Emerging Skill Forecast &amp; Future-Ready Cadre Planning (2025–2030)
            </h1>
<p class="font-body-lg text-body-lg text-on-primary-container max-w-4xl">
              AI-driven forecasting engine predicting macroeconomic and technological shifts in official statistics, aligning national training curricula with international UN-SDMX and UN-CEPAD standards.
            </p>
</div>
<!-- Quick Action / Download Dispatch -->
<div class="lg:col-span-4 flex flex-wrap lg:justify-end gap-space-xs">
<button onclick="alert('Advisory memorandum dispatched to NITI Aayog Statistical Working Group (Ref: NITI/STAT/2025/M-82).')" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-lg bg-secondary text-on-secondary font-label-md text-label-md shadow-sm hover:bg-secondary-container transition-colors">
<span class="material-symbols-outlined text-[18px]">publish</span>
              Submit to NITI Aayog Advisory
            </button>
<button onclick="window.print()" class="inline-flex items-center gap-2 px-3 py-2.5 rounded-lg bg-surface-container-lowest/10 text-on-primary font-label-md text-label-md hover:bg-surface-container-lowest/20 transition-colors">
<span class="material-symbols-outlined text-[18px]">file_download</span>
              Cadre Brief (PDF)
            </button>
</div>
</div>
<!-- Telemetry Chips Strip -->
<div class="flex flex-wrap items-center gap-space-sm pt-space-xs">
<div class="flex items-center gap-2 px-3 py-1.5 rounded-lg bg-surface-container-lowest/5 text-surface-variant">
<span class="material-symbols-outlined text-secondary-fixed text-[18px]">timelapse</span>
<span class="font-label-sm text-label-sm">Horizon Scan: <strong class="text-on-primary font-semibold">5-Year Horizon</strong></span>
</div>
<div class="flex items-center gap-2 px-3 py-1.5 rounded-lg bg-surface-container-lowest/5 text-surface-variant">
<span class="material-symbols-outlined text-primary-fixed text-[18px]">neurology</span>
<span class="font-label-sm text-label-sm">Predictive Model: <strong class="text-on-primary font-semibold">MoSPI-Forecaster v3.1</strong></span>
</div>
<div class="flex items-center gap-2 px-3 py-1.5 rounded-lg bg-surface-container-lowest/5 text-surface-variant">
<span class="material-symbols-outlined text-tertiary-fixed text-[18px]">event_repeat</span>
<span class="font-label-sm text-label-sm">Next Cadre Review: <strong class="text-on-primary font-semibold">2026 DPC</strong></span>
</div>
<div class="flex items-center gap-2 px-3 py-1.5 rounded-lg bg-surface-container-lowest/5 text-surface-variant">
<span class="material-symbols-outlined text-secondary-container text-[18px]">verified</span>
<span class="font-label-sm text-label-sm">Sample Scope: <strong class="text-on-primary font-semibold">4,180 ISS &amp; SSS Officers</strong></span>
</div>
</div>
</div>
</section>
<!-- Visual Anchor: Predictive Velocity & Key Macro Signals -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-space-md">
<div class="rounded-xl bg-surface-container-lowest p-space-md shadow-sm flex items-center justify-between">
<div class="flex flex-col">
<span class="font-label-sm text-label-sm uppercase text-on-surface-variant tracking-wider">Projected Automation Displacement</span>
<span class="font-headline-lg text-headline-lg text-secondary mt-1">42.8%</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Routine survey aggregation tasks by 2027</span>
</div>
<div class="w-16 h-16 flex items-center justify-center rounded-xl bg-secondary-fixed/30 text-secondary">
<span class="material-symbols-outlined text-[32px]">trending_down</span>
</div>
</div>
<div class="rounded-xl bg-surface-container-lowest p-space-md shadow-sm flex items-center justify-between">
<div class="flex flex-col">
<span class="font-label-sm text-label-sm uppercase text-on-surface-variant tracking-wider">High-Frequency Data Cadre Deficit</span>
<span class="font-headline-lg text-headline-lg text-primary mt-1">1,240</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Required certified practitioners in NAD &amp; ESD</span>
</div>
<div class="w-16 h-16 flex items-center justify-center rounded-xl bg-surface-container-high text-primary">
<span class="material-symbols-outlined text-[32px]">person_alert</span>
</div>
</div>
<div class="rounded-xl bg-surface-container-lowest p-space-md shadow-sm flex items-center justify-between">
<div class="flex flex-col">
<span class="font-label-sm text-label-sm uppercase text-on-surface-variant tracking-wider">iGOT Karmayogi Readiness Index</span>
<span class="font-headline-lg text-headline-lg text-primary-container mt-1">68.4 / 100</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">+14.2 pts after FY24-25 NSSTA TPAC cycles</span>
</div>
<div class="w-16 h-16 flex items-center justify-center rounded-xl bg-primary-fixed/40 text-primary-container">
<span class="material-symbols-outlined text-[32px]">speed</span>
</div>
</div>
</div>
<!-- Section 2: Predictive Horizon Pillars (3 Horizons) -->
<section class="flex flex-col gap-space-md">
<div class="flex flex-wrap items-baseline justify-between gap-2">
<div class="flex items-center gap-space-xs">
<span class="w-2.5 h-6 bg-secondary rounded-full"></span>
<h2 class="font-headline-md text-headline-md text-primary">Predictive Capability Horizons (2025–2030)</h2>
</div>
<span class="font-label-md text-label-md text-on-surface-variant">Validated against National Statistical Commission (NSC) 2030 Roadmap</span>
</div>
<div class="grid grid-cols-1 lg:grid-cols-3 gap-space-md">
<!-- Horizon 1 -->
<div class="rounded-xl bg-surface-container-lowest p-space-lg shadow-sm flex flex-col justify-between relative overflow-hidden group hover:shadow-md transition-shadow">
<div class="absolute top-0 left-0 right-0 h-1.5 bg-secondary-container"></div>
<div>
<div class="flex items-center justify-between gap-space-xs mb-space-sm">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full bg-secondary-fixed text-on-secondary-container font-label-sm text-label-sm">
                Horizon 1 • Immediate
              </span>
<span class="font-label-sm text-label-sm text-on-surface-variant font-semibold">2025–2026</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-primary mb-space-xs">
              Administrative Data &amp; High-Frequency Nowcasting
            </h3>
<p class="font-body-md text-body-md text-on-surface-variant mb-space-md">
              Transition from retrospective annual surveys to daily GSTN, FASTag, and UPI high-frequency microdata streams to power real-time GDP flash indicators.
            </p>
<!-- Surge Metric Display -->
<div class="p-space-sm rounded-lg bg-surface-container-low mb-space-md flex items-center justify-between">
<div>
<span class="font-label-sm text-label-sm text-on-surface-variant block uppercase">Skill Demand Surge</span>
<span class="font-headline-md text-headline-md text-secondary font-bold">+185%</span>
</div>
<!-- Sparkline Indicator -->
<svg class="w-24 h-10 text-secondary" fill="none" stroke="currentColor" stroke-width="2.5" viewbox="0 0 100 40">
<path d="M0 32 Q 25 28 50 18 T 100 6"></path>
<circle class="fill-secondary" cx="100" cy="6" r="3.5"></circle>
</svg>
</div>
<!-- Target Capabilities -->
<div class="flex flex-col gap-1.5 mb-space-md">
<span class="font-label-sm text-label-sm uppercase tracking-wide text-on-surface-variant">Core Methodological Drivers</span>
<div class="flex flex-wrap gap-1.5">
<span class="px-2 py-0.5 rounded bg-surface-container text-on-surface font-label-sm text-label-sm">High-Volume GSTN Ingestion</span>
<span class="px-2 py-0.5 rounded bg-surface-container text-on-surface font-label-sm text-label-sm">Mixed-Frequency Dynamic Factor Models</span>
<span class="px-2 py-0.5 rounded bg-surface-container text-on-surface font-label-sm text-label-sm">API Data Pipelines</span>
</div>
</div>
</div>
<div class="pt-space-sm">
<div class="p-space-sm rounded-lg bg-secondary-fixed/20 flex flex-col gap-1 mb-space-sm">
<span class="font-label-sm text-label-sm font-semibold text-secondary">Recommended Strategic Action:</span>
<p class="font-body-sm text-body-sm text-on-surface">Mandatory 40-hr micro-credential rollout on iGOT Karmayogi for all National Accounts Division (NAD) officers before Q3 2025.</p>
</div>
<a href="/SIH/pages/learning-path.php" class="w-full py-2 rounded-lg bg-primary text-on-primary font-label-md text-label-md hover:bg-primary-container transition-colors flex items-center justify-center gap-1.5">
<span>View Horizon 1 Roadmap</span>
<span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</a>
</div>
</div>
<!-- Horizon 2 -->
<div class="rounded-xl bg-surface-container-lowest p-space-lg shadow-sm flex flex-col justify-between relative overflow-hidden group hover:shadow-md transition-shadow">
<div class="absolute top-0 left-0 right-0 h-1.5 bg-surface-tint"></div>
<div>
<div class="flex items-center justify-between gap-space-xs mb-space-sm">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full bg-primary-fixed text-on-primary-fixed-variant font-label-sm text-label-sm">
                Horizon 2 • Medium-Term
              </span>
<span class="font-label-sm text-label-sm text-on-surface-variant font-semibold">2026–2028</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-primary mb-space-xs">
              AI-Assisted Satellite Remote Sensing &amp; Agricultural Yield
            </h3>
<p class="font-body-md text-body-md text-on-surface-variant mb-space-md">
              Integration of ISRO EOS-08 hyperspectral imagery into district-level crop acreage and yield estimation models, transforming the General Crop Estimation Survey (GCES).
            </p>
<!-- Surge Metric Display -->
<div class="p-space-sm rounded-lg bg-surface-container-low mb-space-md flex items-center justify-between">
<div>
<span class="font-label-sm text-label-sm text-on-surface-variant block uppercase">Skill Demand Surge</span>
<span class="font-headline-md text-headline-md text-primary-container font-bold">+240%</span>
</div>
<svg class="w-24 h-10 text-surface-tint" fill="none" stroke="currentColor" stroke-width="2.5" viewbox="0 0 100 40">
<path d="M0 35 Q 30 30 60 14 T 100 4"></path>
<circle class="fill-surface-tint" cx="100" cy="4" r="3.5"></circle>
</svg>
</div>
<!-- Target Capabilities -->
<div class="flex flex-col gap-1.5 mb-space-md">
<span class="font-label-sm text-label-sm uppercase tracking-wide text-on-surface-variant">Core Methodological Drivers</span>
<div class="flex flex-wrap gap-1.5">
<span class="px-2 py-0.5 rounded bg-surface-container text-on-surface font-label-sm text-label-sm">ISRO Bhuvan Geo-Tiling</span>
<span class="px-2 py-0.5 rounded bg-surface-container text-on-surface font-label-sm text-label-sm">CNN Computer Vision for Agronomy</span>
<span class="px-2 py-0.5 rounded bg-surface-container text-on-surface font-label-sm text-label-sm">Multispectral Calibration</span>
</div>
</div>
</div>
<div class="pt-space-sm">
<div class="p-space-sm rounded-lg bg-surface-container-high flex flex-col gap-1 mb-space-sm">
<span class="font-label-sm text-label-sm font-semibold text-primary">Recommended Strategic Action:</span>
<p class="font-body-sm text-body-sm text-on-surface">Establish NSSTA Greater Noida residential lab specialization in geospatial statistics in collaboration with NRSC Hyderabad.</p>
</div>
<a href="/SIH/pages/nssta-programmes.php" class="w-full py-2 rounded-lg bg-primary text-on-primary font-label-md text-label-md hover:bg-primary-container transition-colors flex items-center justify-center gap-1.5">
<span>View Horizon 2 Roadmap</span>
<span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</a>
</div>
</div>
<!-- Horizon 3 -->
<div class="rounded-xl bg-surface-container-lowest p-space-lg shadow-sm flex flex-col justify-between relative overflow-hidden group hover:shadow-md transition-shadow">
<div class="absolute top-0 left-0 right-0 h-1.5 bg-primary"></div>
<div>
<div class="flex items-center justify-between gap-space-xs mb-space-sm">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full bg-tertiary-fixed text-on-tertiary-fixed-variant font-label-sm text-label-sm">
                Horizon 3 • Transformative
              </span>
<span class="font-label-sm text-label-sm text-on-surface-variant font-semibold">2028–2030</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-primary mb-space-xs">
              Federated Statistical Computing &amp; PETs
            </h3>
<p class="font-body-md text-body-md text-on-surface-variant mb-space-md">
              Differential privacy, secure multiparty computation, and zero-knowledge proofs allowing multi-ministry enterprise data linkage without centralizing raw microdata records.
            </p>
<!-- Surge Metric Display -->
<div class="p-space-sm rounded-lg bg-surface-container-low mb-space-md flex items-center justify-between">
<div>
<span class="font-label-sm text-label-sm text-on-surface-variant block uppercase">Skill Demand Surge</span>
<span class="font-headline-md text-headline-md text-primary font-bold">+310%</span>
</div>
<svg class="w-24 h-10 text-primary" fill="none" stroke="currentColor" stroke-width="2.5" viewbox="0 0 100 40">
<path d="M0 38 Q 35 36 65 18 T 100 2"></path>
<circle class="fill-primary" cx="100" cy="2" r="3.5"></circle>
</svg>
</div>
<!-- Target Capabilities -->
<div class="flex flex-col gap-1.5 mb-space-md">
<span class="font-label-sm text-label-sm uppercase tracking-wide text-on-surface-variant">Core Methodological Drivers</span>
<div class="flex flex-wrap gap-1.5">
<span class="px-2 py-0.5 rounded bg-surface-container text-on-surface font-label-sm text-label-sm">Privacy-Preserving Computation (PET)</span>
<span class="px-2 py-0.5 rounded bg-surface-container text-on-surface font-label-sm text-label-sm">DP-Epsilon Budget Tuning</span>
<span class="px-2 py-0.5 rounded bg-surface-container text-on-surface font-label-sm text-label-sm">Homomorphic Encryption</span>
</div>
</div>
</div>
<div class="pt-space-sm">
<div class="p-space-sm rounded-lg bg-tertiary-fixed/30 flex flex-col gap-1 mb-space-sm">
<span class="font-label-sm text-label-sm font-semibold text-primary">Recommended Strategic Action:</span>
<p class="font-body-sm text-body-sm text-on-surface">Sponsored joint research fellowship program with IIT Delhi &amp; ISI Kolkata for select ISS Deputy Directors.</p>
</div>
<a href="/SIH/pages/learning-path.php" class="w-full py-2 rounded-lg bg-primary text-on-primary font-label-md text-label-md hover:bg-primary-container transition-colors flex items-center justify-center gap-1.5">
<span>View Horizon 3 Roadmap</span>
<span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</a>
</div>
</div>
</div>
</section>
<!-- Visual Divider & Cadre Transition Story -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-space-md items-center bg-surface-container-low p-space-md rounded-xl">
<div class="lg:col-span-4 h-48 rounded-lg overflow-hidden relative">
<div class="bg-cover bg-center w-full h-full" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDx9Bch4TbO1qieLNdhfrDZFseiWHHqejW0aBRPGnNX0ar9ieoafSIoN3t0GUSfqvk7MDoAeCJ-v5Ka7FPd2s9nKbB7tYe00Aq40a9IaSoGY-e84OqUkovPxg30pE7F5_J2xbvd8pTK-q9eGdyw35ro7QiyzE9aX39KV4zoiRfF9V7ZGXNDn6mmEo2E469_AU_zbeTCD3Rvid6rEw6kGV5LK-9VbPV0mqi0vJfBBALUhfO7z-yR6BmJ')"></div>
<div class="absolute inset-0 bg-primary/30 mix-blend-multiply"></div>
<span class="absolute bottom-2 left-2 px-2 py-0.5 rounded bg-primary-container/90 text-on-primary font-label-sm text-label-sm">NSSTA Greater Noida Cohort 2025</span>
</div>
<div class="lg:col-span-8 flex flex-col justify-center gap-space-xs">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary font-bold">Cadre Transition Imperative</span>
<h3 class="font-headline-sm text-headline-sm text-primary">Overcoming Methodological Inertia in Official Statistics</h3>
<p class="font-body-md text-body-md text-on-surface-variant">
          Under the National Policy on Official Statistics (NPOS 2025), manual aggregation and legacy tabulation scripts are designated for sunset within 24 months. The Cadre Planning Hub orchestrates synchronous upskilling across NSSO Field Operations, National Accounts, and State DES departments to preserve macroeconomic sovereignty.
        </p>
</div>
</div>
<!-- Section 3: Strategic Workforce Alignment Matrix -->
<section class="grid grid-cols-1 xl:grid-cols-12 gap-space-lg">
<!-- Sunset vs. Emerging Methodology Tracker (8 Cols) -->
<div class="xl:col-span-8 flex flex-col gap-space-sm">
<div class="flex flex-wrap items-center justify-between gap-2">
<div class="flex items-center gap-space-xs">
<span class="material-symbols-outlined text-secondary text-[24px]">swap_horizontal_circle</span>
<h2 class="font-headline-sm text-headline-sm text-primary">Sunset vs. Emerging Methodology Tracker</h2>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant bg-surface-container px-2.5 py-1 rounded">DOPT Cadre Alignment: Verified</span>
</div>
<div class="overflow-x-auto rounded-xl bg-surface-container-lowest shadow-sm">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-surface-container-low text-on-surface-variant font-label-sm text-label-sm uppercase tracking-wider">
<th class="py-3 px-4">Methodology Being Sunset</th>
<th class="py-3 px-4">Emerging National Standard</th>
<th class="py-3 px-4">Target Cadre Impact</th>
<th class="py-3 px-4">Status &amp; Cutoff</th>
</tr>
</thead>
<tbody class="divide-y divide-surface-container text-body-sm font-body-sm text-on-surface">
<!-- Row 1 -->
<tr class="hover:bg-surface-container-low/50 transition-colors">
<td class="py-3 px-4">
<div class="flex flex-col">
<span class="font-semibold text-error">Manual Pen-and-Paper Audits</span>
<span class="text-on-surface-variant text-label-sm">Schedule 10.1 &amp; Annual Survey of Industries Paper Schedules</span>
</div>
</td>
<td class="py-3 px-4">
<div class="flex flex-col">
<span class="font-semibold text-primary">CAPI Digital Real-Time Ingestion</span>
<span class="text-on-surface-variant text-label-sm">Offline encrypted tablets with automated range &amp; logic checks</span>
</div>
</td>
<td class="py-3 px-4">
<div class="flex items-center gap-2">
<span class="font-mono text-label-sm font-semibold">1,840 Officers</span>
<span class="px-1.5 py-0.5 rounded bg-surface-container text-label-sm text-on-surface-variant">SSS / FOD</span>
</div>
</td>
<td class="py-3 px-4">
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-error-container text-on-error-container text-label-sm font-label-sm">
                    Sunset: Dec 2025
                  </span>
</td>
</tr>
<!-- Row 2 -->
<tr class="hover:bg-surface-container-low/50 transition-colors">
<td class="py-3 px-4">
<div class="flex flex-col">
<span class="font-semibold text-error">Excel Macro Data Aggregation</span>
<span class="text-on-surface-variant text-label-sm">VBA single-core workbooks for state-level CPI computation</span>
</div>
</td>
<td class="py-3 px-4">
<div class="flex flex-col">
<span class="font-semibold text-primary">Polars &amp; DuckDB In-Memory Pipelines</span>
<span class="text-on-surface-variant text-label-sm">Vectorized sub-second query pipelines with automated audit logs</span>
</div>
</td>
<td class="py-3 px-4">
<div class="flex items-center gap-2">
<span class="font-mono text-label-sm font-semibold">620 Officers</span>
<span class="px-1.5 py-0.5 rounded bg-surface-container text-label-sm text-on-surface-variant">Price Stat / CSO</span>
</div>
</td>
<td class="py-3 px-4">
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-secondary-fixed text-on-secondary-container text-label-sm font-label-sm">
                    In Migration (74%)
                  </span>
</td>
</tr>
<!-- Row 3 -->
<tr class="hover:bg-surface-container-low/50 transition-colors">
<td class="py-3 px-4">
<div class="flex flex-col">
<span class="font-semibold text-error">Static Linear Extrapolations</span>
<span class="text-on-surface-variant text-label-sm">Historical growth trends for quarterly GDP estimates</span>
</div>
</td>
<td class="py-3 px-4">
<div class="flex flex-col">
<span class="font-semibold text-primary">Dynamic Factor Nowcasting &amp; XGBoost</span>
<span class="text-on-surface-variant text-label-sm">Kalman filter state-space models incorporating 84 proxy inputs</span>
</div>
</td>
<td class="py-3 px-4">
<div class="flex items-center gap-2">
<span class="font-mono text-label-sm font-semibold">310 Officers</span>
<span class="px-1.5 py-0.5 rounded bg-surface-container text-label-sm text-on-surface-variant">NAD / ISS</span>
</div>
</td>
<td class="py-3 px-4">
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-surface-container-highest text-primary text-label-sm font-label-sm">
                    Curriculum Live
                  </span>
</td>
</tr>
<!-- Row 4 -->
<tr class="hover:bg-surface-container-low/50 transition-colors">
<td class="py-3 px-4">
<div class="flex flex-col">
<span class="font-semibold text-error">Tabular Static Boundary Cross-Tables</span>
<span class="text-on-surface-variant text-label-sm">Hardcoded district codes without geospatial coordinates</span>
</div>
</td>
<td class="py-3 px-4">
<div class="flex flex-col">
<span class="font-semibold text-primary">GeoJSON &amp; PostGIS Spatial Geometry</span>
<span class="text-on-surface-variant text-label-sm">Topologically consistent polygon boundaries linked to Census EBs</span>
</div>
</td>
<td class="py-3 px-4">
<div class="flex items-center gap-2">
<span class="font-mono text-label-sm font-semibold">480 Officers</span>
<span class="px-1.5 py-0.5 rounded bg-surface-container text-label-sm text-on-surface-variant">Survey Design / DPD</span>
</div>
</td>
<td class="py-3 px-4">
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-surface-container-high text-on-surface text-label-sm font-label-sm">
                    Target: Q4 2026
                  </span>
</td>
</tr>
</tbody>
</table>
</div>
</div>
<!-- Curriculum Modernization Pipeline (4 Cols) -->
<div class="xl:col-span-4 flex flex-col gap-space-sm">
<div class="flex items-center justify-between">
<div class="flex items-center gap-space-xs">
<span class="material-symbols-outlined text-primary-container text-[24px]">school</span>
<h2 class="font-headline-sm text-headline-sm text-primary">NSSTA Curriculum Pipeline</h2>
</div>
<span class="font-label-sm text-label-sm text-secondary font-semibold">iGOT Synced</span>
</div>
<div class="rounded-xl bg-surface-container-lowest p-space-md shadow-sm flex flex-col gap-space-md">
<!-- Course Card 1 -->
<div class="p-space-sm rounded-lg bg-surface-container-low flex flex-col gap-2">
<div class="flex items-start justify-between gap-2">
<span class="font-label-md text-label-md text-primary font-bold">
                Large Language Models for Automated Metadata Dissemination
              </span>
<span class="px-2 py-0.5 rounded bg-secondary-fixed text-on-secondary-container font-label-sm text-label-sm whitespace-nowrap">
                Under Review
              </span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">
              Fine-tuning sovereign bilingual SLMs for instant query retrieval across 70 years of NSS National Sample Reports.
            </p>
<div class="flex items-center justify-between text-label-sm font-label-sm text-on-surface-variant pt-1">
<span>Body: NSSTA Academic Council &amp; TAC</span>
<span class="font-mono text-primary font-semibold">Stage 2 / 4</span>
</div>
</div>
<!-- Course Card 2 -->
<div class="p-space-sm rounded-lg bg-surface-container-low flex flex-col gap-2">
<div class="flex items-start justify-between gap-2">
<span class="font-label-md text-label-md text-primary font-bold">
                System of Environmental-Economic Accounting (SEEA) Ocean &amp; Energy
              </span>
<span class="px-2 py-0.5 rounded bg-surface-container-highest text-primary font-label-sm text-label-sm whitespace-nowrap">
                Live Pilot
              </span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">
              UN-CEPAD compliant physical asset valuation for India's 7,516 km coastline and offshore marine economy.
            </p>
<div class="flex items-center justify-between text-label-sm font-label-sm text-on-surface-variant pt-1">
<span>Instructors: UNSD &amp; MoSPI SSD</span>
<span class="font-mono text-primary font-semibold">82 Officers Active</span>
</div>
</div>
<!-- Course Card 3 -->
<div class="p-space-sm rounded-lg bg-surface-container-low flex flex-col gap-2">
<div class="flex items-start justify-between gap-2">
<span class="font-label-md text-label-md text-primary font-bold">
                Bayesian Small Area Estimation for Sub-District GDP
              </span>
<span class="px-2 py-0.5 rounded bg-surface-container text-on-surface-variant font-label-sm text-label-sm whitespace-nowrap">
                Curriculum Drafted
              </span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">
              Fay-Herriot estimators combining PLFS sample weights with nighttime luminosity satellite data.
            </p>
<div class="flex items-center justify-between text-label-sm font-label-sm text-on-surface-variant pt-1">
<span>Partner: ISI Bangalore Centre</span>
<span class="font-mono text-primary font-semibold">Rollout: Nov 2025</span>
</div>
</div>
<!-- Quick Action Link -->
<a class="inline-flex items-center justify-center gap-1.5 py-2 px-3 rounded-lg bg-surface-container hover:bg-surface-container-high transition-colors text-primary font-label-md text-label-md" href="/SIH/pages/nssta-programmes.php">
<span>Access NSSTA Syllabus Modernization Docket</span>
<span class="material-symbols-outlined text-[16px]">open_in_new</span>
</a>
</div>
</div>
</section>
<!-- Section 4: Global Alignment & International Statistical Standards -->
<section class="flex flex-col gap-space-md mb-space-lg">
<div class="flex flex-wrap items-baseline justify-between gap-2">
<div class="flex items-center gap-space-xs">
<span class="w-2.5 h-6 bg-primary-container rounded-full"></span>
<h2 class="font-headline-md text-headline-md text-primary">Global Standards Benchmark &amp; Multilateral Interoperability</h2>
</div>
<span class="font-label-md text-label-md text-on-surface-variant">Compliance Verification Engine (SDMX 3.0 / DDI-CDI)</span>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-space-md">
<!-- UN Statistical Commission -->
<div class="rounded-xl bg-surface-container-lowest p-space-md shadow-sm flex flex-col justify-between">
<div>
<div class="flex items-center justify-between mb-space-xs">
<span class="font-label-sm text-label-sm uppercase font-bold text-primary">UNSC Roadmap</span>
<span class="w-2 h-2 rounded-full bg-secondary-container"></span>
</div>
<h4 class="font-headline-sm text-headline-sm text-primary mb-1">UN-SDMX 3.0</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant mb-space-sm">
              Standardized statistical metadata exchange matrices connecting MoSPI's central warehouse to the UN Global Platform.
            </p>
</div>
<div class="flex flex-col gap-1 pt-space-xs">
<div class="flex justify-between text-label-sm font-label-sm">
<span>Alignment Progress</span>
<span class="font-mono font-semibold">91%</span>
</div>
<div class="w-full h-1.5 bg-surface-container rounded-full overflow-hidden">
<div class="h-full bg-secondary w-[91%]"></div>
</div>
</div>
</div>
<!-- IMF SDDS Plus -->
<div class="rounded-xl bg-surface-container-lowest p-space-md shadow-sm flex flex-col justify-between">
<div>
<div class="flex items-center justify-between mb-space-xs">
<span class="font-label-sm text-label-sm uppercase font-bold text-primary">IMF Mandate</span>
<span class="w-2 h-2 rounded-full bg-secondary-container"></span>
</div>
<h4 class="font-headline-sm text-headline-sm text-primary mb-1">SDDS Plus Tier</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant mb-space-sm">
              Special Data Dissemination Standard Plus covering general government debt profiles, financial soundness indicators, and COFER reserves.
            </p>
</div>
<div class="flex flex-col gap-1 pt-space-xs">
<div class="flex justify-between text-label-sm font-label-sm">
<span>Alignment Progress</span>
<span class="font-mono font-semibold">100% (Certified)</span>
</div>
<div class="w-full h-1.5 bg-surface-container rounded-full overflow-hidden">
<div class="h-full bg-primary w-full"></div>
</div>
</div>
</div>
<!-- OECD Statistical Directorate -->
<div class="rounded-xl bg-surface-container-lowest p-space-md shadow-sm flex flex-col justify-between">
<div>
<div class="flex items-center justify-between mb-space-xs">
<span class="font-label-sm text-label-sm uppercase font-bold text-primary">OECD Directorate</span>
<span class="w-2 h-2 rounded-full bg-surface-tint"></span>
</div>
<h4 class="font-headline-sm text-headline-sm text-primary mb-1">DDI-Lifecycle Standard</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant mb-space-sm">
              Microdata documentation initiative ensuring machine-actionable provenance across multi-round PLFS and NSS Socio-Economic surveys.
            </p>
</div>
<div class="flex flex-col gap-1 pt-space-xs">
<div class="flex justify-between text-label-sm font-label-sm">
<span>Alignment Progress</span>
<span class="font-mono font-semibold">76%</span>
</div>
<div class="w-full h-1.5 bg-surface-container rounded-full overflow-hidden">
<div class="h-full bg-surface-tint w-[76%]"></div>
</div>
</div>
</div>
<!-- World Bank Data Development Group -->
<div class="rounded-xl bg-surface-container-lowest p-space-md shadow-sm flex flex-col justify-between">
<div>
<div class="flex items-center justify-between mb-space-xs">
<span class="font-label-sm text-label-sm uppercase font-bold text-primary">World Bank Group</span>
<span class="w-2 h-2 rounded-full bg-primary-fixed-variant"></span>
</div>
<h4 class="font-headline-sm text-headline-sm text-primary mb-1">ODIN Open Data Index</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant mb-space-sm">
              Scoring of open statistical formats (CSV, Parquet, API endpoints) without paywalls or restrictive re-use licenses.
            </p>
</div>
<div class="flex flex-col gap-1 pt-space-xs">
<div class="flex justify-between text-label-sm font-label-sm">
<span>Alignment Progress</span>
<span class="font-mono font-semibold">84%</span>
</div>
<div class="w-full h-1.5 bg-surface-container rounded-full overflow-hidden">
<div class="h-full bg-primary-container w-[84%]"></div>
</div>
</div>
</div>
</div>
</section>
<!-- Administrative Endorsement & Audit Cryptographic Seal -->
<div class="rounded-xl bg-surface-container p-space-md flex flex-col md:flex-row items-center justify-between gap-space-md">
<div class="flex items-center gap-space-sm">
<div class="w-12 h-12 rounded-lg bg-surface-container-lowest flex items-center justify-center text-primary shadow-sm">
<span class="material-symbols-outlined text-[28px]">verified_user</span>
</div>
<div class="flex flex-col">
<span class="font-label-md text-label-md text-primary font-bold">Official MoSPI / NSSTA Forecasting Protocol v3.1</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Validated by Director General (National Accounts) &amp; Additional Secretary (Cadre Management)</span>
</div>
</div>
<div class="flex items-center gap-space-sm">
<span class="font-mono text-label-sm text-on-surface-variant bg-surface-container-lowest px-3 py-1.5 rounded-lg shadow-sm">
          SHA-256: 7F9A-401C-NSSTA-2025-Q1
        </span>
<button onclick="alert('Forecasting Model Verification:\n\nAlgorithm: Mixed Bayesian Dynamic Factor Analysis v3.1\nData Pipeline: MoSPI-FOD + GSTN + Bhuvan API\nSHA-256 Hash: 7F9A401CNSSTA2025Q1C98D71\nIntegrity: Cryptographically Signed by MoSPI CCA')" class="px-4 py-2 rounded-lg bg-primary text-on-primary font-label-md text-label-md hover:bg-primary-container transition-colors">
          Audit Cadre Model
        </button>
</div>
</div>
</div>
</div></main></div></body></html>
