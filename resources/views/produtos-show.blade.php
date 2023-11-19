<x-padrao title="Produto xxx">
    <x-navbar />

    <div class="container row">
        <div class="col-6">
            <div id="carouselExampleIndicators" class="carousel slide">
                <div class="carousel-indicators">
                    @foreach ($produto->imagemProduto as $imagem)
                        <button type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"
                            aria-current="true" aria-label="Slide 1"></button>
                    @endforeach
                </div>
                <div class="carousel-inner">
                    <div class="imagem-container">
                        @foreach ($produto->imagemProduto as $imagem)
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                <img src="{{ asset('storage/' . $imagem->caminho) }}" class="d-block w-100"
                                    alt="{{ $produto->nome }}">
                            </div>
                        @endforeach
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="col-6">
            <h1>{{ $produto->nome }}</h1>
            <p>{{ $produto->descricao }}</p>
            <p>{{ $produto->preco }}</p>
        </div>
    </div>

    <x-footer />
</x-padrao>
