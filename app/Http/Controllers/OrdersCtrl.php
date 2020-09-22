<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use App\OrderItems;


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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //$this-> $counter=1;
    public function create()
    {
        Order::create([
            'O_id'=> 'O_',
            'O_date'=> date('Y-m-d H:i:s'),
            'user_name'=> Auth::user()->name,
            'tax'=> Cart::tax(),
            'total'=> Cart::subtotal(),
            'net'=> Cart::total()
        ]);

        $cartitems= Cart::content();
        foreach ($cartitems as $item)
        {
            OrderItems::create([
                'O_id'=> 'O_',
                'name'=> $item->name,
                'price'=> $item->price,
                'quantity'=> $item->qty,
                'total'=> ($item->price * $item->qty)
            ]);

           Cart::destroy();

        }

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
}
