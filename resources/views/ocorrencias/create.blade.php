@extends('layouts.app')

@section('content')
    <h2>Criar Nova Ocorrência</h2>
    <form action="{{ route('ocorrencias.store') }}" method="POST">
        @csrf
        <label>Título:</label>
        <input type="text" name="titulo" required>

        <label>Descrição:</label>
        <textarea name="descricao" required></textarea>

        <button type="submit">Salvar</button>
    </form>
@endsection
