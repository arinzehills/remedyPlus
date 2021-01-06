@extends('layout.app')


@section('contents')
        @include('inc/navbar')
        <div class="mt-16 ml-8">
                <div class="">
                @if(session()->has('success_message'))
                    <div class="text-green-600 font-bold ml-8 p-3">
                    {{session()->get('success_message')}}                
                    </div>
                @endif
                @if (count($errors)>0)
                    <div class="bg-red-300 p-3 ml-8">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                    </ul>             
                    </div>
                    
                @endif
             
     @if (Cart::count()>0)   
         <h1 class="md:ml-10">{{Cart::count()}} ( Item(s) On Cart)<h1>
        </div>


        </div>
       
        <style>
            
        </style>
<!--items saved on cart-->
<table class="table-auto m-2 md:ml-16 border-separate border border-blue-600 overflow-ellipsis text-white w-20 md:w-auto"
  style="background:blue">
        <thead>
            <tr>
            <th class="text-left w-1/2 md:text-base text-sm">ITEM</th>
            <th  class="md:text-base text-sm ">QUANTITY</th>
            <th class="md:text-base text-sm ">UNIT PRICE</th>
            <th class="md:text-base text-sm ">SUB TOTAL</th>
            </tr>
        </thead>
        <tbody>
          @foreach (Cart::content() as $item)
            <tr>
          
            <td class="border flex text-sm md:text-base">
          
           
            <a href="{{route('products.show',$item->model->id)}}">
             <img style="height:100px;weight:100px" src="{{$item->model->image}}"></a>
             {{$item->model->name}}
            </td>
            <td  class="border m-6 w-8 text-sm md:text-base">
                            <select class="quantity text-blue-600 m-6 mb-1" data-id="{{$item->rowId}}">
                            @for ($i=1; $i<10 +1; $i++)
                                <option  {{$item->qty == $i ? 'selected': ''}}>{{$i}}</option>
                            @endfor
                                {{--<option {{$item->qty == 2 ? 'selected': ''}} >2</option>
                                <option {{$item->qty == 3 ? 'selected': ''}} >3</option>
                                <option {{$item->qty == 4 ? 'selected': ''}} >4</option>
                                <option {{$item->qty == 5    ? 'selected': ''}} >5  </option>--}}
                            </select> 
                            
                            <form action="{{route('cart.destroy', $item->rowId)}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <button type="submit" class="bg-white content-start ml-2 mt-4 w-24 text-blue-600 "> 
                  <p class="fa fa-trash"> Remove</p> 
                    </button> 
                    </form>
                            
            </td>
            <td  class="border text-center md:text-base text-sm ">{{'N'. $item->model->price}}<br>
             <form action="{{route('cart.save', $item->rowId)}}" method="POST">
                    {{csrf_field()}}
                    <button type="submit" class="border-0  "> 
                  <p class="fa fa-heart text-white"> Save for Later</p> 
                    </button> 
                    </form>
            </td>
             <td  class="border md:text-base text-sm ">{{'N'. $item->subtotal}}</td>
            </tr>
                 
            @endforeach
         </tbody>
</table>
<div class="" style="color:blue">
<p class="ml-64 text-center">TOTAL : {{ 'N'. Cart::total()}}</p>

<a href="/"><button style="color:blue" class="content-center border-2 border-red-500 text-white border-12 w-52 m-16">
 CONTINUE SHOPPING </button></a>

<button style="color:blue" class="border-2 border-red-600 text-white w-52 m-16"><a href="/checkout">
 PROCEED TO CHECKOUT</a></button>
 @else
    <p class="md:ml-16">No items in cart</p>
@endif
<!--savefor later items-->

   @if (Cart::instance('saveForLater')->count()>0)   
         <h1 class="md:ml-16">{{Cart::instance('saveForLater')->count()}} Item(s) save for later<h1>
     <style>
            
        </style>
