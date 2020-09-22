@extends('layout.main')

    @section('title')
        Home| Products
    @endsection

    @section('content')

    <div class="row">
        @forelse ($products ->chunk(4) as $chunk)
            @foreach($chunk as $product)

            <div class="small-3 columns">

                <div class="item-wrapper">
                    <div class="img-wrapper">
                        <a href="{{route('cart.edit',$product->id)}}" class="button expanded add-to-cart">
                            Add to Cart
                        </a>
                        <a href="#">
                            <img style="width:230px" src="{{url('images/P',$product->image)}}"/>
                        </a>
                    </div>
                    <a href="{{url('/reviw',$product->id)}}" style="font-weight:bold;font-size:16px;text-align: center;color:rgba(2, 103, 40, 1.5)">
                        <h3>
                            {{$product->name}}
                        </h3>
                    </a>

                    <p class="font-size:16px">
                        {{$product->discreption}}
                        <p class="pull-right">${{$product->price}}</p>
                    </p>
                </div>
            </div>
          @endforeach
            @empty
                <h3>
                    No Products
                </h3>
         @endforelse
     </div>
@endsection
