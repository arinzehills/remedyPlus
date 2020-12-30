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
 <div class="m-4 sm:flex" style="background:blue">
        <div class="md:ml-0 min-h-screen lg:w-84 place-items-center bg-white p-12 lg:ml-32">
           <h1 class="text-xl font-semibold">Hello there 👋, <span class="font-normal">Fill your Billing Details</span></h1>
    <form class="lg:mt-6 lg:w-84">
      <label for="firstname" class="block text-xs font-semibold text-gray-600 uppercase">Name</label>
          <input id="firstname" type="text" name="name" placeholder="Full Name"  class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" required />
      <label for="firstname" class="block text-xs font-semibold text-gray-600 uppercase">Phone</label>
          <input id="firstname" type="text" name="name" placeholder="Full Name"  class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 " required />
       <label for="email" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">E-mail</label>
       <input id="email" type="email" name="email" placeholder="john.doe@company.com" autocomplete="email" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200" required />
       <label for="email" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">Address</label>
      <input id="firstname" type="text" name="name" placeholder="Full Name"  class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 " required />
      <label for="password-confirm" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">State</label>
      <input id="firstname" type="text" name="name" placeholder="Full Name"  class="block w-full p-3 mt-2 text-gray-700 bg-gray-200" required />
       <label for="password-confirm" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">City</label>
       <input id="firstname" type="text" name="name" placeholder="Full Name"  class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 " required />
      <button type="submit" class="w-full mt-6 font-medium text-blue-700 uppercase shadow-lg"><a href="{{route('continue')}}">
        Save and continue</a>
      </button> 
      
    </form>
        </div>
       
        </body><br>
    <div style="clear:both" class="mt-16">
  @include('inc/footer')
  <div>
@endsection