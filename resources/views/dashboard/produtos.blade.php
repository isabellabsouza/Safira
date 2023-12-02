<x-dashboard-padrao>
    <a class="btn btn-primary" href="{{ route('produto.create') }}">Novo Produto</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nome</th>
                <th scope="col">Preço</th>
                <th scope="col">Categoria</th>
                <th scope="col">Status</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produtos as $produto)
                <tr>
                    <td scope="row">{{ $produto->id }}</td>
                    <td>
                        <a data-bs-toggle="collapse" href="#collapse{{ $produto->id }}" role="button"
                            aria-expanded="false" aria-controls="collapse{{ $produto->id }}">
                            {{ $produto->nome }}
                        </a>
                    </td>
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

                    </td>
                </tr>
                <tr>
                    <td colspan="7" class="border-bottom-0">
                        <div class="collapse" id="collapse{{ $produto->id }}">
                            <div class="card card-body">
                                <h5 class="card-title">Estoque</h5>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col">PP</th>
                                            <th scope="col">P</th>
                                            <th scope="col">M</th>
                                            <th scope="col">G</th>
                                            <th scope="col">GG</th>
                                            <th scope="col">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td scope="row">Quantidade</td>
                                            @foreach (['PP', 'P', 'M', 'G', 'GG'] as $tamanho)
                                                <td>{{ $produto->estoque->firstWhere('tamanho', $tamanho)->quantidade ?? 0 }}
                                                </td>
                                            @endforeach
                                            <td>
                                                <a class="btn btn-primary" href="#">Editar</a>
                                                <a class="btn btn-danger" href="#">Excluir</a>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                                <button class="btn btn-primary">Atualizar Estoque</button>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-dashboard-padrao>
