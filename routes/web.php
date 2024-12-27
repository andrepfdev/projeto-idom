<?php

use App\Http\Controllers\FornecedorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

Route::view('/', 'produtos.index');

Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index');


Route::get('/fornecedores', [FornecedorController::class, 'index'])->name('fornecedores.index');



Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
