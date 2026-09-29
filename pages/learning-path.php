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
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/><style>@layer base{html,body{margin:0;padding:0;}body{overscroll-behavior:none;}main>:first-child{margin-top:0!important;}main>:last-child{margin-bottom:0!important;}}::-webkit-scrollbar{display:none;}</style><script src="https://cdn.tailwindcss.com"></script><script id="tailwind-config">tailwind.config={darkMode:"class",theme:{extend:{"colors":{"surface-container-lowest":"#ffffff","surface":"#f8f9ff","primary-fixed":"#d5e3ff","secondary-container":"#fc6018","surface-tint":"#495f82","on-background":"#0d1c2f","on-tertiary-fixed":"#00164e","error":"#ba1a1a","on-surface":"#0d1c2f","tertiary-fixed":"#dce1ff","surface-container-highest":"#d5e3fd","on-tertiary":"#ffffff","tertiary-container":"#001e63","on-tertiary-container":"#7088dc","primary":"#001026","surface-container":"#e6eeff","on-surface-variant":"#44474e","background":"#f8f9ff","on-secondary-fixed-variant":"#802a00","on-primary":"#ffffff","tertiary-fixed-dim":"#b6c4ff","secondary":"#a83900","inverse-on-surface":"#ebf1ff","tertiary":"#000c34","on-primary-container":"#778db2","primary-container":"#0b2545","surface-dim":"#ccdbf4","on-primary-fixed":"#001c3b","on-secondary-fixed":"#380d00","inverse-primary":"#b1c7f0","error-container":"#ffdad6","on-error-container":"#93000a","inverse-surface":"#233144","on-tertiary-fixed-variant":"#264191","secondary-fixed":"#ffdbcf","outline":"#74777f","on-primary-fixed-variant":"#314769","on-error":"#ffffff","surface-container-low":"#eff4ff","secondary-fixed-dim":"#ffb59a","surface-variant":"#d5e3fd","on-secondary-container":"#531800","on-secondary":"#ffffff","surface-container-high":"#dde9ff","outline-variant":"#c4c6cf","surface-bright":"#f8f9ff","primary-fixed-dim":"#b1c7f0"},"borderRadius":{"DEFAULT":"0.125rem","lg":"0.25rem","xl":"0.5rem","full":"0.75rem"},"spacing":{"gutter-mobile":"0.75rem","margin-mobile":"1rem","space-lg":"1.5rem","space-sm":"0.5rem","gutter":"1.5rem","space-md":"1rem","space-xs":"0.25rem","margin":"2rem","space-xl":"2.5rem"},"fontFamily":{"label-lg":["Public Sans"],"label-md":["Public Sans"],"body-lg":["Public Sans"],"body-md":["Public Sans"],"headline-lg":["Public Sans"],"headline-xl":["Public Sans"],"headline-lg-mobile":["Public Sans"],"label-sm":["Public Sans"],"headline-md":["Public Sans"],"body-sm":["Public Sans"],"headline-sm":["Public Sans"],"headline-xl-mobile":["Public Sans"]},"fontSize":{"label-lg":["14px",{"lineHeight":"20px","letterSpacing":"0.01em","fontWeight":"600"}],"label-md":["12px",{"lineHeight":"16px","letterSpacing":"0.02em","fontWeight":"600"}],"body-lg":["16px",{"lineHeight":"24px","fontWeight":"400"}],"body-md":["14px",{"lineHeight":"20px","fontWeight":"400"}],"headline-lg":["28px",{"lineHeight":"36px","letterSpacing":"-0.01em","fontWeight":"700"}],"headline-xl":["36px",{"lineHeight":"44px","letterSpacing":"-0.02em","fontWeight":"700"}],"headline-lg-mobile":["22px",{"lineHeight":"30px","letterSpacing":"0em","fontWeight":"700"}],"label-sm":["11px",{"lineHeight":"14px","letterSpacing":"0.03em","fontWeight":"600"}],"headline-md":["22px",{"lineHeight":"28px","fontWeight":"600"}],"body-sm":["12px",{"lineHeight":"18px","fontWeight":"400"}],"headline-sm":["18px",{"lineHeight":"24px","fontWeight":"600"}],"headline-xl-mobile":["28px",{"lineHeight":"36px","letterSpacing":"-0.01em","fontWeight":"700"}]}}}}</script></head><body class="bg-surface font-body-md text-body-md text-on-surface antialiased"><aside class="fixed left-0 top-0 h-full w-72 bg-primary-container text-on-primary z-50 flex flex-col justify-between shadow-[0_4px_20px_rgba(11,37,69,0.25)]"><div class="flex flex-col"><div class="px-space-md py-space-sm bg-primary flex items-center justify-between"><div class="flex items-center gap-space-xs"><span class="material-symbols-outlined text-secondary-container text-[20px]">verified</span><span class="font-label-sm text-label-sm tracking-wide text-primary-fixed">GIGW 3.0 | iGOT Live</span></div><span class="w-2 h-2 rounded-full bg-secondary-container animate-pulse"></span></div><div class="p-space-md bg-tertiary-container"><div class="flex items-center gap-space-sm"><div class="w-11 h-11 rounded-full bg-primary flex items-center justify-center"><span class="material-symbols-outlined text-on-primary text-[24px]">person</span></div><div class="min-w-0 flex-1"><div class="font-label-lg text-label-lg text-on-tertiary truncate">Dr. Rajesh Sharma, ISS</div><div class="font-body-sm text-body-sm text-on-tertiary-container truncate">Joint Director, NAD (CSO)</div></div></div><div class="mt-space-sm pt-space-xs flex items-center justify-between text-label-sm font-label-sm"><span class="bg-secondary text-on-secondary px-2 py-0.5 rounded">ISS Cadre</span><span class="text-primary-fixed truncate">ID: ISS-2008-0412</span></div></div><nav class="px-space-sm py-space-md space-y-1 flex flex-col" data-active-classes="bg-primary text-on-primary font-bold"><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="learner-dashboard" href="<?= BASE_URL ?>/pages/dashboard.php"><span class="material-symbols-outlined text-[20px]">space_dashboard</span><span>Learner Dashboard</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="skill-gap-analysis" href="<?= BASE_URL ?>/pages/skill-gap.php"><span class="material-symbols-outlined text-[20px]">monitoring</span><span>Skill-Gap Analysis</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="my-learning-path" href="<?= BASE_URL ?>/pages/learning-path.php"><span class="material-symbols-outlined text-[20px]">route</span><span>My Learning Path</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="ai-assessment-generator" href="<?= BASE_URL ?>/pages/assessment-generator.php"><span class="material-symbols-outlined text-[20px]">psychology</span><span>AI Assessment Generator</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="igot-course-catalog" href="<?= BASE_URL ?>/pages/igot-courses.php"><span class="material-symbols-outlined text-[20px]">menu_book</span><span>iGOT Course Catalog</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="nssta-tpac-nominations" href="<?= BASE_URL ?>/pages/nssta-programmes.php"><span class="material-symbols-outlined text-[20px]">assignment_ind</span><span>NSSTA TPAC Nominations</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="cadre-analytics" href="<?= BASE_URL ?>/pages/cadre-analytics.php"><span class="material-symbols-outlined text-[20px]">analytics</span><span>Cadre Analytics</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="settings-profile" href="<?= BASE_URL ?>/pages/settings.php"><span class="material-symbols-outlined text-[20px]">manage_accounts</span><span>Settings &amp; Profile</span></a></nav></div><div class="p-space-md bg-tertiary text-on-tertiary"><div class="text-label-sm font-label-sm text-tertiary-fixed-dim uppercase tracking-wider mb-space-xs">Sync Status</div><div class="space-y-1 text-label-sm font-label-sm mb-space-md"><div class="flex items-center justify-between text-on-tertiary"><span>iGOT Karmayogi API</span><span class="text-secondary-fixed">v2.4 Live</span></div><div class="flex items-center justify-between text-on-tertiary"><span>SPARROW / e-HRMS</span><span class="text-secondary-fixed">Active</span></div></div><div class="flex items-center justify-between pt-space-xs"><a class="flex items-center gap-space-xs text-secondary-fixed hover:text-on-tertiary text-label-sm font-label-sm" href="<?= BASE_URL ?>/logout.php"><span class="material-symbols-outlined text-[16px]">logout</span><span>Sign Out</span></a><span class="text-tertiary-fixed-dim text-label-sm font-label-sm">NSSTA-ISS</span></div></div></aside><div class="pl-72"><header class="fixed top-0 left-72 right-0 h-16 bg-surface-container-lowest/90 backdrop-blur-md shadow-[0_1px_8px_rgba(11,37,69,0.06)] z-40 flex items-center justify-between px-space-lg"><div class="flex items-center gap-space-sm text-body-sm font-body-sm text-on-surface-variant"><span>भारत सरकार | MoSPI Official Statistical Cadre Intelligence</span></div><div class="flex items-center gap-space-md"><div class="flex items-center gap-space-xs bg-surface-container-low px-space-sm py-1 rounded-full text-label-sm font-label-sm text-on-surface"><span class="w-2 h-2 rounded-full bg-secondary"></span><span>NAD Division</span></div><div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center"><span class="material-symbols-outlined text-on-primary text-[18px]">person</span></div></div></header><main class="relative pt-16 w-full px-space-lg bg-surface min-h-[calc(100vh-64px)]"><div class="flex flex-col w-full">
<script>
    document.addEventListener('DOMContentLoaded', () => {
      const navLinks = document.querySelectorAll('aside nav a');
      navLinks.forEach(link => {
        if (link.getAttribute('data-path') === 'my-learning-path') {
          link.className = 'flex items-center gap-space-sm px-space-md py-2.5 rounded-lg bg-primary text-on-primary font-bold transition-colors font-label-md text-label-md';
        } else {
          link.className = 'flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md';
        }
      });
    });
  </script>
