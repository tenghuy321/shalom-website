<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Hero;
use App\Models\Client;
use App\Models\Contact;
use App\Models\Services;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    public function index()
    {
        $data['client'] = Client::get();
        $data['services'] = Services::orderBy('order')->get();
        $data['hero'] = Hero::find(5);
        $data['contacts'] = Contact::first();

        return view('frontends.pages.client', $data);
    }
}
