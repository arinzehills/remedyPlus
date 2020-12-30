@extends('layout.app')


@section('contents')
@include('inc/navbar')
        <div class="mt-20 md:ml-32  md:grid md:grid-cols-3 gap-4">
  <div class="...">  <h1 class="font-bold md:ml-32 ml-4 uppercase text-xl" >Checkout<h1></div>

  <div class="md:ml-40">
         <h1  class="font-bold uppercase text-xl w-64 sm:visible invisible" > Order summary <h1>
         </div>
  </div>
 <div class="m-4 md:flex" style="background:blue">
      <div class="md:ml-0 lg:w-84 place-items-center bg-white md:p-12 lg:ml-32">
           <h1 class="text-xl font-semibold">Hello there 👋, <span class="font-normal">Fill your Billing Details</span></h1>
    <form class="lg:mt-6 lg:w-84">
      <label for="firstname" class="block text-xs font-semibold text-gray-600 uppercase">Name</label>
          <input id="firstname"  value="{{auth()->user()->name}}"
          type="text" name="name" placeholder="Full Name"  class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" required />
      <label for="Phone" class="block text-xs font-semibold text-gray-600 uppercase">Phone</label>
          <input id="phone" type="text" name="name" placeholder="Full Name"  class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 " required />
       <label for="email" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">E-mail</label>
       <input id="email" type="email" name="email" placeholder="john.doe@company.com" autocomplete="email" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200" value="{{auth()->user()->email}}" readonly/>
       
       <label for="address" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">Address</label>
      <input id="address" type="text" name="name" placeholder="address"  class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 " required />
      
      <label for="State" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">State</label>
      <input id="State" type="text" name="name" placeholder="State"  class="block w-full p-3 mt-2 text-gray-700 bg-gray-200" required />
       <label for="password-confirm" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">City</label>
       <input id="firstname" type="text" name="name" placeholder="City"  class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 " required />
      <button type="submit" class="w-full mt-6 font-medium text-blue-700 uppercase shadow-lg"><a href="">
        Save and continue</a>
      </button> 
      
    </form>
        </div>
       
        <div class="hidden md:inline md:h-auto h-12 md:ml-12 place-items-center lg:ml-32 bg-white p-8 divide-y-4 
        divide-yellow-600 divide-solid">
       YOUR ORDER({{Cart::count()}})
       @foreach (Cart::content() as $item)       
       <div class="divide-solid"><a><img style="height:100px;weight:100px" src="{{$item->model->image}}"></a>
             {{$item->model->name}}  </div>
        <div class="divide-solid"> {{$item->model->name}}  </div>
        <div class="divide-solid">{{$item->model->price}}  </div>
        <hr>
       @endforeach
        </div>
    </div>
        
 <div style="clear:both" class="mt-16">
  @include('inc/footer')
  <div>
@endsection