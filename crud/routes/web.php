<?php

use App\Http\Controllers\StudentsController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

Route::post('/studentStore',[StudentsController::class,'register'])->name('studentRegister');
Route::get('/studentForm/{id?}',[StudentsController::class,'displayForm'])->name('studentForm');
Route::get('/',[StudentsController::class,'showTableData'])->name('showTable');
Route::get('/deleteStudent/{id?}',[StudentsController::class,'deleteStudent'])->name('delete');