@auth 
{!! Form::open(['method'=> 'DELETE', 'route' => ['productos.destroy',$product->id],
    'onsubmit'=>'return confirm("¿Esta seguro que desea eliminar el producto?")']) !!}

<input type="submit" value="Eliminar producto" class="btn btn-danger">

{!! Form::close() !!}   
@endauth
