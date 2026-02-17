@extends('layouts.app')

@section('title', 'Rent a Car - BestFlightHotelDeals')

@section('content')
<!-- Hero Section with Road Trip Theme -->
<div class="relative min-h-[600px] flex items-center justify-center py-20 overflow-hidden">
    <!-- Background Image -->
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?q=80&w=2021&auto=format&fit=crop" 
             alt="Road Trip" 
             class="w-full h-full object-cover">
        <!-- Overlay -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/50 via-transparent to-black/50"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
        <div class="text-center mb-10 animate-fade-in-up">
            <h1 class="text-5xl md:text-7xl font-black text-white drop-shadow-lg tracking-tight mb-4 uppercase italic">
                Hit the <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-orange-500">Road</span>
            </h1>
            <p class="mt-4 max-w-2xl mx-auto text-xl md:text-2xl text-white/90 font-medium drop-shadow-md">
                Freedom works better on four wheels. Best prices guaranteed.
            </p>
        </div>

        <!-- Premium Frosted Glassmorphism Search Form -->
<!-- Unified Search Box (Expedia Style) -->
            <div class="max-w-5xl mx-auto relative group animate-fade-up px-4 md:px-0" style="animation-delay: 0.2s;" x-data>
                <!-- Glow Effect Behind -->
                <div class="absolute -inset-1 bg-gradient-to-r from-purple-600 via-pink-500 to-orange-400 rounded-[2.5rem] opacity-20 blur-2xl group-hover:opacity-30 transition duration-1000"></div>
                
                <!-- Main Container -->
                <div class="relative backdrop-blur-xl border border-white/30 rounded-[2rem] shadow-2xl p-4 md:p-8 ring-1 ring-black/5" style="background: linear-gradient(135deg, rgba(255, 255, 255, 0.4) 0%, rgba(255, 255, 255, 0.3) 100%); backdrop-filter: blur(20px) saturate(180%); -webkit-backdrop-filter: blur(20px) saturate(180%);">


                <!-- Kayak Partnership Badge -->
                <div class="flex justify-center md:justify-end mt-2 mb-4">
                    <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md px-4 py-1.5 rounded-full border border-white/20 shadow-lg transition-transform hover:scale-105 duration-300">
                        <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-white/90 drop-shadow-sm">Searches powered by</span>
                        <span class="font-black text-lg tracking-tighter" style="font-family: 'Plus Jakarta Sans', sans-serif; color: #FF690F; text-shadow: 0 1px 2px rgba(0,0,0,0.1);">KAYAK</span>
                    </div>
                </div>

                <!-- Cars Form -->
                <div 
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 transform translate-y-4"
                     x-transition:enter-end="opacity-100 transform translate-y-0"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100 transform translate-y-0"
                     x-transition:leave-end="opacity-0 transform -translate-y-4">
                    <form action="{{ route('search.cars') }}" method="GET">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="relative group">
                                <label class="block text-gray-700 font-bold mb-2 text-sm ml-1">Pick-up location</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="h-6 w-6 text-gray-400 group-focus-within:text-purple-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                    </div>
                                    <input type="text" name="pickup-location" placeholder="City, airport, or address" 
                                           class="w-full pl-12 pr-4 py-4 border-2 border-gray-200 rounded-xl text-lg font-semibold focus:border-purple-500 focus:ring-4 focus:ring-purple-500/20 focus:outline-none transition-all shadow-sm hover:border-gray-300 bg-white/20 focus:bg-white/30">
                                </div>
                            </div>
                            <div class="relative group">
                                <label class="block text-gray-700 font-bold mb-2 text-sm ml-1">Drop-off location</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="h-6 w-6 text-gray-400 group-focus-within:text-purple-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                    </div>
                                    <input type="text" name="dropoff-location" placeholder="Same as pick-up" 
                                           class="w-full pl-12 pr-4 py-4 border-2 border-gray-200 rounded-xl text-lg font-semibold focus:border-purple-500 focus:ring-4 focus:ring-purple-500/20 focus:outline-none transition-all shadow-sm hover:border-gray-300 bg-white/20 focus:bg-white/30">
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mt-4">
                            <!-- Pick-up date -->
                            <div class="relative group">
                                <label class="block text-gray-700 font-bold mb-2 text-xs md:text-sm ml-1">Pick-up date</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400 group-focus-within:text-purple-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    </div>
                                    <input type="text" id="cars-pickup" name="pickup-date" placeholder="Select date" readonly
                                           class="cars-datepicker w-full pl-12 pr-2 py-3 md:py-4 border-2 border-gray-200 rounded-xl text-sm md:text-base font-semibold focus:border-purple-500 focus:ring-4 focus:ring-purple-500/20 focus:outline-none transition-all shadow-sm hover:border-gray-300 bg-white/20 focus:bg-white/30 cursor-pointer">
                                </div>
                            </div>
                            <!-- Pick-up time -->
                            <div class="relative group">
                                <label class="block text-gray-700 font-bold mb-2 text-xs md:text-sm ml-1">Pick-up time</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400 group-focus-within:text-purple-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    </div>
                                    <select name="pickup-time" class="w-full pl-12 pr-6 py-3 md:py-4 border-2 border-gray-200 rounded-xl text-sm md:text-base font-semibold focus:border-purple-500 focus:ring-4 focus:ring-purple-500/20 focus:outline-none appearance-none bg-white/20 focus:bg-white/30 transition-all shadow-sm hover:border-gray-300">
                                        <option value="10h" selected>10:00 AM</option>
                                        <option value="12h">12:00 PM</option>
                                        <option value="14h">2:00 PM</option>
                                        <option value="0h">12:00 AM</option>
                                        <option value="1h">1:00 AM</option>
                                        <option value="2h">2:00 AM</option>
                                        <option value="3h">3:00 AM</option>
                                        <option value="4h">4:00 AM</option>
                                        <option value="5h">5:00 AM</option>
                                        <option value="6h">6:00 AM</option>
                                        <option value="7h">7:00 AM</option>
                                        <option value="8h">8:00 AM</option>
                                        <option value="9h">9:00 AM</option>
                                        <option value="11h">11:00 AM</option>
                                        <option value="13h">1:00 PM</option>
                                        <option value="15h">3:00 PM</option>
                                        <option value="16h">4:00 PM</option>
                                        <option value="17h">5:00 PM</option>
                                        <option value="18h">6:00 PM</option>
                                        <option value="19h">7:00 PM</option>
                                        <option value="20h">8:00 PM</option>
                                        <option value="21h">9:00 PM</option>
                                        <option value="22h">10:00 PM</option>
                                        <option value="23h">11:00 PM</option>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-500">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                    </div>
                                </div>
                            </div>
                            <!-- Drop-off date -->
                            <div class="relative group">
                                <label class="block text-gray-700 font-bold mb-2 text-xs md:text-sm ml-1">Drop-off date</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400 group-focus-within:text-purple-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    </div>
                                    <input type="text" id="cars-dropoff" name="dropoff-date" placeholder="Select date" readonly
                                           class="cars-datepicker w-full pl-12 pr-2 py-3 md:py-4 border-2 border-gray-200 rounded-xl text-sm md:text-base font-semibold focus:border-purple-500 focus:ring-4 focus:ring-purple-500/20 focus:outline-none transition-all shadow-sm hover:border-gray-300 bg-white/20 focus:bg-white/30 cursor-pointer">
                                </div>
                            </div>
                            <!-- Drop-off time -->
                            <div class="relative group">
                                <label class="block text-gray-700 font-bold mb-2 text-xs md:text-sm ml-1">Drop-off time</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400 group-focus-within:text-purple-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    </div>
                                    <select name="dropoff-time" class="w-full pl-12 pr-6 py-3 md:py-4 border-2 border-gray-200 rounded-xl text-sm md:text-base font-semibold focus:border-purple-500 focus:ring-4 focus:ring-purple-500/20 focus:outline-none appearance-none bg-white/20 focus:bg-white/30 transition-all shadow-sm hover:border-gray-300">
                                        <option value="10h" selected>10:00 AM</option>
                                        <option value="12h">12:00 PM</option>
                                        <option value="14h">2:00 PM</option>
                                        <option value="0h">12:00 AM</option>
                                        <option value="1h">1:00 AM</option>
                                        <option value="2h">2:00 AM</option>
                                        <option value="3h">3:00 AM</option>
                                        <option value="4h">4:00 AM</option>
                                        <option value="5h">5:00 AM</option>
                                        <option value="6h">6:00 AM</option>
                                        <option value="7h">7:00 AM</option>
                                        <option value="8h">8:00 AM</option>
                                        <option value="9h">9:00 AM</option>
                                        <option value="11h">11:00 AM</option>
                                        <option value="13h">1:00 PM</option>
                                        <option value="15h">3:00 PM</option>
                                        <option value="16h">4:00 PM</option>
                                        <option value="17h">5:00 PM</option>
                                        <option value="18h">6:00 PM</option>
                                        <option value="19h">7:00 PM</option>
                                        <option value="20h">8:00 PM</option>
                                        <option value="21h">9:00 PM</option>
                                        <option value="22h">10:00 PM</option>
                                        <option value="23h">11:00 PM</option>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-500">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="mt-8 w-full md:w-auto bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white font-black text-xl px-12 py-5 rounded-full shadow-lg shadow-purple-500/30 transition transform hover:-translate-y-0.5 active:translate-y-0">
                            Search cars
                        </button>
                    </form>
                </div>
                </div> <!-- Close inner container -->
            </div> <!-- Close outer container with glow -->
        </div>
    </div>
