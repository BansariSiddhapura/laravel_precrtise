@extends('product::layouts.master')
@section('content')
    <form action="{{ route('product.insert') }}" method="POST">
        @csrf
        {{-- @dd($selectRow->productCategory ?? ''); --}}
        <div class="container w-50 my-4">
            <p class="fs-3 fw-medium">Add Product</p>
            <input type="hidden" name="id" value={{ $selectRow->id ?? '' }}>
            <!-- Product Name -->
            <div class="mb-3">
                <label for="productName" class="form-label">Product Name</label>
                <input type="text" class="form-control @error('productName') is-invalid @enderror" id="productName"
                    name="productName" value="{{ old('productName', $selectRow->productName ?? '') }}">
                @error('productName')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Product Code -->
            <div class="mb-3">
                <label for="productCode" class="form-label">Product Code</label>
                <input type="text" class="form-control  @error('productCode') is-invalid @enderror" id="productCode"
                    name="productCode" value="{{ old('productCode', $selectRow->productCode ?? '') }}">
                @error('productCode')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Product Category -->
            <div class="mb-3">
                <label for="productCategory" class="form-label">Product Category</label>
                {{ $category = $selectRow->productCategory ?? '' }}
                <select class="form-select  @error('productCategory') is-invalid @enderror" id="productCategory"
                    name="productCategory">
                    <option selected disabled>Choose a category</option>
                    <option value="Electronics" {{ old('productCategory', $category == 'Electronics' ? 'selected' : '') }}>
                        Electronics</option>
                    <option value="Clothing" {{ old('productCategory', $category == 'Clothing' ? 'selected' : '') }}>
                        Clothing
                    </option>
                    <option value="Furniture" {{ old('productCategory', $category == 'Furniture' ? 'selected' : '') }}>
                        Furniture
                    </option>
                    <option value="Food" {{ old('productCategory', $category == 'Food' ? 'selected' : '') }}>Food
                    </option>
                </select>
                @error('productCategory')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Product Status -->
            <div class="mb-3">
                {{ $status = $selectRow->productStatus ?? '' }}
                <label for="productStatus" class="form-label">Product Status</label>
                <div class="form-check">
                    <input class="form-check-input  @error('productStatus') is-invalid @enderror" type="radio"
                        name="productStatus" id="statusAvailable" value="Available"
                        {{ old('productStatus', $status == 'Available' ? 'checked' : '') }}>
                    <label class="form-check-label" for="statusAvailable">
                        Available
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input @error('productStatus') is-invalid @enderror" type="radio"
                        name="productStatus" id="statusOutOfStock" value="Out of Stock"
                        {{ old('productStatus', $status == 'Out of Stock' ? 'checked' : '') }}>
                    <label class="form-check-label" for="statusOutOfStock">
                        Out of Stock
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input @error('productStatus') is-invalid @enderror" type="radio"
                        name="productStatus" id="statusDiscontinued" value="Discontinued"
                        {{ old('productStatus', $status == 'Discontinued' ? 'checked' : '') }}>
                    <label class="form-check-label" for="statusDiscontinued">
                        Discontinued
                    </label>
                </div>
                @error('productStatus')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- seller checkbox --}}
            <div class="mb-3">

                <label for="productSeller" class="form-label me-3">Product Seller</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="mr.abc" name="productSeller[]"
                        @checked(in_array('mr.abc', old('subjects', $selectRow->productSeller ?? [])))>
                    <label class="form-check-label">Mr.Abc</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="mr.mehta" name="productSeller[]"
                        @checked(in_array('mr.mehta', old('subjects', $selectRow->productSeller ?? [])))>
                    <label class="form-check-label">Mr.Mehta</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="mr.joshi" name="productSeller[]"
                        @checked(in_array('mr.joshi', old('subjects', $selectRow->productSeller ?? [])))>
                    <label class="form-check-label">Mr.Joshi</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="mr.modi" name="productSeller[]"
                        @checked(in_array('mr.modi', old('subjects', $selectRow->productSeller ?? [])))>
                    <label class="form-check-label">Mr.Modi</label>
                </div>

            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
