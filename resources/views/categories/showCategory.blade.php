@extends('layouts.header_footer')

@section('content')
<link rel="stylesheet" href="{{ asset('css/category/showCategory.css') }}">

<div class="category-container">
    <h1 class="category-title">{{ $category->name }}</h1>
    <p class="category-description">{{ $category->description }}</p>

    <div class="posts-container">
        @foreach($category->posts as $post)
            <div class="post-item">
                <h2 class="post-title">{{ $post->title }}</h2>
                <p class="post-meta">
                    <strong>Autor:</strong> <a href="{{ route('profile', ['id' => $post->user->id]) }}" class="post-author">{{ $post->user->name ?? 'Autor Desconhecido' }}</a>
                    <strong>Tags:</strong>
                    @foreach($post->tags as $tag)
                        <span class="tag">{{ $tag->name }}</span>
                    @endforeach
                </p>
                <div class="post-content">
                    {{ Str::limit($post->content, 150) }}
                </div>
                @if($post->image)
                    <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="post-image">
                @endif
                <a href="{{ route('showPost', ['id' => $post->id]) }}" class="read-more">Ler mais</a>
            </div>
        @endforeach
    </div>
</div>
@endsection
