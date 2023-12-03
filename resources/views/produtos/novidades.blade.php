<x-padrao title="Novidades">
    <x-navbar />

    <div class="container row mx-auto mt-3 g-4">
        <h1 class="text-center">Novidades</h1>
        
        @foreach ($produtos as $produto)
            <x-cards-produtos :produto="$produto" />
        @endforeach
    </div>
    <x-footer />

</x-padrao>