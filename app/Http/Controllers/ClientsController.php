<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function main(){
        return view('app.clients', ['title' => 'Clientes']) ;
    }
}