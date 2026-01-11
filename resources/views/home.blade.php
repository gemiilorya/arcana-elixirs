@extends('layouts.app')

@section('title', 'Arcana Elixirs')

@section('content')
<div class="banner2">
    <div class="text-logo">
        <img src="{{ asset('images/text logo.svg') }}">
        <div class="content">
            <p>Arcana Elixirs – your one-stop shop for high-quality potions crafted for every need, desire, or mischief. Buy now!</p>
            <button class="shop-now-button" onclick="window.location.href='{{ route('products.index') }}'">Shop Now</button>
        </div>
    </div>
    <div class="icon-logo">
        <img src="{{ asset('images/logo.svg') }}">
    </div>
</div>
<div class="banner3">
    <div class="header">
        <h1>Categories</h1>
    </div>
    <div class="row">
        @if($categories && $categories->count() > 0)
            @foreach($categories->chunk(3) as $chunk)
                <div class="row mb-4">
                    @foreach($chunk as $category)
                        <div class="col-md-4">
                            <div class="card-category">
                                <a href="{{ route('categories.show', $category->slug) }}">
                                    <img src="{{ asset('images/' . $category->image) }}" class="card-img-top" alt="{{ $category->name }}">
                                    <h2 class="card-title">{{ $category->name }}</h2>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        @else
            <p>No categories found.</p>
        @endif
    </div>
    
</div>
<div class="banner3">
    <div class="header2">
        <h1>Featured Elixirs</h1>
    </div>
    <div class="row2">
        @php
            // Collect the first product from each category
            $firstProducts = collect();
            if ($categories && $categories->count() > 0) {
                foreach ($categories as $category) {
                    $product = $category->products->first();
                    if ($product) {
                        $firstProducts->push($product);
                    }
                }
            }
            // Limit to 6 products (3 columns x 2 rows)
            $displayProducts = $firstProducts->take(6);
        @endphp

        @if($displayProducts->count() > 0)
            @foreach($displayProducts->chunk(3) as $chunk)
                <div class="row mb-4">
                    @foreach($chunk as $product)
                        <div class="col-md-4">
                            <div class="card-product">
                                <a href="{{ route('products.show', $product->id) }}">
                                    <img src="{{ asset('images/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                                    <div class="details">
                                        <div class="card-title">
                                            <h5>{{ $product->name }}</h5>
                                        </div>
                                        <div class="card-price">
                                            <h5>${{ $product->price }}</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        @else
            <p>No products found.</p>
        @endif  
    </div>
</div>
@endsection
