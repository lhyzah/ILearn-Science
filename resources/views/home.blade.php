<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>iLearn Science Resources | Teach More, Prepare Less</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700;800&family=JetBrains+Mono:wght@500&family=Plus+Jakarta+Sans:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: '#a8e8ff',
                        'primary-container': '#00d4ff',
                        'on-primary-container': '#00586b',
                        'on-primary': '#003642',
                        secondary: '#ddfcff',
                        'on-secondary': '#00363a',
                        tertiary: '#e6d8ff',
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
                        'primary-fixed': '#b4ebff',
                        'primary-fixed-dim': '#3cd7ff',
                    },
                    spacing: {
                        gutter: '24px',
                        'margin-desktop': '48px',
                        'container-max': '1280px',
                    },
                    borderRadius: {
                        DEFAULT: '0.25rem',
                        lg: '0.5rem',
                        xl: '0.75rem',
                    },
                    fontFamily: {
                        'headline': ['Sora', 'sans-serif'],
                        'label': ['JetBrains Mono', 'monospace'],
                        'body': ['Plus Jakarta Sans', 'sans-serif'],
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
            background: rgba(29, 32, 38, 0.46);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: border-color 0.3s ease, transform 0.3s ease, background 0.3s ease;
        }

        .glass-panel:hover {
            border-color: rgba(168, 232, 255, 0.45);
        }

        .neon-glow {
            box-shadow: 0 0 15px rgba(60, 215, 255, 0.2);
        }

        .neon-border-pulse {
            position: relative;
        }

        .neon-border-pulse::after {
            animation: rotate-border 6s linear infinite;
            background: conic-gradient(from 0deg, transparent, #3cd7ff, transparent, #3cd7ff, transparent);
            border-radius: 1.5rem;
            content: '';
            inset: -2px;
            opacity: 0.4;
            position: absolute;
            z-index: -1;
        }

        .space-bg {
            background: radial-gradient(circle at 50% 50%, #1a1e2b 0%, #10131a 100%);
            position: relative;
        }

        .nebula {
            background: radial-gradient(circle, rgba(60, 215, 255, 0.12) 0%, transparent 70%);
            filter: blur(80px);
            height: 600px;
            pointer-events: none;
            position: absolute;
            width: 600px;
            z-index: 0;
        }

        .cta-glow-hover {
            position: relative;
            z-index: 1;
        }

        .cta-glow-hover::before {
            background: rgba(60, 215, 255, 0);
            border-radius: inherit;
            content: '';
            filter: blur(12px);
            inset: -4px;
            position: absolute;
            transition: all 0.4s ease;
            z-index: -1;
        }

        .cta-glow-hover:hover::before {
            background: rgba(60, 215, 255, 0.6);
            inset: -8px;
        }

        .shimmer-on-hover:hover {
            animation: shimmer 2s infinite linear;
            background: linear-gradient(90deg, rgba(29, 32, 38, 0.4) 25%, rgba(60, 215, 255, 0.05) 50%, rgba(29, 32, 38, 0.4) 75%);
            background-size: 200% 100%;
        }

        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s cubic-bezier(0.2, 1, 0.3, 1);
        }

        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }

        #starfield-canvas {
            inset: 0;
            pointer-events: none;
            position: absolute;
            z-index: 1;
        }

        .animate-float-space {
            animation: float-space 6s ease-in-out infinite;
        }

        .animate-zero-gravity {
            animation: zero-gravity 6s ease-in-out infinite;
        }

        .animate-marquee {
            animation: marquee 30s linear infinite;
            display: flex;
            width: max-content;
        }

        .animate-marquee:hover {
            animation-play-state: paused;
        }

        @keyframes shimmer {
            0% { background-position: -200% 0; }
            100% { background-position: 200% 0; }
        }

        @keyframes rotate-border {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @keyframes float-space {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(2deg); }
        }

        @keyframes zero-gravity {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-15px) rotate(2deg); }
        }

        @keyframes marquee {
            0% { transform: translateX(-50%); }
            100% { transform: translateX(0); }
        }

        .mobile-scroll {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .mobile-scroll::-webkit-scrollbar {
            display: none;
        }

        @media (max-width: 767px) {
            .mobile-scroll {
                scrollbar-width: none;
            }

            .mobile-scroll::-webkit-scrollbar {
                display: none;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .animate-float-space,
            .animate-zero-gravity,
            .animate-marquee,
            .neon-border-pulse::after,
            .shimmer-on-hover:hover,
            .reveal {
                animation: none !important;
                opacity: 1 !important;
                transform: none !important;
                transition: none !important;
            }
        }
    </style>
</head>
<body class="font-body text-base">
    <header class="fixed top-0 z-50 w-full border-b border-white/20 bg-surface/20 backdrop-blur-md">
        <nav class="mx-auto flex max-w-container-max items-center justify-between gap-5 px-4 py-4 md:px-gutter">
            <a class="flex min-w-0 items-center gap-3" href="{{ route('home') }}" aria-label="iLearn Science home">
                <img alt="iLearn Science Logo" class="h-12 w-12 shrink-0 object-contain md:h-14 md:w-14" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBRlFDOjxkn2sD8rhXX_C9oZtkMTA0F2zIbuZyG9wIVQvasApaG3RmYgyG2Pvp2jL5OiIRqxkIx75Tsq4ci10yb8-EExxTPy1tjBBGxv1_B3mcIr9zJxx3s_rlbkerqWnrBAlY0nMbog5hJGyrtHKkEW2ogz66o1R7h0OAPWRoU3Y4Dy9K6RZJItpyPL-ZXT9Xn5m73Ru9ye9BaZqOLXhg7JJvqaSDws24wBFWt5ncypHJMLUZ0mtJgObLNXtQbZinBc0Bg4jGSDVg">
                <span class="truncate font-headline text-xl font-bold tracking-tight text-primary md:text-2xl">iLearn Science</span>
            </a>

            <div class="mobile-scroll ml-auto flex items-center gap-2 overflow-x-auto md:gap-4" data-auth-mount>
                <button class="cta-glow-hover flex items-center gap-2 rounded-lg bg-primary-container px-4 py-2.5 font-label text-sm font-medium text-on-primary-container transition-all duration-300 hover:scale-105 active:scale-95" type="button" id="product-search-open" aria-label="Search products">
                    <span class="material-symbols-outlined text-[20px]">search</span>
                    <span>Search</span>
                </button>
                <a class="cta-glow-hover flex items-center gap-2 rounded-lg bg-primary-container px-4 py-2.5 font-label text-sm font-medium text-on-primary-container transition-all duration-300 hover:scale-105 active:scale-95" href="{{ route('about') }}">
                    <span class="material-symbols-outlined text-[20px]">info</span>
                    <span>About</span>
                </a>
                <a class="cta-glow-hover flex items-center gap-2 rounded-lg bg-primary-container px-4 py-2.5 font-label text-sm font-medium text-on-primary-container transition-all duration-300 hover:scale-105 active:scale-95" href="{{ route('blog') }}">
                    <span class="material-symbols-outlined text-[20px]">article</span>
                    <span>Blog</span>
                </a>
                <a class="cta-glow-hover flex items-center gap-2 rounded-lg bg-primary-container px-4 py-2.5 font-label text-sm font-medium text-on-primary-container transition-all duration-300 hover:scale-105 active:scale-95" href="{{ route('dashboard') }}">
                    <span class="material-symbols-outlined text-[20px]">space_dashboard</span>
                    <span>Dashboard</span>
                </a>
                    <a class="cta-glow-hover relative flex items-center gap-2 rounded-lg bg-primary-container px-4 py-2.5 font-label text-sm font-medium text-on-primary-container transition-all duration-300 hover:scale-105 active:scale-95" href="{{ route('cart') }}" data-cart-link aria-label="Cart with 3 items">
                        <span class="material-symbols-outlined text-[20px]">shopping_cart</span>
                        <span>Cart</span>
                        <span class="absolute -right-2 -top-2 flex h-5 min-w-5 items-center justify-center rounded-full bg-primary px-1 font-label text-[10px] font-bold leading-none text-on-primary shadow-[0_0_12px_rgba(168,232,255,0.65)]" data-cart-count>3</span>
                    </a>
            </div>
        </nav>
    </header>

    <main>
        <section class="relative flex min-h-screen items-center overflow-hidden bg-surface pt-28">
            <div class="absolute inset-0 z-0">
                <canvas class="h-full w-full" id="starfield-canvas"></canvas>
                <div class="absolute left-1/4 top-1/4 h-[500px] w-[500px] animate-pulse rounded-full bg-primary/10 blur-[120px]"></div>
                <div class="absolute bottom-1/4 right-1/4 h-[600px] w-[600px] animate-pulse rounded-full bg-tertiary/10 blur-[150px]" style="animation-delay: 2s;"></div>
            </div>

            <div class="relative z-10 mx-auto grid max-w-container-max grid-cols-1 items-center gap-12 px-4 py-12 md:px-gutter lg:grid-cols-2 lg:gap-16">
                <div class="reveal space-y-8">
                    <p class="font-label text-sm font-medium uppercase tracking-[0.2em] text-primary-container">Making Science Teachers' Life Simple...</p>
                    <h1 class="font-headline text-5xl font-bold leading-tight text-on-surface md:text-7xl lg:text-8xl" style="text-shadow: 0 0 30px rgba(168, 232, 255, 0.3);">
                        Teach More, <span class="text-primary">Prepare Less!</span>
                    </h1>
                    <p class="max-w-xl text-lg leading-8 text-on-surface-variant">
                        Download ready-to-use PowerPoint lessons, worksheets, quizzes, and teaching resources designed for modern classrooms.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a class="cta-glow-hover rounded-lg bg-primary-container px-8 py-4 font-label text-sm font-medium text-on-primary-container transition-all duration-300 hover:scale-105" href="{{ route('shop') }}">Shop Resources</a>
                        <a class="rounded-lg border border-primary px-8 py-4 font-label text-sm font-medium text-primary transition-all hover:bg-primary/10" href="#resources">Browse Worksheets</a>
                    </div>
                    <div class="flex flex-wrap items-center gap-3 border-t border-white/10 pt-8 md:gap-6">
                        <div class="flex items-center gap-2 rounded-lg border border-white/10 bg-surface-container-low px-4 py-2 transition-colors hover:border-primary/50">
                            <span class="material-symbols-outlined text-sm text-primary">download</span>
                            <span class="font-label text-xs uppercase tracking-wider text-on-surface-variant">2,400+ downloads</span>
                        </div>
                        <div class="flex items-center gap-2 rounded-lg border border-white/10 bg-surface-container-low px-4 py-2 transition-colors hover:border-primary/50">
                            <span class="material-symbols-outlined text-sm text-primary">edit</span>
                            <span class="font-label text-xs uppercase tracking-wider text-on-surface-variant">Editable files</span>
                        </div>
                        <div class="flex items-center gap-2 rounded-lg border border-white/10 bg-surface-container-low px-4 py-2 transition-colors hover:border-primary/50">
                            <span class="material-symbols-outlined text-sm text-primary">verified_user</span>
                            <span class="font-label text-xs uppercase tracking-wider text-on-surface-variant">Teacher made</span>
                        </div>
                    </div>
                </div>

                <div class="relative flex h-[500px] w-full items-center justify-center lg:h-[600px]">
                    <div class="animate-zero-gravity relative z-10 w-full max-w-[500px] lg:max-w-none">
                        <div class="absolute inset-0 scale-75 animate-pulse rounded-full bg-primary/20 blur-[60px]"></div>
                        <img alt="iLearn Science Astronaut" class="relative z-10 h-full w-full object-contain drop-shadow-[0_0_50px_rgba(0,212,255,0.5)]" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCDO3DIYODKmd27gYYPHEyaXRAxiHRQgv-u6k697ETbW8JaUPcp7z4LtWNToa1_QL7KPKgOmcBWro6s5Q97XxFezj3NL8m-F5QgaPKOnajfK1rsW8AE0CN8qpEmQwvWB5sw4wanURc_O6bRElwPqs7VRZgDyzjoEPGPhEecmijzXASyeJQ6i5ZdBZYpDmRGi9hRI4r6wk-866ck3zCUXaTCoBaGqKJWM-61VIv5WI-lRhjRAwPLoxsSq_6IDwfbWIBlK94wD3wBCpw">
                    </div>
                </div>
            </div>
        </section>

        <section id="resources" class="relative overflow-hidden bg-surface-container-lowest py-24">
            <div class="mx-auto max-w-container-max px-4 md:px-gutter">
                <div class="reveal mb-12 flex flex-col items-start justify-between gap-6 md:flex-row md:items-end">
                    <div>
                        <h2 class="font-headline text-3xl font-semibold md:text-4xl">Top Science Resources</h2>
                        <p class="mt-2 text-on-surface-variant">Fuel your classroom with high-octane scientific materials.</p>
                    </div>
                    <div class="mobile-scroll flex w-full gap-2 overflow-x-auto pb-2 md:w-auto">
                        @foreach (['All', 'PowerPoint Presentation (PPTX)', 'Worksheet', 'Visual Resources', 'Study Guides', 'Test/Quiz'] as $category)
                            <button
                                class="resource-category-filter glass-panel whitespace-nowrap rounded-full px-4 py-2 font-label text-xs transition-all hover:border-primary/50 {{ $loop->first ? 'border-primary/40 bg-primary-container/10 text-primary shadow-[0_0_15px_rgba(60,215,255,0.18)]' : 'text-on-surface-variant' }}"
                                type="button"
                                data-resource-category="{{ $category }}"
                                aria-pressed="{{ $loop->first ? 'true' : 'false' }}"
                            >
                                {{ $category }}
                            </button>
                        @endforeach
                    </div>
                </div>

                <div id="home-resource-grid" class="grid grid-cols-1 gap-gutter sm:grid-cols-2 lg:grid-cols-4">
                    <div class="glass-panel col-span-full rounded-xl p-8 text-center text-on-surface-variant">
                        <span class="material-symbols-outlined mb-3 text-4xl text-primary">sync</span>
                        <p class="font-headline text-xl text-on-surface">Loading live science resources...</p>
                        <p class="mt-2 text-sm">Products added in the admin dashboard will appear here automatically.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="why" class="space-bg py-24">
            <div class="reveal mx-auto mb-16 max-w-container-max px-4 text-center md:px-gutter">
                <h2 class="font-headline text-3xl font-semibold md:text-4xl">Why Mission Control Teachers Choose Us</h2>
                <p class="mx-auto mt-4 max-w-2xl text-on-surface-variant">Engineered by educators, for educators. Our resources are field-tested and student-approved.</p>
            </div>

            <div class="mx-auto grid max-w-container-max grid-cols-1 gap-8 px-4 md:grid-cols-2 md:px-gutter lg:grid-cols-3">
                @php
                    $features = [
                        ['download', 'Instant Download', 'Access your resources immediately after purchase. No shipping, no waiting, just learning.', 'primary'],
                        ['school', 'Classroom Ready', 'Lessons designed for immediate delivery. High engagement and standards-aligned content.', 'secondary'],
                        ['edit_document', 'Editable Templates', 'Easily customize any PPT or worksheet to fit your specific classroom needs and style.', 'tertiary'],
                        ['diversity_3', 'Teacher-Made', "Created by experienced science educators who understand today's classroom challenges.", 'primary'],
                        ['print', 'Printable Worksheets', 'Clean, professional layouts optimized for both printing and digital distribution.', 'secondary'],
                        ['mood', 'Student-Friendly', 'Gamified elements and clear visuals keep students curious and engaged with science.', 'tertiary'],
                    ];
                @endphp

                @foreach ($features as [$icon, $title, $copy, $color])
                    <article class="glass-panel reveal shimmer-on-hover rounded-2xl border-b-4 border-{{ $color }} p-8 transition-all hover:bg-surface-variant/30">
                        <div class="neon-glow mb-6 flex h-16 w-16 items-center justify-center rounded-xl bg-{{ $color }}/10">
                            <span class="material-symbols-outlined text-4xl text-{{ $color }}">{{ $icon }}</span>
                        </div>
                        <h3 class="mb-2 font-headline text-2xl font-semibold">{{ $title }}</h3>
                        <p class="text-on-surface-variant">{{ $copy }}</p>
                    </article>
                @endforeach
            </div>
        </section>

        <section class="overflow-hidden bg-surface-container-low py-24">
            <div class="reveal mx-auto mb-12 max-w-container-max px-4 md:px-gutter">
                <h2 class="font-headline text-3xl font-semibold md:text-4xl">Best Sellers Showcase</h2>
            </div>
            <div class="animate-marquee gap-8 px-gutter">
                @php
                    $bestSellers = [
                        ['Climate Change PPT Pack', 'https://lh3.googleusercontent.com/aida-public/AB6AXuCYQO5t97kvjek5vvog9vMecMC_JW5jnSN-IeGnbar__dr8JDR2eejsPrgo_HvOlpBi5JNllOCVM5SxnhJiiReezTB3MaQC4dANL5oUMQwCcxJZMq4gnKmc2XSWNLx3PK-H4tntQ_uG0eTLZsxEo2rQk7bL3pxXDhwu3KqmDagXpOkvDVJPsXh1QBaNn80HdAbGfny92FOz7TInUYQBEKoxJlSfFByWJVvnp6u8bpbUOM_W3f2N_f6l8LNmF6BoKDDiC6zx87s-Nc0'],
                        ['Interactive Plant Cells Guide', 'https://lh3.googleusercontent.com/aida-public/AB6AXuBMHLu6K-5GuTLkW3Ed_8kQEyUL8AeWNFlE4RGgSr5hIVznT_p6NkUn7RFIRQonIJ3IwlbxmWDkmvR7r8pOoHLvYxtaTxo1Dx5X3de1MMVLngpwJI-JP5veYmOUoIeQYbQFUkftEmyr7Iy8C7jb-HADtlSZ6FDpvDDPaCEGoI0mrqg6XRIhSHHqdh3sFsDUvSqb9e4J1XBmX-Qse-Ug3qy29dW1DjtweUn-shNEGKcsn6KnC92vH-WHKyTnQ7Qduh59k6OJy0pw-ak'],
                        ['Lab Report Master Template', 'https://lh3.googleusercontent.com/aida-public/AB6AXuCSfzKD7RRzVkwfRQ2pxDXUzqd6HLdT5h3glOca237iuUTdXug8UA_fZ0cxjSMdIPSrJbOq32q_voF1f-SLbLLl3wxhbng_V3JH-s0WDnHy07rTDsX0ozwcv9N1OfozqS-Ghj3x6QabdlP9lVocyCcQuqlGNVVv-FY9GUikUE_VEBhu6lRksVln8piLsw-Oh3yX_xMUNiZyqY-oF2BB_mA-ttzfd6wZqgDxBdXwtLCDUxvY7pGGQlJxvmOMVpxBuUsGc-ZHSiJDfWo'],
                        ['Interactive Physics Quizzer', 'https://lh3.googleusercontent.com/aida-public/AB6AXuDfxSNvH8jX5l7WzwHJun2F_BWEiXc0-u61ZuKxIrMY7nboi8mOVCzdeTXArF1KZKJ5rwVOaCcWgi5-0lN17Myx2u1PpfSLOnP5ZZfmN5oz95rVYocsE7ejbOlgmyXLaQRzlMtFCjeDYZWYRNDqDcC3M2E1DCU033TcdjOVSWinXLDClFz8meoQyue-FBPDEUGG_acE9QwiTT_z1X6GXQ75ogJjWaRcI2YxvFoVMwlYAHyp82A6nn1PXorCe2iUoqpdc-7KkgBOWu8'],
                    ];
                @endphp

                @foreach (array_merge($bestSellers, $bestSellers) as [$title, $image])
                    <article class="glass-panel shimmer-on-hover relative inline-block w-[320px] shrink-0 rounded-2xl p-6 md:w-[400px]">
                        <div class="neon-glow absolute -right-3 -top-3 z-10 rounded-full bg-secondary px-3 py-1 font-label text-xs text-on-secondary">Best Seller</div>
                        <img alt="{{ $title }}" class="mb-4 h-56 w-full rounded-xl object-cover" src="{{ $image }}">
                        <p class="font-headline text-lg font-semibold text-on-surface">{{ $title }}</p>
                    </article>
                @endforeach
            </div>
        </section>

        <section class="space-bg py-24">
            <div class="reveal mx-auto mb-16 max-w-container-max px-4 text-center md:px-gutter">
                <h2 class="font-headline text-3xl font-semibold md:text-4xl">Feedback From the Lab</h2>
            </div>
            <div class="mx-auto grid max-w-container-max grid-cols-1 gap-8 px-4 md:grid-cols-3 md:px-gutter">
                @php
                    $testimonials = [
                        ['Sarah Johnson', 'High School Science Teacher', 'The PPT templates are a lifesaver. My students are finally paying attention during the genetics unit!', 'primary', 'https://lh3.googleusercontent.com/aida-public/AB6AXuC_XoaeNS9yNhGVI5Cr9EEILv4r8V3YuieVSmh3ir4dqRqDZ-b9dGxbyJexTbMmjjTKqQ9pQeQCxQK1SRrjtZAeeZhn_70jMT2UqLno0TYuI1PR9-S0XYVoXE0QKkNJxvjmhRPkVQWY3mJQ4WOTMqFDs6NWyliFq53dPOkNGirEApI1Wl_0SdSBIvLikUp-awRQYx9f92bZjZS2hTvg_in_Uc8gyWo4z17q9kNsB27T5J2EHLltHgZByPPGF8XIJJyw1n2anwQyyKg'],
                        ['David Miller', 'Middle School Educator', 'Best investment this school year. The worksheets are deep and rigorous but easy for kids to follow.', 'secondary', 'https://lh3.googleusercontent.com/aida-public/AB6AXuB8HqNia5Cs9S-dwo7G6RgUfUIjSnaHM4RT0CwPsf9g_e5nGu5QHW5snORSiMGOUdyBUIyNx8tGSERSjQb9_NqLoTKJJ5ZF_QeBypqLmutFzxouTWNsdjXSG2c0QCL69XmP8Ce2vZcnwY7zq_nIoT5WTxcbWk_M0Jbgggo2r_Lp27iJVwcqtLjb-oppbyq54iCXTbWsalyxiSn-sIFylaqXWF7rGJyNOm2i8x_Sa1EFt9hMGwavxgf27fLTIxFNlyf2vKE_-EMy0Dk'],
                        ['Emily Chen', 'Home School Parent', 'Simple, effective, and beautifully designed. My kids actually ask to do science now!', 'tertiary', 'https://lh3.googleusercontent.com/aida-public/AB6AXuBXIRino9jhKKprYGT5ZFXhyM4Cobt36kA934kIY0pnz54vfH0g1iZAfPu0eRjbPBPB9tjtkK9Gpaxo4jfP5CurzgsPIA2eLnfKjiRuXvScXjFvDemK68Z1kxqnajNoaItKChpQPsVP_57xiTJM7f2cArVIMegqMSMnt5tJptrnQaUQh84_aPcsJHJMb7Np5kNQ8AqhG_AOztFEvXBfEdZM7HUaTlBn-jLF0YpSzh9ZsqnY6yzT0M3XUmwMXyFsOFx2OxhQ-CQ715A'],
                    ];
                @endphp

                @foreach ($testimonials as [$name, $role, $quote, $color, $avatar])
                    <article class="glass-panel reveal rounded-2xl p-8 {{ $loop->index === 1 ? 'border border-primary/30 md:scale-105' : '' }}">
                        <div class="mb-6 flex items-center gap-4">
                            <img alt="{{ $name }}" class="h-12 w-12 rounded-full border-2 border-{{ $color }}" src="{{ $avatar }}">
                            <div>
                                <p class="font-headline font-semibold">{{ $name }}</p>
                                <p class="font-label text-xs text-on-surface-variant">{{ $role }}</p>
                            </div>
                        </div>
                        <div class="mb-4 flex">
                            @for ($i = 0; $i < 5; $i++)
                                <span class="material-symbols-outlined text-sm text-{{ $color }}" style="font-variation-settings: 'FILL' 1;">star</span>
                            @endfor
                        </div>
                        <p class="italic text-on-surface">"{{ $quote }}"</p>
                    </article>
                @endforeach
            </div>
        </section>

        <section id="newsletter" class="py-24">
            <div class="mx-auto max-w-container-max px-4 md:px-gutter">
                <div class="glass-panel neon-border-pulse reveal relative overflow-hidden rounded-3xl p-8 text-center md:p-12">
                    <div class="relative z-10 space-y-6">
                        <h2 class="font-headline text-3xl font-bold md:text-4xl">Get Free Science Resources Weekly</h2>
                        <p class="mx-auto max-w-xl text-lg text-on-surface-variant">Join 10,000+ teachers receiving exclusive worksheets, experiment ideas, and PPT templates in their inbox.</p>
                        <form class="mx-auto flex max-w-lg flex-col gap-4 sm:flex-row" onsubmit="event.preventDefault(); alert('Welcome to the community!');">
                            <input class="flex-1 rounded-lg border-outline-variant bg-surface-container-high px-6 py-4 font-label text-on-surface outline-none transition-all focus:border-primary focus:ring-1 focus:ring-primary" placeholder="Enter your edu email" type="email" required>
                            <button class="cta-glow-hover whitespace-nowrap rounded-lg bg-primary px-8 py-4 font-label text-sm font-medium text-on-primary-container transition-all active:scale-95">
                                Join the iLearn Community
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="mt-auto w-full border-t border-outline-variant/30 bg-surface-container-lowest">
        <div class="mx-auto grid max-w-container-max grid-cols-1 gap-gutter px-4 py-12 md:grid-cols-4 md:px-margin-desktop">
            <div class="space-y-4">
                <div class="font-headline text-2xl font-bold text-primary-fixed-dim">iLearn Science</div>
                <p class="text-on-surface-variant opacity-80">Empowering educators with the fuel to ignite curiosity in every classroom.</p>
            </div>
            <div>
                <h4 class="mb-6 font-label text-sm uppercase tracking-widest text-primary-fixed">Resources</h4>
                <ul class="space-y-3">
                    @foreach (['Visual Resources', 'PPT Templates', 'Worksheets', 'Test and Quizzes', 'Study Guides'] as $link)
                        <li><a class="text-on-surface-variant transition-colors hover:text-primary" href="#resources">{{ $link }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div>
                <h4 class="mb-6 font-label text-sm uppercase tracking-widest text-primary-fixed">Company</h4>
                <ul class="space-y-3">
                    <li><a class="text-on-surface-variant transition-colors hover:text-primary" href="#pricing">Pricing</a></li>
                    <li><a class="text-on-surface-variant transition-colors hover:text-primary" href="{{ route('about') }}">About</a></li>
                    <li><a class="text-on-surface-variant transition-colors hover:text-primary" href="{{ route('blog') }}">Blog</a></li>
                    <li><a class="text-on-surface-variant transition-colors hover:text-primary" href="{{ route('about') }}#support">Support</a></li>
                </ul>
            </div>
            <div>
                <h4 class="mb-6 font-label text-sm uppercase tracking-widest text-primary-fixed">Connect</h4>
                <div class="flex gap-4">
                    <a class="glass-panel flex h-10 w-10 items-center justify-center rounded-full transition-all hover:text-primary" href="#" aria-label="Website"><span class="material-symbols-outlined">public</span></a>
                    <a class="glass-panel flex h-10 w-10 items-center justify-center rounded-full transition-all hover:text-primary" href="#" aria-label="Email"><span class="material-symbols-outlined">alternate_email</span></a>
                </div>
                <p class="mt-6 text-on-surface-variant opacity-80">© 2024 iLearn Science. All systems operational.</p>
            </div>
        </div>
    </footer>

    <div id="cart-toast" class="pointer-events-none fixed right-6 top-24 z-[70] translate-y-2 rounded-2xl border border-primary/30 bg-surface-container-high/95 px-5 py-4 opacity-0 shadow-[0_0_24px_rgba(0,212,255,0.28)] backdrop-blur-xl transition-all duration-300">
        <div class="flex items-center gap-3">
            <span class="material-symbols-outlined text-primary">check_circle</span>
            <div>
                <p class="font-headline text-sm font-semibold text-on-surface">Added to cart</p>
                <p id="cart-toast-product" class="font-label text-xs text-on-surface-variant">Science resource</p>
            </div>
        </div>
    </div>

    <div id="resource-preview-modal" class="fixed inset-0 z-[80] hidden items-center justify-center bg-surface-container-lowest/70 p-4 backdrop-blur-md md:p-6">
        <div class="glass-panel relative flex max-h-[calc(100vh-2rem)] w-full max-w-5xl flex-col overflow-y-auto rounded-2xl border-primary/30 shadow-[0_0_35px_rgba(0,212,255,0.22)]">
            <button id="resource-preview-close" class="absolute right-4 top-4 z-10 flex h-10 w-10 items-center justify-center rounded-full bg-surface-container-high/90 text-on-surface-variant transition-colors hover:text-primary" type="button" aria-label="Close preview">
                <span class="material-symbols-outlined">close</span>
            </button>
            <div class="grid min-h-0 grid-cols-1 md:grid-cols-2">
                <div class="relative flex min-h-[260px] items-center justify-center overflow-hidden bg-surface-container-lowest/70 p-4 md:min-h-[520px]">
                    <img id="resource-preview-image" class="max-h-[42vh] w-full object-contain md:max-h-[calc(100vh-8rem)]" alt="">
                    <div class="absolute inset-0 bg-gradient-to-t from-background/80 to-transparent md:bg-gradient-to-r"></div>
                </div>
                <div class="flex flex-col justify-center p-6 md:p-8">
                    <span id="resource-preview-type" class="mb-4 w-fit rounded bg-primary-container px-3 py-1 font-label text-xs font-bold text-on-primary-container shadow-[0_0_12px_rgba(0,212,255,0.35)]"></span>
                    <h3 id="resource-preview-title" class="font-headline text-3xl font-semibold text-on-surface"></h3>
                    <div class="mt-4 grid grid-cols-2 gap-3">
                        <div class="rounded-lg border border-white/10 bg-white/5 p-3">
                            <p class="font-label text-[10px] uppercase tracking-widest text-on-surface-variant">Grade Level</p>
                            <p id="resource-preview-grade" class="mt-1 font-label text-xs text-primary"></p>
                        </div>
                        <div class="rounded-lg border border-white/10 bg-white/5 p-3">
                            <p class="font-label text-[10px] uppercase tracking-widest text-on-surface-variant">Format</p>
                            <p id="resource-preview-format" class="mt-1 font-label text-xs text-primary"></p>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center gap-2 text-yellow-400">
                        @for ($i = 0; $i < 5; $i++)
                            <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
                        @endfor
                        <span id="resource-preview-reviews" class="ml-1 font-label text-xs text-on-surface-variant"></span>
                    </div>
                    <p id="resource-preview-description" class="mt-5 text-on-surface-variant"></p>
                    <div class="mt-5">
                        <p class="mb-3 font-label text-xs uppercase tracking-widest text-primary">What's included</p>
                        <ul id="resource-preview-includes" class="space-y-2 text-sm text-on-surface-variant"></ul>
                    </div>
                    <div class="mt-8 flex items-center justify-between gap-4">
                        <span id="resource-preview-price" class="font-headline text-3xl font-semibold text-primary"></span>
                        <button id="resource-preview-add" class="flex items-center gap-2 rounded-lg bg-primary px-5 py-3 font-label text-sm font-bold text-on-primary transition-all hover:scale-[1.02] active:scale-95" type="button">
                            <span class="material-symbols-outlined">add_shopping_cart</span>
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="product-search-modal" class="fixed inset-0 z-[85] hidden items-start justify-center bg-surface-container-lowest/75 p-4 pt-24 backdrop-blur-xl md:p-8 md:pt-28">
        <div class="glass-panel w-full max-w-3xl overflow-hidden rounded-3xl border-primary/30 shadow-[0_0_42px_rgba(0,212,255,0.24)]">
            <div class="flex items-center gap-3 border-b border-white/10 bg-surface-container-high/60 p-4">
                <span class="material-symbols-outlined text-primary">search</span>
                <input id="product-search-input" class="min-w-0 flex-1 border-none bg-transparent font-body text-lg text-on-surface placeholder:text-on-surface-variant/60 focus:ring-0" placeholder="Search product or topic, e.g. heredity, cells, photosynthesis..." type="search" autocomplete="off">
                <button id="product-search-close" class="flex h-10 w-10 items-center justify-center rounded-full border border-white/10 bg-white/5 text-on-surface-variant transition hover:text-primary" type="button" aria-label="Close product search">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            <div class="max-h-[65vh] overflow-y-auto p-4" id="product-search-results">
                <div class="rounded-2xl border border-primary/20 bg-primary-container/10 p-6 text-center">
                    <p class="font-headline text-xl text-primary">Start typing to find resources</p>
                    <p class="mt-2 text-sm text-on-surface-variant">Suggestions match any word found in the product title or name.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        const cartStorageKey = 'ilearnScienceCartItems';
        const inventoryStorageKey = 'ilearnScienceInventoryProducts';
        const productsEndpoint = '{{ route('products.index') }}';
        const productSyncChannel = 'BroadcastChannel' in window ? new BroadcastChannel('ilearn-products-sync') : null;
        const homeResourceGrid = document.getElementById('home-resource-grid');
        const resourceCategoryButtons = document.querySelectorAll('.resource-category-filter');
        let currentHomeProducts = [];
        let currentHomeCategory = 'All';

        function getCartItems() {
            if (window.iLearnAuth?.getCartItems) return window.iLearnAuth.getCartItems();
            try {
                return JSON.parse(localStorage.getItem(cartStorageKey)) || [];
            } catch {
                return [];
            }
        }

        function setCartItems(items) {
            if (window.iLearnAuth?.setCartItems) {
                window.iLearnAuth.setCartItems(items);
                return;
            }
            localStorage.setItem(cartStorageKey, JSON.stringify(items));
        }

        function updateCartCount() {
            const signedIn = window.iLearnAuth?.isSignedIn ? window.iLearnAuth.isSignedIn() : false;
            const actualCount = signedIn ? getCartItems().reduce((sum, item) => sum + (Number(item.quantity) || 1), 0) : 0;

            document.querySelectorAll('[data-cart-count]').forEach((badge) => {
                badge.classList.toggle('hidden', !signedIn);
                badge.innerText = actualCount;
            });
            document.querySelectorAll('[data-cart-link]').forEach((link) => {
                link.setAttribute('aria-label', `Cart with ${actualCount} item${actualCount === 1 ? '' : 's'}`);
            });
        }

        function showCartToast(productTitle) {
            const toast = document.getElementById('cart-toast');
            const label = document.getElementById('cart-toast-product');
            if (!toast) return;
            if (label) label.innerText = productTitle;
            toast.classList.remove('translate-y-2', 'opacity-0');
            toast.classList.add('translate-y-0', 'opacity-100');
            setTimeout(() => {
                toast.classList.add('translate-y-2', 'opacity-0');
                toast.classList.remove('translate-y-0', 'opacity-100');
            }, 1800);
        }

        let previewProduct = null;

        function openResourcePreview(product) {
            previewProduct = product;
            document.getElementById('resource-preview-image').src = product.image;
            document.getElementById('resource-preview-image').alt = product.title;
            document.getElementById('resource-preview-title').innerText = product.title;
            document.getElementById('resource-preview-type').innerText = product.type;
            document.getElementById('resource-preview-price').innerText = product.price;
            document.getElementById('resource-preview-reviews').innerText = product.reviews;
            document.getElementById('resource-preview-grade').innerText = product.grade;
            document.getElementById('resource-preview-format').innerText = product.format;
            document.getElementById('resource-preview-description').innerText = product.description;
            document.getElementById('resource-preview-includes').innerHTML = product.includes
                .split('|')
                .map((item) => `<li class="flex items-start gap-2"><span class="material-symbols-outlined mt-0.5 text-[16px] text-primary">check_circle</span><span>${item}</span></li>`)
                .join('');
            document.getElementById('resource-preview-modal').classList.remove('hidden');
            document.getElementById('resource-preview-modal').classList.add('flex');
        }

        function closeResourcePreview() {
            document.getElementById('resource-preview-modal').classList.add('hidden');
            document.getElementById('resource-preview-modal').classList.remove('flex');
        }

        function normalizeProductForSearch(product) {
            return {
                id: product.id || product.slug || product.title?.toLowerCase().replace(/[^a-z0-9]+/g, '-') || `product-${Date.now()}`,
                title: product.title || 'Science Resource',
                type: product.type || product.category || 'Digital Resource',
                meta: product.meta || `${product.type || product.category || 'Digital'} Resource`,
                price: product.price || '₱0.00',
                reviews: product.reviews || '(New)',
                grade: product.grade || 'All Grades',
                format: product.format || 'Digital File',
                description: product.description || product.copy || product.shortDescription || 'Teacher-ready science learning material.',
                includes: product.includes || 'Editable resource|Digital download|Classroom-ready activity',
                image: product.image || product.imageUrl || '',
            };
        }

        function escapeHTML(value = '') {
            return String(value).replace(/[&<>"']/g, (character) => ({
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#039;',
            }[character]));
        }

        function formatProductPeso(value) {
            const amount = Number.parseFloat(String(value).replace(/[₱,]/g, '')) || 0;
            return `₱${amount.toFixed(2)}`;
        }

        function activeInventoryProducts(products) {
            return (Array.isArray(products) ? products : [])
                .filter((item) => ['published', 'active'].includes(String(item.status || 'Published').toLowerCase()));
        }

        function saveLiveProducts(products) {
            localStorage.setItem(inventoryStorageKey, JSON.stringify(products));
            localStorage.setItem(`${inventoryStorageKey}Initialized`, 'true');
            window.iLearnAuth?.syncProductsToCatalogue?.(products);
        }

        function normalizeResourceCategoryName(value = '') {
            const normalized = String(value).trim().toLowerCase().replace(/&/g, 'and').replace(/[^a-z0-9]+/g, ' ');

            if (/(^|\s)(ppt|pptx|powerpoint|presentation|presentations|slide|slides|template|templates)(\s|$)/.test(normalized)) return 'PowerPoint Presentation (PPTX)';
            if (/(^|\s)(worksheet|worksheets|activity sheet|practice sheet|handout|printable)(\s|$)/.test(normalized)) return 'Worksheet';
            if (/(^|\s)(visual resource|visual resources|visual|diagram|chart|infographic|poster|image|illustration|model|map)(\s|$)/.test(normalized)) return 'Visual Resources';
            if (/(^|\s)(study guide|study guides|guide|lesson guide|reference|module|reading)(\s|$)/.test(normalized)) return 'Study Guides';
            if (/(^|\s)(test|quiz|quizzes|assessment|exam|question bank|reviewer)(\s|$)/.test(normalized)) return 'Test/Quiz';

            return '';
        }

        function canonicalResourceCategory(product) {
            const selectedCategory = normalizeResourceCategoryName(product.category)
                || normalizeResourceCategoryName(product.type)
                || normalizeResourceCategoryName(product.productType);

            if (selectedCategory) return selectedCategory;

            return normalizeResourceCategoryName([product.format, product.title, product.tags].filter(Boolean).join(' '))
                || product.category
                || product.type
                || 'Digital Resources';
        }

        function matchesResourceCategory(product, category) {
            return category === 'All' || canonicalResourceCategory(product) === category;
        }

        function setActiveResourceCategory(category) {
            currentHomeCategory = category;
            resourceCategoryButtons.forEach((button) => {
                const isActive = button.dataset.resourceCategory === category;
                button.setAttribute('aria-pressed', String(isActive));
                button.classList.toggle('border-primary/40', isActive);
                button.classList.toggle('bg-primary-container/10', isActive);
                button.classList.toggle('text-primary', isActive);
                button.classList.toggle('shadow-[0_0_15px_rgba(60,215,255,0.18)]', isActive);
                button.classList.toggle('text-on-surface-variant', !isActive);
            });
        }

        function homeProductCard(product) {
            const productCategory = canonicalResourceCategory(product);
            const normalized = normalizeProductForSearch({
                id: product.id,
                title: product.title,
                type: productCategory,
                meta: `${productCategory} Resource`,
                price: formatProductPeso(product.price),
                reviews: product.downloads || '(New)',
                grade: product.grade,
                format: product.format,
                description: product.description,
                includes: product.details || product.tags || 'Editable resource|Digital download|Teacher-ready activity',
                image: product.image || product.imageUrl,
            });

            return `
                <article class="glass-panel reveal shimmer-on-hover group overflow-hidden rounded-xl transition-all duration-300 hover:scale-[1.02]" data-admin-product-card="${escapeHTML(normalized.id)}">
                    <div class="relative h-48 overflow-hidden">
                        ${normalized.image ? `<img alt="${escapeHTML(normalized.title)}" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110" src="${escapeHTML(normalized.image)}">` : `<div class="flex h-full w-full items-center justify-center bg-surface-container-high text-primary"><span class="material-symbols-outlined text-5xl">science</span></div>`}
                        <div class="absolute right-2 top-2 rounded bg-primary-container px-2 py-1 font-label text-xs font-bold text-on-primary-container shadow-[0_0_12px_rgba(0,212,255,0.35)]">${escapeHTML(normalized.type)}</div>
                    </div>
                    <div class="p-6">
                        <h3 class="mb-2 font-headline text-lg font-semibold">${escapeHTML(normalized.title)}</h3>
                        <p class="mb-4 line-clamp-2 text-sm text-on-surface-variant">${escapeHTML(normalized.description)}</p>
                        <div class="flex items-center justify-between gap-3">
                            <span class="font-headline text-2xl font-semibold text-primary">${escapeHTML(normalized.price)}</span>
                            <div class="flex items-center gap-2">
                                <button class="top-resource-preview rounded-lg border border-primary/30 bg-surface-container-high p-2 text-primary transition-colors hover:bg-primary hover:text-on-primary-container" type="button" aria-label="Preview ${escapeHTML(normalized.title)}" data-product-title="${escapeHTML(normalized.title)}" data-product-type="${escapeHTML(normalized.type)}" data-product-price="${escapeHTML(normalized.price)}" data-product-reviews="${escapeHTML(normalized.reviews)}" data-product-grade="${escapeHTML(normalized.grade)}" data-product-format="${escapeHTML(normalized.format)}" data-product-description="${escapeHTML(normalized.description)}" data-product-includes="${escapeHTML(normalized.includes)}" data-product-image="${escapeHTML(normalized.image)}">
                                    <span class="material-symbols-outlined">visibility</span>
                                </button>
                                <button class="top-resource-add-to-cart rounded-lg bg-surface-container-high p-2 transition-colors hover:bg-primary hover:text-on-primary-container" type="button" aria-label="Add ${escapeHTML(normalized.title)} to cart" data-product-id="${escapeHTML(normalized.id)}" data-product-title="${escapeHTML(normalized.title)}" data-product-meta="${escapeHTML(normalized.meta)}" data-product-price="${escapeHTML(normalized.price)}" data-product-image="${escapeHTML(normalized.image)}">
                                    <span class="material-symbols-outlined">add_shopping_cart</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </article>
            `;
        }

        function renderHomeAdminProducts(products = null) {
            if (!homeResourceGrid) return;
            let source = products;
            if (!source) {
                try { source = JSON.parse(localStorage.getItem(inventoryStorageKey) || '[]') || []; } catch { source = []; }
            }
            currentHomeProducts = activeInventoryProducts(source);
            const cards = activeInventoryProducts(source)
                .filter((product) => matchesResourceCategory(product, currentHomeCategory))
                .map(homeProductCard)
                .join('');
            homeResourceGrid.innerHTML = cards || `
                <div class="glass-panel col-span-full rounded-xl p-8 text-center text-on-surface-variant">
                    <span class="material-symbols-outlined mb-3 text-4xl text-primary">inventory_2</span>
                    <p class="font-headline text-xl text-on-surface">No ${escapeHTML(currentHomeCategory === 'All' ? 'active' : currentHomeCategory.toLowerCase())} resources yet</p>
                    <p class="mt-2 text-sm">Add or publish products in this category from the admin inventory and they will appear here.</p>
                </div>
            `;
            homeResourceGrid.querySelectorAll('.reveal').forEach((element) => element.classList.add('active'));
        }

        async function refreshHomeProductsFromServer() {
            try {
                const response = await fetch(`${productsEndpoint}?t=${Date.now()}`, {
                    cache: 'no-store',
                    headers: { Accept: 'application/json' },
                });
                if (!response.ok) throw new Error('Unable to load products.');
                const data = await response.json();
                if (Array.isArray(data.products)) {
                    saveLiveProducts(data.products);
                    renderHomeAdminProducts(data.products);
                    renderProductSearchResults(document.getElementById('product-search-input')?.value || '');
                }
            } catch (error) {
                console.error(error);
            }
        }

        function getHomepageSearchProducts() {
            const products = Array.from(document.querySelectorAll('.top-resource-preview')).map((button) => normalizeProductForSearch({
                id: button.closest('article')?.querySelector('.top-resource-add-to-cart')?.dataset.productId,
                title: button.dataset.productTitle,
                type: button.dataset.productType,
                meta: `${button.dataset.productType || 'Digital'} Resource`,
                price: button.dataset.productPrice,
                reviews: button.dataset.productReviews,
                grade: button.dataset.productGrade,
                format: button.dataset.productFormat,
                description: button.dataset.productDescription,
                includes: button.dataset.productIncludes,
                image: button.dataset.productImage,
            }));

            try {
                const inventory = JSON.parse(localStorage.getItem(inventoryStorageKey) || '[]') || [];
                inventory
                    .filter((item) => ['published', 'active'].includes(String(item.status || 'Published').toLowerCase()))
                    .forEach((item) => products.push(normalizeProductForSearch({
                        id: item.id,
                        title: item.title,
                        type: item.category,
                        meta: `${item.category || 'Digital'} Resource`,
                        price: `₱${Number(item.price || 0).toFixed(2)}`,
                        grade: item.grade,
                        format: item.format,
                        description: item.description,
                        includes: item.details || item.tags || 'Editable resource|Digital download|Teacher-ready activity',
                        image: item.image || item.imageUrl,
                    })));
            } catch {}

            return products.filter((product, index, list) => index === list.findIndex((item) => item.id === product.id));
        }

        function openProductSearch() {
            const modal = document.getElementById('product-search-modal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            renderProductSearchResults('');
            setTimeout(() => document.getElementById('product-search-input')?.focus(), 80);
        }

        function closeProductSearch() {
            const modal = document.getElementById('product-search-modal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.getElementById('product-search-input').value = '';
        }

        function renderProductSearchResults(query) {
            const results = document.getElementById('product-search-results');
            const words = query.toLowerCase().trim().split(/\s+/).filter(Boolean);
            const products = getHomepageSearchProducts();
            const matches = words.length
                ? products.filter((product) => {
                    const titleWords = product.title.toLowerCase().split(/[^a-z0-9]+/).filter(Boolean);
                    const titleText = product.title.toLowerCase();
                    return words.some((word) => titleWords.some((titleWord) => titleWord.includes(word) || word.includes(titleWord)) || titleText.includes(word));
                })
                : [];

            if (!words.length) {
                results.innerHTML = `
                    <div class="rounded-2xl border border-primary/20 bg-primary-container/10 p-6 text-center">
                        <p class="font-headline text-xl text-primary">Start typing to find resources</p>
                        <p class="mt-2 text-sm text-on-surface-variant">Suggestions match any word found in the product title or name.</p>
                    </div>
                `;
                return;
            }

            if (!matches.length) {
                results.innerHTML = `
                    <div class="rounded-2xl border border-white/10 bg-white/5 p-6 text-center">
                        <p class="font-headline text-xl text-on-surface">No matching products found</p>
                        <p class="mt-2 text-sm text-on-surface-variant">Try another topic like biology, physics, heredity, cells, solar, or quiz.</p>
                    </div>
                `;
                return;
            }

            results.innerHTML = matches.map((product) => `
                <article class="mb-3 flex gap-4 rounded-2xl border border-white/10 bg-white/5 p-3 transition hover:border-primary/40 hover:bg-primary-container/10">
                    <img class="h-20 w-20 rounded-xl object-cover" src="${product.image}" alt="${product.title}">
                    <div class="min-w-0 flex-1">
                        <div class="flex flex-wrap items-start justify-between gap-3">
                            <div>
                                <h3 class="font-headline text-lg font-semibold text-on-surface">${product.title}</h3>
                                <p class="mt-1 font-label text-xs text-primary">${product.type} • ${product.grade}</p>
                            </div>
                            <span class="font-headline text-lg text-primary">${product.price}</span>
                        </div>
                        <p class="mt-2 line-clamp-2 text-sm text-on-surface-variant">${product.description}</p>
                        <div class="mt-3 flex flex-wrap gap-2">
                            <button class="search-preview rounded-lg border border-primary/30 px-3 py-2 font-label text-xs text-primary transition hover:bg-primary/10" type="button" data-search-product-id="${product.id}">Preview</button>
                            <button class="search-add rounded-lg bg-primary px-3 py-2 font-label text-xs font-bold text-on-primary transition hover:brightness-110" type="button" data-search-product-id="${product.id}">Add to Cart</button>
                        </div>
                    </div>
                </article>
            `).join('');
        }

        function addProductToCart(product) {
            if (window.iLearnAuth?.addToCart) {
                if (!window.iLearnAuth.addToCart(product)) return;
                updateCartCount();
                showCartToast(product.title);
                return;
            }
            const items = getCartItems();
            const existing = items.find((item) => item.id === product.id);

            if (existing) {
                existing.quantity = (Number(existing.quantity) || 1) + 1;
            } else {
                items.push({
                    id: product.id,
                    title: product.title,
                    meta: product.meta,
                    price: product.price,
                    image: product.image,
                    quantity: 1,
                });
            }

            setCartItems(items);
            updateCartCount();
            showCartToast(product.title);
        }

        const canvas = document.getElementById('starfield-canvas');
        const ctx = canvas.getContext('2d');
        let stars = [];

        function initStarfield() {
            canvas.width = window.innerWidth;
            canvas.height = Math.max(window.innerHeight, document.querySelector('section').offsetHeight);
            stars = [];
            const count = Math.floor((canvas.width * canvas.height) / 8000);

            for (let i = 0; i < count; i++) {
                stars.push({
                    x: Math.random() * canvas.width,
                    y: Math.random() * canvas.height,
                    size: Math.random() * 1.5 + 0.5,
                    opacity: Math.random(),
                    speed: Math.random() * 0.05 + 0.01,
                });
            }
        }

        function drawStars() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);

            stars.forEach((star) => {
                star.opacity += star.speed;
                if (star.opacity > 1 || star.opacity < 0) {
                    star.speed = -star.speed;
                }

                ctx.fillStyle = `rgba(168, 232, 255, ${Math.max(0, star.opacity)})`;
                ctx.beginPath();
                ctx.arc(star.x, star.y, star.size, 0, Math.PI * 2);
                ctx.fill();
            });

            requestAnimationFrame(drawStars);
        }

        const observerOptions = {
            threshold: 0.15,
            rootMargin: '0px 0px -50px 0px',
        };

        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                    revealObserver.unobserve(entry.target);
                }
            });
        }, observerOptions);

        window.addEventListener('resize', initStarfield);

        document.addEventListener('DOMContentLoaded', () => {
            if (!window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
                initStarfield();
                drawStars();
            }

            document.querySelectorAll('.reveal').forEach((element) => revealObserver.observe(element));

            updateCartCount();

            resourceCategoryButtons.forEach((button) => {
                button.addEventListener('click', () => {
                    setActiveResourceCategory(button.dataset.resourceCategory || 'All');
                    renderHomeAdminProducts(currentHomeProducts);
                });
            });

            homeResourceGrid?.addEventListener('click', (event) => {
                const addButton = event.target.closest('.top-resource-add-to-cart');
                if (addButton) {
                    addProductToCart({
                        id: addButton.dataset.productId,
                        title: addButton.dataset.productTitle,
                        meta: addButton.dataset.productMeta,
                        price: addButton.dataset.productPrice,
                        image: addButton.dataset.productImage,
                    });
                    return;
                }

                const previewButton = event.target.closest('.top-resource-preview');
                if (previewButton) {
                    openResourcePreview({
                        id: previewButton.closest('article')?.querySelector('.top-resource-add-to-cart')?.dataset.productId,
                        title: previewButton.dataset.productTitle,
                        type: previewButton.dataset.productType,
                        meta: `${previewButton.dataset.productType} Resource`,
                        price: previewButton.dataset.productPrice,
                        reviews: previewButton.dataset.productReviews,
                        grade: previewButton.dataset.productGrade,
                        format: previewButton.dataset.productFormat,
                        description: previewButton.dataset.productDescription,
                        includes: previewButton.dataset.productIncludes,
                        image: previewButton.dataset.productImage,
                    });
                }
            });

            document.getElementById('resource-preview-close')?.addEventListener('click', closeResourcePreview);
            document.getElementById('resource-preview-modal')?.addEventListener('click', (event) => {
                if (event.target.id === 'resource-preview-modal') closeResourcePreview();
            });
            document.getElementById('resource-preview-add')?.addEventListener('click', () => {
                if (!previewProduct) return;
                addProductToCart(previewProduct);
                closeResourcePreview();
            });

            document.getElementById('product-search-open')?.addEventListener('click', openProductSearch);
            document.getElementById('product-search-close')?.addEventListener('click', closeProductSearch);
            document.getElementById('product-search-modal')?.addEventListener('click', (event) => {
                if (event.target.id === 'product-search-modal') closeProductSearch();
            });
            document.getElementById('product-search-input')?.addEventListener('input', (event) => {
                renderProductSearchResults(event.target.value);
            });
            document.getElementById('product-search-results')?.addEventListener('click', (event) => {
                const productId = event.target.closest('[data-search-product-id]')?.dataset.searchProductId;
                if (!productId) return;
                const product = getHomepageSearchProducts().find((item) => item.id === productId);
                if (!product) return;
                if (event.target.closest('.search-preview')) {
                    openResourcePreview(product);
                    closeProductSearch();
                }
                if (event.target.closest('.search-add')) {
                    if (window.iLearnAuth && !window.iLearnAuth.isSignedIn()) {
                        window.iLearnAuth.openSignIn('Please sign in or create an account to continue.');
                        return;
                    }
                    addProductToCart(product);
                }
            });

            document.querySelectorAll('.glass-panel').forEach((card) => {
                card.addEventListener('mousemove', (event) => {
                    const rect = card.getBoundingClientRect();
                    card.style.setProperty('--mouse-x', `${event.clientX - rect.left}px`);
                    card.style.setProperty('--mouse-y', `${event.clientY - rect.top}px`);
                });
            });
        });

        window.addEventListener('storage', (event) => {
            if (event.key === cartStorageKey) updateCartCount();
            if (event.key === inventoryStorageKey || event.key === `${inventoryStorageKey}Initialized`) {
                renderHomeAdminProducts();
                renderProductSearchResults(document.getElementById('product-search-input')?.value || '');
            }
        });
        window.addEventListener('ilearn:cart-updated', updateCartCount);
        window.addEventListener('ilearn:products-updated', (event) => renderHomeAdminProducts(event.detail?.products || null));
        productSyncChannel?.addEventListener('message', (event) => {
            if (event.data?.type === 'products-updated') {
                saveLiveProducts(event.data.products || []);
                renderHomeAdminProducts(event.data.products || []);
            }
        });

        refreshHomeProductsFromServer();
        setInterval(refreshHomeProductsFromServer, 5000);
        window.addEventListener('pageshow', updateCartCount);
    </script>
    @include('partials.auth-ui')
</body>
</html>
