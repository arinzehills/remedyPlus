   @extends('layout.app')
   @section('contents')
   <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <title>{{config('app.name','Remedy Plus')}}</title>
     <style>
    section:before{
        content:'';
        position:absolute;
        bottom: 0;
        left:0;
        width:100%;
        height:200px;
        background:#fff;
        clip-path:polygon(100% 0, 0 100%,100% 100%);
        
    }
   .card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.price {
  color: grey;
  font-size: 22px;
}

.card button {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.card button:hover {
  opacity: 0.7;
}
 .landingbtn{
font-size:33px;width:190px; border-radius:30px;
      height:50px;
      border-width:4px; color:blue;
      justify-content:center;
}

 #lol{
             right:35%;position:absolute; top:6em;height:30em
            }
/*for mid screens */

@media only screen and (min-device-width: 554px)
        and (max-device-width: 793px) and (-webkit-min-device-pixel-ratio: 1){
           
             #lol{
             right:5%;position:absolute; top:2em;height:20em
            }
             #down{
      position:absolute;
      width:110%;
      top:570%;
    
    }
    .product{
              top:20em; position:absolute; color:blue; left: 32%;
            }
         section{
               top:30px; right:1em; position:absolute; margin:10px; dislay:flex; border-radius:30px;
     background: blue ;width:50%;
      height:70vh;  -ms-transform: skewY(0deg); /* IE 9 */
  transform: skewx(-20deg);
            }
            #products-div{
              top:24em;
               position:absolute;
            }
    }
/*for mid and higher screens */
@media only screen and (min-device-width: 795px)
        and (-webkit-min-device-pixel-ratio: 1){
            section{
               top:30px; right:4em; position:absolute; margin:20px; dislay:flex; border-radius:30px;
     background: blue ;width:50%;
      height:70vh;  -ms-transform: skewY(0deg); /* IE 9 */
  transform: skewx(-20deg);
            }
            .product{
              top:32em; position:absolute; color:blue; left: 32%;
            }
             #down{
      position:absolute;
      width:100%;
      top:220%;
    
    }
     #moreproducts{
      position:absolute;top:180%;
      margin-bottom:3em;  
    }
     #products-div{
    top:37em; position:absolute;
    }
}
/* for android screens */
@media only screen and (max-device-width: 593px)
       {
             section{
               top:30px;  position:absolute;  display:flex; border-radius:5px;
     background: linear-gradient(135deg,blue,cyan);width:100%;
      height:60vh; 
            }
                section:before{
        content:'';
        position:absolute;
        bottom: 0;
        left:0;
        width:100%;
        height:200px;
        background:#fff;
        clip-path:polygon(100% 0, 0 100%,100% 100%);
        
    }
    h1{
      color:white
    }
   .product{
      top:31em; position:absolute; color:blue; left: 22%;
     
    }
    #down{
     position:absolute;
      width:100%;
      top:370%;
    
    }
    #lol{
right:35%; top:5em;height:30em
    }
    #moreproducts{
      position:absolute;top:380%;
      margin-bottom:3em;  
    }
     #products-div{
    top:35em; position:absolute;
    }
}

    </style>
    
    </head>
    <body>
     @include('inc/navbar')

     <section style="">
          </section>
           <img src="{{asset('/img/rubber.png')}}" id="lol" class="lol ml-32 md:ml-0" 
           style="">
         <div id="sect" style="top:30px;margin:30px; left:3px;font-weight:100px; position:absolute;">
            <h1 class="md:text-6xl text-3xl font-bold " id="head-text" style=" line-height: 150%;"> 
            YOUR HEALTH, YOUR <br>
            WEALTH
            </h1>
            <p style="margin:10px; color:blue" class="text-base md:text:3xl">
            Get the most out of your health by ordering<br>
            pharmaceutical products and snacks and <br>
            enjoy your health
            <p>
            @guest
              <a href="/products"><button class="landingbtn mb-8 md:pb-14 md:m-8 md:ml-2" style="">ORDER</button></a>
       <a href="/checkout"><button  class="landingbtn md:pb-14 md:ml-16;">SIGN UP</button></a>
            @else 
              <a href="/products"><button class="landingbtn mb-8 md:pb-14 md:m-8 mt-12 md:ml-2 border-none text-white"
               style="background: linear-gradient(135deg,blue,cyan);">SHOP</button></a>
              
            @endguest
        </div>

      
      
          
       <!-- @foreach ($products as $product)
          <img src="{{$product->image}}" alt="Denim Jeans" style="width:100%">
          <a href="/product/{{$product->id}}">{{$product->name}}
          class="price">{{$product->price}}
         
          @endforeach

   -->
        <div class="product" style="">
              <p style="font-size:40px; font-weight:bold" id="product"> PRODUCTS   </p>
        </div>

        <div  style="" id="products-div" class="md:ml-16">
              
            @foreach ($products as $product)
            
                 
              <div class="text-white rounded-lg border  md:w-52 w-36 h-auto md:h-64  mb-2 md:ml-20 ml-8 float-left" 
                          style=" background:blue;margin:1em;float:left; " data-aos-duration="2000" data-aos="fade-up">
                   <img src="{{$product->image}}" alt="Denim Jeans" class="md:h-28 md:w-28 md:ml-16" >
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
            
          
       
         <a href="/products"> <button class="bg-white content-start text-blue-600 w-64 m-8 md:p-0 pb-6"> MORE PRODUCTS</button>  
           </a>
         </div>
           
    <div style="clear:both;" id="down" >
@include('inc/footer')
  </div>
  
   </body>
    </html>
     @section('contents')
    @section('extra_js')
    <script>
  AOS.init();
    </script>
    @endsection
