<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';

$pageTitle = 'About Platform — Gap2Grow (MoSPI & NSSTA Cadre Intelligence)';
$currentPage = 'about';
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
      <span class="text-primary font-semibold">About Platform</span>
    </nav>
  </div>

  <!-- Hero Banner -->
  <section class="relative w-full overflow-hidden bg-gradient-to-b from-surface via-surface-container-low to-surface pb-space-xl">
    <div class="max-w-7xl mx-auto px-space-md sm:px-gutter">
      <div class="inline-flex items-center gap-space-xs px-space-md py-1.5 rounded-full bg-surface-container-lowest shadow-sm mb-space-md">
        <div class="w-5 h-5 rounded-full bg-primary-container flex items-center justify-center text-on-primary">
          <span class="material-symbols-outlined text-[13px]">info</span>
        </div>
        <span class="text-label-sm font-label-sm text-primary uppercase tracking-wider font-semibold">MoSPI &amp; NSSTA Cadre Intelligence Mandate</span>
        <span class="w-1.5 h-1.5 rounded-full bg-secondary-container"></span>
        <span class="text-label-sm font-label-sm text-secondary font-semibold">Mission Karmayogi Bharat</span>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-xl items-center">
        <div class="lg:col-span-8">
          <h1 class="font-headline-xl text-headline-xl text-primary tracking-tight leading-tight mb-space-md">
            Pioneering <span class="text-secondary">AI-Driven Competency Infrastructure</span> for India's Official Statistical System
          </h1>
          <p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed mb-space-lg max-w-3xl">
            Gap2Grow (SankhyaAI) is the sovereign human capital capability intelligence platform established under the aegis of the <strong>National Statistical Systems Training Academy (NSSTA)</strong> and the <strong>Ministry of Statistics and Programme Implementation (MoSPI)</strong>. It dynamically assesses, monitors, and closes capability gaps across the <strong>Indian Statistical Service (ISS)</strong>, <strong>Subordinate Statistical Service (SSS)</strong>, and <strong>State Directorates of Economics &amp; Statistics (DES)</strong>.
          </p>

          <div class="flex flex-wrap items-center gap-space-md">
            <a href="<?= BASE_URL ?>/pages/competency-framework.php" class="px-6 py-3 rounded-lg bg-primary text-on-primary font-label-md text-label-md font-bold hover:bg-primary-container transition-all shadow-sm flex items-center gap-2">
              <span class="material-symbols-outlined text-[18px]">account_tree</span>
              <span>Explore Competency Framework</span>
            </a>
            <a href="<?= BASE_URL ?>/index.php" class="px-6 py-3 rounded-lg bg-secondary text-on-secondary font-label-md text-label-md font-bold hover:bg-secondary-container transition-all shadow-sm flex items-center gap-2">
              <span class="material-symbols-outlined text-[18px]">fingerprint</span>
              <span>Login via Parichay SSO</span>
            </a>
          </div>
        </div>

        <div class="lg:col-span-4 flex flex-col gap-space-md">
          <div class="bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm border border-surface-container">
            <div class="flex items-center gap-2 text-secondary font-bold font-label-md text-label-md mb-2">
              <span class="material-symbols-outlined text-[20px]">verified</span>
              <span>Sovereign Accreditation</span>
            </div>
            <div class="space-y-3 font-body-sm text-body-sm text-on-surface">
              <div class="flex items-start gap-2">
                <span class="material-symbols-outlined text-primary text-[18px] shrink-0 mt-0.5">check_circle</span>
                <span>Calibrated against the <strong>DoPT National Capacity Building Framework (NPCSCB)</strong>.</span>
              </div>
              <div class="flex items-start gap-2">
                <span class="material-symbols-outlined text-primary text-[18px] shrink-0 mt-0.5">check_circle</span>
                <span>Two-way automated cryptographic sync with <strong>e-HRMS 2.0 &amp; SPARROW APAR</strong>.</span>
              </div>
              <div class="flex items-start gap-2">
                <span class="material-symbols-outlined text-primary text-[18px] shrink-0 mt-0.5">check_circle</span>
                <span>Accredited residential programmes at <strong>NSSTA Greater Noida Campus</strong>.</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Key Pillars Section -->
  <section class="max-w-7xl mx-auto px-space-md sm:px-gutter py-space-xl">
    <div class="text-center max-w-3xl mx-auto mb-space-xl">
      <span class="text-label-sm font-label-sm uppercase tracking-widest text-secondary font-bold">Strategic Pillars</span>
      <h2 class="font-headline-lg text-headline-lg text-primary mt-1">Transforming Statistical Cadre Readiness</h2>
      <p class="font-body-md text-body-md text-on-surface-variant mt-2">
        A seamless loop connecting empirical psychometric diagnostics with personalized training pathways and statutory promotion readiness.
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-space-lg">
      <div class="bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm border border-surface-container flex flex-col justify-between">
        <div>
          <div class="w-12 h-12 rounded-xl bg-primary text-on-primary flex items-center justify-center mb-space-md">
            <span class="material-symbols-outlined text-[26px]">psychology</span>
          </div>
          <h3 class="font-headline-sm text-headline-sm text-primary mb-2">1. Empirical AI Psychometrics</h3>
          <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
            Eliminating subjective self-assessments through calibrated adaptive item batteries. Grounded strictly in System of National Accounts (SNA 2008), CPI/WPI index construction, and DPDPA 2023 statutory protocols.
          </p>
        </div>
        <div class="mt-space-md pt-space-xs border-t border-surface-container text-label-sm font-label-sm text-primary font-semibold flex items-center gap-1">
          <span>Item Discrimination Index &gt; 0.82</span>
        </div>
      </div>

      <div class="bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm border border-surface-container flex flex-col justify-between">
        <div>
          <div class="w-12 h-12 rounded-xl bg-secondary text-on-secondary flex items-center justify-center mb-space-md">
            <span class="material-symbols-outlined text-[26px]">hub</span>
          </div>
          <h3 class="font-headline-sm text-headline-sm text-primary mb-2">2. Precision Learning Pathways</h3>
          <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
            Algorithmic recommendation engine mapping officer skill deficits to accredited iGOT Karmayogi digital micro-courses and NSSTA TPAC residential intensive workshops.
          </p>
        </div>
        <div class="mt-space-md pt-space-xs border-t border-surface-container text-label-sm font-label-sm text-secondary font-semibold flex items-center gap-1">
          <span>Multi-Factor Suitability Weighting (50:30:20)</span>
        </div>
      </div>

      <div class="bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm border border-surface-container flex flex-col justify-between">
        <div>
          <div class="w-12 h-12 rounded-xl bg-surface-tint text-on-primary flex items-center justify-center mb-space-md">
            <span class="material-symbols-outlined text-[26px]">verified_user</span>
          </div>
          <h3 class="font-headline-sm text-headline-sm text-primary mb-2">3. Sovereign Cadre Governance</h3>
          <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
            Official cadre records legally compliant with Indian Statistical Service Rules. Enables Departmental Promotion Committees (DPC) to make objective selection for Grade 14 and international mission panels.
          </p>
        </div>
        <div class="mt-space-md pt-space-xs border-t border-surface-container text-label-sm font-label-sm text-primary font-semibold flex items-center gap-1">
          <span>DOPT Rule 12(A) Audited Trail</span>
        </div>
      </div>
    </div>
  </section>

  <!-- Institutional Governance Triad -->
  <section class="w-full bg-surface-container-lowest py-space-xl border-t border-b border-surface-container">
    <div class="max-w-7xl mx-auto px-space-md sm:px-gutter">
      <div class="text-center max-w-2xl mx-auto mb-space-lg">
        <span class="text-label-sm font-label-sm uppercase tracking-widest text-on-surface-variant font-semibold">Institutional Governance</span>
        <h2 class="font-headline-sm text-headline-sm text-primary mt-1">Interlinked with Sovereign Governance Infrastructure</h2>
      </div>

      <div class="grid grid-cols-2 md:grid-cols-4 gap-space-md">
        <div class="bg-surface-container-low p-space-md rounded-xl text-center flex flex-col items-center justify-center">
          <div class="w-12 h-12 rounded-full bg-primary-container text-on-primary flex items-center justify-center mb-space-xs font-bold text-[16px]">MoSPI</div>
          <div class="font-label-md text-label-md text-primary font-semibold">Ministry of Statistics</div>
          <div class="text-label-sm text-label-sm text-on-surface-variant mt-0.5">Cadre Controlling Authority</div>
        </div>
        <div class="bg-surface-container-low p-space-md rounded-xl text-center flex flex-col items-center justify-center">
          <div class="w-12 h-12 rounded-full bg-secondary text-on-secondary flex items-center justify-center mb-space-xs font-bold text-[15px]">NSSTA</div>
          <div class="font-label-md text-label-md text-primary font-semibold">NSSTA Greater Noida</div>
          <div class="text-label-sm text-label-sm text-on-surface-variant mt-0.5">National Training Academy</div>
        </div>
        <div class="bg-surface-container-low p-space-md rounded-xl text-center flex flex-col items-center justify-center">
          <div class="w-12 h-12 rounded-full bg-surface-tint text-on-primary flex items-center justify-center mb-space-xs font-bold text-[15px]">iGOT</div>
          <div class="font-label-md text-label-md text-primary font-semibold">Karmayogi Bharat</div>
          <div class="text-label-sm text-label-sm text-on-surface-variant mt-0.5">Digital Capability Grid</div>
        </div>
        <div class="bg-surface-container-low p-space-md rounded-xl text-center flex flex-col items-center justify-center">
          <div class="w-12 h-12 rounded-full bg-primary text-on-primary flex items-center justify-center mb-space-xs font-bold text-[15px]">NIC</div>
          <div class="font-label-md text-label-md text-primary font-semibold">NIC MeghRaj Cloud</div>
          <div class="text-label-sm text-label-sm text-on-surface-variant mt-0.5">Sovereign Data Infrastructure</div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA Banner -->
  <section class="max-w-7xl mx-auto px-space-md sm:px-gutter py-space-xl">
    <div class="bg-gradient-to-r from-primary to-primary-container text-on-primary p-space-xl rounded-2xl shadow-xl flex flex-col md:flex-row items-center justify-between gap-space-md">
      <div>
        <h2 class="font-headline-md text-headline-md font-bold mb-1">Ready to assess your statistical cadre proficiencies?</h2>
        <p class="font-body-md text-body-md text-primary-fixed">Single Sign-On enabled with your official @gov.in / @nic.in credentials.</p>
      </div>
      <a href="<?= BASE_URL ?>/index.php" class="px-6 py-3 rounded-lg bg-secondary text-on-secondary font-label-lg text-label-lg font-bold hover:bg-secondary-container transition-all shadow-md shrink-0 flex items-center gap-2">
        <span class="material-symbols-outlined text-[18px]">login</span>
        <span>Access Officer Portal</span>
      </a>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/../includes/public_footer.php'; ?>
