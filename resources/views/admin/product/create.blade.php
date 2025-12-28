@extends('layouts.app')

@section('title', 'Add Product')

@section('content')
<h1>Add Product</h1>

<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
        @error('name')<small class="text-danger">{{ $message }}</small>@enderror
    </div>
    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control">{{ old('description') }}</textarea>
        @error('description')<small class="text-danger">{{ $message }}</small>@enderror
    </div>
    <div class="mb-3">
        <label>Price</label>
        <input type="number" name="price" class="form-control" value="{{ old('price') }}" step="0.01">
        @error('price')<small class="text-danger">{{ $message }}</small>@enderror
    </div>
    <div class="mb-3">
        <label>Stock</label>
        <input type="number" name="stock" class="form-control" value="{{ old('stock') }}">
        @error('stock')<small class="text-danger">{{ $message }}</small>@enderror
    </div>
    <div class="mb-3">
        <label>Image</label>
        <input type="file" name="image" class="form-control">
        @error('image')<small class="text-danger">{{ $message }}</small>@enderror
    </div>
    <button class="btn btn-success">Save</button>
</form>
@endsection
