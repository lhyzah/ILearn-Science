<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>iLearn Science - Mission Control Dashboard</title>
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
                        'secondary-fixed': '#74f5ff',
                        'primary-container': '#00d4ff',
                        'surface-container-highest': '#32353c',
                        'on-surface': '#e1e2eb',
                        secondary: '#ddfcff',
                        'tertiary-fixed': '#e9ddff',
                        'surface-dim': '#10131a',
                        outline: '#859398',
                        'surface-container-high': '#272a31',
                        error: '#ffb4ab',
                        'on-primary-container': '#00586b',
                        'on-surface-variant': '#bbc9cf',
                        surface: '#10131a',
                        'surface-container-low': '#191c22',
                        'surface-variant': '#32353c',
                        'surface-container': '#1d2026',
                    },
                    spacing: {
                        gutter: '24px',
                        'margin-desktop': '48px',
                        'container-max': '1280px',
                    },
                    fontFamily: {
                        'headline': ['Sora', 'sans-serif'],
                        'body': ['Plus Jakarta Sans', 'sans-serif'],
                        'label': ['JetBrains Mono', 'monospace'],
                    },
                },
            },
        };
    </script>
    <style>
        body {
            background-attachment: fixed;
            background-color: #10131a;
            background-image:
                radial-gradient(circle at 20% 30%, rgba(0, 212, 255, 0.05) 0%, transparent 40%),
                radial-gradient(circle at 80% 70%, rgba(168, 232, 255, 0.05) 0%, transparent 40%);
        }

        .glass-panel {
            background: rgba(25, 28, 34, 0.6);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease, border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .glow-hover:hover {
            border-color: rgba(168, 232, 255, 0.4);
            box-shadow: 0 0 15px rgba(168, 232, 255, 0.3);
        }

        .active-glow {
            box-shadow: 0 0 15px rgba(0, 212, 255, 0.2);
        }

        .orb-progress {
            height: 48px;
            position: relative;
            width: 48px;
        }

        .orb-dot {
            animation: rotate-orb 4s linear infinite;
            background: #00d4ff;
            border-radius: 9999px;
            box-shadow: 0 0 10px #00d4ff;
            height: 6px;
            position: absolute;
            width: 6px;
        }

        .custom-scrollbar::-webkit-scrollbar {
            width: 4px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #32353c;
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #00d4ff;
        }

        @keyframes rotate-orb {
            0% { transform: rotate(0deg) translateX(24px) rotate(0deg); }
            100% { transform: rotate(360deg) translateX(24px) rotate(-360deg); }
        }
    </style>
</head>
<body class="custom-scrollbar font-body text-on-surface antialiased">
    <header class="fixed top-0 z-50 flex h-16 w-full items-center justify-between border-b border-white/10 bg-surface-dim/80 px-4 shadow-[0_0_15px_rgba(168,232,255,0.1)] backdrop-blur-xl md:px-margin-desktop">
        <a class="flex items-center gap-3 transition-transform hover:scale-[1.02] active:scale-95" href="{{ route('home') }}" aria-label="Go to iLearn Science home page">
            <img loading="lazy" decoding="async" alt="iLearn Science Logo" class="h-11 w-11 rounded-full border border-primary/20 object-contain shadow-[0_0_12px_rgba(60,215,255,0.25)]" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBRlFDOjxkn2sD8rhXX_C9oZtkMTA0F2zIbuZyG9wIVQvasApaG3RmYgyG2Pvp2jL5OiIRqxkIx75Tsq4ci10yb8-EExxTPy1tjBBGxv1_B3mcIr9zJxx3s_rlbkerqWnrBAlY0nMbog5hJGyrtHKkEW2ogz66o1R7h0OAPWRoU3Y4Dy9K6RZJItpyPL-ZXT9Xn5m73Ru9ye9BaZqOLXhg7JJvqaSDws24wBFWt5ncypHJMLUZ0mtJgObLNXtQbZinBc0Bg4jGSDVg">
            <span class="font-headline text-2xl font-bold tracking-tight text-primary">iLearn Science</span>
        </a>
        <div class="flex items-center gap-6">
            <div class="group relative hidden md:block">
                <input class="w-64 rounded-full border border-white/10 bg-surface-container-low px-4 py-1.5 text-sm text-on-surface placeholder:text-on-surface-variant/50 transition-all focus:outline-none focus:ring-1 focus:ring-primary-container/50" placeholder="Search mission control..." type="text">
                <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-on-surface-variant">search</span>
            </div>
            <button class="material-symbols-outlined text-on-surface-variant transition-colors hover:text-primary">notifications</button>
            <div class="flex items-center gap-3 border-l border-white/10 pl-4">
                <div class="hidden text-right sm:block">
                    <p class="font-label text-sm text-primary">Dr. Nova</p>
                    <p class="font-label text-[10px] text-on-surface-variant">CHIEF EXPLORER</p>
                </div>
                <div class="h-10 w-10 overflow-hidden rounded-full border border-primary-container/30">
                    <img loading="lazy" decoding="async" alt="Profile" class="h-full w-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD3XNKjUJ7YMCovYbY9ONdXA4LRDTjeEpLYTkl1xLQsVawE48iHsZFhGCIqzz10uXm8mhrWX8hjM_yp_U4pyAFsVK3Xv3csT4gy0fLx6lXr8U8EB0J-yBj2FCFF5Q-BcVb-T64N6atCbVUW4BFiKxzr3Ix2bptXvH1qjsaa86ROrU2VXToku2_oX8PtfC3TNDLOBUX-tOYN9furyFw27MbTbvQ8fLzMx9V9sw-2rChwzbvt2n5UKlw1XKGIfwuWO6wsIMfTUcZ2O2g">
                </div>
            </div>
        </div>
    </header>

    <div class="flex pt-16">
        <nav class="fixed left-0 top-16 hidden h-[calc(100vh-64px)] w-64 flex-col gap-2 border-r border-white/10 bg-surface-container-low/60 py-6 shadow-2xl backdrop-blur-md md:flex">
            <div class="mb-6 px-6">
                <h3 class="font-label text-sm uppercase tracking-widest text-primary">Mission Control</h3>
                <p class="font-label text-[10px] text-on-surface-variant">BLOG ADMINISTRATOR</p>
            </div>

            @foreach ([
                ['dashboard', 'Dashboard', true],
                ['shopping_cart', 'Shop Resources', false],
                ['article', 'Blog Posts', false],
                ['category', 'Categories', false],
                ['perm_media', 'Media Library', false],
                ['forum', 'Comments', false],
                ['leaderboard', 'Analytics', false],
            ] as [$icon, $label, $active])
                <a class="mx-4 flex items-center gap-3 rounded-xl px-4 py-3 transition-all {{ $active ? 'border-r-4 border-primary-container bg-primary-container/20 text-primary shadow-[0_0_10px_rgba(0,212,255,0.3)]' : 'text-on-surface-variant hover:bg-surface-variant/30 hover:text-primary' }}" href="{{ $label === 'Shop Resources' ? route('shop') : '#' }}">
                    <span class="material-symbols-outlined">{{ $icon }}</span>
                    <span class="font-label text-sm">{{ $label }}</span>
                </a>
            @endforeach

            <div class="mt-auto px-4">
                <a class="flex items-center gap-3 rounded-xl px-4 py-3 text-on-surface-variant transition-all hover:bg-surface-variant/30 hover:text-primary" href="#">
                    <span class="material-symbols-outlined">settings</span>
                    <span class="font-label text-sm">Settings</span>
                </a>
                <button class="mt-4 flex w-full items-center justify-center gap-2 rounded-xl bg-primary-container py-3 font-headline font-bold text-on-primary-container transition-all hover:shadow-[0_0_20px_rgba(0,212,255,0.5)] active:scale-95" data-blog-new>
                    <span class="material-symbols-outlined">add_circle</span>
                    <span class="text-sm">New Post</span>
                </button>
            </div>
        </nav>

        <main class="mx-auto flex-1 p-gutter md:ml-64">
            @php
                $stats = [
                    ['TOTAL POSTS', '124', 'primary', 'inventory_2', [4, 6, 8, 5, 7]],
                    ['PUBLISHED', '118', 'secondary-fixed', 'task_alt', [3, 5, 8, 6, 4]],
                    ['DRAFTS', '6', 'tertiary-fixed', 'edit_note', [6, 4, 7, 3, 5]],
                    ['TOTAL VIEWS', '45.2k', 'primary-container', 'visibility', [2, 5, 4, 8, 6]],
                ];
            @endphp

            <section class="mb-gutter grid grid-cols-1 gap-gutter sm:grid-cols-2 lg:grid-cols-4">
                @foreach ($stats as [$label, $value, $color, $icon, $bars])
                    <article class="glass-panel glow-hover rounded-xl p-6">
                        <div class="mb-4 flex items-start justify-between">
                            <div>
                                <p class="font-label text-xs text-on-surface-variant">{{ $label }}</p>
                                <h2 class="font-headline text-3xl font-semibold text-{{ $color }}" data-blog-stat="{{ $label }}">{{ $value }}</h2>
                            </div>
                            <div class="rounded-lg bg-{{ $color }}/10 p-3 text-{{ $color }}">
                                <span class="material-symbols-outlined">{{ $icon }}</span>
                            </div>
                        </div>
                        <div class="flex h-8 items-end gap-1">
                            @foreach ($bars as $height)
                                <div class="flex-1 rounded-t-sm bg-{{ $color }}/30" style="height: {{ $height * 4 }}px"></div>
                            @endforeach
                        </div>
                    </article>
                @endforeach
            </section>

            <div class="mb-gutter grid grid-cols-1 gap-gutter lg:grid-cols-3">
                <section class="glass-panel rounded-xl p-6 lg:col-span-2">
                    <div class="mb-6 flex items-center justify-between">
                        <h3 class="font-headline text-2xl font-semibold">Recent Articles</h3>
                        <button class="flex items-center gap-1 font-label text-sm text-primary-container transition-all hover:underline">View All <span class="material-symbols-outlined text-sm">arrow_forward</span></button>
                    </div>
                    <div class="space-y-4" id="blog-post-list"></div>
                </section>

                <aside class="glass-panel rounded-xl p-6">
                    <h3 class="mb-6 font-headline text-2xl font-semibold">Blog Traffic</h3>
                    <div class="relative mb-6 flex h-48 w-full items-end justify-between gap-1">
                        <div class="pointer-events-none absolute inset-0 flex items-center justify-center opacity-20">
                            <span class="material-symbols-outlined text-[120px] text-primary-container">show_chart</span>
                        </div>
                        @foreach ([50, 67, 75, 50, 100, 67, 50] as $height)
                            <div class="flex-1 rounded-t-lg bg-primary-container/40" style="height: {{ $height }}%"></div>
                        @endforeach
                    </div>
                    <h4 class="mb-4 font-label text-sm uppercase tracking-widest text-primary">Trending Topics</h4>
                    <ul class="space-y-3">
                        @foreach ([['Quantum Computing', '+12%', 'primary'], ['Mars Colonization', '+8%', 'secondary-fixed'], ['AI in Healthcare', '+5%', 'tertiary-fixed']] as [$topic, $change, $color])
                            <li class="flex items-center justify-between">
                                <span class="flex items-center gap-2 text-on-surface-variant">
                                    <span class="h-1.5 w-1.5 rounded-full bg-{{ $color }} shadow-[0_0_5px_#00d4ff]"></span>
                                    {{ $topic }}
                                </span>
                                <span class="font-label text-xs text-primary-container">{{ $change }}</span>
                            </li>
                        @endforeach
                    </ul>
                </aside>
            </div>

            <section class="glass-panel mb-gutter overflow-hidden rounded-xl">
                <div class="flex flex-wrap items-center justify-between gap-4 border-b border-white/10 bg-surface-container-high/50 p-4">
                    <div class="flex items-center gap-2">
                        @foreach (['format_bold', 'format_italic', 'format_underlined', 'format_list_bulleted', 'format_list_numbered', 'link', 'image'] as $tool)
                            <button class="material-symbols-outlined rounded-lg p-2 transition-all hover:bg-white/5">{{ $tool }}</button>
                        @endforeach
                    </div>
                    <div class="flex items-center gap-4">
                        <span class="hidden rounded-full border border-primary/20 bg-primary-container/10 px-3 py-1 font-label text-[11px] text-primary" id="blog-editor-status"></span>
                        <button class="font-label text-sm text-on-surface-variant transition-all hover:text-on-surface" id="blog-save-draft">Save Draft</button>
                        <button class="rounded-lg bg-primary-container px-6 py-2 font-label text-sm font-bold text-on-primary-container shadow-lg transition-all active:scale-95" id="blog-publish">Publish Mission</button>
                    </div>
                </div>

                <div class="flex flex-col lg:flex-row">
                    <div class="min-h-[400px] flex-1 p-8">
                        <input class="mb-6 w-full border-none bg-transparent p-0 font-headline text-3xl text-primary-container placeholder:text-on-surface-variant/30 focus:ring-0" id="blog-title" placeholder="Enter post title..." type="text">
                        <textarea class="min-h-[300px] w-full resize-none border-none bg-transparent p-0 text-lg text-on-surface placeholder:text-on-surface-variant/30 focus:ring-0" id="blog-content" placeholder="Start your scientific exploration here..."></textarea>
                        <div class="group mt-8 cursor-pointer rounded-2xl border-2 border-dashed border-white/10 bg-white/5 p-8 text-center transition-all hover:border-primary-container/50" id="blog-visual-dropzone">
                            <input class="hidden" id="blog-visual-file" type="file" accept="image/png,image/jpeg,image/gif,image/webp">
                            <div class="hidden overflow-hidden rounded-xl border border-primary/20 bg-surface-container-high" id="blog-visual-preview-wrap">
                                <img loading="lazy" decoding="async" alt="Selected mission visual preview" class="h-56 w-full object-cover" id="blog-visual-preview" src="">
                            </div>
                            <div id="blog-visual-empty">
                                <span class="material-symbols-outlined mb-4 text-4xl text-on-surface-variant transition-colors group-hover:text-primary">cloud_upload</span>
                                <p class="font-label text-sm text-on-surface-variant">Drag and drop mission visuals or <span class="text-primary-container">browse files</span></p>
                                <p class="mt-2 font-label text-[10px] text-on-surface-variant/50">Supports PNG, JPG, GIF, WEBP (Max 10MB)</p>
                            </div>
                            <div class="mt-4 hidden items-center justify-center gap-3" id="blog-visual-actions">
                                <button class="rounded-lg border border-primary/30 px-4 py-2 font-label text-xs text-primary transition-all hover:bg-primary/10" id="blog-replace-visual" type="button">Replace Visual</button>
                                <button class="rounded-lg border border-error/30 px-4 py-2 font-label text-xs text-error transition-all hover:bg-error/10" id="blog-remove-visual" type="button">Remove</button>
                            </div>
                        </div>
                    </div>

                    <aside class="w-full border-l border-white/10 bg-surface-container-low/40 p-6 lg:w-80">
                        <h4 class="mb-6 flex items-center gap-2 font-label text-sm uppercase tracking-widest text-primary">
                            <span class="material-symbols-outlined text-sm">settings_suggest</span>
                            SEO Settings
                        </h4>
                        <div class="space-y-6">
                            <div>
                                <label class="mb-2 block font-label text-xs text-on-surface-variant">SLUG</label>
                                <div class="flex items-center rounded-lg border border-white/10 bg-surface-container-high px-3 py-2">
                                    <span class="text-[11px] text-on-surface-variant">/blog/</span>
                                    <input class="ml-1 flex-1 border-none bg-transparent p-0 font-label text-xs text-on-surface focus:ring-0" id="blog-slug" type="text" value="">
                                </div>
                            </div>
                            <div>
                                <label class="mb-2 block font-label text-xs text-on-surface-variant">META DESCRIPTION</label>
                                <textarea class="min-h-[100px] w-full rounded-lg border border-white/10 bg-surface-container-high p-3 font-label text-xs text-on-surface focus:outline-none focus:ring-1 focus:ring-primary-container" id="blog-meta" placeholder="Summary of the article for search engines..."></textarea>
                            </div>
                            <div>
                                <label class="mb-2 block font-label text-xs text-on-surface-variant">FEATURE IMAGE URL</label>
                                <input class="w-full rounded-lg border border-white/10 bg-surface-container-high p-3 font-label text-xs text-on-surface focus:outline-none focus:ring-1 focus:ring-primary-container" id="blog-image" placeholder="https://...">
                            </div>
                            <div>
                                <label class="mb-2 block font-label text-xs text-on-surface-variant">CATEGORY</label>
                                <select class="w-full appearance-none rounded-lg border border-white/10 bg-surface-container-high p-3 font-label text-xs text-on-surface focus:outline-none focus:ring-1 focus:ring-primary-container" id="blog-category">
                                    <option>Astronomy</option>
                                    <option>Biology</option>
                                    <option>Chemistry</option>
                                    <option>Physics</option>
                                    <option>Genetics</option>
                                    <option>Plants</option>
                                    <option>Teaching Guide</option>
                                </select>
                            </div>
                            <div class="flex items-center justify-between rounded-xl border border-primary-container/20 bg-primary-container/10 p-3">
                                <div>
                                    <p class="font-label text-xs text-primary">SEO Score</p>
                                    <p class="font-label text-[10px] text-primary/70">Optimization: High</p>
                                </div>
                                <div class="orb-progress">
                                    <div class="absolute inset-0 flex items-center justify-center text-[10px] font-bold text-primary">85%</div>
                                    <div class="h-full w-full rounded-full border-2 border-primary-container/20"></div>
                                    <div class="orb-dot"></div>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </section>
        </main>
    </div>

    <div class="fixed bottom-0 z-50 flex h-16 w-full items-center justify-around border-t border-white/10 bg-surface-dim/95 px-4 backdrop-blur-xl md:hidden">
        <button class="material-symbols-outlined active-glow text-primary-container">dashboard</button>
        <button class="material-symbols-outlined text-on-surface-variant">article</button>
        <div class="relative -top-6">
            <button class="flex h-12 w-12 items-center justify-center rounded-full bg-primary-container text-on-primary-container shadow-lg">
                <span class="material-symbols-outlined">add</span>
            </button>
        </div>
        <button class="material-symbols-outlined text-on-surface-variant">leaderboard</button>
        <button class="material-symbols-outlined text-on-surface-variant">settings</button>
    </div>

    <script>
        const blogStorageKey = 'ilearnScienceBlogPosts';
        const blogInitializedKey = 'ilearnScienceBlogPostsInitialized';
        const blogsEndpoint = '{{ route('blogs.index') }}';
        const blogSaveEndpoint = '{{ route('admin.blog-posts.save') }}';
        const blogDeleteEndpoint = '{{ url('/admin/blog-posts') }}';
        const adminCsrfToken = document.querySelector('meta[name="csrf-token"]')?.content || '';
        const blogSyncChannel = 'BroadcastChannel' in window ? new BroadcastChannel('ilearn-blog-sync') : null;
        const defaultBlogImage = 'https://lh3.googleusercontent.com/aida-public/AB6AXuDeA7aDCt1BhhNA6WQB-EGoUJittQ_zWiHMhgO7UPQFu7ewJlQywHQ2i9svSlMorENGTB4OXPPtG55T78teaOLzwgFzwc-rXcBlrY9S7EriKVyoAMS_0W1w8Bm-UMKPwrjdaX4C3T5Y8jMLETbi5n1naMUsffVmwTf3I2gaYr3_wzuw5_glmvYgGz7MSRbhMdOTObD3QzMyx02dZ4UVVpX67_pEhFd3iPZcf5NVpVESqINm3KdWCrlz5nViUL_8oe1G-y2p3r4ur3I';
        let currentBlogPostId = null;

        const defaultBlogPosts = [
            {
                id: 'blog-solar-system',
                title: 'The Wonders of the Solar System',
                slug: 'the-wonders-of-the-solar-system',
                category: 'Astronomy',
                status: 'Published',
                meta: 'A classroom-ready guide to planets, moons, orbits, and solar system exploration.',
                content: 'Guide students through planets, moons, orbital motion, and the scale of our solar neighborhood. This post includes lesson framing ideas, quick discussion questions, and ways to connect visual resources with short formative checks.',
                image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuAF-iTmBfgPboY1Z58o6p82UY5fNr7AC-m6fb8Cg-lgYEU5Q3L4Fekcl2hWiTBCdb2qkxMOjiUddDqmgZh-3CnSScQbtsOTOuqESdcqoJkW4f6-JvydFtXNs8zroQTub4lSAfbHnwJhb8H863LT2k8E6kj5vwfqg_g6W5dQYJEHtx08Dt5ywzPyqdZLvZbnX2L267hh_0kgC_cKQguXuI0iYryKVzftSfDWGCK-oiZw6Vi2X8k-CmjWZDEnSD81s6OsnL_p0t7xhNY',
                views: 1820,
                updatedAt: new Date(Date.now() - 2 * 60 * 60 * 1000).toISOString(),
                publishedAt: new Date(Date.now() - 2 * 60 * 60 * 1000).toISOString(),
            },
            {
                id: 'blog-dna-sequencing',
                title: 'DNA Sequencing 101',
                slug: 'dna-sequencing-101',
                category: 'Genetics',
                status: 'Draft',
                meta: 'A draft explainer for introducing sequencing, genes, and modern biology tools.',
                content: 'Draft notes for explaining DNA sequencing through simple analogies, visual models, and guided classroom questions.',
                image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuATq1kdVQYd6fkdXUd2CBSwlh2O4ZkFsaHuAxZNiAvsmghquSofLswso3cU-2FAIGMx1ILcORkSopAfL-tnu4fIpm594AsO5j13ToPyI3Wx-Oqx4Eo0TPFhMbmiwboiwzkbiEgZ-RJxRBCUpttj8_ie9x3RiNwHhbrPM4PH0t-vkle51rIfipBUDiNNxxh0vDyQ8Pjx8gwGhq5iW6RuqE1eVOpeqDisAJqKAPT294brkvD6qAxypC_gGCqxNQtmxsSJOQ3yGiz7pqc',
                views: 340,
                updatedAt: new Date(Date.now() - 5 * 60 * 60 * 1000).toISOString(),
                publishedAt: null,
            },
            {
                id: 'blog-climate-change-data',
                title: 'Climate Change Data',
                slug: 'climate-change-data',
                category: 'Teaching Guide',
                status: 'Published',
                meta: 'How to help students read climate graphs, trends, and evidence with confidence.',
                content: 'Students need practice reading evidence, not just memorizing conclusions. This post outlines how to introduce climate data, compare graphs, and ask students to explain claims using observable trends.',
                image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuBjGMPqPAxkQ6AGDSvWRjlFfzdoWRIqv7FsD1WWlmTNLmK45_RoEdi8QrdVylhGllJb3LkQEDa2aEEfbalwlKkxTD4p9al8s88faWfHs2sBoliUHmvsdTKGAWBnFgvaLPGDmdXVzatMiulzWSgnFkcNJIERHaXJUvozsvugQJZ1XomiaL2HLs4USU4r1d6h9DmQmheOjN3YKtbvrxrzpGl5Opt4AJZouZKI7SMBolDoZr50rfvWpaXAuCaY2SoJOIWL05xf_o-XVfI',
                views: 1460,
                updatedAt: new Date(Date.now() - 24 * 60 * 60 * 1000).toISOString(),
                publishedAt: new Date(Date.now() - 24 * 60 * 60 * 1000).toISOString(),
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

        function slugify(value) {
            return String(value || '')
                .toLowerCase()
                .trim()
                .replace(/[^a-z0-9]+/g, '-')
                .replace(/(^-|-$)/g, '') || 'untitled-post';
        }

        function readBlogPosts() {
            try {
                const saved = JSON.parse(localStorage.getItem(blogStorageKey) || '[]');
                const initialized = localStorage.getItem(blogInitializedKey) === 'true';
                if (Array.isArray(saved) && (saved.length || initialized)) return saved;
            } catch {}
            return [...defaultBlogPosts];
        }

        function announceBlogSync(posts) {
            window.dispatchEvent(new CustomEvent('ilearn:blogs-updated', { detail: { posts } }));
            window.dispatchEvent(new Event('ilearn-blog-posts-updated'));
            blogSyncChannel?.postMessage({ type: 'blogs-updated', posts });
        }

        function saveBlogPosts(posts, shouldAnnounce = true) {
            localStorage.setItem(blogStorageKey, JSON.stringify(posts));
            localStorage.setItem(blogInitializedKey, 'true');
            if (shouldAnnounce) announceBlogSync(posts);
        }

        async function readBlogRequestError(response, fallbackMessage) {
            try {
                const data = await response.json();
                if (data?.message) return data.message;
                if (data?.errors) return Object.values(data.errors).flat().join(' ');
            } catch {}
            return fallbackMessage;
        }

        async function syncBlogsFromServer() {
            const response = await fetch(blogsEndpoint, { headers: { Accept: 'application/json' } });
            if (!response.ok) throw new Error('Unable to load live blog posts.');
            const data = await response.json();
            if (Array.isArray(data.posts)) {
                saveBlogPosts(data.posts, false);
                renderBlogAdmin();
                return data.posts;
            }
            return readBlogPosts();
        }

        async function saveBlogPostToServer(post) {
            const response = await fetch(blogSaveEndpoint, {
                method: 'POST',
                headers: {
                    Accept: 'application/json',
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': adminCsrfToken,
                },
                body: JSON.stringify(post),
            });
            if (!response.ok) {
                throw new Error(await readBlogRequestError(response, 'Blog post could not be saved.'));
            }

            const data = await response.json();
            if (Array.isArray(data.posts)) saveBlogPosts(data.posts);
            return data;
        }

        async function deleteBlogPostFromServer(postId) {
            const response = await fetch(`${blogDeleteEndpoint}/${encodeURIComponent(postId)}`, {
                method: 'DELETE',
                headers: {
                    Accept: 'application/json',
                    'X-CSRF-TOKEN': adminCsrfToken,
                },
            });
            if (!response.ok) {
                throw new Error(await readBlogRequestError(response, 'Blog post could not be deleted.'));
            }

            const data = await response.json();
            if (Array.isArray(data.posts)) saveBlogPosts(data.posts);
            return data;
        }

        function relativeTime(value) {
            const time = value ? new Date(value).getTime() : Date.now();
            const minutes = Math.max(1, Math.round((Date.now() - time) / 60000));
            if (minutes < 60) return `Updated ${minutes}m ago`;
            const hours = Math.round(minutes / 60);
            if (hours < 24) return `Updated ${hours}h ago`;
            return `Updated ${Math.round(hours / 24)}d ago`;
        }

        function showEditorStatus(message, tone = 'primary') {
            const status = document.getElementById('blog-editor-status');
            if (!status) return;
            status.textContent = message;
            status.classList.remove('hidden', 'text-error', 'text-primary', 'border-error/20', 'border-primary/20', 'bg-error/10', 'bg-primary-container/10');
            status.classList.add(tone === 'error' ? 'text-error' : 'text-primary', tone === 'error' ? 'border-error/20' : 'border-primary/20', tone === 'error' ? 'bg-error/10' : 'bg-primary-container/10');
            window.clearTimeout(showEditorStatus.timer);
            showEditorStatus.timer = window.setTimeout(() => status.classList.add('hidden'), 2600);
        }

        function updateVisualPreview(src) {
            const preview = document.getElementById('blog-visual-preview');
            const previewWrap = document.getElementById('blog-visual-preview-wrap');
            const emptyState = document.getElementById('blog-visual-empty');
            const actions = document.getElementById('blog-visual-actions');
            const hasImage = Boolean(src);

            preview.src = hasImage ? src : '';
            previewWrap.classList.toggle('hidden', !hasImage);
            emptyState.classList.toggle('hidden', hasImage);
            actions.classList.toggle('hidden', !hasImage);
            actions.classList.toggle('flex', hasImage);
        }

        function setBlogVisual(src) {
            document.getElementById('blog-image').value = src || '';
            updateVisualPreview(src || '');
        }

        function resizeBlogImage(file, maxSize = 1400, quality = 0.84) {
            return new Promise((resolve, reject) => {
                const reader = new FileReader();
                reader.onerror = () => reject(new Error('The image could not be read.'));
                reader.onload = () => {
                    const image = new Image();
                    image.onerror = () => reject(new Error('The image could not be processed.'));
                    image.onload = () => {
                        const scale = Math.min(1, maxSize / Math.max(image.width, image.height));
                        const canvas = document.createElement('canvas');
                        canvas.width = Math.max(1, Math.round(image.width * scale));
                        canvas.height = Math.max(1, Math.round(image.height * scale));
                        const context = canvas.getContext('2d');
                        context.drawImage(image, 0, 0, canvas.width, canvas.height);
                        resolve(canvas.toDataURL('image/jpeg', quality));
                    };
                    image.src = reader.result;
                };
                reader.readAsDataURL(file);
            });
        }

        async function processBlogVisual(file) {
            if (!file) return;
            if (!file.type.startsWith('image/')) {
                showEditorStatus('Please upload an image file.', 'error');
                return;
            }
            if (file.size > 10 * 1024 * 1024) {
                showEditorStatus('Image must be 10MB or smaller.', 'error');
                return;
            }

            try {
                const resizedImage = await resizeBlogImage(file);
                setBlogVisual(resizedImage);
                showEditorStatus('Mission visual added.');
            } catch (error) {
                showEditorStatus(error.message || 'The image could not be read.', 'error');
            }
        }

        function renderBlogAdmin() {
            const posts = readBlogPosts().sort((a, b) => new Date(b.updatedAt || 0) - new Date(a.updatedAt || 0));
            const published = posts.filter((post) => post.status === 'Published');
            const drafts = posts.filter((post) => post.status !== 'Published');
            const totalViews = posts.reduce((sum, post) => sum + (Number(post.views) || 0), 0);

            document.querySelector('[data-blog-stat="TOTAL POSTS"]').textContent = posts.length;
            document.querySelector('[data-blog-stat="PUBLISHED"]').textContent = published.length;
            document.querySelector('[data-blog-stat="DRAFTS"]').textContent = drafts.length;
            document.querySelector('[data-blog-stat="TOTAL VIEWS"]').textContent = totalViews >= 1000 ? `${(totalViews / 1000).toFixed(1)}k` : totalViews;

            const list = document.getElementById('blog-post-list');
            if (!list) return;
            if (!posts.length) {
                list.innerHTML = `
                    <div class="rounded-xl border border-dashed border-primary/20 bg-primary-container/5 p-8 text-center">
                        <p class="font-headline text-xl text-primary">No blog posts yet</p>
                        <p class="mt-2 text-sm text-on-surface-variant">Click New Post, write your article, then publish it for customers.</p>
                    </div>
                `;
                return;
            }

            list.innerHTML = posts.map((post) => {
                const statusColor = post.status === 'Published' ? 'secondary-fixed' : 'tertiary-fixed';
                const activeClass = post.id === currentBlogPostId ? 'border-primary/40 bg-primary-container/10' : 'border-transparent hover:border-white/10 hover:bg-white/5';
                return `
                    <article class="group flex items-center gap-4 rounded-xl border p-4 transition-all ${activeClass}">
                        <div class="h-16 w-16 flex-shrink-0 overflow-hidden rounded-lg bg-surface-container-high">
                            <img loading="lazy" decoding="async" alt="${escapeHtml(post.title)}" class="h-full w-full object-cover" src="${escapeHtml(post.image || defaultBlogImage)}">
                        </div>
                        <div class="min-w-0 flex-1">
                            <h4 class="truncate font-headline text-lg text-on-surface transition-colors group-hover:text-primary">${escapeHtml(post.title || 'Untitled Post')}</h4>
                            <div class="mt-1 flex flex-wrap items-center gap-3">
                                <span class="rounded-full bg-${statusColor}/10 px-2 py-0.5 font-label text-[10px] text-${statusColor}">${escapeHtml((post.status || 'Draft').toUpperCase())}</span>
                                <span class="font-label text-[11px] text-on-surface-variant">${escapeHtml(relativeTime(post.updatedAt))}</span>
                                <span class="font-label text-[11px] text-on-surface-variant">${escapeHtml(post.category || 'General')}</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <button class="rounded-lg p-2 text-on-surface-variant transition-all hover:bg-primary/10 hover:text-primary" data-blog-edit="${escapeHtml(post.id)}" title="Edit post"><span class="material-symbols-outlined text-sm">edit</span></button>
                            <button class="rounded-lg p-2 text-on-surface-variant transition-all hover:bg-error/10 hover:text-error" data-blog-delete="${escapeHtml(post.id)}" title="Delete post"><span class="material-symbols-outlined text-sm">delete</span></button>
                        </div>
                    </article>
                `;
            }).join('');
        }

        function fillBlogEditor(post) {
            currentBlogPostId = post ? post.id : null;
            document.getElementById('blog-title').value = post?.title || '';
            document.getElementById('blog-content').value = post?.content || '';
            document.getElementById('blog-slug').value = post?.slug || '';
            document.getElementById('blog-meta').value = post?.meta || '';
            document.getElementById('blog-image').value = post?.image || '';
            updateVisualPreview(post?.image || '');
            document.getElementById('blog-category').value = post?.category || 'Biology';
            renderBlogAdmin();
        }

        function buildBlogPost(status) {
            const title = document.getElementById('blog-title').value.trim();
            const content = document.getElementById('blog-content').value.trim();
            const slug = slugify(document.getElementById('blog-slug').value.trim() || title);
            const meta = document.getElementById('blog-meta').value.trim();
            const image = document.getElementById('blog-image').value.trim();
            const category = document.getElementById('blog-category').value;

            if (!title || !content) {
                showEditorStatus('Add a title and article content first.', 'error');
                return null;
            }

            return {
                id: currentBlogPostId || `blog-${Date.now()}`,
                title,
                slug,
                category,
                status,
                meta: meta || content.slice(0, 150),
                content,
                image: image || defaultBlogImage,
                views: 0,
                updatedAt: new Date().toISOString(),
                publishedAt: status === 'Published' ? new Date().toISOString() : null,
            };
        }

        async function saveCurrentPost(status) {
            const nextPost = buildBlogPost(status);
            if (!nextPost) return;
            showEditorStatus(status === 'Published' ? 'Publishing to customers...' : 'Saving draft...');
            try {
                const data = await saveBlogPostToServer(nextPost);
                const savedPost = data.post || nextPost;
                fillBlogEditor(savedPost);
                showEditorStatus(status === 'Published' ? 'Blog post published and synced to customers.' : 'Draft saved and synced.');
            } catch (error) {
                showEditorStatus(error.message || 'Blog post could not be saved.', 'error');
            }
        }

        document.querySelectorAll('.glass-panel').forEach((panel) => {
            panel.addEventListener('mouseenter', () => {
                panel.style.transform = 'translateY(-2px)';
            });
            panel.addEventListener('mouseleave', () => {
                panel.style.transform = 'translateY(0)';
            });
        });

        document.querySelectorAll('[data-blog-new]').forEach((button) => {
            button.addEventListener('click', () => {
                fillBlogEditor(null);
                document.getElementById('blog-title').focus();
                showEditorStatus('New post ready.');
            });
        });

        document.getElementById('blog-title').addEventListener('input', (event) => {
            const slugInput = document.getElementById('blog-slug');
            if (!slugInput.value || !currentBlogPostId) slugInput.value = slugify(event.target.value);
        });

        document.getElementById('blog-image').addEventListener('input', (event) => {
            updateVisualPreview(event.target.value.trim());
        });

        const visualDropzone = document.getElementById('blog-visual-dropzone');
        const visualFileInput = document.getElementById('blog-visual-file');

        visualDropzone.addEventListener('click', (event) => {
            if (event.target.closest('#blog-remove-visual')) return;
            visualFileInput.click();
        });

        document.getElementById('blog-replace-visual').addEventListener('click', (event) => {
            event.stopPropagation();
            visualFileInput.click();
        });

        document.getElementById('blog-remove-visual').addEventListener('click', (event) => {
            event.stopPropagation();
            setBlogVisual('');
            showEditorStatus('Mission visual removed.');
        });

        visualFileInput.addEventListener('change', (event) => {
            processBlogVisual(event.target.files?.[0]);
            event.target.value = '';
        });

        ['dragenter', 'dragover'].forEach((eventName) => {
            visualDropzone.addEventListener(eventName, (event) => {
                event.preventDefault();
                visualDropzone.classList.add('border-primary-container', 'bg-primary-container/10');
            });
        });

        ['dragleave', 'drop'].forEach((eventName) => {
            visualDropzone.addEventListener(eventName, (event) => {
                event.preventDefault();
                visualDropzone.classList.remove('border-primary-container', 'bg-primary-container/10');
            });
        });

        visualDropzone.addEventListener('drop', (event) => {
            processBlogVisual(event.dataTransfer?.files?.[0]);
        });

        document.getElementById('blog-save-draft').addEventListener('click', () => saveCurrentPost('Draft'));
        document.getElementById('blog-publish').addEventListener('click', () => saveCurrentPost('Published'));

        document.getElementById('blog-post-list').addEventListener('click', (event) => {
            const editButton = event.target.closest('[data-blog-edit]');
            const deleteButton = event.target.closest('[data-blog-delete]');
            if (editButton) {
                const post = readBlogPosts().find((item) => item.id === editButton.dataset.blogEdit);
                if (post) {
                    fillBlogEditor(post);
                    document.getElementById('blog-title').focus();
                    showEditorStatus('Editing selected post.');
                }
            }
            if (deleteButton) {
                const postId = deleteButton.dataset.blogDelete;
                const post = readBlogPosts().find((item) => item.id === postId);
                if (!post || !confirm(`Delete "${post.title}"?`)) return;
                showEditorStatus('Deleting blog post...');
                deleteBlogPostFromServer(postId)
                    .then(() => {
                        if (currentBlogPostId === postId) fillBlogEditor(null);
                        renderBlogAdmin();
                        showEditorStatus('Blog post deleted and removed from customer pages.');
                    })
                    .catch((error) => showEditorStatus(error.message || 'Blog post could not be deleted.', 'error'));
            }
        });

        window.addEventListener('storage', (event) => {
            if (event.key === blogStorageKey) renderBlogAdmin();
        });
        window.addEventListener('ilearn-blog-posts-updated', renderBlogAdmin);
        window.addEventListener('ilearn:blogs-updated', renderBlogAdmin);
        blogSyncChannel?.addEventListener('message', (event) => {
            if (event.data?.type === 'blogs-updated' && Array.isArray(event.data.posts)) {
                saveBlogPosts(event.data.posts, false);
                renderBlogAdmin();
            }
        });

        if (!localStorage.getItem(blogInitializedKey) && !localStorage.getItem(blogStorageKey)) {
            saveBlogPosts(defaultBlogPosts, false);
        }
        renderBlogAdmin();
        fillBlogEditor(readBlogPosts()[0] || null);
        syncBlogsFromServer()
            .then((posts) => {
                const selected = posts.find((post) => post.id === currentBlogPostId) || posts[0] || null;
                fillBlogEditor(selected);
            })
            .catch((error) => showEditorStatus(error.message || 'Live blog posts could not be loaded.', 'error'));
    </script>
    @include('partials.auth-ui')
</body>
</html>