<!-- Top Institutional Bar & Breadcrumb Matrix -->
<div class="w-full bg-surface-container-low px-space-lg py-space-md shadow-sm">
<div class="flex flex-col lg:flex-row lg:items-center justify-between gap-space-md">
<div>
<nav class="flex items-center gap-space-xs font-label-sm text-label-sm text-on-surface-variant mb-space-xs">
<span class="hover:text-primary transition-colors cursor-pointer">Home</span>
<span class="material-symbols-outlined text-[14px]">chevron_right</span>
<span class="hover:text-primary transition-colors cursor-pointer">Cadre Learning Matrix</span>
<span class="material-symbols-outlined text-[14px]">chevron_right</span>
<span class="text-secondary font-bold">Personalized Learning Pathway</span>
</nav>
<div class="flex items-center gap-space-sm">
<h1 class="font-headline-lg text-headline-lg text-on-surface tracking-tight">
            Personalized Cadre Learning Pathway &amp; Promotion Readiness Track
          </h1>
<span class="hidden md:inline-flex items-center gap-1 bg-surface-container-highest px-2 py-0.5 rounded text-label-sm font-label-sm text-primary">
<span class="material-symbols-outlined text-[14px] text-secondary">verified</span>
            Cadre Code: ISS-L13A
          </span>
