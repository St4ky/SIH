<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';

$pageTitle = 'Terms of Digital Service & Privacy Policy — Gap2Grow (DPDPA 2023 Compliant)';
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
      <span class="text-primary font-semibold">Terms of Service &amp; Privacy Policy</span>
    </nav>
  </div>

  <!-- Hero Section -->
  <section class="max-w-7xl mx-auto px-space-md sm:px-gutter pb-space-xl">
    <div class="inline-flex items-center gap-space-xs px-space-md py-1.5 rounded-full bg-surface-container-lowest shadow-sm mb-space-md">
      <div class="w-5 h-5 rounded-full bg-secondary flex items-center justify-center text-on-secondary">
        <span class="material-symbols-outlined text-[13px]">security</span>
      </div>
      <span class="text-label-sm font-label-sm text-primary uppercase tracking-wider font-semibold">Statutory Digital Governance</span>
      <span class="w-1.5 h-1.5 rounded-full bg-secondary-container"></span>
      <span class="text-label-sm font-label-sm text-secondary font-semibold">DPDPA 2023 &amp; CERT-In Compliant</span>
    </div>

    <div class="max-w-3xl mb-space-lg">
      <h1 class="font-headline-xl text-headline-xl text-primary tracking-tight leading-tight">
        Terms of Digital Service &amp; Cadre Data Protection
      </h1>
      <p class="font-body-lg text-body-lg text-on-surface-variant mt-2 leading-relaxed">
        Governing the responsible, lawful, and secure processing of official personnel information, competency diagnostics, and training records under the Digital Personal Data Protection Act (DPDPA 2023).
      </p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-xl items-start">
      <div class="lg:col-span-8 space-y-space-lg">
        <div class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm border border-surface-container">
          <h2 class="font-headline-sm text-headline-sm text-primary mb-2">1. Scope and Applicability</h2>
          <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
            These terms apply to all officers of the <strong>Indian Statistical Service (ISS)</strong>, <strong>Subordinate Statistical Service (SSS)</strong>, and accredited statistical personnel from State DES or Central Ministries accessing the Gap2Grow portal via Parichay or e-HRMS single sign-on.
          </p>
        </div>

        <div class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm border border-surface-container">
          <h2 class="font-headline-sm text-headline-sm text-primary mb-2">2. Data Collected &amp; Purpose of Processing</h2>
          <div class="space-y-3 font-body-sm text-body-sm text-on-surface-variant">
            <p>We process only official cadre data strictly necessary for capability development:</p>
            <ul class="list-disc pl-5 space-y-1">
              <li><strong>Cadre Identity:</strong> Name, Designation, Cadre Band (JTS, STS, JAG, SAG), Cadre Code, Official Gov.in email.</li>
              <li><strong>Psychometric Diagnostics:</strong> Anonymized response times, item choices, domain proficiency percentages.</li>
              <li><strong>Training Records:</strong> Course progress on iGOT Karmayogi and NSSTA TPAC residential workshop attendance.</li>
            </ul>
            <p class="pt-2 font-semibold text-primary">
              Purpose Limitation: Data is utilized solely for precision training recommendations, SPARROW APAR competency weightage, and DPC pre-screening audits. Data is never shared with commercial third parties.
            </p>
          </div>
        </div>

        <div class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm border border-surface-container">
          <h2 class="font-headline-sm text-headline-sm text-primary mb-2">3. Sovereign Infrastructure &amp; Cryptographic Security</h2>
          <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed mb-3">
            All database nodes are hosted exclusively within the territorial boundaries of the Republic of India on the <strong>NIC MeghRaj Sovereign Government Cloud</strong> with TLS 1.3 encryption and dual-factor Sandes authentication.
          </p>
          <div class="flex items-center gap-2 text-label-sm font-label-sm text-secondary font-bold">
            <span class="material-symbols-outlined text-[18px]">verified</span>
            <span>STQC Certified • ISO/IEC 27001:2022 Conforming</span>
          </div>
        </div>

        <div class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm border border-surface-container">
          <h2 class="font-headline-sm text-headline-sm text-primary mb-2">4. Data Protection Officer (DPO) Contact</h2>
          <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed mb-2">
            In accordance with Section 10 of DPDPA 2023, officers may direct inquiries or grievance redressals to:
          </p>
          <div class="p-3 bg-surface rounded-xl border border-surface-container text-body-sm font-body-sm text-on-surface">
            <strong>Data Protection Officer (DPO):</strong> Director (IT &amp; Cyber Governance), MoSPI Computer Centre, East Block-10, R.K. Puram, New Delhi - 110066.<br/>
            <strong>Email:</strong> dpo-mospi@gov.in | <strong>Tel:</strong> 011-2610-1234
          </div>
        </div>
      </div>

      <div class="lg:col-span-4 flex flex-col gap-space-md">
        <div class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm border border-surface-container">
          <div class="font-bold text-primary font-label-lg text-label-lg mb-2 flex items-center gap-2">
            <span class="material-symbols-outlined text-secondary text-[20px]">shield</span>
            <span>Officer Rights Summary</span>
          </div>
          <ul class="space-y-2 text-body-sm text-body-sm text-on-surface-variant">
            <li>• Right to inspect diagnostic scoring logs</li>
            <li>• Right to update self-declared proficiencies</li>
            <li>• Cryptographic DigiLocker badge portability</li>
            <li>• DOPT Rule 12(A) audit trail integrity</li>
          </ul>
        </div>
      </div>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/../includes/public_footer.php'; ?>
