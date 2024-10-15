@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create New Product</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/create" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="title" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" id="price" class="form-control" step="0.01" required>
        </div>

        <!-- New Fields for Stock, Brand ID, and Category ID -->
        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="text" name="stock" id="stock" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="brand_id" class="form-label">Brand ID</label>
            <input type="text" name="brand_id" id="brand_id" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Category ID</label>
            <input type="text" name="category_id" id="category_id" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Product Image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Create Product</button>
        <a href="/" class="btn btn-secondary">Back to Product List</a>
    </form>
</div>
@endsection
