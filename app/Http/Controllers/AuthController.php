<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function index(Request $request){
        if(Auth::check()){
            return redirect()->route('home');
        }
        return view('login');
    }

    public function loginAction(Request $request){

        $validator = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if(Auth::attempt($validator)){

            return redirect()->route('home');
        }
        return view('login', ['message' => 'Usuário ou senha incorreta']);
    }

    public function register(Request $request){
        if(Auth::User()){
            return redirect()->route('home');
        }

        return view('register');
    }

    public function registerAction(Request $request){

        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $data = $request->only(['name', 'email', 'password']);
        $data['pasword'] = Hash::make($data['password']);

        $createUser = User::create($data);

        return view('register', ['message' => 'Cadastrado com sucesso']);
    }

    public function logout(){
        Auth::logout();

        return redirect(route('login'));
    }
}
