@extends('layouts.app')

@section('content')
    <h2>Login</h2>

    <form action="{{ route('login') }}" method="POST">
        @csrf
        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Senha:</label>
        <input type="password" name="password" required>

        <button type="submit">Entrar</button>
    </form>
@endsection
