@extends('layouts.app')

@section('title', 'Find Cheap Flights - BestFlightHotelDeals')

@section('content')
<!-- Hero Section with Sky High Theme -->
<div class="relative min-h-[600px] flex items-center justify-center py-20 overflow-hidden">
    <!-- Background Image -->
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1436491865332-7a61a109cc05?q=80&w=2074&auto=format&fit=crop" 
             alt="Airplane in sky" 
             class="w-full h-full object-cover">
        <!-- Overlay for text readability -->
        <div class="absolute inset-0 bg-gradient-to-b from-blue-900/40 via-transparent to-white/10"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
        <div class="text-center mb-10 animate-fade-in-up">
            <h1 class="text-5xl md:text-7xl font-black text-white drop-shadow-lg tracking-tight mb-4">
                Discover the <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-200 to-cyan-200">World</span>
            </h1>
            <p class="mt-4 max-w-2xl mx-auto text-xl md:text-2xl text-white/90 font-medium drop-shadow-md">
                Compare millions of flights to find the perfect deal.
            </p>
        </div>

        <!-- Premium Glassmorphism Search Form -->
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

                <!-- Flights Form -->
                <div x-data="{  
                    tripType: 'round',
                    paxOpen: false,
                    adults: 1,
                    children: 0,
                    infants: 0,
                    segments: [
                        { from: '', to: '', date: '', id: 1 }
                    ],
                    get totalPax() { return this.adults + this.children + this.infants },
                    get paxLabel() { 
                        let parts = [];
                        parts.push(this.adults + ' adult' + (this.adults > 1 ? 's' : ''));
                        if (this.children > 0) parts.push(this.children + ' child' + (this.children > 1 ? 'ren' : ''));
                        if (this.infants > 0) parts.push(this.infants + ' infant' + (this.infants > 1 ? 's' : ''));
                        return parts.join(', ');
                    },
                    addSegment() {
                        if (this.segments.length < 6) {
                            this.segments.push({ from: '', to: '', date: '', id: Date.now() });
                        }
                    },
                    removeSegment(index) {
                        if (this.segments.length > 1) {
                            this.segments.splice(index, 1);
                        }
                    }
                }"
                     x-init="segments = [{ from: '', to: '', date: '', id: 1 }]"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 transform translate-y-4"
                     x-transition:enter-end="opacity-100 transform translate-y-0"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100 transform translate-y-0"
                     x-transition:leave-end="opacity-0 transform -translate-y-4">
                    <form action="{{ route('search.flights') }}" method="GET">
                        <!-- Trip Type Toggle -->
                        <div class="flex items-center space-x-6 mb-6 px-1">
                            <label class="inline-flex items-center cursor-pointer group">
                                <input type="radio" name="trip_type" value="round" x-model="tripType" class="form-radio text-purple-600 h-5 w-5 border-gray-300 focus:ring-purple-500 transition duration-150">
                                <span class="ml-2 text-gray-700 font-bold group-hover:text-purple-700 transition">Round-trip</span>
                            </label>
                            <label class="inline-flex items-center cursor-pointer group">
                                <input type="radio" name="trip_type" value="oneway" x-model="tripType" class="form-radio text-purple-600 h-5 w-5 border-gray-300 focus:ring-purple-500 transition duration-150">
                                <span class="ml-2 text-gray-700 font-bold group-hover:text-purple-700 transition">One-way</span>
                            </label>
                            <label class="inline-flex items-center cursor-pointer group">
                                <input type="radio" name="trip_type" value="multicity" x-model="tripType" class="form-radio text-purple-600 h-5 w-5 border-gray-300 focus:ring-purple-500 transition duration-150">
                                <span class="ml-2 text-gray-700 font-bold group-hover:text-purple-700 transition">Multi-city</span>
                            </label>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                            <!-- Leaving From -->
                            <div class="relative group">
                                <label class="block text-gray-700 font-bold mb-2 text-sm ml-1">Leaving from</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="h-6 w-6 text-gray-400 group-focus-within:text-purple-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z"/></svg>
                                    </div>
                                    <input type="text" :name="tripType === 'multicity' ? 'segments[0][from]' : 'from'" placeholder="Airport or city" 
                                           class="w-full pl-12 pr-4 py-4 border-2 border-gray-200 rounded-xl text-lg font-semibold focus:border-purple-500 focus:ring-4 focus:ring-purple-500/20 focus:outline-none transition-all shadow-sm hover:border-gray-300 bg-white/20 focus:bg-white/30">
                                </div>
                            </div>

                            <!-- Going To -->
                            <div class="relative group">
                                <label class="block text-gray-700 font-bold mb-2 text-sm ml-1">Going to</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="h-6 w-6 text-gray-400 group-focus-within:text-purple-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                    </div>
                                    <input type="text" :name="tripType === 'multicity' ? 'segments[0][to]' : 'to'" placeholder="Airport or city" 
                                           class="w-full pl-12 pr-4 py-4 border-2 border-gray-200 rounded-xl text-lg font-semibold focus:border-purple-500 focus:ring-4 focus:ring-purple-500/20 focus:outline-none transition-all shadow-sm hover:border-gray-300 bg-white/20 focus:bg-white/30">
                                </div>
                            </div>

                            <!-- Departure / Return Dates -->
                            <div class="grid grid-cols-1 gap-4" :class="tripType === 'round' ? 'md:grid-cols-2' : ''">
                                <div class="relative group">
                                    <label class="block text-gray-700 font-bold mb-2 text-xs md:text-sm ml-1">Depart</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <svg class="h-6 w-6 text-gray-400 group-focus-within:text-purple-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                        </div>
                                        <input type="text" id="flight-depart" :name="tripType === 'multicity' ? 'segments[0][date]' : 'departure'" placeholder="Select date" readonly 
                                               class="flight-datepicker w-full pl-10 md:pl-12 pr-2 md:pr-4 py-3 md:py-4 border-2 border-gray-200 rounded-xl text-sm md:text-base font-semibold focus:border-purple-500 focus:ring-4 focus:ring-purple-500/20 focus:outline-none transition-all shadow-sm hover:border-gray-300 bg-white/20 focus:bg-white/30 cursor-pointer">
                                    </div>
                                </div>
                                <div class="relative group" x-show="tripType === 'round'" x-transition>
                                    <label class="block text-gray-700 font-bold mb-2 text-xs md:text-sm ml-1">Return</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <svg class="h-6 w-6 text-gray-400 group-focus-within:text-purple-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                        </div>
                                        <input type="text" id="flight-return" name="return" placeholder="Select date" readonly 
                                               class="flight-datepicker w-full pl-10 md:pl-12 pr-2 md:pr-4 py-3 md:py-4 border-2 border-gray-200 rounded-xl text-sm md:text-base font-semibold focus:border-purple-500 focus:ring-4 focus:ring-purple-500/20 focus:outline-none transition-all shadow-sm hover:border-gray-300 bg-white/20 focus:bg-white/30 cursor-pointer">
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Class (Move here to balance grid usually, but sticking to design - make it width auto below) -->
                        </div>

                        <!-- Multi-City Segments -->
                        <div x-show="tripType === 'multicity'" class="space-y-6 mt-8">
                            <template x-for="(segment, index) in segments" :key="segment.id">
                                <template x-if="index > 0">
                                <div class="bg-white/10 p-6 rounded-3xl relative group/segment transition-all hover:bg-white/20 border border-white/20 shadow-inner">
                                    <!-- Segment Header -->
                                    <div class="flex justify-between items-center mb-4">
                                        <span class="text-sm font-bold text-gray-700 uppercase tracking-widest bg-white/50 px-3 py-1 rounded-full backdrop-blur-sm shadow-sm" x-text="'Flight ' + (index + 1)"></span>
                                        <button type="button" @click="removeSegment(index)" class="text-red-500 hover:text-red-700 text-xs font-bold uppercase tracking-wide bg-white/50 px-3 py-1 rounded-full hover:bg-white/80 transition shadow-sm flex items-center gap-1">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                            Remove
                                        </button>
                                    </div>

                                    <!-- Row 1: From & To -->
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                        <!-- Leaving From -->
                                        <div class="relative group">
                                            <label class="block text-gray-700 font-bold mb-2 text-sm ml-1" x-text="'Leaving from'"></label>
                                            <div class="relative">
                                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                                    <svg class="h-6 w-6 text-gray-400 group-focus-within:text-purple-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z"/></svg>
                                                </div>
                                                <input type="text" :name="`segments[${index}][from]`" placeholder="Airport or city" 
                                                       :disabled="tripType !== 'multicity'" x-location-autocomplete
                                                       class="w-full pl-12 pr-4 py-4 border-2 border-gray-200 rounded-xl text-lg font-semibold focus:border-purple-500 focus:ring-4 focus:ring-purple-500/20 focus:outline-none transition-all shadow-sm hover:border-gray-300 bg-white/20 focus:bg-white/30">
                                            </div>
                                        </div>

                                        <!-- Going To -->
                                        <div class="relative group">
                                            <label class="block text-gray-700 font-bold mb-2 text-sm ml-1" x-text="'Going to'"></label>
                                            <div class="relative">
                                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                                    <svg class="h-6 w-6 text-gray-400 group-focus-within:text-purple-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                                </div>
                                                <input type="text" :name="`segments[${index}][to]`" placeholder="Airport or city" 
                                                       :disabled="tripType !== 'multicity'" x-location-autocomplete
                                                       class="w-full pl-12 pr-4 py-4 border-2 border-gray-200 rounded-xl text-lg font-semibold focus:border-purple-500 focus:ring-4 focus:ring-purple-500/20 focus:outline-none transition-all shadow-sm hover:border-gray-300 bg-white/20 focus:bg-white/30">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Row 2: Date -->
                                    <div class="grid grid-cols-1 gap-4">
                                        <div class="relative group">
                                            <label class="block text-gray-700 font-bold mb-2 text-xs md:text-sm ml-1" x-text="'Depart'"></label>
                                            <div class="relative">
                                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                                    <svg class="h-6 w-6 text-gray-400 group-focus-within:text-purple-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                                </div>
                                                <input type="text" :name="`segments[${index}][date]`" placeholder="Select date" readonly
                                                       :disabled="tripType !== 'multicity'" x-datepicker
                                                       class="w-full pl-10 md:pl-12 pr-2 md:pr-4 py-3 md:py-4 border-2 border-gray-200 rounded-xl text-sm md:text-base font-semibold focus:border-purple-500 focus:ring-4 focus:ring-purple-500/20 focus:outline-none transition-all shadow-sm hover:border-gray-300 bg-white/20 focus:bg-white/30 cursor-pointer">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </template>
                            </template>
                            
                             <!-- Add Flight Button -->
                             <div class="flex justify-center pt-6">
                                <button type="button" @click="addSegment()" x-show="segments.length < 6"
                                        class="group flex items-center space-x-2 text-purple-700 font-bold hover:text-purple-900 transition bg-white/50 hover:bg-white/80 backdrop-blur-sm px-6 py-3 rounded-full shadow-lg ring-1 ring-purple-500/20 hover:ring-purple-500/50">
                                    <div class="bg-purple-100 rounded-full p-1 group-hover:bg-purple-200 transition">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                                    </div>
                                    <span>Add Another Flight <span class="text-xs font-normal text-purple-500 ml-1">(Max 6)</span></span>
                                </button>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                             <!-- Travelers (Passenger Counter Popover) -->
                             <div class="relative group">
                                <label class="block text-gray-700 font-bold mb-2 text-sm ml-1">Travelers</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="h-6 w-6 text-gray-400 group-focus-within:text-purple-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                                    </div>
                                    <button type="button" @click="paxOpen = !paxOpen" @click.away="paxOpen = false"
                                            class="w-full pl-12 pr-10 py-4 border-2 border-gray-200 rounded-xl text-lg font-semibold focus:border-purple-500 focus:ring-4 focus:ring-purple-500/20 focus:outline-none transition-all shadow-sm hover:border-gray-300 bg-white/20 focus:bg-white/30 text-left cursor-pointer">
                                        <span x-text="paxLabel">1 adult</span>
                                    </button>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                                        <svg class="fill-current h-4 w-4 transition-transform" :class="paxOpen ? 'rotate-180' : ''" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                    </div>

                                    <!-- Passenger Counter Popover -->
                                    <div x-show="paxOpen" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform -translate-y-2" x-transition:enter-end="opacity-100 transform translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                         class="absolute top-full left-0 right-0 mt-2 bg-white rounded-xl shadow-2xl border-2 border-gray-100 p-5 z-[100]" style="display: none;">
                                        <!-- Adults -->
                                        <div class="flex items-center justify-between py-3">
                                            <div>
                                                <p class="font-bold text-gray-900">Adults</p>
                                                <p class="text-sm text-gray-500">Age 18+</p>
                                            </div>
                                            <div class="flex items-center space-x-3">
                                                <button type="button" @click="adults = Math.max(1, adults - 1)" class="w-9 h-9 rounded-full border-2 border-gray-300 flex items-center justify-center text-gray-600 hover:border-purple-500 hover:text-purple-600 transition disabled:opacity-30 disabled:cursor-not-allowed" :disabled="adults <= 1">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/></svg>
                                                </button>
                                                <span class="w-6 text-center font-bold text-lg" x-text="adults">1</span>
                                                <button type="button" @click="adults = Math.min(9, adults + 1)" class="w-9 h-9 rounded-full border-2 border-gray-300 flex items-center justify-center text-gray-600 hover:border-purple-500 hover:text-purple-600 transition disabled:opacity-30 disabled:cursor-not-allowed" :disabled="adults >= 9">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                                </button>
                                            </div>
                                        </div>
                                        <!-- Children -->
                                        <div class="flex items-center justify-between py-3 border-t border-gray-100">
                                            <div>
                                                <p class="font-bold text-gray-900">Children</p>
                                                <p class="text-sm text-gray-500">Age 2-17</p>
                                            </div>
                                            <div class="flex items-center space-x-3">
                                                <button type="button" @click="children = Math.max(0, children - 1)" class="w-9 h-9 rounded-full border-2 border-gray-300 flex items-center justify-center text-gray-600 hover:border-purple-500 hover:text-purple-600 transition disabled:opacity-30 disabled:cursor-not-allowed" :disabled="children <= 0">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/></svg>
                                                </button>
                                                <span class="w-6 text-center font-bold text-lg" x-text="children">0</span>
                                                <button type="button" @click="children = Math.min(7, children + 1)" class="w-9 h-9 rounded-full border-2 border-gray-300 flex items-center justify-center text-gray-600 hover:border-purple-500 hover:text-purple-600 transition disabled:opacity-30 disabled:cursor-not-allowed" :disabled="children >= 7">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                                </button>
                                            </div>
                                        </div>
                                        <!-- Infants -->
                                        <div class="flex items-center justify-between py-3 border-t border-gray-100">
                                            <div>
                                                <p class="font-bold text-gray-900">Infants</p>
                                                <p class="text-sm text-gray-500">On lap, under 2</p>
                                            </div>
                                            <div class="flex items-center space-x-3">
                                                <button type="button" @click="infants = Math.max(0, infants - 1)" class="w-9 h-9 rounded-full border-2 border-gray-300 flex items-center justify-center text-gray-600 hover:border-purple-500 hover:text-purple-600 transition disabled:opacity-30 disabled:cursor-not-allowed" :disabled="infants <= 0">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/></svg>
                                                </button>
                                                <span class="w-6 text-center font-bold text-lg" x-text="infants">0</span>
                                                <button type="button" @click="infants = Math.min(4, infants + 1)" class="w-9 h-9 rounded-full border-2 border-gray-300 flex items-center justify-center text-gray-600 hover:border-purple-500 hover:text-purple-600 transition disabled:opacity-30 disabled:cursor-not-allowed" :disabled="infants >= 4">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                                </button>
                                            </div>
                                        </div>
                                        <button type="button" @click="paxOpen = false" class="mt-3 w-full bg-purple-600 hover:bg-purple-700 text-white font-bold py-2.5 rounded-lg transition">Done</button>
                                    </div>
                                </div>
                                <!-- Hidden inputs to send separate counts to backend -->
                                <input type="hidden" name="adults" :value="adults">
                                <input type="hidden" name="children" :value="children">
                                <input type="hidden" name="infants" :value="infants">
                                <input type="hidden" name="travelers" :value="totalPax">
                            </div>
                            <!-- Class -->
                            <div class="relative group">
                                <label class="block text-gray-700 font-bold mb-2 text-sm ml-1">Class</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="h-6 w-6 text-gray-400 group-focus-within:text-purple-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                                    </div>
                                    <select name="class" class="w-full pl-12 pr-10 py-4 border-2 border-gray-200 rounded-xl text-lg font-semibold focus:border-purple-500 focus:ring-4 focus:ring-purple-500/20 focus:outline-none appearance-none bg-white/20 focus:bg-white/30 transition-all shadow-sm hover:border-gray-300">
                                        <option value="economy" selected>Economy</option>
                                        <option value="premium">Premium Economy</option>
                                        <option value="business">Business Class</option>
                                        <option value="first">First Class</option>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="mt-8 w-full md:w-auto bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white font-black text-xl px-12 py-5 rounded-full shadow-lg shadow-purple-500/30 transition transform hover:-translate-y-0.5 active:translate-y-0">
                            Search flights
                        </button>
                    </form>
                </div>
                </div> <!-- Close inner container -->
            </div> <!-- Close outer container with glow -->
        </div>
    </div>
