<?php

use Illuminate\Http\Request;
use App\Http\Controllers\RoutingController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';

// Bootstrap the HTTP Kernel to ensure everything is loaded (middleware, routes)
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

echo "Starting Verification Tests...\n\n";

function testRequest($name, $params, $expectedPattern, $ip = '127.0.0.1') {
    global $kernel;
    
    echo "Test: $name\n";
    
    // Create Mock Request
    // URI: /redirect (from routes/web.php)
    $request = Request::create('/redirect', 'GET', $params, [], [], ['REMOTE_ADDR' => $ip]);
    
    // Process via Kernel
    try {
        $response = $kernel->handle($request);
        
        // Check for Redirect
        if ($response->isRedirect()) {
            $targetUrl = $response->getTargetUrl();
            echo "  Redirect ID: " . substr(md5($targetUrl), 0, 8) . "\n";
            echo "  Target: $targetUrl\n";
            
            if (preg_match($expectedPattern, $targetUrl)) {
                echo "  [PASS] Matches pattern\n";
            } else {
                echo "  [FAIL] Expected pattern: $expectedPattern\n";
                echo "         Got: $targetUrl\n";
            }
        } else {
            echo "  [FAIL] Response is not a redirect. Status: " . $response->getStatusCode() . "\n";
            echo "  Content: " . substr($response->getContent(), 0, 200) . "...\n";
        }
    } catch (\Throwable $e) {
        echo "  [ERROR] " . $e->getMessage() . "\n";
        echo "  " . $e->getTraceAsString() . "\n";
    }
    echo "\n";
}

// 1. Flights Standard (US Default)
testRequest(
    'Flights - JFK to LHR (US IP)', 
    ['vertical' => 'flights', 'from' => 'JFK', 'to' => 'LHR', 'departure' => '2026-06-01'], 
    '/www\.kayak\.com\/in\?.*url=%2Fflights%2FJFK-LHR%2F2026-06-01/',
    '8.8.8.8'
);

// 2. Flights Geo-Routing (UK)
testRequest(
    'Flights - LHR to JFK (UK IP)', 
    ['vertical' => 'flights', 'from' => 'LHR', 'to' => 'JFK'], 
    '/www\.kayak\.co\.uk\/in\?/',
    '212.58.244.23' 
);

// 3. Hotels Standard
testRequest(
    'Hotels - London (US IP)', 
    ['vertical' => 'hotels', 'destination' => 'London', 'checkin' => '2026-07-01', 'checkout' => '2026-07-05', 'adults' => 2, 'rooms' => 1],
    '/www\.kayak\.com\/in\?.*url=%2Fhotels%2FLondon%2F2026-07-01%2F2026-07-05%2F2adults%2F1rooms/',
    '8.8.8.8' 
);

// 4. Cars Standard (with Times)
testRequest(
    'Cars - MIA Pickup (US IP)', 
    ['vertical' => 'cars', 'pickup-location' => 'MIA', 'pickup-date' => '2026-08-01', 'dropoff-date' => '2026-08-05', 'pickup-time' => '10h', 'dropoff-time' => '14h30m'], 
    '/www\.kayak\.com\/in\?.*url=%2Fcars%2FMIA%2F2026-08-01-10h%2F2026-08-05-14h30m/',
    '8.8.8.8'
);

echo "Verification Complete.\n";
