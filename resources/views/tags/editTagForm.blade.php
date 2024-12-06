@extends('layouts.header_footer')

@section('content')
<link rel="stylesheet" href="{{ asset('css/tag/createTag.css') }}">

<div class="form-container">
    <h1>Editar Tag</h1>
    <form action="{{ route('updateTag', ['id' => $tag->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" id="name" name="name" class="form-input" value="{{ $tag->name }}" required>
            @error('name')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="submit-button">Atualizar Tag</button>
    </form>
</div>
@endsection
