<h1>Fornecedores (view)</h1>

{{-- Cometários no Blade --}}

<ul>
    <li> <a href="{{ route('site.index') }}">Início</a> </li>
    <li> <a href="{{ route('site.about') }}">Sobre</a> </li>
    <li> <a href="{{ route('site.contact') }}">Contato</a> </li>
    <li> <a href="{{ route('site.login') }}">Entrar</a> </li>
</ul>

{{-- @dd($suppliers) --}}

{{-- Existe o comando @unless que é a inversão do if. É um !if --}}
{{-- Existe o comando @isset que funciona como o isset do php padrão, mas de forma direta, não precisa estar dentro de if --}}
{{-- @empty tal qual @isset --}}
@if(count($suppliers) > 0 && count($suppliers) < 10)
    <h3>Existem alguns fornecedores cadastrados.</h3>
@elseif(count($suppliers) > 10)
    <h3>Existem vários fornecedores cadastrados.</h3>
@else
    <h3>Ainda não existem fornecedores cadastrados.</h3>
@endif

@isset($suppliers)
    @foreach ($suppliers as $supplier)

    {{-- Dentro de loops sem iterador explícito há a opção de usar o $loop para capturar essa informação com ->interation, ->first, ->last --}}
        @if($loop->first) 
            Primeira iteração.
        @endif
        Fornecedor: {{$supplier['nome']}}
        <br>
        Status: {{$supplier['status']}}
        <br>
        CNPJ: {{$supplier['CNPJ'] ?? 'Dado não preenchido.'}}
        <hr>
    @endforeach
@endisset
