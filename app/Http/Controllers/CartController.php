<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Apply authentication middleware to all methods.
     */
    protected $middleware = ['auth'];

    public function index()
    {
        $cartItems = auth()->user()->cart;
        return view('cart.index', compact('cartItems'));
    }

    public function add(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => 'required|numeric|min:1'
        ]);

        auth()->user()->cart()->updateOrCreate(
            ['product_id' => $product->id],
            ['quantity' => $request->quantity]
        );

        return redirect()->route('cart.index')->with('success', 'Product added to cart!');
    }

    public function remove($id)
    {
        $cartItem = auth()->user()->cart()->findOrFail($id);
        $cartItem->delete();

        return redirect()->route('cart.index')->with('success', 'Item removed from cart!');
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => 'required|numeric|min:1'
        ]);

        auth()->user()->cart()->where('product_id', $product->id)
            ->update(['quantity' => $request->quantity]);

        return redirect()->route('cart.index')->with('success', 'Cart updated!');
    }

    public function showCheckout()
    {
        $cartItems = auth()->user()->cart;
        return view('checkout', compact('cartItems'));
    }
}