<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

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
                    <a class="nav-link" href="/login">Login<img src="images/login.png" alt="icon-login"></a>
                </li>
                @endauth
            </ul>
        </div>
    </div>

    <div>
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- <script src="js/script.js"></script> -->
</body>

</html>