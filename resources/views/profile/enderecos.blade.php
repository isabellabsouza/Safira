<x-perfil.perfil-padrao>
    <a class="btn btn-primary" href="{{ route('endereco.create') }}">Cadastrar novo endereço</a>
    @foreach ($enderecos as $endereco)
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Endereço Padrão</h5>
            <p class="card-text">Rua: {{ $endereco->logradouro }}</p>
        </div>
    </div>
    @endforeach
</x-perfil.perfil-padrao>