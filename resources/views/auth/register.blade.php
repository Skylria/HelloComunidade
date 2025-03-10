@extends('layouts.app')

@section('content')
    <section class="bg-aliceblue dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                        Registre-se
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="{{ route('register') }}" method="POST">
                        @csrf
                        <div>
                            <label for="nome" class="block mb-2 text-sm font-medium text-gray-900">Nome</label>
                            <input type="text" name="nome" data-cy="name" id="nome"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                                placeholder="Fulano de Tal" required="">
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">
                                Email</label>
                            <input type="email" name="email" data-cy="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                                placeholder="email@email.com" required="">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Senha</label>
                            <input type="password" name="password" data-cy="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                                required="">
                        </div>
                        <div>
                            <label for="confirm-password" class="block mb-2 text-sm font-medium text-gray-900">Confirmar
                                Senha</label>
                            <input type="password" name="password_confirmation" data-cy="confirm-password"
                                id="confirm-password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                                required="">
                        </div>
                        <div id="endereco-morador">
                            <label for="rua" class="block mb-2 text-sm font-medium text-gray-900">
                                Rua:</label>
                            <input type="text" name="rua" data-cy="street"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">

                            <label for="bairro" class="block mb-2 text-sm font-medium text-gray-900">
                                Bairro:</label>
                            <input type="text" name="bairro" data-cy="neighbour"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                            <label for="cidade" class="block mb-2 text-sm font-medium text-gray-900">Cidade:</label>
                            <input type="text" name="cidade" data-cy="city"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                                required>
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
                        <button type="submit" data-cy="submit"
                            class="w-full text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Criar
                            conta</button>
                        <p class="text-sm font-light text-gray-500">
                            Já tem uma conta? <a href="{{ route('login') }}"
                                class="font-bold text-primary-600 hover:underline" data-cy="login">Faça login</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
        <br>
    </section>
@endsection
