<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    @include('partials.seo', [
        'seoTitle' => ($product['title'] ?? 'Science Teaching Resource') . ' | iLearn Science Resources',
        'seoDescription' => $product['description'] ?? 'Download a classroom-ready digital science teaching resource for teachers and students.',
        'seoCanonical' => route('resources.show', $product['id']),
        'seoType' => 'product',
        'seoImage' => $product['image'] ?? asset('images/shop/photosynthesis-process-topic.svg'),
        'structuredData' => [
            [
                ('@' . 'context') => 'https://schema.org',
                '@type' => 'BreadcrumbList',
                'itemListElement' => [
                    ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => route('home')],
                    ['@type' => 'ListItem', 'position' => 2, 'name' => 'Shop Science Resources', 'item' => route('shop')],
                    ['@type' => 'ListItem', 'position' => 3, 'name' => $product['title'], 'item' => route('resources.show', $product['id'])],
                ],
            ],
            [
                ('@' . 'context') => 'https://schema.org',
                '@type' => 'Product',
                'name' => $product['title'],
                'description' => $product['description'],
                'image' => $product['image'] ?? asset('images/shop/photosynthesis-process-topic.svg'),
                'category' => $product['category'] ?? 'Science Teaching Resources',
                'brand' => ['@type' => 'Brand', 'name' => 'iLearn Science Resources'],
                'offers' => [
                    '@type' => 'Offer',
                    'priceCurrency' => 'PHP',
                    'price' => (string) ($product['price'] ?? 0),
                    'availability' => 'https://schema.org/InStock',
                    'url' => route('resources.show', $product['id']),
                ],
            ],
            [
                ('@' . 'context') => 'https://schema.org',
                '@type' => 'FAQPage',
                'mainEntity' => [
                    [
                        '@type' => 'Question',
                        'name' => 'How do I access this digital science resource?',
                        'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'After checkout, your downloadable science teaching material is available instantly and can be accessed from your downloads area.'],
                    ],
                    [
                        '@type' => 'Question',
                        'name' => 'Can this resource be used in classroom lessons?',
                        'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes. iLearn Science resources are designed for classroom science teaching, review, student activities, and digital learning support.'],
                    ],
                ],
            ],
        ],
    ])
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
                        background: '#10131a',
                        surface: '#10131a',
                        'surface-container-lowest': '#0b0e14',
                        'surface-container-low': '#191c22',
                        'surface-container': '#1d2026',
                        'surface-container-high': '#272a31',
                        'on-surface': '#e1e2eb',
                        'on-surface-variant': '#bbc9cf',
                        'on-primary': '#003642',
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
</head>
<body class="bg-background font-body text-on-surface">
    <main class="min-h-screen bg-[radial-gradient(circle_at_15%_10%,rgba(0,212,255,.14),transparent_34%),radial-gradient(circle_at_88%_14%,rgba(209,188,255,.12),transparent_34%),linear-gradient(135deg,#0b0e14,#10131a_55%,#151827)]">
        <header class="sticky top-0 z-40 border-b border-white/10 bg-surface/80 px-5 py-4 backdrop-blur-xl md:px-12">
            <nav class="mx-auto flex max-w-6xl items-center justify-between">
                <a class="font-headline text-xl font-bold text-primary" href="{{ route('home') }}">iLearn Science</a>
                <div class="flex items-center gap-4 font-label text-xs text-on-surface-variant">
                    <a class="hover:text-primary" href="{{ route('shop') }}">Shop</a>
                    <a class="hover:text-primary" href="{{ route('blog') }}">Blog</a>
                    <a class="hover:text-primary" href="{{ route('cart') }}">Cart</a>
                </div>
            </nav>
        </header>

        <section class="mx-auto grid max-w-6xl gap-8 px-5 py-12 md:grid-cols-2 md:px-12 md:py-20">
            <div class="rounded-3xl border border-primary/20 bg-surface-container/70 p-4 shadow-[0_0_35px_rgba(60,215,255,.16)]">
                <img
                    class="h-auto max-h-[620px] w-full rounded-2xl object-contain"
                    src="{{ $product['image'] ?? asset('images/shop/photosynthesis-process-topic.svg') }}"
                    alt="{{ $product['title'] }} preview image for science teaching resources"
                    loading="eager"
                    decoding="async"
                    width="900"
                    height="620"
                >
            </div>
            <article>
                <nav class="mb-5 flex flex-wrap items-center gap-2 font-label text-xs text-on-surface-variant" aria-label="Breadcrumb">
                    <a class="hover:text-primary" href="{{ route('home') }}">Home</a>
                    <span>/</span>
                    <a class="hover:text-primary" href="{{ route('shop') }}">Shop</a>
                    <span>/</span>
                    <span class="text-primary">{{ $product['category'] ?? 'Resource' }}</span>
                </nav>
                <p class="font-label text-xs uppercase tracking-[.28em] text-primary">{{ $product['category'] ?? 'Science Resource' }}</p>
                <h1 class="mt-4 font-headline text-4xl font-bold leading-tight md:text-5xl">{{ $product['title'] }}</h1>
                <p class="mt-5 text-lg leading-8 text-on-surface-variant">{{ $product['description'] }}</p>
                <div class="mt-6 grid grid-cols-2 gap-3">
                    <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
                        <p class="font-label text-[10px] uppercase tracking-widest text-on-surface-variant">Format</p>
                        <p class="mt-1 text-primary">{{ $product['format'] ?? 'Digital File' }}</p>
                    </div>
                    <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
                        <p class="font-label text-[10px] uppercase tracking-widest text-on-surface-variant">Grade Level</p>
                        <p class="mt-1 text-primary">{{ $product['grade'] ?? 'All Grades' }}</p>
                    </div>
                </div>
                <div class="mt-8 rounded-3xl border border-white/10 bg-white/5 p-6">
                    <h2 class="font-headline text-2xl font-semibold">What teachers get</h2>
                    <p class="mt-3 leading-7 text-on-surface-variant">{{ $product['details'] ?? 'Classroom-ready downloadable science material with editable teaching support and student activities.' }}</p>
                </div>
                <div class="mt-8 flex flex-col gap-3 sm:flex-row sm:items-center">
                    <span class="font-headline text-3xl font-semibold text-primary">₱{{ number_format((float) ($product['price'] ?? 0), 2) }}</span>
                    <a class="inline-flex items-center justify-center gap-2 rounded-2xl bg-primary px-6 py-4 font-label text-sm font-bold text-on-primary shadow-[0_0_24px_rgba(60,215,255,.38)] transition hover:scale-[1.02]" href="{{ route('shop') }}">
                        <span class="material-symbols-outlined">shopping_cart</span>
                        Add From Shop
                    </a>
                </div>
            </article>
        </section>

        @if ($relatedProducts->isNotEmpty())
            <section class="mx-auto max-w-6xl px-5 pb-16 md:px-12">
                <h2 class="font-headline text-2xl font-semibold">Related science resources</h2>
                <div class="mt-6 grid gap-5 md:grid-cols-3">
                    @foreach ($relatedProducts as $related)
                        <a class="rounded-2xl border border-white/10 bg-surface-container/70 p-4 transition hover:border-primary/40" href="{{ route('resources.show', $related['id']) }}">
                            <img class="h-36 w-full rounded-xl object-cover" src="{{ $related['image'] ?? asset('images/shop/photosynthesis-process-topic.svg') }}" alt="{{ $related['title'] }} digital science teaching resource" loading="lazy" decoding="async">
                            <h3 class="mt-4 font-headline text-lg font-semibold">{{ $related['title'] }}</h3>
                            <p class="mt-2 text-sm text-on-surface-variant">{{ $related['category'] ?? 'Science Resource' }}</p>
                        </a>
                    @endforeach
                </div>
            </section>
        @endif
    </main>
</body>
</html>
