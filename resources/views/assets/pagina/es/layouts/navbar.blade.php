<!-- header -->
<div class="header" id="home">
    <div class="container">
        <ul>
            <li> <a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Sign In </a></li>
            <li> <a href="#" data-toggle="modal" data-target="#myModal2"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sign Up </a></li>
            <li><i class="fa fa-phone" aria-hidden="true"></i> Call : 01234567898</li>
            <li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:info@example.com">info@example.com</a></li>
        </ul>
    </div>
</div>
<!-- //header -->
<!-- header-bot -->
<div class="header-bot">
    <div class="header-bot_inner_wthreeinfo_header_mid">
        <div class="col-md-8 header-middle">
            <a class="menu__link" href="/">
                <img src="/logo.png" style="width: 30%;position: absolute; margin-top: -40px;">
               {{--  <h1><a href="index.html"><span>E</span>lite Shoppy <i class="fa fa-shopping-bag top_logo_agile_bag" aria-hidden="true"></i></a></h1> --}}
           </a>

        </div>
        <!-- header-bot -->
           
        <!-- header-bot -->
        <div class="col-md-4 agileits-social top_content">
            <ul class="social-nav model-3d-0 footer-social w3_agile_social">
                <li class="share">Share On : </li>
                <li><a href="#" class="facebook">
                    <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
                    <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
                <li><a href="#" class="twitter"> 
                    <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
                    <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div></a></li>
                <li><a href="#" class="instagram">
                    <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                    <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div></a></li>
                <li><a href="#" class="pinterest">
                    <div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
                    <div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div></a></li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- //header-bot -->
<!-- banner -->
<div class="ban-top">
    <div class="container">
        <div class="top_nav_left">
            <nav class="navbar navbar-default">
              <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav menu__list">
                    <li class="active menu__item menu__item--current"><a class="menu__link" href="/">Inicio <span class="sr-only">(current)</span></a></li>
                    <li class="dropdown menu__item">
                        <a href="{{route('paquetesCategoriaES',['idioma'=> 'es','categoria'=>'cocina'])}}" class="dropdown-toggle menu__link" >Productos</a>
                            
                    </li>
                     <li class=" menu__item"><a class="menu__link" href="about.html">Nosotros</a></li>
               
                    <li class="menu__item"><a class="menu__link" href="/contacto">Contacto</a></li>
                      <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" class="active" >
                                    <span class="glyphicon glyphicon-user"></span>
                                    @if (Auth::guest())
                                         Entrar
                                    @else
                                    {{ str_limit(auth()->user()->name,8)}}
                                    @endif
                                   
                                    
                                    <span class="caret"></span>
                                    </a>
                                <ul class="dropdown-menu " >
                                    <li>
                                        
                                        @if (Auth::guest())
                                           <a href="{{ route('register')}}">
                                              Crear cuenta</a>
                                          <a href="{{ route('login')}}">
                                              Iniciar sesi&oacute;n</a>
                                        @else
                                        <a href="{{ route('logout') }}">Cerrar sesi&oacute;n</a>
                                        
                                        @endif
                                       
                                   
                                        
                                    </li>
                                
                                </ul>
                            </li>
                  </ul>
                </div>
              </div>
            </nav>  
        </div>
        <div class="top_nav_right">
            <div class="wthreecartaits wthreecartaits2 cart cart box_1"> 
                        <form action="#" method="post" class="last"> 
                        <input type="hidden" name="cmd" value="_cart">
                        <input type="hidden" name="display" value="1">
                        <button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
                    </form>  
  
                        </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- //banner-top -->