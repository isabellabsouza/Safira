<x-dashboard-padrao>
    <div class="d-flex">

        <h5 class="mt-4">Status: </h5>
        <div class="btn-group mt-3" role="group" aria-label="First group">&nbsp;&nbsp;&nbsp;
            <button type="button" class="btn btn-sm btn-outline-primary active">Aguardando Pagamento</button>
            <button type="button" class="btn btn-sm btn-outline-primary">Pagamento confirmado</button>
            <button type="button" class="btn btn-sm btn-outline-primary">Em separação</button>
            <button type="button" class="btn btn-sm btn-outline-primary">Em transporte</button>
            <button type="button" class="btn btn-sm btn-outline-primary">Entregue</button>
            <button type="button" class="btn btn-sm btn-outline-primary">Cancelado</button>
        </div>
    </div>
    <table class="table mt-4">
        <thead>
            <tr>
                <th scope="col">Pedido</th>
                <th scope="col">Cliente</th>
                <th scope="col">Valor Total</th>
                <th scope="col">Status</th>
                <th scope="col">Detalhes</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pedidos as $pedido)
                <tr>
                    <th scope="row">{{ $pedido->id }}</th>
                    <td>{{ $pedido->user->name }}</td>
                    <td>R$ {{ number_format($pedido->valor_total, 2, ',', '.') }}</td>
                    <td>{{ $pedido->status }}</td>
                    <td><a href="{{ route('pedido.show', $pedido->id) }}">Ver Detalhes</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-dashboard-padrao>
