<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';

$pageTitle = 'Helpdesk & Cadre Support — Gap2Grow (MoSPI / NSSTA)';
$currentPage = 'helpdesk';
require_once __DIR__ . '/../includes/public_header.php';

$submitted = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $submitted = true;
}
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
      <span class="text-primary font-semibold">Helpdesk &amp; Cadre Support</span>
    </nav>
  </div>

  <!-- Hero Section -->
  <section class="max-w-7xl mx-auto px-space-md sm:px-gutter pb-space-lg">
    <div class="inline-flex items-center gap-space-xs px-space-md py-1.5 rounded-full bg-surface-container-lowest shadow-sm mb-space-md">
      <div class="w-5 h-5 rounded-full bg-secondary flex items-center justify-center text-on-secondary">
        <span class="material-symbols-outlined text-[13px]">support_agent</span>
      </div>
      <span class="text-label-sm font-label-sm text-primary uppercase tracking-wider font-semibold">MoSPI • NSSTA Sovereign Support Cell</span>
      <span class="w-1.5 h-1.5 rounded-full bg-secondary-container"></span>
      <span class="text-label-sm font-label-sm text-secondary font-semibold">24x7 Cadre Assistance</span>
    </div>

    <div class="max-w-3xl mb-space-lg">
      <h1 class="font-headline-xl text-headline-xl text-primary tracking-tight leading-tight">
        Official Cadre Helpdesk &amp; Technical Support
      </h1>
      <p class="font-body-lg text-body-lg text-on-surface-variant mt-2 leading-relaxed">
        Assistance for Parichay Single Sign-On (SSO), SSS / State DES cadre onboarding, e-HRMS 2.0 competency sync, and NSSTA residential TPAC nominations.
      </p>
    </div>

    <?php if ($submitted): ?>
      <div class="bg-emerald-50 border border-emerald-300 text-emerald-900 rounded-xl p-space-md mb-space-lg flex items-center gap-3">
        <span class="material-symbols-outlined text-emerald-600 text-[28px]">task_alt</span>
        <div>
          <div class="font-bold">Support Request Logged Successfully!</div>
          <div class="text-body-sm">Ticket Ref #TKT-<?= rand(10000, 99999) ?> has been dispatched to the NSSTA Academic Cell &amp; MoSPI Computer Centre. You will receive an official response on your Gov.in email within 24 hours.</div>
        </div>
      </div>
    <?php endif; ?>

    <!-- Two-Column Grid: Form & Contact Directory -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-xl items-start">
      <!-- Left Column: Support Ticket / Enrolment Form -->
      <div class="lg:col-span-7 bg-surface-container-lowest rounded-2xl p-space-lg sm:p-space-xl shadow-sm border border-surface-container">
        <div class="flex items-center justify-between pb-space-sm border-b border-surface-container mb-space-md">
          <div class="flex items-center gap-2">
            <span class="material-symbols-outlined text-secondary text-[22px]">contact_support</span>
            <h2 class="font-headline-sm text-headline-sm text-primary">Submit Cadre Support Request</h2>
          </div>
          <span class="text-label-sm font-label-sm text-on-surface-variant">NIC Node Secure</span>
        </div>

        <form method="POST" action="" class="space-y-space-md">
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-space-md">
            <div>
              <label class="block font-label-sm text-label-sm text-primary mb-1">Official Name <span class="text-secondary">*</span></label>
              <input type="text" name="name" required placeholder="Dr. Rajesh Sharma" class="w-full px-3.5 py-2.5 rounded-lg border border-outline-variant bg-surface text-on-surface focus:outline-none focus:border-secondary font-body-sm text-body-sm" />
            </div>
            <div>
              <label class="block font-label-sm text-label-sm text-primary mb-1">Official Gov.in / Nic.in Email <span class="text-secondary">*</span></label>
              <input type="email" name="email" required placeholder="officer@mospi.gov.in" class="w-full px-3.5 py-2.5 rounded-lg border border-outline-variant bg-surface text-on-surface focus:outline-none focus:border-secondary font-body-sm text-body-sm" />
            </div>
          </div>

          <div class="grid grid-cols-1 sm:grid-cols-2 gap-space-md">
            <div>
              <label class="block font-label-sm text-label-sm text-primary mb-1">Cadre Service <span class="text-secondary">*</span></label>
              <select name="cadre" required class="w-full px-3.5 py-2.5 rounded-lg border border-outline-variant bg-surface text-on-surface focus:outline-none focus:border-secondary font-body-sm text-body-sm">
                <option value="ISS">Indian Statistical Service (ISS)</option>
                <option value="SSS">Subordinate Statistical Service (SSS)</option>
                <option value="State DES">State Directorate of Economics &amp; Stats</option>
                <option value="Field Survey">NSSO Field Operations Division</option>
                <option value="Ministry">Line Ministry Data Unit</option>
              </select>
            </div>
            <div>
              <label class="block font-label-sm text-label-sm text-primary mb-1">Employee ID / PPO / Cadre Code</label>
              <input type="text" name="employee_id" placeholder="ISS-2008-0412" class="w-full px-3.5 py-2.5 rounded-lg border border-outline-variant bg-surface text-on-surface focus:outline-none focus:border-secondary font-body-sm text-body-sm" />
            </div>
          </div>

          <div>
            <label class="block font-label-sm text-label-sm text-primary mb-1">Assistance Category <span class="text-secondary">*</span></label>
            <select name="category" required class="w-full px-3.5 py-2.5 rounded-lg border border-outline-variant bg-surface text-on-surface focus:outline-none focus:border-secondary font-body-sm text-body-sm">
              <option value="sso">Parichay / Jan Parichay Login &amp; 2FA Issues</option>
              <option value="enrolment">New Officer Cadre Enrolment / Account Creation</option>
              <option value="sparrow">SPARROW / e-HRMS 2.0 APAR Score Sync</option>
              <option value="tpac">NSSTA Residential TPAC Nomination Inquiries</option>
              <option value="technical">Platform Bug or Diagnostic Scoring Query</option>
            </select>
          </div>

          <div>
            <label class="block font-label-sm text-label-sm text-primary mb-1">Detailed Inquiry / Issue Description <span class="text-secondary">*</span></label>
            <textarea name="description" rows="4" required placeholder="Please describe your cadre service request or technical error code..." class="w-full px-3.5 py-2.5 rounded-lg border border-outline-variant bg-surface text-on-surface focus:outline-none focus:border-secondary font-body-sm text-body-sm"></textarea>
          </div>

          <button type="submit" class="w-full py-3 bg-secondary text-on-secondary font-label-md text-label-md font-bold rounded-lg hover:bg-secondary-container transition-all shadow-md flex items-center justify-center gap-2">
            <span class="material-symbols-outlined text-[18px]">send</span>
            <span>Submit Official Request</span>
          </button>
        </form>
      </div>

      <!-- Right Column: Institutional Contact Directory -->
      <div class="lg:col-span-5 flex flex-col gap-space-md">
        <div class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm border border-surface-container">
          <h2 class="font-headline-sm text-headline-sm text-primary mb-space-md flex items-center gap-2">
            <span class="material-symbols-outlined text-secondary text-[22px]">apartment</span>
            <span>Institutional Support Nodes</span>
          </h2>

          <div class="space-y-space-md font-body-sm text-body-sm text-on-surface">
            <!-- Node 1 -->
            <div class="p-3 bg-surface rounded-xl border border-surface-container">
              <div class="font-bold text-primary">NSSTA Greater Noida Campus</div>
              <div class="text-on-surface-variant text-[12px] mt-0.5">Plot No. 22, Knowledge Park II, Greater Noida, Uttar Pradesh - 201310</div>
              <div class="mt-2 text-label-sm font-label-sm text-secondary font-semibold">
                Tel: 0120-234-5678 / 0120-234-5679
              </div>
              <div class="text-[12px] text-on-surface-variant">Email: helpdesk-nssta@mospi.gov.in</div>
            </div>

            <!-- Node 2 -->
            <div class="p-3 bg-surface rounded-xl border border-surface-container">
              <div class="font-bold text-primary">MoSPI Computer Centre (IT Cell)</div>
              <div class="text-on-surface-variant text-[12px] mt-0.5">East Block-10, Sector-1, R.K. Puram, New Delhi - 110066</div>
              <div class="mt-2 text-label-sm font-label-sm text-secondary font-semibold">
                Tel: 011-2610-1234 (Ext. 204)
              </div>
              <div class="text-[12px] text-on-surface-variant">Email: computercentre-mospi@gov.in</div>
            </div>

            <!-- Node 3 -->
            <div class="p-3 bg-surface rounded-xl border border-surface-container">
              <div class="font-bold text-primary">Parichay / Jan Parichay NIC Gateway</div>
              <div class="text-on-surface-variant text-[12px] mt-0.5">National Informatics Centre (NIC), CGO Complex, Lodhi Road, New Delhi</div>
              <div class="mt-2 text-label-sm font-label-sm text-primary font-semibold">
                Toll Free: 1800-111-555 (Sandes 2FA Support)
              </div>
            </div>
          </div>
        </div>

        <!-- FAQ Quick Strip -->
        <div class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm border border-surface-container">
          <h3 class="font-label-lg text-label-lg text-primary font-bold mb-2 flex items-center gap-1.5">
            <span class="material-symbols-outlined text-secondary text-[18px]">quiz</span>
            <span>Frequently Asked Questions</span>
          </h3>
          <div class="space-y-2 text-body-sm text-body-sm text-on-surface-variant">
            <div>
              <strong class="text-primary block">Q: Can I use private Gmail / Yahoo IDs?</strong>
              <span>No. Access is restricted to official @gov.in and @nic.in credentials as per MoSPI Cybersecurity Protocol.</span>
            </div>
            <div class="pt-2 border-t border-surface-container">
              <strong class="text-primary block">Q: How often is the diagnostic assessment retake allowed?</strong>
              <span>Officers may retake domain assessments after completing recommended iGOT modules or every 90 days.</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/../includes/public_footer.php'; ?>
