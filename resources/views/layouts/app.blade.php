<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
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
        <nav class="bg-blue-700 border-gray-200 ">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="{{ route('ocorrencias', 'pendentes') }}"
                    class="text-white font-bold text-2xl flex items-center space-x-3 rtl:space-x-reverse"
                    data-cy="welcome">
                    Hello {{ Auth::user()->nome }}!
                </a>
                <div
                    class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse bg-white hover:bg-blue-200  rounded-full text-center">
                    <a href="{{ route('logout') }}"
                        class="block px-4 py-2 text-blue-700 font-bold hover:opacity-50">Sair</a>
                </div>
                @if (Auth::user()->tipo === 'morador')
                    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1"
                        id="navbar-user">
                        <ul
                            class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0">
                            <li>
                                <a href="{{ route('ocorrencias.list') }}"
                                    class="block py-2 px-3 text-white md:hover:opacity-50 rounded-sm" data-cy="myOcs"><i
                                        class="fa-solid fa-file-lines fa-xl"></i><span class="ml-2 text-xl">Minhas
                                        ocorrências</span></a>
                            </li>
                        </ul>
                    </div>
                @endif
            </div>
        </nav>
    @endif
    @yield('content')
    </div>
    @if (Auth::check())
        <ul
            class="flex font-medium p-3 rounded-full justify-around flex-row bg-gray-300 md:hidden mx-5 fixed bottom-4 left-0 right-0">
            <li>
                <a href="{{ route('ocorrencias', 'pendentes') }}"
                    class="block py-2 px-5 text-gray-600 rounded-full bg-blue-50" aria-current="page"><i
                        class="fa-solid fa-house fa-xl"></i></a>
            </li>
            <li>
                <a href="{{ route('ocorrencias.map') }}" class="block py-2 px-5 text-gray-600 rounded-ful"><i
                        class="fa-solid fa-map-location-dot fa-xl"></i></a>
            </li>
            @if (Auth::user()->tipo === 'morador')
                <li class="dropdown">
                    <button id="dropdownButton" class="py-2 px-5 text-gray-600 rounded-full">
                        <i class="fa-solid fa-file-lines fa-xl"></i>
                    </button>
                    <div id="dropdownMenu"
                        class="hidden absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5"
                        style="bottom: 75px">
                        <div class="py-1 " role="menu" aria-orientation="vertical">
                            <div class="flex gap-2">
                                <a href="{{ route('ocorrencias.list') }}"
                                    class="block py-2 px-5 text-gray-600 rounded-full"><i
                                        class="fa-solid fa-circle-exclamation mr-1"></i>Minhas ocorrências</a>
                            </div>
                            <div class="flex gap-2">
                                <a href="{{ route('ocorrencias.create') }}"
                                    class="block py-2 px-5 text-gray-600 rounded-full"><i
                                        class="fa-solid fa-circle-plus mr-1"></i>Criar
                                    ocorrência</a>
                            </div>
                        </div>
                    </div>
                </li>
            @endif
        </ul>
    @endif
    <script>
        const dropdownButton = document.getElementById('dropdownButton');
        const dropdownMenu = document.getElementById('dropdownMenu');

        // Toggle dropdown visibility
        dropdownButton.addEventListener('click', () => {
            dropdownMenu.classList.toggle('hidden');
        });

        document.addEventListener('click', (event) => {
            const isClickInside = dropdownButton.contains(event.target) || dropdownMenu.contains(event.target);
            if (!isClickInside) {
                dropdownMenu.classList.add('hidden');
            }
        });
    </script>
</body>

</html>
