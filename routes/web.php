<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    PrincipalController,
    SobreNosController,
    ContatoController,
    FornecedorController,
    LoginController
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
Route::get('/login', [LoginController::class, 'index'])->name('site.login');
Route::post('/login', [LoginController::class, 'autenticar'])->name('site.login');

Route::middleware('autenticacao:padrao')->prefix('/app')->group(function(){
    Route::get('/clientes',   function(){ return 'clientes';})
        ->name('app.clientes');
    Route::get('/fornecedores', [FornecedorController::class, 'index'])
        ->name('app.fornecedores');
    Route::get('/produtos',   function(){ return 'produtos';})
        ->name('app.produtos');
});


Route::fallback(function(){
    echo 'Essa rota não existe mais.';
});