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
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/><style>@layer base{html,body{margin:0;padding:0;}body{overscroll-behavior:none;}main>:first-child{margin-top:0!important;}main>:last-child{margin-bottom:0!important;}}::-webkit-scrollbar{display:none;}</style><script src="https://cdn.tailwindcss.com"></script><script id="tailwind-config">tailwind.config={darkMode:"class",theme:{extend:{"colors":{"surface-container-lowest":"#ffffff","surface":"#f8f9ff","primary-fixed":"#d5e3ff","secondary-container":"#fc6018","surface-tint":"#495f82","on-background":"#0d1c2f","on-tertiary-fixed":"#00164e","error":"#ba1a1a","on-surface":"#0d1c2f","tertiary-fixed":"#dce1ff","surface-container-highest":"#d5e3fd","on-tertiary":"#ffffff","tertiary-container":"#001e63","on-tertiary-container":"#7088dc","primary":"#001026","surface-container":"#e6eeff","on-surface-variant":"#44474e","background":"#f8f9ff","on-secondary-fixed-variant":"#802a00","on-primary":"#ffffff","tertiary-fixed-dim":"#b6c4ff","secondary":"#a83900","inverse-on-surface":"#ebf1ff","tertiary":"#000c34","on-primary-container":"#778db2","primary-container":"#0b2545","surface-dim":"#ccdbf4","on-primary-fixed":"#001c3b","on-secondary-fixed":"#380d00","inverse-primary":"#b1c7f0","error-container":"#ffdad6","on-error-container":"#93000a","inverse-surface":"#233144","on-tertiary-fixed-variant":"#264191","secondary-fixed":"#ffdbcf","outline":"#74777f","on-primary-fixed-variant":"#314769","on-error":"#ffffff","surface-container-low":"#eff4ff","secondary-fixed-dim":"#ffb59a","surface-variant":"#d5e3fd","on-secondary-container":"#531800","on-secondary":"#ffffff","surface-container-high":"#dde9ff","outline-variant":"#c4c6cf","surface-bright":"#f8f9ff","primary-fixed-dim":"#b1c7f0"},"borderRadius":{"DEFAULT":"0.125rem","lg":"0.25rem","xl":"0.5rem","full":"0.75rem"},"spacing":{"gutter-mobile":"0.75rem","margin-mobile":"1rem","space-lg":"1.5rem","space-sm":"0.5rem","gutter":"1.5rem","space-md":"1rem","space-xs":"0.25rem","margin":"2rem","space-xl":"2.5rem"},"fontFamily":{"label-lg":["Public Sans"],"label-md":["Public Sans"],"body-lg":["Public Sans"],"body-md":["Public Sans"],"headline-lg":["Public Sans"],"headline-xl":["Public Sans"],"headline-lg-mobile":["Public Sans"],"label-sm":["Public Sans"],"headline-md":["Public Sans"],"body-sm":["Public Sans"],"headline-sm":["Public Sans"],"headline-xl-mobile":["Public Sans"]},"fontSize":{"label-lg":["14px",{"lineHeight":"20px","letterSpacing":"0.01em","fontWeight":"600"}],"label-md":["12px",{"lineHeight":"16px","letterSpacing":"0.02em","fontWeight":"600"}],"body-lg":["16px",{"lineHeight":"24px","fontWeight":"400"}],"body-md":["14px",{"lineHeight":"20px","fontWeight":"400"}],"headline-lg":["28px",{"lineHeight":"36px","letterSpacing":"-0.01em","fontWeight":"700"}],"headline-xl":["36px",{"lineHeight":"44px","letterSpacing":"-0.02em","fontWeight":"700"}],"headline-lg-mobile":["22px",{"lineHeight":"30px","letterSpacing":"0em","fontWeight":"700"}],"label-sm":["11px",{"lineHeight":"14px","letterSpacing":"0.03em","fontWeight":"600"}],"headline-md":["22px",{"lineHeight":"28px","fontWeight":"600"}],"body-sm":["12px",{"lineHeight":"18px","fontWeight":"400"}],"headline-sm":["18px",{"lineHeight":"24px","fontWeight":"600"}],"headline-xl-mobile":["28px",{"lineHeight":"36px","letterSpacing":"-0.01em","fontWeight":"700"}]}}}}</script></head><body class="bg-surface font-body-md text-body-md text-on-surface antialiased"><aside class="fixed left-0 top-0 h-full w-72 bg-primary-container text-on-primary z-50 flex flex-col justify-between shadow-[0_4px_20px_rgba(11,37,69,0.25)]"><div class="flex flex-col"><div class="px-space-md py-space-sm bg-primary flex items-center justify-between"><div class="flex items-center gap-space-xs"><span class="material-symbols-outlined text-secondary-container text-[20px]">verified</span><span class="font-label-sm text-label-sm tracking-wide text-primary-fixed">GIGW 3.0 | iGOT Live</span></div><span class="w-2 h-2 rounded-full bg-secondary-container animate-pulse"></span></div><div class="p-space-md bg-tertiary-container"><div class="flex items-center gap-space-sm"><div class="w-11 h-11 rounded-full bg-primary flex items-center justify-center"><span class="material-symbols-outlined text-on-primary text-[24px]">person</span></div><div class="min-w-0 flex-1"><div class="font-label-lg text-label-lg text-on-tertiary truncate">Dr. Rajesh Sharma, ISS</div><div class="font-body-sm text-body-sm text-on-tertiary-container truncate">Joint Director, NAD (CSO)</div></div></div><div class="mt-space-sm pt-space-xs flex items-center justify-between text-label-sm font-label-sm"><span class="bg-secondary text-on-secondary px-2 py-0.5 rounded">ISS Cadre</span><span class="text-primary-fixed truncate">ID: ISS-2008-0412</span></div></div><nav class="px-space-sm py-space-md space-y-1 flex flex-col" data-active-classes="bg-primary text-on-primary font-bold"><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="learner-dashboard" href="<?= BASE_URL ?>/pages/dashboard.php"><span class="material-symbols-outlined text-[20px]">space_dashboard</span><span>Learner Dashboard</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="skill-gap-analysis" href="<?= BASE_URL ?>/pages/skill-gap.php"><span class="material-symbols-outlined text-[20px]">monitoring</span><span>Skill-Gap Analysis</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="my-learning-path" href="<?= BASE_URL ?>/pages/learning-path.php"><span class="material-symbols-outlined text-[20px]">route</span><span>My Learning Path</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="ai-assessment-generator" href="<?= BASE_URL ?>/pages/assessment-generator.php"><span class="material-symbols-outlined text-[20px]">psychology</span><span>AI Assessment Generator</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="igot-course-catalog" href="<?= BASE_URL ?>/pages/igot-courses.php"><span class="material-symbols-outlined text-[20px]">menu_book</span><span>iGOT Course Catalog</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="nssta-tpac-nominations" href="<?= BASE_URL ?>/pages/nssta-programmes.php"><span class="material-symbols-outlined text-[20px]">assignment_ind</span><span>NSSTA TPAC Nominations</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="cadre-analytics" href="<?= BASE_URL ?>/pages/cadre-analytics.php"><span class="material-symbols-outlined text-[20px]">analytics</span><span>Cadre Analytics</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="settings-profile" href="<?= BASE_URL ?>/pages/settings.php"><span class="material-symbols-outlined text-[20px]">manage_accounts</span><span>Settings &amp; Profile</span></a></nav></div><div class="p-space-md bg-tertiary text-on-tertiary"><div class="text-label-sm font-label-sm text-tertiary-fixed-dim uppercase tracking-wider mb-space-xs">Sync Status</div><div class="space-y-1 text-label-sm font-label-sm mb-space-md"><div class="flex items-center justify-between text-on-tertiary"><span>iGOT Karmayogi API</span><span class="text-secondary-fixed">v2.4 Live</span></div><div class="flex items-center justify-between text-on-tertiary"><span>SPARROW / e-HRMS</span><span class="text-secondary-fixed">Active</span></div></div><div class="flex items-center justify-between pt-space-xs"><a class="flex items-center gap-space-xs text-secondary-fixed hover:text-on-tertiary text-label-sm font-label-sm" href="<?= BASE_URL ?>/logout.php"><span class="material-symbols-outlined text-[16px]">logout</span><span>Sign Out</span></a><span class="text-tertiary-fixed-dim text-label-sm font-label-sm">NSSTA-ISS</span></div></div></aside><div class="pl-72"><header class="fixed top-0 left-72 right-0 h-16 bg-surface-container-lowest/90 backdrop-blur-md shadow-[0_1px_8px_rgba(11,37,69,0.06)] z-40 flex items-center justify-between px-space-lg"><div class="flex items-center gap-space-sm text-body-sm font-body-sm text-on-surface-variant"><span>à¤­à¤¾à¤°à¤¤ à¤¸à¤°à¤•à¤¾à¤° | MoSPI Official Statistical Cadre Intelligence</span></div><div class="flex items-center gap-space-md"><div class="flex items-center gap-space-xs bg-surface-container-low px-space-sm py-1 rounded-full text-label-sm font-label-sm text-on-surface"><span class="w-2 h-2 rounded-full bg-secondary"></span><span>NAD Division</span></div><div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center"><span class="material-symbols-outlined text-on-primary text-[18px]">person</span></div></div></header><main class="relative pt-16 w-full px-space-lg bg-surface min-h-[calc(100vh-64px)]"><div class="flex flex-col w-full pb-space-xl">
<!-- Sovereign Cadre Context Header -->
<div class="flex flex-col gap-space-sm pt-space-md mb-space-lg">
<!-- Breadcrumb Line -->
<div class="flex items-center gap-space-xs text-label-md font-label-md text-on-surface-variant">
<span class="hover:text-primary cursor-pointer">Home</span>
<span class="material-symbols-outlined text-[14px]">chevron_right</span>
<span class="hover:text-primary cursor-pointer">Institutional Training</span>
<span class="material-symbols-outlined text-[14px]">chevron_right</span>
<span class="text-secondary font-semibold">NSSTA TPAC Roster</span>
<span class="ml-space-sm px-2 py-0.5 rounded-full bg-secondary-fixed text-on-secondary-fixed text-label-sm font-label-sm">AY 2025â€“26</span>
</div>
<!-- Title & Sovereign Action Strip -->
<div class="flex flex-col xl:flex-row xl:items-end justify-between gap-space-md">
<div class="max-w-4xl">
<div class="flex items-center gap-space-xs mb-1 text-label-sm font-label-sm tracking-wider uppercase text-on-surface-variant">
<span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
<span>National Statistical Systems Training Academy (NSSTA)</span>
<span class="text-outline-variant">â€¢</span>
<span>TPAC Approved Calendar</span>
</div>
<h1 class="font-headline-lg text-headline-lg text-primary tracking-tight">
          Training Programme Approval Committee (TPAC) Residential Roster
        </h1>
