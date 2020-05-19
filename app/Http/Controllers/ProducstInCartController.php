<?php

namespace App\Http\Controllers;

use App\ProductInCart;
use Illuminate\Http\Request;

class ProducstInCartController extends Controller
{
    public function __construct()
    {
        $this->middleware('cart');
    }

    
    public function store(Request $request){
        $inShoppingCart = ProductInCart::create([
            'cart_id' => $request->cart->id,
            'product_id'=> $request->product_id
        ]);
        if($inShoppingCart){
            return redirect()->back();
        }

        return redirect()->back()->withErrors(['product' => 'No se pudo agregar el producto']);
        
    }

    public function destroy($id){

    }
}
