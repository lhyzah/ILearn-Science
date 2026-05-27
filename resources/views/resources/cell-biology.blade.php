<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    @include('partials.seo', [
        'seoTitle' => 'Cell Biology Interactive PowerPoint | Editable Biology PPTX for Teachers',
        'seoDescription' => 'Download an editable Cell Biology Interactive PowerPoint with worksheets, quizzes, teacher notes, and classroom-ready biology teaching materials for Grades 9-12.',
        'seoCanonical' => route('resources.cell-biology'),
        'seoType' => 'product',
        'seoImage' => $seoProduct['image'] ?? asset('images/shop/photosynthesis-process-topic.svg'),
        'structuredData' => [
            [
                ('@' . 'context') => 'https://schema.org',
                '@type' => 'BreadcrumbList',
                'itemListElement' => [
                    ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => route('home')],
                    ['@type' => 'ListItem', 'position' => 2, 'name' => 'Shop Science Resources', 'item' => route('shop')],
                    ['@type' => 'ListItem', 'position' => 3, 'name' => 'Cell Biology Interactive PowerPoint', 'item' => route('resources.cell-biology')],
                ],
            ],
            [
                ('@' . 'context') => 'https://schema.org',
                '@type' => 'Product',
                'name' => 'Cell Biology Interactive PowerPoint',
                'description' => $seoProduct['description'] ?? 'Editable cell biology PowerPoint presentation with worksheets, quizzes, and lesson materials.',
                'image' => $seoProduct['image'] ?? asset('images/shop/photosynthesis-process-topic.svg'),
                'category' => 'Biology PowerPoint Presentation',
                'brand' => ['@type' => 'Brand', 'name' => 'iLearn Science Resources'],
                'aggregateRating' => [
                    '@type' => 'AggregateRating',
                    'ratingValue' => '4.9',
                    'reviewCount' => '2400',
                ],
                'offers' => [
                    '@type' => 'Offer',
                    'priceCurrency' => 'PHP',
                    'price' => (string) ($seoProduct['price'] ?? 450),
                    'availability' => 'https://schema.org/InStock',
                    'url' => route('resources.cell-biology'),
                ],
            ],
            [
                ('@' . 'context') => 'https://schema.org',
                '@type' => 'FAQPage',
                'mainEntity' => [
                    [
                        '@type' => 'Question',
                        'name' => 'Is this Cell Biology PowerPoint editable?',
                        'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes. The PowerPoint file is editable so teachers can adjust text, images, pacing, and activities for their class.'],
                    ],
                    [
                        '@type' => 'Question',
                        'name' => 'Are worksheets included?',
                        'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes. The resource includes printable worksheets and supporting digital materials for classroom use.'],
                    ],
                ],
            ],
        ],
    ])
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600&family=JetBrains+Mono:wght@500&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: '#a8e8ff',
                        'primary-container': '#00d4ff',
                        'primary-fixed': '#b4ebff',
                        'secondary': '#ddfcff',
                        'tertiary': '#e6d8ff',
                        background: '#10131a',
                        surface: '#10131a',
                        'surface-container-low': '#191c22',
                        'surface-container': '#1d2026',
                        'surface-container-high': '#272a31',
                        'surface-container-highest': '#32353c',
                        'surface-variant': '#32353c',
                        'on-background': '#e1e2eb',
                        'on-surface': '#e1e2eb',
                        'on-surface-variant': '#bbc9cf',
                        'on-primary': '#003642',
                        'outline-variant': '#3c494e',
                    },
                    spacing: {
                        gutter: '24px',
                        'margin-desktop': '48px',
                        'margin-mobile': '16px',
                        'container-max': '1280px',
                    },
                    fontFamily: {
                        headline: ['Sora', 'sans-serif'],
                        display: ['Sora', 'sans-serif'],
                        body: ['Plus Jakarta Sans', 'sans-serif'],
                        label: ['JetBrains Mono', 'monospace'],
                    },
                },
            },
        };
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        .glass-panel {
            background: rgba(25, 28, 34, 0.6);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(60, 215, 255, 0.1);
        }

        .glow-border {
            box-shadow: 0 0 15px rgba(0, 212, 255, 0.1);
            transition: all 0.3s ease;
        }

        .glow-border:hover {
            border-color: rgba(0, 212, 255, 0.5);
            box-shadow: 0 0 20px rgba(0, 212, 255, 0.3);
        }

        .orbit-loader {
            border: 2px solid rgba(168, 232, 255, 0.1);
            border-radius: 9999px;
            height: 40px;
            position: relative;
            width: 40px;
        }

        .orbit-loader::after {
            animation: orbit 3s linear infinite;
            background: #a8e8ff;
            border-radius: 9999px;
            box-shadow: 0 0 10px #3cd7ff;
            content: '';
            height: 8px;
            left: 50%;
            position: absolute;
            top: -4px;
            width: 8px;
        }

        .tab-active {
            border-bottom: 2px solid #00d4ff;
            color: #a8e8ff;
        }

        body {
            background-color: #10131a;
            background-image:
                radial-gradient(circle at 20% 20%, rgba(0, 212, 255, 0.05) 0%, transparent 40%),
                radial-gradient(circle at 80% 80%, rgba(230, 216, 255, 0.05) 0%, transparent 40%);
        }

        @keyframes orbit {
            from { transform: rotate(0deg) translateX(20px) rotate(0deg); }
            to { transform: rotate(360deg) translateX(20px) rotate(-360deg); }
        }
    </style>