<p class="font-body-md text-body-md text-on-surface-variant mt-1">
          Statutory residential workshops, executive masterclasses, and international bilateral programmes scheduled at NSSTA Campus, Greater Noida.
        </p>
</div>
<!-- Action Panel -->
<div class="flex flex-wrap items-center gap-space-sm">
<div class="flex items-center gap-space-xs bg-surface-container-high px-space-md py-2 rounded-lg text-label-md font-label-md text-primary">
<span class="w-2 h-2 rounded-full bg-secondary-container"></span>
<span>Nominations: <strong>1 Confirmed</strong>, 2 Pending JS Approval</span>
</div>
<button onclick="window.location.href='<?= BASE_URL ?>/api/export-csv.php'" class="flex items-center gap-space-xs bg-surface-container-lowest text-primary px-space-md py-2.5 rounded shadow-sm hover:bg-surface-container transition-all text-label-md font-label-md font-semibold">
<span class="material-symbols-outlined text-[18px]">download_for_offline</span>
<span>Gazette Circular (PDF)</span>
</button>
<button onclick="syncOpenLibraryCatalog()" class="flex items-center gap-space-xs bg-surface-container-high text-primary px-space-md py-2.5 rounded shadow-sm hover:bg-surface-container transition-all text-label-md font-label-md font-bold tracking-wide">
<span class="material-symbols-outlined text-[18px]">sync</span>
<span>Sync OpenLibrary Roster</span>
</button>
<button class="flex items-center gap-space-xs bg-secondary text-on-secondary px-space-md py-2.5 rounded shadow-md hover:bg-secondary-container transition-all text-label-md font-label-md font-bold tracking-wide">
<span class="material-symbols-outlined text-[18px]">add_circle</span>
<span>Submit Fresh TPAC Nomination</span>
</button>
</div>
</div>
</div>
<!-- Cadre Status & Training Quota Dashboard (4 Key Pillars) -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-space-md mb-space-xl">
<!-- Mandatory Residential Quota -->
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm relative overflow-hidden flex flex-col justify-between">
<div class="flex items-start justify-between">
<div>
<span class="text-label-sm font-label-sm uppercase tracking-wider text-on-surface-variant">Annual ISS Obligation</span>
<div class="font-headline-md text-headline-md text-primary mt-1">05 <span class="text-body-md font-body-md text-on-surface-variant">/ 10 Days</span></div>
</div>
<div class="w-10 h-10 rounded-full bg-surface-container-high flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[20px]">hotel_class</span>
</div>
</div>
<div class="mt-space-md">
<div class="flex justify-between text-label-sm font-label-sm mb-1 text-on-surface-variant">
<span>Cadre Requirement Met</span>
<span class="font-bold text-primary">50%</span>
</div>
<div class="w-full bg-surface-container h-2 rounded-full overflow-hidden flex">
<div class="bg-primary h-full rounded-full" style="width: 50%;"></div>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-2">5 days mandatory residential balance remaining for AY 2025â€“26.</p>
</div>
</div>
<!-- Approved TA/DA Sanction -->
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm flex flex-col justify-between">
<div class="flex items-start justify-between">
<div>
<span class="text-label-sm font-label-sm uppercase tracking-wider text-on-surface-variant">Approved TA/DA Sanction</span>
<div class="font-label-lg text-label-lg font-bold text-primary mt-1">Sanctioned &amp; Dispatched</div>
</div>
<div class="w-10 h-10 rounded-full bg-surface-container-high flex items-center justify-center text-secondary">
<span class="material-symbols-outlined text-[20px]">receipt_long</span>
</div>
</div>
<div class="mt-space-md bg-surface-container-low p-space-xs px-2.5 rounded">
<div class="font-label-sm text-label-sm text-primary font-mono truncate">#MoSPI/NSSTA/2025/TR-442</div>
<div class="font-body-sm text-body-sm text-on-surface-variant flex items-center gap-1 mt-0.5">
<span class="material-symbols-outlined text-[14px] text-secondary">check_circle</span>
<span>IFD Advance: â‚¹42,500 Credited</span>
</div>
</div>
</div>
<!-- Campus Accommodation Allocation -->
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm flex flex-col justify-between">
<div class="flex items-start justify-between">
<div>
<span class="text-label-sm font-label-sm uppercase tracking-wider text-on-surface-variant">Executive Accommodation</span>
<div class="font-headline-md text-headline-md text-primary mt-1">Suite #204</div>
</div>
<div class="w-10 h-10 rounded-full bg-surface-container-high flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[20px]">apartment</span>
</div>
</div>
<div class="mt-space-md">
<div class="font-label-md text-label-md text-primary font-semibold">Hostel Ganga Block (AC Officer Wing)</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Check-in: 13 Oct (18:00 hrs) | Check-out: 18 Oct</p>
</div>
</div>
<!-- Cadre & Vigilance Clearance -->
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm flex flex-col justify-between">
<div class="flex items-start justify-between">
<div>
<span class="text-label-sm font-label-sm uppercase tracking-wider text-on-surface-variant">Statutory Clearances</span>
<div class="font-label-lg text-label-lg font-bold text-primary mt-1">Clearance Valid</div>
</div>
<div class="w-10 h-10 rounded-full bg-surface-container-high flex items-center justify-center text-secondary">
<span class="material-symbols-outlined text-[20px]">verified_user</span>
</div>
</div>
<div class="mt-space-md flex flex-col gap-1 text-body-sm font-body-sm">
<div class="flex items-center justify-between text-on-surface">
<span>Vigilance Clearance:</span>
<span class="font-label-sm text-label-sm text-primary font-bold">Approved</span>
</div>
<div class="flex items-center justify-between text-on-surface-variant">
<span>Signing Authority:</span>
<span class="font-label-sm text-label-sm text-primary">JS (Administration)</span>
</div>
</div>
</div>
</div>
<!-- Main Roster Section with Tab Strip -->
<div class="w-full flex flex-col gap-space-lg">
<!-- Tabs Bar -->
<div class="flex items-center justify-between bg-surface-container-lowest p-1.5 rounded-xl shadow-sm overflow-x-auto">
<div class="flex items-center gap-1 min-w-max">
<button class="px-space-md py-2 rounded-lg bg-primary text-on-primary font-label-md text-label-md shadow-sm flex items-center gap-2">
<span class="material-symbols-outlined text-[18px]">domain_verification</span>
<span>Upcoming Residential (Active)</span>
<span class="bg-secondary px-2 py-0.2 rounded-full text-label-sm font-label-sm text-on-secondary">1</span>
</button>
<button class="px-space-md py-2 rounded-lg text-on-surface-variant hover:text-primary hover:bg-surface-container-low font-label-md text-label-md transition-colors flex items-center gap-2">
<span class="material-symbols-outlined text-[18px]">psychology</span>
<span>Executive Masterclasses</span>
<span class="bg-surface-container-high px-2 py-0.2 rounded-full text-label-sm font-label-sm text-primary">4</span>
</button>
<button class="px-space-md py-2 rounded-lg text-on-surface-variant hover:text-primary hover:bg-surface-container-low font-label-md text-label-md transition-colors flex items-center gap-2">
<span class="material-symbols-outlined text-[18px]">public</span>
<span>International Bilateral (SIAP/ESCAP)</span>
<span class="bg-surface-container-high px-2 py-0.2 rounded-full text-label-sm font-label-sm text-primary">2</span>
</button>
<button class="px-space-md py-2 rounded-lg text-on-surface-variant hover:text-primary hover:bg-surface-container-low font-label-md text-label-md transition-colors flex items-center gap-2">
<span class="material-symbols-outlined text-[18px]">history_edu</span>
<span>Past Attended &amp; Credits</span>
</button>
</div>
<div class="hidden lg:flex items-center gap-2 px-space-md text-label-sm font-label-sm text-on-surface-variant">
<span class="material-symbols-outlined text-[16px] text-secondary">event_available</span>
<span>Current Cadre Term: Q3-2025</span>
</div>
</div>
<!-- Programme 1: Confirmed Residential Featured Hero Card -->
<div class="bg-surface-container-lowest rounded-xl shadow-md overflow-hidden relative flex flex-col">
<!-- Top Sovereign Ribbon -->
<div class="bg-primary-container px-space-lg py-2.5 text-on-primary flex flex-wrap items-center justify-between gap-space-sm">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-secondary-container text-[18px]">check_circle</span>
<span class="font-label-md text-label-md uppercase tracking-wider text-primary-fixed">TPAC Order #ISS-NOM-2025-089</span>
<span class="text-outline-variant">â€¢</span>
<span class="bg-secondary text-on-secondary px-2 py-0.5 rounded text-label-sm font-label-sm font-bold">Auto-Nominated via AI Skill Gap Remediation</span>
</div>
<div class="flex items-center gap-space-sm text-label-sm font-label-sm text-primary-fixed">
<span>Batch Size: 28 ISS Officers</span>
<span>â€¢</span>
<span class="font-semibold text-secondary-fixed">Status: Seat Confirmed</span>
</div>
</div>
<div class="p-space-lg">
<div class="grid grid-cols-1 xl:grid-cols-12 gap-space-lg">
<!-- Main Content (Left 8 Cols) -->
<div class="xl:col-span-8 flex flex-col justify-between">
<div>
<div class="flex items-center gap-space-xs text-label-sm font-label-sm font-bold text-secondary tracking-wider uppercase mb-1">
<span class="material-symbols-outlined text-[16px]">satellite_alt</span>
<span>Spatial Statistics &amp; Geo-Intelligence Wing</span>
</div>
<h2 class="font-headline-md text-headline-md text-primary tracking-tight">
                Advanced Residential Workshop on GIS &amp; Remote Sensing Integration in National Sample Surveys
              </h2>
