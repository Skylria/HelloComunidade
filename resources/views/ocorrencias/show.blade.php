@extends('layouts.app')
@section('content')
    <div class="container mx-auto p-4">
        {{-- <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4"> --}}
        <div class="p-2 max-w-3xl mx-auto bg-white border border-gray-500 rounded-lg shadow-sm">
            <div class="flex p-4 justify-between items-center gap-3">
                <h5 class="text-2xl font-bold tracking-tight text-gray-900">
                    {{ $ocorrencia->titulo }}</h5>
                @if (Auth::user()->tipo === 'prefeitura' && $ocorrencia->status != 'resolvido')
                    <button id="btnEditar"
                        class="px-5 py-2 text-sm font-medium rounded-full text-center text-white bg-blue-800">
                        Alterar Status
                    </button>
                @endif
                @if (Auth::user()->tipo === 'morador' && Auth::user()->id === $ocorrencia->user_id && $ocorrencia->status != 'resolvido')
                    <a href="{{ route('ocorrencias.edit', $ocorrencia->id) }}"
                        class="px-5 py-2 text-sm font-medium rounded-full text-center text-white bg-blue-800">
                        Editar
                    </a>
                @endif
            </div>
            <div>
                @if ($ocorrencia->midia == null)
                    <img class="object-cover w-full"
                        src='https://t3.ftcdn.net/jpg/02/48/42/64/360_F_248426448_NVKLywWqArG2ADUxDq6QprtIzsF82dMF.jpg'></i>
                @else
                    <img class="object-cover w-full" src="data:image/png;base64, {{ $ocorrencia->midia }}" />
                @endif
            </div>
            <div class="p-5">
                <span @class([
                    'inline-flex items-center me-2 mb-2 px-5 py-2.5 text-sm font-medium rounded-full text-center text-white' => true,
                    'bg-yellow-400' => $ocorrencia->status == 'pendente',
                    'bg-green-600' => $ocorrencia->status == 'resolvido',
                ])
                    class="inline-flex items-center me-2 mb-2 px-5 py-2.5 text-sm font-medium rounded-full text-center text-white bg-yellow-400">
                    {{ $ocorrencia->status }}
                </span>
                <div class="flex p-4 gap-2 items-center">
                    <i class="fa-solid fa-circle-user fa-xl"></i>
                    <p class=" text-xl font-bold">{{ $ocorrencia->nome }}</p>
                </div>
                {{-- <p class="mb-2 pt-5"> Criado por: <span class="font-bold">{{ $ocorrencia->nome }}</span></p> --}}
                <p class="mb-2 py-5 tracking-tight text-gray-900">{{ $ocorrencia->descricao }}</p>
                <span
                    class="inline-flex items-center me-2 mb-2 px-5 py-1 text-sm font-medium rounded-full text-center text-white bg-red-400 focus:ring-4 focus:outline-none">
                    #{{ $ocorrencia->tipo }}
                </span>


            </div>
        </div>
        {{-- </div> --}}
    </div>

    <form id="confirmForm" action="{{ route('ocorrencias.update', $ocorrencia->id) }}" method="POST">
        @csrf
    </form>

    <script>
        btn = document.getElementById('btnEditar');

        btn.addEventListener("click", function() {
            if (confirm("Você tem certeza que deseja alterar o status para 'Resolvido'?")) {
                document.getElementById("confirmForm").submit();
            }
        });
    </script>
@endsection
