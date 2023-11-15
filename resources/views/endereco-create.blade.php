<x-padrao title="CadastrarEndereco">
    <form action="{{ route('endereco.create') }}" method="post">
        @csrf
        <div>
            <x-input-label for="cep" :value="__('CEP')" />
            <x-text-input id="cep" class="block mt-1 w-full" type="text" name="cep" :value="old('cep')" required
                autofocus />
        </div>

        <div>
            <x-input-label for="logradouro" :value="__('Logradouro')" />
            <x-text-input id="logradouro" class="block mt-1 w-full" type="text" name="logradouro" :value="old('logradouro')"
                required autofocus />
        </div>
        <div>
            <x-input-label for="complemento" :value="__('Complemento')" />
            <x-text-input id="complemento" class="block mt-1 w-full" type="text" name="complemento" :value="old('complemento')"
                autofocus />
        </div>
        <div>
            <x-input-label for="numero" :value="__('Número')" />
            <x-text-input id="numero" class="block mt-1 w-full" type="number" name="numero" :value="old('numero')"
                required autofocus />
        </div>
        <div>
            <x-input-label for="bairro" :value="__('Bairro')" />
            <x-text-input id="bairro" class="block mt-1 w-full" type="text" name="bairro" :value="old('bairro')"
                required autofocus />
        </div>
        <div>
            <x-input-label for="cidade" :value="__('Cidade')" />
            <x-text-input id="cidade" class="block mt-1 w-full" type="text" name="cidade" :value="old('cidade')"
                required autofocus />
        </div>
        <div>
            <x-input-label for="uf" :value="__('Estado')" />
            <x-text-input id="uf" class="block mt-1 w-full" type="text" name="uf" :value="old('uf')"
                required autofocus />
        </div>

        <button class="btn btn-primary">Salvar</button>
    </form>

</x-padrao>
