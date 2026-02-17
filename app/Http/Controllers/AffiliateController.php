<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;

class AffiliateController extends Controller
{
    /**
     * Dashboard for viewing affiliate stats
     */
    public function dashboard()
    {
        $partners = Partner::withCount('clickLogs')->get();
        
        return view('admin.dashboard', compact('partners'));
    }

    /**
     * View stats for a specific partner
     */
    public function partnerStats($id)
    {
        $partner = Partner::with('clickLogs')->findOrFail($id);
        
        $stats = [
            'total_clicks' => $partner->clickLogs()->count(),
            'clicks_today' => $partner->clickLogs()->whereDate('created_at', today())->count(),
            'clicks_this_month' => $partner->clickLogs()->whereMonth('created_at', now()->month)->count(),
        ];

        return view('admin.partner-stats', compact('partner', 'stats'));
    }
}
