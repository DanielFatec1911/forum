<?php

// app/Http/Controllers/AuthController.php

namespace App\Http\Controllers;

use App\Models\User; // Certifique-se de importar o modelo User
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                return redirect()->intended('/'); // Redirecionar para a página inicial
            }
            return back()->withErrors(['email' => 'Email ou senha inválidos']);
        }
        return view('auth.login');
    }

    public function register(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);

            Auth::login($user);

            return redirect()->route('home')->with('message-success', 'Registro bem-sucedido e login realizado');
        }
        return view('auth.register');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
