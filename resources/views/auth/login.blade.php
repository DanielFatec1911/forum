@extends('layouts.header_footer')

@section('content')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">

<div class="login-container">
    <form action="{{ route('login') }}" method="POST" class="login-form">
        @csrf
        <h2 id="login-title">Bem-vindo de volta!</h2>
        <div class="form-group">
            <label for="email" class="form-label">Email:</label>
            <input type="email" id="email" name="email" class="form-input" value="{{ old('email') }}" required>
            @error('email') <span class="error-message">{{ $message }}</span> @enderror
        </div>
        
        <div class="form-group">
            <label for="password" class="form-label">Senha:</label>
            <input type="password" id="password" name="password" class="form-input" required>
            @error('password') <span class="error-message">{{ $message }}</span> @enderror
        </div>
        
        <button type="submit" class="submit-button">Entrar</button>
    </form>
</div>
@endsection
