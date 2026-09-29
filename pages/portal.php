<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';

$user = currentUser();
$isLoggedIn = !empty($user);
$dashboardUrl = $isLoggedIn ? (isAdmin() ? BASE_URL . '/pages/admin-dashboard.php' : BASE_URL . '/pages/dashboard.php') : BASE_URL . '/index.php';
?>
<!DOCTYPE html>

<<html lang="en"><head><meta charset="utf-8"/><meta content="width=device-width, initial-scale=1.0" name="viewport"/><meta content="web_standard" name="shell-type"/><title>Official Portal — Gap2Grow (MoSPI / NSSTA Cadre Intelligence)</title><link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/><link href="https://fonts.googleapis.com" rel="preconnect"/><link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/><link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/><style>@layer base{html,body{margin:0;padding:0;}body{overscroll-behavior:none;}main>:first-child{margin-top:0!important;}main>:last-child{margin-bottom:0!important;}}::-webkit-scrollbar{display:none;}</style><script src="https://cdn.tailwindcss.com"></script><script id="tailwind-config">tailwind.config={darkMode:"class",theme:{extend:{"colors":{"surface-container-lowest":"#ffffff","surface":"#f8f9ff","primary-fixed":"#d5e3ff","secondary-container":"#fc6018","surface-tint":"#495f82","on-background":"#0d1c2f","on-tertiary-fixed":"#00164e","error":"#ba1a1a","on-surface":"#0d1c2f","tertiary-fixed":"#dce1ff","surface-container-highest":"#d5e3fd","on-tertiary":"#ffffff","tertiary-container":"#001e63","on-tertiary-container":"#7088dc","primary":"#001026","surface-container":"#e6eeff","on-surface-variant":"#44474e","background":"#f8f9ff","on-secondary-fixed-variant":"#802a00","on-primary":"#ffffff","tertiary-fixed-dim":"#b6c4ff","secondary":"#a83900","inverse-on-surface":"#ebf1ff","tertiary":"#000c34","on-primary-container":"#778db2","primary-container":"#0b2545","surface-dim":"#ccdbf4","on-primary-fixed":"#001c3b","on-secondary-fixed":"#380d00","inverse-primary":"#b1c7f0","error-container":"#ffdad6","on-error-container":"#93000a","inverse-surface":"#233144","on-tertiary-fixed-variant":"#264191","secondary-fixed":"#ffdbcf","outline":"#74777f","on-primary-fixed-variant":"#314769","on-error":"#ffffff","surface-container-low":"#eff4ff","secondary-fixed-dim":"#ffb59a","surface-variant":"#d5e3fd","on-secondary-container":"#531800","on-secondary":"#ffffff","surface-container-high":"#dde9ff","outline-variant":"#c4c6cf","surface-bright":"#f8f9ff","primary-fixed-dim":"#b1c7f0"},"borderRadius":{"DEFAULT":"0.125rem","lg":"0.25rem","xl":"0.5rem","full":"0.75rem"},"spacing":{"gutter-mobile":"0.75rem","margin-mobile":"1rem","space-lg":"1.5rem","space-sm":"0.5rem","gutter":"1.5rem","space-md":"1rem","space-xs":"0.25rem","margin":"2rem","space-xl":"2.5rem"},"fontFamily":{"label-lg":["Public Sans"],"label-md":["Public Sans"],"body-lg":["Public Sans"],"body-md":["Public Sans"],"headline-lg":["Public Sans"],"headline-xl":["Public Sans"],"headline-lg-mobile":["Public Sans"],"label-sm":["Public Sans"],"headline-md":["Public Sans"],"body-sm":["Public Sans"],"headline-sm":["Public Sans"],"headline-xl-mobile":["Public Sans"]},"fontSize":{"label-lg":["14px",{"lineHeight":"20px","letterSpacing":"0.01em","fontWeight":"600"}],"label-md":["12px",{"lineHeight":"16px","letterSpacing":"0.02em","fontWeight":"600"}],"body-lg":["16px",{"lineHeight":"24px","fontWeight":"400"}],"body-md":["14px",{"lineHeight":"20px","fontWeight":"400"}],"headline-lg":["28px",{"lineHeight":"36px","letterSpacing":"-0.01em","fontWeight":"700"}],"headline-xl":["36px",{"lineHeight":"44px","letterSpacing":"-0.02em","fontWeight":"700"}],"headline-lg-mobile":["22px",{"lineHeight":"30px","letterSpacing":"0em","fontWeight":"700"}],"label-sm":["11px",{"lineHeight":"14px","letterSpacing":"0.03em","fontWeight":"600"}],"headline-md":["22px",{"lineHeight":"28px","fontWeight":"600"}],"body-sm":["12px",{"lineHeight":"18px","fontWeight":"400"}],"headline-sm":["18px",{"lineHeight":"24px","fontWeight":"600"}],"headline-xl-mobile":["28px",{"lineHeight":"36px","letterSpacing":"-0.01em","fontWeight":"700"}]}}}}</script></head><body class="bg-surface font-body-md text-body-md text-on-surface antialiased"><header class="fixed top-0 w-full z-50"><div class="bg-primary-container text-on-primary text-label-sm font-label-sm"><div class="max-w-7xl mx-auto px-gutter flex items-center justify-between h-8"><span>भारत सरकार | Government of India | सांख्यिकी और कार्यक्रम कार्यान्वयन मंत्रालय (MoSPI)</span><div class="flex items-center gap-space-md"><div class="flex items-center gap-space-xs"><button class="px-1 hover:text-secondary-fixed transition-colors" type="button">A-</button><button class="px-1 hover:text-secondary-fixed transition-colors" type="button">A</button><button class="px-1 hover:text-secondary-fixed transition-colors" type="button">A+</button></div><span class="text-outline">|</span><button class="hover:text-secondary-fixed transition-colors" type="button">हिन्दी</button></div></div></div><div class="max-w-7xl mx-auto px-gutter pt-space-xs"><div class="bg-surface-container-lowest/95 backdrop-blur-md shadow-[0_10px_30px_rgba(11,37,69,0.08)] rounded-[2rem] px-space-lg py-space-sm flex items-center justify-between"><div class="flex items-center gap-space-md"><div class="w-10 h-10 rounded-full bg-primary-container flex items-center justify-center text-on-primary font-headline-sm text-headline-sm">G</div><div><div class="font-headline-sm text-headline-sm text-primary tracking-tight leading-tight">Gap2Grow</div><div class="font-label-sm text-label-sm text-on-surface-variant">MoSPI • NSSTA Cadre Intelligence</div></div></div><nav class="hidden lg:flex items-center gap-space-xs bg-surface-container-low/60 p-1.5 rounded-full" data-active-classes="bg-surface-container text-primary font-label-md rounded-full"><a aria-current="page" class="px-space-md py-1.5 transition-colors bg-surface-container text-primary font-label-md rounded-full font-bold shadow-sm" data-path="home" href="<?= BASE_URL ?>/pages/portal.php">Home</a><a class="px-space-md py-1.5 text-on-surface-variant hover:text-on-surface font-label-md text-label-md transition-colors" data-path="about-platform" href="<?= BASE_URL ?>/pages/about.php">About Platform</a><a class="px-space-md py-1.5 text-on-surface-variant hover:text-on-surface font-label-md text-label-md transition-colors" data-path="competency-framework" href="<?= BASE_URL ?>/pages/competency-framework.php">Competency Framework</a><a class="px-space-md py-1.5 text-on-surface-variant hover:text-on-surface font-label-md text-label-md transition-colors" data-path="igot-ecosystem" href="<?= BASE_URL ?>/pages/igot-ecosystem.php">iGOT Ecosystem</a><a class="px-space-md py-1.5 text-on-surface-variant hover:text-on-surface font-label-md text-label-md transition-colors" data-path="nssta-tpac" href="<?= BASE_URL ?>/pages/nssta-tpac.php">NSSTA TPAC</a><a class="px-space-md py-1.5 text-on-surface-variant hover:text-on-surface font-label-md text-label-md transition-colors" data-path="helpdesk" href="<?= BASE_URL ?>/pages/helpdesk.php">Helpdesk</a></nav><div class="flex items-center gap-space-sm"><a class="hidden md:inline-flex items-center px-space-md py-2 text-primary font-label-md text-label-md hover:text-secondary transition-colors" data-path="competency-framework" href="<?= BASE_URL ?>/pages/competency-framework.php">Explore Framework</a><a class="inline-flex items-center gap-space-xs bg-secondary hover:bg-on-secondary-fixed-variant text-on-secondary font-label-md text-label-md px-space-lg py-2 rounded-full transition-all shadow-[0_4px_12px_rgba(168,57,0,0.25)]" data-path="login-parichay" href="<?= $dashboardUrl ?>"><span class="material-symbols-outlined text-[16px]">fingerprint</span><span>Parichay / e-HRMS</span></a><button type="button" class="lg:hidden p-2 text-primary hover:text-secondary" onclick="document.getElementById('mobile-portal-nav').classList.toggle('hidden')"><span class="material-symbols-outlined text-[24px]">menu</span></button><div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center"><span class="material-symbols-outlined text-on-primary text-[18px]">person</span></div></div></div></div><div id="mobile-portal-nav" class="hidden lg:hidden max-w-7xl mx-auto px-gutter pt-2"><div class="bg-surface-container-lowest shadow-xl rounded-2xl p-4 flex flex-col gap-2 border border-surface-container"><a class="px-4 py-2 rounded-lg font-label-md text-label-md bg-primary text-on-primary font-bold" href="<?= BASE_URL ?>/pages/portal.php">Home</a><a class="px-4 py-2 rounded-lg font-label-md text-label-md text-on-surface hover:bg-surface-container" href="<?= BASE_URL ?>/pages/about.php">About Platform</a><a class="px-4 py-2 rounded-lg font-label-md text-label-md text-on-surface hover:bg-surface-container" href="<?= BASE_URL ?>/pages/competency-framework.php">Competency Framework</a><a class="px-4 py-2 rounded-lg font-label-md text-label-md text-on-surface hover:bg-surface-container" href="<?= BASE_URL ?>/pages/igot-ecosystem.php">iGOT Ecosystem</a><a class="px-4 py-2 rounded-lg font-label-md text-label-md text-on-surface hover:bg-surface-container" href="<?= BASE_URL ?>/pages/nssta-tpac.php">NSSTA TPAC</a><a class="px-4 py-2 rounded-lg font-label-md text-label-md text-on-surface hover:bg-surface-container" href="<?= BASE_URL ?>/pages/helpdesk.php">Helpdesk &amp; Support</a></div></div></header><main class="w-full pt-28 bg-surface"><div class="flex flex-col w-full">
<!-- Organic Curvature Sovereign Announcement Ribbon -->
<div class="relative w-full bg-primary-container text-on-primary overflow-hidden shadow-md">
<div class="max-w-7xl mx-auto px-gutter py-space-sm flex flex-col md:flex-row items-center justify-between gap-space-xs text-label-md font-label-md">
<div class="flex items-center gap-space-sm">
<span class="inline-flex items-center justify-center w-2 h-2 rounded-full bg-secondary animate-pulse"></span>
<span class="bg-surface-container-highest/20 px-2 py-0.5 rounded text-label-sm font-label-sm uppercase tracking-wider text-secondary-fixed">Live Sync Active</span>
<span>DoPT &amp; Karmayogi Bharat Hub Interlink v3.4 calibrated with NSSTA Cadre Roster</span>
</div>
<div class="flex items-center gap-space-md text-label-sm font-label-sm text-surface-container-high">
<span class="flex items-center gap-1"><span class="material-symbols-outlined text-[15px]">verified_user</span> GIGW 3.0 Standard</span>
<span class="hidden sm:inline">•</span>
<span class="flex items-center gap-1"><span class="material-symbols-outlined text-[15px]">security</span> ISO 27001 Certified</span>
<span class="hidden sm:inline">•</span>
<a class="text-secondary-fixed hover:text-on-primary flex items-center gap-0.5 underline transition-colors" href="#matrix-preview">Cadre Health Pulse <span class="material-symbols-outlined text-[13px]">arrow_forward</span></a>
</div>
</div>
<!-- Tricolor Accent Ribbon Contour line -->
<div class="w-full h-1 bg-gradient-to-r from-secondary-container via-surface-container-lowest to-surface-tint opacity-90"></div>
</div>
<!-- SECTION 1: Curvy Distinctive Sovereign Hero -->
<section class="relative w-full overflow-hidden bg-gradient-to-b from-surface via-surface-container-low to-surface pt-space-md pb-space-xl">
<!-- Ambient Backdrop Geometrics -->
<div class="absolute top-0 right-1/4 w-96 h-96 bg-primary-fixed/30 rounded-full blur-3xl pointer-events-none -z-10"></div>
<div class="absolute -bottom-10 left-10 w-80 h-80 bg-secondary-fixed-dim/20 rounded-full blur-2xl pointer-events-none -z-10"></div>
<div class="max-w-7xl mx-auto px-gutter">
<!-- Institutional Curvy Eyebrow Badge -->
<div class="inline-flex items-center gap-space-xs px-space-md py-1.5 rounded-full bg-surface-container-lowest shadow-sm mb-space-md">
<div class="w-5 h-5 rounded-full bg-primary-container flex items-center justify-center text-on-primary">
<span class="material-symbols-outlined text-[13px]">analytics</span>
</div>
<span class="text-label-sm font-label-sm text-primary uppercase tracking-wider font-semibold">Official Capability Intelligence Platform • MoSPI &amp; NSSTA</span>
<span class="w-1.5 h-1.5 rounded-full bg-secondary-container"></span>
<span class="text-label-sm font-label-sm text-secondary font-semibold">ISS &amp; SSS Cadres</span>
</div>
<!-- Hero Grid Layout -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-space-xl items-center">
<!-- Left: Sovereign Value Proposition -->
<div class="lg:col-span-7 flex flex-col items-start">
<h1 class="font-headline-xl text-headline-xl text-primary tracking-tight leading-tight mb-space-md">
            From Skill Gaps to Growth: <span class="text-secondary">AI-Powered Competency Intelligence</span> for India's Official Statistical System
          </h1>
