@extends('layouts.app')

@section('title', 'ZIPAIR Vancouver to Tokyo: Is It Really Cheaper? (2026 Review)')
@section('meta_description', 'ZIPAIR offers $289 flights from Vancouver to Tokyo, but hidden fees can double the price. Here\'s the truth about ZIPAIR\'s budget flights to Japan in 2026.')
@section('og_image', 'https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?w=1200&q=80')

@section('content')
<div class="bg-gradient-to-br from-purple-50 via-pink-50 to-orange-50 min-h-screen py-12">
    <article class="max-w-4xl mx-auto px-6">
        <!-- Breadcrumb -->
        <nav class="mb-6 text-sm text-gray-600">
            <a href="/" class="hover:text-purple-600">Home</a>
            <span class="mx-2">/</span>
            <a href="{{ route('blog') }}" class="hover:text-purple-600">Blog</a>
            <span class="mx-2">/</span>
            <span class="text-gray-900">ZIPAIR Vancouver to Tokyo Review</span>
        </nav>

        <!-- Header -->
        <header class="mb-10">
            <div class="inline-block bg-gradient-to-r from-purple-600 to-pink-600 text-white px-4 py-1 rounded-full text-sm font-bold mb-4">
                ✈️ Budget Airlines • Feb 2026
            </div>
            <h1 class="text-4xl md:text-5xl font-black text-gray-900 mb-4 leading-tight">
                ZIPAIR Vancouver to Tokyo: Is It Really Cheaper Than Air Canada?
            </h1>
            <p class="text-xl text-gray-600 mb-6">
                The truth about ZIPAIR's $289 flights from YVR to Tokyo — including the hidden fees that can double your ticket price.
            </p>
            <div class="flex items-center gap-4 text-sm text-gray-500">
                <span>📅 Updated: February 17, 2026</span>
                <span>⏱️ 8 min read</span>
            </div>
        </header>

        <!-- Main Content -->
        <div class="bg-white rounded-3xl shadow-xl p-8 md:p-12 space-y-8">
            
            <!-- Quick Answer Box -->
            <div class="bg-gradient-to-r from-green-50 to-emerald-50 border-l-4 border-green-500 p-6 rounded-lg">
                <h3 class="font-bold text-lg text-gray-900 mb-2">🎯 The Bottom Line</h3>
                <p class="text-gray-700 leading-relaxed">
                    <strong>ZIPAIR can save you 30-40% vs. Air Canada</strong> — but only if you travel light. Base fares start at <strong>$289 one-way</strong>, but adding checked bags, seat selection, and meals brings the real cost to <strong>$825-$975 round-trip</strong>. Still cheaper than legacy carriers, but not as cheap as advertised.
                </p>
            </div>

            <h2 class="text-3xl font-bold text-gray-900 mt-10">What is ZIPAIR?</h2>
            <p class="text-gray-700 leading-relaxed">
                ZIPAIR is a low-cost carrier owned by Japan Airlines (JAL), launched in 2020 to compete with AirAsia X and other budget long-haul airlines. In 2024, they started flying the Vancouver-Tokyo route with Boeing 787-8 Dreamliners — the same aircraft Air Canada uses, but with a very different pricing model.
            </p>

            <h2 class="text-3xl font-bold text-gray-900 mt-10">The Real Price Breakdown (2026)</h2>
            <p class="text-gray-700 leading-relaxed mb-4">
                Here's what you'll <em>actually</em> pay when you book ZIPAIR from Vancouver to Tokyo:
            </p>

            <!-- Price Comparison Table -->
            <div class="overflow-x-auto">
                <table class="w-full border-collapse bg-gray-50 rounded-lg overflow-hidden">
                    <thead class="bg-gradient-to-r from-purple-600 to-pink-600 text-white">
                        <tr>
                            <th class="px-6 py-4 text-left font-bold">Item</th>
                            <th class="px-6 py-4 text-left font-bold">Base Fare</th>
                            <th class="px-6 py-4 text-left font-bold">With Essentials</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        <tr class="border-b border-gray-200">
                            <td class="px-6 py-4">One-way ticket</td>
                            <td class="px-6 py-4 font-semibold text-green-600">$289 - $361</td>
                            <td class="px-6 py-4">$289 - $361</td>
                        </tr>
                        <tr class="border-b border-gray-200">
                            <td class="px-6 py-4">Checked bag (1 piece, 23kg)</td>
                            <td class="px-6 py-4 text-red-600">Not included</td>
                            <td class="px-6 py-4">+$60</td>
                        </tr>
                        <tr class="border-b border-gray-200">
                            <td class="px-6 py-4">Seat selection (standard)</td>
                            <td class="px-6 py-4 text-red-600">Not included</td>
                            <td class="px-6 py-4">+$25</td>
                        </tr>
                        <tr class="border-b border-gray-200">
                            <td class="px-6 py-4">In-flight meal</td>
                            <td class="px-6 py-4 text-red-600">Not included</td>
                            <td class="px-6 py-4">+$15</td>
                        </tr>
                        <tr class="bg-purple-100 font-bold">
                            <td class="px-6 py-4">TOTAL (Round-trip)</td>
                            <td class="px-6 py-4 text-green-600">$578 - $722</td>
                            <td class="px-6 py-4 text-purple-600">$825 - $975</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h2 class="text-3xl font-bold text-gray-900 mt-10">ZIPAIR vs. Air Canada: The Showdown</h2>
            <p class="text-gray-700 leading-relaxed mb-4">
                Here's how ZIPAIR stacks up against legacy carriers on the Vancouver-Tokyo route:
            </p>

            <div class="grid md:grid-cols-2 gap-6 mb-6">
                <!-- ZIPAIR Card -->
                <div class="border-2 border-purple-200 rounded-xl p-6 bg-purple-50">
                    <h3 class="text-xl font-bold text-purple-900 mb-3">✈️ ZIPAIR</h3>
                    <div class="space-y-2 text-gray-700">
                        <div class="flex justify-between">
                            <span>Economy (with essentials)</span>
                            <span class="font-bold text-green-600">$825 - $975</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Full-Flat (lie-flat seat)</span>
                            <span class="font-bold">$1,800+</span>
                        </div>
                        <div class="mt-4 text-sm">
                            <strong>Pros:</strong> Cheapest option, 787 Dreamliner, JAL-owned<br>
                            <strong>Cons:</strong> Hidden fees, a la carte everything
                        </div>
                    </div>
                </div>

                <!-- Air Canada Card -->
                <div class="border-2 border-red-200 rounded-xl p-6 bg-red-50">
                    <h3 class="text-xl font-bold text-red-900 mb-3">🍁 Air Canada</h3>
                    <div class="space-y-2 text-gray-700">
                        <div class="flex justify-between">
                            <span>Economy (all-in)</span>
                            <span class="font-bold">$1,200 - $1,500</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Business Class</span>
                            <span class="font-bold">$4,500+</span>
                        </div>
                        <div class="mt-4 text-sm">
                            <strong>Pros:</strong> Bags/meals included, Aeroplan points<br>
                            <strong>Cons:</strong> 35% more expensive than ZIPAIR
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-yellow-50 border-l-4 border-yellow-500 p-6 rounded-lg">
                <p class="text-gray-800 font-semibold">
                    💡 <strong>Money-Saving Tip:</strong> ZIPAIR saves you ~$300-$600 per person vs. Air Canada. For a family of 4, that's $1,200-$2,400 in savings — enough for 3 nights at a Tokyo hotel.
                </p>
            </div>

            <h2 class="text-3xl font-bold text-gray-900 mt-10">When to Book for the Cheapest Fares</h2>
            <p class="text-gray-700 leading-relaxed mb-4">
                Based on 2026 pricing data, here's the cheat sheet:
            </p>

            <ul class="space-y-3 text-gray-700">
                <li class="flex items-start gap-3">
                    <span class="text-green-600 font-bold text-xl">✓</span>
                    <div>
                        <strong>Cheapest Month:</strong> February (avg. $331 one-way) — avoid March & June (peak cherry blossom season)
                    </div>
                </li>
                <li class="flex items-start gap-3">
                    <span class="text-green-600 font-bold text-xl">✓</span>
                    <div>
                        <strong>Cheapest Day:</strong> Wednesdays — prices drop 10-15% compared to Fridays/Sundays
                    </div>
                </li>
                <li class="flex items-start gap-3">
                    <span class="text-green-600 font-bold text-xl">✓</span>
                    <div>
                        <strong>Booking Window:</strong> 2-4 days before departure for flash deals (risky but cheapest) OR 3-6 months ahead for stable pricing
                    </div>
                </li>
                <li class="flex items-start gap-3">
                    <span class="text-green-600 font-bold text-xl">✓</span>
                    <div>
                        <strong>Sweet Spot Months:</strong> September & October — round-trips under $800 with better weather than winter
                    </div>
                </li>
            </ul>

            <h2 class="text-3xl font-bold text-gray-900 mt-10">What's Included (And What's Not)</h2>
            <p class="text-gray-700 leading-relaxed mb-4">
                ZIPAIR's base fare is <em>extremely</em> stripped down. Here's what you get — and what costs extra:
            </p>

            <div class="grid md:grid-cols-2 gap-6">
                <!-- Included -->
                <div class="bg-green-50 rounded-xl p-6 border border-green-200">
                    <h3 class="font-bold text-green-900 mb-3 text-lg">✅ Included (FREE)</h3>
                    <ul class="space-y-2 text-gray-700">
                        <li>• 1 carry-on bag (7kg max)</li>
                        <li>• 1 personal item (purse, backpack)</li>
                        <li>• Water & basic snacks</li>
                        <li>• In-seat power & USB ports</li>
                    </ul>
                </div>

                <!-- Extra Cost -->
                <div class="bg-red-50 rounded-xl p-6 border border-red-200">
                    <h3 class="font-bold text-red-900 mb-3 text-lg">💰 Costs Extra</h3>
                    <ul class="space-y-2 text-gray-700">
                        <li>• Checked bags ($60-$100 each)</li>
                        <li>• Seat selection ($15-$80)</li>
                        <li>• Meals ($10-$25)</li>
                        <li>• Wi-Fi ($15-$30)</li>
                        <li>• Blankets & pillows ($10)</li>
                    </ul>
                </div>
            </div>

            <h2 class="text-3xl font-bold text-gray-900 mt-10">Is ZIPAIR Worth It?</h2>
            <p class="text-gray-700 leading-relaxed mb-4">
                The verdict depends on your travel style:
            </p>

            <div class="space-y-4">
                <div class="bg-green-50 border-l-4 border-green-500 p-5 rounded">
                    <h4 class="font-bold text-green-900 mb-2">✅ Book ZIPAIR if you:</h4>
                    <ul class="text-gray-700 space-y-1 ml-4">
                        <li>• Travel light (carry-on only)</li>
                        <li>• Don't care about seat selection</li>
                        <li>• Want to save $500+ per ticket</li>
                        <li>• Can pack your own snacks</li>
                    </ul>
                </div>

                <div class="bg-red-50 border-l-4 border-red-500 p-5 rounded">
                    <h4 class="font-bold text-red-900 mb-2">❌ Skip ZIPAIR if you:</h4>
                    <ul class="text-gray-700 space-y-1 ml-4">
                        <li>• Need 2+ checked bags</li>
                        <li>• Want a comfortable seat (exit row, extra legroom)</li>
                        <li>• Collect Aeroplan or other airline points</li>
                        <li>• Prefer all-inclusive pricing</li>
                    </ul>
                </div>
            </div>

            <h2 class="text-3xl font-bold text-gray-900 mt-10">Pro Tips from Frequent Flyers</h2>
            <div class="bg-purple-50 rounded-xl p-6 space-y-3 text-gray-700">
                <p><strong>1. Bring an empty water bottle.</strong> Fill it after security to avoid $5 bottled water on the plane.</p>
                <p><strong>2. Pre-order meals when booking.</strong> They're $3-$5 cheaper than buying onboard.</p>
                <p><strong>3. Skip seat selection.</strong> ZIPAIR auto-assigns decent seats if you check in early (24 hours before).</p>
                <p><strong>4. Use a travel rewards credit card.</strong> Cards like the <a href="{{ route('flights') }}" class="text-purple-600 hover:underline">Scotiabank Passport Visa</a> give you lounge access, offsetting the "budget" experience.</p>
                <p><strong>5. Book directly with ZIPAIR.</strong> Third-party sites (Kayak, Expedia) sometimes charge hidden booking fees.</p>
            </div>

            <h2 class="text-3xl font-bold text-gray-900 mt-10">Frequently Asked Questions</h2>
            
            <div class="space-y-4">
                <div>
                    <h3 class="font-bold text-lg text-gray-900">Q: Does ZIPAIR fly daily from Vancouver?</h3>
                    <p class="text-gray-700 mt-2">ZIPAIR operates 5 flights per week (up from 3 in 2024). They're increasing to daily service in summer 2026.</p>
                </div>

                <div>
                    <h3 class="font-bold text-lg text-gray-900">Q: Can I earn airline points on ZIPAIR?</h3>
                    <p class="text-gray-700 mt-2">No. As a low-cost carrier, ZIPAIR doesn't participate in JAL's Mileage Bank or other frequent flyer programs.</p>
                </div>

                <div>
                    <h3 class="font-bold text-lg text-gray-900">Q: What's the baggage allowance?</h3>
                    <p class="text-gray-700 mt-2">Base fare includes 1 carry-on (7kg) + 1 personal item. Checked bags cost $60-$100 each (23kg max).</p>
                </div>

                <div>
                    <h3 class="font-bold text-lg text-gray-900">Q: Are there student discounts?</h3>
                    <p class="text-gray-700 mt-2">ZIPAIR occasionally offers student/youth fares (under 25). Check their website or sign up for their newsletter for flash sales.</p>
                </div>
            </div>

            <!-- CTA Box -->
            <div class="mt-12 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-2xl p-8 text-center">
                <h3 class="text-2xl font-bold mb-4">Ready to Book Your Tokyo Trip?</h3>
                <p class="mb-6 text-purple-100">Compare ZIPAIR, Air Canada, and ANA side-by-side to find the best deal for your dates.</p>
                <a href="{{ route('flights') }}" class="inline-block bg-white text-purple-600 font-bold px-8 py-4 rounded-full hover:bg-gray-100 transition shadow-lg">
                    Compare Flights to Tokyo →
                </a>
            </div>

        </div>

        <!-- Related Articles -->
        <div class="mt-12">
            <h3 class="text-2xl font-bold text-gray-900 mb-6">Related Articles</h3>
            <div class="grid md:grid-cols-3 gap-6">
                <a href="{{ route('blog.best-budget-airlines-2026') }}" class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition">
                    <h4 class="font-bold text-gray-900 mb-2">Best Budget Airlines for International Travel (2026)</h4>
                    <p class="text-gray-600 text-sm">Our top picks for cheap long-haul flights</p>
                </a>
                <a href="{{ route('blog.how-to-find-cheap-flights-2026') }}" class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition">
                    <h4 class="font-bold text-gray-900 mb-2">How to Find Cheap Flights in 2026</h4>
                    <p class="text-gray-600 text-sm">7 proven strategies to save on airfare</p>
                </a>
                <a href="{{ route('flights') }}" class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition">
                    <h4 class="font-bold text-gray-900 mb-2">Search All Vancouver Flights</h4>
                    <p class="text-gray-600 text-sm">Compare prices from 500+ airlines</p>
                </a>
            </div>
        </div>

    </article>
</div>
@endsection
