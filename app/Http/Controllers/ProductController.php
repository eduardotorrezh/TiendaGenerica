<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class ProductController extends Controller
{

    public function __construct()
    {
    //     //$this-> middleware('auth'); //Cuando se coloca esto se bloquean todos los métos para la autenticación
    //     $this-> middleware('auth',['except' => ['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $products = Product::paginate(6);

        return view('products.index', ['products' => $products]);
        $product = Product::all();
        if($request->wantsJson()){
            return $product->toJson();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $options=[
            'name' => $request->name,
            'price' => $request->price,
            'brand_id' => $request->brand_id,
            'provider_id' => $request->provider_id,
            'type' => $request->type,
            'cover_photo' => $request->cover_photo,
            'stock' => $request->stock,
            'description' => $request->description,
            'size' => $request->size,
        ];

        if($request->wantsJson()){

        }
        if(Product::create($options)){
            return redirect('/productos');
        }else{
            return view('products.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product= Product::find($id);
        //return  $product;
        return  view('products.show',['product'=> $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product =  Product::find($id);
        $product -> name = $request -> name;
        $product -> price = $request -> price;
        $product -> cover_photo = $request -> cover_photo;
        $product -> provider_id = $request -> provider_id;
        $product -> brand_id = $request -> brand_id;
        $product -> type = $request -> type;
        $product -> stock = $request -> stock;
        $product -> description = $request -> description;
        $product -> size = $request -> size;
        if($product->save()){
            return redirect('/productos');
        }else{
            return view("products.edit",["product"=> $product]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect('/productos');
    }
}
