<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>iLearn Science | Mission Control</title>
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
                        secondary: '#ddfcff',
                        'secondary-container': '#00f1fe',
                        tertiary: '#e6d8ff',
                        surface: '#10131a',
                        'surface-container': '#1d2026',
                        'surface-container-low': '#191c22',
                        'surface-container-high': '#272a31',
                        'surface-container-highest': '#32353c',
                        'surface-variant': '#32353c',
                        'on-surface': '#e1e2eb',
                        'on-surface-variant': '#bbc9cf',
                        'on-primary': '#003642',
                        'outline-variant': '#3c494e',
                    },
                    spacing: {
                        gutter: '24px',
                        'margin-desktop': '48px',
                        unit: '8px',
                    },
                    fontFamily: {
                        display: ['Sora', 'sans-serif'],
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
            background: rgba(29, 32, 38, 0.4);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(168, 232, 255, 0.1);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.37);
        }

        .glow-border:hover {
            border-color: #00d4ff;
            box-shadow: 0 0 15px rgba(0, 212, 255, 0.3);
        }

        .orbit-container {
            height: 100px;
            position: relative;
            width: 100px;
        }

        .orbit-path {
            fill: none;
            stroke: rgba(168, 232, 255, 0.1);
            stroke-width: 4;
        }

        .orbit-progress {
            fill: none;
            stroke: #00d4ff;
            stroke-dasharray: 251.2;
            stroke-dashoffset: 62.8;
            stroke-linecap: round;
            stroke-width: 4;
            transition: stroke-dashoffset 1s ease-in-out;
        }

        .particle {
            opacity: 0.1;
            pointer-events: none;
            position: absolute;
        }
    </style>
