<!DOCTYPE html>
<html class="dark" lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>iLearn Science - Order Successful</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700;800&family=JetBrains+Mono:wght@400;500&family=Plus+Jakarta+Sans:wght@400;500&display=swap" rel="stylesheet">
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
                        'on-surface': '#e1e2eb',
                        'on-surface-variant': '#bbc9cf',
                        primary: '#a8e8ff',
                        'primary-container': '#00d4ff',
                        'surface-tint': '#3cd7ff',
                        tertiary: '#e6d8ff',
                        error: '#ffb4ab',
                        'error-container': '#93000a',
                        'on-primary': '#003642',
                        'on-primary-container': '#00586b',
                        'on-tertiary-container': '#6100e0'
                    },
                    borderRadius: { DEFAULT: '0.25rem', lg: '0.5rem', xl: '0.75rem', full: '9999px' },
                    spacing: { gutter: '24px', 'margin-mobile': '16px', 'margin-desktop': '48px', 'container-max': '1280px' },
                    fontFamily: {
                        headline: ['Sora', 'sans-serif'],
                        body: ['Plus Jakarta Sans', 'sans-serif'],
                        label: ['JetBrains Mono', 'monospace']
                    }
                }
            }
        };
    </script>
    <style>
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
        .animate-check { animation: check-bounce 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards; transform: scale(0); }
        @keyframes check-bounce {
            0% { transform: scale(0); opacity: 0; }
            70% { transform: scale(1.2); opacity: 1; }
            100% { transform: scale(1); opacity: 1; }
        }
        .glow-pulse { animation: pulse-glow 3s infinite; }
        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 20px rgba(60, 215, 255, 0.1); }
            50% { box-shadow: 0 0 40px rgba(60, 215, 255, 0.3); }
        }
        .star-field { background-image: radial-gradient(white 1px, transparent 1px); background-size: 50px 50px; opacity: 0.1; }
    </style>
