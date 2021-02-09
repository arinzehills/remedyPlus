@extends('layout.app')


@section('contents')
@include('inc/navbar')
<style>
        @media only screen and (min-device-width: 595px)
       {
              #orders{
                width:35em
              }
       }

        @media only screen and (max-device-width: 595px)
       {
              #orders{
                width:95%
              }
       }
</style>
                @if(session()->has('success_message'))
                    <div class="text-green-600 font-bold ml-8 p-3">

                    {{session()->get('success_message')}}                
                    </div>
                @endif
       
         @if (count($orders)>0) 
          <h1 class="m-12 mb-4 md:ml-16  text-green-600 text-center uppercase "> thank you for ordering from remedy plus<h1>
                        <small class="text-center text-blue-600 m-12 md:ml-60">Your Last Four orders</small>
        @foreach ($orders as $order)
           {{--}} {{$order->quantity}}--}}
           <div style="border:1px solid blue;" id="orders" class="md:ml-64 ml-4 mt-4 shadow-lg">
               <div  class="flex border-blue-700 p-4"> 
                        <div class=" p-4 h-auto"  style=""> 
                                <a href="{{route('products.show',$order->product->id)}}">
                              <img style="height:100px;weight:100px" src="{{asset('storage/'.$order->product->image)}}"></a>  
                        </div>
                        <div class="ml-8 p-2">
                               <p class="overflow-hidden ..."> PRODUCT NAME: {{$order->product->name}}</p>
                                <p> DATE PURCHASED: <i class="fa fa-calendar" aria-hidden="true"></i>
                                         {{$order->created_at}} <i class="fa fa-clock-o" aria-hidden="true"></i> </p>
                                <p> Product ID:{{$order->product_id}}</p>
                        </div>
                </div>
                
                
                <div style="border:1px solid blue; width:100%; height:3em" class="block flex border-100 ">
                        <div  class="ml-4 mt-2">
                        <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                Quantity : {{$order->quantity}}
                        </div>
                        <div class="text-right">
                        <h4  class="text-right md:ml-64 ml-28 mt-2"><i class="fa fa-money" aria-hidden="true"></i>
                                        Amount :  {{$order->amount}} </h4>
                        </div>
                </div>
           </div>
        @endforeach
        @else
                <div style="background:blue" class="h-96 mt-16">
                
                <p class="text-center text-white font-bold pt-12"> NO ORDERS </p>

               <h1 class="text-center mt-16 text-white h-64"> <i class="fa fa-shopping-bag fa-5x" ></i></h1>
                   <!--<div><a style="border: white; border-radius:0px; width:10em;"> 
                        SHOP NOW </a><div>-->
                     </div>
        @endif
        
        <div style="clear:both" class="mt-16">
  @include('inc/footer')
  <div>
  

@endsection