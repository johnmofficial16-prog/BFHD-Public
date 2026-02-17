<?php

namespace App\Data;

class AutocompleteData
{
    public static function airports()
    {
        return [
            // United Kingdom
            ['code' => 'LHR', 'city' => 'London', 'name' => 'Heathrow Airport', 'country' => 'United Kingdom'],
            ['code' => 'LGW', 'city' => 'London', 'name' => 'Gatwick Airport', 'country' => 'United Kingdom'],
            ['code' => 'STN', 'city' => 'London', 'name' => 'Stansted Airport', 'country' => 'United Kingdom'],
            ['code' => 'LTN', 'city' => 'London', 'name' => 'Luton Airport', 'country' => 'United Kingdom'],
            ['code' => 'MAN', 'city' => 'Manchester', 'name' => 'Manchester Airport', 'country' => 'United Kingdom'],
            ['code' => 'EDI', 'city' => 'Edinburgh', 'name' => 'Edinburgh Airport', 'country' => 'United Kingdom'],
            ['code' => 'GLA', 'city' => 'Glasgow', 'name' => 'Glasgow Airport', 'country' => 'United Kingdom'],
            ['code' => 'BHX', 'city' => 'Birmingham', 'name' => 'Birmingham Airport', 'country' => 'United Kingdom'],
            
            // United States
            ['code' => 'JFK', 'city' => 'New York', 'name' => 'John F. Kennedy International Airport', 'country' => 'United States'],
            ['code' => 'LAX', 'city' => 'Los Angeles', 'name' => 'Los Angeles International Airport', 'country' => 'United States'],
            ['code' => 'ORD', 'city' => 'Chicago', 'name' => 'O\'Hare International Airport', 'country' => 'United States'],
            ['code' => 'MIA', 'city' => 'Miami', 'name' => 'Miami International Airport', 'country' => 'United States'],
            ['code' => 'SFO', 'city' => 'San Francisco', 'name' => 'San Francisco International Airport', 'country' => 'United States'],
            ['code' => 'SEA', 'city' => 'Seattle', 'name' => 'Seattle-Tacoma International Airport', 'country' => 'United States'],
            ['code' => 'LAS', 'city' => 'Las Vegas', 'name' => 'McCarran International Airport', 'country' => 'United States'],
            ['code' => 'MCO', 'city' => 'Orlando', 'name' => 'Orlando International Airport', 'country' => 'United States'],
            ['code' => 'ATL', 'city' => 'Atlanta', 'name' => 'Hartsfield-Jackson Atlanta International Airport', 'country' => 'United States'],
            ['code' => 'DEN', 'city' => 'Denver', 'name' => 'Denver International Airport', 'country' => 'United States'],
            ['code' => 'BOS', 'city' => 'Boston', 'name' => 'Logan International Airport', 'country' => 'United States'],
            ['code' => 'PHX', 'city' => 'Phoenix', 'name' => 'Phoenix Sky Harbor International Airport', 'country' => 'United States'],
            ['code' => 'IAH', 'city' => 'Houston', 'name' => 'George Bush Intercontinental Airport', 'country' => 'United States'],
            ['code' => 'DFW', 'city' => 'Dallas', 'name' => 'Dallas/Fort Worth International Airport', 'country' => 'United States'],
            ['code' => 'EWR', 'city' => 'Newark', 'name' => 'Newark Liberty International Airport', 'country' => 'United States'],
            ['code' => 'MSP', 'city' => 'Minneapolis', 'name' => 'Minneapolis-St. Paul International Airport', 'country' => 'United States'],
            ['code' => 'DTW', 'city' => 'Detroit', 'name' => 'Detroit Metropolitan Wayne County Airport', 'country' => 'United States'],
            ['code' => 'SLC', 'city' => 'Salt Lake City', 'name' => 'Salt Lake City International Airport', 'country' => 'United States'],
            
            // Canada
            ['code' => 'YYZ', 'city' => 'Toronto', 'name' => 'Pearson International Airport', 'country' => 'Canada'],
            ['code' => 'YVR', 'city' => 'Vancouver', 'name' => 'Vancouver International Airport', 'country' => 'Canada'],
            ['code' => 'YUL', 'city' => 'Montreal', 'name' => 'Montréal-Pierre Elliott Trudeau International Airport', 'country' => 'Canada'],
            ['code' => 'YYC', 'city' => 'Calgary', 'name' => 'Calgary International Airport', 'country' => 'Canada'],
            
            // France
            ['code' => 'CDG', 'city' => 'Paris', 'name' => 'Charles de Gaulle Airport', 'country' => 'France'],
            ['code' => 'ORY', 'city' => 'Paris', 'name' => 'Orly Airport', 'country' => 'France'],
            ['code' => 'NCE', 'city' => 'Nice', 'name' => 'Nice Côte d\'Azur Airport', 'country' => 'France'],
            ['code' => 'LYS', 'city' => 'Lyon', 'name' => 'Lyon-Saint Exupéry Airport', 'country' => 'France'],
            
            // Germany
            ['code' => 'FRA', 'city' => 'Frankfurt', 'name' => 'Frankfurt Airport', 'country' => 'Germany'],
            ['code' => 'MUC', 'city' => 'Munich', 'name' => 'Munich Airport', 'country' => 'Germany'],
            ['code' => 'TXL', 'city' => 'Berlin', 'name' => 'Berlin Tegel Airport', 'country' => 'Germany'],
            ['code' => 'DUS', 'city' => 'Düsseldorf', 'name' => 'Düsseldorf Airport', 'country' => 'Germany'],
            ['code' => 'HAM', 'city' => 'Hamburg', 'name' => 'Hamburg Airport', 'country' => 'Germany'],
            
            // Spain
            ['code' => 'MAD', 'city' => 'Madrid', 'name' => 'Adolfo Suárez Madrid–Barajas Airport', 'country' => 'Spain'],
            ['code' => 'BCN', 'city' => 'Barcelona', 'name' => 'Josep Tarradellas Barcelona-El Prat Airport', 'country' => 'Spain'],
            ['code' => 'AGP', 'city' => 'Malaga', 'name' => 'Málaga Airport', 'country' => 'Spain'],
            ['code' => 'SVQ', 'city' => 'Seville', 'name' => 'Seville Airport', 'country' => 'Spain'],
            
            // Italy
            ['code' => 'FCO', 'city' => 'Rome', 'name' => 'Leonardo da Vinci–Fiumicino Airport', 'country' => 'Italy'],
            ['code' => 'MXP', 'city' => 'Milan', 'name' => 'Milan Malpensa Airport', 'country' => 'Italy'],
            ['code' => 'VCE', 'city' => 'Venice', 'name' => 'Venice Marco Polo Airport', 'country' => 'Italy'],
            ['code' => 'NAP', 'city' => 'Naples', 'name' => 'Naples International Airport', 'country' => 'Italy'],
            
            // Netherlands
            ['code' => 'AMS', 'city' => 'Amsterdam', 'name' => 'Schiphol Airport', 'country' => 'Netherlands'],
            
            // Switzerland
            ['code' => 'ZRH', 'city' => 'Zurich', 'name' => 'Zurich Airport', 'country' => 'Switzerland'],
            ['code' => 'GVA', 'city' => 'Geneva', 'name' => 'Geneva Airport', 'country' => 'Switzerland'],
            
            // Austria
            ['code' => 'VIE', 'city' => 'Vienna', 'name' => 'Vienna International Airport', 'country' => 'Austria'],
            
            // Portugal
            ['code' => 'LIS', 'city' => 'Lisbon', 'name' => 'Lisbon Portela Airport', 'country' => 'Portugal'],
            ['code' => 'OPO', 'city' => 'Porto', 'name' => 'Francisco Sá Carneiro Airport', 'country' => 'Portugal'],
            
            // UAE
            ['code' => 'DXB', 'city' => 'Dubai', 'name' => 'Dubai International Airport', 'country' => 'United Arab Emirates'],
            ['code' => 'AUH', 'city' => 'Abu Dhabi', 'name' => 'Abu Dhabi International Airport', 'country' => 'United Arab Emirates'],
            
            // Turkey
            ['code' => 'IST', 'city' => 'Istanbul', 'name' => 'Istanbul Airport', 'country' => 'Turkey'],
            ['code' => 'SAW', 'city' => 'Istanbul', 'name' => 'Sabiha Gökçen International Airport', 'country' => 'Turkey'],
            
            // Qatar
            ['code' => 'DOH', 'city' => 'Doha', 'name' => 'Hamad International Airport', 'country' => 'Qatar'],
            
            // Singapore
            ['code' => 'SIN', 'city' => 'Singapore', 'name' => 'Changi Airport', 'country' => 'Singapore'],
            
            // Japan
            ['code' => 'HND', 'city' => 'Tokyo', 'name' => 'Haneda Airport', 'country' => 'Japan'],
            ['code' => 'NRT', 'city' => 'Tokyo', 'name' => 'Narita International Airport', 'country' => 'Japan'],
            ['code' => 'KIX', 'city' => 'Osaka', 'name' => 'Kansai International Airport', 'country' => 'Japan'],
            
            // Thailand
            ['code' => 'BKK', 'city' => 'Bangkok', 'name' => 'Suvarnabhumi Airport', 'country' => 'Thailand'],
            ['code' => 'DMK', 'city' => 'Bangkok', 'name' => 'Don Mueang International Airport', 'country' => 'Thailand'],
            ['code' => 'HKT', 'city' => 'Phuket', 'name' => 'Phuket International Airport', 'country' => 'Thailand'],
            
            // Hong Kong
            ['code' => 'HKG', 'city' => 'Hong Kong', 'name' => 'Hong Kong International Airport', 'country' => 'Hong Kong'],
            
            // China
            ['code' => 'PEK', 'city' => 'Beijing', 'name' => 'Beijing Capital International Airport', 'country' => 'China'],
            ['code' => 'PVG', 'city' => 'Shanghai', 'name' => 'Shanghai Pudong International Airport', 'country' => 'China'],
            ['code' => 'CAN', 'city' => 'Guangzhou', 'name' => 'Guangzhou Baiyun International Airport', 'country' => 'China'],
            
            // South Korea
            ['code' => 'ICN', 'city' => 'Seoul', 'name' => 'Incheon International Airport', 'country' => 'South Korea'],
            
            // India
            ['code' => 'DEL', 'city' => 'New Delhi', 'name' => 'Indira Gandhi International Airport', 'country' => 'India'],
            ['code' => 'BOM', 'city' => 'Mumbai', 'name' => 'Chhatrapati Shivaji Maharaj International Airport', 'country' => 'India'],
            ['code' => 'BLR', 'city' => 'Bangalore', 'name' => 'Kempegowda International Airport', 'country' => 'India'],
            
            // Australia
            ['code' => 'SYD', 'city' => 'Sydney', 'name' => 'Kingsford Smith Airport', 'country' => 'Australia'],
            ['code' => 'MEL', 'city' => 'Melbourne', 'name' => 'Melbourne Airport', 'country' => 'Australia'],
            ['code' => 'BNE', 'city' => 'Brisbane', 'name' => 'Brisbane Airport', 'country' => 'Australia'],
            ['code' => 'PER', 'city' => 'Perth', 'name' => 'Perth Airport', 'country' => 'Australia'],
            
            // New Zealand
            ['code' => 'AKL', 'city' => 'Auckland', 'name' => 'Auckland Airport', 'country' => 'New Zealand'],
            ['code' => 'CHC', 'city' => 'Christchurch', 'name' => 'Christchurch International Airport', 'country' => 'New Zealand'],
            
            // South Africa
            ['code' => 'JNB', 'city' => 'Johannesburg', 'name' => 'O.R. Tambo International Airport', 'country' => 'South Africa'],
            ['code' => 'CPT', 'city' => 'Cape Town', 'name' => 'Cape Town International Airport', 'country' => 'South Africa'],
            
            // Mexico
            ['code' => 'MEX', 'city' => 'Mexico City', 'name' => 'Mexico City International Airport', 'country' => 'Mexico'],
            ['code' => 'CUN', 'city' => 'Cancun', 'name' => 'Cancún International Airport', 'country' => 'Mexico'],
            
            // Brazil
            ['code' => 'GRU', 'city' => 'São Paulo', 'name' => 'São Paulo-Guarulhos International Airport', 'country' => 'Brazil'],
            ['code' => 'GIG', 'city' => 'Rio de Janeiro', 'name' => 'Rio de Janeiro–Galeão International Airport', 'country' => 'Brazil'],
        ];
    }

