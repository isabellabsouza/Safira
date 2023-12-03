<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div class="row mt-3">
    <div class="col">
        <label for="" class="form-label">Nome Completo</label>
        <input form="dadosPedido" type="text" class="form-control" name="nome" id="nome">
    </div>
    <div class="col">
        <label for="" class="form-label">CPF</label>
        <input form="dadosPedido" type="text" class="form-control cpf" name="cpf" id="cpf"
        placeholder="000.000.000-00">
    </div>
</div>
<div class="row">
    <div class="col col-6">
        <label for="" class="form-label">Telefone para Contato</label>
        <input form="dadosPedido" type="text" class="form-control telefone" name="telefone" id="telefone" 
        placeholder="(00) 000000-0000">
    </div>
</div>

@if($formaPagamento == 'cartao')
<div class="row mt-3">
    <h4>Cartão de Crédito</h4>
</div>
<div class="row mt-2">
    <div class="col">
        <label for="" class="form-label">Nome no Cartão</label>
        <input form="dadosPedido" type="text" class="form-control" name="nomeCartão" id="nomeCartão">
    </div>
</div>
<div class="row mt-2">
    <div class="col col-8">
        <label for="" class="form-label">Número do Cartão</label>
        <input form="dadosPedido" type="text" class="form-control cartao" name="numero" id="numero">
    </div>
    <div class="col col-4">
        <label for="" class="form-label">CVV</label>
        <input form="dadosPedido" type="text" class="form-control cvv" name="cvv" id="cvv"
        placeholder="000">
    </div>  
</div>
<div class="row mt-2">
    <div class="col col-4">
        <label for="" class="form-label">Parcelas</label>
        <select form="dadosPedido" class="form-select" name="parcelas" id="parcelas">
            <option value="1" selected>1x Sem juros</option>
            @for($i = 2; $i <= 10; $i++)
            <option value="{{$i}}">{{ $i }}x Sem juros</option>
            @endfor
            @for ($i = 11; $i <= 12; $i++)
            <option value="{{$i}}">{{ $i }}x Com juros</option>
            @endfor
        </select>    
    </div>
    <div class="col col-4 align-self-end">
    </div>
    <div class="col col-4">
        <label for="" class="form-label">Data de Validade</label>
        <input form="dadosPedido" type="text" class="form-control venc" name="validade" id="validade" placeholder="mm/aa">    
    </div>
</div>


@elseif($formaPagamento == 'boleto')
<div class="row mt-3">
    <h4>Boleto</h4>
</div>
<div class="row">
    <div class="col">
        <p>Por favor, clique no botão abaixo para gerar o boleto</p>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col col-auto">
        <a href="#" class="btn btn-lg btn-success">Gerar Boleto</a>
    </div>
</div>

@elseif($formaPagamento == 'pix')
<div class="row mt-3">
    <h4>Pix</h4>
</div>
<div class="row">
    <div class="row">
        <p>Por favor, escaneie o código abaixo com o seu aplicativo de pagamento</p>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col col-auto">
        <img src="data:image/png;base64,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"
        alt="QR Code" 
        class="img-fluid"
        height="200px">
    </div>
</div>
@endif