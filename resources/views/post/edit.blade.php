@extends('layouts.layout')
@push('styles')
    @vite(['resources/css/layoutcss.css'])
@endpush

@section('content')
    <div class="container">
        <h1>Editar Publicación</h1>

        @if ($errors->any())
            <article>
                <strong>¡Vaya!</strong> Hubo algunos problemas con tu entrada.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </article>
        @endif

        <form action="{{ route('posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="title">Título</label>
            <input type="text" name="title" id="title" value="{{ $post->title }}" placeholder="Título" required>

            <label for="content">Contenido</label>
            <textarea name="content" id="content" placeholder="Contenido" style="height:150px"
                required>{{ $post->content }}</textarea>

            <label for="image_url">URL de la Imagen</label>
            <input type="text" name="image_url" id="image_url" placeholder="URL de la Imagen"
                value="{{ $post->image_url }}">

            <button type="submit">Actualizar</button>
        </form>
    </div>
@endsection