@extends('layouts.app')

@section('title', 'Cart')

@section('content')
<div class="banner3">
    <h1 style="margin-left: 100px; margin-top: 20px; color:  #fff;">Cart</h1>
    <p style="margin-top: 75px; margin-left: -60px; color: #fff;">{{ $cartItems->count() }} items in your cart</p>
    @php
        $isScrollable = $cartItems->count() > 2;
    @endphp
    <div class="cart">
        <div style="{{ $isScrollable ? 'max-height: 400px; overflow-y: auto;' : '' }}">
            <table style="width:100%; border-collapse: separate; border-spacing: 0 20px;">
                <thead>
                    <tr>
                        <th style="font-size:30px; color: #fff;"><b>Products</b></th>
                        <th style="text-align:center; color: #fff;">Price</th>
                        <th style="text-align:center; color: #fff;">Quantity</th>
                        <th style="text-align:center; color: #fff;">Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $item)
                    <tr>
                        <td style="text-align:center;">
                            <img src="{{ asset('images/' . $item->product->image) }}" style="width:175px; height:auto; display:block; margin:0 auto;">
                        </td>
                        <td style="text-align:center; font-weight:bold; font-size:1.2rem; color: #fff;">
                            ₱{{ number_format($item->product->price, 2) }}
                        </td>
                        <td style="text-align:center; color: #fff;">
                            {{ $item->quantity }}
                        </td>
                        <td style="text-align:center; font-weight:bold; font-size:1.2rem; color: #fff;">
                            ₱{{ number_format($item->product->price * $item->quantity, 2) }}
                        </td>
                        <td style="text-align:center; color: #fff;">
                            <form action="{{ route('cart.remove', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background:none; border:none; cursor:pointer;">
                                    <i class="fa-solid fa-trash" style="color: #fff;; font-size:1.5rem; margin-right: 20px;"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div style="position: absolute; left: 0; width: 100%;">
            <hr style="margin: 0 auto 30px auto; width: 65%; border: 1px solid #ccc; display: block;">
            <div style="display: flex; justify-content: flex-end; align-items: center; margin-right: 250px; margin-top: 10px;">
                <span style="font-size: 1.1rem; font-weight: bold; margin-right: 30px; color: #fff;">
                    Sub Total: ₱{{ number_format($cartItems->sum(fn($item) => $item->product->price * $item->quantity), 2) }}
                </span>
                <form action="{{ route('checkout') }}" method="GET" style="margin:0;">
                    <button type="submit" class="cart-btn">Checkout</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection