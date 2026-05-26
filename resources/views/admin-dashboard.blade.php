<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>iLearn Science - Admin Dashboard</title>
    <script>
        (() => {
            const adminEmail = 'lhyzah@ilearnscience.com';
            const getSession = () => {
                try {
                    return JSON.parse(sessionStorage.getItem('ilearnScienceAuthSession') || localStorage.getItem('ilearnScienceCurrentUser') || localStorage.getItem('ilearnScienceRememberedUser') || 'null');
                } catch {
                    return null;
                }
            };
            const session = getSession();
            const isAdmin = session && (session.role === 'Admin' || session.email === adminEmail);
            if (!isAdmin) {
                try { sessionStorage.setItem('ilearnSciencePendingAdmin', 'true'); } catch {}
                window.location.replace('/admin-login');
            }
        })();
    </script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600&family=JetBrains+Mono:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: '#a8e8ff',
                        'primary-container': '#00d4ff',
                        'primary-fixed-dim': '#3cd7ff',
                        secondary: '#ddfcff',
                        'secondary-fixed': '#74f5ff',
                        tertiary: '#e6d8ff',
                        'tertiary-fixed': '#e9ddff',
                        background: '#10131a',
                        surface: '#10131a',
                        'surface-container-lowest': '#0b0e14',
                        'surface-container-low': '#191c22',
                        'surface-container': '#1d2026',
                        'surface-container-high': '#272a31',
                        'surface-container-highest': '#32353c',
                        'surface-variant': '#32353c',
                        'on-surface': '#e1e2eb',
                        'on-surface-variant': '#bbc9cf',
                        outline: '#859398',
                        'outline-variant': '#3c494e',
                        error: '#ffb4ab',
                        'error-container': '#93000a',
                        'on-primary': '#003642',
                        'on-primary-container': '#00586b',
                    },
                    fontFamily: {
                        display: ['Sora', 'sans-serif'],
                        headline: ['Sora', 'sans-serif'],
                        body: ['Plus Jakarta Sans', 'sans-serif'],
                        label: ['JetBrains Mono', 'monospace'],
                    },
                    spacing: {
                        gutter: '24px',
                        'margin-desktop': '48px',
                        'container-max': '1440px',
                    },
                },
            },
        };
    </script>
    <style>
        body {
            background:
                radial-gradient(circle at 15% 10%, rgba(0, 212, 255, 0.11), transparent 34%),
                radial-gradient(circle at 85% 5%, rgba(209, 188, 255, 0.1), transparent 36%),
                linear-gradient(135deg, #0b0e14 0%, #10131a 42%, #151827 100%);
            color: #e1e2eb;
            overflow-x: hidden;
        }

        .glass-panel {
            background: rgba(25, 28, 34, 0.58);
            border: 1px solid rgba(168, 232, 255, 0.12);
            box-shadow: 0 18px 50px rgba(0, 0, 0, 0.25);
            backdrop-filter: blur(18px);
        }

        .glow-hover {
            transition: transform 0.25s ease, border-color 0.25s ease, box-shadow 0.25s ease, background 0.25s ease;
        }

        .glow-hover:hover {
            border-color: rgba(60, 215, 255, 0.55);
            box-shadow: 0 0 28px rgba(60, 215, 255, 0.2);
            transform: translateY(-3px);
        }

        .nav-item.active {
            background: rgba(0, 212, 255, 0.14);
            border-color: rgba(60, 215, 255, 0.55);
            color: #a8e8ff;
            box-shadow: 0 0 22px rgba(0, 212, 255, 0.18);
        }

        .science-grid {
            background-image:
                linear-gradient(rgba(168, 232, 255, 0.045) 1px, transparent 1px),
                linear-gradient(90deg, rgba(168, 232, 255, 0.045) 1px, transparent 1px);
            background-size: 54px 54px;
        }

        .orbit-ring {
            border: 1px solid rgba(168, 232, 255, 0.16);
            border-radius: 9999px;
            position: absolute;
            transform: rotate(-18deg);
        }

        .spark {
            animation: spark-float 8s ease-in-out infinite;
            background: #3cd7ff;
            border-radius: 9999px;
            box-shadow: 0 0 12px #3cd7ff;
            height: 4px;
            position: absolute;
            width: 4px;
        }

        .sidebar-collapsed #admin-sidebar {
            width: 88px;
        }

        .sidebar-collapsed .sidebar-label,
        .sidebar-collapsed .sidebar-meta,
        .sidebar-collapsed .sidebar-logo-text {
            display: none;
        }

        .sidebar-collapsed #admin-content,
        .sidebar-collapsed #admin-topbar {
            margin-left: 88px;
        }

        .chart-line {
            stroke-dasharray: 900;
            stroke-dashoffset: 900;
            animation: draw-line 1.8s ease forwards;
        }

        .bar-fill {
            animation: bar-rise 0.9s ease forwards;
            transform: scaleY(0);
            transform-origin: bottom;
        }

        .counter {
            font-variant-numeric: tabular-nums;
        }

        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: #10131a; }
        ::-webkit-scrollbar-thumb { background: #32353c; border-radius: 9999px; }
        ::-webkit-scrollbar-thumb:hover { background: #3cd7ff; }

        @keyframes draw-line { to { stroke-dashoffset: 0; } }
        @keyframes bar-rise { to { transform: scaleY(1); } }
        @keyframes spark-float {
            0%, 100% { transform: translateY(0); opacity: 0.35; }
            50% { transform: translateY(-18px); opacity: 0.85; }
        }

        @media (max-width: 1023px) {
            #admin-sidebar {
                transform: translateX(-105%);
                width: 288px;
            }

            .sidebar-open #admin-sidebar {
                transform: translateX(0);
            }

            .sidebar-collapsed #admin-content,
            .sidebar-collapsed #admin-topbar,
            #admin-content,
            #admin-topbar {
                margin-left: 0;
            }
        }
    </style>
