@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ isset($product) ? 'Edit Product' : 'Create New Product' }}</h1>

    <form action="{{ isset($product) ? route('products.update', $product->id) : route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($product))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name ?? '') }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" required>{{ old('description', $product->description ?? '') }}</textarea>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $product->price ?? '') }}" required>
        </div>

        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock', $product->stock ?? '') }}" required>
        </div>

        <div class="form-group">
            <label for="brand_id">Brand</label>
            <input type="text" class="form-control" id="brand_id" name="brand_id" value="{{ old('brand_id', $product->brand_id ?? '') }}" required>
        </div>

        <div class="form-group">
            <label for="category_id">Category</label>
            <input type="text" class="form-control" id="category_id" name="category_id" value="{{ old('category_id', $product->category_id ?? '') }}" required>
        </div>

        <div class="form-group">
            <label for="image">Product Image</label>
            <input type="file" class="form-control" id="image" name="image">
            @if (isset($product) && $product->image)
                <p>Current Image: <img src="{{ asset('storage/products/' . $product->image) }}" alt="Product Image" width="100"></p>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">{{ isset($product) ? 'Update Product' : 'Create Product' }}</button>
    </form>
</div>
@endsection
