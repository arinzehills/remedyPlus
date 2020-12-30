<?php

namespace App\Http\Controllers;
use App\Product; 
use Illuminate\Http\Request;

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
        return view('pages/thankyou');
    }
    public function continue(){
        return view('pages/continue');
    }
}
