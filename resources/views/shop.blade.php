<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>iLearn Science - Shop Resources</title>
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
                        'secondary-fixed': '#74f5ff',
                        'tertiary-fixed-dim': '#d1bcff',
                        surface: '#10131a',
                        background: '#10131a',
                        'surface-container-lowest': '#0b0e14',
                        'surface-container-low': '#191c22',
                        'surface-container': '#1d2026',
                        'surface-container-high': '#272a31',
                        'surface-variant': '#32353c',
                        'on-surface': '#e1e2eb',
                        'on-surface-variant': '#bbc9cf',
                        'on-primary': '#003642',
                        'outline-variant': '#3c494e',
                    },
                    spacing: {
                        gutter: '24px',
                        'margin-desktop': '48px',
                        'container-max': '1280px',
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
            background: rgba(25, 28, 34, 0.4);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(60, 215, 255, 0.1);
        }

        .glow-hover:hover {
            border-color: rgba(60, 215, 255, 0.5);
            box-shadow: 0 0 20px rgba(60, 215, 255, 0.3);
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        .star-field {
            background: radial-gradient(circle at 50% 50%, #1a1f2e 0%, #10131a 100%);
            height: 100%;
            left: 0;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: -1;
        }

        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #10131a; }
        ::-webkit-scrollbar-thumb { background: #32353c; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #3cd7ff; }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
    </style>
</head>
<body class="font-body text-base">
    <div class="star-field"></div>

    <aside class="fixed left-0 top-0 z-40 hidden h-screen w-64 flex-col rounded-r-xl border-r border-outline-variant/10 bg-surface-container-low/40 pt-20 shadow-2xl shadow-primary/5 backdrop-blur-md lg:flex">
        <div class="mb-8 px-6">
            <h2 class="font-headline text-2xl font-semibold text-primary">Mission Control</h2>
            <p class="font-label text-xs text-on-surface-variant opacity-70">Science Lab Alpha</p>
        </div>
        <nav class="flex-1 space-y-1 px-4">
            @foreach ([
                ['dashboard', 'Dashboard', route('dashboard'), false],
                ['shopping_cart', 'Shop Resources', route('shop'), true],
                ['receipt_long', 'Orders', route('orders'), false],
                ['download', 'Downloads', '#', false],
                ['favorite', 'Wishlist', '#', false],
                ['monitoring', 'Analytics', '#', false],
                ['group', 'Customers', '#', false],
                ['settings', 'Settings', '#', false],
            ] as [$icon, $label, $href, $active])
                <a class="flex items-center gap-3 rounded-xl px-4 py-3 transition-all duration-300 {{ $active ? 'border-l-4 border-primary bg-primary-container/20 text-primary-fixed-dim shadow-[0_0_20px_rgba(60,215,255,0.3)]' : 'text-on-surface-variant hover:translate-x-1 hover:bg-surface-variant/30' }}" href="{{ $href }}">
                    <span class="material-symbols-outlined">{{ $icon }}</span>
                    <span class="font-label text-sm">{{ $label }}</span>
                </a>
            @endforeach
        </nav>
    </aside>

    <header class="sticky top-0 z-50 flex w-full items-center justify-between border-b border-outline-variant/20 bg-surface/60 px-4 py-4 shadow-[0_0_15px_rgba(60,215,255,0.1)] backdrop-blur-xl md:px-gutter lg:pl-72">
        <div class="flex items-center gap-8">
            <a class="flex items-center gap-3" href="{{ route('home') }}">
                <img alt="iLearn Logo" class="h-14 w-14 rounded-full border border-primary/20 object-contain shadow-[0_0_10px_rgba(60,215,255,0.2)] md:h-16 md:w-16" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDbHFKfKDtj0BBH49qj_tApU0lpPj0j_TCYogY6YMxIkmPRa2Xb5u1BgbUgu-WoIefTkhof-JeTy9F7OhqJ6B6wzSm71mD5PGUL2qYPqjk6Q7MGev-HdCLwRsmq_u3y_cRW84jQ-GUMaoOG8eNudckobNDAHc3yfhM3_9pv_dNecKcIMy7Y8_F02Am3U0V_JSejjLi8sANEMe9ZDwr5tmOhMBt_CvT01_EstcFl1EX_exZVcAXiQiyBKDfx_MGOfEbcddUPhNgnMwQ">
                <h1 class="font-display text-3xl font-bold tracking-tight text-primary md:text-5xl">iLearn Science</h1>
            </a>
            <div class="hidden w-96 items-center rounded-full border border-outline-variant/30 bg-surface-container-high/50 px-4 py-2 md:flex">
                <span class="material-symbols-outlined mr-2 text-on-surface-variant">search</span>
                <input class="w-full border-none bg-transparent font-label text-sm text-on-surface focus:ring-0" placeholder="Scan galactic databases..." type="text">
            </div>
        </div>
        <div class="flex items-center gap-4">
            <a class="relative flex h-11 w-11 items-center justify-center rounded-full border border-primary/20 bg-surface-variant/30 text-on-surface-variant transition-all hover:border-primary/50 hover:text-primary hover:shadow-[0_0_16px_rgba(60,215,255,0.22)] active:scale-95" href="{{ route('cart') }}" data-cart-link aria-label="Cart with 3 items">
                <span class="material-symbols-outlined">shopping_cart_checkout</span>
                <span class="absolute -right-2 -top-2 flex h-5 min-w-5 items-center justify-center rounded-full bg-primary-container px-1 font-label text-[10px] font-bold leading-none text-on-primary shadow-[0_0_12px_rgba(0,212,255,0.65)]" data-cart-count>3</span>
            </a>
            <button class="p-2 text-on-surface-variant transition-colors hover:text-primary active:scale-90">
                <span class="material-symbols-outlined">notifications</span>
            </button>
        </div>
    </header>

    <main class="mx-auto max-w-[1600px] space-y-12 px-4 py-8 md:px-12 lg:pl-72">
        <section class="grid grid-cols-1 gap-gutter lg:grid-cols-12">
            <div class="grid grid-cols-2 gap-4 lg:col-span-4">
                @foreach ([
                    ['Total Resources', '12.8k', '+12% this month', 'primary'],
                    ['Best-Sellers', '432', 'Core curriculum', 'secondary-fixed'],
                    ['New Arrivals', '85', 'Awaiting review', 'tertiary-fixed-dim'],
                    ['Total Sales', '₱45k', 'Growth: High', 'primary-fixed-dim'],
                ] as [$label, $value, $detail, $color])
                    <article class="glass-panel glow-hover flex flex-col justify-between rounded-xl p-6 transition-all duration-300">
                        <span class="font-label text-xs uppercase tracking-widest text-{{ $color }}">{{ $label }}</span>
                        <div class="mt-4">
                            <h3 class="font-headline text-3xl font-semibold text-white">{{ $value }}</h3>
                            <p class="mt-1 text-xs {{ str_contains($detail, '+') || str_contains($detail, 'Growth') ? 'text-green-400' : 'text-on-surface-variant' }}">{{ $detail }}</p>
                        </div>
                    </article>
                @endforeach
            </div>

            <article class="glass-panel group relative min-h-[280px] overflow-hidden rounded-xl lg:col-span-8">
                <div class="absolute inset-0 z-10 bg-gradient-to-r from-background via-background/40 to-transparent"></div>
                <img alt="Futuristic laboratory" class="absolute inset-0 h-full w-full object-cover opacity-60 transition-transform duration-700 group-hover:scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDeA7aDCt1BhhNA6WQB-EGoUJittQ_zWiHMhgO7UPQFu7ewJlQywHQ2i9svSlMorENGTB4OXPPtG55T78teaOLzwgFzwc-rXcBlrY9S7EriKVyoAMS_0W1w8Bm-UMKPwrjdaX4C3T5Y8jMLETbi5n1naMUsffVmwTf3I2gaYr3_wzuw5_glmvYgGz7MSRbhMdOTObD3QzMyx02dZ4UVVpX67_pEhFd3iPZcf5NVpVESqINm3KdWCrlz5nViUL_8oe1G-y2p3r4ur3I">
                <div class="relative z-20 flex h-full flex-col justify-center p-8 md:p-12">
                    <span class="mb-4 inline-block w-fit rounded-full border border-primary/30 bg-primary/20 px-3 py-1 font-label text-xs text-primary">MISSION CRITICAL</span>
                    <h2 class="mb-4 font-display text-4xl font-bold leading-tight text-white md:text-5xl">Teaching Materials <br><span class="text-primary">Ready for Launch</span></h2>
                    <p class="mb-8 max-w-lg text-lg leading-8 text-on-surface-variant">Deploy comprehensive, high-fidelity scientific modules designed to inspire the next generation of interstellar explorers.</p>
                    <button class="w-fit rounded-full bg-primary px-8 py-3 font-label text-sm text-on-primary transition-all hover:shadow-[0_0_25px_rgba(60,215,255,0.6)] active:scale-95">Initialize Deployment</button>
                </div>
            </article>
        </section>

        <section class="space-y-6">
            <div class="flex flex-col items-start justify-between gap-6 xl:flex-row xl:items-end">
                <div class="flex flex-wrap gap-2 rounded-xl border border-outline-variant/20 bg-surface-container/50 p-1 backdrop-blur-md">
                    @foreach (['All Fields', 'Biology', 'Chemistry', 'Physics', 'Earth Science'] as $field)
                        <button class="shop-field-filter rounded-lg px-6 py-2 font-label text-sm transition-all {{ $loop->first ? 'bg-primary text-on-primary shadow-lg shadow-primary/20' : 'text-on-surface-variant hover:bg-surface-variant/30' }}" type="button" data-field="{{ \Illuminate\Support\Str::slug($field) }}">{{ $field }}</button>
                    @endforeach
                </div>
                <div class="flex flex-wrap items-center gap-4">
                    @foreach ([['filter_list', 'Science Branch'], ['attach_money', 'Price: Any'], ['sort', 'Sort: Popularity']] as [$icon, $label])
                        <label class="glass-panel flex items-center gap-2 rounded-xl border border-outline-variant/20 px-4 py-2">
                            <span class="material-symbols-outlined text-sm">{{ $icon }}</span>
                            <select class="cursor-pointer appearance-none border-none bg-transparent pr-6 font-label text-sm text-on-surface focus:ring-0">
                                <option>{{ $label }}</option>
                            </select>
                        </label>
                    @endforeach
                </div>
            </div>
        </section>

        @php
            $topicImages = [
                'Digestive System' => asset('images/shop/digestive-system-topic.svg'),
                'Pedigree' => asset('images/shop/pedigree-analysis-topic.svg'),
                'Taxonomy' => asset('images/shop/taxonomy-human-topic.svg'),
                'Photosynthesis' => asset('images/shop/photosynthesis-process-topic.svg'),
            ];

            $resources = [
                ['Quantum Mechanics 101', 'Presentation', '₱24.99', 'Complete interactive slide deck covering wave-particle duality and Schrodinger equation.', '4.9 (128)', '2.4k', 'primary', 'Grades 11-12', 'PPTX + PDF', 'Wave-particle duality, atomic models, uncertainty, and introductory quantum math', '45 editable slides|Concept checks after each topic|Teacher speaker notes|Exit ticket and answer key', 'https://lh3.googleusercontent.com/aida-public/AB6AXuCiGvKLRlCXFhNMKoLodhT5c4BJ6kiokayQ0GwdaYIRB7DHmbjcxvFbi74sOY6uQnfAb0D--GdPT-wpYOamOK82qozPUSbXR9l3ERLhAaDiX1Y9Q2h4Ju1_dsM1z84uwfVdEdSYn9sxp19vxt0IjmPUypx76lTJFPRotP4Vo7jAM-kjM8uxVK8v6jYllLrZRZObiuphXYsuTjdJTRJp7hJ6Y2lRwq06TmVdzp4tv11EXTAokSm3ERJ06UEtH2d5sNbuJAcO0OmLwj8', 'Physics'],
                ['Cellular Bio Lab Kit', 'Worksheet', '₱12.50', 'Printable lab reports and observation logs for high school biology classrooms.', '4.7 (89)', '1.1k', 'secondary-fixed', 'Grades 8-10', 'Printable PDF + editable DOCX', 'Microscope observations, cell drawings, organelle evidence, and lab conclusions', 'Lab report templates|Observation tables|Cell diagram checklist|Rubric and answer guide', 'https://lh3.googleusercontent.com/aida-public/AB6AXuCq6KgWPa0w7HHHpsuwtU7n9s6Tbc3jrCRlzzXnYU32kp9KHVBg5L_ZSKHbLOfHRh23zqaPCyd_c4Dm7ZUrA32tNkYYn1nHGX-koH_KEgG5Xux1HsZfesWzu0ol0vengJsYeioPT9Y9lI6V4VmwQVQ8CcOElQRoemt-IGIc1den7wDbI7I9zyXNR56DK9cMFMZs0qu0Cg4bwlzElPeGqr7kUfRheMKGgr2ORInrze3Y2uB8oMj9oO6G5060AeEn65wLpK3uIz34scM', 'Biology'],
                ['Planetary Geology Guide', 'Study Guide', '₱18.00', 'A comprehensive visual guide to rock formations across the solar system.', '5.0 (204)', '5.7k', 'tertiary-fixed-dim', 'Grades 6-9', 'PDF study guide', 'Rock cycles, impact craters, volcanism, erosion, and comparative planet surfaces', 'Planet profile pages|Rock formation visuals|Vocabulary review|Teacher answer key', 'https://lh3.googleusercontent.com/aida-public/AB6AXuAh6DKnNsBVdG_Pl0VZ1IwXLItMwpGVX7SvfBbivdlBVpIyTAVhOMW0d2hFMnEZraG_ywOlI2r2gCOwjtCDg4zl1dp9UzYDIOeKv5po3B__BNLKSGQv7axUkk_66zFWn5AXubCrEzkh8oNU89NqkJP08Jk74452VybRjXqD1xKWpbpWUvR0rBN_k_MViw7YBi-r9OqxhxznOJc0mEFuXHJApeXZP_Tbft1gi9ilVBi7h6yZoECtbw_W-zWfV8uT9FC6KT9DHspBxkw', 'Earth Science'],
                ['Organic Chem Mastery', 'Test/Quiz', '₱9.99', 'Test bank with 200+ questions on hydrocarbon structures and functional groups.', '4.8 (56)', '840', 'primary', 'Grades 10-12', 'PDF + editable question bank', 'Hydrocarbons, functional groups, naming rules, reactions, and structure recognition', '200+ practice questions|Multiple choice and short answer|Quiz versions A/B|Detailed answer explanations', 'https://lh3.googleusercontent.com/aida-public/AB6AXuDw0oIG-mFIss0Mc9QD_sAk_rLZq-dUswBOuVst1_iQ_SqYBHwJbPc6qKx3_jK0jtKtZk6LY5hMQj3bx8gkfzn5AInc_E-OOKOqxsZwVYjY74IIRO5SW3Bl6CcMZX3-9K5vTcofuA-F_Mt0CJhCFIBLXnjFuzF2Fle46babDgosWTa1Xu3SdJFH46d129V-D_LPX0a1FJcroWtkrGty5YcaU3Ha4IImXjdLIizzTN8_M6vwdCaSQT58w1ARjVno4Q0qHycT4gSD1io', 'Chemistry'],
                ['Digestive System Presentation', 'Presentation', '₱16.00', 'Animated lesson deck following food from ingestion to nutrient absorption.', '4.9 (74)', '1.6k', 'secondary-fixed', 'Grades 7-10', 'PPTX + PDF', 'Organs of the digestive tract, enzymes, absorption, and nutrient processing', '38 editable slides|Digestive pathway animation prompts|Teacher notes|Exit ticket questions', 'https://lh3.googleusercontent.com/aida-public/AB6AXuCq6KgWPa0w7HHHpsuwtU7n9s6Tbc3jrCRlzzXnYU32kp9KHVBg5L_ZSKHbLOfHRh23zqaPCyd_c4Dm7ZUrA32tNkYYn1nHGX-koH_KEgG5Xux1HsZfesWzu0ol0vengJsYeioPT9Y9lI6V4VmwQVQ8CcOElQRoemt-IGIc1den7wDbI7I9zyXNR56DK9cMFMZs0qu0Cg4bwlzElPeGqr7kUfRheMKGgr2ORInrze3Y2uB8oMj9oO6G5060AeEn65wLpK3uIz34scM', 'Biology'],
                ['Digestive System Worksheet Pack', 'Worksheet', '₱8.50', 'Printable practice sheets for labeling, sequencing, and explaining digestion.', '4.8 (63)', '1.2k', 'secondary-fixed', 'Grades 7-10', 'PDF + editable DOCX', 'Digestive organ functions, enzyme roles, and food pathway sequencing', 'Labeling activity|Cut-and-sort digestion steps|Short answer prompts|Answer key', 'https://lh3.googleusercontent.com/aida-public/AB6AXuCq6KgWPa0w7HHHpsuwtU7n9s6Tbc3jrCRlzzXnYU32kp9KHVBg5L_ZSKHbLOfHRh23zqaPCyd_c4Dm7ZUrA32tNkYYn1nHGX-koH_KEgG5Xux1HsZfesWzu0ol0vengJsYeioPT9Y9lI6V4VmwQVQ8CcOElQRoemt-IGIc1den7wDbI7I9zyXNR56DK9cMFMZs0qu0Cg4bwlzElPeGqr7kUfRheMKGgr2ORInrze3Y2uB8oMj9oO6G5060AeEn65wLpK3uIz34scM', 'Biology'],
                ['Digestive System Study Guide', 'Study Guide', '₱10.00', 'Concise review guide for digestion vocabulary and process mastery.', '4.7 (41)', '940', 'tertiary-fixed-dim', 'Grades 7-10', 'PDF study guide', 'Mouth-to-intestine pathway, mechanical digestion, chemical digestion, and absorption', 'Two-page student guide|Vocabulary table|Review diagrams|Practice checkpoint', 'https://lh3.googleusercontent.com/aida-public/AB6AXuCq6KgWPa0w7HHHpsuwtU7n9s6Tbc3jrCRlzzXnYU32kp9KHVBg5L_ZSKHbLOfHRh23zqaPCyd_c4Dm7ZUrA32tNkYYn1nHGX-koH_KEgG5Xux1HsZfesWzu0ol0vengJsYeioPT9Y9lI6V4VmwQVQ8CcOElQRoemt-IGIc1den7wDbI7I9zyXNR56DK9cMFMZs0qu0Cg4bwlzElPeGqr7kUfRheMKGgr2ORInrze3Y2uB8oMj9oO6G5060AeEn65wLpK3uIz34scM', 'Biology'],
                ['Digestive System Visual Posters', 'Visual Resource', '₱11.50', 'High-resolution digestive system diagrams for classroom display and notebooks.', '4.9 (52)', '1.4k', 'primary', 'Grades 6-10', 'PNG + PDF posters', 'Digestive organs, enzyme sites, and nutrient absorption visuals', 'Full-color poster set|Black-and-white notebook versions|Organ labels|Student reference sheet', 'https://lh3.googleusercontent.com/aida-public/AB6AXuCq6KgWPa0w7HHHpsuwtU7n9s6Tbc3jrCRlzzXnYU32kp9KHVBg5L_ZSKHbLOfHRh23zqaPCyd_c4Dm7ZUrA32tNkYYn1nHGX-koH_KEgG5Xux1HsZfesWzu0ol0vengJsYeioPT9Y9lI6V4VmwQVQ8CcOElQRoemt-IGIc1den7wDbI7I9zyXNR56DK9cMFMZs0qu0Cg4bwlzElPeGqr7kUfRheMKGgr2ORInrze3Y2uB8oMj9oO6G5060AeEn65wLpK3uIz34scM', 'Biology'],
                ['Digestive System Quiz Set', 'Test/Quiz', '₱7.99', 'Ready-to-use quizzes covering organs, functions, enzymes, and absorption.', '4.8 (39)', '810', 'primary', 'Grades 7-10', 'PDF + Google Forms prompts', 'Digestive anatomy, organ functions, chemical digestion, and applied scenarios', 'Quiz versions A/B|Multiple choice and short answer|Answer key|Remediation guide', 'https://lh3.googleusercontent.com/aida-public/AB6AXuCq6KgWPa0w7HHHpsuwtU7n9s6Tbc3jrCRlzzXnYU32kp9KHVBg5L_ZSKHbLOfHRh23zqaPCyd_c4Dm7ZUrA32tNkYYn1nHGX-koH_KEgG5Xux1HsZfesWzu0ol0vengJsYeioPT9Y9lI6V4VmwQVQ8CcOElQRoemt-IGIc1den7wDbI7I9zyXNR56DK9cMFMZs0qu0Cg4bwlzElPeGqr7kUfRheMKGgr2ORInrze3Y2uB8oMj9oO6G5060AeEn65wLpK3uIz34scM', 'Biology'],
                ['Heredity Presentation Deck', 'Presentation', '₱17.50', 'Editable slides explaining traits, alleles, genotypes, phenotypes, and inheritance patterns.', '4.9 (88)', '1.9k', 'secondary-fixed', 'Grades 8-10', 'PPTX + PDF', 'Mendelian inheritance, dominant and recessive traits, Punnett squares, and probability', '42 editable slides|Guided examples|Quick checks|Teacher notes', 'https://lh3.googleusercontent.com/aida-public/AB6AXuATRGKmhV6rWyvbHr5FVmQsXPyfsgLYYx90LrO6R9qv4ZFC1gFyJlCjagoIKC8yisds2Jq-A7pTnQgach0xQ-QBvSnCg5lDFGmmDk1znv0TNEdW21B8peZIJGGgrgAuamINcASssZpPAqc5JgO4r4QyZ2UymKVX3QhUSWhPgbiCeggJb1M4GIuiIaxU4uiaJUhZvo_RZxC5p8CpLj81PAp6wt8J5f9sqxuf0Nn5Cea18FgWHcAypcIJ3P7ujQ4yQOi45rghCYxfiLc', 'Biology'],
                ['Heredity Punnett Square Worksheets', 'Worksheet', '₱9.50', 'Practice sheets for monohybrid crosses, trait prediction, and genotype ratios.', '4.8 (77)', '1.5k', 'secondary-fixed', 'Grades 8-10', 'PDF + editable DOCX', 'Punnett square setup, phenotype ratios, genotype ratios, and word problems', 'Three practice levels|Word problem set|Student reflection prompts|Answer key', 'https://lh3.googleusercontent.com/aida-public/AB6AXuATRGKmhV6rWyvbHr5FVmQsXPyfsgLYYx90LrO6R9qv4ZFC1gFyJlCjagoIKC8yisds2Jq-A7pTnQgach0xQ-QBvSnCg5lDFGmmDk1znv0TNEdW21B8peZIJGGgrgAuamINcASssZpPAqc5JgO4r4QyZ2UymKVX3QhUSWhPgbiCeggJb1M4GIuiIaxU4uiaJUhZvo_RZxC5p8CpLj81PAp6wt8J5f9sqxuf0Nn5Cea18FgWHcAypcIJ3P7ujQ4yQOi45rghCYxfiLc', 'Biology'],
                ['Heredity Study Guide', 'Study Guide', '₱10.50', 'Student-friendly heredity review guide with worked examples and key vocabulary.', '4.7 (58)', '1.1k', 'tertiary-fixed-dim', 'Grades 8-10', 'PDF study guide', 'Alleles, traits, inheritance vocabulary, and probability-based predictions', 'Vocabulary chart|Worked Punnett examples|Common misconception notes|Review questions', 'https://lh3.googleusercontent.com/aida-public/AB6AXuATRGKmhV6rWyvbHr5FVmQsXPyfsgLYYx90LrO6R9qv4ZFC1gFyJlCjagoIKC8yisds2Jq-A7pTnQgach0xQ-QBvSnCg5lDFGmmDk1znv0TNEdW21B8peZIJGGgrgAuamINcASssZpPAqc5JgO4r4QyZ2UymKVX3QhUSWhPgbiCeggJb1M4GIuiIaxU4uiaJUhZvo_RZxC5p8CpLj81PAp6wt8J5f9sqxuf0Nn5Cea18FgWHcAypcIJ3P7ujQ4yQOi45rghCYxfiLc', 'Biology'],
                ['Heredity Visual Anchor Charts', 'Visual Resource', '₱12.00', 'Colorful genetics reference posters for alleles, traits, and Punnett squares.', '4.9 (69)', '1.3k', 'primary', 'Grades 7-10', 'PNG + PDF posters', 'Genotype symbols, phenotype expression, dominant and recessive alleles, and crosses', 'Classroom poster set|Student mini-charts|Notebook reference cards|Printable wall display', 'https://lh3.googleusercontent.com/aida-public/AB6AXuATRGKmhV6rWyvbHr5FVmQsXPyfsgLYYx90LrO6R9qv4ZFC1gFyJlCjagoIKC8yisds2Jq-A7pTnQgach0xQ-QBvSnCg5lDFGmmDk1znv0TNEdW21B8peZIJGGgrgAuamINcASssZpPAqc5JgO4r4QyZ2UymKVX3QhUSWhPgbiCeggJb1M4GIuiIaxU4uiaJUhZvo_RZxC5p8CpLj81PAp6wt8J5f9sqxuf0Nn5Cea18FgWHcAypcIJ3P7ujQ4yQOi45rghCYxfiLc', 'Biology'],
                ['Heredity Quiz Bank', 'Test/Quiz', '₱8.99', 'Assessment set for heredity vocabulary, Punnett squares, and inheritance patterns.', '4.8 (44)', '920', 'primary', 'Grades 8-10', 'PDF + editable quiz bank', 'Trait prediction, allele vocabulary, genotype ratios, and phenotype ratios', 'Quiz versions A/B|Performance task prompt|Answer explanations|Retake practice sheet', 'https://lh3.googleusercontent.com/aida-public/AB6AXuATRGKmhV6rWyvbHr5FVmQsXPyfsgLYYx90LrO6R9qv4ZFC1gFyJlCjagoIKC8yisds2Jq-A7pTnQgach0xQ-QBvSnCg5lDFGmmDk1znv0TNEdW21B8peZIJGGgrgAuamINcASssZpPAqc5JgO4r4QyZ2UymKVX3QhUSWhPgbiCeggJb1M4GIuiIaxU4uiaJUhZvo_RZxC5p8CpLj81PAp6wt8J5f9sqxuf0Nn5Cea18FgWHcAypcIJ3P7ujQ4yQOi45rghCYxfiLc', 'Biology'],
                ['Pedigree Analysis Presentation', 'Presentation', '₱18.00', 'Step-by-step lesson deck for reading pedigrees and tracking inherited traits.', '4.9 (61)', '1.2k', 'secondary-fixed', 'Grades 9-12', 'PPTX + PDF', 'Pedigree symbols, autosomal dominant, autosomal recessive, and carrier identification', '36 editable slides|Guided pedigree walkthroughs|Discussion checks|Teacher notes', 'https://lh3.googleusercontent.com/aida-public/AB6AXuAZBMYNDXcOHEDnSv8aUbarKS9z-gDUK5nWzUl-CE8CXF46HW-YUafVsOhoheg7FBjLs_Bu2Nkx2TEX7j6aTlh85EHlCOL4bSFOinoye7AP0K7l3SiDtKSzlnbZ4wgnJmHGgD5VUBCGCg-8_Y1I1yvzgDA25FyHS9ffdzzyjNwvuHMwOCs8EXmuTh_vAh5XKS53qMlrryJ9EuJkOnUyBI9ZeOmusks8xeXrdgP2xMgSh4uV6F0bOXrD4rRjAFQXk1Rs3a8C7zF4bmE', 'Biology'],
                ['Pedigree Analysis Worksheets', 'Worksheet', '₱9.99', 'Practice pedigrees for identifying inheritance patterns and affected individuals.', '4.8 (57)', '1.0k', 'secondary-fixed', 'Grades 9-12', 'PDF + editable DOCX', 'Pedigree symbols, affected status, carrier status, and inheritance pattern evidence', 'Eight pedigree cases|Evidence sentence frames|Challenge case|Answer key', 'https://lh3.googleusercontent.com/aida-public/AB6AXuAZBMYNDXcOHEDnSv8aUbarKS9z-gDUK5nWzUl-CE8CXF46HW-YUafVsOhoheg7FBjLs_Bu2Nkx2TEX7j6aTlh85EHlCOL4bSFOinoye7AP0K7l3SiDtKSzlnbZ4wgnJmHGgD5VUBCGCg-8_Y1I1yvzgDA25FyHS9ffdzzyjNwvuHMwOCs8EXmuTh_vAh5XKS53qMlrryJ9EuJkOnUyBI9ZeOmusks8xeXrdgP2xMgSh4uV6F0bOXrD4rRjAFQXk1Rs3a8C7zF4bmE', 'Biology'],
                ['Pedigree Analysis Study Guide', 'Study Guide', '₱11.00', 'Compact guide for decoding family trees and explaining genetic evidence.', '4.7 (42)', '850', 'tertiary-fixed-dim', 'Grades 9-12', 'PDF study guide', 'Symbols, generations, affected individuals, carriers, and pattern recognition', 'Pedigree symbol key|Inference checklist|Example explanations|Student practice page', 'https://lh3.googleusercontent.com/aida-public/AB6AXuAZBMYNDXcOHEDnSv8aUbarKS9z-gDUK5nWzUl-CE8CXF46HW-YUafVsOhoheg7FBjLs_Bu2Nkx2TEX7j6aTlh85EHlCOL4bSFOinoye7AP0K7l3SiDtKSzlnbZ4wgnJmHGgD5VUBCGCg-8_Y1I1yvzgDA25FyHS9ffdzzyjNwvuHMwOCs8EXmuTh_vAh5XKS53qMlrryJ9EuJkOnUyBI9ZeOmusks8xeXrdgP2xMgSh4uV6F0bOXrD4rRjAFQXk1Rs3a8C7zF4bmE', 'Biology'],
                ['Pedigree Symbol Visual Set', 'Visual Resource', '₱12.50', 'Clean pedigree symbol cards and family-tree templates for genetics lessons.', '4.8 (46)', '910', 'primary', 'Grades 9-12', 'PNG + printable PDF', 'Pedigree symbols, relationship lines, generations, and affected trait shading', 'Symbol flashcards|Blank pedigree templates|Classroom poster|Student reference card', 'https://lh3.googleusercontent.com/aida-public/AB6AXuAZBMYNDXcOHEDnSv8aUbarKS9z-gDUK5nWzUl-CE8CXF46HW-YUafVsOhoheg7FBjLs_Bu2Nkx2TEX7j6aTlh85EHlCOL4bSFOinoye7AP0K7l3SiDtKSzlnbZ4wgnJmHGgD5VUBCGCg-8_Y1I1yvzgDA25FyHS9ffdzzyjNwvuHMwOCs8EXmuTh_vAh5XKS53qMlrryJ9EuJkOnUyBI9ZeOmusks8xeXrdgP2xMgSh4uV6F0bOXrD4rRjAFQXk1Rs3a8C7zF4bmE', 'Biology'],
                ['Pedigree Analysis Quiz', 'Test/Quiz', '₱8.50', 'Quiz set for interpreting pedigrees and defending inheritance pattern claims.', '4.8 (35)', '740', 'primary', 'Grades 9-12', 'PDF + editable test', 'Pedigree interpretation, genetic evidence, carrier reasoning, and inheritance claims', 'Two quiz forms|Short constructed-response questions|Answer key|Scoring guide', 'https://lh3.googleusercontent.com/aida-public/AB6AXuAZBMYNDXcOHEDnSv8aUbarKS9z-gDUK5nWzUl-CE8CXF46HW-YUafVsOhoheg7FBjLs_Bu2Nkx2TEX7j6aTlh85EHlCOL4bSFOinoye7AP0K7l3SiDtKSzlnbZ4wgnJmHGgD5VUBCGCg-8_Y1I1yvzgDA25FyHS9ffdzzyjNwvuHMwOCs8EXmuTh_vAh5XKS53qMlrryJ9EuJkOnUyBI9ZeOmusks8xeXrdgP2xMgSh4uV6F0bOXrD4rRjAFQXk1Rs3a8C7zF4bmE', 'Biology'],
                ['Taxonomy Classification Presentation', 'Presentation', '₱16.50', 'Lesson deck for domains, kingdoms, scientific names, and classification levels.', '4.8 (67)', '1.3k', 'secondary-fixed', 'Grades 7-10', 'PPTX + PDF', 'Taxonomic hierarchy, binomial nomenclature, kingdoms, domains, and classification evidence', '40 editable slides|Classification examples|Think-pair-share prompts|Teacher notes', 'https://lh3.googleusercontent.com/aida-public/AB6AXuDAUcoiNgTAYHP6KPHsU1YcAMSl6PKWSNdMnRjLCOWCukSJkXcl5m7dp1RSeTYiAqtYLFujw0hzlmy_q9msD3MXisVl54U5Qkl_2s4CSYmQouxfvRiRC-s5o6HAM1g1hYCJkvrwUUluzrLdIE5Gtnh-Cf9lpEgxYE9enD4ItMmkMUz9JskJh1bH4uQsYYCPpI7Zx9a45CDbvjmskp2xm5yUtOoxSYs9e4avQ1FVgYgXrYwvW_qeiM8VZV7UZtmqnPDQrcS-4eIEHJ4', 'Biology'],
                ['Taxonomy Sorting Worksheets', 'Worksheet', '₱8.99', 'Classification practice sheets for sorting organisms into taxonomic groups.', '4.7 (54)', '980', 'secondary-fixed', 'Grades 7-10', 'PDF + editable DOCX', 'Domains, kingdoms, classification traits, and scientific naming patterns', 'Organism sorting cards|Taxonomy ladder worksheet|Binomial naming practice|Answer key', 'https://lh3.googleusercontent.com/aida-public/AB6AXuDAUcoiNgTAYHP6KPHsU1YcAMSl6PKWSNdMnRjLCOWCukSJkXcl5m7dp1RSeTYiAqtYLFujw0hzlmy_q9msD3MXisVl54U5Qkl_2s4CSYmQouxfvRiRC-s5o6HAM1g1hYCJkvrwUUluzrLdIE5Gtnh-Cf9lpEgxYE9enD4ItMmkMUz9JskJh1bH4uQsYYCPpI7Zx9a45CDbvjmskp2xm5yUtOoxSYs9e4avQ1FVgYgXrYwvW_qeiM8VZV7UZtmqnPDQrcS-4eIEHJ4', 'Biology'],
                ['Taxonomy Study Guide', 'Study Guide', '₱10.00', 'Clear study guide for classification levels and organism naming conventions.', '4.8 (49)', '870', 'tertiary-fixed-dim', 'Grades 7-10', 'PDF study guide', 'Hierarchy from domain to species, scientific names, and classification traits', 'Taxonomy ladder review|Key term glossary|Classification examples|Practice questions', 'https://lh3.googleusercontent.com/aida-public/AB6AXuDAUcoiNgTAYHP6KPHsU1YcAMSl6PKWSNdMnRjLCOWCukSJkXcl5m7dp1RSeTYiAqtYLFujw0hzlmy_q9msD3MXisVl54U5Qkl_2s4CSYmQouxfvRiRC-s5o6HAM1g1hYCJkvrwUUluzrLdIE5Gtnh-Cf9lpEgxYE9enD4ItMmkMUz9JskJh1bH4uQsYYCPpI7Zx9a45CDbvjmskp2xm5yUtOoxSYs9e4avQ1FVgYgXrYwvW_qeiM8VZV7UZtmqnPDQrcS-4eIEHJ4', 'Biology'],
                ['Taxonomy Visual Cards', 'Visual Resource', '₱12.00', 'Organism classification cards and taxonomy ladder visuals for group activities.', '4.9 (50)', '1.1k', 'primary', 'Grades 7-10', 'PNG + printable PDF', 'Classification traits, organism examples, and domain-to-species hierarchy', 'Organism cards|Taxonomy ladder poster|Sorting mat|Notebook mini-chart', 'https://lh3.googleusercontent.com/aida-public/AB6AXuDAUcoiNgTAYHP6KPHsU1YcAMSl6PKWSNdMnRjLCOWCukSJkXcl5m7dp1RSeTYiAqtYLFujw0hzlmy_q9msD3MXisVl54U5Qkl_2s4CSYmQouxfvRiRC-s5o6HAM1g1hYCJkvrwUUluzrLdIE5Gtnh-Cf9lpEgxYE9enD4ItMmkMUz9JskJh1bH4uQsYYCPpI7Zx9a45CDbvjmskp2xm5yUtOoxSYs9e4avQ1FVgYgXrYwvW_qeiM8VZV7UZtmqnPDQrcS-4eIEHJ4', 'Biology'],
                ['Taxonomy Quiz Set', 'Test/Quiz', '₱7.99', 'Assessment pack for taxonomy hierarchy, kingdoms, domains, and scientific names.', '4.7 (33)', '690', 'primary', 'Grades 7-10', 'PDF + editable quiz', 'Taxonomic levels, classification evidence, binomial nomenclature, and organism groups', 'Quiz versions A/B|Vocabulary section|Classification scenarios|Answer key', 'https://lh3.googleusercontent.com/aida-public/AB6AXuDAUcoiNgTAYHP6KPHsU1YcAMSl6PKWSNdMnRjLCOWCukSJkXcl5m7dp1RSeTYiAqtYLFujw0hzlmy_q9msD3MXisVl54U5Qkl_2s4CSYmQouxfvRiRC-s5o6HAM1g1hYCJkvrwUUluzrLdIE5Gtnh-Cf9lpEgxYE9enD4ItMmkMUz9JskJh1bH4uQsYYCPpI7Zx9a45CDbvjmskp2xm5yUtOoxSYs9e4avQ1FVgYgXrYwvW_qeiM8VZV7UZtmqnPDQrcS-4eIEHJ4', 'Biology'],
                ['Photosynthesis Presentation', 'Presentation', '₱17.00', 'Visual lesson deck connecting chloroplasts, sunlight, carbon dioxide, water, and glucose.', '4.9 (92)', '2.0k', 'secondary-fixed', 'Grades 6-10', 'PPTX + PDF', 'Photosynthesis equation, chloroplast structure, reactants, products, and energy flow', '44 editable slides|Animated process sequence|Equation breakdown|Teacher notes', 'https://lh3.googleusercontent.com/aida-public/AB6AXuBrjlCp58-ia9SWDdL0BDZeCSj8g_33YQH0ganRnv9N5cgEXyPxMKCoXtEV_EvU0O6ISthZJh7kZhx6PIGtHPvRrC-6-j4T91Y8W0AaXD4SP4veAqInJJ4UTm5gZ_XbbzYdYvjZjASY2VUZ-tqpyKET3rDYw_xtZQcnmcyggP8WeTt14OF-Z36Qq1okyID0eurfFuNdvswzQwOGbMH2h0e0gCM2Y0gW_H5-1SlATetdSl4KFhuSV2lGbSpTBJkFsmVFIBnzoyLcAAY', 'Biology'],
                ['Photosynthesis Worksheets', 'Worksheet', '₱8.50', 'Practice pages for balancing the photosynthesis equation and tracing matter flow.', '4.8 (73)', '1.4k', 'secondary-fixed', 'Grades 6-10', 'PDF + editable DOCX', 'Reactants, products, chloroplasts, sunlight energy, and matter cycling', 'Equation practice|Diagram labeling|Scenario questions|Answer key', 'https://lh3.googleusercontent.com/aida-public/AB6AXuBrjlCp58-ia9SWDdL0BDZeCSj8g_33YQH0ganRnv9N5cgEXyPxMKCoXtEV_EvU0O6ISthZJh7kZhx6PIGtHPvRrC-6-j4T91Y8W0AaXD4SP4veAqInJJ4UTm5gZ_XbbzYdYvjZjASY2VUZ-tqpyKET3rDYw_xtZQcnmcyggP8WeTt14OF-Z36Qq1okyID0eurfFuNdvswzQwOGbMH2h0e0gCM2Y0gW_H5-1SlATetdSl4KFhuSV2lGbSpTBJkFsmVFIBnzoyLcAAY', 'Biology'],
                ['Photosynthesis Study Guide', 'Study Guide', '₱10.00', 'Student review guide for photosynthesis vocabulary, equation, and plant structures.', '4.7 (59)', '1.0k', 'tertiary-fixed-dim', 'Grades 6-10', 'PDF study guide', 'Chloroplasts, chlorophyll, light energy, reactants, products, and glucose storage', 'One-page review|Vocabulary table|Equation guide|Checkpoint questions', 'https://lh3.googleusercontent.com/aida-public/AB6AXuBrjlCp58-ia9SWDdL0BDZeCSj8g_33YQH0ganRnv9N5cgEXyPxMKCoXtEV_EvU0O6ISthZJh7kZhx6PIGtHPvRrC-6-j4T91Y8W0AaXD4SP4veAqInJJ4UTm5gZ_XbbzYdYvjZjASY2VUZ-tqpyKET3rDYw_xtZQcnmcyggP8WeTt14OF-Z36Qq1okyID0eurfFuNdvswzQwOGbMH2h0e0gCM2Y0gW_H5-1SlATetdSl4KFhuSV2lGbSpTBJkFsmVFIBnzoyLcAAY', 'Biology'],
                ['Photosynthesis Visual Diagram Set', 'Visual Resource', '₱12.50', 'Classroom-ready diagrams showing photosynthesis inputs, outputs, and energy transfer.', '4.9 (66)', '1.5k', 'primary', 'Grades 6-10', 'PNG + PDF posters', 'Leaf structures, chloroplasts, photosynthesis equation, and energy flow', 'Full-color posters|Student notebook diagrams|Equation cards|Vocabulary visuals', 'https://lh3.googleusercontent.com/aida-public/AB6AXuBrjlCp58-ia9SWDdL0BDZeCSj8g_33YQH0ganRnv9N5cgEXyPxMKCoXtEV_EvU0O6ISthZJh7kZhx6PIGtHPvRrC-6-j4T91Y8W0AaXD4SP4veAqInJJ4UTm5gZ_XbbzYdYvjZjASY2VUZ-tqpyKET3rDYw_xtZQcnmcyggP8WeTt14OF-Z36Qq1okyID0eurfFuNdvswzQwOGbMH2h0e0gCM2Y0gW_H5-1SlATetdSl4KFhuSV2lGbSpTBJkFsmVFIBnzoyLcAAY', 'Biology'],
                ['Photosynthesis Quiz Pack', 'Test/Quiz', '₱8.25', 'Quiz pack assessing photosynthesis vocabulary, equation, and concept application.', '4.8 (47)', '880', 'primary', 'Grades 6-10', 'PDF + editable quiz', 'Photosynthesis equation, reactants and products, chloroplast roles, and energy transfer', 'Quiz versions A/B|Diagram analysis|Short answer section|Answer explanations', 'https://lh3.googleusercontent.com/aida-public/AB6AXuBrjlCp58-ia9SWDdL0BDZeCSj8g_33YQH0ganRnv9N5cgEXyPxMKCoXtEV_EvU0O6ISthZJh7kZhx6PIGtHPvRrC-6-j4T91Y8W0AaXD4SP4veAqInJJ4UTm5gZ_XbbzYdYvjZjASY2VUZ-tqpyKET3rDYw_xtZQcnmcyggP8WeTt14OF-Z36Qq1okyID0eurfFuNdvswzQwOGbMH2h0e0gCM2Y0gW_H5-1SlATetdSl4KFhuSV2lGbSpTBJkFsmVFIBnzoyLcAAY', 'Biology'],
            ];
        @endphp

        <section id="shop-resource-grid" class="grid grid-cols-1 gap-gutter md:grid-cols-2 xl:grid-cols-4">
            @foreach ($resources as [$title, $type, $price, $copy, $rating, $downloads, $color, $grade, $format, $focus, $includes, $image, $field])
                @php
                    $displayImage = $image;
                    foreach ($topicImages as $topicName => $topicImage) {
                        if (\Illuminate\Support\Str::startsWith($title, $topicName)) {
                            $displayImage = $topicImage;
                            break;
                        }
                    }
                @endphp
                <article class="shop-resource-card glass-panel glow-hover group overflow-hidden rounded-xl transition-all duration-500" data-field="{{ \Illuminate\Support\Str::slug($field) }}">
                    <div class="relative h-48 overflow-hidden">
                        <img alt="{{ $title }}" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110" src="{{ $displayImage }}">
                        <div class="absolute left-3 top-3 rounded border border-{{ $color }}/30 bg-background/80 px-2 py-1 font-label text-[10px] uppercase text-{{ $color }} backdrop-blur-md">{{ $type }}</div>
                    </div>
                    <div class="space-y-4 p-6">
                        <div class="flex items-start justify-between gap-3">
                            <h4 class="line-clamp-1 font-headline text-2xl font-semibold text-white">{{ $title }}</h4>
                            <span class="font-label text-sm font-bold text-primary">{{ $price }}</span>
                        </div>
                        <p class="line-clamp-2 text-on-surface-variant">{{ $copy }}</p>
                        <div class="flex items-center gap-4 font-label text-xs text-on-surface-variant">
                            <div class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-sm text-yellow-500" style="font-variation-settings: 'FILL' 1;">star</span>
                                <span>{{ $rating }}</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-sm">download</span>
                                <span>{{ $downloads }}</span>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-3 pt-2">
                            <button
                                class="shop-resource-preview rounded-lg border border-primary/30 py-2 text-center font-label text-sm text-primary transition-all hover:bg-primary/10"
                                type="button"
                                data-product-title="{{ $title }}"
                                data-product-type="{{ $type }}"
                                data-product-price="{{ $price }}"
                                data-product-copy="{{ $copy }}"
                                data-product-rating="{{ $rating }}"
                                data-product-downloads="{{ $downloads }}"
                                data-product-grade="{{ $grade }}"
                                data-product-format="{{ $format }}"
                                data-product-focus="{{ $focus }}"
                                data-product-includes="{{ $includes }}"
                                data-product-image="{{ $displayImage }}"
                            >Preview</button>
                            <button class="shop-resource-add flex items-center justify-center gap-1 rounded-lg bg-primary py-2 font-label text-sm text-on-primary transition-all hover:shadow-[0_0_15px_rgba(60,215,255,0.4)]" type="button" data-product-id="{{ \Illuminate\Support\Str::slug($title) }}" data-product-title="{{ $title }}" data-product-meta="{{ $type === 'Visual Resource' ? 'Visual Resource' : $type . ' Resource' }}" data-product-price="{{ $price }}" data-product-image="{{ $displayImage }}">
                                <span class="material-symbols-outlined text-sm">shopping_cart</span>
                                Add
                            </button>
                        </div>
                    </div>
                </article>
            @endforeach
        </section>

        <section class="grid grid-cols-1 gap-gutter xl:grid-cols-3">
            <article class="glass-panel space-y-6 rounded-xl p-8 xl:col-span-2">
                <div class="flex items-center justify-between">
                    <h3 class="font-headline text-2xl font-semibold text-white">Sales Performance</h3>
                    <div class="flex items-center gap-2">
                        <span class="h-3 w-3 rounded-full bg-primary"></span>
                        <span class="font-label text-xs text-on-surface-variant">Units Sold</span>
                    </div>
                </div>
                <div class="flex h-64 items-end justify-between gap-4 pt-10">
                    @foreach ([40, 65, 55, 85, 70, 95, 60] as $height)
                        <div class="relative flex-1 rounded-t-lg bg-primary/20 transition-all hover:bg-primary/40" style="height: {{ $height }}%"></div>
                    @endforeach
                </div>
                <div class="flex justify-between px-2 font-label text-xs text-on-surface-variant">
                    @foreach (['MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT', 'SUN'] as $day)
                        <span>{{ $day }}</span>
                    @endforeach
                </div>
            </article>

            <aside class="glass-panel space-y-6 rounded-xl p-8">
                <h3 class="font-headline text-2xl font-semibold text-white">Trending Now</h3>
                <div class="space-y-4">
                    @foreach ([['rocket_launch', 'Astrophysics Basics', '412 downloads today', '+24%', 'primary'], ['magnification_small', 'Microbiology Atlas', '285 downloads today', '+18%', 'secondary-fixed'], ['public', 'Climate Systems V3', '192 downloads today', '+11%', 'tertiary-fixed-dim']] as [$icon, $title, $copy, $change, $color])
                        <div class="flex cursor-pointer items-center gap-4 rounded-lg p-3 transition-all hover:bg-surface-variant/30">
                            <div class="flex h-12 w-12 items-center justify-center rounded-lg border border-{{ $color }}/20 bg-surface-container text-{{ $color }}">
                                <span class="material-symbols-outlined">{{ $icon }}</span>
                            </div>
                            <div class="flex-1">
                                <p class="font-label text-sm text-white">{{ $title }}</p>
                                <p class="font-label text-xs text-on-surface-variant">{{ $copy }}</p>
                            </div>
                            <div class="font-label text-xs text-green-400">{{ $change }}</div>
                        </div>
                    @endforeach
                </div>
                <button class="w-full rounded-xl border border-outline-variant/30 py-3 font-label text-sm text-on-surface-variant transition-all hover:border-primary/50 hover:text-white">View Comprehensive Report</button>
            </aside>
        </section>
    </main>

    <button class="fixed bottom-8 right-8 z-50 flex h-16 w-16 items-center justify-center rounded-full bg-primary text-on-primary shadow-[0_0_30px_rgba(60,215,255,0.5)] transition-all hover:scale-110 active:scale-95">
        <span class="material-symbols-outlined text-3xl transition-transform duration-500 hover:rotate-90">add</span>
    </button>

    <div id="shop-preview-modal" class="fixed inset-0 z-[80] hidden items-center justify-center bg-surface-container-lowest/70 p-6 backdrop-blur-md">
        <div class="glass-panel relative w-full max-w-4xl overflow-hidden rounded-2xl border-primary/30 shadow-[0_0_35px_rgba(0,212,255,0.24)]">
            <button id="shop-preview-close" class="absolute right-4 top-4 z-10 flex h-10 w-10 items-center justify-center rounded-full bg-surface-container-high/90 text-on-surface-variant transition-colors hover:text-primary" type="button" aria-label="Close preview">
                <span class="material-symbols-outlined">close</span>
            </button>
            <div class="grid grid-cols-1 lg:grid-cols-2">
                <div class="relative min-h-[320px] overflow-hidden">
                    <img id="shop-preview-image" class="h-full w-full object-cover" alt="">
                    <div class="absolute inset-0 bg-gradient-to-t from-background/80 to-transparent lg:bg-gradient-to-r"></div>
                </div>
                <div class="p-8">
                    <span id="shop-preview-type" class="mb-4 inline-flex rounded bg-primary-container px-3 py-1 font-label text-xs font-bold uppercase text-on-primary shadow-[0_0_12px_rgba(0,212,255,0.35)]"></span>
                    <h3 id="shop-preview-title" class="font-headline text-3xl font-semibold text-white"></h3>
                    <div class="mt-4 flex flex-wrap items-center gap-4 font-label text-xs text-on-surface-variant">
                        <span class="flex items-center gap-1"><span class="material-symbols-outlined text-sm text-yellow-500" style="font-variation-settings: 'FILL' 1;">star</span><span id="shop-preview-rating"></span></span>
                        <span class="flex items-center gap-1"><span class="material-symbols-outlined text-sm">download</span><span id="shop-preview-downloads"></span></span>
                    </div>
                    <div class="mt-5 grid grid-cols-2 gap-3">
                        <div class="rounded-lg border border-white/10 bg-white/5 p-3">
                            <p class="font-label text-[10px] uppercase tracking-widest text-on-surface-variant">Grade Level</p>
                            <p id="shop-preview-grade" class="mt-1 font-label text-xs text-primary"></p>
                        </div>
                        <div class="rounded-lg border border-white/10 bg-white/5 p-3">
                            <p class="font-label text-[10px] uppercase tracking-widest text-on-surface-variant">Format</p>
                            <p id="shop-preview-format" class="mt-1 font-label text-xs text-primary"></p>
                        </div>
                    </div>
                    <p id="shop-preview-copy" class="mt-5 text-on-surface-variant"></p>
                    <div class="mt-5">
                        <p class="mb-3 font-label text-xs uppercase tracking-widest text-primary">Learning focus</p>
                        <p id="shop-preview-focus" class="text-sm text-on-surface-variant"></p>
                    </div>
                    <div class="mt-5">
                        <p class="mb-3 font-label text-xs uppercase tracking-widest text-primary">Included materials</p>
                        <ul id="shop-preview-includes" class="space-y-2 text-sm text-on-surface-variant"></ul>
                    </div>
                    <div class="mt-8 flex items-center justify-between gap-4">
                        <span id="shop-preview-price" class="font-headline text-3xl font-semibold text-primary"></span>
                        <button id="shop-preview-add" class="flex items-center gap-2 rounded-lg bg-primary px-5 py-3 font-label text-sm font-bold text-on-primary transition-all hover:scale-[1.02] active:scale-95" type="button">
                            <span class="material-symbols-outlined">shopping_cart</span>
                            Add
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="shop-cart-toast" class="pointer-events-none fixed right-6 top-24 z-[90] translate-y-2 rounded-2xl border border-primary/30 bg-surface-container-high/95 px-5 py-4 opacity-0 shadow-[0_0_24px_rgba(0,212,255,0.28)] backdrop-blur-xl transition-all duration-300">
        <div class="flex items-center gap-3">
            <span class="material-symbols-outlined text-primary">check_circle</span>
            <div>
                <p class="font-headline text-sm font-semibold text-on-surface">Added to cart</p>
                <p id="shop-cart-toast-product" class="font-label text-xs text-on-surface-variant">Science resource</p>
            </div>
        </div>
    </div>

    <script>
        const cartStorageKey = 'ilearnScienceCartItems';
        const inventoryStorageKey = 'ilearnScienceInventoryProducts';
        const starterCartCount = 3;
        let previewProduct = null;
        let lastInventorySnapshot = '';
        const shopResourceGrid = document.getElementById('shop-resource-grid');
        const serverRenderedProducts = Array.from(document.querySelectorAll('.shop-resource-card')).map((card) => {
            const preview = card.querySelector('.shop-resource-preview');
            const add = card.querySelector('.shop-resource-add');
            return {
                id: add?.dataset.productId || '',
                title: preview?.dataset.productTitle || 'Science Resource',
                type: preview?.dataset.productType || 'Digital Resource',
                meta: add?.dataset.productMeta || `${preview?.dataset.productType || 'Digital'} Resource`,
                price: preview?.dataset.productPrice || '₱0.00',
                copy: preview?.dataset.productCopy || '',
                rating: preview?.dataset.productRating || 'New',
                downloads: preview?.dataset.productDownloads || '0',
                grade: preview?.dataset.productGrade || 'All Grades',
                format: preview?.dataset.productFormat || 'Digital File',
                focus: preview?.dataset.productFocus || '',
                includes: preview?.dataset.productIncludes || 'Editable product information|Digital download|Teacher-ready resource',
                image: preview?.dataset.productImage || '',
                field: card.dataset.field || 'biology',
                status: 'Published',
            };
        });

        function slugify(value = '') {
            return String(value).toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^-|-$/g, '') || 'science-resource';
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

        function formatPeso(value) {
            const amount = Number.parseFloat(String(value).replace(/[₱,]/g, '')) || 0;
            return `₱${amount.toFixed(2)}`;
        }

        function getAdminInventory() {
            try {
                const saved = JSON.parse(localStorage.getItem(inventoryStorageKey) || 'null');
                const initialized = localStorage.getItem(`${inventoryStorageKey}Initialized`) === 'true';
                if (Array.isArray(saved) && (saved.length || initialized)) return saved;
            } catch {}
            return null;
        }

        function normalizeInventoryProduct(product) {
            const type = product.category || product.type || 'Digital Resource';
            const subject = product.subject || product.field || 'Biology';
            return {
                id: product.id || slugify(product.title),
                title: product.title || 'Science Resource',
                type,
                meta: type === 'Visual Resource' ? 'Visual Resource' : `${type} Resource`,
                price: formatPeso(product.price || 0),
                copy: product.description || product.copy || 'Digital learning material for science classes.',
                rating: product.rating || 'New',
                downloads: product.downloads || '0',
                grade: product.grade || 'All Grades',
                format: product.format || 'Digital File',
                focus: product.topic || product.focus || product.subject || 'Science learning resource',
                includes: product.details || product.includes || 'Editable product information|Digital resource access|Teacher-ready classroom material',
                image: product.image || '',
                field: slugify(subject),
                status: product.status || 'Published',
            };
        }

        function getShopProducts() {
            const inventory = getAdminInventory();
            if (!inventory) return serverRenderedProducts;
            return inventory
                .filter((product) => (product.status || 'Published') === 'Published')
                .map(normalizeInventoryProduct);
        }

        function activeShopField() {
            return document.querySelector('.shop-field-filter.bg-primary')?.dataset.field || 'all-fields';
        }

        function getCartItems() {
            try {
                return JSON.parse(localStorage.getItem(cartStorageKey)) || [];
            } catch {
                return [];
            }
        }

        function setCartItems(items) {
            localStorage.setItem(cartStorageKey, JSON.stringify(items));
        }

        function updateCartCount() {
            const hasSavedCart = localStorage.getItem(cartStorageKey) !== null;
            const actualCount = hasSavedCart
                ? getCartItems().reduce((sum, item) => sum + (Number(item.quantity) || 1), 0)
                : starterCartCount;

            document.querySelectorAll('[data-cart-count]').forEach((badge) => {
                badge.innerText = actualCount;
            });
            document.querySelectorAll('[data-cart-link]').forEach((link) => {
                link.setAttribute('aria-label', `Cart with ${actualCount} item${actualCount === 1 ? '' : 's'}`);
            });
        }

        function showCartToast(productTitle) {
            const toast = document.getElementById('shop-cart-toast');
            const label = document.getElementById('shop-cart-toast-product');
            if (!toast) return;
            if (label) label.innerText = productTitle;
            toast.classList.remove('translate-y-2', 'opacity-0');
            toast.classList.add('translate-y-0', 'opacity-100');
            setTimeout(() => {
                toast.classList.add('translate-y-2', 'opacity-0');
                toast.classList.remove('translate-y-0', 'opacity-100');
            }, 1800);
        }

        function addProductToCart(product) {
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

        function openShopPreview(product) {
            previewProduct = product;
            document.getElementById('shop-preview-image').src = product.image;
            document.getElementById('shop-preview-image').alt = product.title;
            document.getElementById('shop-preview-type').innerText = product.type;
            document.getElementById('shop-preview-title').innerText = product.title;
            document.getElementById('shop-preview-rating').innerText = product.rating;
            document.getElementById('shop-preview-downloads').innerText = product.downloads;
            document.getElementById('shop-preview-grade').innerText = product.grade;
            document.getElementById('shop-preview-format').innerText = product.format;
            document.getElementById('shop-preview-copy').innerText = product.copy;
            document.getElementById('shop-preview-focus').innerText = product.focus;
            document.getElementById('shop-preview-price').innerText = product.price;
            document.getElementById('shop-preview-includes').innerHTML = product.includes
                .split('|')
                .map((item) => `<li class="flex items-start gap-2"><span class="material-symbols-outlined mt-0.5 text-[16px] text-primary">check_circle</span><span>${item}</span></li>`)
                .join('');
            document.getElementById('shop-preview-modal').classList.remove('hidden');
            document.getElementById('shop-preview-modal').classList.add('flex');
        }

        function closeShopPreview() {
            document.getElementById('shop-preview-modal').classList.add('hidden');
            document.getElementById('shop-preview-modal').classList.remove('flex');
        }

        function shopProductCard(product) {
            const color = product.type === 'Worksheet' ? 'secondary-fixed' : product.type === 'Study Guide' ? 'tertiary-fixed-dim' : 'primary';
            return `
                <article class="shop-resource-card glass-panel glow-hover group overflow-hidden rounded-xl transition-all duration-500" data-field="${escapeHTML(product.field)}">
                    <div class="relative h-48 overflow-hidden">
                        ${product.image ? `<img alt="${escapeHTML(product.title)}" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110" src="${escapeHTML(product.image)}">` : `<div class="flex h-full w-full items-center justify-center bg-surface-container-high text-primary"><span class="material-symbols-outlined text-5xl">science</span></div>`}
                        <div class="absolute left-3 top-3 rounded border border-${color}/30 bg-background/80 px-2 py-1 font-label text-[10px] uppercase text-${color} backdrop-blur-md">${escapeHTML(product.type)}</div>
                    </div>
                    <div class="space-y-4 p-6">
                        <div class="flex items-start justify-between gap-3">
                            <h4 class="line-clamp-1 font-headline text-2xl font-semibold text-white">${escapeHTML(product.title)}</h4>
                            <span class="font-label text-sm font-bold text-primary">${escapeHTML(product.price)}</span>
                        </div>
                        <p class="line-clamp-2 text-on-surface-variant">${escapeHTML(product.copy)}</p>
                        <div class="flex items-center gap-4 font-label text-xs text-on-surface-variant">
                            <div class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-sm text-yellow-500" style="font-variation-settings: 'FILL' 1;">star</span>
                                <span>${escapeHTML(product.rating)}</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-sm">download</span>
                                <span>${escapeHTML(product.downloads)}</span>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-3 pt-2">
                            <button
                                class="shop-resource-preview rounded-lg border border-primary/30 py-2 text-center font-label text-sm text-primary transition-all hover:bg-primary/10"
                                type="button"
                                data-product-title="${escapeHTML(product.title)}"
                                data-product-type="${escapeHTML(product.type)}"
                                data-product-price="${escapeHTML(product.price)}"
                                data-product-copy="${escapeHTML(product.copy)}"
                                data-product-rating="${escapeHTML(product.rating)}"
                                data-product-downloads="${escapeHTML(product.downloads)}"
                                data-product-grade="${escapeHTML(product.grade)}"
                                data-product-format="${escapeHTML(product.format)}"
                                data-product-focus="${escapeHTML(product.focus)}"
                                data-product-includes="${escapeHTML(product.includes)}"
                                data-product-image="${escapeHTML(product.image)}"
                            >Preview</button>
                            <button class="shop-resource-add flex items-center justify-center gap-1 rounded-lg bg-primary py-2 font-label text-sm text-on-primary transition-all hover:shadow-[0_0_15px_rgba(60,215,255,0.4)]" type="button" data-product-id="${escapeHTML(product.id)}" data-product-title="${escapeHTML(product.title)}" data-product-meta="${escapeHTML(product.meta)}" data-product-price="${escapeHTML(product.price)}" data-product-image="${escapeHTML(product.image)}">
                                <span class="material-symbols-outlined text-sm">shopping_cart</span>
                                Add
                            </button>
                        </div>
                    </div>
                </article>
            `;
        }

        function applyShopFieldFilter() {
            const selectedField = activeShopField();
            document.querySelectorAll('.shop-resource-card').forEach((card) => {
                const shouldShow = selectedField === 'all-fields' || card.dataset.field === selectedField;
                card.classList.toggle('hidden', !shouldShow);
            });
        }

        function renderShopResources(force = false) {
            const inventory = getAdminInventory();
            const snapshot = inventory ? JSON.stringify(inventory) : 'server-rendered';
            if (!force && snapshot === lastInventorySnapshot) return;
            lastInventorySnapshot = snapshot;
            const products = getShopProducts();
            if (!shopResourceGrid) return;
            shopResourceGrid.innerHTML = products.length
                ? products.map(shopProductCard).join('')
                : `<div class="glass-panel rounded-2xl p-8 text-center text-on-surface-variant md:col-span-2 xl:col-span-4">
                    <span class="material-symbols-outlined mb-3 text-5xl text-primary">inventory_2</span>
                    <h3 class="font-headline text-2xl text-on-surface">No published products yet</h3>
                    <p class="mt-2">Products published from the admin inventory will appear here in real time.</p>
                </div>`;
            applyShopFieldFilter();
        }

        shopResourceGrid?.addEventListener('click', (event) => {
            const previewButton = event.target.closest('.shop-resource-preview');
            const addCartButton = event.target.closest('.shop-resource-add');
            if (previewButton) {
                const addButton = previewButton.closest('article').querySelector('.shop-resource-add');
                openShopPreview({
                    id: addButton.dataset.productId,
                    title: previewButton.dataset.productTitle,
                    type: previewButton.dataset.productType,
                    meta: `${previewButton.dataset.productType} Resource`,
                    price: previewButton.dataset.productPrice,
                    copy: previewButton.dataset.productCopy,
                    rating: previewButton.dataset.productRating,
                    downloads: previewButton.dataset.productDownloads,
                    grade: previewButton.dataset.productGrade,
                    format: previewButton.dataset.productFormat,
                    focus: previewButton.dataset.productFocus,
                    includes: previewButton.dataset.productIncludes,
                    image: previewButton.dataset.productImage,
                });
            }

            if (addCartButton) {
                addProductToCart({
                    id: addCartButton.dataset.productId,
                    title: addCartButton.dataset.productTitle,
                    meta: addCartButton.dataset.productMeta,
                    price: addCartButton.dataset.productPrice,
                    image: addCartButton.dataset.productImage,
                });
            }
        });

        document.getElementById('shop-preview-close')?.addEventListener('click', closeShopPreview);
        document.getElementById('shop-preview-modal')?.addEventListener('click', (event) => {
            if (event.target.id === 'shop-preview-modal') closeShopPreview();
        });
        document.getElementById('shop-preview-add')?.addEventListener('click', () => {
            if (!previewProduct) return;
            addProductToCart(previewProduct);
            closeShopPreview();
        });

        document.querySelectorAll('.shop-field-filter').forEach((button) => {
            button.addEventListener('click', () => {
                const selectedField = button.dataset.field;

                document.querySelectorAll('.shop-field-filter').forEach((filter) => {
                    const active = filter === button;
                    filter.classList.toggle('bg-primary', active);
                    filter.classList.toggle('text-on-primary', active);
                    filter.classList.toggle('shadow-lg', active);
                    filter.classList.toggle('shadow-primary/20', active);
                    filter.classList.toggle('text-on-surface-variant', !active);
                    filter.classList.toggle('hover:bg-surface-variant/30', !active);
                });

                applyShopFieldFilter();
            });
        });

        renderShopResources(true);
        updateCartCount();
        window.addEventListener('storage', (event) => {
            if (event.key === cartStorageKey) updateCartCount();
            if (event.key === inventoryStorageKey || event.key === `${inventoryStorageKey}Initialized`) renderShopResources(true);
        });
        setInterval(() => renderShopResources(false), 1000);
        window.addEventListener('pageshow', updateCartCount);
    </script>
    @include('partials.auth-ui')
</body>
</html>