    public static function cities()
    {
        return [
            ['name' => 'London', 'country' => 'United Kingdom'],
            ['name' => 'Paris', 'country' => 'France'],
            ['name' => 'New York', 'country' => 'United States'],
            ['name' => 'Dubai', 'country' => 'United Arab Emirates'],
            ['name' => 'Tokyo', 'country' => 'Japan'],
            ['name' => 'Singapore', 'country' => 'Singapore'],
            ['name' => 'Los Angeles', 'country' => 'United States'],
            ['name' => 'Barcelona', 'country' => 'Spain'],
            ['name' => 'Amsterdam', 'country' => 'Netherlands'],
            ['name' => 'Rome', 'country' => 'Italy'],
            ['name' => 'Bangkok', 'country' => 'Thailand'],
            ['name' => 'Istanbul', 'country' => 'Turkey'],
            ['name' => 'Sydney', 'country' => 'Australia'],
            ['name' => 'Hong Kong', 'country' => 'Hong Kong'],
            ['name' => 'Madrid', 'country' => 'Spain'],
            ['name' => 'Vienna', 'country' => 'Austria'],
            ['name' => 'Prague', 'country' => 'Czech Republic'],
            ['name' => 'Berlin', 'country' => 'Germany'],
            ['name' => 'Lisbon', 'country' => 'Portugal'],
            ['name' => 'Venice', 'country' => 'Italy'],
            ['name' => 'Florence', 'country' => 'Italy'],
            ['name' => 'Milan', 'country' => 'Italy'],
            ['name' => 'Munich', 'country' => 'Germany'],
            ['name' => 'Edinburgh', 'country' => 'Scotland'],
            ['name' => 'Dublin', 'country' => 'Ireland'],
            ['name' => 'Zurich', 'country' => 'Switzerland'],
            ['name' => 'Copenhagen', 'country' => 'Denmark'],
            ['name' => 'Stockholm', 'country' => 'Sweden'],
            ['name' => 'Oslo', 'country' => 'Norway'],
            ['name' => 'Athens', 'country' => 'Greece'],
            ['name' => 'Santorini', 'country' => 'Greece'],
            ['name' => 'Mykonos', 'country' => 'Greece'],
            ['name' => 'Crete', 'country' => 'Greece'],
            ['name' => 'Bali', 'country' => 'Indonesia'],
            ['name' => 'Phuket', 'country' => 'Thailand'],
            ['name' => 'Maldives', 'country' => 'Maldives'],
            ['name' => 'Seychelles', 'country' => 'Seychelles'],
            ['name' => 'Mauritius', 'country' => 'Mauritius'],
            ['name' => 'Reykjavik', 'country' => 'Iceland'],
            ['name' => 'Las Vegas', 'country' => 'United States'],
            ['name' => 'Miami', 'country' => 'United States'],
            ['name' => 'San Francisco', 'country' => 'United States'],
            ['name' => 'Chicago', 'country' => 'United States'],
            ['name' => 'Toronto', 'country' => 'Canada'],
            ['name' => 'Vancouver', 'country' => 'Canada'],
            ['name' => 'Montreal', 'country' => 'Canada'],
            ['name' => 'Buenos Aires', 'country' => 'Argentina'],
            ['name' => 'Rio de Janeiro', 'country' => 'Brazil'],
            ['name' => 'São Paulo', 'country' => 'Brazil'],
            ['name' => 'Mexico City', 'country' => 'Mexico'],
            ['name' => 'Cancun', 'country' => 'Mexico'],
            ['name' => 'Seoul', 'country' => 'South Korea'],
            ['name' => 'Shanghai', 'country' => 'China'],
            ['name' => 'Beijing', 'country' => 'China'],
            ['name' => 'Delhi', 'country' => 'India'],
            ['name' => 'Mumbai', 'country' => 'India'],
            ['name' => 'Bangalore', 'country' => 'India'],
            ['name' => 'Melbourne', 'country' => 'Australia'],
            ['name' => 'Brisbane', 'country' => 'Australia'],
            ['name' => 'Perth', 'country' => 'Australia'],
            ['name' => 'Auckland', 'country' => 'New Zealand'],
            ['name' => 'Cape Town', 'country' => 'South Africa'],
            ['name' => 'Johannesburg', 'country' => 'South Africa'],
            ['name' => 'Marrakech', 'country' => 'Morocco'],
            ['name' => 'Cairo', 'country' => 'Egypt'],
        ];
    }
}
