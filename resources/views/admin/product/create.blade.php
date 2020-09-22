@extends('admin.layout.admin')

@section('title')
    Admin | New Product
@endsection

@section('content')
    <h3>New Product</h3>
    <div class='row'>
        <div class='col-md-6 col-md-offset-3'>
            {!! Form::open(['route'=>'product.store','method'=> 'post' , 'files'=>true]) !!}

            <div class="form-group">
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name', null, array('class'=> 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('price', 'price') }}
                {{ Form::text('price', null, array('class'=> 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('discreption', 'Discreption') }}
                {{ Form::text('discreption', null, array('class'=> 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('image', 'Image') }}
                {{ Form::file('image',  array('class'=> 'form-control')) }}
            </div>
            {{ Form::submit('Create', array('class'=> 'btn btn-success')) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
