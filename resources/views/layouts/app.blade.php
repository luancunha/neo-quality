<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/all.js') }}" defer></script>
    <script src="{{ asset('js/sidebars.js') }}" defer></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sidebars.css') }}" rel="stylesheet">

    <style>
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
        }

    </style>

</head>

<body>

    @auth
        <header class="navbar sticky-top flex-md-nowrap p-0 shadow">

            <span class="navbar-brand col-md-3 col-lg-2 text-center p-2" style="color: #0d6efd;">
                <span style="font-size: 1.5em; font-weight: bold;">Neo Quality</span>
            </span>

            <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="dropdown px-5">
                <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle text-dark"
                    id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user me-2" style="height: 1.5em;"></i>
                    @if ($fristname = collect(explode(' ', Auth::user()->name))->slice(0, 1)->implode(' '))
                        {{ $fristname }}
                    @endif
                </a>
                <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                    <li><a class="dropdown-item" href="#"><i class="fas fa-pen me-2"></i>Perfil</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt me-2"></i>{{ __('Sair') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>

            </div>

        </header>

        <div id="app">
            <div class="container-fluid">
                <div class="row">

                    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                        <div class="d-flex flex-column flex-shrink-0 p-3 bg-light"
                            style="box-shadow: inset -1px 0 0 rgb(0 0 0 / 10%);">

                            <ul class="nav nav-pills flex-column mb-auto">
                                <li class="nav-item">
                                    <a href="/home" class="nav-link link-dark {{ (request()->is('home*')) ? 'active' : '' }}">
                                        <i class="fas fa-house-chimney bi me-2"></i>
                                        Painel
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link link-dark {{ (request()->is('indicadores*')) ? 'active' : '' }}">
                                        <i class="fas fa-address-card bi me-2"></i>
                                        Indicadores
                                    </a>
                                    <ul style="list-style-type: none; margin: 0; padding-left: 1em;">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link link-dark {{ (request()->is('estruturas*')) ? 'active' : '' }}">
                                                <i class="fas fa-clinic-medical bi me-2"></i>
                                                Estrutura
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ url('/internacoes') }}" class="nav-link link-dark {{ (request()->is('internacoes*')) ? 'active' : '' }}">
                                                <i class="fas fa-clipboard-list bi me-2"></i>
                                                Internação
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#" class="nav-link link-dark {{ (request()->is('relatorios*')) ? 'active' : '' }}">
                                        <i class="fas fa-chart-pie bi me-2"></i>
                                        Relatórios
                                    </a>
                                </li>
                                @if (Auth::user()->name == 'admin')
                                    <li>
                                        <a href="{{ url('/usuarios') }}" class="nav-link link-dark {{ (request()->is('usuarios*')) ? 'active' : '' }}">
                                            <i class="fas fa-users bi me-2"></i>
                                            Usuários
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>

                    </nav>
                    <main class="py-4">
                        <div class="col-md-3 col-lg-2">
                        </div>
                        <div class="container" style="overflow: auto; margin-bottom: 6em">

                            @yield('content')

                        </div>

                    </main>
                    <footer class="footer mt-auto bg-light">
                        <p class="text-center text-muted border-top pt-3" style="margin-left: 14em;">© 2022 - Luan Cunha</p>
                    </footer>

                </div>
            </div>

        </div>
    @else
        <main class="py-4">
            @yield('content')
        </main>
    @endauth

</body>

</html>
