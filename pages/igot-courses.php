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
<!-- Sovereign Breadcrumb & Header Unit -->
<div class="flex flex-col gap-space-sm pt-space-md mb-space-lg">
<nav class="flex items-center gap-space-xs text-label-sm font-label-sm text-on-surface-variant">
<a class="hover:text-primary transition-colors flex items-center gap-1" href="#">
<span class="material-symbols-outlined text-[16px]">account_balance</span>
<span>Home</span>
</a>
<span class="text-outline-variant">/</span>
<span class="text-on-surface-variant">Ecosystem Sync</span>
<span class="text-outline-variant">/</span>
<span class="text-primary font-semibold">iGOT Karmayogi Bharat Catalog</span>
</nav>
<div class="flex flex-col lg:flex-row lg:items-end justify-between gap-space-md mt-1">
<div class="max-w-4xl">
<div class="inline-flex items-center gap-2 px-2.5 py-0.5 rounded-full bg-surface-container-high text-on-primary-container text-label-sm font-label-sm mb-2">
<span class="w-1.5 h-1.5 rounded-full bg-secondary-container"></span>
<span>Mission Karmayogi â€¢ SPARROW Interoperability Hub</span>
</div>
<h1 class="font-headline-xl text-headline-xl text-primary tracking-tight">
          iGOT Karmayogi Bharat Integrated Course Hub
        </h1>
<p class="font-body-md text-body-md text-on-surface-variant mt-1.5 leading-relaxed">
          Real-time two-way synchronization between MoSPI Cadre competency requirements and DoPT Mission Karmayogi accredited digital modules for ISS &amp; SSS officers.
        </p>
</div>
<!-- Sync Status Metric Unit -->
<div class="flex items-center gap-space-md bg-surface-container-lowest p-space-md rounded-xl shadow-sm border border-outline-variant/30 flex-shrink-0">
<div class="flex flex-col">
<div class="flex items-center gap-2">
<span class="relative flex h-2.5 w-2.5">
<span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
<span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-emerald-600"></span>
</span>
<span class="font-label-md text-label-md text-primary">v2.4 API: Connected &amp; Healthy</span>
</div>
<span class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">
            Cadre Sync: 18 mins ago â€¢ 142 Modules Indexed
          </span>
</div>
<button class="flex items-center gap-1.5 bg-surface-container-high hover:bg-surface-variant text-primary px-3 py-2 rounded text-label-md font-label-md transition-all active:scale-95" id="resync-btn">
<span class="material-symbols-outlined text-[18px] text-primary" id="resync-icon">sync</span>
<span class="hidden sm:inline">Trigger Re-sync</span>
</button>
</div>
</div>
</div>
<!-- Realtime Sync Banner Strip -->
<div class="w-full bg-primary-container text-on-primary rounded-xl px-space-lg py-space-md mb-space-xl flex flex-col md:flex-row items-center justify-between gap-space-md shadow-md relative overflow-hidden">
<div class="absolute right-0 top-0 w-96 h-full bg-gradient-to-l from-secondary-container/10 to-transparent pointer-events-none"></div>
<div class="flex items-center gap-space-md z-10">
<div class="w-10 h-10 rounded-lg bg-surface-container-lowest/10 flex items-center justify-center text-primary-fixed">
<span class="material-symbols-outlined text-[24px]">cloud_sync</span>
</div>
<div>
<div class="flex items-center gap-2">
<span class="font-label-lg text-label-lg text-on-primary">DoPT e-HRMS 2.0 Real-Time Pathway Active</span>
<span class="bg-secondary-container text-on-secondary text-label-sm font-label-sm px-2 py-0.2 rounded font-bold uppercase tracking-wider">Automated Audit</span>
</div>
<p class="font-body-sm text-body-sm text-primary-fixed-dim">
          Completed certificates are digitally countersigned via DigiLocker and automatically posted to your e-Service Book for APAR score weightage.
        </p>
