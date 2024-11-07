{{-- {{$allProducts}} --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    <title>All Products</title>
</head>
<body>
    <div class="container py-4">
        <a href="{{ route('form') }}" class="btn btn-primary">Add +</a>
        <table class="table table-striped">
            <thead>
                <th>Id</th>
                <th>Product Id</th>
                <th>Product Name</th>
                <th>Customer Name</th>
            </thead>
            <tbody>
                @foreach ($allProducts as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->productId}}</td>
                        <td>{{$product->productName}}</td>
                        <td>{{$product->customerName}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>