@php
    $seoSiteName = $seoSiteName ?? 'iLearn Science Resources';
    $seoTitle = $seoTitle ?? 'iLearn Science Resources | Digital Science Teaching Materials for Teachers';
    $seoDescription = $seoDescription ?? 'Download engaging science PowerPoint presentations, worksheets, quizzes, lesson plans, and digital teaching resources designed to help teachers prepare less and teach more.';
    $seoCanonical = $seoCanonical ?? url()->current();
    $seoImage = $seoImage ?? asset('images/shop/photosynthesis-process-topic.svg');
    $seoRobots = $seoRobots ?? 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1';
    $seoType = $seoType ?? 'website';
    $seoKeywords = $seoKeywords ?? 'science teaching resources, science PowerPoint presentations, printable science worksheets, digital learning materials, science lesson plans, educational science resources, classroom science activities, editable science presentations';
    $structuredData = $structuredData ?? [];
    $baseStructuredData = [
        [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => $seoSiteName,
            'url' => route('home'),
            'logo' => $seoImage,
            'sameAs' => [
                route('home'),
            ],
        ],
        [
            '@context' => 'https://schema.org',
            '@type' => 'WebSite',
            'name' => $seoSiteName,
            'url' => route('home'),
            'potentialAction' => [
                '@type' => 'SearchAction',
                'target' => route('shop') . '?q={search_term_string}',
                'query-input' => 'required name=search_term_string',
            ],
        ],
    ];
    $jsonLd = array_merge($baseStructuredData, $structuredData);
@endphp

<title>{{ $seoTitle }}</title>
<meta name="description" content="{{ $seoDescription }}">
<meta name="keywords" content="{{ $seoKeywords }}">
<meta name="robots" content="{{ $seoRobots }}">
<link rel="canonical" href="{{ $seoCanonical }}">
<link rel="sitemap" type="application/xml" title="Sitemap" href="{{ url('/sitemap.xml') }}">
<meta name="theme-color" content="#10131a">
<meta name="color-scheme" content="dark light">

<meta property="og:site_name" content="{{ $seoSiteName }}">
<meta property="og:type" content="{{ $seoType }}">
<meta property="og:title" content="{{ $seoTitle }}">
<meta property="og:description" content="{{ $seoDescription }}">
<meta property="og:url" content="{{ $seoCanonical }}">
<meta property="og:image" content="{{ $seoImage }}">
<meta property="og:image:alt" content="{{ $seoDescription }}">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $seoTitle }}">
<meta name="twitter:description" content="{{ $seoDescription }}">
<meta name="twitter:image" content="{{ $seoImage }}">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="dns-prefetch" href="//lh3.googleusercontent.com">

@foreach ($jsonLd as $schema)
    <script type="application/ld+json">{!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
@endforeach