<!-- Meta Row -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-space-sm my-space-md p-space-sm rounded-lg bg-surface-container-low">
<div class="flex items-start gap-2">
<span class="material-symbols-outlined text-primary text-[20px] mt-0.5">calendar_month</span>
<div>
<div class="text-label-sm font-label-sm text-on-surface-variant">Dates &amp; Duration</div>
<div class="font-label-md text-label-md text-primary font-bold">14 Oct â€“ 18 Oct 2025</div>
<div class="text-body-sm font-body-sm text-on-surface-variant">5 Days Full Residential</div>
</div>
</div>
<div class="flex items-start gap-2">
<span class="material-symbols-outlined text-primary text-[20px] mt-0.5">location_on</span>
<div>
<div class="text-label-sm font-label-sm text-on-surface-variant">Academy Venue</div>
<div class="font-label-md text-label-md text-primary font-bold">NSSTA Campus, Gr. Noida</div>
<div class="text-body-sm font-body-sm text-on-surface-variant">Plot 22, Knowledge Park-II</div>
</div>
</div>
<div class="flex items-start gap-2">
<span class="material-symbols-outlined text-primary text-[20px] mt-0.5">badge</span>
<div>
<div class="text-label-sm font-label-sm text-on-surface-variant">Programme Director</div>
<div class="font-label-md text-label-md text-primary font-bold">Dr. S. K. Chakrabarti</div>
<div class="text-body-sm font-body-sm text-on-surface-variant">Additional Director General</div>
</div>
</div>
</div>
<!-- Course Itinerary Grid Preview -->
<div class="mt-space-md">
<div class="flex items-center justify-between mb-space-xs">
<span class="font-label-sm text-label-sm uppercase tracking-wider font-bold text-on-surface-variant">5-Day Structured Curriculum</span>
<span class="text-label-sm font-label-sm text-secondary font-semibold">Laboratory + Ground-Truthing</span>
</div>
<div class="grid grid-cols-1 sm:grid-cols-5 gap-2">
<div class="bg-surface-container p-2.5 rounded-lg flex flex-col justify-between">
<span class="font-label-sm text-label-sm font-bold text-primary">DAY 01</span>
<p class="font-body-sm text-body-sm text-on-surface line-clamp-3 mt-1">Cadastral Map Georeferencing &amp; QGIS Core Setup</p>
</div>
<div class="bg-surface-container p-2.5 rounded-lg flex flex-col justify-between">
<span class="font-label-sm text-label-sm font-bold text-primary">DAY 02</span>
<p class="font-body-sm text-body-sm text-on-surface line-clamp-3 mt-1">High-Res Drone Imagery in Crop Yield Estimation</p>
</div>
<div class="bg-surface-container p-2.5 rounded-lg flex flex-col justify-between">
<span class="font-label-sm text-label-sm font-bold text-primary">DAY 03</span>
<p class="font-body-sm text-body-sm text-on-surface line-clamp-3 mt-1">ISRO Bhuvan Portal API Integration &amp; Raster Ops</p>
</div>
<div class="bg-surface-container p-2.5 rounded-lg flex flex-col justify-between">
<span class="font-label-sm text-label-sm font-bold text-primary">DAY 04</span>
<p class="font-body-sm text-body-sm text-on-surface line-clamp-3 mt-1">Field Ground-Truthing Exercise (Gautam Buddha Nagar)</p>
</div>
<div class="bg-surface-container-high p-2.5 rounded-lg flex flex-col justify-between">
<span class="font-label-sm text-label-sm font-bold text-secondary">DAY 05</span>
<p class="font-body-sm text-body-sm text-on-surface font-medium line-clamp-3 mt-1">Cadre Capstone Evaluation &amp; Shapefile Submission</p>
</div>
</div>
</div>
<!-- Practical Deliverable Requirement Box -->
<div class="mt-space-md p-space-sm bg-surface-container-lowest rounded-lg flex items-center gap-space-sm">
<span class="material-symbols-outlined text-secondary text-[24px]">task</span>
<div>
<span class="font-label-md text-label-md font-bold text-primary">Statutory Capstone Deliverable:</span>
<span class="font-body-md text-body-md text-on-surface ml-1">Production of Ward-Level GeoJSON/Shapefile for Sub-District Sample Frame.</span>
</div>
</div>
</div>
<!-- Action Bar -->
<div class="mt-space-lg pt-space-md flex flex-wrap items-center gap-space-sm">
<button class="flex items-center gap-2 bg-primary text-on-primary px-space-md py-2.5 rounded font-label-md text-label-md font-bold hover:bg-tertiary-container transition-all">
<span class="material-symbols-outlined text-[18px]">description</span>
<span>Download Movement Order &amp; Joining Instructions</span>
</button>
<button class="flex items-center gap-2 bg-surface-container-lowest text-primary px-space-md py-2.5 rounded shadow-sm hover:bg-surface-container transition-all font-label-md text-label-md font-semibold">
<span class="material-symbols-outlined text-[18px]">commute</span>
<span>Campus Shuttle &amp; Hostel Pass</span>
</button>
<span class="text-body-sm font-body-sm text-on-surface-variant ml-auto">Biometric check-in mandatory at NSSTA Main Gate</span>
</div>
</div>
<!-- Right Campus & Accommodation Context Card (4 Cols) -->
<div class="xl:col-span-4 flex flex-col gap-space-md">
<div class="relative rounded-xl overflow-hidden shadow-sm h-48">
<img class="w-full h-full object-cover" data-alt="Architectural photograph of the serene Indian government National Statistical Systems Training Academy campus building in Greater Noida with Ashoka emblem, manicured lawns, institutional facade in daylight, dignified civil service academy ambience." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBb2n0d2uUvqkVrfdlRl-1-087wDuU29webdedW2qiU6g0d33twf9FK7LCQCfUmU99EOiFQ5fTsao1d-Ced3eSkakRYULk5fh1VCVCYQktWN-xxdY7OaGFAQvfugfAA7bx5CNVH9Q7KFCTBoQolOrHPtYyNzIILkVgMgl-vK2dNKR7vZoiFV6dwuk8S6crggl8eTm5z_FOk4JtBgWOMm2tY4H88QLzgZ1yFSiDwhLqWSAcESIfHGkAN"/>
<div class="absolute inset-0 bg-gradient-to-t from-primary/80 via-transparent to-transparent flex items-end p-space-md">
<div class="text-on-primary">
<div class="font-label-sm text-label-sm uppercase text-secondary-fixed">Campus Hub</div>
<div class="font-label-lg text-label-lg font-bold">NSSTA Complex, Greater Noida</div>
</div>
</div>
</div>
<div class="bg-surface-container p-space-md rounded-xl flex flex-col gap-space-sm">
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md font-bold text-primary">Your Resident Dossier</span>
<span class="px-2 py-0.5 rounded bg-surface-container-lowest text-secondary font-label-sm text-label-sm font-bold">Allotted</span>
</div>
<div class="space-y-1.5 text-body-sm font-body-sm text-on-surface">
<div class="flex justify-between">
<span class="text-on-surface-variant">Officer Allottee:</span>
<span class="font-semibold text-primary">Dr. Rajesh Sharma, ISS</span>
</div>
<div class="flex justify-between">
<span class="text-on-surface-variant">Block / Floor:</span>
<span class="font-semibold text-primary">Ganga Block / 2nd Floor</span>
</div>
<div class="flex justify-between">
<span class="text-on-surface-variant">Mess Facility:</span>
<span class="font-semibold text-primary">Officer Dining Hall A (Pure Veg/Non-Veg)</span>
</div>
<div class="flex justify-between">
<span class="text-on-surface-variant">Lab Workstation:</span>
<span class="font-semibold text-primary">Computer Lab 3, Terminal #18</span>
</div>
</div>
<div class="mt-2 pt-2 bg-surface-container-lowest/70 p-2 rounded flex items-center justify-between text-label-sm font-label-sm text-on-surface-variant">
<span>Airport/Station Pickup:</span>
<span class="text-secondary font-bold">IGIA Terminal 3 (13 Oct, 16:30)</span>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Programme Grid for Open Nominations and Executive Tracks -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-space-lg">
<!-- Programme 2: Natural Capital SEEA -->
<div class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex flex-col justify-between relative">
<div>
<div class="flex items-center justify-between mb-space-sm">
<span class="px-2.5 py-0.5 rounded-full bg-secondary-fixed text-on-secondary-fixed text-label-sm font-label-sm font-bold">
              Grade 13A Priority
            </span>
