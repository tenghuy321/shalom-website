<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Hero;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceDetailsController extends Controller
{
    public function details()
    {
        $data['hero'] = Hero::find(3);
        $data['contacts'] = Contact::first();

        return view('frontends.pages.service-details', $data);
    }
}
