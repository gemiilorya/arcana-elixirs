@extends('layouts.app')

@section('title', 'Product Search Results')

@section('content')
<div class="banner3">
    <div class="header4">
        <h2>Search Results</h2>
    </div>
    @if($products->isEmpty())
        <div class="empty">
            <h1>No products found.</h1>
        </div>
    @else
        <div class="row justify-content-center" style="min-height: 300px;">
            @foreach($products as $product)
                <div class="col-md-4 mb-4 d-flex justify-content-center" style="min-width: 300px;">
                    <div class="card-product-search">
                        <a href="{{ route('products.show', $product->id) }}">
                            <img src="{{ asset('images/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
                            <div class="details-search">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <h5 class="card-text">₱{{ number_format($product->price, 2) }}</h5>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div>
            {{ $products->links() }}
        </div>
    @endif
</div>
@endsection