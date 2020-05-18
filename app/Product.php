<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $fillable = ['name','price','cover_photo','brand_id','provider_id','type','stock','description','size'];
}
