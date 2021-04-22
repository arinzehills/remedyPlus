@extends('layout.app')


@section('contents')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@include('inc/navbar')

@include('layouts/loader')
<script>
setTimeout(function(){
            $('.loader_bg').fadeToggle();
                },1500); 
</script>

     
<h2 class="text-center m-16 mb-1 uppercase font-bold " style="font-size:30px;color:blue ">
{{$CategoryName}}
{{--{{($routing=href('/products') )? 'Products card'  $CategoryName}}--}}</h2>
@foreach ($products as $product)
            <div data-aos-duration="2000" data-aos="fade-up" 
            class="text-white rounded-lg border md:w-52 w-36 h-auto md:h-64  mb-2 ml-4 float-left" style="background:blue; ">
                
                    <img src="{{asset('storage/'.$product->image)}}" alt="Denim Jeans" class="md:h-28 md:w-28 md:ml-16" >
                  <h3 class="p-1 text-sm"> <a href="/products/{{$product->id}}">{{$product->name}}</a></h3>
                  <div >
                      <p style="" class="text-xs md:text-base pl-1">price : {{'N'.$product->price}} </p>
                  </div>
                  <div >
                      <p style="" class="text-xs md:text-base pl-1">Units left: {{$product->units}} </p>
                  </div>

                  <div class="p-2">
                   <form action="/cart" method="POST">
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$product->id}}">
                    <input type="hidden" name="name" value="{{$product->name}}">
                    <input type="hidden" name="price" value="{{$product->price}}">
                     <button  style="color:blue; background:white;
                      font-size:10px">ADD TO CARD
                      </button> 
                    </form>
                  </div>
                  
            </div>
        
        @endforeach
    <div style="clear:both;color:blue" class=" m-8">
      {{$products->links()}}
    </div>
    
    <div style="clear:both">
  @include('inc/footer')
  <div>
</body>
</html>

@endsection
