<x-dashboard-padrao>
    <button class="btn btn-primary">Novo Usuário</button>
    <h5>Quantidade de clientes cadastrados: {{ $qtdClientes }}</h5>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Perfil</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
            <tr>
                <th scope="row">{{ $usuario->name }}</th>
                <td>{{ $usuario->email }}</td>
                <td>{{ $usuario->role }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-dashboard-padrao>