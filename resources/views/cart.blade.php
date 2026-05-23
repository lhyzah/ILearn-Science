<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>iLearn Science - Your Cart</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700;800&family=Plus+Jakarta+Sans:wght@400;500&family=JetBrains+Mono:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: '#a8e8ff',
                        'primary-container': '#00d4ff',
                        tertiary: '#e6d8ff',
                        'tertiary-container': '#cdb7ff',
                        'on-tertiary-container': '#6100e0',
                        'secondary-container': '#00f1fe',
                        'on-secondary-container': '#006a70',
                        background: '#10131a',
                        surface: '#10131a',
                        'surface-container': '#1d2026',
                        'surface-container-low': '#191c22',
                        'surface-container-high': '#272a31',
                        'surface-container-highest': '#32353c',
                        'on-surface': '#e1e2eb',
                        'on-surface-variant': '#bbc9cf',
                        'on-primary': '#003642',
                        'outline-variant': '#3c494e',
                        error: '#ffb4ab',
                        'error-container': '#93000a',
                        'on-error-container': '#ffdad6',
                    },
                    spacing: {
                        gutter: '24px',
                        'margin-desktop': '48px',
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
            background: #10131a;
            color: #e1e2eb;
            overflow-x: hidden;
        }

        .glass-panel {
            background: rgba(29, 32, 38, 0.6);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.37);
        }

        .neon-glow-cyan {
            box-shadow: 0 0 20px rgba(0, 212, 255, 0.4);
        }

        .neon-glow-purple {
            box-shadow: 0 0 20px rgba(176, 38, 255, 0.3);
        }

        .star-field {
            background-image: radial-gradient(circle at 2px 2px, rgba(255,255,255,0.05) 1px, transparent 0);
            background-size: 40px 40px;
        }

        .custom-scrollbar::-webkit-scrollbar {
            width: 4px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: rgba(0, 212, 255, 0.2);
            border-radius: 10px;
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>
<body class="star-field">
    <nav class="fixed left-0 top-0 z-50 hidden h-screen w-64 flex-col border-r border-white/10 bg-surface-container/80 py-8 shadow-[0_0_15px_rgba(0,212,255,0.1)] backdrop-blur-xl md:flex">
        <div class="mb-10 px-6">
            <a class="flex items-center gap-3" href="{{ route('home') }}">
                <img alt="iLearn Logo" class="h-10 w-10 rounded-full object-cover neon-glow-cyan" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBSBO56sJas6rQHK4VWyVv9zYvpVKsJP9aGm9I-zZ4Xp8RSH3TgIUxiNSFgYgSOEW-AD7ysC9slLFlObe30xoXRuZ2usUrzLaCr6C4UGL_A6_skVaPmwRJCOSWXxTz1ZZ5j3Ozg8zvZyd26aw1EyQvtPJzzb40BcFMiHArG9g9pAoV2NRyQC968hCEkCk1-k29rGdPmYK0TRKmKUkWUDd2gMt8XPS0sbLsyz2ySSzbMTEVa9zmrFuXcOziQjR6_EdazHqPNl2A2iRk">
                <div>
                    <h1 class="font-headline text-2xl font-semibold tracking-tight text-primary">iLearn Science</h1>
                    <p class="font-label text-xs text-on-surface-variant/60">Cadet #4029</p>
                </div>
            </a>
        </div>

        <div class="flex-1 space-y-1">
            @foreach ([
                ['space_dashboard', 'Mission Control', route('mission-control')],
                ['biotech', 'Science Labs', route('shop')],
                ['receipt_long', 'Orders', route('orders')],
                ['explore', 'Star Maps', '#'],
                ['inventory_2', 'Resource Vault', route('resources.cell-biology')],
                ['rocket_launch', 'Launch Pad', route('dashboard')],
            ] as [$icon, $label, $href])
                <a class="flex items-center gap-3 px-6 py-3 text-on-surface-variant transition-all hover:bg-white/5 hover:text-primary" href="{{ $href }}">
                    <span class="material-symbols-outlined">{{ $icon }}</span>
                    <span class="font-label text-sm">{{ $label }}</span>
                </a>
            @endforeach
        </div>

        <div class="border-t border-white/5 px-6 py-6">
            <button class="w-full rounded-lg border border-primary/30 bg-primary-container/10 py-3 font-label text-sm text-primary transition-all active:scale-95">Start Mission</button>
        </div>
        <div class="space-y-1 px-2">
            <a class="flex items-center gap-3 px-4 py-2 text-on-surface-variant transition-all hover:text-primary" href="#"><span class="material-symbols-outlined">settings</span><span class="font-label text-sm">Settings</span></a>
            <a class="flex items-center gap-3 px-4 py-2 text-on-surface-variant transition-all hover:text-primary" href="#"><span class="material-symbols-outlined">logout</span><span class="font-label text-sm">Log Out</span></a>
        </div>
    </nav>

    <header class="fixed right-0 top-0 z-40 flex w-full items-center justify-between border-b border-white/5 bg-background/50 px-6 py-4 backdrop-blur-lg md:w-[calc(100%-16rem)] md:px-margin-desktop">
        <div class="flex items-center gap-4">
            <span class="material-symbols-outlined text-primary md:hidden">menu</span>
            <h2 class="font-headline text-3xl font-bold text-primary">Mission Control: Your Cart</h2>
        </div>
        <div class="flex items-center gap-6">
            <div class="relative hidden sm:block">
                <input class="w-64 rounded-full border border-white/10 bg-surface-container/50 px-5 py-2 font-label text-sm focus:border-primary/50 focus:outline-none" placeholder="Search resources..." type="text">
                <span class="material-symbols-outlined absolute right-4 top-2 text-on-surface-variant">search</span>
            </div>
            <div class="flex items-center gap-4">
                <div class="relative">
                    <span class="material-symbols-outlined cursor-pointer text-on-surface-variant transition-colors hover:text-primary">notifications</span>
                    <span class="neon-glow-cyan absolute -right-1 -top-1 h-2 w-2 rounded-full bg-primary"></span>
                </div>
                <span class="material-symbols-outlined cursor-pointer text-on-surface-variant transition-colors hover:text-primary">account_circle</span>
            </div>
        </div>
    </header>

    <main class="min-h-screen px-6 pb-12 pt-24 md:ml-64 md:px-margin-desktop">
        <div class="mb-8 flex flex-col justify-between gap-4 md:flex-row md:items-end">
            <div>
                <h3 class="font-headline text-3xl font-semibold text-on-surface">Your Cart</h3>
                <p class="text-on-surface-variant" data-cart-summary>Review your 3 items before initiating checkout protocol.</p>
            </div>
            <a class="flex items-center gap-2 font-label text-sm text-primary hover:underline" href="{{ route('shop') }}">
                <span class="material-symbols-outlined text-sm">arrow_back</span>
                Continue Shopping
            </a>
        </div>

        @php
            $items = [
                ['Advanced Biology PPT', 'Digital Resource - v2.4', '₱12.99', 'https://lh3.googleusercontent.com/aida-public/AB6AXuDAukcxKIeiLZnlciZdGHXQXy4iKMk5x-tGgi6TFF9Sfe2xAbJvYHL-ZC8QnE7ffN8aNYOAezSH0Tj97sk_N4jSWS0Fi-fLIIOe_GEcsQDy-Q3Git7Zsvv9jd-3aksYLZm4n_e9Nwev_zdKaEgIZetNpoYFBQIvs1CsSN9Rj8uZXbmpC3w1SXnltKVlUgxzOY6l7SiVFE5VBWD9mn3M13-GXtO6fWm6DG_Z3oeCsZ474bR-1i29uZ1PURiMSTDrjBNPKGoExuy-MHk'],
                ['Physics Lab Worksheets', 'PDF Bundle - 45 Pages', '₱12.99', 'https://lh3.googleusercontent.com/aida-public/AB6AXuBojzpBdmxN9PsX8hQhpf-SAKxoOzUasNe7LVwmHLwKmusbXaGCTShjD13RlH4TahuD0TLcy5RDFo_-rk_pIgulmr8vhpELtSAVpvE4-i6GIzL5vqnjan5AsqkKAeeTYV1zcxqh-GwPk224UNAqPXYnbYJ7gv5sHGYd8ta3nrnfvkHDI17Rq9TN0hHgzafutTJMBNMjgDHwopj_jhKZRw8AMPKlpweS9z0mJCinBPQQc-w2M4LAdBCjyVswiTkfNyu14SBEGeuz2A8'],
                ['Chemistry Study Guide', 'Interactive E-Book', '₱12.99', 'https://lh3.googleusercontent.com/aida-public/AB6AXuCPPifHph78pWofuqtVNjb6V-PLYAh0tthoPV29K8qbg1Hv1B-iMoInZd5zkM3IEUG-p70cbjpgCovfozMZv5CRK-WCHZbyV9qSJARc43tSFj5y0Zy7gIRSHAeHUrbTXYsHGfC1JUD7z0HVOmVRxQ0YLyG5ot_ckNO2l2D3y4RKVsGMl2Vc-96aVEuTetl-Fl96i8qBsHzyRsS5UB7I7_B1lhFS8Z1JW-Fp6LE5l1CDj9BJmh0ha-yaEL7VtNDyl3Dvy25kJZO_dy0'],
            ];
        @endphp

        <div class="grid grid-cols-1 items-start gap-gutter lg:grid-cols-12">
            <div id="cart-items-list" class="space-y-4 lg:col-span-8">
                @foreach ($items as [$title, $meta, $price, $image])
                    <article class="glass-panel group flex flex-col gap-6 rounded-xl p-4 transition-all hover:border-primary/20 sm:flex-row" data-cart-line data-unit-price="{{ str_replace(['₱', ','], '', $price) }}" data-base-cart-item>
                        <div class="h-32 w-full flex-shrink-0 overflow-hidden rounded-lg bg-surface-container-highest sm:w-32">
                            <img alt="{{ $title }}" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105" src="{{ $image }}">
                        </div>
                        <div class="flex flex-1 flex-col justify-between">
                            <div class="flex items-start justify-between gap-4">
                                <div>
                                    <h4 class="font-headline text-xl text-on-surface">{{ $title }}</h4>
                                    <p class="font-label text-xs text-on-surface-variant/60">{{ $meta }}</p>
                                </div>
                                <p class="font-headline text-xl text-primary">{{ $price }}</p>
                            </div>
                            <div class="mt-4 flex flex-wrap items-center justify-between gap-4">
                                <div class="flex items-center overflow-hidden rounded-lg border border-white/10 bg-surface-container-low">
                                    <button class="qty-minus px-3 py-1 text-on-surface-variant hover:bg-white/5" type="button">-</button>
                                    <span class="qty-value border-x border-white/5 px-4 py-1 font-label text-sm">1</span>
                                    <button class="qty-plus px-3 py-1 text-on-surface-variant hover:bg-white/5" type="button">+</button>
                                </div>
                                <div class="flex items-center gap-4">
                                    <button class="remove-cart-item flex items-center gap-1 font-label text-xs text-on-surface-variant transition-colors hover:text-error" type="button"><span class="material-symbols-outlined text-lg">delete</span> Remove</button>
                                    <button class="flex items-center gap-1 font-label text-xs text-on-surface-variant transition-colors hover:text-tertiary" type="button"><span class="material-symbols-outlined text-lg">bookmark</span> Save for later</button>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <aside class="sticky top-24 lg:col-span-4">
                <div class="glass-panel neon-glow-purple rounded-2xl border-primary/20 p-6">
                    <h3 class="mb-6 border-b border-white/5 pb-4 font-headline text-2xl font-semibold">Order Summary</h3>
                    <div class="mb-6 space-y-4">
                        <div class="flex justify-between"><span class="text-on-surface-variant">Subtotal</span><span data-summary-subtotal>₱38.97</span></div>
                        <div class="flex justify-between"><span class="text-on-surface-variant">Est. Taxes</span><span data-summary-tax>₱3.12</span></div>
                        <div class="flex justify-between text-primary"><span>Science Discount</span><span data-summary-discount>-₱5.00</span></div>
                    </div>
                    <div class="mb-6">
                        <label class="mb-2 block font-label text-xs uppercase tracking-widest text-on-surface-variant">Promo Code</label>
                        <div class="flex gap-2">
                            <input class="flex-1 rounded-lg border border-white/10 bg-surface-container-low px-4 py-2 font-label text-sm text-primary focus:border-primary/50 focus:outline-none" placeholder="GALAXY20" type="text">
                            <button class="glass-panel rounded-lg px-4 py-2 font-label text-sm text-primary transition-colors hover:bg-primary/10">Apply</button>
                        </div>
                    </div>
                    <div class="mb-8 flex items-center justify-between border-t border-white/10 pt-6">
                        <span class="font-headline text-2xl font-semibold">Total</span>
                        <span class="font-headline text-2xl font-semibold text-primary" data-summary-total>₱37.09</span>
                    </div>
                    <a class="neon-glow-cyan flex w-full items-center justify-center gap-3 rounded-xl bg-primary py-4 font-headline text-xl text-on-primary transition-all hover:brightness-110 active:scale-[0.98]" href="{{ route('checkout') }}">
                        <span class="material-symbols-outlined">rocket_launch</span>
                        Finalize Checkout
                    </a>
                    <p class="mt-4 text-center font-label text-xs text-on-surface-variant/40">Secure encrypted transaction via Starlink</p>
                </div>
            </aside>
        </div>

        <section class="mt-20">
            <div class="mb-8 flex items-center justify-between">
                <h3 class="font-headline text-2xl font-semibold">You May Also Like</h3>
                <div class="flex gap-2">
                    <button class="glass-panel rounded-full p-2 hover:bg-white/5"><span class="material-symbols-outlined">chevron_left</span></button>
                    <button class="glass-panel rounded-full p-2 hover:bg-white/5"><span class="material-symbols-outlined">chevron_right</span></button>
                </div>
            </div>

            @php
                $recommendations = [
                    ['Stellar Life Cycles', 'Complete Presentation Deck', 'SPACE', '₱15.00', 'tertiary-container', 'on-tertiary-container', 'https://lh3.googleusercontent.com/aida-public/AB6AXuC7gzr2NhFsvN_QeXsLN_Lk_l0EbWsG9dSXjSsLjidEPflu_zm441NsSruhkabsN0SZ7cfDowmJ2qPfwgtwX4EZUQrH_AsCUT25cF3_2RVf4FdJ6cfIBfqLYSGZeYE6E5OoQ2XzCLLWdUkajSBdSju5ritVgDA6lahAQDlJLgmaR5VwPWTIxqK6VWh8zHzpCGzFWPxkb9nykkZTexu1ZgeauhNnBaKMFFs3bey94l6CFCKP77WlNBoZr2J7grdFmmZcBgi73HAGJSY'],
                    ['Safety Protocols v3', 'Interactive VR Module', 'LAB', '₱9.99', 'primary-container', 'on-primary-container', 'https://lh3.googleusercontent.com/aida-public/AB6AXuCn0wQrfhaq-Zg44ued3umxEJV99oan2JyyFhOxup8729fsODd7zx3Ak8qhx4hcZ2Om2YwZTwD2KkIDYUOBFFy_sGLjfyMvYy75Z3GaiegiEG_3P20zpEpK3R7W8LL5eKZyOEGXgr2JNcLWC5gH4G4uOtbgCsBfky1FPA4sPrkafAmuALyQXe0Ojar5pIavN32o1O5JgLU0tCY8Y7tiVg4_wc04FTCGCs8w__go0QDnmYwQng41L8kNGKq6ekdWr87kpnk_3n2tCe0'],
                    ['Genetic Mapping Kit', 'Printable Logic Puzzles', 'GENETICS', '₱18.50', 'secondary-container', 'on-secondary-container', 'https://lh3.googleusercontent.com/aida-public/AB6AXuATRGKmhV6rWyvbHr5FVmQsXPyfsgLYYx90LrO6R9qv4ZFC1gFyJlCjagoIKC8yisds2Jq-A7pTnQgach0xQ-QBvSnCg5lDFGmmDk1znv0TNEdW21B8peZIJGGgrgAuamINcASssZpPAqc5JgO4r4QyZ2UymKVX3QhUSWhPgbiCeggJb1M4GIuiIaxU4uiaJUhZvo_RZxC5p8CpLj81PAp6wt8J5f9sqxuf0Nn5Cea18FgWHcAypcIJ3P7ujQ4yQOi45rghCYxfiLc'],
                    ['Quantum Circuits', 'Advanced Simulation Software', 'PHYSICS', '₱24.99', 'error-container', 'on-error-container', 'https://lh3.googleusercontent.com/aida-public/AB6AXuArUexJxLpCr6ifg4BEP25YfWt4Y9Mj4bemMN2UB65sN6lew_JUtFLvJGY7gyRBORx2vhhc6LqZ4ytlGq6oUB8T3asiuOuURLj_b0yC4qzodS8vKdB4ZCv1XW0f2tdJ_TVG3Gaglwa_gv3aETOdqkahorVQb2VKDjDUaQoEnXXdxtE2l3meGEE1zNBylDaXsHzwgvw0bQLHVlegO1bqoJa-ndeQ6X1UO2aqI75p7IEdxKC5b-6rGvFHdWsd_FIcDVHrJ6Tqk7nGUAA'],
                ];
            @endphp

            <div class="custom-scrollbar flex gap-gutter overflow-x-auto pb-8 scroll-smooth">
                @foreach ($recommendations as [$title, $copy, $tag, $price, $bg, $fg, $image])
                    <article class="glass-panel group min-w-[280px] overflow-hidden rounded-xl">
                        <div class="relative h-40 overflow-hidden">
                            <img alt="{{ $title }}" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110" src="{{ $image }}">
                            <div class="absolute inset-0 bg-gradient-to-t from-background to-transparent opacity-60"></div>
                            <span class="absolute left-3 top-3 rounded bg-{{ $bg }}/80 px-2 py-1 font-label text-[10px] text-{{ $fg }}">{{ $tag }}</span>
                        </div>
                        <div class="p-4">
                            <h5 class="mb-1 font-headline text-lg">{{ $title }}</h5>
                            <p class="mb-4 font-label text-xs text-on-surface-variant">{{ $copy }}</p>
                            <div class="flex items-center justify-between">
                                <span class="font-headline text-lg text-primary">{{ $price }}</span>
                                <button class="glass-panel flex h-10 w-10 items-center justify-center rounded-full text-primary transition-all hover:bg-primary hover:text-on-primary">
                                    <span class="material-symbols-outlined">add_shopping_cart</span>
                                </button>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>
    </main>

    <nav class="fixed bottom-0 left-0 z-50 flex w-full justify-around border-t border-white/10 bg-surface-container/90 px-2 py-4 backdrop-blur-xl md:hidden">
        @foreach ([['space_dashboard', 'Home', route('mission-control'), false], ['biotech', 'Labs', route('shop'), false], ['shopping_cart', 'Cart', route('cart'), true], ['account_circle', 'Profile', route('about'), false]] as [$icon, $label, $href, $active])
            <a class="relative flex flex-col items-center gap-1 {{ $active ? 'text-primary' : 'text-on-surface-variant' }}" href="{{ $href }}">
                <span class="material-symbols-outlined">{{ $icon }}</span>
                @if ($icon === 'shopping_cart')
                    <span class="absolute -right-2 -top-2 flex h-5 min-w-5 items-center justify-center rounded-full bg-primary-container px-1 font-label text-[10px] font-bold leading-none text-on-primary-container shadow-[0_0_12px_rgba(0,212,255,0.65)]" data-cart-count>3</span>
                @endif
                <span class="font-label text-[10px]">{{ $label }}</span>
            </a>
        @endforeach
    </nav>

    <script>
        const cartStorageKey = 'ilearnScienceCartItems';
        const taxRate = 0.08;
        const discountAmount = 5;
        const defaultCartItems = [
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

        function parsePeso(value) {
            return Number.parseFloat(String(value).replace(/[₱,]/g, '')) || 0;
        }

        function formatPeso(value) {
            return `₱${Math.max(0, value).toFixed(2)}`;
        }

        function normalizeCartItem(item) {
            return {
                id: item.id || item.title?.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^-|-$/g, ''),
                title: item.title || 'Science Resource',
                meta: item.meta || item.type || 'Digital Resource',
                price: parsePeso(item.price),
                image: item.image || '',
                quantity: Math.max(1, Number.parseInt(item.quantity || '1', 10) || 1),
            };
        }

        function getStoredCartItems() {
            try {
                return (JSON.parse(localStorage.getItem(cartStorageKey)) || []).map(normalizeCartItem);
            } catch {
                return [];
            }
        }

        function saveStoredCartItems(items) {
            localStorage.setItem(cartStorageKey, JSON.stringify(items.map(normalizeCartItem)));
        }

        function ensureCartHasStarterItems() {
            if (localStorage.getItem(cartStorageKey)) return;
            saveStoredCartItems(defaultCartItems);
        }

        function updateStoredCartCount() {
            const total = getCartLineCount();
            document.querySelectorAll('[data-cart-count]').forEach((badge) => {
                badge.innerText = total;
            });
            document.querySelectorAll('[data-cart-summary]').forEach((summary) => {
                summary.innerText = `Review your ${total} items before initiating checkout protocol.`;
            });
        }

        function getCartLineCount() {
            return Array.from(document.querySelectorAll('[data-cart-line]')).reduce((sum, line) => {
                const quantity = Number.parseInt(line.querySelector('.qty-value')?.innerText || '1', 10);
                return sum + Math.max(1, quantity);
            }, 0);
        }

        function updateOrderSummary() {
            const subtotal = Array.from(document.querySelectorAll('[data-cart-line]')).reduce((sum, line) => {
                const quantity = Number.parseInt(line.querySelector('.qty-value')?.innerText || '1', 10);
                const unitPrice = Number.parseFloat(line.dataset.unitPrice || '0') || 0;
                return sum + (unitPrice * Math.max(1, quantity));
            }, 0);
            const discount = subtotal > 0 ? discountAmount : 0;
            const tax = subtotal * taxRate;
            const total = subtotal + tax - discount;

            document.querySelector('[data-summary-subtotal]').innerText = formatPeso(subtotal);
            document.querySelector('[data-summary-tax]').innerText = formatPeso(tax);
            document.querySelector('[data-summary-discount]').innerText = `-${formatPeso(discount)}`;
            document.querySelector('[data-summary-total]').innerText = formatPeso(total);
            updateStoredCartCount();
        }

        function syncStoredQuantity(itemId, quantity) {
            const items = getStoredCartItems();
            const item = items.find((entry) => entry.id === itemId);
            if (!item) return;
            item.quantity = quantity;
            saveStoredCartItems(items);
        }

        function removeStoredItem(itemId) {
            if (!itemId) return;
            const items = getStoredCartItems().filter((entry) => entry.id !== itemId);
            saveStoredCartItems(items);
        }

        function showEmptyCartMessage() {
            const list = document.getElementById('cart-items-list');
            if (!list || list.querySelector('[data-cart-line]') || list.querySelector('[data-empty-cart-message]')) return;

            const emptyState = document.createElement('div');
            emptyState.dataset.emptyCartMessage = 'true';
            emptyState.className = 'glass-panel rounded-xl p-10 text-center';
            emptyState.innerHTML = `
                <span class="material-symbols-outlined mb-4 text-5xl text-primary">shopping_cart</span>
                <h4 class="font-headline text-2xl font-semibold text-on-surface">Your cart is empty</h4>
                <p class="mt-2 text-on-surface-variant">Add a resource to restart your mission checkout.</p>
            `;
            list.appendChild(emptyState);
        }

        function renderCartItems() {
            const list = document.getElementById('cart-items-list');
            if (!list) return;

            const items = getStoredCartItems();
            list.innerHTML = '';

            items.forEach((item) => {
                const priceLabel = formatPeso(item.price);

                const article = document.createElement('article');
                article.className = 'glass-panel group flex flex-col gap-6 rounded-xl p-4 transition-all hover:border-primary/20 sm:flex-row';
                article.dataset.storedCartItem = item.id;
                article.dataset.cartLine = '';
                article.dataset.unitPrice = item.price;
                article.innerHTML = `
                    <div class="h-32 w-full flex-shrink-0 overflow-hidden rounded-lg bg-surface-container-highest sm:w-32">
                        <img alt="${item.title}" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105" src="${item.image}">
                    </div>
                    <div class="flex flex-1 flex-col justify-between">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <h4 class="font-headline text-xl text-on-surface">${item.title}</h4>
                                <p class="font-label text-xs text-on-surface-variant/60">${item.meta}</p>
                            </div>
                            <p class="font-headline text-xl text-primary">${priceLabel}</p>
                        </div>
                        <div class="mt-4 flex flex-wrap items-center justify-between gap-4">
                            <div class="flex items-center overflow-hidden rounded-lg border border-white/10 bg-surface-container-low">
                                <button class="qty-minus px-3 py-1 text-on-surface-variant hover:bg-white/5" type="button">-</button>
                                <span class="qty-value border-x border-white/5 px-4 py-1 font-label text-sm">${item.quantity || 1}</span>
                                <button class="qty-plus px-3 py-1 text-on-surface-variant hover:bg-white/5" type="button">+</button>
                            </div>
                            <div class="flex items-center gap-4">
                                <button class="remove-cart-item flex items-center gap-1 font-label text-xs text-on-surface-variant transition-colors hover:text-error" type="button"><span class="material-symbols-outlined text-lg">delete</span> Remove</button>
                                <button class="flex items-center gap-1 font-label text-xs text-on-surface-variant transition-colors hover:text-tertiary" type="button"><span class="material-symbols-outlined text-lg">bookmark</span> Save for later</button>
                            </div>
                        </div>
                    </div>
                `;

                list.prepend(article);
            });

            showEmptyCartMessage();
            updateOrderSummary();
        }

        ensureCartHasStarterItems();
        renderCartItems();

        document.getElementById('cart-items-list')?.addEventListener('click', (event) => {
            const quantityButton = event.target.closest('.qty-minus, .qty-plus');
            const removeButton = event.target.closest('.remove-cart-item');

            if (quantityButton) {
                const line = quantityButton.closest('[data-cart-line]');
                const value = quantityButton.parentElement.querySelector('.qty-value');
                const current = Number.parseInt(value.innerText, 10);
                const next = quantityButton.classList.contains('qty-minus') ? Math.max(1, current - 1) : current + 1;
                value.innerText = next;
                if (line?.dataset.storedCartItem) {
                    syncStoredQuantity(line.dataset.storedCartItem, next);
                }
                updateOrderSummary();
            }

            if (removeButton) {
                const line = removeButton.closest('[data-cart-line]');
                if (line?.dataset.storedCartItem) {
                    removeStoredItem(line.dataset.storedCartItem);
                }
                line?.remove();
                renderCartItems();
                showEmptyCartMessage();
            }
        });

        window.addEventListener('storage', (event) => {
            if (event.key === cartStorageKey) {
                renderCartItems();
            }
        });

        window.addEventListener('pageshow', renderCartItems);

        function createParticle() {
            const particle = document.createElement('div');
            const size = Math.random() * 2;
            particle.style.position = 'fixed';
            particle.style.width = `${size}px`;
            particle.style.height = `${size}px`;
            particle.style.background = Math.random() > 0.5 ? '#00d4ff' : '#b026ff';
            particle.style.borderRadius = '50%';
            particle.style.left = `${Math.random() * 100}vw`;
            particle.style.top = `${Math.random() * 100}vh`;
            particle.style.opacity = Math.random() * 0.4;
            particle.style.pointerEvents = 'none';
            particle.style.zIndex = '1';
            document.body.appendChild(particle);

            let position = 0;
            const speed = Math.random() * 0.5 + 0.1;
            const direction = Math.random() > 0.5 ? 1 : -1;

            function move() {
                position += speed;
                particle.style.transform = `translateY(${position * direction}px)`;
                if (position < 200) {
                    requestAnimationFrame(move);
                } else {
                    particle.remove();
                    createParticle();
                }
            }

            move();
        }

        for (let i = 0; i < 30; i++) {
            setTimeout(createParticle, Math.random() * 2000);
        }
    </script>
    @include('partials.auth-ui')
</body>
</html>
