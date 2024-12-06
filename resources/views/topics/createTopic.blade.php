@extends('layouts.header_footer')

@section('content')
<link rel="stylesheet" href="{{ asset('css/category/createCategory.css') }}">

<div class="form-container">
    <h1>Criar Novo Tópico</h1>
    <form action="{{ route('storeTopic') }}" method="POST">
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
            <label for="description">Descrição:</label>
            <textarea id="description" name="description" class="form-input" rows="5" required></textarea>
            @error('description')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select id="status" name="status" class="form-input" required>
                <option value="1">Ativo</option>
                <option value="0">Inativo</option>
            </select>
            @error('status')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="submit-button">Criar Tópico</button>
    </form>
</div>
@endsection
