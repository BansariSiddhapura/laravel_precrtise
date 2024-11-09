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
            <input type="hidden" name="id" value="{{ $data->id ?? '' }}">
            <div class="mb-3">
                <input type="number" class="form-control @error('product_id') is-invalid @enderror" name="product_id"
                    placeholder="enter product id" value="{{ $data->productId ?? '' }}">
                <div>
                    @error('product_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control @error('product_name') is-invalid @enderror"
                    name="product_name" placeholder="enter product name" value="{{ $data->productName ?? '' }}">
                <div>
                    @error('product_name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control @error('customer_name') is-invalid @enderror"
                    name="customer_name" placeholder="enter customer name" value="{{ $data->customerName ?? '' }}">
                @error('customer_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-success">Save</a>
            </div>
        </form>
    </div>

</body>

</html>
