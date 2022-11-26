<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\QuemSomosController;

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
Route::post('/contato', [ContatoController::class, 'contato'])->name('site.contato');

Route::get('/quem-somos', [QuemSomosController::class, 'quemSomos'])->name('site.quemsomos');

Route::prefix('/app')->group( function() {
    Route::get('/clientes', function() {
        return 'Clientes';
    });
    Route::get('/fornecedores', function() {
        return 'Fornecedores';
    });
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



