<x-dashboard-padrao>
    <h5>Status</h5>
    <div class="btn-group mt-3" role="group" aria-label="First group">
        <button type="button" class="btn btn-outline-secondary">Aguardando Pagamento</button>
        <button type="button" class="btn btn-outline-secondary">Preparação</button>
        <button type="button" class="btn btn-outline-secondary">3</button>
        <button type="button" class="btn btn-outline-secondary">4</button>
      </div>
    <table class="table">
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
                <td>{{ $pedido->valor_total }}</td>
                <td>{{ $pedido->status }}</td>
                <td><a href="{{ route('pedido.show', $pedido->id) }}">Ver Detalhes</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-dashboard-padrao>