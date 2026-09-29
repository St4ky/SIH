<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/db.php';
require_once __DIR__ . '/includes/auth.php';

// Redirect if already logged in
if (isset($_SESSION['user_id'])) {
    if (isAdmin()) {
        header('Location: ' . BASE_URL . '/pages/admin-dashboard.php');
    } else {
        header('Location: ' . BASE_URL . '/pages/dashboard.php');
    }
    exit;
}

$errorMsg = '';
$prefillUser = 'rajesh.sharma@mospi.gov.in';

// Handle Login Submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $authType = $_POST['auth_type'] ?? 'parichay';
    
    if ($authType === 'parichay') {
        $email = trim($_POST['gov_id'] ?? '');
        $password = trim($_POST['password'] ?? '');

        if ($email === '' || $password === '') {
            $errorMsg = 'Please enter both your official Gov.in email / PPO and password.';
        } else {
            $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ? LIMIT 1');
            $stmt->execute([$email]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password_hash'])) {
                $_SESSION['user_id']     = $user['id'];
                $_SESSION['name']        = $user['name'];
                $_SESSION['employee_id'] = $user['employee_id'];
                $_SESSION['cadre']       = $user['cadre'];
                $_SESSION['designation'] = $user['designation'];
                $_SESSION['posting']     = $user['posting'];
                $_SESSION['email']       = $user['email'];
                $_SESSION['role']        = $user['role'];

                if ($user['role'] === 'admin') {
                    header('Location: ' . BASE_URL . '/pages/admin-dashboard.php');
                } else {
                    header('Location: ' . BASE_URL . '/pages/dashboard.php');
                }
                exit;
            } else {
                $errorMsg = 'Invalid Parichay credentials. Please check your official email and password.';
            }
        }
    } elseif ($authType === 'ehrms') {
        $empCode = trim($_POST['ehrms_emp_code'] ?? '');
        $stmt = $pdo->prepare('SELECT * FROM users WHERE employee_id = ? OR email LIKE ? LIMIT 1');
        $stmt->execute([$empCode, '%' . $empCode . '%']);
        $user = $stmt->fetch();

        if ($user) {
            $_SESSION['user_id']     = $user['id'];
            $_SESSION['name']        = $user['name'];
            $_SESSION['employee_id'] = $user['employee_id'];
            $_SESSION['cadre']       = $user['cadre'];
            $_SESSION['designation'] = $user['designation'];
            $_SESSION['posting']     = $user['posting'];
            $_SESSION['email']       = $user['email'];
            $_SESSION['role']        = $user['role'];

            if ($user['role'] === 'admin') {
                header('Location: ' . BASE_URL . '/pages/admin-dashboard.php');
            } else {
                header('Location: ' . BASE_URL . '/pages/dashboard.php');
            }
            exit;
        } else {
            $errorMsg = 'e-HRMS Employee Code not found in active roster.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en"><head><meta charset="utf-8"/><meta content="width=device-width, initial-scale=1.0" name="viewport"/><meta content="web_standard" name="shell-type"/><title>Official Cadre Authentication — Gap2Grow (MoSPI / NSSTA)</title><link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/><link href="https://fonts.googleapis.com" rel="preconnect"/><link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/><link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/><style>@layer base{html,body{margin:0;padding:0;}body{overscroll-behavior:none;}main>:first-child{margin-top:0!important;}main>:last-child{margin-bottom:0!important;}}::-webkit-scrollbar{display:none;}</style><script src="https://cdn.tailwindcss.com"></script><script id="tailwind-config">tailwind.config={darkMode:"class",theme:{extend:{"colors":{"surface-container-lowest":"#ffffff","surface":"#f8f9ff","primary-fixed":"#d5e3ff","secondary-container":"#fc6018","surface-tint":"#495f82","on-background":"#0d1c2f","on-tertiary-fixed":"#00164e","error":"#ba1a1a","on-surface":"#0d1c2f","tertiary-fixed":"#dce1ff","surface-container-highest":"#d5e3fd","on-tertiary":"#ffffff","tertiary-container":"#001e63","on-tertiary-container":"#7088dc","primary":"#001026","surface-container":"#e6eeff","on-surface-variant":"#44474e","background":"#f8f9ff","on-secondary-fixed-variant":"#802a00","on-primary":"#ffffff","tertiary-fixed-dim":"#b6c4ff","secondary":"#a83900","inverse-on-surface":"#ebf1ff","tertiary":"#000c34","on-primary-container":"#778db2","primary-container":"#0b2545","surface-dim":"#ccdbf4","on-primary-fixed":"#001c3b","on-secondary-fixed":"#380d00","inverse-primary":"#b1c7f0","error-container":"#ffdad6","on-error-container":"#93000a","inverse-surface":"#233144","on-tertiary-fixed-variant":"#264191","secondary-fixed":"#ffdbcf","outline":"#74777f","on-primary-fixed-variant":"#314769","on-error":"#ffffff","surface-container-low":"#eff4ff","secondary-fixed-dim":"#ffb59a","surface-variant":"#d5e3fd","on-secondary-container":"#531800","on-secondary":"#ffffff","surface-container-high":"#dde9ff","outline-variant":"#c4c6cf","surface-bright":"#f8f9ff","primary-fixed-dim":"#b1c7f0"},"borderRadius":{"DEFAULT":"0.125rem","lg":"0.25rem","xl":"0.5rem","full":"0.75rem"},"spacing":{"gutter-mobile":"0.75rem","margin-mobile":"1rem","space-lg":"1.5rem","space-sm":"0.5rem","gutter":"1.5rem","space-md":"1rem","space-xs":"0.25rem","margin":"2rem","space-xl":"2.5rem"},"fontFamily":{"label-lg":["Public Sans"],"label-md":["Public Sans"],"body-lg":["Public Sans"],"body-md":["Public Sans"],"headline-lg":["Public Sans"],"headline-xl":["Public Sans"],"headline-lg-mobile":["Public Sans"],"label-sm":["Public Sans"],"headline-md":["Public Sans"],"body-sm":["Public Sans"],"headline-sm":["Public Sans"],"headline-xl-mobile":["Public Sans"]},"fontSize":{"label-lg":["14px",{"lineHeight":"20px","letterSpacing":"0.01em","fontWeight":"600"}],"label-md":["12px",{"lineHeight":"16px","letterSpacing":"0.02em","fontWeight":"600"}],"body-lg":["16px",{"lineHeight":"24px","fontWeight":"400"}],"body-md":["14px",{"lineHeight":"20px","fontWeight":"400"}],"headline-lg":["28px",{"lineHeight":"36px","letterSpacing":"-0.01em","fontWeight":"700"}],"headline-xl":["36px",{"lineHeight":"44px","letterSpacing":"-0.02em","fontWeight":"700"}],"headline-lg-mobile":["22px",{"lineHeight":"30px","letterSpacing":"0em","fontWeight":"700"}],"label-sm":["11px",{"lineHeight":"14px","letterSpacing":"0.03em","fontWeight":"600"}],"headline-md":["22px",{"lineHeight":"28px","fontWeight":"600"}],"body-sm":["12px",{"lineHeight":"18px","fontWeight":"400"}],"headline-sm":["18px",{"lineHeight":"24px","fontWeight":"600"}],"headline-xl-mobile":["28px",{"lineHeight":"36px","letterSpacing":"-0.01em","fontWeight":"700"}]}}}}</script></head><body class="bg-surface font-body-md text-body-md text-on-surface antialiased"><header class="fixed top-0 w-full z-50"><div class="bg-primary-container text-on-primary text-label-sm font-label-sm"><div class="max-w-7xl mx-auto px-gutter flex items-center justify-between h-8"><span>भारत सरकार | Government of India | सांख्यिकी और कार्यक्रम कार्यान्वयन मंत्रालय (MoSPI)</span><div class="flex items-center gap-space-md"><div class="flex items-center gap-space-xs"><button class="px-1 hover:text-secondary-fixed transition-colors" type="button">A-</button><button class="px-1 hover:text-secondary-fixed transition-colors" type="button">A</button><button class="px-1 hover:text-secondary-fixed transition-colors" type="button">A+</button></div><span class="text-outline">|</span><button class="hover:text-secondary-fixed transition-colors" type="button">हिन्दी</button></div></div></div><div class="max-w-7xl mx-auto px-gutter pt-space-xs"><div class="bg-surface-container-lowest/95 backdrop-blur-md shadow-[0_10px_30px_rgba(11,37,69,0.08)] rounded-[2rem] px-space-lg py-space-sm flex items-center justify-between"><div class="flex items-center gap-space-md"><div class="w-10 h-10 rounded-full bg-primary-container flex items-center justify-center text-on-primary font-headline-sm text-headline-sm">G</div><div><div class="font-headline-sm text-headline-sm text-primary tracking-tight leading-tight">Gap2Grow</div><div class="font-label-sm text-label-sm text-on-surface-variant">MoSPI • NSSTA Cadre Intelligence</div></div></div><nav class="hidden lg:flex items-center gap-space-xs bg-surface-container-low/60 p-1.5 rounded-full" data-active-classes="bg-surface-container text-primary font-label-md rounded-full"><a class="px-space-md py-1.5 text-on-surface-variant hover:text-on-surface font-label-md text-label-md transition-colors" data-path="home" href="<?= BASE_URL ?>/pages/portal.php">Home</a><a class="px-space-md py-1.5 text-on-surface-variant hover:text-on-surface font-label-md text-label-md transition-colors" data-path="about-platform" href="<?= BASE_URL ?>/pages/about.php">About Platform</a><a class="px-space-md py-1.5 text-on-surface-variant hover:text-on-surface font-label-md text-label-md transition-colors" data-path="competency-framework" href="<?= BASE_URL ?>/pages/competency-framework.php">Competency Framework</a><a class="px-space-md py-1.5 text-on-surface-variant hover:text-on-surface font-label-md text-label-md transition-colors" data-path="igot-ecosystem" href="<?= BASE_URL ?>/pages/igot-ecosystem.php">iGOT Ecosystem</a><a class="px-space-md py-1.5 text-on-surface-variant hover:text-on-surface font-label-md text-label-md transition-colors" data-path="nssta-tpac" href="<?= BASE_URL ?>/pages/nssta-tpac.php">NSSTA TPAC</a><a class="px-space-md py-1.5 text-on-surface-variant hover:text-on-surface font-label-md text-label-md transition-colors" data-path="helpdesk" href="<?= BASE_URL ?>/pages/helpdesk.php">Helpdesk</a></nav><div class="flex items-center gap-space-sm"><a class="hidden md:inline-flex items-center px-space-md py-2 text-primary font-label-md text-label-md hover:text-secondary transition-colors" data-path="competency-framework" href="<?= BASE_URL ?>/pages/competency-framework.php">Explore Framework</a><a class="inline-flex items-center gap-space-xs bg-secondary hover:bg-on-secondary-fixed-variant text-on-secondary font-label-md text-label-md px-space-lg py-2 rounded-full transition-all shadow-[0_4px_12px_rgba(168,57,0,0.25)]" data-path="login-parichay" href="<?= BASE_URL ?>/index.php"><span class="material-symbols-outlined text-[16px]">fingerprint</span><span>Parichay / e-HRMS</span></a><button type="button" class="lg:hidden p-2 text-primary hover:text-secondary" onclick="document.getElementById('mobile-index-nav').classList.toggle('hidden')"><span class="material-symbols-outlined text-[24px]">menu</span></button><div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center"><span class="material-symbols-outlined text-on-primary text-[18px]">person</span></div></div></div></div><div id="mobile-index-nav" class="hidden lg:hidden max-w-7xl mx-auto px-gutter pt-2"><div class="bg-surface-container-lowest shadow-xl rounded-2xl p-4 flex flex-col gap-2 border border-surface-container"><a class="px-4 py-2 rounded-lg font-label-md text-label-md text-on-surface hover:bg-surface-container" href="<?= BASE_URL ?>/pages/portal.php">Home</a><a class="px-4 py-2 rounded-lg font-label-md text-label-md text-on-surface hover:bg-surface-container" href="<?= BASE_URL ?>/pages/about.php">About Platform</a><a class="px-4 py-2 rounded-lg font-label-md text-label-md text-on-surface hover:bg-surface-container" href="<?= BASE_URL ?>/pages/competency-framework.php">Competency Framework</a><a class="px-4 py-2 rounded-lg font-label-md text-label-md text-on-surface hover:bg-surface-container" href="<?= BASE_URL ?>/pages/igot-ecosystem.php">iGOT Ecosystem</a><a class="px-4 py-2 rounded-lg font-label-md text-label-md text-on-surface hover:bg-surface-container" href="<?= BASE_URL ?>/pages/nssta-tpac.php">NSSTA TPAC</a><a class="px-4 py-2 rounded-lg font-label-md text-label-md text-on-surface hover:bg-surface-container" href="<?= BASE_URL ?>/pages/helpdesk.php">Helpdesk &amp; Support</a></div></div></header><main class="w-full pt-28 bg-surface"><div class="flex flex-col w-full">
<div class="relative w-full overflow-hidden bg-gradient-to-b from-surface via-surface-container-low to-surface py-space-xl">
<div class="absolute -top-32 -left-20 w-96 h-96 rounded-full bg-primary-fixed/20 blur-3xl pointer-events-none"></div>
<div class="absolute top-1/2 -right-28 w-[28rem] h-[28rem] rounded-full bg-secondary-fixed/15 blur-3xl pointer-events-none"></div>
<div class="max-w-7xl mx-auto px-gutter relative z-10">
<!-- Top Sovereign Credibility Strip -->
<div class="flex flex-wrap items-center justify-between gap-space-md mb-space-lg pb-space-sm">
<div class="flex items-center gap-space-sm">
<span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-primary-container text-on-primary font-headline-sm text-headline-sm shadow-sm">
<span class="material-symbols-outlined text-[18px]">verified_user</span>
</span>
<div>
<span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary font-bold block">National Centralized Gateway</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">SSO Authenticator v4.2.9 • Integrated with Jan Parichay &amp; Manav Sampada</span>
</div>
</div>
<div class="flex items-center gap-space-xs bg-surface-container-highest/60 px-space-md py-1.5 rounded-full shadow-sm">
<span class="w-2 h-2 rounded-full bg-emerald-600 animate-pulse"></span>
<span class="font-label-sm text-label-sm text-on-surface font-semibold">NIC SSO Server: Operational (99.98% SLA)</span>
</div>
</div>

<!-- Main Portal Grid: Split Architecture -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-space-xl items-start">
<!-- Left 7 Columns: The Secure Login Console -->
<div class="lg:col-span-7 flex flex-col gap-space-md">
<div class="bg-surface-container-lowest rounded-xl shadow-xl p-space-lg lg:p-space-xl relative overflow-hidden">
<!-- Subtle Tiranga Color Bar on Card Edge -->
<div class="absolute top-0 left-0 right-0 h-1.5 bg-gradient-to-r from-secondary via-surface-container-lowest to-emerald-700"></div>
<!-- Header of authentication card -->
<div class="mb-space-lg pt-space-xs">
<div class="inline-flex items-center gap-space-xs bg-surface-container px-space-sm py-1 rounded-full text-primary font-label-sm text-label-sm mb-space-xs">
<span class="material-symbols-outlined text-[16px] text-secondary">security</span>
<span>MoSPI • NSSTA Sovereign Single Sign-On</span>
</div>
<h1 class="font-headline-lg text-headline-lg text-primary tracking-tight">Official Cadre Authentication</h1>
<p class="font-body-md text-body-md text-on-surface-variant mt-1">
  Sovereign Capability &amp; Skill Intelligence Platform for ISS, SSS &amp; State DES Cadres
</p>
</div>

<!-- Demo Quick-Fill Bar for Seamless Evaluation -->
<div class="mb-space-md p-space-sm bg-surface-container-low rounded-lg border border-primary-fixed/40 flex flex-wrap items-center justify-between gap-2">
  <div class="flex items-center gap-1.5 text-label-sm font-label-sm text-primary">
    <span class="material-symbols-outlined text-secondary text-[18px]">bolt</span>
    <span class="font-semibold">Quick Demo Login:</span>
  </div>
  <div class="flex items-center gap-2">
    <button type="button" onclick="fillCredentials('rajesh.sharma@mospi.gov.in', 'Demo@1234', 'learner')" class="px-2.5 py-1 bg-surface-container-lowest hover:bg-surface-container-high rounded text-label-sm font-label-sm text-primary font-semibold shadow-sm transition-all border border-outline-variant/30 flex items-center gap-1">
      <span class="w-2 h-2 rounded-full bg-secondary"></span> Dr. Rajesh Sharma (ISS)
    </button>
    <button type="button" onclick="fillCredentials('admin@nssta.gov.in', 'Admin@1234', 'admin')" class="px-2.5 py-1 bg-primary text-on-primary hover:bg-primary-container rounded text-label-sm font-label-sm font-semibold shadow-sm transition-all flex items-center gap-1">
      <span class="w-2 h-2 rounded-full bg-emerald-400"></span> NSSTA Admin
    </button>
  </div>
</div>

<?php if ($errorMsg): ?>
<div class="mb-space-md p-space-sm bg-error-container text-on-error-container rounded-lg flex items-center gap-space-xs text-body-sm font-body-sm">
  <span class="material-symbols-outlined text-error text-[20px]">error</span>
  <span><?= htmlspecialchars($errorMsg) ?></span>
</div>
<?php endif; ?>

<!-- Tab Switchers -->
<div class="grid grid-cols-2 bg-surface-container-low p-1.5 rounded-lg mb-space-lg" id="authTabs" role="tablist">
<button aria-selected="true" class="flex items-center justify-center gap-space-xs py-2.5 px-space-sm rounded-md font-label-md text-label-md transition-all duration-200 bg-surface-container-lowest text-primary shadow-sm font-semibold" id="tab-parichay-btn" onclick="switchAuthTab('parichay')" role="tab" type="button">
<span class="material-symbols-outlined text-[18px] text-secondary">domain</span>
<span>Parichay / Jan Parichay SSO</span>
</button>
<button aria-selected="false" class="flex items-center justify-center gap-space-xs py-2.5 px-space-sm rounded-md font-label-md text-label-md transition-all duration-200 text-on-surface-variant hover:text-primary" id="tab-ehrms-btn" onclick="switchAuthTab('ehrms')" role="tab" type="button">
<span class="material-symbols-outlined text-[18px]">badge</span>
<span>e-HRMS / Official Cadre ID</span>
</button>
</div>

<!-- Pane 1: Parichay SSO -->
<div class="space-y-space-md" id="pane-parichay">
<div class="bg-surface-container-low rounded-lg p-space-md flex items-start gap-space-sm">
<span class="material-symbols-outlined text-secondary text-[20px] mt-0.5">info</span>
<p class="font-body-sm text-body-sm text-on-surface-variant">
  Authorized access for active officers of the <strong class="text-on-surface">Indian Statistical Service (ISS)</strong>, <strong class="text-on-surface">Subordinate Statistical Service (SSS)</strong>, and accredited Ministry analysts.
</p>
</div>

<form class="space-y-space-md" method="POST" action="">
<input type="hidden" name="auth_type" value="parichay"/>
<!-- Username / Email Field -->
<div>
<label class="block font-label-sm text-label-sm text-primary mb-1.5" for="login-gov-id">
  Gov.in / Nic.in Email, PPO No., or Cadre Code <span class="text-secondary">*</span>
</label>
<div class="relative">
<div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-outline">
<span class="material-symbols-outlined text-[20px]">alternate_email</span>
</div>
<input class="w-full bg-surface-container-low text-on-surface rounded-lg pl-10 pr-24 py-3 font-body-md text-body-md focus:bg-surface-container-lowest focus:outline-none focus:ring-2 focus:ring-secondary transition-all shadow-inner" id="login-gov-id" name="gov_id" placeholder="name@gov.in or 8-digit PPO" type="text" value="<?= htmlspecialchars($_POST['gov_id'] ?? 'rajesh.sharma@mospi.gov.in') ?>" required/>
<div class="absolute inset-y-0 right-0 pr-3 flex items-center">
<span class="font-label-sm text-label-sm bg-surface-container px-2 py-1 rounded text-primary-container font-semibold tracking-wide">NIC.IN</span>
</div>
</div>
</div>
<!-- Password Field -->
<div>
<div class="flex items-center justify-between mb-1.5">
<label class="font-label-sm text-label-sm text-primary" for="login-password">
  Parichay Central Password <span class="text-secondary">*</span>
</label>
<a class="font-label-sm text-label-sm text-secondary hover:text-on-secondary-fixed-variant transition-colors" href="#">Forgot Parichay Credential?</a>
</div>
<div class="relative">
<div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-outline">
<span class="material-symbols-outlined text-[20px]">key</span>
</div>
<input class="w-full bg-surface-container-low text-on-surface rounded-lg pl-10 pr-12 py-3 font-body-md text-body-md focus:bg-surface-container-lowest focus:outline-none focus:ring-2 focus:ring-secondary transition-all shadow-inner" id="login-password" name="password" type="password" value="Demo@1234" required/>
<button class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-outline hover:text-primary transition-colors" onclick="togglePasswordVisibility('login-password', this)" type="button">
<span class="material-symbols-outlined text-[20px]">visibility</span>
</button>
</div>
</div>
<!-- Captcha Security Row -->
<div class="bg-surface-container-low p-space-md rounded-lg space-y-space-xs">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm text-on-surface-variant font-semibold">Security Verification (Anti-Bot)</span>
<span class="font-label-sm text-label-sm text-primary flex items-center gap-1">
<span class="material-symbols-outlined text-[14px] text-emerald-700">lock</span> Case Sensitive
</span>
</div>
<div class="grid grid-cols-1 sm:grid-cols-12 gap-space-sm items-center">
<div class="sm:col-span-6 bg-surface-container-lowest p-2.5 rounded-lg flex items-center justify-between shadow-sm select-none">
<div class="font-mono text-headline-sm font-bold tracking-widest text-primary italic pl-2" id="captcha-display" style="text-shadow: 1px 1px 2px rgba(11,37,69,0.25);">
  8 N 4 K 7
</div>
<div class="flex items-center gap-1">
<button class="p-1.5 text-on-surface-variant hover:text-primary hover:bg-surface-container rounded transition-colors" title="Audio Captcha" type="button">
<span class="material-symbols-outlined text-[18px]">volume_up</span>
</button>
<button class="p-1.5 text-on-surface-variant hover:text-secondary hover:bg-surface-container rounded transition-colors" onclick="regenerateCaptcha()" title="Reload Captcha" type="button">
<span class="material-symbols-outlined text-[18px]">cached</span>
</button>
</div>
</div>
<div class="sm:col-span-6">
<input class="w-full bg-surface-container-lowest text-on-surface rounded-lg px-3.5 py-2.5 font-body-md text-body-md focus:outline-none focus:ring-2 focus:ring-secondary transition-all shadow-inner uppercase tracking-wider" id="captcha-input" placeholder="Type letters above" type="text" value="8N4K7"/>
</div>
</div>
</div>
<!-- Login CTA Buttons -->
<div class="space-y-space-sm pt-space-xs">
<button class="w-full bg-secondary hover:bg-on-secondary-fixed-variant text-on-secondary font-label-lg text-label-lg py-3.5 px-space-md rounded-lg flex items-center justify-center gap-space-sm transition-all shadow-md shadow-secondary/20 active:scale-[0.99]" type="submit">
<span class="material-symbols-outlined text-[20px]">login</span>
<span>Login via Parichay Single Sign-On</span>
</button>
<div class="relative flex py-1 items-center">
<div class="flex-grow bg-outline-variant/50 h-[1px]"></div>
<span class="flex-shrink mx-4 font-label-sm text-label-sm text-outline uppercase tracking-wider">or sign in with hardware token</span>
<div class="flex-grow bg-outline-variant/50 h-[1px]"></div>
</div>
<button class="w-full bg-surface-container-low hover:bg-surface-container text-primary font-label-md text-label-md py-3 px-space-md rounded-lg flex items-center justify-center gap-space-sm transition-colors shadow-sm" type="button" onclick="fillCredentials('rajesh.sharma@mospi.gov.in', 'Demo@1234', 'learner'); document.forms[0].submit();">
<span class="material-symbols-outlined text-[20px] text-primary-container">usb</span>
<span>Sign in with Digital Signature Certificate (DSC) / e-Mudhra Token</span>
</button>
</div>
</form>
</div>

<!-- Pane 2: e-HRMS / Official Cadre ID (Initially Hidden via JS) -->
<div class="hidden space-y-space-md" id="pane-ehrms">
<div class="bg-surface-container-low rounded-lg p-space-md flex items-start gap-space-sm">
<span class="material-symbols-outlined text-secondary text-[20px] mt-0.5">verified</span>
<p class="font-body-sm text-body-sm text-on-surface-variant">
  Manav Sampada / e-HRMS 2.0 gateway for Field Operations Division (FOD), Regional Offices, and Data Processing Centers.
</p>
</div>
<form class="space-y-space-md" method="POST" action="">
<input type="hidden" name="auth_type" value="ehrms"/>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-space-sm">
<div>
<label class="block font-label-sm text-label-sm text-primary mb-1.5" for="cadre-stream">
  Cadre Stream <span class="text-secondary">*</span>
</label>
<select class="w-full bg-surface-container-low text-on-surface rounded-lg px-3.5 py-3 font-body-md text-body-md focus:bg-surface-container-lowest focus:outline-none focus:ring-2 focus:ring-secondary transition-all" id="cadre-stream">
<option>Indian Statistical Service (ISS)</option>
<option>Subordinate Statistical Service (SSS)</option>
<option>State Directorate of Economics &amp; Stats (DES)</option>
<option>Field Survey Staff (JSO / SSO)</option>
<option>NSSTA Faculty &amp; TPAC Auditor</option>
</select>
</div>
<div>
<label class="block font-label-sm text-label-sm text-primary mb-1.5" for="ehrms-emp-code">
  e-HRMS Employee Code <span class="text-secondary">*</span>
</label>
<input class="w-full bg-surface-container-low text-on-surface rounded-lg px-3.5 py-3 font-body-md text-body-md focus:bg-surface-container-lowest focus:outline-none focus:ring-2 focus:ring-secondary transition-all" id="ehrms-emp-code" name="ehrms_emp_code" placeholder="e.g. ISS-2008-0412" type="text" value="ISS-2008-0412" required/>
</div>
</div>
<div>
<label class="block font-label-sm text-label-sm text-primary mb-1.5" for="ehrms-mobile">
  Registered Aadhaar-Linked Mobile No. <span class="text-secondary">*</span>
</label>
<div class="relative">
<div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-outline">
<span class="material-symbols-outlined text-[20px]">smartphone</span>
</div>
<input class="w-full bg-surface-container-low text-on-surface rounded-lg pl-10 pr-28 py-3 font-body-md text-body-md focus:bg-surface-container-lowest focus:outline-none focus:ring-2 focus:ring-secondary transition-all" id="ehrms-mobile" placeholder="+91 98XXXXXXXX" type="tel" value="+91 98110 49281"/>
<button class="absolute inset-y-1.5 right-1.5 px-3 bg-primary text-on-primary rounded font-label-sm text-label-sm hover:bg-primary-container transition-colors" type="button" onclick="alert('OTP sent to registered Aadhaar mobile: 492810')">
  Send OTP
</button>
</div>
</div>
<div>
<label class="block font-label-sm text-label-sm text-primary mb-1.5" for="ehrms-otp">
  6-Digit Verification Code (OTP) <span class="text-secondary">*</span>
</label>
<input class="w-full text-center tracking-widest font-mono text-headline-sm bg-surface-container-low text-on-surface rounded-lg py-2.5 focus:bg-surface-container-lowest focus:outline-none focus:ring-2 focus:ring-secondary transition-all" id="ehrms-otp" maxlength="6" placeholder="• • • • • •" type="text" value="492810"/>
</div>
<button class="w-full bg-primary hover:bg-primary-container text-on-primary font-label-lg text-label-lg py-3.5 px-space-md rounded-lg flex items-center justify-center gap-space-sm transition-all shadow-md active:scale-[0.99]" type="submit">
<span class="material-symbols-outlined text-[20px]">how_to_reg</span>
<span>Validate &amp; Enter Cadre Workspace</span>
</button>
</form>
</div>

<!-- Footer of card: help & security confirmation -->
<div class="mt-space-lg pt-space-md border-t border-outline-variant/30 flex flex-col sm:flex-row items-center justify-between gap-space-sm text-on-surface-variant font-body-sm text-body-sm">
<span class="flex items-center gap-1">
<span class="material-symbols-outlined text-[16px] text-emerald-700">lock</span>
  256-Bit TLS End-to-End Encrypted Tunnel
</span>
<a class="text-primary hover:text-secondary font-label-sm text-label-sm transition-colors flex items-center gap-1" href="#helpdesk-section">
<span class="material-symbols-outlined text-[14px]">contact_support</span> First-Time Officer Activation?
</a>
</div>
</div>

<!-- Bottom Trust & Compliance Ribbon -->
<div class="grid grid-cols-2 sm:grid-cols-4 gap-space-sm">
<div class="bg-surface-container-lowest p-space-sm rounded-lg shadow-sm flex items-center gap-space-xs">
<span class="material-symbols-outlined text-secondary text-[22px]">policy</span>
<div>
<div class="font-label-sm text-label-sm text-primary font-bold">GIGW 3.0</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">Level-IV Standard</div>
</div>
</div>
<div class="bg-surface-container-lowest p-space-sm rounded-lg shadow-sm flex items-center gap-space-xs">
<span class="material-symbols-outlined text-secondary text-[22px]">pin</span>
<div>
<div class="font-label-sm text-label-sm text-primary font-bold">NIC 2FA</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">Sandes Token Sync</div>
</div>
</div>
<div class="bg-surface-container-lowest p-space-sm rounded-lg shadow-sm flex items-center gap-space-xs">
<span class="material-symbols-outlined text-secondary text-[22px]">encrypted</span>
<div>
<div class="font-label-sm text-label-sm text-primary font-bold">AES-256</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">FIPS 140-3 Valid</div>
</div>
</div>
<div class="bg-surface-container-lowest p-space-sm rounded-lg shadow-sm flex items-center gap-space-xs">
<span class="material-symbols-outlined text-secondary text-[22px]">workspace_premium</span>
<div>
<div class="font-label-sm text-label-sm text-primary font-bold">ISO 27001</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">STQC Certified</div>
</div>
</div>
</div>
</div>

<!-- Right 5 Columns: Cadre Advisories, NSSTA Notice Board, & Desk Support -->
<div class="lg:col-span-5 flex flex-col gap-space-md">
<!-- Urgent Advisory Card -->
<div class="bg-primary text-on-primary rounded-xl p-space-lg shadow-xl relative overflow-hidden">
<div class="absolute -right-10 -bottom-10 w-44 h-44 bg-surface-tint/10 rounded-full blur-2xl"></div>
<div class="flex items-center justify-between mb-space-sm">
<div class="inline-flex items-center gap-1.5 bg-secondary px-2.5 py-1 rounded-full text-on-secondary font-label-sm text-label-sm font-bold tracking-wide uppercase">
<span class="material-symbols-outlined text-[14px]">campaign</span> Cadre Advisory
</div>
<span class="font-label-sm text-label-sm text-primary-fixed-dim">Ref: NSSTA/TPAC/2025/C-80</span>
</div>
<h2 class="font-headline-sm text-headline-sm text-on-primary mb-space-xs">Mandatory Assessment for 80th NSS Cycle Cadres</h2>
<p class="font-body-sm text-body-sm text-primary-fixed-dim leading-relaxed mb-space-md">
  In accordance with MoSPI OM No. 12015/02/2025-ISS, all officers designated for the upcoming 80th National Sample Survey (Socio-Economic &amp; Services Sector) must complete their <em>Digital Data Quality Assurance (DDQA)</em> baseline assessment by the 30th of this month.
</p>
<!-- Mini Progress / Statistics Widget -->
<div class="bg-primary-container/80 backdrop-blur rounded-lg p-space-sm space-y-space-xs mb-space-md">
<div class="flex justify-between font-label-sm text-label-sm text-primary-fixed">
<span>All-India Officer Readiness Index</span>
<span class="font-bold">78.4% Compliant</span>
</div>
<div class="w-full bg-surface-dim/30 h-2 rounded-full overflow-hidden">
<div class="bg-secondary h-full rounded-full" style="width: 78.4%"></div>
</div>
<div class="flex items-center justify-between text-body-sm font-body-sm text-primary-fixed-dim pt-1">
<span>Assessed: 3,420 Officers</span>
<span>Pending: 940 Officers</span>
</div>
</div>
<div class="space-y-space-xs">
<div class="flex items-start gap-space-xs font-body-sm text-body-sm text-primary-fixed-dim">
<span class="material-symbols-outlined text-[18px] text-secondary-fixed shrink-0">check_circle</span>
<span>Completion credits automatically transfer to iGOT Karmayogi transcript.</span>
</div>
<div class="flex items-start gap-space-xs font-body-sm text-body-sm text-primary-fixed-dim">
<span class="material-symbols-outlined text-[18px] text-secondary-fixed shrink-0">check_circle</span>
<span>APAR Score alignment linked with TPAC Cadre Competency Matrix.</span>
</div>
</div>
</div>
<!-- Quick Guidelines for First-Time Logging In -->
<div class="bg-surface-container-lowest rounded-xl p-space-lg shadow-md space-y-space-md">
<div class="flex items-center gap-space-sm">
<span class="material-symbols-outlined text-secondary text-[24px]">menu_book</span>
<h3 class="font-headline-sm text-headline-sm text-primary">First Time User Protocols</h3>
</div>
<ol class="space-y-space-sm font-body-sm text-body-sm text-on-surface-variant">
<li class="flex items-start gap-space-sm">
<span class="flex-shrink-0 w-6 h-6 rounded-full bg-surface-container font-label-sm text-label-sm text-primary font-bold flex items-center justify-center">1</span>
<div>
<strong class="text-on-surface font-semibold">Parichay Pre-registration:</strong> Ensure your official email has active SSO rights assigned by your Head of Department (HOD) or Regional Joint Director.
</div>
</li>
<li class="flex items-start gap-space-sm">
<span class="flex-shrink-0 w-6 h-6 rounded-full bg-surface-container font-label-sm text-label-sm text-primary font-bold flex items-center justify-center">2</span>
<div>
<strong class="text-on-surface font-semibold">Karmayogi ID Binding:</strong> Upon initial login, confirm your 12-digit Karmayogi UUID to synchronize previous certificates.
</div>
</li>
<li class="flex items-start gap-space-sm">
<span class="flex-shrink-0 w-6 h-6 rounded-full bg-surface-container font-label-sm text-label-sm text-primary font-bold flex items-center justify-center">3</span>
<div>
<strong class="text-on-surface font-semibold">Hardware DSC Users:</strong> Install NIC DSC Signer v2.8+ plugin prior to digital certificate authentication.
</div>
</li>
</ol>
<a class="inline-flex items-center gap-space-xs font-label-md text-label-md text-secondary hover:text-on-secondary-fixed-variant transition-colors pt-1" href="#">
<span class="material-symbols-outlined text-[18px]">download</span>
<span>Download Officer Onboarding Manual (PDF, 2.4 MB)</span>
</a>
</div>

<!-- Institutional Helpdesk & Support Matrix -->
<div id="helpdesk-section" class="bg-surface-container-low rounded-xl p-space-md space-y-space-sm">
<div class="font-label-md text-label-md text-primary font-bold uppercase tracking-wider">Authentication Support Desk</div>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-space-sm pt-1">
<div class="bg-surface-container-lowest p-space-sm rounded-lg shadow-sm">
<div class="font-label-sm text-label-sm text-secondary font-bold">NSSTA Academy Campus</div>
<div class="font-body-sm text-body-sm text-on-surface font-medium mt-0.5">Plot No. 22, Knowledge Park-II</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">Greater Noida, UP - 201310</div>
<div class="mt-2 text-label-sm font-label-sm text-primary flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">call</span> +91-120-232-8411
</div>
</div>
<div class="bg-surface-container-lowest p-space-sm rounded-lg shadow-sm">
<div class="font-label-sm text-label-sm text-secondary font-bold">NIC Gateway Admin</div>
<div class="font-body-sm text-body-sm text-on-surface font-medium mt-0.5">Computer Centre, East Block-10</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">R.K. Puram, New Delhi - 110066</div>
<div class="mt-2 text-label-sm font-label-sm text-primary flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">mail</span> helpdesk-gap2grow@nic.in
</div>
</div>
</div>
<div class="text-center pt-space-xs">
<span class="font-label-sm text-label-sm text-on-surface-variant">Toll Free Cadre Helpline: <strong class="text-primary">1800-11-2025</strong> (09:30 - 18:00 IST Mon-Fri)</span>
</div>
</div>
</div>
</div>

<!-- Live Notification Banner at Bottom -->
<div class="mt-space-xl bg-surface-container-lowest rounded-xl p-space-md shadow-sm flex flex-col md:flex-row items-center justify-between gap-space-md">
<div class="flex items-center gap-space-md">
<div class="w-10 h-10 rounded-full bg-secondary-fixed flex items-center justify-center text-secondary shrink-0">
<span class="material-symbols-outlined text-[20px]">notifications_active</span>
</div>
<div>
<div class="font-label-md text-label-md text-primary font-bold">Security Maintenance Advisory</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">Scheduled database indexing of the NSSTA Cadre Roster will take place this Sunday from 01:00 to 03:30 AM IST. Jan Parichay SSO will remain operational.</div>
</div>
</div>
<div class="flex items-center gap-space-sm shrink-0">
<button class="px-space-md py-2 bg-surface-container hover:bg-surface-container-high text-primary font-label-sm text-label-sm rounded-full transition-colors" type="button">
  View Maintenance Log
</button>
</div>
</div>
</div>
</div>
</div>
<script>
  function switchAuthTab(tabType) {
    const parichayTabBtn = document.getElementById('tab-parichay-btn');
    const ehrmsTabBtn = document.getElementById('tab-ehrms-btn');
    const paneParichay = document.getElementById('pane-parichay');
    const paneEhrms = document.getElementById('pane-ehrms');

    if (tabType === 'parichay') {
      parichayTabBtn.classList.add('bg-surface-container-lowest', 'text-primary', 'shadow-sm', 'font-semibold');
      parichayTabBtn.classList.remove('text-on-surface-variant');
      parichayTabBtn.setAttribute('aria-selected', 'true');

      ehrmsTabBtn.classList.remove('bg-surface-container-lowest', 'text-primary', 'shadow-sm', 'font-semibold');
      ehrmsTabBtn.classList.add('text-on-surface-variant');
      ehrmsTabBtn.setAttribute('aria-selected', 'false');

      paneParichay.classList.remove('hidden');
      paneEhrms.classList.add('hidden');
    } else {
      ehrmsTabBtn.classList.add('bg-surface-container-lowest', 'text-primary', 'shadow-sm', 'font-semibold');
      ehrmsTabBtn.classList.remove('text-on-surface-variant');
      ehrmsTabBtn.setAttribute('aria-selected', 'true');

      parichayTabBtn.classList.remove('bg-surface-container-lowest', 'text-primary', 'shadow-sm', 'font-semibold');
      parichayTabBtn.classList.add('text-on-surface-variant');
      parichayTabBtn.setAttribute('aria-selected', 'false');

      paneEhrms.classList.remove('hidden');
      paneParichay.classList.add('hidden');
    }
  }

  function togglePasswordVisibility(fieldId, buttonElement) {
    const input = document.getElementById(fieldId);
    const icon = buttonElement.querySelector('.material-symbols-outlined');
    if (input.type === 'password') {
      input.type = 'text';
      icon.textContent = 'visibility_off';
    } else {
      input.type = 'password';
      icon.textContent = 'visibility';
    }
  }

  function regenerateCaptcha() {
    const chars = '23456789ABCDEFGHJKLMNPQRSTUVWXYZ';
    let result = '';
    for (let i = 0; i < 5; i++) {
      result += chars.charAt(Math.floor(Math.random() * chars.length)) + ' ';
    }
    document.getElementById('captcha-display').innerText = result.trim();
  }

  function fillCredentials(email, pwd, role) {
    switchAuthTab('parichay');
    document.getElementById('login-gov-id').value = email;
    document.getElementById('login-password').value = pwd;
    document.getElementById('captcha-input').value = '8N4K7';
  }
</script></main><footer class="w-full bg-surface-container-low text-on-surface-variant mt-space-xl"><div class="max-w-7xl mx-auto px-gutter py-space-xl grid grid-cols-1 md:grid-cols-4 gap-space-lg"><div class="md:col-span-2"><div class="font-headline-sm text-headline-sm text-primary mb-space-xs">Gap2Grow | National Statistical Academy</div><p class="font-body-sm text-body-sm text-on-surface-variant max-w-xl">AI-orchestrated Competency Assessment, Skill Gap Identification, and Precision Learning Pathway Architecture for the Indian Statistical Service (ISS) and Subordinate Statistical Service (SSS).</p><div class="mt-space-md flex items-center gap-space-sm text-label-sm font-label-sm text-on-surface"><span class="bg-surface-container-high px-2 py-1 rounded">GIGW 3.0 Certified</span><span class="bg-surface-container-high px-2 py-1 rounded">STQC Audited</span><span class="bg-surface-container-high px-2 py-1 rounded">MoSPI v2.4.1</span></div></div><div><div class="font-label-lg text-label-lg text-primary mb-space-sm">Institutional Nodes</div><ul class="space-y-space-xs font-body-sm text-body-sm"><li><a class="hover:text-secondary hover:underline transition-colors" href="https://www.mospi.gov.in" target="_blank" rel="noopener">Ministry of Statistics &amp; Programme Implementation ↗</a></li><li><a class="hover:text-secondary hover:underline transition-colors" href="<?= BASE_URL ?>/pages/nssta-tpac.php">National Statistical Systems Training Academy (NSSTA)</a></li><li><a class="hover:text-secondary hover:underline transition-colors" href="<?= BASE_URL ?>/pages/competency-framework.php">National Accounts &amp; Competency Framework</a></li><li><a class="hover:text-secondary hover:underline transition-colors" href="<?= BASE_URL ?>/pages/helpdesk.php">Computer Centre, East Block-10, R.K. Puram</a></li></ul></div><div><div class="font-label-lg text-label-lg text-primary mb-space-sm">Compliance &amp; Citizen Access</div><ul class="space-y-space-xs font-body-sm text-body-sm"><li><a class="hover:text-secondary hover:underline transition-colors" href="<?= BASE_URL ?>/pages/rti.php">Right to Information (RTI)</a></li><li><a class="hover:text-secondary hover:underline transition-colors" href="<?= BASE_URL ?>/pages/privacy-policy.php">Terms of Digital Service &amp; Privacy Policy</a></li><li><a class="hover:text-secondary hover:underline transition-colors" href="<?= BASE_URL ?>/pages/accessibility.php">Hyperlinking &amp; Accessibility Policies</a></li><li><a class="hover:text-secondary hover:underline transition-colors" href="<?= BASE_URL ?>/pages/web-information-manager.php">Web Information Manager &amp; Directory</a></li></ul></div></div><div class="bg-surface-container text-on-surface-variant py-space-sm"><div class="max-w-7xl mx-auto px-gutter flex flex-col sm:flex-row items-center justify-between text-body-sm font-body-sm"><span>Designed and Maintained by National Statistical Systems Training Academy (NSSTA) with NIC.</span><span>© 2025–2026 MoSPI, Government of India. All rights reserved.</span></div></div></footer></body></html>
