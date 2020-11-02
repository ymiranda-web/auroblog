@extends('layouts.app')

@section('content')
    <div class="content mt-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @auth()
                    <div class="row" >
                        <div class="col-lg-12 mb-3">
                            <a  href="{{ route('posts.create') }}" class="btn btn-primary float-right">Nuevo Post</a>
                        </div>
                    </div>
                @endauth
                @forelse($posts as $post)
                    <div class="card border-dark mb-3">
                        <div class="card-header">{{ $post->title }}
                            @can('update', $post)
                                <a href="{{ route('posts.edit', $post) }}" class="btn btn-default">Editar</a>
                            @endcan
                            @can('delete', $post)
                                <button class="btn btn-default" rel="tooltip"
                                        onclick="event.preventDefault(); document.getElementById('frm-eliminar-{{$post->id}}').submit();">
                                    Eliminar
                                </button>
                                <form id="frm-eliminar-{{$post->id}}"
                                      action="{{ route('posts.destroy', $post) }}"
                                      style="display: none;" method="POST">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                </form>
                            @endcan
                        </div>
                        <div class="card-body">
                            {{ $post->summary }}
                            <a class="card-link" href="{{ route('blog.show', [$post->slug]) }}">Leer mas</a>
                        </div>
                    </div>
                    @empty
                        <p>Blog vacío</p>
                @endforelse

                {{ $posts->links() }}
            </div>
        </div>
    </div>
    </div>
@endsection
