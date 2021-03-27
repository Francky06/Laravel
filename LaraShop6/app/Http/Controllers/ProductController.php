<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class ProductController extends Controller {

    public function index() {
        dd(Cart::content());

        $products = Product::inRandomOrder()->take(6)->get();
        return view('products.index')->with('products', $products);
    }

        public function show($slug) {

        $product = Product::where('slug', $slug)->firstOrFail();
        return view('products.show')->with('product', $product);
    }
}
