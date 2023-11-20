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
                        <td>{{ $item->produto_id }}</td>
                        <td>{{}}</td>
                        <td></td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <x-footer />
</x-padrao>