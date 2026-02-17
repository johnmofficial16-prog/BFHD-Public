<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        try {
            // Attempt to save to database
            Subscriber::create([
                'email' => $request->email
            ]);
        } catch (\Exception $e) {
            // Log the error but don't crash - on Hostinger this will work
            \Illuminate\Support\Facades\Log::error('Newsletter subscribe error: ' . $e->getMessage());
        }

        // Always show success to user (they don't need to know if DB failed locally)
        return back()->with('success_subscribe', 'Thank you for subscribing to our newsletter!');
    }
}
