<x-padrao title="Novo Produto">
    <x-navbar />
    <div class="container w-50 mt-3">
        <div class="row text-center">
            <h2>Novo Produto</h2>    
        </div>
        <form action="" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" id="id" readonly value="{{$produto->id}}">
        <div class="row mb-3">
            <x-input-label for="nome" :value="__('Nome')" />
            <x-text-input id="nome" type="text" name="nome" :value="$produto->nome" required autofocus />
        </div>
        <div class="row mb-3">
            <x-input-label for="descricao" :value="__('Descrição')" />
            <x-text-input id="descricao" type="text" name="descricao" :value="$produto->descricao" required autofocus />
        </div>
        <div class="row mb-3">
            <x-input-label for="preco" :value="__('Preço')" />
            <x-text-input id="preco" type="text" name="preco" :value="$produto->preco" required autofocus />
        </div>
        <div class="row mb-3">
            <x-input-label for="categoria" :value="__('Categoria')" />
            @php
                $categorias = ['camisetas', 'calcas', 'vestidos', 'moletom', 'shorts', 'acessorios'];
            @endphp
            <select class="form-select" name="categoria" id="categoria">
                @foreach ($categorias as $categoria)
                    <option value="{{$categoria}}" {{$categoria == $produto->categoria ? 'selected' : ''}}>{{$categoria}}</option>
                @endforeach
            </select>
        </div>
        <div class="row mb-3">
            <x-input-label for="imagens" :value="__('Imagens')" />
            <x-text-input id="imagens" type="file" name="imagens[]" accept="image/gif, image/jpeg, image/png" multiple autofocus />
            
        </div>
        <div class="row mb-3">
            <button class="btn botao-lilas">Salvar</button>
        </div>
    </form>
</div>

</x-padrao>
