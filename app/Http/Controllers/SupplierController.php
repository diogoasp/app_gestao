<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function main(){
        return view('app.suppliers.index', ['title' => 'Fornecedores']) ;
    }

    public function list(Request $request){
        Paginator::useBootstrap();
        $suppliers = Supplier::where('name', 'like', '%'.$request->input('name').'%')
                                ->where('site', 'like', '%'.$request->input('site').'%')
                                ->where('uf', 'like', '%'.$request->input('uf').'%')
                                ->where('email', 'like', '%'.$request->input('email').'%')
                                ->paginate(2);
        return view('app.suppliers.list', ['title' => 'Lista de fornecedores', 'suppliers' => $suppliers, 'request' => $request->all()]);
    }

    public function add(Request $request){
        $msg = '';
        if ($request->input('_token') != '') {

            if ($request->input('id') != '') {
                $supplier = Supplier::find($request->input('id'));
                $update = $supplier->update($request->all());
                $msg = 'Update realizado com sucesso!';

                return redirect()->route('app.supplier.add', ['title' => 'Editar fornecedor', 'msg' => $msg, 'id' => $request->input('id')]);
            } else {
                $rules = [
                    'name' => 'required|min:3|max:40',
                    'site' => 'required',
                    'uf' => 'required|min:2|max:2',
                    'email' => 'email'
                ];
                $feedback = [
                    'required' => 'Campo obrigatório.',
                    'nome.max' => 'O campo nome deve ter no máximo 40 caracteres.',
                    'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres.',
                    'uf.min' => 'O campo nome deve ter no mínimo 2 caracteres.',
                    'uf.max' => 'O campo nome deve ter no máximo 2 caracteres.',
                    'email.email' => 'O campo e-mail não foi preenchido corretamente'
                ];
                $request->validate($rules, $feedback);
                $supplier = new Supplier();
                $msg = 'Cadastro realizado com sucesso!';
            }
        }
        return view('app.suppliers.add', ['title' => 'Adicionar fornecedor', 'msg' => $msg]);
    }

    public function edit($id, $msg = ''){
        $supplier = Supplier::find($id);
        return view('app.suppliers.add', ['title' => 'Editar fornecedor', 'supplier' => $supplier, 'msg' => $msg]);
    }

    public function delete($id){
        Supplier::find($id)->delete();
        return redirect()->route('app.supplier');
    }
}
