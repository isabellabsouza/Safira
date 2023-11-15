<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Endereços') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Aqui você pode gerenciar seus endereços.') }}
        </p>
    </header>
    @foreach ($enderecos as $endereco)
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Endereço Padrão</h5>
            <p class="card-text">Rua: {{ $endereco->logradouro }}</p>
        </div>
    </div>
    @endforeach
</section>