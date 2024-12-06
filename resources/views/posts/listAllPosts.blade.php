@extends('layouts.header_footer')

@section('content')
<link rel="stylesheet" href="{{ asset('css/post/listAllPosts.css') }}">

<div class="container">
    <h1>Lista de Posts</h1>
    @forelse ($posts as $post)
        <div class="post-item">
            <div class="post-inner">
                <a href="{{ route('showPost', ['id' => $post->id]) }}" class="post-title-link">
                    <h2 class="post-title">{{ $post->title }}</h2>
                </a>
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
                <div class="post-actions">
                    <a href="{{ route('editPost', ['id' => $post->id]) }}" class="button button-edit">Editar</a>
                    <form action="{{ route('deletePost', ['id' => $post->id]) }}" method="POST" class="inline-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="button button-delete">Deletar</button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <p>Nenhum post encontrado.</p>
    @endforelse
</div>
@endsection
