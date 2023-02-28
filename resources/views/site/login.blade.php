@extends('site.layouts.base')
@section('title', $title)
@section('main')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Login</h1>
        </div>
        @isset($erro)
            <div>
                {{$erro}}
            </div>
        @endisset
        <div class="informacao-pagina">
            <div style="width: 30%; margin: 0 auto;">
            
                <form action="{{ route('site.login') }}" method="post">
                    @csrf
                    <input type="text" name="user" value="{{ old('user') }}" placeholder="Usuário" class="borda-preta">
                    {{ $errors->has('user') ? $errors->first('user') : '' }}
                    <input type="password" name="password" placeholder="Senha" value="{{ old('password') }}"
                        class="borda-preta">
                    {{ $errors->has('password') ? $errors->first('password') : '' }}
                    <button type="submit" class="borda-preta">Acessar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
