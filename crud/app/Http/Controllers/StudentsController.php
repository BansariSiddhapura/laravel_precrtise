<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function register(Request $request){
        //dd($request);
        
    }
    public function displayForm(){
        return view('studentForm');
    }
}
