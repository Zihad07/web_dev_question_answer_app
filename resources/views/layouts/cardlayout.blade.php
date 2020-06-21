<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{--  {{ config('app.name', 'Laravel') }}  --}}
                    WebDev-Ask&Answer
                </a>
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
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

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

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                               <div class="row align-items-center">
                                    <div class="col-lg-4">
                                        <h4>
                                                @yield('card-header','Dashboard')
                                        </h4>
                                </div>

                                <div class="col-lg-8">
                                    <a class="text-dark" href="{{ route('allQuestion') }}">Home</a>
                                    <span class="saparator">|</span>
                                    @auth
                                    <a class="text-dark" href="{{ route('question.eachuser') }}">My Question</a>
                                    <span class="saparator">|</span>
                                    <a class="text-dark" href="{{ route('comment.mycomments') }}">My Comment</a>
                                    <span class="saparator">|</span>
                            
                                    @endauth
                                    <a class="text-dark" href="{{ route('question.create') }}">New Question</a>
                                    <span class="saparator">|</span>

                                    <a class="text-dark" href="{{ route('about') }}">About</a>
                                    
                                   
                                    
                                    
                                    @auth
                                     <span class="saparator">|</span>
                                    <a class="text-dark" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form-me').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form-me" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    @endauth
                                    
                                    @guest
                                        <span class="saparator">|</span>
                                        <a class="text-dark" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    @endguest

                                </div>
                                </div>
                            </div>

                            <div class="card-body">
                                @include('message.message')
                               @yield('content')
                            </div>
                        </div>

                        <footer style="color: gray;" class="text-center py-1">
                            &copy; 2020 | Powered by <small>Zihad</small>
                        </footer>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Scripts -->
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="http://unpkg.com/turbolinks"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