</div>
<p class="font-body-md text-body-md text-on-surface-variant mt-1 max-w-4xl">
          Algorithmically synthesized remediation and career progression track mapped directly to Level-13A (Senior Selection Grade) competencies.
        </p>
</div>
<!-- Action Panel Header -->
<div class="flex flex-wrap lg:flex-nowrap items-center gap-space-sm">
<div class="bg-surface-container-lowest p-space-sm rounded-lg shadow-sm flex items-center gap-space-sm min-w-[200px]">
<div class="w-9 h-9 rounded bg-secondary-container/10 flex items-center justify-center text-secondary">
<span class="material-symbols-outlined text-[20px]">calendar_clock</span>
</div>
<div>
<div class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Target Clearance</div>
<div class="font-label-md text-label-md text-on-surface font-bold">30 Nov 2025</div>
</div>
</div>
<div class="flex items-center gap-space-xs">
<button onclick="window.location.href='<?= BASE_URL ?>/api/export-csv.php'" class="bg-primary text-on-primary px-4 py-2 rounded-lg font-label-md text-label-md flex items-center gap-space-xs shadow-sm hover:bg-primary-container transition-all">
<span class="material-symbols-outlined text-[18px]">picture_as_pdf</span>
<span>Study Plan (PDF)</span>
</button>
<button class="bg-surface-container-lowest text-on-surface hover:bg-surface-container px-3 py-2 rounded-lg font-label-md text-label-md flex items-center gap-space-xs shadow-sm transition-all">
<span class="material-symbols-outlined text-[18px] text-secondary">event_repeat</span>
<span class="hidden sm:inline">Export Sync</span>
</button>
</div>
</div>
</div>
<!-- Sync status banner subline -->
<div class="mt-space-sm pt-space-xs flex items-center justify-between font-label-sm text-label-sm text-on-surface-variant">
<div class="flex items-center gap-space-xs">
<span class="w-2 h-2 rounded-full bg-secondary animate-ping"></span>
<span>Auto-synchronized with DoPT CTP &amp; SPARROW e-Dossier (Last ping: Today, 08:30 IST)</span>
</div>
<div class="hidden sm:flex items-center gap-3">
<span>Framework: <strong>MoSPI CS-2024 Rev.3</strong></span>
<span>•</span>
<span>Mandate: <strong>80th NSS Validation Cycle</strong></span>
</div>
</div>
</div>
<!-- Main Grid Workspace -->
<div class="w-full mt-space-md space-y-space-md">
<!-- Top Summary KPI Row -->
<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-space-md">
<!-- KPI 1 -->
<div class="bg-surface-container-lowest p-space-md rounded-xl shadow-sm relative overflow-hidden flex flex-col justify-between">
<div class="absolute -right-3 -top-3 w-20 h-20 bg-primary-fixed/30 rounded-full blur-xl pointer-events-none"></div>
<div>
<div class="flex items-center justify-between text-on-surface-variant">
<span class="font-label-md text-label-md uppercase tracking-wider">Pathway Completion</span>
<span class="material-symbols-outlined text-primary text-[20px]">donut_large</span>
</div>
<div class="mt-2 flex items-baseline gap-2">
<span class="font-headline-xl text-headline-xl text-primary font-bold">48%</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Overall Progress</span>
</div>
<div class="mt-space-sm w-full bg-surface-container-highest h-2 rounded-full overflow-hidden">
<div class="bg-secondary h-full rounded-full transition-all duration-700" style="width: 48%;"></div>
</div>
</div>
<div class="mt-space-sm pt-space-xs flex items-center justify-between font-label-sm text-label-sm text-on-surface-variant">
<span>6 of 12 modules cleared</span>
<span class="text-secondary font-bold">Phase 2 Active</span>
</div>
</div>
<!-- KPI 2 -->
<div class="bg-surface-container-lowest p-space-md rounded-xl shadow-sm relative overflow-hidden flex flex-col justify-between">
<div>
<div class="flex items-center justify-between text-on-surface-variant">
<span class="font-label-md text-label-md uppercase tracking-wider">Mandatory Credit Hours</span>
<span class="material-symbols-outlined text-primary text-[20px]">timelapse</span>
</div>
<div class="mt-2 flex items-baseline gap-2">
<span class="font-headline-xl text-headline-xl text-on-surface font-bold">52<span class="font-headline-sm text-headline-sm text-on-surface-variant"> / 80</span></span>
<span class="font-label-sm text-label-sm text-secondary font-bold">Hours</span>
</div>
<div class="mt-space-sm w-full bg-surface-container-highest h-2 rounded-full overflow-hidden">
<div class="bg-primary h-full rounded-full transition-all duration-700" style="width: 65%;"></div>
</div>
</div>
<div class="mt-space-sm pt-space-xs flex items-center justify-between font-label-sm text-label-sm">
<span class="text-on-surface-variant">28 Credit Hours Required</span>
<span class="bg-surface-container-high text-primary px-2 py-0.5 rounded font-bold">65% Load</span>
</div>
</div>
<!-- KPI 3 -->
<div class="bg-surface-container-lowest p-space-md rounded-xl shadow-sm relative overflow-hidden flex flex-col justify-between">
<div>
<div class="flex items-center justify-between text-on-surface-variant">
<span class="font-label-md text-label-md uppercase tracking-wider">Remediation Deficit</span>
<span class="material-symbols-outlined text-secondary text-[20px]">warning</span>
</div>
<div class="mt-2 flex items-baseline gap-2">
<span class="font-headline-xl text-headline-xl text-secondary font-bold">2 / 4</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Closed</span>
</div>
<div class="mt-space-sm flex gap-1">
<div class="h-2 flex-1 rounded bg-secondary"></div>
<div class="h-2 flex-1 rounded bg-secondary"></div>
<div class="h-2 flex-1 rounded bg-surface-container-highest"></div>
<div class="h-2 flex-1 rounded bg-surface-container-highest"></div>
</div>
</div>
<div class="mt-space-sm pt-space-xs font-label-sm text-label-sm text-on-surface-variant truncate">
<span class="text-on-surface font-semibold">GIS &amp; ML Nowcasting</span> in progress
        </div>