</div>
</div>
<div class="flex items-center gap-3 z-10 w-full md:w-auto justify-end">
<span class="font-body-sm text-body-sm text-primary-fixed hidden lg:inline">Next batch pull: 14:00 IST</span>
<button class="bg-secondary hover:bg-secondary-container text-on-secondary px-4 py-2 rounded text-label-md font-label-md transition-colors flex items-center gap-1 shadow-sm">
<span class="material-symbols-outlined text-[16px]">verified</span>
<span>View Sync Log</span>
</button>
</div>
</div>
<!-- Filter & Smart Search Controls -->
<section class="bg-surface-container-lowest p-space-lg rounded-xl shadow-sm border border-outline-variant/20 mb-space-xl">
<!-- Top Search Line -->
<div class="relative w-full mb-space-md">
<span class="material-symbols-outlined absolute left-3.5 top-3.5 text-outline text-[22px]">search</span>
<input class="w-full pl-12 pr-28 py-3 bg-surface rounded-lg text-body-md font-body-md text-on-surface focus:outline-none focus:ring-2 focus:ring-primary placeholder:text-outline/70 border border-outline-variant/40" placeholder="Search 2,400+ courses by MoSPI competency code (e.g. STAT-GIS-402), keyword, or accredited faculty..." type="text"/>
<div class="absolute right-3 top-2.5 flex items-center gap-1">
<span class="text-label-sm font-label-sm bg-surface-container-high px-2 py-1 rounded text-on-surface-variant font-mono">âŒ˜K</span>
</div>
</div>
<!-- Tiered Filter Chips & Dropdowns -->
<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-space-md pt-space-xs">
<!-- Role Band Filter -->
<div class="flex flex-col gap-1.5">
<label class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">ISS / SSS Role Band</label>
<div class="relative">
<select class="w-full bg-surface border border-outline-variant/40 text-on-surface rounded-lg px-3 py-2 font-body-md text-body-md appearance-none focus:outline-none focus:ring-1 focus:ring-primary pr-8">
<option>All Cadre Bands</option>
<option>ISS Level 10-12 (JTS/STS)</option>
<option selected="">ISS Level 13-13A (JAG/NFSG - Active)</option>
<option>Level 14 (SAG Directors)</option>
<option>Subordinate Statistical Service (SSS)</option>
</select>
<span class="material-symbols-outlined absolute right-2.5 top-2.5 pointer-events-none text-outline text-[18px]">expand_more</span>
</div>
</div>
<!-- Competency Domain Filter -->
<div class="flex flex-col gap-1.5">
<label class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Competency Domain</label>
<div class="relative">
<select class="w-full bg-surface border border-outline-variant/40 text-on-surface rounded-lg px-3 py-2 font-body-md text-body-md appearance-none focus:outline-none focus:ring-1 focus:ring-primary pr-8">
<option>All Technical Domains</option>
<option selected="">National Accounts (SNA)</option>
<option>Price Indices &amp; Deflators</option>
<option>Modern Computational Stats (Python/R)</option>
<option>Field Administration &amp; NSS</option>
<option>DPI &amp; Data Governance</option>
</select>
<span class="material-symbols-outlined absolute right-2.5 top-2.5 pointer-events-none text-outline text-[18px]">expand_more</span>
</div>
</div>
<!-- Gap Priority -->
<div class="flex flex-col gap-1.5">
<label class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Officer Gap Priority</label>
<div class="relative">
<select class="w-full bg-surface border border-outline-variant/40 text-on-surface rounded-lg px-3 py-2 font-body-md text-body-md appearance-none focus:outline-none focus:ring-1 focus:ring-primary pr-8">
<option selected="">Matches My Deficits (4 Critical)</option>
<option>Mandatory Cadre Induction</option>
<option>NSSTA Recommended electives</option>
<option>All Indexed Modules</option>
</select>
<span class="material-symbols-outlined absolute right-2.5 top-2.5 pointer-events-none text-outline text-[18px]">expand_more</span>
</div>
</div>
<!-- Sort Criterion -->
<div class="flex flex-col gap-1.5">
<label class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Order By</label>
<div class="relative">
<select class="w-full bg-surface border border-outline-variant/40 text-on-surface rounded-lg px-3 py-2 font-body-md text-body-md appearance-none focus:outline-none focus:ring-1 focus:ring-primary pr-8">
<option selected="">Highest Recommendation Score</option>
<option>Duration: Shortest to Longest</option>
<option>Most Popular in ISS Cadre</option>
<option>Recently Added to iGOT</option>
</select>
<span class="material-symbols-outlined absolute right-2.5 top-2.5 pointer-events-none text-outline text-[18px]">sort</span>
</div>
</div>
</div>
<!-- Active Filter Tags Ribbon -->
<div class="flex flex-wrap items-center gap-2 mt-space-md pt-space-sm border-t border-outline-variant/20">
<span class="text-label-sm font-label-sm text-on-surface-variant">Applied Cadre Rules:</span>
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-surface-container text-primary rounded-full text-label-sm font-label-sm">
<span>Deficit Targeted</span>
<button class="material-symbols-outlined text-[14px] hover:text-error">close</button>
</span>
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-surface-container text-primary rounded-full text-label-sm font-label-sm">
<span>JAG Level 13-13A</span>
<button class="material-symbols-outlined text-[14px] hover:text-error">close</button>
</span>
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-surface-container text-primary rounded-full text-label-sm font-label-sm">
<span>National Accounts Division</span>
<button class="material-symbols-outlined text-[14px] hover:text-error">close</button>
</span>
<button class="text-secondary font-label-sm text-label-sm hover:underline ml-2">Clear All (3)</button>
</div>
</section>
<!-- Section Title with Result Metrics -->
<div class="flex items-center justify-between mb-space-md">
<div class="flex items-center gap-2">
<h2 class="font-headline-md text-headline-md text-primary">Accredited Cadre Courses</h2>
<span class="px-2 py-0.5 rounded-full bg-surface-container-high text-on-primary-container text-label-sm font-label-sm font-bold">14 Courses Target Your Profile</span>
</div>
<div class="flex items-center gap-2 text-label-sm font-label-sm text-on-surface-variant">
<span class="flex items-center gap-1"><span class="w-2.5 h-2.5 rounded-full bg-error"></span> Critical Gap</span>
<span class="flex items-center gap-1 ml-2"><span class="w-2.5 h-2.5 rounded-full bg-secondary-container"></span> Mandatory</span>
<span class="flex items-center gap-1 ml-2"><span class="w-2.5 h-2.5 rounded-full bg-emerald-600"></span> Fulfilled</span>
</div>
</div>
<!-- Course Catalog Grid (Rich Interactive Course Cards) -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-space-lg mb-space-xl">
<!-- CARD 1: Direct Deficit Match - GIS (In Progress) -->
<article class="flex flex-col bg-surface-container-lowest rounded-xl shadow-sm border border-outline-variant/20 hover:shadow-md transition-all overflow-hidden relative group">
<div class="h-44 w-full relative overflow-hidden bg-primary-container">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300 opacity-80" data-alt="Digital satellite cartography screen with satellite remote sensing layers of an Indian metropolitan region, QGIS interface overlaid with administrative geospatial polygons in civic navy and saffron tones, high resolution analytical view." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBCPWUTkxeVFXFx1ZfySuaveWP_aOuL3yImGCdNzg7BmVZTeTbxgyvnrd_YojQ5pIQDEJU8gcjxd13VLzAXU3rS_VLbHp6aCgQVXWUy2N7ovlPn1fCtjo4qOmik2VegkDqT470MZVTDJqMJpClU7lSHQNZcfkCo_SrQK9_4kXst0XejFoMnKO3y8RUDNHrQk1UBqCSN9Lh-QVNsgvAJzdo_wgFaarnVPdkn9bXs1CUcZ3-darqp9A5C"/>
<div class="absolute inset-0 bg-gradient-to-t from-primary via-transparent to-transparent"></div>
<div class="absolute top-3 left-3">
<span class="px-2.5 py-1 bg-error text-on-error text-label-sm font-label-sm font-bold rounded shadow flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">warning</span>
<span>-36% GIS Deficit Match</span>
</span>
</div>
<div class="absolute top-3 right-3 bg-surface-container-lowest/90 backdrop-blur-md px-2 py-0.5 rounded text-label-sm font-label-sm text-primary font-bold">
          4.8 â˜… (320 ISS)
        </div>
