<x-padrao title="Painel de Controle">
    <x-nav-padrao />
    <div class="container row">
        
        <div class="col-3 row">
            <a href="{{ route('dashboard.usuarios')}}">Usuários</a>
            <a href="{{ route('dashboard.pedidos') }}">Pedidos</a>
            <a href="{{ route('dashboard.produtos')}}">Produtos</a>
            <a href="">Vendas</a>
        </div>
        <div class="col-9">
            <div class="container">
                {{ $slot}}
            </div>
        </div>
    </div>
    <x-footer />
</x-padrao>