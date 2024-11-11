<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Students;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function register(StudentRequest $request)
    {
        //dd($request);
        $data=$request->all();
        $data['subjects']=implode(',',$request['subjects']);

        //dd($data);
        Students::updateOrCreate(['id' => $data['id']],$data);
        return to_route('showTable');
    }
    public function displayForm($id=null)
    {
        $selectOne = $id ? Students::find($id) : '';

        return view('studentForm',compact('selectOne'));
    }
    public function showTableData(){
        $allData=Students::all();
       // dd($allData);
        return view('welcome',compact('allData'));
    }
    public function deleteStudent($id){
        Students::where('id',$id)->delete();
        return to_route('showTable');
    }
}
