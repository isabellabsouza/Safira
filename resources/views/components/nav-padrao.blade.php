<nav class="navbar navbar-expand-md bg-black navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand " href="{{ route('home') }}">
            <h1 class="m-0"><img class="d-block" width="90" src="assets/logo-azul.png" alt="Logo da loja Safira">
            </h1>
        </a>
        {{ $slot }}
    </div>
</nav>