<?php

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PrincipalController::class, 'principal'])->name('site.index');
Route::get('/sobre-nos', [SobreNosController::class, 'sobreNos'])->name('site.sobre-nos');
Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');

Route::get('/login', function() {
    return 'login';
})->name('site.login');

Route::prefix('/app')->group(function() {
    Route::get('/clientes', function() {return 'clientes'; })->name('app.clientes');
    Route::get('/login', function() { return 'fornecedores'; })->name('app.fornecedores');
    Route::get('/produtos', function() { return 'produtos'; })->name('app.produtos');
});

// Rota de redirecionamento
Route::get('rota1', function() {
    echo 'Rota 1';
})->name('site.rota1');

Route::get('rota2', function() {
    return redirect()->route('site.rota1');
});

// Route::redirect('/rota2', '/rota1');

Route::fallback(function() {
    return 'Err0 - a rota acessada não existe';
});
