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
    <form class="lg:mt-6 lg:w-84" id="paymentForm" name="form" method="POST" action="{{route('checkout.store')}}">
    {{csrf_field()}}

         <input type="hidden" name="amount" id="amount" value="{{Cart::total()}}">
         <input type="hidden" name="user_id" id="user_id" value="{{auth()->user()->id}}">
           @foreach (Cart::content() as $item)
          <input type="hidden" name="quantity" id="amount" value="{{$item->qty}}">
           <input type="hidden" name="product_id" id="product_id" value="{{$item->model->id}}">
          @endforeach
      <label for="name"  class="block text-xs font-semibold text-gray-600 uppercase">Name</label>
          <input id="firstname" name="name" value="{{auth()->user()->name}}"
          type="text" name="name" placeholder="Full Name"  class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner"  />
      <label for="Phone" class="block text-xs font-semibold text-gray-600 uppercase">Phone</label>
          <input name="phone" type="text" placeholder="Phone"  class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 " required />
       <label for="email" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">E-mail</label>
       <input id="email" type="email" name="email" autocomplete="email" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200" value="{{auth()->user()->email}}" readonly/>
       
       <label for="address" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">Address</label>
      <input  type="text" name="address" placeholder="address"  class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 " />
      
      <label for="State" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">State</label>
      <input  placeholder="State" name="state" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200" />
       <label class="block mt-2 text-xs font-semibold text-gray-600 uppercase">City</label>
       <input  type="text" name="city" placeholder="City"  class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 "  />
        
      <button type="submit" Name="pay" class="w-full mt-6 font-medium text-blue-700 uppercase shadow-lg" >
        Save and continue
      </button> 
      
    </form>
        </div>
       
        <div class="hidden md:inline md:h-auto h-12 md:ml-12 place-items-center lg:ml-32 bg-white p-8 divide-y-4 
        divide-yellow-600 divide-solid">
       YOUR ORDER({{Cart::count()}})
       @foreach (Cart::content() as $item)       
       <div class="divide-solid"><a><img style="height:100px;weight:100px" src="{{$item->model->image}}"></a>
             {{$item->model->name}}  </div>
           <div class="divide-solid">Price: {{$item->model->price}} </div>
        <hr>
       @endforeach
        <p class="text-right text-blue-600 mt-8"> Total: {{Cart::total()}}</p>
        </div>
    </div>
       
 <div style="clear:both" class="mt-16">
  @include('inc/footer')
  <div>
  
  <script>


   
</script>
@endsection