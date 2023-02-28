<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function main(Request $request){
        $erro = $request->get('erro');
        if ($erro == 1) {
            $erro = "Usuário ou senha não existem";
        }
        if ($erro == 2) {
            $erro = "É necessário fazer login para acessar a página.";
        }
        return view('site.login', ['title' => 'Login', 'erro' => $erro]) ;
    }

    public function authenticate(Request $request){
        $rules = [
            'user' => 'email',
            'password' => 'required'
        ];
        $feedback = [
            'user.email' => 'O campo usuário (email) é obrigatório.',
            'password.required' => 'O campo senha é obrigatório.'
        ];
        $request->validate($rules, $feedback);

        $email = $request->get('user');
        $password = $request->get('password');

        $user = new User();

        $result = $user->where('email', $email)->where('password', $password)->get()->first();
        if ($result == null) {
            return redirect()->route('site.login', ['erro' => 1]);
        }
        
        session_start();
        $_SESSION['name'] = $result->name;
        $_SESSION['email'] = $result->email;
        return redirect()->route('app.client');
    }
    
    public function exit(){
        session_destroy();
        return redirect()->route('site.index');
    }
}
