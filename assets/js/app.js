// =======================================================
// Gap2Grow: Core Application Client-Side JS
// =======================================================

// 1. Sidebar Drawer Toggle for Tablet / Mobile
function toggleSidebarDrawer() {
  const sidebar = document.getElementById('app-sidebar');
  const overlay = document.getElementById('sidebar-overlay');
  if (!sidebar) return;

  const isOpen = sidebar.classList.contains('sidebar-open');
  if (isOpen) {
    sidebar.classList.remove('sidebar-open');
    if (overlay) overlay.classList.add('hidden');
    document.body.style.overflow = '';
  } else {
    sidebar.classList.add('sidebar-open');
    if (overlay) overlay.classList.remove('hidden');
    document.body.style.overflow = 'hidden';
  }
}

// 2. Sovereign Notification Toast
function showToast(message, type = 'success') {
  const existing = document.getElementById('gap2grow-toast');
  if (existing) existing.remove();

  const toast = document.createElement('div');
  toast.id = 'gap2grow-toast';
  const bgClass = type === 'success' ? 'bg-primary text-on-primary border-l-4 border-secondary' : 'bg-error text-on-error';
  toast.className = `fixed bottom-6 right-6 z-50 px-space-md py-3 rounded-xl shadow-xl flex items-center gap-space-sm font-label-md text-label-md transition-all duration-300 transform translate-y-4 opacity-0 ${bgClass}`;
  
  const icon = type === 'success' ? 'verified' : 'warning';
  toast.innerHTML = `
    <span class="material-symbols-outlined text-[20px] ${type === 'success' ? 'text-secondary-container' : 'text-on-error'}">${icon}</span>
    <span>${message}</span>
  `;

  document.body.appendChild(toast);
  requestAnimationFrame(() => {
    toast.classList.remove('translate-y-4', 'opacity-0');
  });

  setTimeout(() => {
    toast.classList.add('translate-y-4', 'opacity-0');
    setTimeout(() => toast.remove(), 300);
  }, 4000);
}

// 3. Robust Fetch Wrapper with JSON & Error Handling
async function fetchJSON(url, options = {}) {
  try {
    const res = await fetch(url, {
      ...options,
      headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json',
        ...(options.headers || {})
      }
    });
    if (!res.ok) {
      const errBody = await res.text();
      console.warn(`HTTP ${res.status} from ${url}:`, errBody);
      return null;
    }
    return await res.json();
  } catch (err) {
    console.error(`fetchJSON failed for ${url}:`, err);
    return null;
  }
}

// 4. Captcha Generator & Validation
function regenerateCaptcha() {
  const chars = '23456789ABCDEFGHJKLMNPQRSTUVWXYZ';
  let result = '';
  for (let i = 0; i < 5; i++) {
    result += chars.charAt(Math.floor(Math.random() * chars.length)) + ' ';
  }
  const display = document.getElementById('captcha-display');
  if (display) {
    display.innerText = result.trim();
  }
}

// 5. Password Field Visibility Toggle
function togglePasswordVisibility(fieldId, buttonElement) {
  const input = document.getElementById(fieldId);
  if (!input) return;
  const icon = buttonElement.querySelector('.material-symbols-outlined');
  if (input.type === 'password') {
    input.type = 'text';
    if (icon) icon.textContent = 'visibility_off';
  } else {
    input.type = 'password';
    if (icon) icon.textContent = 'visibility';
  }
}

// 6. Generic Star Rating Component
function setStarRating(containerId, rating) {
  const container = document.getElementById(containerId);
  if (!container) return;
  const stars = container.querySelectorAll('.star-btn');
  stars.forEach((btn, index) => {
    const icon = btn.querySelector('.material-symbols-outlined') || btn;
    if (index < rating) {
      icon.classList.remove('text-outline-variant');
      icon.classList.add('text-secondary');
    } else {
      icon.classList.remove('text-secondary');
      icon.classList.add('text-outline-variant');
    }
  });
  const input = container.querySelector('input[type="hidden"]');
  if (input) input.value = rating;
}

// 7. Course Nomination Action
async function nominateCourse(resourceId, btnElement) {
  if (!resourceId) return;
  if (btnElement) {
    btnElement.disabled = true;
    btnElement.innerHTML = `<span class="material-symbols-outlined animate-spin text-[16px]">sync</span> Submitting...`;
  }

  const res = await fetchJSON('/SIH/api/nominate.php', {
    method: 'POST',
    body: JSON.stringify({ resource_id: resourceId })
  });

  if (res && res.success) {
    showToast(res.message || 'Nomination submitted successfully!', 'success');
    if (btnElement) {
      btnElement.className = 'px-space-md py-2 bg-surface-container text-primary font-label-md text-label-md rounded-lg flex items-center justify-center gap-1 cursor-default';
      btnElement.innerHTML = `<span class="material-symbols-outlined text-[16px] text-secondary">check_circle</span> Nominated`;
    }
  } else {
    showToast(res ? res.message : 'Could not complete nomination', 'error');
    if (btnElement) {
      btnElement.disabled = false;
      btnElement.innerHTML = `<span class="material-symbols-outlined text-[16px]">assignment_turned_in</span> Nominate`;
    }
  }
}

// 8. Timed Assessment Engine
function initAssessmentTimer(seconds) {
  const timerDisplay = document.getElementById('live-timer');
  if (!timerDisplay) return;

  let remaining = seconds;
  const interval = setInterval(() => {
    if (remaining <= 0) {
      clearInterval(interval);
      timerDisplay.textContent = '00:00';
      showToast('Assessment time expired. Submitting answers...', 'error');
      const form = document.getElementById('assessment-quiz-form');
      if (form) form.submit();
      return;
    }

    const mins = Math.floor(remaining / 60);
    const secs = remaining % 60;
    timerDisplay.textContent = `${String(mins).padStart(2, '0')}:${String(secs).padStart(2, '0')}`;
    remaining--;
  }, 1000);
}

// Close drawer on Escape key or Resize
window.addEventListener('keydown', (e) => {
  if (e.key === 'Escape') {
    const sidebar = document.getElementById('app-sidebar');
    if (sidebar && sidebar.classList.contains('sidebar-open')) {
      toggleSidebarDrawer();
    }
  }
});
window.addEventListener('resize', () => {
  if (window.innerWidth >= 1024) {
    const sidebar = document.getElementById('app-sidebar');
    const overlay = document.getElementById('sidebar-overlay');
    if (sidebar) sidebar.classList.remove('sidebar-open');
    if (overlay) overlay.classList.add('hidden');
    document.body.style.overflow = '';
  }
});
