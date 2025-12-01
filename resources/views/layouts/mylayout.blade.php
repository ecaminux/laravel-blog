<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"> -->
    <!-- estilos adicionales -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')

</head>
<body>
    <div class="container-blog">
        <div class="header-blog">
            <a class="navbar-brand" href="#">ESTA ES LA APP</a>
            <div>
                <span style="color: white">{{ Auth::user()->name }} <i class="fa-regular fa-user"></i></span>
                <a class="btn btn-danger" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                    <i class="fa-solid fa-right-from-bracket"></i>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
        <div class="menu-blog">MENU
            <div><a href="{{ url('user') }}">Usuarios</a></div>
            <div><a href="{{ url('post') }}">Posts</a></div>
            <div><a href="{{ url('comment') }}">Comentarios</a></div>
        </div>
        <div class="content-blog">CONTENT
            <!-- Contenido dinamico -->
            @yield('content')
        </div>
        <div class="footer-blog">FOOTER
            <a href="http://">Enlace 1</a>
            <a href="http://">Enlace 2</a>
            <a href="http://">Enlace 3</a>
        </div>
    </div>
        
    <!-- scripts adicionales -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>