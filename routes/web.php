<?php

use App\Http\Controllers\ProdukController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\DiskonController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('produk', ProdukController::class);
Route::resource('outlet', OutletController::class);

Route::get('/diskon', [DiskonController::class, 'index'])->name('diskon.index');
Route::get('/diskon/create', [DiskonController::class, 'create'])->name('diskon.create');
Route::post('/diskon/create', [DiskonController::class, 'store'])->name('diskon.store');
Route::get('/diskon/detail/{diskon}', [DiskonController::class, 'detail'])->name('diskon.detail');
Route::get('/diskon/detail/{diskon}/create', [DiskonController::class, 'addNewProduct'])
    ->name('diskon.detail.create');
Route::post('/diskon/detail/create', [DiskonController::class, 'storeProduct'])
    ->name('diskon.detail.store');
Route::delete('/diskon/detail/{id}/{productId}', [DiskonController::class, 'destroy'])
    ->name('diskon.detail.destroy');

Route::get('/order', [OrderController::class, 'index'])->name('order.index');
Route::get('/order/{id}', [OrderController::class, 'detail'])->name('order.detail');

