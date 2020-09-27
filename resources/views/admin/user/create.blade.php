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
                <h4 style="text-align: left;"> Name: </h4>
                {{ Form::text('name', null, array('class'=> 'form-control')) }}
            </div>

            <div class="form-group">
                <h4 style="text-align: left;"> Phone: </h4>
                {{ Form::text('phone', null, array('class'=> 'form-control')) }}
            </div>

            <div class="form-group">
                <h4 style="text-align: left;"> Email: </h4>
                {{ Form::text('email', null, array('class'=> 'form-control')) }}
            </div>
            <div class="form-group">
                <h4 style="text-align: left;"> Password: </h4>
                {{ Form::text('password', null, array('class'=> 'form-control')) }}
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
