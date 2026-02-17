@extends('layouts.app')

@section('title', 'How to Plan the Perfect Multi-City Trip - BestFlightHotelDeals Blog')

@section('content')
<article class="bg-white py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-8">
            <a href="{{ route('blog') }}" class="text-blue-600 hover:text-blue-800 font-medium">← Back to Blog</a>
        </div>
        
        <header class="mb-8">
            <div class="text-sm text-purple-600 font-semibold mb-2">TRAVEL TIPS</div>
            <h1 class="text-4xl font-bold text-gray-900 mb-4">How to Plan the Perfect Multi-City Trip</h1>
            <div class="flex items-center text-gray-500 text-sm">
                <span>10 min read</span>
                <span class="mx-2">•</span>
                <time>November 2025</time>
            </div>
        </header>

        <img src="https://images.unsplash.com/photo-1476514525535-07fb3b4ae5f1?w=1200" alt="Travel Planning" class="w-full h-96 object-cover rounded-lg mb-8">

        <div class="prose prose-lg max-w-none">
            <p class="text-xl text-gray-700 leading-relaxed">Multi-city trips allow you to explore multiple destinations in one journey. With smart planning and the right tools, you can save money, reduce travel time, and maximize your adventure.</p>

            <h2 class="text-2xl font-bold text-gray-900 mt-8 mb-4">Route Planning</h2>
            <p>Choose destinations that flow naturally in geography and connectivity.</p>
            <ul class="list-disc pl-6 space-y-2">
                <li>Use mapping tools to visualize your route</li>
                <li>Avoid unnecessary backtracking</li>
            </ul>

            <h2 class="text-2xl font-bold text-gray-900 mt-8 mb-4">Booking Strategies</h2>
            <p>Look for open-jaw tickets, multi-city search options, and flexible date fares.</p>
            <ul class="list-disc pl-6 space-y-2">
                <li>Compare airlines offering free stopovers</li>
                <li>Bundle flights + hotels</li>
            </ul>

            <h2 class="text-2xl font-bold text-gray-900 mt-8 mb-4">Budget Management</h2>
            <p>Track expenses per destination to avoid overspending.</p>
            <ul class="list-disc pl-6 space-y-2">
                <li>Use travel budget apps</li>
                <li>Book accommodations early</li>
            </ul>
        </div>

        <div class="mt-12 pt-8 border-t border-gray-200">
            <a href="{{ route('blog') }}" class="text-blue-600 hover:text-blue-800 font-medium">← Back to all posts</a>
        </div>
    </div>
</article>
@endsection
