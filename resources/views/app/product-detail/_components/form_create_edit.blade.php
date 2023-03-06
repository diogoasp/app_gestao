  <form action="{{route($action, $argument ?? '')}}" method="post">
    @csrf
    @method($method)
    <input type="text" name="product_id" id="" placeholder="Produto" class="borda-preta" value = '{{ $product_detail->product_id ?? old('product_id') }}'>
    @if ($errors->has('product_id'))
        <div class="alert alert-danger" role="alert">
            {{$errors->first('product_id')}}
        </div>
    @endif
    <input type="number"  step="0.01" name="lenght" id="" placeholder="Comprimento" class="borda-preta" value = '{{ $product_detail->lenght ?? old('lenght') }}'>
    @if ($errors->has('lenght'))
        <div class="alert alert-danger" role="alert">
            {{$errors->first('lenght')}}
        </div>
    @endif
    <input  type="number"  step="0.01" name="width" id="" placeholder="Largura" class="borda-preta" value = '{{ $product_detail->width ?? old('width') }}'>
    @if ($errors->has('width'))
        <div class="alert alert-danger" role="alert">
            {{$errors->first('width')}}
        </div>
    @endif
    <input  type="number"  step="0.01" name="height" id="" placeholder="Altura" class="borda-preta" value = '{{ $product_detail->height ?? old('height') }}'>
    @if ($errors->has('height'))
        <div class="alert alert-danger" role="alert">
            {{$errors->first('height')}}
        </div>
    @endif

    {!! Form::select('unit_id', $units,$product_detail->unit_id ?? old('unit_id')) !!}

    @if ($errors->has('unit_id'))
        <div class="alert alert-danger" role="alert">
            {{$errors->first('unit_id')}}
        </div>
    @endif
    <button type="submit" class="borda-preta" >Cadastrar</button>
</form>