<?php

namespace App\Http\Middleware;

use App\Cart;
use Closure;
use Illuminate\Support\Facades\Session;

class setCart
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $sessionName = 'cart_id';
        $cart_id = Session::get($sessionName);
        $cart = Cart::findOrCreateById($cart_id);
        Session::put($sessionName,$cart->id);
        $request->cart = $cart;
        return $next($request);
    }
}
