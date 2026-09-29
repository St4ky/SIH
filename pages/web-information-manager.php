<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';

$pageTitle = 'Web Information Manager & Directory — Gap2Grow (MoSPI / NSSTA)';
$currentPage = '';
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
      <span class="text-primary font-semibold">Web Information Manager &amp; Directory</span>
    </nav>
  </div>

  <!-- Hero Section -->
  <section class="max-w-7xl mx-auto px-space-md sm:px-gutter pb-space-xl">
    <div class="inline-flex items-center gap-space-xs px-space-md py-1.5 rounded-full bg-surface-container-lowest shadow-sm mb-space-md">
      <div class="w-5 h-5 rounded-full bg-secondary flex items-center justify-center text-on-secondary">
        <span class="material-symbols-outlined text-[13px]">badge</span>
      </div>
      <span class="text-label-sm font-label-sm text-primary uppercase tracking-wider font-semibold">GIGW Statutory Web Management</span>
      <span class="w-1.5 h-1.5 rounded-full bg-secondary-container"></span>
      <span class="text-label-sm font-label-sm text-secondary font-semibold">MoSPI National Directorate</span>
    </div>

    <div class="max-w-3xl mb-space-lg">
      <h1 class="font-headline-xl text-headline-xl text-primary tracking-tight leading-tight">
        Web Information Manager &amp; Institutional Directory
      </h1>
      <p class="font-body-lg text-body-lg text-on-surface-variant mt-2 leading-relaxed">
        Official point of contact for website content maintenance, technical governance, and institutional directory of statistical divisions across the Ministry.
      </p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-xl items-start">
      <div class="lg:col-span-7 space-y-space-lg">
        <!-- WIM Officer Profile Card -->
        <div class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm border border-surface-container">
          <div class="flex items-center gap-3 pb-space-sm border-b border-surface-container mb-space-md">
            <div class="w-12 h-12 rounded-xl bg-primary text-on-primary flex items-center justify-center font-bold text-headline-sm">
              <span class="material-symbols-outlined text-[26px]">manage_accounts</span>
            </div>
            <div>
              <h2 class="font-headline-sm text-headline-sm text-primary">Web Information Manager (WIM)</h2>
              <div class="text-label-sm font-label-sm text-secondary font-semibold">Designated under GIGW 3.0 Guidelines</div>
            </div>
          </div>

          <div class="space-y-3 font-body-sm text-body-sm text-on-surface">
            <div>
              <span class="text-on-surface-variant block text-[12px]">Name &amp; Designation:</span>
              <strong class="text-primary text-base">Shri R. K. Singh</strong>, Deputy Director General (Computer Centre)
            </div>
            <div>
              <span class="text-on-surface-variant block text-[12px]">Office Address:</span>
              <span>Computer Centre, Ministry of Statistics &amp; Programme Implementation, East Block-10, Sector-1, R.K. Puram, New Delhi - 110066</span>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2">
              <div>
                <span class="text-on-surface-variant block text-[12px]">Official Email:</span>
                <strong class="text-secondary">wim-mospi@gov.in</strong>
              </div>
              <div>
                <span class="text-on-surface-variant block text-[12px]">Telephone Helpline:</span>
                <strong class="text-primary">011-2610-1234 (Ext. 101)</strong>
              </div>
            </div>
          </div>
        </div>

        <!-- Institutional Directory -->
        <div class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm border border-surface-container">
          <h2 class="font-headline-sm text-headline-sm text-primary mb-space-md">MoSPI Key Statistical Divisions</h2>
          <div class="space-y-3 font-body-sm text-body-sm">
            <div class="p-3 bg-surface rounded-xl border border-surface-container">
              <div class="font-bold text-primary">National Accounts Division (NAD)</div>
              <div class="text-on-surface-variant text-[12px]">Compilation of GDP, GVA, Gross Capital Formation &amp; National Balance Sheets.</div>
            </div>
            <div class="p-3 bg-surface rounded-xl border border-surface-container">
              <div class="font-bold text-primary">National Statistical Systems Training Academy (NSSTA)</div>
              <div class="text-on-surface-variant text-[12px]">Greater Noida Campus. Apex training academy for ISS, SSS, and international cohorts.</div>
            </div>
            <div class="p-3 bg-surface rounded-xl border border-surface-container">
              <div class="font-bold text-primary">Field Operations Division (FOD) NSSO</div>
              <div class="text-on-surface-variant text-[12px]">Headquarters at Faridabad; oversees 6 Zonal and 52 Regional socio-economic survey offices.</div>
            </div>
            <div class="p-3 bg-surface rounded-xl border border-surface-container">
              <div class="font-bold text-primary">Data Informatics and Innovation Division (DIID)</div>
              <div class="text-on-surface-variant text-[12px]">New Delhi. Manages national data portal, microdata archives, and cloud architectures.</div>
            </div>
          </div>
        </div>
      </div>

      <div class="lg:col-span-5 flex flex-col gap-space-md">
        <div class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm border border-surface-container">
          <div class="font-bold text-primary font-label-lg text-label-lg mb-2 flex items-center gap-2">
            <span class="material-symbols-outlined text-secondary text-[20px]">cloud</span>
            <span>Hosting &amp; Technical Maintenance</span>
          </div>
          <p class="font-body-sm text-body-sm text-on-surface-variant mb-3 leading-relaxed">
            The Gap2Grow Cadre Intelligence Platform is designed and maintained by NSSTA in technical collaboration with National Informatics Centre (NIC).
          </p>
          <div class="space-y-2 text-label-sm font-label-sm text-on-surface">
            <div class="flex items-center justify-between p-2 rounded bg-surface">
              <span>Hosting Node:</span>
              <strong class="text-primary">NIC MeghRaj Cloud</strong>
            </div>
            <div class="flex items-center justify-between p-2 rounded bg-surface">
              <span>Auditing Agency:</span>
              <strong class="text-primary">STQC Directorate</strong>
            </div>
            <div class="flex items-center justify-between p-2 rounded bg-surface">
              <span>SSO Integration:</span>
              <strong class="text-primary">Jan Parichay 2.4</strong>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/../includes/public_footer.php'; ?>
