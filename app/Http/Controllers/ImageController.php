<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{

    public function __construct()
    {
        //$this-> middleware('auth'); //Cuando se coloca esto se bloquean todos los métos para la autenticación
        $this-> middleware('auth',['except' => ['index','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        {
            $images = Image::paginate(6);
            //return $images;
            return view('images.index', ['images' => $images]);
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
            'product_id' => $request->product_id,
            'image' => $request->image,
        ];
        if($request->hasFile('image')){
            $datosDeLaImagen = $request->file('image')->store('uplodad','public');
        }
        if(Image::create($options)){
            return redirect('/image');
        }else{
            return view('images.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $image= Image::find($id);
        //return  $image;
        return  view('images.show',['image'=> $image]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $image =  Image::find($id);
        $image -> product_id = $request -> product_id;
        if($request->hasFile('image')){
            $datosDeLaImagen = $request->file('image')->store('uplodad','public');
        }
        $image -> image = $request -> image;
        if($image->save()){
            return redirect('/');
        }else{
            return view("images.edit",["image"=> $image]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Image::destroy($id);
        return redirect('/marcas');
    }
}
