<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';

requireLogin();
$user = currentUser();
$userId = (int)$user['id'];

$stmt = $pdo->prepare('SELECT * FROM certifications WHERE user_id = ? ORDER BY issued_date DESC');
$stmt->execute([$userId]);
$certs = $stmt->fetchAll();
?>
<!DOCTYPE html>

<html lang="en"><head><meta charset="utf-8"/><meta content="width=device-width, initial-scale=1.0" name="viewport"/><meta content="web_dashboard" name="shell-type"/><link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/><link href="https://fonts.googleapis.com" rel="preconnect"/><link href="https://fonts.gstatic.com" rel="preconnect"/><link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/><style>@layer base{html,body{margin:0;padding:0;}body{overscroll-behavior:none;}main>:first-child{margin-top:0!important;}main>:last-child{margin-bottom:0!important;}}::-webkit-scrollbar{display:none;}</style><script src="https://cdn.tailwindcss.com"></script><script id="tailwind-config">tailwind.config={darkMode:"class",theme:{extend:{"colors":{"surface-container-lowest":"#ffffff","surface":"#f8f9ff","primary-fixed":"#d5e3ff","secondary-container":"#fc6018","surface-tint":"#495f82","on-background":"#0d1c2f","on-tertiary-fixed":"#00164e","error":"#ba1a1a","on-surface":"#0d1c2f","tertiary-fixed":"#dce1ff","surface-container-highest":"#d5e3fd","on-tertiary":"#ffffff","tertiary-container":"#001e63","on-tertiary-container":"#7088dc","primary":"#001026","surface-container":"#e6eeff","on-surface-variant":"#44474e","background":"#f8f9ff","on-secondary-fixed-variant":"#802a00","on-primary":"#ffffff","tertiary-fixed-dim":"#b6c4ff","secondary":"#a83900","inverse-on-surface":"#ebf1ff","tertiary":"#000c34","on-primary-container":"#778db2","primary-container":"#0b2545","surface-dim":"#ccdbf4","on-primary-fixed":"#001c3b","on-secondary-fixed":"#380d00","inverse-primary":"#b1c7f0","error-container":"#ffdad6","on-error-container":"#93000a","inverse-surface":"#233144","on-tertiary-fixed-variant":"#264191","secondary-fixed":"#ffdbcf","outline":"#74777f","on-primary-fixed-variant":"#314769","on-error":"#ffffff","surface-container-low":"#eff4ff","secondary-fixed-dim":"#ffb59a","surface-variant":"#d5e3fd","on-secondary-container":"#531800","on-secondary":"#ffffff","surface-container-high":"#dde9ff","outline-variant":"#c4c6cf","surface-bright":"#f8f9ff","primary-fixed-dim":"#b1c7f0"},"borderRadius":{"DEFAULT":"0.125rem","lg":"0.25rem","xl":"0.5rem","full":"0.75rem"},"spacing":{"gutter-mobile":"0.75rem","margin-mobile":"1rem","space-lg":"1.5rem","space-sm":"0.5rem","gutter":"1.5rem","space-md":"1rem","space-xs":"0.25rem","margin":"2rem","space-xl":"2.5rem"},"fontFamily":{"label-lg":["Public Sans"],"label-md":["Public Sans"],"body-lg":["Public Sans"],"body-md":["Public Sans"],"headline-lg":["Public Sans"],"headline-xl":["Public Sans"],"headline-lg-mobile":["Public Sans"],"label-sm":["Public Sans"],"headline-md":["Public Sans"],"body-sm":["Public Sans"],"headline-sm":["Public Sans"],"headline-xl-mobile":["Public Sans"]},"fontSize":{"label-lg":["14px",{"lineHeight":"20px","letterSpacing":"0.01em","fontWeight":"600"}],"label-md":["12px",{"lineHeight":"16px","letterSpacing":"0.02em","fontWeight":"600"}],"body-lg":["16px",{"lineHeight":"24px","fontWeight":"400"}],"body-md":["14px",{"lineHeight":"20px","fontWeight":"400"}],"headline-lg":["28px",{"lineHeight":"36px","letterSpacing":"-0.01em","fontWeight":"700"}],"headline-xl":["36px",{"lineHeight":"44px","letterSpacing":"-0.02em","fontWeight":"700"}],"headline-lg-mobile":["22px",{"lineHeight":"30px","letterSpacing":"0em","fontWeight":"700"}],"label-sm":["11px",{"lineHeight":"14px","letterSpacing":"0.03em","fontWeight":"600"}],"headline-md":["22px",{"lineHeight":"28px","fontWeight":"600"}],"body-sm":["12px",{"lineHeight":"18px","fontWeight":"400"}],"headline-sm":["18px",{"lineHeight":"24px","fontWeight":"600"}],"headline-xl-mobile":["28px",{"lineHeight":"36px","letterSpacing":"-0.01em","fontWeight":"700"}]}}}}</script></head><body class="bg-surface font-body-md text-body-md text-on-surface antialiased"><aside class="fixed left-0 top-0 h-full w-72 bg-primary-container text-on-primary z-50 flex flex-col justify-between shadow-[0_4px_20px_rgba(11,37,69,0.25)]"><div class="flex flex-col"><div class="px-space-md py-space-sm bg-primary flex items-center justify-between"><div class="flex items-center gap-space-xs"><span class="material-symbols-outlined text-secondary-container text-[20px]">verified</span><span class="font-label-sm text-label-sm tracking-wide text-primary-fixed">GIGW 3.0 | iGOT Live</span></div><span class="w-2 h-2 rounded-full bg-secondary-container animate-pulse"></span></div><div class="p-space-md bg-tertiary-container"><div class="flex items-center gap-space-sm"><div class="w-11 h-11 rounded-full bg-primary flex items-center justify-center"><span class="material-symbols-outlined text-on-primary text-[24px]">person</span></div><div class="min-w-0 flex-1"><div class="font-label-lg text-label-lg text-on-tertiary truncate">Dr. Rajesh Sharma, ISS</div><div class="font-body-sm text-body-sm text-on-tertiary-container truncate">Joint Director, NAD (CSO)</div></div></div><div class="mt-space-sm pt-space-xs flex items-center justify-between text-label-sm font-label-sm"><span class="bg-secondary text-on-secondary px-2 py-0.5 rounded">ISS Cadre</span><span class="text-primary-fixed truncate">ID: ISS-2008-0412</span></div></div><nav class="px-space-sm py-space-md space-y-1 flex flex-col" data-active-classes="bg-primary text-on-primary font-bold"><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="learner-dashboard" href="<?= BASE_URL ?>/pages/dashboard.php"><span class="material-symbols-outlined text-[20px]">space_dashboard</span><span>Learner Dashboard</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="skill-gap-analysis" href="<?= BASE_URL ?>/pages/skill-gap.php"><span class="material-symbols-outlined text-[20px]">monitoring</span><span>Skill-Gap Analysis</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="my-learning-path" href="<?= BASE_URL ?>/pages/learning-path.php"><span class="material-symbols-outlined text-[20px]">route</span><span>My Learning Path</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="ai-assessment-generator" href="<?= BASE_URL ?>/pages/assessment-generator.php"><span class="material-symbols-outlined text-[20px]">psychology</span><span>AI Assessment Generator</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="igot-course-catalog" href="<?= BASE_URL ?>/pages/igot-courses.php"><span class="material-symbols-outlined text-[20px]">menu_book</span><span>iGOT Course Catalog</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="nssta-tpac-nominations" href="<?= BASE_URL ?>/pages/nssta-programmes.php"><span class="material-symbols-outlined text-[20px]">assignment_ind</span><span>NSSTA TPAC Nominations</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="cadre-analytics" href="<?= BASE_URL ?>/pages/cadre-analytics.php"><span class="material-symbols-outlined text-[20px]">analytics</span><span>Cadre Analytics</span></a><a class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg text-primary-fixed hover:bg-primary hover:text-on-primary transition-colors font-label-md text-label-md" data-path="settings-profile" href="<?= BASE_URL ?>/pages/settings.php"><span class="material-symbols-outlined text-[20px]">manage_accounts</span><span>Settings &amp; Profile</span></a></nav></div><div class="p-space-md bg-tertiary text-on-tertiary"><div class="text-label-sm font-label-sm text-tertiary-fixed-dim uppercase tracking-wider mb-space-xs">Sync Status</div><div class="space-y-1 text-label-sm font-label-sm mb-space-md"><div class="flex items-center justify-between text-on-tertiary"><span>iGOT Karmayogi API</span><span class="text-secondary-fixed">v2.4 Live</span></div><div class="flex items-center justify-between text-on-tertiary"><span>SPARROW / e-HRMS</span><span class="text-secondary-fixed">Active</span></div></div><div class="flex items-center justify-between pt-space-xs"><a class="flex items-center gap-space-xs text-secondary-fixed hover:text-on-tertiary text-label-sm font-label-sm" href="<?= BASE_URL ?>/logout.php"><span class="material-symbols-outlined text-[16px]">logout</span><span>Sign Out</span></a><span class="text-tertiary-fixed-dim text-label-sm font-label-sm">NSSTA-ISS</span></div></div></aside><div class="pl-72"><header class="fixed top-0 left-72 right-0 h-16 bg-surface-container-lowest/90 backdrop-blur-md shadow-[0_1px_8px_rgba(11,37,69,0.06)] z-40 flex items-center justify-between px-space-lg"><div class="flex items-center gap-space-sm text-body-sm font-body-sm text-on-surface-variant"><span>भारत सरकार | MoSPI Official Statistical Cadre Intelligence</span></div><div class="flex items-center gap-space-md"><div class="flex items-center gap-space-xs bg-surface-container-low px-space-sm py-1 rounded-full text-label-sm font-label-sm text-on-surface"><span class="w-2 h-2 rounded-full bg-secondary"></span><span>NAD Division</span></div><div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center"><span class="material-symbols-outlined text-on-primary text-[18px]">person</span></div></div></header><main class="relative pt-16 w-full px-space-lg bg-surface min-h-[calc(100vh-64px)]"><div class="flex flex-col w-full pb-space-xl">
<!-- Top Sovereign Metadata Strip & Breadcrumb -->
<div class="flex flex-col md:flex-row md:items-center justify-between gap-space-sm pt-space-md mb-space-md">
<nav class="flex items-center gap-space-xs text-label-md font-label-md text-on-surface-variant">
<span class="hover:text-primary cursor-pointer">Home</span>
<span class="material-symbols-outlined text-[14px]">chevron_right</span>
<span class="hover:text-primary cursor-pointer">Cadre Credentials</span>
<span class="material-symbols-outlined text-[14px]">chevron_right</span>
<span class="text-primary font-semibold">Verified Certifications &amp; Sovereign Badges</span>
</nav>
<div class="flex items-center gap-space-sm">
<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-surface-container-high text-primary font-label-sm text-label-sm">
<span class="w-2 h-2 rounded-full bg-secondary"></span>
        GIGW 3.0 Cryptographic Integrity Verified
      </span>
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-surface-container text-on-surface font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[14px] text-secondary">encrypted</span>
        Node #GOV-IN-771
      </span>
