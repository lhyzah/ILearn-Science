<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>iLearn Science - Admin Login</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600&family=JetBrains+Mono:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        background: '#10131a',
                        surface: '#10131a',
                        'surface-container-lowest': '#0b0e14',
                        'surface-container-low': '#191c22',
                        'surface-container': '#1d2026',
                        'surface-container-high': '#272a31',
                        'surface-container-highest': '#32353c',
                        primary: '#a8e8ff',
                        'primary-container': '#00d4ff',
                        tertiary: '#e6d8ff',
                        'tertiary-fixed-dim': '#d1bcff',
                        'on-primary': '#003642',
                        'on-surface': '#e1e2eb',
                        'on-surface-variant': '#bbc9cf',
                        error: '#ffb4ab',
                    },
                    fontFamily: {
                        headline: ['Sora', 'sans-serif'],
                        body: ['Plus Jakarta Sans', 'sans-serif'],
                        label: ['JetBrains Mono', 'monospace'],
                    },
                },
            },
        };
    </script>
    <style>
        body {
            background:
                radial-gradient(circle at 18% 14%, rgba(0, 212, 255, .18), transparent 34%),
                radial-gradient(circle at 82% 16%, rgba(209, 188, 255, .16), transparent 36%),
                linear-gradient(135deg, #0b0e14 0%, #10131a 52%, #151827 100%);
            color: #e1e2eb;
            overflow-x: hidden;
        }

        .glass-panel {
            background: rgba(25, 28, 34, .62);
            border: 1px solid rgba(168, 232, 255, .16);
            box-shadow: 0 24px 70px rgba(0, 0, 0, .34);
            backdrop-filter: blur(18px);
        }

        .science-grid {
            background-image:
                linear-gradient(rgba(168, 232, 255, .045) 1px, transparent 1px),
                linear-gradient(90deg, rgba(168, 232, 255, .045) 1px, transparent 1px);
            background-size: 56px 56px;
        }

        .admin-field {
            width: 100%;
            border: 1px solid rgba(187, 201, 207, .2);
            border-radius: 18px;
            background: rgba(11, 14, 20, .74);
            color: #e1e2eb;
            padding: 16px 16px 16px 48px;
            outline: none;
            transition: border-color .2s ease, box-shadow .2s ease, background .2s ease;
        }

        .admin-field:focus {
            border-color: rgba(60, 215, 255, .8);
            background: rgba(11, 14, 20, .94);
            box-shadow: 0 0 0 4px rgba(60, 215, 255, .08), 0 0 24px rgba(60, 215, 255, .2);
        }

        .admin-error {
            animation: shake .26s linear;
            border-color: rgba(255, 180, 171, .75) !important;
            box-shadow: 0 0 22px rgba(255, 180, 171, .18) !important;
        }

        .admin-spinner {
            animation: spin .75s linear infinite;
            border: 2px solid rgba(0, 54, 66, .24);
            border-top-color: #003642;
            border-radius: 999px;
            display: inline-block;
            height: 16px;
            width: 16px;
        }

        @keyframes spin { to { transform: rotate(360deg); } }
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-4px); }
            75% { transform: translateX(4px); }
        }
    </style>
