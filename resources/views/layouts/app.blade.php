<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/libs/bootstrap-icons/font/bootstrap-icons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/libs/simplebar/dist/simplebar.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/theme.min.css')}}">
    @livewireStyles
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid px-0">
                <div class="d-flex">
                    <a class="navbar-brand" href="#">
                        <img src="{{asset('logo.png')}}" alt="KGS INFORMATIQUE" style="height:30px;"></a>

                </div>
                <div class="order-lg-3">
                    <div class="d-flex align-items-center">
                        <li class="dropdown ms-2 d-inline-block position-static">
                             <a class="rounded-circle show" href="#" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="true">
                                  <div class="avatar avatar-md avatar-indicators avatar-online">
                                  <img alt="avatar" src="{{asset('logo.png')}}" class="rounded-circle">
                                    </div>
                                           </a>
                                           <div class="dropdown-menu dropdown-menu-end position-absolute mx-3 my-5 show" data-bs-popper="static">
                                               <div class="dropdown-item">
                                                   <div class="d-flex">
                                                       <div class="avatar avatar-md avatar-indicators avatar-online">
                                                           <img alt="avatar" src="../assets/images/avatar/avatar-1.jpg" class="rounded-circle">
                                                       </div>
                                                       <div class="ms-3 lh-1">
                                                           <h5 class="mb-1">{{Auth::user()->name}}</h5>
                                                           <p class="mb-0">{{Auth::user()->email}}</p>
                                                       </div>
                                                   </div>
                                               </div>
                                               <div class="dropdown-divider"></div>
                                               <ul class="list-unstyled">
                                                   <li class="dropdown-submenu dropstart-lg">
                                                       <a class="dropdown-item dropdown-list-group-item dropdown-toggle" href="#">
                                                           <i class="fe fe-circle me-2"></i>
                                                          Mes candidatures
                                                       </a>

                                                   </li>
                                                   <li>
                                                       <a class="dropdown-item" href="profile-edit.html">
                                                           <i class="fe fe-user me-2"></i>
                                                           Candidatures Validées
                                                       </a>
                                                   </li>
                                                   <li>
                                                       <a class="dropdown-item" href="student-subscriptions.html">
                                                           <i class="fe fe-star me-2"></i>

                                                       </a>
                                                   </li>


                                                   <li>
                                                       <a class="dropdown-item" href="#">
                                                           <i class="fe fe-settings me-2"></i>
                                                          Messages
                                                       </a>
                                                   </li>

                                                   <li>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fe fe-settings me-2"></i>
                                                        Rapports
                                                    </a>
                                                </li>
                                               </ul>
                                               <div class="dropdown-divider"></div>
                                               <ul class="list-unstyled">
                                                   <li>
                                                       <a class="dropdown-item" href="../index.html">
                                                           <i class="fe fe-power me-2"></i>
                                                           Deconnexion
                                                       </a>
                                                   </li>
                                               </ul>
                                           </div>
                                       </li>

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
                            <a class="nav-link"  href="{{route('candidature.index')}}"  wire:navigate  id="navbarLanding" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mes Candidatures</a>

                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarPages" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Toutes les candidatures</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Accounts</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mes utilisateurs</a>
                        </li>

                        <li class="nav-item dropdown dropdown-fullwidth">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Faqs</a>

                        </li>

                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
        <script src="{{asset('assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/libs/simplebar/dist/simplebar.min.js')}}"></script>
        @livewireScripts
</body>
</html>
