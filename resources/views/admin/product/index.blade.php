@extends('layouts.app')

@section('title', 'Products')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h1>Products</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>
</div>

<form method="GET" action="{{ route('products.index') }}" class="mb-3 d-flex">
    <input type="text" name="search" class="form-control me-2" placeholder="Search products..." value="{{ request('search') }}">
    <button class="btn btn-primary">Search</button>
</form>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th><th>Name</th><th>Price</th><th>Stock</th><th>Image</th><th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>${{ $product->price }}</td>
            <td>{{ $product->stock }}</td>
            <td>
                @if($product->image)
                    <img src="{{ asset('storage/'.$product->image) }}" width="50">
                @endif
            </td>
            <td>
                <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>
                <button @click="$root.add({id: {{ $product->id }}, name: '{{ $product->name }}', price: {{ $product->price }}})" class="btn btn-sm btn-success">Add to Cart</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $products->links() }}
@endsection
