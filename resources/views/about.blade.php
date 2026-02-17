@extends('layouts.app')

@section('title', 'About Us - BestFlightHotelDeals')

@section('content')
<!-- Hero Section -->
<div class="relative bg-gray-900 py-24 md:py-32 overflow-hidden">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1488646953014-85cb44e25828?w=1600&q=80" class="w-full h-full object-cover opacity-30">
        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-gray-900"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-6 text-center">
        <h1 class="text-4xl md:text-7xl font-black text-white mb-6 tracking-tight">About Us</h1>
        <p class="text-xl md:text-2xl text-gray-300 max-w-2xl mx-auto font-medium">Discover the story behind BestFlightHotelDeals and our mission to simplify travel.</p>
    </div>
</div>

<div class="bg-white py-16 md:py-24">
    <div class="max-w-4xl mx-auto px-6">
        <div class="prose prose-lg max-w-none text-gray-600">
            <p class="text-2xl text-gray-800 font-bold mb-8 leading-relaxed">
                Welcome to <span class="text-purple-600">BestFlightHotelDeals</span>, a modern travel discovery platform designed to make finding travel deals easy, transparent, and stress-free.
            </p>

            <p class="mb-6 leading-relaxed">
                Our goal is to help travelers from Canada, the United States, and worldwide find the best flight, hotel, and vacation deals by comparing prices from numerous trusted global travel providers.
            </p>

            <div class="bg-purple-50 border-l-4 border-purple-600 p-8 my-10 rounded-r-xl">
                <p class="text-lg font-medium text-purple-900 m-0">
                    We are not a travel agency, nor do we issue tickets or handle reservations. Instead, we operate as a <strong>metasearch and affiliate-based comparison service</strong>, giving you direct access to the best prices across multiple travel partners.
                </p>
            </div>

            <p class="mb-12 leading-relaxed">
                Whether you're planning a family vacation, last-minute business trip, weekend getaway, or long-distance international journey, BestFlightHotelDeals brings together the most relevant travel options in one place.
            </p>

            <div class="grid md:grid-cols-2 gap-12 my-16">
                <div>
                    <h2 class="text-3xl font-black text-gray-900 mb-6">Our Mission</h2>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-3 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <span class="font-medium">To simplify travel search</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-3 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <span class="font-medium">To help travelers compare prices instantly</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-3 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <span class="font-medium">To connect users to trusted providers</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-3 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <span class="font-medium">To promote transparency without hidden fees</span>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="text-3xl font-black text-gray-900 mb-6">How We Work</h2>
                    <p class="mb-4">
                        When you search for a flight or hotel, our system scans multiple affiliate providers. Once you select an offer, you are redirected to the partner's page to complete the booking. They handle:
                    </p>
                    <div class="flex flex-wrap gap-2">
                        <span class="bg-gray-100 px-3 py-1 rounded-full text-sm font-bold text-gray-600">Payments</span>
                        <span class="bg-gray-100 px-3 py-1 rounded-full text-sm font-bold text-gray-600">Ticketing</span>
                        <span class="bg-gray-100 px-3 py-1 rounded-full text-sm font-bold text-gray-600">Confirmations</span>
                        <span class="bg-gray-100 px-3 py-1 rounded-full text-sm font-bold text-gray-600">Support</span>
                    </div>
                </div>
            </div>

            <p class="mb-8 leading-relaxed text-center text-xl font-medium text-gray-900">
                At BestFlightHotelDeals, we focus on providing a seamless, safe, and intuitive search experience—<span class="text-purple-600 font-bold">completely free to users</span>.
            </p>

            <!-- Company Details -->
            <div class="mt-16 pt-12 border-t border-gray-200">
                <h2 class="text-3xl font-black text-gray-900 mb-6 text-center">Company Details</h2>
                <div class="bg-gray-50 rounded-2xl p-8 text-center">
                    <p class="text-lg text-gray-700 mb-2">
                        <strong>BestFlightHotelDeals</strong> is operated by:
                    </p>
                    <p class="text-2xl font-bold text-purple-600 mb-4">MJ Epoch Ventures</p>
                    <div class="flex flex-wrap justify-center gap-4 text-gray-600">
                        <span class="bg-white px-4 py-2 rounded-full text-sm font-medium shadow-sm">📍 Duncan, British Columbia, Canada</span>
                        <span class="bg-white px-4 py-2 rounded-full text-sm font-medium shadow-sm">🏢 Sole Proprietorship</span>
                        <span class="bg-white px-4 py-2 rounded-full text-sm font-medium shadow-sm" style="border: 1px solid #FF690F;">✈️ Official <span style="color: #FF690F; font-weight: 700;">KAYAK</span> Partner</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
