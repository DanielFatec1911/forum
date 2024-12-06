<!-- resources/views/comments/listComments.blade.php -->
@extends('layouts.header_footer')

@section('content')
<link rel="stylesheet" href="{{ asset('css/comments/listComments.css') }}">

<div class="comment-list-container">
    <h1>Todos os Comentários</h1>
    @forelse ($comments as $comment)
        <div class="comment-item">
            <p class="author">{{ $comment->user->name ?? 'Usuário Desconhecido' }}</p>
            <p>{{ $comment->content }}</p>
            <p class="date">{{ $comment->created_at->format('d/m/Y H:i') }}</p>
            <div class="actions">
                <a href="{{ route('comments.show', $comment->id) }}" class="button">Ver</a>
                <a href="{{ route('editComment', ['topicId' => $comment->topic_id, 'id' => $comment->id]) }}" class="button">Editar</a>
                <form action="{{ route('deleteComment', ['topicId' => $comment->topic_id, 'id' => $comment->id]) }}" method="POST" class="inline-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="button button-delete">Deletar</button>
                </form>
            </div>
        </div>
    @empty
        <p>Sem comentários disponíveis.</p>
    @endforelse
</div>
@endsection
