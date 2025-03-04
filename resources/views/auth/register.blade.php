@extends('layouts.app')

@section('content')
    <h2>Registro</h2>

    <form action="{{ route('register') }}" method="POST">
        @csrf
        <label>Tipo:</label>
        <select name="tipo" required id="tipo">
            <option value="morador">Morador</option>
            <option value="prefeitura">Prefeitura</option>
        </select>

        <label>Nome:</label>
        <input type="text" name="nome" required>

        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Senha:</label>
        <input type="password" name="password" required>

        <label>Confirmar Senha:</label>
        <input type="password" name="password_confirmation" required>

        <div id="endereco-morador">
            <label>Rua:</label>
            <input type="text" name="rua">

            <label>Bairro:</label>
            <input type="text" name="bairro">
        </div>

        <label>Cidade:</label>
        <input type="text" name="cidade" required>

        <button type="submit">Registrar</button>
    </form>

    =====

    <br>
    
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <script>
        document.getElementById('tipo').addEventListener('change', function () {
            document.getElementById('endereco-morador').style.display = this.value === 'morador' ? 'block' : 'none';
        });
    </script>
@endsection


