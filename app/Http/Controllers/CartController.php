<?php

namespace App\Http\Controllers;
use Cart;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mightAlsoLike=Product:: mightAlsoLike()->get();
        $categories=Category::all();
        return view('pages.cart', [
            'mightAlsoLike'=> $mightAlsoLike,
            'categories'=>$categories,
        ]);
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
        $duplicates= Cart::search(function($cartItem,$rowId) use ($request){
            return $cartItem->id === $request->id;
        });
        if($duplicates->isNotEmpty()){
            return redirect()->route('cart.index')->with('success_message', 'Item is already in your cart');
        }
        Cart::add($request->id, $request->name, 1, $request->price)
        ->associate('App\Models\Product');
        
        
        return redirect()->route('cart.index')->with('success_message', 'Item has been added to cart');

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
       /* $validate= Validator::make($request->all(),[
            'quantity'=> 'required|numeric|between: 1,5'
        ]);
        if($validate->fails()){
            session()->flash('errors', collect (['Quantity must be between 1 and 5']));
            return  response()->json(['success'=> false, 400]);
        }*/

        Cart::update($id, $request->quantity);
        session()->flash('success_message', 'Quantity was updated successfully');
        return  response()->json(['success'=> true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);
        return back()->with('success_message', 'Item has been removed!');
    }

    /**
     * Save the specified resource from storage to use later.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function saveForLater($id)
    {
        $item= Cart::get($id);

        Cart::remove($id);

        $duplicates= Cart::instance('saveForLater')->search(function($cartItem,$rowId) use ($id){
            return $rowId === $id;
        });
        if($duplicates->isNotEmpty()){
            return redirect()->route('cart.index')->with('success_message', 'Item has already been saved for later');
        }

         Cart::instance('saveForLater')->add($item->id, $item->name, 1, $item->price)
        ->associate('App\Models\Product');
        
        
        return redirect()->route('cart.index')->with('success_message', 'Item has been saved for later');
    }
}
