<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LogAccessMiddleware;
use App\Http\Controllers\{
                          MainController,
                          ContactController, 
                          AboutController, 
                          LoginController, 
                          ClientsController, 
                          SupplierController, 
                          ProductsController, 
                          ProductDetailController,
                          TestController,
                          HomeController
                        };
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

Route::middleware('log.access')->get('/', [MainController::class, 'main'])->name('site.index');
Route::get('/sobre', [AboutController::class, 'main'])->name('site.about');

Route::get('/contato', [ContactController::class, 'main'])->name('site.contact');
Route::post('/contato', [ContactController::class, 'save'])->name('site.contact');

Route::get('/login/{erro?}', [LoginController::class, 'main'])->name('site.login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('site.login');

Route::middleware('authenticate:default')->prefix('/app')->group( function(){
    Route::get('/home', [HomeController::class, 'main'])->name('app.home');
    Route::get('/sair', [LoginController::class, 'exit'])->name('app.exit');
    Route::get('/cliente', [ClientsController::class, 'main'])->name('app.client');

    Route::get('/fornecedor', [SupplierController::class, 'main'])->name('app.supplier');
    Route::post('/fornecedor/listar', [SupplierController::class, 'list'])->name('app.supplier.list');
    Route::get('/fornecedor/listar', [SupplierController::class, 'list'])->name('app.supplier.list');
    Route::get('/fornecedor/adicionar', [SupplierController::class, 'add'])->name('app.supplier.add');
    Route::post('/fornecedor/adicionar', [SupplierController::class, 'add'])->name('app.supplier.add');
    Route::get('/fornecedor/editar/{id}/{msg?}', [SupplierController::class, 'edit'])->name('app.supplier.edit');
    Route::delete('/fornecedor/deletar/{id}', [SupplierController::class, 'delete'])->name('app.supplier.delete');

    Route::resource('/produto', ProductsController::class);
    Route::resource('/produto-detalhe', ProductDetailController::class);

    // Route::get('/produto', [ProductsController::class, 'index'])->name('app.product');
    // Route::get('/produto/novo', [ProductsController::class, 'create'])->name('app.product.create');
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