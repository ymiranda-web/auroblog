@extends('layouts.app')

@section('title', 'Crear un post')

@section('content')
    <main class="content">
        <h1>Nuevo Post</h1>

        @if ($errors->any())
            <div class="errors">
                <p><strong>Por favor corrige los siguientes errores:</strong></p>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('posts.store') }}">
            @csrf

            <div class="form-group @error('title') has-danger @enderror">
                <label for="title" class="form-control-label">Título: </label> <br>
                <input type="text" name="title" value="{{ old('title') }}" id="title"
                       class="form-control field-input @error('title') is-invalid @enderror">
                @error('title')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group @error('content_md') has-danger @enderror">
                <label for="content_md" class="form-control-label">Contenido:</label> <br>
                <textarea name="content_md" id="content_md" rows="10"
                          class="form-control field-textarea @error('content_md') is-invalid @enderror">{{ old('content_md') }}</textarea>
                @error('content_md')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Crear post</button>
        </form>

    </main>
@endsection
