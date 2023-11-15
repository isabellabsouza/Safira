<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

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
        </div>
    </div>
</x-app-layout>
