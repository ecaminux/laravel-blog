<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/css/customblog.css', 'resources/js/app.js'])
</head>

<body>
    <div class="container-blog">
        <header class="header-blog">
            <nav>
                <div>
                    <a href="{{ url('/') }}">Laravel Blog</a>
                </div>
                <div>
                    @guest
                        <a class="btn" href="{{ route('login') }}">Iniciar Sesión</a>
                        <a class="btn" href="{{ route('register') }}">Registrarse</a>
                    @else
                        <span>{{ Auth::user()->name }} <i class="fa-regular fa-user"></i></span>
                        <a class="btn" href="{{ url('/home') }}" role="button">Panel</a>
                    @endguest
                </div>
        </header>


        <main class="content-blog">
            <div class="grid">
                @forelse ($posts as $post)
                    <article>
                        <header>
                            @if($post->image_url)
                                <img src="{{ $post->image_url }}" alt="{{ $post->title }}"
                                    style="width: 100%; height: 200px; object-fit: cover;">
                            @endif
                            <h3>{{ $post->title }}</h3>
                        </header>
                        <p>{{ Str::limit($post->content, 30) }}</p>
                        <footer>
                            <small>Por {{ $post->user->name ?? 'Desconocido' }} el
                                {{ $post->created_at ? $post->created_at->format('d M, Y') : 'Fecha desconocida' }}</small>
                        </footer>
                    </article>
                @empty
                    <article>
                        <p>No se encontraron publicaciones.</p>
                    </article>
                @endforelse
            </div>
        </main>

        <footer class="footer-blog">
            <div class="container">
                <small>&copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. Todos los derechos
                    reservados.</small>
            </div>
        </footer>
    </div>
</body>

</html>