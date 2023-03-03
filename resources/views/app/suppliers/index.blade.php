@extends('app.layouts.default')
@section('title', $title)

@section('main')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2 ">
        <p>Fornecedor</p>
    </div>

    <div class="menu">
        <ul>
            <li> <a href="{{ route('app.supplier.add') }}">Novo</a> </li>
             <li> <a href="{{ route('app.supplier') }}">Consulta</a> </li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div style='width:30%; margin: auto' >
            <form action="{{ route('app.supplier.list') }}" method="post">
            @csrf
                <input type="text" name="name" id="" placeholder="Nome" class="borda-preta">
                <input type="text" name="site" id="" placeholder="Site" class="borda-preta">
                <input type="text" name="uf" id="" placeholder="UF" class="borda-preta">
                <input type="text" name="email" id="" placeholder="E-mail" class="borda-preta">
                <button type="submit" class="borda-preta" >Pesquisar</button>
            </form>
        </div>
    </div>
</div>    


@endsection