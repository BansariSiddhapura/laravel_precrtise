<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentsController extends Controller
{
    public function register(StudentRequest $request)
    {
        //dd($request);
        $data = $request->all();
        $data['subjects'] = implode(',', $request['subjects']);
        $message = $data['id'] ?  'student updated successfully' : 'student added successfully';

        //dd($data);
        Students::updateOrCreate(['id' => $data['id']], $data);
        session()->flash('message', $message);
        if(Auth::check()){
            return to_route('showTable');
        }else{
            return to_route('login');
        }
        
    }
    public function displayForm($id = null)
    {
        $selectOne = $id ? Students::find($id) : [];

        $selectOne['subjects'] = explode(',', $selectOne['subjects'] ?? '');
        $selectOne['id'] = $id;

        //dd($selectOne);
        //    dd($selectOne->subjects);
        return view('studentForm', compact('selectOne'));
    }
    public function showTableData()
    {
        if(Auth::check()){
            $allData = Students::all();
            // dd($allData);
            return view('welcome', compact('allData'));
        }else{
            return redirect()->route('login');
        }
       
    }
    public function deleteStudent($id)
    {
        Students::where('id', $id)->delete();
        session()->flash('message_delete', 'student deleted successfully');
        return to_route('showTable');
    }

    public function login(Request $request)
    {
        //dd($request->isMethod('post'));
        if ($request->isMethod('get')) {
            return view('login');
        } else {
            //dd($request);
            $rules = $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);
            //dd($rules);
            if (Auth::attempt($rules)) {
                return to_route('showTable');
            } else {
                session()->flash('login', 'login failed!!');
                return view('login');
            }
        }
    }

    public function logout(){
        Auth::logout();
        return to_route('login');
    }
}
