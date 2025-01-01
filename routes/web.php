<?php

use App\Http\Controllers\FornecedorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

Route::view('/', 'welcome');

Route::get('/produtos', [ProdutoController::class, 'index'])
    ->middleware('auth', 'verified')
    ->name('produtos.index');
  
Route::get('/fornecedores', [FornecedorController::class, 'index'])
    ->middleware('auth', 'verified')  
    ->name('fornecedores.index');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';




// EXEMPLO: Grupo de rotas com autenticação
// Route::middleware('auth', 'verified')->groups('produtos', function() {
//     Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index');
//     Route::get('/produtos/create', [ProdutoController::class, 'create'])->name('produtos.create');
//     Route::post('/produtos', [ProdutoController::class, 'store'])->name('produtos.store');
//     Route::get('/produtos/{produto}/edit', [ProdutoController::class, 'edit'])->name('produtos.edit');
//     Route::put('/produtos/{produto}', [ProdutoController::class, 'update'])->name('produtos.update');
//     Route::delete('/produtos/{produto}', [ProdutoController::class, 'destroy'])->name('produtos.destroy');
// });