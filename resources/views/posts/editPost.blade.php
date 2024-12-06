@extends('layouts.header_footer')

@section('content')
<link rel="stylesheet" href="{{ asset('css/post/createPost.css') }}">

<div class="form-container">
    <h1>Editar Post</h1>
    <form action="{{ route('updatePost', ['id' => $post->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Título:</label>
            <input type="text" id="title" name="title" class="form-input" value="{{ $post->title }}" required>
            @error('title')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="category">Categoria:</label>
            <select id="category" name="category_id" class="form-input" required>
                @foreach($categories as $category)
                    <option value="{{ $category->idCategory }}" {{ $category->idCategory == $post->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="tags">Tags:</label>
            <select id="tags" name="tags[]" class="form-input" multiple>
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}" {{ in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $tag->name }}</option>
                @endforeach
            </select>
            @error('tags')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="content">Conteúdo:</label>
            <textarea id="content" name="content" class="form-input" rows="5" required>{{ $post->content }}</textarea>
            @error('content')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="current_image">Imagem Atual:</label>
            @if($post->image)
                <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" width="200">
            @else
                <p>Sem imagem disponível.</p>
            @endif
        </div>
        <div class="form-group">
            <label for="image">Alterar Imagem:</label>
            <input type="file" id="image" name="image" class="form-input">
            @error('image')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="submit-button">Atualizar Post</button>
    </form>
</div>
@endsection
