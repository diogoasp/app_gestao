<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function main(){
        return view('app.products', ['title' => "Produtos"]);
    }
}
