<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    public function sendBooking(Request $request)
    {
        app()->setLocale(session('locale', 'en'));

        $validated = $request->validate([
            'first_name'   => 'required|string|max:100',
            'last_name'    => 'required|string|max:100',
            'email'        => 'required|email|max:255',
            'date'         => 'required|date',
            'time'         => 'required|date_format:H:i',
            'service_type' => 'required|string|exists:services,slug',
            'requests'     => 'nullable|string|max:1000',
        ]);

        // ✅ Send email
        Mail::send('frontends.emails.booking', $validated, function ($message) {
            $message->to('tenghuyly2330@gmail.com')
                ->subject('New Booking Request');
        });

        return response()->json([
            'message' => 'Your booking has been submitted!',
        ]);
    }
}
