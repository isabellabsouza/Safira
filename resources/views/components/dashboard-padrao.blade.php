<x-padrao title="Painel de Controle">
    <x-nav-padrao />

    <div class="container-fluid">
        <div class="row">
            <div class="col col-auto ps-0 d-flex">
                <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px; min-height:94vh;">
                    <a href="/"
                        class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-4">Administração Safira</span>
                    </a>
                    <hr>
                    @php
                    $route = Route::currentRouteName();
                    @endphp
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li>
                            <a href="{{ route('dashboard.usuarios') }}"
                                class="nav-link text-white {{ $route == 'dashboard.usuarios' ? 'active' : ''}}">
                                <i class="bi bi-people"></i>&nbsp;&nbsp;
                                Usuários
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('dashboard.pedidos')}}"
                                class="nav-link text-white {{ $route == 'dashboard.pedidos' ? 'active' : ''}}">
                                <i class="bi bi-journal-text"></i>&nbsp;&nbsp;
                                Pedidos
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('dashboard.produtos')}}"
                                class="nav-link text-white {{ $route == 'dashboard.produtos' ? 'active' : ''}}">
                                <i class="bi bi-box2"></i>&nbsp;&nbsp;
                                Produtos
                            </a>
                        </li>
                    </ul>
                    <hr>
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                            id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle fs-4"></i>&nbsp;&nbsp;&nbsp;
                            <strong>{{ Auth::user()->name}}</strong>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow rounded-0" aria-labelledby="dropdownUser1">
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
                    </div>
                </div>
            </div>
            <div class="col">
                {{ $slot }}
            </div>


        </div>
    </div>

</x-padrao>