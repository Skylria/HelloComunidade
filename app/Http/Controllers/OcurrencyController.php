<?php

namespace App\Http\Controllers;

use App\Models\Ocorrencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OcurrencyController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->tipo === 'morador') {
            // $ocorrencias = Ocorrencia::whereJsonContains('endereco->bairro', $user->endereco['bairro'])->get();
            $ocorrencias = Ocorrencia::where('bairro', $user->bairro)->get();
        } else {
            $ocorrencias = Ocorrencia::where('cidade', $user->cidade)->get();
            // $ocorrencias = Ocorrencia::whereJsonContains('endereco->cidade', $user->endereco['cidade'])->get();
        }

        return view('index', compact('ocorrencias'));
    }

    public function create()
    {
        return view('ocorrencias.create');
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        
        $validated = $request->validate([
            'tipo' => 'required|string',
            'rua' => 'required|string|max:255',
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'midia' => 'nullable|string',
        ]);
        
        Ocorrencia::create([
            'tipo' => $validated['tipo'],
            'titulo' => $validated['titulo'],
            'descricao' => $validated['descricao'],
            'midia' => $validated['midia'] ?? null,
            'status' => 'pendente',
            'rua' => $validated['rua'],
            'bairro' => $user->bairro,
            'cidade' => $user->cidade,
            'user_id' => $user->id,
        ]);

        return redirect()->route('home')->with('success', 'Ocorrência criada com sucesso!');
    }
}