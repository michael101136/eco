@extends('assets.pagina.es.layouts.master')

@section('content')
  <script>

  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '1588538331453581');
  	fbq('track', 'AddToCart');
</script>
<noscript>
    <img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=1588538331453581&ev=PageView&noscript=1"
/>
</noscript>
<?php
function precioTreintaP($precio,$cantidad)
	{
	    
             $treintaP=($precio*30)/100;
             
             $calcularDiezP=($treintaP*0.1);
             
             $total=$treintaP+$calcularDiezP;
              
             return $total*$cantidad;
              
	} 
	
	function precioMonto($precio,$cantidad)
	{
	    
              
             echo $cantidad*$precio;
              
	} 
?>
 

    <!-- page header -->
            <!--<section class="header header-bg-10">-->
            <!--    <div class="container">-->
            <!--        <div class="row">-->
            <!--            <div class="col-md-8 col-md-offset-2">-->
            <!--                <div class="header-content">-->
            <!--                    <div class="header-content-inner">-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</section>-->
            <!-- contact -->
            <section class="contact-inner">
                <BR><BR><BR><BR><BR><BR>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="contact_map">
                               <div class="container">
                              
                               
                                    @if(Session::has('cart'))
                                        <table id="cart" class="table table-hover table-condensed">
                                                        <thead>
                                                            <tr>
                                                                <th style="width:50%">Tours</th>
                                                                <th style="width:10%">Precio total</th>
                                                                <th style="width:8%">Nº personas</th>
                                                                <th style="width:22%" class="text-center">Adelanto</th>
                                                                <th style="width:10%"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($products as $product)
                                                                <tr>
                                                                    <td data-th="Product">
                                                                        <div class="row">
                                                                            <div class="col-sm-2 hidden-xs"><img src="/{{ $product['item']['img'] }}" alt="..." class="img-responsive"/></div>
                                                                            <div class="col-sm-10">
                                                                                <h4 class="nomargin">
                                                                                    @if($product['can']=='can')
                                                                                         {{ $product['item']['name'] }} | <h5>Comunidad Andina(CAN)</h5><img style="height: 30px;width: 50px;" src="/can.png">
                                                                                    @else
                                                                                        {{ $product['item']['name'] }} 
                                                                                    @endif
                                                                                </h4>
                                                                                
                                                                               
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    
                                                                    
                                                                    
                                                                    @if($product['can']=='can')
                                                                        <td data-th="Price">$. <?= precioMonto($product['item']['price_can'],$product['qty']) ?> </td>
                                                                    @else
                                                                         <td data-th="Price">$. <?= precioMonto($product['item']['price'],$product['qty']) ?> </td>
                                                                    @endif
                                                                    
                                                                    <td data-th="Quantity">
                                                                        <input type="text" class="form-control text-center" value="{{ $product['qty'] }}" readonly>
                                                                    </td>
                                                                    <td data-th="Subtotal" class="text-center">
                                                                        @if($product['can']=='can')
                                                                          $. <?=precioTreintaP($product['item']['price_can'],$product['qty'] );?> 
                                                                        @else
                                                                           $. <?=precioTreintaP($product['item']['price'],$product['qty'] );?> 
                                                                        @endif
                                                                    
                                                                      
                                                                        </td>
                                                                    <td class="actions" data-th="">
                                                                        <a href="{{route('product.addToCart',['id' => $product['item']['id'],'can'=>$product['can'] ])}}" class="btn btn-success btn-sm" ><i class="fa  fa-plus"></i></a>
                                                                        <a href="{{route('product.reduceByOne',['id' => $product['item']['id']]) }}" class="btn btn-danger btn-sm" ><i class="fa  fa-minus"></i></a>
                                                                        <a href="{{route('product.remove',['id' => $product['item']['id']]) }}" class="btn btn-danger btn-sm" ><i class="fa fa-trash"></i></a>
                                                                    </td>
                                                                </tr>

                                                            @endforeach
                                                        </tbody>
                                                            <tfoot>
                                                                <tr class="visible-xs">
                                                                    <td class="text-center"><strong>Total : {{ $totalPrice}}
                                                                    </strong></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="{{route('paquetesCategoriaES',['idioma'=> 'es','categoria'=>'aventura'])}}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Seguir comprando</a></td>
                                                                    <td colspan="2" class="hidden-xs"></td>
                                                                    <td class="hidden-xs text-center"><strong>Total $ {{ $totalPrice}} </strong></td>
                                                   
                                                                    @if (Auth::guest())
                                                                    
                                                                         <td><a href="{{ route('login')}}" class="btn btn-success btn-block" >Tramitar pedido <i class="fa fa-angle-right"></i></a></td>
                                                                         
                                                                    </tr>
                                                                        @else
                                                                        
                                                                            <td><a href="{{ route('checkout')}}" class="btn btn-success btn-block" >Tramitar pedido <i class="fa fa-angle-right"></i></a></td>
                                                                            
                                                                        @endif
                                                                                    
                                                                        </tfoot>
                                                             </table>
                                                                                         
                                                            <div align="justify">
                                                                <h5 style="color:red">IMPORTANTE!</h5>
                                                                <h6 >* PARA RESERVAR SE REALIZA EL PAGO DEL 30% DEL PRECIO TOTAL  + EL 10% POR COMISIÓN DE PAGO CON TARJETA. EL SALDO SE PAGA A SU LLEGADA A CUSCO ANTES DE INICIAR EL PRIMER TOUR.<BR>
                                                                * APLICA A PARTIR DE DOS PERSONAS A MÁS.
                                                                </h6>
                                                                
                                                                <h6 >* PARA UNA PERSONA EL PRECIO SE INCREMENTA DE ACUERDO AL PAQUETE CONTRATADO.
                                                                </h6>
                                                                
                                                               
                                                            </div>                    
                                                                                
                                                                                
                                                                    @else
                                                                    <center><img src="/public/icono/cori.jpg"  style="width: 200px; height: 200px"></center>
                             <h2>"Tu cesta está vacía."</h2>
                                        <h5>Haz que tu cesta de compra sea útil: llénala de paquetes turísticos. Si ya tienes una cuenta, Identifícate para ver su cesta. 
Siga comprando en <a href="http://machupicchugolden.com">machupicchugolden.com</a>, vea información de cada paquete de hoy.</h5>
                                       
                            
                                                                    @endif
                                       
                                       
                                           
                                        

                                    </div>
                                    
                                 
                            </div>
                            
                               
                            
                            
                        </div>
                      
                      
                    </div>
                </div>
            </section>
           
        </div>

@endsection

