<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\userorders;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Order;
use PDF;
use Illuminate\Support\Facades\DB;




class userorders extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


    }
    public function orders($type='')
    {

        if($type == 'waiting')
        {
            $orders = Auth::user()->orders()->where('delivered','0')->get();
        }elseif($type == 'delivered')
        {
            $orders = Auth::user()->orders()->where('delivered','1')->get();
        }
        else{
            $orders = Auth::user()->orders()->get();
                }
        return View::make('user.order.index', ['orders' => $orders ]);

    }

    public function getPdf(Request $request, $orderid)
    {
        //$orders = Auth::user()->orders()->where('id',$orderid)->get();
        $orders = Order::find($orderid);
//dd($orders);
        $items = DB::table('order_product')->where('order_id', '=', $orderid)->first();
        //dd($items);
        $pdf = PDF::loadView('user.order.order-pdf', ['orders'=> $orders,'items'=>$items,'orderid']);
        return $pdf->download('order_inv.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}
