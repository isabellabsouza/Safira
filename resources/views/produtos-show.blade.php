<x-padrao title="{{ $produto->nome }}">
    <x-navbar />
    <div class="container mt-3">
        <div class="row">
            <div class="col col-1">
                <div>
                    <?php $i = 0; ?>
                    @foreach ($produto->imagemProduto as $imagem)
                    <img type="button" data-bs-target="#carouselFotosProduto" id="carousel-selector-{{ $i++ }}"
                        data-bs-slide-to="{{ $loop->index }}"
                        class="img-fluid mb-2 carousel-thumb {{ $loop->first ? 'active' : '' }}" aria-current="true"
                        aria-label="Slide 1" src="{{ asset('storage/' . $imagem->caminho) }}">
                    @endforeach
                </div>
            </div>
            <div class="col col-5">
                <div id="carouselFotosProduto" class="carousel slide">
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
                    @if(count($produto->imagemProduto) > 1)
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselFotosProduto"
                        data-bs-slide="prev">
                        <span class="bi bi-chevron-compact-left text-dark fs-4" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselFotosProduto"
                        data-bs-slide="next">
                        <span class="bi bi-chevron-compact-right text-dark fs-4" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    @endif
                </div>
            </div>
            <div class="col col-6">
                <div class="container">
                    <div class="row">
                        <small class="text-capitalize">{{$produto->categoria}}</small>
                    </div>
                    <div class="row">
                        <div class="col">
                            <h1 class="text-uppercase">{{ $produto->nome }}</h1>
                        </div>
                    </div>
                    <div class="row mt-2 align-items-center">
                        <div class="col col-auto me-2">
                            <h3>R$ {{number_format($produto->preco, 2, ",", ".")}}</h3>
                        </div>
                        <div class="col text-end">
                            <sl-rating label="Rating" value="{{random_int(2,5)}}" readonly></sl-rating>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <small>Ou em <b>10x</b> de <b>R$ {{number_format($produto->preco/10, 2, ",",
                                    ".")}}</b></small>
                        </div>
                    </div>
                    <x-divider />
                    <div class="row mt-3">
                        <div class="col">
                            <p>{{ $produto->descricao }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <form action="{{ route('carrinho.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="produto_id" value="{{ $produto->id }}">
                                <input type="hidden" name="quantidade" value="1">
                                <button class="btn btn-primary rounded-1 fs-5" type="submit">Adicionar ao Carrinho <i
                                        class="bi bi-cart2"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <x-divider />
        <div class="row">
            {{-- TODO: detalhes do produto e afins --}}
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h3 class="text-uppercase">Detalhes do produto</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-7 ms-4">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td class="text-uppercase">Categoria</td>
                                    <td class="text-capitalize">{{ $produto->categoria }}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Marca</td>
                                    <td>...</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Modelo</td>
                                    <td>...</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Cor</td>
                                    <td>...</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Peso</td>
                                    <td>... kg</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Dimensões</td>
                                    <td>...</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Garantia</td>
                                    <td>90 dias contra defeitos de fabricação</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Quantidade em estoque</td>
                                    <td>...</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <x-divider />
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h3 class="text-uppercase">Outros produtos</h3>
                    </div>
                </div>
                <div class="row justify-content-center mb-5">
                    {{-- Outros produtos --}}
                    @foreach ($produtosRecomendados as $produto)
                    <x-smallcard-produtos :produto="$produto" />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <x-footer />
</x-padrao>