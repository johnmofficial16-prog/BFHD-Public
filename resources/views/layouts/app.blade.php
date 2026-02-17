<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-H9H89809YZ"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-H9H89809YZ');
    </script>
    <!-- Microsoft Clarity -->
    <script type="text/javascript">
        (function(c,l,a,r,i,t,y){
            c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
            t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
            y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
        })(window, document, "clarity", "script", "vir5mp3fp2");
    </script>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="google-site-verification" content="wyMpI61mI0H803OJgHTGkEPTQSxoJziiuCdf1k5sAWQ" />

    <title>@yield('title', config('app.name', 'BestFlightHotelDeals'))</title>
    <meta name="description"
        content="@yield('meta_description', 'Compare hundreds of travel sites instantly. Find the best deals on flights, hotels, cars, and vacation packages.')">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph / Facebook / Bing -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', config('app.name', 'BestFlightHotelDeals'))">
    <meta property="og:description" content="@yield('meta_description', 'Compare hundreds of travel sites instantly. Find the best deals on flights, hotels, cars, and vacation packages.')">
    <meta property="og:image" content="@yield('og_image', asset('images/og-default.jpg'))">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="@yield('title', config('app.name', 'BestFlightHotelDeals'))">
    <meta property="twitter:description" content="@yield('meta_description', 'Compare hundreds of travel sites instantly. Find the best deals on flights, hotels, cars, and vacation packages.')">
    <meta property="twitter:image" content="@yield('og_image', asset('images/og-default.jpg'))">
    <link rel="canonical" href="{{ url()->current() }}" />

    <!-- Premium Google Fonts: Plus Jakarta Sans (Display) + Inter (Body) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;300;400;500;600;700;800;900&family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Logo CSS (inline to avoid deployment issues) -->
    <style>
        #bfhd-logo {
            height: 2rem;
            width: auto;
        }

        @media (min-width: 768px) {
            #bfhd-logo {
                height: 3rem;
            }
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>

    <!-- Flatpickr -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <style>
        /* Premium Typography & Color System */
        :root {
            --font-display: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            --font-body: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;

            /* Premium Color Palette */
            --primary-600: #7c3aed;
            --primary-700: #6d28d9;
            --primary-800: #5b21b6;
            --accent-coral: #ff6b6b;
            --accent-peach: #ff8a65;
            --accent-amber: #fbbf24;
            --gradient-primary: linear-gradient(135deg, #7c3aed 0%, #ec4899 100%);
        }

        body {
            font-family: var(--font-body);
            font-weight: 400;
            letter-spacing: -0.011em;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        button,
        .font-bold,
        .font-black {
            font-family: var(--font-display);
            letter-spacing: -0.025em;
        }

        /* Purple theme for links and buttons */
        a:hover {
            color: var(--primary-600);
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Navigation (Consistent with Homepage) -->
    <nav class="bg-white shadow-sm sticky top-0 z-50" x-data="{ mobileMenuOpen: false }">
        <div class="max-w-7xl mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <a href="{{ route('home') }}" class="group text-gray-900">
                    <svg id="bfhd-logo" viewBox="0 0 240 56" xmlns="http://www.w3.org/2000/svg"
                        class="transition-transform group-hover:scale-105" fill="none">
                        <!-- Circle with airplane icon -->
                        <g transform="translate(2, 3)">
                            <!-- Open circle (C-shape, open on left) -->
                            <path d="M 12 8 A 22 22 0 1 1 12 42" stroke="currentColor" stroke-width="2.5" fill="none"
                                stroke-linecap="round" />
                            <!-- Horizontal line through circle -->
                            <line x1="4" y1="25" x2="46" y2="25" stroke="currentColor" stroke-width="2.5"
                                stroke-linecap="round" />
                            <!-- Airplane pointing diagonal up-right -->
                            <g transform="translate(20, 25) rotate(-35)">
                                <path d="M12 0 L4 -3 L4 -1.5 L-4 -1.5 L-4 -5 L-7 -5 L-7 5 L-4 5 L-4 1.5 L4 1.5 L4 3 Z"
                                    fill="currentColor" />
                            </g>
                        </g>

                        <!-- BFHD Text -->
                        <text x="56" y="29" font-family="'Arial Black', Arial, sans-serif" font-size="28"
                            font-weight="900" letter-spacing="5" fill="currentColor">BFHD</text>

                        <!-- BESTFLIGHTHOTELDEALS Subtitle -->
                        <text x="56" y="43" font-family="'Inter', Arial, sans-serif" font-size="9" font-weight="600"
                            letter-spacing="2.5" fill="currentColor" opacity="0.85"
                            text-rendering="geometricPrecision">BESTFLIGHTHOTELDEALS</text>


                    </svg>
                </a>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('flights') }}"
                        class="text-gray-700 hover:text-purple-600 font-semibold text-lg transition relative group">
                        Flights
                        <span
                            class="absolute bottom-0 left-0 w-0 h-0.5 bg-purple-600 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="{{ route('hotels') }}"
                        class="text-gray-700 hover:text-purple-600 font-semibold text-lg transition relative group">
                        Hotels
                        <span
                            class="absolute bottom-0 left-0 w-0 h-0.5 bg-purple-600 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="{{ route('cars') }}"
                        class="text-gray-700 hover:text-purple-600 font-semibold text-lg transition relative group">
                        Cars
                        <span
                            class="absolute bottom-0 left-0 w-0 h-0.5 bg-purple-600 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="{{ route('blog') }}"
                        class="text-gray-700 hover:text-purple-600 font-semibold text-lg transition relative group">
                        Blog
                        <span
                            class="absolute bottom-0 left-0 w-0 h-0.5 bg-purple-600 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="https://news.bestflighthoteldeals.com"
                        class="text-gray-700 hover:text-purple-600 font-semibold text-lg transition relative group">
                        News
                        <span
                            class="absolute bottom-0 left-0 w-0 h-0.5 bg-purple-600 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="{{ route('about') }}"
                        class="text-gray-700 hover:text-purple-600 font-semibold text-lg transition relative group">
                        About
                        <span
                            class="absolute bottom-0 left-0 w-0 h-0.5 bg-purple-600 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="{{ route('contact') }}"
                        class="text-gray-700 hover:text-purple-600 font-semibold text-lg transition relative group">
                        Contact
                        <span
                            class="absolute bottom-0 left-0 w-0 h-0.5 bg-purple-600 transition-all duration-300 group-hover:w-full"></span>
                    </a>


                </div>

                <!-- Mobile Actions (Right Side) -->
                <div class="flex items-center gap-4 md:hidden">


                    <!-- Hamburger Menu -->
                    <button @click="mobileMenuOpen = !mobileMenuOpen"
                        class="text-gray-900 hover:text-purple-600 focus:outline-none">
                        <svg x-show="!mobileMenuOpen" class="w-8 h-8" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg x-show="mobileMenuOpen" class="w-8 h-8" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" style="display: none;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu (Full Screen Overlay) -->
        <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-full" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 translate-y-full"
            class="fixed inset-0 z-[60] bg-white/95 backdrop-blur-xl md:hidden flex flex-col" style="display: none;">

            <!-- Header inside Mobile Menu -->
            <div class="flex justify-between items-center px-6 py-6 border-b border-gray-100">
                <span class="text-2xl font-black text-gray-900 tracking-tight">Menu</span>
                <button @click="mobileMenuOpen = false"
                    class="p-2 bg-gray-100 rounded-full text-gray-600 hover:bg-gray-200 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Menu Items -->
            <div class="flex-1 overflow-y-auto px-6 py-8 space-y-6">
                <div class="space-y-2">
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-4">Travel</p>
                    <a href="{{ route('flights') }}"
                        class="flex items-center space-x-4 p-4 bg-gray-50 rounded-2xl active:scale-95 transition-transform">
                        <div class="bg-purple-100 p-3 rounded-xl text-purple-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                            </svg>
                        </div>
                        <span class="text-xl font-bold text-gray-900">Flights</span>
                    </a>
                    <a href="{{ route('hotels') }}"
                        class="flex items-center space-x-4 p-4 bg-gray-50 rounded-2xl active:scale-95 transition-transform">
                        <div class="bg-pink-100 p-3 rounded-xl text-pink-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                        </div>
                        <span class="text-xl font-bold text-gray-900">Stays</span>
                    </a>
                    <a href="{{ route('cars') }}"
                        class="flex items-center space-x-4 p-4 bg-gray-50 rounded-2xl active:scale-95 transition-transform">
                        <div class="bg-orange-100 p-3 rounded-xl text-orange-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                            </svg>
                        </div>
                        <span class="text-xl font-bold text-gray-900">Cars</span>
                    </a>
                </div>

                <div class="space-y-4 pt-6 border-t border-gray-100">
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Discover</p>
                    <a href="{{ route('blog') }}"
                        class="block text-lg font-semibold text-gray-600 hover:text-purple-600">Travel Blog</a>
                    <a href="https://news.bestflighthoteldeals.com"
                        class="block text-lg font-semibold text-gray-600 hover:text-purple-600">News</a>
                    <a href="{{ route('about') }}"
                        class="block text-lg font-semibold text-gray-600 hover:text-purple-600">About Us</a>
                    <a href="{{ route('contact') }}"
                        class="block text-lg font-semibold text-gray-600 hover:text-purple-600">Contact Support</a>
                </div>


            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer (Same as Homepage) -->
    <footer class="bg-gray-900 text-white py-12 mt-20">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mb-8">
                <div>
                    <h4 class="font-bold text-lg mb-4">Company</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('about') }}" class="text-gray-400 hover:text-white transition">About</a>
                        </li>
                        <li><a href="{{ route('blog') }}" class="text-gray-400 hover:text-white transition">Blog</a>
                        </li>
                        <li><a href="{{ route('contact') }}"
                                class="text-gray-400 hover:text-white transition">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-lg mb-4">Support</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('faq') }}" class="text-gray-400 hover:text-white transition">FAQ</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-lg mb-4">Legal</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('privacy') }}"
                                class="text-gray-400 hover:text-white transition">Privacy</a></li>
                        <li><a href="{{ route('terms') }}" class="text-gray-400 hover:text-white transition">Terms</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-lg mb-4">Social</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Affiliate Disclaimer -->
            <div class="border-t border-gray-800 pt-8 pb-6">
                <div class="bg-gray-800 rounded-lg p-6">
                    <h4 class="text-white font-bold text-base mb-3">📋 Affiliate & Booking Disclaimer</h4>
                    <p class="text-gray-400 text-sm leading-relaxed mb-2">
                        <strong>BestFlightHotelDeals</strong> is a travel search and comparison platform. We do not
                        provide travel bookings, ticketing, payments, or customer support services directly. All
                        bookings are made through our trusted affiliate partners.
                    </p>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        Prices, availability, booking terms, customer service, refunds, and cancellations are handled
                        solely by the respective travel provider. BestFlightHotelDeals may receive a commission at no
                        extra cost to you when you complete a booking through our affiliate partners.
                    </p>
                </div>
            </div>

            <div class="border-t border-gray-800 pt-6 text-center text-gray-400 text-sm">
                <p>&copy; {{ date('Y') }} BestFlightHotelDeals. All rights reserved.</p>
                <p class="mt-1 text-gray-500">Operated by <span class="text-gray-400">MJ Epoch Ventures</span> · Duncan,
                    BC, Canada</p>
                <p class="mt-1 text-gray-500">Official <span style="color: #FF690F; font-weight: 700;">KAYAK</span> Partner</p>
                <div class="flex justify-center space-x-6 mt-4">
                    <a href="{{ route('privacy') }}" class="hover:text-white transition">Privacy</a>
                    <a href="{{ route('terms') }}" class="hover:text-white transition">Terms</a>
                    <a href="{{ route('faq') }}" class="hover:text-white transition">FAQ</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Autocomplete Styles -->
    <style>
        .autocomplete-wrapper {
            position: relative;
        }

        .autocomplete-dropdown {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: white;
            border: 2px solid #e5e7eb;
            border-top: none;
            border-radius: 0 0 12px 12px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
            max-height: 300px;
            overflow-y: auto;
            z-index: 1000;
            display: none;
        }

        .autocomplete-dropdown.active {
            display: block;
        }

        .autocomplete-item {
            padding: 12px 16px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid #f3f4f6;
            transition: background 0.15s;
        }

        .autocomplete-item:last-child {
            border-bottom: none;
        }

        .autocomplete-item:hover,
        .autocomplete-item.selected {
            background: #f3e8ff;
        }

        .autocomplete-item-icon {
            width: 32px;
            height: 32px;
            background: #f3f4f6;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .autocomplete-item-icon svg {
            width: 16px;
            height: 16px;
            color: #6b7280;
        }

        .autocomplete-item-icon.airport {
            background: #ede9fe;
        }

        .autocomplete-item-icon.airport svg {
            color: #7c3aed;
        }

        .autocomplete-item-icon.city {
            background: #fef3c7;
        }

        .autocomplete-item-icon.city svg {
            color: #d97706;
        }

        .autocomplete-item-text {
            flex: 1;
            min-width: 0;
        }

        .autocomplete-item-name {
            font-weight: 600;
            color: #1f2937;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .autocomplete-item-detail {
            font-size: 12px;
            color: #6b7280;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .autocomplete-item-code {
            font-weight: 700;
            color: #7c3aed;
            font-size: 14px;
            flex-shrink: 0;
        }

        .autocomplete-loading {
            padding: 16px;
            text-align: center;
            color: #6b7280;
        }

        .autocomplete-no-results {
            padding: 16px;
            text-align: center;
            color: #6b7280;
        }
    </style>

    <script>
        // Autocomplete System
        class LocationAutocomplete {
            constructor(input) {
                this.input = input;
                this.dropdown = null;
                this.selectedIndex = -1;
                this.results = [];
                this.debounceTimer = null;
                this.cache = {};

                this.init();
            }

            init() {
                // Do not move the input to a wrapper as it breaks Alpine.js/Vue
                // Instead, use the existing parent and ensure it is relative
                const parent = this.input.parentNode;
                const style = window.getComputedStyle(parent);
                if (style.position === 'static') {
                    parent.style.position = 'relative';
                }
                parent.classList.add('autocomplete-wrapper'); // Add class for potential styling

                // Create dropdown
                this.dropdown = document.createElement('div');
                this.dropdown.className = 'autocomplete-dropdown';
                parent.appendChild(this.dropdown);

                // Event listeners
                this.input.addEventListener('input', (e) => this.onInput(e));
                this.input.addEventListener('keydown', (e) => this.onKeydown(e));
                this.input.addEventListener('focus', () => this.onFocus());

                // Close on click outside
                document.addEventListener('click', (e) => {
                    if (!parent.contains(e.target)) {
                        this.close();
                    }
                });
            }

            onInput(e) {
                const query = e.target.value.trim();

                if (this.debounceTimer) {
                    clearTimeout(this.debounceTimer);
                }

                if (query.length < 2) {
                    this.close();
                    return;
                }

                this.debounceTimer = setTimeout(() => {
                    this.search(query);
                }, 300);
            }

            onKeydown(e) {
                if (!this.dropdown.classList.contains('active')) return;

                switch (e.key) {
                    case 'ArrowDown':
                        e.preventDefault();
                        this.selectNext();
                        break;
                    case 'ArrowUp':
                        e.preventDefault();
                        this.selectPrev();
                        break;
                    case 'Enter':
                        e.preventDefault();
                        this.selectCurrent();
                        break;
                    case 'Escape':
                        this.close();
                        break;
                }
            }

            onFocus() {
                if (this.results.length > 0 && this.input.value.length >= 2) {
                    this.dropdown.classList.add('active');
                }
            }

            async search(query) {
                if (this.cache[query]) {
                    this.displayResults(this.cache[query]);
                    return;
                }

                this.dropdown.innerHTML = '<div class="autocomplete-loading">Searching...</div>';
                this.dropdown.classList.add('active');

                try {
                    const response = await fetch(
                        `https://autocomplete.travelpayouts.com/places2?term=${encodeURIComponent(query)}&locale=en&types[]=airport&types[]=city`
                    );

                    if (!response.ok) throw new Error('API Error');

                    const data = await response.json();
                    this.cache[query] = data;
                    this.displayResults(data);

                } catch (error) {
                    console.error('Autocomplete error:', error);
                    this.dropdown.innerHTML = '<div class="autocomplete-no-results">Unable to fetch suggestions</div>';
                }
            }

            displayResults(data) {
                this.results = data || [];
                this.selectedIndex = -1;

                if (this.results.length === 0) {
                    this.dropdown.innerHTML = '<div class="autocomplete-no-results">No results found</div>';
                    this.dropdown.classList.add('active');
                    return;
                }

                let html = '';
                this.results.forEach((item, index) => {
                    const isAirport = item.type === 'airport';
                    const iconClass = isAirport ? 'airport' : 'city';
                    const iconSvg = isAirport
                        ? '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>'
                        : '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>';

                    const name = item.name || '';
                    const country = item.country_name || '';
                    const code = item.code || '';
                    const detail = isAirport ? `${item.city_name || ''}, ${country}` : country;

                    html += `
                        <div class="autocomplete-item" data-index="${index}">
                            <div class="autocomplete-item-icon ${iconClass}">${iconSvg}</div>
                            <div class="autocomplete-item-text">
                                <div class="autocomplete-item-name">${this.escapeHtml(name)}</div>
                                <div class="autocomplete-item-detail">${this.escapeHtml(detail)}</div>
                            </div>
                            <div class="autocomplete-item-code">${this.escapeHtml(code)}</div>
                        </div>
                    `;
                });

                this.dropdown.innerHTML = html;
                this.dropdown.classList.add('active');

                this.dropdown.querySelectorAll('.autocomplete-item').forEach(item => {
                    item.addEventListener('click', () => {
                        const index = parseInt(item.dataset.index);
                        this.selectItem(index);
                    });
                });
            }

            selectNext() {
                if (this.results.length === 0) return;
                this.selectedIndex = (this.selectedIndex + 1) % this.results.length;
                this.updateSelection();
            }

            selectPrev() {
                if (this.results.length === 0) return;
                this.selectedIndex = this.selectedIndex <= 0 ? this.results.length - 1 : this.selectedIndex - 1;
                this.updateSelection();
            }

            updateSelection() {
                this.dropdown.querySelectorAll('.autocomplete-item').forEach((item, index) => {
                    item.classList.toggle('selected', index === this.selectedIndex);
                });

                const selected = this.dropdown.querySelector('.autocomplete-item.selected');
                if (selected) {
                    selected.scrollIntoView({ block: 'nearest' });
                }
            }

            selectCurrent() {
                if (this.selectedIndex >= 0 && this.selectedIndex < this.results.length) {
                    this.selectItem(this.selectedIndex);
                }
            }

            selectItem(index) {
                const item = this.results[index];
                if (!item) return;

                const displayValue = item.code ? `${item.name} (${item.code})` : item.name;
                this.input.value = displayValue;
                this.input.dataset.code = item.code || '';
                this.input.dataset.name = item.name || '';

                this.close();
                this.input.dispatchEvent(new Event('change', { bubbles: true }));
            }

            close() {
                this.dropdown.classList.remove('active');
                this.selectedIndex = -1;
            }

            escapeHtml(text) {
                const div = document.createElement('div');
                div.textContent = text || '';
                return div.innerHTML;
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            // Initialize Flatpickr
            flatpickr(".datepicker-input", {
                dateFormat: "Y-m-d",
                minDate: "today",
                disableMobile: "true"
            });

            // Initialize autocomplete on all location inputs
            const locationInputs = document.querySelectorAll(
                'input[name="from"], input[name="to"], input[name="destination"], input[name="pickup-location"], input[name="dropoff-location"]'
            );

            locationInputs.forEach(input => {
                new LocationAutocomplete(input);
            });
        });

        // Alpine.js Directives
        document.addEventListener('alpine:init', () => {
            Alpine.directive('location-autocomplete', (el) => {
                new LocationAutocomplete(el);
            });

            Alpine.directive('datepicker', (el) => {
                flatpickr(el, {
                    dateFormat: "Y-m-d",
                    minDate: "today",
                    disableMobile: "true",
                    onChange: function(selectedDates, dateStr, instance) {
                        el.value = dateStr;
                        el.dispatchEvent(new Event('input', {bubbles: true}));
                    }
                });
            });
        });
    </script>

    <!-- Default Statcounter code for BFHD https://bestflighthoteldeals.com/ -->
    <script type="text/javascript">
        var sc_project = 13197465;
        var sc_invisible = 1;
        var sc_security = "2370a7f4"; 
    </script>
    <script type="text/javascript" src="https://www.statcounter.com/counter/counter.js" async></script>
    <noscript>
        <div class="statcounter"><a title="Web Analytics" href="https://statcounter.com/" target="_blank"><img
                    class="statcounter" src="https://c.statcounter.com/13197465/0/2370a7f4/1/" alt="Web Analytics"
                    referrerPolicy="no-referrer-when-downgrade"></a></div>
    </noscript>
    <!-- End of Statcounter Code -->
</body>

</html>