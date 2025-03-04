@extends('layouts.app')

@section('content')
    <h2>Ocorrências</h2>
    <a href="{{ route('ocorrencias.create') }}">Criar Nova Ocorrência</a>

    @foreach ($ocorrencias as $ocorrencia)
        <div>
            <h3>{{ $ocorrencia->titulo }}</h3>
            <p>{{ $ocorrencia->descricao }}</p>
            <p>Status: {{ $ocorrencia->status }}</p>
        </div>
    @endforeach
@endsection
