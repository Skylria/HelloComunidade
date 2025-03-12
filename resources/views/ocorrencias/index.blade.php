@extends('layouts.app')
@section('content')
    @if (session('create-success'))
        <div class="bg-green-500 text-white px-10 py-2.5 my-2.5">
            {{ session('create-success') }}
        </div>
    @elseif (session('edit-success'))
        <div class="bg-green-500 text-white px-10 py-2.5 my-2.5">
            {{ session('edit-success') }}
        </div>
    @endif

    <div class="container mx-auto p-4">
        <div class="text-left text-sm mt-4">
            <ul class="inline-flex font-medium p-1 rounded-full justify-around flex-row bg-gray-300">
                <li>
                    <a href="{{ route('ocorrencias', 'pendentes') }}" @class([
                        'block py-2 px-5 text-gray-600 rounded-full' => true,
                        'bg-blue-50' => $status == 'pendentes',
                    ])
                        aria-current="page">Abertas</a>
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
