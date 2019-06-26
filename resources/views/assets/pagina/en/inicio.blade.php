@extends('assets.pagina.en.layouts.master')

@section('content')

<?php 
    function toursRecomendadosUnDiaIz($tour)
    {   

            $tourRe=''; 
            $varNumero=1;
                       
              foreach($tour as $item)
              {

                   if($varNumero<4)
                   { 
                        $tourRe.= '<div class="hotel-item">'.
                                        '<div class="hotel-image">'.
                                            '<a href="en/tours/detalle/'.$item->slug.'">'.
                                                '<div class="img"><img src="'.$item->img.'"  alt="" class="img-responsive"></div>'.
                                           ' </a>'.
                                        '</div>'.
                                        '<div class="hotel-body">'.
                                            '<div class="ratting">'.
                                                '<i class="fa fa-star"></i>'.
                                                '<i class="fa fa-star"></i>'.
                                                '<i class="fa fa-star"></i>'.
                                                '<i class="fa fa-star-half-o"></i>'.
                                                '<i class="fa fa-star-o"></i>'.
                                            '</div>'.
                                           ' <h3>'.$item->name.'</h3>'.
                                            //  '<p style="text-align: justify;">'.substr($item->description_short, 0,58).'</p>'.
                                            '<div class="free-service">'.
                                                '<i class="flaticon-television" data-toggle="tooltip" data-placement="top" title="" data-original-title="Plasma TV with cable chanels"></i>'.
                                                '<i class="flaticon-swimmer" data-toggle="tooltip" data-placement="top" title="" data-original-title="Swimming pool"></i>'.
                                                '<i class="flaticon-wifi" data-toggle="tooltip" data-placement="top" title="" data-original-title="Free wifi"></i>'.
                                                '<i class="flaticon-weightlifting" data-toggle="tooltip" data-placement="top" title="" data-original-title="Fitness center"></i>'.
                                                '<i class="flaticon-lemonade" data-toggle="tooltip" data-placement="top" title="" data-original-title="Restaurant"></i>'.
                                            '</div>'.
                                        '</div>'.
                                          '<div class="hotel-right">'.
                                            '<div class="hotel-person">DESDE <span class="color-blue">$ '.$item->price.'</span> </div>'.
                                            '<a class="thm-btn" href="en/tours/detalle/'.$item->slug.'">DETAILS</a>'.
                                        '</div>'.
                                    '</div>';
                             $varNumero ++;   
                        }else
                        {
                           break;    
                        }


                }

            return $tourRe;
                               
    } 

   function toursRecomendadosUnDiaDe($tour)
   {


            $tourRe=''; 
            $varNumero=1;
                       
              foreach($tour as $item)
              {

                   if($varNumero>3)
                   { 
                        $tourRe.= '<div class="hotel-item">'.
                                        '<div class="hotel-image">'.
                                           '<a href="en/tours/detalle/'.$item->slug.'">'.
                                                '<div class="img"><img src="'.$item->img.'"  alt="" class="img-responsive"></div>'.
                                           ' </a>'.
                                        '</div>'.
                                        '<div class="hotel-body">'.
                                            '<div class="ratting">'.
                                                '<i class="fa fa-star"></i>'.
                                                '<i class="fa fa-star"></i>'.
                                                '<i class="fa fa-star"></i>'.
                                                '<i class="fa fa-star-half-o"></i>'.
                                                '<i class="fa fa-star-o"></i>'.
                                            '</div>'.
                                           ' <h3>'.$item->name.'</h3>'.
                                            // '<p style="text-align: justify;">'.substr($item->description_short, 0,58).'</p>'.
                                            '<div class="free-service">'.
                                                '<i class="flaticon-television" data-toggle="tooltip" data-placement="top" title="" data-original-title="Plasma TV with cable chanels"></i>'.
                                                '<i class="flaticon-swimmer" data-toggle="tooltip" data-placement="top" title="" data-original-title="Swimming pool"></i>'.
                                                '<i class="flaticon-wifi" data-toggle="tooltip" data-placement="top" title="" data-original-title="Free wifi"></i>'.
                                                '<i class="flaticon-weightlifting" data-toggle="tooltip" data-placement="top" title="" data-original-title="Fitness center"></i>'.
                                                '<i class="flaticon-lemonade" data-toggle="tooltip" data-placement="top" title="" data-original-title="Restaurant"></i>'.
                                            '</div>'.
                                        '</div>'.
                                        '<div class="hotel-right">'.
                                            '<div class="hotel-person">SINCE <span class="color-blue">$ '.$item->price.'</span> </div>'.
                                           '<a class="thm-btn" href="en/tours/detalle/'.$item->slug.'">
DETAILS</a>'.
                                        '</div>'.
                                    '</div>';
                             
                        }
                         $varNumero ++;  


                }

            return $tourRe;

   }
   
    function sliderTexto($testimonio)
    {
          $htmlTemp='';
          $i=0;
          $tempNumero=0;
          
          foreach($testimonio as $item)
          {
              if($item->id > $tempNumero)
              {
                 $tempNumero= $item->id;
              }
          } 
          
          foreach($testimonio as $item)
          {
                if($item->id == $tempNumero )
                {
                    $htmlTemp.='<div class="item col-sm-10 col-sm-offset-1 active ">'.
                                ' <blockquote>'.$item->testimonial.''.
                                         ' <span class="author">'.$item->name.''.
                                         ' </span>'.
                                ' </blockquote>'.
                             '</div>';
                }else
                {
                    $htmlTemp.='<div class="item col-sm-10 col-sm-offset-1 ">'.
                                ' <blockquote>'.$item->testimonial.''.
                                     ' <span class="author">'.$item->name.''.
                                     ' </span>'.
                                ' </blockquote>'.
                             '</div>';
                }
                  
                
                 
          }
          return $htmlTemp;
        
    } 
    
    function sliderFotos($testimonioFotos)
    {
        $tempNumero=0;
           $htmlTemp='';
           $i=0;
          foreach($testimonioFotos as $item)
          {
              if($item->id > $tempNumero)
              {
                 $tempNumero= $item->id;
              }
          } 
          
           foreach($testimonioFotos as $item)
          {
                if($item->id == $tempNumero )
                {
                    $htmlTemp.='<li data-target="#quote-carousel" data-slide-to="'.$i.'" class="active">'.
                                ' <img class="img-responsive "  src="/admin/testimonio/'.$item->id.'.'.$item->photo.'" alt="">'.
                             '</li>';
                   
                     
                }else
                {
                     $htmlTemp.='<li data-target="#quote-carousel" data-slide-to="'.$i.'" class="">'.
                                ' <img class="img-responsive " src="/admin/testimonio/'.$item->id.'.'.$item->photo.'" alt="">'.
                             '</li>';
                }
                  
                 $i=$i+1;
                 
          }
          return $htmlTemp;
          
    }
    

