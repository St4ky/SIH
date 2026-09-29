<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';

requireLogin();
$user = currentUser();
$userId = (int)$user['id'];
$requestedSkillId = isset($_GET['skill_id']) ? (int)$_GET['skill_id'] : 0;

$pageTitle = 'Real-Time Gap-to-Course Recommendation Engine — Gap2Grow';
$currentPage = 'learning-path';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/sidebar.php';
?>

<!-- Header Panel -->
<div class="w-full bg-surface-container-lowest rounded-xl p-space-lg shadow-sm mb-space-lg">
  <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-space-md">
    <div>
      <div class="flex items-center gap-space-xs mb-1">
        <span class="font-label-sm text-label-sm bg-secondary text-on-secondary px-2.5 py-0.5 rounded-full uppercase tracking-wider font-bold">
          Empirical Matching Engine v4.2
        </span>
        <span class="font-label-sm text-label-sm text-on-surface-variant">Live Pipeline Active</span>
      </div>
      <h1 class="font-headline-lg text-headline-lg text-primary tracking-tight">Real-Time Gap-to-Course Recommendation Engine</h1>
      <p class="font-body-md text-body-md text-on-surface-variant mt-0.5">
        Multi-factor computational matching aligning officer skill deficits with accredited iGOT Karmayogi &amp; NSSTA TPAC programmes.
      </p>
    </div>
    <div class="flex items-center gap-space-sm">
      <a href="<?= BASE_URL ?>/pages/learning-path.php" class="px-space-md py-2 bg-surface-container hover:bg-surface-container-high text-primary rounded-lg font-label-md text-label-md transition-colors flex items-center gap-1">
        <span class="material-symbols-outlined text-[18px]">arrow_back</span>
        <span>Back to Learning Path</span>
      </a>
      <button type="button" onclick="runPipeline()" class="px-space-md py-2 bg-primary text-on-primary hover:bg-primary-container rounded-lg font-label-md text-label-md transition-colors flex items-center gap-1 shadow-sm">
        <span class="material-symbols-outlined text-[18px]">cached</span>
        <span>Re-compute Match</span>
      </button>
    </div>
  </div>
</div>

<!-- Animated Algorithmic Pipeline Stages (4-Stage Execution Strip) -->
<section class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm mb-space-lg">
  <div class="flex items-center justify-between pb-space-sm border-b border-surface-container mb-space-md">
    <div class="flex items-center gap-2">
      <span class="material-symbols-outlined text-secondary text-[22px]">hub</span>
      <h2 class="font-headline-sm text-headline-sm text-primary">Algorithmic Inference Sequence</h2>
    </div>
    <span id="pipeline-status-badge" class="font-mono text-label-sm text-label-sm text-secondary bg-secondary-fixed/40 px-2.5 py-0.5 rounded-full font-bold">
      Ready to Execute
    </span>
  </div>

  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-space-md" id="pipeline-steps-grid">
    <!-- Step 1 -->
    <div id="step-1" class="pipeline-step bg-surface-container-low p-space-md rounded-xl transition-all border border-outline-variant/30">
      <div class="flex items-center justify-between mb-2">
        <span class="font-bold text-label-sm text-on-surface-variant">STEP 01</span>
        <span class="status-icon material-symbols-outlined text-[18px] text-outline">radio_button_unchecked</span>
      </div>
      <h3 class="font-label-lg text-label-lg text-primary">Deficit Isolation</h3>
      <p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Queries `skill_gaps` for lowest competency score &amp; priority tags.</p>
    </div>

    <!-- Step 2 -->
    <div id="step-2" class="pipeline-step bg-surface-container-low p-space-md rounded-xl transition-all border border-outline-variant/30">
      <div class="flex items-center justify-between mb-2">
        <span class="font-bold text-label-sm text-on-surface-variant">STEP 02</span>
        <span class="status-icon material-symbols-outlined text-[18px] text-outline">radio_button_unchecked</span>
      </div>
      <h3 class="font-label-lg text-label-lg text-primary">Catalog Sourcing</h3>
      <p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Queries Coursera (iGOT) &amp; OpenLibrary (NSSTA) multi-source indices.</p>
    </div>

    <!-- Step 3 -->
    <div id="step-3" class="pipeline-step bg-surface-container-low p-space-md rounded-xl transition-all border border-outline-variant/30">
      <div class="flex items-center justify-between mb-2">
        <span class="font-bold text-label-sm text-on-surface-variant">STEP 03</span>
        <span class="status-icon material-symbols-outlined text-[18px] text-outline">radio_button_unchecked</span>
      </div>
      <h3 class="font-label-lg text-label-lg text-primary">Proximity Scoring</h3>
      <p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Domain weight (50%) + Difficulty proximity (30%) + Recency index (20%).</p>
    </div>

    <!-- Step 4 -->
    <div id="step-4" class="pipeline-step bg-surface-container-low p-space-md rounded-xl transition-all border border-outline-variant/30">
      <div class="flex items-center justify-between mb-2">
        <span class="font-bold text-label-sm text-on-surface-variant">STEP 04</span>
        <span class="status-icon material-symbols-outlined text-[18px] text-outline">radio_button_unchecked</span>
      </div>
      <h3 class="font-label-lg text-label-lg text-primary">Curriculum Dispatch</h3>
      <p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Ranks recommendations and streams authenticated JSON response.</p>
    </div>
  </div>
