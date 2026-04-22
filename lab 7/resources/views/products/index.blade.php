@extends('layouts.app')

@section('title', 'Products')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 mb-0">Products</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped align-middle">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th class="text-end">Price</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description ?: '—' }}</td>
                            <td class="text-end">{{ number_format($product->price, 2) }}</td>
                            <td class="text-end">
                                <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this product?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">No products found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $products->links() }}
    </div>
</div>
@endsection