</div>
<!-- KPI 4 -->
<div class="bg-surface-container-lowest p-space-md rounded-xl shadow-sm relative overflow-hidden flex flex-col justify-between">
<div>
<div class="flex items-center justify-between text-on-surface-variant">
<span class="font-label-md text-label-md uppercase tracking-wider">Cadre Promotion Standing</span>
<span class="material-symbols-outlined text-secondary text-[20px]">workspace_premium</span>
</div>
<div class="mt-2 flex items-center gap-2">
<span class="inline-block w-3 h-3 rounded-full bg-secondary"></span>
<span class="font-headline-sm text-headline-sm text-on-surface font-bold">On-Track</span>
</div>
<div class="mt-1 font-body-sm text-body-sm text-on-surface-variant">
            Grade 14 DPC Eligibility Cycle (2025-26)
          </div>
</div>
<div class="mt-space-sm pt-space-xs flex items-center justify-between font-label-sm text-label-sm bg-surface-container-low p-1.5 rounded">
<span class="text-on-surface-variant">APAR Weightage Sync:</span>
<span class="font-bold text-primary">100% Cleared</span>
</div>
</div>
</div>
<!-- Main Content Dual-Track Area + Sticky Sidebar Layout -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-space-lg items-start pb-space-lg">
<!-- Left Column: 8 Cols - Roadmap & Modules -->
<div class="lg:col-span-8 space-y-space-md">
<!-- Recommendation Engine Standalone Gateway Banner -->
<div class="bg-gradient-to-r from-primary to-primary-container text-on-primary p-space-md rounded-xl shadow-sm flex flex-col sm:flex-row sm:items-center justify-between gap-space-sm">
  <div class="flex items-center gap-space-sm">
    <div class="w-10 h-10 rounded-lg bg-surface-container-lowest/10 flex items-center justify-center shrink-0">
      <span class="material-symbols-outlined text-secondary-container text-[24px]">model_training</span>
    </div>
    <div>
      <div class="font-label-md text-label-md text-on-primary font-bold">Empirical Gap-to-Course Recommendation Engine</div>
      <div class="font-body-sm text-body-sm text-primary-fixed">Multi-Factor Suitability: Domain (50%) + Difficulty Proximity (30%) + Recency (20%)</div>
    </div>
  </div>
  <a href="/SIH/pages/recommendation-engine.php" class="px-4 py-2 bg-secondary text-on-secondary hover:bg-secondary-container rounded-lg font-label-md text-label-md font-bold transition-all shadow-sm flex items-center justify-center gap-1.5 shrink-0">
    <span class="material-symbols-outlined text-[18px]">query_stats</span>
    <span>See how this was chosen</span>
  </a>
</div>
<!-- Tabs Filter Bar -->
<div class="bg-surface-container-lowest p-2 rounded-xl shadow-sm flex flex-wrap items-center justify-between gap-2">
<div class="flex items-center gap-1">
<button class="px-4 py-2 rounded-lg bg-primary text-on-primary font-label-md text-label-md transition-all shadow-sm flex items-center gap-1.5">
<span class="material-symbols-outlined text-[16px]">alt_route</span>
<span>All Milestones (5 Phases)</span>
</button>
<button class="px-4 py-2 rounded-lg text-on-surface hover:bg-surface-container font-label-md text-label-md transition-all flex items-center gap-1.5">
<span class="material-symbols-outlined text-[16px] text-secondary">crisis_alert</span>
<span>Mandatory Remediation Tracks (2)</span>
</button>
<button class="px-4 py-2 rounded-lg text-on-surface hover:bg-surface-container font-label-md text-label-md transition-all flex items-center gap-1.5">
<span class="material-symbols-outlined text-[16px] text-on-surface-variant">school</span>
<span>Leadership Electives (3)</span>
</button>
</div>
<div class="text-label-sm font-label-sm text-on-surface-variant px-3 py-1 flex items-center gap-1">
<span class="material-symbols-outlined text-[16px] text-primary">filter_list</span>
<span>Sorted by Precedence</span>
</div>
</div>
<!-- Timeline Container -->
<div class="relative pl-6 sm:pl-8 space-y-space-lg">
<!-- Continuous Vertical Timeline Connector -->
<div class="absolute left-3 sm:left-4 top-4 bottom-4 w-0.5 bg-surface-container-highest"></div>
<!-- PHASE 1: COMPLETED -->
<div class="relative bg-surface-container-lowest p-space-md sm:p-space-lg rounded-xl shadow-sm">
<!-- Timeline Marker -->
<div class="absolute -left-6 sm:-left-8 top-6 -translate-x-1/2 w-7 h-7 rounded-full bg-primary text-on-primary flex items-center justify-center shadow-md">
<span class="material-symbols-outlined text-[18px]">check</span>
</div>
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-space-xs pb-space-sm">
<div>
<div class="flex items-center gap-2">
<span class="font-headline-sm text-headline-sm text-on-surface font-bold">Phase 1: Foundational Modern Data Stack</span>
<span class="bg-surface-container-high text-primary px-2.5 py-0.5 rounded-full font-label-sm text-label-sm font-bold flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">task_alt</span>
                    Completed
                  </span>
</div>
<div class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">
                  Pre-requisite statistical toolchain harmonization • Cleared 15 Aug 2025
                </div>
