<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>iLearn Science - Blog</title>
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
                        'surface-variant': '#32353c',
                        primary: '#a8e8ff',
                        'primary-container': '#00d4ff',
                        tertiary: '#e6d8ff',
                        'tertiary-fixed-dim': '#d1bcff',
                        'on-primary': '#003642',
                        'on-surface': '#e1e2eb',
                        'on-surface-variant': '#bbc9cf',
                    },
                    fontFamily: {
                        headline: ['Sora', 'sans-serif'],
                        body: ['Plus Jakarta Sans', 'sans-serif'],
                        label: ['JetBrains Mono', 'monospace'],
                    },
                    spacing: {
                        'container-max': '1280px',
                        gutter: '24px',
                    },
                },
            },
        };
    </script>
    <style>
        body {
            background:
                radial-gradient(circle at 14% 8%, rgba(0, 212, 255, .14), transparent 34%),
                radial-gradient(circle at 88% 18%, rgba(209, 188, 255, .13), transparent 36%),
                linear-gradient(135deg, #0b0e14 0%, #10131a 50%, #151827 100%);
            color: #e1e2eb;
            overflow-x: hidden;
        }

        .glass-panel {
            background: rgba(25, 28, 34, .58);
            border: 1px solid rgba(168, 232, 255, .13);
            box-shadow: 0 18px 50px rgba(0, 0, 0, .24);
            backdrop-filter: blur(16px);
        }

        .science-grid {
            background-image:
                linear-gradient(rgba(168, 232, 255, .045) 1px, transparent 1px),
                linear-gradient(90deg, rgba(168, 232, 255, .045) 1px, transparent 1px);
            background-size: 56px 56px;
        }

        .glow-hover {
            transition: transform .22s ease, border-color .22s ease, box-shadow .22s ease;
        }

        .glow-hover:hover {
            border-color: rgba(60, 215, 255, .5);
            box-shadow: 0 0 26px rgba(60, 215, 255, .2);
            transform: translateY(-3px);
        }

        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
    </style>
</head>
<body class="font-body antialiased">
    <div class="pointer-events-none fixed inset-0 z-0 science-grid opacity-70"></div>
    <div class="pointer-events-none fixed inset-0 z-0 overflow-hidden">
        <div class="absolute left-[8%] top-[18%] h-44 w-72 rounded-full border border-primary/15 rotate-[-18deg]"></div>
        <div class="absolute right-[10%] top-[12%] h-64 w-64 rounded-full border border-tertiary/15 rotate-12"></div>
        <div class="absolute left-[18%] top-[36%] h-2 w-2 rounded-full bg-primary-container shadow-[0_0_16px_#00d4ff]"></div>
        <div class="absolute right-[26%] top-[28%] h-2 w-2 rounded-full bg-tertiary shadow-[0_0_16px_#e6d8ff]"></div>
    </div>

    <header class="sticky top-0 z-50 border-b border-primary/10 bg-surface/75 backdrop-blur-2xl">
        <nav class="mx-auto flex max-w-container-max items-center justify-between gap-4 px-4 py-4 lg:px-8">
            <a class="flex items-center gap-3" href="{{ route('home') }}">
                <img alt="iLearn Science Logo" class="h-11 w-11 rounded-full border border-primary/20 object-contain shadow-[0_0_16px_rgba(60,215,255,.2)]" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBRlFDOjxkn2sD8rhXX_C9oZtkMTA0F2zIbuZyG9wIVQvasApaG3RmYgyG2Pvp2jL5OiIRqxkIx75Tsq4ci10yb8-EExxTPy1tjBBGxv1_B3mcIr9zJxx3s_rlbkerqWnrBAlY0nMbog5hJGyrtHKkEW2ogz66o1R7h0OAPWRoU3Y4Dy9K6RZJItpyPL-ZXT9Xn5m73Ru9ye9BaZqOLXhg7JJvqaSDws24wBFWt5ncypHJMLUZ0mtJgObLNXtQbZinBc0Bg4jGSDVg">
                <span class="font-headline text-xl font-bold text-primary md:text-2xl">iLearn Science</span>
            </a>
            <div class="flex items-center gap-2">
                <a class="rounded-xl border border-primary/20 px-4 py-2 font-label text-sm text-primary transition-all hover:bg-primary/10" href="{{ route('home') }}">Home</a>
                <a class="rounded-xl border border-primary/20 px-4 py-2 font-label text-sm text-primary transition-all hover:bg-primary/10" href="{{ route('shop') }}">Resources</a>
                <a class="rounded-xl bg-primary-container px-4 py-2 font-label text-sm font-bold text-on-primary shadow-[0_0_18px_rgba(0,212,255,.3)]" href="{{ route('blog') }}">Blog</a>
                <a class="relative rounded-xl border border-primary/20 px-4 py-2 font-label text-sm text-primary transition-all hover:bg-primary/10" href="{{ route('cart') }}">
                    <span class="material-symbols-outlined align-middle text-[18px]">shopping_cart</span>
                    <span class="absolute -right-2 -top-2 flex h-5 min-w-5 items-center justify-center rounded-full bg-primary-container px-1 font-label text-[10px] font-bold text-on-primary" data-cart-count>0</span>
                </a>
                <div data-auth-mount class="flex items-center gap-2"></div>
            </div>
        </nav>
    </header>

    <main class="relative z-10 mx-auto max-w-container-max px-4 py-10 lg:px-8">
        <section class="grid grid-cols-1 gap-8 lg:grid-cols-[1.05fr_.95fr] lg:items-center">
            <div>
                <p class="font-label text-xs uppercase tracking-[0.36em] text-primary">Customer Reading Hub</p>
                <h1 class="mt-4 font-headline text-4xl font-extrabold leading-tight text-on-surface md:text-6xl">Science teaching ideas, classroom guides, and resource spotlights.</h1>
                <p class="mt-5 max-w-2xl text-lg leading-8 text-on-surface-variant">Read practical science articles made for teachers, students, and parents. Blog management and publishing tools stay private inside the admin dashboard.</p>
                <div class="mt-7 flex flex-wrap gap-3">
                    <a class="rounded-xl bg-primary-container px-5 py-3 font-label text-sm font-bold text-on-primary shadow-[0_0_20px_rgba(0,212,255,.32)] transition-all hover:scale-[1.02]" href="#latest-posts">Read Latest Posts</a>
                    <a class="rounded-xl border border-primary/35 px-5 py-3 font-label text-sm text-primary transition-all hover:bg-primary/10" href="{{ route('shop') }}">Explore Resources</a>
                </div>
            </div>
            <article class="glass-panel overflow-hidden rounded-3xl">
                <img alt="Students exploring science resources" class="h-80 w-full object-cover opacity-80" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDeA7aDCt1BhhNA6WQB-EGoUJittQ_zWiHMhgO7UPQFu7ewJlQywHQ2i9svSlMorENGTB4OXPPtG55T78teaOLzwgFzwc-rXcBlrY9S7EriKVyoAMS_0W1w8Bm-UMKPwrjdaX4C3T5Y8jMLETbi5n1naMUsffVmwTf3I2gaYr3_wzuw5_glmvYgGz7MSRbhMdOTObD3QzMyx02dZ4UVVpX67_pEhFd3iPZcf5NVpVESqINm3KdWCrlz5nViUL_8oe1G-y2p3r4ur3I">
                <div class="p-6">
                    <span class="inline-flex rounded-full border border-primary/25 bg-primary-container/10 px-3 py-1 font-label text-xs text-primary">Featured</span>
                    <h2 class="mt-4 font-headline text-2xl font-bold">How to Turn Digital Science Resources Into Active Learning Missions</h2>
                    <p class="mt-3 text-on-surface-variant">A practical guide for using presentations, worksheets, quizzes, and visuals as one connected classroom experience.</p>
                </div>
            </article>
        </section>

        <section id="latest-posts" class="mt-14">
            <div class="mb-6 flex flex-col justify-between gap-3 md:flex-row md:items-end">
                <div>
                    <p class="font-label text-xs uppercase tracking-[0.3em] text-primary">Latest Posts</p>
                    <h2 class="mt-2 font-headline text-3xl font-bold">Latest Science Articles</h2>
                </div>
            </div>

            @php
                $posts = [
                    ['Digestive System Lessons That Students Can Actually Visualize', 'Use diagrams, model cards, and quick checks to help students follow food as it moves through the human body.', 'Biology', '6 min read', 'https://lh3.googleusercontent.com/aida-public/AB6AXuDAukcxKIeiLZnlciZdGHXQXy4iKMk5x-tGgi6TFF9Sfe2xAbJvYHL-ZC8QnE7ffN8aNYOAezSH0Tj97sk_N4jSWS0Fi-fLIIOe_GEcsQDy-Q3Git7Zsvv9jd-3aksYLZm4n_e9Nwev_zdKaEgIZetNpoYFBQIvs1CsSN9Rj8uZXbmpC3w1SXnltKVlUgxzOY6l7SiVFE5VBWD9mn3M13-GXtO6fWm6DG_Z3oeCsZ474bR-1i29uZ1PURiMSTDrjBNPKGoExuy-MHk'],
                    ['Teaching Heredity With Simple Family Trait Simulations', 'Make inheritance patterns easier to discuss with student-friendly trait cards and classroom scenarios.', 'Genetics', '5 min read', 'https://lh3.googleusercontent.com/aida-public/AB6AXuAZBMYNDXcOHEDnSv8aUbarKS9z-gDUK5nWzUl-CE8CXF46HW-YUafVsOhoheg7FBjLs_Bu2Nkx2TEX7j6aTlh85EHlCOL4bSFOinoye7AP0K7l3SiDtKSzlnbZ4wgnJmHGgD5VUBCGCg-8_Y1I1yvzgDA25FyHS9ffdzzyjNwvuHMwOCs8EXmuTh_vAh5XKS53qMlrryJ9EuJkOnUyBI9ZeOmusks8xeXrdgP2xMgSh4uV6F0bOXrD4rRjAFQXk1Rs3a8C7zF4bmE'],
                    ['Pedigree Analysis Without the Confusion', 'Break down symbols, generations, and inheritance clues with guided practice before asking students to solve full charts.', 'Pedigree', '7 min read', 'https://lh3.googleusercontent.com/aida-public/AB6AXuBKTBt6pOG_oR9_PrrKIpbcl5bWp3Km6Z9QNHKDnhIU5Qsi4nC-HiqCsvdRmbwXlwS9xysRhI8s-c4Gg-_LtQnBqhghcnSQCbobGiYYD9293s0YrazwPXqNDDon_WTSxliVzR6z0nTmoL5zQCZklDFfNKKRhbjsJrlV7tE4Qu5wQBbTBixZ_awI0rpnkAx7HDP3ezU5PjrKhBnki1FbrcELjPIDb_hkgFIm-tAUJ4oDQyU5GaSk1WJP6nTyndR3RHV0wEMSOWBWnK8'],
                    ['Photosynthesis as a Process, Not a Memorized Formula', 'Help students connect light, carbon dioxide, water, glucose, and oxygen through visual sequencing.', 'Plants', '4 min read', 'https://lh3.googleusercontent.com/aida-public/AB6AXuCZqPnlOImXT-X3JSkUcj1inXa0nyODU81pWrk3Qsz4lN830sVyP4r-j99noc9-1tsqULyNQ2MNR9n8gmocKP7jIW5luqMLbWR7J9V4WZD_2LFcdXfF-oAFUGZgUwerTDHYWKMj7ARWOK9HaUO_RBI7QoQjEpPqCWrFSTDelyh8zKjvIVkJacxOUmk2Uve77wbXkjHKCtO3Unzyjls-z6g6CpGIWXFLJfOetopIFi9YX8yZDVsbKUh7wJp_eHlsOkvfCcU-LQ2vW-c'],
                ];
            @endphp

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-4" id="public-blog-grid">
                @foreach ($posts as [$title, $summary, $tag, $time, $image])
                    <article class="glass-panel glow-hover overflow-hidden rounded-3xl">
                        <img alt="{{ $title }}" class="h-44 w-full object-cover opacity-85" src="{{ $image }}">
                        <div class="p-5">
                            <div class="flex items-center justify-between gap-3">
                                <span class="rounded-full border border-primary/25 bg-primary-container/10 px-3 py-1 font-label text-[11px] text-primary">{{ $tag }}</span>
                                <span class="font-label text-[11px] text-on-surface-variant">{{ $time }}</span>
                            </div>
                            <h3 class="mt-4 font-headline text-xl font-bold text-on-surface">{{ $title }}</h3>
                            <p class="mt-3 text-sm leading-6 text-on-surface-variant">{{ $summary }}</p>
                            <button class="mt-5 inline-flex items-center gap-2 font-label text-sm text-primary" type="button">
                                Read Article
                                <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                            </button>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>
    </main>

    <div class="fixed inset-0 z-[70] hidden items-center justify-center bg-surface-container-lowest/70 p-4 backdrop-blur-xl" id="blog-reader-modal">
        <article class="glass-panel max-h-[90vh] w-full max-w-3xl overflow-y-auto rounded-3xl">
            <img alt="" class="h-64 w-full object-cover opacity-85" id="blog-reader-image" src="">
            <div class="p-6 md:p-8">
                <div class="mb-4 flex items-center justify-between gap-4">
                    <span class="rounded-full border border-primary/25 bg-primary-container/10 px-3 py-1 font-label text-xs text-primary" id="blog-reader-category"></span>
                    <button class="rounded-full border border-primary/20 p-2 text-primary transition-all hover:bg-primary/10" id="blog-reader-close" type="button">
                        <span class="material-symbols-outlined">close</span>
                    </button>
                </div>
                <h2 class="font-headline text-3xl font-bold text-on-surface" id="blog-reader-title"></h2>
                <p class="mt-3 font-label text-xs text-on-surface-variant" id="blog-reader-time"></p>
                <div class="mt-6 whitespace-pre-line text-base leading-8 text-on-surface-variant" id="blog-reader-content"></div>
            </div>
        </article>
    </div>

    <script>
        const cartStorageKey = 'ilearnScienceCartItems';
        const blogStorageKey = 'ilearnScienceBlogPosts';
        const blogInitializedKey = 'ilearnScienceBlogPostsInitialized';
        const blogsEndpoint = '{{ route('blogs.index') }}';
        const blogSyncChannel = 'BroadcastChannel' in window ? new BroadcastChannel('ilearn-blog-sync') : null;
        const defaultBlogImage = 'https://lh3.googleusercontent.com/aida-public/AB6AXuDeA7aDCt1BhhNA6WQB-EGoUJittQ_zWiHMhgO7UPQFu7ewJlQywHQ2i9svSlMorENGTB4OXPPtG55T78teaOLzwgFzwc-rXcBlrY9S7EriKVyoAMS_0W1w8Bm-UMKPwrjdaX4C3T5Y8jMLETbi5n1naMUsffVmwTf3I2gaYr3_wzuw5_glmvYgGz7MSRbhMdOTObD3QzMyx02dZ4UVVpX67_pEhFd3iPZcf5NVpVESqINm3KdWCrlz5nViUL_8oe1G-y2p3r4ur3I';
        const fallbackBlogPosts = [
            {
                id: 'fallback-digestive',
                title: 'Digestive System Lessons That Students Can Actually Visualize',
                meta: 'Use diagrams, model cards, and quick checks to help students follow food as it moves through the human body.',
                content: 'Use diagrams, model cards, and quick checks to help students follow food as it moves through the human body. The strongest digestive system lessons help students connect each organ to a specific task, then sequence the whole process from ingestion to absorption.',
                category: 'Biology',
                status: 'Published',
                image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuDAukcxKIeiLZnlciZdGHXQXy4iKMk5x-tGgi6TFF9Sfe2xAbJvYHL-ZC8QnE7ffN8aNYOAezSH0Tj97sk_N4jSWS0Fi-fLIIOe_GEcsQDy-Q3Git7Zsvv9jd-3aksYLZm4n_e9Nwev_zdKaEgIZetNpoYFBQIvs1CsSN9Rj8uZXbmpC3w1SXnltKVlUgxzOY6l7SiVFE5VBWD9mn3M13-GXtO6fWm6DG_Z3oeCsZ474bR-1i29uZ1PURiMSTDrjBNPKGoExuy-MHk',
                publishedAt: new Date().toISOString(),
            },
            {
                id: 'fallback-heredity',
                title: 'Teaching Heredity With Simple Family Trait Simulations',
                meta: 'Make inheritance patterns easier to discuss with student-friendly trait cards and classroom scenarios.',
                content: 'Make inheritance patterns easier to discuss with student-friendly trait cards and classroom scenarios. Students can model dominant and recessive traits, compare predicted outcomes, and explain why siblings can look different even with the same parents.',
                category: 'Genetics',
                status: 'Published',
                image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuAZBMYNDXcOHEDnSv8aUbarKS9z-gDUK5nWzUl-CE8CXF46HW-YUafVsOhoheg7FBjLs_Bu2Nkx2TEX7j6aTlh85EHlCOL4bSFOinoye7AP0K7l3SiDtKSzlnbZ4wgnJmHGgD5VUBCGCg-8_Y1I1yvzgDA25FyHS9ffdzzyjNwvuHMwOCs8EXmuTh_vAh5XKS53qMlrryJ9EuJkOnUyBI9ZeOmusks8xeXrdgP2xMgSh4uV6F0bOXrD4rRjAFQXk1Rs3a8C7zF4bmE',
                publishedAt: new Date().toISOString(),
            },
            {
                id: 'fallback-pedigree',
                title: 'Pedigree Analysis Without the Confusion',
                meta: 'Break down symbols, generations, and inheritance clues with guided practice before asking students to solve full charts.',
                content: 'Break down symbols, generations, and inheritance clues with guided practice before asking students to solve full charts. Start with one family line, identify affected individuals, then ask students to justify the most likely inheritance pattern.',
                category: 'Pedigree',
                status: 'Published',
                image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuBKTBt6pOG_oR9_PrrKIpbcl5bWp3Km6Z9QNHKDnhIU5Qsi4nC-HiqCsvdRmbwXlwS9xysRhI8s-c4Gg-_LtQnBqhghcnSQCbobGiYYD9293s0YrazwPXqNDDon_WTSxliVzR6z0nTmoL5zQCZklDFfNKKRhbjsJrlV7tE4Qu5wQBbTBixZ_awI0rpnkAx7HDP3ezU5PjrKhBnki1FbrcELjPIDb_hkgFIm-tAUJ4oDQyU5GaSk1WJP6nTyndR3RHV0wEMSOWBWnK8',
                publishedAt: new Date().toISOString(),
            },
            {
                id: 'fallback-photosynthesis',
                title: 'Photosynthesis as a Process, Not a Memorized Formula',
                meta: 'Help students connect light, carbon dioxide, water, glucose, and oxygen through visual sequencing.',
                content: 'Help students connect light, carbon dioxide, water, glucose, and oxygen through visual sequencing. A process-first approach lets students explain what enters the plant, what changes inside the leaf, and why glucose matters for growth.',
                category: 'Plants',
                status: 'Published',
                image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuCZqPnlOImXT-X3JSkUcj1inXa0nyODU81pWrk3Qsz4lN830sVyP4r-j99noc9-1tsqULyNQ2MNR9n8gmocKP7jIW5luqMLbWR7J9V4WZD_2LFcdXfF-oAFUGZgUwerTDHYWKMj7ARWOK9HaUO_RBI7QoQjEpPqCWrFSTDelyh8zKjvIVkJacxOUmk2Uve77wbXkjHKCtO3Unzyjls-z6g6CpGIWXFLJfOetopIFi9YX8yZDVsbKUh7wJp_eHlsOkvfCcU-LQ2vW-c',
                publishedAt: new Date().toISOString(),
            },
        ];

        function escapeHtml(value) {
            return String(value || '').replace(/[&<>"']/g, (character) => ({
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#039;',
            }[character]));
        }

        function readBlogPosts() {
            try {
                const saved = JSON.parse(localStorage.getItem(blogStorageKey) || '[]');
                const initialized = localStorage.getItem(blogInitializedKey) === 'true';
                if (Array.isArray(saved) && initialized) return saved;
            } catch {}
            return fallbackBlogPosts;
        }

        function saveLiveBlogPosts(posts, shouldRender = true) {
            localStorage.setItem(blogStorageKey, JSON.stringify(posts));
            localStorage.setItem(blogInitializedKey, 'true');
            if (shouldRender) renderPublicBlogPosts();
        }

        async function refreshBlogPostsFromServer() {
            try {
                const response = await fetch(blogsEndpoint, { headers: { Accept: 'application/json' } });
                if (!response.ok) throw new Error('Unable to load live blog posts.');
                const data = await response.json();
                if (Array.isArray(data.posts)) saveLiveBlogPosts(data.posts);
            } catch (error) {
                console.error(error);
            }
        }

        function readMinutes(post) {
            const words = String(post.content || post.meta || '').trim().split(/\s+/).filter(Boolean).length;
            return `${Math.max(2, Math.ceil(words / 180))} min read`;
        }

        function renderPublicBlogPosts() {
            const grid = document.getElementById('public-blog-grid');
            if (!grid) return;
            const published = readBlogPosts()
                .filter((post) => post.status === 'Published')
                .sort((a, b) => new Date(b.publishedAt || b.updatedAt || 0) - new Date(a.publishedAt || a.updatedAt || 0));

            if (!published.length) {
                grid.innerHTML = `
                    <div class="glass-panel rounded-3xl p-8 text-center md:col-span-2 xl:col-span-4">
                        <p class="font-headline text-2xl text-primary">No published posts yet</p>
                        <p class="mt-2 text-on-surface-variant">New articles will appear here after the admin publishes them.</p>
                    </div>
                `;
                return;
            }

            grid.innerHTML = published.map((post) => `
                <article class="glass-panel glow-hover overflow-hidden rounded-3xl">
                    <img alt="${escapeHtml(post.title)}" class="h-44 w-full object-cover opacity-85" src="${escapeHtml(post.image || defaultBlogImage)}">
                    <div class="p-5">
                        <div class="flex items-center justify-between gap-3">
                            <span class="rounded-full border border-primary/25 bg-primary-container/10 px-3 py-1 font-label text-[11px] text-primary">${escapeHtml(post.category || 'Science')}</span>
                            <span class="font-label text-[11px] text-on-surface-variant">${readMinutes(post)}</span>
                        </div>
                        <h3 class="mt-4 font-headline text-xl font-bold text-on-surface">${escapeHtml(post.title)}</h3>
                        <p class="mt-3 text-sm leading-6 text-on-surface-variant">${escapeHtml(post.meta || String(post.content || '').slice(0, 140))}</p>
                        <button class="mt-5 inline-flex items-center gap-2 font-label text-sm text-primary" type="button" data-read-blog="${escapeHtml(post.id)}">
                            Read Article
                            <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                        </button>
                    </div>
                </article>
            `).join('');
        }

        function openBlogReader(post) {
            document.getElementById('blog-reader-image').src = post.image || defaultBlogImage;
            document.getElementById('blog-reader-image').alt = post.title || 'Blog post image';
            document.getElementById('blog-reader-category').textContent = post.category || 'Science';
            document.getElementById('blog-reader-title').textContent = post.title || 'Untitled Post';
            document.getElementById('blog-reader-time').textContent = readMinutes(post);
            document.getElementById('blog-reader-content').textContent = post.content || post.meta || '';
            document.getElementById('blog-reader-modal').classList.remove('hidden');
            document.getElementById('blog-reader-modal').classList.add('flex');
        }

        function updateBlogCartBadges() {
            let items = [];
            const signedIn = window.iLearnAuth?.isSignedIn ? window.iLearnAuth.isSignedIn() : false;
            if (signedIn && window.iLearnAuth?.getCartItems) {
                items = window.iLearnAuth.getCartItems();
            } else if (signedIn) {
                try { items = JSON.parse(localStorage.getItem(cartStorageKey) || '[]') || []; } catch {}
            }
            const count = items.reduce((sum, item) => sum + (Number(item.quantity) || 1), 0);
            document.querySelectorAll('[data-cart-count]').forEach((badge) => {
                badge.textContent = count;
                badge.classList.toggle('hidden', !signedIn);
            });
        }
        updateBlogCartBadges();
        renderPublicBlogPosts();
        refreshBlogPostsFromServer();

        document.getElementById('public-blog-grid').addEventListener('click', (event) => {
            const button = event.target.closest('[data-read-blog]');
            if (!button) return;
            const post = readBlogPosts().find((item) => item.id === button.dataset.readBlog);
            if (post) openBlogReader(post);
        });

        document.getElementById('blog-reader-close').addEventListener('click', () => {
            document.getElementById('blog-reader-modal').classList.add('hidden');
            document.getElementById('blog-reader-modal').classList.remove('flex');
        });

        document.getElementById('blog-reader-modal').addEventListener('click', (event) => {
            if (event.target.id === 'blog-reader-modal') {
                document.getElementById('blog-reader-modal').classList.add('hidden');
                document.getElementById('blog-reader-modal').classList.remove('flex');
            }
        });

        window.addEventListener('storage', (event) => {
            if (event.key === cartStorageKey) updateBlogCartBadges();
            if (event.key === blogStorageKey) renderPublicBlogPosts();
        });
        window.addEventListener('ilearn:cart-updated', updateBlogCartBadges);
        window.addEventListener('ilearn:blogs-updated', (event) => {
            if (Array.isArray(event.detail?.posts)) saveLiveBlogPosts(event.detail.posts);
            else renderPublicBlogPosts();
        });
        blogSyncChannel?.addEventListener('message', (event) => {
            if (event.data?.type === 'blogs-updated' && Array.isArray(event.data.posts)) {
                saveLiveBlogPosts(event.data.posts);
            }
        });
        window.setInterval(refreshBlogPostsFromServer, 5000);
    </script>
    @include('partials.auth-ui')
</body>
</html>