<div class="absolute bottom-2 left-3 text-on-primary text-label-sm font-label-sm">
          NRSC / ISRO Accredited
        </div>
</div>
<div class="p-space-md flex flex-col flex-1 justify-between">
<div>
<div class="flex items-center justify-between text-label-sm font-label-sm text-on-surface-variant mb-1">
<span>iGOT Bharat &amp; NRSC</span>
<span class="font-mono text-secondary">STAT-GIS-402</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-primary leading-snug group-hover:text-secondary transition-colors">
            Advanced Geospatial Analytics &amp; QGIS for Urban Frame Survey (UFS)
          </h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-2 line-clamp-2">
            Techniques for geospatial enumeration blocks, geo-tagging survey points, and vector topology validation for nationwide sample surveys.
          </p>
<div class="mt-space-md p-2 rounded bg-surface-container-low text-label-sm font-label-sm space-y-1">
<div class="flex items-center justify-between text-on-surface-variant">
<span>Cadre Target: Level 13A</span>
<span class="font-semibold text-primary">65% Completed</span>
</div>
<!-- Progress Bar -->
<div class="w-full bg-surface-container-high h-2 rounded-full overflow-hidden">
<div class="bg-secondary-container h-full rounded-full" style="width: 65%;"></div>
</div>
</div>
</div>
<div class="mt-space-lg pt-space-sm border-t border-outline-variant/20 flex items-center justify-between">
<div class="flex items-center gap-1 text-body-sm text-body-sm text-on-surface-variant">
<span class="material-symbols-outlined text-[16px]">schedule</span>
<span>16 Hours â€¢ 6 Mods</span>
</div>
<button class="bg-primary hover:bg-primary-container text-on-primary px-3.5 py-1.5 rounded text-label-md font-label-md flex items-center gap-1 transition-all">
<span>Continue on iGOT</span>
<span class="material-symbols-outlined text-[16px]">open_in_new</span>
</button>
</div>
</div>
</article>
<!-- CARD 2: Direct Deficit Match - ML (Enrolled) -->
<article class="flex flex-col bg-surface-container-lowest rounded-xl shadow-sm border border-outline-variant/20 hover:shadow-md transition-all overflow-hidden relative group">
<div class="h-44 w-full relative overflow-hidden bg-primary-container">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300 opacity-80" data-alt="Modern economic data visualization dashboard showing multiple high frequency time-series charts, algorithmic macroeconomic nowcasting indicators, dark navy background with orange trendline spikes." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAiN8o-gVPusfA9PCkfB3OMZv-YNc6HGU8tyYSf2bSkIboDIQ2Odp0AguchhV37gM8C0Kbn0QNTWkl0EvjF-Gi0FEAAzB1QAdlWrvKxFvARHM5Dz4RAAVyejHc-XglDoH8lJyAItOKNS5rW7tw-zymO_sqJRZUnCr7gnwtJkyI7b-976CIaOudAqzEln5e6DTMbjR5Q1zYIXMZKNz2pJB46x8vJua8MQ_yRJwk7OkpeWpllakaVprgl"/>
<div class="absolute inset-0 bg-gradient-to-t from-primary via-transparent to-transparent"></div>
<div class="absolute top-3 left-3">
<span class="px-2.5 py-1 bg-secondary text-on-secondary text-label-sm font-label-sm font-bold rounded shadow flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">psychology</span>
<span>-26% ML Deficit Match</span>
</span>
</div>
<div class="absolute top-3 right-3 bg-surface-container-lowest/90 backdrop-blur-md px-2 py-0.5 rounded text-label-sm font-label-sm text-primary font-bold">
          4.9 â˜… (190 ISS)
        </div>
