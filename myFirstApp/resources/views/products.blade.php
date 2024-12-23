{{-- {{$allProducts}} --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <title>All Products</title>
</head>

<body>
    <div class="container py-4">
        @if (session('message'))
            <div class="alert alert-success alert-dismissible fade show">
                <div>{{ session('message') }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <a href="{{ route('form') }}" class="btn btn-primary">Add +</a>
        <table class="table table-striped">
            <thead>
                <th>Id</th>
                <th>Product Id</th>
                <th>Product Name</th>
                <th>Customer Name</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($allItems as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->productId }}</td>
                        <td>{{ $product->productName }}</td>
                        <td>{{ $product->customerName }}</td>
                        <td><a href="{{ route('productDelete', ['id' => $product->id]) }}"
                                class="btn btn-outline-danger btn-sm">Delete</a>
                            <a href="{{ route('form', ['id' => $product->id]) }}"
                                class="btn btn-outline-success btn-sm">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="{{asset('assets/js/bootstrap.js')}}"></script>
</body>

</html>
