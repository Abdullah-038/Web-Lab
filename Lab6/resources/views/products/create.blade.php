@extends('layouts.app')

@section('title', 'Create Product')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <h1 class="h3 mb-4">Create Product</h1>

        <form action="{{ route('products.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" rows="4" class="form-control">{{ old('description') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" step="0.01" min="0" name="price" id="price" class="form-control" value="{{ old('price') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection