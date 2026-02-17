@extends('layouts.app')

@section('title', 'Cheap Flights from {{ $origin }} to {{ $destination }} - BestFlightHotelDeals')

@section('content')
<div class="bg-gradient-to-br from-blue-50 to-indigo-100 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold text-gray-900 mb-4">
            Flights from {{ $originCity }} to {{ $destinationCity }}
        </h1>
        <p class="text-xl text-gray-600 mb-8">
            Find the best deals on flights from {{ $originCity }} to {{ $destinationCity }}. Compare prices from hundreds of airlines.
        </p>

        <!-- Quick Search -->
        <div class="bg-white shadow-xl rounded-lg p-6 mb-8">
            <form action="{{ route('search.flights') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <input type="hidden" name="from" value="{{ $origin }}">
                <input type="hidden" name="to" value="{{ $destination }}">
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Departure</label>
                    <input type="date" name="departure" class="w-full px-3 py-2 border rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Return</label>
                    <input type="date" name="return" class="w-full px-3 py-2 border rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Passengers</label>
                    <select name="passengers" class="w-full px-3 py-2 border rounded-lg">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4+</option>
                    </select>
                </div>
                <div class="flex items-end">
                    <button type="submit" class="w-full bg-blue-600 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-700">
                        Search Flights
                    </button>
                </div>
            </form>
        </div>

        <!-- Route Info -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white rounded-lg p-6 shadow-md">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Route Information</h2>
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Average Flight Time:</span>
                        <span class="font-semibold">{{ $flightDuration }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Distance:</span>
                        <span class="font-semibold">{{ $distance }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Popular Airlines:</span>
                        <span class="font-semibold">{{ $airlines }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Typical Price Range:</span>
                        <span class="font-semibold text-blue-600">{{ $priceRange }}</span>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg p-6 shadow-md">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Travel Tips</h2>
                <ul class="space-y-2 text-gray-700">
                    <li class="flex items-start">
                        <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        Book 2-3 months in advance for best prices
                    </li>
                    <li class="flex items-start">
                        <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        {{ $bestMonth }} is typically the cheapest month
                    </li>
                    <li class="flex items-start">
                        <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        Consider flying on Tuesdays or Wednesdays
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
