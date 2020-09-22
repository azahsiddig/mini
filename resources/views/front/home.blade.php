@extends('layout.main')

@section('title')
    Home
@endsection
@section('content')
<!--a href="{{route('cart.index')}}" style="underline:none;font-weight:bold;font-size:16px;color:rgba(2, 103, 40, 1);position:fixed;top:30px;right:20px;border-radius:100%;">
    <i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i>
    <span class="alert badge">
        {{Cart::count()}}
    </span>
</a-->
<section class="hero text-center">
    <br/>
    <br/>
    <br/>
    <br/>
    <h2 >
        <strong>
            Hey! Welcome to Mini Store
        </strong>
    </h2>
    <br>
    <a href="{{url('/products')}}"><button style="background:lightpink;color:rgba(2, 103, 40, 1.5);" class="button large">Check out our Products</button></a>
</section>
<br/>
<div class="subheader text-center">
     <h2>
     Latest Products
</h2>
</div>

<!-- Latest SHirts -->

<div class="row">
    @forelse ($products ->chunk(4) as $chunk)
        @foreach($chunk as $product)
        <div class="small-3 columns">
            <div class="item-wrapper">
                <div class="img-wrapper">
                    <a href="{{route('cart.edit',$product->id)}}"  class="button expanded add-to-cart">
                        Add to Cart
                    </a>
                    <a href="#">
                        <img style="width:200px" src="{{url('images/P',$product->image)}}"/>
                    </a>
                </div>
                <a href="{{url('/product')}}">
                    <h3>
                        {{$product->name}}
                    </h3>
                </a>
                <h5>
                    {{$product->price}}
                </h5>
                <p>
                    {{$product->discreption}}
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
<!-- Footer -->
<br>

@endsection