</head>
<body class="font-body text-on-surface">
    <div class="fixed inset-0 z-0 overflow-hidden">
        <span class="material-symbols-outlined particle text-primary" style="top: 10%; left: 15%; font-size: 40px;">rocket_launch</span>
        <span class="material-symbols-outlined particle text-tertiary" style="top: 60%; left: 85%; font-size: 60px;">science</span>
        <span class="material-symbols-outlined particle text-primary" style="top: 80%; left: 5%; font-size: 30px;">atm</span>
        <span class="material-symbols-outlined particle text-secondary" style="top: 20%; left: 70%; font-size: 50px;">hub</span>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_50%,rgba(60,215,255,0.05),transparent_70%)]"></div>
    </div>

    <div class="relative z-10 flex min-h-screen">
        <aside class="sticky top-0 hidden h-screen w-64 flex-col gap-2 border-r border-white/5 bg-surface-container/40 py-unit shadow-[5px_0_20px_rgba(0,0,0,0.5)] backdrop-blur-lg md:flex">
            <div class="px-6 py-8">
                <img alt="iLearn Science Logo" class="mb-4 h-12 w-12 drop-shadow-[0_0_10px_rgba(0,212,255,0.3)]" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAdi3U_a4kDUWzM_GHVgoWPwSxV_M0ArKwoQykrKrEziRIuMX3p2abCzGsYcoWoIpna4dwzvhq7nLNvwi8t7u6DcrAEKZZc1Gp2BciMVcAEu3_ZcGQa4tqO02rgDe8NFfaJIseT9OfJLBYWGVObfofXyxkK90T7oAMAewcO__WwuipwraLEJ34ebshwYyCLkPQvkm7cb3cnm5-OKB8W7OP1E_6LNNJBWEoxRNuSTxNlUl_ktkOG_v6eL5VkkDcenLm4N-WVu8zoDAs">
                <h1 class="font-headline text-2xl font-bold tracking-tight text-primary">iLearn Science</h1>
                <p class="mt-1 font-label text-xs uppercase tracking-widest opacity-50">Navigation Cluster</p>
            </div>

            <nav class="flex-1 space-y-1 overflow-y-auto px-4">
                @foreach ([
                    ['dashboard', 'Dashboard', route('mission-control'), true],
                    ['inventory_2', 'My Resources', '#', false],
                    ['download', 'Downloads', '#', false],
                    ['shopping_cart', 'Orders', route('orders'), false],
                    ['favorite', 'Wishlist', '#', false],
                    ['person', 'Profile', route('about'), false],
                    ['settings', 'Settings', '#', false],
                ] as [$icon, $label, $href, $active])
                    @if ($label === 'Profile')
                        <div class="my-4 h-px bg-white/5"></div>
                    @endif
                    <a class="flex items-center gap-3 rounded-xl px-4 py-3 transition-colors {{ $active ? 'scale-[0.98] border-r-4 border-primary bg-primary/10 text-primary shadow-[0_0_15px_rgba(60,215,255,0.3)]' : 'text-on-surface-variant opacity-70 hover:bg-surface-container-high/50 hover:text-primary' }}" href="{{ $href }}">
                        <span class="material-symbols-outlined">{{ $icon }}</span>
                        <span class="font-label text-sm">{{ $label }}</span>
                        @if ($icon === 'shopping_cart')
                            <span class="ml-auto flex h-5 min-w-5 items-center justify-center rounded-full bg-primary-container px-1 font-label text-[10px] font-bold leading-none text-on-primary-container shadow-[0_0_12px_rgba(0,212,255,0.65)]" data-cart-count>3</span>
                        @endif
                    </a>
                @endforeach
            </nav>

            <div class="mt-auto p-4">
                <div class="glass-panel flex items-center gap-3 rounded-xl border border-primary/20 p-4">
                    <img alt="Commander Smith" class="h-10 w-10 rounded-full border-2 border-primary object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDUTwV5yFGVIt6ma5k8S7LdzS4YImHgh5MO3b7RfPp5WYRKIPInyV37JX3sdgrdWGvWlLNyNVvUKTMUtVdkaCwvT8LfWP8-Bwt8KEshJ047r1Bzu9ZFMQx_WecO_ou2P0QvyEb6spMlD9In95ETaRwqwdZcB1gBeTcZmLVhp12QVLTIEop1zlv5yj-sXn78h829PN_tONnXOC9FcRqYC4Q-hroHVj1qKDOx3E_GYodmqqunC8rcfMQeCybZKBDPqZqNmwQJkXQtRJk">
                    <div>
                        <p class="font-bold text-on-surface">Commander Smith</p>
                        <p class="text-xs opacity-60">Mission Specialist</p>
                    </div>
                </div>
                <button class="mt-4 flex w-full items-center justify-center gap-2 rounded-xl bg-primary py-3 font-bold text-on-primary shadow-[0_0_20px_rgba(168,232,255,0.4)] transition-all hover:scale-105 active:scale-95">
                    <span class="material-symbols-outlined">add</span>
                    New Mission
                </button>
            </div>
        </aside>

        <main class="flex min-w-0 flex-1 flex-col bg-surface">
            <header class="sticky top-0 z-50 flex h-16 w-full items-center justify-between border-b border-white/10 bg-surface/80 px-4 shadow-[0_0_15px_rgba(168,232,255,0.1)] backdrop-blur-xl md:px-margin-desktop">
                <a class="flex items-center gap-4" href="{{ route('home') }}">
                    <span class="material-symbols-outlined cursor-pointer text-primary md:hidden">menu</span>
                    <img alt="iLearn Science Logo" class="h-8 w-8 object-contain md:h-10 md:w-10" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAdi3U_a4kDUWzM_GHVgoWPwSxV_M0ArKwoQykrKrEziRIuMX3p2abCzGsYcoWoIpna4dwzvhq7nLNvwi8t7u6DcrAEKZZc1Gp2BciMVcAEu3_ZcGQa4tqO02rgDe8NFfaJIseT9OfJLBYWGVObfofXyxkK90T7oAMAewcO__WwuipwraLEJ34ebshwYyCLkPQvkm7cb3cnm5-OKB8W7OP1E_6LNNJBWEoxRNuSTxNlUl_ktkOG_v6eL5VkkDcenLm4N-WVu8zoDAs">
                    <span class="font-headline text-2xl font-bold tracking-tight text-primary">iLearn Science</span>
                </a>
                <div class="mx-8 hidden max-w-md flex-1 sm:block">
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant">search</span>
                        <input class="w-full rounded-full border border-outline-variant/30 bg-surface-container-low py-2 pl-10 pr-4 font-body outline-none transition-all focus:border-transparent focus:ring-2 focus:ring-primary" placeholder="Search mission archives..." type="text">
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <button class="relative rounded-full p-2 text-on-surface-variant transition-all hover:bg-white/5 hover:text-primary">
                        <span class="material-symbols-outlined">notifications</span>
                        <span class="absolute right-2 top-2 h-2 w-2 rounded-full bg-primary-container"></span>
                    </button>
                    <button class="rounded-full p-2 text-on-surface-variant transition-all hover:bg-white/5 hover:text-primary">
                        <span class="material-symbols-outlined">account_circle</span>
                    </button>
                </div>
            </header>

            <div class="space-y-12 p-6 md:p-12">
                <section class="grid grid-cols-1 gap-gutter lg:grid-cols-12">
                    <div class="flex flex-col justify-center lg:col-span-8">
                        <h2 class="mb-2 font-display text-5xl font-bold text-primary">Welcome back, Cadet!</h2>
                        <p class="mb-8 max-w-2xl text-lg text-on-surface-variant">Your learning trajectory is currently performing 15% above the solar system average. Ready to continue your cosmic journey?</p>
                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-3">
                            <article class="glass-panel glow-border group rounded-2xl p-6 transition-all">
                                <span class="material-symbols-outlined mb-4 text-4xl text-primary transition-transform group-hover:scale-110">folder_zip</span>
                                <h3 class="font-label text-xs uppercase tracking-widest text-on-surface-variant">Total Resources</h3>
                                <p class="font-headline text-3xl font-bold text-on-surface">128</p>
                            </article>
                            <article class="glass-panel glow-border group rounded-2xl p-6 transition-all">
                                <span class="material-symbols-outlined mb-4 text-4xl text-secondary-container transition-transform group-hover:scale-110">cloud_download</span>
                                <h3 class="font-label text-xs uppercase tracking-widest text-on-surface-variant">Total Downloads</h3>
                                <p class="font-headline text-3xl font-bold text-on-surface">84</p>
                            </article>
                            <article class="glass-panel glow-border flex items-center justify-between rounded-2xl p-6 transition-all">
                                <div>
                                    <h3 class="font-label text-xs uppercase tracking-widest text-on-surface-variant">Mission Progress</h3>
                                    <p class="font-headline text-3xl font-bold text-on-surface">75%</p>
                                </div>
                                <div class="orbit-container">
                                    <svg class="h-full w-full rotate-[-90deg]" viewBox="0 0 100 100">
                                        <circle class="orbit-path" cx="50" cy="50" r="40"></circle>
                                        <circle class="orbit-progress" cx="50" cy="50" r="40"></circle>
                                    </svg>
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <span class="material-symbols-outlined text-xl text-primary">star</span>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>

                    <aside class="lg:col-span-4">
                        <div class="glass-panel group relative h-full overflow-hidden rounded-2xl">
                            <img alt="Earth from orbit" class="h-48 w-full object-cover opacity-60 transition-transform duration-700 group-hover:scale-110" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCv9Nl3tqPm1tCwM9kzYwkUZWcrvPKs8aLoeJ2odD4vZnNwvi1fKHGLEQsgUwF4J5k9eZ0e5SB70jNceDh_8SU8NfM8mWUWlsya8nsJF6gxMmEqkdz8px1DJDCBVOQjiFhzMJv6Zkmyc56AKReLo-di19eZho1rDjRMuNtKZCA_GxfwY9CGUwJHC9BZITZUG97oqE-Cy6dbAWwNbNZsB8XIJ0rZH9Ks5zrW9LwbdHhqr8PbBIc4f1QQ_9oulOEtUWUPZnjH17bIJoc">
                            <div class="p-6">
                                <div class="mb-4 flex items-center gap-4">
                                    <div class="flex h-12 w-12 items-center justify-center rounded-full bg-primary/20 text-primary">
                                        <span class="material-symbols-outlined">military_tech</span>
                                    </div>
                                    <div>
                                        <p class="font-bold">Expert Explorer</p>
                                        <p class="text-xs opacity-60">Level 42 Achieved</p>
                                    </div>
                                </div>
                                <p class="italic text-on-surface-variant">"The cosmos is within us. We are made of star-stuff. We are a way for the cosmos to know itself."</p>
                                <button class="mt-6 w-full rounded-xl border border-primary/40 py-2 font-bold text-primary transition-colors hover:bg-primary/10">View Achievements</button>
                            </div>
                        </div>
                    </aside>
                </section>

                <section>
                    <div class="mb-8 flex items-center justify-between">
                        <div>
                            <h2 class="font-headline text-3xl font-semibold text-on-surface">My Resources</h2>
                            <p class="text-on-surface-variant">Access your scientific archives</p>
                        </div>
                        <a class="flex items-center gap-2 font-label text-sm text-primary hover:underline" href="{{ route('shop') }}">View All <span class="material-symbols-outlined">arrow_forward</span></a>
                    </div>

                    @php
                        $resources = [
                            ['Cellular Biology Worksheets', 'Subject: Biology • V1.2', 'Worksheet', 'https://lh3.googleusercontent.com/aida-public/AB6AXuDAUcoiNgTAYHP6KPHsU1YcAMSl6PKWSNdMnRjLCOWCukSJkXcl5m7dp1RSeTYiAqtYLFujw0hzlmy_q9msD3MXisVl54U5Qkl_2s4CSYmQouxfvRiRC-s5o6HAM1g1hYCJkvrwUUluzrLdIE5Gtnh-Cf9lpEgxYE9enD4ItMmkMUz9JskJh1bH4uQsYYCPpI7Zx9a45CDbvjmskp2xm5yUtOoxSYs9e4avQ1FVgYgXrYwvW_qeiM8VZV7UZtmqnPDQrcS-4eIEHJ4'],
                            ['Planetary Physics', 'Subject: Physics • V3.0', 'PowerPoint', 'https://lh3.googleusercontent.com/aida-public/AB6AXuAOruoIjoaiFKF4wq_e7XGPVCC4IicUoLnbM_0MLLG4ysEKPUqel-rr1iTrQNZ2KcadX1X2aWci8-K9KojET7t3clLY6BjNWbJmFtkPycBzQWb2RNOUIJySJOEJzOBO79DetAaIyN7Pw1-BabTF_YJJ81tEgb_hCylOJ1kgbEYfFPKnzcmJMbPTQOaaKLF3Nl0Pgh2DDWew3fyTSrofYLCqJIYCYb9tMOdbge2Roi4wtZcWXwAquA7NAYJIschP7KZGj6Pc-Wkl7hs'],
                            ['Quantum Mechanics', 'Subject: Physics • V0.9 (Beta)', 'Study Guide', 'https://lh3.googleusercontent.com/aida-public/AB6AXuDRGemrwJMwfGP65Mm55X_evdOY6rbE2Cj6_Uq6zEAqobrMjbbO_GTT7w79az2zojIf5Rlhv3LbFlJxCmCNS0o9S-WAnUoDP60FkX6cLMnJQzL3GbZe_AJWxSxk5MFjbu_dolcCS4aYhtxTcjCESHX35BK9mKTOYywOFhL_ugB5Pib7p_1BLWZIPiMYAIzpr_P7MktTG9WGRO8OGYOlEb-o1CHH2Mgsqc_7T8zM5xEuojNT3ksGLK820eEw1TWDG5jIb7c9uniukJ0'],
                        ];
                    @endphp

                    <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                        @foreach ($resources as [$title, $meta, $type, $image])
                            <article class="glass-panel glow-border group overflow-hidden rounded-2xl transition-all">
                                <div class="relative h-48 overflow-hidden">
                                    <img alt="{{ $title }}" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110" src="{{ $image }}">
                                    <span class="absolute left-3 top-3 rounded-full border border-primary/20 bg-surface/80 px-3 py-1 text-xs text-primary backdrop-blur-md">{{ $type }}</span>
                                </div>
                                <div class="p-6">
                                    <h3 class="mb-1 font-headline text-2xl font-semibold">{{ $title }}</h3>
                                    <p class="mb-6 font-label text-sm text-on-surface-variant">{{ $meta }}</p>
                                    <div class="flex items-center gap-3">
                                        <a class="flex-1 rounded-lg bg-primary py-2 text-center font-bold text-on-primary transition-all hover:brightness-110 active:scale-95" href="{{ $loop->first ? route('resources.cell-biology') : '#' }}">Open</a>
                                        <button class="flex h-10 w-10 items-center justify-center rounded-lg border border-outline-variant/30 text-on-surface-variant transition-all hover:border-primary hover:text-primary">
                                            <span class="material-symbols-outlined">download</span>
                                        </button>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </section>

                <div class="grid grid-cols-1 gap-gutter xl:grid-cols-2">
                    <section class="glass-panel rounded-2xl p-8">
                        <div class="mb-6 flex items-center justify-between">
                            <h2 class="font-headline text-2xl font-semibold text-on-surface">Recent Purchase Log</h2>
                            <span class="material-symbols-outlined text-on-surface-variant">history</span>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr class="border-b border-white/5 text-left">
                                        <th class="pb-4 font-label text-xs uppercase tracking-widest text-on-surface-variant">Mission Artifact</th>
                                        <th class="pb-4 font-label text-xs uppercase tracking-widest text-on-surface-variant">Stardate</th>
                                        <th class="pb-4 font-label text-xs uppercase tracking-widest text-on-surface-variant">Status</th>
                                        <th class="pb-4 text-right font-label text-xs uppercase tracking-widest text-on-surface-variant">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-white/5">
                                    @foreach ([['menu_book', 'Organic Chemistry Pack', '24.10.2023'], ['rocket', 'Rocketry Masterclass', '18.10.2023'], ['language', 'Plate Tectonics Bundle', '05.10.2023']] as [$icon, $name, $date])
                                        <tr>
                                            <td class="py-4">
                                                <div class="flex items-center gap-3">
                                                    <div class="flex h-8 w-8 items-center justify-center rounded bg-primary/10 text-primary">
                                                        <span class="material-symbols-outlined text-sm">{{ $icon }}</span>
                                                    </div>
                                                    <span class="font-medium">{{ $name }}</span>
                                                </div>
                                            </td>
                                            <td class="py-4 text-on-surface-variant">{{ $date }}</td>
                                            <td class="py-4"><span class="rounded-full bg-green-500/10 px-3 py-1 text-xs font-bold uppercase tracking-tight text-green-400">Complete</span></td>
                                            <td class="py-4 text-right"><a class="text-on-surface-variant transition-all hover:text-primary" href="{{ route('orders') }}" aria-label="View order receipt"><span class="material-symbols-outlined">receipt_long</span></a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </section>

                    <section class="flex flex-col">
                        <div class="mb-6 flex items-center justify-between">
                            <h2 class="font-headline text-2xl font-semibold text-on-surface">Recommended for You</h2>
                            <button class="glass-panel rounded-full p-2 transition-all hover:bg-primary/20">
                                <span class="material-symbols-outlined text-primary">auto_awesome</span>
                            </button>
                        </div>
                        <div class="-mx-2 flex gap-6 overflow-x-auto px-2 pb-6 scroll-smooth">
                            @foreach ([['Astrophysics Basics', '₱12.00', 'https://lh3.googleusercontent.com/aida-public/AB6AXuBb6FKiPZoCpP8IrnOU8jUhMfQzNHGb2aAPPerRQftL9nF4PP90AuT8woLbzalh33QGFqbFtYJZZeONSClrXQ8zF6_gqnD0yJLUxFBBGZ-yJUX7KHd6Y_-pzZ4EDqqXUb2IcWYO0X5wiRoq2J9r1l2JbdUDt1-dALf1wPzjOMhhHtQ7EKdmOolt5D7YAWnD6mGMB506iB2PKxv6sC8G2uKBGxT4gO-FbuieYzYBPJCpZEsKKRvI1pdS_6Jx3InWOqLRak7pOQIBXLk'], ['Genetics Mastery', '₱24.00', 'https://lh3.googleusercontent.com/aida-public/AB6AXuAZBMYNDXcOHEDnSv8aUbarKS9z-gDUK5nWzUl-CE8CXF46HW-YUafVsOhoheg7FBjLs_Bu2Nkx2TEX7j6aTlh85EHlCOL4bSFOinoye7AP0K7l3SiDtKSzlnbZ4wgnJmHGgD5VUBCGCg-8_Y1I1yvzgDA25FyHS9ffdzzyjNwvuHMwOCs8EXmuTh_vAh5XKS53qMlrryJ9EuJkOnUyBI9ZeOmusks8xeXrdgP2xMgSh4uV6F0bOXrD4rRjAFQXk1Rs3a8C7zF4bmE'], ['Optics & Light Lab', '₱18.50', 'https://lh3.googleusercontent.com/aida-public/AB6AXuCoA-9GetPiOWxauriAG3FmKxMKNChdC7ebs1i7YOS1DOIGbDkhm6qOU6OE2x2cuNzWOoLhIFqEFDYKoX-TrLyxIM5zG-umn48146SLELO5kUiQqfIeaZcmzdJZQg2_sIFXp7ZqOGnKioNOSx0pSoQim7SUUmnKg54XOCNtSmSfUk7Lz7XAkksEJF7EFdFTAXlvUfhYfKYedWpBmp_aqaUT7yiGd9L6ACIZ-EI2rixKFTi7F2RlPr8yOO1wHLsIxDwtGx0AD0huRmc']] as [$title, $price, $image])
                                <article class="glass-panel glow-border group w-64 flex-shrink-0 overflow-hidden rounded-2xl">
                                    <img alt="{{ $title }}" class="h-32 w-full object-cover" src="{{ $image }}">
                                    <div class="p-4">
                                        <h4 class="line-clamp-1 font-bold text-on-surface">{{ $title }}</h4>
                                        <div class="mt-4 flex items-center justify-between">
                                            <span class="font-bold text-primary">{{ $price }}</span>
                                            <button class="flex h-8 w-8 items-center justify-center rounded-full bg-surface-container-high text-on-surface-variant transition-all hover:text-red-400">
                                                <span class="material-symbols-outlined text-sm">favorite</span>
                                            </button>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </section>
                </div>
            </div>

            <footer class="fixed bottom-0 left-0 z-50 flex w-full items-center justify-between border-t border-white/10 bg-surface-container/90 px-6 py-3 backdrop-blur-xl md:hidden">
                @foreach ([['dashboard', 'Dash', true], ['inventory_2', 'Stock', false], ['add', '', false], ['shopping_cart', 'Store', false], ['person', 'Profile', false]] as [$icon, $label, $active])
                    <button class="flex flex-col items-center gap-1 {{ $active ? 'text-primary' : 'text-on-surface-variant' }}">
                        @if ($icon === 'add')
                            <div class="-mt-8 flex h-12 w-12 items-center justify-center rounded-full border-4 border-surface bg-primary text-on-primary shadow-lg">
                                <span class="material-symbols-outlined">add</span>
                            </div>
                        @else
                            <span class="material-symbols-outlined">{{ $icon }}</span>
                            <span class="font-label text-[10px] uppercase">{{ $label }}</span>
                        @endif
                    </button>
                @endforeach
            </footer>
        </main>
    </div>

    <script>
        const cartStorageKey = 'ilearnScienceCartItems';
        function getCartItems() {
            if (window.iLearnAuth?.getCartItems) return window.iLearnAuth.getCartItems();
            try {
                return JSON.parse(localStorage.getItem(cartStorageKey)) || [];
            } catch {
                return [];
            }
        }

        function updateCartCount() {
            const signedIn = window.iLearnAuth?.isSignedIn ? window.iLearnAuth.isSignedIn() : false;
            const actualCount = signedIn ? getCartItems().reduce((sum, item) => sum + (Number(item.quantity) || 1), 0) : 0;

            document.querySelectorAll('[data-cart-count]').forEach((badge) => {
                badge.classList.toggle('hidden', !signedIn);
                badge.innerText = actualCount;
            });
        }

        document.querySelectorAll('.glow-border').forEach((card) => {
            card.addEventListener('mouseenter', () => {
                const icon = card.querySelector('.material-symbols-outlined');
                if (icon) icon.classList.add('scale-110');
            });
            card.addEventListener('mouseleave', () => {
                const icon = card.querySelector('.material-symbols-outlined');
                if (icon) icon.classList.remove('scale-110');
            });
        });

        const particles = document.querySelectorAll('.particle');
        document.addEventListener('mousemove', (event) => {
            const x = (event.clientX / window.innerWidth) * 20;
            const y = (event.clientY / window.innerHeight) * 20;
            particles.forEach((particle, index) => {
                const depth = (index + 1) * 0.5;
                particle.style.transform = `translate(${x * depth}px, ${y * depth}px)`;
            });
        });

        window.addEventListener('storage', (event) => {
            if (event.key === cartStorageKey) updateCartCount();
        });
        window.addEventListener('ilearn:cart-updated', updateCartCount);
        window.addEventListener('pageshow', updateCartCount);
        updateCartCount();
    </script>
    @include('partials.auth-ui')
</body>
</html>
