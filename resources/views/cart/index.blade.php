@extends('layout.main')

@section('title')
    Home | Cart Items
@endsection
@section('content')
<div class="row">
    <br>
    <br>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>qtn</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cartitems as $item)
            <tr>
                <td>{{$item->name}}</td>
                <td>{{$item->price}}</td>
                <td width="12px" style="width:300px">

                    {!! Form::open(['route'=>['cart.update',$item->rowId],'method'=>'PUT']) !!}
                    <input name="qty" type="text" value="{{$item->qty}}">
                    <input  type="submit" class="button small success " value="OK">
                    {!! Form::close() !!}

                    <form action="{{route('cart.destroy',$item->rowId)}}" method="post">
                        {{ csrf_field() }}
                       {{method_field('Delete')}}
                        <input  type="submit" class="button small alert" value="Delete">
                    <form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <table class="table">
        <thead class=" text-primary">
          <th>   </th>
          <th> Tax  </th>
          <th> Total </th>
          <th> Net </th>
          <th> Items </th>
        </thead>
        <tbody>
            <tr>
                <td>     </td>
                <td>
                    %{{Cart::tax()}}
                </td>
                <td>
                    ${{Cart::subtotal()}}
                </td>
                <td>
                    ${{Cart::total()}}
                </td>
                <td>
                    items:{{Cart::count()}}
                </td>
            </tr>
        </tbody>
    </table>
    <a href="{{url('/ordercheck')}}" class="button"> Order</a>
</div>

@endsection
