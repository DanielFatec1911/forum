@extends('layouts.header_footer')

@section('content')
<link rel="stylesheet" href="{{ asset('css/topic/showTopic.css') }}">

<div class="topic-container">
    <div class="topic-header">
        <h1>{{ $topic->title }}</h1>
        <p class="topic-meta">Postado por {{ $topic->user->name }} em {{ $topic->created_at->format('d M, Y') }}</p>
    </div>
    <div class="topic-content">
        <p>{{ $topic->content }}</p>
    </div>

    <div class="comments-section">
        <h2>Comentários</h2>
        @foreach($topic->comments as $comment)
            <div class="comment-box">
                <div class="comment-header">
                    <strong>{{ $comment->user->name }}</strong> disse:
                    <span class="comment-date">{{ $comment->created_at->format('d M, Y - H:i') }}</span>
                </div>
                <div class="comment-content">
                    <p>{{ $comment->content }}</p>
                </div>
                <div class="comment-actions">
                    <a href="{{ route('editComment', ['topicId' => $topic->id, 'id' => $comment->id]) }}" class="button button-edit">Editar</a>
                    <form action="{{ route('deleteComment', ['topicId' => $topic->id, 'id' => $comment->id]) }}" method="POST" class="inline-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="button button-delete">Deletar</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <div class="comment-create-section">
        <h2>Adicionar Comentário</h2>
        <form action="{{ route('storeComment', ['topicId' => $topic->id]) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="content">Comentário:</label>
                <textarea id="content" name="content" class="form-input" rows="3" required></textarea>
                @error('content')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="submit-button">Adicionar Comentário</button>
        </form>
    </div>
</div>
@endsection
