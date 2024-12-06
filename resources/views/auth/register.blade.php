@extends('layouts.header_footer')

@section('content')
<link rel="stylesheet" href="{{ asset('css/auth/register.css') }}">

<div class="auth-container">
    <div class="form-box">
        <div class="image-box">
            <img src="https://th.bing.com/th/id/R.01984be080fb08a5fef5dce7d186c006?rik=gTT5DO%2friCU4MQ&riu=http%3a%2f%2f2.bp.blogspot.com%2f-LkD2Kt6VRZ0%2fTlJVfB8L1LI%2fAAAAAAAAAXA%2f8L2tCnSaz2Y%2fs1600%2fYamaha%2br1%2bvermelha.jpg&ehk=1EslRY6QR4H3cFjSXYa6DAcGTostCjRc2F6mqsFbCOY%3d&risl=&pid=ImgRaw&r=0" alt="Bem-vindo">
            <h2>Junte-se a Nós!</h2>
            <p>Experimente a emoção de estar no controle e compartilhe sua paixão por motos esportivas com a nossa comunidade!</p>
        </div>
        <div class="form-content">
            <h2 id="register-title">Registrar</h2>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nome:</label>
                    <input type="text" id="name" name="name" class="form-input" value="{{ old('name') }}" required>
                    @error('name')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
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
                <div class="form-group">
                    <label for="password_confirmation">Confirme a Senha:</label>
                    <div style="position: relative;">
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-input" required>
                        <i class="password-toggle fas fa-eye"></i>
                    </div>
                </div>
                <button type="submit" class="submit-button">Registrar</button>
            </form>
            <a href="{{ route('login') }}" class="auth-link">Já possui uma conta? Clique aqui</a>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const passwordInputs = document.querySelectorAll('.form-input[type="password"]');
        const passwordToggles = document.querySelectorAll('.password-toggle');

        passwordToggles.forEach((toggle, index) => {
            toggle.addEventListener('click', function () {
                const type = passwordInputs[index].getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInputs[index].setAttribute('type', type);
                this.classList.toggle('fa-eye-slash');
            });
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
