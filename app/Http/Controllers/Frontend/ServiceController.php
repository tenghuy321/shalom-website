<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Hero;
use App\Models\Contact;
use App\Models\Services;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function index()
    {
        $data['services'] = Services::orderBy('order')->get();
        $data['hero'] = Hero::find(3);
        $data['contacts'] = Contact::first();

        return view('frontends.pages.service', $data);
    }

    public function show($slug)
    {
        $data['service'] = Services::where('slug', $slug)->firstOrFail();
        $data['services'] = Services::orderBy('order')->get();
        $data['hero'] = Hero::find(3);
        $data['contacts'] = Contact::first();


        return view('frontends.pages.service-details', $data);
    }
}
