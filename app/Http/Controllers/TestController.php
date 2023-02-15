<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function main( int $p1, int $p2){
        $resultado = $p1+$p2;
        // return view('site.test', ['resultado' => $resultado]); //Básico
        // return view('site.test')->with('resultado', $resultado); //Com With onde para cada variável é necessário um With
        return view('site.test', compact('resultado')); //Com Compact
    }
}
