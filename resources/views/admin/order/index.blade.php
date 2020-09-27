@extends('admin.layout.admin')

@section('title')
    Admin | Orders
@endsection

@section('content')
      <div class="row">
        @foreach ($orders  as $order )
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title" style="float:left;font-weight: bold"> Orders by {{$order->user->name}} </h3>
              <form action="{{route('swich.delivered',$order->id)}}" method="POST" >
                {{csrf_field()}}
                <label for="delivered">Deliver</label>
                <input type="checkbox" value="1" name="delivered" {{$order->delivered ==1?"checked":""}}>
                <input type="submit" value="submit" class="btn btn-sm btn-success">
              </form>
              <br>
            <!--form action="{{route('getPdf',$order->id)}}" >
                <input type="submit" class="btn btn-sm btn-primary pull-right" value="pdf">
            <form-->

                <!--a class="btn btn-primary" href="{{ url('admin/order/order-pdf') }}">Export to PDF</a-->
            </div>
            <div class="card-body">
                <br><h4 > items </h4>
                <div >
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
@endsection
