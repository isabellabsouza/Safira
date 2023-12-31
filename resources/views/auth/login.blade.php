<x-padrao title="Login">
    <x-nav-padrao />
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    
    <div class="container mt-5 w-25 border rounded-0 shadow p-4 border">
        <div class="row mb-3">
            <div class="col">
                <h3 class="text-center">Login</h3>
            </div>
        </div>
        <form class="" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="row justify-content-center">
                <div class="col col-3">
                    <x-input-label class="" for="email" :value="__('Email')" />
                </div>
                <div class="col col-9">
                    <x-text-input id="email" class="" type="email" name="email" :value="old('email')" required autofocus
                        autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
            </div>
            <div class="row justify-content-center mt-2">
                <div class="col col-3">
                    <x-input-label for="password" :value="__('Senha')" />
                </div>
                <div class="col col-9">
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
            </div>
            <div class="row justify-content-center mt-2">
                <div class="col col-12 text-end">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                            name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Lembrar') }}</span>
                    </label>
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col col-7">
                    @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('password.request') }}">
                        {{ __('Esqueceu sua senha?') }}
                    </a>
                    @endif
                </div>
                <div class="col col-5 text-end">
                    <button class="btn botao-lilas rounded-0">Login</button>
                </div>
            </div>
        </form>
    </div>
    <div class="container w-25 border rounded-0 shadow p-4 mt-3">
        <div class="row">
            <div class="col">
                <h5 class="text-center">Ainda não tem uma conta?</h5>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="{{ route('register') }}" class="btn botao-lilas w-100 rounded-0 mt-1">Cadastre-se</a>
            </div>
        </div>
    </div>
</x-padrao>