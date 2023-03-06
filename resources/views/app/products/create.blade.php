@extends('app.layouts.default')
@section('title', $title ?? 'Produto')

@section('main')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2 ">
        <p>Adicionar</p>
    </div>

    <div class="menu">
        <ul>
            <li> <a href="{{route('produto.index')}}">Voltar</a> </li>
            <li> <a href="">Consulta</a> </li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div style='width:30%; margin: auto' >
          @component('app.products._components.form_create_edit', ['units' => $units, 'method' => 'POST', 'action' => 'produto.store'])
          @endcomponent
        </div>
    </div>
</div>    


@endsection