</div>
</div>
<!-- Header Banner with Civic Tone -->
<div class="relative overflow-hidden rounded-xl bg-primary text-on-primary p-space-lg mb-space-lg shadow-md">
<div class="absolute -right-16 -top-16 w-80 h-80 rounded-full bg-primary-container/40 blur-3xl pointer-events-none"></div>
<div class="absolute right-32 bottom-0 w-64 h-64 rounded-full bg-secondary-container/10 blur-2xl pointer-events-none"></div>
<div class="relative z-10 flex flex-col lg:flex-row lg:items-center justify-between gap-space-lg">
<div class="max-w-3xl space-y-space-xs">
<div class="inline-flex items-center gap-2 px-3 py-0.5 rounded-full bg-secondary/20 text-secondary-fixed font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[16px]">shield_person</span>
          Ministry of Statistics &amp; Programme Implementation | DoPT Certified Node
        </div>
<h1 class="text-headline-lg font-headline-lg text-on-primary tracking-tight">
          Official Cadre Certifications &amp; Sovereign Skill Credentials
        </h1>
<p class="text-body-md font-body-md text-primary-fixed-dim leading-relaxed">
          Tamper-proof, cryptographically signed competency credentials issued under the National Training Policy and recognized by MoSPI, DoPT, and SPARROW cadre appraisal boards.
        </p>