</head>
<body class="font-body">
    <div class="pointer-events-none fixed inset-0 science-grid opacity-70"></div>
    <div class="pointer-events-none fixed inset-0 overflow-hidden">
        <div class="absolute -left-20 top-24 h-72 w-72 rounded-full border border-primary/15"></div>
        <div class="absolute right-10 top-10 h-80 w-80 rounded-full border border-tertiary/15"></div>
        <div class="absolute left-[18%] top-[34%] h-2 w-2 rounded-full bg-primary-container shadow-[0_0_18px_#00d4ff]"></div>
        <div class="absolute right-[26%] top-[28%] h-2 w-2 rounded-full bg-tertiary shadow-[0_0_18px_#e6d8ff]"></div>
    </div>

    <header class="relative z-10 mx-auto flex max-w-7xl items-center justify-between px-5 py-5 md:px-8">
        <a class="flex items-center gap-3" href="{{ route('home') }}">
            <img alt="iLearn Science Logo" class="h-11 w-11 rounded-full border border-primary/25 object-contain shadow-[0_0_18px_rgba(60,215,255,.24)]" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBRlFDOjxkn2sD8rhXX_C9oZtkMTA0F2zIbuZyG9wIVQvasApaG3RmYgyG2Pvp2jL5OiIRqxkIx75Tsq4ci10yb8-EExxTPy1tjBBGxv1_B3mcIr9zJxx3s_rlbkerqWnrBAlY0nMbog5hJGyrtHKkEW2ogz66o1R7h0OAPWRoU3Y4Dy9K6RZJItpyPL-ZXT9Xn5m73Ru9ye9BaZqOLXhg7JJvqaSDws24wBFWt5ncypHJMLUZ0mtJgObLNXtQbZinBc0Bg4jGSDVg">
            <span class="font-headline text-xl font-bold text-primary md:text-2xl">iLearn Science</span>
        </a>
        <a class="rounded-full border border-primary/20 bg-primary-container/10 px-4 py-2 font-label text-xs uppercase tracking-widest text-primary transition hover:border-primary/50 hover:bg-primary-container/15" href="{{ route('home') }}">Home</a>
    </header>

    <main class="relative z-10 grid min-h-[calc(100vh-88px)] place-items-center px-5 py-10">
        <section class="grid w-full max-w-6xl grid-cols-1 gap-8 lg:grid-cols-[1fr_460px] lg:items-center">
            <div class="hidden lg:block">
                <p class="font-label text-xs uppercase tracking-[0.36em] text-primary">Admin Security Portal</p>
                <h1 class="mt-4 max-w-3xl font-headline text-6xl font-extrabold leading-tight text-on-surface">Manage iLearn Science from a separate secure dashboard.</h1>
                <p class="mt-5 max-w-2xl text-lg leading-8 text-on-surface-variant">Admin access is isolated from the customer login flow. Only verified administrators can open orders, products, customer activity, and blog management tools.</p>
                <div class="mt-8 grid max-w-2xl grid-cols-3 gap-4">
                    <div class="glass-panel rounded-2xl p-4">
                        <span class="material-symbols-outlined text-primary">shield_lock</span>
                        <p class="mt-3 font-label text-xs text-on-surface-variant">Protected Admin Gate</p>
                    </div>
                    <div class="glass-panel rounded-2xl p-4">
                        <span class="material-symbols-outlined text-tertiary">monitoring</span>
                        <p class="mt-3 font-label text-xs text-on-surface-variant">Live Store Activity</p>
                    </div>
                    <div class="glass-panel rounded-2xl p-4">
                        <span class="material-symbols-outlined text-primary">article</span>
                        <p class="mt-3 font-label text-xs text-on-surface-variant">Blog Admin Access</p>
                    </div>
                </div>
            </div>

            <section class="glass-panel relative rounded-[28px] p-6 md:p-8">
                <button id="admin-login-close" class="absolute right-5 top-5 z-10 flex h-10 w-10 items-center justify-center rounded-full border border-white/10 bg-white/5 text-on-surface-variant transition hover:border-primary/60 hover:text-primary" type="button" aria-label="Close admin login and return home">
                    <span class="material-symbols-outlined">close</span>
                </button>
                <div class="mb-7 text-center">
                    <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-3xl border border-primary/25 bg-primary-container/10 text-primary shadow-[0_0_26px_rgba(0,212,255,.18)]">
                        <span class="material-symbols-outlined text-4xl">admin_panel_settings</span>
                    </div>
                    <h2 class="mt-5 font-headline text-3xl font-bold text-on-surface">Admin Login</h2>
                    <p class="mt-2 text-sm text-on-surface-variant">Sign in with the authorized admin account.</p>
                </div>

                <form id="admin-login-form" class="space-y-5" novalidate>
                    <label class="relative block">
                        <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-primary">mail</span>
                        <input id="admin-email" class="admin-field" type="email" placeholder="Admin email" autocomplete="username">
                    </label>
                    <label class="relative block">
                        <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-primary">lock</span>
                        <input id="admin-password" class="admin-field" type="password" placeholder="Admin password" autocomplete="current-password">
                    </label>
                    <label class="flex items-center justify-between gap-4 rounded-2xl border border-white/10 bg-surface-container-low/50 px-4 py-3">
                        <span class="flex items-center gap-3 text-sm text-on-surface-variant">
                            <input id="admin-remember" class="rounded border-primary/30 bg-surface-container-high text-primary-container focus:ring-primary" type="checkbox">
                            Remember this admin device
                        </span>
                        <span class="font-label text-[10px] uppercase tracking-widest text-primary">SSL Ready</span>
                    </label>
                    <p id="admin-login-error" class="min-h-[20px] font-label text-xs text-error"></p>
                    <button id="admin-login-button" class="flex w-full items-center justify-center gap-2 rounded-2xl bg-primary-container px-5 py-4 font-headline text-lg font-bold text-on-primary shadow-[0_0_28px_rgba(0,212,255,.35)] transition hover:shadow-[0_0_42px_rgba(0,212,255,.48)] active:scale-[.98]" type="submit">
                        <span class="material-symbols-outlined">rocket_launch</span>
                        Open Admin Dashboard
                    </button>
                </form>

                <div class="mt-6 rounded-2xl border border-tertiary/20 bg-tertiary/5 p-4 text-sm text-on-surface-variant">
                    <div class="flex gap-3">
                        <span class="material-symbols-outlined text-tertiary">verified_user</span>
                        <p>Customer accounts cannot enter this portal. Use this page only for administrator access.</p>
                    </div>
                </div>
            </section>
        </section>
    </main>

    <script>
        (() => {
            const sessionKey = 'ilearnScienceAuthSession';
            const rememberedKey = 'ilearnScienceRememberedUser';
            const adminEmail = 'lhyzah@ilearnscience.com';
            const adminPassword = 'Admin@2026';

            const getSession = () => {
                try {
                    return JSON.parse(sessionStorage.getItem(sessionKey) || localStorage.getItem(rememberedKey) || 'null');
                } catch {
                    return null;
                }
            };

            const isAdmin = (session) => session && (session.role === 'Admin' || session.email === adminEmail);
            const existingSession = getSession();
            if (isAdmin(existingSession)) {
                window.location.replace('/admin-dashboard');
                return;
            }

            const form = document.getElementById('admin-login-form');
            const emailInput = document.getElementById('admin-email');
            const passwordInput = document.getElementById('admin-password');
            const rememberInput = document.getElementById('admin-remember');
            const error = document.getElementById('admin-login-error');
            const button = document.getElementById('admin-login-button');
            document.getElementById('admin-login-close')?.addEventListener('click', () => {
                window.location.href = '/';
            });

            const markInvalid = () => {
                emailInput.classList.add('admin-error');
                passwordInput.classList.add('admin-error');
                setTimeout(() => {
                    emailInput.classList.remove('admin-error');
                    passwordInput.classList.remove('admin-error');
                }, 360);
            };

            form.addEventListener('submit', (event) => {
                event.preventDefault();
                const email = emailInput.value.trim().toLowerCase();
                const password = passwordInput.value;
                error.textContent = '';

                if (!email || !password) {
                    error.textContent = 'Admin email and password are required.';
                    markInvalid();
                    return;
                }

                if (email !== adminEmail || password !== adminPassword) {
                    error.textContent = 'Invalid admin credentials. Access denied.';
                    markInvalid();
                    return;
                }

                const session = {
                    name: 'Lhyzah Admin',
                    email: adminEmail,
                    role: 'Admin',
                    signedInAt: new Date().toISOString(),
                };
                sessionStorage.setItem(sessionKey, JSON.stringify(session));
                if (rememberInput.checked) localStorage.setItem(rememberedKey, JSON.stringify(session));
                else localStorage.removeItem(rememberedKey);

                button.disabled = true;
                button.innerHTML = '<span class="admin-spinner"></span> Verifying admin access...';
                setTimeout(() => window.location.href = '/admin-dashboard', 650);
            });
        })();
    </script>
</body>
</html>
