@extends('layouts.app')

@section('content')
    <section class="bg-white">
        <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900">Editar
                ocorrência</h2>
            <p class="mb-8 lg:mb-16 font-light text-center text-gray-500 sm:text-xl">Informe abaixo qual
                é o problema existente na sua localidade</p>
            <form action="{{ route('ocorrencias.update', $ocorrencia->id) }}" method="POST" class="space-y-8">
                @csrf
                <div>
                    <label for="ocorrencias" class="block mb-2 text-sm font-bold text-gray-900">Selecione
                        um problema</label>
                    <select id="tipo" name="tipo"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                        <option selected>{{ $ocorrencia->tipo }}</option>
                        <option value="vazamento">
                            Vazamento</option>
                        <option value="Entupimento">Entupimento</option>
                        <option value="Deslizamento">Deslizamento de barreira</option>
                        <option value="Enchente">Risco de Enchente</option>
                        <option value="Entulho">Retirada de Entulho</option>
                        <option value="Outros">Outros...</option>
                    </select>
                </div>
                <div>
                    <label for="rua" class="block mb-2 text-sm font-bold text-gray-900">Local</label>
                    <input type="text" id="nome" name="rua"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                        placeholder="Rua tal" value="{{ $ocorrencia->rua }}" required>
                </div>
                <div>
                    <label for="título" class="block mb-2 text-sm font-bold text-gray-900">Título</label>
                    <input type="text" id="title" name="titulo"
                        class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm"
                        placeholder="Ex: Buraco na rua" value="{{ $ocorrencia->titulo }}" required>
                </div>
                <div class="sm:col-span-2">
                    <label for="descrição" class="block mb-2 text-sm font-bold text-gray-900 ">Descrição</label>
                    <textarea id="message" name="descricao" rows="6"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300"
                        placeholder="Descreva seu problema...">{{ $ocorrencia->descricao }}</textarea>
                </div>
                <div class="flex items-center justify-center w-full">
                    <label for="dropzone-file"
                        class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                            </svg>
                            <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Clique para
                                    escolher arquivo</span> ou arraste até aqui</p>
                            <p class="text-xs text-gray-500">SVG, PNG, JPG ou GIF
                            </p>
                        </div>
                        <input id="dropzone-file" type="file" class="hidden" />
                    </label>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <button type="submit"
                    class="py-3 px-5 text-sm font-bold text-center text-white rounded-lg bg-blue-700 sm:w-fit hover:bg-blue-800">Editar
                    Ocorrência</button>
            </form>
        </div>
    </section>
@endsection
