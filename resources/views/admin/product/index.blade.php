@extends('admin.layout.admin')

@section('title')
    Admin | Products
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title" style="font-weight: bold"> PRODUCTS </h3>
              <br>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table ">
                  <thead class=" text-primary" style="font-size: 18px;color:orange;font-weight: bold;">
                    <th width="20%"> Name </th>
                    <th width="20%"> Price</th>
                    <th width="40%"> image</th>
                  </thead>
                  <tbody>
                    @foreach ($products  as $item )
                    <tr style="font-size:16px">
                        <th> {{$item-> name}} </th>
                        <th> ${{$item-> price}}</th>
                        <th>
                            <a href="#" >
                                <img src="{{url('images/P',$item->image)}}" style="width:20%"/>
                            </a>
                        </th>

                        <th>
                            <!--a href="{{route('product.edit',$item->id)}}" class="btn btn-primary ">Edit </a-->
                            <form action="{{route('product.destroy',$item->id)}}" method="post">
                                {{ csrf_field() }}
                               {{method_field('Delete')}}
                                <input type="submit" class="btn btn-sm btn-danger pull-right" value="Delete">
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
