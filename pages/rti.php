<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';

$pageTitle = 'Right to Information (RTI) — Gap2Grow (MoSPI & NSSTA)';
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
      <span class="text-primary font-semibold">Right to Information (RTI)</span>
    </nav>
  </div>

  <!-- Hero Section -->
  <section class="max-w-7xl mx-auto px-space-md sm:px-gutter pb-space-xl">
    <div class="inline-flex items-center gap-space-xs px-space-md py-1.5 rounded-full bg-surface-container-lowest shadow-sm mb-space-md">
      <div class="w-5 h-5 rounded-full bg-primary text-on-primary flex items-center justify-center">
        <span class="material-symbols-outlined text-[13px]">gavel</span>
      </div>
      <span class="text-label-sm font-label-sm text-primary uppercase tracking-wider font-semibold">Statutory Proactive Disclosure</span>
      <span class="w-1.5 h-1.5 rounded-full bg-secondary-container"></span>
      <span class="text-label-sm font-label-sm text-secondary font-semibold">Section 4(1)(b) of RTI Act 2005</span>
    </div>

    <div class="max-w-3xl mb-space-lg">
      <h1 class="font-headline-xl text-headline-xl text-primary tracking-tight leading-tight">
        Right to Information (RTI) Manual &amp; Institutional Cell
      </h1>
      <p class="font-body-lg text-body-lg text-on-surface-variant mt-2 leading-relaxed">
        Proactive transparency disclosure for the Gap2Grow Cadre Intelligence Platform maintained by the National Statistical Systems Training Academy (NSSTA), Ministry of Statistics &amp; Programme Implementation.
      </p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-xl items-start">
      <!-- Main Content (8 cols) -->
      <div class="lg:col-span-8 space-y-space-lg">
        <div class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm border border-surface-container">
          <h2 class="font-headline-sm text-headline-sm text-primary mb-2">1. Organization, Functions and Duties</h2>
          <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed mb-3">
            The National Statistical Systems Training Academy (NSSTA) at Greater Noida functions as the apex institute for human resource development in official statistics under MoSPI. Gap2Grow serves as the official digital infrastructure for assessing statistical competencies, determining training needs, and administering TPAC nominations.
          </p>
          <div class="p-3 bg-surface rounded-xl border border-surface-container text-body-sm font-body-sm text-on-surface">
            <strong>Headquarters:</strong> National Statistical Systems Training Academy (NSSTA), Plot No. 22, Knowledge Park II, Greater Noida, Gautam Buddha Nagar, Uttar Pradesh - 201310.
          </div>
        </div>

        <div class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm border border-surface-container">
          <h2 class="font-headline-sm text-headline-sm text-primary mb-space-sm">2. Designated RTI Authorities</h2>
          <div class="overflow-x-auto">
            <table class="w-full text-left text-body-sm font-body-sm border-collapse">
              <thead>
                <tr class="bg-surface-container-low text-primary font-bold">
                  <th class="py-2.5 px-3">Role</th>
                  <th class="py-2.5 px-3">Designation &amp; Name</th>
                  <th class="py-2.5 px-3">Jurisdiction</th>
                  <th class="py-2.5 px-3">Contact</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-surface-container">
                <tr>
                  <td class="py-2.5 px-3 font-semibold text-secondary">CPIO (Academic &amp; Training)</td>
                  <td class="py-2.5 px-3">Shri A. K. Sharma, Director</td>
                  <td class="py-2.5 px-3">NSSTA TPAC &amp; Training Programmes</td>
                  <td class="py-2.5 px-3">cpio-nssta@mospi.gov.in</td>
                </tr>
                <tr>
                  <td class="py-2.5 px-3 font-semibold text-secondary">CPIO (Cadre Management)</td>
                  <td class="py-2.5 px-3">Smt. Radhika Verma, Deputy Secretary</td>
                  <td class="py-2.5 px-3">ISS / SSS Cadre Control Cell</td>
                  <td class="py-2.5 px-3">cpio-cadre@mospi.gov.in</td>
                </tr>
                <tr>
                  <td class="py-2.5 px-3 font-semibold text-primary">First Appellate Authority (FAA)</td>
                  <td class="py-2.5 px-3">Dr. S. K. Mukherjee, Additional DG</td>
                  <td class="py-2.5 px-3">Entire NSSTA Institution</td>
                  <td class="py-2.5 px-3">faa-nssta@mospi.gov.in</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm border border-surface-container">
          <h2 class="font-headline-sm text-headline-sm text-primary mb-2">3. Procedure for Seeking Information</h2>
          <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed mb-3">
            Citizens and officers can submit online RTI requests through the Government of India centralized RTI portal:
          </p>
          <div class="flex flex-wrap items-center gap-3">
            <a href="https://rtionline.gov.in" target="_blank" rel="noopener" class="px-4 py-2 rounded-lg bg-primary text-on-primary font-label-md text-label-md font-bold hover:bg-primary-container transition-all flex items-center gap-1.5">
              <span>Go to RTI Online Portal (rtionline.gov.in)</span>
              <span class="material-symbols-outlined text-[16px]">open_in_new</span>
            </a>
            <span class="text-body-sm text-on-surface-variant">Nominal application fee: ₹10</span>
          </div>
          <p class="text-[12px] text-on-surface-variant mt-3 italic">
            Note: Personal assessment scores and individual APAR data are exempted from public disclosure under Section 8(1)(j) of the RTI Act to safeguard individual privacy.
          </p>
        </div>
      </div>

      <!-- Right Column (4 cols) -->
      <div class="lg:col-span-4 flex flex-col gap-space-md">
        <div class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm border border-surface-container">
          <div class="font-bold text-primary font-label-lg text-label-lg mb-2 flex items-center gap-2">
            <span class="material-symbols-outlined text-secondary text-[20px]">policy</span>
            <span>RTI Disclosures Checklist</span>
          </div>
          <ul class="space-y-2 text-body-sm text-body-sm text-on-surface-variant">
            <li class="flex items-center gap-2"><span class="material-symbols-outlined text-primary text-[16px]">check</span> Annual TPAC Budget Allocations</li>
            <li class="flex items-center gap-2"><span class="material-symbols-outlined text-primary text-[16px]">check</span> Cadre Strength &amp; Vacancy Status</li>
            <li class="flex items-center gap-2"><span class="material-symbols-outlined text-primary text-[16px]">check</span> Public Circulars &amp; Training Schedules</li>
            <li class="flex items-center gap-2"><span class="material-symbols-outlined text-primary text-[16px]">check</span> Empaneled International Faculty Roster</li>
          </ul>
        </div>
      </div>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/../includes/public_footer.php'; ?>
