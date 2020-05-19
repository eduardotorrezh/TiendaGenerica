{!! Form::open(['route' => [$product->url(),$product->id],'method'=>$product->method(), 'class'=> 'app-form']) !!}
    
    <div>
        {!! Form::label('title', 'Titulo del producto') !!}
        {!! Form::text('title',$product->title,['class'=>'form-control', 'placeholder'=>'', 'required' => 'required']) !!}
    </div>

    <div>
        {!! Form::label('description', 'Titulo del producto') !!}
        {!! Form::textarea('description',$product->description,['class'=>'form-control', 'placeholder'=>'']) !!}
    </div>

    <div>
    {!! Form::label('cover_photo', 'Selecciona una imagen:', array('class' => 'negrita')) !!}                          
    <input type="file" name="foto" id="foto" value="">
    </div>
    
    <div>
        {!! Form::label('price', 'Precio del producto') !!}
        {!! Form::text('price',$product->price,['class'=>'form-control', 'placeholder'=>'$']) !!}
    </div>

    <div>
        <input type="submit" value="Guardar" class="btn btn-primary">
    </div>

{!! Form::close() !!}   