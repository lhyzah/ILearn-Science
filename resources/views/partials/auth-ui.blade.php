<style>
    .auth-shell { font-family: "Plus Jakarta Sans", Inter, system-ui, sans-serif; }
    .auth-hidden { display: none !important; }
    .auth-backdrop {
        position: fixed;
        inset: 0;
        z-index: 120;
        align-items: center;
        justify-content: center;
        padding: 24px;
        background: rgba(5, 8, 18, 0.72);
        backdrop-filter: blur(18px);
        opacity: 0;
        pointer-events: none;
        transition: opacity 220ms ease;
    }
    .auth-backdrop.auth-open {
        display: flex !important;
        opacity: 1;
        pointer-events: auto;
    }
    .auth-card {
        position: relative;
        width: min(100%, 480px);
        max-height: min(92vh, 760px);
        overflow: auto;
        border: 1px solid rgba(116, 245, 255, 0.24);
        border-radius: 28px;
        background:
            radial-gradient(circle at 10% 0%, rgba(0, 212, 255, 0.18), transparent 35%),
            radial-gradient(circle at 100% 15%, rgba(209, 188, 255, 0.18), transparent 34%),
            rgba(20, 24, 34, 0.78);
        box-shadow: 0 0 38px rgba(0, 212, 255, 0.18), 0 28px 90px rgba(0, 0, 0, 0.55);
        transform: translateY(18px) scale(0.96);
        opacity: 0;
        transition: transform 240ms cubic-bezier(.2, .9, .2, 1), opacity 240ms ease;
    }
    .auth-open .auth-card {
        transform: translateY(0) scale(1);
        opacity: 1;
    }
    .auth-card::before {
        content: "";
        position: absolute;
        inset: -1px;
        border-radius: inherit;
        background: linear-gradient(135deg, rgba(60, 215, 255, .55), transparent 36%, rgba(209, 188, 255, .5));
        opacity: .28;
        pointer-events: none;
        mask: linear-gradient(#000 0 0) content-box, linear-gradient(#000 0 0);
        -webkit-mask: linear-gradient(#000 0 0) content-box, linear-gradient(#000 0 0);
        padding: 1px;
        -webkit-mask-composite: xor;
        mask-composite: exclude;
    }
    .auth-input {
        width: 100%;
        border: 1px solid rgba(187, 201, 207, 0.2);
        border-radius: 14px;
        background: rgba(11, 14, 20, 0.72);
        color: #e1e2eb;
        padding: 13px 15px;
        outline: none;
        transition: border-color 180ms ease, box-shadow 180ms ease, background 180ms ease;
    }
    .auth-input:focus {
        border-color: rgba(60, 215, 255, 0.72);
        box-shadow: 0 0 0 4px rgba(60, 215, 255, 0.11), 0 0 18px rgba(60, 215, 255, 0.16);
        background: rgba(11, 14, 20, 0.92);
    }
    .auth-primary {
        border: 0;
        border-radius: 14px;
        background: #00d4ff;
        color: #003642;
        font-weight: 800;
        padding: 13px 18px;
        box-shadow: 0 0 22px rgba(0, 212, 255, 0.34);
        transition: transform 160ms ease, filter 160ms ease, box-shadow 160ms ease;
    }
    .auth-primary:hover { transform: translateY(-1px); filter: brightness(1.05); box-shadow: 0 0 32px rgba(0, 212, 255, 0.45); }
    .auth-primary:active { transform: scale(.98); }
    .auth-secondary {
        border: 1px solid rgba(116, 245, 255, 0.25);
        border-radius: 14px;
        background: rgba(255, 255, 255, 0.045);
        color: #e1e2eb;
        padding: 12px;
        transition: border-color 160ms ease, transform 160ms ease, background 160ms ease;
    }
    .auth-secondary:hover { border-color: rgba(116, 245, 255, 0.6); background: rgba(116, 245, 255, 0.08); transform: translateY(-1px); }
    .auth-error { color: #ffb4ab; font-size: 12px; min-height: 18px; }
    .auth-toast {
        position: fixed;
        right: 22px;
        top: 86px;
        z-index: 140;
        max-width: 360px;
        border: 1px solid rgba(60, 215, 255, .34);
        border-radius: 18px;
        background: rgba(25, 28, 34, .94);
        color: #e1e2eb;
        box-shadow: 0 0 26px rgba(0, 212, 255, .22);
        padding: 14px 16px;
        transform: translateY(-10px);
        opacity: 0;
        pointer-events: none;
        transition: opacity 220ms ease, transform 220ms ease;
    }
    .auth-toast.auth-show { transform: translateY(0); opacity: 1; }
    .auth-nav-button {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        border: 1px solid rgba(255, 255, 255, .1);
        border-radius: 999px;
        background: rgba(255, 255, 255, .05);
        color: #cbd5e1;
        padding: 10px 13px;
        font-weight: 700;
        font-size: 13px;
        box-shadow: none;
        transition: transform 160ms ease, border-color 160ms ease, background 160ms ease, color 160ms ease;
    }
    .auth-nav-button:hover {
        transform: translateY(-1px);
        border-color: rgba(0, 242, 255, .5);
        background: rgba(255, 255, 255, .1);
        color: #ffffff;
    }
    .auth-nav-button:active { transform: scale(.95); }
    .auth-home-logout {
        border-color: rgba(255, 180, 171, .22);
        color: #ffdad6;
    }
    .auth-home-logout:hover {
        border-color: rgba(255, 180, 171, .58);
        background: rgba(255, 180, 171, .11);
        color: #ffb4ab;
        box-shadow: 0 0 18px rgba(255, 180, 171, .16);
    }
    .auth-profile { position: relative; }
    .auth-profile-button {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        border: 1px solid rgba(255, 255, 255, .1);
        border-radius: 999px;
        background: rgba(255, 255, 255, .05);
        color: #cbd5e1;
        padding: 7px 12px 7px 8px;
        box-shadow: none;
        transition: transform 160ms ease, border-color 160ms ease, background 160ms ease, color 160ms ease;
    }
    .auth-profile-button:hover {
        border-color: rgba(0, 242, 255, .5);
        background: rgba(255, 255, 255, .1);
        color: #ffffff;
        transform: translateY(-1px);
    }
    .auth-avatar {
        width: 30px;
        height: 30px;
        border: 1px solid rgba(255, 255, 255, .12);
        border-radius: 999px;
        background: rgba(255, 255, 255, .06);
        color: #00f2ff;
        font-size: 12px;
        font-weight: 900;
        box-shadow: none;
        transition: border-color 160ms ease, background 160ms ease, transform 160ms ease;
    }
    .auth-avatar:hover {
        border-color: rgba(0, 242, 255, .55);
        background: rgba(255, 255, 255, .1);
        transform: translateY(-1px);
    }
    .auth-menu {
        position: absolute;
        right: 0;
        top: 52px;
        min-width: 220px;
        border: 1px solid rgba(0, 242, 255, .2);
        border-radius: 18px;
        background: rgba(10, 9, 33, .96);
        box-shadow: 0 22px 70px rgba(0,0,0,.45), 0 0 24px rgba(0, 242, 255, .16);
        backdrop-filter: blur(18px);
        overflow: hidden;
        opacity: 0;
        transform: translateY(-8px) scale(.98);
        pointer-events: none;
        transition: opacity 180ms ease, transform 180ms ease;
    }
    .auth-menu.auth-menu-open {
        opacity: 1;
        transform: translateY(0) scale(1);
        pointer-events: auto;
    }
    .auth-menu a, .auth-menu button {
        display: flex;
        width: 100%;
        align-items: center;
        gap: 10px;
        padding: 12px 14px;
        color: #bbc9cf;
        text-align: left;
        transition: background 150ms ease, color 150ms ease;
    }
    .auth-menu a:hover, .auth-menu button:hover { background: rgba(60, 215, 255, .08); color: #a8e8ff; }
    .auth-menu button[data-auth-logout]:hover { background: rgba(255, 180, 171, .11); color: #ffb4ab; }
    .auth-logout-loading {
        display: inline-block;
        width: 15px;
        height: 15px;
        border: 2px solid rgba(255, 180, 171, .22);
        border-top-color: #ffb4ab;
        border-radius: 999px;
        animation: auth-spin .7s linear infinite;
    }
    @keyframes auth-spin { to { transform: rotate(360deg); } }
    @media (max-width: 640px) {
        .auth-backdrop { padding: 0; align-items: stretch; }
        .auth-card { width: 100%; max-height: none; min-height: 100vh; border-radius: 0; }
        .auth-toast { left: 14px; right: 14px; top: 78px; max-width: none; }
        .auth-profile-button { padding: 5px; }
        .auth-profile-name { display: none; }
        .auth-home-logout span:last-child { display: none; }
        .auth-menu { bottom: 58px; left: auto; right: 0; top: auto; min-width: min(88vw, 280px); transform: translateY(10px) scale(.98); }
        .auth-menu.auth-menu-open { transform: translateY(0) scale(1); }
    }
</style>

<div id="auth-toast" class="auth-toast auth-shell" role="status" aria-live="polite"></div>

<div id="auth-modal" class="auth-backdrop auth-hidden auth-shell" aria-hidden="true">
    <section class="auth-card">
        <button id="auth-close" class="absolute right-5 top-5 z-10 flex h-10 w-10 items-center justify-center rounded-full border border-white/10 bg-white/5 text-[#bbc9cf] transition hover:border-[#3cd7ff]/60 hover:text-[#a8e8ff]" type="button" aria-label="Close authentication modal">
            <span class="material-symbols-outlined">close</span>
        </button>

        <div class="p-6 sm:p-8">
            <div class="pointer-events-none absolute left-8 top-8 text-[#3cd7ff]/10">
                <span class="material-symbols-outlined text-7xl">science</span>
            </div>

            <div class="relative z-10 mb-7 flex items-center gap-3">
                <div class="flex h-14 w-14 items-center justify-center rounded-2xl border border-[#3cd7ff]/35 bg-[#00d4ff]/10 shadow-[0_0_22px_rgba(0,212,255,0.2)]">
                    <span class="material-symbols-outlined text-3xl text-[#a8e8ff]">rocket_launch</span>
                </div>
                <div>
                    <p class="text-xl font-extrabold tracking-tight text-[#a8e8ff]">iLearn Science</p>
                    <p class="text-xs uppercase tracking-[0.28em] text-[#bbc9cf]/65">Secure Access</p>
                </div>
            </div>

            <form id="auth-signin-form" class="relative z-10 space-y-5">
                <div>
                    <h2 class="text-3xl font-extrabold text-[#e1e2eb]">Welcome back</h2>
                    <p id="auth-signin-message" class="mt-2 text-sm text-[#bbc9cf]">Sign in to continue your science mission.</p>
                </div>
                <div class="space-y-3">
                    <label class="block text-xs font-bold uppercase tracking-[0.2em] text-[#bbc9cf]">Email</label>
                    <input id="auth-login-email" class="auth-input" type="email" autocomplete="email" placeholder="teacher@ilearn.edu">
                </div>
                <div class="space-y-3">
                    <label class="block text-xs font-bold uppercase tracking-[0.2em] text-[#bbc9cf]">Password</label>
                    <input id="auth-login-password" class="auth-input" type="password" autocomplete="current-password" placeholder="Enter password">
                </div>
                <div class="flex items-center justify-between gap-4 text-sm">
                    <label class="flex cursor-pointer items-center gap-2 text-[#bbc9cf]">
                        <input id="auth-remember" class="rounded border-[#3c494e] bg-[#0b0e14] text-[#00d4ff] focus:ring-[#00d4ff]" type="checkbox">
                        Remember me
                    </label>
                    <button class="font-semibold text-[#a8e8ff] transition hover:text-[#74f5ff]" type="button" data-auth-forgot>Forgot password?</button>
                </div>
                <p id="auth-login-error" class="auth-error"></p>
                <button class="auth-primary w-full" type="submit">Sign In</button>
                <div class="grid grid-cols-3 gap-3">
                    <button class="auth-secondary" type="button" data-auth-social="Google">Google</button>
                    <button class="auth-secondary" type="button" data-auth-social="Apple">Apple</button>
                    <button class="auth-secondary" type="button" data-auth-social="Facebook">Facebook</button>
                </div>
                <div class="rounded-2xl border border-[#d1bcff]/20 bg-[#d1bcff]/[0.06] p-4 text-center">
                    <p class="text-sm text-[#bbc9cf]">Don’t have an account?</p>
                    <button class="mt-3 rounded-full border border-[#d1bcff]/40 bg-[#d1bcff]/10 px-5 py-2 text-sm font-extrabold text-[#e9ddff] shadow-[0_0_18px_rgba(209,188,255,0.18)] transition hover:border-[#d1bcff] hover:bg-[#d1bcff]/20" type="button" data-auth-switch="signup">Create Account</button>
                </div>
            </form>

            <form id="auth-signup-form" class="auth-hidden relative z-10 space-y-5">
                <div>
                    <h2 class="text-3xl font-extrabold text-[#e1e2eb]">Create Account</h2>
                    <p class="mt-2 text-sm text-[#bbc9cf]">Build your secure iLearn Science profile.</p>
                </div>
                <div class="space-y-3">
                    <label class="block text-xs font-bold uppercase tracking-[0.2em] text-[#bbc9cf]">Full Name</label>
                    <input id="auth-signup-name" class="auth-input" type="text" autocomplete="name" placeholder="Dr. Jane Doe">
                </div>
                <div class="space-y-3">
                    <label class="block text-xs font-bold uppercase tracking-[0.2em] text-[#bbc9cf]">Email Address</label>
                    <input id="auth-signup-email" class="auth-input" type="email" autocomplete="email" placeholder="jane@school.edu">
                </div>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div class="space-y-3">
                        <label class="block text-xs font-bold uppercase tracking-[0.2em] text-[#bbc9cf]">Password</label>
                        <input id="auth-signup-password" class="auth-input" type="password" autocomplete="new-password" placeholder="At least 6 characters">
                    </div>
                    <div class="space-y-3">
                        <label class="block text-xs font-bold uppercase tracking-[0.2em] text-[#bbc9cf]">Confirm Password</label>
                        <input id="auth-signup-confirm" class="auth-input" type="password" autocomplete="new-password" placeholder="Repeat password">
                    </div>
                </div>
                <div class="space-y-3">
                    <label class="block text-xs font-bold uppercase tracking-[0.2em] text-[#bbc9cf]">Role</label>
                    <select id="auth-signup-role" class="auth-input">
                        <option>Teacher</option>
                        <option>Student</option>
                        <option>Parent</option>
                    </select>
                </div>
                <p id="auth-signup-error" class="auth-error"></p>
                <button class="auth-primary w-full" type="submit">Create Account</button>
                <div class="grid grid-cols-3 gap-3">
                    <button class="auth-secondary" type="button" data-auth-social="Google">Google</button>
                    <button class="auth-secondary" type="button" data-auth-social="Apple">Apple</button>
                    <button class="auth-secondary" type="button" data-auth-social="Facebook">Facebook</button>
                </div>
                <button class="w-full text-sm font-semibold text-[#a8e8ff] transition hover:text-[#74f5ff]" type="button" data-auth-switch="signin">Already registered? Sign in</button>
            </form>
        </div>
    </section>
</div>

<div id="auth-logout-modal" class="auth-backdrop auth-hidden auth-shell" aria-hidden="true">
    <section class="auth-card max-w-md p-7 text-center">
        <div class="mx-auto mb-5 flex h-16 w-16 items-center justify-center rounded-full border border-[#ffb4ab]/35 bg-[#ffb4ab]/10 shadow-[0_0_24px_rgba(255,180,171,0.16)]">
            <span class="material-symbols-outlined text-4xl text-[#ffb4ab]">logout</span>
        </div>
        <h2 class="text-2xl font-extrabold text-[#e1e2eb]">Are you sure you want to log out?</h2>
        <p class="mt-3 text-sm text-[#bbc9cf]">Your secure iLearn Science session will be cleared and account-only areas will require sign in again.</p>
        <div class="mt-7 grid grid-cols-2 gap-3">
            <button id="auth-logout-cancel" class="auth-secondary" type="button">Cancel</button>
            <button id="auth-logout-confirm" class="rounded-[14px] border border-[#ffb4ab]/35 bg-[#ffb4ab]/12 px-4 py-3 font-extrabold text-[#ffb4ab] transition hover:bg-[#ffb4ab]/20 hover:shadow-[0_0_22px_rgba(255,180,171,0.2)]" type="button">Logout</button>
        </div>
    </section>
</div>

<script>
(() => {
    const sessionKey = 'ilearnScienceAuthSession';
    const rememberedKey = 'ilearnScienceRememberedUser';
    const usersKey = 'ilearnScienceRegisteredUsers';
    const activityKey = 'ilearnScienceCustomerActivity';
    const cartKey = 'ilearnScienceCartItems';
    const checkoutKey = 'ilearnScienceLastCheckout';
    const adminEmail = 'lhyzah@ilearnscience.com';
    const adminPassword = 'Admin@2026';
    const pendingMessage = 'Please sign in or create an account to continue.';
    const protectedPaths = [
        '/about',
        '/blog',
        '/cart',
        '/checkout',
        '/dashboard',
        '/mission-control',
        '/orders',
        '/order-success',
        '/shop',
        '/resources/cell-biology-interactive-powerpoint',
        '/admin-dashboard',
        '/blog-admin'
    ];
    const protectedSelectors = [
        '.top-resource-add-to-cart',
        '.shop-resource-add',
        '#resource-preview-add',
        '#shop-preview-add',
        '#add-cell-biology-to-cart',
        '[data-action="download"]',
        '[data-receipt-download]',
        'a[href*="/about"]',
        'a[href*="/blog"]',
        'a[href*="/cart"]',
        'a[href*="/dashboard"]',
        'a[href*="/mission-control"]',
        'a[href*="/orders"]',
        'a[href*="/order-success"]',
        'a[href*="/shop"]',
        'a[href*="/resources/"]',
        'a[href*="/checkout"]',
        'a[href*="/admin-dashboard"]',
        'a[href*="/blog-admin"]'
    ];

    const modal = document.getElementById('auth-modal');
    const logoutModal = document.getElementById('auth-logout-modal');
    const signInForm = document.getElementById('auth-signin-form');
    const signUpForm = document.getElementById('auth-signup-form');
    const signInMessage = document.getElementById('auth-signin-message');
    let pendingHref = null;

    const getUsers = () => {
        try { return JSON.parse(localStorage.getItem(usersKey)) || []; } catch { return []; }
    };

    const setUsers = (users) => localStorage.setItem(usersKey, JSON.stringify(users));

    const getActivity = () => {
        try { return JSON.parse(localStorage.getItem(activityKey)) || []; } catch { return []; }
    };

    const getSession = () => {
        try {
            return JSON.parse(sessionStorage.getItem(sessionKey) || localStorage.getItem(rememberedKey) || 'null');
        } catch {
            return null;
        }
    };

    const activityUser = () => {
        const session = getSession();
        return session ? {
            name: session.name || 'Customer',
            email: session.email || 'guest@ilearn.local',
            role: session.role || 'Customer',
        } : {
            name: 'Guest Customer',
            email: 'guest@ilearn.local',
            role: 'Guest',
        };
    };

    const addCustomerActivity = (type, label, meta = {}) => {
        if (window.location.pathname === '/admin-dashboard' || window.location.pathname === '/blog-admin') return;
        const activities = getActivity();
        const user = activityUser();
        activities.unshift({
            id: `ACT-${Date.now()}-${Math.random().toString(16).slice(2, 6)}`,
            type,
            label,
            meta,
            user,
            path: window.location.pathname,
            title: document.title,
            at: new Date().toISOString(),
        });
        localStorage.setItem(activityKey, JSON.stringify(activities.slice(0, 80)));
    };

    const originalSetItem = localStorage.setItem.bind(localStorage);
    localStorage.setItem = (key, value) => {
        originalSetItem(key, value);
        if (key === cartKey) {
            try {
                const items = JSON.parse(value) || [];
                const count = items.reduce((sum, item) => sum + (Number(item.quantity) || 1), 0);
                addCustomerActivity('Cart Updated', `${count} item${count === 1 ? '' : 's'} in cart`, {
                    count,
                    items: items.map((item) => item.title).slice(0, 5),
                });
            } catch {}
        }
        if (key === checkoutKey) {
            try {
                const checkout = JSON.parse(value) || {};
                addCustomerActivity('Checkout Completed', checkout.orderNumber || 'Checkout submitted', {
                    total: checkout.totals?.total,
                    paymentMethod: checkout.paymentMethod,
                    items: (checkout.items || []).map((item) => item.title).slice(0, 5),
                });
            } catch {}
        }
    };

    const setSession = (user, remember = false) => {
        const session = { name: user.name, email: user.email, role: user.role, signedInAt: new Date().toISOString() };
        sessionStorage.setItem(sessionKey, JSON.stringify(session));
        if (remember) localStorage.setItem(rememberedKey, JSON.stringify(session));
        else localStorage.removeItem(rememberedKey);
    };

    const clearAuthSession = () => {
        try { sessionStorage.removeItem(sessionKey); } catch {}
        try { localStorage.removeItem(rememberedKey); } catch {}
        try { localStorage.removeItem('ilearnScienceLastCheckout'); } catch {}
        try { localStorage.removeItem('ilearnScienceDashboardState'); } catch {}
    };

    const hashText = async (value) => {
        const bytes = new TextEncoder().encode(value);
        const hash = await crypto.subtle.digest('SHA-256', bytes);
        return Array.from(new Uint8Array(hash)).map((byte) => byte.toString(16).padStart(2, '0')).join('');
    };

    const showToast = (message, tone = 'success') => {
        const toast = document.getElementById('auth-toast');
        if (!toast) return;
        toast.innerHTML = `<div class="flex items-start gap-3"><span class="material-symbols-outlined text-[#${tone === 'error' ? 'ffb4ab' : 'a8e8ff'}]">${tone === 'error' ? 'error' : 'verified_user'}</span><span>${message}</span></div>`;
        toast.classList.add('auth-show');
        clearTimeout(showToast.timer);
        showToast.timer = setTimeout(() => toast.classList.remove('auth-show'), 2600);
    };

    const setMode = (mode) => {
        const signup = mode === 'signup';
        signInForm.classList.toggle('auth-hidden', signup);
        signUpForm.classList.toggle('auth-hidden', !signup);
    };

    const openAuth = (message = null, mode = 'signin') => {
        setMode(mode);
        if (message) signInMessage.textContent = message;
        else signInMessage.textContent = 'Sign in to continue your science mission.';
        modal.classList.remove('auth-hidden');
        requestAnimationFrame(() => {
            modal.classList.add('auth-open');
            modal.setAttribute('aria-hidden', 'false');
            const first = mode === 'signup' ? document.getElementById('auth-signup-name') : document.getElementById('auth-login-email');
            setTimeout(() => first?.focus(), 120);
        });
    };

    const isProtectedPage = () => protectedPaths.includes(window.location.pathname);

    const returnHomeIfLockedOut = () => {
        if (isProtectedPage() && !signedIn()) {
            pendingHref = null;
            setTimeout(() => {
                window.location.href = '/';
            }, 180);
        }
    };

    const closeAuth = (shouldReturnHome = true) => {
        modal.classList.remove('auth-open');
        modal.setAttribute('aria-hidden', 'true');
        setTimeout(() => modal.classList.add('auth-hidden'), 220);
        if (shouldReturnHome) returnHomeIfLockedOut();
    };

    const openLogoutConfirm = () => {
        const button = document.getElementById('auth-logout-confirm');
        if (button) button.innerHTML = 'Logout';
        logoutModal.classList.remove('auth-hidden');
        requestAnimationFrame(() => {
            logoutModal.classList.add('auth-open');
            logoutModal.setAttribute('aria-hidden', 'false');
        });
    };

    const closeLogoutConfirm = () => {
        logoutModal.classList.remove('auth-open');
        logoutModal.setAttribute('aria-hidden', 'true');
        setTimeout(() => logoutModal.classList.add('auth-hidden'), 220);
    };

    const performLogout = () => {
        clearAuthSession();
        document.querySelectorAll('[data-auth-menu]').forEach((menu) => menu.classList.remove('auth-menu-open'));
        document.querySelectorAll('[data-auth-arrow]').forEach((arrow) => arrow.classList.remove('rotate-180'));
        mountAuthControls();
        showToast('You have successfully logged out.');
        setTimeout(() => {
            window.location.href = '/';
        }, 700);
    };

    const initials = (name) => (name || 'User').split(/\s+/).slice(0, 2).map((part) => part[0]).join('').toUpperCase();

    const authControlHTML = (user) => {
        if (!user) {
            return `<button class="auth-nav-button" type="button" data-auth-login-trigger><span class="material-symbols-outlined text-[18px]">login</span>Login</button>`;
        }
        return `
            ${isAdminUser(user) ? `<a class="auth-nav-button" href="/admin-dashboard"><span class="material-symbols-outlined text-[18px]">admin_panel_settings</span>Admin</a>` : ''}
            <div class="auth-profile" data-auth-profile>
                <button class="auth-profile-button" type="button" data-auth-menu-trigger aria-label="Open profile menu">
                    <span class="auth-avatar flex items-center justify-center">${initials(user.name)}</span>
                    <span class="auth-profile-name text-left">
                        <span class="block max-w-[120px] truncate text-sm font-bold leading-tight">${user.name}</span>
                    </span>
                    <span class="material-symbols-outlined text-[18px] text-[#00f2ff] transition-transform" data-auth-arrow>expand_more</span>
                </button>
                <div class="auth-menu" data-auth-menu>
                    <div class="border-b border-white/10 px-4 py-3">
                        <p class="font-bold text-[#e1e2eb]">${user.name}</p>
                        <p class="text-xs text-[#bbc9cf]">${user.role || 'Member'} • ${user.email}</p>
                    </div>
                    <a href="/dashboard"><span class="material-symbols-outlined text-[18px]">dashboard</span>Dashboard</a>
                    ${isAdminUser(user) ? `<a href="/admin-dashboard"><span class="material-symbols-outlined text-[18px]">admin_panel_settings</span>Admin Dashboard</a>` : ''}
                    ${isAdminUser(user) ? `<a href="/blog-admin"><span class="material-symbols-outlined text-[18px]">article</span>Blog Admin</a>` : ''}
                    <a href="/resources/cell-biology-interactive-powerpoint"><span class="material-symbols-outlined text-[18px]">inventory_2</span>My Resources</a>
                    <a href="/orders"><span class="material-symbols-outlined text-[18px]">download</span>Downloads</a>
                    <a href="/shop"><span class="material-symbols-outlined text-[18px]">favorite</span>Saved Items</a>
                    <a href="/about"><span class="material-symbols-outlined text-[18px]">settings</span>Settings</a>
                    <button type="button" data-auth-logout><span class="material-symbols-outlined text-[18px]">logout</span>Logout</button>
                </div>
            </div>
            <button class="auth-nav-button auth-home-logout" type="button" data-auth-logout aria-label="Logout from iLearn Science">
                <span class="material-symbols-outlined text-[18px]">logout</span>
                <span>Logout</span>
            </button>
        `;
    };

    const mountAuthControls = () => {
        const user = getSession();
        document.querySelectorAll('[data-auth-slot]').forEach((slot) => slot.remove());
        const slot = document.createElement('div');
        slot.dataset.authSlot = '';
        slot.className = 'auth-shell flex items-center gap-2';
        slot.innerHTML = authControlHTML(user);
        slot.querySelector('[data-auth-logout]')?.addEventListener('click', (event) => {
            event.preventDefault();
            event.stopPropagation();
            document.querySelectorAll('[data-auth-menu]').forEach((menu) => menu.classList.remove('auth-menu-open'));
            document.querySelectorAll('[data-auth-arrow]').forEach((arrow) => arrow.classList.remove('rotate-180'));
            openLogoutConfirm();
        });
        const preferredMount = document.querySelector('[data-auth-mount]');
        if (preferredMount) {
            preferredMount.appendChild(slot);
            return;
        }
        const header = document.querySelector('header');
        if (!header) return;
        const targets = Array.from(header.children).filter((child) => child instanceof HTMLElement);
        const target = targets[targets.length - 1] || header;
        if (target !== header && /flex/.test(target.className || '')) target.appendChild(slot);
        else header.appendChild(slot);
    };

    const signedIn = () => Boolean(getSession());
    const isAdminUser = (user = getSession()) => Boolean(user && (user.role === 'Admin' || user.email === adminEmail));

    const completeAuth = (user, remember = false, message = 'Signed in successfully.') => {
        setSession(user, remember);
        mountAuthControls();
        closeAuth(false);
        showToast(message);
        setTimeout(() => {
            window.location.href = pendingHref || '/dashboard';
        }, 520);
    };

    document.addEventListener('click', (event) => {
        const protectedTarget = event.target.closest(protectedSelectors.join(','));
        if (protectedTarget && !signedIn()) {
            event.preventDefault();
            event.stopImmediatePropagation();
            pendingHref = protectedTarget.tagName === 'A' ? protectedTarget.getAttribute('href') : null;
            openAuth(pendingMessage);
            return;
        }
        if ((protectedTarget?.matches('a[href*="/admin-dashboard"]') || protectedTarget?.matches('a[href*="/blog-admin"]')) && !isAdminUser()) {
            event.preventDefault();
            event.stopImmediatePropagation();
            showToast('Admin access only. Please sign in with the admin account.', 'error');
            return;
        }
    }, true);

    document.addEventListener('click', (event) => {
        if (event.target.closest('[data-auth-login-trigger]')) openAuth();
        if (event.target.closest('[data-auth-switch="signup"]')) setMode('signup');
        if (event.target.closest('[data-auth-switch="signin"]')) setMode('signin');
        if (event.target.closest('[data-auth-forgot]')) showToast('Password reset is ready for your registered email.', 'success');
        if (event.target.closest('[data-auth-social]')) {
            const provider = event.target.closest('[data-auth-social]').dataset.authSocial;
            completeAuth({ name: `${provider} Explorer`, email: `${provider.toLowerCase()}@ilearn.local`, role: 'Teacher' }, true, `${provider} sign in connected.`);
        }
        if (event.target.closest('[data-auth-menu-trigger]')) {
            const menu = event.target.closest('[data-auth-profile]').querySelector('[data-auth-menu]');
            const isOpen = menu.classList.toggle('auth-menu-open');
            event.target.closest('[data-auth-profile]').querySelector('[data-auth-arrow]')?.classList.toggle('rotate-180', isOpen);
        } else if (!event.target.closest('[data-auth-profile]')) {
            document.querySelectorAll('[data-auth-menu]').forEach((menu) => menu.classList.remove('auth-menu-open'));
            document.querySelectorAll('[data-auth-arrow]').forEach((arrow) => arrow.classList.remove('rotate-180'));
        }
        if (event.target.closest('[data-auth-logout]')) {
            document.querySelectorAll('[data-auth-menu]').forEach((menu) => menu.classList.remove('auth-menu-open'));
            openLogoutConfirm();
        }
    });

    document.getElementById('auth-close')?.addEventListener('click', () => closeAuth(true));
    modal?.addEventListener('click', (event) => { if (event.target === modal) closeAuth(true); });
    logoutModal?.addEventListener('click', (event) => { if (event.target === logoutModal) closeLogoutConfirm(); });
    document.getElementById('auth-logout-cancel')?.addEventListener('click', closeLogoutConfirm);
    document.getElementById('auth-logout-confirm')?.addEventListener('click', () => {
        const button = document.getElementById('auth-logout-confirm');
        button.innerHTML = '<span class="auth-logout-loading"></span>';
        setTimeout(() => {
            closeLogoutConfirm();
            performLogout();
        }, 650);
    });
    document.addEventListener('keydown', (event) => {
        if (event.key !== 'Escape') return;
        if (modal?.classList.contains('auth-open')) closeAuth(true);
        if (logoutModal?.classList.contains('auth-open')) closeLogoutConfirm();
    });

    signInForm?.addEventListener('submit', async (event) => {
        event.preventDefault();
        const email = document.getElementById('auth-login-email').value.trim().toLowerCase();
        const password = document.getElementById('auth-login-password').value;
        const error = document.getElementById('auth-login-error');
        error.textContent = '';
        if (!email || !password) {
            error.textContent = 'Email and password are required.';
            return;
        }
        if (email === adminEmail && password === adminPassword) {
            pendingHref = pendingHref || '/admin-dashboard';
            completeAuth({
                name: 'Lhyzah Admin',
                email: adminEmail,
                role: 'Admin',
            }, document.getElementById('auth-remember').checked, 'Admin access verified. Opening dashboard.');
            return;
        }
        const user = getUsers().find((item) => item.email === email);
        if (!user || user.passwordHash !== await hashText(password)) {
            error.textContent = 'Invalid login. Please check your email and password.';
            return;
        }
        completeAuth(user, document.getElementById('auth-remember').checked, 'Welcome back. Redirecting to dashboard.');
    });

    signUpForm?.addEventListener('submit', async (event) => {
        event.preventDefault();
        const name = document.getElementById('auth-signup-name').value.trim();
        const email = document.getElementById('auth-signup-email').value.trim().toLowerCase();
        const password = document.getElementById('auth-signup-password').value;
        const confirm = document.getElementById('auth-signup-confirm').value;
        const role = document.getElementById('auth-signup-role').value;
        const error = document.getElementById('auth-signup-error');
        error.textContent = '';
        if (!name || !email || !password || !confirm || !role) {
            error.textContent = 'All fields are required.';
            return;
        }
        if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            error.textContent = 'Please enter a valid email address.';
            return;
        }
        if (password.length < 6) {
            error.textContent = 'Password must be at least 6 characters.';
            return;
        }
        if (password !== confirm) {
            error.textContent = 'Passwords do not match.';
            return;
        }
        const users = getUsers();
        if (users.some((item) => item.email === email)) {
            error.textContent = 'This email is already registered. Please sign in.';
            return;
        }
        const user = { name, email, role, passwordHash: await hashText(password), createdAt: new Date().toISOString() };
        users.push(user);
        setUsers(users);
        completeAuth(user, true, 'Account created. Redirecting to dashboard.');
    });

    window.iLearnAuth = {
        isSignedIn: signedIn,
        isAdmin: isAdminUser,
        openSignIn: (message = pendingMessage) => openAuth(message),
        logout: () => {
            performLogout();
        },
        refresh: mountAuthControls
    };

    document.addEventListener('DOMContentLoaded', () => {
        mountAuthControls();
        const pageLabels = {
            '/': ['Home Viewed', 'Customer opened homepage'],
            '/dashboard': ['Dashboard Viewed', 'Customer opened dashboard'],
            '/shop': ['Shop Viewed', 'Customer browsed shop resources'],
            '/cart': ['Cart Viewed', 'Customer opened cart'],
            '/checkout': ['Checkout Started', 'Customer opened checkout'],
            '/orders': ['Orders Viewed', 'Customer viewed orders'],
            '/order-success': ['Order Success Viewed', 'Customer viewed order success'],
            '/about': ['About Page Read', 'Customer read about page'],
            '/mission-control': ['Mission Control Viewed', 'Customer opened mission control'],
            '/resources/cell-biology-interactive-powerpoint': ['Resource Read', 'Customer read Cell Biology resource details'],
        };
        const pageActivity = pageLabels[window.location.pathname]
            || (window.location.pathname.includes('/blog') ? ['Blog Read', `Customer read ${document.title}`] : ['Page Viewed', `Customer opened ${document.title}`]);
        addCustomerActivity(pageActivity[0], pageActivity[1]);
        if (sessionStorage.getItem('ilearnSciencePendingAdmin') === 'true') {
            sessionStorage.removeItem('ilearnSciencePendingAdmin');
            pendingHref = '/admin-dashboard';
            openAuth('Admin access only. Please sign in with the admin account.');
            return;
        }
        if (protectedPaths.includes(window.location.pathname) && !signedIn()) {
            pendingHref = window.location.pathname;
            openAuth(pendingMessage);
        }
    });
})();
</script>