<p class="font-body-lg text-body-lg text-on-surface-variant mb-space-lg max-w-2xl leading-relaxed">
            Empowering statistical officers and data practitioners across Central Ministries, NSSO, and State DES with personalized upskilling, iGOT Karmayogi integration, and NSSTA TPAC training pathways.
          </p>
<!-- CTAs -->
<div class="flex flex-wrap items-center gap-space-md w-full sm:w-auto mb-space-lg">
<a class="inline-flex items-center justify-center gap-space-xs px-space-lg py-3 rounded bg-secondary hover:bg-on-secondary-fixed-variant text-on-secondary font-label-lg text-label-lg shadow-md hover:shadow-lg transition-all" href="<?= $dashboardUrl ?>">
<span class="material-symbols-outlined text-[18px]">fingerprint</span>
<span>Login via Parichay / e-HRMS</span>
</a>
<a class="inline-flex items-center justify-center gap-space-xs px-space-lg py-3 rounded bg-surface-container-lowest hover:bg-surface-container text-primary font-label-lg text-label-lg shadow-sm transition-all" href="<?= BASE_URL ?>/pages/competency-framework.php">
<span class="material-symbols-outlined text-[18px]">account_tree</span>
<span>Explore Competency Framework</span>
</a>
</div>
<!-- Live Cadre Transformation Flow Ticker -->
<div class="w-full bg-surface-container-lowest p-space-md rounded-xl shadow-sm">
<div class="flex items-center justify-between mb-space-xs">
<span class="text-label-sm font-label-sm text-on-surface-variant uppercase tracking-wider">Continuous Lifecycle Protocol</span>
<span class="text-label-sm font-label-sm text-secondary font-semibold flex items-center gap-1">
<span class="w-2 h-2 rounded-full bg-secondary-container inline-block"></span> Dynamic Feedback v4.1
              </span>
