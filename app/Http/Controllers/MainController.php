<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactReasons;

class MainController extends Controller
{
    public function main(){
        $reason = ContactReasons::all();
        return view('site.main', ['title' => 'Início', 'reason' => $reason]) ;
    }
}
