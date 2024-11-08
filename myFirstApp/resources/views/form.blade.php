<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
   
    <title>Form</title>
</head>

<body>
    <div class="container w-50 my-5">
        <h3>Add Product</h3>
        {{-- {{$data}} --}}
        <form action="{{ route('productAdd') }}" id="productForm" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$data->id ?? ''}}">
            <div class="mb-3">
                <input type="text" class="form-control" name="pid" placeholder="enter product id" value="{{ $data->productId ?? ''}}">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="pname" placeholder="enter product name" value="{{ $data->productName ?? '' }}">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="cid" placeholder="enter customer name" value="{{ $data->customerName ?? '' }}">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-success">Save</a>
            </div>
        </form>
    </div>
 
</body>
</html>