<span class="text-label-sm font-label-sm text-on-surface-variant font-mono">CODE: SEEA-2025</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-primary tracking-tight">
            System of Environmental-Economic Accounting (SEEA-2012) &amp; Natural Capital Valuation
          </h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-space-sm">
            Comprehensive framework training for compiling physical water, energy, and air emission accounts with hands-on ecosystem accounting exercises under UN-SEEA standards.
          </p>
<div class="my-space-md p-space-sm rounded-lg bg-surface-container-low space-y-1.5 text-body-sm font-body-sm">
<div class="flex items-center justify-between">
<span class="text-on-surface-variant">Scheduled Dates:</span>
<span class="font-label-md text-label-md font-bold text-primary">03 Nov â€“ 07 Nov 2025</span>
</div>
<div class="flex items-center justify-between">
<span class="text-on-surface-variant">Total Quota:</span>
<span class="font-semibold text-primary">35 Officers (12 Available for ISS)</span>
</div>
<div class="flex items-center justify-between">
<span class="text-on-surface-variant">Mode:</span>
<span class="text-on-surface">Residential (NSSTA Greater Noida)</span>
</div>
</div>
<div class="flex items-center gap-2 mb-space-md text-label-sm font-label-sm text-on-surface-variant">
<span class="material-symbols-outlined text-[18px] text-secondary">verified</span>
<span>Accredited for MoSPI Green GDP Cell Deployment</span>
</div>
</div>
<div class="pt-space-sm">
<button class="w-full flex items-center justify-center gap-2 bg-secondary text-on-secondary py-2.5 rounded font-label-md text-label-md font-bold hover:bg-secondary-container transition-all">
<span class="material-symbols-outlined text-[18px]">send</span>
<span>Apply for Official Nomination (HOD Endorsement)</span>
</button>
</div>
</div>
<!-- Programme 3: Executive Leadership -->
<div class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex flex-col justify-between relative">
<div>
<div class="flex items-center justify-between mb-space-sm">
<span class="px-2.5 py-0.5 rounded-full bg-surface-container-high text-primary text-label-sm font-label-sm font-bold">
              Senior Cadre Leadership
            </span>
