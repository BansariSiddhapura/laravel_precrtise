<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){
        return "from book index method in book controller";
        //return response()->redirectTo('/users');
    }
}
