<?php
// Public Header for landing & login pages
require_once __DIR__ . '/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <meta content="web_standard" name="shell-type"/>
  <title><?= htmlspecialchars($pageTitle ?? 'Gap2Grow — Sovereign Single Sign-On') ?></title>
  
  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin=""/>
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>

  <!-- Tailwind CSS via CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script id="tailwind-config">
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          colors: {
            "surface-container-lowest": "#ffffff",
            "surface": "#f8f9ff",
            "primary-fixed": "#d5e3ff",
            "secondary-container": "#fc6018",
            "surface-tint": "#495f82",
            "on-background": "#0d1c2f",
            "on-tertiary-fixed": "#00164e",
            "error": "#ba1a1a",
            "on-surface": "#0d1c2f",
            "tertiary-fixed": "#dce1ff",
            "surface-container-highest": "#d5e3fd",
            "on-tertiary": "#ffffff",
            "tertiary-container": "#001e63",
            "on-tertiary-container": "#7088dc",
            "primary": "#001026",
            "surface-container": "#e6eeff",
            "on-surface-variant": "#44474e",
            "background": "#f8f9ff",
            "on-secondary-fixed-variant": "#802a00",
            "on-primary": "#ffffff",
            "tertiary-fixed-dim": "#b6c4ff",
            "secondary": "#a83900",
            "inverse-on-surface": "#ebf1ff",
            "tertiary": "#000c34",
            "on-primary-container": "#778db2",
            "primary-container": "#0b2545",
            "surface-dim": "#ccdbf4",
            "on-primary-fixed": "#001c3b",
            "on-secondary-fixed": "#380d00",
            "inverse-primary": "#b1c7f0",
            "error-container": "#ffdad6",
            "on-error-container": "#93000a",
            "inverse-surface": "#233144",
            "on-tertiary-fixed-variant": "#264191",
            "secondary-fixed": "#ffdbcf",
            "outline": "#74777f",
            "on-primary-fixed-variant": "#314769",
            "on-error": "#ffffff",
            "surface-container-low": "#eff4ff",
            "secondary-fixed-dim": "#ffb59a",
            "surface-variant": "#d5e3fd",
            "on-secondary-container": "#531800",
            "on-secondary": "#ffffff",
            "surface-container-high": "#dde9ff",
            "outline-variant": "#c4c6cf",
            "surface-bright": "#f8f9ff",
            "primary-fixed-dim": "#b1c7f0"
          },
          borderRadius: {
            DEFAULT: "0.125rem",
            lg: "0.25rem",
            xl: "0.5rem",
            full: "0.75rem"
          },
          spacing: {
            "gutter-mobile": "0.75rem",
            "margin-mobile": "1rem",
            "space-lg": "1.5rem",
            "space-sm": "0.5rem",
            "gutter": "1.5rem",
            "space-md": "1rem",
            "space-xs": "0.25rem",
            "margin": "2rem",
            "space-xl": "2.5rem"
          },
          fontFamily: {
            "label-lg": ["Public Sans"],
            "label-md": ["Public Sans"],
            "body-lg": ["Public Sans"],
            "body-md": ["Public Sans"],
            "headline-lg": ["Public Sans"],
            "headline-xl": ["Public Sans"],
            "headline-lg-mobile": ["Public Sans"],
            "label-sm": ["Public Sans"],
            "headline-md": ["Public Sans"],
            "body-sm": ["Public Sans"],
            "headline-sm": ["Public Sans"],
            "headline-xl-mobile": ["Public Sans"]
          }
        }
      }
    };
  </script>

  <style>
    @layer base {
      html, body { margin:0; padding:0; }
      body { overscroll-behavior:none; }
      main>:first-child { margin-top:0!important; }
      main>:last-child { margin-bottom:0!important; }
    }
    ::-webkit-scrollbar { display:none; }
  </style>
  <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/app.css"/>
</head>
<body class="bg-surface font-body-md text-body-md text-on-surface antialiased">

