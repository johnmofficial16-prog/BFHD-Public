@extends('layouts.app')

@section('title', 'Find Hotels & Accommodations - BestFlightHotelDeals')

@section('content')
<!-- Hero Section with Luxury Theme -->
<div class="relative min-h-[600px] flex items-center justify-center py-20 overflow-hidden">
    <!-- Background Image -->
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?q=80&w=2070&auto=format&fit=crop" 
             alt="Luxury Hotel" 
             class="w-full h-full object-cover">
        <!-- Overlay -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/30 to-black/60"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
        <div class="text-center mb-10 animate-fade-in-up">
            <h1 class="text-5xl md:text-7xl font-black text-white drop-shadow-lg tracking-tight mb-4">
                Wake Up in <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-200 to-pink-200">Paradise</span>
            </h1>
            <p class="mt-4 max-w-2xl mx-auto text-xl md:text-2xl text-white/90 font-medium drop-shadow-md">
                Find the perfect stay at the best price, worldwide.
            </p>
        </div>

        <!-- Premium Dark Glassmorphism Search Form -->
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

                <!-- Stays Form -->
                <div x-data="{
                         hotelPaxOpen: false,
                         rooms: 1,
                         hotelAdults: 2,
                         hotelChildren: 0,
                         get hotelPaxLabel() {
                             let parts = [this.rooms + ' room' + (this.rooms > 1 ? 's' : '')];
                             parts.push(this.hotelAdults + ' adult' + (this.hotelAdults > 1 ? 's' : ''));
                             if (this.hotelChildren > 0) parts.push(this.hotelChildren + ' child' + (this.hotelChildren > 1 ? 'ren' : ''));
                             return parts.join(', ');
                         }
                     }"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 transform translate-y-4"
                     x-transition:enter-end="opacity-100 transform translate-y-0"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100 transform translate-y-0"
                     x-transition:leave-end="opacity-0 transform -translate-y-4">
                    <form action="{{ route('search.hotels') }}" method="GET">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Destination -->
                            <div class="relative group">
                                <label class="block text-gray-700 font-bold mb-2 text-sm ml-1">Going to</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="h-6 w-6 text-gray-400 group-focus-within:text-purple-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                    </div>
                                    <input type="text" name="destination" placeholder="City, hotel, or region" 
                                           class="w-full pl-12 pr-4 py-4 border-2 border-gray-200 rounded-xl text-lg font-semibold focus:border-purple-500 focus:ring-4 focus:ring-purple-500/20 focus:outline-none transition-all shadow-sm hover:border-gray-300 bg-white/20 focus:bg-white/30">
                                </div>
                            </div>
                            
                            <!-- Check-in / Check-out -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="relative group">
                                    <label class="block text-gray-700 font-bold mb-2 text-xs md:text-sm ml-1">Check-in</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <svg class="h-6 w-6 text-gray-400 group-focus-within:text-purple-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                        </div>
                                        <input type="text" id="stays-checkin" name="checkin" placeholder="Select date" readonly
                                               class="stays-datepicker w-full pl-10 md:pl-12 pr-2 md:pr-4 py-3 md:py-4 border-2 border-gray-200 rounded-xl text-sm md:text-base font-semibold focus:border-purple-500 focus:ring-4 focus:ring-purple-500/20 focus:outline-none transition-all shadow-sm hover:border-gray-300 bg-white/20 focus:bg-white/30 cursor-pointer">
                                    </div>
                                </div>
                                <div class="relative group">
                                    <label class="block text-gray-700 font-bold mb-2 text-xs md:text-sm ml-1">Check-out</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <svg class="h-6 w-6 text-gray-400 group-focus-within:text-purple-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                        </div>
                                        <input type="text" id="stays-checkout" name="checkout" placeholder="Select date" readonly
                                               class="stays-datepicker w-full pl-10 md:pl-12 pr-2 md:pr-4 py-3 md:py-4 border-2 border-gray-200 rounded-xl text-sm md:text-base font-semibold focus:border-purple-500 focus:ring-4 focus:ring-purple-500/20 focus:outline-none transition-all shadow-sm hover:border-gray-300 bg-white/20 focus:bg-white/30 cursor-pointer">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Guests & Rooms -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                            <div class="relative group">
                                <label class="block text-gray-700 font-bold mb-2 text-sm ml-1">Guests & Rooms</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="h-6 w-6 text-gray-400 group-focus-within:text-purple-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                                    </div>
                                    <button type="button" @click="hotelPaxOpen = !hotelPaxOpen" @click.away="hotelPaxOpen = false"
                                            class="w-full pl-12 pr-10 py-4 border-2 border-gray-200 rounded-xl text-lg font-semibold focus:border-purple-500 focus:ring-4 focus:ring-purple-500/20 focus:outline-none transition-all shadow-sm hover:border-gray-300 bg-white/20 focus:bg-white/30 text-left cursor-pointer">
                                        <span x-text="hotelPaxLabel">1 room, 2 adults</span>
                                    </button>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                                        <svg class="fill-current h-4 w-4 transition-transform" :class="hotelPaxOpen ? 'rotate-180' : ''" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                    </div>

                                    <!-- Hotel Guest Counter Popover -->
                                    <div x-show="hotelPaxOpen" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform -translate-y-2" x-transition:enter-end="opacity-100 transform translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                         class="absolute top-full left-0 right-0 mt-2 bg-white rounded-xl shadow-2xl border-2 border-gray-100 p-5 z-[100]" style="display: none;">
                                        <!-- Rooms -->
                                        <div class="flex items-center justify-between py-3">
                                            <div>
                                                <p class="font-bold text-gray-900">Rooms</p>
                                            </div>
                                            <div class="flex items-center space-x-3">
                                                <button type="button" @click="rooms = Math.max(1, rooms - 1)" class="w-9 h-9 rounded-full border-2 border-gray-300 flex items-center justify-center text-gray-600 hover:border-purple-500 hover:text-purple-600 transition disabled:opacity-30 disabled:cursor-not-allowed" :disabled="rooms <= 1">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/></svg>
                                                </button>
                                                <span class="w-6 text-center font-bold text-lg" x-text="rooms">1</span>
                                                <button type="button" @click="rooms = Math.min(4, rooms + 1)" class="w-9 h-9 rounded-full border-2 border-gray-300 flex items-center justify-center text-gray-600 hover:border-purple-500 hover:text-purple-600 transition disabled:opacity-30 disabled:cursor-not-allowed" :disabled="rooms >= 4">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                                </button>
                                            </div>
                                        </div>
                                        <!-- Adults -->
                                        <div class="flex items-center justify-between py-3 border-t border-gray-100">
                                            <div>
                                                <p class="font-bold text-gray-900">Adults</p>
                                                <p class="text-sm text-gray-500">Age 18+</p>
                                            </div>
                                            <div class="flex items-center space-x-3">
                                                <button type="button" @click="hotelAdults = Math.max(1, hotelAdults - 1)" class="w-9 h-9 rounded-full border-2 border-gray-300 flex items-center justify-center text-gray-600 hover:border-purple-500 hover:text-purple-600 transition disabled:opacity-30 disabled:cursor-not-allowed" :disabled="hotelAdults <= 1">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/></svg>
                                                </button>
                                                <span class="w-6 text-center font-bold text-lg" x-text="hotelAdults">2</span>
                                                <button type="button" @click="hotelAdults = Math.min(9, hotelAdults + 1)" class="w-9 h-9 rounded-full border-2 border-gray-300 flex items-center justify-center text-gray-600 hover:border-purple-500 hover:text-purple-600 transition disabled:opacity-30 disabled:cursor-not-allowed" :disabled="hotelAdults >= 9">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                                </button>
                                            </div>
                                        </div>
                                        <!-- Children -->
                                        <div class="flex items-center justify-between py-3 border-t border-gray-100">
                                            <div>
                                                <p class="font-bold text-gray-900">Children</p>
                                                <p class="text-sm text-gray-500">Age 0-17</p>
                                            </div>
                                            <div class="flex items-center space-x-3">
                                                <button type="button" @click="hotelChildren = Math.max(0, hotelChildren - 1)" class="w-9 h-9 rounded-full border-2 border-gray-300 flex items-center justify-center text-gray-600 hover:border-purple-500 hover:text-purple-600 transition disabled:opacity-30 disabled:cursor-not-allowed" :disabled="hotelChildren <= 0">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/></svg>
                                                </button>
                                                <span class="w-6 text-center font-bold text-lg" x-text="hotelChildren">0</span>
                                                <button type="button" @click="hotelChildren = Math.min(6, hotelChildren + 1)" class="w-9 h-9 rounded-full border-2 border-gray-300 flex items-center justify-center text-gray-600 hover:border-purple-500 hover:text-purple-600 transition disabled:opacity-30 disabled:cursor-not-allowed" :disabled="hotelChildren >= 6">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                                </button>
                                            </div>
                                        </div>
                                        <button type="button" @click="hotelPaxOpen = false" class="mt-3 w-full bg-purple-600 hover:bg-purple-700 text-white font-bold py-2.5 rounded-lg transition">Done</button>
                                    </div>
                                </div>
                                <!-- Hidden inputs -->
                                <input type="hidden" name="rooms" :value="rooms">
                                <input type="hidden" name="adults" :value="hotelAdults">
                                <input type="hidden" name="children" :value="hotelChildren">
                                <input type="hidden" name="travelers" :value="hotelAdults + hotelChildren">
                            </div>
                        </div>

                        <button type="submit" class="mt-8 w-full md:w-auto bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white font-black text-xl px-12 py-5 rounded-full shadow-lg shadow-purple-500/30 transition transform hover:-translate-y-0.5 active:translate-y-0">
                            Search
                        </button>
                    </form>
                </div>
                </div> <!-- Close inner container -->
            </div> <!-- Close outer container with glow -->
        </div>
    </div>
