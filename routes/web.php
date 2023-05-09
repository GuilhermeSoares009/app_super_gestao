<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ClienteController,
    PrincipalController,
    SobreNosController,
    ContatoController,
    FornecedorController,
    HomeController,
    LoginController,
    ProdutoController
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
Route::get('/login/{erro?}', [LoginController::class, 'index'])->name('site.login');
Route::post('/login', [LoginController::class, 'autenticar'])->name('site.login');

Route::middleware('autenticacao:padrao')->prefix('/app')->group(function(){
    Route::get('/home', [HomeController::class, 'index'])->name('app.home');
    Route::get('/sair', [LoginController::class, 'sair'])->name('app.sair');
    Route::get('/cliente', [ClienteController::class, 'index'])->name('app.cliente');
    Route::get('/fornecedor', [FornecedorController::class, 'index'])->name('app.fornecedor');
    Route::get('/produto', [ProdutoController::class, 'index'])->name('app.produto');
});


Route::fallback(function(){
    echo 'Essa rota não existe mais.';
});