@extends('layouts.app')

@section('title', 'FAQ - BestFlightHotelDeals')

@section('content')
<div class="bg-white py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-5xl font-black text-gray-900 mb-8">Frequently Asked Questions</h1>
        
        <p class="text-xl text-gray-600 mb-12 leading-relaxed">
            Find answers to common questions about BestFlightHotelDeals (BFHD) and how our platform works.
        </p>

        <div class="space-y-8">
            <!-- FAQ 1 -->
            <div class="border-b border-gray-200 pb-8">
                <h3 class="text-2xl font-bold text-gray-900 mb-4">1. Do you provide bookings directly?</h3>
                <p class="text-gray-700 leading-relaxed">
                    No. BestFlightHotelDeals (BFHD) is a search and comparison platform. All bookings are made through our affiliate travel partners. When you click on an offer, you'll be redirected to the partner's website to complete your booking.
                </p>
            </div>

            <!-- FAQ 2 -->
            <div class="border-b border-gray-200 pb-8">
                <h3 class="text-2xl font-bold text-gray-900 mb-4">2. Is it safe to book through your links?</h3>
                <p class="text-gray-700 leading-relaxed">
                    Yes. All bookings occur on secure, trusted third-party travel provider websites. We only partner with reputable, established travel companies.
                </p>
            </div>

            <!-- FAQ 3 -->
            <div class="border-b border-gray-200 pb-8">
                <h3 class="text-2xl font-bold text-gray-900 mb-4">3. Why am I redirected to another website to complete my booking?</h3>
                <p class="text-gray-700 leading-relaxed">
                    Because our platform functions as a travel comparison and search engine. We compare prices from multiple providers and direct you to the best deals, but the actual transaction happens on the partner's secure platform.
                </p>
            </div>

            <!-- FAQ 4 -->
            <div class="border-b border-gray-200 pb-8">
                <h3 class="text-2xl font-bold text-gray-900 mb-4">4. Do you charge fees?</h3>
                <p class="text-gray-700 leading-relaxed">
                    No. Our service is <strong>100% free</strong> for travelers. You pay the same price whether you book through us or directly with the provider.
                </p>
            </div>

            <!-- FAQ 5 -->
            <div class="border-b border-gray-200 pb-8">
                <h3 class="text-2xl font-bold text-gray-900 mb-4">5. How do you earn money?</h3>
                <p class="text-gray-700 leading-relaxed">
                    We earn affiliate commissions from partner websites when a user books or clicks on an offer. This is a standard practice in the travel industry and does not increase your cost.
                </p>
            </div>

            <!-- FAQ 6 -->
            <div class="border-b border-gray-200 pb-8">
                <h3 class="text-2xl font-bold text-gray-900 mb-4">6. Who handles customer support for my reservation?</h3>
                <p class="text-gray-700 leading-relaxed">
                    The travel provider where you completed your booking. They manage all aspects of your reservation including payment, confirmation, changes, and cancellations.
                </p>
            </div>

            <!-- FAQ 7 -->
            <div class="border-b border-gray-200 pb-8">
                <h3 class="text-2xl font-bold text-gray-900 mb-4">7. Can I modify or cancel my reservation through you?</h3>
                <p class="text-gray-700 leading-relaxed">
                    No. Since we don't handle bookings, you must contact the travel provider directly to make any changes or cancellations to your reservation.
                </p>
            </div>

            <!-- FAQ 8 -->
            <div class="border-b border-gray-200 pb-8">
                <h3 class="text-2xl font-bold text-gray-900 mb-4">8. Are your prices accurate?</h3>
                <p class="text-gray-700 leading-relaxed">
                    We display the best available information from our partners in real-time, but final prices may vary slightly. Always verify pricing on the partner's website before completing your purchase.
                </p>
            </div>

            <!-- FAQ 9 -->
            <div class="border-b border-gray-200 pb-8">
                <h3 class="text-2xl font-bold text-gray-900 mb-4">9. Do you store my booking details?</h3>
                <p class="text-gray-700 leading-relaxed">
                    No. We never store payment information, booking details, or sensitive personal data. All transactions occur directly on our partners' secure platforms.
                </p>
            </div>

            <!-- FAQ 10 -->
            <div class="border-b border-gray-200 pb-8">
                <h3 class="text-2xl font-bold text-gray-900 mb-4">10. Which countries do you serve?</h3>
                <p class="text-gray-700 leading-relaxed">
                    We serve global travelers, with a focus on Canada and the United States. Our partners offer destinations and bookings worldwide.
                </p>
            </div>

            <!-- FAQ 11 -->
            <div class="border-b border-gray-200 pb-8">
                <h3 class="text-2xl font-bold text-gray-900 mb-4">11. Can I trust the prices I see?</h3>
                <p class="text-gray-700 leading-relaxed">
                    Yes. We work only with legitimate, established travel providers. However, prices can change quickly due to demand, so we recommend booking soon after finding a deal you like.
                </p>
            </div>

            <!-- FAQ 12 -->
            <div class="pb-8">
                <h3 class="text-2xl font-bold text-gray-900 mb-4">12. How do I contact you?</h3>
                <p class="text-gray-700 leading-relaxed">
                    For questions about our website or services, email us at <a href="mailto:info@bestflighthoteldeals.com" class="text-blue-600 hover:underline font-bold">info@bestflighthoteldeals.com</a>. For booking-related issues, contact your travel provider directly.
                </p>
            </div>
        </div>

        <div class="bg-blue-50 border-l-4 border-blue-600 p-6 mt-12">
            <p class="text-lg font-semibold text-blue-900">
                Have more questions? <a href="{{ route('contact') }}" class="text-blue-600 hover:underline">Contact us</a> and we'll be happy to help!
            </p>
        </div>
    </div>
</div>
@endsection
