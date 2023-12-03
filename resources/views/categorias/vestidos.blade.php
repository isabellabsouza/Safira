<x-padrao title="Camisetas">
    <x-navbar />

        <div class="container row mx-auto g-4">
            <h1>Vestidos</h1>
            @if(count($produtos) == 0)
            <div class="row">
                <h2 class="text-center">Nenhum produto encontrado <i class="bi bi-emoji-frown"></i></h2>
            </div>
            @endif
            @foreach ($produtos as $produto)
                <x-cards-produtos :produto="$produto" />
            @endforeach
        </div>

    <x-footer />
</x-padrao>