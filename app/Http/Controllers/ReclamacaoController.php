<?php 

namespace App\Http\Controllers;

use App\Models\Reclamacao;
use Illuminate\Http\Request;

class ReclamacaoController extends Controller
{
    // Método para listar todas as reclamações com seus relacionamentos (usuário e avaliação)
    public function index() {
        $reclamacoes = Reclamacao::with('usuario', 'avaliacao')->get();
        return view('reclamacoes.index', compact('reclamacoes'));
    }

    // Método para cadastrar uma nova reclamação
    public function store(Request $request) {
        // Validação dos dados recebidos
        $request->validate([
            'descricao' => 'required|string|max:255',
        ]);

        // Criação da reclamação associada ao usuário autenticado
        Reclamacao::create([
            'descricao' => $request->descricao,
            'usuario_id' => auth()->id(), // Obtém o ID do usuário autenticado
            'status' => 'Reclamação recebida', // Define o status inicial
        ]);

        // Redireciona para a listagem de reclamações com uma mensagem de sucesso
        return redirect()->route('reclamacoes.index')->with('success', 'Reclamação registrada!');
    }

    // Método para atualizar o status da reclamação
    public function updateStatus(Request $request, $id) {
        // Validação do status recebido
        $request->validate([
            'status' => 'required|string|in:Equipe acionada,Serviço em execução,Serviço concluído',
        ]);

        // Busca a reclamação pelo ID ou retorna um erro 404 se não for encontrada
        $reclamacao = Reclamacao::findOrFail($id);
        
        // Atualiza o status da reclamação
        $reclamacao->update(['status' => $request->status]);

        // Redireciona para a listagem de reclamações com uma mensagem de sucesso
        return redirect()->route('reclamacoes.index')->with('success', 'Status atualizado!');
    }
}