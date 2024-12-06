@extends('layouts.header_footer')

@section('content')
<link rel="stylesheet" href="{{ asset('css/showPost.css') }}">

<div class="post-container">
    <div class="post-header">
        <h1 class="post-title">{{ $post->title }}</h1>
        <p class="post-meta">
            <strong>Autor:</strong> <a href="{{ route('profile', ['id' => $post->user->id]) }}" class="post-author">{{ $post->user->name ?? 'Autor Desconhecido' }}</a>
            @if ($post->category)
                <strong>Categoria:</strong> <a href="{{ route('showCategory', ['idCategory' => $post->category->id]) }}" class="post-category">{{ $post->category->name }}</a>
            @else
                <strong>Categoria:</strong> Categoria Desconhecida
            @endif
            <strong>Tags:</strong>
            @foreach($post->tags as $tag)
                <span class="tag">{{ $tag->name }}</span>
            @endforeach
        </p>
    </div>

    <div class="post-image">
        @if($post->image)
            <img src="{{ url('storage/' . $post->image) }}" alt="{{ $post->title }}">
        @endif
    </div>

    <div class="post-content">
        <p>{{ $post->content }}</p>
    </div>
</div>
@endsection
