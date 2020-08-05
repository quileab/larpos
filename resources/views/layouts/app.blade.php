<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- CDN Sweetalert2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha256-KsRuvuRtUVvobe66OFtOQfjP8WA2SzYsmm4VPfMnxms=" crossorigin="anonymous"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/qb-swal-deleteconfirm.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/{{ session('theme', 'superhero') }}/bootstrap.min.css" rel="stylesheet">
    <!--link href="{{ asset('css/app.css') }}" rel="stylesheet"-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    @livewireStyles
</head>
<style>
    a{
        text-decoration: none !important;
    }
    a.side,
    a.side:hover {
        text-decoration: none;
        display: block;
        padding: 0.5rem;
        width: 200px;
        overflow: hidden;
    }

    .tag {
        display: inline-flex;
    }

    .narrowside {
        width: 40px;
        transition: width 2s;
    }

    nav i {
        width: 32px;
        text-align: center;
    }

    .avatar {
        vertical-align: middle;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: inline;
    }
</style>

<body>
    <!-- div id="app" -->
    <div>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container-fluid">
                <!--a class="btn btn-dark" data-toggle="collapse" href="#sidebar" role="button" aria-expanded="false" aria-controls="sidebar"-->
                <!--button class="btn btn-outline-dark" onclick="document.getElementById('sidebar').classList.toggle('narrowside');"><i class="fas fa-ellipsis-v"></i></button-->
                <a href="#" onclick="document.getElementById('sidebar').classList.toggle('narrowside');"><i class="fas fa-ellipsis-v"></i></a>
                &nbsp;
                </a>
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                    &nbsp;

                </a>

                @auth
                <i class="pr-2 fas fa-warehouse text-warning"></i>
                {{ Auth::user()->warehouse->name }}

                @if (Session::has('WH'))
                <a href="{{ route('waredeselect') }}">
                    <i class="fas fa-random text-warning"></i></a>
                {{{ Session::get('warehouse') }}}&nbsp;({{{ Session::get('WH') }}})
                @endif

                @if (Session::has('clientid'))
                <a href="{{ route('clients.deselect') }}">
                    <i class="pl-2 fas fa-user-times text-warning"></i></a>
                {{{ Session::get('clientname')}}} ({{{ Session::get('clientid')}}})
                @endif
                @endauth

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('auth.Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('auth.Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <img class="avatar" src="{{ Auth::user()->avatarUrl() }}">&nbsp;
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                @can('manage-users')
                                <a class="dropdown-item" href="{{ route('admin.users.index') }}">
                                    User Management
                                </a>
                                @endcan

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="container-fluid">
            @include('layouts\sidebar')
            @include('partials.alerts')
            <div class="content">
                @yield('content')
            </div>
        </main>
    </div>
    @include('sweetalert::alert')
    @livewireScripts
    <script>
        window.livewire.on('swal', message => {
            // OK swal("No encontrado","Verifique el código de barras","warning");
            swal({
                position: 'top-end',
                icon: 'warning',
                title: message
            });
        });
    </script>
</body>

</html>