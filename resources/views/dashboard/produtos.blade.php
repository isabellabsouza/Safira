<x-dashboard-padrao>
    <a class="btn btn-primary" href="{{ route('produto.create') }}">Novo Produto</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nome</th>
                <th scope="col">Preço</th>
                <th scope="col">Descrição</th>
                <th scope="col">Categoria</th>
                <th scope="col">Status</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produtos as $produto)
                <tr>
                    <th scope="row">{{ $produto->id }}</th>
                    <th>{{ $produto->nome }}</th>
                    <td>{{ $produto->preco }}</td>
                    <td>{{ $produto->descricao }}</td>
                    <td>{{ $produto->categoria }}</td>
                    <td>{{ $produto->status }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('produto.edit', $produto->id) }}">Editar</a>
                        @if ($produto->status == 'ativo')
                            <form action="{{ route('produto.status', $produto->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-danger" type="submit">Inativar</button>
                            </form>
                        @else
                            <form action="{{ route('produto.status', $produto->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-success">Ativar</button>
                            </form>
                        @endif
                        {{-- <form action="{{ route('produto.destroy', $produto->id) }}" method="POST">
                        @csrf
                        <button class="btn btn-danger">Inativar</button>
                    </form> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-dashboard-padrao>
