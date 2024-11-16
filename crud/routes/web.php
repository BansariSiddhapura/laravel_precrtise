<?php

use App\Http\Controllers\StudentsController;
use App\Http\Middleware\AuthenticationMiddleware;
use App\Http\Middleware\ProfileUpdateMiddleware;
use Illuminate\Support\Facades\Route;

Route::controller(StudentsController::class)->group(function(){

    Route::post('/studentStore','register')->name('studentRegister');
    Route::get('/studentForm/{id?}','displayForm')->name('studentForm');
    Route::get('/showTable','showTableData')->name('showTable')->middleware(AuthenticationMiddleware::class);
    Route::get('/deleteStudent/{id?}','deleteStudent')->name('delete');
    
    // Route::post('/loginSuccess',[StudentsController::class,'login'])->name('login');
    Route::match(['get', 'post'], '/','login')->name('login');
    Route::get('/logout','logout')->name('logout');

    Route::get('/profile','profile')->name('profile');
});