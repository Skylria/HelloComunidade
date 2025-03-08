<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OcorrenciaController;
use App\Http\Controllers\UserController;

Route::middleware('auth')->group(function () {
    Route::get('/ocorrencias/list/{status}', [OcorrenciaController::class, 'index'])->name('ocorrencias');
    Route::resource('ocorrencias', OcorrenciaController::class)->except('index', 'destroy');
    // Route::get('/index/{pendentes}', [OcorrenciaController::class,'index'])->name('index');
});

// Route::get('/reclamacoes', [ReclamacaoController::class, 'index'])->name('reclamacoes.index');
// Route::post('/reclamacoes', [ReclamacaoController::class, 'store'])->name('reclamacoes.store');
// Route::put('/reclamacoes/{id}/status', [ReclamacaoController::class, 'updateStatus'])->name('reclamacoes.updateStatus');

// // Rota para avaliações
// Route::post('/reclamacoes/{id}/avaliar', [AvaliacaoController::class, 'store'])->name('reclamacoes.avaliar');
// Registro e login de usuários
Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [UserController::class, 'register']);

Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);

Route::get('/logout', [UserController::class, 'logout'])->name('logout');