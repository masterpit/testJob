<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use Illuminate\Http\Request;
use App\Models\Product;

class BasketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Basket::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required'
        ]);
        $product = Product::find($request->product_id);

        if($Basket = Basket::where(['session_id' => session()->getId(),'product_id' => $product->product_id])->first()){
            $Basket->quantity++;
            $Basket->save();
        }else{

            $Basket = new Basket();
            $Basket->session_id = session()->getId();
            $Basket->product_id = $request->product_id;
            $Basket->price = $product->price;
            $Basket->email = $product->email;
            $Basket->save();
        }

        return $Basket;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Basket::find($id);
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
        $Basket = Basket::find($id);
        $Basket->update($request->all());
        return $Basket;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Basket::destroy($id);
    }
}