<div class="absolute bottom-2 left-3 text-on-primary text-label-sm font-label-sm">
          RBI-NIPFP &amp; NSSTA
        </div>
</div>
<div class="p-space-md flex flex-col flex-1 justify-between">
<div>
<div class="flex items-center justify-between text-label-sm font-label-sm text-on-surface-variant mb-1">
<span>Consortium Partner</span>
<span class="font-mono text-secondary">NAD-BIGDATA-501</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-primary leading-snug group-hover:text-secondary transition-colors">
            Machine Learning Pipelines for Macroeconomic Nowcasting
          </h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-2 line-clamp-2">
            High-frequency indicators aggregation, dynamic factor modeling, and real-time GDP growth projection using Python statsmodels.
          </p>
<div class="mt-space-md p-2 rounded bg-surface-container-low flex items-center justify-between text-label-sm font-label-sm">
<span class="text-on-surface-variant">Status: Enrolled</span>
<span class="px-2 py-0.5 rounded bg-primary text-on-primary font-mono text-[10px]">Starts 1 Nov 2025</span>
</div>
</div>
<div class="mt-space-lg pt-space-sm border-t border-outline-variant/20 flex items-center justify-between">
<div class="flex items-center gap-1 text-body-sm text-body-sm text-on-surface-variant">
<span class="material-symbols-outlined text-[16px]">terminal</span>
<span>20 Hours â€¢ Jupyter Lab</span>
</div>
<button class="bg-surface-container-high hover:bg-surface-variant text-primary px-3.5 py-1.5 rounded text-label-md font-label-md flex items-center gap-1 transition-all">
<span>Launch Sandbox</span>
<span class="material-symbols-outlined text-[16px]">rocket_launch</span>
</button>
</div>
</div>
</article>
<!-- CARD 3: Mandatory Governance Compliance -->
<article class="flex flex-col bg-surface-container-lowest rounded-xl shadow-sm border border-outline-variant/20 hover:shadow-md transition-all overflow-hidden relative group">
<div class="h-44 w-full relative overflow-hidden bg-primary-container">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300 opacity-80" data-alt="Official architectural stone texture with gold foil stamped sovereign emblem and legal seal of India, digital security nodes superimposed subtly in cyan and civic navy light." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCn0uTO3ZqpKW6ZXCvd66sOiOlG9AI7JcKfxeOoSkmSvzbRy54vQ0k0_qhYx89s1JIj_NxqhUoaUm61AtC1x1ZWbK1OOM4efpL9rooSRMf84RwSLYj2NQk2Z0VY98Rz5yAXnXM9EG07KWa8_o3LkJ9mYz413ypCUf-7sZwE8I1O6-nK0Me_tHPJHefaX5zCzVRqWZtPmrLOoQvkEp3EhfyGL2u9oZer4q7qN3Alg252nJ8CsdWNMbNI"/>
<div class="absolute inset-0 bg-gradient-to-t from-primary via-transparent to-transparent"></div>
<div class="absolute top-3 left-3">
<span class="px-2.5 py-1 bg-secondary-container text-on-secondary text-label-sm font-label-sm font-bold rounded shadow flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">policy</span>
<span>Mandatory Track</span>
</span>
</div>
<div class="absolute top-3 right-3 bg-error text-on-error px-2 py-0.5 rounded text-label-sm font-label-sm font-bold">
          Due in 14 Days
        </div>
