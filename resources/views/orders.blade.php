<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>iLearn Science - Orders</title>
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
                        tertiary: '#e6d8ff',
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
            background: radial-gradient(circle at 80% 10%, rgba(0, 212, 255, 0.08), transparent 34%), #10131a;
            color: #e1e2eb;
            overflow-x: hidden;
        }

        .glass-panel {
            background: rgba(29, 32, 38, 0.62);
            backdrop-filter: blur(14px);
            border: 1px solid rgba(168, 232, 255, 0.1);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.35);
        }

        .glow-border:hover {
            border-color: rgba(0, 212, 255, 0.45);
            box-shadow: 0 0 18px rgba(0, 212, 255, 0.18);
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>
<body class="font-body">
    <aside class="fixed left-0 top-0 z-40 hidden h-screen w-64 flex-col rounded-r-xl border-r border-outline-variant/10 bg-surface-container-low/70 pt-20 shadow-2xl shadow-primary/5 backdrop-blur-md lg:flex">
        <div class="mb-8 px-6">
            <a class="flex items-center gap-3" href="{{ route('home') }}">
                <img alt="iLearn Logo" class="h-12 w-12 rounded-full object-cover shadow-[0_0_14px_rgba(60,215,255,0.35)]" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBSBO56sJas6rQHK4VWyVv9zYvpVKsJP9aGm9I-zZ4Xp8RSH3TgIUxiNSFgYgSOEW-AD7ysC9slLFlObe30xoXRuZ2usUrzLaCr6C4UGL_A6_skVaPmwRJCOSWXxTz1ZZ5j3Ozg8zvZyd26aw1EyQvtPJzzb40BcFMiHArG9g9pAoV2NRyQC968hCEkCk1-k29rGdPmYK0TRKmKUkWUDd2gMt8XPS0sbLsyz2ySSzbMTEVa9zmrFuXcOziQjR6_EdazHqPNl2A2iRk">
                <div>
                    <h1 class="font-headline text-xl font-bold tracking-tight text-primary">iLearn Science</h1>
                    <p class="font-label text-xs text-on-surface-variant">Science Lab Alpha</p>
                </div>
            </a>
        </div>
        <nav class="flex-1 space-y-1 px-4">
            @foreach ([
                ['dashboard', 'Dashboard', route('dashboard'), false],
                ['receipt_long', 'Orders', route('orders'), true],
            ] as [$icon, $label, $href, $active])
                <a class="{{ $active ? 'border-l-4 border-primary bg-primary-container/20 text-primary shadow-[0_0_20px_rgba(60,215,255,0.25)]' : 'text-on-surface-variant hover:translate-x-1 hover:bg-surface-container-high/50 hover:text-primary' }} flex items-center gap-3 rounded-xl px-4 py-3 transition-all duration-300" href="{{ $href }}">
                    <span class="material-symbols-outlined">{{ $icon }}</span>
                    <span class="font-label text-sm">{{ $label }}</span>
                </a>
            @endforeach
        </nav>
    </aside>

    <header class="sticky top-0 z-50 flex w-full items-center justify-between border-b border-outline-variant/20 bg-surface/70 px-4 py-4 shadow-[0_0_15px_rgba(60,215,255,0.1)] backdrop-blur-xl md:px-gutter lg:pl-72">
        <a class="flex items-center gap-3" href="{{ route('home') }}">
            <img alt="iLearn Logo" class="h-10 w-10 rounded-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBSBO56sJas6rQHK4VWyVv9zYvpVKsJP9aGm9I-zZ4Xp8RSH3TgIUxiNSFgYgSOEW-AD7ysC9slLFlObe30xoXRuZ2usUrzLaCr6C4UGL_A6_skVaPmwRJCOSWXxTz1ZZ5j3Ozg8zvZyd26aw1EyQvtPJzzb40BcFMiHArG9g9pAoV2NRyQC968hCEkCk1-k29rGdPmYK0TRKmKUkWUDd2gMt8XPS0sbLsyz2ySSzbMTEVa9zmrFuXcOziQjR6_EdazHqPNl2A2iRk">
            <span class="font-headline text-2xl font-bold text-primary">iLearn Science</span>
        </a>
        <div data-auth-mount class="flex items-center gap-2"></div>
    </header>

    <main class="min-h-screen px-4 py-10 md:px-gutter lg:ml-64 lg:px-margin-desktop">
        <section class="mb-8 flex flex-col justify-between gap-4 md:flex-row md:items-end">
            <div>
                <p class="mb-2 font-label text-xs uppercase tracking-widest text-primary">Order Archive</p>
                <h2 class="font-headline text-4xl font-bold text-on-surface">Your Orders</h2>
                <p class="mt-2 max-w-2xl text-on-surface-variant">View receipts, download purchased resources, or send a previous order back to your cart.</p>
            </div>
            <a class="flex items-center gap-2 font-label text-sm text-primary hover:underline" href="{{ route('cart') }}">
                <span class="material-symbols-outlined text-sm">shopping_cart</span>
                Open Cart
            </a>
        </section>

        <section class="mb-gutter grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">
            @foreach ([
                ['receipt_long', 'Completed Orders', '0', 'orders-count'],
                ['download_done', 'Downloads Ready', '0', 'orders-downloads'],
                ['payments', 'Total Spent', '₱0.00', 'orders-spent'],
                ['schedule', 'Latest Order', 'No orders yet', 'orders-latest'],
            ] as [$icon, $label, $value, $key])
                <div class="glass-panel rounded-xl p-5">
                    <span class="material-symbols-outlined mb-4 text-3xl text-primary">{{ $icon }}</span>
                    <p class="font-label text-xs uppercase tracking-widest text-on-surface-variant">{{ $label }}</p>
                    <p class="mt-1 font-headline text-2xl font-semibold text-on-surface" data-order-stat="{{ $key }}">{{ $value }}</p>
                </div>
            @endforeach
        </section>

        <div class="grid grid-cols-1 gap-gutter xl:grid-cols-12">
            <section class="xl:col-span-8">
                <div class="glass-panel overflow-hidden rounded-2xl">
                    <div class="border-b border-white/10 p-6">
                        <h3 class="font-headline text-2xl font-semibold">Purchase Log</h3>
                    </div>
                    <div class="divide-y divide-white/10" data-orders-list></div>
                </div>
            </section>

            <aside class="xl:col-span-4">
                <div class="glass-panel sticky top-24 rounded-2xl p-6">
                    <div class="mb-6 flex items-center justify-between">
                        <div>
                            <p class="font-label text-xs uppercase tracking-widest text-primary">Receipt Details</p>
                            <h3 class="font-headline text-2xl font-semibold" data-receipt-number>#ILS-2024-X1</h3>
                        </div>
                        <span class="material-symbols-outlined text-primary">verified</span>
                    </div>
                    <div class="space-y-4" data-receipt-items></div>
                    <div class="mt-6 space-y-3 border-t border-white/10 pt-6">
                        <div class="flex justify-between text-sm text-on-surface-variant">
                            <span>Purchased</span>
                            <span data-receipt-date>Oct 24, 2024</span>
                        </div>
                        <div class="flex justify-between text-sm text-on-surface-variant">
                            <span>Payment</span>
                            <span data-receipt-method>GCash</span>
                        </div>
                        <div class="flex justify-between font-headline text-2xl text-primary">
                            <span>Total</span>
                            <span data-receipt-total>₱570.00</span>
                        </div>
                    </div>
                    <button class="order-action mt-6 flex w-full items-center justify-center gap-2 rounded-xl bg-primary py-3 font-label text-sm font-bold text-on-primary transition-all hover:brightness-110" data-action="download" data-order="ILS-2024-X1" data-receipt-download>
                        <span class="material-symbols-outlined">download</span>
                        Download Selected Order
                    </button>
                </div>
            </aside>
        </div>
    </main>

    <div class="fixed bottom-6 right-6 z-[70] hidden rounded-xl border border-primary/30 bg-surface-container-high px-5 py-3 text-sm text-primary shadow-[0_0_20px_rgba(0,212,255,0.25)]" data-orders-toast></div>

    <script>
        const cartStorageKey = 'ilearnScienceCartItems';
        const downloadedFilesStorageKey = 'ilearnScienceDownloadedFiles';
        const downloadedProductsStorageKey = 'ilearnScienceDownloadedProducts';
        const ordersStorageKey = 'ilearnScienceOrders';
        const checkoutStorageKey = 'ilearnScienceLastCheckout';
        const taxRate = 0.08;
        const discountAmount = 5;
        let orders = {};

        function getCartItems() {
            if (window.iLearnAuth?.getCartItems) return window.iLearnAuth.getCartItems();
            try {
                return JSON.parse(localStorage.getItem(cartStorageKey)) || [];
            } catch (error) {
                return [];
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

        function orderDate(value) {
            if (!value) return 'Recent checkout';
            const date = new Date(value);
            if (Number.isNaN(date.getTime())) return 'Recent checkout';
            return date.toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' });
        }

        function orderTitle(items = []) {
            if (!items.length) return 'Science resources';
            const names = items.slice(0, 2).map((item) => item.title || 'Science Resource').join(' + ');
            return items.length > 2 ? `${names} + ${items.length - 2} more` : names;
        }

        function normalizeCompletedOrder(order) {
            const items = (order?.items || []).map(normalizeCartItem);
            return {
                number: String(order?.orderNumber || order?.number || `#ILS-${Date.now()}`),
                date: orderDate(order?.checkedOutAt || order?.date),
                method: order?.paymentMethod || order?.method || 'Verified payment',
                total: formatPeso(order?.totals?.total ?? order?.total ?? items.reduce((sum, item) => sum + (item.price * item.quantity), 0)),
                status: order?.paymentStatus === 'verified' || order?.status === 'Completed' ? 'Completed' : 'Completed',
                title: orderTitle(items),
                items,
                checkedOutAt: order?.checkedOutAt || order?.date || '',
            };
        }

        function getLastCheckout() {
            try {
                return JSON.parse(localStorage.getItem(checkoutStorageKey) || 'null');
            } catch {
                return null;
            }
        }

        function getCustomerOrders() {
            const email = currentCustomerEmail();
            let completed = [];
            try {
                const allOrders = JSON.parse(localStorage.getItem(ordersStorageKey) || '{}') || {};
                completed = Array.isArray(allOrders[email]) ? allOrders[email] : [];
            } catch {
                completed = [];
            }
            const lastCheckout = getLastCheckout();
            if (lastCheckout?.items?.length) {
                const checkoutEmail = String(lastCheckout?.customer?.email || '').toLowerCase();
                if (!checkoutEmail || !email || checkoutEmail === email) {
                    completed = [lastCheckout, ...completed.filter((order) => order.orderNumber !== lastCheckout.orderNumber)];
                }
            }
            return completed
                .map(normalizeCompletedOrder)
                .filter((order) => order.items.length)
                .sort((a, b) => new Date(b.checkedOutAt || 0) - new Date(a.checkedOutAt || 0));
        }

        function updateOrderStats(customerOrders = getCustomerOrders()) {
            const downloads = customerOrders.reduce((sum, order) => sum + order.items.reduce((itemSum, item) => itemSum + item.quantity, 0), 0);
            const spent = customerOrders.reduce((sum, order) => sum + parsePeso(order.total), 0);
            const latest = customerOrders[0]?.number || 'No orders yet';
            document.querySelector('[data-order-stat="orders-count"]').textContent = customerOrders.length;
            document.querySelector('[data-order-stat="orders-downloads"]').textContent = downloads;
            document.querySelector('[data-order-stat="orders-spent"]').textContent = formatPeso(spent);
            document.querySelector('[data-order-stat="orders-latest"]').textContent = latest;
        }

        function renderOrderRows(customerOrders = getCustomerOrders()) {
            orders = Object.fromEntries(customerOrders.map((order) => [order.number, order]));
            const list = document.querySelector('[data-orders-list]');
            if (!list) return;
            updateOrderStats(customerOrders);
            if (!customerOrders.length) {
                list.innerHTML = `
                    <div class="p-8 text-center text-on-surface-variant">
                        <span class="material-symbols-outlined text-5xl text-primary">receipt_long</span>
                        <p class="mt-3 font-headline text-xl text-on-surface">No completed purchases yet</p>
                        <p class="mt-2 text-sm">Your purchase log will update here after a successful checkout.</p>
                    </div>
                `;
                renderReceipt(null);
                return;
            }
            list.innerHTML = customerOrders.map((order) => {
                const count = order.items.reduce((sum, item) => sum + item.quantity, 0);
                return `
                    <article class="order-row p-5 transition-all hover:bg-white/5" data-order="${order.number}">
                        <div class="grid grid-cols-1 gap-4 md:grid-cols-[1fr_auto] md:items-center">
                            <div>
                                <div class="mb-2 flex flex-wrap items-center gap-3">
                                    <span class="font-label text-sm text-primary">${order.number}</span>
                                    <span class="rounded-full border border-primary/20 bg-primary/10 px-3 py-1 font-label text-xs text-primary">${order.status}</span>
                                </div>
                                <h4 class="font-headline text-xl font-semibold text-on-surface">${order.title}</h4>
                                <p class="mt-1 font-label text-xs text-on-surface-variant">${order.date} • ${count} item${count === 1 ? '' : 's'} • ${order.total}</p>
                            </div>
                            <div class="flex flex-wrap gap-2">
                                <button class="order-action rounded-lg border border-primary/30 px-4 py-2 font-label text-xs text-primary transition-all hover:bg-primary/10" data-action="view" data-order="${order.number}">View Receipt</button>
                                <button class="order-action rounded-lg border border-outline-variant/30 px-4 py-2 font-label text-xs text-on-surface-variant transition-all hover:border-primary hover:text-primary" data-action="download" data-order="${order.number}">Download Files</button>
                                <button class="order-action rounded-lg bg-primary px-4 py-2 font-label text-xs font-bold text-on-primary transition-all hover:brightness-110" data-action="reorder" data-order="${order.number}">Reorder</button>
                            </div>
                        </div>
                    </article>
                `;
            }).join('');
            renderReceipt(customerOrders[0].number);
        }

        function getLiveCartItems() {
            return getCartItems().map(normalizeCartItem);
        }

        function calculateCartTotals(items) {
            const subtotal = items.reduce((sum, item) => sum + (item.price * item.quantity), 0);
            const tax = subtotal * taxRate;
            const discount = subtotal > 0 ? discountAmount : 0;
            return {
                subtotal,
                tax,
                discount,
                total: subtotal + tax - discount,
            };
        }

        function getCurrentCartOrder() {
            const items = getLiveCartItems();
            const itemCount = items.reduce((sum, item) => sum + item.quantity, 0);
            const names = items.slice(0, 3).map((item) => item.title).join(' + ');
            const extra = items.length > 3 ? ` + ${items.length - 3} more` : '';
            const totals = calculateCartTotals(items);

            return {
                number: 'ILS-2026-CART',
                date: 'Live Cart',
                method: 'Pending Checkout',
                total: formatPeso(totals.total),
                title: itemCount > 0 ? `${names}${extra}` : 'No products in cart',
                countLabel: `${itemCount} item${itemCount === 1 ? '' : 's'}`,
                items,
            };
        }

        function saveCartItems(items) {
            if (window.iLearnAuth?.setCartItems) {
                window.iLearnAuth.setCartItems(items);
                updateCartCount();
                return;
            }
            localStorage.setItem(cartStorageKey, JSON.stringify(items));
            updateCartCount();
        }

        function updateCartCount() {
            const total = getLiveCartItems().reduce((sum, item) => sum + item.quantity, 0);
            const signedIn = window.iLearnAuth?.isSignedIn ? window.iLearnAuth.isSignedIn() : false;
            document.querySelectorAll('[data-cart-count]').forEach((badge) => {
                badge.textContent = total;
                badge.classList.toggle('hidden', !signedIn || total === 0);
                badge.classList.toggle('flex', signedIn && total > 0);
            });
        }

        function syncCurrentCartRow() {
            const order = getCurrentCartOrder();
            const row = document.querySelector('.order-row[data-order="ILS-2026-CART"]');
            if (!row) return;

            row.querySelector('h4').textContent = order.title;
            row.querySelector('p').textContent = `${order.date} • ${order.countLabel} • ${order.total}`;
        }

        function showToast(message) {
            const toast = document.querySelector('[data-orders-toast]');
            toast.textContent = message;
            toast.classList.remove('hidden');
            clearTimeout(window.ordersToastTimer);
            window.ordersToastTimer = setTimeout(() => toast.classList.add('hidden'), 2400);
        }

        function renderReceipt(orderId) {
            const order = orderId ? orders[orderId] : null;
            if (!order) {
                document.querySelector('[data-receipt-number]').textContent = 'No Receipt';
                document.querySelector('[data-receipt-date]').textContent = '-';
                document.querySelector('[data-receipt-method]').textContent = '-';
                document.querySelector('[data-receipt-total]').textContent = '₱0.00';
                document.querySelector('[data-receipt-download]').dataset.order = '';
                document.querySelector('[data-receipt-items]').innerHTML = `
                    <div class="rounded-xl border border-white/10 bg-white/5 p-5 text-center">
                        <span class="material-symbols-outlined mb-2 text-4xl text-primary">receipt_long</span>
                        <p class="font-headline text-lg text-on-surface">No purchase selected</p>
                        <p class="mt-1 text-sm text-on-surface-variant">Successful checkouts will generate receipts here.</p>
                    </div>
                `;
                return;
            }
            document.querySelector('[data-receipt-number]').textContent = order.number;
            document.querySelector('[data-receipt-date]').textContent = order.date;
            document.querySelector('[data-receipt-method]').textContent = order.method;
            document.querySelector('[data-receipt-total]').textContent = order.total;
            document.querySelector('[data-receipt-download]').dataset.order = order.number;
            document.querySelector('[data-receipt-items]').innerHTML = order.items.length ? order.items.map((item) => `
                <div class="flex gap-3 rounded-xl border border-white/10 bg-white/5 p-3">
                    <img class="h-14 w-14 rounded-lg object-cover" src="${item.image}" alt="${item.title}">
                    <div class="min-w-0 flex-1">
                        <p class="truncate font-label text-sm text-on-surface">${item.title}</p>
                        <p class="text-xs text-on-surface-variant">${item.meta} • Qty ${item.quantity || 1}</p>
                        <p class="mt-1 font-label text-sm text-primary">${formatPeso(parsePeso(item.price) * (Number(item.quantity) || 1))}</p>
                    </div>
                </div>
            `).join('') : `
                <div class="rounded-xl border border-white/10 bg-white/5 p-5 text-center">
                    <span class="material-symbols-outlined mb-2 text-4xl text-primary">shopping_cart</span>
                    <p class="font-headline text-lg text-on-surface">No products in cart</p>
                    <p class="mt-1 text-sm text-on-surface-variant">Add a resource to generate a live receipt.</p>
                </div>
            `;
            document.querySelectorAll('.order-row').forEach((row) => {
                row.classList.toggle('bg-white/5', row.dataset.order === orderId);
            });
        }

        function reorder(orderId) {
            const order = orders[orderId];
            if (!order) return;
            const cart = getCartItems();
            order.items.forEach((item) => {
                const existing = cart.find((cartItem) => cartItem.id === item.id);
                if (existing) {
                    existing.quantity = (Number(existing.quantity) || 1) + 1;
                } else {
                    cart.push({ ...item, quantity: 1 });
                }
            });
            saveCartItems(cart);
            syncCurrentCartRow();
            showToast(`${order.items.length} item${order.items.length === 1 ? '' : 's'} added back to your cart.`);
        }

        function markOrderDownloaded(orderId) {
            const email = currentCustomerEmail();
            const order = orders[orderId];
            if (!email || !order?.items?.length) return;

            const itemCount = order.items.reduce((sum, item) => sum + (Number(item.quantity) || 1), 0);
            const downloads = JSON.parse(localStorage.getItem(downloadedFilesStorageKey) || '{}') || {};
            downloads[email] = downloads[email] || {};
            downloads[email][order.number || orderId] = Math.max(Number(downloads[email][order.number || orderId]) || 0, itemCount);
            localStorage.setItem(downloadedFilesStorageKey, JSON.stringify(downloads));

            const orderNumber = order.number || orderId;
            const productDownloads = JSON.parse(localStorage.getItem(downloadedProductsStorageKey) || '{}') || {};
            productDownloads[email] = productDownloads[email] || {};
            productDownloads[email][orderNumber] = {};
            order.items.forEach((item) => {
                productDownloads[email][orderNumber][item.id] = {
                    id: item.id,
                    title: item.title,
                    meta: item.meta,
                    price: item.price,
                    image: item.image,
                    quantity: Number(item.quantity) || 1,
                };
            });
            localStorage.setItem(downloadedProductsStorageKey, JSON.stringify(productDownloads));
        }

        document.addEventListener('click', (event) => {
            const button = event.target.closest('.order-action');
            if (!button) return;
            event.preventDefault();
            const orderId = button.dataset.order;
            if (!orderId) return;
            if (button.dataset.action === 'view') {
                renderReceipt(orderId);
                showToast(`Receipt ${orderId} opened.`);
            }
            if (button.dataset.action === 'download') {
                renderReceipt(orderId);
                markOrderDownloaded(orderId);
                showToast(`Downloads for ${orderId} are ready.`);
            }
            if (button.dataset.action === 'reorder') {
                renderReceipt(orderId);
                reorder(orderId);
            }
        });

        function refreshLiveCartReceipt() {
            renderOrderRows();
            updateCartCount();
        }

        renderOrderRows();
        updateCartCount();
        window.addEventListener('storage', (event) => {
            if ([ordersStorageKey, checkoutStorageKey, cartStorageKey].includes(event.key)) refreshLiveCartReceipt();
        });
        window.addEventListener('ilearn:cart-updated', refreshLiveCartReceipt);
        window.addEventListener('ilearn:orders-updated', refreshLiveCartReceipt);
        window.addEventListener('pageshow', refreshLiveCartReceipt);
    </script>
    @include('partials.auth-ui')
</body>
</html>
