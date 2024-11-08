<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $allItems=Products::all();
        //dd($allItems);
        //return view('products',['allProducts'=>$allItems]);
       
        return view('products',compact('allItems'));
    }

    public function insert(Request $data){
        
        //dd($data);
        $insert_data=['productId'=>$data['pid'],'productName'=>$data['pname'],'customerName'=>$data['cid']];
        $sms=$data['id'] ? 'update success!' : 'insert success';
        Products::updateorCreate(['id'=>$data['id']],$insert_data);
 
        return redirect()->route('allProducts')->with('message',$sms);
    }

    public function delete(int $id){
        //dd($id);
        Products::where('id',$id)->delete();
        return to_route('allProducts')->with('message','delete success!');
    }

    public function displayForm($id = null){
        $data = $id ? Products::find($id) : '';
         return view('form',compact('data'));
    }

}
