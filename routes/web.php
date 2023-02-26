<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SeriesController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

/*ROTAS PARA CATEGORIAS*/
Route::resource('/categories', CategoryController::class);

/*ROTAS PARA PRODUTOS*/
Route::resource('/products', ProductController::class);

/*ROTAS PARA VENDAS(PDV)*/
Route::resource('/orders', OrderController::class);

/*Route::get('/order', OrderController::class)->name('venda');
Route::post('/order', OrderController::class)->name('venda.registrar');
Route::get('/venda/cupom/', OrderController::class)->name('venda.cupom.route');
Route::get('/venda/cupom/{id}', OrderController::class)->name('venda.cupom');
Route::post('/venda/cancelar/', OrderController::class)->name('venda.cancelar');*/

/*ROTAS PARA SERIES*/
Route::resource('/series', SeriesController::class);