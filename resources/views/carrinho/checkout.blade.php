<x-padrao title="Checkout">
    <x-nav-padrao />
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="mt-3">Checkout</h2>
            </div>
        </div>
        <x-divider />
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col">
                        <h5>Forma de Pagamento</h5>
                        <script>
                            console.log("{{$formaPagamento}}");
                        </script>
                        <form method="post" id="formFormaPagamento">
                            @csrf
                            <input type="hidden" name="inputFormaPagamento" id="inputFormaPagamento" value="{{$formaPagamento}}">
                        </form>
                        <sl-radio-group name="formaPagamento" id="formaPagamento" value="{{$formaPagamento}}">
                            <sl-radio-button value="cartao" >
                                <i class="bi bi-credit-card"></i>
                                &nbsp;&nbsp;Cartao
                            </sl-radio-button>
                            <sl-radio-button value="boleto">
                                <i class="bi bi-upc fs-5"></i>
                                &nbsp;&nbsp;Boleto
                            </sl-radio-button>
                            <sl-radio-button value="pix">
                                <i class="bi bi-cash"></i>
                                &nbsp;&nbsp;Pix
                            </sl-radio-button>
                        </sl-radio-group>
                    </div>
                </div>
                
                    <x-dados-pagamento :formaPagamento=$formaPagamento />
                <div class="row mt-3">
                    <div class="col">
                        <h5>Endereço de Entrega
                            <a href="{{route('endereco.create')}}" class="btn btn-sm btn-primary float-end">Novo
                                Endereço</a>
                        </h5>
                        @if(count($enderecos) == 0)
                        <div class="row">
                            <div class="col">
                                <p class="text-center">Nenhum endereço cadastrado!<br>
                                    <a class="btn btn-outline-success" href="{{route('endereco.create')}}">Clique aqui para cadastrar um novo endereço</a>
                                </p>
                            </div>
                        </div>
                        @endif
                        @foreach ($enderecos as $endereco)
                        <div class="row">
                            <div class="col col-auto">
                                <input type="radio" name="enderecoRadio" id="enderecoRadio" value="{{$endereco->id}}">
                            </div>
                            <div class="col col-11">
                                <div class="row">
                                    <div class="col col-auto">
                                        <i class="bi bi-geo-alt-fill"></i>
                                    </div>
                                    <div class="col col-10">
                                        <div class="row">
                                            <div class="col">
                                                <b>{{$endereco->logradouro}}, {{$endereco->numero}}</b>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                {{$endereco->bairro}}, {{$endereco->cidade}} - {{$endereco->uf}}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                {{$endereco->cep}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col col-4 ms-5">
                <div class="row">
                    <h4>Resumo do Pedido:</h4>
                    <x-divider />
                    <table class="table table-sm table-striped">
                        <thead class="text-center">
                            <th class="text-start">Produto</th>
                            <th>Valor Unitário</th>
                            <th>Quantidade</th>
                            <th>Valor Total</th>
                        </thead>
                        <tbody>
                            @php
                                $total = 0;
                            @endphp
                            @foreach ($carrinho as $item)
                            <tr class="text-center">
                                <td class="text-start">{{$item->produto->nome}}</td>
                                <td>R$ {{number_format($item->produto->preco, 2, ",", ".")}}</td>
                                <td>{{$item->quantidade}}</td>
                                <td>R$ {{number_format($item->quantidade * $item->produto->preco, 2, ",", ".")}}</td>
                            </tr>    
                            @php
                                $total += $item->quantidade * $item->produto->preco;
                            @endphp
                            @endforeach
                            <tr class="table-group-divider">
                                <td colspan="3" class="text-end">Subtotal:</td>
                                <td class="text-center">R$ {{number_format($total, 2, ",", ".")}}</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-end">Frete:</td>
                                <td class="text-center">R$ {{number_format($frete, 2, ",", ".")}}</td>
                            </tr>
                            <tr class="table-primary fw-bold">
                                <td colspan="3" class="text-end">Total:</td>
                                <td class="text-center">R$ {{number_format($total + $frete, 2, ",", ".")}}</td>
                            </tr>
                        </tbody>
                    </table>    
                </div>
                <div class="row">
                    <form id="dadosPedido" action="{{ route('pedido.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="valor_total" value="{{ $total }}">
                        <input type="hidden" name="frete" value="25">
                        <input type="hidden" name="endereco" id="endereco" value="">
                        <input type="hidden" name="total" value="{{$total + $frete}}">
                        <button class="btn btn-primary float-end">Finalizar Compra</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $("input[name='enderecoRadio']").on("change", function() {
            var endereco = document.querySelector('input[name="enderecoRadio"]:checked').value;
            $("#endereco").val(endereco);
        });

        $("#formaPagamento").on("sl-change", function() {
            $("#inputFormaPagamento").val($("#formaPagamento").val());
            console.log($("#inputFormaPagamento").val());
            $("#formFormaPagamento").submit();
        });

        $(document).ready(function(){
            $('.cpf').mask('000.000.000-00', {reverse: true});
            $('.telefone').mask('(00) 00000-0000');
            $('.venc').mask('00/00');
            $('.cvv').mask('000');
            $('.cartao').mask('0000 0000 0000 0000');
        });

    </script>
</x-padrao>