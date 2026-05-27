<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>iLearn Science - About Us</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Sora:wght@400;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600&family=JetBrains+Mono:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'space-dark': '#050414',
                        'space-sidebar': '#0a0921',
                        'neon-cyan': '#00f2ff',
                        'neon-purple': '#8a2be2',
                        'accent-blue': '#2563eb',
                        'glass-bg': 'rgba(15, 14, 45, 0.6)',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        brand: ['Sora', 'sans-serif'],
                        body: ['Plus Jakarta Sans', 'sans-serif'],
                        label: ['JetBrains Mono', 'monospace'],
                    },
                },
            },
        };
    </script>
    <style>
        .glass-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 1rem;
        }

        .neon-border-cyan {
            border: 1px solid rgba(0, 242, 255, 0.2);
        }

        .neon-text-cyan {
            color: #00f2ff;
            text-shadow: 0 0 8px rgba(0, 242, 255, 0.4);
        }

        .sidebar-active {
            background: linear-gradient(90deg, rgba(138, 43, 226, 0.2) 0%, transparent 100%);
            border-left: 3px solid #8a2be2;
        }

        .gradient-text {
            background: linear-gradient(to right, #00f2ff, #8a2be2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>
<body class="min-h-screen overflow-x-hidden bg-space-dark font-sans text-slate-100">
    <header class="fixed left-0 right-0 top-0 z-50 flex h-16 items-center justify-between border-b border-white/10 bg-space-dark/80 px-4 backdrop-blur-md md:px-6">
        <div class="flex items-center gap-6 lg:gap-12">
            <a class="flex items-center gap-2" href="{{ route('home') }}">
                <div class="flex h-10 w-10 items-center justify-center overflow-hidden">
                    <img alt="iLearn Science Logo" class="h-full w-full object-contain" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAYysu5egbuG-gryoVtH8a96uRh-Pzw60t95UJt-H_jjkvZ1J2sxmIFURQlSILz2wEigR4qXCMNAOeDB-dd-rf4-kslFGdKHXNqlLIU0mpdMwwylsifZS9NWX3yeQXrXp6SWbNrexmO8nbtfrIS0jv-MNQsWdfBzkQU7p3R8PospQmrSsZU7u853pp3ubTjTcja1CVKJcH0rENP18mW5FVKh6DMB6A4xO3hGTBm-HWYAFUSr9X-4c9YuJT_GGqbAKB_dCDZxKQL3bc">
                </div>
                <div class="flex flex-col leading-none">
                    <span class="text-xl font-bold tracking-tight">iLearn</span>
                    <span class="text-sm font-semibold tracking-wider text-neon-cyan">Science</span>
                </div>
            </a>

            <div class="relative hidden w-64 md:block">
                <input class="w-full rounded-full border border-white/10 bg-white/5 py-1.5 pl-10 pr-4 text-sm focus:border-neon-cyan/50 focus:outline-none" placeholder="Search resources..." type="text">
                <svg class="absolute left-3 top-2 h-4 w-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                </svg>
            </div>
        </div>

        <nav class="hidden items-center gap-8 text-sm font-medium lg:flex">
            <a class="text-slate-400 transition-colors hover:text-white" href="{{ route('home') }}">Home</a>
            <a class="text-slate-400 transition-colors hover:text-white" href="{{ route('home') }}#resources">Resources</a>
            <a class="text-slate-400 transition-colors hover:text-white" href="{{ route('blog') }}">Blog</a>
            <a class="border-b-2 border-neon-cyan pb-1 text-neon-cyan" href="{{ route('about') }}">About</a>
            <a class="text-slate-400 transition-colors hover:text-white" href="#">Contact</a>
        </nav>

        <div class="flex items-center gap-4 md:gap-6">
            <details class="group relative">
                <summary class="relative flex cursor-pointer list-none items-center gap-1 rounded-full border border-white/10 bg-white/5 px-3 py-2 transition-all hover:border-neon-cyan/50 hover:bg-white/10 [&::-webkit-details-marker]:hidden" aria-label="Open cart preview">
                    <span class="material-symbols-outlined text-slate-300">shopping_cart</span>
                    <span class="material-symbols-outlined text-neon-cyan text-[18px]">payments</span>
                    <span class="absolute -right-2 -top-1 rounded-full bg-neon-cyan px-1 text-[10px] font-bold text-space-dark shadow-[0_0_12px_rgba(0,242,255,0.65)]" data-cart-count>3</span>
                </summary>
                <div class="absolute right-0 mt-4 w-[320px] overflow-hidden rounded-2xl border border-neon-cyan/20 bg-space-sidebar/95 shadow-[0_0_30px_rgba(0,242,255,0.18)] backdrop-blur-xl">
                    <div class="flex items-center justify-between border-b border-white/10 px-4 py-3">
                        <div>
                            <p class="text-sm font-semibold text-white">Products in Cart</p>
                            <p class="text-xs text-slate-400" data-cart-ready-label>3 items ready for checkout</p>
                        </div>
                        <a class="flex h-9 w-9 items-center justify-center rounded-full bg-neon-cyan text-space-dark transition-transform hover:scale-105 active:scale-95" href="{{ route('checkout') }}" aria-label="Go to checkout">
                            <span class="material-symbols-outlined text-[20px]">payments</span>
                        </a>
                    </div>
                    <div class="max-h-72 divide-y divide-white/5 overflow-y-auto">
                        @foreach ([
                            ['Advanced Biology PPT', 'Digital Resource', '₱12.99', 1, 'https://lh3.googleusercontent.com/aida-public/AB6AXuDAukcxKIeiLZnlciZdGHXQXy4iKMk5x-tGgi6TFF9Sfe2xAbJvYHL-ZC8QnE7ffN8aNYOAezSH0Tj97sk_N4jSWS0Fi-fLIIOe_GEcsQDy-Q3Git7Zsvv9jd-3aksYLZm4n_e9Nwev_zdKaEgIZetNpoYFBQIvs1CsSN9Rj8uZXbmpC3w1SXnltKVlUgxzOY6l7SiVFE5VBWD9mn3M13-GXtO6fWm6DG_Z3oeCsZ474bR-1i29uZ1PURiMSTDrjBNPKGoExuy-MHk'],
                            ['Physics Lab Worksheets', 'PDF Bundle', '₱12.99', 1, 'https://lh3.googleusercontent.com/aida-public/AB6AXuBojzpBdmxN9PsX8hQhpf-SAKxoOzUasNe7LVwmHLwKmusbXaGCTShjD13RlH4TahuD0TLcy5RDFo_-rk_pIgulmr8vhpELtSAVpvE4-i6GIzL5vqnjan5AsqkKAeeTYV1zcxqh-GwPk224UNAqPXYnbYJ7gv5sHGYd8ta3nrnfvkHDI17Rq9TN0hHgzafutTJMBNMjgDHwopj_jhKZRw8AMPKlpweS9z0mJCinBPQQc-w2M4LAdBCjyVswiTkfNyu14SBEGeuz2A8'],
                            ['Chemistry Study Guide', 'Interactive E-Book', '₱12.99', 1, 'https://lh3.googleusercontent.com/aida-public/AB6AXuCPPifHph78pWofuqtVNjb6V-PLYAh0tthoPV29K8qbg1Hv1B-iMoInZd5zkM3IEUG-p70cbjpgCovfozMZv5CRK-WCHZbyV9qSJARc43tSFj5y0Zy7gIRSHAeHUrbTXYsHGfC1JUD7z0HVOmVRxQ0YLyG5ot_ckNO2l2D3y4RKVsGMl2Vc-96aVEuTetl-Fl96i8qBsHzyRsS5UB7I7_B1lhFS8Z1JW-Fp6LE5l1CDj9BJmh0ha-yaEL7VtNDyl3Dvy25kJZO_dy0'],
                        ] as [$title, $meta, $price, $quantity, $image])
                            <div class="flex items-center gap-3 px-4 py-3">
                                <img alt="{{ $title }}" class="h-12 w-12 rounded-lg object-cover" src="{{ $image }}">
                                <div class="min-w-0 flex-1">
                                    <p class="truncate text-sm font-semibold text-white">{{ $title }}</p>
                                    <p class="text-xs text-slate-400">{{ $meta }} • Qty {{ $quantity }}</p>
                                </div>
                                <span class="text-xs font-semibold text-neon-cyan">{{ $price }}</span>
                            </div>
                        @endforeach
                    </div>
                    <div class="space-y-3 border-t border-white/10 p-4">
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-slate-400">Total items</span>
                            <span class="font-semibold text-neon-cyan" data-cart-count>3</span>
                        </div>
                        <div class="grid grid-cols-2 gap-3">
                            <a class="rounded-lg border border-neon-cyan/30 px-4 py-2 text-center text-xs font-semibold text-neon-cyan transition-colors hover:bg-neon-cyan/10" href="{{ route('cart') }}">View Cart</a>
                            <a class="flex items-center justify-center gap-2 rounded-lg bg-neon-cyan px-4 py-2 text-xs font-bold text-space-dark transition-transform hover:scale-[1.02] active:scale-95" href="{{ route('checkout') }}">
                                <span class="material-symbols-outlined text-[16px]">payments</span>
                                Checkout
                            </a>
                        </div>
                    </div>
                </div>
            </details>
            <div class="relative hidden cursor-pointer sm:block">
                <span class="material-symbols-outlined text-slate-300">notifications</span>
                <span class="absolute -right-2 -top-1 rounded-full bg-neon-cyan px-1 text-[10px] font-bold text-space-dark">5</span>
            </div>
            <img alt="Elena Smith Profile" class="h-9 w-9 cursor-pointer rounded-full border-2 border-neon-purple/50" src="https://lh3.googleusercontent.com/aida-public/AB6AXuApNlR87JihXfK4WPC3HicxhPa3zV8N_4DWUAWpVpakf-WPkdVCrVa9pskcgWncYGbGetIH-eZLIddDC2oDUKLlwpt6joJCwCKksd4ZqB8j5fcXMgMfAr2uUPm1QMWpmRINZHod6b54miT_BLpjBOs09Wv1TuJ6gUAEQ6nIuMzre05GQQ9jWQYDQxls1CThb-cB0JHiCQPYwtDnwCFH_KAVD6tm1ziTHkKr-tSFdflnt21RoayHTxjMEyqhjiWqlRjOJoBIP_tjbA8">
        </div>
    </header>

    <div class="flex min-h-screen pt-16">
        <aside class="fixed bottom-0 top-16 hidden w-64 overflow-y-auto border-r border-white/5 bg-space-sidebar pb-12 pt-8 lg:block">
            <div class="flex flex-col gap-1 px-4">
                <a class="sidebar-active mb-2 flex items-center gap-4 rounded-lg px-4 py-3 text-slate-100" href="#">
                    <span class="material-symbols-outlined text-neon-purple">dashboard</span>
                    <span class="text-sm font-medium">Dashboard</span>
                </a>

                <div class="mt-6 px-4 text-[10px] font-bold uppercase tracking-widest text-slate-500">My Library</div>
                @foreach ([
                    ['download', 'Downloads', route('orders'), 'data-about-download-count'],
                    ['local_mall', 'Purchased Materials', route('orders'), 'data-about-purchased-count'],
                    ['favorite', 'Saved Items', route('shop'), 'data-about-saved-count'],
                ] as [$icon, $label, $href, $counter])
                    <a class="flex items-center gap-4 rounded-lg px-4 py-2.5 text-slate-400 transition-all hover:bg-white/5 hover:text-white" href="{{ $href }}">
                        <span class="material-symbols-outlined text-xl">{{ $icon }}</span>
                        <span class="min-w-0 flex-1 text-sm">{{ $label }}</span>
                        <span class="rounded-full border border-neon-cyan/20 bg-neon-cyan/10 px-2 py-0.5 text-[10px] font-bold text-neon-cyan" {{ $counter }}>0</span>
                    </a>
                @endforeach

                <div class="mx-4 my-4 h-px bg-white/5"></div>
                <div class="mb-2 px-4 text-[10px] font-bold uppercase tracking-widest text-slate-500">Categories</div>
                @foreach ([
                    ['description', 'Worksheets'],
                    ['co_present', 'PowerPoints'],
                    ['quiz', 'Test and Quizzes'],
                    ['visibility', 'Visual Resources'],
                    ['menu_book', 'Study Guides'],
                ] as [$icon, $label])
                    <a class="flex items-center gap-4 rounded-lg px-4 py-2 text-slate-400 transition-all hover:bg-white/5 hover:text-white" href="#">
                        <span class="material-symbols-outlined text-lg">{{ $icon }}</span>
                        <span class="text-xs">{{ $label }}</span>
                    </a>
                @endforeach

                <div class="mx-4 my-4 h-px bg-white/5"></div>
            </div>

            <div class="mt-20 px-6 opacity-60">
                <div class="relative flex h-24 w-full items-end justify-around">
                    <div class="relative h-16 w-12 rounded-b-lg border-x border-b border-neon-purple/30 bg-gradient-to-t from-neon-purple/40 to-transparent">
                        <div class="absolute bottom-2 left-2 h-8 w-8 rounded-full bg-neon-purple/60 blur-md"></div>
                    </div>
                    <div class="relative h-12 w-10 rounded-b-lg border-x border-b border-neon-cyan/30 bg-gradient-to-t from-neon-cyan/40 to-transparent">
                        <div class="absolute bottom-1.5 left-1.5 h-7 w-7 rounded-full bg-neon-cyan/60 blur-md"></div>
                    </div>
                </div>
            </div>
        </aside>

        <main class="grid flex-1 grid-cols-12 gap-8 bg-[radial-gradient(circle_at_50%_-20%,rgba(138,43,226,0.15),transparent_60%)] p-4 md:p-8 lg:ml-64">
            <div class="col-span-12 space-y-10">
                <section class="relative overflow-hidden">
                    <div class="flex w-full flex-col items-center text-center">
                        <div class="max-w-2xl">
                            <span class="text-xs font-bold uppercase tracking-[0.2em] text-neon-cyan">About Us</span>
                            <h1 class="mb-6 mt-4 text-4xl font-bold">About <span class="gradient-text">iLearn Science</span></h1>
                            <p class="mx-auto text-sm leading-relaxed text-slate-400">
                                iLearn Science Resources is an online educational marketplace offering high-quality science teaching materials for teachers, students, and homeschool educators. Discover engaging PowerPoint presentations, worksheets, lesson plans, quizzes, infographics, activity sheets, and digital science resources designed to make teaching easier and learning more interactive. From biology and chemistry to physics and earth science topics, iLearn Science Resources provides ready-to-use classroom materials that help educators teach more and prepare less.
                            </p>
                            <div class="group relative mx-auto mt-12 w-full max-w-3xl">
                                <div class="absolute -inset-1 rounded-xl bg-gradient-to-r from-neon-cyan/20 to-neon-purple/20 opacity-25 blur transition duration-1000 group-hover:opacity-50 group-hover:duration-200"></div>
                                <div class="glass-card relative flex min-h-[260px] items-center justify-center overflow-hidden border border-white/10 bg-white/[0.02] p-10 shadow-2xl">
                                    <img alt="iLearn Science Logo" class="h-48 w-48 rounded-3xl object-contain drop-shadow-[0_0_35px_rgba(0,242,255,0.32)] md:h-64 md:w-64" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAYysu5egbuG-gryoVtH8a96uRh-Pzw60t95UJt-H_jjkvZ1J2sxmIFURQlSILz2wEigR4qXCMNAOeDB-dd-rf4-kslFGdKHXNqlLIU0mpdMwwylsifZS9NWX3yeQXrXp6SWbNrexmO8nbtfrIS0jv-MNQsWdfBzkQU7p3R8PospQmrSsZU7u853pp3ubTjTcja1CVKJcH0rENP18mW5FVKh6DMB6A4xO3hGTBm-HWYAFUSr9X-4c9YuJT_GGqbAKB_dCDZxKQL3bc">
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section>
                    <div class="mb-8 flex items-center gap-4">
                        <div class="h-px flex-1 bg-white/5"></div>
                        <span class="text-sm font-semibold tracking-widest text-slate-400">WHAT WE OFFER</span>
                        <div class="h-px flex-1 bg-white/5"></div>
                    </div>
                    <div class="mx-auto grid max-w-6xl grid-cols-1 gap-6 sm:grid-cols-2 xl:grid-cols-5">
                        @foreach ([
                            ['description', 'Worksheets', 'text-neon-cyan'],
                            ['co_present', 'PowerPoint Presentations', 'text-orange-500'],
                            ['bolt', 'Test and Quizzes', 'text-yellow-400'],
                            ['visibility', 'Visual Resources', 'text-neon-cyan'],
                            ['menu_book', 'Study Guides', 'text-neon-purple'],
                        ] as [$icon, $label, $color])
                            <article class="glass-card group flex cursor-pointer flex-col items-center p-6 text-center transition-all hover:border-neon-cyan/50">
                                <div class="mb-4 flex h-12 w-12 items-center justify-center rounded-xl border border-white/10 bg-white/5">
                                    <span class="material-symbols-outlined {{ $color }}">{{ $icon }}</span>
                                </div>
                                <span class="text-sm font-semibold">{{ $label }}</span>
                            </article>
                        @endforeach
                    </div>
                </section>

                <section class="grid grid-cols-1 gap-6 xl:grid-cols-2">
                    <article class="glass-card neon-border-cyan flex flex-col gap-6 p-8 md:flex-row md:items-start">
                        <div class="flex h-16 w-16 flex-shrink-0 items-center justify-center">
                            <span class="material-symbols-outlined text-4xl text-neon-cyan" style="text-shadow: rgba(0, 242, 255, 0.4) 0 0 10px;">rocket_launch</span>
                        </div>
                        <div>
                            <h3 class="mb-3 text-xl font-bold">Our Mission</h3>
                            <p class="text-sm leading-relaxed text-slate-400">
                                To empower educators and students with high-quality, engaging, and accessible science learning resources that inspire curiosity, critical thinking, and a love for discovery.
                            </p>
                        </div>
                    </article>

                    <article class="glass-card flex flex-col gap-6 border-white/10 p-8 md:flex-row md:items-start">
                        <div class="flex h-16 w-16 flex-shrink-0 items-center justify-center">
                            <img alt="Telescope" class="h-12 w-12 object-contain drop-shadow-[0_0_8px_rgba(0,242,255,0.4)]" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDFOFpVyPHLEwBkrH4V2dcMuNgLnq8ulzmTeZMC5EqBYLCMqxhXS-rvvGiyxC0L7eZOxDoxRBrhMl9XJj-FgjHZT2wX4kgrl53AMx6V89Rr5CEh7wyWhbWUvcs9kqvZQPDQfjXJQKwHqvhmnlyitevGDASJpqp1HFnpexNmOkQLT4SdQ-aTmdUgsRFviW45Mt7TWxa0pESwkZ39bhnPW16R8cG0pc9fRw9NdsbyOElXaNQ7ljQmwffo0jiUrpWyA7DmBpfrLycvgks">
                        </div>
                        <div>
                            <h3 class="mb-3 text-xl font-bold">Our Vision</h3>
                            <p class="text-sm leading-relaxed text-slate-400">
                                To be a leading global platform that transforms the way science is taught and learned through innovation, creativity, and meaningful educational experiences.
                            </p>
                        </div>
                    </article>
                </section>

                <section class="glass-card relative overflow-hidden border-neon-cyan/20 bg-[#10131a]/70 p-6 shadow-[0_0_30px_rgba(0,242,255,0.08)] md:p-10">
                    <div class="absolute -right-20 -top-20 h-80 w-80 rounded-full bg-neon-purple/10 blur-3xl"></div>
                    <div class="absolute -bottom-24 left-10 h-72 w-72 rounded-full bg-neon-cyan/10 blur-3xl"></div>
                    <div class="relative z-10 flex flex-col gap-8 xl:flex-row xl:gap-12">
                        <div class="relative flex-shrink-0 self-center xl:self-start">
                            <div class="h-48 w-48 rounded-full border-4 border-neon-cyan/30 bg-white/5 p-2 shadow-[0_0_28px_rgba(0,242,255,0.22)]">
                                <img alt="Meet Lhyzah, creator of iLearn Science" class="h-full w-full rounded-full object-cover grayscale-[18%]" src="{{ asset('images/lhyzah-creator.jpeg') }}">
                            </div>
                            <div class="absolute -left-4 -top-4 h-4 w-4 animate-pulse rounded-full bg-neon-cyan shadow-[0_0_10px_#00f2ff]"></div>
                            <div class="absolute -right-4 bottom-8 h-3 w-3 animate-pulse rounded-full bg-neon-purple shadow-[0_0_10px_#8a2be2]"></div>
                        </div>

                        <div class="flex-1">
                            <div class="mb-3 flex items-center gap-3">
                                <span class="font-label text-xs uppercase tracking-[0.22em] text-neon-cyan">Creator Profile</span>
                                <div class="flex gap-1">
                                    <div class="h-1.5 w-1.5 rounded-full bg-neon-cyan shadow-[0_0_8px_rgba(0,242,255,0.8)]"></div>
                                    <div class="h-1.5 w-1.5 rounded-full bg-neon-purple shadow-[0_0_8px_rgba(138,43,226,0.8)]"></div>
                                    <div class="h-1.5 w-1.5 rounded-full bg-neon-cyan/60"></div>
                                </div>
                            </div>
                            <h2 class="font-brand text-3xl font-bold leading-tight text-white md:text-4xl">Meet the <span class="gradient-text">Creator</span></h2>
                            <h3 class="mb-4 mt-2 font-brand text-xl font-semibold text-neon-cyan">Hi, I'm Lhyzah, the creator of iLearn Science Resources</h3>
                            <p class="mb-6 font-body text-sm leading-7 text-slate-200 md:text-base">
                                Passionate about science education and creative digital learning, the creator of iLearn Science Resources develops engaging, high-quality teaching materials designed to help educators save time and inspire students. With experience in creating interactive PowerPoint presentations, worksheets, quizzes, infographics, and science learning resources, the goal is to make science lessons more effective, visually engaging, and easy to teach for classrooms, homeschooling, and online learning.
                            </p>

                            <div class="flex flex-wrap gap-4">
                                @foreach ([
                                    ['school', 'Educational Background', 'Science Education', 'bg-neon-purple/20 text-neon-purple'],
                                    ['star', 'Experience', '8+ Years', 'bg-yellow-500/20 text-yellow-500'],
                                    ['favorite', 'Passion', 'Teaching & Innovation', 'bg-pink-500/20 text-pink-500'],
                                ] as [$icon, $eyebrow, $value, $classes])
                                    <div class="flex items-center gap-3 rounded-xl border border-neon-cyan/15 bg-white/[0.04] px-4 py-3 shadow-[0_0_18px_rgba(0,242,255,0.05)] transition-all hover:border-neon-cyan/35 hover:bg-neon-cyan/5">
                                        <div class="flex h-9 w-9 items-center justify-center rounded-lg {{ $classes }}">
                                            <span class="material-symbols-outlined text-xl">{{ $icon }}</span>
                                        </div>
                                        <div>
                                            <div class="font-label text-[10px] uppercase tracking-wider text-slate-500">{{ $eyebrow }}</div>
                                            <div class="font-body text-sm font-semibold text-slate-100">{{ $value }}</div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </div>
    <script>
        const cartStorageKey = 'ilearnScienceCartItems';
        const checkoutStorageKey = 'ilearnScienceLastCheckout';
        const downloadedFilesStorageKey = 'ilearnScienceDownloadedFiles';
        const downloadedProductsStorageKey = 'ilearnScienceDownloadedProducts';
        const savedItemsStorageKey = 'ilearnScienceSavedItems';
        const wishlistStorageKey = 'ilearnScienceWishlistItems';

        function getCartItems() {
            if (window.iLearnAuth?.getCartItems) return window.iLearnAuth.getCartItems();
            try {
                return JSON.parse(localStorage.getItem(cartStorageKey)) || [];
            } catch {
                return [];
            }
        }

        function currentCustomerEmail() {
            try {
                const session = JSON.parse(sessionStorage.getItem('ilearnScienceAuthSession') || localStorage.getItem('ilearnScienceCurrentUser') || localStorage.getItem('ilearnScienceRememberedUser') || 'null');
                return String(session?.email || '').toLowerCase();
            } catch {
                return '';
            }
        }

        function isSignedIn() {
            return window.iLearnAuth?.isSignedIn ? window.iLearnAuth.isSignedIn() : Boolean(currentCustomerEmail());
        }

        function safeStoredJSON(key, fallback) {
            try {
                const value = JSON.parse(localStorage.getItem(key) || 'null');
                return value ?? fallback;
            } catch {
                return fallback;
            }
        }

        function getCustomerDownloadsCount() {
            const email = currentCustomerEmail();
            if (!email || !isSignedIn()) return 0;
            const downloads = safeStoredJSON(downloadedFilesStorageKey, {});
            const customerDownloads = downloads[email] || {};
            return Object.values(customerDownloads).reduce((sum, count) => sum + (Number(count) || 0), 0);
        }

        function getPurchasedMaterialsCount() {
            const email = currentCustomerEmail();
            if (!email || !isSignedIn()) return 0;

            const checkout = safeStoredJSON(checkoutStorageKey, null);
            const checkoutEmail = String(checkout?.customer?.email || '').toLowerCase();
            if (checkout?.items?.length && (!checkoutEmail || checkoutEmail === email)) {
                return checkout.items.reduce((sum, item) => sum + (Number(item.quantity) || 1), 0);
            }

            const productDownloads = safeStoredJSON(downloadedProductsStorageKey, {});
            const customerOrders = productDownloads[email] || {};
            return Object.values(customerOrders).reduce((total, orderItems) => {
                return total + Object.values(orderItems || {}).reduce((sum, item) => sum + (Number(item.quantity) || 1), 0);
            }, 0);
        }

        function countSavedCollection(value, email) {
            if (Array.isArray(value)) return value.length;
            if (value && typeof value === 'object') {
                const customerValue = value[email] || value[email?.toLowerCase?.()] || [];
                if (Array.isArray(customerValue)) return customerValue.length;
                if (customerValue && typeof customerValue === 'object') return Object.keys(customerValue).length;
            }
            return 0;
        }

        function getSavedItemsCount() {
            const email = currentCustomerEmail();
            if (!email || !isSignedIn()) return 0;
            return countSavedCollection(safeStoredJSON(savedItemsStorageKey, {}), email)
                + countSavedCollection(safeStoredJSON(wishlistStorageKey, {}), email);
        }

        function setCounter(selector, value) {
            document.querySelectorAll(selector).forEach((target) => {
                target.textContent = value;
                target.classList.toggle('opacity-60', value === 0);
            });
        }

        function updateLibraryActivity() {
            setCounter('[data-about-download-count]', getCustomerDownloadsCount());
            setCounter('[data-about-purchased-count]', getPurchasedMaterialsCount());
            setCounter('[data-about-saved-count]', getSavedItemsCount());
        }

        function updateCartCount() {
            const signedIn = isSignedIn();
            const actualCount = signedIn ? getCartItems().reduce((sum, item) => sum + (Number(item.quantity) || 1), 0) : 0;

            document.querySelectorAll('[data-cart-count]').forEach((badge) => {
                badge.classList.toggle('hidden', !signedIn);
                badge.innerText = actualCount;
            });
            document.querySelectorAll('[data-cart-ready-label]').forEach((label) => {
                label.innerText = `${actualCount} item${actualCount === 1 ? '' : 's'} ready for checkout`;
            });
        }

        updateCartCount();
        updateLibraryActivity();
        window.addEventListener('storage', (event) => {
            if (event.key === cartStorageKey) updateCartCount();
            if ([
                checkoutStorageKey,
                downloadedFilesStorageKey,
                downloadedProductsStorageKey,
                savedItemsStorageKey,
                wishlistStorageKey,
                'ilearnScienceCurrentUser',
                'ilearnScienceRememberedUser',
            ].includes(event.key)) updateLibraryActivity();
        });
        window.addEventListener('ilearn:cart-updated', updateCartCount);
        window.addEventListener('ilearn:auth-updated', () => {
            updateCartCount();
            updateLibraryActivity();
        });
        window.addEventListener('pageshow', () => {
            updateCartCount();
            updateLibraryActivity();
        });
    </script>
    @include('partials.auth-ui')
</body>
</html>
