<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <title>{{ config('app.name', 'Documents Rapide Ci en ligne') }}</title>
    <link rel="stylesheet" href="{{asset('ressources/libs/bootstrap-icons/font/bootstrap-icons.min.css')}}">
    <link rel="stylesheet" href="{{asset('ressources/libs/simplebar/dist/simplebar.min.css')}}">
    <link rel="stylesheet" href="{{asset('ressources/css/theme.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @livewireStyles
    <link rel="stylesheet" href="{{asset('bootstrap-icons.min.css')}}">

</head>
<body>
    <div id="app">
    @can('manager_general')
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid px-0">
            <div class="d-flex">
                <a class="navbar-brand" href="/" >
                    <img src="{{asset('logo.png')}}" alt="KGS INFORMATIQUE" style="height:30px;"></a>

            </div>
            <div class="order-lg-3">
                <div class="d-flex align-items-center">
                    <!-- Button -->
                    <button class="navbar-toggler collapsed ms-2 ms-lg-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar top-bar mt-0"></span>
                        <span class="icon-bar middle-bar"></span>
                        <span class="icon-bar bottom-bar"></span>
                    </button>
                </div>
            </div>

            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="navbar-default">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link"  href=""   >Mes Candidatures</a>

                    </li>



                    <li class="nav-item dropdown">
                        <a class="nav-link" href=""  >Toutes les candidatures</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" >Versements</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" >Mes utilisateurs</a>
                    </li>


                    <li class="nav-item dropdown dropdown-fullwidth">
                            <a href="#" class="nav-link dropdown-toggle" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="bx bx-log-out"></i>  Deconnexion</a>
                            <form id="logout-form" action="" method="POST" class="d-none">
                               @csrf
                           </form>

                    </li>

                </ul>
            </div>
        </div>
    </nav>
    @endcan


        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
     <script src="{{asset('ressources/libs/simplebar/dist/simplebar.min.js')}}"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <x-livewire-alert::scripts />

        @stack('scripts')
        @livewireScripts
</body>
</html>
