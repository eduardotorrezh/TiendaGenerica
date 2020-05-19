<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    
    public static function findOrCreateById($cart_id){
        if($cart_id){
            return Cart::find($cart_id);
        }else{
            return Cart::create();
        }
    }

    public function products()
    {
        return $this->belongsToMany('App\Product','product_in_carts');
    }

    public function productsCount()
    {
        return $this->products()->count();
    }

}
