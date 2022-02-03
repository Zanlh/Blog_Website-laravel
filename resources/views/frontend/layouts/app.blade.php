<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--===============================================================================================-->
    <title>@yield('title')</title>
    <!--===============================================================================================-->
    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <!--===============================================================================================-->
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!--===============================================================================================-->
    {{-- Bootstrap CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    <!--===============================================================================================-->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!--===============================================================================================-->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="{{ asset('frontend/css/images-grid.css') }}">
    <!--===============================================================================================-->
    @yield('extra-css')

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
                    <input type="search" placeholder="Search for articles,creators ">
                </div>
                <div class="create">
                    <label for="create-post" class="btn btn-primary">Create</label>

                    <div class="dropdown">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                            aria-expanded="true">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
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
    <!--===============================================================================================-->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>

    <!--===============================================================================================-->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--===============================================================================================-->
    <script src="{{asset('/frontend/js/images-grid.js')}}"></script>

    <!--===============================================================================================-->

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
            });

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
        });
    </script>
    <!--===============================================================================================-->
    @yield('scripts') 
    <!--===============================================================================================-->
</body>


</html>
