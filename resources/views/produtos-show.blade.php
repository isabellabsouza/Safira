<x-padrao title="{{ $produto->nome }}">
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
            <form action="{{ route('carrinho.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="produto_id" value="{{ $produto->id }}">
                <input type="hidden" name="quantidade" value="1">
                <button class="btn btn-primary" type="submit">Adicionar ao Carrinho</button>
            </form>
            <div class="btn-group mt-3" role="group" aria-label="First group">
                <button type="button" class="btn btn-outline-secondary">PP</button>
                <button type="button" class="btn btn-outline-secondary">P</button>
                <button type="button" class="btn btn-outline-secondary">M</button>
                <button type="button" class="btn btn-outline-secondary">G</button>
                <button type="button" class="btn btn-outline-secondary">GG</button>
            </div>
            
        </div>
    </div>

    <x-footer />
</x-padrao>
