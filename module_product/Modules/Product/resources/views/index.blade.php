@extends('product::layouts.master')

@section('content')
    <div class="container">

        <a href="{{ route('product.showForm') }}" class="btn btn-primary my-2">Add Product</a>
        @if (session()->has('message_delete'))
            <div class="alert alert-danger d-flex justify-content-between">
                {{ session('message_delete') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('message'))
            <div class="alert alert-success d-flex justify-content-between">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row my-3">
            @foreach ($qry as $item)
                <div class="col-md-6 col-sm-12 mb-4"> <!-- 6 out of 12 columns for 2 cards per row -->
                    <div class="card">
                        <div class="row g-0">
                            <div class="col-md-3 d-flex align-items-center justify-content-center">
                                <h3 class="card-title">{{ $item->productName }}</h3>
                            </div>
                            <div class="col-md-6 card-body">
                                <p class="card-text">Product Code : {{ $item->productCode }}</p>
                                <p class="card-text">Product Category : {{ $item->productCategory }}</p>
                                <p class="card-text">Product Status : {{ $item->productStatus }}</p>
                                <p class="card-text">Product Seller : {{ $item->productSeller }}</p>
                            </div>
                            <div class="col-md-3 col-sm-12 d-flex align-items-center justify-content-center gap-2">
                                <a href="{{ route('product.delete', ['id' => $item->id]) }}"
                                    class="btn btn-danger btn-sm">Delete</a>
                                <a href="{{ route('product.showForm', ['id' => $item->id]) }}"
                                    class="btn btn-info btn-sm">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
    </div>

    {{-- @dd($qry); --}}
@endsection