</div>
<div class="flex items-center gap-2">
<span class="bg-surface-container text-on-surface px-2 py-1 rounded font-label-sm text-label-sm font-bold">Score: 94%</span>
<span class="bg-surface-container text-primary font-bold px-2 py-1 rounded font-label-sm text-label-sm">16 Credits</span>
</div>
</div>
<!-- Course Roster for Phase 1 -->
<div class="mt-space-sm grid grid-cols-1 sm:grid-cols-2 gap-space-sm">
<div class="p-space-sm bg-surface-container-low rounded-lg flex items-start justify-between">
<div>
<div class="font-label-md text-label-md text-on-surface font-bold">Python for Survey Microdata</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">Pandas, Polars, &amp; DuckDB Aggregations</div>
<div class="mt-2 font-label-sm text-label-sm text-primary flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">verified_user</span>
                    Verified iGOT Karmayogi v2.4
                  </div>
</div>
<span class="material-symbols-outlined text-primary text-[20px]">check_circle</span>
</div>
<div class="p-space-sm bg-surface-container-low rounded-lg flex items-start justify-between">
<div>
<div class="font-label-md text-label-md text-on-surface font-bold">PostgreSQL Spatial Extensions</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">PostGIS Queries for Census &amp; NSS Blocks</div>
<div class="mt-2 font-label-sm text-label-sm text-primary flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">verified_user</span>
                    Verified NSSTA Lab Assessment
                  </div>
</div>
<span class="material-symbols-outlined text-primary text-[20px]">check_circle</span>
</div>
</div>
<div class="mt-space-sm pt-space-xs flex items-center justify-between font-label-sm text-label-sm text-on-surface-variant">
<a class="text-primary hover:underline flex items-center gap-1 font-bold" href="<?= BASE_URL ?>/pages/certifications.php">
<span class="material-symbols-outlined text-[16px]">file_download</span>
<span>View iGOT Verification Token #NIC-88219-ISS</span>
</a>
<span>Accreditation Validated by NSSTA Academic Cell</span>
</div>
</div>
<!-- PHASE 2: IN PROGRESS (CRITICAL PRIORITY) -->
<div class="relative bg-surface-container-lowest p-space-md sm:p-space-lg rounded-xl shadow-md">
<!-- Timeline Marker (Glowing active) -->
<div class="absolute -left-6 sm:-left-8 top-6 -translate-x-1/2 w-7 h-7 rounded-full bg-secondary text-on-secondary flex items-center justify-center shadow-lg animate-pulse">
<span class="material-symbols-outlined text-[18px]">play_arrow</span>
</div>
<!-- Priority Alert Header Badge -->
<div class="flex flex-wrap items-center justify-between gap-2 pb-space-sm">
<div>
<div class="flex items-center gap-2">
<span class="font-headline-sm text-headline-sm text-on-surface font-bold">Phase 2: Spatial GIS Microdata Disaggregation</span>
<span class="bg-secondary-fixed text-on-secondary-fixed px-2.5 py-0.5 rounded-full font-label-sm text-label-sm font-bold flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">priority_high</span>
                    Priority Deficit Action
                  </span>
</div>
<div class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">
                  Required Competency for 80th NSS Cycle &amp; Sub-district GDP Allocation
                </div>
</div>
<div class="text-right">
<span class="bg-secondary text-on-secondary px-3 py-1 rounded font-label-md text-label-md font-bold">In Progress (65%)</span>
</div>
</div>
<!-- Modality / Instructional Architecture Strip -->
<div class="mt-space-xs p-space-sm bg-surface-container-low rounded-lg grid grid-cols-1 md:grid-cols-3 gap-space-sm text-label-sm font-label-sm">
<div class="flex items-center gap-2 text-on-surface">
<span class="material-symbols-outlined text-secondary text-[18px]">hub</span>
<span><strong>Modality:</strong> Blended Framework</span>
</div>
<div class="flex items-center gap-2 text-on-surface">
<span class="material-symbols-outlined text-primary text-[18px]">timer</span>
<span><strong>Pacing:</strong> 12 hrs Virtual + 3-Day Residential</span>
</div>
<div class="flex items-center gap-2 text-on-surface">
<span class="material-symbols-outlined text-secondary text-[18px]">apartment</span>
<span><strong>Venue:</strong> NSSTA Campus, Greater Noida</span>
</div>
</div>
<!-- Current Active Focus Card -->
<div class="mt-space-md p-space-md bg-surface-container-high rounded-xl space-y-space-sm">
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md uppercase tracking-wider text-primary font-bold flex items-center gap-1.5">
<span class="material-symbols-outlined text-[16px] text-secondary">computer</span>
                  Current Active Module: Module 3
                </span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Step 4 of 6</span>
</div>
<div class="font-body-lg text-body-lg font-bold text-on-surface">
                Urban Frame Survey (UFS) Georeferencing, Spatial Autocorrelation &amp; QGIS Python Scripting
              </div>
<p class="font-body-md text-body-md text-on-surface-variant">
                Synthesizing satellite raster bands with field-enumerated polygon boundaries for high-density district surveys. Practical lab exercise #4 underway.
              </p>
