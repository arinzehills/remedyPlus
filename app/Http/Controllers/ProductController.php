<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Models\Product;
use App\Models\Category;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        if(request()->category){
                $products = Product::with('categories')->whereHas('categories', function($query){
                    $query->where('slug',request()->category);
                })->paginate(10);
          
            $categoryName= optional($categories->where('slug', request()->category)->first())->name;
        }
        else{
            $products= Product::inRandomOrder()->take(10)->paginate(10);
            
            $categoryName='Products Card';
        }
       

        return view('pages.products', [
            'products'=> $products,
            'categories'=>$categories,
            'CategoryName'=> $categoryName,
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
        $categories=Category::all();
        $product= Product::where('id',$id)->firstOrFail();
        $mightAlsoLike=Product:: where('id','!=', $id)->mightAlsoLike()->get();

        return view('pages.productname', [
            'products'=> $product,
            'mightAlsoLike'=> $mightAlsoLike,
            'categories'=>$categories,
        ]);
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
