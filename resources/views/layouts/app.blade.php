<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>HelloComunidade</title>
    <style>
        html,
        body {
            height: 100%;
        }
    </style>
</head>

<body class="h-full">
    @if (Auth::check())
        <nav class="bg-blue-700 flex items-center p-4">
            <div class="text-white text-xl font-medium mx-auto">
                <span id="app-name">
                    HelloComunidade
                </span>
            </div>
            <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                type="button" id="btn-menu"
                class="inline-flex items-center p-2 text-sm text-white-500 rounded-lg sm:hidden hover:opacity-70  cursor-pointer">
                <span class="sr-only">Open sidebar</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="#fff" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd" fill-rule="evenodd"
                        d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                    </path>
                </svg>
            </button>
        </nav>

        <aside id="logo-sidebar"
            class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 border-r border-r-gray-200"
            aria-label="Sidebar">
            <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 ">
                <a href="{{ route('ocorrencias', 'pendentes') }}" class="flex items-center ps-2.5 mb-5">
                    <span class="self-center text-xl font-semibold whitespace-nowrap ">HelloComunidade</span>
                </a>
                <ul class="space-y-2 font-medium">
                    <li>
                        <div class="flex items-center p-2 mb-3 text-gray-900 rounded-lg group">
                            <i class="fa-regular fa-user-circle fa-xl"></i>
                            <span class="ms-3 text-lg">{{ Auth::user()->nome }}</span>
                        </div>
                    </li>
                    <li>
                        <hr class="h-px my-2 bg-gray-200 border-0">
                    </li>
                    <li>
                        <a href="{{ route('ocorrencias.map') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                            <i class="fa-solid fa-map"></i>
                            <span class="ms-3">Ver mapa</span>
                        </a>
                    </li>
                    @if (Auth::user()->tipo == 'morador')
                        <li>
                            <hr class="h-px my-2 bg-gray-200 border-0">
                        </li>
                        <li>
                            <a href="{{ route('ocorrencias.create') }}"
                                class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                                <i class="fa-solid fa-plus"></i>
                                <span class="ms-3">Criar ocorrência</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('ocorrencias.list') }}"
                                class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                                <i class="fa-solid fa-circle-exclamation"></i>
                                <span class="ms-3">Minha ocorrências</span>
                            </a>
                        </li>
                    @endif
                    <li>
                        <hr class="h-px my-2 bg-gray-200 border-0">
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                            <i class="fa-solid fa-sign-out"></i>
                            <span class="ms-3">Sair</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>

        <div class="pb-10 sm:ml-64">
    @endif
    @yield('content')
    @if (Auth::check())
        </div>
    @endif


    <script>
        document.getElementById('btn-menu').addEventListener('click', function() {
            document.getElementById('logo-sidebar').classList.toggle('translate-x-0');
            document.getElementById('app-name').classList.toggle('hidden');

        });
    </script>
</body>

</html>
