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
            $ocorrencias = Ocorrencia::whereJsonContains('endereco->bairro', $user->endereco['bairro'])->get();
        } else {
            $ocorrencias = Ocorrencia::whereJsonContains('endereco->cidade', $user->endereco['cidade'])->get();
        }

        return view('ocorrencias.index', compact('ocorrencias'));
    }

    public function create()
    {
        return view('ocorrencias.create');
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'midia' => 'nullable|string',
        ]);

        Ocorrencia::create([
            'titulo' => $validated['titulo'],
            'descricao' => $validated['descricao'],
            'midia' => $validated['midia'] ?? null,
            'status' => 'pendente',
            'endereco' => $user->endereco,
            'user_id' => $user->id,
        ]);

        return redirect()->route('ocorrencias.index')->with('success', 'Ocorrência criada com sucesso!');
    }
}
