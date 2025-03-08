<?php

namespace App\Http\Controllers;

use App\Models\Reclamacao;
use App\Models\Avaliacao;
use Illuminate\Http\Request;

class AvaliacaoController extends Controller
{
    // Método para armazenar uma nova avaliação
    public function store(Request $request, $id) {
        // Validação dos dados recebidos, garantindo que a satisfação contenha apenas valores permitidos
        $request->validate([
            'satisfacao' => 'required|string|in:Muito satisfeito,Satisfeito,Não satisfeito',
        ]);

        // Busca a reclamação pelo ID ou retorna erro 404 se não for encontrada
        $reclamacao = Reclamacao::findOrFail($id);

        // Verifica se o status da reclamação é "Serviço concluído"
        // Caso contrário, impede a avaliação e retorna um erro
        if ($reclamacao->status !== 'Serviço concluído') {
            return redirect()->back()->with('error', 'A avaliação só pode ser feita após o serviço ser concluído.');
        }

        // Cria a avaliação associada à reclamação
        $reclamacao->avaliacao()->create([
            'satisfacao' => $request->satisfacao,
        ]);

        // Redireciona para a listagem de reclamações com uma mensagem de sucesso
        return redirect()->route('reclamacoes.index')->with('success', 'Avaliação registrada!');
    }
}