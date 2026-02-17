@extends('layouts.app')

@section('title', $partner->name . ' Stats - BestFlightHotelDeals')

@section('content')
<div class="bg-gray-50 min-h-screen py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-8">
            <a href="{{ route('admin.dashboard') }}" class="text-blue-600 hover:text-blue-800 font-medium">← Back to Dashboard</a>
        </div>

        <h1 class="text-3xl font-bold text-gray-900 mb-8">{{ $partner->name }} Statistics</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Total Clicks -->
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <dt class="text-sm font-medium text-gray-500 truncate">Total Clicks</dt>
                    <dd class="mt-1 text-3xl font-semibold text-gray-900">{{ $stats['total_clicks'] }}</dd>
                </div>
            </div>

            <!-- Clicks Today -->
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <dt class="text-sm font-medium text-gray-500 truncate">Clicks Today</dt>
                    <dd class="mt-1 text-3xl font-semibold text-gray-900">{{ $stats['clicks_today'] }}</dd>
                </div>
            </div>

            <!-- Clicks This Month -->
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <dt class="text-sm font-medium text-gray-500 truncate">Clicks This Month</dt>
                    <dd class="mt-1 text-3xl font-semibold text-gray-900">{{ $stats['clicks_this_month'] }}</dd>
                </div>
            </div>
        </div>

        <!-- Recent Clicks Table -->
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Recent Activity</h3>
            </div>
            <div class="border-t border-gray-200">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Vertical</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User Agent</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($partner->clickLogs()->latest()->take(10)->get() as $log)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $log->created_at->format('M d, Y H:i') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ ucfirst($log->vertical) }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500 truncate max-w-xs">
                                {{ $log->user_agent }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