<!-- Progress Bar -->
<div class="space-y-1">
<div class="flex justify-between font-label-sm text-label-sm text-on-surface-variant">
<span>Module Progress</span>
<span class="font-bold text-on-surface">65% Completed</span>
</div>
<div class="w-full bg-surface-container-highest h-2.5 rounded-full overflow-hidden">
<div class="bg-secondary h-full rounded-full transition-all duration-500" style="width: 65%;"></div>
</div>
</div>
<!-- Workshop Schedule Banner -->
<div class="bg-surface-container-lowest p-space-sm rounded-lg flex items-center justify-between gap-space-sm">
<div class="flex items-center gap-space-sm">
<div class="w-10 h-10 rounded bg-primary text-on-primary flex flex-col items-center justify-center text-center">
<span class="text-[10px] font-bold leading-none uppercase">Oct</span>
<span class="text-[14px] font-bold leading-none">14</span>
</div>
<div>
<div class="font-label-md text-label-md font-bold text-on-surface">Residential Lab: NSSTA Greater Noida</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">Mandatory Hands-on GIS Defense with Dr. Arindam Bose</div>
</div>
</div>
<span class="bg-surface-container-highest text-primary font-label-sm text-label-sm px-2.5 py-1 rounded font-bold">Confirmed Seat #42</span>
</div>
<!-- Module Action CTAs -->
<div class="pt-space-xs flex flex-wrap items-center gap-space-sm">
<button class="bg-secondary text-on-secondary px-5 py-2.5 rounded-lg font-label-md text-label-md font-bold flex items-center gap-2 shadow-sm hover:opacity-95 transition-all">
<span class="material-symbols-outlined text-[18px]">terminal</span>
<span>Resume Module 3 in Virtual Lab</span>
</button>
<a href="/SIH/pages/recommendation-engine.php" class="bg-surface-container-high hover:bg-surface-container-highest text-primary px-4 py-2.5 rounded-lg font-label-md text-label-md font-bold flex items-center gap-2 shadow-sm transition-all">
<span class="material-symbols-outlined text-[18px] text-secondary">tune</span>
<span>See how this was chosen</span>
</a>
<button class="bg-surface-container-lowest text-primary hover:bg-surface-container px-4 py-2.5 rounded-lg font-label-md text-label-md font-bold flex items-center gap-2 shadow-sm transition-all">
<span class="material-symbols-outlined text-[18px] text-secondary">mark_email_read</span>
<span>View NSSTA Campus Joining Letter</span>
</button>
</div>
</div>
</div>
<!-- PHASE 3: SCHEDULED -->
<div class="relative bg-surface-container-lowest p-space-md sm:p-space-lg rounded-xl shadow-sm opacity-95">
<!-- Timeline Marker -->
<div class="absolute -left-6 sm:-left-8 top-6 -translate-x-1/2 w-7 h-7 rounded-full bg-surface-container-highest text-on-surface-variant flex items-center justify-center shadow">
<span class="material-symbols-outlined text-[18px]">lock_clock</span>
</div>
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-space-xs pb-space-sm">
<div>
<div class="flex items-center gap-2">
<span class="font-headline-sm text-headline-sm text-on-surface font-bold">Phase 3: Machine Learning Nowcasting for Macroeconomic Indicators</span>
<span class="bg-surface-container text-on-surface-variant px-2.5 py-0.5 rounded-full font-label-sm text-label-sm font-bold">
                    Scheduled (Nov 2025)
                  </span>
</div>
<div class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">
                  High-frequency indicators &amp; National Accounts Division (NAD) integration
                </div>
</div>
<div class="flex items-center gap-2">
<span class="bg-surface-container-high text-primary px-2.5 py-1 rounded font-label-sm text-label-sm font-bold">18 Study Hours</span>
<span class="bg-surface-container-high text-primary px-2.5 py-1 rounded font-label-sm text-label-sm font-bold">6 Credits</span>
</div>
</div>
<div class="mt-space-sm p-space-sm bg-surface-container-low rounded-lg space-y-2">
<div class="font-label-md text-label-md font-bold text-on-surface">Curriculum Focus Areas:</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">
                Mixed-Data Sampling (MIDAS) regression models, gradient-boosted GDP estimators, high-frequency GSTN invoicing and e-way bill transaction ingestion pipelines.
              </p>
<div class="pt-1 flex flex-wrap items-center justify-between gap-2 text-label-sm font-label-sm">
<div class="flex items-center gap-2 text-on-surface-variant">
<span class="material-symbols-outlined text-[16px] text-secondary">info</span>
<span><strong>Prerequisite:</strong> Successful validation &amp; clearance of Phase 2</span>
</div>
<button class="bg-primary text-on-primary hover:bg-primary-container px-3.5 py-1.5 rounded-lg font-label-sm text-label-sm font-bold flex items-center gap-1 transition-all">
<span class="material-symbols-outlined text-[16px]">how_to_reg</span>
<span>Pre-register for November Cohort</span>
</button>
</div>
</div>
</div>
<!-- PHASE 4: SCHEDULED -->
<div class="relative bg-surface-container-lowest p-space-md sm:p-space-lg rounded-xl shadow-sm opacity-90">
<!-- Timeline Marker -->
<div class="absolute -left-6 sm:-left-8 top-6 -translate-x-1/2 w-7 h-7 rounded-full bg-surface-container-highest text-on-surface-variant flex items-center justify-center shadow">
<span class="material-symbols-outlined text-[18px]">policy</span>
</div>
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-space-xs">
<div>
<div class="flex items-center gap-2">
<span class="font-headline-sm text-headline-sm text-on-surface font-bold">Phase 4: Sovereign DPI, DPDPA 2023 &amp; Secure Microdata Dissemination</span>
<span class="bg-surface-container text-on-surface-variant px-2.5 py-0.5 rounded-full font-label-sm text-label-sm font-bold">
                    Q1 2026
                  </span>
</div>
<div class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">
                  Jointly administered with National Data &amp; Analytics Platform (NDAP) - NITI Aayog &amp; NIC
                </div>
