@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
<div class="banner3">
    <div class="checkout">
        <h2 style="font-weight: bold; color: #fff; text-align: center;">Checkout</h2>
        <hr style="border: 1px solid #fff; margin: 30px 0;">
        <form method="POST" action="{{ route('checkout.process') }}">
            @csrf
            <div style="margin-bottom: 25px;">
                <label for="address" style="font-weight: bold; font-size: 20px; color: #fff;">Shipping Address:</label>
                <input type="text" id="address" name="address" class="form-control" required style="border-radius: 10px; height: 50px; width: 400px; margin-left: 10px;"/>
            </div>
            <div style="margin-bottom: 25px;">
                <label for="payment" style="font-weight: bold; font-size: 20px; color: #fff;">Payment Method</label>
                <select id="payment" name="payment" class="form-control" required style="border-radius: 10px; height: 50px; margin-left: 10px; background-color: transparent; font-size: 20px;">
                    <option value="">Select a payment method</option>
                    <option value="cod">Cash on Delivery</option>
                    <option value="gcash">GCash</option>
                    <option value="card">Credit/Debit Card</option>
                </select>
            </div>
            <div style="margin-bottom: 25px;">
                <label style="color: #ffff; font-weight: bold; font-size: 20px;">Order Summary</label>
                <div style="border: 1px solid rgba(0, 0, 0, 0.50); border-radius: 10px; padding: 20px; margin-top: 10px;">
                    <ul style="list-style: none; padding: 0; margin: 0;">
                        @foreach($cartItems as $item)
                            <li style="margin-bottom: 10px;  , serif;">
                                <img src="{{ asset('images/' . $item->product->image) }}" style="width: 40px; height: 40px; border-radius: 8px; vertical-align: middle; margin-right: 10px;">
                                <span style="color: #fff;">{{ $item->product->name }} x {{ $item->quantity }}</span>
                                <span style="float: right; color: #fff;">₱{{ number_format($item->product->price * $item->quantity, 2) }}</span>
                            </li>
                        @endforeach
                    </ul>
                    <hr>
                    <div style="text-align: right;  , serif; font-weight: bold; color: #fff; ">
                        Total: ₱{{ number_format($cartItems->sum(fn($item) => $item->product->price * $item->quantity), 2) }}
                    </div>
                </div>
            </div>
            <div style="text-align: center;">
                <button type="submit" class="btn" style="background: #D3C6F5; background: linear-gradient(90deg, rgba(211, 198, 245, 1) 0%, rgba(234, 223, 255, 1) 30%, rgba(215, 231, 254, 1) 70%, rgba(193, 216, 255, 1) 100%); border-radius: 10px; padding: 10px 30px; font-weight: bold; font-size: 1.5rem;">
                    Place Order
                </button>
            </div>
        </form>
    </div>
</div>
@endsection