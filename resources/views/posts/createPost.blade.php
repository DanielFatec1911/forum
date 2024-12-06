@extends('layouts.header_footer')

@section('content')
<link rel="stylesheet" href="{{ asset('css/category/createCategory.css') }}">

<div class="form-container">
    <h1>Criar Novo Post</h1>
    <form action="{{ route('storePost') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Título:</label>
            <input type="text" id="title" name="title" class="form-input" required>
            @error('title')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="category">Categoria:</label>
            <select id="category" name="category_id" class="form-input" required>
                @foreach($categories as $category)
                    <option value="{{ $category->idCategory }}">{{ $category->name }}</option>
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
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
            @error('tags')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="content">Conteúdo:</label>
            <textarea id="content" name="content" class="form-input" rows="5" required></textarea>
            @error('content')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="image">Imagem:</label>
            <input type="file" id="image" name="image" class="form-input">
            @error('image')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="submit-button">Criar Post</button>
    </form>
</div>
@endsection