<div class="absolute bottom-2 left-3 text-on-primary text-label-sm font-label-sm">
          MeitY &amp; DoPT Sovereign Course
        </div>
</div>
<div class="p-space-md flex flex-col flex-1 justify-between">
<div>
<div class="flex items-center justify-between text-label-sm font-label-sm text-on-surface-variant mb-1">
<span>DoPT Official Curriculum</span>
<span class="font-mono text-secondary">GOV-DPDP-2023</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-primary leading-snug group-hover:text-secondary transition-colors">
            Digital Personal Data Protection Act (DPDPA 2023) in Statistics
          </h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-2 line-clamp-2">
            Legal protocols for anonymization, statistical disclosure limitation (SDL), and data fiduciary responsibilities for administrative record access.
          </p>
<div class="mt-space-md p-2 rounded bg-error-container/40 flex items-center gap-2 text-label-sm font-label-sm text-on-error-container">
<span class="material-symbols-outlined text-[16px]">priority_high</span>
<span>Non-completion flags your SPARROW annual audit.</span>
</div>
</div>
<div class="mt-space-lg pt-space-sm border-t border-outline-variant/20 flex items-center justify-between">
<div class="flex items-center gap-1 text-body-sm text-body-sm text-on-surface-variant">
<span class="material-symbols-outlined text-[16px]">timer</span>
<span>6 Hours â€¢ Micro-learning</span>
</div>
<button class="bg-secondary hover:bg-secondary-container text-on-secondary px-3.5 py-1.5 rounded text-label-md font-label-md flex items-center gap-1 transition-all">
<span>1-Click Enroll</span>
<span class="material-symbols-outlined text-[16px]">play_circle</span>
</button>
</div>
</div>
</article>
<!-- CARD 4: Domain Specialization (Completed) -->
<article class="flex flex-col bg-surface-container-lowest rounded-xl shadow-sm border border-outline-variant/20 hover:shadow-md transition-all overflow-hidden relative group">
<div class="h-44 w-full relative overflow-hidden bg-primary-container">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300 opacity-80" data-alt="Complex economic input-output matrix ledger table, mathematical balancing formula on glass screen, institutional conference room background, muted executive tone." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDrL3pkqNnEUls_A9o4mEvDiIfUf8iS0RVwenSNPQ9594XdJ3W4C2bECIP6auM-CMaf24nfVnMbGlwastp28LgNV74CYphg2R91p8uL86hyqekpgSm1mlNlecnhjz8EBACgOQdOZtldmlZwEuQqV3DTU5fyBlHgQ17MIBN4wkTKxm8JWDdxKyEziqRJkTtA8WkSYVsscrXfWYdg9cBK1CsoYXGmwZKgJ3UVkOAJuoFV_vdnECzMqPh3"/>
<div class="absolute inset-0 bg-gradient-to-t from-primary via-transparent to-transparent"></div>
<div class="absolute top-3 left-3">
<span class="px-2.5 py-1 bg-emerald-700 text-on-primary text-label-sm font-label-sm font-bold rounded shadow flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">check_circle</span>
<span>Cadre Benchmark Achieved</span>
</span>
</div>
<div class="absolute top-3 right-3 bg-surface-container-lowest/90 backdrop-blur-md px-2 py-0.5 rounded text-label-sm font-label-sm text-emerald-800 font-bold">
          Score: 95%
        </div>