</div>

<!-- Popular Routes Section -->
<div class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-gray-900 text-center mb-12">Popular Flight Routes</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Route Card 1 -->
            <div class="bg-gray-50 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition group cursor-pointer">
                <div class="relative h-64 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1513635269975-59663e0ac1ad?w=400" alt="London" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <div class="absolute bottom-4 left-4 text-white">
                        <h3 class="text-2xl font-bold">New York <span class="text-blue-400">→</span> London</h3>
                        <p class="font-medium opacity-90">Round-trip from $450</p>
                    </div>
                </div>
            </div>

            <!-- Route Card 2 -->
            <div class="bg-gray-50 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition group cursor-pointer">
                <div class="relative h-64 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1502602898657-3e91760cbb34?w=400" alt="Paris" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <div class="absolute bottom-4 left-4 text-white">
                        <h3 class="text-2xl font-bold">LAX <span class="text-blue-400">→</span> Paris</h3>
                        <p class="font-medium opacity-90">Round-trip from $520</p>
                    </div>
                </div>
            </div>

            <!-- Route Card 3 -->
            <div class="bg-gray-50 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition group cursor-pointer">
                <div class="relative h-64 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1512453979798-5ea266f8880c?w=400" alt="Dubai" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <div class="absolute bottom-4 left-4 text-white">
                        <h3 class="text-2xl font-bold">New York <span class="text-blue-400">→</span> Dubai</h3>
                        <p class="font-medium opacity-90">Round-trip from $680</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Features Section -->
<div class="py-16 bg-blue-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-gray-900 text-center mb-12">Why Book With Us?</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-md transition text-center">
                <div class="bg-blue-100 rounded-full h-16 w-16 flex items-center justify-center mx-auto mb-6">
                    <svg class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Best Price Guarantee</h3>
                <p class="text-gray-600">We compare hundreds of sites to find you the lowest fares.</p>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-md transition text-center">
                <div class="bg-blue-100 rounded-full h-16 w-16 flex items-center justify-center mx-auto mb-6">
                    <svg class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Secure Booking</h3>
                <p class="text-gray-600">Your data is protected with industry-leading encryption.</p>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-md transition text-center">
                <div class="bg-blue-100 rounded-full h-16 w-16 flex items-center justify-center mx-auto mb-6">
                    <svg class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Instant Results</h3>
                <p class="text-gray-600">Search and compare flights from 500+ airlines instantly.</p>
            </div>
        </div>
    </div>
</div>
@endsection
