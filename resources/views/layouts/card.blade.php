<div class="container mx-auto p-4">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($ocorrencias as $ocorrencia)
            <div class="p-3 bg-white border-2 border-blue-500 rounded-lg hover:shadow-lg hover:scale-101 transition-all">
                <a class="flex flex-col h-full justify-between" href="{{ route('ocorrencias.show', $ocorrencia->id) }}"
                    data-cy="showcard">
                    <div>
                        @if (property_exists($ocorrencia, 'nome'))
                            <div class="flex gap-2 items-center pb-3 text-gray-900">
                                <i class="fa-regular fa-circle-user fa-lg text-gray-900"></i>
                                <p class=" text-md font-medium">{{ $ocorrencia->nome }}</p>
                            </div>
                        @endif
                        <div>
                            @if ($ocorrencia->midia == null)
                                <img class="object-cover h-60 w-full bg-gray-400"
                                    src='https://upload.wikimedia.org/wikipedia/commons/thumb/3/3f/Placeholder_view_vector.svg/681px-Placeholder_view_vector.svg.png?20220519031949'></i>
                            @else
                                <img class="object-cover h-60 w-full"
                                    src="data:image/png;base64, {{ $ocorrencia->midia }}" />
                            @endif
                            <hr class="h-px bg-gray-200 border-0">
                        </div>

                        <div>
                            <div class="mb-1 text-lg font-medium mt-3 text-gray-900" data-cy="ocTitle">
                                {{ $ocorrencia->titulo }}
                            </div>
                            <div class="text-sm text-gray-500 mb-2" data-cy="ocDescription">
                                {{ $ocorrencia->descricao }}
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between items-center">
                            <div>
                                <span
                                    class="inline-flex items-center px-4 py-1 text-sm font-medium rounded-full text-center text-white bg-red-400">
                                    {{ $ocorrencia->tipo }}
                                </span>
                                <span @class([
                                    'inline-flex items-center px-4 py-1 text-sm font-medium rounded-full text-center text-white' => true,
                                    'bg-yellow-400' => $ocorrencia->status == 'pendente',
                                    'bg-green-600' => $ocorrencia->status == 'resolvido',
                                ])
                                    class="inline-flex items-center me-2 px-5 py-2.5 text-sm font-medium rounded-full text-center text-white bg-yellow-400">
                                    {{ $ocorrencia->status }}
                                </span>
                            </div>
                            <div class="flex items-center gap-1">
                                <div class="text-xs text-gray-900">{{ $ocorrencia->like }}</div>

                                <form id="confirmForm" action="{{ route('update.like') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="idOcorrencia" value="{{ $ocorrencia->id }}">
                                    <button @disabled(Auth::user()->tipo == 'prefeitura')
                                        class="cursor-pointer size-[32px] flex items-center justify-center rounded-full hover:bg-gray-100 transition-all">
                                        <i class="fa-regular fa-thumbs-up fa-xl text-blue-600"></i>
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    @if (count($ocorrencias) === 0)
        <x-nenhuma-ocorrencia-component />
    @endif
</div>
