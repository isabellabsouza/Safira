<x-perfil.perfil-padrao>
    <a class="btn btn-primary" href="{{ route('endereco.create') }}">Cadastrar novo endereço</a>
    @php
        $i=1;
    @endphp
    @foreach ($enderecos as $endereco)
    <div class="card mt-3">
        <div class="card-body">
            <h5 class="card-title">Endereço {{$i++}}</h5>
            <p class="card-text">Rua: {{ $endereco->logradouro }}</p>
            {{-- <p class="card-text">CEP: {{ $endereco->cep }}</p>
            <p class="card-text">Bairro: {{ $endereco->bairro }}</p>
            <p class="card-text">Cidade: {{ $endereco->cidade }}</p> --}}
        </div>
    </div>
    @endforeach
</x-perfil.perfil-padrao>