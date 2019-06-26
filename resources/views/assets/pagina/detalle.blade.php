<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>

<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
 fbq('init', '1588538331453581'); 
 fbq('track', 'PageView');
 fbq('track', 'Purchase', {value: 439.00, currency: 'USD'});
</script>
<noscript>
 <img height="1" width="1" 
src="https://www.facebook.com/tr?id=1588538331453581&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->

<body>

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

<div class="container">
  
    <section class="contact-inner">
                <div class="container">
                    <div class="row">
                    
                        <div class="col-sm-8">
                            <div class="contact-form">
                                <h3 align="left">TU COMPRA SE REALIZÓ CON ÉXITO:</h3>
			
			  
			  	<br>
			<div>
				<label>Nº pedido : {{$numero}};</label>
			</div>
			 
			 <div>
			 		<label>Nombre y Apellidos: {{auth()->user()->name}} {{auth()->user()->apellido}} </label>
			 </div>
			
			  <div>
			  	<label>Tarjeta num:{{$card}} </label>
			  </div>
			
				<div>
					<label>Moneda: USD &nbsp</label>
				</div>
				
			 
				<div>
					<label>Importe: &nbsp {{$monto}};</label>
				</div>
				
				<div>
				    
				    <table id="cart" class="table table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th style="width:50%">Tours</th>
                                    <th style="width:10%">Precio total</th>
                                    <th style="width:8%">Nº personas</th>
                                    <th style="width:22%" class="text-center">Adelanto</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td data-th="Product">
                                            <div class="row">
                                                <div class="col-sm-2 hidden-xs"><img src="/{{ $product['item']['img'] }}" alt="..." class="img-responsive"/></div>
                                                <div class="col-sm-10">
                                                    <h4 class="nomargin">{{ $product['item']['name'] }} </h4>
                                                    </h4>
                                                   
                                                </div>
                                            </div>
                                        </td>
                                        <td data-th="Price">$. <?= precioMonto($product['item']['price'],$product['qty']) ?> </td>
                                        <td data-th="Quantity">
                                            <input type="text" class="form-control text-center" value="{{ $product['qty'] }}" readonly>
                                        </td>
                                        <td data-th="Subtotal" class="text-center">
                                            
                                           $. <?=precioTreintaP($product['item']['price'],$product['qty'] );?> 
                                          
                                            </td>
                                        
                                    </tr>

                                @endforeach
                            </tbody>
                                                           
                    </table>
				    
				</div>
			
			 <br>
				 
						 	
				<div class="cart-header">
				 <div class="cart-sec simpleCart_shelfItem">		
					<div class="cart-item cyc">
					</div>
					   
					<div>
						<h4></h4>
					</div>
					<div>
						<h4><span></span></h4>
					</div>
						<ul class="qty">
							<p>Cantidad: {{ $cantidaTours}}</p>
						</ul>
	
						<p><h4>Adelanto:{{$monto}} </h4></p>						
				  </div>
				 
			 </div>
			 <hr>
			<a class="sin_raya" href="{{ route('condicionesEs','es') }}" title="">Terminos y condiciones</a>
			<br>

			 <label>Nota: Imprimir el recibo de transaccion para sus archivos. Se envió a su correo una copia del detalle de compra </label>
			 <div align="right">
                <div align="justify">
                                                    <hr>
                                                    <h5 style="color:red">IMPORTANTE!</h5>
                                                    <h6> SE REALIZÓ EL PAGO DEL 30% DEL PRECIO TOTAL (MONTO A CONSIDERAR COMO ADELANTO DEL TOUR)  + EL 10% POR COMISIÓN DE PAGO CON TARJETA. EL SALDO RESTANTE SE PAGARÁ A SU LLEGADA A CUSCO ANTES DE INICIAR EL PRIMER TOUR</h6>
                                                </div>
                    
                </div>
			 <div align="right">
			     <input type="button" name="imprimir" value="Imprimir" class="btn btn-info btn-lg" onclick="window.print();">  &nbsp;&nbsp;
			 	<a href="/es" class="btn btn-success btn-lg" title="">Aceptar</a>
			 	
			 </div>
			</div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </section>
           
        </div>
  
</div>

</body>
</html>
 
          

