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
            'tipo' => 'required|in:morador,prefeitura',
            'nome' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'rua' => 'nullable|required_if:tipo,morador|string|max:255',
            'bairro' => 'nullable|required_if:tipo,morador|string|max:255',
            'cidade' => 'required|string|max:255',
        ]);

        $endereco = ['cidade' => $validated['cidade']];

        if ($validated['tipo'] === 'morador') {
            $endereco['rua'] = $validated['rua'];
            $endereco['bairro'] = $validated['bairro'];
        }

        User::create([
            'tipo' => $validated['tipo'],
            'nome' => $validated['nome'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'endereco' => $endereco
        ]);

        
        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();

        return redirect()->route('ocorrencias.index')->withSuccess('Cadastro realizado com sucesso!');
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
            return redirect()->route('ocorrencias.index');
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