<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use App\Models\Subscriber;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Log the submission
        Log::info('Contact Form Submission:', $request->all());

        // Send email via Brevo API (Restored from Hostinger Backup)
        try {
            $apiKey = env('BREVO_API_KEY');
            
            // Render email template
            $htmlContent = view('emails.contact', ['contactData' => $request->all()])->render();
            
            // Prepare API request
            $response = Http::withHeaders([
                'accept' => 'application/json',
                'api-key' => $apiKey,
                'content-type' => 'application/json'
            ])->post('https://api.brevo.com/v3/smtp/email', [
                'sender' => [
                    'name' => 'BestFlightHotelDeals',
                    'email' => 'justinmj6@gmail.com'
                ],
                'to' => [[
                    'email' => 'justinmj6@gmail.com',
                    'name' => 'Admin'
                ]],
                'cc' => [[
                    'email' => 'info@bestflighthoteldeals.com',
                    'name' => 'Info'
                ]],
                'subject' => 'Contact Form: ' . $request->subject,
                'htmlContent' => $htmlContent
            ]);

            if ($response->successful()) {
                return back()->with('success', 'Thank you for contacting us! We will get back to you shortly.');
            } else {
                Log::error('Brevo API Error: ' . $response->body());
                // Show success to user even if email fails to avoid confusion (logged in backend)
                return back()->with('success', 'Thank you for contacting us! Your message has been received.');
            }
        } catch (\Exception $e) {
            Log::error('Contact Form Error: ' . $e->getMessage());
            return back()->with('success', 'Thank you for contacting us! Your message has been received.');
        }
    }

    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers,email'
        ]);

        // Save to Database (Restored Logic)
        Subscriber::create([
            'email' => $request->email
        ]);

        // Redirect with success
        return back()->with('success_subscribe', 'Thanks for subscribing! You are now on the list.');
    }
}