?>

<style type="text/css">
	.my-fixed-item {
   position: fixed;
   margin-top: 250px;
    min-height: 40px;
    width: 167px;
    text-align: center;
    word-wrap: break-word;
    z-index: 1000;
    background-color: aquamarine;
    
    font-family: sans-serif; 
font-size: 18px; 
font-weight: 400; 
color: #ffffff; 
background:#ef0808;
border-radius: 35px 0px 35px 0px;
-moz-border-radius: 35px 0px 35px 0px;
-webkit-border-radius: 0px 0px 35px 0px;
border: 2px solid #fafcff;

}
#mdialTamanio{
      width: 80% !important;
    }
    
        @keyframes slidy {
0% {margin-left: 0;}
	20% {margin-left: 0;}
	
	25% {margin-left: -100%;}
	45% {margin-left: -100%;}
	
	50% {margin-left: -200%;}
	70% {margin-left: -200%;}
	
	75% {margin-left: -300%;}
	100% {margin-left: -300%;}
}

body { margin: 0; } 
div#slider { overflow: hidden; }
div#slider figure img { width: 20%; float: left; }
div#slider figure { 
  position: relative;
  width: 500%;
  margin: 0;
  left: 0;
  text-align: left;
  font-size: 0;

  animation: 30s slidy infinite alternate linear; 
}

@media screen and (max-width:640px) {
 #divslider{
         margin-top: 51px !important;
  }
}
@media screen and (min-width:1024px) {
  #divBuscador{
      margin-top: 122px;
  }
   #divslider{
          margin-top: 70px! important;
          max-width:1500px;
  }
}

@media screen and (max-width: 1200px) , screen and (max-height: 1399px) {

 #divslider{
          margin-top: 80px! important;
          max-width:1898px;
          max-height:1898px;
  }
}

</style>
<div class="my-fixed-item">
     
    <h5><span class="glyphicon glyphicon-shopping-cart" ></span> <a data-toggle="modal" data-target="#elIDdelModal" style="color: white;cursor:pointer;">SHOPPING GUIDE
</a> </h5>
                               
</div>
<!--    <div class="slider-wrapper">-->
<!--                    <div class="responisve-container">-->
<!--                        <div class="slider">-->
<!--                            <div class="fs_loader"></div>-->
<!--                            <div class="slide">-->
<!--                                <p class="uc" data-position="150,360" data-in="top" data-step="1" data-out="top" data-ease-in="easeOutBounce">Welcome to</p>-->
<!--                                <p class="slider-titele" data-position="210,200" data-in="left"  data-step="2" data-delay="100">MACHUPICCHU GOLDEN</p>-->
                                
