@extends('assets.pagina.en.layouts.master')

@section('content')
 <style>
 
 </style>
   <!--<section class="header header-bg-5">-->
   <!--             <div class="container">-->
   <!--                 <div class="row">-->
   <!--                     <div class="col-md-8 col-md-offset-2">-->
   <!--                         <div class="header-content">-->
   <!--                             <div class="header-content-inner">-->
   <!--                                 <h1>{{$tour->name}}</h1>-->
                                   
   <!--                             </div>-->
   <!--                         </div>-->
   <!--                     </div>-->
   <!--                 </div>-->
   <!--             </div>-->
   <!--         </section>-->
            <section class="hotels-details-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-sm-8">
                            <div id="sync1" class="owl-carousel">
                                @foreach($multimediaTour as $item)
                                    <div class="item"><img src="/{{$item->path}}" class="img-responsive" alt=""></div>
                                  
                                @endforeach       
                            </div>
                            <div id="sync2" class="owl-carousel">
                                @foreach($multimediaTour as $item)
                                    <div class="item"><img src="/{{$item->path}}" class="img-responsive" alt=""></div>
                                @endforeach 
                            </div>
                            <h3>
                                <!--Descripció-->
                            </h3>
                            <p>
                                {{$tour->description_short}}
                            </p>
                         

                            <!--  <div class="row">-->
                            <!--    <div class="col-md-12 col-sm-4">-->
                            <!--        <ul class="list-ok">-->
                            <!--            <div class="separator"> </div><br>-->
                            
                            <!--        </ul>-->
                            <!--    </div>-->
                                
                            <!--</div>-->
                            <div class="separator"> </div>
                          
                            <div class="row">
                                 
                                <div class="col-sm-12">
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a href="#tab1default" style="background-color: rgb(248, 248, 248);" data-toggle="tab"><i class="flaticon-paper-plane"></i>ITINERARY</a></li>
                                                <li><a href="#tab2default" data-toggle="tab"> <i class="flaticon-cabin"></i>IT INCLUDES</a></li>
                                                <li><a href="#tab3default" data-toggle="tab"> <i class="flaticon-photographer-with-cap-and-glasses"></i>RECOMMEND</a></li>
                                                <li><a href="#tab4default" data-toggle="tab"> <i class="flaticon-cabin"></i>HOTEL</a></li>
                                
                                            </ul>
                                        </div>
                                        <div class="panel-body" style="background-color: rgb(248, 248, 248);"> 
                                            <div class="tab-content">
                                                <div class="tab-pane fade in active" id="tab1default">
                                                    <div class="row">
                                                        
                                                            
                                                            <div class="portfolio-nav">
                                                                <div class="container-fluid">
                                                                    <div class="row">
                                                                      
                                                                        <div class="col-sm-12 col-md-12">
                                                                            <ul class="portfolio-sorting list-inline text-center">

                                                                                <ul class="nav nav-pills nav-stacked col-md-2" style="border: 1px solid #f8f8f8;background: #f8f8f8;margin-top: -14px;margin-left: -10px;">
                                                                                    @foreach($itinerarioTour as $item)
                                                                                         @if($item->day=='1')      
                                                                                              <li><a class="active"  href="#tab_{{$item->day}}" data-toggle="tab">DAY {{$item->day}} </a></li>
                                                                                         @else
                                                                                                <li><a  href="#tab_{{$item->day}}" data-toggle="tab">DAY {{$item->day}} </a></li>
                                                                                         @endif
                                                                                              {{-- <li><a href="#tab_b" data-toggle="tab">Pill B</a></li>
                                                                                              <li><a href="#tab_c" data-toggle="tab">Pill C</a></li>
                                                                                              <li><a href="#tab_d" data-toggle="tab">Pill D</a></li> --}}
                                                                                     @endforeach
                                                                                </ul>
                                                                                <div class="tab-content col-md-10">
                                                        
                                                                                       @foreach($itinerarioTour as $item)
                                                                                            @if($item->day=='1')   
                                                                                                 <div class="tab-pane active" id="tab_{{$item->day}}">
                                                                                                     <h4>
                                                                                                        <div class="hotel-review">
                                                                                                            <img src="/{{$item->photo}}" class="img-responsive" alt="">
                                                                                                            <div class="hotel-review-ratting">
                                                                                                                <i class="fa fa-star"></i>
                                                                                                                <i class="fa fa-star"></i>
                                                                                                                <i class="fa fa-star"></i>
                                                                                                                <i class="fa fa-star-half-o"></i>
                                                                                                                <i class="fa fa-star-o"></i>
                                                                                                            </div>
                                                                                                            <h4></h4>
                                                                                                            <h5><div class="themeUl" style=" text-align:justify;">{!!$item->description!!}</div></h5>
                                                                                                        </div>
                                                                                                     </h4>
                                                                                                    <p>
                                                                                                        
                                                                                                    </p>
                                                                                                </div>
                                                                                            @else
                                                                                                 <div class="tab-pane" id="tab_{{$item->day}}">
                                                                                                        <div class="hotel-review">
                                                                                                            <img src="/{{$item->photo}}" class="img-responsive" alt="">
                                                                                                            <div class="hotel-review-ratting">
                                                                                                                <i class="fa fa-star"></i>
                                                                                                                <i class="fa fa-star"></i>
                                                                                                                <i class="fa fa-star"></i>
                                                                                                                <i class="fa fa-star-half-o"></i>
                                                                                                                <i class="fa fa-star-o"></i>
                                                                                                                 
                                                                                                            </div>
                                                                                                            <h4></h4>
                                                                                                            <h5><div class="themeUl" style=" text-align:justify;">{!!$item->description!!}</div></h5>
                                                                                                        </div>
                                                                                                 </div>

                                                                                            @endif
                                                                                               

                                                                                         @endforeach  
                                                                 
                                                                                </div>
                                                                              
                                                                                {{-- @foreach($itinerarioTour as $item)
                                                                                        @if($item->day=='1')        
                                                                                          <li><a href="#" class="active" data-group="people.{{$item->day}}" >DAY {{$item->day}}</a></li>
                                                                                        @else
                                                                                          <li><a href="#" data-group="people.{{$item->day}}" >DAY {{$item->day}}</a></li>
                                                                                        @endif
                                                                                @endforeach --}}
                                                                            </ul> <!--end portfolio sorting -->
                                                                        </div>

                                                                     {{--    <div class="col-sm-8 col-md-9">
                                                                                                <div class="row thm-margin"><br>
                                                                                                    <div class="portfolio-items list-unstyled" id="grid">


                                                                                                           @foreach($itinerarioTour as $item)

                                                                                                                <div class="col-sm-6 col-md-4 thm-padding" data-groups='["people.{{$item->day}}"]'>
                                                                                                                    <div class="destination-grid">
                                                                                                                        <a href="#"><img src="/plantilla/assets/images/tour-370x370-1.jpg" class="img-responsive" alt=""></a>
                                                                                                                        <div class="mask">
                                                                                                                            <h2>Sydney</h2>
                                                                                                                            <p>It is a long established fact that a reader will be distracted by the readable content</p>
                                                                                                                            <a href="#" class="thm-btn">Read More</a>
                                                                                                                        </div>
                                                                                                                        <div class="dest-name">
                                                                                                                            <h5>Sydney Opera House</h5>
                                                                                                                            <h4>Sydney</h4>
                                                                                                                        </div>
                                                                                                                        <div class="dest-icon">
                                                                                                                            <i class="flaticon-earth-globe" data-toggle="tooltip" data-placement="top" title="15 Tours"></i>
                                                                                                                            <i class="flaticon-ship" data-toggle="tooltip" data-placement="top" title="9 Criuses"></i>
                                                                                                                            <i class="flaticon-transport" data-toggle="tooltip" data-placement="top" title="31 Flights"></i>
                                                                                                                            <i class="flaticon-front" data-toggle="tooltip" data-placement="top" title="83 Hotels"></i>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                             @endforeach
                                                                                                 

                                                                                            
                                                                                                        <div class="col-md-4 col-sm-6 col-xs-12 shuffle_sizer"></div>
                                                                                                    </div> 
                                                                                                </div><br>
                                                                                            </div> --}}
                                                                    </div>
                                                                </div>
                                                            </div>

                                                                
                                                        
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="tab2default">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="row panel-margin" >
                                                                 <h5><div class="themeUl" style=" text-align:justify;">{!!$tour->organization!!}</div></h5>
                                                                     
                                                            <!--<div class="table-responsive">-->
                                                                    <!--<div id="tabledisenio">-->
                                                                    <!--     {!! $tour->organization !!}-->
                                                                    <!--</div>-->
                                                                    
                                                            <!--</div>-->
                                                       
                                                                 
                                                                        
                                                            </div>
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                                
                                                <div class="tab-pane fade" id="tab3default">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="row panel-margin" >
                                                                
                                                                <div class="col-sm-6">
                                                                    <div class="active-box">
                                                                       
                                                                        <h3>RECOMMENDATIONS FOR THE TOUR</h3>
                                                                       <ul class="content-list">
                                                                            <li> Wear shoes or light shoes or tennis shoes. </li>
                                                                            <li> Drink plenty of fluids during your excursions. </li>
                                                                            <li> Waterproof (long poncho) in rainy season. (October to March) </li>
                                                                            <li> Long pants. </li>
                                                                            <li> Insect repellent. </li>
                                                                            <li> Sunscreen, wide-brimmed hat for sunny days. </li>
                                                                            <li> Binoculars. </li>
                                                                            <li> Sun glasses, plastic bags. </li>
                                                                            <li> Medicine and / or personal items (liquid for contact lenses). </li>
                                                                            <li> One lightweight backpack or briefcase per person. </li>
                                                                            <li> Camera or video camera and movies. </li>
                                                                            <li> Carry currency in small denominations dollars or soles. </li>
                                                                            <li> Carrying a lipstick </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="active-box">
                                                                      
                                                                        <h3>SUGGESTIONS</h3>
                                                                       <ul class="content-list">
                                                                           
                                                                            <li> When arriving in Cusco it is advisable to drink Mate de Coca to acclimatise </li>
                                                                            <li> Consume plenty of water </li>
                                                                            <li> The first day eating light foods </li>
                                                                            <li> Take a break to start the tours </li>

                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                       
                                                                 
                                                                        
                                                            </div>
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                                
                                                   <div class="tab-pane fade" id="tab4default">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="row panel-margin" >
                                                                 <h5><div class="themeUl" style=" text-align:justify;">
                                                                     
                                                                   
                                                                     
                                                                     <div class="tour_view_map">
                                                                        <div class="row">
                                                                            
                                                                            <table class="table table-bordered">
                                                                              <thead>
                                                                               
                                                                                 <tr>
                                                                                  <th scope="col" colspan="3" style="background:#4caf50; color:white;"><center>CUSCO</center></th>
                                                                                </tr>
                                                                              </thead>
                                                                              <tbody>
                                                                             
                                                                              </tbody>
                                                                            </table> 
                                                                            
                                                                            
                                                                            <div class="col-sm-4">
                                                                                <img src="/public/hoteles/inkandina.jpg"  class="img-rounded" style="width:80%">
                                                                            </div>
                                                                            <div class="col-sm-4" style="margin-top: 40px;">
                                                                                <div class="box_map">
                                                                                    <i class="glyphicon glyphicon-map-marker" style="font-size: 28px;"></i>
                                                                                    <h5>HOTEL INKANDINA</h5>
                                                                                    
                                                                                </div>
                                                                               
                                                                               
                                                                            </div>
                                                                            <div class="col-sm-4" style="margin-top: 40px;">
                                                                               
                                                                                <div class="box_map" style="margin-left: -10px;">
                                                                                    <i class="glyphicon glyphicon-hand-right" style="font-size: 28px;"></i>
                                                                                    <h4>Web</h4>
                                                                                     <p><a href="http://www.inkaandina.com/" target="_blank">inkaandina.com</a></p>
                                                                                </div>
                                                                               
                                                                            </div>
                                                                            
                                                                             
                                                                            <div class="col-sm-4">
                                                                                <img src="/public/hoteles/panaka.jpg"  class="img-rounded" style="width:80%">
                                                                            </div>
                                                                            <div class="col-sm-4" style="margin-top: 40px;">
                                                                                <div class="box_map">
                                                                                    <i class="glyphicon glyphicon-map-marker" style="font-size: 28px;"></i>
                                                                                    <h5>HOTEL PANAKA</h5>
                                                                                   
                                                                                </div>
                                                                               
                                                                            </div>
                                                                            <div class="col-sm-4" style="margin-top: 40px;">
                                                                               
                                                                                <div class="box_map" style="margin-left: -10px;">
                                                                                    <i class="glyphicon glyphicon-hand-right" style="font-size: 28px;"></i>
                                                                                    <h4>Web</h4>
                                                                                     <p><a href="http://www.hostalpanaka.com/" target="_blank">hostalpanaka.com</a></p>
                                                                                </div>
                                                                               
                                                                            </div>
                                                                            
                                                                            
                                                                              
                                                                            <div class="col-sm-4">
                                                                                <img src="/public/hoteles/mallki.jpg"  class="img-rounded" style="width:80%">
                                                                            </div>
                                                                            <div class="col-sm-4" style="margin-top: 40px;">
                                                                                <div class="box_map">
                                                                                    <i class="glyphicon glyphicon-map-marker" style="font-size: 28px;"></i>
                                                                                    <h5>HOSTAL MALLKI</h5>
                                                                                    
                                                                                </div>
                                                                               
                                                                            </div>
                                                                            <div class="col-sm-4" style="margin-top: 40px;">
                                                                               
                                                                                <div class="box_map" style="margin-left: -10px;">
                                                                                    <i class="glyphicon glyphicon-hand-right" style="font-size: 28px;"></i>
                                                                                    <h4>Web</h4>
                                                                                     <p><a href="http://www.hostalmallqui.com" target="_blank"></a>hostalmallqui.com</a></p>
                                                                                </div>
                                                                               
                                                                            </div>
                                                                            
                                                                             <div class="col-sm-4">
                                                                                <img src="/public/hoteles/rey_antares.jpg"  class="img-rounded" style="width:80%">
                                                                            </div>
                                                                            <div class="col-sm-4" style="margin-top: 40px;">
                                                                                <div class="box_map">
                                                                                    <i class="glyphicon glyphicon-map-marker" style="font-size: 28px;"></i>
                                                                                    <h5>REY ANTARES</h5>
                                                                                   
                                                                                </div>
                                                                               
                                                                            </div>
                                                                            <div class="col-sm-4" style="margin-top: 40px;">
                                                                               
                                                                                <div class="box_map" style="margin-left: -10px;">
                                                                                    <i class="glyphicon glyphicon-hand-right" style="font-size: 28px;"></i>
                                                                                    <h4>Web</h4>
                                                                                     <p><a href="http://www.reyantareshotel.com/es/" target="_blank">reyantareshotel.com</a></p>
                                                                                </div>
                                                                               
                                                                            </div>
                                                                            
                                                                             <div class="col-sm-4">
                                                                                <img src="/public/hoteles/inkandina.jpg"  class="img-rounded" style="width:80%">
                                                                            </div>
                                                                            <div class="col-sm-4" style="margin-top: 40px;">
                                                                                <div class="box_map">
                                                                                    <i class="glyphicon glyphicon-map-marker" style="font-size: 28px;"></i>
                                                                                    <h5>AVELLANEDA</h5>
                                                                                
                                                                                </div>
                                                                               
                                                                            </div>
                                                                            <div class="col-sm-4" style="margin-top: 40px;">
                                                                               
                                                                                <div class="box_map" style="margin-left: -10px;">
                                                                                    <i class="glyphicon glyphicon-hand-right" style="font-size: 28px;"></i>
                                                                                    <h4>Web</h4>
                                                                                     <p><a href="http://www.avellanedainn.com/" target="_blank">hotelavellanedainn.com</a></p>
                                                                                </div>
                                                                               
                                                                            </div>
                                                                            
                                                                             <table class="table table-bordered">
                                                                              <thead>
                                                                               
                                                                                 <tr>
                                                                                  <th scope="col" colspan="3" style="background:#4caf50; color:white;"><center>AGUAS CALIENTES</center></th>
                                                                                </tr>
                                                                              </thead>
                                                                              <tbody>
                                                                             
                                                                              </tbody>
                                                                            </table> 
                                                                            
                                                                            <div class="col-sm-4">
                                                                                <img src="https://q-ec.bstatic.com/images/hotel/max1024x768/916/91695884.jpg"  class="img-rounded" style="width:80%">
                                                                            </div>
                                                                            <div class="col-sm-4" style="margin-top: 40px;">
                                                                                <div class="box_map">
                                                                                    <i class="glyphicon glyphicon-map-marker" style="font-size: 28px;"></i>
                                                                                    <h5>TAYTA HOTEL</h5>
                                                                             
                                                                                </div>
                                                                               
                                                                            </div>
                                                                            <div class="col-sm-4" style="margin-top: 40px;">
                                                                               
                                                                                <div class="box_map" style="margin-left: -10px;">
                                                                                    <i class="glyphicon glyphicon-hand-right" style="font-size: 28px;"></i>
                                                                                    <h4>Web</h4>
                                                                                     <p><a href="http://goo.gl/ymYuZm" target="_blank">goo.gl/ymYuZm.com</a></p>
                                                                                </div>
                                                                               
                                                                            </div>
                                                                            
                                                                            <div class="col-sm-4">
                                                                                <img src="/public/hoteles/solInn.jpg"  class="img-rounded" style="width:80%">
                                                                            </div>
                                                                            <div class="col-sm-4" style="margin-top: 40px;">
                                                                                <div class="box_map">
                                                                                    <i class="glyphicon glyphicon-map-marker" style="font-size: 28px;"></i>
                                                                                    <h5>SOL DE LOS ANDES</h5>
                                                                                   
                                                                                </div>
                                                                               
                                                                            </div>
                                                                            <div class="col-sm-4" style="margin-top: 40px;">
                                                                               
                                                                                <div class="box_map" style="margin-left: -10px;">
                                                                                    <i class="glyphicon glyphicon-hand-right" style="font-size: 28px;"></i>
                                                                                    <h4>Web</h4>
                                                                                     <p><a href="http://www.soldelosandesinn.com/" target="_blank">soldelosandesinn.com</a></p>
                                                                                </div>
                                                                               
                                                                            </div>
                                                                            
                                                                            <div class="col-sm-4">
                                                                                <img src="/public/hoteles/new_day.jpg"  class="img-rounded" style="width:80%">
                                                                            </div>
                                                                            <div class="col-sm-4" style="margin-top: 40px;">
                                                                                <div class="box_map">
                                                                                    <i class="glyphicon glyphicon-map-marker" style="font-size: 28px;"></i>
                                                                                    <h5>NEW DAY</h5>
                                                                                    
                                                                                </div>
                                                                               
                                                                            </div>
                                                                            <div class="col-sm-4" style="margin-top: 40px;">
                                                                               
                                                                                <div class="box_map" style="margin-left: -10px;">
                                                                                    <i class="glyphicon glyphicon-hand-right" style="font-size: 28px;"></i>
                                                                                    <h4>Web</h4>
                                                                                     <p><a href="http://wwww.newdaymachupicchu.com/" target="_blank">newdaymachupicchu.com</a></p>
                                                                                </div>
                                                                               
                                                                            </div>
                                                                        
                                                                            
                                                                            
                                                                            
                                                                        </div>
                                                                        
                                                                    </div>
                                                                 </div></h5>
                                                                     
                                                                     
                                                                     
                                                                     
                                                       
                                                       
                                                                 
                                                                        
                                                            </div>
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                                  
                                        </div>
                                         
                                    </div>
                                </div>
                            </div>
                                                      
                            
                        </div>
                       

                <div class="col-sm-4">
                            <div class="sidber-box booking_price">
                                 <!--PARA CONTADOR DE PROMOCION-->
                                  
                                 @if($tour->id=='176')
                                      <p style="    text-align: center; color:red;  font-family: 'Oswald', sans-serif; font-size: 20px;">JUST LEFT</p>
                                      <p style="    text-align: center;    font-family: 'Oswald', sans-serif; color:red; font-size: 40px;" id="demo"></p>
                                      <hr/>
                                 @endif 
                                 
                                 <!--FIN-->
                                <div class="price">
                                <small></small> <strong>$ {{$tour->price}}</strong>  
                                @if($tour->id=='176')
                                    <small> <span style="COLOR: darkgray;"><s>$ 469&nbsp;</span></s></span></small> 
                                @endif 
                         
                                </div>

                                <!-- <ul class="list-ok">
                                    <li>Lorem ipsum dolor sit amet,</li>
                                    <li>There are many variations</li>
                                    <li>In pellentesque arcu at diam</li>
                                    <li>Quisque nec ex quis </li>
                                </ul> -->
                                <!-- <div class="offer">*Free for childs under 8 years old</div> -->
                                         <a class="thm-btn" href="{{route('product.addToCart',['id' =>$tour->id])}}">Shopping Cart</a>
                                         
                                <div align="justify">
                                    <hr>
                                    <h5 style="color:red">IMPORTANT!</h5>
                                    <h6>
                                    TO RESERVE THE PAYMENT OF 30% OF THE TOTAL PRICE + 10% PER PAYMENT COMMISSION WITH CARD IS MADE. THE BALANCE IS PAID UPON ARRIVAL IN CUSCO BEFORE STARTING THE FIRST TOUR</h6>
                                </div>
                            </div>
                            <!-- booking -->
                            <div class="sidber-box tags-widget">
                            
                           
                            @if($errors->any())

                            <div class="alert alert-danger">
                                        <strong>Error!</strong> No se registró la reserva.
                                </div>

                            @endif
                            @if(Session::has('flash_message'))
                                <div class="alert alert-success">
                                        <strong>Correcto!</strong> Se registró adecuadamente la reserva.
                                </div>
                            @endif
                                

                                <div class="cats-title">RESERVATION</div>
                                <div class="booking-form tour_booking">
                                {!! Form::open(['route' => ['reservations.store'] , 'method' => 'POST']) !!}

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>Adults</label>
                                                <div class="input-group number-spinner">
                                                    <span class="input-group-btn">
                                                        <a class="btn btn-pm" data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></a>
                                                    </span>
                                                    <input type="text" class="form-control text-center" name="cantidadAdultos" id="cantidadAdultos" value="0">
                                                    <span class="input-group-btn">
                                                        <a class="btn btn-pm" data-dir="up"><span class="glyphicon glyphicon-plus"></span></a>
                                                    </span>
                                                  
                                                </div>
                                            </div>
                                            <input type="hidden" class="form-control" id="idtour" name="idtour"  value="{{$tour->id}}">
                                            <input type="hidden" class="form-control" id="lenguaje" name="lenguaje"  value="es">
                                            <div class=" col-sm-6">
                                                <label>Children</label>
                                                <div class="input-group number-spinner">
                                                    <span class="input-group-btn">
                                                        <a class="btn btn-pm" data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></a>
                                                    </span>
                                                    <input type="text" class="form-control text-center" name="cantidadNinios" id="cantidadNinios" value="0">
                                                    <span class="input-group-btn">
                                                        <a class="btn btn-pm" data-dir="up"><span class="glyphicon glyphicon-plus"></span></a>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Full name</label>
                                                    <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" placeholder="Ingrese su nombre completo">
                                                    <p style="color:red;">{{ $errors->first('name') }}</p>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}" placeholder="Ingrese su correo electrónico">
                                                    <p style="color:red;">{{ $errors->first('email') }}</p>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Nationality</label>
                                                    <input type="text" class="form-control" id="country" name="country" value="{{old('country')}}" placeholder="Ingrese su nacionalidad">
                                                    <p style="color:red;">{{ $errors->first('country') }}</p>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Phone number</label>
                                                    <input type="text" class="form-control" id="phone" name="phone" value="{{old('phone')}}" placeholder="Ingrese su número telefónico">
                                                    <p style="color:red;">{{ $errors->first('phone') }}</p>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Date of travel</label>
                                                    <input type="date" class="form-control" id="date" name="date" >
                                                    <p style="color:red;">{{ $errors->first('date') }}</p>
                                                </div>
                                            </div>
                                              <div class="col-sm-12">
                                                
                                                <div class="form-group">
                                                    <label>Hotel Cusco</label>
                                                    <select class="form-control" id="hotel1" name='hotel1'>
                                                        <option value="NINGUNO">NINGUNO</option>
                                                        <option value="INKANDINA">INKANDINA</option>
                                                        <option value="PANAKA">PANAKA</option>
                                                        <option value="HOSTAL MALLQUI">HOSTAL MALLQUI</option>
                                                        <option value="REY ANTARES">REY ANTARES</option>
                                                        <option value="AVELLANEDA">AVELLANEDA</option>
                                                        
                                                    </select>
                                               
                                                </div>
                                                
                                            </div>
                                             <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Hotel Aguas calientes</label>
                                                    <select class="form-control" id="hotel2" name='hotel2'>
                                                        <option value="NINGUNO">NINGUNO</option>
                                                        <option value="TAYTA HOTEL">TAYTA HOTEL</option>
                                                        <option value="SOL DE LOS ANDESINN">SOL DE LOS ANDESINN</option>
                                                        <option value="NEW DAY">NEW DAY</option>
                                                        
                                                    </select>
                                               
                                                </div>
                                                <div class="form-group">
                                                    <label>Type of room</label>
                                                    <select class="form-control" id="tipo_habitacion" name="tipo_habitacion">
                                                        <option value="NINGUNO">NINGUNO</option>
                                                        <option value="Simple">Simple</option>
                                                        <option value="Doble">Doble</option>
                                                        <option value="Triple">Triple</option>
                                                        <option value="Cuádruple">Cuádruple</option>
                                                      
                                                    </select>
                                               
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea class="form-control" id="message" name="message" rows="5" value="{{old('message')}}" placeholder=""></textarea>
                                                    <p style="color:red;">{{ $errors->first('message') }}</p>
                                                </div>
                                            </div>
                                            
                                        </div><br>
                                        <button class="thm-btn btn-block">Reserve</button>
          
                                    {!! Form::close() !!}    
                                </div>
                            </div>
                            <!-- help center -->
                            <div class="sidber-box help-widget">
                                <i class="flaticon-photographer-with-cap-and-glasses"></i>
                                <h4>For more information  <span>communicate</span></h4>
                                <a href="#" class="phone">0051 084 584 272</a>
                                <small>From Mondays to Sundays 9.00am - 8.30pm</small>
                        
                            </div>
                        </div>
                    </div>

               
                </div>
            </section>

             <section class="package">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="title">
                                <h2>RELATED TOURS</h2>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                          @foreach($toursRelacionados as $item)
                          
                                <div class="col-xs-12 col-sm-4 col-md-3">
                                    
                                    <div class="package-wiget">
                                        <div class="grid">
                                            <figure class="effect-milo">
                                                <img src="/{{ $item->img}}" class="img-responsive" alt="">
                                                <figcaption>
                                                    <div class="effect-block">
                                                        <h3 style="text-transform: uppercase;">{{$item->categoriesName}}</h3>
                                                        <div class="package-ratting">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-half-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <a href="{{route('detalleEsTour',['es'=>'en','tour' => $item->slug])}}" type="button" class="thm-btn" alt="" style="margin-top: 70px;height: 40px;"> MORE DETAIL</a>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="package-content">
                                            <h5 style="text-align: center;">{{$item->name}}</h5>
                                            <div class="package-price">SINCE
                                                <span class="price">
                                                    <span class="amount">$ {{$item->price}}.00</span>
                                                </span>
                                               
                                            </div>
                                        </div>
                                    </div>

                                </div>
                          
                         @endforeach
                     
                      
                    </div>
                </div>
            </section>
           
        </div>      


 <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
                <div class="modal-header" style="background: #009245;color: white;text-align: center;">
                  <button type="button" id="cerrarModal" name="cerrarModal" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Machupicchu golden </h4>
                </div>
                <div class="modal-body">
                  <p style="text-align: center;">
                      <span class="glyphicon glyphicon-ok-sign"></span><br>
                      <h5 style="text-align: center;"> YOUR PRODUCT HAS BEEN ADDED TO THE CART</h5>
                  </p>
                </div>
                <div class="modal-footer">
                           
                    <a href="{{route('paquetesCategoriaEN',['idioma'=> 'en','categoria'=>'cusco'])}}" class="btn btn-info">
                       <span class="glyphicon glyphicon-chevron-left"></span> + PURCHASES
                  </a>
                   <a href="{{route('product.shoppingCart',['idioma' =>'en' ])}}" class="btn btn-info">
                       <span class="glyphicon glyphicon-shopping-cart"></span> GO TO CART
                  </a>
                </div>
              </div>
            </div>
  </div>

@endsection

@section('script')
  
   @if (Session::has('estado')=='agregar') 
    <script>
            $(document).ready(function(){
                 $("#myModal").modal('show');
            });
    </script>                                     
   @endif
  
 <script type="text/javascript">
//AGREGAR  EL ESTILO DE UNA CLASE
    $( ".themeUl ul" ).addClass( "list-ok" );
    $( "#tabledisenio table" ).addClass( "table" );
//FIN    
 </script>
 

 <script>
// Set the date we're counting down to
var countDownDate = new Date("May 15, 2019 23:59:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
@endsection