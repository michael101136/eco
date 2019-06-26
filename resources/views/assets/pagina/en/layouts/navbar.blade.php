 <!-- page loader -->
        <div class="se-pre-con"></div>
        <div id="page-content">
            <!-- navber -->
            <nav id="mainNav" class="navbar navbar-fixed-top"  style="background: #fdfdfd; color: red;">
                <div class="container">
                    <!--Brand and toggle get grouped for better mobile display--> 
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span><i class="fa fa-bars"></i>
                        </button>
                        <a class="navbar-brand" href="/en">
                            <img src="/plantilla/assets/images/logo.png" class="img-resposive" alt=""  id="logoPrincipal">
                        </a>
                    </div>
                    <!--Collect the nav links, forms, and other content for toggling--> 
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="/en">Home</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" class="active" >PACKAGES<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{route('paquetesCategoriaEN',['idioma'=> 'en','categoria'=>'adventure'])}}">ADVENTURE</a>
                                        <a href="{{route('paquetesCategoriaEN',['idioma'=> 'en','categoria'=>'mystical'])}}">MYSTICAL</a>
                                        <a href="{{route('paquetesCategoriaEN',['idioma'=> 'en','categoria'=>'traditional'])}}">TRADITIONAL</a>
                                        <a href="{{route('paquetesCategoriaEN',['idioma'=> 'en','categoria'=>'experiential'])}}">EXPERIENTIAL</a>
                                    </li>
                                   
                                </ul>
                            </li>
                            <li><a href="{{ route('nosotrosEn','en') }}">About us</a></li>
                            <li><a href="{{route('testimonioEn','en')}}">Testimonials</a></li>
                            <li><a href="{{ route('condicionesEn','en') }}">Conditions</a></li>
                            <li><a href="{{ route('contactoEn','en') }}">Contact</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" class="active" >
                                    <span class="glyphicon glyphicon-user"></span>
                                    @if (Auth::guest())
                                         Log in
                                    @else
                                    {{ str_limit(auth()->user()->name,8)}}
                                    @endif
                                   
                                    
                                    <span class="caret"></span>
                                    </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        
                                        @if (Auth::guest())
                                           <a href="{{ route('register')}}">
                                              Create account</a>
                                          <a href="{{ route('login')}}">
                                              Log in</a>
                                        @else
                                        <a href="{{ route('logout') }}">Close session</a>
                                        
                                        @endif
                                       
                                   
                                        
                                    </li>
                                
                                </ul>
                            </li>

                        </ul>
                        <ul class="nav navbar-nav navbar-right hidden-sm">
                            <li>
                                    <a class="nav-btn" href="{{route('product.shoppingCart',['idioma' =>'en' ])}}">
                                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart 
                                            
                                            @if (Session::has('cart'))
                                                <span class="badge"> 
                                                {{Session::has('cart') ? Session:: get('cart')->totalQty : ''}}    
                                                 </span>
                                            @endif
                                            
                                    </a>
                            </li>
                            <li>
                                    <a class="nav-btn" href="/es">
                                            <img src="/plantilla/assets/images/bandera/es.png" id="Logo_idioma">
                                    </a>
                            </li>
                        </ul>
                    </div> 
                    <div class="sticky-container"  id="redesSociales" style="background-color: rgba(0,0,0,.0001);">
                        <ul class="sticky">
                            <li>
                                <a href="https://es-la.facebook.com/goldenmachupicchu/" target="_blank"><img src="/public/slider/facebook.png" style="width:30px; height:30px;">
                                </a>
                            </li>
                            <li >
                               <a href="https://www.instagram.com/machupicchu_golden/?hl=es-la" target="_blank"> <img src="/public/slider/instagram.png" style="width:30px; height:30px;">
                               </a>
                            </li>
                            <li>
                                <a href="https://www.youtube.com/channel/UCcMt6opWHKI9CWNPe97pHLA" target="_blank"> <img src="/public/slider/youtube.png" style="width:30px; height:30px;">
                               </a>
                            </li>
                            <li>
                                <a href="https://twitter.com/machupicchug?lang=es" target="_blank"> <img src="/public/slider/twitter.png" style="width:30px; height:30px;">
                               </a>
                            </li>
                        </ul>
                    </div>
                </div> 
            </nav> 
            
            <style>
            .sticky-container{
    padding:0px;
    margin:0px;
    position:fixed;
    right:-130px;
    top:230px;
    width:210px;
    z-index: 1100;
}
.sticky li{
    list-style-type:none;
    color:#efefef;
    height:43px;
    padding: 22px;
    margin:0px 0px 1px 0px;
    -webkit-transition:all 0.25s ease-in-out;
    -moz-transition:all 0.25s ease-in-out;
    -o-transition:all 0.25s ease-in-out;
    transition:all 0.25s ease-in-out;
    cursor:pointer;
}
.sticky li:hover{
    margin-left:-15px;
}
.sticky li img{
    float:left;
    margin:5px 4px;
    margin-right:5px;
}
.sticky li p{
    padding-top:5px;
    margin:0px;
    line-height:16px;
    font-size:11px;
}
.sticky li p a{
    text-decoration:none;
    color:#2C3539;
}
.sticky li p a:hover{
    text-decoration:underline;
}
      
            </style>