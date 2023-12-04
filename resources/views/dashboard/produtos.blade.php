<x-dashboard-padrao>
    <a class="btn btn-primary float-end mt-3" href="{{ route('produto.create') }}">Novo Produto</a>
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
                    <td scope="row">{{ $produto->id }}</td>
                    <td>
                        <a data-bs-toggle="collapse" href="#collapse{{ $produto->id }}" role="button"
                            aria-expanded="false" aria-controls="collapse{{ $produto->id }}">
                            {{ $produto->nome }}
                        </a>
                    </td>
                    <td>{{ $produto->preco }}</td>
                    <td>{{ $produto->descricao }}</td>
                    <td class="text-capitalize">{{ $produto->categoria }}</td>
                    <td>{{ strtoupper($produto->status) }}</td>
                    <td>
                        <a class="btn btn-primary mb-2" href="{{ route('produto.edit', $produto->id) }}" title="Editar Produto">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        
                        <a class="btn btn-secondary mb-2" title="Gerenciar Estoque" data-bs-toggle="collapse" href="#collapse{{ $produto->id }}" role="button"
                            aria-expanded="false" aria-controls="collapse{{ $produto->id }}">
                            <i class="bi bi-box-seam"></i>
                        </a>
                        @if ($produto->status == 'ativo')
                            <form action="{{ route('produto.status', $produto->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-danger" type="submit" title="Inativar Produto">
                                    <i class="bi bi-pause-circle"></i>
                                </button>
                            </form>
                        @else
                            <form action="{{ route('produto.status', $produto->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-success" title="Ativar Produto">
                                    <i class="bi bi-play-circle"></i>
                                </button>
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
                                        <tr class="text-center">
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
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <button type="submit" name="action" value="btnMinus"
                                                            class="btn btn-light btn-sm border"
                                                            onclick="minus(this)"
                                                            >&minus;</button>
                                                        <input type="text" 
                                                            class="form-control form-control-sm bg-light w-25"
                                                            inputmode="numeric" 
                                                            value="{{ $produto->estoque->firstWhere('tamanho', $tamanho)->quantidade ?? 0 }}" 
                                                            readonly>
                                                        <button type="submit" name="action" value="btnPlus"
                                                            class="btn btn-light btn-sm border"
                                                            onclick="plus(this)"
                                                            >&plus;</button>
                                                    </div>
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
    <script>
        function minus(button) {
            var val = button.parentNode.querySelector('input[inputmode=numeric]').value;
            if(val > 0){
                button.parentNode.querySelector('input[inputmode=numeric]').value--;
            }
        }

        function plus(button) {
            button.parentNode.querySelector('input[inputmode=numeric]').value++;
        }
    </script>
</x-dashboard-padrao>
