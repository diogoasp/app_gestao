@extends('app.layouts.default')
@section('title', $title ?? 'Produto')

@section('main')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2 ">
        <p>Visualizar</p>
    </div>

    <div class="menu">
        <ul>
            <li> <a href="{{route('produto.index')}}">Voltar</a> </li>
            <li> <a href="">Consulta</a> </li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div style='width:30%; margin: auto' >
            <ul>
                <li>ID: {{$product->id}}</li>
                <li>Nome: {{$product->name}}</li>
                <li>Descrição: {{$product->description}}</li>
                <li>Peso: {{$product->weight}}</li>
                <li>Unidade: {{$product->unit_id}}</li>
            </ul>
        </div>
    </div>
</div>    


@endsection