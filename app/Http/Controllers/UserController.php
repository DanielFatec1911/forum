<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    // Função para visualizar todos os usuários
    public function listAllUsers()
    {
        $users = User::all();
        return view('users.listAllUsers', ['users' => $users]);
    }

    // Função para visualizar o perfil do usuário logado
    public function viewProfile()
    {
        return view('users.profile', ['user' => Auth::user()]);
    }

    // Função para atualizar o perfil do usuário logado
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'password' => 'nullable|string|min:8|confirmed',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->hasFile('photo')) {
            if ($user->photo) {
                Storage::delete('public/' . $user->photo);
            }
            $user->photo = $request->file('photo')->store('profiles', 'public');
        }

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('profile')->with('success', 'Perfil atualizado com sucesso!');
    }

    // Função para registrar um novo usuário
    public function register(Request $request)
    {
        if ($request->isMethod('GET')) {
            return view('users.create');
        } else {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            Auth::login($user);

            return redirect()->route('listAllUsers')->with('message-success', 'Usuário registrado com sucesso');
        }
    }

    // Função para deletar um usuário
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('listAllUsers')->with('message-success', 'Usuário excluído com sucesso');
    }

    // Função para suspender ou reativar um usuário
    public function toggleSuspension($id)
    {
        $user = User::findOrFail($id);

        $user->is_suspended = !$user->is_suspended;
        $user->save();

        $status = $user->is_suspended ? 'suspensa' : 'reativada';
        return redirect()->back()->with('success', "Conta do usuário {$user->name} foi {$status} com sucesso!");
    }
}