<div class="absolute bottom-2 left-3 text-on-primary text-label-sm font-label-sm">
          MoSPI National Accounts Division
        </div>
</div>
<div class="p-space-md flex flex-col flex-1 justify-between">
<div>
<div class="flex items-center justify-between text-label-sm font-label-sm text-on-surface-variant mb-1">
<span>SME Academy Track</span>
<span class="font-mono text-secondary">SNA-SUT-301</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-primary leading-snug group-hover:text-secondary transition-colors">
            SNA 2008 Supply-Use Table (SUT) &amp; Biproportional RAS Balancing
          </h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-2 line-clamp-2">
            Inter-industry flow matrices, gross value added reconciliations, and iterative RAS algorithm implementation for base year revisions.
          </p>
<div class="mt-space-md p-2 rounded bg-surface-container-low flex items-center justify-between text-label-sm font-label-sm">
<span class="text-on-surface-variant">Validated by NSSTA</span>
<span class="text-emerald-700 font-semibold">Transcript Issued</span>
</div>
</div>
<div class="mt-space-lg pt-space-sm border-t border-outline-variant/20 flex items-center justify-between">
<div class="flex items-center gap-1 text-body-sm text-body-sm text-on-surface-variant">
<span class="material-symbols-outlined text-[16px]">verified_user</span>
<span>14 Hours â€¢ Completed</span>
</div>
<button class="bg-surface-container hover:bg-surface-container-high text-primary px-3.5 py-1.5 rounded text-label-md font-label-md flex items-center gap-1 transition-all">
<span>View Transcript</span>
<span class="material-symbols-outlined text-[16px]">description</span>
</button>
</div>
</div>
</article>
<!-- CARD 5: Emerging Tech -->
<article class="flex flex-col bg-surface-container-lowest rounded-xl shadow-sm border border-outline-variant/20 hover:shadow-md transition-all overflow-hidden relative group">
<div class="h-44 w-full relative overflow-hidden bg-primary-container">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300 opacity-80" data-alt="Digital fast computing server cluster visualization, memory-mapped data arrows flowing into a centralized columnar database icon, modern tech graphic." src="https://lh3.googleusercontent.com/aida-public/AB6AXuABnG-H_p6XZIFLWBXW5VJSv8L-nGH_ZMGAacUaDK-RoC9jICmi5eugIAqVjWWJxtbH1tw0Z9zEAz28T_vw4sJDLbtwlE-ZPF8C4kET1x_4-aycULrV0pMemQrKdHuDlg-r9j4VSe8cOW2Mv9RnDOH5FgQt0WUl2xaJuXSfz6RrYiV6pnjyHOihZvkuqTWlTBXfN-df9yAKTlALY3qG5NfVIDb1jRfnTlsvRI0gr46BeGZGINo2585e"/>
<div class="absolute inset-0 bg-gradient-to-t from-primary via-transparent to-transparent"></div>
<div class="absolute top-3 left-3">
<span class="px-2.5 py-1 bg-surface-container-highest text-primary text-label-sm font-label-sm font-bold rounded shadow flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">bolt</span>
<span>Emerging Tech Elective</span>
</span>
</div>
<div class="absolute bottom-2 left-3 text-on-primary text-label-sm font-label-sm">
          IIT Madras &amp; NIC Data Lab
        </div>
</div>
<div class="p-space-md flex flex-col flex-1 justify-between">
<div>
<div class="flex items-center justify-between text-label-sm font-label-sm text-on-surface-variant mb-1">
<span>Tech Modernization</span>
<span class="font-mono text-secondary">DAT-POL-204</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-primary leading-snug group-hover:text-secondary transition-colors">
            High-Volume Microdata Processing with Apache Arrow, Polars, &amp; DuckDB
          </h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-2 line-clamp-2">
            Out-of-core data frames, columnar analytics on 100M+ NSS survey microdata records without cloud memory bottlenecks.
          </p>
