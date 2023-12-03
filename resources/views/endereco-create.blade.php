<x-padrao title="CadastrarEndereco">
    <x-nav-padrao />
    <div class="container mt-2">
        <div class="row">
            <div class="col col-auto">
                <sl-tooltip content="Voltar" placement="right">
                    <sl-icon-button name="arrow-left-short" label="Back" class="fs-1" onclick="window.history.back()"></sl-icon-button>
                </sl-tooltip>
            </div>
            <div class="col">
                <h1><i class="bi bi-house-add"></i> Cadastrar Endereço</h1>
            </div>
        </div>
        <div class="row mx-5 pb-3 border">
            <form action="{{ route('endereco.create') }}" method="post">
                @csrf
                <div class="row align-items-end">
                    <div class="col col-4">
                        <x-input-label for="cep" :value="__('CEP')" />
                        <x-text-input id="cep" class="block mt-1 w-full" type="text" name="cep" :value="old('cep')" required
                        autofocus maxlength="8"/>
                    </div>
                    <div class="col col-2">
                        <div class="spinner-border text-success" role="status" style="display:none;">
                            <span class="visually-hidden">Loading...</span>
                          </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-8">
                        <x-input-label for="logradouro" :value="__('Logradouro')" />
                        <x-text-input id="logradouro" class="block mt-1 w-full" type="text" name="logradouro"
                        :value="old('logradouro')" required autofocus />
                    </div>
                    <div class="col col-4">
                        <x-input-label for="numero" :value="__('Número')" />
                        <x-text-input id="numero" class="block mt-1 w-full" type="number" name="numero"
                        :value="old('numero')" required autofocus />
                    </div>
                </div>
                <div>
                    <x-input-label for="complemento" :value="__('Complemento')" />
                    <x-text-input id="complemento" class="block mt-1 w-full" type="text" name="complemento"
                        :value="old('complemento')" autofocus />
                </div>
                <div class="row">
                    <div class="col col-4">
                        <x-input-label for="bairro" :value="__('Bairro')" />
                        <x-text-input id="bairro" class="block mt-1 w-full" type="text" name="bairro" :value="old('bairro')"
                        required autofocus />
                    </div>
                    <div class="col col-4">
                        <x-input-label for="cidade" :value="__('Cidade')" />
                        <x-text-input id="cidade" class="block mt-1 w-full" type="text" name="cidade" :value="old('cidade')"
                        required autofocus />
                    </div>
                    <div class="col col-4">
                        <x-input-label for="uf" :value="__('Estado')" />
                        <x-text-input id="uf" class="block mt-1 w-full" type="text" name="uf" :value="old('uf')" required
                        autofocus />
                    </div>
                </div>
                <div class="row mt-3 mx-5">
                    <button class="btn botao-lilas">Salvar</button>
                </div>
            </form>
        </div>

    </div>
    <script>
        $("#cep").on("input", ()=>{
            let cep = $("#cep").val();
            if(cep.length == 8){
                $(".spinner-border").show();
                $.ajax({
                    url: `https://viacep.com.br/ws/${cep}/json/`,
                    type: 'GET',
                    success: (data)=>{
                        $(".spinner-border").hide();
                        if(data.erro == true){
                            alert("CEP não encontrado");
                            $("#cep").val('')
                            return;
                        }
                        $("#logradouro").val(data.logradouro);
                        $("#bairro").val(data.bairro);
                        $("#cidade").val(data.localidade);
                        $("#uf").val(data.uf);
                    }
                });
            }
        });
    </script>
</x-padrao>