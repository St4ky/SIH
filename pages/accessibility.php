<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';

$pageTitle = 'Hyperlinking & Accessibility Policies — Gap2Grow (GIGW 3.0 Standard)';
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
      <span class="text-primary font-semibold">Accessibility &amp; Hyperlinking</span>
    </nav>
  </div>

  <!-- Hero Section -->
  <section class="max-w-7xl mx-auto px-space-md sm:px-gutter pb-space-xl">
    <div class="inline-flex items-center gap-space-xs px-space-md py-1.5 rounded-full bg-surface-container-lowest shadow-sm mb-space-md">
      <div class="w-5 h-5 rounded-full bg-primary text-on-primary flex items-center justify-center">
        <span class="material-symbols-outlined text-[13px]">accessibility</span>
      </div>
      <span class="text-label-sm font-label-sm text-primary uppercase tracking-wider font-semibold">GIGW 3.0 Quality Conformance</span>
      <span class="w-1.5 h-1.5 rounded-full bg-secondary-container"></span>
      <span class="text-label-sm font-label-sm text-secondary font-semibold">WCAG 2.1 Level AA Standard</span>
    </div>

    <div class="max-w-3xl mb-space-lg">
      <h1 class="font-headline-xl text-headline-xl text-primary tracking-tight leading-tight">
        Hyperlinking &amp; Digital Accessibility Policies
      </h1>
      <p class="font-body-lg text-body-lg text-on-surface-variant mt-2 leading-relaxed">
        Commitment of MoSPI and NSSTA to ensure barrier-free, equitable digital access to official statistical capability platforms for all civil servants and citizens, including persons with disabilities.
      </p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-xl items-start">
      <div class="lg:col-span-8 space-y-space-lg">
        <div class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm border border-surface-container">
          <h2 class="font-headline-sm text-headline-sm text-primary mb-2">1. Accessibility Statement</h2>
          <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed mb-3">
            This website complies with the <strong>Guidelines for Indian Government Websites (GIGW 3.0)</strong> and meets <strong>Web Content Accessibility Guidelines (WCAG) 2.1 Level AA</strong> specifications.
          </p>
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-body-sm font-body-sm">
            <div class="p-3 bg-surface rounded-xl border border-surface-container">
              <strong class="text-primary block mb-1">Text Resizing:</strong>
              <span>Use the header font size controls (A-, A, A+) to adjust typography dynamically without loss of layout fidelity.</span>
            </div>
            <div class="p-3 bg-surface rounded-xl border border-surface-container">
              <strong class="text-primary block mb-1">Screen Reader Friendly:</strong>
              <span>All images, charts, and interactive controls provide descriptive ARIA tags and text equivalents.</span>
            </div>
          </div>
        </div>

        <div class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm border border-surface-container">
          <h2 class="font-headline-sm text-headline-sm text-primary mb-2">2. Hyperlinking Policy</h2>
          <div class="space-y-3 font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
            <p>
              <strong>Links to External Portals:</strong> Throughout this portal, links may be provided to external entities including DoPT Mission Karmayogi, Coursera, OpenLibrary, and UN statistical divisions. MoSPI is not responsible for the content, privacy policies, or reliability of linked external websites.
            </p>
            <p>
              <strong>Inbound Links to Gap2Grow:</strong> Prior permission is not required to link directly to this platform from any State or Central Government website, provided the link does not misrepresent the official cadre authority of MoSPI or NSSTA.
            </p>
          </div>
        </div>

        <div class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm border border-surface-container">
          <h2 class="font-headline-sm text-headline-sm text-primary mb-2">3. Copyright &amp; Content Re-use</h2>
          <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
            Material on this website may be reproduced free of charge in any format or media for official government training, academic research, or statistical study, subject to the material being reproduced accurately and not in a derogatory manner. Source must be prominently acknowledged as <em>"MoSPI &amp; NSSTA Cadre Intelligence Portal (Gap2Grow)"</em>.
          </p>
        </div>
      </div>

      <div class="lg:col-span-4 flex flex-col gap-space-md">
        <div class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm border border-surface-container">
          <div class="font-bold text-primary font-label-lg text-label-lg mb-2 flex items-center gap-2">
            <span class="material-symbols-outlined text-secondary text-[20px]">verified_user</span>
            <span>Compliance Seals</span>
          </div>
          <ul class="space-y-2 text-body-sm text-body-sm text-on-surface-variant">
            <li>• GIGW 3.0 Validated</li>
            <li>• W3C HTML5 &amp; CSS3 Valid</li>
            <li>• Bilingual Navigation (Hindi / English)</li>
            <li>• Keyboard Operable Interface</li>
          </ul>
        </div>
      </div>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/../includes/public_footer.php'; ?>