</head>
<body class="font-body antialiased">
    <div class="pointer-events-none fixed inset-0 z-0 science-grid opacity-70"></div>
    <div class="pointer-events-none fixed inset-0 z-0 overflow-hidden">
        <div class="orbit-ring left-[6%] top-[16%] h-48 w-80"></div>
        <div class="orbit-ring right-[8%] top-[10%] h-64 w-64"></div>
        <div class="orbit-ring bottom-[5%] left-[45%] h-56 w-96"></div>
        <span class="spark left-[18%] top-[22%]"></span>
        <span class="spark right-[24%] top-[18%]" style="animation-delay: 1.4s;"></span>
        <span class="spark bottom-[20%] left-[70%]" style="animation-delay: 2.4s;"></span>
        <span class="spark bottom-[12%] left-[12%]" style="animation-delay: 3.2s;"></span>
    </div>

    <aside id="admin-sidebar" class="fixed left-0 top-0 z-50 flex h-screen w-72 flex-col border-r border-primary/10 bg-surface-container-low/80 p-4 shadow-[12px_0_40px_rgba(0,0,0,0.32)] backdrop-blur-2xl transition-all duration-300">
        <div class="mb-7 flex items-center gap-3 px-2 pt-2">
            <a class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl border border-primary/30 bg-primary-container/10 shadow-[0_0_20px_rgba(60,215,255,0.22)]" href="{{ route('home') }}" aria-label="Go to home">
                <img class="h-9 w-9 rounded-full object-contain" alt="iLearn Science Logo" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBRlFDOjxkn2sD8rhXX_C9oZtkMTA0F2zIbuZyG9wIVQvasApaG3RmYgyG2Pvp2jL5OiIRqxkIx75Tsq4ci10yb8-EExxTPy1tjBBGxv1_B3mcIr9zJxx3s_rlbkerqWnrBAlY0nMbog5hJGyrtHKkEW2ogz66o1R7h0OAPWRoU3Y4Dy9K6RZJItpyPL-ZXT9Xn5m73Ru9ye9BaZqOLXhg7JJvqaSDws24wBFWt5ncypHJMLUZ0mtJgObLNXtQbZinBc0Bg4jGSDVg">
            </a>
            <div class="sidebar-logo-text">
                <h1 class="font-headline text-xl font-bold tracking-tight text-primary">iLearn Science</h1>
                <p class="font-label text-[11px] uppercase tracking-widest text-on-surface-variant">Admin Control</p>
            </div>
        </div>

        <nav class="flex-1 space-y-1 overflow-y-auto pr-1">
            @foreach ([
                ['space_dashboard', 'Dashboard Overview', '#', true],
                ['monitoring', 'Analytics', '#', false],
                ['receipt_long', 'Orders', '#', false],
                ['groups', 'Customers', '#', false],
                ['inventory_2', 'Products', '#inventory', false],
                ['category', 'Categories', '#', false],
                ['download', 'Digital Downloads', '#', false],
                ['science', 'Science Kits', '#', false],
                ['article', 'Blog Management', route('admin.blog'), false],
                ['reviews', 'Reviews & Ratings', '#', false],
                ['redeem', 'Coupons & Discounts', '#', false],
                ['payments', 'Payments', '#', false],
                ['analytics', 'Reports', '#', false],
                ['mark_email_unread', 'Email Subscribers', '#', false],
                ['support_agent', 'Support Tickets', '#', false],
                ['admin_panel_settings', 'User Management', '#', false],
                ['settings', 'Website Settings', '#', false],
                ['logout', 'Logout', '#', false],
            ] as [$icon, $label, $href, $active])
                <a class="nav-item {{ $active ? 'active' : '' }} flex items-center gap-3 rounded-xl border border-transparent px-3 py-3 font-label text-sm text-on-surface-variant transition-all hover:border-primary/30 hover:bg-surface-variant/35 hover:text-primary {{ $label === 'Logout' ? 'hover:border-error/40 hover:text-error' : '' }}" href="{{ $href }}" @if ($label === 'Logout') data-admin-logout @endif>
                    <span class="material-symbols-outlined shrink-0">{{ $icon }}</span>
                    <span class="sidebar-label">{{ $label }}</span>
                </a>
            @endforeach
        </nav>

        <div class="sidebar-meta mt-4 rounded-2xl border border-primary/20 bg-primary-container/10 p-4">
            <p class="font-label text-xs uppercase tracking-widest text-primary">System Health</p>
            <div class="mt-3 flex items-center justify-between">
                <span class="text-sm text-on-surface-variant">Store uptime</span>
                <span class="font-label text-sm text-primary">99.98%</span>
            </div>
            <div class="mt-3 h-2 overflow-hidden rounded-full bg-surface-container-high">
                <div class="h-full w-[92%] rounded-full bg-primary-container shadow-[0_0_14px_rgba(0,212,255,0.7)]"></div>
            </div>
        </div>
    </aside>

    <header id="admin-topbar" class="fixed left-0 right-0 top-0 z-40 ml-72 flex h-20 items-center justify-between border-b border-primary/10 bg-surface/72 px-4 shadow-[0_0_25px_rgba(60,215,255,0.08)] backdrop-blur-2xl transition-all duration-300 lg:px-8">
        <div class="flex items-center gap-3">
            <button id="mobile-sidebar-toggle" class="flex h-11 w-11 items-center justify-center rounded-xl border border-primary/20 bg-surface-container/70 text-primary lg:hidden">
                <span class="material-symbols-outlined">menu</span>
            </button>
            <button id="sidebar-collapse" class="hidden h-11 w-11 items-center justify-center rounded-xl border border-primary/20 bg-surface-container/70 text-primary transition-all hover:bg-primary-container/15 lg:flex">
                <span class="material-symbols-outlined">dock_to_left</span>
            </button>
            <div class="hidden min-w-[280px] items-center gap-3 rounded-full border border-primary/15 bg-surface-container-low/80 px-4 py-2.5 md:flex lg:min-w-[420px]">
                <span class="material-symbols-outlined text-on-surface-variant">search</span>
                <input class="w-full border-0 bg-transparent p-0 font-label text-sm text-on-surface placeholder:text-on-surface-variant focus:ring-0" placeholder="Search orders, products, customers...">
            </div>
        </div>

        <div class="flex items-center gap-2 md:gap-3">
            @foreach ([['notifications', '3'], ['mail', '7'], ['settings', '']] as [$icon, $badge])
                <button class="relative flex h-11 w-11 items-center justify-center rounded-xl border border-white/10 bg-surface-container/65 text-on-surface-variant transition-all hover:border-primary/40 hover:text-primary hover:shadow-[0_0_18px_rgba(60,215,255,0.2)]">
                    <span class="material-symbols-outlined">{{ $icon }}</span>
                    @if ($badge)
                        <span class="absolute -right-1 -top-1 flex h-5 min-w-5 items-center justify-center rounded-full bg-primary-container px-1 font-label text-[10px] font-bold text-on-primary">{{ $badge }}</span>
                    @endif
                </button>
            @endforeach
            <button class="hidden items-center gap-2 rounded-xl bg-primary-container px-4 py-2.5 font-label text-sm font-bold text-on-primary shadow-[0_0_20px_rgba(0,212,255,0.35)] transition-all hover:scale-105 sm:flex">
                <span class="material-symbols-outlined text-[20px]">add</span>
                Quick Add
            </button>
            <button class="flex items-center gap-3 rounded-full border border-primary/20 bg-surface-container/70 p-1 pr-3 transition-all hover:border-primary/50">
                <img class="h-9 w-9 rounded-full border border-primary/30 object-cover" alt="Admin profile" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD3XNKjUJ7YMCovYbY9ONdXA4LRDTjeEpLYTkl1xLQsVawE48iHsZFhGCIqzz10uXm8mhrWX8hjM_yp_U4pyAFsVK3Xv3csT4gy0fLx6lXr8U8EB0J-yBj2FCFF5Q-BcVb-T64N6atCbVUW4BFiKxzr3Ix2bptXvH1qjsaa86ROrU2VXToku2_oX8PtfC3TNDLOBUX-tOYN9furyFw27MbTbvQ8fLzMx9V9sw-2rChwzbvt2n5UKlw1XKGIfwuWO6wsIMfTUcZ2O2g">
                <span class="hidden font-label text-sm text-primary md:inline">Admin Nova</span>
                <span class="material-symbols-outlined hidden text-[18px] text-on-surface-variant md:inline">expand_more</span>
            </button>
        </div>
    </header>

    <main id="admin-content" class="relative z-10 ml-72 min-h-screen px-4 pb-12 pt-24 transition-all duration-300 lg:px-8">
        <section class="mx-auto max-w-container-max">
            <div class="mb-8 flex flex-col justify-between gap-5 xl:flex-row xl:items-end">
                <div>
                    <p class="font-label text-xs uppercase tracking-[0.35em] text-primary">Mission Control Admin</p>
                    <h2 class="mt-2 font-display text-3xl font-bold tracking-tight text-on-surface md:text-5xl">Educational Commerce Command Center</h2>
                    <p class="mt-3 max-w-3xl text-on-surface-variant">Monitor sales, learning resources, customer activity, content publishing, and digital downloads from one high-security science dashboard.</p>
                </div>
                <div class="glass-panel flex flex-wrap gap-2 rounded-2xl p-2">
                    @foreach (['Today', '7D', '30D', 'Quarter'] as $index => $range)
                        <button class="rounded-xl px-4 py-2 font-label text-sm transition-all {{ $index === 2 ? 'bg-primary-container text-on-primary shadow-[0_0_15px_rgba(0,212,255,0.28)]' : 'text-on-surface-variant hover:bg-surface-variant/50 hover:text-primary' }}">{{ $range }}</button>
                    @endforeach
                </div>
            </div>

            @php
                $stats = [
                    ['Total Revenue', '928450', '₱', 'payments', '+18.4%', 'from last month', 'primary-container'],
                    ['Total Orders', '1842', '', 'receipt_long', '+12.8%', '312 new this week', 'secondary-fixed'],
                    ['Active Customers', '12608', '', 'groups', '+9.7%', 'teachers and students', 'tertiary-fixed'],
                    ['Website Visitors', '58240', '', 'travel_explore', '+22.1%', 'live traffic rising', 'primary-fixed-dim'],
                    ['Monthly Sales', '3650', '', 'trending_up', '+14.5%', 'resource bundles', 'primary-container'],
                    ['Download Counts', '42890', '', 'cloud_download', '+31.2%', 'digital assets', 'secondary-fixed'],
                ];
            @endphp

            <section class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-6">
                @foreach ($stats as [$label, $value, $prefix, $icon, $delta, $meta, $color])
                    <article class="glass-panel glow-hover rounded-2xl p-5">
                        <div class="flex items-start justify-between gap-4">
                            <div class="flex h-12 w-12 items-center justify-center rounded-xl border border-primary/20 bg-primary-container/10 text-{{ $color }}">
                                <span class="material-symbols-outlined">{{ $icon }}</span>
                            </div>
                            <span class="rounded-full bg-green-400/10 px-2 py-1 font-label text-[11px] text-green-300">{{ $delta }}</span>
                        </div>
                        <p class="mt-5 font-label text-xs uppercase tracking-widest text-on-surface-variant">{{ $label }}</p>
                        <h3 class="mt-2 font-headline text-3xl font-bold text-on-surface"><span>{{ $prefix }}</span><span class="counter" data-count="{{ $value }}">0</span></h3>
                        <p class="mt-2 text-sm text-on-surface-variant">{{ $meta }}</p>
                    </article>
                @endforeach
            </section>

            <section class="mt-8 grid grid-cols-1 gap-gutter xl:grid-cols-12">
                <article class="glass-panel rounded-3xl p-6 xl:col-span-8">
                    <div class="mb-6 flex flex-col justify-between gap-4 md:flex-row md:items-center">
                        <div>
                            <h3 class="font-headline text-2xl font-semibold">Live Customer Activity</h3>
                            <p class="text-sm text-on-surface-variant">Real-time cart, checkout, resource, and page-reading activity from customer sessions.</p>
                        </div>
                        <span class="inline-flex items-center gap-2 rounded-full border border-primary/25 bg-primary-container/10 px-3 py-1 font-label text-xs text-primary">
                            <span class="h-2 w-2 rounded-full bg-primary-container shadow-[0_0_10px_#00d4ff]"></span>
                            Live sync
                        </span>
                    </div>
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-4">
                        @foreach ([['Cart Items', 'shopping_cart', 'live-cart-count'], ['Cart Value', 'payments', 'live-cart-value'], ['Checkouts', 'receipt_long', 'live-checkout-count'], ['Pages / Blog Reads', 'article', 'live-page-reads']] as [$label, $icon, $target])
                            <div class="rounded-2xl border border-white/10 bg-surface-container-low/55 p-4">
                                <div class="flex items-center justify-between">
                                    <span class="font-label text-[10px] uppercase tracking-widest text-on-surface-variant">{{ $label }}</span>
                                    <span class="material-symbols-outlined text-primary">{{ $icon }}</span>
                                </div>
                                <p class="mt-3 font-headline text-2xl font-semibold text-primary" data-live-stat="{{ $target }}">0</p>
                            </div>
                        @endforeach
                    </div>
                    <h4 class="mt-6 font-label text-xs uppercase tracking-widest text-primary">Activity Feed</h4>
                    <div class="mt-3 max-h-[420px] space-y-3 overflow-y-auto pr-1" data-live-activity-feed>
                        <div class="rounded-2xl border border-white/5 bg-surface-container-low/50 p-5 text-center text-on-surface-variant">Waiting for customer activity...</div>
                    </div>
                </article>

                <aside class="space-y-gutter xl:col-span-4">
                    <section class="glass-panel rounded-3xl p-6">
                        <h3 class="font-headline text-2xl font-semibold">Current Customer Cart</h3>
                        <p class="mt-1 text-sm text-on-surface-variant">Live cart items and quantities.</p>
                        <div class="mt-5 space-y-3" data-live-cart-list>
                            <div class="rounded-2xl border border-white/5 bg-surface-container-low/50 p-5 text-center text-on-surface-variant">No cart data yet.</div>
                        </div>
                    </section>

                    <section class="glass-panel rounded-3xl p-6">
                        <h3 class="font-headline text-2xl font-semibold">Latest Checkout</h3>
                        <div class="mt-5 rounded-2xl border border-primary/15 bg-primary-container/10 p-4" data-live-checkout-card>
                            <p class="font-label text-xs text-on-surface-variant">No checkout completed yet.</p>
                        </div>
                    </section>
                </aside>
            </section>

            <section class="mt-8 grid grid-cols-1 gap-gutter xl:grid-cols-12">
                <article class="glass-panel rounded-3xl p-6 xl:col-span-8">
                    <div class="mb-6 flex flex-col justify-between gap-4 md:flex-row md:items-center">
                        <div>
                            <h3 class="font-headline text-2xl font-semibold">Sales Analytics</h3>
                            <p class="text-sm text-on-surface-variant">Revenue, traffic, and conversion path across the learning marketplace.</p>
                        </div>
                        <div class="flex gap-2">
                            @foreach (['Revenue', 'Traffic', 'Products'] as $index => $label)
                                <button class="rounded-lg border px-3 py-2 font-label text-xs transition-all {{ $index === 0 ? 'border-primary/40 bg-primary-container/15 text-primary' : 'border-white/10 text-on-surface-variant hover:border-primary/35 hover:text-primary' }}">{{ $label }}</button>
                            @endforeach
                        </div>
                    </div>

                    <div class="relative h-[310px] overflow-hidden rounded-2xl border border-white/10 bg-surface-container-lowest/60 p-5">
                        <div class="absolute inset-0 science-grid opacity-50"></div>
                        <svg class="relative h-full w-full" viewBox="0 0 760 260" preserveAspectRatio="none" aria-label="Sales chart">
                            <defs>
                                <linearGradient id="lineGlow" x1="0" x2="1">
                                    <stop offset="0%" stop-color="#74f5ff" />
                                    <stop offset="55%" stop-color="#3cd7ff" />
                                    <stop offset="100%" stop-color="#d1bcff" />
                                </linearGradient>
                                <linearGradient id="areaGlow" x1="0" x2="0" y1="0" y2="1">
                                    <stop offset="0%" stop-color="#3cd7ff" stop-opacity="0.28" />
                                    <stop offset="100%" stop-color="#3cd7ff" stop-opacity="0" />
                                </linearGradient>
                            </defs>
                            <path d="M0 228 L0 180 C60 170 80 125 130 132 C190 142 190 78 250 82 C320 88 310 155 375 138 C438 120 430 64 505 72 C585 80 574 34 640 42 C700 49 714 31 760 24 L760 228 Z" fill="url(#areaGlow)" />
                            <path class="chart-line" d="M0 180 C60 170 80 125 130 132 C190 142 190 78 250 82 C320 88 310 155 375 138 C438 120 430 64 505 72 C585 80 574 34 640 42 C700 49 714 31 760 24" fill="none" stroke="url(#lineGlow)" stroke-linecap="round" stroke-width="5" />
                            @foreach ([['70','150'], ['250','82'], ['505','72'], ['640','42'], ['760','24']] as [$cx, $cy])
                                <circle cx="{{ $cx }}" cy="{{ $cy }}" r="6" fill="#10131a" stroke="#a8e8ff" stroke-width="4" />
                            @endforeach
                        </svg>
                        <div class="absolute bottom-5 left-5 right-5 grid grid-cols-4 gap-3">
                            @foreach ([['Revenue', '₱928k'], ['Traffic', '58.2k'], ['Conversion', '7.8%'], ['Downloads', '42.8k']] as [$label, $value])
                                <div class="rounded-xl border border-white/10 bg-surface-container/70 p-3">
                                    <p class="font-label text-[10px] uppercase tracking-widest text-on-surface-variant">{{ $label }}</p>
                                    <p class="mt-1 font-headline text-lg font-semibold text-primary">{{ $value }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </article>

                <article class="glass-panel rounded-3xl p-6 xl:col-span-4">
                    <h3 class="font-headline text-2xl font-semibold">Product Performance</h3>
                    <p class="mb-6 text-sm text-on-surface-variant">Top-performing resource categories.</p>
                    <div class="space-y-5">
                        @foreach ([['Worksheets', '86'], ['PowerPoints', '74'], ['Science Kits', '62'], ['Quizzes', '48'], ['Lesson Plans', '39']] as [$label, $height])
                            <div>
                                <div class="mb-2 flex justify-between font-label text-xs">
                                    <span class="text-on-surface-variant">{{ $label }}</span>
                                    <span class="text-primary">{{ $height }}%</span>
                                </div>
                                <div class="h-3 overflow-hidden rounded-full bg-surface-container-high">
                                    <div class="bar-fill h-full rounded-full bg-gradient-to-r from-primary-container to-tertiary-fixed shadow-[0_0_12px_rgba(60,215,255,0.55)]" style="width: {{ $height }}%;"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-7 rounded-2xl border border-tertiary/20 bg-tertiary/10 p-4">
                        <p class="font-label text-xs uppercase tracking-widest text-tertiary">AI Insight</p>
                        <p class="mt-2 text-sm text-on-surface-variant">Biology resources are driving 31% more repeat purchases this month.</p>
                    </div>
                </article>
            </section>

            <section class="mt-8 grid grid-cols-1 gap-gutter 2xl:grid-cols-12">
                <article class="glass-panel rounded-3xl p-6 2xl:col-span-8">
                    <div class="mb-6 flex flex-col justify-between gap-4 md:flex-row md:items-center">
                        <div>
                            <h3 class="font-headline text-2xl font-semibold">Recent Orders</h3>
                            <p class="text-sm text-on-surface-variant">Live purchase and download fulfillment queue.</p>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <input id="order-search" class="rounded-xl border border-white/10 bg-surface-container-low px-4 py-2 font-label text-sm text-on-surface placeholder:text-on-surface-variant focus:border-primary focus:ring-0" placeholder="Search orders">
                            <select id="order-filter" class="rounded-xl border border-white/10 bg-surface-container-low px-4 py-2 font-label text-sm text-on-surface focus:border-primary focus:ring-0">
                                <option>All Status</option>
                                <option>Paid</option>
                                <option>Pending</option>
                                <option>Failed</option>
                            </select>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full min-w-[760px] text-left">
                            <thead>
                                <tr class="border-b border-white/10 font-label text-xs uppercase tracking-widest text-on-surface-variant">
                                    <th class="pb-4">Customer Name</th>
                                    <th class="pb-4">Product Purchased</th>
                                    <th class="pb-4">Order ID</th>
                                    <th class="pb-4">Payment Status</th>
                                    <th class="pb-4">Date</th>
                                    <th class="pb-4">Download Status</th>
                                </tr>
                            </thead>
                            <tbody id="orders-table" class="divide-y divide-white/5">
                                @foreach ([
                                    ['Aira Santos', 'Cell Biology Interactive PowerPoint', '#ILS-9281', 'Paid', 'May 22, 2026', 'Delivered'],
                                    ['Miguel Reyes', 'Photosynthesis Visual Pack', '#ILS-9279', 'Paid', 'May 22, 2026', 'Ready'],
                                    ['Camille Torres', 'Pedigree Analysis Quiz Set', '#ILS-9274', 'Pending', 'May 21, 2026', 'Locked'],
                                    ['Prof. J. Lim', 'STEM Activity Kit 04', '#ILS-9268', 'Paid', 'May 21, 2026', 'Delivered'],
                                    ['Nora Cruz', 'Taxonomy Study Guide', '#ILS-9262', 'Failed', 'May 20, 2026', 'Paused'],
                                ] as [$customer, $product, $id, $status, $date, $download])
                                    <tr class="order-row transition-colors hover:bg-white/[0.03]" data-status="{{ $status }}">
                                        <td class="py-4 font-medium text-on-surface">{{ $customer }}</td>
                                        <td class="py-4 text-on-surface-variant">{{ $product }}</td>
                                        <td class="py-4 font-label text-primary">{{ $id }}</td>
                                        <td class="py-4">
                                            <span class="rounded-full px-3 py-1 font-label text-xs {{ $status === 'Paid' ? 'bg-green-400/10 text-green-300' : ($status === 'Pending' ? 'bg-yellow-400/10 text-yellow-300' : 'bg-error-container/35 text-error') }}">{{ $status }}</span>
                                        </td>
                                        <td class="py-4 text-on-surface-variant">{{ $date }}</td>
                                        <td class="py-4">
                                            <span class="rounded-full border border-primary/20 bg-primary-container/10 px-3 py-1 font-label text-xs text-primary">{{ $download }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </article>

                <aside class="space-y-gutter 2xl:col-span-4">
                    <section class="glass-panel rounded-3xl p-6">
                        <h3 class="font-headline text-2xl font-semibold">Notifications & Alerts</h3>
                        <div class="mt-5 space-y-3">
                            @foreach ([
                                ['shopping_bag', 'New bulk order from Grade 10 Biology department', '2 min ago', 'primary'],
                                ['warning', 'Failed PayPal payment needs review', '18 min ago', 'error'],
                                ['forum', '4 customer messages waiting', '36 min ago', 'tertiary'],
                                ['inventory', 'Science Kit stock is below threshold', '1 hr ago', 'secondary'],
                                ['reviews', '9 pending reviews need moderation', 'Today', 'primary'],
                            ] as [$icon, $title, $time, $color])
                                <div class="flex gap-3 rounded-2xl border border-white/5 bg-surface-container-low/50 p-3">
                                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-primary-container/10 text-{{ $color }}">
                                        <span class="material-symbols-outlined text-[20px]">{{ $icon }}</span>
                                    </div>
                                    <div>
                                        <p class="text-sm text-on-surface">{{ $title }}</p>
                                        <p class="mt-1 font-label text-[11px] text-on-surface-variant">{{ $time }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>

                    <section class="glass-panel rounded-3xl p-6">
                        <h3 class="font-headline text-2xl font-semibold">Quick Actions</h3>
                        <div class="mt-5 grid grid-cols-2 gap-3">
                            @foreach ([
                                ['cloud_upload', 'Upload New Resource'],
                                ['post_add', 'Add Blog Post'],
                                ['local_offer', 'Create Discount'],
                                ['campaign', 'Send Newsletter'],
                                ['manage_accounts', 'Manage Users'],
                                ['support_agent', 'Support Queue'],
                            ] as [$icon, $label])
                                <button class="glow-hover flex min-h-[96px] flex-col items-center justify-center gap-2 rounded-2xl border border-white/10 bg-surface-container-low/55 p-3 text-center transition-all" @if ($label === 'Upload New Resource') data-inventory-add @endif>
                                    <span class="material-symbols-outlined text-primary">{{ $icon }}</span>
                                    <span class="font-label text-xs text-on-surface">{{ $label }}</span>
                                </button>
                            @endforeach
                        </div>
                    </section>
                </aside>
            </section>

            <section id="inventory" class="mt-8 grid scroll-mt-24 grid-cols-1 gap-gutter xl:grid-cols-3">
                <article class="glass-panel rounded-3xl p-6 xl:col-span-3">
                    <div class="flex flex-col justify-between gap-4 lg:flex-row lg:items-center">
                        <div>
                            <h3 class="font-headline text-2xl font-semibold">Inventory & Product Management</h3>
                            <p class="mt-2 text-sm text-on-surface-variant">Add, edit, delete, upload pictures, price, categorize, and manage every product detail.</p>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <input id="inventory-search" class="rounded-xl border border-white/10 bg-surface-container-low px-4 py-2 font-label text-sm text-on-surface placeholder:text-on-surface-variant focus:border-primary focus:ring-0" placeholder="Search products">
                            <select id="inventory-filter" class="rounded-xl border border-white/10 bg-surface-container-low px-4 py-2 font-label text-sm text-on-surface focus:border-primary focus:ring-0">
                                <option>All Categories</option>
                                <option>PowerPoint Presentation (PPTX)</option>
                                <option>Visual Resources</option>
                                <option>Study Guides</option>
                                <option>Test/Quiz</option>
                                <option>Worksheet</option>
                            </select>
                            <button class="rounded-xl bg-primary-container px-4 py-2 font-label text-sm font-bold text-on-primary shadow-[0_0_18px_rgba(0,212,255,0.3)] transition-all hover:scale-[1.02]" type="button" data-inventory-add>
                                <span class="material-symbols-outlined align-middle text-[18px]">add</span>
                                Add Product
                            </button>
                        </div>
                    </div>

                    <div class="mt-6 grid grid-cols-1 gap-4 md:grid-cols-4">
                        @foreach ([['Total Products', 'inventory_2', 'inventory-total'], ['Published', 'verified', 'inventory-published'], ['Drafts', 'edit_note', 'inventory-drafts'], ['Inventory Value', 'payments', 'inventory-value']] as [$label, $icon, $target])
                            <div class="rounded-2xl border border-white/10 bg-surface-container-low/55 p-4">
                                <div class="flex items-center justify-between">
                                    <span class="font-label text-[10px] uppercase tracking-widest text-on-surface-variant">{{ $label }}</span>
                                    <span class="material-symbols-outlined text-primary">{{ $icon }}</span>
                                </div>
                                <p class="mt-3 font-headline text-2xl font-semibold text-primary" data-inventory-stat="{{ $target }}">0</p>
                            </div>
                        @endforeach
                    </div>

                    <div id="inventory-category-tabs" class="mt-5 flex gap-2 overflow-x-auto pb-2">
                        @foreach (['All Categories', 'PowerPoint Presentation (PPTX)', 'Visual Resources', 'Study Guides', 'Test/Quiz', 'Worksheet'] as $category)
                            <button
                                class="inventory-category-tab whitespace-nowrap rounded-2xl border px-4 py-2 font-label text-xs transition-all {{ $loop->first ? 'border-primary/40 bg-primary-container/10 text-primary shadow-[0_0_16px_rgba(0,212,255,0.18)]' : 'border-white/10 bg-surface-container-low/70 text-on-surface-variant hover:border-primary/35 hover:text-primary' }}"
                                type="button"
                                data-inventory-category-tab="{{ $category }}"
                                aria-pressed="{{ $loop->first ? 'true' : 'false' }}"
                            >
                                {{ $category }}
                            </button>
                        @endforeach
                    </div>

                    <div class="mt-5 flex flex-col gap-3 rounded-2xl border border-primary/15 bg-primary-container/10 p-4 md:flex-row md:items-center md:justify-between">
                        <div>
                            <p class="font-label text-xs uppercase tracking-widest text-primary">Product Action Tabs</p>
                            <p class="mt-1 text-sm text-on-surface-variant">Use the always-visible Edit and Delete tabs beside each product to update or remove it from the live customer catalogue.</p>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <span class="inline-flex items-center gap-2 rounded-xl border border-primary/30 bg-surface-container-low/70 px-4 py-2 font-label text-xs text-primary">
                                <span class="material-symbols-outlined text-[18px]">edit</span>
                                Edit opens product details
                            </span>
                            <span class="inline-flex items-center gap-2 rounded-xl border border-error/30 bg-error-container/10 px-4 py-2 font-label text-xs text-error">
                                <span class="material-symbols-outlined text-[18px]">delete</span>
                                Delete removes product
                            </span>
                        </div>
                    </div>

                    <div class="mt-6 overflow-x-auto">
                        <table class="w-full min-w-[1220px] text-left">
                            <thead>
                                <tr class="border-b border-white/10 font-label text-xs uppercase tracking-widest text-on-surface-variant">
                                    <th class="pb-4">Product</th>
                                    <th class="pb-4">Category</th>
                                    <th class="pb-4">Price</th>
                                    <th class="pb-4">Grade</th>
                                    <th class="pb-4">Format</th>
                                    <th class="pb-4">Status</th>
                                    <th class="pb-4">Inventory</th>
                                    <th class="sticky right-0 z-10 bg-surface-container/95 pb-4 pl-4 text-right backdrop-blur-xl">Edit / Delete</th>
                                </tr>
                            </thead>
                            <tbody id="inventory-table" class="divide-y divide-white/5">
                                <tr>
                                    <td class="py-6 text-on-surface-variant" colspan="8">Loading inventory...</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </article>

                <article class="glass-panel rounded-3xl p-6">
                    <h3 class="font-headline text-2xl font-semibold">Customer Management</h3>
                    <div class="mt-5 space-y-4">
                        @foreach ([['Teacher', 'Maria Lopez', 'Premium', 'Active'], ['Student', 'Ken Villanueva', '12 resources', 'Active'], ['Parent', 'Grace Uy', 'Support open', 'Review']] as [$role, $name, $meta, $status])
                            <div class="flex items-center gap-3 rounded-2xl border border-white/5 bg-surface-container-low/50 p-3">
                                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-primary-container/15 text-primary">
                                    <span class="material-symbols-outlined">person</span>
                                </div>
                                <div class="flex-1">
                                    <p class="font-medium">{{ $name }}</p>
                                    <p class="text-sm text-on-surface-variant">{{ $role }} - {{ $meta }}</p>
                                </div>
                                <span class="rounded-full bg-primary-container/10 px-3 py-1 font-label text-xs text-primary">{{ $status }}</span>
                            </div>
                        @endforeach
                    </div>
                </article>

                <article class="glass-panel rounded-3xl p-6">
                    <h3 class="font-headline text-2xl font-semibold">Blog Management</h3>
                    <p class="mt-2 text-sm text-on-surface-variant">Create posts, schedule publishing, upload images, and tune SEO settings.</p>
                    <div class="mt-5 space-y-3">
                        @foreach ([['Scheduled', 'How Photosynthesis Powers Life', 'May 25'], ['Draft', 'Digestive System Lab Notes', 'SEO 82%'], ['Published', 'Heredity Explained', '3.8k views']] as [$status, $title, $meta])
                            <div class="rounded-2xl border border-white/5 bg-surface-container-low/50 p-4">
                                <div class="flex items-center justify-between">
                                    <span class="rounded-full bg-tertiary/10 px-3 py-1 font-label text-xs text-tertiary">{{ $status }}</span>
                                    <span class="font-label text-xs text-on-surface-variant">{{ $meta }}</span>
                                </div>
                                <p class="mt-3 font-medium">{{ $title }}</p>
                            </div>
                        @endforeach
                    </div>
                </article>
            </section>

            <section class="mt-8 grid grid-cols-1 gap-gutter xl:grid-cols-4">
                @foreach ([['Bounce Rate', '28%', 'south', 'Healthy engagement'], ['Top Seller', 'Cell Biology PPT', 'trending_up', '₱142k revenue'], ['Conversion Rate', '7.8%', 'bolt', '+1.2% this week'], ['Popular Download', 'Photosynthesis Pack', 'cloud_download', '9.4k downloads']] as [$title, $value, $icon, $meta])
                    <article class="glass-panel glow-hover rounded-2xl p-5">
                        <div class="flex items-center justify-between">
                            <span class="font-label text-xs uppercase tracking-widest text-on-surface-variant">{{ $title }}</span>
                            <span class="material-symbols-outlined text-primary">{{ $icon }}</span>
                        </div>
                        <p class="mt-4 font-headline text-2xl font-semibold text-primary">{{ $value }}</p>
                        <p class="mt-2 text-sm text-on-surface-variant">{{ $meta }}</p>
                    </article>
                @endforeach
            </section>
        </section>
    </main>

    <div id="inventory-modal" class="fixed inset-0 z-[70] hidden items-center justify-center bg-black/70 p-4 backdrop-blur-md">
        <section class="glass-panel max-h-[92vh] w-full max-w-5xl overflow-y-auto rounded-3xl p-6 shadow-[0_0_45px_rgba(0,212,255,0.18)]">
            <div class="mb-6 flex items-start justify-between gap-4">
                <div>
                    <p class="font-label text-xs uppercase tracking-[0.32em] text-primary">Inventory Editor</p>
                    <h3 id="inventory-modal-title" class="mt-2 font-headline text-3xl font-semibold">Add Product</h3>
                    <p class="mt-2 text-sm text-on-surface-variant">Edit the complete product information customers will see in the shop.</p>
                </div>
                <button class="flex h-11 w-11 items-center justify-center rounded-xl border border-white/10 bg-surface-container-low text-on-surface-variant transition hover:border-primary/40 hover:text-primary" type="button" data-inventory-close aria-label="Close inventory editor">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>

            <form id="inventory-form" class="grid grid-cols-1 gap-5 lg:grid-cols-12">
                <input name="id" type="hidden">
                <label class="lg:col-span-6">
                    <span class="mb-2 block font-label text-xs uppercase tracking-widest text-on-surface-variant">Product Title</span>
                    <input class="w-full rounded-xl border border-white/10 bg-surface-container-low px-4 py-3 text-on-surface focus:border-primary focus:ring-0" name="title" placeholder="Cell Biology Interactive PowerPoint" required>
                </label>
                <label class="lg:col-span-3">
                    <span class="mb-2 block font-label text-xs uppercase tracking-widest text-on-surface-variant">Category</span>
                    <select class="w-full rounded-xl border border-white/10 bg-surface-container-low px-4 py-3 text-on-surface focus:border-primary focus:ring-0" name="category" required>
                        <option>PowerPoint Presentation (PPTX)</option>
                        <option>Visual Resources</option>
                        <option>Study Guides</option>
                        <option>Test/Quiz</option>
                        <option>Worksheet</option>
                    </select>
                </label>
                <label class="lg:col-span-3">
                    <span class="mb-2 block font-label text-xs uppercase tracking-widest text-on-surface-variant">Status</span>
                    <select class="w-full rounded-xl border border-white/10 bg-surface-container-low px-4 py-3 text-on-surface focus:border-primary focus:ring-0" name="status" required>
                        <option>Published</option>
                        <option>Active</option>
                        <option>Inactive</option>
                        <option>Draft</option>
                        <option>Archived</option>
                    </select>
                </label>

                <label class="lg:col-span-3">
                    <span class="mb-2 block font-label text-xs uppercase tracking-widest text-on-surface-variant">Price</span>
                    <input class="w-full rounded-xl border border-white/10 bg-surface-container-low px-4 py-3 text-on-surface focus:border-primary focus:ring-0" name="price" placeholder="450.00" required type="number" min="0" step="0.01">
                </label>
                <label class="lg:col-span-3">
                    <span class="mb-2 block font-label text-xs uppercase tracking-widest text-on-surface-variant">Grade Level</span>
                    <input class="w-full rounded-xl border border-white/10 bg-surface-container-low px-4 py-3 text-on-surface focus:border-primary focus:ring-0" name="grade" placeholder="Grade 9-12">
                </label>
                <label class="lg:col-span-3">
                    <span class="mb-2 block font-label text-xs uppercase tracking-widest text-on-surface-variant">File Format</span>
                    <input class="w-full rounded-xl border border-white/10 bg-surface-container-low px-4 py-3 text-on-surface focus:border-primary focus:ring-0" name="format" placeholder="PPTX + PDF">
                </label>
                <label class="lg:col-span-3">
                    <span class="mb-2 block font-label text-xs uppercase tracking-widest text-on-surface-variant">Inventory / Access</span>
                    <input class="w-full rounded-xl border border-white/10 bg-surface-container-low px-4 py-3 text-on-surface focus:border-primary focus:ring-0" name="stock" placeholder="Digital / Unlimited">
                </label>

                <label class="lg:col-span-12">
                    <span class="mb-2 block font-label text-xs uppercase tracking-widest text-on-surface-variant">Resource File / Download Link</span>
                    <input class="w-full rounded-xl border border-white/10 bg-surface-container-low px-4 py-3 text-on-surface focus:border-primary focus:ring-0" name="downloadLink" placeholder="https://drive.google.com/... or secure file link">
                </label>

                <label class="lg:col-span-8">
                    <span class="mb-2 block font-label text-xs uppercase tracking-widest text-on-surface-variant">Picture URL</span>
                    <input class="w-full rounded-xl border border-white/10 bg-surface-container-low px-4 py-3 text-on-surface focus:border-primary focus:ring-0" name="image" placeholder="https://...">
                </label>
                <label class="lg:col-span-4">
                    <span class="mb-2 block font-label text-xs uppercase tracking-widest text-on-surface-variant">Upload Picture</span>
                    <input class="w-full rounded-xl border border-white/10 bg-surface-container-low px-4 py-2.5 text-sm text-on-surface file:mr-3 file:rounded-lg file:border-0 file:bg-primary-container file:px-3 file:py-2 file:font-label file:text-on-primary focus:border-primary focus:ring-0" id="inventory-image-upload" type="file" accept="image/*">
                </label>

                <label class="lg:col-span-6">
                    <span class="mb-2 block font-label text-xs uppercase tracking-widest text-on-surface-variant">Short Description</span>
                    <textarea class="min-h-28 w-full rounded-xl border border-white/10 bg-surface-container-low px-4 py-3 text-on-surface focus:border-primary focus:ring-0" name="description" placeholder="Brief product summary for cards and previews." required></textarea>
                </label>
                <label class="lg:col-span-6">
                    <span class="mb-2 block font-label text-xs uppercase tracking-widest text-on-surface-variant">Detailed Information</span>
                    <textarea class="min-h-28 w-full rounded-xl border border-white/10 bg-surface-container-low px-4 py-3 text-on-surface focus:border-primary focus:ring-0" name="details" placeholder="Learning objectives, inclusions, topics, usage notes, and license details."></textarea>
                </label>

                <label class="lg:col-span-4">
                    <span class="mb-2 block font-label text-xs uppercase tracking-widest text-on-surface-variant">Subject / Field</span>
                    <input class="w-full rounded-xl border border-white/10 bg-surface-container-low px-4 py-3 text-on-surface focus:border-primary focus:ring-0" name="subject" placeholder="Biology">
                </label>
                <label class="lg:col-span-4">
                    <span class="mb-2 block font-label text-xs uppercase tracking-widest text-on-surface-variant">Topic</span>
                    <input class="w-full rounded-xl border border-white/10 bg-surface-container-low px-4 py-3 text-on-surface focus:border-primary focus:ring-0" name="topic" placeholder="Photosynthesis">
                </label>
                <label class="lg:col-span-4">
                    <span class="mb-2 block font-label text-xs uppercase tracking-widest text-on-surface-variant">Tags</span>
                    <input class="w-full rounded-xl border border-white/10 bg-surface-container-low px-4 py-3 text-on-surface focus:border-primary focus:ring-0" name="tags" placeholder="biology, worksheet, quiz">
                </label>

                <div class="lg:col-span-12 flex flex-col-reverse justify-between gap-3 border-t border-white/10 pt-5 md:flex-row md:items-center">
                    <p id="inventory-form-message" class="min-h-5 font-label text-xs text-on-surface-variant"></p>
                    <div class="flex flex-wrap gap-3">
                        <button class="rounded-xl border border-white/10 px-5 py-3 font-label text-sm text-on-surface-variant transition hover:border-primary/35 hover:text-primary" type="button" data-inventory-close>Cancel</button>
                        <button class="rounded-xl bg-primary-container px-5 py-3 font-label text-sm font-bold text-on-primary shadow-[0_0_18px_rgba(0,212,255,0.32)] transition hover:scale-[1.02]" type="submit">
                            <span class="material-symbols-outlined align-middle text-[18px]">save</span>
                            Save Product
                        </button>
                    </div>
                </div>
            </form>
        </section>
    </div>

    <div id="sidebar-backdrop" class="fixed inset-0 z-40 hidden bg-black/50 backdrop-blur-sm lg:hidden"></div>

    <script>
        const body = document.body;
        const collapseButton = document.getElementById('sidebar-collapse');
        const mobileToggle = document.getElementById('mobile-sidebar-toggle');
        const sidebarBackdrop = document.getElementById('sidebar-backdrop');
        const orderSearch = document.getElementById('order-search');
        const orderFilter = document.getElementById('order-filter');
        const rows = Array.from(document.querySelectorAll('.order-row'));

        collapseButton?.addEventListener('click', () => {
            body.classList.toggle('sidebar-collapsed');
        });

        function toggleMobileSidebar(open) {
            body.classList.toggle('sidebar-open', open);
            sidebarBackdrop.classList.toggle('hidden', !open);
        }

        mobileToggle?.addEventListener('click', () => toggleMobileSidebar(true));
        sidebarBackdrop?.addEventListener('click', () => toggleMobileSidebar(false));

        document.querySelectorAll('[data-admin-logout]').forEach((logoutLink) => {
            logoutLink.addEventListener('click', (event) => {
                event.preventDefault();
                logoutLink.classList.add('border-error/40', 'bg-error-container/10', 'text-error');
                logoutLink.innerHTML = `
                    <span class="material-symbols-outlined shrink-0">hourglass_top</span>
                    <span class="sidebar-label">Logging out...</span>
                `;
                try { sessionStorage.removeItem('ilearnScienceAuthSession'); } catch {}
                try { sessionStorage.removeItem('ilearnSciencePendingAdmin'); } catch {}
                try { localStorage.removeItem('ilearnScienceRememberedUser'); } catch {}
                try { localStorage.removeItem('ilearnScienceDashboardState'); } catch {}
                setTimeout(() => window.location.replace('/admin-login'), 420);
            });
        });

        document.querySelectorAll('.nav-item').forEach(item => {
            item.addEventListener('click', event => {
                if (item.matches('[data-admin-logout]')) return;
                if (item.getAttribute('href') !== '#') return;
                event.preventDefault();
                document.querySelectorAll('.nav-item').forEach(link => link.classList.remove('active'));
                item.classList.add('active');
                if (window.innerWidth < 1024) toggleMobileSidebar(false);
            });
        });

        function animateCounter(counter) {
            const target = Number(counter.dataset.count || 0);
            const duration = 1200;
            const start = performance.now();
            const formatter = new Intl.NumberFormat('en-PH');

            function tick(now) {
                const progress = Math.min((now - start) / duration, 1);
                const eased = 1 - Math.pow(1 - progress, 3);
                counter.textContent = formatter.format(Math.floor(target * eased));
                if (progress < 1) requestAnimationFrame(tick);
            }

            requestAnimationFrame(tick);
        }

        document.querySelectorAll('.counter').forEach(animateCounter);

        function filterOrders() {
            const term = orderSearch.value.trim().toLowerCase();
            const status = orderFilter.value;

            rows.forEach(row => {
                const matchesTerm = row.textContent.toLowerCase().includes(term);
                const matchesStatus = status === 'All Status' || row.dataset.status === status;
                row.classList.toggle('hidden', !(matchesTerm && matchesStatus));
            });
        }

        orderSearch?.addEventListener('input', filterOrders);
        orderFilter?.addEventListener('change', filterOrders);

        const inventoryStorageKey = 'ilearnScienceInventoryProducts';
        const productsEndpoint = '{{ route('products.index') }}';
        const productSaveEndpoint = '{{ route('admin.products.save') }}';
        const productDeleteEndpoint = '{{ url('/admin/products') }}';
        const adminCsrfToken = document.querySelector('meta[name="csrf-token"]')?.content || '';
        const inventoryTable = document.getElementById('inventory-table');
        const inventorySearch = document.getElementById('inventory-search');
        const inventoryFilter = document.getElementById('inventory-filter');
        const inventoryCategoryTabs = document.querySelectorAll('.inventory-category-tab');
        const inventoryModal = document.getElementById('inventory-modal');
        const inventoryForm = document.getElementById('inventory-form');
        const inventoryMessage = document.getElementById('inventory-form-message');
        const inventoryImageUpload = document.getElementById('inventory-image-upload');
        const productSyncChannel = 'BroadcastChannel' in window ? new BroadcastChannel('ilearn-products-sync') : null;
        const defaultInventoryProducts = [
            {
                id: 'cell-biology-interactive-powerpoint',
                title: 'Cell Biology Interactive PowerPoint',
                category: 'PowerPoint Presentation (PPTX)',
                status: 'Published',
                price: 450,
                grade: 'Grade 9-12',
                format: 'PPTX + PDF',
                stock: 'Digital / Unlimited',
                subject: 'Biology',
                topic: 'Cell Biology',
                tags: 'cells, organelles, biology',
                image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuDB29hlsu6znAHyJwVa-GZ2GEL1qRnewIXPnir5KUIvPk3vY2FFuEYqNxWpbBb_S4i1_9cmj6hfXbbm0wq8LMsxrMXm3otjI_lesrFSTbydTwMWXd2Cgx9zkMYsIX8pugR8DnnL3y8EtZLVBl1HYoCZObeGk9hhHuXl2iqlfEy5qpaQUtNcVcZt18lXM0RWiJZuPFwCoH01n7k71hV_8pOjscUwmXnCjDxQgRKCdPBDeqczACKtuekX2CyfsEtKl8-YdFotM9lhUWc',
                description: 'A gamified journey through the microscopic world with animations and embedded quizzes.',
                details: 'Includes 120+ slides, editable teacher notes, printable worksheets, quiz checkpoints, and plant vs animal cell comparisons.',
            },
            {
                id: 'photosynthesis-visual-pack',
                title: 'Photosynthesis Visual Pack',
                category: 'Visual Resources',
                status: 'Published',
                price: 280,
                grade: 'Grade 7-10',
                format: 'PNG + PDF',
                stock: 'Digital / Unlimited',
                subject: 'Biology',
                topic: 'Photosynthesis',
                tags: 'plants, chloroplast, visual',
                image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuCZqPnlOImXT-X3JSkUcj1inXa0nyODU81pWrk3Qsz4lN830sVyP4r-j99noc9-1tsqULyNQ2MNR9n8gmocKP7jIW5luqMLbWR7J9V4WZD_2LFcdXfF-oAFUGZgUwerTDHYWKMj7ARWOK9HaUO_RBI7QoQjEpPqCWrFSTDelyh8zKjvIVkJacxOUmk2Uve77wbXkjHKCtO3Unzyjls-z6g6CpGIWXFLJfOetopIFi9YX8yZDVsbKUh7wJp_eHlsOkvfCcU-LQ2vW-c',
                description: 'Process diagrams and classroom visuals for light-dependent reactions and glucose production.',
                details: 'Includes labeled process charts, vocabulary cards, exit ticket prompts, and printable student reference sheets.',
            },
            {
                id: 'pedigree-analysis-quiz-set',
                title: 'Pedigree Analysis Quiz Set',
                category: 'Test/Quiz',
                status: 'Draft',
                price: 190,
                grade: 'Grade 9-12',
                format: 'PDF + Google Forms',
                stock: 'Digital / Unlimited',
                subject: 'Biology',
                topic: 'Pedigree Analysis',
                tags: 'genetics, heredity, quiz',
                image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuBKTBt6pOG_oR9_PrrKIpbcl5bWp3Km6Z9QNHKDnhIU5Qsi4nC-HiqCsvdRmbwXlwS9xysRhI8s-c4Gg-_LtQnBqhghcnSQCbobGiYYD9293s0YrazwPXqNDDon_WTSxliVzR6z0nTmoL5zQCZklDFfNKKRhbjsJrlV7tE4Qu5wQBbTBixZ_awI0rpnkAx7HDP3ezU5PjrKhBnki1FbrcELjPIDb_hkgFIm-tAUJ4oDQyU5GaSk1WJP6nTyndR3RHV0wEMSOWBWnK8',
                description: 'Assessment set for interpreting inherited traits using pedigree charts.',
                details: 'Contains 40 questions, answer key, rubric, printable charts, and digital form-ready quiz items.',
            },
        ];

        function readInventory() {
            try {
                const saved = JSON.parse(localStorage.getItem(inventoryStorageKey) || 'null');
                const initialized = localStorage.getItem(`${inventoryStorageKey}Initialized`) === 'true';
                return Array.isArray(saved) && (saved.length || initialized) ? saved : defaultInventoryProducts;
            } catch {
                return defaultInventoryProducts;
            }
        }

        function announceProductSync(products) {
            try {
                productSyncChannel?.postMessage({ type: 'products-updated', products, at: Date.now() });
            } catch {}
            window.dispatchEvent(new CustomEvent('ilearn:products-updated', { detail: { products } }));
        }

        function saveInventory(products, shouldAnnounce = true) {
            localStorage.setItem(inventoryStorageKey, JSON.stringify(products));
            localStorage.setItem(`${inventoryStorageKey}Initialized`, 'true');
            window.iLearnAuth?.syncProductsToCatalogue?.(products);
            if (shouldAnnounce) announceProductSync(products);
        }

        async function productRequestError(response, fallback) {
            try {
                const data = await response.json();
                const messages = data?.errors
                    ? Object.values(data.errors).flat().join(' ')
                    : data?.message;
                return messages || fallback;
            } catch {
                return fallback;
            }
        }

        async function syncInventoryFromServer() {
            try {
                const response = await fetch(productsEndpoint, { headers: { Accept: 'application/json' } });
                if (!response.ok) throw new Error('Unable to load products.');
                const data = await response.json();
                if (Array.isArray(data.products)) {
                    saveInventory(data.products, false);
                    renderInventory();
                }
            } catch (error) {
                console.error(error);
            }
        }

        async function saveProductToServer(product) {
            const response = await fetch(productSaveEndpoint, {
                method: 'POST',
                headers: {
                    Accept: 'application/json',
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': adminCsrfToken,
                },
                body: JSON.stringify(product),
            });
            if (!response.ok) throw new Error(await productRequestError(response, 'Product could not be saved.'));
            const data = await response.json();
            if (Array.isArray(data.products)) saveInventory(data.products);
            return data;
        }

        async function deleteProductFromServer(productId) {
            const response = await fetch(`${productDeleteEndpoint}/${encodeURIComponent(productId)}`, {
                method: 'DELETE',
                headers: {
                    Accept: 'application/json',
                    'X-CSRF-TOKEN': adminCsrfToken,
                },
            });
            if (!response.ok) throw new Error(await productRequestError(response, 'Product could not be deleted.'));
            const data = await response.json();
            if (Array.isArray(data.products)) saveInventory(data.products);
            return data;
        }

        function escapeHTML(value = '') {
            return String(value).replace(/[&<>"']/g, (char) => ({
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#039;',
            }[char]));
        }

        function formatAdminPeso(value) {
            return `₱${(Number.parseFloat(value) || 0).toFixed(2)}`;
        }

        function normalizeInventoryCategoryName(value = '') {
            const normalized = String(value).trim().toLowerCase().replace(/&/g, 'and').replace(/[^a-z0-9]+/g, ' ');

            if (/(^|\s)(ppt|pptx|powerpoint|presentation|presentations|slide|slides|template|templates)(\s|$)/.test(normalized)) return 'PowerPoint Presentation (PPTX)';
            if (/(^|\s)(visual resource|visual resources|visual|diagram|chart|infographic|poster|image|illustration|model|map)(\s|$)/.test(normalized)) return 'Visual Resources';
            if (/(^|\s)(study guide|study guides|guide|lesson guide|reference|module|reading)(\s|$)/.test(normalized)) return 'Study Guides';
            if (/(^|\s)(test|quiz|quizzes|assessment|exam|question bank|reviewer)(\s|$)/.test(normalized)) return 'Test/Quiz';
            if (/(^|\s)(worksheet|worksheets|activity sheet|practice sheet|handout|printable)(\s|$)/.test(normalized)) return 'Worksheet';

            return '';
        }

        function canonicalInventoryCategory(productOrCategory) {
            if (typeof productOrCategory === 'string') {
                return normalizeInventoryCategoryName(productOrCategory) || productOrCategory || 'Worksheet';
            }

            const selectedCategory = normalizeInventoryCategoryName(productOrCategory?.category)
                || normalizeInventoryCategoryName(productOrCategory?.type)
                || normalizeInventoryCategoryName(productOrCategory?.productType);

            if (selectedCategory) return selectedCategory;

            return normalizeInventoryCategoryName([productOrCategory?.format, productOrCategory?.title, productOrCategory?.tags].filter(Boolean).join(' '))
                || productOrCategory?.category
                || 'Worksheet';
        }

        function setInventoryCategoryFilter(category) {
            if (inventoryFilter) inventoryFilter.value = category;
            inventoryCategoryTabs.forEach((button) => {
                const isActive = button.dataset.inventoryCategoryTab === category;
                button.setAttribute('aria-pressed', String(isActive));
                button.classList.toggle('border-primary/40', isActive);
                button.classList.toggle('bg-primary-container/10', isActive);
                button.classList.toggle('text-primary', isActive);
                button.classList.toggle('shadow-[0_0_16px_rgba(0,212,255,0.18)]', isActive);
                button.classList.toggle('border-white/10', !isActive);
                button.classList.toggle('bg-surface-container-low/70', !isActive);
                button.classList.toggle('text-on-surface-variant', !isActive);
            });
        }

        function productFromForm() {
            const data = new FormData(inventoryForm);
            const title = data.get('title')?.trim() || 'Untitled Product';
            return {
                id: data.get('id') || title.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^-|-$/g, '') || `product-${Date.now()}`,
                title,
                category: canonicalInventoryCategory(data.get('category') || 'PowerPoint Presentation (PPTX)'),
                status: data.get('status') || 'Draft',
                price: Number.parseFloat(data.get('price')) || 0,
                grade: data.get('grade')?.trim() || 'All Grades',
                format: data.get('format')?.trim() || 'Digital File',
                stock: data.get('stock')?.trim() || 'Digital / Unlimited',
                downloadLink: data.get('downloadLink')?.trim() || '',
                image: data.get('image')?.trim() || '',
                description: data.get('description')?.trim() || '',
                details: data.get('details')?.trim() || '',
                subject: data.get('subject')?.trim() || '',
                topic: data.get('topic')?.trim() || '',
                tags: data.get('tags')?.trim() || '',
                updatedAt: new Date().toISOString(),
            };
        }

        function updateInventoryStats(products) {
            const published = products.filter((product) => ['Published', 'Active'].includes(product.status)).length;
            const drafts = products.filter((product) => ['Draft', 'Inactive'].includes(product.status)).length;
            const value = products.reduce((sum, product) => sum + (Number(product.price) || 0), 0);
            const stats = {
                'inventory-total': products.length,
                'inventory-published': published,
                'inventory-drafts': drafts,
                'inventory-value': formatAdminPeso(value),
            };
            Object.entries(stats).forEach(([key, value]) => {
                const target = document.querySelector(`[data-inventory-stat="${key}"]`);
                if (target) target.textContent = value;
            });
        }

        function renderInventory() {
            const products = readInventory();
            const term = inventorySearch?.value.trim().toLowerCase() || '';
            const category = inventoryFilter?.value || 'All Categories';
            const visibleProducts = products.filter((product) => {
                const matchesTerm = [product.title, product.description, product.topic, product.subject, product.tags].join(' ').toLowerCase().includes(term);
                const matchesCategory = category === 'All Categories' || canonicalInventoryCategory(product) === category;
                return matchesTerm && matchesCategory;
            });

            updateInventoryStats(products);
            if (!inventoryTable) return;
            inventoryTable.innerHTML = visibleProducts.length ? visibleProducts.map((product) => `
                <tr class="transition-colors hover:bg-white/[0.03]" data-inventory-row="${escapeHTML(product.id)}">
                    <td class="py-4">
                        <div class="flex items-center gap-3">
                            ${product.image ? `<img class="h-14 w-14 rounded-xl object-cover" src="${escapeHTML(product.image)}" alt="${escapeHTML(product.title)}">` : `<span class="material-symbols-outlined flex h-14 w-14 items-center justify-center rounded-xl bg-primary-container/10 text-primary">image</span>`}
                            <div class="min-w-0">
                                <p class="truncate font-semibold text-on-surface">${escapeHTML(product.title)}</p>
                                <p class="mt-1 line-clamp-1 max-w-md text-sm text-on-surface-variant">${escapeHTML(product.description)}</p>
                            </div>
                        </div>
                    </td>
                    <td class="py-4"><span class="rounded-full border border-primary/20 bg-primary-container/10 px-3 py-1 font-label text-xs text-primary">${escapeHTML(canonicalInventoryCategory(product))}</span></td>
                    <td class="py-4 font-label text-primary">${formatAdminPeso(product.price)}</td>
                    <td class="py-4 text-on-surface-variant">${escapeHTML(product.grade)}</td>
                    <td class="py-4 text-on-surface-variant">${escapeHTML(product.format)}</td>
                    <td class="py-4"><span class="rounded-full px-3 py-1 font-label text-xs ${['Published', 'Active'].includes(product.status) ? 'bg-green-400/10 text-green-300' : ['Draft', 'Inactive'].includes(product.status) ? 'bg-yellow-400/10 text-yellow-300' : 'bg-error-container/30 text-error'}">${escapeHTML(product.status)}</span></td>
                    <td class="py-4 text-on-surface-variant">${escapeHTML(product.stock)}</td>
                    <td class="sticky right-0 bg-surface-container/95 py-4 pl-4 backdrop-blur-xl">
                        <div class="flex justify-end gap-2">
                            <button class="inline-flex items-center gap-1.5 rounded-xl border border-primary/35 bg-primary-container/10 px-3 py-2 font-label text-xs font-bold text-primary shadow-[0_0_12px_rgba(0,212,255,.12)] transition hover:bg-primary-container/20 hover:shadow-[0_0_18px_rgba(0,212,255,.24)]" type="button" data-inventory-edit="${escapeHTML(product.id)}" title="Edit ${escapeHTML(product.title)}">
                                <span class="material-symbols-outlined text-[17px]">edit</span>
                                Edit
                            </button>
                            <button class="inline-flex items-center gap-1.5 rounded-xl border border-error/35 bg-error-container/10 px-3 py-2 font-label text-xs font-bold text-error transition hover:bg-error-container/25 hover:shadow-[0_0_18px_rgba(255,180,171,.16)]" type="button" data-inventory-delete="${escapeHTML(product.id)}" title="Delete ${escapeHTML(product.title)}">
                                <span class="material-symbols-outlined text-[17px]">delete</span>
                                Delete
                            </button>
                        </div>
                    </td>
                </tr>
            `).join('') : '<tr><td class="py-8 text-center text-on-surface-variant" colspan="8">No products match your filter.</td></tr>';
        }

        function openInventoryModal(product = null) {
            inventoryForm.reset();
            inventoryMessage.textContent = '';
            document.getElementById('inventory-modal-title').textContent = product ? 'Edit Product' : 'Add Product';
            if (product) {
                Object.entries(product).forEach(([key, value]) => {
                    const field = inventoryForm.elements[key];
                    if (field) field.value = value ?? '';
                });
                if (inventoryForm.elements.category) {
                    inventoryForm.elements.category.value = canonicalInventoryCategory(product);
                }
            } else {
                inventoryForm.elements.id.value = '';
                inventoryForm.elements.category.value = 'PowerPoint Presentation (PPTX)';
                inventoryForm.elements.status.value = 'Published';
                inventoryForm.elements.stock.value = 'Digital / Unlimited';
                inventoryForm.elements.subject.value = 'Biology';
            }
            inventoryModal.classList.remove('hidden');
            inventoryModal.classList.add('flex');
            setTimeout(() => inventoryForm.elements.title?.focus(), 80);
        }

        function closeInventoryModal() {
            inventoryModal.classList.add('hidden');
            inventoryModal.classList.remove('flex');
        }

        document.querySelectorAll('[data-inventory-add]').forEach((button) => {
            button.addEventListener('click', () => openInventoryModal());
        });

        document.querySelectorAll('[data-inventory-close]').forEach((button) => {
            button.addEventListener('click', closeInventoryModal);
        });

        inventoryModal?.addEventListener('click', (event) => {
            if (event.target === inventoryModal) closeInventoryModal();
        });

        function resizeImageFile(file) {
            return new Promise((resolve, reject) => {
                const reader = new FileReader();
                reader.onerror = () => reject(new Error('Picture could not be read.'));
                reader.onload = () => {
                    const image = new Image();
                    image.onerror = () => reject(new Error('Picture could not be prepared.'));
                    image.onload = () => {
                        const maxSize = 1200;
                        const scale = Math.min(1, maxSize / Math.max(image.width, image.height));
                        const canvas = document.createElement('canvas');
                        canvas.width = Math.max(1, Math.round(image.width * scale));
                        canvas.height = Math.max(1, Math.round(image.height * scale));
                        const context = canvas.getContext('2d');
                        context.drawImage(image, 0, 0, canvas.width, canvas.height);
                        resolve(canvas.toDataURL('image/jpeg', 0.82));
                    };
                    image.src = reader.result;
                };
                reader.readAsDataURL(file);
            });
        }

        inventoryImageUpload?.addEventListener('change', async () => {
            const file = inventoryImageUpload.files?.[0];
            if (!file) return;
            inventoryMessage.textContent = 'Preparing picture for upload...';
            inventoryMessage.className = 'min-h-5 font-label text-xs text-primary';
            try {
                inventoryForm.elements.image.value = await resizeImageFile(file);
                inventoryMessage.textContent = 'Picture uploaded, compressed, and ready to save.';
                inventoryMessage.className = 'min-h-5 font-label text-xs text-primary';
            } catch (error) {
                inventoryMessage.textContent = error.message || 'Picture upload failed. Please try another image.';
                inventoryMessage.className = 'min-h-5 font-label text-xs text-error';
            }
        });

        inventoryForm?.addEventListener('submit', async (event) => {
            event.preventDefault();
            const nextProduct = productFromForm();
            inventoryMessage.textContent = 'Saving product to live customer catalog...';
            inventoryMessage.className = 'min-h-5 font-label text-xs text-primary';
            try {
                const data = await saveProductToServer(nextProduct);
                inventoryMessage.textContent = 'Product saved successfully and synced to customer pages.';
                if (Array.isArray(data.products)) saveInventory(data.products);
                renderInventory();
                setTimeout(closeInventoryModal, 450);
            } catch (error) {
                inventoryMessage.textContent = error.message || 'Product could not be saved. Please check the required fields.';
                inventoryMessage.className = 'min-h-5 font-label text-xs text-error';
                renderInventory();
            }
        });

        inventoryTable?.addEventListener('click', async (event) => {
            const editButton = event.target.closest('[data-inventory-edit]');
            const deleteButton = event.target.closest('[data-inventory-delete]');
            const products = readInventory();
            if (editButton) {
                const product = products.find((item) => item.id === editButton.dataset.inventoryEdit);
                if (product) openInventoryModal(product);
            }
            if (deleteButton) {
                const product = products.find((item) => item.id === deleteButton.dataset.inventoryDelete);
                if (!product) return;
                inventoryMessage.textContent = `Deleting ${product.title} from the live catalog...`;
                inventoryMessage.className = 'min-h-5 font-label text-xs text-primary';
                try {
                    const data = await deleteProductFromServer(product.id);
                    if (Array.isArray(data.products)) saveInventory(data.products);
                    renderInventory();
                    inventoryMessage.textContent = 'Product deleted and removed from the customer catalog.';
                    inventoryMessage.className = 'min-h-5 font-label text-xs text-primary';
                } catch (error) {
                    inventoryMessage.textContent = error.message || 'Product could not be deleted. Please try again.';
                    inventoryMessage.className = 'min-h-5 font-label text-xs text-error';
                }
            }
        });

        inventorySearch?.addEventListener('input', renderInventory);
        inventoryFilter?.addEventListener('change', () => {
            setInventoryCategoryFilter(inventoryFilter.value || 'All Categories');
            renderInventory();
        });
        inventoryCategoryTabs.forEach((button) => {
            button.addEventListener('click', () => {
                setInventoryCategoryFilter(button.dataset.inventoryCategoryTab || 'All Categories');
                renderInventory();
            });
        });
        renderInventory();
        syncInventoryFromServer();

        const cartStorageKey = 'ilearnScienceCartItems';
        const userCartsStorageKey = 'ilearnScienceUserCarts';
        const checkoutStorageKey = 'ilearnScienceLastCheckout';
        const activityStorageKey = 'ilearnScienceCustomerActivity';
        const currency = new Intl.NumberFormat('en-PH', { style: 'currency', currency: 'PHP' });

        function safeJSON(key, fallback) {
            try {
                return JSON.parse(localStorage.getItem(key) || 'null') ?? fallback;
            } catch {
                return fallback;
            }
        }

        function normalizeMoney(value) {
            const amount = Number.parseFloat(String(value ?? 0).replace(/[₱,]/g, '')) || 0;
            return currency.format(amount).replace('PHP', '₱');
        }

        function normalizeCartItem(item) {
            return {
                title: item.title || 'Science Resource',
                meta: item.meta || item.type || 'Digital Resource',
                quantity: Math.max(1, Number.parseInt(item.quantity || '1', 10) || 1),
                price: Number.parseFloat(String(item.price || 0).replace(/[₱,]/g, '')) || 0,
                image: item.image || '',
            };
        }

        function getLiveCartItems() {
            const userCarts = safeJSON(userCartsStorageKey, {});
            if (userCarts && typeof userCarts === 'object' && !Array.isArray(userCarts)) {
                return Object.values(userCarts).flatMap((items) => Array.isArray(items) ? items.map(normalizeCartItem) : []);
            }

            return safeJSON(cartStorageKey, []).map(normalizeCartItem);
        }

        function getLiveActivities() {
            return safeJSON(activityStorageKey, []);
        }

        function getLatestCheckout() {
            return safeJSON(checkoutStorageKey, null);
        }

        function relativeTime(isoDate) {
            if (!isoDate) return 'Just now';
            const seconds = Math.max(0, Math.floor((Date.now() - new Date(isoDate).getTime()) / 1000));
            if (seconds < 60) return `${seconds}s ago`;
            const minutes = Math.floor(seconds / 60);
            if (minutes < 60) return `${minutes}m ago`;
            const hours = Math.floor(minutes / 60);
            if (hours < 24) return `${hours}h ago`;
            return `${Math.floor(hours / 24)}d ago`;
        }

        function setLiveStat(name, value) {
            const target = document.querySelector(`[data-live-stat="${name}"]`);
            if (target) target.textContent = value;
        }

        function renderLiveCart(items) {
            const list = document.querySelector('[data-live-cart-list]');
            if (!list) return;
            if (!items.length) {
                list.innerHTML = '<div class="rounded-2xl border border-white/5 bg-surface-container-low/50 p-5 text-center text-on-surface-variant">No cart data yet.</div>';
                return;
            }

            list.innerHTML = items.slice(0, 5).map((item) => `
                <div class="flex items-center gap-3 rounded-2xl border border-white/5 bg-surface-container-low/50 p-3">
                    ${item.image ? `<img class="h-12 w-12 rounded-xl object-cover" src="${item.image}" alt="${item.title}">` : `<span class="material-symbols-outlined flex h-12 w-12 items-center justify-center rounded-xl bg-primary-container/10 text-primary">description</span>`}
                    <div class="min-w-0 flex-1">
                        <p class="truncate text-sm font-semibold text-on-surface">${item.title}</p>
                        <p class="truncate font-label text-[11px] text-on-surface-variant">${item.meta}</p>
                    </div>
                    <div class="text-right">
                        <p class="font-label text-xs text-primary">x${item.quantity}</p>
                        <p class="font-label text-xs text-on-surface-variant">${normalizeMoney(item.price * item.quantity)}</p>
                    </div>
                </div>
            `).join('');
        }

        function renderActivityFeed(activities) {
            const feed = document.querySelector('[data-live-activity-feed]');
            if (!feed) return;
            if (!activities.length) {
                feed.innerHTML = '<div class="rounded-2xl border border-white/5 bg-surface-container-low/50 p-5 text-center text-on-surface-variant">Waiting for customer activity...</div>';
                return;
            }

            const iconMap = {
                'Cart Updated': 'shopping_cart',
                'Checkout Completed': 'task_alt',
                'Checkout Started': 'payments',
                'Resource Read': 'menu_book',
                'Shop Viewed': 'science',
                'Dashboard Viewed': 'space_dashboard',
                'About Page Read': 'article',
                'Page Viewed': 'visibility',
            };

            feed.innerHTML = activities.slice(0, 12).map((activity) => `
                <div class="flex gap-3 rounded-2xl border border-white/5 bg-surface-container-low/50 p-4">
                    <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-primary-container/10 text-primary">
                        <span class="material-symbols-outlined text-[20px]">${iconMap[activity.type] || 'bolt'}</span>
                    </div>
                    <div class="min-w-0 flex-1">
                        <div class="flex flex-wrap items-center justify-between gap-2">
                            <p class="font-medium text-on-surface">${activity.type}</p>
                            <span class="font-label text-[11px] text-primary">${relativeTime(activity.at)}</span>
                        </div>
                        <p class="mt-1 text-sm text-on-surface-variant">${activity.label}</p>
                        <p class="mt-1 truncate font-label text-[11px] text-on-surface-variant">${activity.user?.name || 'Guest'} • ${activity.path || '/'}</p>
                    </div>
                </div>
            `).join('');
        }

        function renderLatestCheckout(checkout) {
            const card = document.querySelector('[data-live-checkout-card]');
            if (!card) return;
            if (!checkout) {
                card.innerHTML = '<p class="font-label text-xs text-on-surface-variant">No checkout completed yet.</p>';
                return;
            }

            const items = checkout.items || [];
            const total = checkout.totals?.total ?? items.reduce((sum, item) => sum + ((Number.parseFloat(item.price) || 0) * (Number(item.quantity) || 1)), 0);
            card.innerHTML = `
                <div class="flex items-start justify-between gap-3">
                    <div>
                        <p class="font-label text-xs uppercase tracking-widest text-primary">${checkout.orderNumber || '#ILS-LIVE'}</p>
                        <p class="mt-2 font-semibold text-on-surface">${checkout.customer?.name || 'Customer'}</p>
                        <p class="mt-1 text-sm text-on-surface-variant">${checkout.customer?.email || 'No email saved'}</p>
                    </div>
                    <span class="rounded-full bg-green-400/10 px-3 py-1 font-label text-xs text-green-300">Paid</span>
                </div>
                <div class="mt-4 border-t border-white/10 pt-4">
                    <div class="flex justify-between font-label text-sm">
                        <span class="text-on-surface-variant">Items</span>
                        <span class="text-on-surface">${items.reduce((sum, item) => sum + (Number(item.quantity) || 1), 0)}</span>
                    </div>
                    <div class="mt-2 flex justify-between font-label text-sm">
                        <span class="text-on-surface-variant">Payment</span>
                        <span class="text-primary">${checkout.paymentMethod || 'N/A'}</span>
                    </div>
                    <div class="mt-2 flex justify-between font-headline text-xl text-primary">
                        <span>Total</span>
                        <span>${normalizeMoney(total)}</span>
                    </div>
                </div>
            `;
        }

        function renderLiveOrderRow(checkout) {
            if (!checkout) return;
            const table = document.getElementById('orders-table');
            if (!table) return;
            table.querySelectorAll('[data-live-checkout-row]').forEach((row) => row.remove());
            const items = checkout.items || [];
            const product = items[0]?.title || 'Digital Learning Materials';
            const row = document.createElement('tr');
            row.dataset.liveCheckoutRow = 'true';
            row.dataset.status = 'Paid';
            row.className = 'order-row bg-primary-container/5 transition-colors hover:bg-white/[0.03]';
            row.innerHTML = `
                <td class="py-4 font-medium text-on-surface">${checkout.customer?.name || 'Customer'}</td>
                <td class="py-4 text-on-surface-variant">${product}${items.length > 1 ? ` + ${items.length - 1} more` : ''}</td>
                <td class="py-4 font-label text-primary">${checkout.orderNumber || '#ILS-LIVE'}</td>
                <td class="py-4"><span class="rounded-full bg-green-400/10 px-3 py-1 font-label text-xs text-green-300">Paid</span></td>
                <td class="py-4 text-on-surface-variant">${relativeTime(checkout.checkedOutAt)}</td>
                <td class="py-4"><span class="rounded-full border border-primary/20 bg-primary-container/10 px-3 py-1 font-label text-xs text-primary">Instant Download</span></td>
            `;
            table.prepend(row);
        }

        function refreshAdminLiveData() {
            const cartItems = getLiveCartItems();
            const checkout = getLatestCheckout();
            const activities = getLiveActivities();
            const cartCount = cartItems.reduce((sum, item) => sum + item.quantity, 0);
            const cartValue = cartItems.reduce((sum, item) => sum + item.price * item.quantity, 0);
            const checkoutCount = Math.max(activities.filter((activity) => activity.type === 'Checkout Completed').length, checkout ? 1 : 0);
            const pageReads = activities.filter((activity) => /Viewed|Read|Resource/.test(activity.type)).length;

            setLiveStat('live-cart-count', cartCount);
            setLiveStat('live-cart-value', normalizeMoney(cartValue));
            setLiveStat('live-checkout-count', checkoutCount);
            setLiveStat('live-page-reads', pageReads);
            renderLiveCart(cartItems);
            renderActivityFeed(activities);
            renderLatestCheckout(checkout);
            renderLiveOrderRow(checkout);
        }

        window.addEventListener('storage', (event) => {
            if ([cartStorageKey, userCartsStorageKey, checkoutStorageKey, activityStorageKey].includes(event.key)) refreshAdminLiveData();
        });
        window.addEventListener('pageshow', refreshAdminLiveData);
        setInterval(refreshAdminLiveData, 1000);
        refreshAdminLiveData();
    </script>
</body>
</html>