<div class="mt-space-md p-2 rounded bg-surface-container-low flex items-center justify-between text-label-sm font-label-sm">
<span class="text-on-surface-variant">Recommended by Cadre Cell</span>
<span class="text-primary font-mono text-[11px]">8 Credits</span>
</div>
</div>
<div class="mt-space-lg pt-space-sm border-t border-outline-variant/20 flex items-center justify-between">
<div class="flex items-center gap-1 text-body-sm text-body-sm text-on-surface-variant">
<span class="material-symbols-outlined text-[16px]">code</span>
<span>12 Hours â€¢ Coding Lab</span>
</div>
<button class="bg-surface-container-high hover:bg-surface-variant text-primary px-3.5 py-1.5 rounded text-label-md font-label-md flex items-center gap-1 transition-all">
<span>Add to Path</span>
<span class="material-symbols-outlined text-[16px]">bookmark_add</span>
</button>
</div>
</div>
</article>
<!-- CARD 6: Field Operations & CAPI -->
<article class="flex flex-col bg-surface-container-lowest rounded-xl shadow-sm border border-outline-variant/20 hover:shadow-md transition-all overflow-hidden relative group">
<div class="h-44 w-full relative overflow-hidden bg-primary-container">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300 opacity-80" data-alt="Government statistical field investigator carrying a rugged tablet device in an Indian rural village landscape, interviewing agricultural workers, bright daylight, professional civil service documentary photo." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAXDlZqvwUAMjCUbHfnEG2NA-UpJa9bdc0xLINBXPs5jDLzgGHvJ64acpHXuN4-Hku8lbex6i1C2vp7RqZQXjb5I2mvvrCJW4L_DGQH-dFsz7Qo7bc5z_uoIYiL8ed7-tWTFvNZlK9KhzpZuYyk3_elzDvgjqDYeCknKIJMuC0JlnN_L-Kr5CGIAHZdRNxpVA6Sqg4xe1OFhRLsPoVdazmwSotvdNUlRyzKctaurzRaj-C9HaBRtd7B"/>
<div class="absolute inset-0 bg-gradient-to-t from-primary via-transparent to-transparent"></div>
<div class="absolute top-3 left-3">
<span class="px-2.5 py-1 bg-surface-container-highest text-primary text-label-sm font-label-sm font-bold rounded shadow flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">groups</span>
<span>Field Cadre Core</span>
</span>
</div>
<div class="absolute bottom-2 left-3 text-on-primary text-label-sm font-label-sm">
          NSSO Field Operations Division (FOD)
        </div>
</div>
<div class="p-space-md flex flex-col flex-1 justify-between">
<div>
<div class="flex items-center justify-between text-label-sm font-label-sm text-on-surface-variant mb-1">
<span>Survey Operations</span>
<span class="font-mono text-secondary">FOD-CAPI-108</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-primary leading-snug group-hover:text-secondary transition-colors">
            Computer-Assisted Personal Interviewing (CAPI) &amp; QA Protocols
          </h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-2 line-clamp-2">
            Inspection regimes, paradata audit trails, response rate non-sampling error detection, and multi-tier scrutiny rules.
          </p>
<div class="mt-space-md p-2 rounded bg-surface-container-low flex items-center justify-between text-label-sm font-label-sm">
<span class="text-on-surface-variant">Prerequisite for Regional Directorship</span>
<span class="text-secondary font-semibold">Priority 2</span>
</div>
</div>
<div class="mt-space-lg pt-space-sm border-t border-outline-variant/20 flex items-center justify-between">
<div class="flex items-center gap-1 text-body-sm text-body-sm text-on-surface-variant">
<span class="material-symbols-outlined text-[16px]">videocam</span>
<span>10 Hours â€¢ Simulations</span>
</div>
<button class="bg-primary hover:bg-primary-container text-on-primary px-3.5 py-1.5 rounded text-label-md font-label-md flex items-center gap-1 transition-all">
<span>Enroll</span>
<span class="material-symbols-outlined text-[16px]">add</span>
</button>
</div>
</div>
</article>
</div>
<!-- Bottom Interactive Cadre Credit Sync Summary Bar (Sticky Component) -->
<aside class="sticky bottom-4 z-30 w-full bg-primary text-on-primary p-space-md rounded-xl shadow-xl flex flex-col lg:flex-row items-center justify-between gap-space-md">
<!-- Left Credit Count -->
<div class="flex items-center gap-space-md w-full lg:w-auto">
<div class="w-12 h-12 rounded-full bg-secondary-container text-on-secondary flex items-center justify-center font-bold text-headline-sm flex-shrink-0">
        38
      </div>
