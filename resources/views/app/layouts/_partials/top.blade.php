<div class="topo">

  <div class="logo">
      <img src="{{ asset('img/logo.png') }}">
  </div>

  <div class="menu">
      <ul>
          <li><a href="{{ route('app.home') }}">Principal</a></li>
          <li><a href="{{ route('app.client') }}">Clientes</a></li>
          <li><a href="{{ route('app.supplier') }}">Fornecedores</a></li>
          <li><a href="{{ route('produto.index') }}">Produtos</a></li>
          <li><a href="{{ route('app.exit') }}">Sair</a></li>
      </ul>
  </div>
</div>