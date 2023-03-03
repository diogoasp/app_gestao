@extends('app.layouts.default')
@section('title', $title)

@section('main')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2 ">
        <p>Listar Fornecedores</p>
    </div>

    <div class="menu">
        <ul>
            <li> <a href="{{ route('app.supplier.add') }}">Novo</a> </li>
             <li> <a href="{{ route('app.supplier') }}">Consulta</a> </li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div style='width:80%; margin: auto' >
        <table border="1" width='100%'>
            <thead>
                <th>Nome</th>
                <th>Site</th>
                <th>UF</th>
                <th>E-mail</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($suppliers as $supplier)
                    <tr>
                        <td>{{$supplier->name}}</td>
                        <td>{{$supplier->site}}</td>
                        <td>{{$supplier->uf}}</td>
                        <td>{{$supplier->email}}</td>
                        <td> <a href="{{ route('app.supplier.delete', $supplier->id) }}">Excluir</a>  </td>
                        <td> <a href="{{ route('app.supplier.edit', $supplier->id) }}">Editar</a> </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $suppliers->appends($request)->links() }}
        </div>
    </div>
</div>    


@endsection