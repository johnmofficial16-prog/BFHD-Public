@extends('layouts.app')

@section('title', 'Travel Blog - Tips & Guides - BestFlightHotelDeals')

@section('content')
    <div class="bg-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h1 class="text-4xl font-extrabold text-gray-900">Travel Blog</h1>
                <p class="mt-3 text-xl text-gray-500">Tips, guides, and inspiration for your next adventure</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Blog Post 1 -->
                <article class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-2xl transition">
                    <img src="https://images.unsplash.com/photo-1488646953014-85cb44e25828?w=600" alt="Budget Travel"
                        class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="text-sm text-blue-600 font-semibold mb-2">TRAVEL TIPS</div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-3">10 Ways to Save Money on Flights in 2025</h2>
                        <p class="text-gray-600 mb-4">Discover insider tips to find the cheapest flights and save hundreds
                            on your next trip.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500">5 min read</span>
                            <a href="{{ route('blog.save-money-flights') }}"
                                class="text-blue-600 font-medium hover:text-blue-800">Read More →</a>
                        </div>
                    </div>
                </article>

                <!-- Blog Post 2 -->
                <article class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-2xl transition">
                    <img src="https://images.unsplash.com/photo-1513635269975-59663e0ac1ad?w=600" alt="London"
                        class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="text-sm text-purple-600 font-semibold mb-2">DESTINATION GUIDES</div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-3">Best Time to Visit London: A Complete Guide</h2>
                        <p class="text-gray-600 mb-4">Find out when to visit London for the best weather, lowest prices, and
                            amazing experiences.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500">7 min read</span>
                            <a href="{{ route('blog.london-guide') }}"
                                class="text-blue-600 font-medium hover:text-blue-800">Read More →</a>
                        </div>
                    </div>
                </article>

                <!-- Blog Post 3 -->
                <article class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-2xl transition">
                    <img src="https://images.unsplash.com/photo-1512453979798-5ea266f8880c?w=600" alt="Dubai"
                        class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="text-sm text-green-600 font-semibold mb-2">DESTINATION GUIDES</div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-3">Dubai Travel Guide: Where Luxury Meets Adventure
                        </h2>
                        <p class="text-gray-600 mb-4">Everything you need to know about visiting Dubai, from attractions to
                            accommodations.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500">6 min read</span>
                            <a href="#" class="text-blue-600 font-medium hover:text-blue-800">Read More →</a>
                        </div>
                    </div>
                </article>

                <!-- Blog Post 4 -->
                <article class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-2xl transition">
                    <img src="https://images.unsplash.com/photo-1502602898657-3e91760cbb34?w=600" alt="Paris"
                        class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="text-sm text-blue-600 font-semibold mb-2">TRAVEL TIPS</div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-3">NYC to Paris: Flight Deals and Travel Tips</h2>
                        <p class="text-gray-600 mb-4">Find the best flight deals from New York to Paris and make the most of
                            your trip.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500">8 min read</span>
                            <a href="{{ route('blog.nyc-paris') }}"
                                class="text-blue-600 font-medium hover:text-blue-800">Read More →</a>
                        </div>
                    </div>
                </article>

                <!-- Blog Post 5 -->
                <article class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-2xl transition">
                    <img src="https://images.unsplash.com/photo-1476514525535-07fb3b4ae5f1?w=600" alt="Travel Planning"
                        class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="text-sm text-purple-600 font-semibold mb-2">TRAVEL TIPS</div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-3">How to Plan the Perfect Multi-City Trip</h2>
                        <p class="text-gray-600 mb-4">Master the art of multi-city travel with our comprehensive planning
                            guide.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500">10 min read</span>
                            <a href="{{ route('blog.multi-city-trip') }}"
                                class="text-blue-600 font-medium hover:text-blue-800">Read More →</a>
                        </div>
                    </div>
                </article>

                <!-- Blog Post 6 -->
                <article class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-2xl transition">
                    <img src="https://images.unsplash.com/photo-1503220317375-aaad61436b1b?w=600" alt="Budget Airlines"
                        class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="text-sm text-green-600 font-semibold mb-2">FLIGHT TIPS</div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-3">Top 5 Budget Airlines in 2025</h2>
                        <p class="text-gray-600 mb-4">Fly for less with these reliable and affordable budget airline
                            carriers.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500">6 min read</span>
                            <a href="#" class="text-blue-600 font-medium hover:text-blue-800">Read More →</a>
                        </div>
                    </div>
                </article>

                <!-- NEW SEO BLOG POST 6 (ZIPAIR) -->
                <article
                    class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-2xl transition border-2 border-purple-200">
                    <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?w=600&q=80" alt="ZIPAIR Tokyo"
                        class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="text-sm text-purple-600 font-semibold mb-2">AIRLINE REVIEW</div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-3">ZIPAIR Vancouver to Tokyo Review: Is It Really Cheaper?</h2>
                        <p class="text-gray-600 mb-4">The truth about ZIPAIR's $289 flights from YVR to Tokyo — including the hidden fees.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500">8 min read</span>
                            <a href="{{ route('blog.zipair-vancouver-tokyo-review-2026') }}"
                                class="text-blue-600 font-medium hover:text-blue-800">Read More →</a>
                        </div>
                    </div>
                </article>

                <!-- NEW SEO BLOG POST 1 -->
                <article
                    class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-2xl transition border-2 border-purple-200">
                    <img src="https://images.unsplash.com/photo-1436491865332-7a61a109cc05?w=600&q=80" alt="Cheap Flights"
                        class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="text-sm text-purple-600 font-semibold mb-2">MONEY-SAVING TIPS</div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-3">How to Find Cheap Flights in 2026: 12 Proven
                            Strategies</h2>
                        <p class="text-gray-600 mb-4">Discover 12 proven strategies to find cheap flights in 2026. Save
                            hundreds on airfare!</p>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500">12 min read</span>
                            <a href="{{ route('blog.how-to-find-cheap-flights-2026') }}"
                                class="text-blue-600 font-medium hover:text-blue-800">Read More →</a>
                        </div>
                    </div>
                </article>

                <!-- NEW SEO BLOG POST 2 -->
                <article
                    class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-2xl transition border-2 border-purple-200">
                    <img src="https://images.unsplash.com/photo-1556388158-158ea5ccacbd?w=600&q=80" alt="Budget Airlines"
                        class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="text-sm text-blue-600 font-semibold mb-2">BUDGET TRAVEL</div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-3">Best Budget Airlines in 2026: Complete Comparison
                            Guide</h2>
                        <p class="text-gray-600 mb-4">Compare the best budget airlines in 2026. Which low-cost carrier
                            offers the best value?</p>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500">10 min read</span>
                            <a href="{{ route('blog.best-budget-airlines-2026') }}"
                                class="text-blue-600 font-medium hover:text-blue-800">Read More →</a>
                        </div>
                    </div>
                </article>

                <!-- NEW SEO BLOG POST 3 -->
                <article
                    class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-2xl transition border-2 border-purple-200">
                    <img src="https://images.unsplash.com/photo-1580048915913-4f8f5cb481c4?w=600&q=80" alt="Hidden Fees"
                        class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="text-sm text-red-600 font-semibold mb-2">SAVE MONEY</div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-3">Hidden Travel Fees to Avoid in 2026 (Save $200+
                            Per Trip)</h2>
                        <p class="text-gray-600 mb-4">Discover hidden travel fees airlines and hotels don't advertise. Save
                            $200+ per trip!</p>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500">9 min read</span>
                            <a href="{{ route('blog.hidden-travel-fees-avoid-2026') }}"
                                class="text-blue-600 font-medium hover:text-blue-800">Read More →</a>
                        </div>
                    </div>
                </article>

                <!-- NEW SEO BLOG POST 4 -->
                <article
                    class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-2xl transition border-2 border-purple-200">
                    <img src="https://images.unsplash.com/photo-1488646953014-85cb44e25828?w=600&q=80"
                        alt="Flight Comparison" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="text-sm text-green-600 font-semibold mb-2">COMPARISON GUIDE</div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-3">Google Flights vs Kayak vs Skyscanner: Which Finds
                            Cheaper Flights?</h2>
                        <p class="text-gray-600 mb-4">Real price tests reveal which flight search engine saves you the most
                            money.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500">8 min read</span>
                            <a href="{{ route('blog.google-flights-vs-kayak-vs-skyscanner') }}"
                                class="text-blue-600 font-medium hover:text-blue-800">Read More →</a>
                        </div>
                    </div>
                </article>

                <!-- NEW SEO BLOG POST 5 -->
                <article
                    class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-2xl transition border-2 border-purple-200">
                    <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?w=600&q=80" alt="Hotel Booking"
                        class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="text-sm text-orange-600 font-semibold mb-2">BOOKING STRATEGY</div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-3">Best Time to Book Hotels for Lowest Prices (2026
                            Data)</h2>
                        <p class="text-gray-600 mb-4">Data-driven analysis reveals when to book hotels to get the lowest
                            prices in 2026.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500">10 min read</span>
                            <a href="{{ route('blog.best-time-book-hotels-2026') }}"
                                class="text-blue-600 font-medium hover:text-blue-800">Read More →</a>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
@endsection