<?php

use Illuminate\Support\Facades\Route;
use Modules\Product\Http\Controllers\ProductController;
use Modules\Product\Http\Middleware\ValidationMiddleware;

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

// Route::group([], function () {
//     Route::resource('product', ProductController::class)->names('product');
// });

Route::get('/', [ProductController::class, 'index'])->name('product.showTable');
Route::get('/productForm/{id?}', [ProductController::class, 'showForm'])->name('product.showForm');
Route::post('/productStore', [ProductController::class, 'insert'])->name('product.insert');
Route::get('/productDelete/{id?}', [ProductController::class, 'delete'])->name('product.delete');
