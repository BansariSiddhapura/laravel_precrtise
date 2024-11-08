<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


function allUsers()
{
    return
        [
            1 => ['name' => "Alice", 'roll' => 20, 'city' => "Rajkot"],
            2 => ['name' => "Bob", 'roll' => 21, 'city' => "Ahmedabad"],
            3 => ['name' => "Charlie", 'roll' => 22, 'city' => "Surat"],
            4 => ['name' => "David", 'roll' => 23, 'city' => "Vadodara"]
        ];
}
// Route::get('/', function () {
//     return view('first');
// });

Route::get('/users', function () {
    $name = "corbital";

    $data = allUsers();

    // way-1
    // return view('users',['name'=>$name,
    //                     'city'=>'<script>alert("hello")</script>']);

    //way-2
    //return view('users')->with('name',$name)->with('city','rajkot');

    //way-3 not working
    //return view('users')->withName('corbital')->withCity('rajkot');

    return view('users', ['users' => $data]);
});


Route::get('/profile/{id}',function($id){
    $users=allUsers();
    abort_if(!isset($users[$id]),404);
    $user=$users[$id];

    return view('profile',['user'=>$user]);
})->name('profile');


Route::get('/book',[BookController::class,'index']);


//----------------------Query Builder-----------------------
Route::get('/',function(){
    $allUsers=DB::table('users')->get();
    //$insert=DB::table('users')->insert(['name'=>'abcd','email'=>'abcd@gmail.com','password'=>'123']);
    //dd($insert);

    //$update=DB::table('users')->where('id',2)->update(['email'=>'abc@yahoo.com']);
    //dd($update);

    $delete=DB::table('users')->where('id',2)->delete();
    //dd($delete);

    dd($allUsers);
});

//----------------Working with database--------------------

// Route::get('/allProducts',function(){
//     $allItems=DB::table('products')->get();
//     //dd($allItems);
//     return view('products',['allProducts'=>$allItems]);
// });

Route::get('/allProducts',[ProductsController::class,'index'])->name('allProducts');
Route::post('/form',[ProductsController::class,'insert'])->name('productAdd');
Route::get('/delete/{id}',[ProductsController::class,'delete'])->name('productDelete');
Route::get('/form/{id?}',[ProductsController::class,'displayForm'])->name('form');