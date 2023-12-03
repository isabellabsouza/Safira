{{-- <x-padrao title="Painel de Controle">
    <x-nav-padrao/>
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
</x-padrao> --}}


<x-padrao title="Painel de Controle">
    <x-nav-padrao />
    
    <div class="container row">
        <h1>Painel de Controle</h1>



        <sl-menu class="col-3">
            <sl-menu-item class="menu-item">
                <a href="{{ route('dashboard.usuarios') }}">Usuários</a>
                <sl-icon slot="prefix" name="file-text"></sl-icon>
            </sl-menu-item>
            <sl-divider></sl-divider>
            <sl-menu-item>
                <a href="{{ route('dashboard.pedidos') }}">Pedidos</a>
                <sl-icon slot="prefix" name="house-add"></sl-icon>
            </sl-menu-item>
            <sl-divider></sl-divider>
            <sl-menu-item>
                <a href="{{ route('dashboard.produtos')}}">Produtos</a>
                <sl-icon slot="prefix" name="credit-card-2-back"></sl-icon>
            </sl-menu-item>
            <sl-divider></sl-divider>
            <sl-menu-item>
                <a href="">Vendas</a>
                <sl-icon slot="prefix" name="person-circle"></sl-icon>
            </sl-menu-item>                     
          </sl-menu>
        <div class="col-9">
            <div class="container">
                {{ $slot }}
            </div>
        </div>
    </div>
    <x-footer />

</x-padrao>
