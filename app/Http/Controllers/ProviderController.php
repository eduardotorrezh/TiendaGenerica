<?php

namespace App\Http\Controllers;

use App\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{

    public function __construct()
    {
         //$this-> middleware('auth'); //Cuando se coloca esto se bloquean todos los métos para la autenticación
         $this-> middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $providers = Provider::all();
        if($request->wantsJson()){
            return $providers->toJson();
        }
        return $providers;
        // return view('providers.index', ['providers' => $providers]);
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
            'full_name' => $request->full_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'description' => $request->description,
        ];
        if(Provider::create($options)){
            return redirect('/proveedores');
        }else{
            return view('providers.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $provider= Provider::find($id);
        return  $provider;
        // return  view('providers.show',['provider'=> $provider]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function edit(Provider $provider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $provider =  Provider::find($id);
        $provider -> full_name = $request -> full_name;
        $provider -> phone = $request -> phone;
        $provider -> email = $request -> email;
        $provider -> description = $request -> description;
        if($provider->save()){
            return redirect('/proveedores');
        }else{
            return view("providers.edit",["provider"=> $provider]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Provider::destroy($id);
        return redirect('/proveedores');
    }
}
