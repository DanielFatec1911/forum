<!-- resources/views/comments/showComment.blade.php -->
@extends('layouts.header_footer')

@section('content')
<link rel="stylesheet" href="{{ asset('css/comments/showComment.css') }}">

<div class="comment-container">
    <h1>Comentário de {{ $comment->user->name ?? 'Usuário Desconhecido' }}</h1>
    <p><strong>Comentário:</strong> {{ $comment->content }}</p>
    <p><strong>Data:</strong> {{ $comment->created_at->format('d/m/Y H:i') }}</p>
    <a href="{{ route('showTopic', ['id' => $topicId]) }}" class="btn btn-primary">Voltar</a>
</div>
@endsection
