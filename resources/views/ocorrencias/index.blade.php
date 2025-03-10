@extends('layouts.app')
@section('content')
    <div class="container mx-auto p-4">
        @if (Auth::user()->tipo === 'morador')
            <div class="block">
                <a class="md:inline-block hidden px-6 py-3.5 text-base font-medium text-white bg-blue-700 hover:bg-blue-800 rounded-full text-center"
                    href="{{ route('ocorrencias.create') }}">Criar Ocorrência</a>
        @endif
        <a class="md:inline-block px-6 py-3.5 text-base font-medium hidden text-white bg-blue-700 hover:bg-blue-800 rounded-full text-center"
            href="{{ route('ocorrencias.map') }}"> Ver no mapa</a>
    </div>

    <div class="text-center text-sm mt-4">
        <ul class="inline-flex font-medium p-1 rounded-full justify-around flex-row bg-gray-300">
            <li>
                <a href="{{ route('ocorrencias', 'pendentes') }}" @class([
                    'block py-2 px-5 text-gray-600 rounded-full' => true,
                    'bg-blue-50' => $status == 'pendentes',
                ]) aria-current="page">Abertas</a>
            </li>
            <li>
                <a href="{{ route('ocorrencias', 'resolvidas') }}" @class([
                    'block py-2 px-5 text-gray-600 rounded-full' => true,
                    'bg-blue-50' => $status == 'resolvidas',
                ])>Resolvidas</a>
            </li>
        </ul>
    </div>
    </div>
    @include('layouts.card')
@endsection
