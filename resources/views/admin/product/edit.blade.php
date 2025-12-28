@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')
<h1>Edit Product</h1>

<form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}">
        @error('name')<small class="text-danger">{{ $message }}</small>@enderror
    </div>
    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control">{{ old('description', $product->description) }}</textarea>
        @error('description')<small class="text-danger">{{ $message }}</small>@enderror
    </div>
    <div class="mb-3">
        <label>Price</label>
        <input type="number" name="price" class="form-control" value="{{ old('price', $product->price) }}" step="0.01">
        @error('price')<small class="text-danger">{{ $message }}</small>@enderror
    </div>
    <div class="mb-3">
        <label>Stock</label>
        <input type="number" name="stock" class="form-control" value="{{ old('stock', $product->stock) }}">
        @error('stock')<small class="text-danger">{{ $message }}</small>@enderror
    </div>
    <div class="mb-3">
        <label>Image</label>
        <input type="file" name="image" class="form-control">
        @if($product->image)
            <img src="{{ asset('storage/'.$product->image) }}" width="80" class="mt-2">
        @endif
        @error('image')<small class="text-danger">{{ $message }}</small>@enderror
    </div>
    <button class="btn btn-success">Update</button>
</form>
@endsection
