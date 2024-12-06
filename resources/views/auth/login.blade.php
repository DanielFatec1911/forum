@extends('layouts.header_footer')

@section('content')
<link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">

<div class="auth-container">
    <div class="image-box">
        <img src="https://img.freepik.com/fotos-premium/uma-motocicleta-vermelha-e-mostrada-no-escuro_796580-1891.jpg?semt=ais_hybrid" alt="Bem-vindo">
        <h2>Bem-vindo novamente!</h2>
        <p>Pé na estrada!</p>
    </div>
    <div class="form-box">
        <h2 id="login-title">Entrar</h2> <!-- Adicionando o título "Entrar" -->
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-input" value="{{ old('email') }}" required>
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Senha:</label>
                <div style="position: relative;">
                    <input type="password" id="password" name="password" class="form-input" required>
                    <i class="password-toggle fas fa-eye"></i>
                </div>
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="submit-button">Entrar</button>
        </form>
        <a href="{{ route('register') }}" class="auth-link">Não possui uma conta? Registre-se</a>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const passwordInput = document.getElementById('password');
        const passwordToggle = document.querySelector('.password-toggle');

        passwordToggle.addEventListener('click', function () {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
        });

        const formBox = document.querySelector('.form-box');
        const imageBox = document.querySelector('.image-box');

        [formBox, imageBox].forEach(box => {
            box.addEventListener('mouseenter', function () {
                this.style.transform = 'scale(1.02)';
                this.style.boxShadow = '0 0 20px rgba(255, 0, 0, 0.7)';
            });

            box.addEventListener('mouseleave', function () {
                this.style.transform = 'scale(1)';
                this.style.boxShadow = '0 0 20px rgba(0, 0, 0, 0.7)';
            });
        });
    });
</script>
@endsection
