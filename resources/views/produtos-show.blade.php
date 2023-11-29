<x-padrao title="{{ $produto->nome }}">
    <x-navbar />
    <div class="container mt-3">
        <div class="row">
            <div class="col col-1">
                <div>
                    <?php $i = 0; ?>
                    @foreach ($produto->imagemProduto as $imagem)
                        <img type="button" data-bs-target="#carouselFotosProduto"
                            id="carousel-selector-{{ $i++ }}" data-bs-slide-to="{{ $loop->index }}"
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
                    @if (count($produto->imagemProduto) > 1)
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
                        <small class="text-capitalize">{{ $produto->categoria }}</small>
                    </div>
                    <div class="row">
                        <div class="col">
                            <h1 class="text-uppercase">{{ $produto->nome }}</h1>
                        </div>
                    </div>
                    <div class="row mt-2 align-items-center">
                        <div class="col col-auto me-2">
                            <h3>R$ {{ number_format($produto->preco, 2, ',', '.') }}</h3>
                        </div>
                        <div class="col text-end">
                            <sl-rating label="Rating" value="{{ random_int(2, 5) }}" readonly></sl-rating>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <small>Ou em <b>10x</b> de <b>R$
                                    {{ number_format($produto->preco / 10, 2, ',', '.') }}</b></small>
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
                            <button type="button" class="btn botao-medidas btn-sm rounded-0" data-bs-toggle="modal"
                                data-bs-target="#modalTabelaMedidas">
                                <i class="bi bi-rulers me-1"></i>
                                Tabela de Medidas
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mt-3">
                            <div class="btn-group me-2" role="group" aria-label="First group">
                                <button type="button" class="btn btn-outline-secondary rounded-0 me-2">P</button>
                                <button type="button" class="btn btn-outline-secondary rounded-0 me-2">PP</button>
                                <button type="button" class="btn btn-outline-secondary rounded-0 me-2">M</button>
                                <button type="button" class="btn btn-outline-secondary rounded-0 me-2">G</button>
                                <button type="button" class="btn btn-outline-secondary rounded-0 me-2">GG</button>
                            </div>
                            <form class="mt-3" action="{{ route('carrinho.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="produto_id" value="{{ $produto->id }}">
                                <input type="hidden" name="quantidade" value="1">
                                <button class="btn botao-lilas rounded-0 fs-5" type="submit">Adicionar ao Carrinho <i
                                        class="bi bi-bag-fill"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="modalTabelaMedidas" tabindex="-1" aria-labelledby="modalTitulo" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content rounded-0 p-3">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 text-center w-100" id="modalTitulo">Tabela de Medidas</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>A tabela deve servir de guia para que você possa escolher a numeração adequada.
                            Ela não contempla a medida exata dos produtos.</p>

                        <img class="img-fluid" src="/assets/tabela-medidas.jpg" alt="">

                        <p>VEJA COMO MEDIR SEU CORPO:</p>

                        <p>BUSTO: Passe a fita métrica pelas costas e meça na altura dos mamilos.</p>

                        <p>
                            CINTURA Passe a fita métrica em volta do seu abdômen, acima do osso do quadril, na medida
                            mais fina.
                        </p>

                        <p>
                            QUADRIL Na parte mais larga do bumbum, mais ou menos na metade da altura, contorne o quadril
                            com a fita métrica.
                        </p>
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
