<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ContactUsController extends Controller
{
    public function index()
    {
        $contacts = Contact::get();

        return view('admin.contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('admin.contacts.create');
    }

    public function store(Request $request)
    {
        $data = [
            'hours_of_operation' => [
                'en' => $request->input('hours_of_operation.en', ''),
                'kh' => $request->input('hours_of_operation.kh', ''),
                'ch' => $request->input('hours_of_operation.ch', ''),
            ],
            'address' => [
                'en' => $request->input('address.en', ''),
                'kh' => $request->input('address.kh', ''),
                'ch' => $request->input('address.ch', ''),
            ],
            'email' => $request->input('email', ''),
            'phone_number' => $request->input('phone_number', ''),
            'facebook_link' => $request->input('facebook_link', ''),
            'ig_link' => $request->input('ig_link', ''),
            'tiktok_link' => $request->input('tiktok_link', ''),
            'telegram_link' => $request->input('telegram_link', ''),
            'linkedin_link' => $request->input('linkedin_link', ''),
        ];

        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('contacts', 'custom');
        }

        $i = Contact::create($data);

        return $i
            ? redirect()->route('contact-us.index')->with('success', 'Created successfully!')
            : redirect()->back()->with('error', 'Failed to Create.')->withInput();
    }

    public function edit(string $id)
    {
        $contact = Contact::findOrFail($id);
        return view('admin.contacts.edit', compact('contact'));
    }

    public function update(Request $request, string $id)
    {
        $contact = Contact::findOrFail($id);
        $data = [
            'hours_of_operation' => [
                'en' => $request->input('hours_of_operation.en', ''),
                'kh' => $request->input('hours_of_operation.kh', ''),
                'ch' => $request->input('hours_of_operation.ch', ''),
            ],
            'address' => [
                'en' => $request->input('address.en', ''),
                'kh' => $request->input('address.kh', ''),
                'ch' => $request->input('address.ch', ''),
            ],
            'email' => $request->input('email', ''),
            'phone_number' => $request->input('phone_number', ''),
            'facebook_link' => $request->input('facebook_link', ''),
            'ig_link' => $request->input('ig_link', ''),
            'tiktok_link' => $request->input('tiktok_link', ''),
            'telegram_link' => $request->input('telegram_link', ''),
            'linkedin_link' => $request->input('linkedin_link', ''),
        ];

        if ($request->hasFile('icon')) {
            if ($contact->icon && Storage::disk('custom')->exists($contact->icon)) {
                Storage::disk('custom')->delete($contact->icon);
            }

            $data['icon'] = $request->file('icon')->store('contacts', 'custom');
        }

        $i = $contact->update($data);

        return $i
            ? redirect()->route('contact-us.index')->with('success', 'Updated Successfully')
            : redirect()->back()->with('succees', 'Failed to updated');
    }
}
