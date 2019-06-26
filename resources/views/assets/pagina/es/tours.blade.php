@extends('assets.pagina.es.layouts.master')

@section('content')
   <section class="header header-bg-4">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="header-content">
                                <div class="header-content-inner">
                                    <h1></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="portfolio-nav">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-3 hidden-sm thm-padding">
                                <div class="region">
                                    <h4 style="text-transform: uppercase;"> {{$ItempCategoria}} </h4>
                                </div>
                               
                            </div>
                             @if(Session::has('pago'))
                                 <div class="alert alert-success">
                                      <strong>Gracias!</strong> 
                                     
                                        {{Session::get('pago')}}
                                     
                                </div>
                             @endif
                             
                        </div>
                    </div>
                </div>
            </section>
            <section class="hotel-inner"> 
                <div class="container">
                  
                    <div class="row">
                  
                        <div class="col-sm-12">
                            <div class="tools-ber">
                                <div class="row">
                                    
                                    
                                    <div class="col-sm-6 col-md-6">
                                        <div class="input-group custom-search">
                                            <input type="text" class="form-control" placeholder="Buscar tours"  name="buscarTours" id="buscarTours"/>
                                            <span class="input-group-btn">
                                                <button class="btn hotel-search" type="button">
                                                    <span class="fa fa-search"></span>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                    
                                    
								  <div id="carga" style="position: absolute;z-index: 12;text-align: right;"> </div>
									  <div id="lugares">
											 
												<ul class="list-group" id="lista" style="position: absolute;width: 540px;margin-top: 34px;z-index:10;background: white; font-size:12px; ">
													
												</ul>
											
									  </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                  
                        <div class="col-sm-4 col-md-3">
                            <!-- price pips -->
                            <div class="sidber-box cats-price">
                                <div class="cats-title">
                                    TOUR POR PRECIOS
                                </div>
                                <div class="price-Pips">
                                    <input type="text" id="range" value="range" name="range" />
                                </div>
                            </div>
                            <!-- star -->
                       
                            <!-- Facility -->
                            <div class="sidber-box cats-facility">
                                <div class="cats-title">
                                    CATEGORÍA
                                </div>
                                <div class="facility">
                                    @foreach($categoria as $itemp)
                                        <div class="checkbox" onchange="tourOpcionCategoria({!! $itemp->id !!},this);">  
                                            <label style="text-transform: uppercase;"> 
                                                <input type="checkbox" value="chp{!! $itemp->id !!}">
                                                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                {{ $itemp->description}}
                                            </label>
                                        </div>
                                   @endforeach
                                </div>
                            </div>
                            <!-- help center -->
                            <div class="sidber-box help-widget">
                                <i class="flaticon-photographer-with-cap-and-glasses"></i>
                                <h4>Necesitas  <span>ayuda?</span></h4>
                                <a href="#" class="phone">+0051 084 584 272</a>
                                <small>De lunes a domingo 9.00am - 8.30pm</small>
                            </div>
                        </div>
                        <div class="col-sm-8 col-md-9">
                            <div class="hotel-list-content" id="idTours">

                                @foreach($tours as $item)
                                    <div class="hotel-item">
                                        <div class="hotel-image">
                                            <a href="{{route('detalleEsTour',['es'=>'es','tour' => $item->slug])}}">
                                                <div class="img"><img src="/{{ $item->img}}"  alt="" class="img-responsive"></div>
                                            </a>
                                        </div>
                                        <div class="hotel-body">
                                            <div class="ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                            <h3> <a href="{{route('detalleEsTour',['es'=>'es','tour' => $item->slug])}}">{{ $item->name}}</a></h3>
                                            <p>
                                                  
                                                <!--{{ $item->description_short}}-->
                                            </p>
                                            <div class="free-service">
                                                <i class="flaticon-television" data-toggle="tooltip" data-placement="top" title="" data-original-title="Plasma TV with cable chanels"></i>
                                                <i class="flaticon-swimmer" data-toggle="tooltip" data-placement="top" title="" data-original-title="Swimming pool"></i>
                                                <i class="flaticon-wifi" data-toggle="tooltip" data-placement="top" title="" data-original-title="Free wifi"></i>
                                                <i class="flaticon-weightlifting" data-toggle="tooltip" data-placement="top" title="" data-original-title="Fitness center"></i>
                                                <i class="flaticon-lemonade" data-toggle="tooltip" data-placement="top" title="" data-original-title="Restaurant"></i>
                                            </div>
                                            
                                             <a class="thm-btn" href="{{route('product.addToCart',['id' => $item->id])}}"> <i class="fa fa-shopping-cart" aria-hidden="true"></i> Agregar al carro</a>
                                           
                                        </div>
                                         <div class="hotel-right"> 
                                            <div class="hotel-person">  <span class="color-blue">$ {{ $item->price}} </span> </div>
                                            <!--<a class="thm-btn" href="{{route('detalleEsTour',['es'=>'es','tour' => $item->slug])}}">MÁS DETALLE</a>-->
                                                <a  href="{{route('detalleEsTour',['es'=>'es','tour' => $item->slug])}}" class="btn btn-warning">MÁS DETALLE</a>

                                        </div>
                                    </div>
                                @endforeach 

                            </div>
                            <!-- pagination -->
                            <!--<div class="pagination-inner">-->
                                <!-- pager -->
                            <!--    <ul class="pager">-->
                            <!--        <li class="previous"><a href="#">Previous</a></li>-->
                            <!--        <li class="next"><a href="#">Next</a></li>-->
                            <!--    </ul>-->
                                <!-- pagination -->
                                <!--<ul class="pagination">-->
                                <!--    <li><a  class="active" href="es/categoria/aventura?page=1">1</a></li>-->
                                <!--    <li><a href="es/categoria/aventura?page=2">2</a></li>-->
                                <!--    <li><a href="es/categoria/aventura?page=3">3</a></li>-->
                                <!--    <li><a href="es/categoria/aventura?page=4">4</a></li>-->
                                <!--    <li><a href="es/categoria/aventura?page=2">...</a></li>-->
                                <!--    <li><a href="es/categoria/aventura?page=15">15</a></li>-->
                                <!--</ul>-->
                            <!--</div>-->
                        {{--     {{ $tours->links() }} --}}
                        </div>
                    </div>
                </div>
            </section>
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
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
                <div class="modal-header" style="background: #009245;color: white;text-align: center;">
                  <button type="button" id="cerrarModal" name="cerrarModal" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Machupicchu golden </h4>
                </div>
                <div class="modal-body">
                  <p style="text-align: center;">
                      <span class="glyphicon glyphicon-ok-sign"></span><br>
                      <h5 style="text-align: center;"> TU PRODUCTO HA SIDO AGREGADO AL CARRITO</h5>
                  </p>
                </div>
                <div class="modal-footer">
                           
                    <a href="{{route('paquetesCategoriaES',['idioma'=> 'es','categoria'=>'cusco'])}}" class="btn btn-info">
                       <span class="glyphicon glyphicon-chevron-left"></span> + COMPRAS
                  </a>
                   <a href="{{route('product.shoppingCartEs',['idioma' =>'es' ])}}" class="btn btn-info">
                       <span class="glyphicon glyphicon-shopping-cart"></span> IR AL CARRITO
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
        //range slide
        $("#range").ionRangeSlider({
            type: "double",
            grid: true,
            min: 0,
            max: 5000,
            from: 0,
            to: 5000,
            step: 100,
            prefix: "$",
            onChange: function (data) {
                        
                $("#idTours" ).html('');

                var htmlTours='';
                $.ajax({
                          url:'{{ route('toursOpcionPrecio') }}',
                          type: 'POST',

                          data:{
                            "_token": "{{ csrf_token() }}",
                            "min":data.from,
                            "max":data.to,
                            "idioma":'es',
                          },
                          dataType: 'JSON',
                          success: function(respuesta) 
                          {
                                $("#idTours" ).html('');

                            $.each(respuesta.data,function(index,element)
                             { 
                                  htmlTours=htmlTours +"<div class='hotel-item'>"+
                                                    "<div class='hotel-image'>"+
                                                        "<a href='/es/tours/detalle/"+element.slug+"'>"+
                                                            "<div class='img'><img src='/"+element.img+"'  alt='' class='img-responsive'></div>"+
                                                        "</a>"+
                                                    "</div>"+
                                                    "<div class='hotel-body'>"+
                                                        "<div class='ratting'>"+
                                                            "<i class='fa fa-star'></i>"+
                                                            "<i class='fa fa-star'></i>"+
                                                            "<i class='fa fa-star'></i>"+
                                                            "<i class='fa fa-star-half-o'></i>"+
                                                            "<i class='fa fa-star-o'></i>"+
                                                        "</div>"+
                                                        "<h3><a href='/es/tours/detalle/"+element.slug+"'>"+element.name+"</a></h3>"+
                                                        "<p>"+element.description_short+"</p>"+
                                                        "<div class='free-service'>"+
                                                            "<i class='flaticon-television' data-toggle='tooltip' data-placement='top' title='' data-original-title='Plasma TV with cable chanels'></i>"+
                                                            "<i class='flaticon-swimmer' data-toggle='tooltip' data-placement='top' title='' data-original-title='Swimming pool'></i>"+
                                                            "<i class='flaticon-wifi' data-toggle='tooltip' data-placement='top' title='' data-original-title='Free wifi'></i>"+
                                                            "<i class='flaticon-weightlifting' data-toggle='tooltip' data-placement='top' title='' data-original-title='Fitness center'></i>"+
                                                            "<i class='flaticon-lemonade' data-toggle='tooltip' data-placement='top' title='' data-original-title='Restaurant'></i>"+
                                                        "</div>"+
                                                         "<a class='thm-btn' href='/es/add-to-cart/"+element.id+" '><i class='fa fa-shopping-cart' aria-hidden='true'></i> Agregar al carro</a>"+
                                                    "</div>"+
                                                    "<div class='hotel-right'>"+
                                                        "<div class='hotel-person'> <span class='color-blue'> $ "+element.price+" </span> </div>"+
                                                        "<a class='btn btn-warning' href='/es/tours/detalle/"+element.slug+"'>MÁS DETALLE</a>"+
                                                   "</div>"+
                                                "</div>";
                                                
                              });

                                $("#idTours ").append(htmlTours);
                           
                            },
                          error: function(e){
                            if (e.statusText==='timeout'){
                              console.log('Tiempo de espera agotado');
                            }
                            else{
                              console.log(e.statusText);
                            }
                           },
                           timeout: 20000
                    });
                 return false;

            }
            
        });

    var catagoria = [];
   
     function tourOpcionCategoria(id,element)
    {
        element.checked = !element.checked;
        if(element.checked==true)
        {
            catagoria.push(id);
        }else {
           catagoria.splice(catagoria.indexOf(id),1);
        }
        var cantidaPeticion=catagoria.length;
        $("#tours" ).html('');
        var htmlTours='';
        $.ajax({
                 url:'{{ route('toursOpcion') }}',
                 type: 'POST',
                 data:{
                        "_token": "{{ csrf_token() }}",
                         "abbr":"es", "catagoria":catagoria,"cantidaPeticion":cantidaPeticion
                    },
                 dataType: 'JSON',
                 beforeSend: function() {
                 },
                 error: function() {
                 },
                  success: function(respuesta) 
                  {
                    $("#idTours" ).html('');

                        $.each(respuesta.data,function(index,element)
                         { 
                              htmlTours=htmlTours +"<div class='hotel-item'>"+
                                                "<div class='hotel-image'>"+
                                                    "<a href='/es/tours/detalle/"+element.slug+"'>"+
                                                        "<div class='img'><img src='/"+element.img+"'  alt='' class='img-responsive'></div>"+
                                                    "</a>"+
                                                "</div>"+
                                                "<div class='hotel-body'>"+
                                                    "<div class='ratting'>"+
                                                        "<i class='fa fa-star'></i>"+
                                                        "<i class='fa fa-star'></i>"+
                                                        "<i class='fa fa-star'></i>"+
                                                        "<i class='fa fa-star-half-o'></i>"+
                                                        "<i class='fa fa-star-o'></i>"+
                                                    "</div>"+
                                                    "<h3><a href='/es/tours/detalle/"+element.slug+"'>"+element.name+"</a></h3>"+
                                                    "<p>"+element.description_short+"</p>"+
                                                    "<div class='free-service'>"+
                                                        "<i class='flaticon-television' data-toggle='tooltip' data-placement='top' title='' data-original-title='Plasma TV with cable chanels'></i>"+
                                                        "<i class='flaticon-swimmer' data-toggle='tooltip' data-placement='top' title='' data-original-title='Swimming pool'></i>"+
                                                        "<i class='flaticon-wifi' data-toggle='tooltip' data-placement='top' title='' data-original-title='Free wifi'></i>"+
                                                        "<i class='flaticon-weightlifting' data-toggle='tooltip' data-placement='top' title='' data-original-title='Fitness center'></i>"+
                                                        "<i class='flaticon-lemonade' data-toggle='tooltip' data-placement='top' title='' data-original-title='Restaurant'></i>"+
                                                    "</div>"+
                                                    "<a class='thm-btn' href='/es/add-to-cart/"+element.id+" '><i class='fa fa-shopping-cart' aria-hidden='true'></i> Agregar al carro</a>"+
                                                "</div>"+
                                                "<div class='hotel-right'>"+
                                                    "<div class='hotel-person'> <span class='color-blue'>$ "+element.price+" </span> </div>"+
                                                    "<a class='btn btn-warning' href='/es/tours/detalle/"+element.slug+"'>MÁS DETALLE</a>"+
                                               "</div>"+
                                            "</div>";
                       
                        });
                        
                       $("#idTours ").append(htmlTours);  

                 }
        
         });
    }

    $(document).on('click','.pagination a', function(event){

           event.preventDefault();

           var page = $(this).attr('href');
           console.log(page);


    });
    
    $("#buscarTours").on( "keyup", function() 
	    		{
	       		    event.preventDefault();
	       		 	var buscarTours=$("#buscarTours").val();
	       		 	    $("#lista" ).html('');
                        var html='';
	       		     $.ajax({
                                 
                             url:'{{ route('buscarTours') }}',
                             type: 'POST',
                             data:{
                                    "_token": "{{ csrf_token() }}",
                                     "buscarTours":buscarTours,
                                     "idioma":'es',
                                     "categoria":'{{$ItempCategoria}}',
                                     
                                },
                             dataType: 'JSON',
                             beforeSend: function() {
                             },
                             error: function() {
                             },
                              success: function(respuesta) 
                              {
                              
                                
		            		  	  $("#lista").html('');

					              $.each(respuesta.data,function(index,element)
			                    	{
			                    		
											
											
											 html=html +"<div class='hotel-item'>"+
                                                "<div class='hotel-image'>"+
                                                    "<a href='/es/tours/detalle/"+element.slug+"'>"+
                                                        "<div class='img'><img src='/"+element.img+"'  alt='' class='img-responsive'></div>"+
                                                    "</a>"+
                                                "</div>"+
                                                "<div class='hotel-body'>"+
                                                   
                                                    "<h3><a href='/es/tours/detalle/"+element.slug+"'>"+element.name+"</a></h3>"+
                                                   
                                                    "<a class='thm-btn btn-xs' href='/es/add-to-cart/"+element.id+" '><i class='fa fa-shopping-cart' aria-hidden='true'></i> Agregar al carrrito</a>"+
                                                "</div>"+
                                                "<div class='hotel-right'>"+
                                                    "<div class='hotel-person'> <span class='color-blue'>$ "+element.price+" </span> </div>"+
                                                    "<a class='btn btn-warning' href='/es/tours/detalle/"+element.slug+"'>MÁS DETALLE</a>"+
                                               "</div>"+
                                            "</div>";
                                            
                                   
                            
                            
			                    	});
							            
                        $("#lista").append(html);	
						              
						             
                                    
                             }
                        
                         });
	       		 	
	    	});
	    	
	    	$("html").click(function() {
	   			 $("#lista").html('');
	   			 $("#buscarTours").val('');
		});


 </script>
@endsection

