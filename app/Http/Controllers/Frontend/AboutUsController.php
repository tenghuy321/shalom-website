<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Hero;
use App\Models\Team;
use App\Models\About;
use App\Models\Contact;
use App\Models\Services;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Certificate;

class AboutUsController extends Controller
{
    public function index()
    {
        $data['team'] = Team::orderBy('order')->get();
        $data['certificates'] = Certificate::orderBy('order')->get();
        $data['services'] = Services::orderBy('order')->get();
        $data['mission'] = About::find(1);
        $data['vision'] = About::find(2);
        $data['core'] = About::find(3);
        $data['hero'] = Hero::find(2);
        $data['contacts'] = Contact::first();


        return view('frontends.pages.about-us', $data);
    }
}
