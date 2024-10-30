<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function listAllUsers() {
        $users = User::all(); // Busca todos os usuários
        return view('users.listAllUsers', ['users' => $users]); // Retorna a view com os dados dos usuários
    }

    public function listUserById(Request $request, $id) {
        $user = User::where('id', $id)->first(); // Busca um usuário pelo ID
        return view('users.profile', ['user' => $user]);
    }

    public function register(Request $request) {
        if ($request->isMethod('GET')) {
            return view('users.create'); // Exibe a página de criação de usuário
        } else {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed', // Valida a confirmação da senha
            ]);
    
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
    
            Auth::login($user);
    
            return redirect()->route('listAllUsers')->with('message-success', 'Usuário registrado e logado com sucesso.');
        }
    }
    
    public function updateUser(Request $request, $id) {
        $user = User::where('id', $id)->first(); // Busca o usuário pelo ID
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id, // Corrigido para permitir o email atual
            'password' => 'nullable|string|min:8|confirmed', // Corrigido para tornar a senha opcional e adicionar confirmação
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('listUserById', [$user->id])->with('message-success', 'Alteração realizada com sucesso.');
    }

    public function deleteUser(Request $request, $id) {
        $user = User::findOrFail($id); // Busca o usuário pelo ID ou retorna erro 404

        try {
            $user->delete();
            return redirect()->route('listAllUsers')->with('message-success', 'Usuário deletado com sucesso.');
        } catch (\Exception $e) {
            return redirect()->route('listAllUsers')->with('message-error', 'Erro ao deletar o usuário.');
        }
    }
}