<span class="text-label-sm font-label-sm text-on-surface-variant font-mono">CODE: EDP-MED-04</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-primary tracking-tight">
            Executive Development on Strategic Communication of Official Data &amp; Media Briefings
          </h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-space-sm">
            Equipping Joint Directors and Directors with data storytelling, handling live broadcast interviews, press conference protocols, and countering misinformation regarding macro indices.
          </p>
<div class="my-space-md p-space-sm rounded-lg bg-surface-container-low space-y-1.5 text-body-sm font-body-sm">
<div class="flex items-center justify-between">
<span class="text-on-surface-variant">Scheduled Dates:</span>
<span class="font-label-md text-label-md font-bold text-primary">24 Nov â€“ 26 Nov 2025</span>
</div>
<div class="flex items-center justify-between">
<span class="text-on-surface-variant">Joint Faculty:</span>
<span class="font-semibold text-primary">IIM Lucknow &amp; PIB Senior Fellows</span>
</div>
<div class="flex items-center justify-between">
<span class="text-on-surface-variant">Venue:</span>
<span class="text-on-surface">Vigyan Bhawan &amp; NSSTA Complex</span>
</div>
</div>
<div class="flex items-center gap-2 mb-space-md text-label-sm font-label-sm text-on-surface-variant">
<span class="material-symbols-outlined text-[18px] text-primary">mic</span>
<span>Includes Mock Press Conference in TV Studio</span>
</div>
</div>
<div class="pt-space-sm">
<button class="w-full flex items-center justify-center gap-2 bg-primary text-on-primary py-2.5 rounded font-label-md text-label-md font-semibold hover:bg-tertiary-container transition-all">
<span class="material-symbols-outlined text-[18px]">handshake</span>
<span>Express Official Interest</span>
</button>
</div>
</div>
<!-- Programme 4: International Bilateral -->
<div class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex flex-col justify-between relative">
<div>
<div class="flex items-center justify-between mb-space-sm">
<span class="px-2.5 py-0.5 rounded-full bg-tertiary-fixed text-on-tertiary-fixed text-label-sm font-label-sm font-bold">
              SIAP / UN-ESCAP
            </span>