<!--                                <a href="{{ route('nosotrosEs','es') }}" class="thm-btn" data-position="370,435" data-in="bottom" data-out="right" data-step="2" data-delay="1500">Read more-->
<!--</a>-->
<!--                            </div>-->
<!--                            <div class="slide">-->
<!--                                <p class="uc" data-position="150,360" data-in="top" data-step="1" data-out="top">LUGARES </p>-->
<!--                                <p class="slider-titele" data-position="210,200" data-in="bottom"  data-step="2" data-delay="100">MAGICOS ESPERAN POR TI</p>-->
                                
<!--                                <a href="{{ route('nosotrosEs','es') }}" class="thm-btn" data-position="370,435" data-in="bottom" data-out="right" data-step="2" data-delay="1500">Read more-->
<!--</a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
                <!-- booking -->
                
    <!--<div id="slider">-->
        
    <!--    <figure>-->
        <!--<a href="https://www.machupicchugolden.com/es/tours/detalle/cusco-super-aventurero-7-dias-y-6-noches-by-car"> <img src="/public/slider/promo.jpg" alt> </a>-->
    <!--    <img src="/public/slider/img_1.jpg" alt>-->
    <!--    <img src="/public/slider/img_2.jpg" alt>-->
    <!--    <img src="/public/slider/img_1.jpg" alt>-->
    <!--    <img src="/public/slider/img_2.jpg" alt>-->
    <!--    </figure>-->
    <!--</div>-->
    
    <div id="divslider" class="w3-content w3-display-container">

            <!--<img class="mySlides w3-animate-fading" src="/public/slider/promoEn.jpg" style="width:100%">-->
            <a href="https://www.machupicchugolden.com/es/tours/detalle/machupicchu-super-aventurero-7-dias-y-6-noches-by-car"> <img class="mySlides w3-animate-fading" src="/public/slider/en.jpg" style="width:100%"></a>
            <a href="https://www.machupicchugolden.com/es/tours/detalle/cusco-aventurero-5-dias-y-4-noches-en-tren"> <img class="mySlides w3-animate-fading" src="/public/slider/promoAventureroEn.jpg" style="width:100%"></a>
            
            <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
          <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
    </div>
                <div class="container boking-inner">
                    <div class="row">
                        <div class="col-sm-12" id="divBuscador">
                            <div class="panel">
                                <div class="panel-heading">
                                    <ul class="nav nav-tabs">
                                        <li class="active"></li>
                                    </ul>
                                </div>
                                <div class="panel-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="tab1default">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-9 col-md-10">

                                                        <div class="row panel-margin">
                                                            <div class="col-xs-6 col-sm-4 col-md-3 panel-padding">
                                                                <label>Prices</label>
                                                                <div class="icon-addon">
                                                                    <!--<input type="text" placeholder="Price" id="price"  class="form-control"  />-->
                                                                    <select class="form-control" id="precio" name="precio">  
                                                                        <option value="0-1800"> CHOOSE AN OPTION</option>
                                                                        <option value="0-200">[0 - 200]</option>
                                                                        <option value="200-400">[200 - 400]</option>
                                                                        <option value="400-600">[400 - 600]</option>
                                                                        <option value="600-800">[600 - 800]</option>
                                                                        <option value="800-1000">[800 - 1000]</option>
                                                                        <option value="1000-1200">[1000 -1200]</option>
                                                                        <option value="1200-1400">[1200 - 1400]</option>
                                                                        <option value="1400-1600">[1400 - 1600]</option>
                                                                        <option value="1600-1800">[1600 - 1800]</option>
                                                                    </select>
                                                                    <!--<label class="glyphicon fa fa-dollar"  title="email"></label>-->
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-6 col-sm-4 col-md-4 panel-padding">
                                                                <label>City</label>
                                                                <div class="icon-addon">
                                                                    <!--<input type="text" placeholder="Department" id="departamento" class="form-control" />-->
                                                                    <select class="form-control" id="departamento" name="departamento">
                                                                        <option value="Cusco">Cusco</option>
                                                                        <option value="Puno">Puno</option>
                                                                        <option value="Arequipa">Arequipa</option>
                                                                        <option value="Lima">Lima</option>
                                                                        
                                                                        <option value="Selva">Selva</option>
                                                                        <option value="Nazca">Nazca</option>
                                                                        <option value="Ica">Ica</option>
                                                                        <option value="Bolivia">Bolivia</option>
                                                                    </select>
                                                                    <!--<label class="glyphicon fa fa-suitcase"  title="email"></label>-->
                                                                </div>
                                                            </div>
                                                            <!--<div class="col-xs-6 col-sm-4 col-md-2 panel-padding">-->
                                                            <!--    <label>Date</label>-->
                                                            <!--    <div class="icon-addon">-->
                                                            <!--        <input type="text" placeholder="Date"  class="form-control" id="datepicker2"/>-->
                                                            <!--        <label class="glyphicon fa fa-calendar"  title="email"></label>-->
                                                            <!--    </div>-->
                                                            <!--</div>-->
                                                           
                                                        </div>

                                                </div>

                                                <div class="col-xs-12 col-sm-3 col-md-2">
                                                    <button type="button" class="thm-btn" id="filtradosTours">Search for</button>
                                                </div>

                                            </div>

                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- popular tour -->
                <section class="popular-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="title">
                                    <h2>POPULAR TOURS </h2>
                                </div>
                            </div>
                        </div>
                        <div class="row thm-margin">
                            <div id="popular-slide" class="owl-carousel">

                            @foreach($tourPrincipal as $itemp)

                                <div class="item">
                                    <div class="grid-item-inner">
                                        <div class="grid-img-thumb">
                                            <!-- ribbon -->
                                            <div class="ribbon"><span>{{ $itemp->categoriesName }}</span></div>
                                            <a href="{{route('detalleEsTour',['es'=>'en','tour' => $itemp->slug])}}"><img src="/{{ $itemp->img}}" alt="1" style=" height: 220px;"class="img-responsive" /></a>
                                        </div>
                                        <div class="grid-content">
                                            <div class="grid-price text-right">
                                                 <span><sub>$</sub>{{ $itemp->price}}</span>
                                            </div>
                                            <div class="grid-text">
                                                
                                                <div class="travel-times">
                                                    <h4 class="pull-left" style=" text-align: justify;">
                                                        <div style="
                                                        background-color: rgba(0,0,0,.5);
                                                        border-bottom-right-radius: 20px;
                                                        padding: 6px;font-family: 'Oswald', sans-serif;">{{ $itemp->name}}
                                                        </div> 
                                                    </h4>
                                                    <span class="pull-right">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             
                            @endforeach   
                            </div>
                        </div>
                    </div>
                </section>
               
                <section class="destination">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="title">
                                    <h2>POPULAR DESTINATIONS</h2>
                                    <p>ENJOY AN INCREDIBLE EXPERIENCE</p>
                                </div>
                            </div>
                        </div>
                        <div class="row thm-margin">
                            <div class="col-md-3 col-sm-4 thm-padding">
                                <div class="destination-grid">
                                    <a href="{{route('paquetesCategoriaEN',['idioma'=> 'en','categoria'=>'cusco'])}}"><img src="plantilla/assets/images/destinos/img_01.jpg" class="img-responsive" alt="">
                                        <div class="mask">
                                            <h2>CUSCO</h2>
                                            <p>
                                                Cusco es una ciudad del sureste del Perú ubicada en la vertiente oriental de la cordillera de los Andes.
                                            </p>
                                            <a href="{{route('paquetesCategoriaEN',['idioma'=> 'en','categoria'=>'cusco'])}}" class="thm-btn">Read more</a>
                                        </div>
                                        <div class="dest-name">
                                            <h4>CUSCO</h4>
                                        </div>
                                        <div class="dest-icon">
                                            <i class="flaticon-earth-globe" data-toggle="tooltip" data-placement="top" title="15 Tours"></i>
                                            <i class="flaticon-ship" data-toggle="tooltip" data-placement="top" title="9 Criuses"></i>
                                            <i class="flaticon-transport" data-toggle="tooltip" data-placement="top" title="31 Flights"></i>
                                            <i class="flaticon-front" data-toggle="tooltip" data-placement="top" title="83 Hotels"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 thm-padding">
                                <div class="destination-grid">
                                    <a href="{{route('paquetesCategoriaEN',['idioma'=> 'en','categoria'=>'puno'])}}"><img src="plantilla/assets/images/destinos/img_02.jpg" class="img-responsive" alt="">
                                        <div class="mask">
                                            <h2>PUNO</h2>
                                            <p>Puno es una ciudad del sur de Perú junto al lago Titicaca, uno de los más grandes de toda Sudamérica</p>
                                            <a href="{{route('paquetesCategoriaEN',['idioma'=> 'en','categoria'=>'puno'])}}" class="thm-btn">Read more</a>
                                        </div>
                                        <div class="dest-name">
                                            <h4>PUNO</h4>
                                        </div>
                                        <div class="dest-icon">
                                            <i class="flaticon-earth-globe" data-toggle="tooltip" data-placement="top" title="15 Tours"></i>
                                            <i class="flaticon-ship" data-toggle="tooltip" data-placement="top" title="9 Criuses"></i>
                                            <i class="flaticon-front" data-toggle="tooltip" data-placement="top" title="83 Hotels"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 thm-padding">
                                <div class="destination-grid">
                                    <a href="{{route('paquetesCategoriaEN',['idioma'=> 'en','categoria'=>'arequipa'])}}"><img src="plantilla/assets/images/destinos/img_03.jpg" class="img-responsive" alt="">
                                        <div class="mask">
                                            <h2>AREQUIPA</h2>
                                            <p>Arequipa es una ciudad peruana ubicada en la provincia y el departamento homónimos </p>
                                             <a href="{{route('paquetesCategoriaEN',['idioma'=> 'en','categoria'=>'arequipa'])}}" class="thm-btn">Read more</a>
                                        </div>
                                        <div class="dest-name">
                                            <h4>AREQUIPA</h4>
                                        </div>
                                        <div class="dest-icon">
                                            <i class="flaticon-earth-globe" data-toggle="tooltip" data-placement="top" title="15 Tours"></i>
                                            <i class="flaticon-ship" data-toggle="tooltip" data-placement="top" title="9 Criuses"></i>
                                            <i class="flaticon-transport" data-toggle="tooltip" data-placement="top" title="31 Flights"></i>
                                            <i class="flaticon-front" data-toggle="tooltip" data-placement="top" title="83 Hotels"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 thm-padding">
                                <div class="destination-grid">
                                    <a href="{{route('paquetesCategoriaEN',['idioma'=> 'en','categoria'=>'lima'])}}"><img src="plantilla/assets/images/destinos/img_04.jpg" class="img-responsive" alt="">
                                        <div class="mask">
                                            <h2>LIMA</h2>
                                            <p>Lima es la ciudad capital de la República del Perú. Se encuentra situada en la costa central del país.</p>
                                            <a href="{{route('paquetesCategoriaEN',['idioma'=> 'en','categoria'=>'lima'])}}" class="thm-btn">Read More</a>
                                        </div>
                                        <div class="dest-name">

                                            <h4>LIMA</h4>
                                        </div>
                                        <div class="dest-icon">
                                            <i class="flaticon-earth-globe" data-toggle="tooltip" data-placement="top" title="15 Tours"></i>
                                            <i class="flaticon-ship" data-toggle="tooltip" data-placement="top" title="9 Criuses"></i>
                                            <i class="flaticon-transport" data-toggle="tooltip" data-placement="top" title="31 Flights"></i>
                                            <i class="flaticon-front" data-toggle="tooltip" data-placement="top" title="83 Hotels"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 thm-padding">
                                <div class="destination-grid">
                                    <a href="{{route('paquetesCategoriaEN',['idioma'=> 'en','categoria'=>'selva'])}}"><img src="plantilla/assets/images/destinos/img_05.jpg" class="img-responsive" alt="">
                                        <div class="mask">
                                            <h2>SELVA</h2>
                                            <p>Se llama selva, jungla o bosque lluvioso tropical a los bosques densos con gran diversidad biológica.</p>
                                            <a href="{{route('paquetesCategoriaEN',['idioma'=> 'en','categoria'=>'selva'])}}" class="thm-btn">Read mores</a>
                                        </div>
                                        <div class="dest-name">
                                            <h4>SELVA</h4>
                                        </div>
                                        <div class="dest-icon">
                                            <i class="flaticon-earth-globe" data-toggle="tooltip" data-placement="top" title="15 Tours"></i>
                                            <i class="flaticon-ship" data-toggle="tooltip" data-placement="top" title="9 Criuses"></i>
                                            <i class="flaticon-transport" data-toggle="tooltip" data-placement="top" title="31 Flights"></i>
                                            <i class="flaticon-front" data-toggle="tooltip" data-placement="top" title="83 Hotels"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 thm-padding">
                                <div class="destination-grid">
                                    <a href="{{route('paquetesCategoriaEN',['idioma'=> 'en','categoria'=>'nazca'])}}"><img src="plantilla/assets/images/destinos/img_06.jpg" class="img-responsive" alt="">
                                        <div class="mask">
                                            <h2>NAZCA</h2>
                                            <p>Nazca es una ciudad peruana ubicada en la región centro-sur del Perú, capital de la homónima provincia de Nazca.</p>
                                            <a href="{{route('paquetesCategoriaEN',['idioma'=> 'en','categoria'=>'nazca'])}}" class="thm-btn">Read more</a>
                                        </div>
                                        <div class="dest-name">
                                            <h4>NAZCA</h4>
                                        </div>
                                        <div class="dest-icon">
                                            <i class="flaticon-earth-globe" data-toggle="tooltip" data-placement="top" title="15 Tours"></i>
                                            <i class="flaticon-ship" data-toggle="tooltip" data-placement="top" title="9 Criuses"></i>
                                            <i class="flaticon-transport" data-toggle="tooltip" data-placement="top" title="31 Flights"></i>
                                            <i class="flaticon-front" data-toggle="tooltip" data-placement="top" title="83 Hotels"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 hidden-sm thm-padding">
                                <div class="destination-grid">
                                    <a href="{{route('paquetesCategoriaEN',['idioma'=> 'en','categoria'=>'ica'])}}"><img src="plantilla/assets/images/destinos/img_07.jpg" class="img-responsive" alt="">
                                        <div class="mask">
                                            <h2>ICA</h2>
                                            <p>Capital del Departamento de Ica, situada en el estrecho valle que forma el río Ica.</p>
                                            <a href="{{route('paquetesCategoriaEN',['idioma'=> 'en','categoria'=>'ica'])}}" class="thm-btn">Read more</a>
                                        </div>
                                        <div class="dest-name">
                                            <h4>ICA</h4>
                                        </div>
                                        <div class="dest-icon">
                                            <i class="flaticon-earth-globe" data-toggle="tooltip" data-placement="top" title="15 Tours"></i>
                                            <i class="flaticon-ship" data-toggle="tooltip" data-placement="top" title="9 Criuses"></i>
                                            <i class="flaticon-transport" data-toggle="tooltip" data-placement="top" title="31 Flights"></i>
                                            <i class="flaticon-front" data-toggle="tooltip" data-placement="top" title="83 Hotels"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 hidden-sm thm-padding">
                                <div class="destination-grid">
                                    <a href="{{route('paquetesCategoriaEN',['idioma'=> 'es','categoria'=>'bolivia'])}}"><img src="plantilla/assets/images/destinos/img_08.jpg" class="img-responsive" alt="">
                                        <div class="mask">
                                            <h2>BOLIVIA</h2>
                                            <p> Es un país soberano situado en la región centro-occidental de América del Sur, </p>
                                            <a href="{{route('paquetesCategoriaEN',['idioma'=> 'es','categoria'=>'bolivia'])}}" class="thm-btn">Read more</a>
                                        </div>
                                        <div class="dest-name">
                                            <h4>BOLIVIA</h4>
                                        </div>
                                        <div class="dest-icon">
                                            <i class="flaticon-earth-globe" data-toggle="tooltip" data-placement="top" title="15 Tours"></i>
                                            <i class="flaticon-ship" data-toggle="tooltip" data-placement="top" title="9 Criuses"></i>
                                            <i class="flaticon-transport" data-toggle="tooltip" data-placement="top" title="31 Flights"></i>
                                            <i class="flaticon-front" data-toggle="tooltip" data-placement="top" title="83 Hotels"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- hotel -->
                <section class="hotel-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="title">
                                    <h2>RECOMMENDED TOURS</h2>
                                </div>
                            </div>
                        </div>
                         <div class="row">
                            <div class="col-sm-12 col-md-6">
                            
                               <?=toursRecomendadosUnDiaIz($toursRecomendadosTren);?>  

                            </div>
                             <div class="col-sm-12 col-md-6">
                            
                               <?=toursRecomendadosUnDiaDe($toursRecomendadosCarro);?>  
                               
                            </div>
                    </div>
                </section>
                <!-- Testimonial section -->
                <!--<div class="reference home-ref">-->
                <!--    <div class="container">-->
                <!--        <div class="row">-->
                <!--            <div class="col-md-6 col-md-offset-3">-->
                <!--                <div class="title">-->
                <!--                    <h2>ABOUT US</h2>-->
                <!--                    <p>MACHUPICCHU GOLDEN </p>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--        <div class="row">-->
                <!--            <div class="testimonials">-->
                <!--                <div class="carousel" data-ride="carousel" id="quote-carousel">-->
                <!--                    <div class="carousel-inner">-->
                                        <!-- Quote 1 -->  
                <!--                        <div class="item col-sm-10 col-sm-offset-1">-->
                <!--                            <blockquote>-->
                <!--                           We are a Travel Agency with highly qualified personnel and with the primary-->
                <!--                            objective of providing a personalized service and objective advice-->
                <!--                            during all the stages of planning your trip from the moment you-->
                <!--                            make the first contact with us.-->
                <!--                                <span class="author">- Macchupichu Golden</span>-->
                <!--                            </blockquote>-->
                <!--                        </div>-->
                                        <!-- Quote 2 -->  
                <!--                        <div class="item col-sm-10 col-sm-offset-1">-->
                <!--                            <blockquote>-->
                                           
                <!--                            We have staff with more than 15 years of experience in the tourism sector that is-->
                <!--                            in conditions to provide a differentiated service of optimal quality.-->
                <!--                                <span class="author">- Macchupichu Golden</span>-->
                <!--                            </blockquote>-->
                <!--                        </div>-->
                                        <!-- Quote 3 -->
                <!--                        <div class="item col-sm-10 col-sm-offset-1 active">-->
                <!--                            <blockquote>-->
                                            
                <!--                            Our commitment is to give you our best effort during-->
                <!--                            all your trip for which we will take care of a fast track and-->
                <!--                            efficient during your stay that convert your expectations into reality and that-->
                <!--                            endure as an unforgettable memory.-->
                <!--                                <span class="author">- Macchupichu Golden</span>-->
                <!--                            </blockquote>-->
                <!--                        </div>-->
                <!--                    </div>-->
                                    <!-- Bottom Carousel Indicators -->
                <!--                    <ol class="carousel-indicators">-->
                <!--                        <li data-target="#quote-carousel" data-slide-to="0" class=""><img class="img-responsive " src="plantilla/assets/images/avtar-1.jpg" alt=""></li>-->
                <!--                        <li data-target="#quote-carousel" data-slide-to="1" class=""><img class="img-responsive" src="plantilla/assets/images/avtar-2.jpg" alt=""></li>-->
                <!--                        <li data-target="#quote-carousel" data-slide-to="2" class="active"><img class="img-responsive" src="plantilla/assets/images/avtar-3.jpg" alt=""></li>-->
                <!--                    </ol>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
                <!-- package section -->
                 <!-- Counter -->
                <section class="counter-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="count-content">
                                    <div class="count-icon">
                                        <i class="flaticon-earth-globe"></i>
                                    </div>
                                    <div class="count">
                                        <h1 class="count-number">348</h1>
                                        <div class="count-text">Destinations</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="count-content">
                                    <div class="count-icon">
                                        <i class="flaticon-cabin"></i>
                                    </div>
                                    <div class="count">
                                        <h1 class="count-number">89</h1>
                                        <div class="count-text">Hotels</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="count-content">
                                    <div class="count-icon">
                                        <i class="flaticon-photographer-with-cap-and-glasses"></i>
                                    </div>
                                    <div class="count">
                                        <h1 class="count-number">987</h1>
                                        <div class="count-text">Tourists</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="count-content">
                                    <div class="count-icon">
                                        <i class="flaticon-airplane-flight-in-circle-around-earth"></i>
                                    </div>
                                    <div class="count">
                                        <h1 class="count-number">891</h1>
                                        <div class="count-text">Tour</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section><br><br><br><br>
                <!-- blog section -->
                
                <section class="package">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="title">
                                    <h2>TOURIST PACKAGES</h2>
                                    <p>Enjoy with us our tour packages.</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            
                            @foreach($toursPorCategoria as $item)
                            <div class="col-xs-12 col-sm-4 col-md-3">
                                <div class="package-wiget">
                                    <div class="grid">
                                        <figure class="effect-milo">
                                         <img src="/{{$item->img}}" class="img-responsive" alt="">
                                            <figcaption>
                                                <div class="effect-block">
                                                    <h3>{{$item->namecategorie}}</h3>
                                                    <div class="package-ratting">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    
                                                       <a href="{{route('detalleEsTour',['es'=>'en','tour' => $item->slug])}}" class="thm-btn" style=" height: 30px;">Detail</a>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </div>
                                    <div class="package-content">
                                        <a href="{{route('detalleEsTour',['es'=>'en','tour' => $item->slug])}}"  style=" height: 30px;">
                                            <h5 style="font-family: 'Oswald', sans-serif;">{{$item->nametour}}</h5>
                                            <div class="package-price">Desde
                                                <span class="price">
                                                    <span class="amount">$ {{$item->price}}</span>
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                           
                        </div>
                    </div>
                </section>
               
                
                    <div class="reference home-ref">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="title">
                                    <h2>TESTIMONIES</h2>
                                    <p>SHARE WITH US YOUR TRAVEL EXPERIENCES </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="testimonials">
                                <div class="carousel" data-ride="carousel" id="quote-carousel">
                                    <div class="carousel-inner">
                                        <!-- Quote 1 -->  
                                       
                                      
                                        <?=sliderTexto($testimonio);?> 
                                        
                                        <!-- @foreach($testimonio as $item)-->
                                        <!--        <div class="item col-sm-10 col-sm-offset-1 ">-->
                                        <!--            <blockquote>-->
                                        <!--              {{$item->name}}-->
                                        <!--                <span class="author"> 1 autor</span>-->
                                        <!--            </blockquote>-->
                                        <!--        </div>-->
                                        <!--@endforeach-->
                                       
                                    </div>
                                    <!-- Bottom Carousel Indicators -->
                                     <ol class="carousel-indicators">
                                         <?=sliderFotos($testimonio);?> 
                                    </ol>
                                   
                                </div>
                            </div>
                        </div>
                          <a class="thm-btn" href="#" data-toggle="modal" data-target="#myModal">INGRESE</a>
                    </div>
                </div><br><br><br>
                
                <!--<section class="blog-inner" id="testimonios">-->
                <!--    <div class="container">-->
                <!--        <div class="row">-->
                <!--            <div class="col-md-6 col-md-offset-3">-->
                <!--                <div class="title">-->
                <!--                    <h2>TESTIMONIES </h2>-->
                <!--                    <p>SHARE WITH US YOUR TRAVEL EXPERIENCES</p>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--        <div class="row thm-margin">-->
                <!--            <div id="blog-slide" class="owl-carousel">-->
                                <!-- blog post item -->
                <!--                @foreach($testimonio as $item)-->
                <!--                <div class="item">-->
                <!--                    <div class="blog-content">-->
                <!--                        <div class="blog-img image-hover">-->
                <!--                            <a href="{{route('testimonioEs','es')}}"><img style="height: 190px;" src="/admin/testimonio/{{$item->id}}.{{$item->photo}}" class="img-responsive" alt=""></a>-->
                <!--                            <span class="post-date">{{$item->date}}</span>-->
                <!--                        </div>-->
                <!--                        <h4><a href="#">{{$item->name}}</a></h4>-->
                                      
                <!--                    </div>-->
                <!--                </div>-->
                <!--                @endforeach-->
                                <!-- blog post item -->
                            
                <!--            </div>-->

                               
                        
                <!--        </div>-->

                <!--            <a class="thm-btn" href="#" data-toggle="modal" data-target="#myModal">ENTER</a>-->
                <!--    </div>-->
                   

                <!--</section>-->
                <!-- Newsletter -->
                <!-- <section class="get-offer">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-5">
                                <span>Subscribe to our Newsletter</span>
                                <h2>& Discover the best offers!</h2>
                            </div>
                            <div class="col-sm-7">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Enter Your Email" name="q">
                                    <div class="input-group-btn">
                                        <button class="btn btn-default" type="submit"><i class="flaticon-paper-plane"></i> Subscribe</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </section> -->
            </div>



          <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
            
 
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title" style="text-align: center;">TRAVEL EXPERIENCE</h4>
                </div>
                <div class="modal-body">
                
                    <div class="container">
                        <div class="row">
                         
                            <div class="col-sm-6">
                                <div class="contact-form">

                                   {!! Form::open(['route' => ['create.ingresarTestimonio'] , 'method' => 'POST','enctype' => 'multipart/form-data']) !!}

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Nombre</label>
                                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name')}}" placeholder="Name">
                                                    <p style="color:red;">{{ $errors->first('name') }}</p>
                                                </div>
                                            </div>
                                           
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="text" class="form-control" id="email" name="email" value="{{ old('email')}}" placeholder="Email">
                                                    <p style="color:red;">{{ $errors->first('email') }}</p>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Nacionalidad</label>
                                                    <input type="text" class="form-control" id="nationality" name="nationality" value="{{ old('nationality')}}" placeholder="Nacionality">
                                                    <p style="color:red;">{{ $errors->first('nationality') }}</p>
                                                    <input type="hidden" class="form-control" id="language" name="language" value="en">
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label></label>
                                            <textarea class="form-control" id="message" name="message" value="{{ old('message')}}" placeholder="Commentary" rows="5"></textarea>
                                            <p style="color:red;">{{ $errors->first('message') }}</p>

                                        </div>
                                         <div class="form-group">
                                              <label></label>
                                               <input type="file" class="form-control" name="img" >
                                               <p style="color:red;">{{ $errors->first('img') }}</p>
                                        </div>
                                         <div class="col-sm-2">
                                               
                                        </div>
                     
                                                
                                        <div class="col-sm-4">
                                               
                                        </div>

                                        <div class="col-sm-6"><br>
                                                <div class="form-group">
                                                    <button type="submit" class="thm-btn">Save</button>
                                                </div>
                                        </div>
                                        
                                {!! Form::close() !!}

                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
         
                </div>
                
              </div>
              
            </div>
          </div>

