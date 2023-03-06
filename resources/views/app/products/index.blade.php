@extends('app.layouts.default')
@section('title', $title)

@section('main')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2 ">
        <p>Listar Produtos</p>
    </div>

    <div class="menu">
        <ul>
            <li> <a href="{{route('produto.create')}}">Novo</a> </li>
             <li> <a href="">Consulta</a> </li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div style='width:80%; margin: auto' >
        <table border="1" width='100%'>
            <thead>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Peso</th>
                <th>Unidade</th>
                <th></th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{$product->name}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->weight}}</td>
                        <td>{{$units[$product->unit_id]}}</td>
                        <td> <a href="{{route('produto.show', ['produto' => $product->id])}}">Visualizar</a></td>
                        <td>
                            <form id="product_delete_{{$product->id}}" action="{{route('produto.destroy', ['produto' => $product->id])}}" method="post">
                                @method('DELETE')
                                @csrf
                                <a href="#" onclick="document.getElementById('product_delete_{{$product->id}}').submit()">Excluir</a>
                            </form>
                        <td> <a href="{{route('produto.edit', ['produto' => $product->id])}}">Editar</a> </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $products->appends($request)->links() }}
        <br>
        Exibindo {{$products->count()}} produtos de {{$products->total()}} de {{$products->firstItem()}} a {{$products->lastItem()}}
        </div>
    </div>
</div>    


@endsection