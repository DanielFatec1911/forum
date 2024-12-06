@extends('layouts.header_footer')

@section('content')
<link rel="stylesheet" href="{{ asset('css/showPost.css') }}">

<div class="post-container">
    <h1 class="post-title">{{ $post->title }}</h1>
    <p class="post-author"><strong>Autor:</strong> {{ $post->user->name ?? 'Autor Desconhecido' }}</p>
    <p class="post-category"><strong>Categoria:</strong> {{ $post->category->name ?? 'Categoria Desconhecida' }}</p>
    <p><strong>Tags:</strong>
        @foreach($post->tags as $tag)
            <span class="tag">{{ $tag->name }}</span>
        @endforeach
    </p>
    <div class="post-content-box">
        <div class="post-content">
            {{ $post->content }}
        </div>
    </div>
    @if($post->image)
        <div class="post-image-container">
            <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="post-image">
        </div>
    @endif
</div>
@endsection
