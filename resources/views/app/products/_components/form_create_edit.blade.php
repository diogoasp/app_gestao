  <form action="{{route($action, $argument ?? '')}}" method="post">
    @csrf
    @method($method)
    <input type="text" name="name" id="" placeholder="Nome" class="borda-preta" value = '{{ $product->name ?? old('name') }}'>
    @if ($errors->has('name'))
        <div class="alert alert-danger" role="alert">
            {{$errors->first('name')}}
        </div>
    @endif
    <input type="text" name="description" id="" placeholder="Descrição" class="borda-preta" value = '{{ $product->description ?? old('description') }}'>
    @if ($errors->has('description'))
        <div class="alert alert-danger" role="alert">
            {{$errors->first('description')}}
        </div>
    @endif
    <input type="number" name="weight" id="" placeholder="Peso" class="borda-preta" value = '{{ $product->weight ?? old('weight') }}'>
    @if ($errors->has('weight'))
        <div class="alert alert-danger" role="alert">
            {{$errors->first('weight')}}
        </div>
    @endif

    {!! Form::select('unit_id', $units,$product->unit_id ?? old('unit_id')) !!}

    @if ($errors->has('unit_id'))
        <div class="alert alert-danger" role="alert">
            {{$errors->first('unit_id')}}
        </div>
    @endif
    <button type="submit" class="borda-preta" >Cadastrar</button>
</form>