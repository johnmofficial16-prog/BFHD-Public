@extends('layouts.app')

@section('title', 'Dubai Travel Guide: Where Luxury Meets Adventure - BestFlightHotelDeals Blog')

@section('content')
<article class="bg-white py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-8">
            <a href="{{ route('blog') }}" class="text-blue-600 hover:text-blue-800 font-medium">← Back to Blog</a>
        </div>
        
        <header class="mb-8">
            <div class="text-sm text-green-600 font-semibold mb-2">DESTINATION GUIDES</div>
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Dubai Travel Guide: Where Luxury Meets Adventure</h1>
            <div class="flex items-center text-gray-500 text-sm">
                <span>6 min read</span>
                <span class="mx-2">•</span>
                <time>November 2025</time>
            </div>
        </header>

        <img src="https://images.unsplash.com/photo-1512453979798-5ea266f8880c?w=1200" alt="Dubai" class="w-full h-96 object-cover rounded-lg mb-8">

        <div class="prose prose-lg max-w-none">
            <p class="text-xl text-gray-700 leading-relaxed">Dubai is a destination that blends opulence, culture, and thrill. Whether you're searching for luxury hotels, adrenaline-filled adventures, or cultural experiences, Dubai offers something for everyone.</p>

            <h2 class="text-2xl font-bold text-gray-900 mt-8 mb-4">Top Attractions</h2>
            <p>From record-breaking skyscrapers to world-class malls, Dubai is packed with fascinating landmarks.</p>
            <ul class="list-disc pl-6 space-y-2">
                <li>Burj Khalifa</li>
                <li>Dubai Desert Safari</li>
                <li>Dubai Marina & JBR</li>
            </ul>

            <h2 class="text-2xl font-bold text-gray-900 mt-8 mb-4">Where to Stay</h2>
            <p>Dubai offers a wide range of accommodations from luxury resorts to budget-friendly hotels.</p>
            <ul class="list-disc pl-6 space-y-2">
                <li>Luxury: Palm Jumeirah resorts</li>
                <li>Budget: Deira & Bur Dubai</li>
            </ul>

            <h2 class="text-2xl font-bold text-gray-900 mt-8 mb-4">Best Experiences</h2>
            <p>Explore cultural markets, dine in world-famous restaurants, and enjoy scenic views from sky-high lounges.</p>
            <ul class="list-disc pl-6 space-y-2">
                <li>Old Dubai & Souks</li>
                <li>Skydiving over Palm Jumeirah</li>
            </ul>
        </div>

        <div class="mt-12 pt-8 border-t border-gray-200">
            <a href="{{ route('blog') }}" class="text-blue-600 hover:text-blue-800 font-medium">← Back to all posts</a>
        </div>
    </div>
</article>
@endsection
