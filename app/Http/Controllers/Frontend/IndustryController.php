<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Hero;
use App\Models\Contact;
use App\Models\Industry;
use App\Models\Services;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndustryController extends Controller
{
    public function index(){
        $data['industries'] = Industry::orderBy('order')->get();
        $data['services'] = Services::orderBy('order')->get();
        $data['hero'] = Hero::find(6);
        $data['contacts'] = Contact::first();

        return view('frontends.pages.industry', $data);
    }
}
