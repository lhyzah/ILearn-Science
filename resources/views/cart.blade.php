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
            ] as [$icon, $label, $href])
                <a class="flex items-center gap-3 px-6 py-3 text-on-surface-variant transition-all hover:bg-white/5 hover:text-primary" href="{{ $href }}">
                    <span class="material-symbols-outlined">{{ $icon }}</span>
                    <span class="font-label text-sm">{{ $label }}</span>
                </a>
            @endforeach
        </div>
    </nav>

    <header class="fixed right-0 top-0 z-40 flex w-full items-center justify-between border-b border-white/5 bg-background/50 px-6 py-4 backdrop-blur-lg md:w-[calc(100%-16rem)] md:px-margin-desktop">
        <div class="flex items-center gap-4">
            <span class="material-symbols-outlined text-primary md:hidden">menu</span>
            <h2 class="font-headline text-3xl font-bold text-primary">Mission Control: Your Cart</h2>
        </div>
        <div class="ml-auto flex items-center justify-end" data-auth-mount></div>
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

            <div class="custom-scrollbar flex gap-gutter overflow-x-auto pb-8 scroll-smooth" data-cart-recommendations>
                <article class="glass-panel min-w-[280px] rounded-xl p-6 text-center text-on-surface-variant">
                    <span class="material-symbols-outlined mb-2 text-4xl text-primary">auto_awesome</span>
                    <p>Loading admin-uploaded recommendations...</p>
                </article>
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
        const cartInventoryStorageKey = 'ilearnScienceInventoryProducts';
        const cartProductsEndpoint = '{{ route('products.index') }}';
        const taxRate = 0.08;
        const discountAmount = 5;
        let cartRecommendedProducts = [];

        function escapeCartHTML(value) {
            return String(value ?? '').replace(/[&<>"']/g, (character) => ({
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#039;',
            }[character]));
        }

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

        function normalizeCartRecommendation(product) {
            const title = product.title || product.name || 'Science Resource';
            return {
                id: product.id || title.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^-|-$/g, ''),
                title,
                meta: product.description || product.details || 'Admin-uploaded learning resource',
                category: product.category || product.type || 'Science',
                price: parsePeso(product.price),
                priceLabel: formatPeso(parsePeso(product.price)),
                image: product.image || product.previewImage || '',
                status: product.status || 'Published',
            };
        }

        function readCartInventoryProducts() {
            try {
                const saved = JSON.parse(localStorage.getItem(cartInventoryStorageKey) || '[]') || [];
                return Array.isArray(saved) ? saved.map(normalizeCartRecommendation) : [];
            } catch {
                return [];
            }
        }

        async function syncCartRecommendationsFromServer() {
            try {
                const response = await fetch(cartProductsEndpoint, { headers: { Accept: 'application/json' } });
                if (!response.ok) return;
                const products = await response.json();
                if (!Array.isArray(products)) return;
                localStorage.setItem(cartInventoryStorageKey, JSON.stringify(products));
                renderCartRecommendations(products.map(normalizeCartRecommendation));
            } catch {
                renderCartRecommendations(readCartInventoryProducts());
            }
        }

        function getStoredCartItems() {
            if (window.iLearnAuth?.getCartItems) return window.iLearnAuth.getCartItems().map(normalizeCartItem);
            try {
                return (JSON.parse(localStorage.getItem(cartStorageKey)) || []).map(normalizeCartItem);
            } catch {
                return [];
            }
        }

        function saveStoredCartItems(items) {
            if (window.iLearnAuth?.setCartItems) {
                window.iLearnAuth.setCartItems(items);
                return;
            }
            localStorage.setItem(cartStorageKey, JSON.stringify(items.map(normalizeCartItem)));
        }

        function addRecommendedProductToCart(productId) {
            const product = cartRecommendedProducts.find((item) => item.id === productId);
            if (!product) return;
            if (window.iLearnAuth?.isSignedIn && !window.iLearnAuth.isSignedIn()) {
                window.iLearnAuth.openSignIn?.('Please sign in or create an account to add products to your cart.');
                return;
            }
            const cartItems = getStoredCartItems();
            const existing = cartItems.find((item) => item.id === product.id);
            if (existing) {
                existing.quantity = (Number(existing.quantity) || 1) + 1;
            } else {
                cartItems.push({
                    id: product.id,
                    title: product.title,
                    meta: product.category,
                    price: product.price,
                    image: product.image,
                    quantity: 1,
                });
            }
            saveStoredCartItems(cartItems);
            renderCartItems();
        }

        function renderCartRecommendations(products = readCartInventoryProducts()) {
            const container = document.querySelector('[data-cart-recommendations]');
            if (!container) return;
            const cartIds = new Set(getStoredCartItems().map((item) => item.id));
            cartRecommendedProducts = products
                .filter((product) => ['published', 'active'].includes(String(product.status || 'Published').toLowerCase()))
                .filter((product) => !cartIds.has(product.id))
                .slice(0, 8);

            if (!cartRecommendedProducts.length) {
                container.innerHTML = `
                    <article class="glass-panel min-w-[280px] rounded-xl p-6 text-center text-on-surface-variant">
                        <span class="material-symbols-outlined mb-2 text-4xl text-primary">inventory_2</span>
                        <p class="font-headline text-lg text-on-surface">No recommendations yet</p>
                        <p class="mt-1 text-sm">Admin-published products will appear here automatically.</p>
                    </article>
                `;
                return;
            }

            container.innerHTML = cartRecommendedProducts.map((product) => `
                <article class="glass-panel group min-w-[280px] overflow-hidden rounded-xl">
                    <div class="relative h-40 overflow-hidden">
                        ${product.image ? `<img alt="${escapeCartHTML(product.title)}" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110" src="${escapeCartHTML(product.image)}">` : `<div class="flex h-full w-full items-center justify-center bg-surface-container-high text-primary"><span class="material-symbols-outlined text-5xl">science</span></div>`}
                        <div class="absolute inset-0 bg-gradient-to-t from-background to-transparent opacity-60"></div>
                        <span class="absolute left-3 top-3 rounded bg-primary-container/80 px-2 py-1 font-label text-[10px] text-on-primary-container">${escapeCartHTML(product.category)}</span>
                    </div>
                    <div class="p-4">
                        <h5 class="mb-1 line-clamp-1 font-headline text-lg">${escapeCartHTML(product.title)}</h5>
                        <p class="mb-4 line-clamp-2 font-label text-xs text-on-surface-variant">${escapeCartHTML(product.meta)}</p>
                        <div class="flex items-center justify-between">
                            <span class="font-headline text-lg text-primary">${escapeCartHTML(product.priceLabel)}</span>
                            <button class="glass-panel flex h-10 w-10 items-center justify-center rounded-full text-primary transition-all hover:bg-primary hover:text-on-primary" type="button" data-cart-recommendation-add="${escapeCartHTML(product.id)}" aria-label="Add ${escapeCartHTML(product.title)} to cart">
                                <span class="material-symbols-outlined">add_shopping_cart</span>
                            </button>
                        </div>
                    </div>
                </article>
            `).join('');
        }

        function ensureCartHasStarterItems() {
            if (window.iLearnAuth?.isSignedIn && !window.iLearnAuth.isSignedIn()) return;
            if (localStorage.getItem(cartStorageKey)) return;
        }

        function updateStoredCartCount() {
            const total = getCartLineCount();
            document.querySelectorAll('[data-cart-count]').forEach((badge) => {
                badge.classList.toggle('hidden', !(window.iLearnAuth?.isSignedIn?.()));
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
            renderCartRecommendations();
        }

        ensureCartHasStarterItems();
        renderCartItems();
        renderCartRecommendations();
        syncCartRecommendationsFromServer();

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
        document.querySelector('[data-cart-recommendations]')?.addEventListener('click', (event) => {
            const addButton = event.target.closest('[data-cart-recommendation-add]');
            if (addButton) addRecommendedProductToCart(addButton.dataset.cartRecommendationAdd);
        });

        window.addEventListener('storage', (event) => {
            if (event.key === cartStorageKey) {
                renderCartItems();
            }
            if (event.key === cartInventoryStorageKey || event.key === `${cartInventoryStorageKey}Initialized`) {
                renderCartRecommendations();
            }
        });
        window.addEventListener('ilearn:cart-updated', renderCartItems);
        window.addEventListener('ilearn:products-updated', (event) => {
            if (Array.isArray(event.detail?.products)) {
                renderCartRecommendations(event.detail.products.map(normalizeCartRecommendation));
                return;
            }
            renderCartRecommendations();
        });

        window.addEventListener('pageshow', () => {
            renderCartItems();
            renderCartRecommendations();
            syncCartRecommendationsFromServer();
        });

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