</div>
<div class="flex items-center justify-between text-label-md font-label-md text-primary overflow-x-auto py-1 gap-space-xs">
<div class="flex items-center gap-1.5 flex-shrink-0">
<span class="w-6 h-6 rounded-full bg-primary-container text-on-primary flex items-center justify-center text-[11px] font-bold">01</span>
<span class="font-semibold">Identify Gap</span>
</div>
<span class="material-symbols-outlined text-outline text-[16px] flex-shrink-0">trending_flat</span>
<div class="flex items-center gap-1.5 flex-shrink-0">
<span class="w-6 h-6 rounded-full bg-surface-container-highest text-primary flex items-center justify-center text-[11px] font-bold">02</span>
<span>Understand</span>
</div>
<span class="material-symbols-outlined text-outline text-[16px] flex-shrink-0">trending_flat</span>
<div class="flex items-center gap-1.5 flex-shrink-0">
<span class="w-6 h-6 rounded-full bg-surface-container-highest text-primary flex items-center justify-center text-[11px] font-bold">03</span>
<span>Learn</span>
</div>
<span class="material-symbols-outlined text-outline text-[16px] flex-shrink-0">trending_flat</span>
<div class="flex items-center gap-1.5 flex-shrink-0">
<span class="w-6 h-6 rounded-full bg-surface-container-highest text-primary flex items-center justify-center text-[11px] font-bold">04</span>
<span>Assess</span>
</div>
<span class="material-symbols-outlined text-outline text-[16px] flex-shrink-0">trending_flat</span>
<div class="flex items-center gap-1.5 flex-shrink-0">
<span class="w-6 h-6 rounded-full bg-surface-container-highest text-primary flex items-center justify-center text-[11px] font-bold">05</span>
<span>Improve</span>
</div>
<span class="material-symbols-outlined text-outline text-[16px] flex-shrink-0">trending_flat</span>
<div class="flex items-center gap-1.5 flex-shrink-0">
<span class="w-6 h-6 rounded-full bg-secondary text-on-secondary flex items-center justify-center text-[11px] font-bold">06</span>
<span class="text-secondary font-bold">Grow</span>
</div>
</div>
</div>
</div>
<!-- Right: Real-time Cadre Benchmark Engine Diagnostic Card -->
<div class="lg:col-span-5 relative">
<div class="bg-surface-container-lowest rounded-xl shadow-xl p-space-lg relative overflow-hidden">
<!-- Top Card Header -->
<div class="flex items-start justify-between mb-space-md">
<div>
<div class="flex items-center gap-space-xs mb-1">
<span class="text-label-sm font-label-sm uppercase tracking-wider text-on-surface-variant font-semibold">Live Cadre Diagnostic</span>
<span class="px-2 py-0.5 rounded-full bg-surface-container text-label-sm font-label-sm text-primary font-bold">ISS Batch 2023-24</span>
</div>
<h2 class="font-headline-sm text-headline-sm text-primary leading-tight">Cadre Competency Diagnostics</h2>
</div>
<div class="flex flex-col items-end">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded bg-surface-container-high text-primary text-label-sm font-label-sm font-semibold">
<span class="material-symbols-outlined text-[14px]">psychology</span> MoSPI-LLM v2.1
                </span>
<span class="text-label-sm font-label-sm text-on-surface-variant mt-1">Calibrated Oct 2025</span>
</div>
</div>
<!-- Domain Metric 1: National Accounts -->
<div class="bg-surface-container-low p-space-md rounded-lg mb-space-sm">
<div class="flex justify-between items-center mb-1.5">
<span class="font-label-md text-label-md text-primary font-semibold">National Accounts (SNA 2008 &amp; Supply-Use)</span>
<span class="px-2 py-0.5 rounded-full bg-error-container text-on-error-container text-label-sm font-label-sm font-bold">-18% Deficit</span>
</div>
<div class="flex items-center justify-between text-body-sm font-body-sm text-on-surface-variant mb-1">
<span>Benchmarked: Level 4 (Specialist)</span>
<span class="font-semibold text-primary">Current: Level 2.8</span>
</div>
<div class="relative w-full h-2 bg-surface-container-highest rounded-full overflow-hidden">
<div class="absolute left-0 top-0 h-full bg-error rounded-full" style="width: 58%;"></div>
<div class="absolute top-0 bottom-0 w-1 bg-primary" style="left: 76%;" title="DoPT Target Level"></div>
</div>
<div class="flex items-center justify-between mt-2 text-label-sm font-label-sm text-on-surface-variant">
<span>Recommended: NAD-NSSTA 3-Week Advanced SUT Module</span>
<span class="text-secondary font-semibold flex items-center">Resolve <span class="material-symbols-outlined text-[13px]">chevron_right</span></span>
</div>
</div>
<!-- Domain Metric 2: Sample Survey Design -->
<div class="bg-surface-container-low p-space-md rounded-lg mb-space-sm">
<div class="flex justify-between items-center mb-1.5">
<span class="font-label-md text-label-md text-primary font-semibold">Sample Survey Design &amp; NSS Estimation</span>
<span class="px-2 py-0.5 rounded-full bg-surface-container text-primary text-label-sm font-label-sm font-bold">Target Met (94%)</span>
</div>
<div class="flex items-center justify-between text-body-sm font-body-sm text-on-surface-variant mb-1">
<span>Benchmarked: Level 4 (Sampling Expert)</span>
<span class="font-semibold text-primary">Current: Level 4.2</span>
</div>
<div class="relative w-full h-2 bg-surface-container-highest rounded-full overflow-hidden">
<div class="absolute left-0 top-0 h-full bg-surface-tint rounded-full" style="width: 92%;"></div>
<div class="absolute top-0 bottom-0 w-1 bg-primary" style="left: 80%;"></div>
</div>
<div class="flex items-center justify-between mt-2 text-label-sm font-label-sm text-on-surface-variant">
<span>Status: Multi-Stage Stratified Sampling Mastered</span>
<span class="text-primary font-semibold flex items-center"><span class="material-symbols-outlined text-[14px]">verified</span> Validated</span>
</div>
</div>
<!-- Domain Metric 3: Big Data Analytics & R Spatial -->
<div class="bg-surface-container-low p-space-md rounded-lg mb-space-md">
<div class="flex justify-between items-center mb-1.5">
<span class="font-label-md text-label-md text-primary font-semibold">Big Data &amp; R Spatial Microdata</span>
<span class="px-2 py-0.5 rounded-full bg-error-container text-on-error-container text-label-sm font-label-sm font-bold">-34% Deficit</span>
</div>
<div class="flex items-center justify-between text-body-sm font-body-sm text-on-surface-variant mb-1">
<span>Benchmarked: Level 3.5 (Applied Analytics)</span>
<span class="font-semibold text-primary">Current: Level 2.1</span>
</div>
<div class="relative w-full h-2 bg-surface-container-highest rounded-full overflow-hidden">
<div class="absolute left-0 top-0 h-full bg-secondary-container rounded-full" style="width: 42%;"></div>
<div class="absolute top-0 bottom-0 w-1 bg-primary" style="left: 70%;"></div>
</div>
<div class="flex items-center justify-between mt-2 text-label-sm font-label-sm text-on-surface-variant">
<span>Assigned: iGOT Karmayogi Curated Python/QGIS Pathway</span>
<span class="text-secondary font-semibold flex items-center">Start Lab <span class="material-symbols-outlined text-[13px]">chevron_right</span></span>
</div>
</div>
<!-- Card Bottom Bar -->
<div class="pt-space-xs flex items-center justify-between text-label-sm font-label-sm text-on-surface-variant">
<div class="flex items-center gap-1.5">
<span class="material-symbols-outlined text-[16px] text-primary">hub</span>
<span>Auto-synced with SPARROW APAR Cadre Registry</span>
</div>
<span class="text-primary font-semibold cursor-pointer hover:underline">Full Assessment Summary →</span>
</div>
</div>
</div>
</div>
</div>
<!-- Curvilinear Transition Divider to Next Section -->
<div class="w-full mt-space-xl overflow-hidden leading-none">
<svg class="relative block w-full h-10 text-surface-container-lowest" fill="currentColor" preserveaspectratio="none" viewbox="0 0 1200 120">
<path d="M0,0 C150,90 350,-40 500,45 C650,130 900,10 1200,60 L1200,120 L0,120 Z"></path>
</svg>
</div>
</section>
<!-- SECTION 2: Sovereign National Metrics Strip -->
<section class="w-full bg-surface-container-lowest py-space-xl shadow-sm relative">
<div class="max-w-7xl mx-auto px-gutter">
<div class="text-center max-w-3xl mx-auto mb-space-lg">
<span class="text-label-sm font-label-sm uppercase tracking-widest text-secondary font-bold">National Cadre Capacity Metrics</span>
<h2 class="font-headline-lg text-headline-lg text-primary mt-1">Real-time Upskilling Footprint Across Indian Statistical Cadres</h2>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-space-lg">
<!-- Metric 1 -->
<div class="bg-surface-container-low p-space-lg rounded-xl flex flex-col justify-between">
<div class="flex items-center justify-between mb-space-md">
<span class="material-symbols-outlined text-primary text-[32px]">group</span>
<span class="px-2 py-0.5 rounded bg-surface-container-highest text-label-sm font-label-sm text-primary font-semibold">Active Roster</span>
</div>
<div>
<div class="font-headline-xl text-headline-xl text-primary font-bold tracking-tight">42,000+</div>
<div class="font-headline-sm text-headline-sm text-on-surface mt-1">Statistical Personnel</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-space-xs">Mapped across Central Ministries, Subordinate Offices, and 36 States/UTs DES.</p>
</div>
<div class="mt-space-md pt-space-sm flex items-center justify-between text-label-sm font-label-sm text-on-surface-variant">
<span>ISS + SSS + State DES</span>
<span class="text-secondary font-semibold">99.4% Verified</span>
</div>
</div>
<!-- Metric 2 -->
<div class="bg-surface-container-low p-space-lg rounded-xl flex flex-col justify-between">
<div class="flex items-center justify-between mb-space-md">
<span class="material-symbols-outlined text-secondary text-[32px]">school</span>
<span class="px-2 py-0.5 rounded bg-surface-container-highest text-label-sm font-label-sm text-primary font-semibold">Karmayogi Bharat</span>
</div>
<div>
<div class="font-headline-xl text-headline-xl text-primary font-bold tracking-tight">260+</div>
<div class="font-headline-sm text-headline-sm text-on-surface mt-1">iGOT Courses Aligned</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-space-xs">Specialized statistical micro-modules, national indicators, and modern survey tooling.</p>
</div>
<div class="mt-space-md pt-space-sm flex items-center justify-between text-label-sm font-label-sm text-on-surface-variant">
<span>DoPT Certified</span>
<span class="text-secondary font-semibold">88k+ Enrollments</span>
</div>
</div>
<!-- Metric 3 -->
<div class="bg-surface-container-low p-space-lg rounded-xl flex flex-col justify-between">
<div class="flex items-center justify-between mb-space-md">
<span class="material-symbols-outlined text-surface-tint text-[32px]">account_tree</span>
<span class="px-2 py-0.5 rounded bg-surface-container-highest text-label-sm font-label-sm text-primary font-semibold">Curriculum Matrix</span>
</div>
<div>
<div class="font-headline-xl text-headline-xl text-primary font-bold tracking-tight">14</div>
<div class="font-headline-sm text-headline-sm text-on-surface mt-1">Categorical Domains</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-space-xs">From National Accounts (SNA) and SDG Tracking to Field Sample Verification and ML forecasting.</p>
</div>
<div class="mt-space-md pt-space-sm flex items-center justify-between text-label-sm font-label-sm text-on-surface-variant">
<span>NSSTA Validated</span>
<span class="text-primary font-semibold">168 Sub-skills</span>
</div>
</div>
<!-- Metric 4 -->
<div class="bg-surface-container-low p-space-lg rounded-xl flex flex-col justify-between">
<div class="flex items-center justify-between mb-space-md">
<span class="material-symbols-outlined text-primary-container text-[32px]">psychology_alt</span>
<span class="px-2 py-0.5 rounded bg-surface-container-highest text-label-sm font-label-sm text-primary font-semibold">Adaptive Engine</span>
</div>
<div>
<div class="font-headline-xl text-headline-xl text-primary font-bold tracking-tight">18,500+</div>
<div class="font-headline-sm text-headline-sm text-on-surface mt-1">AI Assessments Done</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-space-xs">Diagnostic scenario-based evaluations calibrated with live ministry surveys.</p>
</div>
<div class="mt-space-md pt-space-sm flex items-center justify-between text-label-sm font-label-sm text-on-surface-variant">
<span>MoSPI-LLM Engine</span>
<span class="text-secondary font-semibold">96.8% Accuracy</span>
</div>
</div>
</div>
</div>
</section>
<!-- SECTION 3: The Competency Evolution Pipeline (6 Stages) -->
<section class="w-full bg-surface py-space-xl relative">
<div class="max-w-7xl mx-auto px-gutter">
<!-- Section Header -->
<div class="flex flex-col md:flex-row md:items-end justify-between mb-space-xl gap-space-md">
<div>
<div class="inline-flex items-center gap-space-xs px-2.5 py-1 rounded bg-surface-container-high text-label-sm font-label-sm text-primary font-bold uppercase tracking-wider mb-space-xs">
            Systematic Upgradation Architecture
          </div>
