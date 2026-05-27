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
                ['inventory_2', 'My Resources', route('resources.cell-biology'), false],
                ['cloud_download', 'Downloads', route('orders'), false],
                ['shopping_cart', 'Cart', route('cart'), false],
                ['receipt_long', 'Orders', route('orders'), false],
                ['article', 'Blog', route('blog'), false],
                ['favorite', 'Saved Items', route('shop'), false],
                ['settings', 'Settings', route('about'), false],
            ] as [$icon, $label, $href, $active])
                <a class="{{ $active ? 'nav-active' : 'border-transparent text-on-surface-variant hover:border-primary/30 hover:bg-surface-variant/35 hover:text-primary' }} relative flex items-center gap-3 rounded-xl border px-4 py-3 font-label text-sm transition-all" href="{{ $href }}">
                    <span class="material-symbols-outlined">{{ $icon }}</span>
                    <span>{{ $label }}</span>
                    @if ($label === 'Cart')
                        <span class="ml-auto flex h-6 min-w-6 items-center justify-center rounded-full bg-primary-container px-1 font-label text-[11px] font-bold text-on-primary shadow-[0_0_14px_rgba(0,212,255,.55)]" data-cart-count data-dashboard-cart-count>0</span>
                    @endif
                </a>
            @endforeach
        </nav>
        <a class="mt-4 flex items-center justify-center gap-2 rounded-xl bg-primary-container px-4 py-3 font-label text-sm font-bold text-on-primary shadow-[0_0_20px_rgba(0,212,255,.32)] transition-all hover:scale-[1.02]" href="{{ route('shop') }}">
            <span class="material-symbols-outlined">science</span>
            Browse Resources
        </a>
    </aside>

    <header class="sticky top-0 z-30 border-b border-primary/10 bg-surface/70 px-4 py-4 backdrop-blur-2xl lg:ml-64 lg:px-8">
        <div class="mx-auto flex max-w-container-max items-center justify-between gap-4">
            <div>
                <p class="font-label text-xs uppercase tracking-[0.3em] text-primary">Learner Command Center</p>
                <h2 class="font-headline text-2xl font-bold text-on-surface md:text-3xl" data-customer-dashboard-title>Customer Dashboard</h2>
            </div>
            <div class="hidden flex-1 justify-center md:flex">
                <div class="flex w-full max-w-md items-center gap-3 rounded-full border border-primary/15 bg-surface-container-low/80 px-4 py-2.5">
                    <span class="material-symbols-outlined text-on-surface-variant">search</span>
                    <input class="w-full border-0 bg-transparent p-0 font-label text-sm text-on-surface placeholder:text-on-surface-variant focus:ring-0" placeholder="Search your resources...">
                </div>
            </div>
            <div data-auth-mount class="flex items-center gap-2"></div>
        </div>
    </header>

    <main class="relative z-10 px-4 py-8 lg:ml-64 lg:px-8">
        <div class="mx-auto max-w-container-max space-y-8">
            <section class="grid grid-cols-1 gap-gutter xl:grid-cols-12">
                <article class="glass-panel overflow-hidden rounded-3xl p-6 md:p-8 xl:col-span-8">
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
                                    <p class="mt-2 font-headline text-4xl font-bold text-primary">78%</p>
                                </div>
                                <div class="relative flex h-24 w-24 items-center justify-center rounded-full border-4 border-primary/20">
                                    <div class="absolute inset-0 rounded-full border-t-4 border-primary-container animate-spin"></div>
                                    <span class="material-symbols-outlined text-primary">rocket_launch</span>
                                </div>
                            </div>
                            <p class="mt-4 text-sm text-on-surface-variant">You opened 6 of 8 recent resources. Next recommended topic: Photosynthesis.</p>
                        </div>
                    </div>
                </article>

                <aside class="glass-panel rounded-3xl p-6 xl:col-span-4">
                    <h3 class="font-headline text-2xl font-semibold">Quick Actions</h3>
                    <div class="mt-5 grid grid-cols-2 gap-3">
                        @foreach ([['download', 'Downloads', route('orders')], ['shopping_cart', 'Cart', route('cart')], ['article', 'Blog', route('blog')], ['support_agent', 'Support', route('about')]] as [$icon, $label, $href])
                            <a class="glow-hover relative flex min-h-[92px] flex-col items-center justify-center gap-2 rounded-2xl border border-white/10 bg-surface-container-low/55 p-3 text-center" href="{{ $href }}">
                                <span class="material-symbols-outlined text-primary">{{ $icon }}</span>
                                <span class="font-label text-xs text-on-surface">{{ $label }}</span>
                                @if ($label === 'Cart')
                                    <span class="absolute right-3 top-3 flex h-6 min-w-6 items-center justify-center rounded-full bg-primary-container px-1 font-label text-[11px] font-bold text-on-primary shadow-[0_0_14px_rgba(0,212,255,.55)]" data-cart-count data-dashboard-cart-count>0</span>
                                @endif
                            </a>
                        @endforeach
                    </div>
                </aside>
            </section>

            <section class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-4">
                @foreach ([['Purchased Resources', '18', 'inventory_2', '+3 this month'], ['Available Downloads', '24', 'cloud_download', 'Ready anytime'], ['Items in Cart', '0', 'shopping_cart', 'Current cart'], ['Orders Completed', '12', 'receipt_long', 'All paid']] as [$label, $value, $icon, $meta])
                    <article class="glass-panel glow-hover rounded-2xl p-5">
                        <div class="flex items-center justify-between">
                            <span class="flex h-12 w-12 items-center justify-center rounded-xl border border-primary/20 bg-primary-container/10 text-primary">
                                <span class="material-symbols-outlined">{{ $icon }}</span>
                            </span>
                            <span class="font-label text-xs text-primary" @if ($label === 'Items in Cart') data-dashboard-cart-meta @endif>{{ $meta }}</span>
                        </div>
                        <p class="mt-5 font-label text-xs uppercase tracking-widest text-on-surface-variant">{{ $label }}</p>
                        <p class="mt-2 font-headline text-4xl font-bold text-on-surface" @if ($label === 'Items in Cart') data-cart-count data-dashboard-cart-count @endif>{{ $value }}</p>
                    </article>
                @endforeach
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
                    <div class="grid grid-cols-1 gap-5 md:grid-cols-3">
                        @foreach ([
                            ['Cell Biology Interactive PowerPoint', 'PPTX + PDF', 'Biology', 'https://lh3.googleusercontent.com/aida-public/AB6AXuDB29hlsu6znAHyJwVa-GZ2GEL1qRnewIXPnir5KUIvPk3vY2FFuEYqNxWpbBb_S4i1_9cmj6hfXbbm0wq8LMsxrMXm3otjI_lesrFSTbydTwMWXd2Cgx9zkMYsIX8pugR8DnnL3y8EtZLVBl1HYoCZObeGk9hhHuXl2iqlfEy5qpaQUtNcVcZt18lXM0RWiJZuPFwCoH01n7k71hV_8pOjscUwmXnCjDxQgRKCdPBDeqczACKtuekX2CyfsEtKl8-YdFotM9lhUWc'],
                            ['Photosynthesis Visual Pack', 'Slides + activity', 'Biology', '/images/shop/photosynthesis-process-topic.svg'],
                            ['Pedigree Analysis Quiz Set', 'Quiz + answer key', 'Heredity', '/images/shop/pedigree-analysis-topic.svg'],
                        ] as [$title, $meta, $tag, $image])
                            <article class="overflow-hidden rounded-2xl border border-white/10 bg-surface-container-low/55 transition-all hover:border-primary/40">
                                <img class="h-36 w-full object-cover" alt="{{ $title }}" src="{{ $image }}">
                                <div class="p-4">
                                    <span class="rounded-full bg-primary-container/10 px-2 py-1 font-label text-[10px] text-primary">{{ $tag }}</span>
                                    <h4 class="mt-3 font-headline text-lg font-semibold">{{ $title }}</h4>
                                    <p class="mt-1 text-sm text-on-surface-variant">{{ $meta }}</p>
                                    <div class="mt-4 flex gap-2">
                                        <a class="flex-1 rounded-lg bg-primary-container py-2 text-center font-label text-xs font-bold text-on-primary" href="{{ route('resources.cell-biology') }}">Open</a>
                                        <button class="rounded-lg border border-primary/25 px-3 py-2 text-primary">
                                            <span class="material-symbols-outlined text-[18px]">download</span>
                                        </button>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </article>

                <aside class="space-y-gutter xl:col-span-4">
                    <section class="glass-panel rounded-3xl p-6">
                        <h3 class="font-headline text-2xl font-semibold">Recent Orders</h3>
                        <div class="mt-5 space-y-3">
                            @foreach ([['#ILS-20260522-03', 'Cell Biology PowerPoint', 'Paid'], ['#ILS-20260518-02', 'Photosynthesis Pack', 'Delivered'], ['#ILS-20260512-01', 'Taxonomy Study Guide', 'Delivered']] as [$id, $name, $status])
                                <div class="rounded-2xl border border-white/5 bg-surface-container-low/50 p-4">
                                    <div class="flex items-center justify-between gap-3">
                                        <p class="font-label text-xs text-primary">{{ $id }}</p>
                                        <span class="rounded-full bg-green-400/10 px-3 py-1 font-label text-[10px] text-green-300">{{ $status }}</span>
                                    </div>
                                    <p class="mt-2 text-sm text-on-surface">{{ $name }}</p>
                                </div>
                            @endforeach
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
                        <p class="mt-2 text-sm text-on-surface-variant">Based on your Biology purchases.</p>
                        <a class="mt-5 flex gap-4 rounded-2xl border border-primary/15 bg-primary-container/10 p-4 transition-all hover:border-primary/45" href="{{ route('shop') }}">
                            <img class="h-20 w-20 rounded-xl object-cover" alt="Digestive System" src="/images/shop/digestive-system-topic.svg">
                            <div>
                                <p class="font-headline font-semibold">Digestive System Bundle</p>
                                <p class="mt-1 text-sm text-on-surface-variant">Presentation, worksheet, visual guide, and quiz.</p>
                                <p class="mt-2 font-label text-sm text-primary">View resource</p>
                            </div>
                        </a>
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
        <span class="font-label text-primary">Added to cart:</span>
        <span id="dashboard-cart-toast-product">Science Resource</span>
    </div>

    <script>
        const dashboardCartStorageKey = 'ilearnScienceCartItems';
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
                status: product.status || 'Published',
            };
        }

        function showDashboardCartToast(productTitle) {
            const toast = document.getElementById('dashboard-cart-toast');
            const label = document.getElementById('dashboard-cart-toast-product');
            if (!toast) return;
            if (label) label.textContent = productTitle;
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
            const products = inventory
                .filter((product) => (product.status || 'Published') === 'Published')
                .map(normalizeDashboardProduct);
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
                        <button class="mt-4 flex w-full items-center justify-center gap-2 rounded-xl bg-primary-container py-2.5 font-label text-xs font-bold text-on-primary shadow-[0_0_16px_rgba(0,212,255,.22)] transition-all hover:scale-[1.02]" type="button" data-dashboard-product-add="${dashboardEscapeHTML(product.id)}">
                            <span class="material-symbols-outlined text-[18px]">add_shopping_cart</span>
                            Add to Cart
                        </button>
                    </div>
                </article>
            `).join('') : `
                <div class="rounded-2xl border border-white/10 bg-surface-container-low/55 p-6 text-center text-on-surface-variant md:col-span-2 xl:col-span-4">
                    <span class="material-symbols-outlined mb-2 text-4xl text-primary">inventory_2</span>
                    <p class="font-headline text-lg text-on-surface">No admin-published products yet</p>
                    <p class="mt-1 text-sm">Products saved as Published in the admin inventory will appear here.</p>
                </div>
            `;
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
        renderDashboardProducts(true);
        refreshDashboardInventoryFromServer();
        renderDashboardBlogs(true);
        refreshDashboardBlogsFromServer();
        renderDashboardCart();
        document.querySelector('[data-dashboard-products-grid]')?.addEventListener('click', (event) => {
            const addButton = event.target.closest('[data-dashboard-product-add]');
            if (!addButton) return;
            const product = readDashboardInventory()
                .filter((item) => (item.status || 'Published') === 'Published')
                .map(normalizeDashboardProduct)
                .find((item) => item.id === addButton.dataset.dashboardProductAdd);
            if (product) addDashboardProductToCart(product);
        });
        window.addEventListener('storage', (event) => {
            if (event.key === dashboardCartStorageKey) renderDashboardCart();
            if (event.key === dashboardInventoryStorageKey || event.key === `${dashboardInventoryStorageKey}Initialized`) renderDashboardProducts(true);
            if (event.key === dashboardBlogStorageKey || event.key === dashboardBlogInitializedKey) renderDashboardBlogs(true);
        });
        window.addEventListener('ilearn:cart-updated', renderDashboardCart);
        window.addEventListener('ilearn:products-updated', (event) => {
            if (Array.isArray(event.detail?.products)) {
                localStorage.setItem(dashboardInventoryStorageKey, JSON.stringify(event.detail.products));
                localStorage.setItem(`${dashboardInventoryStorageKey}Initialized`, 'true');
            }
            renderDashboardProducts(true);
        });
        dashboardProductSyncChannel?.addEventListener('message', (event) => {
            if (event.data?.type === 'products-updated' && Array.isArray(event.data.products)) {
                localStorage.setItem(dashboardInventoryStorageKey, JSON.stringify(event.data.products));
                localStorage.setItem(`${dashboardInventoryStorageKey}Initialized`, 'true');
                renderDashboardProducts(true);
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
            renderDashboardProducts(true);
            renderDashboardBlogs(true);
            renderDashboardCart();
        });
        setInterval(() => renderDashboardProducts(false), 1000);
        setInterval(() => renderDashboardBlogs(false), 1000);
        setInterval(() => {
            refreshDashboardInventoryFromServer();
            renderDashboardProducts(false);
            refreshDashboardBlogsFromServer();
            renderDashboardBlogs(false);
        }, 3000);
    </script>
    @include('partials.auth-ui')
</body>
</html>
