@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Reclamações</h1>

        <!-- Formulário para cadastrar reclamação -->
        <form action="{{ route('reclamacoes.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea name="descricao" id="descricao" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Registrar Reclamação</button>
        </form>

        <!-- Lista de reclamações -->
        <div class="mt-4">
            @foreach ($reclamacoes as $reclamacao)
                <div class="card mb-3">
                    <div class="card-body">
                        <p>{{ $reclamacao->descricao }}</p>
                        <p>Status: {{ $reclamacao->status }}</p>

                        <!-- Formulário para atualizar status (apenas para a prefeitura) -->
                        @if (auth()->user()->isAdmin())
                            <form action="{{ route('reclamacoes.updateStatus', $reclamacao->id) }}" method="POST"
                                class="mb-2">
                                @csrf
                                @method('PUT')
                                <select name="status" class="form-control">
                                    <option value="Equipe acionada">Equipe acionada</option>
                                    <option value="Serviço em execução">Serviço em execução</option>
                                    <option value="Serviço concluído">Serviço concluído</option>
                                </select>
                                <button type="submit" class="btn btn-sm btn-warning mt-2">Atualizar Status</button>
                            </form>
                        @endif

                        <!-- Formulário para avaliar serviço (apenas para cidadãos) -->
                        @if ($reclamacao->status === 'Serviço concluído' && !$reclamacao->avaliacao && auth()->user()->isCidadao())
                            <form action="{{ route('reclamacoes.avaliar', $reclamacao->id) }}" method="POST">
                                @csrf
                                <select name="satisfacao" class="form-control">
                                    <option value="Muito satisfeito">Muito satisfeito</option>
                                    <option value="Satisfeito">Satisfeito</option>
                                    <option value="Não satisfeito">Não satisfeito</option>
                                </select>
                                <button type="submit" class="btn btn-sm btn-success mt-2">Avaliar Serviço</button>
                            </form>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
