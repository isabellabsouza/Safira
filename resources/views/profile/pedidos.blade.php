<x-perfil.perfil-padrao>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Pedido</th>
                <th scope="col">Valor</th>
                <th scope="col">Status</th>
                <th scope="col">Data</th>
                <th scope="col">Detalhes</th>
            </tr>
        </thead>
        <tbody>
           
                @foreach ($pedidos as $pedido)
                <tr>
                    <td>{{ $pedido->id }}</td>
                    <td>R$ {{ number_format($pedido->valor_total, 2, ",", ".") }}</td>
                    <td>{{ $pedido->status }}</td>
                    <td>{{ $pedido->created_at }}</td>
                    <td><a href="{{ route('pedido.show', $pedido->id) }}">Ver detalhes</a></td>
                </tr>
                @endforeach
            
        </tbody>
    </table>
</x-perfil.perfil-padrao>