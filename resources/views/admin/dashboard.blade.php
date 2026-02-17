@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold">Dashboard</h1>
        <p class="text-gray-400">Real-time traffic and subscriber monitoring</p>
    </div>

    @if(isset($dbError) && $dbError)
        <div class="bg-yellow-900/50 border border-yellow-600 text-yellow-300 px-4 py-3 rounded-lg mb-6">
            ⚠️ {{ $dbError }}
        </div>
    @endif

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Clicks Today -->
        <div class="bg-gradient-to-br from-blue-600 to-blue-800 p-6 rounded-2xl">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-blue-200 text-sm font-medium">Clicks Today</p>
                    <p class="text-4xl font-bold mt-2">{{ $clicksToday }}</p>
                </div>
                <div class="bg-blue-500/30 p-3 rounded-xl">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Clicks This Week -->
        <div class="bg-gradient-to-br from-purple-600 to-purple-800 p-6 rounded-2xl">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-purple-200 text-sm font-medium">This Week</p>
                    <p class="text-4xl font-bold mt-2">{{ $clicksWeek }}</p>
                </div>
                <div class="bg-purple-500/30 p-3 rounded-xl">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Total Clicks -->
        <div class="bg-gradient-to-br from-emerald-600 to-emerald-800 p-6 rounded-2xl">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-emerald-200 text-sm font-medium">Total Clicks</p>
                    <p class="text-4xl font-bold mt-2">{{ $clicksTotal }}</p>
                </div>
                <div class="bg-emerald-500/30 p-3 rounded-xl">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Subscribers -->
        <div class="bg-gradient-to-br from-amber-600 to-amber-800 p-6 rounded-2xl">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-amber-200 text-sm font-medium">Subscribers</p>
                    <p class="text-4xl font-bold mt-2">{{ $subscribersTotal }}</p>
                    <p class="text-amber-300 text-xs mt-1">+{{ $subscribersToday }} today</p>
                </div>
                <div class="bg-amber-500/30 p-3 rounded-xl">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
        <!-- Chart -->
        <div class="lg:col-span-1 bg-gray-800 p-6 rounded-2xl">
            <h3 class="text-lg font-semibold mb-4">Clicks by Vertical</h3>
            <canvas id="verticalChart" class="max-h-64"></canvas>
        </div>

        <!-- Recent Subscribers -->
        <div class="lg:col-span-2 bg-gray-800 p-6 rounded-2xl">
            <h3 class="text-lg font-semibold mb-4">Recent Subscribers</h3>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="text-gray-400 text-left">
                        <tr>
                            <th class="pb-3">Email</th>
                            <th class="pb-3">Subscribed</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700">
                        @forelse($recentSubscribers as $sub)
                            <tr>
                                <td class="py-3 text-emerald-400">{{ $sub->email }}</td>
                                <td class="py-3 text-gray-400">{{ $sub->created_at->diffForHumans() }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="py-6 text-center text-gray-500">No subscribers yet</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Recent Clicks Table -->
    <div class="bg-gray-800 p-6 rounded-2xl">
        <h3 class="text-lg font-semibold mb-4">Live Traffic Feed</h3>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="text-gray-400 text-left">
                    <tr>
                        <th class="pb-3">Vertical</th>
                        <th class="pb-3">Source (Referrer)</th>
                        <th class="pb-3">IP</th>
                        <th class="pb-3">Destination</th>
                        <th class="pb-3">Time</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @forelse($recentClicks as $click)
                        <tr>
                            <td class="py-3">
                                <span class="px-2 py-1 rounded-full text-xs font-medium
                                    @if($click->vertical === 'flights') bg-blue-900 text-blue-300
                                    @elseif($click->vertical === 'hotels') bg-purple-900 text-purple-300
                                    @else bg-orange-900 text-orange-300
                                    @endif">
                                    {{ ucfirst($click->vertical) }}
                                </span>
                            </td>
                            <td class="py-3 text-gray-300 truncate max-w-xs">
                                {{ $click->referer ? parse_url($click->referer, PHP_URL_HOST) : 'Direct' }}
                            </td>
                            <td class="py-3 text-gray-400">{{ $click->user_ip }}</td>
                            <td class="py-3 text-emerald-400 truncate max-w-xs" title="{{ $click->redirect_url }}">
                                {{ Str::limit($click->redirect_url, 40) }}
                            </td>
                            <td class="py-3 text-gray-400">{{ $click->created_at->diffForHumans() }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-6 text-center text-gray-500">No clicks recorded yet. Try searching on the main site!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Chart.js Script -->
    <script>
        const ctx = document.getElementById('verticalChart').getContext('2d');
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: {!! json_encode(array_keys($clicksByVertical)) !!},
                datasets: [{
                    data: {!! json_encode(array_values($clicksByVertical)) !!},
                    backgroundColor: ['#3B82F6', '#8B5CF6', '#F59E0B'],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: { color: '#9CA3AF' }
                    }
                }
            }
        });
    </script>
@endsection
