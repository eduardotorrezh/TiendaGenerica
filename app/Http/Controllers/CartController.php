<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductsCollection;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        $this-> middleware('cart');
    }

    public function show(Request $request){
        return view('carts.show', ['cart' => $request->shopping_cart]);
    }

    public function products(Request $request){
        return new ProductsCollection($request -> cart ->products()->get());
    }
}
