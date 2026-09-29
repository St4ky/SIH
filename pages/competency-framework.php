<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';

$pageTitle = 'National Statistical Competency Framework — Gap2Grow (MoSPI / NSSTA)';
$currentPage = 'framework';
require_once __DIR__ . '/../includes/public_header.php';

// Fetch domains from DB
$domains = [];
try {
    $stmt = $pdo->query('SELECT * FROM competency_domains ORDER BY id ASC');
    $domains = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {}

$competencies = [
    1 => [
        ['name' => 'National Accounts (SNA 2008)', 'desc' => 'GDP estimation, GVA at basic prices, and institutional sector accounts compilation.', 'norm' => 'Level 4 (80%)', 'level' => 5],
        ['name' => 'CPI & WPI Price Indices Construction', 'desc' => 'Price relative computation, Laspeyres-Törnqvist aggregation, and hedonic quality adjustment.', 'norm' => 'Level 4 (80%)', 'level' => 4],
        ['name' => 'Annual Survey of Industries (ASI)', 'desc' => 'Factory register sampling, capital formation valuation, and industrial classifications (NIC 2008).', 'norm' => 'Level 4 (80%)', 'level' => 4],
        ['name' => 'Survey Sampling Design & Weighting', 'desc' => 'Stratified multi-stage designs, multiplier calibration, and non-sampling error modeling.', 'norm' => 'Level 4 (85%)', 'level' => 5],
    ],
    2 => [
        ['name' => 'Statistical Computing in Python', 'desc' => 'NumPy, Pandas, SciPy, Statsmodels, and automated ETL pipelines for official statistics.', 'norm' => 'Level 3 (70%)', 'level' => 4],
        ['name' => 'Econometric & Time-Series Modeling in R', 'desc' => 'ARIMA-X13 seasonal adjustment, MIDAS nowcasting, and panel regression analysis.', 'norm' => 'Level 3 (70%)', 'level' => 3],
        ['name' => 'Spatial Statistics & GIS Bhuvan Integration', 'desc' => 'ISRO Bhuvan geoportal, boundary shapefiles, spatial autocorrelation, and remote sensing estimation.', 'norm' => 'Level 3 (75%)', 'level' => 2],
        ['name' => 'Big Data Processing & Administrative Data Ingestion', 'desc' => 'GSTN transactions, MCA-21 company filings, and high-frequency real-time indicator ingestion.', 'norm' => 'Level 3 (70%)', 'level' => 3],
    ],
    3 => [
        ['name' => 'DPDPA 2023 Compliance & Statistical Confidentiality', 'desc' => 'Statutory data protection, consent mechanisms, microdata anonymization, and differential privacy.', 'norm' => 'Level 4 (85%)', 'level' => 4],
        ['name' => 'National Data Governance Framework (NDGF)', 'desc' => 'Non-personal data stewardship, inter-ministerial data exchange protocols, and open API standards.', 'norm' => 'Level 4 (80%)', 'level' => 4],
        ['name' => 'SDDS & UN Fundamental Principles Alignment', 'desc' => 'IMF Special Data Dissemination Standards, advance release calendar compliance, and data integrity.', 'norm' => 'Level 4 (80%)', 'level' => 5],
        ['name' => 'Data Quality Assurance & Metadata Standards', 'desc' => 'SDMX metadata compilation, audit trails, and international comparability compliance.', 'norm' => 'Level 3 (75%)', 'level' => 3],
    ],
    4 => [
        ['name' => 'NSS Field Operations Supervision', 'desc' => 'Directing multi-state socio-economic survey rounds and field investigator quality monitoring.', 'norm' => 'Level 4 (80%)', 'level' => 5],
        ['name' => 'Computer Assisted Personal Interviewing (CAPI)', 'desc' => 'Tablet-based survey deployment, real-time logic check scripting, and geo-tagged data capture.', 'norm' => 'Level 3 (75%)', 'level' => 4],
        ['name' => 'Cadre Mentorship & Academic Lecturing', 'desc' => 'Instruction of probationers at NSSTA Greater Noida in statistical mechanics and administrative governance.', 'norm' => 'Level 4 (80%)', 'level' => 4],
        ['name' => 'Inter-Ministerial Statistical Coordination', 'desc' => 'Chairing technical advisory committees and statistical audits across Union line ministries.', 'norm' => 'Level 4 (80%)', 'level' => 4],
    ]
];
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
      <span class="text-primary font-semibold">Competency Framework</span>
    </nav>
  </div>

  <!-- Hero Banner -->
  <section class="max-w-7xl mx-auto px-space-md sm:px-gutter pb-space-lg">
    <div class="inline-flex items-center gap-space-xs px-space-md py-1.5 rounded-full bg-surface-container-lowest shadow-sm mb-space-md">
      <div class="w-5 h-5 rounded-full bg-primary-container flex items-center justify-center text-on-primary">
        <span class="material-symbols-outlined text-[13px]">account_tree</span>
      </div>
      <span class="text-label-sm font-label-sm text-primary uppercase tracking-wider font-semibold">MoSPI National Statistical Competency Architecture</span>
      <span class="w-1.5 h-1.5 rounded-full bg-secondary-container"></span>
      <span class="text-label-sm font-label-sm text-secondary font-semibold">SNA 2008 &amp; DPDPA 2023 Aligned</span>
    </div>

    <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-space-md mb-space-lg">
      <div class="max-w-3xl">
        <h1 class="font-headline-xl text-headline-xl text-primary tracking-tight leading-tight">
          MoSPI Competency Framework &amp; Proficiency Benchmarks
        </h1>
        <p class="font-body-lg text-body-lg text-on-surface-variant mt-2 leading-relaxed">
          The official taxonomy of skills, knowledge areas, and behavioral proficiencies required across the Indian Statistical Service (ISS), Subordinate Statistical Service (SSS), and State DES cadres.
        </p>
      </div>

      <div class="shrink-0 flex items-center gap-2">
        <a href="<?= BASE_URL ?>/index.php" class="px-5 py-2.5 rounded-lg bg-secondary text-on-secondary font-label-md text-label-md font-bold hover:bg-secondary-container transition-all shadow-sm flex items-center gap-2">
          <span class="material-symbols-outlined text-[18px]">psychology</span>
          <span>Take Self-Assessment</span>
        </a>
      </div>
    </div>

    <!-- Proficiency Level Scale Reference Card -->
    <div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm border border-surface-container mb-space-lg">
      <div class="font-label-md text-label-md text-primary font-bold mb-2 flex items-center gap-2">
        <span class="material-symbols-outlined text-secondary text-[20px]">tune</span>
        <span>Standard Cadre Proficiency Scale (Levels 1 to 5)</span>
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-5 gap-space-sm text-center">
        <div class="bg-surface-container-low p-3 rounded-lg border border-outline-variant/30">
          <span class="font-bold text-primary block">Level 1</span>
          <span class="text-label-sm font-label-sm text-on-surface font-semibold">Fundamental</span>
          <p class="text-[11px] text-on-surface-variant mt-1">Conceptual grasp; assists under senior supervision.</p>
        </div>
        <div class="bg-surface-container-low p-3 rounded-lg border border-outline-variant/30">
          <span class="font-bold text-primary block">Level 2</span>
          <span class="text-label-sm font-label-sm text-on-surface font-semibold">Working</span>
          <p class="text-[11px] text-on-surface-variant mt-1">Routine execution; compiles data with standard SOPs.</p>
        </div>
        <div class="bg-surface-container-low p-3 rounded-lg border border-outline-variant/30">
          <span class="font-bold text-primary block">Level 3</span>
          <span class="text-label-sm font-label-sm text-on-surface font-semibold">Competent</span>
          <p class="text-[11px] text-on-surface-variant mt-1">Autonomous practitioner; troubleshoots methodologies.</p>
        </div>
        <div class="bg-surface-container-low p-3 rounded-lg border border-outline-variant/30">
          <span class="font-bold text-primary block">Level 4</span>
          <span class="text-label-sm font-label-sm text-primary font-semibold">Advanced SME</span>
          <p class="text-[11px] text-on-surface-variant mt-1">Subject matter expert; authors monographs &amp; manuals.</p>
        </div>
        <div class="bg-primary-container p-3 rounded-lg border border-primary/20 text-on-primary">
          <span class="font-bold text-secondary-fixed block">Level 5</span>
          <span class="text-label-sm font-label-sm text-on-primary font-semibold">Master Mentor</span>
          <p class="text-[11px] text-primary-fixed mt-1">NSSTA Faculty leader; represents India at UN / IMF.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Competency Domains Grid -->
  <section class="max-w-7xl mx-auto px-space-md sm:px-gutter pb-space-xl">
    <div class="space-y-space-xl">
      <!-- Domain 1 -->
      <div class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm border border-surface-container">
        <div class="flex items-center gap-3 pb-space-sm border-b border-surface-container mb-space-md">
          <div class="w-10 h-10 rounded-xl bg-primary text-on-primary flex items-center justify-center font-bold">01</div>
          <div>
            <h2 class="font-headline-sm text-headline-sm text-primary font-bold">Domain 1: Core Official Statistical Competencies</h2>
            <p class="text-body-sm text-body-sm text-on-surface-variant">Mandatory for National Accounts Division (NAD), Price Statistics, and CSO Operations</p>
          </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-space-md">
          <?php foreach ($competencies[1] as $c): ?>
            <div class="bg-surface p-space-md rounded-xl border border-surface-container hover:bg-surface-container-low transition-colors">
              <div class="flex items-start justify-between gap-2 mb-1">
                <h3 class="font-label-lg text-label-lg font-bold text-primary"><?= htmlspecialchars($c['name']) ?></h3>
                <span class="px-2 py-0.5 rounded text-[11px] font-bold bg-primary-container text-on-primary shrink-0"><?= $c['norm'] ?></span>
              </div>
              <p class="font-body-sm text-body-sm text-on-surface-variant"><?= htmlspecialchars($c['desc']) ?></p>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Domain 2 -->
      <div class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm border border-surface-container">
        <div class="flex items-center gap-3 pb-space-sm border-b border-surface-container mb-space-md">
          <div class="w-10 h-10 rounded-xl bg-secondary text-on-secondary flex items-center justify-center font-bold">02</div>
          <div>
            <h2 class="font-headline-sm text-headline-sm text-primary font-bold">Domain 2: Modern Computational &amp; Data Engineering</h2>
            <p class="text-body-sm text-body-sm text-on-surface-variant">Programming, geospatial analytics, and big data ingestion pipelines</p>
          </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-space-md">
          <?php foreach ($competencies[2] as $c): ?>
            <div class="bg-surface p-space-md rounded-xl border border-surface-container hover:bg-surface-container-low transition-colors">
              <div class="flex items-start justify-between gap-2 mb-1">
                <h3 class="font-label-lg text-label-lg font-bold text-primary"><?= htmlspecialchars($c['name']) ?></h3>
                <span class="px-2 py-0.5 rounded text-[11px] font-bold bg-secondary-fixed text-on-secondary-fixed shrink-0"><?= $c['norm'] ?></span>
              </div>
              <p class="font-body-sm text-body-sm text-on-surface-variant"><?= htmlspecialchars($c['desc']) ?></p>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Domain 3 -->
      <div class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm border border-surface-container">
        <div class="flex items-center gap-3 pb-space-sm border-b border-surface-container mb-space-md">
          <div class="w-10 h-10 rounded-xl bg-surface-tint text-on-primary flex items-center justify-center font-bold">03</div>
          <div>
            <h2 class="font-headline-sm text-headline-sm text-primary font-bold">Domain 3: Digital Governance &amp; Data Stewardship</h2>
            <p class="text-body-sm text-body-sm text-on-surface-variant">DPDPA 2023 privacy protocols, NDGF frameworks, and dissemination integrity</p>
          </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-space-md">
          <?php foreach ($competencies[3] as $c): ?>
            <div class="bg-surface p-space-md rounded-xl border border-surface-container hover:bg-surface-container-low transition-colors">
              <div class="flex items-start justify-between gap-2 mb-1">
                <h3 class="font-label-lg text-label-lg font-bold text-primary"><?= htmlspecialchars($c['name']) ?></h3>
                <span class="px-2 py-0.5 rounded text-[11px] font-bold bg-surface-container-high text-primary shrink-0"><?= $c['norm'] ?></span>
              </div>
              <p class="font-body-sm text-body-sm text-on-surface-variant"><?= htmlspecialchars($c['desc']) ?></p>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Domain 4 -->
      <div class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm border border-surface-container">
        <div class="flex items-center gap-3 pb-space-sm border-b border-surface-container mb-space-md">
          <div class="w-10 h-10 rounded-xl bg-primary-container text-on-primary flex items-center justify-center font-bold">04</div>
          <div>
            <h2 class="font-headline-sm text-headline-sm text-primary font-bold">Domain 4: Field Administration &amp; Survey Leadership</h2>
            <p class="text-body-sm text-body-sm text-on-surface-variant">NSS operations, regional office administration, CAPI mobile workflows, and mentorship</p>
          </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-space-md">
          <?php foreach ($competencies[4] as $c): ?>
            <div class="bg-surface p-space-md rounded-xl border border-surface-container hover:bg-surface-container-low transition-colors">
              <div class="flex items-start justify-between gap-2 mb-1">
                <h3 class="font-label-lg text-label-lg font-bold text-primary"><?= htmlspecialchars($c['name']) ?></h3>
                <span class="px-2 py-0.5 rounded text-[11px] font-bold bg-primary text-on-primary shrink-0"><?= $c['norm'] ?></span>
              </div>
              <p class="font-body-sm text-body-sm text-on-surface-variant"><?= htmlspecialchars($c['desc']) ?></p>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/../includes/public_footer.php'; ?>