</section>

<!-- Active Target Gap Dossier Box -->
<div id="target-gap-banner" class="w-full bg-primary text-on-primary rounded-xl p-space-lg shadow-sm mb-space-lg hidden">
  <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-space-md">
    <div>
      <div class="flex items-center gap-2 mb-1">
        <span class="text-label-sm font-label-sm uppercase tracking-wider text-secondary-fixed font-bold">Target Remediation Deficit</span>
        <span id="target-domain-label" class="text-label-sm text-primary-fixed bg-surface-container-highest/20 px-2 py-0.5 rounded">Domain</span>
      </div>
      <h2 id="target-skill-title" class="font-headline-md text-headline-md text-on-primary">Analyzing Skill Gap...</h2>
      <p class="font-body-sm text-body-sm text-primary-fixed-dim mt-1">
        Calculated Priority: <strong id="target-priority-label" class="uppercase text-secondary-container">HIGH</strong> • 
        Target Difficulty Level: <strong id="target-ideal-level">Level 3 (Advanced)</strong>
      </p>
    </div>
    <div class="flex items-center gap-space-md shrink-0 bg-primary-container p-space-md rounded-xl">
      <div class="text-center">
        <div class="text-label-sm text-primary-fixed-dim uppercase">Current</div>
        <div id="target-current-score" class="font-headline-lg font-bold text-error">--%</div>
      </div>
      <div class="text-headline-sm text-primary-fixed">→</div>
      <div class="text-center">
        <div class="text-label-sm text-primary-fixed-dim uppercase">Benchmark</div>
        <div id="target-benchmark-score" class="font-headline-lg font-bold text-on-primary">80%</div>
      </div>
      <div class="text-center pl-2 border-l border-primary-fixed/20">
        <div class="text-label-sm text-primary-fixed-dim uppercase">Deficit</div>
        <div id="target-net-deficit" class="font-headline-lg font-bold text-secondary-container">--%</div>
      </div>
    </div>
  </div>
</div>

