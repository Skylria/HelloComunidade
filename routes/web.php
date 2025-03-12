<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OcorrenciaController;
use App\Http\Controllers\UserController;

Route::middleware('auth')->group(function () {
    Route::get('/ocorrencias/list/{status}', [OcorrenciaController::class, 'index'])->name('ocorrencias');
    Route::get('/ocorrencias/map', [OcorrenciaController::class, 'geocode'])->name('ocorrencias.map');
    Route::get('/ocorrencias/myoccurrences', [OcorrenciaController::class, 'list'])->name('ocorrencias.list');
    Route::post('/ocorrencias/{ocorrencia}/update', [OcorrenciaController::class, 'update'])->name('ocorrencias.update');
    Route::resource('ocorrencias', OcorrenciaController::class)->except('index', 'update', 'destroy');

    Route::post('/ocorrencias/update-like', [OcorrenciaController::class, 'updateLike'])->name('update.like');

    Route::get('/', function () {
        return to_route('ocorrencias', 'pendentes');
    })->name('home');

});

Route::get('/register', [UserController::class, 'showRegisterForm'])->name(name: 'register');
Route::post('/register', [UserController::class, 'register']);

Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);

Route::get('/logout', [UserController::class, 'logout'])->name('logout');