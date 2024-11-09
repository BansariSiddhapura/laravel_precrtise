<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Students;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function register(StudentRequest $request)
    {
        // $request->validate([
        //     'full_name'=>'required',
        //     'email'=>'required|unique'
        // ]);

        //dd($request);
        $subjects=implode(',',$request['subjects']);
        //dd($subjects);
        $data = ['fullName' => $request['full_name'], 'email' => $request['email'], 'password' => $request['password'], 'confirm_password' => $request['confirm_password'], 'date_of_birth' => $request['date_of_birth'], 'courses' => $request['course'], 'gender' => $request['gender'], 'subjects' => $subjects];

        //dd($data);
        Students::updateorCreate(['id' => $request['id']],$data);
        return to_route('home');
    }
    public function displayForm()
    {
        return view('studentForm');
    }
}
