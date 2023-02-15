<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\TestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [MainController::class, 'main'])->name('site.index');
Route::get('/sobre', [AboutController::class, 'main'])->name('site.about');
Route::get('/contato', [ContactController::class, 'main'])->name('site.contact');
Route::get('/login', [LoginController::class, 'main'])->name('site.login');

Route::prefix('/app')->group( function(){
    Route::get('/clientes', [ClientsController::class, 'main'])->name('app.clients');
    Route::get('/fornecedores', [SupplierController::class, 'main'])->name('app.suppliers');
    Route::get('/produtos', [ProductsController::class, 'main'])->name('app.products');
});

Route::fallback(function(){
    echo 'A rota acessada não existe ou não pode ser localizada. <a href="'.route('site.index').'">clique aqui</a>';
});

route::get('/teste/{p1}/{p2}', [TestController::class, 'main'])->name('teste');

//Atributos para formulário de contato... Nome, categoria, assunto, mensagem
// Route::get('/contato/{nome}/{opcional?}', function( string $nome, string $opcional = "Parametro default" ){
//     echo "Rodando com: $nome - $opcional";
// });
// Route::get('/contato/{nome}/{categoria_id}', function( string $nome, int $categoria_id = 1 ){
//     echo "Rodando com: $nome - $categoria_id";
// })->where('categoria_id', '[0-9]+')->where('nome', '[A-Za-z]+') ; //Um regex de validação do parâmetro de variável!