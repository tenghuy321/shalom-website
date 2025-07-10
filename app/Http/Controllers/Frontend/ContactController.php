<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Hero;
use App\Models\Contact;
use App\Models\Services;
use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $data['services'] = Services::orderBy('order')->get();
        $data['hero'] = Hero::find(8);
        $data['contacts'] = Contact::first();

        return view('frontends.pages.contact', $data);
    }
    public function send(Request $request)
    {
        $validated = $request->validate([
            'first_name'   => 'required|string',
            'second_name'  => 'nullable|string',
            'email'        => 'required|email',
            'phone'        => 'nullable|string',
            'company'      => 'nullable|string',
            'job_title'    => 'nullable|string',
            'message'      => 'required|string',
            'service_type' => 'required|exists:services,slug',
        ]);

        // Get the localized service title
        $service = Services::where('slug', $validated['service_type'])->first();
        $validated['service_title'] = $service->title[app()->getLocale()];

        // Send email
        Mail::to(' shalomsolution@gmail.com')->send(new ContactFormMail($validated));

        return response()->json(['message' => 'Your message has been sent successfully!']);
    }
}
