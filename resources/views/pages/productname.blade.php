@extends('layout.app')


@section('contents')
@include('inc/navbar')
        <style>
        h1{
           font-size: 30px;
           color:white;
           font-weight:bold;
        }
         section:before{
        content:'';
        position:absolute;
        bottom: 0;
        left:0;
        width:100%;
        height:200px;
        background:#fff;
        clip-path:polygon(100% 10%  , 50% 100%,100% 100%);
        
    }
        </style>
        <body >

        <div class="md:m-32 mt-16 ml-12 md:w-auto w-60 mb-6 md:mr-60 md:flex" style="background:blue" >
            <img class="bg-red-500 md:h-80 h-52" src="{{$products->image}}">

                <div class="float-none">
                <p class="text-white h-8 p-2 font-bold"> Product Name : {{$products->name}}</p><br>
                <p class="text-white h-8 p-2 "> Product Description :   {!!$products->description!!}</p><br>
                <p class="text-white h-8 p-2 lg:mt-2 mt-24 "> Product Price: <button class="lg:p-0 pb-6 bg-white text-blue-600"> 
                {{$products->price}}</button></p>
                    <form action="/cart" method="POST">
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$products->id}}">
                    <input type="hidden" name="name" value="{{$products->name}}">
                    <input type="hidden" name="price" value="{{$products->price}}">
                    <button class="bg-white content-start ml-4  mt-8 lg:w-64 md:w-auto w-52 text-blue-600 lg:p-0 pb-6 pt-1
                     p-2 fa fa-cart-arrow-down"> 
                    ADD TO CART
                    </button> 
                    </form>
                    
                    <button class="bg-white content-start text-blue-600 lg:w-64 md:w-64 md:w-auto w-52 m-4 ml-4 font font-medium lg:p-0 pb-6 pt-1
                     p-2"> ORDER NOW
                     </button>  
                </div>
                  
        </div>
               <p class="text-2xl ml-16"> More Products Related To This</p>
            @foreach ($mightAlsoLike as $product)
            <div class=" rounded-lg border m-8 w-60 h-84 float-left text-white" style="background:blue">
                
                    <img src="{{$product->image}}" alt="Denim Jeans" class="md:h-40 md:w-32 md:ml-16">
                  <h3 class="p-1"> <a href="/products/{{$product->id}}">{{$product->name}}</a></h3>
                  <div >
                      <p style="" class="p-2">Price : {{$product->price}} </p>
                  </div>
                  <div class="">
                  </div>
                  
                  <div >
                      <p style="" class="p-2">Units left: {{$product->units}} </p>
                  </div>

                  <div class="p-2">
                       <form action="/cart" method="POST">
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$products->id}}">
                    <input type="hidden" name="name" value="{{$products->name}}">
                    <input type="hidden" name="price" value="{{$products->price}}">
                    <button class="bg-white content-start ml-4  mt-2 lg:w-52 md:w-auto w-52 text-blue-600 lg:p-0 pb-6 pt-1
                     p-2 fa fa-cart-arrow-down"> 
                    ADD TO CART
                    </button> 
                    </form>
                  </div>
                  
            </div>
          
        @endforeach
        </body><br>
    <div style="clear:both" class="mt-16">
  @include('inc/footer')
  <div>
@endsection