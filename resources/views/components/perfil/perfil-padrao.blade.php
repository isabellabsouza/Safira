<x-padrao title="Sua conta">
    <x-nav-padrao />
    <div class="container row">
        <h1>Olá, {{ Auth::user()->name }}</h1>
        <div class="col-3 row">
            <a href="{{ route('profile.pedidos') }}">Seus Pedidos</a>
            <a href="{{ route('profile.enderecos') }}">Endereços</a>
            <a href="">Formas de Pagamento</a>
            <a href="">Informações da Conta</a>
        </div>
        <div class="col-9">
            <div class="container">
                {{ $slot}}
            </div>
        </div>
    </div>
    <x-footer />
</x-padrao>