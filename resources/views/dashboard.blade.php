<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>iLearn Science - Customer Dashboard</title>
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
                        'on-primary': '#003642',
                        'on-primary-container': '#00586b',
                        outline: '#859398',
                        'outline-variant': '#3c494e',
                    },
                    fontFamily: {
                        headline: ['Sora', 'sans-serif'],
                        body: ['Plus Jakarta Sans', 'sans-serif'],
                        label: ['JetBrains Mono', 'monospace'],
                    },
                    spacing: {
                        gutter: '24px',
                        'container-max': '1280px',
                    },
                },
            },
        };
    </script>
    <style>
        body {
            background:
                radial-gradient(circle at 15% 10%, rgba(60, 215, 255, .12), transparent 32%),
                radial-gradient(circle at 88% 20%, rgba(209, 188, 255, .11), transparent 34%),
                linear-gradient(135deg, #0b0e14 0%, #10131a 48%, #151827 100%);
            color: #e1e2eb;
            overflow-x: hidden;
        }
        .glass-panel {
            background: rgba(25, 28, 34, .58);
            border: 1px solid rgba(168, 232, 255, .12);
            box-shadow: 0 18px 50px rgba(0, 0, 0, .24);
            backdrop-filter: blur(16px);
        }
        .glow-hover {
            transition: transform .22s ease, border-color .22s ease, box-shadow .22s ease;
        }
        .glow-hover:hover {
            border-color: rgba(60, 215, 255, .52);
            box-shadow: 0 0 26px rgba(60, 215, 255, .2);
            transform: translateY(-3px);
        }
        .science-grid {
            background-image:
                linear-gradient(rgba(168, 232, 255, .045) 1px, transparent 1px),
                linear-gradient(90deg, rgba(168, 232, 255, .045) 1px, transparent 1px);
            background-size: 54px 54px;
        }
        .orbit {
            border: 1px solid rgba(168, 232, 255, .16);
            border-radius: 999px;
            position: absolute;
            transform: rotate(-18deg);
        }
        .nav-active {
            border-color: rgba(60, 215, 255, .5);
            background: rgba(0, 212, 255, .14);
            color: #a8e8ff;
        }
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: #10131a; }
        ::-webkit-scrollbar-thumb { background: #32353c; border-radius: 999px; }
        ::-webkit-scrollbar-thumb:hover { background: #3cd7ff; }
    </style>
</head>
<body class="font-body antialiased">
    <div class="pointer-events-none fixed inset-0 z-0 science-grid opacity-70"></div>
    <div class="pointer-events-none fixed inset-0 z-0 overflow-hidden">
        <div class="orbit left-[8%] top-[18%] h-44 w-72"></div>
        <div class="orbit right-[9%] top-[12%] h-64 w-64"></div>
        <div class="absolute left-[12%] top-[36%] h-2 w-2 rounded-full bg-primary-container shadow-[0_0_14px_#00d4ff]"></div>
        <div class="absolute right-[24%] top-[18%] h-2 w-2 rounded-full bg-tertiary shadow-[0_0_14px_#e6d8ff]"></div>
    </div>

    <aside class="fixed left-0 top-0 z-40 hidden h-screen w-64 flex-col border-r border-primary/10 bg-surface-container-low/75 p-4 shadow-[12px_0_40px_rgba(0,0,0,.28)] backdrop-blur-2xl lg:flex">
        <a class="mb-8 flex items-center gap-3 px-2 pt-3" href="{{ route('home') }}">
            <img alt="iLearn Science Logo" class="h-12 w-12 rounded-full border border-primary/20 object-contain shadow-[0_0_16px_rgba(60,215,255,.2)]" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBRlFDOjxkn2sD8rhXX_C9oZtkMTA0F2zIbuZyG9wIVQvasApaG3RmYgyG2Pvp2jL5OiIRqxkIx75Tsq4ci10yb8-EExxTPy1tjBBGxv1_B3mcIr9zJxx3s_rlbkerqWnrBAlY0nMbog5hJGyrtHKkEW2ogz66o1R7h0OAPWRoU3Y4Dy9K6RZJItpyPL-ZXT9Xn5m73Ru9ye9BaZqOLXhg7JJvqaSDws24wBFWt5ncypHJMLUZ0mtJgObLNXtQbZinBc0Bg4jGSDVg">
            <div>
                <h1 class="font-headline text-xl font-bold text-primary">iLearn Science</h1>
                <p class="font-label text-[11px] uppercase tracking-widest text-on-surface-variant">Customer Portal</p>
            </div>
        </a>
        <nav class="flex-1 space-y-1">
            @foreach ([
                ['space_dashboard', 'Dashboard', route('dashboard'), true],
                ['cloud_download', 'Downloads', '#dashboard-downloads', false],
                ['shopping_cart', 'Cart', route('cart'), false],
                ['receipt_long', 'Orders', route('orders'), false],
                ['article', 'Blog', route('blog'), false],
                ['favorite', 'Saved Items', '#dashboard-saved-items', false],
            ] as [$icon, $label, $href, $active])
                <a class="{{ $active ? 'nav-active' : 'border-transparent text-on-surface-variant hover:border-primary/30 hover:bg-surface-variant/35 hover:text-primary' }} relative flex items-center gap-3 rounded-xl border px-4 py-3 font-label text-sm transition-all" href="{{ $href }}">
                    <span class="material-symbols-outlined">{{ $icon }}</span>
                    <span>{{ $label }}</span>
                    @if ($label === 'Cart')
                        <span class="ml-auto flex h-6 min-w-6 items-center justify-center rounded-full bg-primary-container px-1 font-label text-[11px] font-bold text-on-primary shadow-[0_0_14px_rgba(0,212,255,.55)]" data-cart-count data-dashboard-cart-count>0</span>
                    @endif
                    @if ($label === 'Orders')
                        <span class="ml-auto flex h-6 min-w-6 items-center justify-center rounded-full bg-primary-container px-1 font-label text-[11px] font-bold text-on-primary shadow-[0_0_14px_rgba(0,212,255,.55)]" data-dashboard-sidebar-orders-count>0</span>
                    @endif
                    @if ($label === 'Downloads')
                        <span class="ml-auto flex h-6 min-w-6 items-center justify-center rounded-full bg-primary-container px-1 font-label text-[11px] font-bold text-on-primary shadow-[0_0_14px_rgba(0,212,255,.55)]" data-dashboard-sidebar-downloads-count>0</span>
                    @endif
                    @if ($label === 'Saved Items')
                        <span class="ml-auto flex h-6 min-w-6 items-center justify-center rounded-full bg-primary-container px-1 font-label text-[11px] font-bold text-on-primary shadow-[0_0_14px_rgba(0,212,255,.55)]" data-dashboard-sidebar-saved-count>0</span>
                    @endif
                </a>
            @endforeach
        </nav>
    </aside>

    <header class="sticky top-0 z-30 border-b border-primary/10 bg-surface/70 px-4 py-4 backdrop-blur-2xl lg:ml-64 lg:px-8">
        <div class="mx-auto flex max-w-container-max items-center justify-between gap-4">
            <div>
                <p class="font-label text-xs uppercase tracking-[0.3em] text-primary">Learner Command Center</p>
                <h2 class="font-headline text-2xl font-bold text-on-surface md:text-3xl" data-customer-dashboard-title>Customer Dashboard</h2>
            </div>
            <div class="flex items-center gap-3">
                <div data-auth-mount class="flex items-center gap-2"></div>
            </div>
        </div>
    </header>

    <main class="relative z-10 px-4 py-8 lg:ml-64 lg:px-8">
        <div class="mx-auto max-w-container-max space-y-8">
            <section class="grid grid-cols-1 gap-gutter xl:grid-cols-12">
                <article class="glass-panel overflow-hidden rounded-3xl p-6 md:p-8 xl:col-span-12">
                    <div class="grid gap-8 lg:grid-cols-[1.2fr_.8fr] lg:items-center">
                        <div>
                            <span class="inline-flex items-center gap-2 rounded-full border border-primary/25 bg-primary-container/10 px-3 py-1 font-label text-xs text-primary">
                                <span class="material-symbols-outlined text-[16px]">verified</span>
                                Active Customer
                            </span>
                            <h1 class="mt-5 font-headline text-4xl font-bold leading-tight text-on-surface md:text-5xl">Welcome back to your science resource vault.</h1>
                            <p class="mt-4 max-w-2xl text-on-surface-variant">Track your purchases, open downloads, continue saved lessons, and discover resource recommendations for your next classroom mission.</p>
                            <div class="mt-6 flex flex-wrap gap-3">
                                <a class="rounded-xl bg-primary-container px-5 py-3 font-label text-sm font-bold text-on-primary shadow-[0_0_20px_rgba(0,212,255,.32)] transition-all hover:scale-[1.02]" href="{{ route('shop') }}">Shop Resources</a>
                                <a class="rounded-xl border border-primary/35 px-5 py-3 font-label text-sm text-primary transition-all hover:bg-primary/10" href="{{ route('orders') }}">View Orders</a>
                            </div>
                        </div>
                        <div class="rounded-3xl border border-primary/15 bg-surface-container-low/60 p-5">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="font-label text-xs uppercase tracking-widest text-on-surface-variant">Mission Progress</p>
                                    <p class="mt-2 font-headline text-4xl font-bold text-primary" data-dashboard-mission-progress>0%</p>
                                </div>
                                <div class="relative flex h-24 w-24 items-center justify-center rounded-full border-4 border-primary/20">
                                    <div class="absolute inset-0 rounded-full border-t-4 border-primary-container animate-spin"></div>
                                    <span class="material-symbols-outlined text-primary">rocket_launch</span>
                                </div>
                            </div>
                            <p class="mt-4 text-sm text-on-surface-variant"><span data-dashboard-mission-summary>Loading your activity progress...</span> Next recommended topic: <span data-dashboard-next-topic>Finding best match...</span></p>
                        </div>
                    </div>
                </article>

            </section>

            <section class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-4">
                @foreach ([['Purchased Resources', '0', 'inventory_2', 'Purchased files'], ['Downloaded Files', '0', 'cloud_download', 'Customer downloads'], ['Items in Cart', '0', 'shopping_cart', 'Current cart'], ['Orders Completed', '0', 'receipt_long', 'Completed checkout']] as [$label, $value, $icon, $meta])
                    <article class="glass-panel glow-hover rounded-2xl p-5">
                        <div class="flex items-center justify-between">
                            <span class="flex h-12 w-12 items-center justify-center rounded-xl border border-primary/20 bg-primary-container/10 text-primary">
                                <span class="material-symbols-outlined">{{ $icon }}</span>
                            </span>
                            <span class="font-label text-xs text-primary" @if ($label === 'Items in Cart') data-dashboard-cart-meta @endif>{{ $meta }}</span>
                        </div>
                        <p class="mt-5 font-label text-xs uppercase tracking-widest text-on-surface-variant">{{ $label }}</p>
                        <p
                            class="mt-2 font-headline text-4xl font-bold text-on-surface"
                            @if ($label === 'Items in Cart') data-cart-count data-dashboard-cart-count @endif
                            @if ($label === 'Purchased Resources') data-dashboard-purchased-count @endif
                            @if ($label === 'Downloaded Files') data-dashboard-download-count @endif
                            @if ($label === 'Orders Completed') data-dashboard-orders-count @endif
                        >{{ $value }}</p>
                    </article>
                @endforeach
            </section>

            <section class="grid grid-cols-1 gap-gutter xl:grid-cols-2">
                <article id="dashboard-downloads" class="glass-panel scroll-mt-24 rounded-3xl p-6">
                    <div class="mb-5 flex items-center justify-between gap-4">
                        <div>
                            <p class="font-label text-xs uppercase tracking-[0.3em] text-primary">Customer Activity</p>
                            <h3 class="mt-2 font-headline text-2xl font-semibold">Downloaded Files</h3>
                            <p class="mt-1 text-sm text-on-surface-variant">Resources you downloaded from completed orders appear here in real time.</p>
                        </div>
                        <a class="rounded-xl border border-primary/30 px-4 py-2 font-label text-xs text-primary transition-all hover:bg-primary/10" href="{{ route('orders') }}">Open Orders</a>
                    </div>
                    <div class="space-y-3" data-dashboard-downloads-list>
                        <div class="rounded-2xl border border-white/5 bg-surface-container-low/50 p-5 text-center text-on-surface-variant">
                            <span class="material-symbols-outlined text-4xl text-primary">cloud_download</span>
                            <p class="mt-2">Loading your downloads...</p>
                        </div>
                    </div>
                </article>

                <article id="dashboard-saved-items" class="glass-panel scroll-mt-24 rounded-3xl p-6">
                    <div class="mb-5 flex items-center justify-between gap-4">
                        <div>
                            <p class="font-label text-xs uppercase tracking-[0.3em] text-primary">Customer Activity</p>
                            <h3 class="mt-2 font-headline text-2xl font-semibold">Saved Items</h3>
                            <p class="mt-1 text-sm text-on-surface-variant">Products saved from your browsing activity stay here for quick access.</p>
                        </div>
                        <a class="rounded-xl border border-primary/30 px-4 py-2 font-label text-xs text-primary transition-all hover:bg-primary/10" href="{{ route('shop') }}">Find More</a>
                    </div>
                    <div class="space-y-3" data-dashboard-saved-list>
                        <div class="rounded-2xl border border-white/5 bg-surface-container-low/50 p-5 text-center text-on-surface-variant">
                            <span class="material-symbols-outlined text-4xl text-primary">favorite</span>
                            <p class="mt-2">Loading saved items...</p>
                        </div>
                    </div>
                </article>
            </section>

            <section class="glass-panel rounded-3xl p-6">
                <div class="mb-6 flex flex-col justify-between gap-3 md:flex-row md:items-end">
                    <div>
                        <p class="font-label text-xs uppercase tracking-[0.3em] text-primary">Live Resource Inventory</p>
                        <h3 class="mt-2 font-headline text-2xl font-semibold">Available from Admin Inventory</h3>
                        <p class="mt-1 text-sm text-on-surface-variant">Products added, edited, or deleted by the admin appear here automatically.</p>
                    </div>
                    <a class="rounded-xl border border-primary/30 px-4 py-2 font-label text-xs text-primary transition-all hover:bg-primary/10" href="{{ route('shop') }}">Open Full Shop</a>
                </div>
                <div class="grid grid-cols-1 gap-5 md:grid-cols-2 xl:grid-cols-4" data-dashboard-products-grid>
                    <div class="rounded-2xl border border-white/10 bg-surface-container-low/55 p-6 text-center text-on-surface-variant">
                        <span class="material-symbols-outlined mb-2 text-4xl text-primary">inventory_2</span>
                        <p>Loading published resources...</p>
                    </div>
                </div>
            </section>

            <section class="grid grid-cols-1 gap-gutter xl:grid-cols-12">
                <article class="glass-panel rounded-3xl p-6 xl:col-span-8">
                    <div class="mb-6 flex items-center justify-between gap-4">
                        <div>
                            <h3 class="font-headline text-2xl font-semibold">My Learning Resources</h3>
                            <p class="text-sm text-on-surface-variant">Recently purchased and ready to open.</p>
                        </div>
                        <a class="font-label text-sm text-primary hover:underline" href="{{ route('shop') }}">Browse More</a>
                    </div>
                    <div class="grid grid-cols-1 gap-5 md:grid-cols-3" data-dashboard-learning-resources>
                        <div class="rounded-2xl border border-white/10 bg-surface-container-low/55 p-6 text-center text-on-surface-variant md:col-span-3">
                            <span class="material-symbols-outlined mb-2 text-4xl text-primary">inventory_2</span>
                            <p>Loading your purchased resources...</p>
                        </div>
                    </div>
                </article>

                <aside class="space-y-gutter xl:col-span-4">
                    <section class="glass-panel rounded-3xl p-6">
                        <h3 class="font-headline text-2xl font-semibold">Recent Orders</h3>
                        <div class="mt-5 space-y-3" data-dashboard-recent-orders>
                            <div class="rounded-2xl border border-white/5 bg-surface-container-low/50 p-5 text-center text-on-surface-variant">
                                <span class="material-symbols-outlined text-4xl text-primary">receipt_long</span>
                                <p class="mt-2">Loading your latest orders...</p>
                            </div>
                        </div>
                    </section>

                    <section class="glass-panel rounded-3xl p-6">
                        <div class="flex items-center justify-between gap-4">
                            <div>
                                <h3 class="font-headline text-2xl font-semibold">Current Cart</h3>
                                <p class="mt-1 text-sm text-on-surface-variant">Live items waiting for checkout.</p>
                            </div>
                            <a class="rounded-xl border border-primary/30 px-3 py-2 font-label text-xs text-primary transition-all hover:bg-primary/10" href="{{ route('cart') }}">Open Cart</a>
                        </div>
                        <div class="mt-5 space-y-3" data-dashboard-cart-list></div>
                        <div class="mt-5 rounded-2xl border border-primary/15 bg-primary-container/10 p-4">
                            <div class="flex items-center justify-between">
                                <span class="font-label text-xs uppercase tracking-widest text-on-surface-variant">Cart Total</span>
                                <span class="font-headline text-2xl font-semibold text-primary" data-dashboard-cart-total>₱0.00</span>
                            </div>
                            <p class="mt-2 text-sm text-on-surface-variant" data-dashboard-cart-summary>Your cart is empty.</p>
                        </div>
                    </section>

                    <section class="glass-panel rounded-3xl p-6">
                        <div class="flex items-center justify-between gap-4">
                            <div>
                                <h3 class="font-headline text-2xl font-semibold">Latest Science Blog</h3>
                                <p class="mt-1 text-sm text-on-surface-variant">Articles published from the admin blog appear here.</p>
                            </div>
                            <a class="rounded-xl border border-primary/30 px-3 py-2 font-label text-xs text-primary transition-all hover:bg-primary/10" href="{{ route('blog') }}">Read Blog</a>
                        </div>
                        <div class="mt-5 space-y-3" data-dashboard-blog-list>
                            <div class="rounded-2xl border border-white/5 bg-surface-container-low/50 p-5 text-center text-on-surface-variant">
                                <span class="material-symbols-outlined text-4xl text-primary">article</span>
                                <p class="mt-2">Loading latest posts...</p>
                            </div>
                        </div>
                    </section>

                    <section class="glass-panel rounded-3xl p-6">
                        <h3 class="font-headline text-2xl font-semibold">Recommended Next</h3>
                        <p class="mt-2 text-sm text-on-surface-variant" data-dashboard-recommendation-reason>Based on customer purchases and admin-published products.</p>
                        <div class="mt-5" data-dashboard-recommendation>
                            <div class="rounded-2xl border border-white/5 bg-surface-container-low/50 p-5 text-center text-on-surface-variant">
                                <span class="material-symbols-outlined text-4xl text-primary">auto_awesome</span>
                                <p class="mt-2">Finding your next best resource...</p>
                            </div>
                        </div>
                    </section>
                </aside>
            </section>
        </div>
    </main>

    <nav class="fixed bottom-0 left-0 z-40 flex h-16 w-full items-center justify-around border-t border-white/10 bg-surface-container-low/90 backdrop-blur-xl lg:hidden">
        @foreach ([['space_dashboard', route('dashboard'), true], ['science', route('shop'), false], ['shopping_cart', route('cart'), false], ['receipt_long', route('orders'), false]] as [$icon, $href, $active])
            <a class="{{ $active ? 'text-primary' : 'text-on-surface-variant' }} relative" href="{{ $href }}">
                <span class="material-symbols-outlined">{{ $icon }}</span>
                @if ($icon === 'shopping_cart')
                    <span class="absolute -right-3 -top-2 flex h-5 min-w-5 items-center justify-center rounded-full bg-primary-container px-1 font-label text-[10px] font-bold leading-none text-on-primary shadow-[0_0_12px_rgba(0,212,255,.65)]" data-cart-count data-dashboard-cart-count>0</span>
                @endif
            </a>
        @endforeach
    </nav>

    <div id="dashboard-cart-toast" class="fixed bottom-20 right-5 z-50 translate-y-2 rounded-2xl border border-primary/25 bg-surface-container/95 px-5 py-4 text-sm text-on-surface opacity-0 shadow-[0_0_24px_rgba(0,212,255,.22)] backdrop-blur-xl transition-all">
        <span id="dashboard-cart-toast-action" class="font-label text-primary">Added to cart:</span>
        <span id="dashboard-cart-toast-product">Science Resource</span>
    </div>

    <div id="dashboard-preview-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-surface/75 p-5 backdrop-blur-xl">
        <article class="glass-panel max-h-[90vh] w-full max-w-3xl overflow-y-auto rounded-3xl">
            <div class="relative">
                <img id="dashboard-preview-image" class="h-64 w-full object-cover" alt="Science resource preview">
                <button id="dashboard-preview-close" class="absolute right-4 top-4 flex h-10 w-10 items-center justify-center rounded-full border border-white/10 bg-surface/80 text-on-surface transition-all hover:border-primary/50 hover:text-primary" type="button" aria-label="Close preview">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            <div class="space-y-5 p-6">
                <div class="flex flex-wrap items-start justify-between gap-4">
                    <div>
                        <p id="dashboard-preview-category" class="font-label text-xs uppercase tracking-[0.3em] text-primary">Science Resource</p>
                        <h3 id="dashboard-preview-title" class="mt-2 font-headline text-3xl font-bold text-on-surface">Resource Preview</h3>
                    </div>
                    <span id="dashboard-preview-price" class="rounded-full border border-primary/25 bg-primary-container/10 px-4 py-2 font-label text-sm text-primary">₱0.00</span>
                </div>
                <p id="dashboard-preview-description" class="text-on-surface-variant"></p>
                <div class="grid gap-3 sm:grid-cols-2">
                    <div class="rounded-2xl border border-white/10 bg-surface-container-low/60 p-4">
                        <p class="font-label text-[11px] uppercase tracking-widest text-on-surface-variant">Grade Level</p>
                        <p id="dashboard-preview-grade" class="mt-1 font-headline text-lg text-on-surface">All Grades</p>
                    </div>
                    <div class="rounded-2xl border border-white/10 bg-surface-container-low/60 p-4">
                        <p class="font-label text-[11px] uppercase tracking-widest text-on-surface-variant">Format</p>
                        <p id="dashboard-preview-format" class="mt-1 font-headline text-lg text-on-surface">Digital File</p>
                    </div>
                </div>
                <div class="grid gap-3 sm:grid-cols-3">
                    <button id="dashboard-preview-add" class="rounded-xl bg-primary-container px-4 py-3 font-label text-sm font-bold text-on-primary transition-all hover:scale-[1.02]" type="button">
                        <span class="material-symbols-outlined align-middle text-[18px]">add_shopping_cart</span>
                        Cart
                    </button>
                    <button id="dashboard-preview-save" class="rounded-xl border border-primary/35 px-4 py-3 font-label text-sm font-bold text-primary transition-all hover:bg-primary/10" type="button">
                        <span class="material-symbols-outlined align-middle text-[18px]">favorite</span>
                        Save
                    </button>
                    <a class="rounded-xl border border-primary/35 px-4 py-3 text-center font-label text-sm font-bold text-primary transition-all hover:bg-primary/10" href="{{ route('shop') }}">View Shop</a>
                </div>
            </div>
        </article>
    </div>

    <script>
        const dashboardCartStorageKey = 'ilearnScienceCartItems';
        const dashboardCheckoutStorageKey = 'ilearnScienceLastCheckout';
        const dashboardDownloadedFilesStorageKey = 'ilearnScienceDownloadedFiles';
        const dashboardDownloadedProductsStorageKey = 'ilearnScienceDownloadedProducts';
        const dashboardSavedItemsStorageKey = 'ilearnScienceSavedItems';
        const dashboardWishlistStorageKey = 'ilearnScienceWishlistItems';
        const dashboardActivityStorageKey = 'ilearnScienceCustomerActivity';
        const dashboardInventoryStorageKey = 'ilearnScienceInventoryProducts';
        const dashboardBlogStorageKey = 'ilearnScienceBlogPosts';
        const dashboardBlogInitializedKey = 'ilearnScienceBlogPostsInitialized';
        const dashboardProductsEndpoint = '{{ route('products.index') }}';
        const dashboardBlogsEndpoint = '{{ route('blogs.index') }}';
        const dashboardProductSyncChannel = 'BroadcastChannel' in window ? new BroadcastChannel('ilearn-products-sync') : null;
        const dashboardBlogSyncChannel = 'BroadcastChannel' in window ? new BroadcastChannel('ilearn-blog-sync') : null;
        let lastDashboardInventorySnapshot = '';
        let lastDashboardBlogSnapshot = '';
        const defaultDashboardCartItems = [
            {
                id: 'advanced-biology-ppt',
                title: 'Advanced Biology PPT',
                meta: 'Digital Resource - v2.4',
                price: 12.99,
                image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuDAukcxKIeiLZnlciZdGHXQXy4iKMk5x-tGgi6TFF9Sfe2xAbJvYHL-ZC8QnE7ffN8aNYOAezSH0Tj97sk_N4jSWS0Fi-fLIIOe_GEcsQDy-Q3Git7Zsvv9jd-3aksYLZm4n_e9Nwev_zdKaEgIZetNpoYFBQIvs1CsSN9Rj8uZXbmpC3w1SXnltKVlUgxzOY6l7SiVFE5VBWD9mn3M13-GXtO6fWm6DG_Z3oeCsZ474bR-1i29uZ1PURiMSTDrjBNPKGoExuy-MHk',
                quantity: 1,
            },
            {
                id: 'physics-lab-worksheets',
                title: 'Physics Lab Worksheets',
                meta: 'PDF Bundle - 45 Pages',
                price: 12.99,
                image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuBojzpBdmxN9PsX8hQhpf-SAKxoOzUasNe7LVwmHLwKmusbXaGCTShjD13RlH4TahuD0TLcy5RDFo_-rk_pIgulmr8vhpELtSAVpvE4-i6GIzL5vqnjan5AsqkKAeeTYV1zcxqh-GwPk224UNAqPXYnbYJ7gv5sHGYd8ta3nrnfvkHDI17Rq9TN0hHgzafutTJMBNMjgDHwopj_jhKZRw8AMPKlpweS9z0mJCinBPQQc-w2M4LAdBCjyVswiTkfNyu14SBEGeuz2A8',
                quantity: 1,
            },
            {
                id: 'chemistry-study-guide',
                title: 'Chemistry Study Guide',
                meta: 'Interactive E-Book',
                price: 12.99,
                image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuCPPifHph78pWofuqtVNjb6V-PLYAh0tthoPV29K8qbg1Hv1B-iMoInZd5zkM3IEUG-p70cbjpgCovfozMZv5CRK-WCHZbyV9qSJARc43tSFj5y0Zy7gIRSHAeHUrbTXYsHGfC1JUD7z0HVOmVRxQ0YLyG5ot_ckNO2l2D3y4RKVsGMl2Vc-96aVEuTetl-Fl96i8qBsHzyRsS5UB7I7_B1lhFS8Z1JW-Fp6LE5l1CDj9BJmh0ha-yaEL7VtNDyl3Dvy25kJZO_dy0',
                quantity: 1,
            },
        ];

        function dashboardParsePeso(value) {
            return Number.parseFloat(String(value).replace(/[₱,]/g, '')) || 0;
        }

        function dashboardFormatPeso(value) {
            return `₱${Math.max(0, value).toFixed(2)}`;
        }

        function dashboardSlugify(value = '') {
            return String(value).toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^-|-$/g, '') || 'science-resource';
        }

        function dashboardEscapeHTML(value = '') {
            return String(value).replace(/[&<>"']/g, (char) => ({
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#039;',
            }[char]));
        }

        function normalizeDashboardCartItem(item) {
            return {
                id: item.id || item.title?.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^-|-$/g, ''),
                title: item.title || 'Science Resource',
                meta: item.meta || item.type || 'Digital Resource',
                price: dashboardParsePeso(item.price),
                image: item.image || '',
                quantity: Math.max(1, Number.parseInt(item.quantity || '1', 10) || 1),
            };
        }

        function getDashboardCartItems() {
            if (window.iLearnAuth?.getCartItems) return window.iLearnAuth.getCartItems().map(normalizeDashboardCartItem);
            if (localStorage.getItem(dashboardCartStorageKey) === null) {
                return [];
            }

            try {
                return (JSON.parse(localStorage.getItem(dashboardCartStorageKey)) || []).map(normalizeDashboardCartItem);
            } catch {
                return [];
            }
        }

        function getDashboardSessionEmail() {
            try {
                const session = JSON.parse(sessionStorage.getItem('ilearnScienceAuthSession') || localStorage.getItem('ilearnScienceCurrentUser') || localStorage.getItem('ilearnScienceRememberedUser') || 'null');
                return String(session?.email || '').toLowerCase();
            } catch {
                return '';
            }
        }

        function getDashboardLastCheckout() {
            try {
                return JSON.parse(localStorage.getItem(dashboardCheckoutStorageKey) || 'null');
            } catch {
                return null;
            }
        }

        function getDashboardDownloadCount() {
            const currentEmail = getDashboardSessionEmail();
            if (!currentEmail) return 0;

            try {
                const downloads = JSON.parse(localStorage.getItem(dashboardDownloadedFilesStorageKey) || '{}') || {};
                const customerDownloads = downloads[currentEmail] || {};
                return Object.values(customerDownloads).reduce((sum, count) => sum + (Number(count) || 0), 0);
            } catch {
                return 0;
            }
        }

        function getDashboardPurchasedCount() {
            return getDashboardCustomerOrders().reduce((total, order) => {
                return total + order.items.reduce((sum, item) => sum + (Number(item.quantity) || 1), 0);
            }, 0);
        }

        function dashboardOrderDate(value) {
            if (!value) return 'Recent checkout';
            const date = new Date(value);
            if (Number.isNaN(date.getTime())) return 'Recent checkout';
            return date.toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' });
        }

        function dashboardOrderTitle(items = []) {
            if (!items.length) return 'Science resources';
            const names = items.slice(0, 2).map((item) => item.title || 'Science Resource').join(' + ');
            return items.length > 2 ? `${names} + ${items.length - 2} more` : names;
        }

        function normalizeDashboardOrderItem(item) {
            return {
                id: item.id || dashboardSlugify(item.title || 'science-resource'),
                title: item.title || 'Science Resource',
                meta: item.meta || item.type || 'Digital Resource',
                price: dashboardParsePeso(item.price),
                image: item.image || '',
                quantity: Math.max(1, Number.parseInt(item.quantity || '1', 10) || 1),
            };
        }

        function getDashboardDownloadedOrders(email) {
            if (!email) return [];
            try {
                const downloads = JSON.parse(localStorage.getItem(dashboardDownloadedProductsStorageKey) || '{}') || {};
                const customerOrders = downloads[email] || {};
                return Object.entries(customerOrders).map(([orderNumber, orderItems]) => {
                    const items = Object.values(orderItems || {}).map(normalizeDashboardOrderItem);
                    return {
                        number: orderNumber,
                        date: 'Downloaded resources',
                        status: 'Downloaded',
                        items,
                        title: dashboardOrderTitle(items),
                    };
                }).filter((order) => order.items.length);
            } catch {
                return [];
            }
        }

        function dashboardCollectionItems(collection, email) {
            if (!email) return [];
            if (Array.isArray(collection)) return collection.map(normalizeDashboardOrderItem);
            if (collection && typeof collection === 'object') {
                const customerValue = collection[email] || collection[email.toLowerCase()] || [];
                if (Array.isArray(customerValue)) return customerValue.map(normalizeDashboardOrderItem);
                if (customerValue && typeof customerValue === 'object') {
                    return Object.values(customerValue).map(normalizeDashboardOrderItem);
                }
            }
            return [];
        }

        function getDashboardSavedItems() {
            const email = getDashboardSessionEmail();
            if (!email) return [];
            try {
                const saved = JSON.parse(localStorage.getItem(dashboardSavedItemsStorageKey) || '{}') || {};
                const wishlist = JSON.parse(localStorage.getItem(dashboardWishlistStorageKey) || '{}') || {};
                const items = [
                    ...dashboardCollectionItems(saved, email),
                    ...dashboardCollectionItems(wishlist, email),
                ];
                const uniqueItems = new Map();
                items.forEach((item) => {
                    uniqueItems.set(item.id || dashboardSlugify(item.title), item);
                });
                return Array.from(uniqueItems.values());
            } catch {
                return [];
            }
        }

        function getDashboardCustomerActivities() {
            const email = getDashboardSessionEmail();
            if (!email) return [];
            try {
                const activities = JSON.parse(localStorage.getItem(dashboardActivityStorageKey) || '[]') || [];
                return activities.filter((activity) => String(activity?.user?.email || '').toLowerCase() === email);
            } catch {
                return [];
            }
        }

        function updateDashboardMissionProgress({ downloads = getDashboardDownloadCount(), purchased = getDashboardPurchasedCount(), orders = getDashboardCustomerOrders(), savedItems = getDashboardSavedItems(), cartItems = getDashboardCartItems() } = {}) {
            const activities = getDashboardCustomerActivities();
            const exploredPages = new Set(activities.map((activity) => activity.path).filter(Boolean));
            const blogReads = activities.filter((activity) => /blog/i.test(`${activity.type} ${activity.label} ${activity.path}`)).length;
            const cartCount = cartItems.reduce((sum, item) => sum + (Number(item.quantity) || 1), 0);

            const points = Math.min(cartCount * 5, 15)
                + Math.min(savedItems.length * 5, 15)
                + Math.min(orders.length * 15, 25)
                + Math.min(downloads * 8, 25)
                + Math.min(exploredPages.size * 3 + blogReads * 2, 20);
            const progress = Math.min(100, Math.round(points));

            const completedActions = [
                cartCount > 0,
                savedItems.length > 0,
                purchased > 0 || orders.length > 0,
                downloads > 0,
                exploredPages.size > 1 || blogReads > 0,
            ].filter(Boolean).length;

            const summary = completedActions
                ? `Completed ${completedActions} of 5 learning actions from your real activity.`
                : 'Start by browsing, saving, carting, purchasing, or downloading resources.';

            document.querySelectorAll('[data-dashboard-mission-progress]').forEach((target) => {
                target.textContent = `${progress}%`;
            });
            document.querySelectorAll('[data-dashboard-mission-summary]').forEach((target) => {
                target.textContent = summary;
            });
        }

        function saveDashboardItem(product) {
            const email = getDashboardSessionEmail();
            if (!email) {
                if (window.iLearnAuth?.openSignIn) {
                    window.iLearnAuth.openSignIn('Please sign in or create an account to save resources.');
                }
                return;
            }

            const normalized = normalizeDashboardProduct(product);
            const item = {
                id: normalized.id,
                title: normalized.title,
                meta: normalized.category,
                price: normalized.price,
                image: normalized.image,
                quantity: 1,
            };
            let saved = {};
            try {
                saved = JSON.parse(localStorage.getItem(dashboardSavedItemsStorageKey) || '{}') || {};
            } catch {
                saved = {};
            }
            saved[email] = Array.isArray(saved[email]) ? saved[email] : Object.values(saved[email] || {});
            if (!saved[email].some((savedItem) => (savedItem.id || dashboardSlugify(savedItem.title)) === item.id)) {
                saved[email].push(item);
            }
            localStorage.setItem(dashboardSavedItemsStorageKey, JSON.stringify(saved));
            window.dispatchEvent(new CustomEvent('ilearn:saved-updated'));
            renderDashboardSavedItems();
            showDashboardCartToast(normalized.title, 'Saved item:');
        }

        function getDashboardCustomerOrders() {
            const currentEmail = getDashboardSessionEmail();
            const checkout = getDashboardLastCheckout();
            const checkoutEmail = String(checkout?.customer?.email || '').toLowerCase();
            const orders = [];

            if (checkout?.items?.length && (!checkoutEmail || !currentEmail || checkoutEmail === currentEmail)) {
                const items = checkout.items.map(normalizeDashboardOrderItem);
                orders.push({
                    number: checkout.orderNumber || '#ILS-LATEST',
                    date: dashboardOrderDate(checkout.checkedOutAt),
                    status: checkout.paymentStatus === 'verified' ? 'Paid' : 'Pending',
                    items,
                    title: dashboardOrderTitle(items),
                });
            }

            getDashboardDownloadedOrders(currentEmail).forEach((order) => {
                if (!orders.some((existing) => existing.number === order.number)) orders.push(order);
            });

            return orders;
        }

        function getDashboardPurchasedItems() {
            const uniqueItems = new Map();
            getDashboardCustomerOrders().forEach((order, orderIndex) => {
                order.items.forEach((item) => {
                    const id = item.id || dashboardSlugify(item.title);
                    const existing = uniqueItems.get(id);
                    if (existing) {
                        existing.quantity += Number(item.quantity) || 1;
                        existing.orderNumbers.add(order.number);
                    } else {
                        uniqueItems.set(id, {
                            ...item,
                            orderDate: order.date,
                            orderNumber: order.number,
                            orderIndex,
                            orderNumbers: new Set([order.number]),
                        });
                    }
                });
            });

            return Array.from(uniqueItems.values())
                .sort((a, b) => a.orderIndex - b.orderIndex)
                .map((item) => ({
                    ...item,
                    orderNumbers: Array.from(item.orderNumbers),
                }));
        }

        function renderDashboardLearningResources() {
            const grid = document.querySelector('[data-dashboard-learning-resources]');
            if (!grid) return;
            const items = getDashboardPurchasedItems();

            if (!items.length) {
                grid.innerHTML = `
                    <div class="rounded-2xl border border-white/10 bg-surface-container-low/55 p-6 text-center text-on-surface-variant md:col-span-3">
                        <span class="material-symbols-outlined mb-2 text-4xl text-primary">inventory_2</span>
                        <p class="font-headline text-lg text-on-surface">No purchased resources yet</p>
                        <p class="mt-1 text-sm">Products will appear here after the customer successfully checks out.</p>
                        <a class="mt-4 inline-flex rounded-xl border border-primary/30 px-4 py-2 font-label text-xs text-primary transition-all hover:bg-primary/10" href="{{ route('shop') }}">Shop Resources</a>
                    </div>
                `;
                return;
            }

            grid.innerHTML = items.slice(0, 6).map((item) => `
                <article class="overflow-hidden rounded-2xl border border-white/10 bg-surface-container-low/55 transition-all hover:border-primary/40">
                    ${item.image ? `<img class="h-36 w-full object-cover" alt="${dashboardEscapeHTML(item.title)}" src="${dashboardEscapeHTML(item.image)}">` : `<div class="flex h-36 w-full items-center justify-center bg-surface-container-high text-primary"><span class="material-symbols-outlined text-5xl">description</span></div>`}
                    <div class="p-4">
                        <span class="rounded-full bg-primary-container/10 px-2 py-1 font-label text-[10px] text-primary">${dashboardEscapeHTML(item.meta)}</span>
                        <h4 class="mt-3 line-clamp-2 font-headline text-lg font-semibold">${dashboardEscapeHTML(item.title)}</h4>
                        <p class="mt-1 text-sm text-on-surface-variant">Qty ${item.quantity} - ${dashboardEscapeHTML(item.orderDate || 'Purchased')}</p>
                        <p class="mt-1 truncate font-label text-[11px] text-on-surface-variant">${dashboardEscapeHTML(item.orderNumbers.join(', '))}</p>
                        <div class="mt-4 flex gap-2">
                            <a class="flex-1 rounded-lg bg-primary-container py-2 text-center font-label text-xs font-bold text-on-primary" href="{{ route('orders') }}">Open</a>
                            <a class="rounded-lg border border-primary/25 px-3 py-2 text-primary" href="{{ route('orders') }}" title="Download from orders">
                                <span class="material-symbols-outlined text-[18px]">download</span>
                            </a>
                        </div>
                    </div>
                </article>
            `).join('');
        }

        function updateDashboardDownloadStats() {
            const downloads = getDashboardDownloadCount();
            const purchased = getDashboardPurchasedCount();
            const orders = getDashboardCustomerOrders();
            const savedItems = getDashboardSavedItems();
            const cartItems = getDashboardCartItems();
            document.querySelectorAll('[data-dashboard-purchased-count]').forEach((target) => {
                target.textContent = purchased;
            });
            document.querySelectorAll('[data-dashboard-download-count]').forEach((target) => {
                target.textContent = downloads;
            });
            document.querySelectorAll('[data-dashboard-orders-count]').forEach((target) => {
                target.textContent = orders.length;
            });
            document.querySelectorAll('[data-dashboard-sidebar-orders-count]').forEach((target) => {
                target.textContent = orders.length;
                target.classList.toggle('hidden', orders.length === 0);
            });
            document.querySelectorAll('[data-dashboard-sidebar-downloads-count]').forEach((target) => {
                target.textContent = downloads;
                target.classList.toggle('hidden', downloads === 0);
            });
            renderDashboardRecentOrders(orders);
            renderDashboardLearningResources();
            renderDashboardDownloads();
            renderDashboardSavedItems();
            updateDashboardMissionProgress({ downloads, purchased, orders, savedItems, cartItems });
            renderDashboardRecommendation();
        }

        function renderDashboardRecentOrders(orders = getDashboardCustomerOrders()) {
            const list = document.querySelector('[data-dashboard-recent-orders]');
            if (!list) return;

            if (!orders.length) {
                list.innerHTML = `
                    <div class="rounded-2xl border border-white/5 bg-surface-container-low/50 p-5 text-center">
                        <span class="material-symbols-outlined text-4xl text-primary">receipt_long</span>
                        <p class="mt-2 font-headline text-lg font-semibold">No orders yet</p>
                        <p class="mt-1 text-sm text-on-surface-variant">Completed checkouts will appear here in real time.</p>
                        <a class="mt-4 inline-flex rounded-xl border border-primary/30 px-4 py-2 font-label text-xs text-primary transition-all hover:bg-primary/10" href="{{ route('shop') }}">Shop Resources</a>
                    </div>
                `;
                return;
            }

            list.innerHTML = orders.slice(0, 3).map((order) => `
                <a class="block rounded-2xl border border-white/5 bg-surface-container-low/50 p-4 transition-all hover:border-primary/35 hover:bg-surface-container/70" href="{{ route('orders') }}">
                    <div class="flex items-center justify-between gap-3">
                        <p class="font-label text-xs text-primary">${dashboardEscapeHTML(order.number)}</p>
                        <span class="rounded-full bg-green-400/10 px-3 py-1 font-label text-[10px] text-green-300">${dashboardEscapeHTML(order.status)}</span>
                    </div>
                    <p class="mt-2 line-clamp-1 text-sm text-on-surface">${dashboardEscapeHTML(order.title)}</p>
                    <p class="mt-1 font-label text-[11px] text-on-surface-variant">${dashboardEscapeHTML(order.date)} - ${order.items.reduce((sum, item) => sum + item.quantity, 0)} item${order.items.reduce((sum, item) => sum + item.quantity, 0) === 1 ? '' : 's'}</p>
                </a>
            `).join('');
        }

        function renderDashboardDownloads() {
            const list = document.querySelector('[data-dashboard-downloads-list]');
            if (!list) return;

            const email = getDashboardSessionEmail();
            const downloadedOrders = getDashboardDownloadedOrders(email);
            const downloadedItems = downloadedOrders.flatMap((order) => {
                return order.items.map((item) => ({ ...item, orderNumber: order.number, date: order.date }));
            });

            if (!downloadedItems.length) {
                list.innerHTML = `
                    <div class="rounded-2xl border border-white/5 bg-surface-container-low/50 p-5 text-center">
                        <span class="material-symbols-outlined text-4xl text-primary">cloud_download</span>
                        <p class="mt-2 font-headline text-lg font-semibold">No downloads yet</p>
                        <p class="mt-1 text-sm text-on-surface-variant">Use the Download action in your Orders page and your files will appear here.</p>
                        <a class="mt-4 inline-flex rounded-xl border border-primary/30 px-4 py-2 font-label text-xs text-primary transition-all hover:bg-primary/10" href="{{ route('orders') }}">View Orders</a>
                    </div>
                `;
                return;
            }

            list.innerHTML = downloadedItems.slice(0, 5).map((item) => `
                <a class="flex items-center gap-4 rounded-2xl border border-white/5 bg-surface-container-low/50 p-4 transition-all hover:border-primary/35 hover:bg-surface-container/70" href="{{ route('orders') }}">
                    ${item.image ? `<img class="h-14 w-14 rounded-xl object-cover" alt="${dashboardEscapeHTML(item.title)}" src="${dashboardEscapeHTML(item.image)}">` : `<span class="material-symbols-outlined flex h-14 w-14 items-center justify-center rounded-xl bg-primary-container/10 text-primary">description</span>`}
                    <div class="min-w-0 flex-1">
                        <p class="line-clamp-1 font-headline font-semibold">${dashboardEscapeHTML(item.title)}</p>
                        <p class="mt-1 font-label text-[11px] text-on-surface-variant">${dashboardEscapeHTML(item.orderNumber)} - ${item.quantity} downloaded</p>
                    </div>
                    <span class="material-symbols-outlined text-primary">download_done</span>
                </a>
            `).join('');
        }

        function renderDashboardSavedItems() {
            const list = document.querySelector('[data-dashboard-saved-list]');
            const savedItems = getDashboardSavedItems();

            document.querySelectorAll('[data-dashboard-sidebar-saved-count]').forEach((target) => {
                target.textContent = savedItems.length;
                target.classList.toggle('hidden', savedItems.length === 0);
            });
            updateDashboardMissionProgress({ savedItems });

            if (!list) return;

            if (!savedItems.length) {
                list.innerHTML = `
                    <div class="rounded-2xl border border-white/5 bg-surface-container-low/50 p-5 text-center">
                        <span class="material-symbols-outlined text-4xl text-primary">favorite</span>
                        <p class="mt-2 font-headline text-lg font-semibold">No saved items yet</p>
                        <p class="mt-1 text-sm text-on-surface-variant">Save products from the dashboard inventory to build your quick-access list.</p>
                        <a class="mt-4 inline-flex rounded-xl border border-primary/30 px-4 py-2 font-label text-xs text-primary transition-all hover:bg-primary/10" href="{{ route('shop') }}">Browse Resources</a>
                    </div>
                `;
                return;
            }

            list.innerHTML = savedItems.slice(0, 5).map((item) => `
                <a class="flex items-center gap-4 rounded-2xl border border-white/5 bg-surface-container-low/50 p-4 transition-all hover:border-primary/35 hover:bg-surface-container/70" href="{{ route('shop') }}">
                    ${item.image ? `<img class="h-14 w-14 rounded-xl object-cover" alt="${dashboardEscapeHTML(item.title)}" src="${dashboardEscapeHTML(item.image)}">` : `<span class="material-symbols-outlined flex h-14 w-14 items-center justify-center rounded-xl bg-primary-container/10 text-primary">favorite</span>`}
                    <div class="min-w-0 flex-1">
                        <p class="line-clamp-1 font-headline font-semibold">${dashboardEscapeHTML(item.title)}</p>
                        <p class="mt-1 font-label text-[11px] text-on-surface-variant">${dashboardEscapeHTML(item.meta)} - ${dashboardFormatPeso(item.price)}</p>
                    </div>
                    <span class="material-symbols-outlined text-primary">arrow_forward</span>
                </a>
            `).join('');
        }

        function setDashboardCartItems(items) {
            if (window.iLearnAuth?.setCartItems) {
                window.iLearnAuth.setCartItems(items);
                return;
            }
            localStorage.setItem(dashboardCartStorageKey, JSON.stringify(items.map(normalizeDashboardCartItem)));
        }

        function readDashboardInventory() {
            try {
                const saved = JSON.parse(localStorage.getItem(dashboardInventoryStorageKey) || 'null');
                const initialized = localStorage.getItem(`${dashboardInventoryStorageKey}Initialized`) === 'true';
                return Array.isArray(saved) && (saved.length || initialized) ? saved : [];
            } catch {
                return [];
            }
        }

        async function refreshDashboardInventoryFromServer() {
            try {
                const response = await fetch(`${dashboardProductsEndpoint}?t=${Date.now()}`, {
                    cache: 'no-store',
                    headers: { Accept: 'application/json' },
                });
                if (!response.ok) throw new Error('Unable to load live products.');
                const data = await response.json();
                if (Array.isArray(data.products)) {
                    localStorage.setItem(dashboardInventoryStorageKey, JSON.stringify(data.products));
                    localStorage.setItem(`${dashboardInventoryStorageKey}Initialized`, 'true');
                    renderDashboardProducts(true);
                }
            } catch (error) {
                console.error(error);
            }
        }

        function readDashboardBlogs() {
            try {
                const saved = JSON.parse(localStorage.getItem(dashboardBlogStorageKey) || '[]');
                const initialized = localStorage.getItem(dashboardBlogInitializedKey) === 'true';
                return Array.isArray(saved) && (saved.length || initialized) ? saved : [];
            } catch {
                return [];
            }
        }

        function saveDashboardBlogs(posts, shouldRender = true) {
            localStorage.setItem(dashboardBlogStorageKey, JSON.stringify(posts));
            localStorage.setItem(dashboardBlogInitializedKey, 'true');
            if (shouldRender) renderDashboardBlogs(true);
        }

        async function refreshDashboardBlogsFromServer() {
            try {
                const response = await fetch(dashboardBlogsEndpoint, { headers: { Accept: 'application/json' } });
                if (!response.ok) throw new Error('Unable to load live blog posts.');
                const data = await response.json();
                if (Array.isArray(data.posts)) saveDashboardBlogs(data.posts);
            } catch (error) {
                console.error(error);
            }
        }

        function normalizeDashboardProduct(product) {
            const category = product.category || product.type || 'Digital Resource';
            return {
                id: product.id || dashboardSlugify(product.title),
                title: product.title || 'Science Resource',
                meta: category === 'Visual Resource' ? 'Visual Resource' : `${category} Resource`,
                price: dashboardParsePeso(product.price),
                priceLabel: dashboardFormatPeso(dashboardParsePeso(product.price)),
                image: product.image || '',
                description: product.description || 'Digital learning material for science classes.',
                category,
                grade: product.grade || 'All Grades',
                format: product.format || product.fileType || 'Digital File',
                status: product.status || 'Published',
                updatedAt: product.updatedAt || product.publishedAt || product.createdAt || '',
            };
        }

        function dashboardActiveProducts() {
            return readDashboardInventory()
                .filter((product) => (product.status || 'Published') === 'Published')
                .map(normalizeDashboardProduct);
        }

        function dashboardFlattenDownloadedProducts() {
            try {
                const downloads = JSON.parse(localStorage.getItem(dashboardDownloadedProductsStorageKey) || '{}') || {};
                return Object.values(downloads).flatMap((customerOrders) =>
                    Object.values(customerOrders || {}).flatMap((orderItems) => Object.values(orderItems || {}))
                );
            } catch {
                return [];
            }
        }

        function scoreRecommendedProduct(scores, product, score, reason) {
            const normalized = normalizeDashboardProduct(product);
            const existing = scores.get(normalized.id);
            if (existing) {
                existing.score += score;
                existing.reason = existing.reason === 'Recommended from admin products' ? reason : existing.reason;
                existing.image = existing.image || normalized.image;
                existing.description = existing.description || normalized.description;
                return;
            }
            scores.set(normalized.id, { ...normalized, score, reason });
        }

        function pickDashboardRecommendation() {
            const products = dashboardActiveProducts();
            const scores = new Map();

            products.forEach((product, index) => {
                const topicBoost = /biology|photosynthesis|digestive|heredity|pedigree|taxonomy|cell/i.test(`${product.title} ${product.category} ${product.description}`) ? 1 : 0;
                scoreRecommendedProduct(scores, product, Math.max(0.2, 1 - (index * 0.05)) + topicBoost, 'Recommended from admin products');
            });

            const checkout = getDashboardLastCheckout();
            if (checkout?.items?.length) {
                checkout.items.forEach((item) => {
                    scoreRecommendedProduct(scores, item, (Number(item.quantity) || 1) * 4, 'Recommended from purchased products');
                });
            }

            dashboardFlattenDownloadedProducts().forEach((item) => {
                scoreRecommendedProduct(scores, item, (Number(item.quantity) || 1) * 5, 'Recommended from downloaded best sellers');
            });

            const recommendations = Array.from(scores.values()).sort((a, b) => b.score - a.score || a.title.localeCompare(b.title));
            if (recommendations.length) return recommendations[0];

            return normalizeDashboardProduct({
                id: 'photosynthesis-study-guide',
                title: 'Photosynthesis Study Guide',
                category: 'Study Guides',
                price: 180,
                image: '/images/shop/photosynthesis-process-topic.svg',
                description: 'A clear, visual guide for teaching photosynthesis concepts with classroom-ready activities.',
                status: 'Published',
            });
        }

        function pickDashboardAuthorNextTopic() {
            const products = dashboardActiveProducts();
            if (!products.length) return null;

            const ownedIds = new Set(getDashboardCustomerOrders()
                .flatMap((order) => order.items || [])
                .map((item) => item.id || dashboardSlugify(item.title)));
            const savedIds = new Set(getDashboardSavedItems().map((item) => item.id || dashboardSlugify(item.title)));

            return products
                .map((product, index) => {
                    const recentTime = new Date(product.updatedAt || 0).getTime();
                    const recentBoost = Number.isNaN(recentTime) ? 0 : Math.min(2, recentTime / Date.now());
                    const topicBoost = /biology|photosynthesis|digestive|heredity|pedigree|taxonomy|cell|quiz|worksheet/i.test(`${product.title} ${product.category} ${product.description}`) ? 1 : 0;
                    const freshForCustomerBoost = ownedIds.has(product.id) ? -3 : 2;
                    const savedBoost = savedIds.has(product.id) ? -1 : 0;
                    return {
                        ...product,
                        authorScore: Math.max(0.2, 1 - (index * 0.05)) + recentBoost + topicBoost + freshForCustomerBoost + savedBoost,
                    };
                })
                .sort((a, b) => b.authorScore - a.authorScore || a.title.localeCompare(b.title))[0];
        }

        function renderDashboardRecommendation() {
            const container = document.querySelector('[data-dashboard-recommendation]');
            const reason = document.querySelector('[data-dashboard-recommendation-reason]');
            if (!container) return;

            const product = pickDashboardRecommendation();
            const nextTopic = pickDashboardAuthorNextTopic();
            const reasonText = product.reason || 'Recommended from admin products';
            if (reason) reason.textContent = reasonText;
            document.querySelectorAll('[data-dashboard-next-topic]').forEach((target) => {
                target.textContent = nextTopic?.title || 'No author-uploaded products yet';
            });

            container.innerHTML = `
                <article class="rounded-2xl border border-primary/15 bg-primary-container/10 p-4 transition-all hover:border-primary/45 hover:bg-primary-container/15">
                    <div class="flex gap-4">
                    ${product.image ? `<img class="h-20 w-20 rounded-xl object-cover" alt="${dashboardEscapeHTML(product.title)}" src="${dashboardEscapeHTML(product.image)}">` : `<div class="flex h-20 w-20 shrink-0 items-center justify-center rounded-xl bg-surface-container-high text-primary"><span class="material-symbols-outlined text-4xl">science</span></div>`}
                    <div class="min-w-0 flex-1">
                        <p class="line-clamp-2 font-headline font-semibold">${dashboardEscapeHTML(product.title)}</p>
                        <p class="mt-1 line-clamp-2 text-sm text-on-surface-variant">${dashboardEscapeHTML(product.description)}</p>
                        <div class="mt-3 flex items-center justify-between gap-3">
                            <span class="rounded-full border border-primary/20 bg-surface-container-low px-2 py-1 font-label text-[10px] text-primary">${dashboardEscapeHTML(product.category)}</span>
                            <span class="font-label text-sm text-primary">${dashboardEscapeHTML(product.priceLabel)}</span>
                        </div>
                    </div>
                    </div>
                    <div class="mt-4 grid grid-cols-3 gap-2">
                        <button class="rounded-xl border border-primary/25 px-3 py-2 font-label text-xs font-bold text-primary transition-all hover:bg-primary/10" type="button" data-dashboard-product-preview="${dashboardEscapeHTML(product.id)}">Preview</button>
                        <button class="rounded-xl border border-primary/25 px-3 py-2 font-label text-xs font-bold text-primary transition-all hover:bg-primary/10" type="button" data-dashboard-product-save="${dashboardEscapeHTML(product.id)}">Save</button>
                        <button class="rounded-xl bg-primary-container px-3 py-2 font-label text-xs font-bold text-on-primary transition-all hover:scale-[1.02]" type="button" data-dashboard-product-add="${dashboardEscapeHTML(product.id)}">
                            <span class="material-symbols-outlined align-middle text-[16px]">add_shopping_cart</span>
                        </button>
                    </div>
                </article>
            `;
        }

        let dashboardPreviewProduct = null;

        function openDashboardPreview(product) {
            dashboardPreviewProduct = product;
            const image = document.getElementById('dashboard-preview-image');
            if (image) {
                image.src = product.image || '';
                image.alt = product.title || 'Science resource preview';
                image.classList.toggle('hidden', !product.image);
            }
            document.getElementById('dashboard-preview-title').textContent = product.title || 'Science Resource';
            document.getElementById('dashboard-preview-category').textContent = product.category || product.meta || 'Science Resource';
            document.getElementById('dashboard-preview-price').textContent = product.priceLabel || dashboardFormatPeso(product.price);
            document.getElementById('dashboard-preview-description').textContent = product.description || 'Teacher-ready digital science learning material.';
            document.getElementById('dashboard-preview-grade').textContent = product.grade || 'All Grades';
            document.getElementById('dashboard-preview-format').textContent = product.format || product.meta || 'Digital File';
            document.getElementById('dashboard-preview-modal')?.classList.remove('hidden');
            document.getElementById('dashboard-preview-modal')?.classList.add('flex');
        }

        function closeDashboardPreview() {
            document.getElementById('dashboard-preview-modal')?.classList.add('hidden');
            document.getElementById('dashboard-preview-modal')?.classList.remove('flex');
            dashboardPreviewProduct = null;
        }

        function showDashboardCartToast(productTitle, actionLabel = 'Added to cart:') {
            const toast = document.getElementById('dashboard-cart-toast');
            const label = document.getElementById('dashboard-cart-toast-product');
            const action = document.getElementById('dashboard-cart-toast-action');
            if (!toast) return;
            if (label) label.textContent = productTitle;
            if (action) action.textContent = actionLabel;
            toast.classList.remove('translate-y-2', 'opacity-0');
            toast.classList.add('translate-y-0', 'opacity-100');
            setTimeout(() => {
                toast.classList.add('translate-y-2', 'opacity-0');
                toast.classList.remove('translate-y-0', 'opacity-100');
            }, 1800);
        }

        function addDashboardProductToCart(product) {
            const cartItems = getDashboardCartItems();
            const existing = cartItems.find((item) => item.id === product.id);
            if (existing) {
                existing.quantity = (Number(existing.quantity) || 1) + 1;
            } else {
                cartItems.push({
                    id: product.id,
                    title: product.title,
                    meta: product.meta,
                    price: product.price,
                    image: product.image,
                    quantity: 1,
                });
            }
            setDashboardCartItems(cartItems);
            renderDashboardCart();
            showDashboardCartToast(product.title);
        }

        function renderDashboardProducts(force = false) {
            const inventory = readDashboardInventory();
            const snapshot = JSON.stringify(inventory);
            if (!force && snapshot === lastDashboardInventorySnapshot) return;
            lastDashboardInventorySnapshot = snapshot;
            const products = dashboardActiveProducts();
            const grid = document.querySelector('[data-dashboard-products-grid]');
            if (!grid) return;

            grid.innerHTML = products.length ? products.map((product) => `
                <article class="overflow-hidden rounded-2xl border border-white/10 bg-surface-container-low/55 transition-all hover:border-primary/40">
                    <div class="relative h-36 overflow-hidden">
                        ${product.image ? `<img class="h-full w-full object-cover" alt="${dashboardEscapeHTML(product.title)}" src="${dashboardEscapeHTML(product.image)}">` : `<div class="flex h-full w-full items-center justify-center bg-surface-container-high text-primary"><span class="material-symbols-outlined text-5xl">science</span></div>`}
                        <span class="absolute left-3 top-3 rounded-full bg-surface/85 px-2 py-1 font-label text-[10px] text-primary">${dashboardEscapeHTML(product.category)}</span>
                    </div>
                    <div class="p-4">
                        <div class="flex items-start justify-between gap-3">
                            <h4 class="line-clamp-2 font-headline text-lg font-semibold text-on-surface">${dashboardEscapeHTML(product.title)}</h4>
                            <span class="whitespace-nowrap font-label text-xs text-primary">${dashboardEscapeHTML(product.priceLabel)}</span>
                        </div>
                        <p class="mt-2 line-clamp-2 text-sm text-on-surface-variant">${dashboardEscapeHTML(product.description)}</p>
                        <p class="mt-2 font-label text-[11px] text-on-surface-variant">${dashboardEscapeHTML(product.grade)}</p>
                        <div class="mt-4 grid grid-cols-3 gap-2">
                            <button class="flex items-center justify-center rounded-xl border border-primary/25 px-3 py-2.5 font-label text-xs font-bold text-primary transition-all hover:bg-primary/10" type="button" data-dashboard-product-preview="${dashboardEscapeHTML(product.id)}">
                                Preview
                            </button>
                            <button class="flex items-center justify-center gap-2 rounded-xl bg-primary-container py-2.5 font-label text-xs font-bold text-on-primary shadow-[0_0_16px_rgba(0,212,255,.22)] transition-all hover:scale-[1.02]" type="button" data-dashboard-product-add="${dashboardEscapeHTML(product.id)}">
                                <span class="material-symbols-outlined text-[18px]">add_shopping_cart</span>
                            </button>
                            <button class="flex items-center justify-center gap-2 rounded-xl border border-primary/25 px-3 py-2.5 font-label text-xs font-bold text-primary transition-all hover:bg-primary/10" type="button" title="Save item" data-dashboard-product-save="${dashboardEscapeHTML(product.id)}">
                                <span class="material-symbols-outlined text-[18px]">favorite</span>
                            </button>
                        </div>
                    </div>
                </article>
            `).join('') : `
                <div class="rounded-2xl border border-white/10 bg-surface-container-low/55 p-6 text-center text-on-surface-variant md:col-span-2 xl:col-span-4">
                    <span class="material-symbols-outlined mb-2 text-4xl text-primary">inventory_2</span>
                    <p class="font-headline text-lg text-on-surface">No admin-published products yet</p>
                    <p class="mt-1 text-sm">Products saved as Published in the admin inventory will appear here.</p>
                </div>
            `;
            renderDashboardRecommendation();
        }

        function dashboardReadMinutes(post) {
            const words = String(post.content || post.meta || '').trim().split(/\s+/).filter(Boolean).length;
            return `${Math.max(2, Math.ceil(words / 180))} min read`;
        }

        function renderDashboardBlogs(force = false) {
            const posts = readDashboardBlogs();
            const snapshot = JSON.stringify(posts);
            if (!force && snapshot === lastDashboardBlogSnapshot) return;
            lastDashboardBlogSnapshot = snapshot;

            const list = document.querySelector('[data-dashboard-blog-list]');
            if (!list) return;
            const published = posts
                .filter((post) => (post.status || 'Draft') === 'Published')
                .sort((a, b) => new Date(b.publishedAt || b.updatedAt || 0) - new Date(a.publishedAt || a.updatedAt || 0))
                .slice(0, 3);

            if (!published.length) {
                list.innerHTML = `
                    <div class="rounded-2xl border border-white/5 bg-surface-container-low/50 p-5 text-center">
                        <span class="material-symbols-outlined text-4xl text-primary">article</span>
                        <p class="mt-2 font-headline text-lg font-semibold">No published posts yet</p>
                        <p class="mt-1 text-sm text-on-surface-variant">Admin-published blog articles will appear here automatically.</p>
                    </div>
                `;
                return;
            }

            list.innerHTML = published.map((post) => `
                <a class="flex gap-4 rounded-2xl border border-white/5 bg-surface-container-low/50 p-3 transition-all hover:border-primary/35" href="{{ route('blog') }}">
                    <img class="h-16 w-16 flex-shrink-0 rounded-xl object-cover" alt="${dashboardEscapeHTML(post.title)}" src="${dashboardEscapeHTML(post.image || '/images/shop/photosynthesis-process-topic.svg')}">
                    <div class="min-w-0 flex-1">
                        <div class="flex items-center gap-2">
                            <span class="rounded-full bg-primary-container/10 px-2 py-0.5 font-label text-[10px] text-primary">${dashboardEscapeHTML(post.category || 'Science')}</span>
                            <span class="font-label text-[10px] text-on-surface-variant">${dashboardReadMinutes(post)}</span>
                        </div>
                        <p class="mt-2 line-clamp-1 text-sm font-semibold text-on-surface">${dashboardEscapeHTML(post.title || 'Untitled Post')}</p>
                        <p class="mt-1 line-clamp-2 text-xs text-on-surface-variant">${dashboardEscapeHTML(post.meta || String(post.content || '').slice(0, 120))}</p>
                    </div>
                </a>
            `).join('');
        }

        function renderDashboardCart() {
            const items = getDashboardCartItems();
            const count = items.reduce((sum, item) => sum + item.quantity, 0);
            const subtotal = items.reduce((sum, item) => sum + item.price * item.quantity, 0);
            const list = document.querySelector('[data-dashboard-cart-list]');
            const summary = document.querySelector('[data-dashboard-cart-summary]');
            const total = document.querySelector('[data-dashboard-cart-total]');
            const meta = document.querySelector('[data-dashboard-cart-meta]');

            document.querySelectorAll('[data-dashboard-cart-count], [data-cart-count]').forEach((element) => {
                element.classList.toggle('hidden', !(window.iLearnAuth?.isSignedIn?.()));
                element.textContent = count;
            });

            if (meta) meta.textContent = count === 1 ? '1 item waiting' : `${count} items waiting`;
            if (total) total.textContent = dashboardFormatPeso(subtotal);
            if (summary) summary.textContent = count ? `${count} item${count === 1 ? '' : 's'} ready for checkout.` : 'Your cart is empty.';
            updateDashboardMissionProgress({ cartItems: items });

            if (!list) return;
            list.innerHTML = '';

            if (!items.length) {
                list.innerHTML = `
                    <div class="rounded-2xl border border-white/5 bg-surface-container-low/50 p-5 text-center">
                        <span class="material-symbols-outlined text-4xl text-primary">shopping_cart</span>
                        <p class="mt-2 font-headline text-lg font-semibold">No products in cart</p>
                        <p class="mt-1 text-sm text-on-surface-variant">Add learning resources from the shop.</p>
                    </div>
                `;
                return;
            }

            items.slice(0, 4).forEach((item) => {
                const row = document.createElement('a');
                row.href = '{{ route('cart') }}';
                row.className = 'flex items-center gap-3 rounded-2xl border border-white/5 bg-surface-container-low/50 p-3 transition-all hover:border-primary/35';
                row.innerHTML = `
                    <img class="h-14 w-14 rounded-xl object-cover" alt="${item.title}" src="${item.image}">
                    <div class="min-w-0 flex-1">
                        <p class="truncate text-sm font-semibold text-on-surface">${item.title}</p>
                        <p class="truncate font-label text-[11px] text-on-surface-variant">${item.meta}</p>
                    </div>
                    <div class="text-right">
                        <p class="font-label text-xs text-primary">x${item.quantity}</p>
                        <p class="font-label text-xs text-on-surface-variant">${dashboardFormatPeso(item.price * item.quantity)}</p>
                    </div>
                `;
                list.appendChild(row);
            });

            if (items.length > 4) {
                const more = document.createElement('a');
                more.href = '{{ route('cart') }}';
                more.className = 'block rounded-2xl border border-primary/20 bg-primary-container/10 p-3 text-center font-label text-xs text-primary transition-all hover:bg-primary-container/15';
                more.textContent = `View ${items.length - 4} more cart item${items.length - 4 === 1 ? '' : 's'}`;
                list.appendChild(more);
            }
        }

        function updateCustomerDashboardTitle() {
            const title = document.querySelector('[data-customer-dashboard-title]');
            if (!title) return;

            let session = null;
            try {
                session = JSON.parse(sessionStorage.getItem('ilearnScienceAuthSession') || localStorage.getItem('ilearnScienceRememberedUser') || 'null');
            } catch {}

            const firstName = (session?.name || 'Customer').trim().split(/\s+/)[0] || 'Customer';
            title.textContent = `${firstName}'s Dashboard`;
        }

        updateCustomerDashboardTitle();
        updateDashboardDownloadStats();
        renderDashboardProducts(true);
        refreshDashboardInventoryFromServer();
        renderDashboardBlogs(true);
        refreshDashboardBlogsFromServer();
        renderDashboardCart();
        renderDashboardRecommendation();
        document.querySelector('[data-dashboard-products-grid]')?.addEventListener('click', (event) => {
            const addButton = event.target.closest('[data-dashboard-product-add]');
            const saveButton = event.target.closest('[data-dashboard-product-save]');
            const previewButton = event.target.closest('[data-dashboard-product-preview]');
            if (!addButton && !saveButton && !previewButton) return;
            const productId = addButton?.dataset.dashboardProductAdd || saveButton?.dataset.dashboardProductSave || previewButton?.dataset.dashboardProductPreview;
            const product = readDashboardInventory()
                .filter((item) => (item.status || 'Published') === 'Published')
                .map(normalizeDashboardProduct)
                .find((item) => item.id === productId);
            if (!product) return;
            if (previewButton) openDashboardPreview(product);
            if (addButton) addDashboardProductToCart(product);
            if (saveButton) saveDashboardItem(product);
        });
        document.querySelector('[data-dashboard-recommendation]')?.addEventListener('click', (event) => {
            const addButton = event.target.closest('[data-dashboard-product-add]');
            const saveButton = event.target.closest('[data-dashboard-product-save]');
            const previewButton = event.target.closest('[data-dashboard-product-preview]');
            if (!addButton && !saveButton && !previewButton) return;
            const productId = addButton?.dataset.dashboardProductAdd || saveButton?.dataset.dashboardProductSave || previewButton?.dataset.dashboardProductPreview;
            const product = dashboardActiveProducts().find((item) => item.id === productId) || pickDashboardRecommendation();
            if (!product) return;
            if (previewButton) openDashboardPreview(product);
            if (addButton) addDashboardProductToCart(product);
            if (saveButton) saveDashboardItem(product);
        });
        document.getElementById('dashboard-preview-close')?.addEventListener('click', closeDashboardPreview);
        document.getElementById('dashboard-preview-modal')?.addEventListener('click', (event) => {
            if (event.target.id === 'dashboard-preview-modal') closeDashboardPreview();
        });
        document.getElementById('dashboard-preview-add')?.addEventListener('click', () => {
            if (!dashboardPreviewProduct) return;
            addDashboardProductToCart(dashboardPreviewProduct);
            closeDashboardPreview();
        });
        document.getElementById('dashboard-preview-save')?.addEventListener('click', () => {
            if (!dashboardPreviewProduct) return;
            saveDashboardItem(dashboardPreviewProduct);
            closeDashboardPreview();
        });
        window.addEventListener('storage', (event) => {
            if (event.key === dashboardCartStorageKey) renderDashboardCart();
            if (event.key === dashboardCheckoutStorageKey || event.key === dashboardDownloadedFilesStorageKey || event.key === dashboardDownloadedProductsStorageKey || event.key === dashboardSavedItemsStorageKey || event.key === dashboardWishlistStorageKey || event.key === dashboardActivityStorageKey || event.key === 'ilearnScienceCurrentUser' || event.key === 'ilearnScienceRememberedUser') updateDashboardDownloadStats();
            if (event.key === dashboardInventoryStorageKey || event.key === `${dashboardInventoryStorageKey}Initialized`) {
                renderDashboardProducts(true);
                renderDashboardRecommendation();
            }
            if (event.key === dashboardBlogStorageKey || event.key === dashboardBlogInitializedKey) renderDashboardBlogs(true);
        });
        window.addEventListener('ilearn:cart-updated', renderDashboardCart);
        window.addEventListener('ilearn:auth-updated', updateDashboardDownloadStats);
        window.addEventListener('ilearn:saved-updated', renderDashboardSavedItems);
        window.addEventListener('ilearn:products-updated', (event) => {
            if (Array.isArray(event.detail?.products)) {
                localStorage.setItem(dashboardInventoryStorageKey, JSON.stringify(event.detail.products));
                localStorage.setItem(`${dashboardInventoryStorageKey}Initialized`, 'true');
            }
            renderDashboardProducts(true);
            renderDashboardRecommendation();
        });
        dashboardProductSyncChannel?.addEventListener('message', (event) => {
            if (event.data?.type === 'products-updated' && Array.isArray(event.data.products)) {
                localStorage.setItem(dashboardInventoryStorageKey, JSON.stringify(event.data.products));
                localStorage.setItem(`${dashboardInventoryStorageKey}Initialized`, 'true');
                renderDashboardProducts(true);
                renderDashboardRecommendation();
            }
        });
        window.addEventListener('ilearn:blogs-updated', (event) => {
            if (Array.isArray(event.detail?.posts)) saveDashboardBlogs(event.detail.posts);
            else renderDashboardBlogs(true);
        });
        dashboardBlogSyncChannel?.addEventListener('message', (event) => {
            if (event.data?.type === 'blogs-updated' && Array.isArray(event.data.posts)) {
                saveDashboardBlogs(event.data.posts);
            }
        });
        window.addEventListener('pageshow', () => {
            updateDashboardDownloadStats();
            renderDashboardProducts(true);
            renderDashboardBlogs(true);
            renderDashboardCart();
            renderDashboardSavedItems();
            renderDashboardRecommendation();
        });
        setInterval(() => renderDashboardProducts(false), 1000);
        setInterval(() => renderDashboardBlogs(false), 1000);
        setInterval(() => {
            refreshDashboardInventoryFromServer();
            renderDashboardProducts(false);
            refreshDashboardBlogsFromServer();
            renderDashboardBlogs(false);
            updateDashboardMissionProgress();
        }, 3000);
    </script>
    @include('partials.auth-ui')
</body>
</html>
