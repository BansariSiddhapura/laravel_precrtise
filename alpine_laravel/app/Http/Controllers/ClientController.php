<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ClientController;
use App\Models\Client;

class ClientController extends Controller
{
    function showData($id = null){
        $clients=Client::all();
        if($id){
            $editFormData = $id ? Client::find($id) : '';
            return response()->json($editFormData);
        }
       
        return view('welcome',compact('clients'));
    }

    function delete($id){
        $client=Client::find($id);
        $client->delete();
        return response()->json(['success' => true, 'message' => 'Client deleted successfully.']);
    }

    function saveClient(Request $request){
        //dd($request);
        $data=$request->all();
        Client::updateOrCreate(['id'=>$data['id']],$data);
        return response()->json(['success' => true, 'message' => 'Client added successfully.']);
    }
}