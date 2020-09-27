<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use App\OrderItems;
use PDF;
use Illuminate\Support\Facades\DB;


class OrdersCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $orders = Order::all();
        return view('admin.order.index',['orders'=>$orders]);
    }

    public function orders($type='')
    {
        if($type == 'waiting')
        {
            $orders = Order::where('delivered','0')->get();
        }elseif($type == 'delivered')
        {
            $orders = Order::where('delivered','1')->get();
        }
        else{
            $orders = Order::all();
        }
        return view('admin.order.index',compact('orders'));
    }

    public function swichdelever(Request $request, $orderid )
    {
        $order = Order::find($orderid);
        if($request->has('delivered'))
        {
            $order->delivered = $request->delivered ;


        }
        else{
            $order->delivered ="0";
        }
        $order->save();

        $orders = Order::find($orderid);

        $items = DB::table('order_product')->where('order_id', '=', $orderid)->first();
        //dd($items);
        $pdf = PDF::loadView('admin.order.order-pdf', ['orders'=> $orders,'items'=>$items]);
        return $pdf->download('order_inv.pdf');
        return back();
    }

    public function getPdf(Request $request, $orderid)
    {
        $orders = Order::find($orderid);

        $items = DB::table('order_product')->where('order_id', '=', $orderid)->first();
        //dd($items);
        $pdf = PDF::loadView('admin.order.order-pdf', ['orders'=> $orders,'items'=>$items]);
        return $pdf->download('order_inv.pdf');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //$this-> $counter=1;
    public function create()
    {
        //$invoice_id = 'inv' . (str_pad((int)$latest->invoice_number + 1, 4, '0', STR_PAD_LEFT));
        $user = Auth::user();
        $order = $user->orders()->create([
            'O_date'=> date('Y-m-d H:i:s'),
            'tax'=> Cart::tax(),
            'total'=> Cart::subtotal(),
            'net'=> Cart::total(),
            'delivered'=> 0,
        ]);

        $cartitems= Cart::content();
        foreach ($cartitems as $item)
        {
            $order->orderItems()->attach($item->id,[
            'price'=> $item->price,
            'qty'=> $item->qty,
            'total'=> ($item->price * $item->qty)
            ]);
        }

           Cart::destroy();



       // $counter = $counter +100;
        return redirect('/');
       // return redirect() -> route('admin.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $orders=Order::findOrFail($id);
        $orders->delete();

        $orders_items=OrderItems::findOrFail($id);
        $orders_items->delete();

        return view("done");
    }

    public function approve()
    {

    }
}