<h2 class="font-headline-lg text-headline-lg text-primary tracking-tight">The 6-Stage Competency Evolution Pipeline</h2>
<p class="font-body-md text-body-md text-on-surface-variant mt-1 max-w-2xl">
            A continuous, institutional loop taking an officer from baseline verification to accredited leadership in official statistics.
          </p>
</div>
<div class="flex items-center gap-space-xs text-label-md font-label-md text-secondary">
<span class="material-symbols-outlined text-[18px]">verified</span>
<span>Integrated with DoPT FRAC Framework</span>
</div>
</div>
<!-- 6 Bento Journey Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-space-lg">
<!-- Stage 01 -->
<div class="bg-surface-container-lowest p-space-lg rounded-xl shadow-sm hover:shadow-md transition-all flex flex-col justify-between group">
<div>
<div class="flex items-center justify-between mb-space-md">
<span class="font-headline-xl text-headline-xl font-bold text-surface-container-highest group-hover:text-secondary-container transition-colors">01</span>
<span class="p-2.5 rounded-lg bg-surface-container-low text-primary"><span class="material-symbols-outlined text-[24px]">badge</span></span>
</div>
<h3 class="font-headline-sm text-headline-sm text-primary mb-space-xs">Cadre &amp; Profile Sync</h3>
<p class="font-body-md text-body-md text-on-surface-variant mb-space-md">
              Automated ingestion from DoPT e-HRMS and Parichay SSO. Auto-populates current posting, service tenure (ISS/SSS), past survey experience, and accredited degrees.
            </p>
</div>
<div class="pt-space-sm bg-surface-container-low -mx-space-lg -mb-space-lg px-space-lg py-space-sm rounded-b-xl flex items-center justify-between text-label-sm font-label-sm">
<span class="text-on-surface-variant">Data Pipeline:</span>
<span class="font-semibold text-primary">e-HRMS • SPARROW APAR</span>
</div>
</div>
<!-- Stage 02 -->
<div class="bg-surface-container-lowest p-space-lg rounded-xl shadow-sm hover:shadow-md transition-all flex flex-col justify-between group">
<div>
<div class="flex items-center justify-between mb-space-md">
<span class="font-headline-xl text-headline-xl font-bold text-surface-container-highest group-hover:text-secondary transition-colors">02</span>
<span class="p-2.5 rounded-lg bg-surface-container-low text-primary"><span class="material-symbols-outlined text-[24px]">assignment_turned_in</span></span>
</div>
<h3 class="font-headline-sm text-headline-sm text-primary mb-space-xs">Diagnostic Assessment</h3>
<p class="font-body-md text-body-md text-on-surface-variant mb-space-md">
              Multi-dimensional evaluation across theoretical statistical concepts, field administration realities, data cleaning pipelines, and domain regulations (Collection of Statistics Act).
            </p>
</div>
<div class="pt-space-sm bg-surface-container-low -mx-space-lg -mb-space-lg px-space-lg py-space-sm rounded-b-xl flex items-center justify-between text-label-sm font-label-sm">
<span class="text-on-surface-variant">Evaluation Time:</span>
<span class="font-semibold text-primary">35 Min Adaptive Test</span>
</div>
</div>
<!-- Stage 03 -->
<div class="bg-surface-container-lowest p-space-lg rounded-xl shadow-sm hover:shadow-md transition-all flex flex-col justify-between group">
<div>
<div class="flex items-center justify-between mb-space-md">
<span class="font-headline-xl text-headline-xl font-bold text-surface-container-highest group-hover:text-secondary transition-colors">03</span>
<span class="p-2.5 rounded-lg bg-surface-container-low text-primary"><span class="material-symbols-outlined text-[24px]">insights</span></span>
</div>
<h3 class="font-headline-sm text-headline-sm text-primary mb-space-xs">AI Skill-Gap Engine</h3>
<p class="font-body-md text-body-md text-on-surface-variant mb-space-md">
              Algorithms cross-reference candidate performance against MoSPI division requirements (e.g., NAD vs. FOD) to generate an indexed deficiency score with priority tags.
            </p>
