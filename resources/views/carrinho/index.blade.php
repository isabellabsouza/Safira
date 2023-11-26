<x-padrao title="Meu Carrinho">
    <x-nav-padrao />

    <div class="container text-center mt-3">
        <h2 class="my-3">Meu Carrinho</h2>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">PRODUTO</th>
                    <th scope="col">PREÇO</th>
                    <th scope="col">QUANTIDADE</th>
                    <th scope="col">TOTAL</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($itens as $item)
                    <tr>
                        <td>{{ $item->produto->nome }}</td>
                        <td>{{ $item->produto->preco }}</td>
                        <td>{{ $item->quantidade }}</td>
                        <td>{{ $item->total }}</td>
                        <td>
                            <form action="{{ route('carrinho.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Remover</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        TOTAL: R$ {{ $total }}

        <button class="btn btn-primary">Finalizar Compra</button>
    </div>
    <x-footer />
</x-padrao>