<header class="fixed top-0 w-full z-50">
  <!-- Top Sovereign Strip -->
  <div class="bg-primary-container text-on-primary text-label-sm font-label-sm">
    <div class="max-w-7xl mx-auto px-space-md sm:px-gutter flex items-center justify-between h-8">
      <span class="truncate">भारत सरकार | Government of India | सांख्यिकी और कार्यक्रम कार्यान्वयन मंत्रालय (MoSPI)</span>
      <div class="flex items-center gap-space-md shrink-0">
        <div class="hidden sm:flex items-center gap-space-xs">
          <button class="px-1 hover:text-secondary-fixed transition-colors" type="button" onclick="document.body.style.fontSize='90%'">A-</button>
          <button class="px-1 hover:text-secondary-fixed transition-colors" type="button" onclick="document.body.style.fontSize='100%'">A</button>
          <button class="px-1 hover:text-secondary-fixed transition-colors" type="button" onclick="document.body.style.fontSize='110%'">A+</button>
        </div>
        <span class="text-outline hidden sm:inline">|</span>
        <button class="hover:text-secondary-fixed transition-colors" type="button">हिन्दी</button>
      </div>
    </div>
  </div>

  <!-- Curved Floating Navigation Pill -->
  <div class="max-w-7xl mx-auto px-space-sm sm:px-gutter pt-space-xs">
    <div class="bg-surface-container-lowest/95 backdrop-blur-md shadow-[0_10px_30px_rgba(11,37,69,0.08)] rounded-[2rem] px-space-md sm:px-space-lg py-space-sm flex items-center justify-between">
      <a href="<?= BASE_URL ?>/pages/portal.php" class="flex items-center gap-space-md">
        <div class="w-10 h-10 rounded-full bg-primary-container flex items-center justify-center text-on-primary font-headline-sm text-headline-sm font-bold">G</div>
        <div>
          <div class="font-headline-sm text-headline-sm text-primary tracking-tight leading-tight">Gap2Grow</div>
          <div class="font-label-sm text-label-sm text-on-surface-variant">MoSPI • NSSTA Cadre Intelligence</div>
        </div>
      </a>
      
      <nav class="hidden lg:flex items-center gap-space-xs bg-surface-container-low/60 p-1.5 rounded-full" data-active-classes="bg-surface-container text-primary font-label-md rounded-full">
        <a class="px-space-md py-1.5 transition-colors font-label-md text-label-md rounded-full <?= ($currentPage ?? '') === 'home' ? 'bg-surface-container text-primary font-bold shadow-sm' : 'text-on-surface-variant hover:text-on-surface' ?>" href="<?= BASE_URL ?>/pages/portal.php">Home</a>
        <a class="px-space-md py-1.5 transition-colors font-label-md text-label-md rounded-full <?= ($currentPage ?? '') === 'about' ? 'bg-surface-container text-primary font-bold shadow-sm' : 'text-on-surface-variant hover:text-on-surface' ?>" href="<?= BASE_URL ?>/pages/about.php">About Platform</a>
        <a class="px-space-md py-1.5 transition-colors font-label-md text-label-md rounded-full <?= ($currentPage ?? '') === 'framework' ? 'bg-surface-container text-primary font-bold shadow-sm' : 'text-on-surface-variant hover:text-on-surface' ?>" href="<?= BASE_URL ?>/pages/competency-framework.php">Competency Framework</a>
        <a class="px-space-md py-1.5 transition-colors font-label-md text-label-md rounded-full <?= ($currentPage ?? '') === 'igot' ? 'bg-surface-container text-primary font-bold shadow-sm' : 'text-on-surface-variant hover:text-on-surface' ?>" href="<?= BASE_URL ?>/pages/igot-ecosystem.php">iGOT Ecosystem</a>
        <a class="px-space-md py-1.5 transition-colors font-label-md text-label-md rounded-full <?= ($currentPage ?? '') === 'nssta' ? 'bg-surface-container text-primary font-bold shadow-sm' : 'text-on-surface-variant hover:text-on-surface' ?>" href="<?= BASE_URL ?>/pages/nssta-tpac.php">NSSTA TPAC</a>
        <a class="px-space-md py-1.5 transition-colors font-label-md text-label-md rounded-full <?= ($currentPage ?? '') === 'helpdesk' ? 'bg-surface-container text-primary font-bold shadow-sm' : 'text-on-surface-variant hover:text-on-surface' ?>" href="<?= BASE_URL ?>/pages/helpdesk.php">Helpdesk</a>
      </nav>

      <div class="flex items-center gap-space-sm">
        <a class="hidden sm:inline-flex items-center px-space-md py-2 text-primary font-label-md text-label-md hover:text-secondary transition-colors" href="<?= BASE_URL ?>/pages/competency-framework.php">
          Explore Framework
        </a>
        <a class="inline-flex items-center gap-space-xs bg-secondary hover:bg-on-secondary-fixed-variant text-on-secondary font-label-md text-label-md px-space-md sm:px-space-lg py-2 rounded-full transition-all shadow-[0_4px_12px_rgba(168,57,0,0.25)]" href="<?= isset($_SESSION['user_id']) ? BASE_URL . '/pages/dashboard.php' : BASE_URL . '/index.php' ?>">
          <span class="material-symbols-outlined text-[16px]">fingerprint</span>
          <span><?= isset($_SESSION['user_id']) ? 'Officer Console' : 'Parichay / e-HRMS' ?></span>
        </a>
        <!-- Mobile hamburger -->
        <button type="button" class="lg:hidden p-2 text-primary hover:text-secondary" onclick="document.getElementById('mobile-public-nav').classList.toggle('hidden')">
          <span class="material-symbols-outlined text-[24px]">menu</span>
        </button>
      </div>
    </div>
  </div>

  <!-- Mobile Collapsible Navigation Menu -->
  <div id="mobile-public-nav" class="hidden lg:hidden max-w-7xl mx-auto px-space-sm pt-2">
    <div class="bg-surface-container-lowest shadow-xl rounded-2xl p-4 flex flex-col gap-2 border border-surface-container">
      <a class="px-4 py-2 rounded-lg font-label-md text-label-md <?= ($currentPage ?? '') === 'home' ? 'bg-primary text-on-primary font-bold' : 'text-on-surface hover:bg-surface-container' ?>" href="<?= BASE_URL ?>/pages/portal.php">Home</a>
      <a class="px-4 py-2 rounded-lg font-label-md text-label-md <?= ($currentPage ?? '') === 'about' ? 'bg-primary text-on-primary font-bold' : 'text-on-surface hover:bg-surface-container' ?>" href="<?= BASE_URL ?>/pages/about.php">About Platform</a>
      <a class="px-4 py-2 rounded-lg font-label-md text-label-md <?= ($currentPage ?? '') === 'framework' ? 'bg-primary text-on-primary font-bold' : 'text-on-surface hover:bg-surface-container' ?>" href="<?= BASE_URL ?>/pages/competency-framework.php">Competency Framework</a>
      <a class="px-4 py-2 rounded-lg font-label-md text-label-md <?= ($currentPage ?? '') === 'igot' ? 'bg-primary text-on-primary font-bold' : 'text-on-surface hover:bg-surface-container' ?>" href="<?= BASE_URL ?>/pages/igot-ecosystem.php">iGOT Ecosystem</a>
      <a class="px-4 py-2 rounded-lg font-label-md text-label-md <?= ($currentPage ?? '') === 'nssta' ? 'bg-primary text-on-primary font-bold' : 'text-on-surface hover:bg-surface-container' ?>" href="<?= BASE_URL ?>/pages/nssta-tpac.php">NSSTA TPAC</a>
      <a class="px-4 py-2 rounded-lg font-label-md text-label-md <?= ($currentPage ?? '') === 'helpdesk' ? 'bg-primary text-on-primary font-bold' : 'text-on-surface hover:bg-surface-container' ?>" href="<?= BASE_URL ?>/pages/helpdesk.php">Helpdesk &amp; Support</a>
    </div>
  </div>
</header>
