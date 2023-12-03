<x-padrao title="Camisetas">
    <x-navbar />

        <div class="container row mx-auto g-4">
            <h1>Acessórios</h1>

            @foreach ($produtos as $produto)
                <x-cards-produtos :produto="$produto" />
            @endforeach
        </div>

    <x-footer />
</x-padrao>