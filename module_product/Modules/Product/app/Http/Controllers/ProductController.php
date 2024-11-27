<?php

namespace Modules\Product\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Product\Http\Requests\ProductRequest;
use Modules\Product\Models\Product;

class ProductController extends Controller
{
    public function showForm($id = null)
    {
        $selectRow = $id ? Product::find($id) : '';
        $id  ? $selectRow['productSeller'] = explode(',',$selectRow['productSeller']) : '';
        // dd($selectRow);
        return view('product::form', compact('selectRow'));
    }
    public function index()
    {
        $qry = Product::all();
        return view('product::index', compact('qry'));
    }

    public function insert(ProductRequest $request)
    {
        $data = $request->all();
        $data['productSeller']=implode(',',$data['productSeller']);
        // dd($data);
        $message = $data['id'] ? 'product updated successfully' : 'product inserted successfully';
        $qry = Product::updateOrCreate(['id' => $data['id']], $data);
        session()->flash('message', $message);
        return $qry ? redirect()->route('product.showTable') : 'product does not insert';
    }
    public function delete($id)
    {
        $qry = Product::find($id)->delete();
        session()->flash('message_delete', $qry ? 'product deleted successfully' : 'product does not delete');
        return redirect()->route('product.showTable');
    }
}
