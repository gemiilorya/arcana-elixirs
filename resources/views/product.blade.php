@extends('layouts.app')

@section('title', 'Products')

@section('content')
<div class="banner3">
    <div class="header3">
        <h1>All Products</h1>
    </div>
    <div class="row4">
        @if($products->count() > 0)
            <div class="mb-4">
            <div class="row mb-4">
                @foreach($products as $product)
                <div class="col-md-4">
                    <div class="card-product2">
                    <a href="{{ route('products.show', $product->id) }}">
                        <img src="{{ asset('images/' . $product->image) }}">
                        <div class="details2">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <h5 class="card-price">₱{{ number_format($product->price, 2) }}</h5>
                        </div>
                    </a>
                    </div>
                </div>
                @endforeach
            </div>
            </div>
            <div class="pagination">
                {{ $products->links('vendor.pagination.custom') }}
            </div>
        @else
            <p>No products found.</p>
        @endif
    </div>
</div>
@endsection