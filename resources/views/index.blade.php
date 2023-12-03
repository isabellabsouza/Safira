<x-padrao title="Safira">
    <x-navbar />

    <x-carousel />

    <h2 class=" container text-center my-3 my-xl-5">Produtos que estão bombando</h2>
    <div class="container row mx-auto g-4">
        
        @foreach ($produtos as $produto)
            <x-cards-produtos :produto="$produto" />
        @endforeach
    </div>

    <x-cards-categorias />

    <x-banner-facilidades />

    <x-footer />
</x-padrao>
