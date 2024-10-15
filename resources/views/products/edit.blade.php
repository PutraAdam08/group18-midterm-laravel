@extends('layouts.app')

@section('content')
<div class="container">
    <h1>'Edit Product'</h1>

    <form action="{{route('edit_card', ['card' => $card, 'id' => $card->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        

        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" class="form-control" id="name" name="title" value="{{$card->title}}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" required>{{ $card->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" value="{{$card->price}}" required>
        </div>

        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" value="{{$card->stock}}" required>
        </div>

        <div class="form-group">
            <label for="brand_id">Brand</label>
            <input type="text" class="form-control" id="brand_id" name="brand_id" value="{{$card->brand->name}}" required>
        </div>

        <div class="form-group">
            <label for="category_id">Category</label>
            <input type="text" class="form-control" id="category_id" name="category_id" value="{{$card->category->name}}" required>
        </div>

        <div class="form-group">
            <label for="image">Product Image</label>
            <input type="file" class="form-control" id="image" name="image">
                <p>Current Image: <img src="{{ asset("storage/cards/$card->image") }}" alt="Product Image" width="100"></p>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
