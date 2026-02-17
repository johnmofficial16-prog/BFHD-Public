<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RouteController extends Controller
{
    /**
     * Route data for popular flight routes
     */
    private $routes = [
        'NYC-LON' => [
            'originCity' => 'New York',
            'destinationCity' => 'London',
            'flightDuration' => '7-8 hours',
            'distance' => '3,459 miles',
            'airlines' => 'British Airways, Delta, Virgin Atlantic',
            'priceRange' => '$450-$850',
            'bestMonth' => 'February',
        ],
        'LAX-PAR' => [
            'originCity' => 'Los Angeles',
            'destinationCity' => 'Paris',
            'flightDuration' => '10-11 hours',
            'distance' => '5,658 miles',
            'airlines' => 'Air France, Delta, United',
            'priceRange' => '$520-$900',
            'bestMonth' => 'March',
        ],
        'NYC-DXB' => [
            'originCity' => 'New York',
            'destinationCity' => 'Dubai',
            'flightDuration' => '12-13 hours',
            'distance' => '6,838 miles',
            'airlines' => 'Emirates, Etihad, United',
            'priceRange' => '$680-$1200',
            'bestMonth' => 'November',
        ],
        'NYC-TYO' => [
            'originCity' => 'New York',
            'destinationCity' => 'Tokyo',
            'flightDuration' => '13-14 hours',
            'distance' => '6,737 miles',
            'airlines' => 'ANA, JAL, United',
            'priceRange' => '$750-$1400',
            'bestMonth' => 'January',
        ],
    ];

    /**
     * Show route landing page
     */
    public function show($route)
    {
        $routeKey = strtoupper($route);
        
        if (!isset($this->routes[$routeKey])) {
            abort(404);
        }

        $data = $this->routes[$routeKey];
        [$origin, $destination] = explode('-', $routeKey);

        return view('routes.show', array_merge($data, [
            'origin' => $origin,
            'destination' => $destination,
        ]));
    }
}
