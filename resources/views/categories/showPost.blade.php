@extends('layouts.header_footer')

@section('content')
<link rel="stylesheet" href="{{ asset('css/showPost.css') }}">

<div class="post-container">
    <div class="post-header">
        <h1 class="post-title">{{ $post->title }}</h1>
        <p class="post-meta">
            Publicado por <a href="{{ route('profile', ['id' => $post->user->id]) }}" class="post-author">{{ $post->user->name }}</a>
            @if ($post->category)
                na categoria <a href="{{ route('showCategory', ['idCategory' => $post->category->id]) }}" class="post-category">{{ $post->category->name }}</a>
            @else
                na categoria Categoria Desconhecida
            @endif
        </p>
    </div>

    <div class="post-image">
        @if($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" alt="Imagem do Post">
        @endif
    </div>

    <div class="post-content">
        <p>{{ $post->content }}</p>
    </div>

    <div class="comments-section">
        <h2>Comentários</h2>
        @foreach($post->comments as $comment)
            <div class="comment-item">
                <p class="comment-meta">
                    Comentário de <a href="{{ route('profile', ['id' => $comment->user->id]) }}" class="comment-author">{{ $comment->user->name }}</a>:
                </p>
                <p class="comment-content">{{ $comment->content }}</p>
            </div>
        @endforeach
    </div>
</div>
@endsection
