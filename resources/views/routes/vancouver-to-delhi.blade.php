@extends('layouts.app')

@section('title', 'Cheap Flights from Vancouver to Delhi (YVR-DEL) | 2026 Deals')
@section('meta_description', 'Find the cheapest flights from Vancouver (YVR) to Delhi (DEL). Compare Air Canada, Air India, and Lufthansa prices. Plus: Visa tips, best time to book, and baggage rules.')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <!-- Hero Section -->
    <div class="relative bg-[#0a0a0a] text-white overflow-hidden">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1587595431973-160d0d94add1?q=80&w=2076&auto=format&fit=crop" alt="New Delhi India Gate" class="w-full h-full object-cover opacity-60">
            <div class="absolute inset-0 bg-gradient-to-b from-black/60 to-black/20"></div>
        </div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 lg:py-32">
            <h1 class="text-4xl md:text-6xl font-black tracking-tight mb-4">
                Flights from <span class="text-blue-400">Vancouver</span> to <span class="text-orange-400">Delhi</span>
            </h1>
            <p class="text-xl md:text-2xl text-gray-200 max-w-2xl mb-8">
                Compare 100+ sites instantly. Find the absolute lowest fare for your trip to India.
            </p>
            
            <!-- Search Widget Container -->
            <div class="bg-white/10 backdrop-blur-md p-4 rounded-xl border border-white/20 max-w-lg">
                <a href="{{ route('search.flights', ['from' => 'YVR', 'to' => 'DEL']) }}" class="block w-full text-center bg-[#ff6b00] hover:bg-[#e65100] text-white font-bold py-4 px-8 rounded-lg shadow-lg transition-transform transform hover:scale-105">
                    Search YVR to DEL Deals &rarr;
                </a>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        
        <!-- Quick Facts Grid -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-12">
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <p class="text-sm text-gray-500 mb-1">Flight Time</p>
                <p class="text-xl font-bold text-gray-900">14h 30m+</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <p class="text-sm text-gray-500 mb-1">Distance</p>
                <p class="text-xl font-bold text-gray-900">11,139 km</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <p class="text-sm text-gray-500 mb-1">Best Month</p>
                <p class="text-xl font-bold text-green-600">November</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <p class="text-sm text-gray-500 mb-1">Avg Price</p>
                <p class="text-xl font-bold text-blue-600">$1,150</p>
            </div>
        </div>

        <!-- Comprehensive Guide Content -->
        <div class="prose prose-lg max-w-none text-gray-700">
            <h2>Non-Stop vs. Connecting Flights</h2>
            <p>
                Flying from <strong>Vancouver International Airport (YVR)</strong> to <strong>Indira Gandhi International Airport (DEL)</strong> is one of the most popular long-haul routes from Western Canada.
            </p>
            <p>
                Currently, <strong>Air India</strong> serves this route with direct flights, taking approximately 14-15 hours. <strong>Air Canada</strong> also operates this route seasonally. If you are looking to save money, connecting flights via Tokyo (ANA, JAL), Frankfurt (Lufthansa), or London (British Airways) can often be $200-$300 cheaper, though they add travel time.
            </p>

            <h3>The Best Time to Book</h3>
            <p>
                Data shows that booking at least <strong>50-60 days in advance</strong> usually secures the best rate. November and February utilize the "shoulder season" pricing, offering cool weather in Delhi without the peak holiday premiums of December.
            </p>

            <h3>Visa Requirements for Canadians</h3>
            <p>
                Canadian citizens <strong>require a visa</strong> to enter India. The e-Visa facility is available and is the most convenient option for tourists. Ensure your passport has at least 6 months of validity from the date of arrival.
            </p>
        </div>

        <!-- FAQ Schema Markup -->
        <div class="mt-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Frequently Asked Questions</h2>
            <div class="space-y-4">
                <details class="group bg-white rounded-lg shadow-sm border border-gray-100">
                    <summary class="flex justify-between items-center cursor-pointer p-4 font-medium text-gray-900">
                        Which airlines fly direct from Vancouver to Delhi?
                        <span class="transition group-open:rotate-180">
                            <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path></svg>
                        </span>
                    </summary>
                    <div class="text-gray-600 mt-2 px-4 pb-4">
                        Air India operates daily non-stop flights. Air Canada operates non-stop flights seasonally. Other carriers like Lufthansa, British Airways, and ANA offer connecting service.
                    </div>
                </details>
                <details class="group bg-white rounded-lg shadow-sm border border-gray-100">
                    <summary class="flex justify-between items-center cursor-pointer p-4 font-medium text-gray-900">
                        How much is a flight from Vancouver to Delhi?
                        <span class="transition group-open:rotate-180">
                            <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path></svg>
                        </span>
                    </summary>
                    <div class="text-gray-600 mt-2 px-4 pb-4">
                        Prices vary by season. Low season fares can start from $1,100 CAD, while peak holiday season (December) can exceed $2,200 CAD.
                    </div>
                </details>
            </div>
        </div>

    </div>
</div>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [{
    "@type": "Question",
    "name": "Which airlines fly direct from Vancouver to Delhi?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Air India operates daily non-stop flights. Air Canada operates non-stop flights seasonally. Other carriers like Lufthansa, British Airways, and ANA offer connecting service."
    }
  }, {
    "@type": "Question",
    "name": "How much is a flight from Vancouver to Delhi?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Prices vary by season. Low season fares can start from $1,100 CAD, while peak holiday season (December) can exceed $2,200 CAD."
    }
  }]
}
</script>
@endsection
