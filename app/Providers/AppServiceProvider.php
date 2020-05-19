<?php

namespace App\Providers;

use App\Cart;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        // Schema::defaultStringLength(191);
        // $sessionName = 'cart_id';
        // $cart_id = Session::get($sessionName);
        // $cart = Cart::findOrCreateById($cart_id);
        // Session::put($sessionName, $cart->id);
        // view()->share('productsCount', $cart->id);

        View::composer('*',function($view){
            $sessionName = 'cart_id';
            $cart_id = Session::get($sessionName);
            $cart = Cart::findOrCreateById($cart_id);
            Session::put($sessionName,$cart->id);
            $view -> with('productsCount',$cart->productsCount());
            // $view -> with('productsCount',$cart->id);
        });
    }
}
