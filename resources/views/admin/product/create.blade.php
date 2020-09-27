@extends('admin.layout.admin')

@section('title')
    Admin | New Product
@endsection

@section('content')
    <h3>New Product</h3>
    <div class='row'>
        <div class='col-md-6 col-md-offset-3' >
            {!! Form::open(['route'=>'product.store','method'=> 'post' , 'files'=>true]) !!}

            <div class="form-group">
                <h4 style="text-align: left;"> Name: </h4>

                {{ Form::text('name', null, array('class'=> 'form-control')) }}
            </div>

            <div class="form-group">
                <h4 style="text-align: left;"> Price: </h4>
                {{ Form::text('price', null, array('class'=> 'form-control')) }}
            </div>

            <div class="form-group">
                <h4 style="text-align: left;"> Discreption: </h4>
                {{ Form::text('discreption', null, array('class'=> 'form-control')) }}
            </div>

            <div class="form-group">
                <h4 style="text-align: left;"> Image: </h4>
                {{ Form::file('image',  array('class'=> 'form-control')) }}
            </div>
            {{ Form::submit('Create', array('class'=> 'btn btn-success')) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
