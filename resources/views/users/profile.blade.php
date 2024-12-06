@extends('layouts.header_footer')

@section('content')
<link rel="stylesheet" href="{{ asset('css/user/profile.css') }}">

<div class="profile-container">
    @if ($user != null)
        <form action="{{ route('updateProfile') }}" method="POST" enctype="multipart/form-data" class="profile-form">
            <h1 class="text-center">Perfil</h1>
            @csrf
            @method('put')

            <!-- Exibir a Imagem de Perfil -->
            <div class="form-group profile-pic-group">
                <img src="{{ asset('storage/' . $user->photo) }}" alt="Foto de Perfil" class="profile-image">
                <input type="file" id="photo" name="photo" class="form-input">
                @error('photo')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="name" class="form-label">Nome:</label>
                <input type="text" id="name" name="name" class="form-input" value="{{ $user->name }}" placeholder="{{ $user->name }}" required>
                @error('name')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" class="form-input" value="{{ $user->email }}" placeholder="{{ $user->email }}" required>
                @error('email')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Nova Senha:</label>
                <div style="position: relative;">
                    <input type="password" id="password" name="password" class="form-input">
                    <i class="password-toggle fas fa-eye"></i>
                </div>
                @error('password')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="submit-button">Atualizar Perfil</button>
            <a href="{{ route('home') }}" class="cancel-button">Cancelar</a>
        </form>
    @endif
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

        const profilePicInput = document.getElementById('photo');
        const profileImage = document.querySelector('.profile-image');

        profilePicInput.addEventListener('change', function (event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function (e) {
                profileImage.src = e.target.result;
            };

            if (file) {
                reader.readAsDataURL(file);
            }
        });
    });
</script>
@endsection