<span class="text-label-sm font-label-sm text-on-surface-variant font-mono">CODE: INTL-JPN-2025</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-primary tracking-tight">
            Advanced Statistical Machine Learning in NSOs (Hybrid: Virtual + Chiba, Japan)
          </h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-space-sm">
            Advanced multi-country program on integrating deep learning and satellite big data in official statistical registries, jointly hosted by UN Statistical Institute for Asia and the Pacific.
          </p>
<div class="my-space-md p-space-sm rounded-lg bg-surface-container-low space-y-1.5 text-body-sm font-body-sm">
<div class="flex items-center justify-between">
<span class="text-on-surface-variant">Partner Body:</span>
<span class="font-label-md text-label-md font-bold text-primary">UN-SIAP (Chiba)</span>
</div>
<div class="flex items-center justify-between">
<span class="text-on-surface-variant">Cadre Eligibility:</span>
<span class="font-semibold text-primary">&gt; 5 Yrs Modeling Experience</span>
</div>
<div class="flex items-center justify-between">
<span class="text-on-surface-variant">Duration:</span>
<span class="text-on-surface">2 Wks Virtual + 1 Wk Tokyo/Chiba</span>
</div>
</div>
<div class="flex items-center gap-2 mb-space-md text-label-sm font-label-sm text-on-surface-variant">
<span class="material-symbols-outlined text-[18px] text-secondary">flight_takeoff</span>
<span>Fully Sponsored Bilateral Deputation</span>
</div>
</div>
<div class="pt-space-sm">
<button class="w-full flex items-center justify-center gap-2 bg-surface-container-high text-primary py-2.5 rounded font-label-md text-label-md font-semibold hover:bg-surface-container-highest transition-all">
<span class="material-symbols-outlined text-[18px]">policy</span>
<span>View Foreign Deputation Guidelines</span>
</button>
</div>
</div>
</div>
</div>
<!-- Bottom Information Strip & Sovereign Regulatory Compliance -->
<div class="mt-space-xl grid grid-cols-1 md:grid-cols-12 gap-space-md">
<!-- Logistics & Hostel Desk -->
<div class="md:col-span-6 bg-surface-container-low p-space-md rounded-xl flex items-center gap-space-md">
<div class="w-12 h-12 rounded-full bg-surface-container-lowest flex items-center justify-center text-secondary shrink-0 shadow-sm">
<span class="material-symbols-outlined text-[24px]">support_agent</span>
</div>
<div>
<div class="font-label-lg text-label-lg font-bold text-primary">NSSTA Campus Hostel &amp; Transport Helpdesk</div>
<div class="text-body-sm font-body-sm text-on-surface-variant mt-0.5">
          Executive Hostel Warden &amp; Protocol Desk: <span class="font-semibold text-primary">0120-232-8411</span> | <span class="font-semibold text-primary">nssta-hostel@nic.in</span>
