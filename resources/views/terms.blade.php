@extends('layouts.app')

@section('title', 'Terms of Service - BestFlightHotelDeals')

@section('content')
    <div class="bg-white py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-5xl font-black text-gray-900 mb-8">Terms of Service</h1>

            <div class="prose prose-lg max-w-none text-gray-700">
                <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                    By accessing or using <strong>BestFlightHotelDeals</strong>, you agree to the following Terms of
                    Service. Please read them carefully.
                </p>

                <p class="text-sm text-gray-500 mb-12"><em>Effective Date: {{ date('F d, Y') }}</em></p>

                <h2 class="text-3xl font-bold text-gray-900 mt-12 mb-6">1. No Booking Services Provided</h2>
                <p class="mb-8 leading-relaxed">
                    <strong>BestFlightHotelDeals is a travel search engine and comparison platform.</strong> We do not
                    provide flight, hotel, car rental, or vacation package bookings. All bookings, payments, confirmations,
                    and customer support are handled exclusively by our third-party travel partners.
                </p>

                <h2 class="text-3xl font-bold text-gray-900 mt-12 mb-6">2. Affiliate Disclosure</h2>
                <p class="mb-8 leading-relaxed">
                    We earn commissions when users click on affiliate links or complete bookings through partner websites.
                    <strong>This does not affect your cost</strong>—prices remain the same whether you book through us or
                    directly.
                </p>

                <h2 class="text-3xl font-bold text-gray-900 mt-12 mb-6">3. Website Availability</h2>
                <p class="mb-8 leading-relaxed">
                    We do not guarantee uninterrupted access to our website. Downtime may occur due to maintenance,
                    technical issues, or external factors beyond our control.
                </p>

                <h2 class="text-3xl font-bold text-gray-900 mt-12 mb-6">4. Accuracy of Information</h2>
                <p class="mb-8 leading-relaxed">
                    Though we strive for accuracy, prices and availability displayed on our site may differ from the final
                    offer on the partner website. <strong>Always verify details before completing a booking.</strong>
                </p>

                <h2 class="text-3xl font-bold text-gray-900 mt-12 mb-6">5. Limitation of Liability</h2>
                <div class="bg-red-50 border-l-4 border-red-600 p-6 my-8">
                    <p class="font-bold text-red-900 mb-4">BestFlightHotelDeals is NOT liable for:</p>
                    <ul class="list-disc pl-6 text-red-800 space-y-2">
                        <li>Booking issues</li>
                        <li>Payment failures</li>
                        <li>Flight cancellations or delays</li>
                        <li>Hotel overbookings</li>
                        <li>Car rental problems</li>
                        <li>Travel provider errors or service failures</li>
                        <li>Disputes between users and partners</li>
                    </ul>
                    <p class="mt-4 text-red-900">
                        <strong>All claims must be directed to the respective travel provider.</strong>
                    </p>
                </div>

                <h2 class="text-3xl font-bold text-gray-900 mt-12 mb-6">6. Use of Website</h2>
                <p class="mb-4">You agree not to use our website for:</p>
                <ul class="list-disc pl-6 space-y-2 mb-8">
                    <li>Unlawful activities</li>
                    <li>Scraping or automated data extraction</li>
                    <li>Interfering with affiliate tracking systems</li>
                    <li>Distributing malware or harmful code</li>
                    <li>Impersonating BestFlightHotelDeals or its partners</li>
                </ul>

                <h2 class="text-3xl font-bold text-gray-900 mt-12 mb-6">7. Intellectual Property</h2>
                <p class="mb-8 leading-relaxed">
                    All content, logos, trademarks, and design elements on BestFlightHotelDeals are our property or licensed
                    to us. Unauthorized use is prohibited.
                </p>

                <h2 class="text-3xl font-bold text-gray-900 mt-12 mb-6">8. Governing Law & Operating Entity</h2>
                <p class="mb-4 leading-relaxed">
                    BestFlightHotelDeals is operated by <strong>MJ Epoch Ventures</strong>, a sole proprietorship registered
                    in Duncan, British Columbia, Canada.
                </p>
                <p class="mb-8 leading-relaxed">
                    These Terms are governed by the laws of British Columbia and Canada. Any disputes arising from these
                    Terms or use of our website shall be resolved under Canadian jurisdiction.
                </p>

                <div class="bg-gray-100 p-6 rounded-lg my-8">
                    <p class="text-gray-700 font-bold">
                        Continued use of the site indicates acceptance of these Terms.
                    </p>
                </div>

                <p class="text-sm text-gray-500 mt-8">
                    If you have questions about these Terms, please contact us at <a
                        href="mailto:info@bestflighthoteldeals.com"
                        class="text-blue-600 hover:underline">info@bestflighthoteldeals.com</a>.
                </p>
            </div>
        </div>
    </div>
@endsection