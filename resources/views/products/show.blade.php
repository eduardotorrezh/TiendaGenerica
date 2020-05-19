@extends('layouts.app')
@section('content')
<div class="row justify-content-sm-center">
    <div class="col-xs-12 col-sm-10 col-md-7 col-lg-6">
        <div class="card">
            <header class="padding text-center bg-primary">
                <h1>
                
                </h1>
            </header>
            <div class="card-body padding">
                <h1 class="card-title">{{$product->name}} </h1>
                <h4 class="card-subtitle">{{$product->price}}</h4>
                <p class="card-text">{{$product->description}}</p>
                <div class="card-actions">
                <!-- {!! Form::open(['url' => '/in_carts','method'=>'POST']) !!}
                    <input type="hidden" name="product_id" value="{{$product->id}}" >
                    <input type="submit" class="btn btn-success" value="Agregar al carrito" > 
                {!! Form::close() !!}  -->
                <add-product-to-cart-btn :product="{{ json_encode($product) }}"></add-product-to-cart-btn>
                    @include('products.delete')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection