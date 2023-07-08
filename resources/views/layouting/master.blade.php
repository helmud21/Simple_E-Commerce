<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
    
    <!-- <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.min.css')}}"> -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <!-- trix editor -->
    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
    

    <title>Home</title>
</head>

<body>
    <div id="navbar" class="container-fluid">
        <div>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/">Home</a>
                </li>
                @auth
                @else
                <li class="nav-item">
                    <a class="nav-link" href="/register">Register</a>
                </li>
                @endauth
            </ul>
        </div>
        <div id="logout">
            <ul class="nav">
                @auth
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="" role="button" aria-expanded="false">{{ auth()->user()->name }}</a>
                <ul class="dropdown-menu mt-1" id="dropdown-logout">
                    <li>
                        <button class="dropdown-item"><a href="/profile/{{ auth()->user()->id }}">Profile</a></button>
                    </li>
                    <li>
                        <button class="dropdown-item"><a href="/pembelian/{{ auth()->user()->id }}">Pembelian</a></button>
                    </li>
                    @if( auth()->user()->role == 'Toko' )
                    <li>
                        <button class="dropdown-item" id="btnToko"><a href="/dashboard/{{ auth()->user()->id }}/toko" data-id="{{ auth()->user()->id }}">Toko</a></button>
                    </li>
                    @endif
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <form action="/logout" method="POST">
                            @csrf
                            <button class="dropdown-item" type="submit">Logout</button>
                        </form>
                    </li>
                </ul>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="/login">Login<img src="{{ asset('images/login.png') }}" alt="icon-login"></a>
                </li>
                @endauth
            </ul>
        </div>
    </div>

    <div>
        @yield('content')
    </div>


    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    

    <script src="{{ asset('js/script.js') }}"></script>
    
    <!-- <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{asset('js/jquery.validate.min.js')}}"></script>
    <script src="{{ asset('js/jquery.doubleScroll.js') }}"></script>
    <script src="{{ asset('js/dragscroll.js') }}"></script> -->
</body>

</html>