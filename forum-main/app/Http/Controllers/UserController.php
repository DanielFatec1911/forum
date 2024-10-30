<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserController extends Controller
{
    

    public function listALLUsers(Request $request){
        $users = User::all();
        return view('user\listALLUser', ['users' => $users]); 
    }
    public function menu_inicial(){
        return view('inicial');
    }
    public function List_user(Request $request , $id){
       //procurar o usuario no banco

       $user = User::where('id' , $id)->first();
        return view('user.profile',['user' => $user]);
    }

    public function Update_user(Request $request , $id){

 
        $user = User::where('id' , $id)->first();

        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password != ''){
            $user->password = Hash::make($request->password);
        }
        $user->save();
         return redirect()
                ->route('listALLUsers')
                ->with('message' , 'atualizado com sucesso');
    }

    public function Delete_user(Request $request , $id){ 
        User::where('id' , $id)->delete();
         return redirect()
                ->route('inicial')
                ->with('message' , 'atualizado com sucesso');
    }
    public function edit_User_id(){

    }
    public function register_user(Request $request){
        if ($request->method() === 'GET'){
            return view('user.register');
            }else{

                $request->validate([
                    'name' => 'required|string|max:255',
                    'email' => 'required|string|max:255|unique:users',
                    'password' => 'required|string|min:8|confirmed'
                ]);
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);

                Auth::login($user);

                return redirect()->route('inicial')
                                 ->with('success', 'Registro realizado com sucesso.');
            
            }
    }

    
}

