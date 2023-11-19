<x-padrao title="Novo Produto">
    <x-navbar />

    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <x-input-label for="nome" :value="__('Nome')" />
            <x-text-input id="nome" type="text" name="nome" :value="old('nome')" required autofocus />
        </div>
        <div>
            <x-input-label for="descricao" :value="__('Descrição')" />
            <x-text-input id="descricao" type="text" name="descricao" :value="old('descricao')" required autofocus />
        </div>
        <div>
            <x-input-label for="preco" :value="__('Preço')" />
            <x-text-input id="preco" type="number" name="preco" :value="old('preco')" required autofocus />
        </div>
        <div>
            <x-input-label for="categoria" :value="__('Categoria')" />
            <x-text-input id="categoria" type="text" name="categoria" :value="old('categoria')"  autofocus />
        </div>
        <div>
            <x-input-label for="imagens" :value="__('Imagens')" />
            <x-text-input id="imagens" type="file" name="imagens[]" accept="image/gif, image/jpeg, image/png" multiple autofocus />
            
        </div>

        <button class="btn btn-primary">Salvar</button>
    </form>
</x-padrao>
