@extends('admin.layout.admin')

@section('title')
    Admin | Users
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title" style="font-weight: bold"> USERS</h3>
              <br>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary" style="font-size: 18px;color:orange;font-weight: bold;">
                    <th> Name  </th>
                    <th> Phone </th>
                    <th> Email </th>
                    <th> Image </th>
                  </thead>
                  <tbody>
                    @forelse ($users  as $user)
                      <tr style="font-size:16px">
                        <th>{{$user->name}}</th>
                        <th>{{$user->phone}}</th>
                        <th>{{$user->email}}</th>
                        <th>
                             <img src="{{url('images/U',$user->image)}}" style="width:20%"/>
                        </th>
                        <th>
                            <form action="{{route('user.destroy',$user->id)}}" method="post">
                                {{csrf_field() }}
                               {{method_field('Delete')}}
                                <input type="submit" class="btn btn-sm btn-danger pull-right" value="Delete">
                            <form>
                            </th>
                      </tr>
                      @empty
                        <h3>
                            No Users
                        </h3>
                      @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
    </div>
@endsection