<div class="modal fade" id="elIDdelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                           <!--ASIGNAMOS UN ID A ESTE DIV -->
  <div class="modal-dialog modal-lg" id="mdialTamanio">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
     
      </div>
      <div class="modal-body">
            <img src="avisoIn.jpg">
      </div>
      
    </div>
  </div>
</div>
@endsection

@section('script')
  
 <script type="text/javascript">
    

       $(document).ready(function(){
          $("#filtradosTours").click(function(){
            var precio=$("#precio").val();
            var departamento=$("#departamento").val();

            location.href='en/'+"tours/filtro/"+precio+"/"+departamento;
          });

            @if($errors->any())

                $("#myModal").modal('show');

             @endif
        });
        
 </script>
  <script>

// var slideIndex = 1;
// showDivs(slideIndex);

// function plusDivs(n) {
//   showDivs(slideIndex += n);
// }

// function showDivs(n) {
//   var i;
//   var x = document.getElementsByClassName("mySlides");
//   if (n > x.length) {slideIndex = 1}
//   if (n < 1) {slideIndex = x.length}
//   for (i = 0; i < x.length; i++) {
//     x[i].style.display = "none";  
//   }
//   x[slideIndex-1].style.display = "block";  
// }


var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 9000);    
}


</script>
 </script>
        
@endsection


