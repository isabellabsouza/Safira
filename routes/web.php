<?php

use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [PedidoController::class, 'index'])->name('profile.pedidos');
    Route::get('/profile/enderecos', [ProfileController::class, 'enderecos'])->name('profile.enderecos');
    Route::get('profile/info', [ProfileController::class, 'info'])->name('profile.info');
    Route::get('profile/trocar-senha', [ProfileController::class, 'trocarSenha'])->name('profile.senha');
    
    Route::get('/endereco', [EnderecoController::class, 'create'])->name('endereco.create');
    Route::post('/endereco', [EnderecoController::class, 'store'])->name('endereco.store');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    

    Route::get('/carrinho', [CarrinhoController::class, 'index'])->name('carrinho.index');
    Route::post('/carrinho', [CarrinhoController::class, 'store'])->name('carrinho.store');
    Route::put('/carrinho', [CarrinhoController::class, 'update'])->name('carrinho.update');
    Route::delete('/carrinho/excluir/{id}', [CarrinhoController::class, 'destroy'])->name('carrinho.destroy');

    Route::post('/pedido', [PedidoController::class, 'store'])->name('pedido.store');
    Route::get('/pedido/{id}', [PedidoController::class, 'show'])->name('pedido.show');
});

Route::middleware(['auth', 'role:user'])->group(function (){
    
});

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'pedidos'])->name('dashboard.pedidos');
    Route::get('/dashboard/usuarios', [DashboardController::class, 'usuarios'])->name('dashboard.usuarios');
    Route::get('/dashboard/produtos', [DashboardController::class, 'produtos'])->name('dashboard.produtos');

    Route::get('/produto', [ProdutoController::class, 'create'])->name('produto.create');
    Route::post('/produto', [ProdutoController::class, 'store'])->name('produto.store');
    Route::get('/produto/{id}/edit', [ProdutoController::class, 'edit'])->name('produto.edit');
    Route::patch('/produto/{id}', [ProdutoController::class, 'update'])->name('produto.update');
    Route::delete('/produto/{id}', [ProdutoController::class, 'destroy'])->name('produto.destroy');
    Route::put('/produto/{id}/status', [ProdutoController::class, 'status'])->name('produto.status');
});

require __DIR__ . '/auth.php';

Route::get('/home', [HomeController::class, 'index'])->name('home');



Route::get('/produto/{id}', [ProdutoController::class, 'show'])->name('produto.show');
Route::get('/categorias/camisetas', [ProdutoController::class, 'camisetas'])->name('categorias.camisetas');
Route::get('/categorias/calcas', [ProdutoController::class, 'calcas'])->name('categorias.calcas');
Route::get('/categorias/vestidos', [ProdutoController::class, 'vestidos'])->name('categorias.vestidos');
Route::get('/categorias/moletom', [ProdutoController::class, 'moletom'])->name('categorias.moletom');
Route::get('/categorias/shorts', [ProdutoController::class, 'shorts'])->name('categorias.shorts');
Route::get('/categorias/acessorios', [ProdutoController::class, 'acessorios'])->name('categorias.acessorios');
Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index');
Route::get('/produtos/novidades', [ProdutoController::class, 'novidades'])->name('produtos.novidades');