<!-- Recommended Courses & Programmes Grid -->
<section>
  <div class="flex items-center justify-between pb-space-sm mb-space-md">
    <div class="flex items-center gap-2">
      <span class="material-symbols-outlined text-secondary text-[24px]">verified</span>
      <h2 class="font-headline-md text-headline-md text-primary">Algorithmic Course Recommendations</h2>
    </div>
    <span id="results-count-badge" class="font-label-sm text-label-sm text-on-surface-variant">Awaiting Execution...</span>
  </div>

  <div id="recommendations-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-space-lg">
    <!-- Initial Loading Placeholder -->
    <div class="col-span-full p-space-xl bg-surface-container-lowest rounded-xl shadow-sm text-center">
      <div class="w-12 h-12 rounded-full border-4 border-primary border-t-secondary animate-spin mx-auto mb-space-sm"></div>
      <p class="font-headline-sm text-primary">Initializing Neural Proximity Engine...</p>
      <p class="font-body-sm text-on-surface-variant mt-1">Connecting to live `/SIH/api/recommendation-engine.php` endpoint.</p>
    </div>
  </div>
</section>

<script>
  const targetSkillId = <?= $requestedSkillId ?>;
  const currentUserId = <?= $userId ?>;

  async function runPipeline() {
    const steps = [
      document.getElementById('step-1'),
      document.getElementById('step-2'),
      document.getElementById('step-3'),
      document.getElementById('step-4')
    ];
    const statusBadge = document.getElementById('pipeline-status-badge');
    const container = document.getElementById('recommendations-container');

    statusBadge.textContent = 'Executing Sequence...';
    statusBadge.className = 'font-mono text-label-sm text-label-sm text-primary bg-primary-fixed px-2.5 py-0.5 rounded-full font-bold animate-pulse';

    // Step 1 animation
    setStepActive(steps[0]);
    await delay(350);
    setStepCompleted(steps[0]);

    // Step 2 animation
    setStepActive(steps[1]);
    await delay(350);
    setStepCompleted(steps[1]);

    // Step 3 animation
    setStepActive(steps[2]);

    // Actual live server-side AJAX query
    const url = `/SIH/api/recommendation-engine.php?user_id=${currentUserId}&skill_id=${targetSkillId}`;
    const data = await fetchJSON(url);

    await delay(300);
    setStepCompleted(steps[2]);

    // Step 4 animation
    setStepActive(steps[3]);
    await delay(300);
    setStepCompleted(steps[3]);

    statusBadge.textContent = 'Execution Complete (100% Convergence)';
    statusBadge.className = 'font-mono text-label-sm text-label-sm text-emerald-800 bg-emerald-100 px-2.5 py-0.5 rounded-full font-bold';

    if (data && data.success) {
      renderResults(data);
    } else {
      container.innerHTML = `
        <div class="col-span-full p-space-xl bg-surface-container-lowest rounded-xl shadow-sm text-center">
          <p class="text-error font-bold">Failed to load recommendations. Please check database connectivity.</p>
        </div>
      `;
    }
  }

  function setStepActive(el) {
    el.className = 'pipeline-step pipeline-active p-space-md rounded-xl transition-all border border-secondary';
    const icon = el.querySelector('.status-icon');
    if (icon) {
      icon.textContent = 'sync';
      icon.className = 'status-icon material-symbols-outlined text-[18px] text-secondary animate-spin';
    }
  }

  function setStepCompleted(el) {
    el.className = 'pipeline-step pipeline-completed bg-surface-container-lowest p-space-md rounded-xl transition-all border border-primary/20 shadow-sm';
    const icon = el.querySelector('.status-icon');
    if (icon) {
      icon.textContent = 'check_circle';
      icon.className = 'status-icon material-symbols-outlined text-[18px] text-emerald-700';
    }
  }

  function delay(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
  }

  function renderResults(data) {
    // Populate Gap Banner
    const gapBanner = document.getElementById('target-gap-banner');
    gapBanner.classList.remove('hidden');
    document.getElementById('target-domain-label').textContent = data.analyzed_gap.domain_name;
    document.getElementById('target-skill-title').textContent = data.analyzed_gap.skill_name;
    document.getElementById('target-current-score').textContent = data.analyzed_gap.current_score + '%';
    document.getElementById('target-benchmark-score').textContent = data.analyzed_gap.benchmark_score + '%';
    document.getElementById('target-net-deficit').textContent = '-' + data.analyzed_gap.net_deficit + '%';
    document.getElementById('target-priority-label').textContent = data.analyzed_gap.priority;
    document.getElementById('target-ideal-level').textContent = 'Level ' + data.analyzed_gap.ideal_level + ' (' + (data.analyzed_gap.ideal_level === 3 ? 'Deep Remediation' : 'Reinforcement') + ')';

    document.getElementById('results-count-badge').textContent = `Ranked ${data.recommendations.length} Candidates from ${data.total_candidates} Indexed Courses`;

    const container = document.getElementById('recommendations-container');
    if (!data.recommendations || data.recommendations.length === 0) {
      container.innerHTML = '<div class="col-span-full p-space-lg bg-surface-container-lowest rounded-xl text-center">No matching courses found.</div>';
      return;
    }

    container.innerHTML = data.recommendations.map(r => `
      <div class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between border-t-4 ${r.match_pct >= 85 ? 'border-secondary' : 'border-primary'}">
        <div>
          <div class="flex items-center justify-between mb-space-xs">
            <span class="px-2.5 py-1 rounded font-label-sm text-label-sm font-bold ${r.match_pct >= 85 ? 'bg-secondary text-on-secondary shadow-sm' : 'bg-surface-container text-primary'}">
              ${r.match_pct}% Match
            </span>
            <span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-semibold">
              ${r.source_label}
            </span>
          </div>

          <h3 class="font-headline-sm text-headline-sm text-primary mt-2 leading-snug">${escapeHtml(r.title)}</h3>
          <p class="font-body-sm text-body-sm text-on-surface-variant mt-2 line-clamp-3 leading-relaxed">
            ${escapeHtml(r.description || '')}
          </p>

          <div class="mt-space-md p-space-sm bg-surface-container-low rounded-lg text-body-sm space-y-1">
            <div class="flex justify-between text-on-surface-variant text-[12px]">
              <span>Domain Weight (50%):</span>
              <strong class="text-primary font-mono">${r.domain_weight} pts</strong>
            </div>
            <div class="flex justify-between text-on-surface-variant text-[12px]">
              <span>Difficulty Proximity (30%):</span>
              <strong class="text-primary font-mono">${r.diff_weight} pts</strong>
            </div>
            <div class="flex justify-between text-on-surface-variant text-[12px]">
              <span>Recency Index (20%):</span>
              <strong class="text-primary font-mono">${r.recency_weight} pts</strong>
            </div>
          </div>

          <div class="mt-space-sm text-[12px] text-secondary font-medium flex items-start gap-1">
            <span class="material-symbols-outlined text-[15px] shrink-0 mt-0.5">insights</span>
            <span>${escapeHtml(r.fit_reason)}</span>
          </div>
        </div>

        <div class="mt-space-lg pt-space-sm border-t border-surface-container flex items-center justify-between gap-2">
          <button type="button" onclick="nominateCourse(${r.id}, this)" class="flex-1 py-2 px-space-md rounded-lg bg-secondary text-on-secondary hover:bg-on-secondary-fixed-variant transition-colors font-label-md text-label-md flex items-center justify-center gap-1 shadow-sm">
            <span class="material-symbols-outlined text-[16px]">assignment_turned_in</span>
            <span>Nominate</span>
          </button>
          ${r.url ? `
            <a href="${escapeHtml(r.url)}" target="_blank" class="py-2 px-space-md rounded-lg bg-surface-container hover:bg-surface-container-high text-primary transition-colors font-label-md text-label-md flex items-center gap-1">
              <span class="material-symbols-outlined text-[16px]">open_in_new</span>
              <span>Details</span>
            </a>
          ` : ''}
        </div>
      </div>
    `).join('');
  }

  function escapeHtml(str) {
    if (!str) return '';
    return str.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
  }

  document.addEventListener('DOMContentLoaded', () => {
    runPipeline();
  });
</script>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
