<x-padrao title="Sua conta">
    <x-nav-padrao />
    
    <div class="container row">
        <h1>Olá, {{ Auth::user()->name }}</h1>
        <sl-menu class="col-3">
            <sl-menu-item class="menu-item">
                <a href="{{ route('profile.pedidos') }}">Meus Pedidos</a>
                <sl-icon slot="prefix" name="file-text"></sl-icon>
            </sl-menu-item>
            <sl-divider></sl-divider>
            <sl-menu-item>
                <a href="{{ route('profile.enderecos') }}">Endereços</a>
                <sl-icon slot="prefix" name="house-add"></sl-icon>
            </sl-menu-item>
            <sl-divider></sl-divider>
            <sl-menu-item>
                <a href="">Formas de Pagamento</a>
                <sl-icon slot="prefix" name="credit-card-2-back"></sl-icon>
            </sl-menu-item>
            <sl-divider></sl-divider>
            <sl-menu-label>Conta</sl-menu-label>
            <sl-menu-item>
                <a href="{{ route('profile.senha') }}">Alterar Senha</a>
                <sl-icon slot="prefix" name="person-circle"></sl-icon>
            </sl-menu-item>            
            <sl-divider></sl-divider>
            <sl-menu-item>
                <a href="{{ route('profile.info') }}">Alterar Email</a>
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
