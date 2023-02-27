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
        $rules = ['name' => 'required|min:3|max:40', 'phone' => 'required', 'email' => 'email', 'reason_id'=>'required', 'message'=>'required|max:2000'];
        $feedback = [   'name.required' => 'O campo nome precisa ser preenchido', 'name.min' => 'O campo nome precisa ter no mínimo 3 caracteres', 'name.max' => 'O campo nome não pode ter mais de 40 caracteres',
                        'email.email' => 'Insira um email válido', 
                        'message.max' => 'A mensagem deve ter no máximo 2000 caracteres.',
                        //:attribute -> para aplicar o nome do atributo que chamou o erro de required. Naturalmente usará o texto com base no nome no codigo. Nesse caso será "name" e não "nome"
                        'required' => 'O campo :attribute precisa ser inserido'
    ];
        $request->validate( $rules, $feedback);

        SiteContact::create($request->all());

        return redirect()->route('site.contact');
    }
}
