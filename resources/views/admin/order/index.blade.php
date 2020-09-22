@extends('admin.layout.admin')

@section('title')
    Admin | Orders
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title" style="font-weight: bold"> ORDERS </h3>
              <br>
            </div>
            <div class="card-body">

              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary" style="font-size: 18px;color:orange;font-weight: bold;">
                    <th> O-id </th>
                    <th> O-Date  </th>
                    <th> User</th>
                    <th> O-Net</th>
                  </thead>
                  <tbody>
                    @foreach ($orders  as $order )
                    <tr>
                        <th> {{$order-> O_id}} </th>
                        <th> {{$order-> O_date}}</th>
                        <th> {{$order-> user_name}}</th>
                        <th> ${{$order-> net}}</th>

                        <th>
                            <form action="{{route('order.destroy',$order->O_id)}}" method="POST">
                                {{ csrf_field() }}
                               {{method_field('Delete')}}
                                <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                            <form>
                        </th>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

      </div>
@endsection
