<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\QuemSomosController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PedidoProdutoController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ProdutoDetalheController;
use App\Http\Middleware\LogAcessoMiddleware;

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

Route::get('/', [IndexController::class, 'index'])->name('site.index');

Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');
Route::post('/contato', [ContatoController::class, 'salvar'])->name('site.contato');

Route::get('/login/{falha?}', [LoginController::class, 'index'])->name('site.login');
Route::post('/login', [LoginController::class, 'autenticar'])->name('site.autenticar');

Route::get('/quem-somos', [QuemSomosController::class, 'quemSomos'])->name('site.quemsomos');

Route::prefix('/app')->middleware('autenticacao')->group( function() {
    Route::get('/home', [HomeController::class, 'index'])->name('app.home');
    Route::get('/sair', [LoginController::class, 'sair'])->name('app.sair');
    // Route::get('/cliente', [ClienteController::class, 'index'])->name('app.cliente');

    Route::resource('produto', ProdutoController::class)->names([
        'index' => 'app.produto.index',
        'create' => 'app.produto.create',
        'store' => 'app.produto.store',
        'show' => 'app.produto.show',
        'edit' => 'app.produto.edit',
        'update' => 'app.produto.update',
        'destroy' => 'app.produto.destroy'
    ]);

    Route::resource('produto-detalhe', ProdutoDetalheController::class)->names([
        'index' => 'app.produto_detalhe.index',
        'create' => 'app.produto_detalhe.create',
        'store' => 'app.produto_detalhe.store',
        'show' => 'app.produto_detalhe.show',
        'edit' => 'app.produto_detalhe.edit',
        'update' => 'app.produto_detalhe.update',
        'destroy' => 'app.produto_detalhe.destroy'
    ]);

    Route::resource('cliente', ClienteController::class);
    Route::resource('pedido', PedidoController::class);
    // Route::resource('pedido-produto', PedidoProdutoController::class);
    Route::get('pedido-produto/create/{pedido}', [PedidoProdutoController::class, 'create'])->name('app.pedido-produto.create');
    Route::post('pedido-produto/store/{pedido}', [PedidoProdutoController::class, 'store'])->name('app.pedido-produto.store');

    Route::get('/fornecedor', [FornecedorController::class, 'index'])->name('app.fornecedor');
    Route::post('/fornecedor/listar', [FornecedorController::class, 'listar'])->name('app.fornecedor.listar');
    Route::get('/fornecedor/listar', [FornecedorController::class, 'listar'])->name('app.fornecedor.listar');
    Route::get('/fornecedor/adicionar', [FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', [FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');
    Route::get('/fornecedor/editar/{id}/{msg?}', [FornecedorController::class, 'editar'])->name('app.fornecedor.editar');
    Route::get('/fornecedor/excluir/{id}/', [FornecedorController::class, 'excluir'])->name('app.fornecedor.excluir');
});

//Fallback
Route::fallback( function() {
    echo 'Rota inesistente - <a href="'.route('site.index').'">Voltar</a>';
});

//Rotas redirecionamento
Route::get('/rota1', function() {
    echo 'Rota 1';
})->name('site.rota1');

Route::get('/rota2', function() {
    return redirect()->route('site.rota1');
})->name('site.rota2');



