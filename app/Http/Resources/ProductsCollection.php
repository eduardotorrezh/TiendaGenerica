<?php

namespace App\Http\Resources;

use App\Brand;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductsCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'data' => $this->collection->transform(function($element){
                $brand = Brand::find($element->brand_id);
                return [
                    'id' => $element->id,
                    'name' => $element->name,
                    'description' => $element->description,
                    'cover_photo' => $element->cover_photo,
                    'brand_name' => $brand->name,
                    'type' => $element->type,
                    'stock' => $element->stock,
                    "humanPrice" => "$".($element->price /100),
                    "numberPrice" => $element->price,
                    'size' => $element->size,

                ];
            })
        ];
    }
}