</div>
<div class="pt-space-sm bg-surface-container-low -mx-space-lg -mb-space-lg px-space-lg py-space-sm rounded-b-xl flex items-center justify-between text-label-sm font-label-sm">
<span class="text-on-surface-variant">Intelligence Layer:</span>
<span class="font-semibold text-secondary">Deficit Matrix v2.1</span>
</div>
</div>
<!-- Stage 04 -->
<div class="bg-surface-container-lowest p-space-lg rounded-xl shadow-sm hover:shadow-md transition-all flex flex-col justify-between group">
<div>
<div class="flex items-center justify-between mb-space-md">
<span class="font-headline-xl text-headline-xl font-bold text-surface-container-highest group-hover:text-secondary transition-colors">04</span>
<span class="p-2.5 rounded-lg bg-surface-container-low text-primary"><span class="material-symbols-outlined text-[24px]">sync_alt</span></span>
</div>
<h3 class="font-headline-sm text-headline-sm text-primary mb-space-xs">Dual-Track Learning</h3>
<p class="font-body-md text-body-md text-on-surface-variant mb-space-md">
              Seamless synchronization between digital self-paced courses on iGOT Karmayogi and physical, residential cohorts hosted at NSSTA Greater Noida campus.
            </p>
</div>
<div class="pt-space-sm bg-surface-container-low -mx-space-lg -mb-space-lg px-space-lg py-space-sm rounded-b-xl flex items-center justify-between text-label-sm font-label-sm">
<span class="text-on-surface-variant">Blended Modality:</span>
<span class="font-semibold text-primary">iGOT + NSSTA TPAC</span>
</div>
</div>
<!-- Stage 05 -->
<div class="bg-surface-container-lowest p-space-lg rounded-xl shadow-sm hover:shadow-md transition-all flex flex-col justify-between group">
<div>
<div class="flex items-center justify-between mb-space-md">
<span class="font-headline-xl text-headline-xl font-bold text-surface-container-highest group-hover:text-secondary transition-colors">05</span>
<span class="p-2.5 rounded-lg bg-surface-container-low text-primary"><span class="material-symbols-outlined text-[24px]">model_training</span></span>
</div>
<h3 class="font-headline-sm text-headline-sm text-primary mb-space-xs">Adaptive AI Evaluation</h3>
<p class="font-body-md text-body-md text-on-surface-variant mb-space-md">
              Context-aware questioning based on real-world Indian microdata scenarios (Periodic Labour Force Survey, Consumer Expenditure Survey) testing practical decision-making.
            </p>
</div>
<div class="pt-space-sm bg-surface-container-low -mx-space-lg -mb-space-lg px-space-lg py-space-sm rounded-b-xl flex items-center justify-between text-label-sm font-label-sm">
<span class="text-on-surface-variant">Questioning Engine:</span>
<span class="font-semibold text-primary">NSS Microdata Sandbox</span>
</div>
</div>
<!-- Stage 06 -->
<div class="bg-surface-container-lowest p-space-lg rounded-xl shadow-sm hover:shadow-md transition-all flex flex-col justify-between group">
<div>
<div class="flex items-center justify-between mb-space-md">
<span class="font-headline-xl text-headline-xl font-bold text-surface-container-highest group-hover:text-secondary transition-colors">06</span>
<span class="p-2.5 rounded-lg bg-surface-container-low text-primary"><span class="material-symbols-outlined text-[24px]">workspace_premium</span></span>
</div>
<h3 class="font-headline-sm text-headline-sm text-primary mb-space-xs">Cadre Growth &amp; Badging</h3>
<p class="font-body-md text-body-md text-on-surface-variant mb-space-md">
              Earn cryptographically signed competency credentials instantly visible on officer APAR and DoPT training rosters for deputations and promotion panels.
            </p>
</div>
<div class="pt-space-sm bg-surface-container-low -mx-space-lg -mb-space-lg px-space-lg py-space-sm rounded-b-xl flex items-center justify-between text-label-sm font-label-sm">
<span class="text-on-surface-variant">Accreditation:</span>
<span class="font-semibold text-secondary">DoPT Verified Digital Seal</span>
</div>
</div>
</div>
</div>
</section>
<!-- SECTION 4: Four Pillars of Sovereign Statistical Capability -->
<section class="w-full bg-surface-container-lowest py-space-xl shadow-sm relative">
<div class="max-w-7xl mx-auto px-gutter">
<div class="text-center max-w-3xl mx-auto mb-space-xl">
<span class="text-label-sm font-label-sm uppercase tracking-widest text-secondary font-bold">Institutional Architecture</span>
<h2 class="font-headline-lg text-headline-lg text-primary mt-1">Four Pillars of Sovereign Statistical Capability</h2>
<p class="font-body-md text-body-md text-on-surface-variant mt-2">
          Designed specifically to meet the high precision demands of the Indian Statistical System in an era of big data, cloud pipelines, and international reporting.
        </p>
</div>
<div class="grid grid-cols-1 lg:grid-cols-2 gap-space-xl items-stretch">
<!-- Pillar 1 -->
<div class="bg-surface-container-low p-space-xl rounded-xl flex flex-col justify-between">
<div>
<div class="flex items-center gap-space-sm mb-space-md">
<div class="w-12 h-12 rounded-lg bg-primary-container text-on-primary flex items-center justify-center">
<span class="material-symbols-outlined text-[28px]">account_tree</span>
</div>
<div>
<span class="text-label-sm font-label-sm uppercase tracking-wider text-secondary font-bold">Core Pillar 01</span>
<h3 class="font-headline-sm text-headline-sm text-primary">Official Statistics Competency Matrix</h3>
</div>
</div>
<p class="font-body-md text-body-md text-on-surface-variant mb-space-md">
              Comprehensive role-based rubrics designed around India's macroeconomic indicators and microdata collections. Includes System of National Accounts (SNA 2008), Consumer Price Index (CPI), Index of Industrial Production (IIP), and UN Sustainable Development Goal (SDG) tracking.
            </p>
<div class="flex flex-wrap gap-space-xs mb-space-md">
<span class="px-2.5 py-1 rounded-full bg-surface-container-highest text-primary text-label-sm font-label-sm font-semibold">SNA Supply-Use Tables</span>
<span class="px-2.5 py-1 rounded-full bg-surface-container-highest text-primary text-label-sm font-label-sm font-semibold">CPI Inflation Basket Weighting</span>
<span class="px-2.5 py-1 rounded-full bg-surface-container-highest text-primary text-label-sm font-label-sm font-semibold">NSS Multi-Stage Sampling</span>
<span class="px-2.5 py-1 rounded-full bg-surface-container-highest text-primary text-label-sm font-label-sm font-semibold">SDG 1-17 National Indicator Framework</span>
</div>
</div>
<div class="pt-space-md flex items-center justify-between text-label-md font-label-md text-primary">
<span class="font-semibold">68 Core Statistical Standards</span>
<span class="text-secondary flex items-center gap-1 cursor-pointer hover:underline">View Matrix Rubrics <span class="material-symbols-outlined text-[16px]">arrow_forward</span></span>
</div>
</div>
<!-- Pillar 2 -->
<div class="bg-surface-container-low p-space-xl rounded-xl flex flex-col justify-between">
<div>
<div class="flex items-center gap-space-sm mb-space-md">
<div class="w-12 h-12 rounded-lg bg-secondary text-on-secondary flex items-center justify-center">
<span class="material-symbols-outlined text-[28px]">terminal</span>
</div>
<div>
<span class="text-label-sm font-label-sm uppercase tracking-wider text-secondary font-bold">Core Pillar 02</span>
<h3 class="font-headline-sm text-headline-sm text-primary">Modern Data &amp; Tech Stack Integration</h3>
</div>
</div>
<p class="font-body-md text-body-md text-on-surface-variant mb-space-md">
              Transitioning from legacy tabular workflows to automated scripting and geospatial dashboards. Upskilling officers in modern Python libraries for billion-row data processing, reproducible R/Shiny dashboards, spatial GIS boundary mapping, and NDAP schema integration.
            </p>
