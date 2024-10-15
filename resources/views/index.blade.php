@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Product List</h1>
    <a href="" class="btn btn-primary">Create New Product</a>

    <div class="d-flex flex-row mt-3">
        <!-- Search Form -->
        <form action="" method="GET" class="">
            <input type="text" name="search" placeholder="Search products..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>

        <form action="{{route('add_category')}}" method="POST" enctype="multipart/form-data" type="submit" class="ms-3">
            @csrf
            <input name="name" placeholder="Add category here">
            <button type="submit" class="btn btn-success">Add</button>
        </form>

        <form action="{{route('add_brand')}}" method="POST" enctype="multipart/form-data" type="submit" class="ms-3">
            @csrf
            <input name="name" placeholder="Add brand here" enctype="multipart/form-data">
            <button type="submit" class="btn btn-success">Add</button>
        </form>
    </div>
    

    <div class="mt-4 row">
        @foreach ($cards as $card)
            <div class="col-md">
            <div class="card mb-4 shadow-sm bg-secondary">
    <img src="" class="card-img-top" alt="{{ $card->title }}">
    <div class="card-body">
        <h5 class="card-title">{{ $card->title }}</h5>
        <p class="card-text">
            <strong>Price:</strong> ${{ number_format($card->price, 2) }}<br>
            <strong>Stock:</strong> {{ $card->stock }} available<br>
            <strong>Description:</strong> {{ $card->description }}<br>
        </p>
    </div>
</div>
            </div>        
        @endforeach
    </div>
    
    <!-- Pagination Links -->
</div>
@endsection
