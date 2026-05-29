<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>iLearn Science - Secure Checkout</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
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
                        'on-surface': '#e1e2eb',
                        'on-background': '#e1e2eb',
                        'on-surface-variant': '#bbc9cf',
                        outline: '#859398',
                        'outline-variant': '#3c494e',
                        primary: '#a8e8ff',
                        'primary-container': '#00d4ff',
                        'primary-fixed-dim': '#3cd7ff',
                        'on-primary': '#003642',
                        'on-primary-container': '#00586b',
                        tertiary: '#e6d8ff',
                        'tertiary-fixed': '#e9ddff',
                        error: '#ffb4ab',
                    },
                    spacing: { gutter: '24px', 'container-max': '1280px' },
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
        body {
            background:
                radial-gradient(circle at 12% 8%, rgba(60, 215, 255, .13), transparent 32%),
                radial-gradient(circle at 86% 18%, rgba(209, 188, 255, .12), transparent 34%),
                linear-gradient(135deg, #0b0e14 0%, #10131a 52%, #151827 100%);
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
            background-size: 54px 54px;
        }
        .checkout-field {
            width: 100%;
            border: 1px solid rgba(187, 201, 207, .22);
            border-radius: 16px;
            background: rgba(11, 14, 20, .78);
            color: #e1e2eb;
            padding: 22px 16px 10px;
            outline: none;
            transition: border-color .18s ease, box-shadow .18s ease, background .18s ease;
        }
        .checkout-field:focus {
            border-color: rgba(60, 215, 255, .78);
            box-shadow: 0 0 0 4px rgba(60, 215, 255, .09), 0 0 18px rgba(60, 215, 255, .18);
            background: rgba(11, 14, 20, .96);
        }
        .floating-label {
            left: 16px;
            pointer-events: none;
            position: absolute;
            top: 13px;
            color: #bbc9cf;
            font-family: "JetBrains Mono", monospace;
            font-size: 11px;
            letter-spacing: .08em;
            text-transform: uppercase;
            transition: color .18s ease, transform .18s ease, opacity .18s ease;
        }
        .checkout-field:focus + .floating-label,
        .checkout-field:not(:placeholder-shown) + .floating-label,
        select.checkout-field + .floating-label {
            color: #a8e8ff;
            opacity: .9;
            transform: translateY(-4px) scale(.92);
        }
        .checkout-error-field {
            border-color: rgba(255, 180, 171, .9) !important;
            box-shadow: 0 0 16px rgba(255, 180, 171, .22) !important;
        }
        .checkout-error-text {
            min-height: 18px;
            color: #ffb4ab;
            font-family: "JetBrains Mono", monospace;
            font-size: 11px;
        }
        .payment-option {
            transition: transform .18s ease, border-color .18s ease, background .18s ease, box-shadow .18s ease;
        }
        .payment-option:hover {
            border-color: rgba(60, 215, 255, .5);
            box-shadow: 0 0 20px rgba(60, 215, 255, .15);
            transform: translateY(-2px);
        }
        .payment-option.is-selected {
            border-color: #3cd7ff;
            background: rgba(0, 212, 255, .13);
            color: #a8e8ff;
            box-shadow: 0 0 24px rgba(0, 212, 255, .22);
        }
        .checkout-button-disabled {
            cursor: not-allowed;
            filter: grayscale(.25);
            opacity: .48;
            pointer-events: none;
        }
        .checkout-spinner {
            animation: checkout-spin .75s linear infinite;
            border: 2px solid rgba(0, 54, 66, .25);
            border-top-color: #003642;
            border-radius: 999px;
            display: inline-block;
            height: 16px;
            width: 16px;
        }
        .promo-success {
            animation: promo-pop .45s cubic-bezier(.2, 1.2, .2, 1);
        }
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
        @keyframes promo-pop {
            0% { transform: scale(.96); opacity: .4; }
            100% { transform: scale(1); opacity: 1; }
        }
        @keyframes checkout-spin { to { transform: rotate(360deg); } }
        @media (max-width: 767px) {
            body { padding-bottom: 104px; }
        }
    </style>
</head>
<body class="font-body text-on-background selection:bg-primary-container selection:text-on-primary">
    <div class="pointer-events-none fixed inset-0 z-0 science-grid opacity-70"></div>
    <div class="pointer-events-none fixed inset-0 z-0 overflow-hidden">
        <div class="absolute left-[8%] top-[18%] h-44 w-72 rounded-full border border-primary/15 rotate-[-18deg]"></div>
        <div class="absolute right-[9%] top-[12%] h-64 w-64 rounded-full border border-tertiary/15 rotate-12"></div>
        <div class="absolute left-[20%] top-[36%] h-2 w-2 rounded-full bg-primary-container shadow-[0_0_14px_#00d4ff]"></div>
        <div class="absolute right-[24%] top-[22%] h-2 w-2 rounded-full bg-tertiary shadow-[0_0_14px_#e6d8ff]"></div>
    </div>

    <header class="sticky top-0 z-50 border-b border-primary/10 bg-surface/75 backdrop-blur-2xl">
        <nav class="mx-auto flex max-w-container-max items-center justify-between gap-4 px-4 py-4 lg:px-8">
            <a class="flex min-w-0 items-center gap-3" href="{{ route('home') }}">
                <img alt="iLearn Science Logo" class="h-11 w-11 rounded-full border border-primary/20 object-contain shadow-[0_0_16px_rgba(60,215,255,.2)]" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBRlFDOjxkn2sD8rhXX_C9oZtkMTA0F2zIbuZyG9wIVQvasApaG3RmYgyG2Pvp2jL5OiIRqxkIx75Tsq4ci10yb8-EExxTPy1tjBBGxv1_B3mcIr9zJxx3s_rlbkerqWnrBAlY0nMbog5hJGyrtHKkEW2ogz66o1R7h0OAPWRoU3Y4Dy9K6RZJItpyPL-ZXT9Xn5m73Ru9ye9BaZqOLXhg7JJvqaSDws24wBFWt5ncypHJMLUZ0mtJgObLNXtQbZinBc0Bg4jGSDVg">
                <span class="truncate font-headline text-xl font-bold text-primary md:text-2xl">iLearn Science</span>
            </a>
            <div class="flex items-center gap-2 rounded-full border border-primary/20 bg-primary-container/10 px-3 py-2 font-label text-xs uppercase tracking-widest text-primary md:px-4">
                <span class="material-symbols-outlined text-[18px]">lock</span>
                <span>Secure Checkout</span>
            </div>
            <div class="flex items-center gap-3">
                <a class="relative flex h-11 w-11 items-center justify-center rounded-full border border-primary/20 bg-surface-container/70 text-primary transition-all hover:border-primary/50" href="{{ route('cart') }}" data-cart-link aria-label="Cart">
                    <span class="material-symbols-outlined">shopping_cart</span>
                    <span class="absolute -right-2 -top-2 flex h-5 min-w-5 items-center justify-center rounded-full bg-primary-container px-1 font-label text-[10px] font-bold text-on-primary shadow-[0_0_12px_rgba(0,212,255,.65)]" data-cart-count>0</span>
                </a>
                <a class="flex items-center gap-2 rounded-full border border-primary/25 px-3 py-2.5 font-label text-sm text-primary transition-all hover:bg-primary/10 sm:px-4" href="{{ route('cart') }}">
                    <span class="material-symbols-outlined text-[18px]">arrow_back</span>
                    <span class="hidden sm:inline">Back to Cart</span>
                </a>
            </div>
        </nav>
    </header>

    <main class="relative z-10 mx-auto max-w-container-max px-4 py-8 lg:px-8">
        <section class="mb-8">
            <div class="flex flex-col justify-between gap-5 lg:flex-row lg:items-end">
                <div>
                    <p class="font-label text-xs uppercase tracking-[0.34em] text-primary">Digital Learning Checkout</p>
                    <h1 class="mt-2 font-headline text-4xl font-bold text-on-surface md:text-5xl">Complete your purchase securely.</h1>
                    <p class="mt-3 max-w-2xl text-on-surface-variant">Fast checkout for downloadable science materials. Your learning resources are delivered instantly after payment.</p>
                </div>
                <div class="glass-panel flex items-center gap-2 rounded-2xl p-2">
                    @foreach ([['shopping_cart', 'Cart', true], ['payments', 'Checkout', true], ['verified', 'Payment', false], ['task_alt', 'Complete', false]] as [$icon, $label, $active])
                        <div class="{{ $active ? 'bg-primary-container text-on-primary' : 'text-on-surface-variant' }} flex items-center gap-2 rounded-xl px-3 py-2 font-label text-xs">
                            <span class="material-symbols-outlined text-[18px]">{{ $icon }}</span>
                            <span class="hidden sm:inline">{{ $label }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <div class="grid grid-cols-1 gap-8 lg:grid-cols-[minmax(0,1fr)_420px]">
            <div class="space-y-6">
                <section class="glass-panel rounded-3xl p-5 md:p-7">
                    <div class="mb-6 flex items-start justify-between gap-4">
                        <div>
                            <h2 class="font-headline text-2xl font-semibold">Contact Information</h2>
                            <p class="mt-1 text-sm text-on-surface-variant">Auto-saved while you type.</p>
                        </div>
                        <span id="autosave-indicator" class="rounded-full border border-primary/20 bg-primary-container/10 px-3 py-1 font-label text-[10px] uppercase tracking-widest text-primary">Saved</span>
                    </div>
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                        <label class="relative block">
                            <input class="checkout-field" data-checkout-field="fullName" placeholder=" " type="text" autocomplete="name">
                            <span class="floating-label">Full Name</span>
                            <p class="checkout-error-text mt-1" data-error-for="fullName"></p>
                        </label>
                        <label class="relative block">
                            <input class="checkout-field pr-12" data-checkout-field="email" placeholder=" " type="email" autocomplete="email">
                            <span class="floating-label">Email Address</span>
                            <span id="email-verify-status" class="absolute right-4 top-4 text-on-surface-variant" title="Email verification status">
                                <span class="material-symbols-outlined text-[22px]">mark_email_unread</span>
                            </span>
                            <p class="checkout-error-text mt-1" data-error-for="email"></p>
                        </label>
                        <label class="relative block md:col-span-2">
                            <input class="checkout-field" data-checkout-field="school" placeholder=" " type="text" autocomplete="organization">
                            <span class="floating-label">School / Organization (Optional)</span>
                            <p class="checkout-error-text mt-1"></p>
                        </label>
                    </div>
                </section>

                <section class="glass-panel rounded-3xl p-5 md:p-7">
                    <div class="mb-6">
                        <h2 class="font-headline text-2xl font-semibold">Payment Method</h2>
                        <p class="mt-1 text-sm text-on-surface-variant">Select one secure payment option.</p>
                    </div>
                    <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 xl:grid-cols-4">
                        @foreach ([['payments', 'GCash', 'gcash', 'E-wallet'], ['account_balance_wallet', 'Maya', 'maya', 'E-wallet'], ['public', 'PayPal', 'paypal', 'Global'], ['credit_card', 'Credit/Debit Card', 'card', 'Encrypted']] as [$icon, $label, $method, $meta])
                            <button class="payment-option rounded-2xl border border-white/10 bg-surface-container-low/60 p-4 text-left" type="button" data-payment-method="{{ $method }}">
                                <div class="flex items-start justify-between gap-3">
                                    <span class="flex h-12 w-12 items-center justify-center rounded-xl border border-primary/20 bg-primary-container/10 text-primary">
                                        <span class="material-symbols-outlined">{{ $icon }}</span>
                                    </span>
                                    <span class="rounded-full bg-surface-container-high px-2 py-1 font-label text-[10px] text-on-surface-variant">{{ $meta }}</span>
                                </div>
                                <p class="mt-4 font-headline text-lg font-semibold">{{ $label }}</p>
                                <p class="mt-1 text-sm text-on-surface-variant">Secure payment badge active</p>
                            </button>
                        @endforeach
                    </div>
                    <p class="checkout-error-text mt-3" data-error-for="paymentMethod"></p>

                    <div id="card-fields" class="mt-5 hidden grid-cols-1 gap-4 md:grid-cols-3">
                        <label class="relative block md:col-span-3">
                            <input class="checkout-field" data-checkout-field="cardNumber" placeholder=" " inputmode="numeric" maxlength="19">
                            <span class="floating-label">Card Number</span>
                            <p class="checkout-error-text mt-1" data-error-for="cardNumber"></p>
                        </label>
                        <label class="relative block">
                            <input class="checkout-field" data-checkout-field="expiry" placeholder=" " inputmode="numeric" maxlength="5">
                            <span class="floating-label">Expiry</span>
                            <p class="checkout-error-text mt-1" data-error-for="expiry"></p>
                        </label>
                        <label class="relative block">
                            <input class="checkout-field" data-checkout-field="cvv" placeholder=" " inputmode="numeric" maxlength="4" type="password">
                            <span class="floating-label">CVV</span>
                            <p class="checkout-error-text mt-1" data-error-for="cvv"></p>
                        </label>
                        <div class="flex items-center gap-2 rounded-2xl border border-primary/20 bg-primary-container/10 px-4 py-3 text-sm text-on-surface-variant">
                            <span class="material-symbols-outlined text-primary">shield_lock</span>
                            Encrypted card verification
                        </div>
                    </div>
                </section>

                <section class="glass-panel rounded-3xl p-5 md:p-7">
                    <button id="billing-toggle" class="flex w-full items-center justify-between gap-4 text-left" type="button">
                        <span>
                            <span class="block font-headline text-2xl font-semibold">Billing Address</span>
                            <span class="mt-1 block text-sm text-on-surface-variant">Collapsed by default for digital products. Expand only for invoice needs.</span>
                        </span>
                        <span class="material-symbols-outlined text-primary transition-transform" id="billing-arrow">expand_more</span>
                    </button>
                    <div id="billing-fields" class="mt-5 hidden grid-cols-1 gap-4 md:grid-cols-2">
                        <label class="relative block">
                            <select class="checkout-field" data-checkout-field="country">
                                <option value="">Select country</option>
                                <option>Philippines</option>
                                <option>United States</option>
                                <option>Singapore</option>
                                <option>United Kingdom</option>
                            </select>
                            <span class="floating-label">Country</span>
                        </label>
                        <label class="relative block">
                            <input class="checkout-field" data-checkout-field="province" placeholder=" ">
                            <span class="floating-label">Province / Region</span>
                        </label>
                        <label class="relative block md:col-span-2">
                            <textarea class="checkout-field min-h-[104px]" data-checkout-field="billingAddress" placeholder=" "></textarea>
                            <span class="floating-label">Billing Address</span>
                        </label>
                    </div>
                </section>

                <section class="glass-panel rounded-3xl p-5 md:p-7">
                    <h2 class="font-headline text-2xl font-semibold">Promo Code</h2>
                    <p class="mt-1 text-sm text-on-surface-variant">Apply coupons or school discounts.</p>
                    <div class="mt-5 flex flex-col gap-3 sm:flex-row">
                        <input id="promo-code" class="checkout-field !py-4" placeholder="SCIENCE10">
                        <button id="apply-promo" class="rounded-2xl bg-primary-container px-6 py-4 font-label text-sm font-bold text-on-primary shadow-[0_0_20px_rgba(0,212,255,.3)] transition-all hover:scale-[1.02]" type="button">Apply</button>
                    </div>
                    <p id="promo-message" class="mt-3 min-h-[20px] font-label text-xs text-primary"></p>
                </section>
            </div>

            <aside class="lg:sticky lg:top-24 lg:self-start">
                <section class="glass-panel rounded-3xl p-5 md:p-7">
                    <div class="mb-6 flex items-center justify-between gap-4">
                        <div>
                            <h2 class="font-headline text-2xl font-semibold">Order Summary</h2>
                            <p class="text-sm text-on-surface-variant">Instant digital delivery</p>
                        </div>
                        <span class="flex h-12 w-12 items-center justify-center rounded-2xl border border-primary/20 bg-primary-container/10 text-primary">
                            <span class="material-symbols-outlined">bolt</span>
                        </span>
                    </div>
                    <div class="space-y-4" data-checkout-items></div>
                    <div class="mt-6 space-y-3 border-t border-white/10 pt-5">
                        <div class="flex justify-between font-label text-sm text-on-surface-variant">
                            <span>Subtotal</span>
                            <span data-checkout-subtotal>₱0.00</span>
                        </div>
                        <div class="flex justify-between font-label text-sm text-primary">
                            <span>Discounts</span>
                            <span data-checkout-discount>-₱0.00</span>
                        </div>
                        <div class="flex justify-between border-t border-white/10 pt-4 font-headline text-2xl text-primary">
                            <span>Total</span>
                            <span data-checkout-total>₱0.00</span>
                        </div>
                    </div>
                    <div class="mt-6 rounded-2xl border border-primary/20 bg-primary-container/10 p-4">
                        <div class="flex gap-3">
                            <span class="material-symbols-outlined text-primary">download_done</span>
                            <p class="text-sm text-on-surface-variant">Your downloadable learning materials will be sent instantly to your email after successful payment.</p>
                        </div>
                    </div>
                    <div class="mt-5 grid grid-cols-3 gap-2 text-center">
                        @foreach ([['lock', 'SSL'], ['verified_user', 'Secure'], ['history', 'Refund']] as [$icon, $label])
                            <div class="rounded-xl border border-white/10 bg-surface-container-low/60 p-3">
                                <span class="material-symbols-outlined text-primary">{{ $icon }}</span>
                                <p class="font-label text-[10px] uppercase tracking-widest text-on-surface-variant">{{ $label }}</p>
                            </div>
                        @endforeach
                    </div>
                    <p class="mt-5 text-center text-xs text-on-surface-variant">Refund policy note: digital items may be refunded before files are downloaded.</p>
                    <button id="complete-purchase" class="checkout-button-disabled mt-6 flex w-full items-center justify-center gap-2 rounded-2xl bg-primary-container px-6 py-4 font-label text-sm font-bold text-on-primary shadow-[0_0_28px_rgba(0,212,255,.35)] transition-all hover:scale-[1.01]" type="button" disabled>
                        <span class="material-symbols-outlined">rocket_launch</span>
                        Complete Purchase
                    </button>
                    <p id="checkout-helper" class="mt-3 text-center font-label text-[11px] text-on-surface-variant">Complete contact and payment details to continue.</p>
                </section>
            </aside>
        </div>
    </main>

    <div class="fixed bottom-0 left-0 right-0 z-40 border-t border-primary/10 bg-surface/90 p-4 backdrop-blur-2xl md:hidden">
        <button id="mobile-complete-purchase" class="checkout-button-disabled flex w-full items-center justify-center gap-2 rounded-2xl bg-primary-container px-6 py-4 font-label text-sm font-bold text-on-primary shadow-[0_0_28px_rgba(0,212,255,.35)]" type="button" disabled>
            <span class="material-symbols-outlined">download</span>
            Download Instantly
        </button>
    </div>

    <div id="checkout-success-modal" class="fixed inset-0 z-[110] hidden items-center justify-center bg-surface-container-lowest/75 p-6 backdrop-blur-xl">
        <div class="glass-panel max-w-md rounded-3xl border-primary/40 p-8 text-center shadow-[0_0_38px_rgba(0,212,255,.25)]">
            <div class="mx-auto mb-6 flex h-20 w-20 items-center justify-center rounded-full border-2 border-primary-container bg-primary-container/20 shadow-[0_0_25px_rgba(0,212,255,.4)]">
                <span class="material-symbols-outlined text-5xl text-primary-container" style="font-variation-settings: 'FILL' 1;">check_circle</span>
            </div>
            <h2 class="font-headline text-3xl font-semibold text-primary">Checkout Successful!</h2>
            <p class="mt-3 text-on-surface-variant">Order <span data-modal-order-number>#ILS-LIVE</span> confirmed. Your instant downloads are being prepared.</p>
            <button class="mt-6 rounded-2xl bg-primary-container px-6 py-3 font-label text-sm font-bold text-on-primary">Instant Download Ready</button>
        </div>
    </div>

    <script>
        const cartStorageKey = 'ilearnScienceCartItems';
        const formStorageKey = 'ilearnScienceCheckoutForm';
        const taxRate = 0;
        let promoDiscount = 0;
        let selectedPaymentMethod = '';
        let emailVerified = false;
        let checkoutProcessing = false;
        const field = (name) => document.querySelector(`[data-checkout-field="${name}"]`);
        const fieldValue = (name) => field(name)?.value.trim() || '';
        const parsePeso = (value) => Number.parseFloat(String(value).replace(/[₱,]/g, '')) || 0;
        const formatPeso = (value) => `₱${Math.max(0, value).toFixed(2)}`;
        const emailIsValid = (value) => /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(value) && !/(fake|invalid)/i.test(value);

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

        function getLiveCartItems() {
            if (window.iLearnAuth?.getCartItems) return window.iLearnAuth.getCartItems().map(normalizeCartItem);
            if (localStorage.getItem(cartStorageKey) === null) {
                return [];
            }
            try {
                return (JSON.parse(localStorage.getItem(cartStorageKey)) || []).map(normalizeCartItem);
            } catch {
                return [];
            }
        }

        function getTotals() {
            const items = getLiveCartItems();
            const subtotal = items.reduce((sum, item) => sum + item.price * item.quantity, 0);
            const discount = Math.min(subtotal, promoDiscount);
            const tax = subtotal * taxRate;
            return { items, subtotal, discount, tax, total: subtotal + tax - discount };
        }

        function setFieldError(name, message = '') {
            const input = field(name);
            const error = document.querySelector(`[data-error-for="${name}"]`);
            if (input) input.classList.toggle('checkout-error-field', Boolean(message));
            if (error) error.textContent = message;
        }

        function cardNumberIsValid(value) {
            const digits = value.replace(/\D/g, '');
            return /^\d{13,19}$/.test(digits);
        }

        function expiryIsValid(value) {
            const match = value.match(/^(\d{2})\/(\d{2})$/);
            if (!match) return false;
            const month = Number(match[1]);
            const year = 2000 + Number(match[2]);
            if (month < 1 || month > 12) return false;
            return new Date(year, month, 0, 23, 59, 59) >= new Date();
        }

        function validateCheckout(showErrors = false) {
            const errors = {};
            if (fieldValue('fullName').length < 3) errors.fullName = 'Enter your complete name.';
            if (!emailIsValid(fieldValue('email'))) errors.email = 'Enter a valid email address.';
            if (emailIsValid(fieldValue('email')) && !emailVerified) errors.email = 'Email verification indicator must be active.';
            if (!selectedPaymentMethod) errors.paymentMethod = 'Please select a payment method.';
            if (selectedPaymentMethod === 'card') {
                if (!cardNumberIsValid(fieldValue('cardNumber'))) errors.cardNumber = 'Enter a valid card number.';
                if (!expiryIsValid(fieldValue('expiry'))) errors.expiry = 'Enter a valid future expiry date.';
                if (!/^\d{3,4}$/.test(fieldValue('cvv'))) errors.cvv = 'Enter a valid CVV.';
            }
            if (!getLiveCartItems().length) errors.cart = 'Add products before checkout.';

            ['fullName', 'email', 'cardNumber', 'expiry', 'cvv'].forEach((name) => setFieldError(name, showErrors ? (errors[name] || '') : ''));
            const paymentError = document.querySelector('[data-error-for="paymentMethod"]');
            if (paymentError) paymentError.textContent = showErrors ? (errors.paymentMethod || errors.cart || '') : '';

            const valid = Object.keys(errors).length === 0;
            document.querySelectorAll('#complete-purchase, #mobile-complete-purchase').forEach((button) => {
                button.disabled = !valid;
                button.classList.toggle('checkout-button-disabled', !valid);
            });
            const helper = document.getElementById('checkout-helper');
            if (helper) {
                helper.textContent = valid ? 'Ready for secure digital checkout.' : 'Complete contact and payment details to continue.';
                helper.classList.toggle('text-primary', valid);
                helper.classList.toggle('text-error', false);
            }
            return valid;
        }

        function updateEmailStatus() {
            const status = document.getElementById('email-verify-status');
            if (!status) return;
            if (emailVerified) {
                status.innerHTML = '<span class="material-symbols-outlined text-[22px] text-primary">verified</span>';
            } else if (emailIsValid(fieldValue('email'))) {
                status.innerHTML = '<span class="material-symbols-outlined text-[22px] text-tertiary">mark_email_read</span>';
                setTimeout(() => {
                    if (emailIsValid(fieldValue('email'))) {
                        emailVerified = true;
                        updateEmailStatus();
                        validateCheckout(false);
                    }
                }, 500);
            } else {
                status.innerHTML = '<span class="material-symbols-outlined text-[22px] text-on-surface-variant">mark_email_unread</span>';
            }
        }

        function updateSummary() {
            const { items, subtotal, discount, total } = getTotals();
            const list = document.querySelector('[data-checkout-items]');
            const count = items.reduce((sum, item) => sum + item.quantity, 0);
            document.querySelectorAll('[data-cart-count]').forEach((badge) => badge.textContent = count);
            if (list) {
                list.innerHTML = items.length ? items.map((item) => `
                    <div class="flex items-start justify-between gap-3 rounded-2xl border border-white/5 bg-surface-container-low/50 p-3">
                        <div class="flex min-w-0 gap-3">
                            <img class="h-14 w-14 flex-shrink-0 rounded-xl object-cover" src="${item.image}" alt="${item.title}">
                            <div class="min-w-0">
                                <p class="truncate font-semibold text-on-surface">${item.title}</p>
                                <div class="mt-1 flex flex-wrap items-center gap-2">
                                    <span class="rounded-full bg-primary-container/10 px-2 py-0.5 font-label text-[10px] text-primary">${item.meta}</span>
                                    <span class="font-label text-[11px] text-on-surface-variant">Qty ${item.quantity}</span>
                                </div>
                            </div>
                        </div>
                        <span class="whitespace-nowrap font-label text-sm text-primary">${formatPeso(item.price * item.quantity)}</span>
                    </div>
                `).join('') : `
                    <div class="rounded-2xl border border-white/5 bg-surface-container-low/50 p-6 text-center">
                        <span class="material-symbols-outlined text-4xl text-primary">shopping_cart</span>
                        <p class="mt-2 font-semibold">Your cart is empty</p>
                    </div>`;
            }
            document.querySelector('[data-checkout-subtotal]').textContent = formatPeso(subtotal);
            document.querySelector('[data-checkout-discount]').textContent = `-${formatPeso(discount)}`;
            document.querySelector('[data-checkout-total]').textContent = formatPeso(total);
            validateCheckout(false);
        }

        function saveForm() {
            const data = {};
            document.querySelectorAll('[data-checkout-field]').forEach((input) => data[input.dataset.checkoutField] = input.value);
            localStorage.setItem(formStorageKey, JSON.stringify(data));
            const indicator = document.getElementById('autosave-indicator');
            if (indicator) {
                indicator.textContent = 'Saved';
                indicator.classList.add('promo-success');
                setTimeout(() => indicator.classList.remove('promo-success'), 500);
            }
        }

        function restoreForm() {
            try {
                const data = JSON.parse(localStorage.getItem(formStorageKey) || '{}');
                Object.entries(data).forEach(([key, value]) => {
                    const input = field(key);
                    if (input) input.value = value;
                });
            } catch {}
            updateEmailStatus();
        }

        document.querySelectorAll('[data-checkout-field]').forEach((input) => {
            input.addEventListener('input', () => {
                if (input.dataset.checkoutField === 'email') emailVerified = false;
                if (input.dataset.checkoutField === 'cardNumber') input.value = input.value.replace(/\D/g, '').replace(/(.{4})/g, '$1 ').trim().slice(0, 19);
                if (input.dataset.checkoutField === 'expiry') {
                    const digits = input.value.replace(/\D/g, '').slice(0, 4);
                    input.value = digits.length > 2 ? `${digits.slice(0, 2)}/${digits.slice(2)}` : digits;
                }
                if (input.dataset.checkoutField === 'cvv') input.value = input.value.replace(/\D/g, '').slice(0, 4);
                updateEmailStatus();
                saveForm();
                validateCheckout(false);
            });
            input.addEventListener('blur', () => validateCheckout(true));
        });

        document.querySelectorAll('.payment-option').forEach((button) => {
            button.addEventListener('click', () => {
                selectedPaymentMethod = button.dataset.paymentMethod;
                document.querySelectorAll('.payment-option').forEach((option) => option.classList.toggle('is-selected', option === button));
                document.getElementById('card-fields').classList.toggle('hidden', selectedPaymentMethod !== 'card');
                document.getElementById('card-fields').classList.toggle('grid', selectedPaymentMethod === 'card');
                validateCheckout(true);
            });
        });

        document.getElementById('billing-toggle')?.addEventListener('click', () => {
            document.getElementById('billing-fields').classList.toggle('hidden');
            document.getElementById('billing-fields').classList.toggle('grid');
            document.getElementById('billing-arrow').classList.toggle('rotate-180');
        });

        document.getElementById('apply-promo')?.addEventListener('click', () => {
            const code = document.getElementById('promo-code').value.trim().toUpperCase();
            const message = document.getElementById('promo-message');
            promoDiscount = ['SCIENCE10', 'GALAXY20'].includes(code) ? 10 : 0;
            message.textContent = promoDiscount ? 'Coupon applied. ₱10.00 discount unlocked.' : 'Invalid coupon code.';
            message.className = `mt-3 min-h-[20px] font-label text-xs promo-success ${promoDiscount ? 'text-primary' : 'text-error'}`;
            updateSummary();
        });

        async function sendReceiptEmail(order) {
            try {
                const response = await fetch('{{ route('checkout.receipt-email') }}', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '',
                    },
                    body: JSON.stringify(order),
                });

                const data = await response.json().catch(() => ({}));
                return {
                    ok: response.ok,
                    sent: Boolean(data.sent),
                    duplicate: Boolean(data.duplicate),
                    message: data.message || (response.ok ? 'Receipt email sent.' : 'Receipt email could not be sent.'),
                };
            } catch (error) {
                console.error('Receipt email request failed.', error);
                return {
                    ok: false,
                    sent: false,
                    duplicate: false,
                    message: 'Network error while sending receipt. Please try again.',
                };
            }
        }

        function saveCompletedOrder(order) {
            const email = String(order?.customer?.email || '').toLowerCase();
            if (!email) return;
            let orders = {};
            try {
                orders = JSON.parse(localStorage.getItem('ilearnScienceOrders') || '{}') || {};
            } catch {
                orders = {};
            }
            orders[email] = Array.isArray(orders[email]) ? orders[email] : [];
            const existingIndex = orders[email].findIndex((entry) => entry.orderNumber === order.orderNumber);
            if (existingIndex >= 0) orders[email][existingIndex] = order;
            else orders[email].unshift(order);
            localStorage.setItem('ilearnScienceOrders', JSON.stringify(orders));
            window.dispatchEvent(new CustomEvent('ilearn:orders-updated', { detail: { orders: orders[email] } }));
        }

        async function completePurchase() {
            if (checkoutProcessing) return;
            if (!validateCheckout(true)) return;
            checkoutProcessing = true;
            document.querySelectorAll('#complete-purchase, #mobile-complete-purchase').forEach((button) => {
                button.disabled = true;
                button.innerHTML = '<span class="checkout-spinner"></span> Processing secure payment...';
            });
            const { items, subtotal, discount, total } = getTotals();
            const orderNumber = `#ILS-${Date.now().toString().slice(-8)}`;
            const order = {
                orderNumber,
                items,
                totals: { subtotal, discount, tax: 0, total },
                customer: {
                    name: fieldValue('fullName'),
                    email: fieldValue('email'),
                    school: fieldValue('school'),
                    country: fieldValue('country'),
                    province: fieldValue('province'),
                    billingAddress: fieldValue('billingAddress'),
                },
                paymentMethod: selectedPaymentMethod,
                paymentStatus: 'verified',
                checkedOutAt: new Date().toISOString(),
            };
            document.querySelectorAll('#complete-purchase, #mobile-complete-purchase').forEach((button) => {
                button.innerHTML = '<span class="checkout-spinner"></span> Sending branded receipt...';
            });

            const receipt = await sendReceiptEmail(order);
            order.emailSent = Boolean(receipt.ok && receipt.sent);
            order.emailMessage = receipt.message;
            localStorage.setItem('ilearnScienceLastCheckout', JSON.stringify(order));
            saveCompletedOrder(order);
            if (window.iLearnAuth?.clearCart) window.iLearnAuth.clearCart();
            else localStorage.setItem(cartStorageKey, JSON.stringify([]));
            document.querySelector('[data-modal-order-number]').textContent = orderNumber;
            document.getElementById('checkout-success-modal').classList.remove('hidden');
            document.getElementById('checkout-success-modal').classList.add('flex');
            setTimeout(() => window.location.href = '{{ route('order-success') }}', 1300);
        }

        document.getElementById('complete-purchase')?.addEventListener('click', completePurchase);
        document.getElementById('mobile-complete-purchase')?.addEventListener('click', completePurchase);
        window.addEventListener('storage', (event) => { if (event.key === cartStorageKey) updateSummary(); });
        window.addEventListener('ilearn:cart-updated', updateSummary);
        window.addEventListener('pageshow', updateSummary);
        restoreForm();
        updateSummary();
    </script>
    @include('partials.auth-ui')
</body>
</html>
