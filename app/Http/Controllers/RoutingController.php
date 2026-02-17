<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\ClickLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class RoutingController extends Controller
{
    // Affiliate Marker IDs
    private const AVIASALES_MARKER = '689206';
    private const KAYAK_AID = 'kan_317727_592970';

    // Kayak Tracking Constants (Contract AC-11239)
    private const KAYAK_ENCODER = '27_1';
    private const KAYAK_ENC_PID = 'deeplinks';
    private const KAYAK_DEFAULT_DOMAIN = 'www.kayak.com';

    // Kayak Geo-Routing: country code → domain
    private const KAYAK_DOMAINS = [
        'US' => 'www.kayak.com',
        'CA' => 'ca.kayak.com',
        'GB' => 'www.kayak.co.uk',
        'AU' => 'www.kayak.com.au',
        'DE' => 'www.kayak.de',
        'FR' => 'www.kayak.fr',
        'ES' => 'www.kayak.es',
        'IT' => 'www.kayak.it',
        'IN' => 'www.kayak.co.in',
        'JP' => 'www.kayak.co.jp',
        'BR' => 'www.kayak.com.br',
        'MX' => 'www.kayak.com.mx',
        'IE' => 'www.kayak.ie',
        'NL' => 'www.kayak.nl',
        'SG' => 'www.kayak.sg',
        'HK' => 'www.kayak.com.hk',
    ];
    
    /**
     * Hybrid Routing Engine
     * Routes ALL verticals to Kayak with proper tracking + geo-routing.
     * Old partners preserved as fallback methods.
     */
    public function route(Request $request)
    {
        $vertical = $request->input('vertical'); // 'flights', 'hotels', 'cars'
        $provider = $request->input('provider', 'kayak'); // Default: kayak (was optional)
        $searchParams = $request->all();

        // Detect user's country for geo-routing (Contract Section 3.2)
        $userCountry = $this->detectUserCountry($request->ip());
        $searchParams['_user_country'] = $userCountry;

        // Build deep link — all verticals to Kayak by default
        if ($provider === 'kayak' || empty($provider)) {
            switch ($vertical) {
                case 'flights':
                    $redirectUrl = $this->buildKayakDeepLink($searchParams);
                    break;
                case 'hotels':
                    $redirectUrl = $this->buildKayakHotelDeepLink($searchParams);
                    break;
                case 'cars':
                    $redirectUrl = $this->buildKayakCarDeepLink($searchParams);
                    break;
                default:
                    // Fallback: Kayak flights homepage
                    $domain = $this->getKayakDomain($userCountry);
                    $redirectUrl = $this->buildKayakBaseUrl($domain, 'homepage', '/flights');
                    break;
            }
        } else {
            // Legacy fallback: old partner routing (Aviasales, Hotellook, EconomyBookings)
            $redirectUrl = $this->buildDeepLink($vertical, $searchParams);
        }

        // Log the click for dashboard monitoring
        try {
            ClickLog::create([
                'partner_id' => null,
                'vertical' => $vertical ?? 'unknown',
                'user_ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'referer' => $request->header('referer'),
                'redirect_url' => $redirectUrl,
                'search_params' => $searchParams,
            ]);
        } catch (\Exception $e) {
            Log::warning('Click logging failed: ' . $e->getMessage());
        }

        return redirect()->away($redirectUrl);
    }

    /**
     * Build Deep Link URL based on vertical
     */
    private function buildDeepLink(string $vertical, array $params): string
    {
        switch ($vertical) {
            case 'flights':
                return $this->buildAviasalesDeepLink($params);
            case 'hotels':
                return $this->buildHotelsDeepLink($params);
            case 'cars':
                return $this->buildCarsDeepLink($params);
            default:
                return 'https://www.aviasales.com/?marker=' . self::AVIASALES_MARKER;
        }
    }

    // ================================================================
    // KAYAK DEEP LINK BUILDERS (v2 — /in?a= with tracking + geo-routing)
    // ================================================================

    /**
     * Detect user country from IP for geo-routing (Contract Section 3.2)
     * Uses ip-api.com free tier with caching to avoid rate limits.
     */
    private function detectUserCountry(string $ip): string
    {
        // Localhost / private IPs → default to US
        if (in_array($ip, ['127.0.0.1', '::1']) || str_starts_with($ip, '192.168.') || str_starts_with($ip, '10.')) {
            return 'US';
        }

        $cacheKey = 'geo_country_' . md5($ip);
        try {
            $cached = Cache::get($cacheKey);
            if ($cached) {
                return $cached;
            }
        } catch (\Exception $e) {
            // Cache unavailable
        }

        try {
            $context = stream_context_create([
                'http' => [
                    'method' => 'GET',
                    'timeout' => 2,
                    'header' => "User-Agent: BestFlightHotelDeals/1.0\r\n",
                ]
            ]);
            $json = @file_get_contents("http://ip-api.com/json/{$ip}?fields=countryCode", false, $context);
            if ($json) {
                $data = json_decode($json, true);
                if (!empty($data['countryCode'])) {
                    $country = strtoupper($data['countryCode']);
                    try {
                        Cache::put($cacheKey, $country, 86400); // Cache 1 day
                    } catch (\Exception $e) {}
                    return $country;
                }
            }
        } catch (\Exception $e) {
            Log::warning('Geo-IP lookup failed for ' . $ip . ': ' . $e->getMessage());
        }

        return 'US'; // Safe fallback
    }

    /**
     * Get the correct Kayak domain for a country code (Contract Section 3.2)
     */
    private function getKayakDomain(string $countryCode): string
    {
        return self::KAYAK_DOMAINS[$countryCode] ?? self::KAYAK_DEFAULT_DOMAIN;
    }

    /**
     * Build the Kayak /in redirect URL with all mandatory tracking params.
     * This is the CORE function — all deep links flow through here.
     *
     * Format: https://{DOMAIN}/in?a={AID}&lc=en&encoder=27_1&enc_pid=deeplinks&enc_lid={page}&url={encoded_path}
     */
    private function buildKayakBaseUrl(string $domain, string $locationId, string $searchPath): string
    {
        $params = [
            'a'       => self::KAYAK_AID,
            'lc'      => 'en',
            'encoder' => self::KAYAK_ENCODER,
            'enc_pid' => self::KAYAK_ENC_PID,
            'enc_lid' => $locationId,
            'enc_cid' => Str::uuid()->toString(), // Unique click ID for granular tracking
            'url'     => $searchPath, // http_build_query will URL-encode this
        ];

        return 'https://' . $domain . '/in?' . http_build_query($params);
    }

    /**
     * Build Kayak Flight Deep Link (v2)
     * Supports Single, Round-trip, and Multi-city
     * Correct format: https://{domain}/in?a={AID}&lc=en&encoder=27_1&enc_pid=deeplinks&enc_lid=homepage&url=%2Fflights%2FAB-CD%2Fdate%2FEF-GH%2Fdate...
     */
    private function buildKayakDeepLink(array $params): string
    {
        $userCountry = $params['_user_country'] ?? 'US';
        $domain = $this->getKayakDomain($userCountry);

        // Standard Flight Params
        $adults = (int)($params['adults'] ?? $params['travelers'] ?? $params['passengers'] ?? 1);
        $children = (int)($params['children'] ?? 0);
        $infants = (int)($params['infants'] ?? 0);
        $adults = max(1, min(9, $adults));
        $children = max(0, min(7, $children));
        $infants = max(0, min(4, $infants));

        // Cabin class
        $classMap = [
            'economy'  => 'economy',
            'premium'  => 'premium-economy',
            'business' => 'business',
            'first'    => 'first',
        ];
        $cabinClass = $classMap[$params['class'] ?? 'economy'] ?? 'economy';

        // 1. Check for Multi-City Segments
        $pathParts = [];

        if (!empty($params['segments']) && is_array($params['segments'])) {

            // Processing Multi-City
            foreach ($params['segments'] as $segment) {
                $origin = $this->extractIataCode($segment['from'] ?? '');
                $destination = $this->extractIataCode($segment['to'] ?? '');
                $date = $this->formatDateToYMD($segment['date'] ?? '');

                if (!empty($origin) && !empty($destination)) {
                    $part = "{$origin}-{$destination}";
                    if (!empty($date)) {
                        $part .= "/{$date}";
                    }
                    $pathParts[] = $part;
                }
            }
        } else {

        }
        
 
        
        // 2. Fallback to Standard Single/Round-Trip
        if (empty($pathParts)) {
            $origin = $this->extractIataCode($params['from'] ?? '');
            $destination = $this->extractIataCode($params['to'] ?? '');
            $departDate = $this->formatDateToYMD($params['departure'] ?? '');
            $returnDate = $this->formatDateToYMD($params['return'] ?? '');

            if (!empty($origin) && !empty($destination)) {
                $part = "{$origin}-{$destination}";
                if (!empty($departDate)) {
                    $part .= "/{$departDate}";
                    if (!empty($returnDate)) {
                        $part .= "/{$returnDate}";
                    }
                }
                $pathParts[] = $part;
            }
        }

        // If no valid path generated, return to homepage
        if (empty($pathParts)) {
            return $this->buildKayakBaseUrl($domain, 'homepage', '/flights');
        }

        // Construct Path: /flights/SEG1/SEG2/.../CABIN/PAX
        $path = "/flights/" . implode("/", $pathParts);

        // Add cabin class (if not economy)
        if ($cabinClass !== 'economy') {
            $path .= "/{$cabinClass}";
        }

        // Add passenger count
        if ($adults > 1) {
            $path .= "/{$adults}adults";
        }

        // Add children string
        if ($children > 0 || $infants > 0) {
            $childParts = [];
            for ($i = 0; $i < $children; $i++) {
                $childParts[] = '11'; // Default age 11
            }
            for ($i = 0; $i < $infants; $i++) {
                $childParts[] = '1L'; // L = lap infant
            }
            if (!empty($childParts)) {
                $path .= '/children-' . implode('-', $childParts);
            }
        }

        return $this->buildKayakBaseUrl($domain, 'homepage', $path);
    }

    /**
     * Build Kayak Hotel Deep Link
     * Path format: /hotels/City,Country/CheckIn/CheckOut/Nadults/Nrooms
     */
    private function buildKayakHotelDeepLink(array $params): string
    {
        $userCountry = $params['_user_country'] ?? 'US';
        $domain = $this->getKayakDomain($userCountry);

        $destination = $params['destination'] ?? '';
        $checkin = $params['checkin'] ?? '';
        $checkout = $params['checkout'] ?? '';
        $adults = (int)($params['adults'] ?? $params['travelers'] ?? 2);
        $rooms = (int)($params['rooms'] ?? 1);
        $children = (int)($params['children'] ?? 0);
        $adults = max(1, min(9, $adults));
        $rooms = max(1, min(4, $rooms));

        if (empty($destination)) {
            return $this->buildKayakBaseUrl($domain, 'homepage', '/hotels');
        }

        // Format destination: "Los Angeles" → "Los-Angeles"
        // Extract city name from autocomplete format "City Name (CODE)" if present
        $city = preg_replace('/\s*\([^)]+\)\s*$/', '', trim($destination));
        $city = str_replace(' ', '-', $city);

        $path = "/hotels/{$city}";

        if (!empty($checkin)) {
            $path .= "/{$checkin}";
            if (!empty($checkout)) {
                $path .= "/{$checkout}";
            }
        }

        $path .= "/{$adults}adults/{$rooms}rooms";

        return $this->buildKayakBaseUrl($domain, 'homepage', $path);
    }

    /**
     * Build Kayak Car Rental Deep Link
     * Path format: /cars/PickupCity/PickupDate-HHh/DropoffDate-HHh
     */
    private function buildKayakCarDeepLink(array $params): string
    {
        $userCountry = $params['_user_country'] ?? 'US';
        $domain = $this->getKayakDomain($userCountry);

        $pickup = $this->extractIataCode($params['pickup-location'] ?? '');
        $dropoff = $this->extractIataCode($params['dropoff-location'] ?? '');
        $pickupDate = $this->formatDateToYMD($params['pickup-date'] ?? '');
        $dropoffDate = $this->formatDateToYMD($params['dropoff-date'] ?? '');

        // Default times: pickup 10:00 AM, dropoff 10:00 AM
        $pickupTime = $params['pickup-time'] ?? '10h';
        $dropoffTime = $params['dropoff-time'] ?? '10h';

        if (empty($pickup)) {
            return $this->buildKayakBaseUrl($domain, 'homepage', '/cars');
        }

        // Use pickup location as dropoff if not specified
        if (empty($dropoff)) {
            $dropoff = $pickup;
        }

        $path = "/cars/{$pickup}";

        // Add different drop-off if specified
        if ($dropoff !== $pickup) {
            $path .= "/{$dropoff}";
        }

        if (!empty($pickupDate)) {
            $path .= "/{$pickupDate}-{$pickupTime}";
            if (!empty($dropoffDate)) {
                $path .= "/{$dropoffDate}-{$dropoffTime}";
            }
        }

        return $this->buildKayakBaseUrl($domain, 'homepage', $path);
    }

    // ================================================================
    // LEGACY PARTNER METHODS (preserved — no breaking changes)
    // ================================================================

    /**
     * Build Aviasales Flight Deep Link
     * Format: https://www.aviasales.com/?origin=XXX&destination=YYY&depart_date=YYYY-MM-DD&return_date=YYYY-MM-DD&marker=MARKER
     */
    private function buildAviasalesDeepLink(array $params): string
    {
        // Extract IATA codes from inputs like "Vancouver (YVR)"
        $origin = $this->extractIataCode($params['from'] ?? '');
        $destination = $this->extractIataCode($params['to'] ?? '');
        
        // Get dates in YYYY-MM-DD format
        $departDate = $this->formatDateToYMD($params['departure'] ?? '');
        $returnDate = $this->formatDateToYMD($params['return'] ?? '');
        
        // Get passenger count (default 1)
        $passengers = $params['passengers'] ?? $params['travelers'] ?? '1';
        if (is_string($passengers)) {
            // Extract number from strings like "1 traveler" or "2 travelers"
            preg_match('/\d+/', $passengers, $matches);
            $passengers = $matches[0] ?? '1';
        }

        // Build query parameters
        $queryParams = [
            'marker' => self::AVIASALES_MARKER,
        ];
        
        if (!empty($origin)) {
            $queryParams['origin'] = strtoupper($origin);
        }
        
        if (!empty($destination)) {
            $queryParams['destination'] = strtoupper($destination);
        }
        
        if (!empty($departDate)) {
            $queryParams['depart_date'] = $departDate;
        }
        
        if (!empty($returnDate)) {
            $queryParams['return_date'] = $returnDate;
        }
        
        if ($passengers > 1) {
            $queryParams['adults'] = $passengers;
        }

        // Build the full URL with query parameters
        return 'https://www.aviasales.com/?' . http_build_query($queryParams);
    }

    /**
     * Build Hotels Deep Link (Klook)
     * Uses keyword search with destination
     */
    /**
     * Build Hotels Deep Link (Aviasales / Hotellook)
     * Uses Smart Lookup to resolve City Name -> Location ID
     */
    private function buildHotelsDeepLink(array $params): string
    {
        $destination = $params['destination'] ?? '';
        $checkin = $params['checkin'] ?? '';
        $checkout = $params['checkout'] ?? '';
        $adults = $params['guests'] ?? '1';

        // 1. Resolve Location ID from City Name (Dynamic Lookup)
        $locationId = $this->fetchHotellookId($destination);

        // 2. Build Query Params
        // URL: https://search.hotellook.com/?locationId={ID}&marker={MARKER}...
        $queryParams = [
            'locationId' => $locationId ?? '20857', // Fallback to Dubai (20857) or London (19614) if failed
            'marker' => self::AVIASALES_MARKER,
            'language' => 'en',
            'adults' => $adults,
        ];

        // Add Dates if present
        if (!empty($checkin)) {
            $queryParams['checkIn'] = $checkin; // Format: YYYY-MM-DD
        }
        if (!empty($checkout)) {
            $queryParams['checkOut'] = $checkout; // Format: YYYY-MM-DD
        }

        return 'https://search.hotellook.com/?' . http_build_query($queryParams);
    }

    /**
     * Build Cars Deep Link (EconomyBookings)
     * Hybrid: Uses internal IDs if known (Results Page), otherwise Landing Page fallback
     */
    private function buildCarsDeepLink(array $params): string
    {
        // Hybrid Strategy:
        // 1. Check statically mapped IDs (Microsites/Custom)
        // 2. Dynamic Lookup via Widget API (Cached)
        // 3. Fallback to Landing Page (Pre-filled)

        // 1. Static Map (Overrides)
        $airportMap = [
             // 'MIA' => '4801', // Example: Now handled dynamically, but kept for overrides if needed
        ];

        // Extract IATA codes from location inputs
        $pickupLocation = $this->extractIataCode($params['pickup-location'] ?? '');
        $dropoffLocation = $this->extractIataCode($params['dropoff-location'] ?? $params['pickup-location'] ?? '');
        
        // Parse dates
        $pickupDate = $this->parseDate($params['pickup-date'] ?? '');
        $dropoffDate = $this->parseDate($params['dropoff-date'] ?? '');
        
        // Generate tracking UID
        $tpoUid = bin2hex(random_bytes(12)) . '-' . self::AVIASALES_MARKER;
        
        // Default Params (Matched to user's working URL)
        $queryParams = [
            'age' => '30', // Default age
            'lang' => 'en',
            'btag' => 'travelpayouts',
            'tpo_uid' => $tpoUid,
            'shmarker' => self::AVIASALES_MARKER, // Explicit marker validation
            'cr' => '39', // Country ID (USA?) - from working link
            'crcy' => 'CAD', // Currency - from working link
            'pt' => '1000',
            'dt' => '1000',
        ];
        
        // Date Logic
        if ($pickupDate) {
            $queryParams['py'] = date('Y', $pickupDate);
            $queryParams['pm'] = date('m', $pickupDate);
            $queryParams['pd'] = date('d', $pickupDate);
        } else {
            $ts = strtotime('+7 days');
            $queryParams['py'] = date('Y', $ts);
            $queryParams['pm'] = date('m', $ts);
            $queryParams['pd'] = date('d', $ts);
        }
        
        if ($dropoffDate) {
            $queryParams['dy'] = date('Y', $dropoffDate);
            $queryParams['dm'] = date('m', $dropoffDate);
            $queryParams['dd'] = date('d', $dropoffDate);
        } else {
            $ts = strtotime('+10 days');
            $queryParams['dy'] = date('Y', $ts);
            $queryParams['dm'] = date('m', $ts);
            $queryParams['dd'] = date('d', $ts);
        }

        // 2. Dynamic Lookup (The "Magic" Bridge)
        $pickupId = null;
        
        // Check Static Map first
        if (isset($airportMap[$pickupLocation])) {
            $pickupId = $airportMap[$pickupLocation];
        } 
        // Then try Dynamic Lookup
        else {
            $pickupId = $this->fetchEconomyBookingsId($pickupLocation);
        }

        // If we found an ID, go direct to RESULTS page
        if ($pickupId) {
            $queryParams['plc'] = $pickupId;
            $queryParams['dlc'] = $pickupId; // Assume return to same place initially logic

            // Try to resolve dropoff if different
            if ($pickupLocation !== $dropoffLocation) {
                // Check static map for dropoff
                if (isset($airportMap[$dropoffLocation])) {
                    $queryParams['dlc'] = $airportMap[$dropoffLocation];
                } else {
                     $dropoffId = $this->fetchEconomyBookingsId($dropoffLocation);
                     if ($dropoffId) {
                         $queryParams['dlc'] = $dropoffId;
                     }
                }
            }

            return 'https://www.economybookings.com/en/cars/results?' . http_build_query($queryParams);
        }
        
        // 3. Fallback: Landing Page with IATA (Pre-filled)
        // Uses idpickval to pre-fill search form
        $queryParams['idpickval'] = $pickupLocation;
        return 'https://www.economybookings.com/en?' . http_build_query($queryParams);
    }
    
    /**
     * Parse date string to timestamp
     */
    private function parseDate(string $dateStr): ?int
    {
        if (empty($dateStr)) {
            return null;
        }
        
        $timestamp = strtotime($dateStr);
        if ($timestamp === false) {
            // Try removing commas and parsing again
            $dateStr = str_replace(',', '', $dateStr);
            $timestamp = strtotime($dateStr);
        }
        
        return $timestamp !== false ? $timestamp : null;
    }

    /**
     * Extract IATA code from input like "Vancouver (YVR)" or "YVR"
     */
    private function extractIataCode(string $input): string
    {
        // If already a 3-letter code, return it
        $input = trim($input);
        if (preg_match('/^[A-Za-z]{3}$/', $input)) {
            return strtoupper($input);
        }
        
        // Try to extract code from parentheses: "Vancouver (YVR)" -> "YVR"
        if (preg_match('/\(([A-Za-z]{3})\)/', $input, $matches)) {
            return strtoupper($matches[1]);
        }
        
        // Try to extract code from end of string: "Vancouver YVR" -> "YVR"
        if (preg_match('/\b([A-Za-z]{3})$/', $input, $matches)) {
            return strtoupper($matches[1]);
        }
        
        // Fallback: return first 3 chars (not ideal but better than nothing)
        return strtoupper(substr(preg_replace('/[^A-Za-z]/', '', $input), 0, 3));
    }

    /**
     * Format date to DDMM format for Aviasales
     * Input formats: "2026-01-15", "Jan 15, 2026", "15/01/2026", etc.
     */
    private function formatDateToDDMM(string $dateStr): string
    {
        if (empty($dateStr)) {
            return '';
        }

        try {
            // Try to parse the date string
            $timestamp = strtotime($dateStr);
            if ($timestamp === false) {
                // Try manual parsing for formats like "Jan 15, 2026"
                $dateStr = str_replace(',', '', $dateStr);
                $timestamp = strtotime($dateStr);
            }
            
            if ($timestamp !== false) {
                return date('dm', $timestamp); // Returns DDMM format
            }
        } catch (\Exception $e) {
            // Fall through to return empty
        }
        
        return '';
    }

    /**
     * Format date to YYYY-MM-DD format for Aviasales query parameters
     * Input formats: "2026-01-15", "Jan 15, 2026", "15/01/2026", etc.
     */
    private function formatDateToYMD(string $dateStr): string
    {
        if (empty($dateStr)) {
            return '';
        }

        try {
            // Try to parse the date string
            $timestamp = strtotime($dateStr);
            if ($timestamp === false) {
                // Try manual parsing for formats like "Jan 15, 2026"
                $dateStr = str_replace(',', '', $dateStr);
                $timestamp = strtotime($dateStr);
            }
            
            if ($timestamp !== false) {
                return date('Y-m-d', $timestamp); // Returns YYYY-MM-DD format
            }
        } catch (\Exception $e) {
            // Fall through to return empty
        }
        
        return '';
    }

    /**
     * Resolve IATA code to EconomyBookings Internal Location ID
     * Uses a mapping to searchable names, then queries their Widget API
     */
    private function fetchEconomyBookingsId(string $iata): ?string
    {
        if (empty($iata)) return null;

        // Cache Key (1 day)
        $cacheKey = 'eb_loc_id_' . $iata;
        try {
            if (Cache::has($cacheKey)) {
                return Cache::get($cacheKey);
            }
        } catch (\Exception $e) {
            // Cache unavailable, proceed without it
            // Log::warning("Cache unavailable for EconomyBookings lookup: " . $e->getMessage());
        }

        // 1. Map IATA to "Searchable Name"
        // The API often fails on IATA codes (e.g. JFK) but works on Names (e.g. "Kennedy")
        $searchterm = $this->getSearchTermForIata($iata);

        // 2. Call the Widget API
        // Endpoint: https://suggest.apistp.com/uaca/v1/search_terms_forward
        $url = "https://suggest.apistp.com/uaca/v1/search_terms_forward?term=" . urlencode($searchterm) . "&locale=en&service=economybookings_v4&limit=5";
        
        try {
            // Use stream context for timeout and headers
            $context = stream_context_create([
                'http' => [
                    'method' => 'GET',
                    'header' => "User-Agent: Mozilla/5.0\r\n" . "Referer: https://tpwdg.com/\r\n",
                    'timeout' => 2 // Fast timeout to avoid hanging the user
                ]
            ]);
            
            $json = @file_get_contents($url, false, $context);
            if ($json) {
                $data = json_decode($json, true);
                if (!empty($data) && is_array($data)) {
                    // Take the first result's value
                    $firstResult = $data[0];
                    if (isset($firstResult['value'])) {
                        $id = $firstResult['value'];
                        
                        // Cache it!
                        try {
                            Cache::put($cacheKey, $id, 86400); // 1 day
                        } catch (\Exception $e) {
                            // Cache write fail, ignore
                        }
                        return $id;
                    }
                }
            }
        } catch (\Exception $e) {
            Log::error("EconomyBookings ID Lookup failed for $iata ($searchterm): " . $e->getMessage());
        }

        return null;
    }

    /**
     * Helper to get best search term for IATA
     */
    private function getSearchTermForIata(string $iata): string
    {
        $map = [
            // North America
            'JFK' => 'Kennedy', 'EWR' => 'Newark', 'LGA' => 'LaGuardia',
            'LAX' => 'Los Angeles', 'SFO' => 'San Francisco', 'LAS' => 'Las Vegas',
            'ORD' => 'O\'Hare', 'MIA' => 'Miami', 'MCO' => 'Orlando',
            'YVR' => 'Vancouver', 'YYZ' => 'Toronto', 'YUL' => 'Montreal',
            'CUN' => 'Cancun', 'MEX' => 'Mexico City',
            
            // Europe
            'LHR' => 'Heathrow', 'LGW' => 'Gatwick',
            'CDG' => 'Charles de Gaulle', 'ORY' => 'Orly',
            'AMS' => 'Schiphol', 'FRA' => 'Frankfurt',
            'MAD' => 'Barajas', 'BCN' => 'Barcelona',
            'FCO' => 'Fiumicino', 'DXB' => 'Dubai',
            
            // Asia/Pacific
            'SIN' => 'Changi', 'HND' => 'Haneda', 'NRT' => 'Narita',
            'SYD' => 'Sydney', 'MEL' => 'Melbourne'
        ];

        return $map[strtoupper($iata)] ?? $iata; // Fallback to IATA if not mapped
    }

    /**
     * Resolve City/Location Name to Hotellook Location ID
     * Uses Travelpayouts Autocomplete API
     */
    private function fetchHotellookId(string $term): ?string
    {
        if (empty($term)) return null;

        // Cache Key
        $cacheKey = 'hl_loc_id_' . md5(strtolower($term));
        try {
            if (Cache::has($cacheKey)) {
                return Cache::get($cacheKey);
            }
        } catch (\Exception $e) {
            // Cache fail silent
        }

        // Endpoint: https://autocomplete.travelpayouts.com/places2?term={TERM}&locale=en&types[]=city
        $url = "https://autocomplete.travelpayouts.com/places2?term=" . urlencode($term) . "&locale=en&types[]=city";

        try {
             $context = stream_context_create([
                'http' => [
                    'method' => 'GET',
                    'header' => "User-Agent: Mozilla/5.0\r\n",
                    'timeout' => 2
                ]
            ]);

            $json = @file_get_contents($url, false, $context);
            if ($json) {
                $data = json_decode($json, true);
                if (!empty($data) && is_array($data)) {
                    // Take the first result
                    $first = $data[0];
                    if (isset($first['id'])) {
                        $id = $first['id'];
                        
                        // Cache it!
                        try {
                            Cache::put($cacheKey, $id, 86400 * 7); // Cache for 7 days (static IDs)
                        } catch (\Exception $e) {}
                        
                        return $id;
                    }
                }
            }
        } catch (\Exception $e) {
            Log::error("Hotellook ID Lookup failed for $term: " . $e->getMessage());
        }

        return null;
    }
}

