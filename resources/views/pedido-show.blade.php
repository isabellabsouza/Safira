<x-padrao title="Detalhes do Pedido">
    <x-navbar />
    <div class="container">
        <div class="row justify-content-center mt-3">
            <div class="col col-2">
                <button type="button" class="btn btn-warning" onclick="window.history.back()">
                    <i class="bi bi-arrow-left"></i>
                    &nbsp;Voltar
                </button>
            </div>
            <div class="col col-8 text-center">
                <h4>Pedido {{$pedido->numero}}</h4>
            </div>
            <div class="col col-2">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col col-auto">
                <p>Status: <b>{{$pedido->status}}</b></p>
            </div>
        </div>
        <div class="row">
            <table class="table table-hover">
                <thead>
                    <th style="width:50%" colspan="2">Produto</th>
                    <th class="text-center" style="width:10%">Quantidade</th>
                    <th class="text-center" style="width:20%">Valor Unitário</th>
                    <th class="text-center" style="width:20%">Valor Total</th>
                </thead>
                <tbody>
                    @php
                        $total = 0;
                    @endphp
                    @foreach ($itens_pedido as $item)
                    <tr style="cursor:pointer;" onclick="window.location.href = '{{route('produto.show', $item->id)}}'">
                        <td style="width: 10%;">
                            @if ($item->caminho != '')
                            <img height="125px;" src="{{ asset('storage/' . $item->caminho) }}" alt="">
                            @else
                            <img height="125px;" src="{{ asset('img/sem-imagem.png') }}" alt="">
                            @endif
                        </td>
                        <td>
                            <div>   
                                <div class="row">
                                    {{$item->nome}}
                                </div>
                                <div class="row">
                                    {{substr($item->descricao, 0, 100)}}
                                    {{(strlen($item->descricao) > 100) ? '...' : ''}}
                                </div>
                            </div>
                        </td>
                        <td class="text-center">{{$item->quantidade}}</td>
                        <td class="text-center">R$ {{number_format($item->preco, 2, ",", ".")}}</td>
                        <td class="text-center">R$ {{number_format($item->preco * $item->quantidade, 2, ",", ".")}}</td>
                        @php
                            $total += $item->preco * $item->quantidade;
                        @endphp
                    </tr>
                    @endforeach
                    <tr class="table-secondary">
                        <td colspan="4" class="text-end">Total:</td>
                        <td class="text-center fw-bold">R$ {{number_format($total, 2, ",", ".")}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <x-footer />
</x-padrao>