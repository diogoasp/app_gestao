<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function main(){
        // $suppliers = [ 
        //     0 => ['nome' => 'Fornecedor 1', 'status' => 'N', 'CNPJ' => '00.000.00/00-00'], 
        //     1 => ['nome' => 'Fornecedor 2', 'status' => 'S', 'CNPJ' => null]
        // ]; //Deve ser um recurso vindo o banco de dados
        // return view('app.suppliers.index', compact('suppliers')) ;
        return view('app.suppliers', ['title' => 'Fornecedores']) ;
    }
}
