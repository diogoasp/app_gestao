@extends('app.layouts.default')
@section('title', $title)

@section('main')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2 ">
        <p>Adicionar</p>
    </div>

    <div class="menu">
        <ul>
            <li> <a href="{{ route('app.supplier.add') }}">Novo</a> </li>
            <li> <a href="{{ route('app.supplier') }}">Consulta</a> </li>
        </ul>
    </div>

    <div class="informacao-pagina">
        {{ $msg ?? ''}}
        <div style='width:30%; margin: auto' >
            <form action="{{ route('app.supplier.add') }}" method="post">
                <input type="hidden" name="id" id="" value = {{ $supplier->id ?? ''}}>
            
                @csrf

                <input type="text" name="name" id="" placeholder="Nome" class="borda-preta" value = {{ $supplier->name ?? old('name') }}>
                @if ($errors->has('name'))
                    <div class="alert alert-danger" role="alert">
                        {{$errors->first('name')}}
                    </div>
                @endif
                <input type="text" name="site" id="" placeholder="Site" class="borda-preta" value = {{ $supplier->site ?? old('site') }}>
                @if ($errors->has('site'))
                    <div class="alert alert-danger" role="alert">
                        {{$errors->first('site')}}
                    </div>
                @endif
                <input type="text" name="uf" id="" placeholder="UF" class="borda-preta" value = {{ $supplier->uf ?? old('uf') }}>
                @if ($errors->has('uf'))
                    <div class="alert alert-danger" role="alert">
                        {{$errors->first('uf')}}
                    </div>
                @endif
                <input type="text" name="email" id="" placeholder="E-mail" class="borda-preta" value = {{ $supplier->email ?? old('email') }}>
                @if ($errors->has('email'))
                    <div class="alert alert-danger" role="alert">
                        {{$errors->first('email')}}
                    </div>
                @endif
                <button type="submit" class="borda-preta" >Cadastrar</button>
            </form>
        </div>
    </div>
</div>    


@endsection