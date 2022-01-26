<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    {{-- Bootstrap CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">

    <!--===============================================================================================-->
</head>

<body>
    {{-- ========================Nav bar=============================== --}}
    <nav>
        <div class="container">
            <h2 class="log"><a style="color:#84CB9A"
                    href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a></h2>
            @guest
                @if (Route::has('register'))
                @endif
            @else
                <div class="search-bar">
                    <i class="fas fa-search"></i>
                    <input type="search" placeholder="Search for articles,createors ">
                </div>
                <div class="create">
                    <label for="create-post" class="btn btn-primary">Create</label>

                    <div class="dropdown">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                            aria-expanded="true">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        @endguest
    </nav>
    {{-- ========================Main=============================== --}}

    <main>
        <div class="container">
            {{-- ===============================LEFT======================= --}}
            @include('frontend.layouts.sidebar')
            {{-- ===============================Middle======================= --}}
            @yield('content')
            {{-- ===============================Right======================= --}}
            @include('frontend.layouts.activity')
        </div>

    </main>

    {{-- Bootstrap JS --}}

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
        integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous">
    </script>
     <!-- Laravel Javascript Validation -->
     <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
      {{-- sweet-alert2 --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     <script>
        $(document).ready(function() {
            let token = document.head.querySelector('meta[name = "csrf-token"]');
            if (token) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF_TOKEN': token.content,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    }
                });
            }

            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            @if (session('create'))
                Toast.fire({
                icon: 'success',
                title: '{{ session('create') }}'
                });
            @endif

            @if (session('update'))
                Toast.fire({
                icon: 'success',
                title: '{{ session('update') }}'
                });
            @endif

            $('.back-btn').on('click', function(e) {
                e.preventDefault();
                window.history.go(-1);
                return false;
            });
        });
    </script>
    @yield('scripts')
</body>


</html>
