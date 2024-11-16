<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Students;
use Illuminate\Http\Request;


class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users=Students::all();
        return response()->json(['users'=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentRequest $request)
    {
        //dd($request->profile->getClientOriginalName());
        //$request['subjects']=implode(',', $request['subjects']);
        // $users=Students::create(['fullName'=>$request['fullName'],'email'=>$request['email'],'password'=>$request['password'],'date_of_birth'=>$request['date_of_birth'],'courses'=>$request['courses'],'gender'=>$request['gender'],'subjects'=>$request['subjects'],'profile'=>$request['profile']->getClientOriginalName()]);

        $allData=$request->all();
        unset($allData['_token']);
        //dd($allData);
        $message = $allData['id'] ? 'update success' : 'insert success';
        Students::updateOrCreate(['id'=>$allData['id']],$allData);

        return response()->json(['message',$message]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $singleClient = Students::where('id',$id)->get();
        return response()->json(['singleClient'=>$singleClient]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete=Students::find($id)->delete();
        //return "deleted";

         return response()->json(['message'=>'deleted success!']);
    }
}
