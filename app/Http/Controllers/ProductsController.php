<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Unit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Pagination\Paginator;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): Response
    {
        Paginator::useBootstrap();
        $units = Unit::pluck('description', 'id');
        $products = Product::paginate(10);
        return response()->view('app.products.index', ['title' => 'Lista de produtos', 'products' => $products, 'units' => $units, 'request' => $request->all()],200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        $units = Unit::pluck('description', 'id');
        return response()->view('app.products.create', ['units' => $units],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $rules = [
            'name' => 'required|max:30|min:3',
            'description' => 'required|max:250|min:3',
            'weight' => 'required|integer',
            'unit_id' => 'exists:units,id'

        ];
        $feedback = [
            'required' => 'Campo obrigatório',
            'name.max' => 'O campo nome não pode ter mais que 30 carateres.',
            'name.min' => 'O campo nome não pode ter menos que 3 carateres.',
            'description.max' => 'O campo nome não pode ter main que 250 carateres.',
            'description.min' => 'O campo nome não pode ter menos que 3 carateres.',
            'unit_id' => 'A unidade de medida informada não existe.'
        ];

        $request->validate($rules, $feedback);
        Product::create($request->all());
        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $produto): Response
    {
        $units = Unit::pluck('description', 'id');
        return response()->view('app.products.show', ['product' => $produto, 'units' => $units ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $produto): Response
    {
        $units = Unit::pluck('description', 'id');
        return response()->view('app.products.edit', ['product' => $produto, 'units' => $units ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $produto): RedirectResponse
    {
        $produto->update($request->all());
        return redirect()->route('produto.show', ['produto' => $produto->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $produto): RedirectResponse
    {
        $status = 201;
        if (!$produto->delete()) {
            $status = 405;
        }
        
        return redirect()->route('produto.index');
    }
}
