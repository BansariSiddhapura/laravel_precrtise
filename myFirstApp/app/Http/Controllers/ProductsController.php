<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allItems=Products::all();
        //dd($allItems);
        return view('products',['allProducts'=>$allItems]);
    }

    public function insert(Request $data){
        
        //dd($data);
        $insert_data=['productId'=>$data['pid'],'productName'=>$data['pname'],'customerName'=>$data['cid']];
        Products::create($insert_data);
   
    }

}