<div class="flex flex-wrap gap-space-xs mb-space-md">
<span class="px-2.5 py-1 rounded-full bg-surface-container-highest text-primary text-label-sm font-label-sm font-semibold">Pandas &amp; Polars for Microdata</span>
<span class="px-2.5 py-1 rounded-full bg-surface-container-highest text-primary text-label-sm font-label-sm font-semibold">R/Survey &amp; Sampling Weights</span>
<span class="px-2.5 py-1 rounded-full bg-surface-container-highest text-primary text-label-sm font-label-sm font-semibold">QGIS &amp; PostGIS Village Boundaries</span>
<span class="px-2.5 py-1 rounded-full bg-surface-container-highest text-primary text-label-sm font-label-sm font-semibold">NDAP API Pipelines</span>
</div>
</div>
<div class="pt-space-md flex items-center justify-between text-label-md font-label-md text-primary">
<span class="font-semibold">Hands-on Cloud Compute Sandboxes</span>
<span class="text-secondary flex items-center gap-1 cursor-pointer hover:underline">Launch Virtual Lab <span class="material-symbols-outlined text-[16px]">arrow_forward</span></span>
</div>
</div>
<!-- Pillar 3 -->
<div class="bg-surface-container-low p-space-xl rounded-xl flex flex-col justify-between">
<div>
<div class="flex items-center gap-space-sm mb-space-md">
<div class="w-12 h-12 rounded-lg bg-surface-tint text-on-primary flex items-center justify-center">
<span class="material-symbols-outlined text-[28px]">handshake</span>
</div>
<div>
<span class="text-label-sm font-label-sm uppercase tracking-wider text-secondary font-bold">Core Pillar 03</span>
<h3 class="font-headline-sm text-headline-sm text-primary">iGOT Karmayogi &amp; NSSTA Synergy</h3>
</div>
</div>
<p class="font-body-md text-body-md text-on-surface-variant mb-space-md">
              Unifying national online civil service learning with institutional physical training. Officers receive automated recommendations on iGOT based on their Cadre Training Plan (CTP), followed by hands-on residential workshops conducted at NSSTA TPAC Greater Noida.
            </p>
<div class="flex flex-wrap gap-space-xs mb-space-md">
<span class="px-2.5 py-1 rounded-full bg-surface-container-highest text-primary text-label-sm font-label-sm font-semibold">NSSTA Residential Cohorts</span>
<span class="px-2.5 py-1 rounded-full bg-surface-container-highest text-primary text-label-sm font-label-sm font-semibold">iGOT Self-Paced Credentials</span>
<span class="px-2.5 py-1 rounded-full bg-surface-container-highest text-primary text-label-sm font-label-sm font-semibold">Annual TPAC Calendar Alignment</span>
<span class="px-2.5 py-1 rounded-full bg-surface-container-highest text-primary text-label-sm font-label-sm font-semibold">Cadre Transfer-Linked Triggers</span>
</div>
</div>
<div class="pt-space-md flex items-center justify-between text-label-md font-label-md text-primary">
<span class="font-semibold">DoPT CBC Compliant</span>
<span class="text-secondary flex items-center gap-1 cursor-pointer hover:underline">Explore Course Catalog <span class="material-symbols-outlined text-[16px]">arrow_forward</span></span>
</div>
</div>
<!-- Pillar 4 -->
<div class="bg-surface-container-low p-space-xl rounded-xl flex flex-col justify-between">
<div>
<div class="flex items-center gap-space-sm mb-space-md">
<div class="w-12 h-12 rounded-lg bg-primary text-on-primary flex items-center justify-center">
<span class="material-symbols-outlined text-[28px]">psychology</span>
</div>
<div>
<span class="text-label-sm font-label-sm uppercase tracking-wider text-secondary font-bold">Core Pillar 04</span>
<h3 class="font-headline-sm text-headline-sm text-primary">AI Assessment &amp; Evaluation Engine</h3>
</div>
</div>
<p class="font-body-md text-body-md text-on-surface-variant mb-space-md">
              High-security sovereign AI pipeline trained on official statistical manual methodologies, field inspection handbooks, and survey guidelines. Generates psychometrically calibrated question items, case studies, and coding challenges while preventing question leaks.
            </p>
<div class="flex flex-wrap gap-space-xs mb-space-md">
<span class="px-2.5 py-1 rounded-full bg-surface-container-highest text-primary text-label-sm font-label-sm font-semibold">Manual &amp; PDF Ingestion Pipeline</span>
<span class="px-2.5 py-1 rounded-full bg-surface-container-highest text-primary text-label-sm font-label-sm font-semibold">Item Response Theory (IRT)</span>
<span class="px-2.5 py-1 rounded-full bg-surface-container-highest text-primary text-label-sm font-label-sm font-semibold">Plagiarism &amp; Hallucination Guardrails</span>
<span class="px-2.5 py-1 rounded-full bg-surface-container-highest text-primary text-label-sm font-label-sm font-semibold">Bilingual (Hindi &amp; English) Testing</span>
</div>
</div>
<div class="pt-space-md flex items-center justify-between text-label-md font-label-md text-primary">
<span class="font-semibold">MoSPI Cloud Hosted (NIC MeghRaj)</span>
<span class="text-secondary flex items-center gap-1 cursor-pointer hover:underline">Read Architecture Whitepaper <span class="material-symbols-outlined text-[16px]">arrow_forward</span></span>
</div>
</div>
</div>
</div>
</section>
<!-- SECTION 5: Cadre Competency Matrix Snapshot (Structured Data Matrix) -->
<section class="w-full bg-surface py-space-xl relative" id="matrix-preview">
<div class="max-w-7xl mx-auto px-gutter">
<!-- Section Header -->
<div class="flex flex-col md:flex-row md:items-end justify-between mb-space-lg gap-space-md">
<div>
<div class="inline-flex items-center gap-space-xs px-2.5 py-1 rounded bg-surface-container-high text-label-sm font-label-sm text-primary font-bold uppercase tracking-wider mb-space-xs">
            Ministry Capability Pulse
          </div>
<h2 class="font-headline-lg text-headline-lg text-primary tracking-tight">Cadre Competency Matrix Snapshot</h2>
<p class="font-body-md text-body-md text-on-surface-variant mt-1">
            Aggregated statistical readiness scores across key MoSPI functional divisions.
          </p>
</div>
<div class="flex items-center gap-space-sm">
<span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-surface-container-lowest text-label-sm font-label-sm text-on-surface shadow-sm">
<span class="w-2 h-2 rounded-full bg-secondary-container"></span> Cycle: Q3 FY 2024-25
          </span>
<button class="inline-flex items-center gap-1 px-3 py-1.5 rounded bg-surface-container text-primary font-label-sm text-label-sm hover:bg-surface-container-highest transition-colors" type="button">
<span class="material-symbols-outlined text-[16px]">download</span> Export Report
          </button>
</div>
</div>
<!-- Matrix Table Card -->
<div class="bg-surface-container-lowest rounded-xl shadow-md overflow-hidden">
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-surface-container-low text-label-sm font-label-sm text-on-surface-variant uppercase tracking-wider">
<th class="py-space-md px-space-md font-semibold">Division / Cadre Node</th>
<th class="py-space-md px-space-md font-semibold">Survey Sampling</th>
<th class="py-space-md px-space-md font-semibold">SNA &amp; Accounts</th>
<th class="py-space-md px-space-md font-semibold">Python / Modern R</th>
<th class="py-space-md px-space-md font-semibold">Data Privacy &amp; Act</th>
<th class="py-space-md px-space-md font-semibold">Overall Cadre Health</th>
<th class="py-space-md px-space-md font-semibold text-right">Action Plan</th>
</tr>
</thead>
<tbody class="divide-y divide-surface-container text-body-md font-body-md text-primary">
<!-- Row 1: NAD -->
<tr class="hover:bg-surface-container-low/50 transition-colors">
<td class="py-space-md px-space-md">
<div class="font-bold text-primary">National Accounts Division (NAD)</div>
<div class="text-label-sm font-label-sm text-on-surface-variant">Sardar Patel Bhawan, New Delhi • 240 Officers</div>
</td>
<td class="py-space-md px-space-md">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-surface-container-high text-label-sm font-label-sm font-semibold text-primary">
<span class="material-symbols-outlined text-[14px]">check</span> Met (82%)
                  </span>
