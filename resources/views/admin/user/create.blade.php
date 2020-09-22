@extends('admin.layout.admin')

@section('title')
    Admin | New User
@endsection

@section('content')
    <h3>New User</h3>
    <div class='row'>
        <div class='col-md-6 col-md-offset-3'>
            {!! Form::open(['route'=>'user.store','method'=> 'post' , 'files'=>true]) !!}

            <div class="form-group">
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name', null, array('class'=> 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('phone', 'phone') }}
                {{ Form::text('phone', null, array('class'=> 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('email', 'email') }}
                {{ Form::text('email', null, array('class'=> 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('password', 'password') }}
                {{ Form::text('password', null, array('class'=> 'form-control')) }}
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
