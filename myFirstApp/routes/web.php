<?php

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
Route::get('/', function () {
    return view('first');
});

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