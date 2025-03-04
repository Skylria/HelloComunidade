<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OcurrencyController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/ocorrencias', [OcurrencyController::class, 'index'])->name('ocorrencias.index');
    Route::get('/ocorrencias/criar', [OcurrencyController::class, 'create'])->name('ocorrencias.create');
    Route::post('/ocorrencias', [OcurrencyController::class, 'store'])->name('ocorrencias.store');
});

// Registro e login de usuários
Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [UserController::class, 'register']);

Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);

Route::post('/logout', [UserController::class, 'logout'])->name('logout');
