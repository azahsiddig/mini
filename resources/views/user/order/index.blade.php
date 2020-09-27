@extends('user.layout.user')

@section('title')
    User | Orders
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
          <div class="card">
                <div class="card-header">
                <h3 class="card-title" style="font-weight: bold"> My ORDERS </h3>
                <br>
                </div>
                @foreach ($orders  as $order )
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                            <h3 class="card-title" style="float:left;font-weight: bold"> Order: ID {{$order->id}} </h3>
                                <form action="{{route('usergetPdf',$order->id)}}" >
                                    <input type="submit" class="btn btn-sm btn-primary pull-right" value="pdf">
                                <form>
                            </div>
                            <div class="card-body">
                                <br><h3 > Items </h3>
                                <div>
                                <table class="table table-bordered" style="font-size:16px">
                                  <tr>
                                    <th> Name  </th>
                                    <th> Quantity </th>
                                    <th> Price</th>
                                  </tr>
                                  @foreach($order-> orderItems as $item)
                                    <tr>
                                        <td> {{$item->name}} </th>
                                        <td> {{$item->pivot->qty}}</th>
                                        <td> {{$item->pivot->total}}</th>
                                    </tr>
                                    @endforeach
                                    <tr > <th colspan="3" style="text-align:center">Total {{$order->total}} </th></tr>
                                </table>
                              </div>
                            </div>
                        </div>
                    </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>

      </div>
@endsection
