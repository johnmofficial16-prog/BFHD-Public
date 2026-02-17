@extends('layouts.app')

@section('title', 'Contact Us - BestFlightHotelDeals')

@section('content')
    <!-- Hero Section -->
    <div class="relative bg-gray-900 py-24 md:py-32 overflow-hidden">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1516738901171-8eb4fc13bd20?w=1600&q=80"
                class="w-full h-full object-cover opacity-30">
            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-gray-900"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-6 text-center">
            <h1 class="text-4xl md:text-7xl font-black text-white mb-6 tracking-tight">Contact Us</h1>
            <p class="text-xl md:text-2xl text-gray-300 max-w-2xl mx-auto font-medium">We're here to help. Get in touch with
                our team.</p>
        </div>
    </div>

    <div class="bg-white py-16 md:py-24">
        <div class="max-w-7xl mx-auto px-6">

            <div class="bg-amber-50 border-l-4 border-amber-500 p-8 mb-16 rounded-r-xl shadow-sm">
                <h3 class="text-xl font-bold text-amber-900 mb-3 flex items-center">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                    Important Note About Bookings
                </h3>
                <p class="text-amber-800 mb-4 font-medium">
                    We do not manage bookings, payments, refunds, changes, or cancellations. Since all transactions occur on
                    our partners' websites, please contact the respective travel provider directly regarding:
                </p>
                <div class="flex flex-wrap gap-3">
                    <span
                        class="bg-white/50 px-3 py-1 rounded-full text-sm font-bold text-amber-900 border border-amber-200">Booking
                        changes</span>
                    <span
                        class="bg-white/50 px-3 py-1 rounded-full text-sm font-bold text-amber-900 border border-amber-200">Cancellations</span>
                    <span
                        class="bg-white/50 px-3 py-1 rounded-full text-sm font-bold text-amber-900 border border-amber-200">Refunds</span>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
                <div>
                    <h3 class="text-3xl font-black text-gray-900 mb-8">Get in Touch</h3>

                    <div class="space-y-8">
                        <div class="flex items-start p-6 bg-gray-50 rounded-2xl hover:bg-gray-100 transition">
                            <div class="bg-purple-100 p-3 rounded-xl text-purple-600 mr-5">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-bold text-gray-900 mb-1 text-lg">Email Support</p>
                                <p class="text-gray-600 font-medium">info@bestflighthoteldeals.com</p>
                                <p class="text-sm text-gray-500 mt-1">We usually reply within 24 hours</p>
                            </div>
                        </div>

                        <div class="flex items-start p-6 bg-gray-50 rounded-2xl hover:bg-gray-100 transition">
                            <div class="bg-blue-100 p-3 rounded-xl text-blue-600 mr-5">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-bold text-gray-900 mb-1 text-lg">Operating Hours</p>
                                <p class="text-gray-600 font-medium">Monday – Friday</p>
                                <p class="text-gray-500">9:00 AM to 5:00 PM (PST)</p>
                            </div>
                        </div>

                        <div class="flex items-start p-6 bg-gray-50 rounded-2xl hover:bg-gray-100 transition">
                            <div class="bg-green-100 p-3 rounded-xl text-green-600 mr-5">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-bold text-gray-900 mb-1 text-lg">Business Location</p>
                                <p class="text-gray-600 font-medium">MJ Epoch Ventures</p>
                                <p class="text-gray-500">Duncan, British Columbia, Canada</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-8 md:p-10">
                    <h3 class="text-2xl font-black text-gray-900 mb-6">Send us a message</h3>
                    @if(session('success'))
                        <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-bold text-gray-700 mb-2">Name</label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" required
                                    class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-100 rounded-xl focus:bg-white focus:ring-4 focus:ring-purple-100 focus:border-purple-500 transition font-medium"
                                    placeholder="John Doe">
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-bold text-gray-700 mb-2">Email</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                                    class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-100 rounded-xl focus:bg-white focus:ring-4 focus:ring-purple-100 focus:border-purple-500 transition font-medium"
                                    placeholder="john@example.com">
                            </div>
                        </div>

                        <div>
                            <label for="subject" class="block text-sm font-bold text-gray-700 mb-2">Subject</label>
                            <input type="text" id="subject" name="subject" value="{{ old('subject') }}" required
                                class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-100 rounded-xl focus:bg-white focus:ring-4 focus:ring-purple-100 focus:border-purple-500 transition font-medium"
                                placeholder="How can we help?">
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-bold text-gray-700 mb-2">Message</label>
                            <textarea id="message" name="message" rows="5" required
                                class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-100 rounded-xl focus:bg-white focus:ring-4 focus:ring-purple-100 focus:border-purple-500 transition font-medium"
                                placeholder="Tell us more...">{{ old('message') }}</textarea>
                        </div>

                        <button type="submit"
                            class="w-full bg-gray-900 hover:bg-black text-white font-bold text-lg py-4 px-6 rounded-xl transition shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection