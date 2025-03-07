@extends('layouts.app')

@section('content')
<h2>Ocorrências</h2>
<a href="{{ route('ocorrencias.create') }}">Criar Nova Ocorrência</a>
@foreach ($ocorrencias as $ocorrencia)
<div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
    <a href="#">
        <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">{{ $ocorrencia->titulo }}
        </h5>
    </a>
    <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">
        {{ $ocorrencia->descricao }}</p>
    <span>Status: {{ $ocorrencia->status }}</span>
</div>
@endforeach

<p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam doloremque at doloribus architecto eaque eveniet
    est nesciunt quo magni, obcaecati quos nemo atque molestiae! Blanditiis assumenda officia minus temporibus
    doloribus!
</p>
<p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam doloremque at doloribus architecto eaque eveniet
    est nesciunt quo magni, obcaecati quos nemo atque molestiae! Blanditiis assumenda officia minus temporibus
    doloribus!
</p>
<p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam doloremque at doloribus architecto eaque eveniet
    est nesciunt quo magni, obcaecati quos nemo atque molestiae! Blanditiis assumenda officia minus temporibus
    doloribus!
</p>
<p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam doloremque at doloribus architecto eaque eveniet
    est nesciunt quo magni, obcaecati quos nemo atque molestiae! Blanditiis assumenda officia minus temporibus
    doloribus!
</p>
<p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam doloremque at doloribus architecto eaque eveniet
    est nesciunt quo magni, obcaecati quos nemo atque molestiae! Blanditiis assumenda officia minus temporibus
    doloribus!
</p>
<p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam doloremque at doloribus architecto eaque eveniet
    est nesciunt quo magni, obcaecati quos nemo atque molestiae! Blanditiis assumenda officia minus temporibus
    doloribus!
</p>
<p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam doloremque at doloribus architecto eaque eveniet
    est nesciunt quo magni, obcaecati quos nemo atque molestiae! Blanditiis assumenda officia minus temporibus
    doloribus!
</p>
<p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam doloremque at doloribus architecto eaque eveniet
    est nesciunt quo magni, obcaecati quos nemo atque molestiae! Blanditiis assumenda officia minus temporibus
    doloribus!
</p>
<p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam doloremque at doloribus architecto eaque eveniet
    est nesciunt quo magni, obcaecati quos nemo atque molestiae! Blanditiis assumenda officia minus temporibus
    doloribus!
</p>
<p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam doloremque at doloribus architecto eaque eveniet
    est nesciunt quo magni, obcaecati quos nemo atque molestiae! Blanditiis assumenda officia minus temporibus
    doloribus!
</p>
<p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam doloremque at doloribus architecto eaque eveniet
    est nesciunt quo magni, obcaecati quos nemo atque molestiae! Blanditiis assumenda officia minus temporibus
    doloribus!
</p>
<p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam doloremque at doloribus architecto eaque eveniet
    est nesciunt quo magni, obcaecati quos nemo atque molestiae! Blanditiis assumenda officia minus temporibus
    doloribus!
</p>
<p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam doloremque at doloribus architecto eaque eveniet
    est nesciunt quo magni, obcaecati quos nemo atque molestiae! Blanditiis assumenda officia minus temporibus
    doloribus!
</p>
<p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam doloremque at doloribus architecto eaque eveniet
    est nesciunt quo magni, obcaecati quos nemo atque molestiae! Blanditiis assumenda officia minus temporibus
    doloribus!
</p>
<p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam doloremque at doloribus architecto eaque eveniet
    est nesciunt quo magni, obcaecati quos nemo atque molestiae! Blanditiis assumenda officia minus temporibus
    doloribus!
</p>
<p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam doloremque at doloribus architecto eaque eveniet
    est nesciunt quo magni, obcaecati quos nemo atque molestiae! Blanditiis assumenda officia minus temporibus
    doloribus!
</p>
<p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam doloremque at doloribus architecto eaque eveniet
    est nesciunt quo magni, obcaecati quos nemo atque molestiae! Blanditiis assumenda officia minus temporibus
    doloribus!
</p>
<p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam doloremque at doloribus architecto eaque eveniet
    est nesciunt quo magni, obcaecati quos nemo atque molestiae! Blanditiis assumenda officia minus temporibus
    doloribus!
</p>
<p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam doloremque at doloribus architecto eaque eveniet
    est nesciunt quo magni, obcaecati quos nemo atque molestiae! Blanditiis assumenda officia minus temporibus
    doloribus!
</p>
<p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam doloremque at doloribus architecto eaque eveniet
    est nesciunt quo magni, obcaecati quos nemo atque molestiae! Blanditiis assumenda officia minus temporibus
    doloribus!
</p>
<p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam doloremque at doloribus architecto eaque eveniet
    est nesciunt quo magni, obcaecati quos nemo atque molestiae! Blanditiis assumenda officia minus temporibus
    doloribus!
</p>
<p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam doloremque at doloribus architecto eaque eveniet
    est nesciunt quo magni, obcaecati quos nemo atque molestiae! Blanditiis assumenda officia minus temporibus
    doloribus!
</p>
<p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam doloremque at doloribus architecto eaque eveniet
    est nesciunt quo magni, obcaecati quos nemo atque molestiae! Blanditiis assumenda officia minus temporibus
    doloribus!
</p>
<p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam doloremque at doloribus architecto eaque eveniet
    est nesciunt quo magni, obcaecati quos nemo atque molestiae! Blanditiis assumenda officia minus temporibus
    doloribus!
</p>
<p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam doloremque at doloribus architecto eaque eveniet
    est nesciunt quo magni, obcaecati quos nemo atque molestiae! Blanditiis assumenda officia minus temporibus
    doloribus!
</p>
<p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam doloremque at doloribus architecto eaque eveniet
    est nesciunt quo magni, obcaecati quos nemo atque molestiae! Blanditiis assumenda officia minus temporibus
    doloribus!
</p>
<p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam doloremque at doloribus architecto eaque eveniet
    est nesciunt quo magni, obcaecati quos nemo atque molestiae! Blanditiis assumenda officia minus temporibus
    doloribus!
</p>
@endsection