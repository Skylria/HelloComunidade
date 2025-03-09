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

        if (Auth::user()->tipo === 'morador') {
            $ocorrencias = DB::table('ocorrencias')
                ->join('users', 'users.id', '=', 'ocorrencias.user_id')
                ->where('ocorrencias.bairro', '=', Auth::user()->bairro)
                ->where('ocorrencias.status', '=', $statusFilter)
                ->select('ocorrencias.*', 'users.nome')
                ->get();
        } else {
            $ocorrencias = DB::table('ocorrencias')
                ->join('users', 'users.id', '=', 'ocorrencias.user_id')
                ->where('ocorrencias.cidade', '=', Auth::user()->cidade)
                ->where('ocorrencias.status', '=', $statusFilter)
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

        $midia = $request->file('midia');
        $midiaBase64 = null;

        if ($midia != null) {
            $path = $midia->getRealPath();
            $image = file_get_contents($path);
            $midiaBase64 = base64_encode($image);
        }

        $validated = $request->validate([
            'tipo' => 'required|string',
            'rua' => 'required|string|max:255',
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'midia' => 'nullable|file',
        ]);

        Ocorrencia::create([
            'tipo' => $validated['tipo'],
            'titulo' => $validated['titulo'],
            'descricao' => $validated['descricao'],
            'midia' => $midiaBase64,
            'status' => 'pendente',
            'rua' => $validated['rua'],
            'bairro' => $user->bairro,
            'cidade' => $user->cidade,
            'user_id' => $user->id,
        ]);

        return redirect()->route('ocorrencias', 'pendentes');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ocorrencia $ocorrencia)
    {
        $ocorrencia = DB::table('ocorrencias')
            ->join('users', 'users.id', '=', 'ocorrencias.user_id')
            ->where('ocorrencias.id', '=', $ocorrencia->id)
            ->select('ocorrencias.*', 'users.nome')
            ->first();
        return view('ocorrencias.show', compact('ocorrencia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ocorrencia $ocorrencia)
    {
        return view('ocorrencias.edit', compact('ocorrencia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ocorrencia $ocorrencia)
    {
        if (Auth::user()->tipo == 'prefeitura') {
            $ocorrencia->status = 'resolvido';
            $ocorrencia->save();
            return redirect()->route('ocorrencias', 'resolvidas');
        } else {
            $validated = $request->validate([
                'tipo' => 'required|string',
                'rua' => 'required|string|max:255',
                'titulo' => 'required|string|max:255',
                'descricao' => 'required|string',
            ]);
            $ocorrencia->update($validated);
            return redirect()->route('ocorrencias', 'pendentes');
        }

    }

    public function list()
    {
        $ocorrencias = DB::table('ocorrencias')
            ->select('ocorrencias.*')
            ->where('ocorrencias.user_id', '=', Auth::user()->id)
            ->get();
        return view('ocorrencias.userlist', compact('ocorrencias'));
    }

    public function showMap()
    {
        $ocorrencias = DB::table('ocorrencias')
            ->join('users', 'users.id', '=', 'ocorrencias.user_id')
            ->where('ocorrencias.bairro', '=', Auth::user()->bairro)
            ->where('ocorrencias.status', '=', 'pendente')
            ->select('ocorrencias.*', 'users.nome')
            ->get();
        return view('ocorrencias.map', compact('ocorrencias'));
    }
}