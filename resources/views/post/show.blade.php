@extends('layouts.layout')
@push('styles')
    @vite(['resources/css/layoutcss.css'])
@endpush

@section('content')
    <div class="container">
        <div class="grid">
            <div>
                <a href="{{ route('posts.index') }}" role="button" class="secondary">Volver</a>
            </div>
            <div>
                <h1>Ver Publicación</h1>
            </div>
        </div>

        <article>
            <header>

                @if ($post->image_url)
                    <img src="{{ $post->image_url }}" alt="{{ $post->title }}"
                        style="width: 100%; height: 200px; object-fit: cover;">
                @else
                    <p>No hay imagen</p>
                @endif
                <hr>
                <h1>{{ $post->title }}</h1>
                <p>{{ $post->content }}</p>
                <p>Por {{ $post->user->name ?? 'Desconocido' }}</p>
                <p>{{ $post->created_at ? $post->created_at->format('d M, Y') : 'Fecha desconocida' }}</p>
            </header>
            <p>{{ $post->body }}</p>
            <footer>
                <div class="grid">
                    @auth
                        <a href="{{ route('posts.edit', $post->id) }}" role="button" class="contrast small">Editar</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="small">Eliminar</button>
                        </form>
                    @endauth
                </div>
            </footer>
        </article>
        <section>
            <form action="{{ route('comments.store') }}" method="post">
                @csrf
                <input type="hidden" value="{{ $post->id }}" name="post_id">
                <input type="text" name="content">
                <input type="submit" value="Enviar comentario">
            </form>
        </section>

        <section>
             @foreach ($comments->all() as $comment)
                <div>
                    <li>{{ $comment->content }} por ({{ $comment->user->name }})</li>
                </div>
            @endforeach
        </section>
    </div>
@endsection