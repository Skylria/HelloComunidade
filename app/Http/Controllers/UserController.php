<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Exibe a página de registro
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Processa o registro do usuário
    public function register(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'rua' => 'required|string|max:255',
            'bairro' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
        ]);

        User::create([
            'tipo' => 'morador',
            'nome' => $validated['nome'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'rua' => $validated['rua'],
            'bairro' => $validated['bairro'],
            'cidade' => $validated['cidade'],
        ]);

        
        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();

        return redirect()->route('home');
    }

    // Exibe a página de login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Processa o login do usuário
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        }

        return back()->withErrors(['email' => 'Credenciais inválidas']);
    }

    // Logout do usuário
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}