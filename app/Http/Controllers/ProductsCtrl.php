<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class productsCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index',['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $forminput =$request->except('image');
        //validation
        $this -> validate($request,['name'=>'required','price'=>'required','discreption'=>'required','image'=>'required','image'=>'image|mimes:png,jpg,jpeg|max:10000']);
        $image = $request->image;
        if($image)
        {
            $imageName = $image->getClientOriginalName();
            $image -> move('images/P',$imageName);
            $forminput ['image'] = $imageName;
        }
        Product::create($forminput);
        return redirect() -> route('admin.index');
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
        $product=Product::find($id);
        $formInput=$request->except('image');

//        validation
        $this->validate($request,[
            'name'=>'required',
            'price'=>'required',
            'image'=>'image|mimes:png,jpg,jpeg|max:10000'
        ]);

        //        image upload
        $image=$request->image;
        if($image){
            $imageName=$image->getClientOriginalName();
            $image->move('images/P',$imageName);
            $formInput['image']=$imageName;
        }

         $product->update($formInput);
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products=Product::findOrFail($id);
        $products->delete();
        return back();
    }

    public function reviw($id)
    {
        $product=Product::findOrFail($id);
        return view('admin.product.index',['product'=>$product]);
    }
}
