<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Hero;
use App\Models\Contact;
use App\Models\Services;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $data['services'] = Services::orderBy('order')->get();
        $data['events'] = Event::orderBy('order')->get();
        $data['hero'] = Hero::find(7);
        $data['contacts'] = Contact::first();

        return view('frontends.pages.event', $data);
    }
}