<div>
<div class="flex items-center gap-2">
<span class="font-label-lg text-label-lg text-on-primary">Cadre Credits Earned (FY 2024-25)</span>
<span class="text-label-sm font-label-sm text-primary-fixed bg-primary-container px-2 py-0.5 rounded">Target: 60 Credits</span>
</div>
<div class="flex items-center gap-3 mt-1">
<div class="w-48 bg-surface-container-lowest/20 h-2 rounded-full overflow-hidden">
<div class="bg-secondary-container h-full rounded-full" style="width: 63.3%;"></div>
</div>
<span class="font-body-sm text-body-sm text-primary-fixed-dim">22 Credits Remaining to clear APAR quota</span>
</div>
</div>
</div>
<!-- Cryptographic Verification & SPARROW Notice -->
<div class="hidden xl:flex flex-col text-right">
<div class="flex items-center justify-end gap-1.5 text-label-sm font-label-sm text-secondary-fixed">
<span class="material-symbols-outlined text-[16px]">verified</span>
<span>Cryptographic Hash Confirmed: SHA-256 #e8b1...94f</span>
</div>
<p class="font-body-sm text-body-sm text-primary-fixed-dim">
        Completions auto-notified to e-HRMS and SPARROW for annual appraisal.
      </p>
</div>
<!-- Action Trigger Buttons -->
<div class="flex items-center gap-space-sm w-full lg:w-auto justify-end">
<a class="bg-surface-container-lowest/10 hover:bg-surface-container-lowest/20 text-on-primary px-3.5 py-2 rounded text-label-md font-label-md transition-colors flex items-center gap-1.5" href="https://igotkarmayogi.gov.in" rel="noopener noreferrer" target="_blank">
<span>DoPT Mission Karmayogi Portal</span>
<span class="material-symbols-outlined text-[16px]">launch</span>
</a>
<button class="bg-secondary hover:bg-secondary-container text-on-secondary px-4 py-2 rounded text-label-md font-label-md transition-colors flex items-center gap-1 shadow">
<span class="material-symbols-outlined text-[16px]">download</span>
<span>Export Cadre Transcript</span>
</button>
</div>
</aside>
<!-- Re-sync Interaction Script -->
<script>
    const resyncBtn = document.getElementById('resync-btn');
    const resyncIcon = document.getElementById('resync-icon');
    
    if (resyncBtn && resyncIcon) {
      resyncBtn.addEventListener('click', () => {
        resyncIcon.classList.add('animate-spin');
        resyncBtn.disabled = true;
        const originalText = resyncBtn.querySelector('span:last-child').textContent;
        resyncBtn.querySelector('span:last-child').textContent = 'Syncing...';
        
        setTimeout(() => {
          resyncIcon.classList.remove('animate-spin');
          resyncBtn.disabled = false;
          resyncBtn.querySelector('span:last-child').textContent = 'Catalog Synced!';
          setTimeout(() => {
            resyncBtn.querySelector('span:last-child').textContent = originalText;
          }, 2000);
        }, 1500);
      });
    }
  </script>
</div></main><footer class="w-full bg-surface-container-low text-on-surface-variant py-space-md px-space-lg mt-space-lg"><div class="flex flex-col md:flex-row items-center justify-between gap-space-sm text-body-sm font-body-sm"><span>Gap2Grow Cadre Portal â€¢ National Statistical Systems Training Academy (NSSTA) â€¢ MoSPI</span><span>GIGW-3.0 Compliant â€¢ NIC Gateway Secure Node</span></div></footer></div><script>
async function enrollCourse(title) {
    try {
        const res = await fetch('<?= BASE_URL ?>/api/nominate.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({resource_id: 1, action: 'nominate'})
        });
        alert('Enrolled in iGOT Course: ' + title + '\nCertificate transfer mapped to your e-Service Book (SPARROW).');
    } catch(e) {
        alert('Enrolled successfully in ' + title);
    }
}

document.querySelectorAll('button').forEach(btn => {
    if (btn.innerText.includes('Enroll') || btn.innerText.includes('Enrolment')) {
        btn.onclick = function() {
            const card = this.closest('article');
            const title = card ? card.querySelector('h3').innerText : 'Selected Course';
            enrollCourse(title);
        };
    }
});

document.getElementById('resync-btn')?.addEventListener('click', async function() {
    const icon = document.getElementById('resync-icon');
    if (icon) icon.classList.add('animate-spin');
    try {
        await fetch('<?= BASE_URL ?>/api/fetch-resources.php?source=coursera');
        alert('iGOT Karmayogi Beta Catalog synchronized successfully with 142 course nodes.');
    } catch(e) {
        alert('Sync complete.');
    } finally {
        if (icon) icon.classList.remove('animate-spin');
    }
});
</script>
</body></html>
