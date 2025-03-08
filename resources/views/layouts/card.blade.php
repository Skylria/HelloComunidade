<div class="container mx-auto p-4">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($ocorrencias as $ocorrencia)
            <div class="p-2 max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-50">
                <a href="{{ route('ocorrencias.show', $ocorrencia->id) }}">
                    <div>
                        <p>{{ $ocorrencia->nome }}</p>
                    </div>
                    <div>
                        @if ($ocorrencia->midia == null)
                            <img class="rounded-t-lg object-cover h-60 w-full"
                                src='https://t3.ftcdn.net/jpg/02/48/42/64/360_F_248426448_NVKLywWqArG2ADUxDq6QprtIzsF82dMF.jpg'></i>
                        @else
                            <img class="rounded-t-lg" src="$ocorrencia->midia" />
                        @endif
                    </div>
                    <div class="p-5">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">
                            {{ $ocorrencia->titulo }}</h5>
                        <span
                            class="inline-flex items-center me-2 mb-2 px-5 py-2.5 text-sm font-medium rounded-full text-center text-white bg-red-400 focus:ring-4 focus:outline-none">
                            {{ $ocorrencia->tipo }}
                        </span>
                        <span
                            class="inline-flex items-center me-2 mb-2 px-5 py-2.5 text-sm font-medium rounded-full text-center text-white bg-yellow-400">
                            {{ $ocorrencia->status }}
                        </span>

                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