</div>
<span class="bg-surface-container text-on-surface-variant px-2.5 py-1 rounded font-label-sm text-label-sm font-bold">8 Study Hours</span>
</div>
<div class="mt-space-sm flex items-center gap-space-md text-label-sm font-label-sm text-on-surface-variant">
<span class="flex items-center gap-1"><span class="material-symbols-outlined text-[16px]">security</span> Differential Privacy</span>
<span class="flex items-center gap-1"><span class="material-symbols-outlined text-[16px]">gavel</span> Digital Personal Data Protection Act</span>
<span class="flex items-center gap-1"><span class="material-symbols-outlined text-[16px]">share</span> API Gateways</span>
</div>
</div>
<!-- PHASE 5: CAPSTONE DEFENSE -->
<div class="relative bg-surface-container-lowest p-space-md sm:p-space-lg rounded-xl shadow-sm opacity-85">
<!-- Timeline Marker -->
<div class="absolute -left-6 sm:-left-8 top-6 -translate-x-1/2 w-7 h-7 rounded-full bg-surface-container-highest text-on-surface-variant flex items-center justify-center shadow">
<span class="material-symbols-outlined text-[18px]">military_tech</span>
</div>
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-space-xs">
<div>
<div class="flex items-center gap-2">
<span class="font-headline-sm text-headline-sm text-on-surface font-bold">Phase 5: Capstone Cadre Defense &amp; DPC Board Evaluation</span>
<span class="bg-surface-container text-on-surface-variant px-2.5 py-0.5 rounded-full font-label-sm text-label-sm font-bold">
                    Final Milestone
                  </span>
</div>
<div class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">
                  Oral defense before National Statistical Systems Training Academy (NSSTA) Board &amp; Senior Selection Committee
                </div>
</div>
<span class="bg-surface-container text-on-surface-variant px-2.5 py-1 rounded font-label-sm text-label-sm font-bold">Cadre Viva</span>
</div>
<div class="mt-space-sm p-space-sm bg-surface-container-low rounded-lg text-body-sm font-body-sm text-on-surface-variant">
              Upon successful presentation and audit defense, cryptographic e-dossier endorsement will be automatically pushed to DoPT for Level-13A Senior Selection Grade promotion gazette notification.
            </div>
</div>
</div>
</div>
<!-- Right Column: 4 Cols - Cadre Context & Mentorship Panels -->
<div class="lg:col-span-4 space-y-space-md">
<!-- Panel A: Weekly Study Rhythm & Commitments -->
<div class="bg-surface-container-lowest p-space-md rounded-xl shadow-sm space-y-space-md">
<div class="flex items-center justify-between">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-secondary text-[22px]">pace</span>
<h2 class="font-headline-sm text-headline-sm text-on-surface font-bold">Study Rhythm</h2>
</div>
<span class="bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm px-2 py-0.5 rounded font-bold">
              Active Streak: 6 Days
            </span>
</div>
<!-- Weekly hours chartlet / progress -->
<div class="space-y-2">
<div class="flex justify-between font-label-sm text-label-sm">
<span class="text-on-surface-variant">Weekly Goal: 5.5 Hours</span>
<span class="font-bold text-on-surface">4.0 / 5.5 Hours Logged</span>
</div>
<div class="w-full bg-surface-container-highest h-3 rounded-full overflow-hidden flex">
<div class="bg-primary h-full transition-all" style="width: 72%;"></div>
</div>
<div class="text-right font-label-sm text-label-sm text-on-surface-variant">
              1.5 hrs needed by Sunday midnight
            </div>
</div>
<!-- Daily activity dots -->
<div class="pt-space-xs grid grid-cols-7 gap-1 text-center font-label-sm text-label-sm">
<div class="space-y-1">
<div class="w-full py-2 bg-primary text-on-primary rounded font-bold">M</div>
<span class="text-[10px] text-on-surface-variant">1.0h</span>
</div>
<div class="space-y-1">
<div class="w-full py-2 bg-primary text-on-primary rounded font-bold">T</div>
<span class="text-[10px] text-on-surface-variant">0.5h</span>
</div>
<div class="space-y-1">
<div class="w-full py-2 bg-primary text-on-primary rounded font-bold">W</div>
<span class="text-[10px] text-on-surface-variant">1.2h</span>
</div>
<div class="space-y-1">
<div class="w-full py-2 bg-primary text-on-primary rounded font-bold">T</div>
<span class="text-[10px] text-on-surface-variant">0.8h</span>
</div>
<div class="space-y-1">
<div class="w-full py-2 bg-secondary text-on-secondary rounded font-bold">F</div>
<span class="text-[10px] text-secondary font-bold">0.5h</span>
</div>
<div class="space-y-1">
<div class="w-full py-2 bg-surface-container-highest text-on-surface-variant rounded">S</div>
<span class="text-[10px] text-on-surface-variant">-</span>
</div>
<div class="space-y-1">
<div class="w-full py-2 bg-surface-container-highest text-on-surface-variant rounded">S</div>
<span class="text-[10px] text-on-surface-variant">-</span>
</div>
</div>
<!-- Quick Launch Virtual Notebook -->
<div class="p-space-sm bg-surface-container-low rounded-lg flex items-center justify-between">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-[18px]">terminal</span>
<span class="font-label-sm text-label-sm text-on-surface font-semibold">NIC High-Performance Jupyter Node</span>
</div>
<button class="bg-primary text-on-primary text-label-sm font-label-sm px-2.5 py-1 rounded hover:bg-primary-container">
              Connect
            </button>
