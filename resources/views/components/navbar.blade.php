<x-nav-padrao>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Lojas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Novidades</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Promoção</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2 rounded-0" type="search" placeholder="Pesquisa" aria-label="Search">
                <button class="btn btn-outline-light rounded-0" type="submit">Buscar</button>
            </form>

            <ul class="navbar-nav ms-3">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('carrinho.index') }}"><i class="bi bi-bag-fill fs-4"></i></a>
                </li>
            </ul>

            <ul class="navbar-nav justify-content ms-3">

                @if (Route::has('login'))

                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle bg-black" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end bg-dark rounded-0">
                                <li>
                                    <a class="dropdown-item text-bg-dark" href="{{ route('profile.pedidos') }}">Perfil</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider bg-white" />
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a class="dropdown-item text-bg-dark" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </a>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Cadastre-se</a>
                            </li>
                        @endif
                    @endauth

                @endif
            </ul>
        </div>
</x-nav-padrao>
