@extends('app.layouts.default')
@section('title', $title ?? 'Produto')

@section('main')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2 ">
        <p>Editar</p>
    </div>

    <div class="menu">
        <ul>
            <li> <a href="{{route('produto.index')}}">Voltar</a> </li>
            <li> <a href="">Lista</a> </li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div style='width:30%; margin: auto' >
            @component('app.products._components.form_create_edit', ['product' => $product,'units' => $units, 'method' => 'PUT', 'action' => 'produto.update', 'argument' => ['produto' => $product->id]])
            @endcomponent
        </div>
    </div>
</div>    


@endsection