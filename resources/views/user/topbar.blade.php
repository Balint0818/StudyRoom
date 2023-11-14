<body>
<div class="back-to-top"></div>

<header>
<div class="topbar" style="background-color:#242943;">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 text-sm d-flex justify-content-between align-items-center">
                <div class="site-info">
                    <a href="#"><span class="mai-call text-primary"></span> +00 123 4455 6666</a>
                    <span class="divider">|</span>
                    <a href="#"><span class="mai-mail text-primary"></span>tanuloszoba@sze.hu</a>
                </div>
                <img src="sze_logo.png" alt="Széchenyi István Egyetem logója">
            </div>
        </div> <!-- .row -->
    </div> <!-- .container -->
</div> <!-- .topbar -->


    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{url('home')}}"><span class="text-primary">Study</span>-Room</a>


            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport"
                    aria-controls="navbarSupport" aria-expanded="fals" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="" id="navbarSupport">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('home')}}">Főoldal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">About Us</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="blog.html">News</a>
                    </li>

                    @if(Route::has('login'))
                        @auth
                            @if(Auth::user()->usertype=='1')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('adminpanel')}}">AdminPanel</a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('create_appointment')}}">Időpont foglalás</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('myappointments')}}">Foglalásaim</a>
                            </li>
                            <x-app-layout>
                            </x-app-layout>
                        @else
                            <li class="nav-item">
                                <a class="btn btn-primary ml-lg-3" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-primary ml-lg-3" href="{{route('register')}}">Register</a>
                            </li>
                        @endauth
                    @endif
                </ul>
            </div> <!-- .navbar-collapse -->
        </div> <!-- .container -->
    </nav>
</header>
@if(session()->has('message'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">
            X
        </button>
        {{session()->get('message')}}

    </div>
@endif
