<?php
// Expects: $pageTitle (string), $currentPage (string)
$user = currentUser();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <meta content="web_dashboard" name="shell-type"/>
  <title><?= htmlspecialchars($pageTitle ?? 'Gap2Grow — MoSPI / NSSTA Cadre Intelligence') ?></title>
  
  <!-- Material Symbols & Google Fonts -->
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
          },
          fontSize: {
            "label-lg": ["14px", { lineHeight: "20px", letterSpacing: "0.01em", fontWeight: "600" }],
            "label-md": ["12px", { lineHeight: "16px", letterSpacing: "0.02em", fontWeight: "600" }],
            "body-lg": ["16px", { lineHeight: "24px", fontWeight: "400" }],
            "body-md": ["14px", { lineHeight: "20px", fontWeight: "400" }],
            "headline-lg": ["28px", { lineHeight: "36px", letterSpacing: "-0.01em", fontWeight: "700" }],
            "headline-xl": ["36px", { lineHeight: "44px", letterSpacing: "-0.02em", fontWeight: "700" }],
            "headline-lg-mobile": ["22px", { lineHeight: "30px", letterSpacing: "0em", fontWeight: "700" }],
            "label-sm": ["11px", { lineHeight: "14px", letterSpacing: "0.03em", fontWeight: "600" }],
            "headline-md": ["22px", { lineHeight: "28px", fontWeight: "600" }],
            "body-sm": ["12px", { lineHeight: "18px", fontWeight: "400" }],
            "headline-sm": ["18px", { lineHeight: "24px", fontWeight: "600" }],
            "headline-xl-mobile": ["28px", { lineHeight: "36px", letterSpacing: "-0.01em", fontWeight: "700" }]
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

  <!-- Platform App CSS -->
  <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/app.css"/>
</head>
<body class="bg-surface font-body-md text-body-md text-on-surface antialiased">

<!-- Overlay for mobile drawer -->
<div id="sidebar-overlay" class="fixed inset-0 bg-primary/50 backdrop-blur-sm z-40 hidden transition-opacity lg:hidden" onclick="toggleSidebarDrawer()"></div>

<!-- Top Fixed Header -->
<header class="fixed top-0 left-0 lg:left-72 right-0 h-16 bg-surface-container-lowest/90 backdrop-blur-md shadow-[0_1px_8px_rgba(11,37,69,0.06)] z-40 flex items-center justify-between px-space-md lg:px-space-lg transition-all duration-300">
  <div class="flex items-center gap-space-sm">
    <!-- Hamburger button for Tablet & Mobile -->
    <button id="hamburger-btn" type="button" class="lg:hidden p-2 rounded-lg text-primary hover:bg-surface-container transition-colors flex items-center justify-center" onclick="toggleSidebarDrawer()" aria-label="Toggle Navigation">
      <span class="material-symbols-outlined text-[24px]">menu</span>
    </button>
    <div class="flex items-center gap-space-xs text-body-sm font-body-sm text-on-surface-variant truncate">
      <span class="font-semibold text-primary hidden sm:inline">भारत सरकार</span>
      <span class="text-outline-variant hidden sm:inline">|</span>
      <span class="truncate">MoSPI Official Statistical Cadre Intelligence</span>
    </div>
  </div>
  <div class="flex items-center gap-space-md">
    <div class="flex items-center gap-space-xs bg-surface-container-low px-space-sm py-1 rounded-full text-label-sm font-label-sm text-on-surface">
      <span class="w-2 h-2 rounded-full bg-secondary"></span>
      <span class="truncate max-w-[120px] sm:max-w-[180px]"><?= htmlspecialchars($user ? ($user['cadre'] . ' Cadre') : 'MoSPI') ?></span>
    </div>
    <a href="<?= BASE_URL ?>/pages/settings.php" class="w-8 h-8 rounded-full bg-primary flex items-center justify-center text-on-primary hover:opacity-90 transition-opacity" title="My Profile">
      <span class="material-symbols-outlined text-[18px]">person</span>
    </a>
  </div>
</header>
