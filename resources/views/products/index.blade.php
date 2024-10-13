@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Product List</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary">Create New Product</a>

    @if (session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <!-- Search Form -->
    <form action="{{ route('products.index') }}" method="GET" class="mt-3">
        <input type="text" name="search" placeholder="Search products..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-info">Search</button>
    </form>

    <!-- Product Table -->
    <table class="table mt-3">
        <thead>
            <tr>
                <th><a href="{{ route('products.index', ['sort' => 'name', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">Name</a></th>
                <th><a href="{{ route('products.index', ['sort' => 'price', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">Price</a></th>
                <th>Description</th>
                <th>Stock</th> <!-- Added Stock Column -->
                <th>Brand ID</th> <!-- Added Brand Column -->
                <th>Category ID</th> <!-- Added Category Column -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>${{ $product->price }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->stock }}</td> <!-- Display Stock -->
                    <td>{{ $product->brand_id }}</td> <!-- Display Brand ID -->
                    <td>{{ $product->category_id }}</td> <!-- Display Category ID -->
                    <td>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination Links -->
    <div>
        {{ $products->appends(['sort' => request('sort'), 'direction' => request('direction')])->links() }}
    </div>
</div>
@endsection
