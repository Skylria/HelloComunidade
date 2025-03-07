@extends('layouts.app')

@section('content')
    <button type="button"
        class="my-10 px-6 py-3.5 text-base font-medium text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center"><a
            href="{{ route('ocorrencias.create') }}">Criar Nova Ocorrência</a></button>
    <div class="container mx-auto p-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($ocorrencias as $ocorrencia)
                <div class="size-full p-6 bg-white border border-gray-200 rounded-lg shadow-sm">
                    <a href="#">
                        <h5 class="text-center mb-2 text-2xl font-semibold tracking-tight text-gray-900">
                            {{ $ocorrencia->titulo }}
                        </h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-500 text-center">
                        {{ $ocorrencia->descricao }}</p>
                    <span><button type="button"
                            class="text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2">{{ $ocorrencia->status }}</button></span>
                </div>
            @endforeach
        </div>
    </div>
@endsection
