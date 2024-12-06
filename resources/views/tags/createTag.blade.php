@extends('layouts.header_footer')

@section('content')
<link rel="stylesheet" href="{{ asset('css/tag/createTag.css') }}">

<div class="form-container">
    <h1 class="form-title">Criar Nova Tag</h1>
    <form action="{{ route('storeTag') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name" class="form-label">Nome:</label>
            <input type="text" id="name" name="name" class="form-input" required>
            @error('name')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="submit-button">Criar Tag</button>
    </form>
</div>
@endsection
