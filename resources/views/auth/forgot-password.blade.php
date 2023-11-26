<x-padrao title="Esqueceu sua senha?">
    <x-nav-padrao />
    <div class="container mt-5 w-25 border rounded shadow p-4">
    <h3 class="text-center">Esqueceu sua senha?</h3>
    <div class="mb-4">
        {{ __('Esqueceu sua senha? Preencha com o seu e-mail e utilize o link enviado para criar uma nova!') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="row mt-4">
            <x-primary-button>
                {{ __('Enviar link') }}
            </x-primary-button>
        </div>
    </form>
    </div>
</x-padrao>