<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/flights', function () {
    return view('flights');
})->name('flights');

Route::get('/hotels', function () {
    return view('hotels');
})->name('hotels');

Route::get('/cars', function () {
    return view('cars');
})->name('cars');

Route::get('/blog', function () {
    return view('blog/index');
})->name('blog');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/privacy', function () {
    return view('privacy');
})->name('privacy');

Route::get('/terms', function () {
    return view('terms');
})->name('terms');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');

// Blog Posts
Route::get('/blog/save-money-flights', function () {
    return view('blog/save-money-flights');
})->name('blog.save-money-flights');

Route::get('/blog/london-guide', function () {
    return view('blog/london-guide');
})->name('blog.london-guide');

Route::get('/blog/dubai-guide', function () {
    return view('blog/dubai-guide');
})->name('blog.dubai-guide');

Route::get('/blog/nyc-paris', function () {
    return view('blog/nyc-paris');
})->name('blog.nyc-paris');

Route::get('/blog/multi-city-trip', function () {
    return view('blog/multi-city-trip');
})->name('blog.multi-city-trip');

// Search Routes (handle form submissions)
Route::get('/search/flights', [App\Http\Controllers\SearchController::class, 'flights'])->name('search.flights');
Route::get('/search/hotels', [App\Http\Controllers\SearchController::class, 'hotels'])->name('search.hotels');
Route::get('/search/cars', [App\Http\Controllers\SearchController::class, 'cars'])->name('search.cars');

// Routing Engine
Route::get('/redirect', [App\Http\Controllers\RoutingController::class, 'route'])->name('redirect');

// SEO Landing Pages - Popular Routes
Route::get('/routes/{route}', [App\Http\Controllers\RouteController::class, 'show'])->name('routes.show');




