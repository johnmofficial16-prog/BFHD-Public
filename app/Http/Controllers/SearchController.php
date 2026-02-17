<?php

namespace App\Http\Controllers;

use App\Models\SearchLog;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Handle flight search
     */
    public function flights(Request $request)
    {
        // Log the search
        $this->logSearch('flights', $request);

        // For now, redirect to routing engine
        // Later this will show a results page
        return app(RoutingController::class)->route(
            $request->merge(['vertical' => 'flights'])
        );
    }

    /**
     * Handle hotel search
     */
    public function hotels(Request $request)
    {
        $this->logSearch('hotels', $request);

        return app(RoutingController::class)->route(
            $request->merge(['vertical' => 'hotels'])
        );
    }

    /**
     * Handle car rental search
     */
    public function cars(Request $request)
    {
        $this->logSearch('cars', $request);

        return app(RoutingController::class)->route(
            $request->merge(['vertical' => 'cars'])
        );
    }

    /**
     * Handle package search (bundles)
     */
    public function packages(Request $request)
    {
        $this->logSearch('packages', $request);

        return app(RoutingController::class)->route(
            $request->merge(['vertical' => 'packages'])
        );
    }

    /**
     * Log the search for analytics
     */
    private function logSearch(string $vertical, Request $request)
    {
        try {
            SearchLog::create([
                'vertical' => $vertical,
                'origin' => $request->input('from') ?? $request->input('pickup-location'),
                'destination' => $request->input('to') ?? $request->input('destination'),
                'start_date' => $request->input('departure') ?? $request->input('checkin') ?? $request->input('pickup-date'),
                'end_date' => $request->input('return') ?? $request->input('checkout') ?? $request->input('dropoff-date'),
                'passengers' => $request->input('passengers'),
                'guests' => $request->input('guests'),
                'user_ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);
        } catch (\Exception $e) {
            // Continue even if logging fails (e.g., no database connection)
        }
    }

    /**
     * Autocomplete for airports (Flights & Packages)
     */
    public function autocomplete(Request $request)
    {
        $query = $request->get('query');
        
        if (strlen($query) < 2) {
            return response()->json([]);
        }

        $airports = \App\Data\AutocompleteData::airports();

        $results = collect($airports)->filter(function ($airport) use ($query) {
            return str_contains(strtolower($airport['city']), strtolower($query)) || 
                   str_contains(strtolower($airport['code']), strtolower($query)) ||
                   str_contains(strtolower($airport['name']), strtolower($query)) ||
                   str_contains(strtolower($airport['country']), strtolower($query));
        })->take(10)->values();

        return response()->json($results);
    }

    /**
     * Autocomplete for cities/destinations (Hotels & Cars)
     */
    public function cityAutocomplete(Request $request)
    {
        $query = $request->get('query');
        
        if (strlen($query) < 2) {
            return response()->json([]);
        }

        $cities = \App\Data\AutocompleteData::cities();

        $results = collect($cities)->filter(function ($city) use ($query) {
            return str_contains(strtolower($city['name']), strtolower($query)) ||
                   str_contains(strtolower($city['country']), strtolower($query));
        })->take(10)->values();

        return response()->json($results);
    }
}
