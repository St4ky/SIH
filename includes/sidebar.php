<?php
// Expects: $currentPage (string)
$user = currentUser();
$userRole = $user ? $user['role'] : 'learner';
$isAdmin = ($userRole === 'admin');
?>
<!-- Left Navigation Sidebar -->
<aside id="app-sidebar" class="fixed left-0 top-0 h-full w-72 bg-primary-container text-on-primary z-50 flex flex-col justify-between shadow-[0_4px_20px_rgba(11,37,69,0.25)] -translate-x-full lg:translate-x-0 transition-transform duration-300 overflow-y-auto">
  <div class="flex flex-col">
    <!-- Top Sovereign Verification Ribbon -->
    <div class="px-space-md py-space-sm bg-primary flex items-center justify-between">
      <div class="flex items-center gap-space-xs">
        <span class="material-symbols-outlined text-secondary-container text-[20px]">verified</span>
        <span class="font-label-sm text-label-sm tracking-wide text-primary-fixed">GIGW 3.0 | iGOT Live</span>
      </div>
      <div class="flex items-center gap-1">
        <span class="w-2 h-2 rounded-full bg-secondary-container animate-pulse"></span>
        <!-- Close button on mobile -->
        <button type="button" class="lg:hidden ml-2 text-primary-fixed hover:text-on-primary" onclick="toggleSidebarDrawer()">
          <span class="material-symbols-outlined text-[18px]">close</span>
        </button>
      </div>
    </div>

    <!-- Officer Profile Identification Card -->
    <div class="p-space-md bg-tertiary-container">
      <div class="flex items-center gap-space-sm">
        <div class="w-11 h-11 rounded-full bg-primary flex items-center justify-center text-on-primary shrink-0 font-bold">
          <?= htmlspecialchars(substr($user['name'] ?? 'Dr', 0, 2)) ?>
        </div>
        <div class="min-w-0 flex-1">
          <div class="font-label-lg text-label-lg text-on-tertiary truncate"><?= htmlspecialchars($user['name'] ?? 'Dr. Rajesh Sharma, ISS') ?></div>
          <div class="font-body-sm text-body-sm text-on-tertiary-container truncate"><?= htmlspecialchars($user['designation'] ?? 'Joint Director, NAD (CSO)') ?></div>
        </div>
      </div>
      <div class="mt-space-sm pt-space-xs flex items-center justify-between text-label-sm font-label-sm">
        <span class="bg-secondary text-on-secondary px-2 py-0.5 rounded"><?= htmlspecialchars($user['cadre'] ?? 'ISS') ?> Cadre</span>
        <span class="text-primary-fixed truncate">ID: <?= htmlspecialchars($user['employee_id'] ?? 'ISS-2008-0412') ?></span>
      </div>
    </div>

    <!-- Main Navigation Menu -->
    <nav class="px-space-sm py-space-md space-y-1 flex flex-col" aria-label="Cadre Navigation">
      <?php
      $navItems = [
        ['id' => 'dashboard', 'label' => 'Learner Dashboard', 'icon' => 'space_dashboard', 'url' => BASE_URL . '/pages/dashboard.php'],
        ['id' => 'skill-gap', 'label' => 'Skill-Gap Analysis', 'icon' => 'monitoring', 'url' => BASE_URL . '/pages/skill-gap.php'],
        ['id' => 'competency-profile', 'label' => 'Competency Profile', 'icon' => 'badge', 'url' => BASE_URL . '/pages/competency-profile.php'],
        ['id' => 'learning-path', 'label' => 'My Learning Path', 'icon' => 'route', 'url' => BASE_URL . '/pages/learning-path.php'],
        ['id' => 'assessment-generator', 'label' => 'AI Assessment Generator', 'icon' => 'psychology', 'url' => BASE_URL . '/pages/assessment-generator.php'],
        ['id' => 'igot-courses', 'label' => 'iGOT Course Catalog', 'icon' => 'menu_book', 'url' => BASE_URL . '/pages/igot-courses.php'],
        ['id' => 'nssta-programmes', 'label' => 'NSSTA TPAC Roster', 'icon' => 'assignment_ind', 'url' => BASE_URL . '/pages/nssta-programmes.php'],
        ['id' => 'certifications', 'label' => 'My Certifications', 'icon' => 'workspace_premium', 'url' => BASE_URL . '/pages/certifications.php'],
        ['id' => 'cadre-analytics', 'label' => 'Cadre Analytics', 'icon' => 'analytics', 'url' => BASE_URL . '/pages/cadre-analytics.php'],
        ['id' => 'ai-assistant', 'label' => 'AI Cadre Copilot', 'icon' => 'smart_toy', 'url' => BASE_URL . '/pages/ai-assistant.php'],
      ];

      if ($isAdmin) {
        $navItems[] = ['id' => 'admin-dashboard', 'label' => 'Admin Workforce Hub', 'icon' => 'lan', 'url' => BASE_URL . '/pages/admin-dashboard.php'];
        $navItems[] = ['id' => 'emerging-skills', 'label' => 'Emerging Skill Forecast', 'icon' => 'trending_up', 'url' => BASE_URL . '/pages/emerging-skills.php'];
      }

      $navItems[] = ['id' => 'settings', 'label' => 'Settings & Profile', 'icon' => 'manage_accounts', 'url' => BASE_URL . '/pages/settings.php'];

      foreach ($navItems as $item):
        $isActive = ($currentPage === $item['id']);
        $activeClass = $isActive 
          ? 'bg-primary text-on-primary font-bold shadow-sm' 
          : 'text-primary-fixed hover:bg-primary/60 hover:text-on-primary font-label-md text-label-md';
      ?>
        <a href="<?= $item['url'] ?>" 
           class="flex items-center gap-space-sm px-space-md py-2.5 rounded-lg transition-colors <?= $activeClass ?>">
          <span class="material-symbols-outlined text-[20px] <?= $isActive ? 'text-secondary-container' : '' ?>"><?= $item['icon'] ?></span>
          <span class="truncate"><?= htmlspecialchars($item['label']) ?></span>
        </a>
      <?php endforeach; ?>
    </nav>
  </div>

  <!-- Bottom Sync Status & Sign Out -->
  <div class="p-space-md bg-tertiary text-on-tertiary shrink-0">
    <div class="text-label-sm font-label-sm text-tertiary-fixed-dim uppercase tracking-wider mb-space-xs">Sync Status</div>
    <div class="space-y-1 text-label-sm font-label-sm mb-space-md">
      <div class="flex items-center justify-between text-on-tertiary">
        <span>iGOT Karmayogi API</span>
        <span class="text-secondary-fixed">v2.4 Live</span>
      </div>
      <div class="flex items-center justify-between text-on-tertiary">
        <span>SPARROW / e-HRMS</span>
        <span class="text-secondary-fixed">Active</span>
      </div>
    </div>
    <div class="flex items-center justify-between pt-space-xs border-t border-primary-container/40">
      <a class="flex items-center gap-space-xs text-secondary-fixed hover:text-on-tertiary text-label-sm font-label-sm transition-colors" href="<?= BASE_URL ?>/logout.php">
        <span class="material-symbols-outlined text-[16px]">logout</span>
        <span>Sign Out</span>
      </a>
      <span class="text-tertiary-fixed-dim text-label-sm font-label-sm"><?= htmlspecialchars($user['cadre'] ?? 'MoSPI') ?></span>
    </div>
  </div>
</aside>

<!-- Content wrapper with left padding for desktop sidebar -->
<div id="main-content" class="lg:pl-72 transition-all duration-300">
  <main class="relative pt-16 w-full px-space-md sm:px-space-lg bg-surface min-h-[calc(100vh-64px)]">
    <div class="flex flex-col w-full pb-space-xl">
