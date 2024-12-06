@extends('layouts.header_footer')

@section('content')
<link rel="stylesheet" href="{{ asset('css/comments/editComment.css') }}">

<div class="comment-edit-container">
    <h1>Editar Comentário</h1>
    <form action="{{ route('updateComment', ['topicId' => $topicId, 'id' => $comment->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="content">Comentário:</label>
            <textarea id="content" name="content" class="form-input" rows="3" required>{{ $comment->content }}</textarea>
            @error('content')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="submit-button">Atualizar Comentário</button>
    </form>
</div>
@endsection
