<x-padrao title="Safira">
    <x-navbar />
    <div class="container mt-2">
        <div class="row">
            <h2>Resultados para: {{$searchTerm}}</h2>
        </div>
        <x-divider />
        <div class="row">
            @foreach ($produtos as $produto)
                <x-cards-produtos :produto="$produto" />
            @endforeach
        </div>
    </div>
</x-padrao>