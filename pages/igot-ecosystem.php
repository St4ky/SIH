<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';

$pageTitle = 'iGOT Karmayogi Bharat Ecosystem — Gap2Grow (MoSPI / DoPT)';
$currentPage = 'igot';
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
      <span class="text-primary font-semibold">iGOT Ecosystem</span>
    </nav>
  </div>

  <!-- Hero Section -->
  <section class="max-w-7xl mx-auto px-space-md sm:px-gutter pb-space-lg">
    <div class="inline-flex items-center gap-space-xs px-space-md py-1.5 rounded-full bg-surface-container-lowest shadow-sm mb-space-md">
      <div class="w-5 h-5 rounded-full bg-secondary flex items-center justify-center text-on-secondary">
        <span class="material-symbols-outlined text-[13px]">school</span>
      </div>
      <span class="text-label-sm font-label-sm text-primary uppercase tracking-wider font-semibold">DoPT Mission Karmayogi Bharat Hub</span>
      <span class="w-1.5 h-1.5 rounded-full bg-secondary-container"></span>
      <span class="text-label-sm font-label-sm text-secondary font-semibold">SPARROW &amp; APAR Live Integration</span>
    </div>

    <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-space-md mb-space-lg">
      <div class="max-w-3xl">
        <h1 class="font-headline-xl text-headline-xl text-primary tracking-tight leading-tight">
          iGOT Karmayogi Bharat Integrated Capability Grid
        </h1>
        <p class="font-body-lg text-body-lg text-on-surface-variant mt-2 leading-relaxed">
          National continuous learning architecture connecting civil service statistical officers with accredited digital courses, sovereign micro-credentials, and automated competency endorsements.
        </p>
      </div>

      <div class="shrink-0 flex items-center gap-2">
        <a href="<?= BASE_URL ?>/index.php" class="px-5 py-2.5 rounded-lg bg-secondary text-on-secondary font-label-md text-label-md font-bold hover:bg-secondary-container transition-all shadow-sm flex items-center gap-2">
          <span class="material-symbols-outlined text-[18px]">verified</span>
          <span>Sync My Karmayogi Credits</span>
        </a>
      </div>
    </div>

    <!-- Telemetry Strip -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-space-md mb-space-xl">
      <div class="bg-surface-container-lowest p-space-md rounded-xl shadow-sm border border-surface-container flex items-center gap-3">
        <div class="w-12 h-12 rounded-lg bg-primary-container text-on-primary flex items-center justify-center">
          <span class="material-symbols-outlined text-[24px]">sync</span>
        </div>
        <div>
          <div class="font-headline-sm text-headline-sm text-primary font-bold">142 Courses</div>
          <div class="text-body-sm text-body-sm text-on-surface-variant">Accredited Statistical Roster</div>
        </div>
      </div>

      <div class="bg-surface-container-lowest p-space-md rounded-xl shadow-sm border border-surface-container flex items-center gap-3">
        <div class="w-12 h-12 rounded-lg bg-secondary-container text-on-secondary flex items-center justify-center">
          <span class="material-symbols-outlined text-[24px]">verified_user</span>
        </div>
        <div>
          <div class="font-headline-sm text-headline-sm text-primary font-bold">SPARROW Sync</div>
          <div class="text-body-sm text-body-sm text-on-surface-variant">Automated APAR Weightage</div>
        </div>
      </div>

      <div class="bg-surface-container-lowest p-space-md rounded-xl shadow-sm border border-surface-container flex items-center gap-3">
        <div class="w-12 h-12 rounded-lg bg-surface-tint text-on-primary flex items-center justify-center">
          <span class="material-symbols-outlined text-[24px]">workspace_premium</span>
        </div>
        <div>
          <div class="font-headline-sm text-headline-sm text-primary font-bold">DigiLocker Seal</div>
          <div class="text-body-sm text-body-sm text-on-surface-variant">SHA-256 Sovereign Badges</div>
        </div>
      </div>
    </div>
  </section>

  <!-- Curated Courses Grid -->
  <section class="max-w-7xl mx-auto px-space-md sm:px-gutter pb-space-xl">
    <div class="text-center max-w-2xl mx-auto mb-space-lg">
      <span class="text-label-sm font-label-sm uppercase tracking-widest text-secondary font-bold">Curated Catalog</span>
      <h2 class="font-headline-sm text-headline-sm text-primary mt-1">High-Priority MoSPI Statistical Pathways on iGOT</h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-space-lg">
      <div class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm border border-surface-container flex flex-col justify-between">
        <div>
          <span class="px-2.5 py-0.5 rounded text-[11px] font-bold bg-primary-container text-on-primary inline-block mb-3">Domain 1: Core Stats</span>
          <h3 class="font-headline-sm text-headline-sm text-primary mb-2">System of National Accounts &amp; GVA Mechanics</h3>
          <p class="font-body-sm text-body-sm text-on-surface-variant mb-4 leading-relaxed">
            Covers GDP estimation, Supply-Use Tables (SUT), and institutional sector balance sheets as per SNA 2008 standards.
          </p>
        </div>
        <div class="pt-3 border-t border-surface-container flex items-center justify-between text-label-sm font-label-sm">
          <span class="text-on-surface-variant">14 Hours • 4 Credits</span>
          <a href="<?= BASE_URL ?>/index.php" class="text-secondary font-bold hover:underline">Enroll via SSO →</a>
        </div>
      </div>

      <div class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm border border-surface-container flex flex-col justify-between">
        <div>
          <span class="px-2.5 py-0.5 rounded text-[11px] font-bold bg-secondary-fixed text-on-secondary-fixed inline-block mb-3">Domain 2: Computation</span>
          <h3 class="font-headline-sm text-headline-sm text-primary mb-2">Automated Statistical ETL in Python &amp; SQL</h3>
          <p class="font-body-sm text-body-sm text-on-surface-variant mb-4 leading-relaxed">
            Hands-on data cleaning, imputation pipelines, and automated report compilation using modern open-source stacks.
          </p>
        </div>
        <div class="pt-3 border-t border-surface-container flex items-center justify-between text-label-sm font-label-sm">
          <span class="text-on-surface-variant">20 Hours • 6 Credits</span>
          <a href="<?= BASE_URL ?>/index.php" class="text-secondary font-bold hover:underline">Enroll via SSO →</a>
        </div>
      </div>

      <div class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm border border-surface-container flex flex-col justify-between">
        <div>
          <span class="px-2.5 py-0.5 rounded text-[11px] font-bold bg-surface-container-high text-primary inline-block mb-3">Domain 3: Governance</span>
          <h3 class="font-headline-sm text-headline-sm text-primary mb-2">DPDPA 2023 &amp; Official Microdata Anonymization</h3>
          <p class="font-body-sm text-body-sm text-on-surface-variant mb-4 leading-relaxed">
            Legal protocols under the Data Protection Act, differential privacy techniques, and consent architectures for public data release.
          </p>
        </div>
        <div class="pt-3 border-t border-surface-container flex items-center justify-between text-label-sm font-label-sm">
          <span class="text-on-surface-variant">10 Hours • 3 Credits</span>
          <a href="<?= BASE_URL ?>/index.php" class="text-secondary font-bold hover:underline">Enroll via SSO →</a>
        </div>
      </div>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/../includes/public_footer.php'; ?>
