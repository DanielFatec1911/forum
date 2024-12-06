@extends('layouts.header_footer')

@section('content')
<link rel="stylesheet" href="{{ asset('css/user/listAllUsers.css') }}">

<div class="containerAllUsers" id="containerAllUsers">
    <div class="user-list" id="content">
        <h2 class="login-title">Lista de Usuários</h2>
        <div class="row">
            @foreach ($users as $user)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $user->name }} (ID: {{ $user->id }})</h5>
                            <p class="card-text">{{ $user->email }}</p>
                            </a>
                            <a href="{{ route('deleteUser', $user->id) }}" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#banModal-{{ $user->id }}">
                                <i class="fa-solid fa-user-slash"></i> Banir
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Modal de Banimento -->
                <div class="modal fade" id="banModal-{{ $user->id }}" tabindex="-1" aria-labelledby="banModalLabel-{{ $user->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="banModalLabel-{{ $user->id }}">Banir Usuário</h5>
                                <i class="fas fa-times" data-bs-dismiss="modal" aria-label="Close" id="close-btn"></i>
                            </div>
                            <div class="modal-body">
                                Você tem certeza que deseja banir este usuário?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">
                                    <i class="fa-solid fa-rotate-left"></i> Voltar
                                </button>
                                <form action="{{ route('deleteUser', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa-solid fa-user-slash"></i> Confirmar Banimento
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
