<?php

use App\Http\Controllers\StudentsController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

// Route::post('/studentStore',[StudentsController::class,'register'])->name('studentRegister');
// Route::get('/studentForm/{id?}',[StudentsController::class,'displayForm'])->name('studentForm');
// Route::get('/showTable',[StudentsController::class,'showTableData'])->name('showTable');
// Route::get('/deleteStudent/{id?}',[StudentsController::class,'deleteStudent'])->name('delete');

// // Route::post('/loginSuccess',[StudentsController::class,'login'])->name('login');
// Route::match(['get', 'post'], '/',[StudentsController::class,'login'])->name('login');

// Route::get('/logout',[StudentsController::class,'logout'])->name('logout');

Route::controller(StudentsController::class)->group(function(){

    Route::post('/studentStore','register')->name('studentRegister');
    Route::get('/studentForm/{id?}','displayForm')->name('studentForm');
    Route::get('/showTable','showTableData')->name('showTable');
    Route::get('/deleteStudent/{id?}','deleteStudent')->name('delete');
    
    // Route::post('/loginSuccess',[StudentsController::class,'login'])->name('login');
    Route::match(['get', 'post'], '/','login')->name('login');
    
    Route::get('/logout','logout')->name('logout');
});