@extends('layouts.app')
@section('content')



<div class="row">
    
        @foreach($products as $product)
        <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="card padding">
                <header>
                    <h2 class="card-title">
                        <a href="/productos/{{$product ->id }}">{{$product->name}}</a>
                    </h2>
            </div>
        </div>
        @endforeach
    </div>
    <div class="actions text-center">
        {{$products->links()}}
    </div>
</div>


@endsection