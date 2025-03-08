<?php

namespace App\Http\Controllers;

use App\Models\Ocorrencia;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OcorrenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($status)
    {
        $statusFilter = $status == 'pendentes' ? 'pendente' : 'resolvido';

        $user = Auth::user();
        if ($user->tipo === 'morador') {
            $ocorrencias = DB::table('ocorrencias')
                ->join('users', 'users.id', '=', 'ocorrencias.user_id')
                ->where('ocorrencias.bairro', '=', $user->bairro)
                ->where( 'ocorrencias.status', '=', $statusFilter)
                ->select('ocorrencias.*', 'users.nome')
                ->get();
        } else {
            $ocorrencias = DB::table('ocorrencias')
            ->join('users', 'users.id', '=', 'ocorrencias.user_id')
            ->where('ocorrencias.cidade', '=', $user->cidade)
            ->select('ocorrencias.*', 'users.nome')
            ->get();
        }
        
        return view('ocorrencias.index', [
            'ocorrencias' => $ocorrencias,
            'status' => $status
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ocorrencias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
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

        return redirect()->route('ocorrencias.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ocorrencia $ocorrencia)
    {
        return view('ocorrencias.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ocorrencia $ocorrencia)
    {
        return view('ocorrencias.edit', compact('ocorrencias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ocorrencia $ocorrencia)
    {   
        $validated = $request->validate([
            'tipo' => 'required|string',
            'rua' => 'required|string|max:255',
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'midia' => 'nullable|string',
        ]);

        $ocorrencia->update($validated);
        return redirect()->route('ocorrencias.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ocorrencia $ocorrencia)
    {
        $ocorrencia->delete();
        return redirect()->route('ocorrencias.index');
    }
}