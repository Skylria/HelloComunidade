<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <title>HelloComunidade</title>
</head>

<body>
    @if (Auth::check())
        <nav class="bg-blue-700 border-gray-200 ">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="#" class="text-white font-bold text-2xl flex items-center space-x-3 rtl:space-x-reverse">
                    Hello Comunidade
                </a>
                <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                    <a href="{{ route('logout') }}"
                        class="block px-4 py-2 text-white font-bold hover:opacity-50">Sair</a>
                </div>
                <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
                    <ul
                        class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0">
                        <li>
                            <a href="/home" class="block py-2 px-3 text-white md:hover:opacity-50 rounded-sm"
                                aria-current="page"><i class="fa-solid fa-house fa-xl"></i><span
                                    class="ml-2 text-xl">Home</span></a>
                        </li>
                        <li>
                            <a href="/notificacoes" class="block py-2 px-3 text-white md:hover:opacity-50 rounded-sm"><i
                                    class="fa-solid fa-bell fa-xl"></i><span
                                    class="ml-2 text-xl">Notificações</span></a>
                        </li>
                        <li>
                            <a href="/ocorrencias" class="block py-2 px-3 text-white md:hover:opacity-50 rounded-sm"><i
                                    class="fa-solid fa-file-lines fa-xl"></i><span class="ml-2 text-xl">Minhas
                                    ocorrências</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="pb-20">
            @yield('content')
        </div>
        <ul
            class="flex font-medium p-3 rounded-full justify-around flex-row bg-gray-300 md:hidden mx-5 fixed bottom-4 left-0 right-0">
            <li>
                <a href="/home" class="block py-2 px-5 text-gray-600 rounded-full bg-blue-50" aria-current="page"><i
                        class="fa-solid fa-house fa-xl"></i></a>
            </li>
            <li>
                <a href="/notificacoes" class="block py-2 px-5 text-gray-600 rounded-full"><i
                        class="fa-solid fa-bell fa-xl"></i></a>
            </li>
            <li>
                <a href="/ocorrencias/criar" class="block py-2 px-5 text-gray-600 rounded-full"><i
                        class="fa-solid fa-file-lines fa-xl"></i></a>
            </li>
        </ul>
    @endif
</body>

</html>
