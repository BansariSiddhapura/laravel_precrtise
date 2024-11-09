<?php

use App\Http\Controllers\StudentsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/studentStore',[StudentsController::class,'register'])->name('studentRegister');
Route::get('/studentForm',[StudentsController::class,'displayForm'])->name('studentForm');