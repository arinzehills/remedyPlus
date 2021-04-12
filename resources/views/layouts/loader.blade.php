<style>
   .loader_bg{
    position:fixed;
    z-index: 999999;
    background:#fff;
    width:100%;
    height:100%;
}


.loading-spinner{
width: 7rem;
height: 7rem;
display: inline-block;
border: 3px solid red;
border-radius: 50%;
border-top-color:#ff5733 ;
margin-bottom: 10rem;
left: 42%;
top: 33%;
position: absolute;
animation: spin 2s infinite ease-in-out;
}
@keyframes spin{
    to{
        transform: rotate(360deg);
    }
}
.loading-dots  > div{
width: 3rem;
height: 3rem;
background-color: #ff5733;
border-radius: 50%;
display: inline-block;
animation: 1.5s bounce infinite ease-in-out;
        }

.loading-dots{
margin-left: 40%;
}
@keyframes bounce{
0%, 80%, 100%{
    transform: scale(0);
}
40%{
    transform: scale(1);
}
}


.loading-dots .bounce{
animation-delay: 0.3s;
}
.loading-dots .bounce2{
animation-delay: 0.15s;
}

.loading-name > div{
color: blue;
width: 3rem;
height: 3rem;
display: flex;
font-weight: bolder;
font-size: 2rem;
animation: 1.5s bounce infinite ease-in-out;

}
.loading-name{
left: 41%;
top: 55%;
position: absolute;
}
@keyframes name{
        0%, 80%, 100%{
            transform: scale(0);
        }
        40%{
            transform: scale(1);
        }
}
.loading-name .name{
    animation-delay: 0.1s;
}
.loading-name .name1{
    animation-delay: 0.2s;
}
.loading-name .name2{
    animation-delay: 0.3s;
}

@media only screen and (max-width: 792px)
    {
        
.loading-spinner{
  
                left: 31%;
               }
               .loading-dots{
                margin-left: 30%;
                }
                .loading-name{
                    left: 31%;
                    top: 60%;
                    }
    }
</style>
        <div class="loader_bg">
            <div class="loading-spinner">
                <img style="border-radius: 50%; height: 8rem; width: 7rem; left: 1em;" src="{{asset('/img/logo.png')}}">
            </div>

            <div class="loading-dots">
                <div class="bounce"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
            <div class="loading-name" style="display: inline-flex;">
                    <div class="name">Remedy</div>
                    <div class="name1" style="margin-left: 46px;"></div>
                    <div class="name2" style="margin-left: -16px;">Plus</div>
            </div>
        </div>
    
<script src="{{asset('js/jquery-1.12.4.min')}}"><script>
<script>
        setTimeout(function(){
            $('loader_bg').fadeToggle();
                },1500);
</script>