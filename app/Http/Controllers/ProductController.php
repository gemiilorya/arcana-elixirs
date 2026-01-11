<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Get all categories with their products
        $categories = Category::with('products')->get();
        
        // Flatten all products from categories
        $allProducts = collect();
        foreach ($categories as $category) {
            $allProducts = $allProducts->concat($category->products);
        }
        
        // Manually paginate the collection
        $perPage = 5;
        $page = request()->get('page', 1);
        $total = $allProducts->count();
        $items = $allProducts->slice(($page - 1) * $perPage, $perPage)->values();
        
        $products = new \Illuminate\Pagination\LengthAwarePaginator(
            $items,
            $total,
            $perPage,
            $page,
            [
                'path' => url('/products'),
                'query' => request()->query(),
            ]
        );

        return view('product', compact('products'));
    }

    public function show(Product $product)
    {
        // Eager load category if needed
        $product->load('category');
        return view('details', compact('product'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('name', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->paginate(12);

        return view('products.index', compact('products'));
    }
}