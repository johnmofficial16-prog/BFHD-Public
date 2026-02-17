<?php

namespace App\Http\Controllers;

use App\Models\ClickLog;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Simple hardcoded admin credentials (can be moved to .env later)
    private const ADMIN_USERNAME = 'admin';
    private const ADMIN_PASSWORD = 'bfhd2024!'; // Change this!

    /**
     * Show login form
     */
    public function showLogin()
    {
        // If already logged in, redirect to dashboard
        if (session('admin_logged_in')) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    /**
     * Handle login
     */
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($request->username === self::ADMIN_USERNAME && 
            $request->password === self::ADMIN_PASSWORD) {
            session(['admin_logged_in' => true]);
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['login' => 'Invalid credentials']);
    }

    /**
     * Logout
     */
    public function logout()
    {
        session()->forget('admin_logged_in');
        return redirect()->route('admin.login');
    }

    /**
     * Dashboard - Main Stats Page
     */
    public function dashboard()
    {
        // Check auth
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        // Default values (in case DB is not available locally)
        $clicksToday = 0;
        $clicksWeek = 0;
        $clicksTotal = 0;
        $clicksByVertical = [];
        $recentClicks = collect([]);
        $subscribersToday = 0;
        $subscribersTotal = 0;
        $recentSubscribers = collect([]);
        $dbError = null;

        try {
            // Click Stats
            $clicksToday = ClickLog::whereDate('created_at', today())->count();
            $clicksWeek = ClickLog::where('created_at', '>=', now()->subDays(7))->count();
            $clicksTotal = ClickLog::count();

            // Clicks by Vertical
            $clicksByVertical = ClickLog::selectRaw('vertical, COUNT(*) as count')
                ->groupBy('vertical')
                ->pluck('count', 'vertical')
                ->toArray();

            // Recent Clicks
            $recentClicks = ClickLog::orderBy('created_at', 'desc')
                ->take(20)
                ->get();

            // Subscriber Stats
            $subscribersToday = Subscriber::whereDate('created_at', today())->count();
            $subscribersTotal = Subscriber::count();
            $recentSubscribers = Subscriber::orderBy('created_at', 'desc')
                ->take(10)
                ->get();
        } catch (\Exception $e) {
            $dbError = 'Database not connected. Stats will show on production.';
        }

        return view('admin.dashboard', compact(
            'clicksToday',
            'clicksWeek', 
            'clicksTotal',
            'clicksByVertical',
            'recentClicks',
            'subscribersToday',
            'subscribersTotal',
            'recentSubscribers',
            'dbError'
        ));
    }

    /**
     * Run database migrations (admin only, one-time setup)
     */
    public function runMigrations()
    {
        // Check auth
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        try {
            // Run migrations
            \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
            $output = \Illuminate\Support\Facades\Artisan::output();
            
            return response()->json([
                'success' => true,
                'message' => 'Migrations completed!',
                'output' => $output
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Test click logging to diagnose issues
     */
    public function testClickLog()
    {
        // Check auth
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        try {
            $click = ClickLog::create([
                'partner_id' => null,
                'vertical' => 'test',
                'user_ip' => request()->ip(),
                'user_agent' => 'Test Agent',
                'referer' => 'Dashboard Test',
                'redirect_url' => 'https://test.com',
                'search_params' => ['test' => true],
            ]);
            
            return response()->json([
                'success' => true,
                'message' => 'Test click logged successfully!',
                'click_id' => $click->id,
                'total_clicks' => ClickLog::count()
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ], 500);
        }
    }
}
