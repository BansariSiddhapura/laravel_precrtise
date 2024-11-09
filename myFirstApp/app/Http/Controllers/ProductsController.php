<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\RedirectResponse;
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

    public function insert(Request $data) {
        
        $data->validate([
            'product_id' => 'required|numeric|between:100,500',
            'product_name' => 'required|lowercase',
            'customer_name' => 'required|uppercase'
        ],[
           'product_name.lowercase' => 'please enter product name in lowecase'
        ]);
        //dd($data);
        $insert_data=['productId'=>$data['product_id'],'productName'=>$data['product_name'],'customerName'=>$data['customer_name']];
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
