<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';

$pageTitle = 'NSSTA TPAC Programmes — Gap2Grow (MoSPI Greater Noida)';
$currentPage = 'nssta';
require_once __DIR__ . '/../includes/public_header.php';
?>

<main class="w-full pt-28 bg-surface">
  <!-- Sovereign Breadcrumb -->
  <div class="max-w-7xl mx-auto px-space-md sm:px-gutter pt-space-md mb-space-md">
    <nav class="flex items-center gap-space-xs text-label-sm font-label-sm text-on-surface-variant">
      <a class="hover:text-primary transition-colors flex items-center gap-1" href="<?= BASE_URL ?>/pages/portal.php">
        <span class="material-symbols-outlined text-[16px]">account_balance</span>
        <span>Home</span>
      </a>
      <span class="text-outline-variant">/</span>
      <span class="text-primary font-semibold">NSSTA TPAC</span>
    </nav>
  </div>

  <!-- Hero Section -->
  <section class="max-w-7xl mx-auto px-space-md sm:px-gutter pb-space-lg">
    <div class="inline-flex items-center gap-space-xs px-space-md py-1.5 rounded-full bg-surface-container-lowest shadow-sm mb-space-md">
      <div class="w-5 h-5 rounded-full bg-primary text-on-primary flex items-center justify-center">
        <span class="material-symbols-outlined text-[13px]">domain</span>
      </div>
      <span class="text-label-sm font-label-sm text-primary uppercase tracking-wider font-semibold">National Statistical Systems Training Academy (NSSTA)</span>
      <span class="w-1.5 h-1.5 rounded-full bg-secondary-container"></span>
      <span class="text-label-sm font-label-sm text-secondary font-semibold">Greater Noida Campus</span>
    </div>

    <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-space-md mb-space-lg">
      <div class="max-w-3xl">
        <h1 class="font-headline-xl text-headline-xl text-primary tracking-tight leading-tight">
          Training Programme Advisory Committee (TPAC) Calendar
        </h1>
        <p class="font-body-lg text-body-lg text-on-surface-variant mt-2 leading-relaxed">
          Residential capacity building, advanced computational labs, and faculty defense programs conducted at NSSTA Greater Noida for official statistical cadres of the Union and State governments.
        </p>
      </div>

      <div class="shrink-0 flex items-center gap-2">
        <a href="<?= BASE_URL ?>/index.php" class="px-5 py-2.5 rounded-lg bg-secondary text-on-secondary font-label-md text-label-md font-bold hover:bg-secondary-container transition-all shadow-sm flex items-center gap-2">
          <span class="material-symbols-outlined text-[18px]">assignment_ind</span>
          <span>Submit TPAC Nomination</span>
        </a>
      </div>
    </div>

    <!-- Official Cadre Deputation Rules Notice -->
    <div class="bg-surface-container-lowest p-space-md rounded-xl shadow-sm border border-secondary/30 mb-space-xl flex items-start gap-space-md">
      <div class="w-10 h-10 rounded-full bg-secondary-container text-on-secondary flex items-center justify-center shrink-0">
        <span class="material-symbols-outlined text-[20px]">gavel</span>
      </div>
      <div class="space-y-1 font-body-sm text-body-sm text-on-surface">
        <div class="font-bold text-primary">Official MoSPI Cadre Deputation Rules (Rule 8 of ISS Rules)</div>
        <p class="text-on-surface-variant">
          Participation in approved NSSTA TPAC residential programmes constitutes on-duty official deputation. Officers are entitled to official TA/DA and transit arrangements. Minimum 90% attendance is mandatory for award of competency endorsement in the officer's permanent SPARROW APAR dossier.
        </p>
      </div>
    </div>
  </section>

  <!-- Programme Roster -->
  <section class="max-w-7xl mx-auto px-space-md sm:px-gutter pb-space-xl">
    <div class="text-center max-w-2xl mx-auto mb-space-lg">
      <span class="text-label-sm font-label-sm uppercase tracking-widest text-secondary font-bold">Residential Roster</span>
      <h2 class="font-headline-sm text-headline-sm text-primary mt-1">Upcoming NSSTA Greater Noida Residential Workshops</h2>
    </div>

    <div class="space-y-space-md">
      <div class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm border border-surface-container flex flex-col md:flex-row md:items-center justify-between gap-space-md hover:bg-surface-container-low transition-colors">
        <div class="max-w-2xl">
          <div class="flex items-center gap-2 mb-1">
            <span class="px-2.5 py-0.5 rounded text-[11px] font-bold bg-primary text-on-primary">TPAC-2025-081</span>
            <span class="text-label-sm font-label-sm text-secondary font-semibold">Residential • 5 Days</span>
          </div>
          <h3 class="font-headline-sm text-headline-sm text-primary mb-1">Macroeconomic Accounts &amp; Quarterly GDP Nowcasting Mechanics</h3>
          <p class="font-body-sm text-body-sm text-on-surface-variant">
            Intensive computational workshop covering MIDAS regressions, high-frequency indicator synthesis, and Supply-Use Table balance procedures with NAD faculty.
          </p>
          <div class="flex items-center gap-4 mt-2 text-label-sm font-label-sm text-on-surface-variant">
            <span><strong>Dates:</strong> 17–21 Nov 2025</span>
            <span><strong>Venue:</strong> Advanced Lab 2, NSSTA Greater Noida</span>
            <span><strong>Capacity:</strong> 40 Seats (28 Confirmed)</span>
          </div>
        </div>
        <div class="shrink-0 flex items-center gap-2">
          <a href="<?= BASE_URL ?>/index.php" class="px-4 py-2 rounded-lg bg-secondary text-on-secondary font-label-md text-label-md font-bold hover:bg-secondary-container transition-all shadow-sm">
            Nominate via SSO
          </a>
        </div>
      </div>

      <div class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm border border-surface-container flex flex-col md:flex-row md:items-center justify-between gap-space-md hover:bg-surface-container-low transition-colors">
        <div class="max-w-2xl">
          <div class="flex items-center gap-2 mb-1">
            <span class="px-2.5 py-0.5 rounded text-[11px] font-bold bg-primary text-on-primary">TPAC-2026-014</span>
            <span class="text-label-sm font-label-sm text-secondary font-semibold">Residential • 3 Days</span>
          </div>
          <h3 class="font-headline-sm text-headline-sm text-primary mb-1">Spatial GIS Modeling &amp; Remote Sensing with ISRO Bhuvan</h3>
          <p class="font-body-sm text-body-sm text-on-surface-variant">
            Geospatial sampling design, district-level indicator mapping, crop acreage estimation, and integration with national official statistics.
          </p>
          <div class="flex items-center gap-4 mt-2 text-label-sm font-label-sm text-on-surface-variant">
            <span><strong>Dates:</strong> 12–14 Jan 2026</span>
            <span><strong>Venue:</strong> Geoinformatics Lab, NSSTA Campus</span>
            <span><strong>Capacity:</strong> 35 Seats (Open)</span>
          </div>
        </div>
        <div class="shrink-0 flex items-center gap-2">
          <a href="<?= BASE_URL ?>/index.php" class="px-4 py-2 rounded-lg bg-secondary text-on-secondary font-label-md text-label-md font-bold hover:bg-secondary-container transition-all shadow-sm">
            Nominate via SSO
          </a>
        </div>
      </div>

      <div class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm border border-surface-container flex flex-col md:flex-row md:items-center justify-between gap-space-md hover:bg-surface-container-low transition-colors">
        <div class="max-w-2xl">
          <div class="flex items-center gap-2 mb-1">
            <span class="px-2.5 py-0.5 rounded text-[11px] font-bold bg-primary text-on-primary">TPAC-2026-022</span>
            <span class="text-label-sm font-label-sm text-secondary font-semibold">Residential • 4 Days</span>
          </div>
          <h3 class="font-headline-sm text-headline-sm text-primary mb-1">CAPI Tablet Survey Engineering &amp; Field Quality Supervision</h3>
          <p class="font-body-sm text-body-sm text-on-surface-variant">
            Designed for Field Operations Division (FOD) NSS officers. Real-time survey script deployment, logic checks, and supervisor audit dashboards.
          </p>
          <div class="flex items-center gap-4 mt-2 text-label-sm font-label-sm text-on-surface-variant">
            <span><strong>Dates:</strong> 09–12 Feb 2026</span>
            <span><strong>Venue:</strong> Survey Simulation Hall, NSSTA Campus</span>
            <span><strong>Capacity:</strong> 50 Seats (Open)</span>
          </div>
        </div>
        <div class="shrink-0 flex items-center gap-2">
          <a href="<?= BASE_URL ?>/index.php" class="px-4 py-2 rounded-lg bg-secondary text-on-secondary font-label-md text-label-md font-bold hover:bg-secondary-container transition-all shadow-sm">
            Nominate via SSO
          </a>
        </div>
      </div>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/../includes/public_footer.php'; ?>