<table class="table-auto m-2 md:ml-16 border-separate border border-blue-600 overflow-ellipsis text-white"  style="background:blue">
        <thead>
            <tr>
            <th class="text-left w-1/2 md:text-base text-sm">ITEM</th>
            <th  class=" w-1/8 md:text-base text-sm">QUANTITY</th>
            <th class="md:text-base text-sm">UNIT PRICE</th>
            <th class="md:text-base text-sm">SUB TOTAL</th>
            </tr>
        </thead>
        <tbody>
          @foreach (Cart::instance('saveForLater')->content() as $item)
            <tr>
          
            <td class="border flex text-sm md:text-base">
          
           
            <a href="{{route('products.show',$item->model->id)}}">
             <img style="height:100px;weight:100px" src="{{$item->model->image}}"></a>
             {{$item->model->name}}
            </td>
            <td  class="border text-sm md:text-base m-6 w-8">
                            <select class="quantity text-blue-600 m-6 mb-1" data-id="{{$item->rowId}}">
                                <option {{$item->qty == 1 ? 'selected': ''}} >1</option>
                                <option {{$item->qty == 2 ? 'selected': ''}} >2</option>
                                <option {{$item->qty == 3 ? 'selected':''}} >3</option>
                                <option {{$item->qty == 4 ? 'selected':''}} >4</option>
                                <option {{$item->qty == 5 ? 'selected':''}} >5  </option>
                            </select> 
                          <form action="{{route('SaveForLater.destroy', $item->rowId)}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <button type="submit" class="bg-white content-start ml-2 mt-4 w-24 text-blue-600 "> 
                  <p class="fa fa-trash"> Remove</p>  
                  </button>
                  </form>
                            
            </td>
            <td  class="border text-sm md:text-base text-center">{{'N'. $item->model->price}}
           <form action="{{route('SaveForLater.switchToCart', $item->rowId)}}" method="POST">
                        {{csrf_field()}}
                    <button type="submit" class="border-0  "> 
                  <p class="fa fa-heart text-white"> Move to Cart</p> 
                    </button> 
                    </form></td>
             <td  class="border text-sm md:text-base">{{'N'. $item->subtotal}}</td>
            </tr>
                 
            @endforeach
         </tbody>
</table>
 @else
 <p class="text-2xl md:ml-16 uppercase"> items saved for later</p>
   <p class="md:ml-16"> No items Saved for later </p>
@endif
</div>

 <p class="text-2xl md:ml-16"> More Products Related To This</p>
 @foreach ($mightAlsoLike  as $product)
            <div class=" rounded-lg border m-8 w-60 h-84 float-left text-white" 
            data-aos-duration="2000" data-aos="fade-up" style="background:blue">
                
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
                    <input type="hidden" name="id" value="{{$product->id}}">
                    <input type="hidden" name="name" value="{{$product->name}}">
                    <input type="hidden" name="price" value="{{$product->price}}">
                    <button class="bg-white content-start ml-4  mt-2 lg:w-52 md:w-auto w-52 text-blue-600 lg:p-0 pb-6 pt-1
                     p-2 fa fa-cart-arrow-down"> 
                    ADD TO CART
                    </button> 
                    </form>
                  </div>
                  
            </div>
          
     
          
        @endforeach
 <div style="clear:both" class="lg:m-0 mt-16">
  @include('inc/footer')
  <div>
@endsection
@section('extra_js')
<script async src="{{mix('js/app.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
<script>
(function(){
   const classname= document.querySelectorAll('.quantity')
    const classnameToArray = Array.prototype.slice.call(classname); 
   Array.from(classname).forEach(function(element){
       element.addEventListener('change', function(){
           const id=element.getAttribute('data-id');

           axios.patch(`cart/${id}`,{
            quantity: this.value
           })
           .then(function(response){
               //console.log(response);
                 window.location.href= '{{route('cart.index')}}'
           })
           .catch(function(error){
               console.log(error);
           });
           //alert('changed')
       })
   })
})();
</script>
@endsection