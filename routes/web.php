<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\ProdutoController;

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
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //Route::get('/profile', [ProfileController::class, 'enderecos'])->name('profile.enderecos');
    Route::get('/produto', [ProdutoController::class, 'create'])->name('produto.create');
    Route::post('/produto', [ProdutoController::class, 'store'])->name('produto.store');
});

require __DIR__.'/auth.php';

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/endereco', [EnderecoController::class, 'create'])->name('endereco.create');
Route::post('/endereco', [EnderecoController::class, 'store'])->name('endereco.store');

Route::get('/produto/{id}', [ProdutoController::class, 'show'])->name('produto.show');

