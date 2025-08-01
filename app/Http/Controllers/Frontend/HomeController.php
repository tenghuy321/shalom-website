<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Contact;
use App\Models\Faq;
use App\Models\Hero;
use App\Models\Services;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['services'] = Services::orderBy('order')->get();
        $data['faqs'] = Faq::orderBy('order')->get();
        $data['hero'] = Hero::find(1);
        $data['heroes'] = Hero::find(3);
        $data['get'] = Hero::find(8);
        $data['faq'] = About::find(4);
        $data['contacts'] = Contact::first();

        return view('frontends.pages.home', $data);
    }
}