</head>
<body class="overflow-x-hidden font-body text-on-background">
    <header class="fixed top-0 z-50 flex h-20 w-full items-center justify-between border-b border-outline-variant/20 bg-surface/80 px-4 shadow-[0_0_15px_rgba(0,212,255,0.1)] backdrop-blur-xl md:px-margin-desktop">
        <a class="font-headline text-3xl font-bold tracking-tight text-primary" href="{{ route('home') }}">iLearn Science</a>
        <div class="hidden items-center gap-8 md:flex">
            <nav class="flex gap-6">
                <a class="font-label text-sm font-bold text-primary-container transition-colors" href="{{ route('shop') }}">Labs</a>
                <a class="font-label text-sm text-on-surface-variant transition-colors hover:text-primary" href="{{ route('shop') }}">Resources</a>
                <a class="font-label text-sm text-on-surface-variant transition-colors hover:text-primary" href="{{ route('dashboard') }}">Missions</a>
            </nav>
            <div class="flex items-center gap-4">
                        @foreach (['search', 'shopping_cart', 'notifications'] as $icon)
                            @if ($icon === 'shopping_cart')
                                <a class="relative text-on-surface-variant transition-colors hover:text-primary" href="{{ route('cart') }}" data-cart-link aria-label="Cart with 3 items">
                                    <span class="material-symbols-outlined">{{ $icon }}</span>
                                    <span class="absolute -right-2 -top-2 flex h-5 min-w-5 items-center justify-center rounded-full bg-primary-container px-1 font-label text-[10px] font-bold leading-none text-on-primary-container shadow-[0_0_12px_rgba(0,212,255,0.65)]" data-cart-count>3</span>
                                </a>
                            @else
                                <button class="material-symbols-outlined text-on-surface-variant transition-colors hover:text-primary">{{ $icon }}</button>
                            @endif
                        @endforeach
                <div class="h-10 w-10 overflow-hidden rounded-full border-2 border-primary/30">
                    <img loading="lazy" decoding="async" alt="Astronaut User Profile" class="h-full w-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCe2pd2OK0hHa9rPpfLFxiRkt1rqmV36DhERsF8CmqV-kN-DVX1ivItd1_0NwVqOxeAnrMCr6_YoF1s75o_NVE46Q48VyJeKwU0dh2-rqAN7bay3hr9z4uTU00808M0ekW_87yfrJSQDIUSwx-y6di4MjMDpPtIkjs5npAojKTpiXFFsbOT5o4Aat4f7iCRVqRsOmoprA_xrL1Hwo43K7yZJNnRvLy-0Di8wT4_heaPi0ouTtUR0orzOewZscYE2sB5a9vOSzSeduU">
                </div>
            </div>
        </div>
    </header>

    <div class="flex pt-20">
        <aside class="fixed left-0 top-20 hidden h-[calc(100vh-5rem)] w-64 flex-col gap-y-4 border-r border-outline-variant/20 bg-surface-container-low/60 py-8 shadow-xl backdrop-blur-lg md:flex">
            <div class="mb-6 px-6">
                <p class="font-headline text-2xl font-semibold text-primary">Mission Control</p>
                <p class="font-label text-xs text-on-surface-variant">Sector 7-G</p>
            </div>
            <nav class="flex flex-col gap-1">
                @foreach ([
                    ['dashboard', 'Command Center', route('dashboard'), false],
                    ['biotech', 'Lab Equipment', route('shop'), true],
                    ['menu_book', 'Mission Logs', '#', false],
                    ['payments', 'Star Credits', '#', false],
                    ['settings', 'Systems Check', '#', false],
                ] as [$icon, $label, $href, $active])
                    <a class="flex items-center gap-4 px-6 py-3 transition-all duration-300 {{ $active ? 'border-r-4 border-primary bg-primary/10 text-primary shadow-[0_0_10px_rgba(60,215,255,0.3)]' : 'text-on-surface-variant/80 hover:translate-x-1 hover:bg-surface-variant/40 hover:text-primary-fixed' }}" href="{{ $href }}">
                        <span class="material-symbols-outlined">{{ $icon }}</span>
                        <span class="font-label text-sm">{{ $label }}</span>
                    </a>
                @endforeach
            </nav>
            <div class="mt-auto flex flex-col gap-4 px-6">
                <button class="w-full rounded-xl bg-primary py-3 font-bold text-on-primary shadow-[0_0_15px_rgba(60,215,255,0.4)] transition-transform active:scale-95">Launch New Lab</button>
                <div class="flex flex-col gap-2 border-t border-outline-variant/20 pt-4">
                    <a class="flex items-center gap-4 font-label text-sm text-on-surface-variant/80 transition-colors hover:text-primary" href="#"><span class="material-symbols-outlined">help</span> Support</a>
                    <a class="flex items-center gap-4 font-label text-sm text-on-surface-variant/80 transition-colors hover:text-primary" href="#"><span class="material-symbols-outlined">logout</span> Logout</a>
                </div>
            </div>
        </aside>

        <main class="flex-1 px-margin-mobile py-12 md:ml-64 md:px-margin-desktop">
            <section class="mb-24 grid grid-cols-1 items-start gap-gutter lg:grid-cols-12">
                <div class="group lg:col-span-7">
                    <div class="glass-panel glow-border relative aspect-video overflow-hidden rounded-3xl">
                        <img loading="lazy" decoding="async" alt="Cell Biology Preview" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDB29hlsu6znAHyJwVa-GZ2GEL1qRnewIXPnir5KUIvPk3vY2FFuEYqNxWpbBb_S4i1_9cmj6hfXbbm0wq8LMsxrMXm3otjI_lesrFSTbydTwMWXd2Cgx9zkMYsIX8pugR8DnnL3y8EtZLVBl1HYoCZObeGk9hhHuXl2iqlfEy5qpaQUtNcVcZt18lXM0RWiJZuPFwCoH01n7k71hV_8pOjscUwmXnCjDxQgRKCdPBDeqczACKtuekX2CyfsEtKl8-YdFotM9lhUWc">
                        <div class="absolute inset-0 flex items-end bg-gradient-to-t from-background/80 to-transparent p-8">
                            <div class="flex flex-wrap gap-4">
                                <span class="rounded-full border border-primary/30 bg-primary/20 px-4 py-2 font-label text-sm text-primary backdrop-blur-md">Interactive PPTX</span>
                                <span class="rounded-full border border-tertiary/30 bg-tertiary/20 px-4 py-2 font-label text-sm text-tertiary backdrop-blur-md">120+ Slides</span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 grid grid-cols-4 gap-4">
                        @foreach ([
                            ['Slide 1', 'https://lh3.googleusercontent.com/aida-public/AB6AXuBrjlCp58-ia9SWDdL0BDZeCSj8g_33YQH0ganRnv9N5cgEXyPxMKCoXtEV_EvU0O6ISthZJh7kZhx6PIGtHPvRrC-6-j4T91Y8W0AaXD4SP4veAqInJJ4UTm5gZ_XbbzYdYvjZjASY2VUZ-tqpyKET3rDYw_xtZQcnmcyggP8WeTt14OF-Z36Qq1okyID0eurfFuNdvswzQwOGbMH2h0e0gCM2Y0gW_H5-1SlATetdSl4KFhuSV2lGbSpTBJkFsmVFIBnzoyLcAAY'],
                            ['Slide 2', 'https://lh3.googleusercontent.com/aida-public/AB6AXuDZnjotTA9wAT-KfRSvAamkhf8fEeh8rKeMN3eYK5hXpcSGIDmrRw-4AtMYTtmhQiGmI3pq0vqU2J817qs7cON94LaPDVRGr66c1P5B1phIDXfzbNk4veCDrywGGRqWGOvZXjsxHTZh4p-sdNdKcxLvGzck--p31doFHEjUBJrXswkmTOhCuOD8i9-fXcmSJQ6ZbLkEB24ydz0qkrH7ojwKOiJkvxBnNlvCVxpRfwfBF6ZMBPNdGUFGPyRMMKrvVNiCURYJhVptxtU'],
                            ['Slide 3', 'https://lh3.googleusercontent.com/aida-public/AB6AXuB8GEDRKb-qhpjTI5CiiirF1OqTveF2wfzJm7z05F8A3Moq_DgsQ8noqBQ9o6TEo00U0QUUGtvcyYPIE0B8g3sCDFGfW8qvUR812nixFLwwvj5Znxj0xDX_fjYSN7OuM9Q0hLFdrq-7DGwxyaqdbkP1PiGmVcZMUEpmfJPAyKWRCMIIegS1fXe--Sup8A-KZJGwyuNER3ifdLDKhdVEsBvnZaurdJD7elOb3ZZkGybHfssk-TlsHlusL6DtbqWbann2HXGCc9tYFqk'],
                            ['Slide 4', 'https://lh3.googleusercontent.com/aida-public/AB6AXuD9TTg1ahDy9dDkWopSkJb3h1JQ-9WGj9ZuPC3HyOy6Nm7Mt1u77lZdmeJ3BJBH6oYrQ2BOuwk6516kfpXW6nw6s4yrDWJZKdH0xX-uCH7oZvspZHhL46_AGFjipk0AemUfTzzEnt_IfB8hqA1nvCtfnPLIoQclJFLP02_AmHGSgLJjBYfXBRxwFbdyBu7k2rNTQITQTmIjiHCbEHc4hzlxi2oyWpzVyzb75_41yM8gqeJPmtp0NVgS2VMrFyY9KNMIyqpdCcrwm0Y'],
                        ] as [$alt, $image])
                            <button class="glass-panel aspect-video cursor-pointer overflow-hidden rounded-xl border border-outline-variant/20 transition-all hover:border-primary">
                                <img loading="lazy" decoding="async" alt="{{ $alt }}" class="h-full w-full object-cover" src="{{ $image }}">
                            </button>
                        @endforeach
                    </div>
                </div>

                <div class="flex flex-col gap-6 lg:col-span-5">
                    <div class="space-y-2">
                        <div class="flex items-center gap-2 text-primary">
                            <span class="font-label text-sm uppercase tracking-widest">High School Biology</span>
                        </div>
                        <h1 class="font-display text-4xl font-bold leading-tight text-on-surface md:text-5xl">Cell Biology Interactive PowerPoint</h1>
                    </div>
                    <div class="flex flex-wrap items-center gap-6">
                        <div class="flex items-center gap-1">
                            <span class="material-symbols-outlined text-[#FFD700]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="font-headline text-2xl font-semibold">4.9</span>
                            <span class="text-on-surface-variant">(2.4k+ downloads)</span>
                        </div>
                        <div class="hidden h-8 w-px bg-outline-variant/30 sm:block"></div>
                        <div class="font-headline text-2xl font-semibold text-primary">₱450.00</div>
                    </div>
                    <p class="text-lg leading-relaxed text-on-surface-variant">
                        A comprehensive, gamified journey through the microscopic world. Designed for Grade 9-12 students with stunning animations and embedded quizzes.
                    </p>
                    <div class="mt-4 flex flex-col gap-4 sm:flex-row">
                        <button id="add-cell-biology-to-cart" class="flex h-16 flex-1 items-center justify-center gap-2 rounded-2xl bg-primary font-bold text-on-primary shadow-[0_0_20px_rgba(60,215,255,0.4)] transition-all hover:scale-[1.02] active:scale-[0.98]">
                            <span class="material-symbols-outlined">shopping_cart</span>
                            Add to Cart
                        </button>
                        <button class="flex h-16 flex-1 items-center justify-center gap-2 rounded-2xl border-2 border-primary font-bold text-primary transition-all hover:bg-primary/10">Buy Now</button>
                    </div>

                    <div class="glass-panel mt-4 space-y-4 rounded-2xl p-6">
                        @foreach ([['File Size', '24.5 MB'], ['Format', 'PPTX + PDF'], ['License', 'Single User License'], ['Last Updated', 'Oct 24, 2023']] as [$label, $value])
                            <div class="flex items-center justify-between border-b border-outline-variant/20 py-2 last:border-b-0">
                                <span class="font-label text-sm text-on-surface-variant">{{ $label }}</span>
                                <span class="font-label text-sm text-on-surface">{{ $value }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>

            <section class="mb-24 grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
                @foreach ([['edit_note', 'Fully Editable', 'Modify any text, image, or animation to fit your lesson plan.', 'primary'], ['print', 'Printable Worksheets', 'Includes 15+ student handouts in high-resolution PDF format.', 'tertiary'], ['bolt', 'Instant Access', 'Download your files immediately after secure checkout.', 'secondary'], ['verified', 'Classroom Tested', 'Optimized for engagement and tested with real students.', 'primary']] as [$icon, $title, $copy, $color])
                    <article class="glass-panel glow-border flex flex-col items-center gap-4 rounded-3xl p-8 text-center">
                        <div class="mb-2 flex h-16 w-16 items-center justify-center rounded-2xl bg-{{ $color }}/10 text-{{ $color }}">
                            <span class="material-symbols-outlined text-4xl">{{ $icon }}</span>
                        </div>
                        <h3 class="font-headline text-2xl font-semibold">{{ $title }}</h3>
                        <p class="text-on-surface-variant">{{ $copy }}</p>
                    </article>
                @endforeach
            </section>

            <section class="mb-24 grid grid-cols-1 gap-gutter lg:grid-cols-12">
                <div class="lg:col-span-8">
                    <div class="mb-8 flex gap-8 overflow-x-auto border-b border-outline-variant/20">
                        <button class="tab-active pb-4 font-headline text-2xl font-semibold transition-all">Overview</button>
                        <button class="pb-4 font-headline text-2xl font-semibold text-on-surface-variant transition-all hover:text-on-surface">Learning Objectives</button>
                        <button class="pb-4 font-headline text-2xl font-semibold text-on-surface-variant transition-all hover:text-on-surface">Curriculum Standards</button>
                    </div>
                    <div class="space-y-8">
                        <article class="glass-panel rounded-3xl p-8">
                            <h4 class="mb-4 font-headline text-2xl font-semibold">Master the Building Blocks of Life</h4>
                            <p class="mb-6 text-lg leading-relaxed text-on-surface-variant">
                                This interactive PowerPoint is not just a presentation; it's a mission through the microscopic landscape. Students will navigate through the cytoplasm, interface with mitochondria, and decode the nucleus's secrets.
                            </p>
                            <ul class="grid grid-cols-1 gap-4 md:grid-cols-2">
                                @foreach (['Understand cell structure and scale', 'Identify organelle functions', 'Differentiate plant vs. animal cells', 'Explore metabolic processes'] as $item)
                                    <li class="flex items-center gap-3">
                                        <div class="glow-border h-2 w-2 rounded-full bg-primary"></div>
                                        <span>{{ $item }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </article>

                        <div class="space-y-6">
                            <h4 class="font-headline text-2xl font-semibold">Mission Feedback (4)</h4>
                            @foreach ([['Sarah M.', 'My 10th graders were glued to the screen! The animations explaining the Golgi apparatus are the best I have ever seen.', 'https://lh3.googleusercontent.com/aida-public/AB6AXuC7trVPvfnZr-nYCTElASl10PT6czne3L1Hlm64h9fbbJlOoP3dD8By3u2ADmAlc_OXGjY2eO9mj_cHpaqQW1dt6RmJPXc-oPOARnV_KDBp5vn5hn35VW5A4XeF59O_S8zo4_Lle86uv4sz5G7Ib8prGOPamRPxzLtKPqQ3LwETFbkYEfTympqZAJpyME2UKCmtrA00hxtYT6FM6OXDcfDDfoKYuiaTRUEShjcvdegL5bfHXhWYIxkc1VyKD65Xk6IEWihlDw88MJ8'], ['Prof. James', 'Excellent quality. Highly recommend for any biology curriculum.', 'https://lh3.googleusercontent.com/aida-public/AB6AXuByWb149Cj9nII656BUMIWgg0xCOwnZjiKAxfxC46-WxSRa_-LhA2smX02l51Cyl0Rt3PHvSQJ9gF9do5qGloj5baloOcjgAr81veSUdsdwANdBXE8HGAayp27UAfkdyKDYusFu0tU0VBNPjpf7O4pGRBfhuW6gjE3uhKZHPYFgMf0tyIYUhsYJFDsMuJYBT8i-rZ2mQ_EmcoxJExrgaXWjGhfgkW4VRhsxrA0oP0P0nR7O1rjII9bn0Ri627xxl3q4beciu0dVJgo']] as [$name, $quote, $avatar])
                                <article class="glass-panel flex gap-6 rounded-2xl p-6">
                                    <div class="h-12 w-12 flex-shrink-0 overflow-hidden rounded-full">
                                        <img loading="lazy" decoding="async" alt="{{ $name }}" class="h-full w-full object-cover" src="{{ $avatar }}">
                                    </div>
                                    <div class="flex-1">
                                        <div class="mb-2 flex flex-wrap justify-between gap-2">
                                            <span class="font-headline text-lg font-semibold">{{ $name }}</span>
                                            <div class="flex text-primary">
                                                @for ($i = 0; $i < 5; $i++)
                                                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                                                @endfor
                                            </div>
                                        </div>
                                        <p class="text-on-surface-variant">{{ $quote }}</p>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                </div>

                <aside class="flex flex-col gap-8 lg:col-span-4">
                    <article class="glass-panel glow-border rounded-3xl p-8 text-center">
                        <div class="relative mx-auto mb-6 h-32 w-32">
                            <div class="orbit-loader absolute -inset-2"></div>
                            <img loading="lazy" decoding="async" alt="Lhyzah" class="relative z-10 h-full w-full rounded-full border-4 border-surface-container-high object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCVm0ZAVSkBALNXTMUIHrX7NjDRkhQ8v_Rap3VarW3mXB8t4iHUXX70I6SHscQWVw_eK4k0gJ-rXHHDSYa2zBn-4g2CS7Y_giirQAv73rfokdri0U9VLT1Hl0OluGev7B3ziG86A9FW3zxH3MpCHPDwHFQry6QaqhLpIMHnE6eWdv0yWS3cy69D_Ih845hIoyWegyAfzq3oKAaRlxASapeIkW99_0fZv8CyBoCC_azOj2KRYdXG-HoeE87jkhoZj6BDNaqxmOsACqg">
                        </div>
                        <h4 class="font-headline text-2xl font-semibold">Meet Lhyzah</h4>
                        <p class="mb-4 font-label text-sm text-primary">Scientific Curator</p>
                        <p class="mb-6 text-on-surface-variant">Science educator with 10+ years of experience creating immersive digital resources for modern classrooms.</p>
                        <div class="flex gap-4">
                            <button class="flex-1 rounded-xl bg-surface-container-highest py-3 font-bold text-on-surface transition-all hover:bg-primary/20">Follow</button>
                            <button class="flex-1 rounded-xl border border-primary/20 bg-primary/10 py-3 font-bold text-primary transition-all hover:bg-primary/20">Profile</button>
                        </div>
                    </article>

                    <article class="glass-panel flex items-center justify-between rounded-3xl p-8">
                        <div>
                            <p class="font-headline text-2xl font-semibold">Mission Stats</p>
                            <p class="font-label text-sm text-on-surface-variant">Engagement Level</p>
                        </div>
                        <div class="relative flex h-16 w-16 items-center justify-center rounded-full border-4 border-primary/20">
                            <span class="font-label text-sm text-primary">98%</span>
                            <div class="absolute inset-0 animate-spin rounded-full border-t-4 border-primary"></div>
                        </div>
                    </article>
                </aside>
            </section>

            <section class="mb-12">
                <div class="mb-8 flex items-center justify-between">
                    <h2 class="font-headline text-3xl font-semibold text-on-surface">Boost Your Mission</h2>
                    <div class="flex gap-4">
                        <button class="flex h-12 w-12 items-center justify-center rounded-full border border-outline-variant/30 transition-colors hover:bg-primary/10"><span class="material-symbols-outlined">arrow_back</span></button>
                        <button class="flex h-12 w-12 items-center justify-center rounded-full border border-outline-variant/30 transition-colors hover:bg-primary/10"><span class="material-symbols-outlined">arrow_forward</span></button>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-gutter md:grid-cols-3">
                    @foreach ([['Quantum Physics Lab Set', 'Worksheets + Virtual Sim', '₱250.00', 'https://lh3.googleusercontent.com/aida-public/AB6AXuBKTBt6pOG_oR9_PrrKIpbcl5bWp3Km6Z9QNHKDnhIU5Qsi4nC-HiqCsvdRmbwXlwS9xysRhI8s-c4Gg-_LtQnBqhghcnSQCbobGiYYD9293s0YrazwPXqNDDon_WTSxliVzR6z0nTmoL5zQCZklDFfNKKRhbjsJrlV7tE4Qu5wQBbTBixZ_awI0rpnkAx7HDP3ezU5PjrKhBnki1FbrcELjPIDb_hkgFIm-tAUJ4oDQyU5GaSk1WJP6nTyndR3RHV0wEMSOWBWnK8'], ['Atomic Bonds Interactive', 'PowerPoint + Flashcards', '₱380.00', 'https://lh3.googleusercontent.com/aida-public/AB6AXuBKcRXUMiK_TgOdMJntc1otCEECFWNJYI9J7NfAdL5ayUn9x8K9SA9vB75Vr6SrMp4ZzGZ6tQtoU2iLMK48n74qAQc459YMKlj5p4l1q3cWYQP15of04Oc2RpCDDql_cUCuhgL2BnyLIU4rI3NfAflBOkxz8k640EeFxE5GkNOud-cxYnit0KXztBY2Vn0aO5OrllK9c8j_nuoYtxdqIJlLHDiqeA5EJbUWBMog3tWepJXynq5MO5vDUnvCWZg91SoFnmtiRY86YYw'], ['Solar System Mission Log', "Teacher's Guide + Kit", '₱450.00', 'https://lh3.googleusercontent.com/aida-public/AB6AXuBDGEyfUa1ArT2lFMR0S2swZkBd3DOMnq-wPwm0LkuoftUxSAoxSJeiPk54OIsw-p7F_P80mr5zzRMKngSFD-WCcUacHM_3ROS1Ghd5RQLOeBvUSbigdcaM835LOrBthCOWUF_nZmm5rSxQAUX1ovnorcPV3fVQETzD4nyySwk-DKSLo9v0ei2a6B9gtgpM-STia7jwt-i9uMyMQPkHJivH4bSbSp7r-doh7mL2JHZvUOKPdXA7hKCT9XUtBko2lJpaMgK3GDLI3Z0']] as [$title, $copy, $price, $image])
                        <article class="glass-panel glow-border group flex flex-col overflow-hidden rounded-3xl">
                            <div class="relative aspect-video overflow-hidden">
                                <img loading="lazy" decoding="async" alt="{{ $title }}" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110" src="{{ $image }}">
                                <div class="absolute right-4 top-4 rounded-full border border-outline-variant/20 bg-background/60 px-3 py-1 font-label text-xs backdrop-blur-md">{{ $price }}</div>
                            </div>
                            <div class="space-y-2 p-6">
                                <h5 class="font-headline text-lg text-on-surface">{{ $title }}</h5>
                                <p class="font-label text-sm text-on-surface-variant">{{ $copy }}</p>
                            </div>
                        </article>
                    @endforeach
                </div>
            </section>
        </main>
    </div>

    <nav class="fixed bottom-0 z-50 flex h-16 w-full items-center justify-around border-t border-outline-variant/10 bg-surface-container-low/80 backdrop-blur-xl md:hidden">
        @foreach ([['dashboard', 'Home', false], ['biotech', 'Labs', true], ['shopping_cart', 'Cart', false], ['account_circle', 'Profile', false]] as [$icon, $label, $active])
            <button class="relative flex flex-col items-center gap-1 {{ $active ? 'text-primary' : 'text-on-surface-variant' }}">
                <span class="material-symbols-outlined">{{ $icon }}</span>
                @if ($icon === 'shopping_cart')
                    <span class="absolute -right-2 -top-2 flex h-5 min-w-5 items-center justify-center rounded-full bg-primary-container px-1 font-label text-[10px] font-bold leading-none text-on-primary-container shadow-[0_0_12px_rgba(0,212,255,0.65)]" data-cart-count>3</span>
                @endif
                <span class="font-label text-[10px]">{{ $label }}</span>
            </button>
        @endforeach
    </nav>

    <div id="cart-toast" class="pointer-events-none fixed right-6 top-24 z-[70] translate-y-2 rounded-2xl border border-primary/30 bg-surface-container-high/95 px-5 py-4 opacity-0 shadow-[0_0_24px_rgba(0,212,255,0.28)] backdrop-blur-xl transition-all duration-300">
        <div class="flex items-center gap-3">
            <span class="material-symbols-outlined text-primary">check_circle</span>
            <div>
                <p class="font-headline text-sm font-semibold text-on-surface">Added to cart</p>
                <p class="font-label text-xs text-on-surface-variant">Cell Biology Interactive PowerPoint</p>
            </div>
        </div>
    </div>

    <script>
        const cartStorageKey = 'ilearnScienceCartItems';
        const cellBiologyProduct = {
            id: 'cell-biology-interactive-powerpoint',
            title: 'Cell Biology Interactive PowerPoint',
            meta: 'Interactive PPTX - 120+ Slides',
            price: '₱450.00',
            image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuDB29hlsu6znAHyJwVa-GZ2GEL1qRnewIXPnir5KUIvPk3vY2FFuEYqNxWpbBb_S4i1_9cmj6hfXbbm0wq8LMsxrMXm3otjI_lesrFSTbydTwMWXd2Cgx9zkMYsIX8pugR8DnnL3y8EtZLVBl1HYoCZObeGk9hhHuXl2iqlfEy5qpaQUtNcVcZt18lXM0RWiJZuPFwCoH01n7k71hV_8pOjscUwmXnCjDxQgRKCdPBDeqczACKtuekX2CyfsEtKl8-YdFotM9lhUWc'
        };

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

        function showCartToast() {
            const toast = document.getElementById('cart-toast');
            if (!toast) return;
            toast.classList.remove('translate-y-2', 'opacity-0');
            toast.classList.add('translate-y-0', 'opacity-100');
            setTimeout(() => {
                toast.classList.add('translate-y-2', 'opacity-0');
                toast.classList.remove('translate-y-0', 'opacity-100');
            }, 1800);
        }

        document.getElementById('add-cell-biology-to-cart')?.addEventListener('click', () => {
            if (window.iLearnAuth?.addToCart) {
                if (!window.iLearnAuth.addToCart(cellBiologyProduct)) return;
                updateCartCount();
                showCartToast();
                return;
            }
            const items = getCartItems();
            const existing = items.find((item) => item.id === cellBiologyProduct.id);

            if (existing) {
                existing.quantity = (Number(existing.quantity) || 1) + 1;
            } else {
                items.push({ ...cellBiologyProduct, quantity: 1 });
            }

            setCartItems(items);
            updateCartCount();
            showCartToast();
        });

        updateCartCount();
        window.addEventListener('storage', (event) => {
            if (event.key === cartStorageKey) updateCartCount();
        });
        window.addEventListener('ilearn:cart-updated', updateCartCount);
        window.addEventListener('pageshow', updateCartCount);

        document.querySelectorAll('.aspect-video.cursor-pointer, button.aspect-video').forEach((thumb) => {
            thumb.addEventListener('click', function () {
                const mainImg = document.querySelector('img[alt="Cell Biology Preview"]');
                const image = this.querySelector('img');
                if (!mainImg || !image) return;
                mainImg.src = image.src;
                mainImg.parentElement.classList.add('scale-[0.99]');
                setTimeout(() => mainImg.parentElement.classList.remove('scale-[0.99]'), 150);
            });
        });

        document.querySelectorAll('button[class*="pb-4"]').forEach((button) => {
            button.addEventListener('click', function () {
                document.querySelectorAll('button[class*="pb-4"]').forEach((item) => {
                    item.classList.remove('tab-active');
                    item.classList.add('text-on-surface-variant');
                });
                this.classList.add('tab-active');
                this.classList.remove('text-on-surface-variant');
            });
        });
    </script>
    @include('partials.auth-ui')
</body>
</html>
