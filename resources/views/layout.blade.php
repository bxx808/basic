<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/js/app.js'])
    <title>Document</title>
</head>

<body class="bg-body-border">
<div class="container">
    <header class="pt-3 mb-3 border-bottom">
        <div class="d-flex flex-wrap align-items-center justify-content-lg-start">
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="{{route('index')}}" class="nav-link px-2 link-secondary">Главная</a></li>
                <li><a href="{{route('contact')}}" class="nav-link px-2 link-body-emphasis">Контакты</a></li>
                @if(auth()->check())
                    <li><a href="{{route('post.index')}}" class="nav-link px-2 link-body-emphasis">Посты</a></li>
                @endif
            </ul>
            @if(auth()->check())
                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search"><input type="search"
                                                                                           class="form-control"
                                                                                           placeholder="Search..."
                                                                                           aria-label="Search"></form>
                <div class="dropdown text-end"><a href="#"
                                                  class="d-block link-body-emphasis text-decoration-none dropdown-toggle"
                                                  data-bs-toggle="dropdown" aria-expanded="false"> <img
                            src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small">
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div>
                <form class="px-1" method="post" action="{{route('logout')}}">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">Выйти</button>
                </form>
            @else
                <a href="{{route('login')}}">Войти</a>
                <span class="px-1"> | </span>
                <a href="{{route('register')}}">Зарегистрироваться</a>
            @endif
        </div>
    </header>

    @yield('content')
</div>
</body>
</html>