</td>
<td class="py-space-md px-space-md">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-surface-container-high text-label-sm font-label-sm font-semibold text-primary">
<span class="material-symbols-outlined text-[14px]">star</span> Benchmark (94%)
                  </span>
</td>
<td class="py-space-md px-space-md">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-secondary-fixed text-label-sm font-label-sm font-bold text-on-secondary-fixed">
                    Moderate Gap (54%)
                  </span>
</td>
<td class="py-space-md px-space-md">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-surface-container-high text-label-sm font-label-sm font-semibold text-primary">
                    Met (89%)
                  </span>
</td>
<td class="py-space-md px-space-md">
<div class="flex items-center gap-2">
<div class="w-16 h-2 bg-surface-container-highest rounded-full overflow-hidden">
<div class="h-full bg-primary" style="width: 79%;"></div>
</div>
<span class="font-bold text-label-sm font-label-sm">79.8%</span>
</div>
</td>
<td class="py-space-md px-space-md text-right">
<span class="text-secondary font-semibold text-label-sm font-label-sm hover:underline cursor-pointer">Deploy R-Lab Cohort →</span>
</td>
</tr>
<!-- Row 2: FOD NSSO -->
<tr class="hover:bg-surface-container-low/50 transition-colors">
<td class="py-space-md px-space-md">
<div class="font-bold text-primary">Field Operations Division (FOD - NSSO)</div>
<div class="text-label-sm font-label-sm text-on-surface-variant">6 Zonal • 49 Regional Offices • 4,200 Officers</div>
</td>
<td class="py-space-md px-space-md">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-surface-container-high text-label-sm font-label-sm font-semibold text-primary">
<span class="material-symbols-outlined text-[14px]">star</span> Benchmark (96%)
                  </span>
</td>
<td class="py-space-md px-space-md">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-secondary-fixed text-label-sm font-label-sm font-bold text-on-secondary-fixed">
                    Moderate Gap (61%)
                  </span>
</td>
<td class="py-space-md px-space-md">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-error-container text-label-sm font-label-sm font-bold text-on-error-container">
                    Critical Gap (38%)
                  </span>
</td>
<td class="py-space-md px-space-md">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-surface-container-high text-label-sm font-label-sm font-semibold text-primary">
                    Met (92%)
                  </span>
</td>
<td class="py-space-md px-space-md">
<div class="flex items-center gap-2">
<div class="w-16 h-2 bg-surface-container-highest rounded-full overflow-hidden">
<div class="h-full bg-secondary" style="width: 71%;"></div>
</div>
<span class="font-bold text-label-sm font-label-sm">71.7%</span>
</div>
</td>
<td class="py-space-md px-space-md text-right">
<span class="text-secondary font-semibold text-label-sm font-label-sm hover:underline cursor-pointer">Assign CAPI Tablets →</span>
</td>
</tr>
<!-- Row 3: PSD -->
<tr class="hover:bg-surface-container-low/50 transition-colors">
<td class="py-space-md px-space-md">
<div class="font-bold text-primary">Price Statistics Division (PSD)</div>
<div class="text-label-sm font-label-sm text-on-surface-variant">CPI &amp; Price Indices Wing • 180 Officers</div>
</td>
<td class="py-space-md px-space-md">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-surface-container-high text-label-sm font-label-sm font-semibold text-primary">
                    Met (88%)
                  </span>
</td>
<td class="py-space-md px-space-md">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-surface-container-high text-label-sm font-label-sm font-semibold text-primary">
                    Met (85%)
                  </span>
</td>
<td class="py-space-md px-space-md">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-surface-container-high text-label-sm font-label-sm font-semibold text-primary">
                    Met (78%)
                  </span>
</td>
<td class="py-space-md px-space-md">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-surface-container-high text-label-sm font-label-sm font-semibold text-primary">
                    Met (94%)
                  </span>
</td>
<td class="py-space-md px-space-md">
<div class="flex items-center gap-2">
<div class="w-16 h-2 bg-surface-container-highest rounded-full overflow-hidden">
<div class="h-full bg-surface-tint" style="width: 86%;"></div>
</div>
<span class="font-bold text-label-sm font-label-sm">86.2%</span>
</div>
</td>
<td class="py-space-md px-space-md text-right">
<span class="text-secondary font-semibold text-label-sm font-label-sm hover:underline cursor-pointer">Hedonic CPI Module →</span>
</td>
</tr>
<!-- Row 4: CPD -->
<tr class="hover:bg-surface-container-low/50 transition-colors">
<td class="py-space-md px-space-md">
<div class="font-bold text-primary">Coordination &amp; Publication Division (CPD)</div>
<div class="text-label-sm font-label-sm text-on-surface-variant">SDG Dashboards &amp; International Affairs • 130 Officers</div>
</td>
<td class="py-space-md px-space-md">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-surface-container-high text-label-sm font-label-sm font-semibold text-primary">
                    Met (75%)
                  </span>
</td>
<td class="py-space-md px-space-md">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-surface-container-high text-label-sm font-label-sm font-semibold text-primary">
                    Met (79%)
                  </span>
</td>
<td class="py-space-md px-space-md">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-surface-container-high text-label-sm font-label-sm font-semibold text-primary">
<span class="material-symbols-outlined text-[14px]">star</span> Benchmark (91%)
                  </span>
</td>
<td class="py-space-md px-space-md">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-surface-container-high text-label-sm font-label-sm font-semibold text-primary">
                    Met (88%)
                  </span>
