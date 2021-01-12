<?php

namespace App\Http\Controllers;
use App\Product; 
use Illuminate\Http\Request;
use App\Models\Category;

class PagesController extends Controller
{
    //
    public function index(){
        return view('pages/landing');
    }
    public function categories(){
        return view('pages/categories');
    }
    public function Products(){
        return view('pages/products');
    }
    public function checkout(){
        return view('pages/checkout');
    }
    public function thankyou(){
        $categories=Category::all();
        return view('pages/thankyou', [
            'categories'=>$categories]);;
    }
    public function continue(){
        return view('pages/continue');
    }
}
