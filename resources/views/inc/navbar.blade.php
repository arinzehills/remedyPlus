@extends('layout.app')
<!DOCTYPE html>
    <html>
    <head>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
  
    header{
      position:fixed;
      top:0;
      left:0;
      width:100%;
      display:flex;
      justify-content:space-between;
      align-items: center;
      transition:0.6s;
      z-index:100000;
    }
    header.sticky{
      padding:10px 5px;
      background: blue;
       position:fixed;

    }
    header.sticky ul li a{
        color: white;
    }
     header.sticky ul li .dropbtn{
        color: white;
    }
       header.sticky ul li .dropdown-a{
        color: blue;
    }
     header.sticky  .logo{
        color: white; 
         top:1px;
    }

   header .logo{
      position:relative;
      font-weight:700;
      color: blue;
      text-decoration: none;
      text-transform:uppercase;
      letter-spacing:2px;
      transition:0.6s;
      left:60px;
      top:10px;
    }
    header ul{
      position:absolute;
      display:flex;
      justify-content:right;
      right:20px;
      top:5px
    }
    header ul li{
      position:relative;
      list-style:none;
      
    }
    header ul li a{
      position:relative;
     margin:10px 15px;
     color:blue;
      text-decoration:none;
      font-weight:bold;
      transition:0.5s;
    }
    button{
            color:blue;
       background:  white;
        width:90px;
        height:30px;
       border-color:red;
        border-width:2px;
        border-radius:15px;
        text-transform:uppercase; 
        font-weight:bold;
    }
    .banner{
      position:relative;
      width:100%;
      height:auto;
      background-size:cover
    }
     header ul li a svg{
        height:30px;
        margin:0 15px;
        position:absolute;
         top:0em;
       }
       .dropdown {
  float: left;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: blue;
  background-color: inherit;
  font-family: inherit;
  margin: 2;
}

.dropdown-content {
  display: none;
  position: absolute;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  background:white
}

.dropdown-content a {
  float: none;
  color: blue;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}
#mobile-icons{
  display:none;
}
@media only screen and (min-device-width: 595px)
       {
              #mobile-menu{
                display:none;
              }
       }
@media only screen and (max-device-width: 593px)
       {
         header  .logo{
             top:4px;
             left:70px
           }
           .logo{
             font-size:13px;
           }
           .dropbtn{
             opacity:0;
           }
           header ul li a{
             margin:1px 0px;
              
              }
     header ul li a svg{
        height:20px;
        right:-10px;
        margin:0 20px
       }
       header ul{
         }
       
       #system{
       display:none;
       }
       .hid{
         display:none;
       }
       #mobile-icons{
  display:inline;
              }
      #mobile-menu{
        display:inline-block
      }
       .mobiledropbtn {
  color: red;
  border: none;
  cursor: pointer;
}



.dropdown {
  position: relative;
  display: inline-block;
}
.mobiledropdown-content {
  display:none;
  min-width: 160px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

    .mobiledropdown-content a {
      background:white;
      color: blue;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }
    header.sticky .mobiledropdown-content a {
      background:blue;
      color: white;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }
.show {
  display: block;
}
        .showCategories{
          display: block;
        }
   }
  
    </style>
    </head>
    <body>
    <header >
    <div >
     <img 
     style="height:90px;left:0.6em; top:-1.9em; position:absolute" src="{{asset('img/logo.png')}}">
         <!-- for mobile menu-->
        <div id="mobile-menu">
          <ul class="ul">
            <li class="" style="position:absolute; left:-20.5em;  ">
            <div class="mobiledropdown">
            <a href="javascript:;" onClick="return myFunction()" class="mobiledropbtn">
            <i class="fa fa-bars"  style="height:3em; padding-right:2em;" aria-hidden="true">
            </i></a>
             <div id="mobilemyDropdown" class="mobiledropdown-content">
                  <a href="/">Home</a>
                  <a href="/">About Us</a>
                  <a href="/cart">Cart</a>
                      <div class="mobiledropdown">
                      <a href="javascript:;" onClick="return CategoriesShow()" class="mobiledropbtn">
                        <i class="fa fa-caret-down float-left"></i>Categories</a>
                         <div id="categoriesDropdown" class="mobiledropdown-content">
                              <a class="text-sm ml-4 font-medium" href="/products">All</a>
                              @foreach ($categories as $category)
                                  <a class="text-sm font-medium ml-4" 
                                  href="{{route('products.index', ['category'=>$category->slug])}}">{{$category->name}}
                                  </a>
                              @endforeach
                            </div>
                          @guest
                           <a href="/register">Register</a>
                           @else
                          <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                         LOGOUT
                    </x-responsive-nav-link>
                </form>
                @endguest
                      </div>

                  <div >                
                  </div>
                </div>
            </div>
            </li>

        </div>

    <a href="#" class="logo">
     Remedy Drug Plus</a>
     <!-- for bigger menu-->
    <div>
      <ul class="ul">
          <li class="hid"><a href="/">Home</a></li>
           <li class="hid"><div class="dropdown">
    <button class="dropbtn">Categories
      <i class="fa fa-caret-down float-left"></i>
    </button>
    <div class="dropdown-content">
        <a class="dropdown-a" href="/products">All</a>
      @foreach ($categories as $category)
          <a class="dropdown-a" href="{{route('products.index', ['category'=>$category->slug])}}">{{$category->name}}</a>
      @endforeach
      </div>
  </div> </li>

          <li><a class="m-6 " href="/cart"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                               <path stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M3 3h2l.4 2M7 
                                13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 
                                0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                              </svg> @if (Cart::instance('default')->count()>0)
                                  
                              {{Cart::count()}}
                              @endif</a>
                               <li><a style="padding-left:1em" href=""><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg></a></li>
         
       @guest
        <li><a id="mobile-icons" href="/checkout"><i class="fa fa-user-circle"></i></a></li>
          <li><a id="system" href="/login"><button > Sign in</button></a></li>
        @else
        <li class="hid" >
          <div class="dropdown ">
              <button class="dropbtn overflow-hidden">{{ Auth::user()->name }}
                </button>
                 <i class="fa fa-caret-down float-left"></i>
              <div class="dropdown-content">
                   <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                         LOGOUT
                    </x-responsive-nav-link>
                </form>
                 
             </div>
         </div>
        </li>
      @endguest
       </ul>
     
    </header>
<section class="banner">

</section>
<script>
    window.addEventListener("scroll", function(){
      var header=document.querySelector("header");
      header.classList.toggle("sticky", window.scrollY > 0);
    })
    function myFunction() {
  document.getElementById("mobilemyDropdown").classList.toggle("show");
}
 function CategoriesShow() {
  document.getElementById("categoriesDropdown").classList.toggle("show");
}

  AOS.init();

</script>
    </body>
    @section('extra_js')
    <script>
AOS.init();
    </script>
    @endsection
