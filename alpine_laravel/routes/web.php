<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/{id?}',[ClientController::class,'showData'])->name('client.table');
Route::delete('clients/delete/{id}',[ClientController::class,'delete'])->name('client.delete');
Route::post('clients/store',[ClientController::class,'saveClient'])->name('client.save');