@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="banner3" style="display: flex; justify-content: center; align-items: center; min-height: 70vh;">
    <div class="product-details">
        <div class="product-image">
            <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" style="width: 500px; height: 500px; border-radius: 20px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
        </div>
        <div>
            <h1 style="color: #fff; font-family: 'Times New Roman', serif; font-size: 2.5rem;">{{ $product->name }}</h1>
            <h2 style="color: #fff; font-size: 2rem; font-weight: bold; margin: 20px 0;">${{ number_format($product->price, 2) }}</h2>
            <p style="color: #fff; font-size: 1.2rem; margin-bottom: 20px;">{{ $product->description }}</p>
            <p style="color: #fff; font-size: 1.1rem; margin-bottom: 10px;">
                <strong>Category:</strong>
                @php
                    $categories = [
                        1 => 'Stat Boosters',
                        2 => 'Charms of the Heart',
                        3 => 'Fortune Flasks',
                        4 => 'Warding & Defense',
                        5 => 'Mystic Mind',
                        6 => 'Chaos & Mischief',
                    ];
                @endphp
                {{ $categories[$product->category] ?? 'Uncategorized' }}
            </p>
            <p style="color: #fff; font-size: 1.1rem; margin-bottom: 30px;">
                <strong>Availability:</strong> {{ $product->stock }}
            </p>
            <form method="POST" action="{{ route('cart.add', $product->id) }}" style="display: flex; align-items: center; gap: 10px;">
                @csrf
                <div class="qty-input">
                    <button class="qty-count qty-count--minus" data-action="minus" type="button">&minus;</button>
                    <input class="product-qty" type="number" name="quantity" id="qty" min="1" max="{{ $product->stock }}" value="1">
                    <button class="qty-count qty-count--add" data-action="add" type="button">&plus;</button>
                </div>
                <button type="submit" class="btn" style="margin-left: 20px; background: #D3C6F5; background: linear-gradient(90deg, rgba(211, 198, 245, 1) 0%, rgba(234, 223, 255, 1) 30%, rgba(215, 231, 254, 1) 70%, rgba(193, 216, 255, 1) 100%); border: none; border-radius: 15px; padding: 10px 25px;">+ Add to Cart</button>
                <a href="#" class="btn" style="background: #D3C6F5;
    background: linear-gradient(90deg, rgba(211, 198, 245, 1) 0%, rgba(234, 223, 255, 1) 30%, rgba(215, 231, 254, 1) 70%, rgba(193, 216, 255, 1) 100%); border: none; border-radius: 15px; padding: 10px 25px; margin-left: 10px; text-decoration: none; color: black;">Buy Now</a>
            </form>
            <script>
                document.querySelectorAll('.qty-count').forEach(function(btn) {
                    btn.addEventListener('click', function() {
                        var input = btn.parentElement.querySelector('.product-qty');
                        var min = parseInt(input.min) || 1;
                        var max = parseInt(input.max) || {{ $product->stock }};
                        var value = parseInt(input.value) || min;
                        if (btn.dataset.action === 'add') {
                            if (value < max) input.value = value + 1;
                        } else {
                            if (value > min) input.value = value - 1;
                        }
                    });
                });
            </script>
        </div>
    </div>
</div>
@endsection