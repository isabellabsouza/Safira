<x-padrao title="Meu Carrinho">
    <x-nav-padrao />
    <div class="container-flow">
        <div class="row justify-content-center m-0">
            <div class="col col-8">
                <div class="container m-3 border">
                    <div class="row">
                        <h2 class="mt-3">Meu Carrinho</h2>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            {{ $itens->count() }} produto(s) no carrinho
                        </div>
                    </div>
                    <div class="row">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" colspan="2">ITEM</th>
                                    <th scope="col" class="text-center">PREÇO</th>
                                    <th scope="col" class="text-center" style="width: 12%;">QTD</th>
                                    <th scope="col" class="text-center">TOTAL</th>
                                    <th scope="col" class="text-center"></th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($itens as $item)
                                    <tr>
                                        <td class="align-middle">
                                            @if ($item->produto->imagemProduto->isNotEmpty())
                                                <a href="{{ route('produto.show', $item->produto->id) }}">
                                                    <img height="125px;"
                                                        src="{{ asset('storage/' . $item->produto->imagemProduto->first()->caminho) }}"
                                                        alt="">
                                                </a>
                                            @else
                                                <img height="125px;" src="{{ asset('img/sem-imagem.png') }}"
                                                    alt="">
                                            @endif
                                        </td>
                                        <td>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col fs-5 text-uppercase fw-bold text-start">
                                                        {{ $item->produto->nome }}
                                                    </div>
                                                    <div class="col text-end">
                                                        <a href="{{ route('produto.show', $item->produto->id) }}">Ver
                                                            produto</a>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <hr class="m-0">
                                                </div>
                                                <div class="row text-start">
                                                    <div class="col px-3">
                                                        {{ $item->produto->descricao }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $item->produto->preco }}</td>
                                        {{-- <td>{{ $item->quantidade }}</td> --}}
                                        <td>
                                            <form method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" value="{{ $item->id }}" id="id"
                                                    name="id">
                                                <div class="btn-group" role="group">
                                                    <button type="submit" name="action" value="btnMinus"
                                                        class="btn btn-light btn-sm border w-25">&minus;</button>
                                                    <input type="text"
                                                        class="form-control form-control-sm bg-light w-50"
                                                        inputmode="numeric" value="{{ $item->quantidade }}" readonly>
                                                    <button type="submit" name="action" value="btnPlus"
                                                        class="btn btn-light btn-sm border w-25">&plus;</button>
                                                </div>
                                            </form>
                                        </td>
                                        <td>{{ number_format($item->total, 2, ',', '.') }}</td>
                                        <td>
                                            <form action="{{ route('carrinho.destroy', $item->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn btn-sm btn-link link-danger link-opacity-50-hover lh-1"><i
                                                        class="bi bi-trash3 fs-5"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col col-3 ">
                <div class="container m-3 border">
                    <div class="row text-center">
                        <h3 class="my-3">Resumo</h3>
                    </div>
                    <div class="row">
                        <div class="col fw-bold">
                            Subtotal:
                        </div>
                        <div class="col text-end">
                            R$ {{ number_format($total, 2, ',', '.') }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col fw-bold">
                            Frete:
                        </div>
                        <div class="col text-end">
                            <?php $frete = 25; ?>
                            R$ {{ number_format($frete, 2, ',', '.') }}
                        </div>
                    </div>
                    <div class="row mt-3">
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col fw-bold">
                            Total:
                        </div>
                        <div class="col text-end">
                            R$ {{ number_format($total + $frete, 2, ',', '.') }}
                        </div>
                    </div>
                    <div class="row justify-content-center mb-3">
                        <div class="col col-auto">
                            <form action="{{ route('pedido.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="valor_total" value="{{ $total }}">
                                <button class="btn btn-primary rounded-pill">Finalizar Compra</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-footer />
</x-padrao>