</div>

<!-- Features Section -->
<div class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-gray-900 text-center mb-12">Drive with Confidence</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center p-6 border-2 border-gray-100 rounded-2xl hover:border-orange-100 transition duration-300">
                <div class="bg-orange-100 rounded-full h-16 w-16 flex items-center justify-center mx-auto mb-4">
                    <svg class="h-8 w-8 text-orange-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">No Hidden Fees</h3>
                <p class="text-gray-600">The price you see is the price you pay.</p>
            </div>

            <div class="text-center p-6 border-2 border-gray-100 rounded-2xl hover:border-orange-100 transition duration-300">
                <div class="bg-orange-100 rounded-full h-16 w-16 flex items-center justify-center mx-auto mb-4">
                    <svg class="h-8 w-8 text-orange-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Free Cancellation</h3>
                <p class="text-gray-600">Plans change. Cancel for free up to 48h before.</p>
            </div>

            <div class="text-center p-6 border-2 border-gray-100 rounded-2xl hover:border-orange-100 transition duration-300">
                <div class="bg-orange-100 rounded-full h-16 w-16 flex items-center justify-center mx-auto mb-4">
                    <svg class="h-8 w-8 text-orange-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">24/7 Support</h3>
                <p class="text-gray-600">We are here to help whenever you need us.</p>
            </div>
        </div>
    </div>
</div>
@endsection
