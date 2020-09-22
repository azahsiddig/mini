<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Product;
class HomeCtrl extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('front.home',compact('products'));
    }

    public function products()
    {
        $products = Product::all();
        return view('front.products',compact('products'));
    }

    public function product()
    {
        return view('front.product');
    }

}