</head>
<body class="min-h-screen overflow-x-hidden bg-background font-body text-on-surface selection:bg-primary-container selection:text-on-primary-container">
    <div class="fixed inset-0 z-0 opacity-60 blur-xl">
        <img class="h-full w-full object-cover" alt="Science dashboard background" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD30svFHUzMW_wLvdMJ-sO-AJC8PiCm63d2I_KW4Ao9r3eO5Oy2bTPAMUtAKp-cFonPGtSSvlEa40MhMrqmJRpomyBWjuHjbJjDIEiig0oPo_FMIqGpSV1SJPlW90_thYmFWVPxFUob-deIxl26buCuwAbRU1bxISylNUoJb1Ymw9OugEWkq2z8AzlQF7aqcGMYDzpwb6ubNHrzJUMH0mc-k2Tc-btib6kNLNKjnukeEcdIkwmJvemFUxKtvwzhelFxYAHTOvsJMTM">
    </div>

    <aside class="fixed left-0 top-0 z-10 hidden h-screen w-64 flex-col gap-2 border-r border-white/10 bg-surface-container-low/60 p-4 pt-20 opacity-40 shadow-xl backdrop-blur-lg md:flex">
        <div class="mb-8 px-2">
            <h2 class="font-headline text-2xl font-semibold text-surface-tint">Mission Control</h2>
            <p class="font-label text-sm text-on-surface-variant">Academic Sector 7</p>
        </div>
        <nav class="space-y-1">
            <div class="flex items-center gap-3 rounded-lg p-3 text-on-surface-variant">
                <span class="material-symbols-outlined">dashboard</span>
                <span class="font-label text-sm">Dashboard</span>
            </div>
            <div class="flex items-center gap-3 rounded-lg border-r-2 border-primary bg-primary/20 p-3 text-primary shadow-[0_0_10px_rgba(168,232,255,0.3)]">
                <span class="material-symbols-outlined">account_balance_wallet</span>
                <span class="font-label text-sm">Checkout</span>
            </div>
            <div class="flex items-center gap-3 rounded-lg p-3 text-on-surface-variant">
                <span class="material-symbols-outlined">science</span>
                <span class="font-label text-sm">Shop</span>
            </div>
        </nav>
    </aside>

    <div class="fixed inset-0 z-40 flex items-start justify-center overflow-y-auto bg-surface-container-lowest/40 px-4 py-4 backdrop-blur-md sm:p-6 md:items-center">
        <main class="glow-pulse relative my-auto flex w-full max-w-4xl flex-col overflow-hidden rounded-[24px] border border-primary/30 bg-surface-container/60 shadow-[0_0_30px_rgba(0,212,255,0.2)] backdrop-blur-2xl sm:rounded-[32px]">
            <section class="relative px-5 pb-6 pt-8 text-center sm:px-8 md:px-12 md:pb-8 md:pt-12">
                <div class="star-field pointer-events-none absolute left-0 top-0 h-full w-full"></div>
                <div class="mb-5 flex justify-center md:mb-6">
                    <div class="animate-check flex h-16 w-16 items-center justify-center rounded-full border-2 border-primary-container bg-primary-container/20 shadow-[0_0_25px_rgba(0,212,255,0.4)] md:h-24 md:w-24">
                        <span class="material-symbols-outlined text-4xl text-primary-container md:text-6xl" style="font-variation-settings: 'wght' 600;">check_circle</span>
                    </div>
                </div>
                <h1 class="mb-2 font-headline text-2xl font-bold leading-tight text-primary sm:text-3xl md:text-5xl">Mission Accomplished: Order Successful!</h1>
                <p class="font-body text-base text-on-surface-variant md:text-lg">Your digital learning resources are now ready for download.</p>
            </section>

            <section class="px-5 pb-6 sm:px-8 md:px-12 md:pb-8">
                <div class="grid grid-cols-1 gap-8 md:grid-cols-12">
                    <div class="space-y-4 md:col-span-7">
                        <h3 class="mb-4 font-label text-sm uppercase tracking-widest text-primary">Acquired Assets</h3>
                        <div class="space-y-4" data-success-items></div>
                    </div>

                    <div class="md:col-span-5">
                        <section class="space-y-4 rounded-[24px] border border-white/10 bg-surface-container-highest/20 p-6">
                            <h3 class="font-label text-sm uppercase tracking-widest text-primary">Mission Logs</h3>
                            <div class="space-y-3">
                                <div class="flex justify-between font-label text-sm">
                                    <span class="text-on-surface-variant">Order Number</span>
                                    <span class="font-medium text-on-surface" data-success-order-number>#ILS-LIVE</span>
                                </div>
                                <div class="flex justify-between font-label text-sm">
                                    <span class="text-on-surface-variant">Arrival Date</span>
                                    <span class="font-medium text-on-surface" data-success-order-date>Today</span>
                                </div>
                                <div class="flex justify-between font-label text-sm">
                                    <span class="text-on-surface-variant">Payment Method</span>
                                    <span class="font-medium text-on-surface" data-success-payment>Card</span>
                                </div>
                                <div class="flex justify-between font-label text-sm">
                                    <span class="text-on-surface-variant">Items Acquired</span>
                                    <span class="font-medium text-on-surface" data-success-item-count>0</span>
                                </div>
                                <div class="flex justify-between font-label text-sm">
                                    <span class="text-on-surface-variant">Subtotal</span>
                                    <span class="font-medium text-on-surface" data-success-subtotal>₱0.00</span>
                                </div>
                                <div class="flex justify-between font-label text-sm">
                                    <span class="text-on-surface-variant">Tax</span>
                                    <span class="font-medium text-on-surface" data-success-tax>₱0.00</span>
                                </div>
                                <div class="flex justify-between font-label text-sm">
                                    <span class="text-on-surface-variant">Discount</span>
                                    <span class="font-medium text-primary" data-success-discount>-₱0.00</span>
                                </div>
                                <div class="flex items-end justify-between border-t border-white/10 pt-4">
                                    <span class="font-label text-sm text-primary">Total Paid</span>
                                    <span class="font-headline text-3xl font-semibold text-primary-container" data-success-total>₱0.00</span>
                                </div>
                            </div>
                        </section>

                        <section class="mt-6">
                            <h3 class="mb-3 px-2 font-label text-xs text-on-surface-variant">YOU MAY ALSO LIKE</h3>
                            <a class="group flex cursor-pointer items-center gap-3 rounded-xl border border-white/5 bg-surface-container-high/20 p-3 transition-all hover:border-primary/40" href="{{ route('shop') }}">
                                <div class="h-10 w-10 overflow-hidden rounded-lg bg-surface-container-highest">
                                    <img class="h-full w-full object-cover" alt="Organic Chemistry Toolkit" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDum9Srxma3lj3t6kETeLqiDStAHp1g38m-u_ruqkLBdOE4E-OYKZuYEZqVWydu1-zx1T-xBXbYju_xTpFAPYDW8pZrk62vlgaoxB5A3n8hq2D6nqo_m5Izz3syNUCmzoKBWiodSQBJibe_mURUdzERizJJ28C8dOSkph-4R4g5UwnhaecWj6umT3B8ES1C9oyJwgohKOZwwWKI_QL3B-7Gr-79ERe6g2hVOINxFIKW0AR5htC7JyhEkBJDwR9WAU20tTsOneY8jwg">
                                </div>
                                <div class="flex-1 overflow-hidden">
                                    <p class="truncate font-label text-sm text-on-surface">Organic Chemistry Toolkit</p>
                                    <p class="font-label text-xs text-primary">₱290.00</p>
                                </div>
                                <span class="material-symbols-outlined text-on-surface-variant transition-colors group-hover:text-primary">add_shopping_cart</span>
                            </a>
                        </section>
                    </div>
                </div>
            </section>

            <footer class="flex flex-col items-center justify-between gap-5 border-t border-white/10 bg-surface-container-lowest/50 px-5 py-5 sm:flex-row sm:px-8 md:px-12 md:py-8">
                <button id="success-download-now" class="flex w-full items-center justify-center gap-2 rounded-full bg-primary px-8 py-4 font-headline text-lg font-semibold text-on-primary shadow-[0_0_20px_rgba(168,232,255,0.4)] transition-all hover:scale-105 active:scale-95 sm:w-auto" type="button">
                    <span class="material-symbols-outlined">download</span>
                    Download Now
                </button>
                <div class="flex flex-wrap items-center justify-center gap-4 sm:gap-6">
                    <a class="flex items-center gap-2 font-label text-sm text-on-surface-variant transition-colors hover:text-primary active:scale-95" href="{{ route('mission-control') }}">
                        <span class="material-symbols-outlined text-[18px]">dashboard</span>
                        Go to Dashboard
                    </a>
                    <a class="flex items-center gap-2 font-label text-sm text-on-surface-variant transition-colors hover:text-primary active:scale-95" href="{{ route('shop') }}">
                        <span class="material-symbols-outlined text-[18px]">shopping_cart</span>
                        Continue Shopping
                    </a>
                </div>
            </footer>

            <div class="pointer-events-none absolute -bottom-24 -right-24 h-64 w-64 rounded-full border border-primary/20"></div>
            <div class="pointer-events-none absolute -bottom-16 -right-16 h-32 w-32 rounded-full border border-primary/40"></div>
        </main>
    </div>

    <script>
        const cartStorageKey = 'ilearnScienceCartItems';
        const checkoutStorageKey = 'ilearnScienceLastCheckout';
        const downloadedFilesStorageKey = 'ilearnScienceDownloadedFiles';
        const taxRate = 0.08;
        const discountAmount = 5;
        function parsePeso(value) {
            return Number.parseFloat(String(value).replace(/[₱,]/g, '')) || 0;
        }

        function formatPeso(value) {
            return `₱${Math.max(0, value).toFixed(2)}`;
        }

        function getCartItems() {
            if (window.iLearnAuth?.getCartItems) return window.iLearnAuth.getCartItems();
            try {
                return JSON.parse(localStorage.getItem(cartStorageKey)) || [];
            } catch {
                return [];
            }
        }

        function getLastCheckout() {
            try {
                return JSON.parse(localStorage.getItem(checkoutStorageKey) || 'null');
            } catch {
                return null;
            }
        }

        function currentCustomerEmail() {
            try {
                const session = JSON.parse(sessionStorage.getItem('ilearnScienceAuthSession') || localStorage.getItem('ilearnScienceCurrentUser') || localStorage.getItem('ilearnScienceRememberedUser') || 'null');
                return String(session?.email || getLastCheckout()?.customer?.email || '').toLowerCase();
            } catch {
                return String(getLastCheckout()?.customer?.email || '').toLowerCase();
            }
        }

        function markOrderDownloaded() {
            const checkout = getLastCheckout();
            const email = currentCustomerEmail();
            const items = getPurchasedItems();
            const count = items.reduce((sum, item) => sum + item.quantity, 0);
            if (!email || !count) return;

            const orderNumber = checkout?.orderNumber || buildOrderNumber();
            const downloads = JSON.parse(localStorage.getItem(downloadedFilesStorageKey) || '{}') || {};
            downloads[email] = downloads[email] || {};
            downloads[email][orderNumber] = Math.max(Number(downloads[email][orderNumber]) || 0, count);
            localStorage.setItem(downloadedFilesStorageKey, JSON.stringify(downloads));
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

        function getPurchasedItems() {
            const checkout = getLastCheckout();
            if (checkout?.items?.length) {
                return checkout.items.map(normalizeCartItem);
            }

            return getCartItems().map(normalizeCartItem);
        }

        function buildOrderNumber() {
            const checkout = getLastCheckout();
            if (checkout?.orderNumber) return checkout.orderNumber;

            const now = new Date();
            const month = String(now.getMonth() + 1).padStart(2, '0');
            const day = String(now.getDate()).padStart(2, '0');
            const suffix = String(getPurchasedItems().reduce((sum, item) => sum + item.quantity, 0)).padStart(2, '0');
            return `#ILS-${now.getFullYear()}${month}${day}-${suffix}`;
        }

        function updateSuccessOrder() {
            const checkout = getLastCheckout();
            const items = getPurchasedItems();
            const subtotal = items.reduce((sum, item) => sum + (item.price * item.quantity), 0);
            const tax = Number(checkout?.totals?.tax ?? (subtotal * taxRate)) || 0;
            const discount = Number(checkout?.totals?.discount ?? (subtotal > 0 ? discountAmount : 0)) || 0;
            const total = Number(checkout?.totals?.total ?? (subtotal + tax - discount)) || 0;
            const itemCount = items.reduce((sum, item) => sum + item.quantity, 0);
            const itemList = document.querySelector('[data-success-items]');
            const today = new Date().toLocaleDateString('en-US', {
                month: 'short',
                day: 'numeric',
                year: 'numeric',
            });

            if (itemList) {
                itemList.innerHTML = items.length ? items.map((item) => `
                    <article class="group flex items-center gap-4 rounded-2xl border border-white/5 bg-surface-container-high/40 p-4 transition-colors hover:bg-surface-container-high/60">
                        <div class="h-16 w-16 flex-shrink-0 overflow-hidden rounded-xl bg-surface-container-highest">
                            ${item.image ? `<img class="h-full w-full object-cover" alt="${item.title}" src="${item.image}">` : '<span class="material-symbols-outlined flex h-full w-full items-center justify-center text-primary">description</span>'}
                        </div>
                        <div class="min-w-0 flex-1">
                            <div class="flex items-start justify-between gap-4">
                                <h4 class="truncate font-headline text-lg font-semibold text-on-surface">${item.title}</h4>
                                <span class="font-label text-sm text-primary">${formatPeso(item.price * item.quantity)}</span>
                            </div>
                            <div class="mt-1 flex flex-wrap items-center gap-2">
                                <span class="rounded border border-tertiary/20 bg-on-tertiary-container/30 px-2 py-0.5 font-label text-xs text-tertiary">DIGITAL</span>
                                <span class="font-label text-xs text-on-surface-variant">${item.meta} • Qty ${item.quantity}</span>
                            </div>
                        </div>
                    </article>
                `).join('') : `
                    <div class="rounded-2xl border border-white/10 bg-surface-container-high/40 p-8 text-center">
                        <span class="material-symbols-outlined mb-3 text-5xl text-primary">shopping_cart</span>
                        <p class="font-headline text-xl text-on-surface">No resources found</p>
                        <p class="mt-2 text-sm text-on-surface-variant">Your checkout cart is empty.</p>
                    </div>
                `;
            }

            document.querySelector('[data-success-order-number]').textContent = buildOrderNumber();
            document.querySelector('[data-success-order-date]').textContent = today;
            document.querySelector('[data-success-payment]').textContent = checkout?.paymentMethod || 'Card';
            document.querySelector('[data-success-item-count]').textContent = `${itemCount} item${itemCount === 1 ? '' : 's'}`;
            document.querySelector('[data-success-subtotal]').textContent = formatPeso(subtotal);
            document.querySelector('[data-success-tax]').textContent = formatPeso(tax);
            document.querySelector('[data-success-discount]').textContent = `-${formatPeso(discount)}`;
            document.querySelector('[data-success-total]').textContent = formatPeso(total);
        }

        updateSuccessOrder();
        document.getElementById('success-download-now')?.addEventListener('click', () => {
            markOrderDownloaded();
            alert('Your download count has been updated. Open Downloads to access your resources.');
        });
        window.addEventListener('storage', (event) => {
            if (event.key === cartStorageKey) updateSuccessOrder();
        });
        window.addEventListener('ilearn:cart-updated', updateSuccessOrder);
        window.addEventListener('pageshow', updateSuccessOrder);
    </script>
    @include('partials.auth-ui')
</body>
</html>
