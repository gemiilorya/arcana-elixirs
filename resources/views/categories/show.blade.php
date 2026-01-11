@extends('layouts.app')

@section('title', $category->name . ' - Products')

@section('content')
<div class="banner3">
    <div class="categories-header">
        <h1>{{ $category->name }}</h1>
    </div>
    <div class="categories-row">
        @if($products->count() > 0)
            @foreach($products->chunk(3) as $chunk)
                <div class="row mb-4">
                    @foreach($chunk as $product)
                        <div class="col-md-4">
                            <div class="card-product3">
                                <a href="{{ route('products.show', $product->id) }}">
                                    <img src="{{ asset('images/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                                    <div class="details2">
                                        <h5 class="card-title">{{ $product->name }}</h5>
                                        <h5 class="card-price">₱{{ number_format($product->price, 2) }}</h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        @else
            <p>No products found in this category.</p>
        @endif
    </div>
</div>
@endsection