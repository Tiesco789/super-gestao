<?php

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\TesteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PrincipalController::class, 'principal'])->name('site.index');
Route::get('/sobre-nos', [SobreNosController::class, 'sobreNos'])->name('site.sobre-nos');
Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');
Route::post('/contato', [ContatoController::class, 'contato'])->name('site.contato');

Route::get('/login', function() { return 'login'; })->name('site.login');

Route::prefix('/app')->group(function() {
    Route::get('/clientes', function() {return 'clientes'; })->name('app.clientes');
    Route::get('/fornecedores', [FornecedorController::class, 'index'])->name('app.fornecedores');
    Route::get('/produtos', function() { return 'produtos'; })->name('app.produtos');
});

// Rota de teste
Route::get('/teste/{p1}/{p2}', [TesteController::class, 'teste'])->name('teste');

/**
 * A rota de FALLBACK é uma rota que caso não exista a rota acessada, cai diretamente aqui nesta rota de fallback
 * Esta rota pode ser personalizada da forma que desejar
 */
Route::fallback(function() {
    return 'Err0 - a rota acessada não existe';
});
