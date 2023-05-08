<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    PrincipalController,
    SobreNosController,
    ContatoController,
    FornecedorController
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PrincipalController::class, 'principal'])->name('site.index')->middleware('log.acesso');
Route::get('/sobre-nos', [SobreNosController::class, 'sobreNos'])->name('site.sobrenos');
Route::get('/contato',   [ContatoController::class, 'contato'])->name('site.contato');
Route::post('/contato',  [ContatoController::class, 'salvar'])->name('site.contato');
Route::get('/login',   function(){ return 'Login';})->name('site.login');

Route::prefix('/app')->group(function(){
    Route::middleware('autenticacao')
       ->get('/clientes',   function(){ return 'clientes';})
        ->name('app.clientes');
    Route::middleware('autenticacao')
        ->get('/fornecedores', [FornecedorController::class, 'index'])
        ->name('app.fornecedores');
    Route::middleware('autenticacao')
        ->get('/produtos',   function(){ return 'produtos';})
        ->name('app.produtos');
});


Route::fallback(function(){
    echo 'Essa rota não existe mais.';
});