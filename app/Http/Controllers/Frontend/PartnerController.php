<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Hero;
use App\Models\Contact;
use App\Models\Partner;
use App\Models\Services;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PartnerController extends Controller
{
    public function index(){
        $data['partner'] = Partner::orderBy('order')->get();
        $data['services'] = Services::orderBy('order')->get();
        $data['hero'] = Hero::find(4);
        $data['contacts'] = Contact::first();

        return view('frontends.pages.partner', $data);
    }
}
