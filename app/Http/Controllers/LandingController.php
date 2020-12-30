<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
class LandingController extends Controller
{
    //
    public function index(){
        $products= Product::inRandomOrder()->take(10)->get();
        $categories=Category::all();

        return view('pages.landing', [
            'products'=> $products,
            'categories'=>$categories]);
    }

    public function show($id)
    {
       $product= Product::find($id);

       return view('pages.productname')->with('products', $product);
    }

}
