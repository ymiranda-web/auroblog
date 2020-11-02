@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <main class="content mt-3">
        <div class="cards">
            <div class="card card-center">
                <div class="card-header">{{ $post->title }}</div>
                <div class="card-body">
                    <content-post content="{{ $post->content }}"></content-post>
                </div>
            </div>
        </div>
    </main>
@endsection