<!-- Verification Ledger Sub-strip -->
<div class="pt-space-sm flex flex-wrap items-center gap-y-2 gap-x-6 text-label-sm font-label-sm text-primary-fixed">
<div class="flex items-center gap-1.5">
<span class="material-symbols-outlined text-[18px] text-secondary-container">cloud_done</span>
<span>DigiLocker: <strong class="text-on-primary">Active &amp; Linked (Aadhaar Verified)</strong></span>
</div>
<div class="flex items-center gap-1.5">
<span class="material-symbols-outlined text-[18px] text-secondary-container">link</span>
<span>NIC Blockcerts SHA-256 Ledger: <strong class="text-on-primary">Live (Node #GOV-IN-771)</strong></span>
</div>
<div class="flex items-center gap-1.5">
<span class="material-symbols-outlined text-[18px] text-secondary-container">verified_user</span>
<span>Cadre Authority: <strong class="text-on-primary">NSSTA Apex Examination Council</strong></span>
</div>
</div>
</div>
<!-- Quick Actions -->
<div class="flex flex-row lg:flex-col sm:flex-row gap-space-sm shrink-0">
<button class="flex items-center justify-center gap-2 px-4 py-2.5 rounded bg-secondary text-on-secondary hover:bg-secondary-container transition-all font-label-md text-label-md shadow-sm" id="syncDigiBtn">
<span class="material-symbols-outlined text-[18px]">sync</span>
<span>Sync All with DigiLocker</span>
</button>
<button class="flex items-center justify-center gap-2 px-4 py-2.5 rounded bg-surface-container-highest text-primary hover:bg-surface-container-high transition-all font-label-md text-label-md" onclick="window.location.href='<?= BASE_URL ?>/api/export-csv.php'">
<span class="material-symbols-outlined text-[18px]">download</span>
<span>Certified Transcript (PDF)</span>
</button>
</div>
</div>
</div>
<!-- Notification Banner (Interactive) -->
<div class="hidden mb-space-md p-space-sm rounded-lg bg-surface-container-high text-primary flex items-center justify-between shadow-sm transition-all duration-300" id="syncBanner">
<div class="flex items-center gap-space-sm">
<span class="material-symbols-outlined text-secondary text-[20px]">task_alt</span>
<span class="font-body-md text-body-md">DigiLocker sync cycle complete: 8 cryptographic manifests validated against Aadhaar Vault (0 errors).</span>
</div>
<button class="p-1 hover:bg-surface-container rounded" onclick="document.getElementById('syncBanner').classList.add('hidden')">
<span class="material-symbols-outlined text-[18px]">close</span>
</button>
</div>
<!-- Top Cadre Certification Metrics Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-space-md mb-space-lg">
<!-- Metric 1 -->
<div class="p-space-md rounded-xl bg-surface-container-lowest shadow-sm flex flex-col justify-between">
<div>
<div class="flex items-center justify-between mb-space-xs">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Total Issued Credentials</span>
<span class="p-1.5 rounded-lg bg-surface-container text-primary">
<span class="material-symbols-outlined text-[20px]">workspace_premium</span>
</span>
</div>
<div class="text-headline-xl font-headline-xl text-primary leading-none">8</div>
<div class="mt-space-xs font-label-md text-label-md text-secondary font-semibold">
          6 Level-5 Mastery • 2 Badges
        </div>
</div>
<div class="mt-space-md pt-space-xs flex items-center gap-1 text-label-sm font-label-sm text-on-surface-variant">
<span class="material-symbols-outlined text-[16px] text-secondary">verified</span>
<span>100% DoPT GIGW Validated</span>
</div>
</div>
<!-- Metric 2 -->
<div class="p-space-md rounded-xl bg-surface-container-lowest shadow-sm flex flex-col justify-between">
<div>
<div class="flex items-center justify-between mb-space-xs">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">DoPT APAR Impact</span>
<span class="p-1.5 rounded-lg bg-surface-container text-primary">
<span class="material-symbols-outlined text-[20px]">trending_up</span>
</span>
</div>
<div class="text-headline-xl font-headline-xl text-primary leading-none">+15 pts</div>
<div class="mt-space-xs font-label-md text-label-md text-on-surface">
          Composite Readiness Index
        </div>
</div>
<div class="mt-space-md pt-space-xs flex items-center gap-1 text-label-sm font-label-sm text-on-surface-variant">
<span class="material-symbols-outlined text-[16px] text-secondary">assignment_turned_in</span>
<span>Direct weight in 2025-26 DPC</span>
</div>
</div>
<!-- Metric 3 -->
<div class="p-space-md rounded-xl bg-surface-container-lowest shadow-sm flex flex-col justify-between">
<div>
<div class="flex items-center justify-between mb-space-xs">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Cadre Accreditation</span>
<span class="p-1.5 rounded-lg bg-surface-container text-primary">
<span class="material-symbols-outlined text-[20px]">military_tech</span>
</span>
</div>
<div class="text-headline-sm font-headline-sm text-primary leading-snug">MoSPI Apex Mentor</div>
<div class="mt-space-xs font-body-sm text-body-sm text-on-surface-variant line-clamp-2">
          National Accounts Division Lead Faculty for Senior ISS Induction
        </div>
</div>
<div class="mt-space-md pt-space-xs flex items-center gap-1 text-label-sm font-label-sm text-on-surface-variant">
<span class="material-symbols-outlined text-[16px] text-secondary">badge</span>
<span>Valid for 3 Academic Cycles</span>
</div>
</div>
<!-- Metric 4 -->
<div class="p-space-md rounded-xl bg-surface-container-lowest shadow-sm flex flex-col justify-between">
<div>
<div class="flex items-center justify-between mb-space-xs">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Latest Award</span>
<span class="p-1.5 rounded-lg bg-surface-container text-primary">
<span class="material-symbols-outlined text-[20px]">history_edu</span>
</span>
</div>
<div class="text-headline-sm font-headline-sm text-primary leading-snug truncate">SUT Specialist</div>
<div class="mt-space-xs font-body-sm text-body-sm text-on-surface-variant">
          Issued 14 Oct 2024 by NSSTA
        </div>
</div>
<div class="mt-space-md pt-space-xs flex items-center gap-1 text-label-sm font-label-sm text-on-surface-variant">
<span class="material-symbols-outlined text-[16px] text-secondary">timer</span>
<span>Re-certification due: 2029</span>
</div>
</div>
</div>
<!-- Section Header & Filter Toolbar -->
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-space-sm mb-space-md">
<div class="flex items-center gap-space-sm">
<span class="w-3 h-3 rounded-full bg-secondary"></span>
<h2 class="text-headline-md font-headline-md text-primary">Cryptographically Verified Credentials</h2>
<span class="px-2.5 py-0.5 rounded-full bg-surface-container-high text-primary font-label-sm text-label-sm">4 Displayed</span>
</div>
<div class="flex items-center gap-2">
<span class="text-label-sm font-label-sm text-on-surface-variant">Filter by Domain:</span>
<button class="px-3 py-1 rounded bg-primary text-on-primary font-label-sm text-label-sm">All (8)</button>
<button class="px-3 py-1 rounded bg-surface-container-lowest text-on-surface hover:bg-surface-container font-label-sm text-label-sm">National Accounts</button>
<button class="px-3 py-1 rounded bg-surface-container-lowest text-on-surface hover:bg-surface-container font-label-sm text-label-sm">Digital Governance</button>
</div>
</div>
<!-- Credential Showcase Grid -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-space-lg mb-space-xl">
<!-- CERTIFICATE 1: Featured Gold Badge -->
<div class="relative flex flex-col justify-between rounded-xl bg-surface-container-lowest p-space-lg shadow-sm hover:shadow-md transition-shadow">
<div class="absolute top-0 right-0 w-32 h-32 overflow-hidden pointer-events-none rounded-tr-xl">
<div class="absolute transform rotate-45 bg-secondary text-on-secondary font-label-sm text-label-sm text-center font-bold py-1 right-[-35px] top-[20px] w-[130px] shadow-sm">
          APEX FELLOW
        </div>
</div>
<div>
<!-- Issuer Bar -->
<div class="flex items-center gap-space-md mb-space-md">
<div class="w-16 h-16 shrink-0 rounded-xl bg-surface-container-high flex items-center justify-center p-2 text-secondary">
<!-- Simulated Golden Ashoka / MoSPI Emblem SVG -->
<svg class="w-12 h-12" fill="currentColor" viewbox="0 0 100 100">
<circle cx="50" cy="50" fill="none" r="46" stroke="currentColor" stroke-width="4"></circle>
<circle cx="50" cy="50" fill="none" r="38" stroke="currentColor" stroke-dasharray="2 2" stroke-width="1.5"></circle>
<path d="M50 16 L56 32 L72 32 L59 42 L64 58 L50 48 L36 58 L41 42 L28 32 L44 32 Z" fill="currentColor"></path>
<path d="M30 65 C 40 60, 60 60, 70 65 L66 78 C 58 74, 42 74, 34 78 Z" fill="currentColor"></path>
<text fill="currentColor" font-size="8" font-weight="bold" text-anchor="middle" x="50" y="90">MoSPI • APEX</text>
</svg>
</div>
<div class="min-w-0 pr-12">
<div class="flex items-center gap-2">
<span class="px-2 py-0.5 rounded bg-surface-container-high text-primary font-label-sm text-label-sm uppercase font-bold">Level-5 Sovereign Mastery</span>
<span class="text-label-sm font-label-sm text-secondary font-semibold flex items-center gap-0.5">
<span class="material-symbols-outlined text-[14px]">lock</span>
                e-Sign Authenticated
              </span>
</div>
<h3 class="text-headline-sm font-headline-sm text-primary mt-1 leading-snug">
              Fellow in National Accounts &amp; System of National Accounts (SNA 2008)
            </h3>
<p class="text-body-sm font-body-sm text-on-surface-variant mt-0.5">
              National Accounts Division (NAD) &amp; NSSTA, MoSPI
            </p>
</div>
</div>
<!-- Meta Grid -->
<div class="grid grid-cols-2 gap-space-sm p-space-sm rounded-lg bg-surface-container-low mb-space-md text-label-sm font-label-sm">
<div>
<span class="text-on-surface-variant block">Issue Date:</span>
<span class="text-on-surface font-semibold">12 October 2024</span>
</div>
<div>
<span class="text-on-surface-variant block">Validity:</span>
<span class="text-secondary font-semibold">Permanent Cadre Credential</span>
</div>
<div class="col-span-2 pt-1 border-t border-surface-variant">
<span class="text-on-surface-variant block">NIC Cryptographic Proof:</span>
<code class="text-primary font-mono text-[11px] break-all">SHA256: 9b7c841fa16298ef902e4d58bb71c24e58849b20e294119d83acb34f1e</code>
</div>
</div>
<!-- Skills Badges -->
<div class="mb-space-md">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider block mb-1.5">
            Accredited Competencies:
          </span>
<div class="flex flex-wrap gap-1.5">
<span class="px-2.5 py-1 rounded-full bg-surface-container text-primary font-label-sm text-label-sm">Supply-Use Tables (SUT)</span>
<span class="px-2.5 py-1 rounded-full bg-surface-container text-primary font-label-sm text-label-sm">RAS Matrix Balancing</span>
<span class="px-2.5 py-1 rounded-full bg-surface-container text-primary font-label-sm text-label-sm">Gross Fixed Capital Formation (GFCF)</span>
<span class="px-2.5 py-1 rounded-full bg-surface-container text-primary font-label-sm text-label-sm">SNA 2025 Revision Working Group</span>
</div>
</div>
</div>
<!-- Action Footer -->
<div class="pt-space-sm flex flex-wrap items-center justify-between gap-2">
<button class="flex items-center gap-1 text-primary hover:text-secondary font-label-sm text-label-sm transition-colors" onclick="verifyHashModal('9b7c841fa16298ef902e4d58bb71c24e58849b20e294119d83acb34f1e')">
<span class="material-symbols-outlined text-[16px]">verified</span>
<span>Verify On-Chain Hash</span>
</button>
<div class="flex items-center gap-2">
<button class="flex items-center gap-1.5 px-3 py-1.5 rounded bg-surface-container-high text-primary hover:bg-surface-container transition-all font-label-sm text-label-sm" onclick="mockPushDigi('Fellow in SNA 2008')">
<span class="material-symbols-outlined text-[16px]">cloud_upload</span>
<span>Push to DigiLocker</span>
</button>
<button class="flex items-center gap-1.5 px-3 py-1.5 rounded bg-primary text-on-primary hover:bg-primary-container transition-all font-label-sm text-label-sm shadow-sm" onclick="downloadTranscriptMock('SNA_Fellow_2024.pdf')">
<span class="material-symbols-outlined text-[16px]">download</span>
<span>PDF Certificate</span>
</button>
</div>
</div>
</div>
<!-- CERTIFICATE 2: Technical Specialization -->
<div class="relative flex flex-col justify-between rounded-xl bg-surface-container-lowest p-space-lg shadow-sm hover:shadow-md transition-shadow">
<div>
<!-- Issuer Bar -->
<div class="flex items-center gap-space-md mb-space-md">
<div class="w-16 h-16 shrink-0 rounded-xl bg-tertiary-container flex items-center justify-center p-2 text-on-tertiary">
<!-- Simulated Silver Data Badge -->
<svg class="w-12 h-12" fill="currentColor" viewbox="0 0 100 100">
<rect fill="none" height="70" rx="14" stroke="currentColor" stroke-width="4" width="70" x="15" y="15"></rect>
<path d="M30 40 L45 55 L70 30" fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="6"></path>
<circle cx="35" cy="70" fill="currentColor" r="4"></circle>
<circle cx="50" cy="70" fill="currentColor" r="4"></circle>
<circle cx="65" cy="70" fill="currentColor" r="4"></circle>
</svg>
</div>
<div class="min-w-0">
<div class="flex items-center gap-2">
<span class="px-2 py-0.5 rounded bg-surface-container text-primary font-label-sm text-label-sm uppercase font-bold">iGOT Technical Diploma</span>
<span class="text-label-sm font-label-sm text-secondary font-semibold">Proctored Assessment</span>
</div>
<h3 class="text-headline-sm font-headline-sm text-primary mt-1 leading-snug">
              Modern Computational Microdata Processing (Python &amp; SQL Pipelines)
            </h3>
<p class="text-body-sm font-body-sm text-on-surface-variant mt-0.5">
              iGOT Karmayogi Bharat &amp; NIC Centre of Excellence
            </p>
</div>
</div>
<!-- Meta Grid -->
<div class="grid grid-cols-2 gap-space-sm p-space-sm rounded-lg bg-surface-container-low mb-space-md text-label-sm font-label-sm">
<div>
<span class="text-on-surface-variant block">Issue Date:</span>
<span class="text-on-surface font-semibold">04 August 2024</span>
</div>
<div>
<span class="text-on-surface-variant block">Assessment Grade:</span>
<span class="text-primary font-semibold">92% Score (Distinction)</span>
</div>
<div class="col-span-2 pt-1 border-t border-surface-variant">
<span class="text-on-surface-variant block">Cadre Serial Identifier:</span>
<code class="text-primary font-mono text-[11px]">iGOT-ISS-2024-COMP-8891-B7</code>
</div>
</div>
<!-- Skills Badges -->
<div class="mb-space-md">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider block mb-1.5">
            Accredited Competencies:
          </span>
<div class="flex flex-wrap gap-1.5">
<span class="px-2.5 py-1 rounded-full bg-surface-container text-primary font-label-sm text-label-sm">Automated PLFS Imputation</span>
<span class="px-2.5 py-1 rounded-full bg-surface-container text-primary font-label-sm text-label-sm">PostgreSQL Big Data Sharding</span>
<span class="px-2.5 py-1 rounded-full bg-surface-container text-primary font-label-sm text-label-sm">Pandas &amp; NumPy Pipeline Vectorization</span>
</div>
</div>
</div>
<!-- Action Footer -->
<div class="pt-space-sm flex flex-wrap items-center justify-between gap-2">
<button class="flex items-center gap-1 text-primary hover:text-secondary font-label-sm text-label-sm transition-colors" onclick="verifyHashModal('iGOT-ISS-2024-COMP-8891-B7')">
<span class="material-symbols-outlined text-[16px]">receipt_long</span>
<span>View On-Chain Receipt</span>
</button>
<div class="flex items-center gap-2">
<button class="flex items-center gap-1.5 px-3 py-1.5 rounded bg-surface-container-high text-primary hover:bg-surface-container transition-all font-label-sm text-label-sm" onclick="mockPushDigi('Computational Microdata Processing')">
<span class="material-symbols-outlined text-[16px]">cloud_upload</span>
<span>Push to DigiLocker</span>
</button>
<button class="flex items-center gap-1.5 px-3 py-1.5 rounded bg-primary text-on-primary hover:bg-primary-container transition-all font-label-sm text-label-sm shadow-sm" onclick="downloadTranscriptMock('iGOT_Microdata_2024.pdf')">
<span class="material-symbols-outlined text-[16px]">download</span>
<span>Download</span>
</button>
</div>
</div>
</div>
<!-- CERTIFICATE 3: Executive Training -->
<div class="relative flex flex-col justify-between rounded-xl bg-surface-container-lowest p-space-lg shadow-sm hover:shadow-md transition-shadow">
<div>
<!-- Issuer Bar -->
<div class="flex items-center gap-space-md mb-space-md">
<div class="w-16 h-16 shrink-0 rounded-xl bg-surface-container flex items-center justify-center p-2 text-primary">
<!-- Residential Scholar Emblem SVG -->
<svg class="w-12 h-12" fill="currentColor" viewbox="0 0 100 100">
<path d="M50 15 L85 35 L50 55 L15 35 Z" fill="currentColor"></path>
<path d="M25 45 L25 70 C 25 80, 75 80, 75 70 L75 45" fill="none" stroke="currentColor" stroke-width="4"></path>
<rect fill="currentColor" height="25" width="16" x="42" y="55"></rect>
</svg>
</div>
<div class="min-w-0">
<div class="flex items-center gap-2">
<span class="px-2 py-0.5 rounded bg-surface-container text-primary font-label-sm text-label-sm uppercase font-bold">NSSTA Residential Fellow</span>
<span class="text-label-sm font-label-sm text-secondary font-semibold">Greater Noida Campus</span>
</div>
<h3 class="text-headline-sm font-headline-sm text-primary mt-1 leading-snug">
              Executive Residential Certificate on Price Indices &amp; Deflator Mechanics
            </h3>
<p class="text-body-sm font-body-sm text-on-surface-variant mt-0.5">
              National Statistical Systems Training Academy (NSSTA)
            </p>
</div>
</div>
<!-- Meta Grid -->
<div class="grid grid-cols-2 gap-space-sm p-space-sm rounded-lg bg-surface-container-low mb-space-md text-label-sm font-label-sm">
<div>
<span class="text-on-surface-variant block">Format &amp; Duration:</span>
<span class="text-on-surface font-semibold">5-Day Residential Intensive</span>
</div>
<div>
<span class="text-on-surface-variant block">Conducted:</span>
<span class="text-on-surface font-semibold">May 2024</span>
</div>
<div class="col-span-2 pt-1 border-t border-surface-variant">
<span class="text-on-surface-variant block">Faculty Evaluation:</span>
<span class="text-secondary font-semibold">Grade A+ (Distinguished Academic Contributor)</span>
</div>
</div>
<!-- Skills Badges -->
<div class="mb-space-md">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider block mb-1.5">
            Accredited Competencies:
          </span>
<div class="flex flex-wrap gap-1.5">
<span class="px-2.5 py-1 rounded-full bg-surface-container text-primary font-label-sm text-label-sm">WPI / CPI Chain-Weighted Linking</span>
<span class="px-2.5 py-1 rounded-full bg-surface-container text-primary font-label-sm text-label-sm">Hedonic Price Adjustments</span>
<span class="px-2.5 py-1 rounded-full bg-surface-container text-primary font-label-sm text-label-sm">Services Sector Price Indexes (SSPI)</span>
</div>
</div>
</div>
<!-- Action Footer -->
<div class="pt-space-sm flex flex-wrap items-center justify-between gap-2">
<button class="flex items-center gap-1 text-primary hover:text-secondary font-label-sm text-label-sm transition-colors" onclick="verifyHashModal('NSSTA-RES-2024-DEF-0441')">
<span class="material-symbols-outlined text-[16px]">verified</span>
<span>Verify Faculty Endorsement</span>
</button>
<div class="flex items-center gap-2">
<button class="flex items-center gap-1.5 px-3 py-1.5 rounded bg-surface-container-high text-primary hover:bg-surface-container transition-all font-label-sm text-label-sm" onclick="mockPushDigi('Price Indices &amp; Deflator Mechanics')">
<span class="material-symbols-outlined text-[16px]">cloud_upload</span>
<span>Push to DigiLocker</span>
</button>
<button class="flex items-center gap-1.5 px-3 py-1.5 rounded bg-primary text-on-primary hover:bg-primary-container transition-all font-label-sm text-label-sm shadow-sm" onclick="downloadTranscriptMock('NSSTA_Executive_Price_2024.pdf')">
<span class="material-symbols-outlined text-[16px]">download</span>
<span>Download</span>
</button>
</div>
</div>
</div>
<!-- CERTIFICATE 4: Governance & Law -->
<div class="relative flex flex-col justify-between rounded-xl bg-surface-container-lowest p-space-lg shadow-sm hover:shadow-md transition-shadow">
<div>
<!-- Issuer Bar -->
<div class="flex items-center gap-space-md mb-space-md">
<div class="w-16 h-16 shrink-0 rounded-xl bg-primary-container flex items-center justify-center p-2 text-secondary-fixed">
<!-- Statutory Seal SVG -->
<svg class="w-12 h-12" fill="currentColor" viewbox="0 0 100 100">
<path d="M50 12 L80 25 L80 50 C 80 70, 50 88, 50 88 C 50 88, 20 70, 20 50 L20 25 Z" fill="none" stroke="currentColor" stroke-width="4"></path>
<path d="M40 50 L48 58 L65 40" fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="5"></path>
</svg>
</div>
<div class="min-w-0">
<div class="flex items-center gap-2">
<span class="px-2 py-0.5 rounded bg-surface-container text-primary font-label-sm text-label-sm uppercase font-bold">Statutory Sovereign Officer</span>
<span class="text-label-sm font-label-sm text-secondary font-semibold">Parliamentary Mandate</span>
</div>
<h3 class="text-headline-sm font-headline-sm text-primary mt-1 leading-snug">
              DPDPA 2023 Statutory Compliance &amp; Sovereign Anonymization Officer
            </h3>
<p class="text-body-sm font-body-sm text-on-surface-variant mt-0.5">
              DoPT &amp; National Data Governance Office (MeitY/MoSPI)
            </p>
</div>
</div>
<!-- Meta Grid -->
<div class="grid grid-cols-2 gap-space-sm p-space-sm rounded-lg bg-surface-container-low mb-space-md text-label-sm font-label-sm">
<div>
<span class="text-on-surface-variant block">Gazette Authorization:</span>
<span class="text-on-surface font-semibold">15 January 2024</span>
</div>
<div>
<span class="text-on-surface-variant block">Legal Status:</span>
<span class="text-secondary font-semibold">Certified Data Fiduciary Lead</span>
</div>
<div class="col-span-2 pt-1 border-t border-surface-variant">
<span class="text-on-surface-variant block">Sovereign Audit Key:</span>
<code class="text-primary font-mono text-[11px]">DPDPA-AUTH-ISS-2024-00918-M</code>
</div>
</div>
<!-- Skills Badges -->
<div class="mb-space-md">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider block mb-1.5">
            Accredited Competencies:
          </span>
<div class="flex flex-wrap gap-1.5">
<span class="px-2.5 py-1 rounded-full bg-surface-container text-primary font-label-sm text-label-sm">Differential Privacy Formulation</span>
<span class="px-2.5 py-1 rounded-full bg-surface-container text-primary font-label-sm text-label-sm">K-Anonymity for Microdata</span>
<span class="px-2.5 py-1 rounded-full bg-surface-container text-primary font-label-sm text-label-sm">Data Principal Consent Management</span>
</div>
</div>
</div>
<!-- Action Footer -->
<div class="pt-space-sm flex flex-wrap items-center justify-between gap-2">
<button class="flex items-center gap-1 text-primary hover:text-secondary font-label-sm text-label-sm transition-colors" onclick="verifyHashModal('DPDPA-AUTH-ISS-2024-00918-M')">
<span class="material-symbols-outlined text-[16px]">gavel</span>
<span>Verify Statutory Gazette Match</span>
</button>
<div class="flex items-center gap-2">
<button class="flex items-center gap-1.5 px-3 py-1.5 rounded bg-surface-container-high text-primary hover:bg-surface-container transition-all font-label-sm text-label-sm" onclick="mockPushDigi('DPDPA 2023 Statutory Compliance')">
<span class="material-symbols-outlined text-[16px]">cloud_upload</span>
<span>Push to DigiLocker</span>
</button>
<button class="flex items-center gap-1.5 px-3 py-1.5 rounded bg-primary text-on-primary hover:bg-primary-container transition-all font-label-sm text-label-sm shadow-sm" onclick="downloadTranscriptMock('DPDPA_Statutory_Officer_2024.pdf')">
<span class="material-symbols-outlined text-[16px]">download</span>
<span>Download</span>
</button>
</div>
</div>
</div>
</div>
<!-- Promotion & DPC Alignment Panel (Full Width Bottom Card) -->
<div class="w-full rounded-xl bg-surface-container-lowest p-space-lg shadow-sm">
<div class="flex flex-col lg:flex-row lg:items-center justify-between gap-space-md pb-space-md border-b border-surface-container-high">
<div>
<div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-secondary-fixed text-on-secondary-fixed-variant font-label-sm text-label-sm font-semibold mb-space-xs">
<span class="material-symbols-outlined text-[16px]">account_balance</span>
          Cadre Elevation Benchmark Assessment
        </div>
<h2 class="text-headline-md font-headline-md text-primary">
          Departmental Promotion Committee (DPC) Portfolio Matrix
        </h2>
<p class="text-body-md font-body-md text-on-surface-variant">
          Cadre Progression Track: <strong class="text-primary font-semibold">Grade 13A (Joint Director)</strong> → <strong class="text-secondary font-semibold">Grade 14 (Senior Director / DDG Level)</strong>
</p>
</div>
<!-- Score Pill -->
<div class="flex items-center gap-space-md bg-surface-container-low p-space-sm rounded-lg">
<div class="text-right">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase block">Benchmark Criteria</span>
<span class="font-headline-sm text-headline-sm text-primary font-bold">7 of 8 Met</span>
</div>
<div class="relative w-12 h-12 flex items-center justify-center">
<!-- Circular Progress SVG 87.5% -->
<svg class="w-12 h-12 -rotate-90" viewbox="0 0 36 36">
<path class="text-surface-container-high" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-width="3.5"></path>
<path class="text-secondary" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-dasharray="87.5, 100" stroke-linecap="round" stroke-width="3.5"></path>
</svg>
<span class="absolute text-label-sm font-label-sm font-bold text-primary">88%</span>
</div>
</div>
</div>
<!-- Requirements Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-space-md py-space-md">
<!-- Req 1 -->
<div class="p-space-sm rounded-lg bg-surface-container-low flex flex-col justify-between">
<div>
<div class="flex items-center justify-between mb-1">
<span class="font-label-sm text-label-sm font-bold text-primary">Requirement 1</span>
<span class="material-symbols-outlined text-secondary text-[20px]">check_circle</span>
</div>
<div class="font-label-md text-label-md text-primary font-semibold">SNA Core Master Credential</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Verified Fellow in National Accounts via NSSTA apex examination.</p>
</div>
<div class="mt-space-sm pt-space-xs text-label-sm font-label-sm text-secondary font-semibold">
          Fulfilled &amp; Validated ✓
        </div>
</div>
<!-- Req 2 -->
<div class="p-space-sm rounded-lg bg-surface-container-low flex flex-col justify-between">
<div>
<div class="flex items-center justify-between mb-1">
<span class="font-label-sm text-label-sm font-bold text-primary">Requirement 2</span>
<span class="material-symbols-outlined text-secondary text-[20px]">check_circle</span>
</div>
<div class="font-label-md text-label-md text-primary font-semibold">Computational Statistics Module</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">iGOT Level-4 proctored code pipeline assessment verified at 92%.</p>
</div>
<div class="mt-space-sm pt-space-xs text-label-sm font-label-sm text-secondary font-semibold">
          Fulfilled &amp; Validated ✓
        </div>
</div>
<!-- Req 3 -->
<div class="p-space-sm rounded-lg bg-surface-container-low flex flex-col justify-between">
<div>
<div class="flex items-center justify-between mb-1">
<span class="font-label-sm text-label-sm font-bold text-primary">Requirement 3</span>
<span class="material-symbols-outlined text-secondary text-[20px]">check_circle</span>
</div>
<div class="font-label-md text-label-md text-primary font-semibold">DPDPA Statutory Badge</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Official Data Anonymization Certification under Gazette Rules.</p>
</div>
<div class="mt-space-sm pt-space-xs text-label-sm font-label-sm text-secondary font-semibold">
          Fulfilled &amp; Validated ✓
        </div>
</div>
<!-- Req 4: Pending -->
<div class="p-space-sm rounded-lg bg-surface-container flex flex-col justify-between">
<div>
<div class="flex items-center justify-between mb-1">
<span class="font-label-sm text-label-sm font-bold text-primary">Requirement 4</span>
<span class="material-symbols-outlined text-secondary-container text-[20px] animate-pulse">pending</span>
</div>
<div class="font-label-md text-label-md text-primary font-semibold">Spatial GIS Microdata Disaggregation</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Mandatory NSSTA 5-day workshop scheduled for October 2025.</p>
</div>
<div class="mt-space-sm pt-space-xs">
<a class="inline-flex items-center gap-1 text-label-sm font-label-sm text-secondary font-semibold hover:underline" href="<?= BASE_URL ?>/pages/nssta-programmes.php">
<span>Nomination Form Pre-Filled</span>
<span class="material-symbols-outlined text-[14px]">arrow_forward</span>
</a>
</div>
</div>
</div>
<!-- SPARROW Sync Status Alert Footer -->
<div class="p-space-sm rounded-lg bg-surface-container flex flex-col sm:flex-row sm:items-center justify-between gap-space-sm">
<div class="flex items-center gap-space-sm">
<span class="material-symbols-outlined text-primary text-[22px]">sync_saved_locally</span>
<div>
<span class="font-label-md text-label-md text-primary font-semibold">e-HRMS SPARROW Part-1 Officer Auto-Reflection Active</span>
<p class="font-body-sm text-body-sm text-on-surface-variant">All official credentials and sovereign badges are continuously committed to Officer e-Dossier (ID: ISS-2008-0412).</p>
</div>
</div>
<button class="shrink-0 px-3.5 py-1.5 rounded bg-primary text-on-primary hover:bg-primary-container font-label-sm text-label-sm transition-all" onclick="alert('Exporting sealed APAR annexure formatted in official DoPT XML &amp; PDF format...')">
        Download APAR Annexure
      </button>
</div>
</div>
<!-- Verification Modal Container (Hidden by default) -->
<div class="fixed inset-0 bg-primary/60 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4" id="verifyModal">
<div class="bg-surface-container-lowest max-w-xl w-full rounded-xl shadow-2xl p-space-lg relative">
<button class="absolute top-4 right-4 text-on-surface-variant hover:text-primary" onclick="closeHashModal()">
<span class="material-symbols-outlined">close</span>
</button>
<div class="flex items-center gap-space-sm mb-space-md">
<div class="w-10 h-10 rounded-full bg-secondary-fixed flex items-center justify-center text-on-secondary-fixed">
<span class="material-symbols-outlined text-[24px]">verified</span>
</div>
<div>
<h3 class="text-headline-sm font-headline-sm text-primary">NIC Sovereign Hash Verification</h3>
<p class="text-body-sm font-body-sm text-on-surface-variant">Decentralized Official Ledger Audit Node #GOV-IN-771</p>
</div>
</div>
<div class="space-y-space-sm p-space-md bg-surface-container-low rounded-lg mb-space-md font-mono text-label-sm">
<div>
<span class="text-on-surface-variant block font-sans text-[11px] uppercase">Ledger Merkle Root:</span>
<span class="text-primary break-all">0x71fa49cbe7729901e882a1dca91024881902882a</span>
</div>
<div>
<span class="text-on-surface-variant block font-sans text-[11px] uppercase">Target Credential Hash:</span>
<span class="text-secondary break-all font-bold" id="modalHashValue"></span>
</div>
<div>
<span class="text-on-surface-variant block font-sans text-[11px] uppercase">Cryptographic Status:</span>
<span class="text-secondary font-sans font-bold flex items-center gap-1">
<span class="material-symbols-outlined text-[16px]">check_circle</span>
            Uncompromised / Sealed by NSSTA Root Key Authority
          </span>
</div>
</div>
<div class="flex justify-end gap-2">
<button class="px-4 py-2 rounded bg-surface-container text-primary font-label-md text-label-md" onclick="closeHashModal()">
          Close Audit Window
        </button>
<button class="px-4 py-2 rounded bg-primary text-on-primary font-label-md text-label-md" onclick="alert('Cryptographic receipt downloaded as JSON-LD proof envelope.')">
          Download Proof Envelope (.json)
        </button>
</div>
</div>
</div>
</div>
<script>
  // Micro-interaction behaviors
  document.getElementById('syncDigiBtn')?.addEventListener('click', function() {
    const btn = this;
    const originalText = btn.innerHTML;
    btn.innerHTML = '<span class="material-symbols-outlined text-[18px] animate-spin">progress_activity</span><span>Syncing with DigiLocker...</span>';
    btn.disabled = true;

    setTimeout(() => {
      btn.innerHTML = originalText;
      btn.disabled = false;
      const banner = document.getElementById('syncBanner');
      if (banner) banner.classList.remove('hidden');
    }, 1200);
  });

  function verifyHashModal(hash) {
    const modal = document.getElementById('verifyModal');
    const hashEl = document.getElementById('modalHashValue');
    if (modal && hashEl) {
      hashEl.textContent = hash;
      modal.classList.remove('hidden');
    }
  }

  function closeHashModal() {
    const modal = document.getElementById('verifyModal');
    if (modal) modal.classList.add('hidden');
  }

  function mockPushDigi(certName) {
    alert('Pushing "' + certName + '" to Dr. Rajesh Sharma\'s linked DigiLocker account (Aadhaar ending in 9081)...\\nStatus: Manifest Created & Authenticated.');
  }

  function downloadTranscriptMock(fileName) {
    alert('Generating Sovereign PDF Transcript with embedded cryptographic QR Code: ' + (fileName || 'Dr_Rajesh_Sharma_ISS_Full_Cadre_Transcript.pdf'));
  }
</script></main><footer class="w-full bg-surface-container-low text-on-surface-variant py-space-md px-space-lg mt-space-lg"><div class="flex flex-col md:flex-row items-center justify-between gap-space-sm text-body-sm font-body-sm"><span>Gap2Grow Cadre Portal • National Statistical Systems Training Academy (NSSTA) • MoSPI</span><span>GIGW-3.0 Compliant • NIC Gateway Secure Node</span></div></footer></div></body></html>
