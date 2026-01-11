<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::all(); // Add this line to fetch products
        return view('home', compact('categories', 'products')); // Pass both variables to the view
    }
}