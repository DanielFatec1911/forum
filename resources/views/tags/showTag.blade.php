@extends('layouts.header_footer')

@section('content')
<link rel="stylesheet" href="{{ asset('css/tag/showTag.css') }}">

<div class="container">
    <h1>Posts com a Tag: {{ $tag->name }}</h1>
    <div class="posts-container">
        @forelse ($tag->posts as $post)
            <div class="post-item">
                <h2 class="post-title">{{ $post->title }}</h2>
                <div class="post-meta">
                    <p><strong>Autor:</strong> {{ $post->user->name }}</p>
                    <p><strong>Categoria:</strong> {{ $post->category->name }}</p>
                </div>
                @if($post->image)
                    <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="post-image">
                @endif
                <div class="post-content">
                    <p>{{ $post->description }}</p>
                    <p>{{ $post->content }}</p>
                </div>
            </div>
        @empty
            <p class="empty-message">Nenhum post encontrado para esta tag.</p>
        @endforelse
    </div>
</div>
@endsection
