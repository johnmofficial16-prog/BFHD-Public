@extends('layouts.app')

@section('title', 'Privacy Policy - BestFlightHotelDeals')

@section('content')
    <div class="bg-white py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-5xl font-black text-gray-900 mb-8">Privacy Policy</h1>

            <div class="prose prose-lg max-w-none text-gray-700">
                <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                    At <strong>BestFlightHotelDeals (BFHD)</strong>, we prioritize your privacy and are committed to
                    protecting your personal data. This Privacy Policy explains what information we collect, how we use it,
                    and how it is secured.
                </p>

                <p class="text-sm text-gray-500 mb-12"><em>Last Updated: {{ date('F d, Y') }}</em></p>

                <h2 class="text-3xl font-bold text-gray-900 mt-12 mb-6">1. Information We Collect</h2>
                <p class="mb-4">We collect non-sensitive information such as:</p>
                <ul class="list-disc pl-6 space-y-2 mb-8">
                    <li>IP address</li>
                    <li>Browser type and version</li>
                    <li>Device information</li>
                    <li>Pages visited on our site</li>
                    <li>Clicks on links and outbound offers</li>
                    <li>Search queries performed on our site</li>
                </ul>

                <div class="bg-green-50 border-l-4 border-green-600 p-6 my-8">
                    <p class="font-bold text-green-900 mb-2">✓ We do NOT store:</p>
                    <ul class="list-disc pl-6 text-green-800 space-y-1">
                        <li>Payment information</li>
                        <li>Passport details</li>
                        <li>Booking details</li>
                        <li>Sensitive travel data</li>
                    </ul>
                </div>

                <h2 class="text-3xl font-bold text-gray-900 mt-12 mb-6">2. How We Use Your Information</h2>
                <ul class="list-disc pl-6 space-y-2 mb-8">
                    <li>Improve website functionality</li>
                    <li>Optimize search results</li>
                    <li>Track affiliate clicks and conversions</li>
                    <li>Provide relevant offers and advertisements</li>
                    <li>Prevent fraud and monitor security</li>
                    <li>Comply with legal obligations</li>
                </ul>

                <h2 class="text-3xl font-bold text-gray-900 mt-12 mb-6">3. Third-Party Providers</h2>
                <p class="mb-4">We work with affiliate partners, ad networks, and analytics tools, including:</p>
                <ul class="list-disc pl-6 space-y-2 mb-6">
                    <li>Online travel agencies (OTAs)</li>
                    <li>White-label travel platforms</li>
                    <li>Google Analytics</li>
                    <li>Google AdSense</li>
                    <li>Other affiliate networks</li>
                </ul>
                <p class="mb-8">These partners may collect cookies or data according to their policies. We are not
                    responsible for their privacy practices.</p>

                <h2 class="text-3xl font-bold text-gray-900 mt-12 mb-6">4. Cookies</h2>
                <p class="mb-4">Our site uses cookies for:</p>
                <ul class="list-disc pl-6 space-y-2 mb-6">
                    <li>Personalized advertisements</li>
                    <li>Affiliate tracking and commission attribution</li>
                    <li>Analytical traffic monitoring</li>
                    <li>Enhanced user experience</li>
                </ul>
                <p class="mb-8">You may disable cookies through your browser settings, but some features may not function
                    correctly.</p>

                <h2 class="text-3xl font-bold text-gray-900 mt-12 mb-6">5. User Rights</h2>
                <p class="mb-4">Depending on your region (GDPR / CCPA / PIPEDA), you may request:</p>
                <ul class="list-disc pl-6 space-y-2 mb-6">
                    <li>Access to your data</li>
                    <li>Deletion of your data</li>
                    <li>Correction of inaccurate information</li>
                    <li>Opt-out of certain data collection practices</li>
                </ul>
                <p class="mb-8">Email your request to <a href="mailto:info@bestflighthoteldeals.com"
                        class="text-blue-600 hover:underline font-bold">info@bestflighthoteldeals.com</a>.</p>

                <h2 class="text-3xl font-bold text-gray-900 mt-12 mb-6">6. Data Controller</h2>
                <p class="mb-8 leading-relaxed">
                    The data controller for BestFlightHotelDeals is <strong>MJ Epoch Ventures</strong>, a sole
                    proprietorship registered in Duncan, British Columbia, Canada. For any privacy-related inquiries, please
                    contact us at <a href="mailto:info@bestflighthoteldeals.com"
                        class="text-blue-600 hover:underline font-bold">info@bestflighthoteldeals.com</a>.
                </p>

                <h2 class="text-3xl font-bold text-gray-900 mt-12 mb-6">7. Updates to This Policy</h2>
                <p class="mb-8">We may update this Privacy Policy without notice. Continued use of our website indicates
                    acceptance of any changes.</p>

                <div class="bg-gray-100 p-6 rounded-lg my-8">
                    <p class="text-gray-700">
                        <strong>By using our website, you consent to this Privacy Policy.</strong>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection