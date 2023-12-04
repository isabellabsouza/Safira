<x-dashboard-padrao>
    <a class="btn btn-primary mt-3" href="{{ route('dashboard.novoAdmin')}}">Novo Usuário</a>
    <h5 class="mt-3">Quantidade de clientes cadastrados: <b>{{ $qtdClientes }}</b></h5>
    <table id="admin-table" class="table">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Perfil</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admins as $admin)
            <tr>
                <th scope="row">{{ $admin->name }}</th>
                <td>{{ $admin->email }}</td>
                <td>{{ $admin->role }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <table id="users-table" class="table">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Perfil</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-dashboard-padrao>