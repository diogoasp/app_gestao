<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContact;
use App\Models\ContactReasons;

class ContactController extends Controller
{
    public function main(Request $request){
        $reason = ContactReasons::all();
        return view('site.contact', ['reason' => $reason]);
    }

    public function save(Request $request){
        $request->validate(['name' => 'required|min:3|max:40', 'phone' => 'required', 'email' => 'required', 'reason'=>'required', 'message'=>'required|max:2000']);

        SiteContact::create($request->all());

        return view('site.contact');
    }
}
