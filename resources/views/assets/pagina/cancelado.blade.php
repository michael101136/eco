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
<body>

<div class="container">
  
    <section class="contact-inner">
                <div class="container">
                    <div class="row">
                    
                        <div class="col-sm-8">
                            <div class="contact-form">
                                <h3 align="left" style="color: red;">No se pudo realizar la transacción:</h3>
			
			  
			  	<br>
			<div>
				<label># pedido : {{$numero}};</label>
			</div>
			 
			 <div>
			 		<label>Nombre: {{auth()->user()->name}} {{auth()->user()->apellido}} </label>
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
	
						<p><h4>Precio Total:{{$monto}} </h4></p>						
				  </div>
				 
			 </div>
			 <hr>
			<a class="sin_raya" href="{{ route('condicionesEs','es') }}" title="">Terminos y condiciones</a>
			<br>

			 <label>Nota: Debe imprimir y guardar el recibo de transaccion para sus archivos</label>
			 <div align="right">
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
 
          