</td>
<td class="py-space-md px-space-md">
<div class="flex items-center gap-2">
<div class="w-16 h-2 bg-surface-container-highest rounded-full overflow-hidden">
<div class="h-full bg-primary" style="width: 83%;"></div>
</div>
<span class="font-bold text-label-sm font-label-sm">83.2%</span>
</div>
</td>
<td class="py-space-md px-space-md text-right">
<span class="text-secondary font-semibold text-label-sm font-label-sm hover:underline cursor-pointer">SDG Metadata Sync →</span>
</td>
</tr>
</tbody>
</table>
</div>
<div class="bg-surface-container-low px-space-lg py-space-sm flex flex-col sm:flex-row items-center justify-between text-label-sm font-label-sm text-on-surface-variant gap-space-xs">
<div class="flex items-center gap-space-md">
<span class="flex items-center gap-1"><span class="w-2 h-2 rounded-full bg-surface-tint inline-block"></span> Benchmark (&gt;90%)</span>
<span class="flex items-center gap-1"><span class="w-2 h-2 rounded-full bg-primary inline-block"></span> Target Met (75-89%)</span>
<span class="flex items-center gap-1"><span class="w-2 h-2 rounded-full bg-secondary inline-block"></span> Moderate Gap (50-74%)</span>
<span class="flex items-center gap-1"><span class="w-2 h-2 rounded-full bg-error inline-block"></span> Critical Deficit (&lt;50%)</span>
</div>
<span>Refreshed daily from NSSTA Assessment Engine</span>
</div>
</div>
</div>
</section>
<!-- SECTION 6: Institutional Integrations & Final Sovereign Parichay Card -->
<section class="w-full bg-surface-container-lowest py-space-xl relative">
<div class="max-w-7xl mx-auto px-gutter">
<!-- Institutional Badges Ecosystem -->
<div class="mb-space-xl">
<div class="text-center max-w-2xl mx-auto mb-space-lg">
<span class="text-label-sm font-label-sm uppercase tracking-widest text-on-surface-variant font-semibold">Institutional Triad</span>
<h2 class="font-headline-sm text-headline-sm text-primary mt-1">Interlinked with Sovereign Governance Infrastructure</h2>
</div>
<div class="grid grid-cols-2 md:grid-cols-4 gap-space-md">
<div class="bg-surface-container-low p-space-md rounded-xl text-center flex flex-col items-center justify-center">
<div class="w-10 h-10 rounded-full bg-primary-container text-on-primary flex items-center justify-center mb-space-xs font-bold text-[15px]">MoSPI</div>
<div class="font-label-md text-label-md text-primary font-semibold">Ministry of Statistics</div>
<div class="text-label-sm font-label-sm text-on-surface-variant mt-0.5">Apex Cadre Authority</div>
</div>
<div class="bg-surface-container-low p-space-md rounded-xl text-center flex flex-col items-center justify-center">
<div class="w-10 h-10 rounded-full bg-secondary text-on-secondary flex items-center justify-center mb-space-xs font-bold text-[14px]">NSSTA</div>
<div class="font-label-md text-label-md text-primary font-semibold">NSSTA Greater Noida</div>
<div class="text-label-sm font-label-sm text-on-surface-variant mt-0.5">National Training Academy</div>
</div>
<div class="bg-surface-container-low p-space-md rounded-xl text-center flex flex-col items-center justify-center">
<div class="w-10 h-10 rounded-full bg-surface-tint text-on-primary flex items-center justify-center mb-space-xs font-bold text-[14px]">iGOT</div>
<div class="font-label-md text-label-md text-primary font-semibold">Karmayogi Bharat</div>
<div class="text-label-sm font-label-sm text-on-surface-variant mt-0.5">CBC e-Learning Grid</div>
</div>
<div class="bg-surface-container-low p-space-md rounded-xl text-center flex flex-col items-center justify-center">
<div class="w-10 h-10 rounded-full bg-primary text-on-primary flex items-center justify-center mb-space-xs font-bold text-[14px]">NDAP</div>
<div class="font-label-md text-label-md text-primary font-semibold">NITI Aayog NDAP</div>
<div class="text-label-sm font-label-sm text-on-surface-variant mt-0.5">Microdata Access Layer</div>
</div>
</div>
</div>
<!-- High-Impact Sovereign Parichay Action Block -->
<div class="relative bg-gradient-to-r from-primary-container via-primary to-primary-container text-on-primary rounded-2xl p-space-xl overflow-hidden shadow-xl" id="parichay-sso">
<!-- Subtle India Tricolor Micro Strip on Top Edge -->
<div class="absolute top-0 left-0 right-0 h-1.5 bg-gradient-to-r from-secondary-container via-surface-container-lowest to-surface-tint"></div>
<div class="grid grid-cols-1 lg:grid-cols-12 gap-space-lg items-center relative z-10">
<div class="lg:col-span-8">
<div class="inline-flex items-center gap-space-xs px-2.5 py-1 rounded bg-surface-container-highest/20 text-label-sm font-label-sm text-secondary-fixed mb-space-sm uppercase tracking-wider">
<span class="material-symbols-outlined text-[14px]">lock</span> Sovereign Single Sign-On Enabled
            </div>
<h2 class="font-headline-xl text-headline-xl text-on-primary tracking-tight mb-space-xs">
              Ready to Assess Your Cadre Competency?
            </h2>
<p class="font-body-lg text-body-lg text-surface-container max-w-2xl leading-relaxed mb-space-md">
              Log in via Parichay single sign-on or your ministry e-HRMS credentials to generate your baseline competency diagnostic, identify skill gaps, and activate your personal NSSTA-iGOT training pathway.
            </p>
<div class="flex flex-wrap items-center gap-space-md text-label-sm font-label-sm text-surface-container-high">
<span class="flex items-center gap-1"><span class="material-symbols-outlined text-[16px] text-secondary-fixed">check_circle</span> No password creation required</span>
<span class="flex items-center gap-1"><span class="material-symbols-outlined text-[16px] text-secondary-fixed">check_circle</span> Gov.in / Nic.in 2FA Enabled</span>
<span class="flex items-center gap-1"><span class="material-symbols-outlined text-[16px] text-secondary-fixed">check_circle</span> Instant APAR Sync</span>
</div>
</div>
<div class="lg:col-span-4 flex flex-col items-start lg:items-end gap-space-sm">
<a class="w-full sm:w-auto inline-flex items-center justify-center gap-space-xs px-space-xl py-3.5 rounded bg-secondary hover:bg-on-secondary-fixed-variant text-on-secondary font-label-lg text-label-lg transition-all shadow-lg hover:shadow-xl text-center" href="<?= $dashboardUrl ?>">
<span class="material-symbols-outlined text-[20px]">fingerprint</span>
<span>Authenticate with Parichay</span>
</a>
<a class="w-full sm:w-auto inline-flex items-center justify-center gap-space-xs px-space-lg py-2.5 rounded bg-surface-container-highest/20 hover:bg-surface-container-highest/30 text-on-primary font-label-md text-label-md transition-all text-center" href="<?= BASE_URL ?>/pages/helpdesk.php">
<span class="material-symbols-outlined text-[18px]">help</span>
<span>Need Access or SSS Enrolment?</span>
</a>
<div class="text-label-sm font-label-sm text-surface-container-high mt-1 text-right">
              Helpline: 0120-234-5678 (NSSTA Campus, Plot No. 22)
            </div>
</div>
</div>
</div>
</div>
</section>
</div></main><footer class="w-full bg-surface-container-low text-on-surface-variant mt-space-xl"><div class="max-w-7xl mx-auto px-gutter py-space-xl grid grid-cols-1 md:grid-cols-4 gap-space-lg"><div class="md:col-span-2"><div class="font-headline-sm text-headline-sm text-primary mb-space-xs">Gap2Grow | National Statistical Academy</div><p class="font-body-sm text-body-sm text-on-surface-variant max-w-xl">AI-orchestrated Competency Assessment, Skill Gap Identification, and Precision Learning Pathway Architecture for the Indian Statistical Service (ISS) and Subordinate Statistical Service (SSS).</p><div class="mt-space-md flex items-center gap-space-sm text-label-sm font-label-sm text-on-surface"><span class="bg-surface-container-high px-2 py-1 rounded">GIGW 3.0 Certified</span><span class="bg-surface-container-high px-2 py-1 rounded">STQC Audited</span><span class="bg-surface-container-high px-2 py-1 rounded">MoSPI v2.4.1</span></div></div><div><div class="font-label-lg text-label-lg text-primary mb-space-sm">Institutional Nodes</div><ul class="space-y-space-xs font-body-sm text-body-sm"><li><a class="hover:text-secondary hover:underline transition-colors" href="https://www.mospi.gov.in" target="_blank" rel="noopener">Ministry of Statistics &amp; Programme Implementation ↗</a></li><li><a class="hover:text-secondary hover:underline transition-colors" href="<?= BASE_URL ?>/pages/nssta-tpac.php">National Statistical Systems Training Academy (NSSTA)</a></li><li><a class="hover:text-secondary hover:underline transition-colors" href="<?= BASE_URL ?>/pages/competency-framework.php">National Accounts &amp; Competency Framework</a></li><li><a class="hover:text-secondary hover:underline transition-colors" href="<?= BASE_URL ?>/pages/helpdesk.php">Computer Centre, East Block-10, R.K. Puram</a></li></ul></div><div><div class="font-label-lg text-label-lg text-primary mb-space-sm">Compliance &amp; Citizen Access</div><ul class="space-y-space-xs font-body-sm text-body-sm"><li><a class="hover:text-secondary hover:underline transition-colors" href="<?= BASE_URL ?>/pages/rti.php">Right to Information (RTI)</a></li><li><a class="hover:text-secondary hover:underline transition-colors" href="<?= BASE_URL ?>/pages/privacy-policy.php">Terms of Digital Service &amp; Privacy Policy</a></li><li><a class="hover:text-secondary hover:underline transition-colors" href="<?= BASE_URL ?>/pages/accessibility.php">Hyperlinking &amp; Accessibility Policies</a></li><li><a class="hover:text-secondary hover:underline transition-colors" href="<?= BASE_URL ?>/pages/web-information-manager.php">Web Information Manager &amp; Directory</a></li></ul></div></div><div class="bg-surface-container text-on-surface-variant py-space-sm"><div class="max-w-7xl mx-auto px-gutter flex flex-col sm:flex-row items-center justify-between text-body-sm font-body-sm"><span>Designed and Maintained by National Statistical Systems Training Academy (NSSTA) with NIC.</span><span>© 2025–2026 MoSPI, Government of India. All rights reserved.</span></div></div></footer></body></html>