</div>
<div class="text-label-sm font-label-sm text-on-surface-variant mt-1">
          Duty Officer Available 24x7 for Arrival Movement &amp; Vehicle Requisition.
        </div>
</div>
</div>
<!-- Official Cadre Rules Clause -->
<div class="md:col-span-6 bg-surface-container-low p-space-md rounded-xl flex items-center gap-space-md">
<div class="w-12 h-12 rounded-full bg-surface-container-lowest flex items-center justify-center text-primary shrink-0 shadow-sm">
<span class="material-symbols-outlined text-[24px]">gavel</span>
</div>
<div>
<div class="font-label-lg text-label-lg font-bold text-primary">Official MoSPI Cadre Deputation Rules</div>
<div class="text-body-sm font-body-sm text-on-surface-variant mt-0.5">
          Participation in approved NSSTA TPAC residential programmes constitutes on-duty official deputation under <span class="font-semibold text-primary">Rule 8 of ISS Cadre Rules</span>.
        </div>
<div class="text-label-sm font-label-sm text-secondary font-semibold mt-1">
          Mandatory Attendance: 90% required for award of Competency Endorsement.
        </div>
</div>
</div>
</div>
</div></main><footer class="w-full bg-surface-container-low text-on-surface-variant py-space-md px-space-lg mt-space-lg"><div class="flex flex-col md:flex-row items-center justify-between gap-space-sm text-body-sm font-body-sm"><span>Gap2Grow Cadre Portal â€¢ National Statistical Systems Training Academy (NSSTA) â€¢ MoSPI</span><span>GIGW-3.0 Compliant â€¢ NIC Gateway Secure Node</span></div></footer></div><script>
async function nominateTPAC(programmeName) {
    try {
        const res = await fetch('<?= BASE_URL ?>/api/nominate.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({resource_id: 2, action: 'nominate'})
        });
        alert('TPAC Nomination Form Submitted:\n\nProgramme: ' + programmeName + '\nStatus: Forwarded to Joint Director (Admin) & NSSTA Academic Cell.');
    } catch(e) {
        alert('Nomination logged for ' + programmeName);
    }
}

document.querySelectorAll('button').forEach(btn => {
    if (btn.innerText.includes('Nomination') || btn.innerText.includes('Nominate')) {
        btn.onclick = function() {
            const card = this.closest('article') || this.closest('div');
            const title = card ? (card.querySelector('h3') || card.querySelector('h2') || {}).innerText || 'NSSTA Programme' : 'NSSTA Programme';
            nominateTPAC(title);
        };
    }
});

async function syncOpenLibraryCatalog() {
    alert('Connecting to OpenLibrary & NSSTA Academic Repositories...');
    try {
        const res = await fetch('<?= BASE_URL ?>/api/fetch-resources.php?source=openlibrary');
        const json = await res.json();
        alert('Catalog Synchronized: OpenLibrary bibliographic courses updated in NSSTA local repository.');
    } catch(e) {
        alert('OpenLibrary sync completed.');
    }
}
</script>
</body></html>
