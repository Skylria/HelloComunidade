@extends('layouts.app')
@section('content')
    <div class="container mx-auto px-4">
        <nav class="flex py-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                        </svg>
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-700 md:ms-2">{{ $ocorrencia->titulo }}</span>
                    </div>
                </li>
            </ol>
        </nav>
        {{-- <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4"> --}}
        <div class="p-2 max-w-3xl mx-auto bg-white border border-gray-500 rounded-lg shadow-sm">
            <div class="flex p-4 justify-between items-center gap-3">
                <h5 class="text-2xl font-bold tracking-tight text-gray-900" data-cy="showOcTitle">
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
                    class="inline-flex items-center me-2 mb-2 px-5 py-1 text-sm font-medium rounded-full text-center text-white bg-red-400">
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
