<!-- resources/views/comments/createComment.blade.php -->
@extends('layouts.header_footer')

@section('content')
<link rel="stylesheet" href="{{ asset('css/comments/createComment.css') }}">

<div class="comment-create-container">
    <h1>Criar Comentário</h1>
    <form action="{{ route('storeComment', ['topicId' => $topicId]) }}" method="POST">
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
@endsection
