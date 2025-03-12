<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

// Home > [titulo da ocorrencia]
Breadcrumbs::for('ocorrencias.show ', function ($trail, $ocorrencia) {
    $trail->parent('home');
    $trail->push($ocorrencia->titulo, route('ocorrencias.show'));
});

Breadcrumbs::for('ocorrencias.create', function ($trail) {
    $trail->parent('home');
    $trail->push('Criar ocorrência', route('ocorrencias.create'));
});

// Home > [titulo da ocorrencia] > Editar
Breadcrumbs::for('ocorrencias.edit', function ($trail, $ocorrencia) {
    $trail->parent('ocorrencias.show', $ocorrencia->idOcorrencia);
    $trail->push('Editar Ocorrência', route('ocorrencias.edit'));
});

// Home > Ver no mapa
Breadcrumbs::for('ocorrencias.map', function ($trail) {
    $trail->parent('home');
    $trail->push('Mapa', route('ocorrencias.map'));
});

// Home > Minhas ocorrências

Breadcrumbs::for('list', function ($trail) {
    $trail->parent('home');
    $trail->push('Minhas ocorrências', route('ocorrencias.list'));
});