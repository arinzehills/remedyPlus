<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use DB;
use Cart;
use App\Models\Order;
use App\Models\Product;
class OrderController extends Controller
{
    public function index()
    {
        
        $categories=Category::all();
        /*$orders=DB::table('orders')
        ->where('user_id', auth()->user()->id)
        ->get();*/
        $orders=Order::with('products')->take(5)->orderBy('created_at')
        ->where('user_id', auth()->user()->id)
        ->get();
        return view('pages.orders', [
            'categories'=>$categories,
            'orders'=>$orders]
        );
    }
}
