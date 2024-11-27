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
        //dd($data);
        $data['subjects'] = implode(',', $request['subjects']);

        //dd($data['profile']);
        if ($request->hasFile('profile')) {
            if ($data['id'] != null) {
                $selectUser = Students::find($data['id']);
                $path = "../public/storage/" . $selectUser['profile'];
                unlink($path);
            }
            $data['profile'] = $request->file('profile')->store('images_uploaded', 'public');
        }

        $message = $data['id'] ?  'Your profile updated successfully' : 'student added successfully';

        //dd($data);
        Students::updateOrCreate(['id' => $data['id']], $data);
        session()->flash('message', $message);
        if (Auth::check()) {
            return to_route('showTable');
        } else {
            return to_route('login');
        }
    }
    public function displayForm($id = null)
    {
        $selectOne = $id ? Students::find($id) : [];

        $selectOne['subjects'] = explode(',', $selectOne['subjects'] ?? '');
        $selectOne['id'] = $id;
        return view('studentForm', compact('selectOne'));
    }
    public function showTableData()
    {
        $allData = Students::all();
        return view('welcome', compact('allData'));
    }
    public function deleteStudent($id)
    {
        $qry = Students::find($id);

        $path = "../public/storage/{$qry->profile}";
        if (Students::exists($path)) {
            unlink($path);
        }
        $qry->delete();
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

    public function logout()
    {
        Auth::logout();
        return to_route('login');
    }

    public function profile()
    {
        return view('profile');
    }
}
