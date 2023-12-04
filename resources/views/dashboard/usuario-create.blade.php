<x-padrao title="Novo Usuário">
    <x-navbar />
    <div class="container w-50 mt-3">
        <div class="row text-center">
            <h2>Novo Usuário do Sistema</h2>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            
            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Nome')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                    autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Senha')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirmar Senha')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
            
            <div class="mt-4">
                <x-input-label for="role" :value="__('Perfil')" />
                <x-text-input id="role" class="block mt-1 w-full" type="text" name="role" value="admin" required
                    disabled autocomplete="role" />
            </div>
            
            <div class="row mb-3 mt-4 mx-1">
                <button class="btn botao-lilas">Salvar</button>
            </div>

        </form>
    </div>

</x-padrao>