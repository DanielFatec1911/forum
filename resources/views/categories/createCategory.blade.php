@extends('layouts.header_footer')

@section('content')
<link rel="stylesheet" href="{{ asset('css/category/createCategory.css') }}">

<main>
    <div class="form-container">
        <h1 class="form-title">Criar Nova Categoria</h1>
        <form action="{{ route('storeCategory') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name" class="form-label">Nome:</label>
                <input type="text" id="name" name="name" class="form-input" required>
                @error('name')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="description" class="form-label">Descrição:</label>
                <textarea id="description" name="description" class="form-input" rows="5" required></textarea>
                @error('description')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="submit-button">Criar Categoria</button>
        </form>
    </div>
</main>
@endsection