</div>
</div>
<!-- Panel B: Assigned Academic Mentors & Evaluators -->
<div class="bg-surface-container-lowest p-space-md rounded-xl shadow-sm space-y-space-md">
<div class="flex items-center justify-between">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-[22px]">supervisor_account</span>
<h2 class="font-headline-sm text-headline-sm text-on-surface font-bold">Academic Mentors</h2>
</div>
<span class="text-label-sm font-label-sm text-on-surface-variant">Assigned by NSSTA</span>
</div>
<!-- Mentor 1 -->
<div class="p-space-sm bg-surface-container-low rounded-lg space-y-space-xs">
<div class="flex items-start gap-space-sm">
<div class="w-10 h-10 rounded-full bg-primary-container text-on-primary flex items-center justify-center font-label-md text-label-md font-bold shrink-0">
                AB
              </div>
<div class="min-w-0 flex-1">
<div class="font-label-md text-label-md font-bold text-on-surface truncate">Dr. Arindam Bose</div>
<div class="font-body-sm text-body-sm text-on-surface-variant truncate">Senior Director (Economic &amp; Social Division), MoSPI</div>
<div class="mt-1 flex items-center gap-1 font-label-sm text-label-sm text-secondary font-bold">
<span class="material-symbols-outlined text-[14px]">psychology</span>
<span>Spatial GIS &amp; Frame Sampling Mentor</span>
</div>
</div>
</div>
<div class="pt-space-xs flex items-center justify-between font-label-sm text-label-sm">
<span class="text-on-surface-variant">Office Hours: Thu 15:00-17:00</span>
<button class="text-primary hover:underline font-bold flex items-center gap-0.5">
<span class="material-symbols-outlined text-[14px]">videocam</span>
<span>Book Slot</span>
</button>
</div>
</div>
<!-- Mentor 2 -->
<div class="p-space-sm bg-surface-container-low rounded-lg space-y-space-xs">
<div class="flex items-start gap-space-sm">
<div class="w-10 h-10 rounded-full bg-secondary text-on-secondary flex items-center justify-center font-label-md text-label-md font-bold shrink-0">
                KV
              </div>
<div class="min-w-0 flex-1">
<div class="font-label-md text-label-md font-bold text-on-surface truncate">Prof. K. Venkatesh</div>
<div class="font-body-sm text-body-sm text-on-surface-variant truncate">Indian Statistical Institute (ISI), Kolkata</div>
<div class="mt-1 flex items-center gap-1 font-label-sm text-label-sm text-primary font-bold">
<span class="material-symbols-outlined text-[14px]">analytics</span>
<span>Statistical Advisory Lead</span>
</div>
</div>
</div>
<div class="pt-space-xs flex items-center justify-between font-label-sm text-label-sm">
<span class="text-on-surface-variant">Review Status: 1 Pending Review</span>
<button class="text-primary hover:underline font-bold flex items-center gap-0.5">
<span class="material-symbols-outlined text-[14px]">chat</span>
<span>Send Dispatch</span>
</button>
</div>
</div>
<button class="w-full bg-surface-container-high text-primary hover:bg-surface-container-highest py-2 rounded-lg font-label-md text-label-md font-bold flex items-center justify-center gap-1 transition-all">
<span class="material-symbols-outlined text-[16px]">edit_calendar</span>
<span>Schedule Formal 1:1 Cadre Review Call</span>
</button>
</div>
<!-- Panel C: Institutional Accreditation & SPARROW Audit Trail -->
<div class="bg-surface-container-lowest p-space-md rounded-xl shadow-sm space-y-space-sm">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-[20px]">shield</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">Institutional Security &amp; Audit</h3>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">
            All credit accruals and phase defenses are cryptographically logged on the sovereign NIC Blockchain Gateway.
          </p>
<div class="p-2.5 bg-surface-container-low rounded-lg space-y-1">
<div class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Cryptographic e-Dossier Hash</div>
<div class="font-label-sm text-label-sm font-mono text-primary truncate select-all">
              #SPARROW-PATH-2025-098-X-ISS412-SHA256
            </div>
<div class="text-[10px] text-on-surface-variant flex items-center justify-between pt-1">
<span>Sync State: Consistently Replicated</span>
<span class="text-secondary font-bold">Verified</span>
</div>
</div>
<div class="flex items-center justify-between pt-space-xs font-label-sm text-label-sm">
<span class="flex items-center gap-1 text-on-surface-variant">
<span class="material-symbols-outlined text-[16px] text-secondary">verified</span>
<span>GIGW 3.0 Standard</span>
</span>
<span class="flex items-center gap-1 text-on-surface-variant">
<span class="material-symbols-outlined text-[16px] text-primary">cloud_done</span>
<span>STQC Level-2 Cert</span>
</span>
</div>
</div>
<!-- Academic Resource Quick Link Pill -->
<div class="bg-tertiary-container text-on-tertiary p-space-md rounded-xl shadow-sm flex items-center justify-between">
<div class="space-y-0.5">
<div class="font-label-md text-label-md font-bold text-on-tertiary">NSSTA Digital Library Access</div>
<div class="font-body-sm text-body-sm text-tertiary-fixed-dim">Access 14,000+ statistical journals &amp; NSS series</div>
</div>
<button class="w-8 h-8 rounded bg-primary text-on-primary flex items-center justify-center hover:opacity-90 transition-opacity">
<span class="material-symbols-outlined text-[18px]">arrow_forward</span>
</button>
</div>
</div>
</div>
</div>
</div></main><footer class="w-full bg-surface-container-low text-on-surface-variant py-space-md px-space-lg mt-space-lg"><div class="flex flex-col md:flex-row items-center justify-between gap-space-sm text-body-sm font-body-sm"><span>Gap2Grow Cadre Portal • National Statistical Systems Training Academy (NSSTA) • MoSPI</span><span>GIGW-3.0 Compliant • NIC Gateway Secure Node</span></div></footer></div></body></html>
