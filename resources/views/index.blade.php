@extends('layouts.app')

@section('content')
    <button type="button"
        class="m-10 px-6 py-3.5 text-base font-medium text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center"><a
            href="{{ route('ocorrencias.create') }}">Criar Ocorrência</a></button>
    <div class="container mx-auto p-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($ocorrencias as $ocorrencia)
                <div class=" size-full p-6max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm">
                    @if ($ocorrencia->midia == null)
                        <img class="rounded-t-lg" src='https://static.thenounproject.com/png/777906-200.png'></i>
                    @else
                        <img class="rounded-t-lg" src="$ocorrencia->midia" />
                    @endif
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">
                                {{ $ocorrencia->titulo }}</h5>
                        </a>
                        <span
                            class="inline-flex items-center me-2 mb-2 px-5 py-2.5 text-sm font-medium rounded-full text-center text-white bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-yellow-100">
                            {{ $ocorrencia->status }}
                        </span>
                        <a href="{{ route('ocorrencias.show') }}"
                            class="inline-flex items-center me-2 mb-2 px-5 py-2.5 text-sm font-medium rounded-full text-center text-white bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-yellow-100">
                            Detalhes
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