</div>

<!-- Popular Destinations -->
<div class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-gray-900 text-center mb-12">Trending Destinations</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="relative rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition group cursor-pointer aspect-[3/4]">
                <img src="https://images.unsplash.com/photo-1549144511-f099e773c147?w=400" alt="Dubai" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                <div class="absolute bottom-4 left-4 right-4">
                    <h3 class="text-white text-2xl font-bold">Dubai</h3>
                    <p class="text-white/90 text-sm mt-1">Luxury stays from $150</p>
                </div>
            </div>

            <div class="relative rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition group cursor-pointer aspect-[3/4]">
                <img src="https://images.unsplash.com/photo-1502602898657-3e91760cbb34?w=400" alt="Paris" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                <div class="absolute bottom-4 left-4 right-4">
                    <h3 class="text-white text-2xl font-bold">Paris</h3>
                    <p class="text-white/90 text-sm mt-1">Romantic getaways from $200</p>
                </div>
            </div>

            <div class="relative rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition group cursor-pointer aspect-[3/4]">
                <img src="https://images.unsplash.com/photo-1513635269975-59663e0ac1ad?w=400" alt="London" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                <div class="absolute bottom-4 left-4 right-4">
                    <h3 class="text-white text-2xl font-bold">London</h3>
                    <p class="text-white/90 text-sm mt-1">City center from $180</p>
                </div>
            </div>

            <div class="relative rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition group cursor-pointer aspect-[3/4]">
                <img src="https://images.unsplash.com/photo-1518391846015-55a9cc003b25?w=400" alt="Tokyo" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                <div class="absolute bottom-4 left-4 right-4">
                    <h3 class="text-white text-2xl font-bold">Tokyo</h3>
                    <p class="text-white/90 text-sm mt-1">Modern hotels from $120</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
