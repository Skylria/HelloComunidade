@extends('layouts.app')

@section('content')
    <section>
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900">
                Bem vindo de volta!
            </a>
            <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                        Faça o login abaixo
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="{{ route('login') }}" method="POST">
                        @csrf
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                            <input type="email" name="email" data-cy="usermail"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5"
                                placeholder="name@company.com" required="">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 d">Senha</label>
                            <input type="password" name="password" data-cy="userpassword" id="password"
                                placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5"
                                required="">
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-blue-600 hover:bg-primary-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                            data-cy="loginsubmit">Entrar</button>
                        <p class="text-sm font-light text-gray-500 d">
                            Não possui conta? <a href="{{ route('register') }}"
                                class="font-bold text-primary-600 hover:underline" data-cy="register">Registre-se</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
