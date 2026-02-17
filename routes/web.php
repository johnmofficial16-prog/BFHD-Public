<?php

use Illuminate\Support\Facades\Route;

Route::get('/sitemap.xml', function () {
    return response()->file(public_path('sitemap.xml'), [
        'Content-Type' => 'text/xml'
    ]);
});

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

// New SEO-Optimized Blog Posts (January 2026)
Route::get('/blog/how-to-find-cheap-flights-2026', function () {
    return view('blog/how-to-find-cheap-flights-2026');
})->name('blog.how-to-find-cheap-flights-2026');

Route::get('/blog/best-budget-airlines-2026', function () {
    return view('blog/best-budget-airlines-2026');
})->name('blog.best-budget-airlines-2026');

Route::get('/blog/hidden-travel-fees-avoid-2026', function () {
    return view('blog/hidden-travel-fees-avoid-2026');
})->name('blog.hidden-travel-fees-avoid-2026');

Route::get('/blog/google-flights-vs-kayak-vs-skyscanner', function () {
    return view('blog/google-flights-vs-kayak-vs-skyscanner');
})->name('blog.google-flights-vs-kayak-vs-skyscanner');

Route::get('/blog/best-time-book-hotels-2026', function () {
    return view('blog/best-time-book-hotels-2026');
})->name('blog.best-time-book-hotels-2026');

Route::get('/blog/zipair-vancouver-tokyo-review-2026', function () {
    return view('blog/zipair-vancouver-tokyo-review-2026');
})->name('blog.zipair-vancouver-tokyo-review-2026');

// Search Routes (handle form submissions)
Route::group(['middleware' => 'throttle:120,1'], function () {
    Route::get('/search/flights', [App\Http\Controllers\SearchController::class, 'flights'])->name('search.flights');
    Route::get('/search/hotels', [App\Http\Controllers\SearchController::class, 'hotels'])->name('search.hotels');
    Route::get('/search/cars', [App\Http\Controllers\SearchController::class, 'cars'])->name('search.cars');
    Route::get('/search/packages', [App\Http\Controllers\SearchController::class, 'packages'])->name('search.packages');

    // Routing Engine
    Route::get('/redirect', [App\Http\Controllers\RoutingController::class, 'route'])->name('redirect');
});

// SEO Landing Pages - Popular Routes
Route::get('/routes/{route}', [App\Http\Controllers\RouteController::class, 'show'])->name('routes.show');

// Admin Dashboard (New)
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [App\Http\Controllers\AdminController::class, 'login'])->name('admin.login.post');
Route::get('/admin/logout', [App\Http\Controllers\AdminController::class, 'logout'])->name('admin.logout');
Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/migrate', [App\Http\Controllers\AdminController::class, 'runMigrations'])->name('admin.migrate');
Route::get('/admin/test-click', [App\Http\Controllers\AdminController::class, 'testClickLog'])->name('admin.test-click');

// Form Submissions (Matches Hostinger Backup Exactly)
Route::post('/newsletter/subscribe', [App\Http\Controllers\NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');
Route::post('/contact/submit', [App\Http\Controllers\ContactController::class, 'submit'])->name('contact.submit');

// API Endpoints
Route::get('/api/airports/autocomplete', [App\Http\Controllers\SearchController::class, 'autocomplete'])->name('api.airports.autocomplete');
Route::get('/api/cities/autocomplete', [App\Http\Controllers\SearchController::class, 'cityAutocomplete'])->name('api.cities.autocomplete');
