@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => config('app.url')])
 DETALLE DE COMPRA<br>
@endcomponent
@endslot

![Logo de Programación y más][logo]

{{-- Body --}}

@component('mail::table')

<h3>TU COMPRA SE REALIZÓ CON ÉXITO</h3>

 |                   |      COMPRA            	  |
| ------------------|:----------------------------| 
| N° pedido            : | {{$numeroTrans}}            |
| Nombres y Apellidos  : |   {{$nombreCompleto}}     |
| Tarjeta num: | {{$card}}       |
| Moneda  : |   USD     |
| Importe  : | {{ $totalPrice}}     |


<strong>Detalle del servicio:</strong></br>

|  Tour                             |       Costo         	                        | Cant       |  Adelanto      |
 @foreach($detalle as $product)
 |                              |                	                        |         |
| | | |
| {!! $product['item']['name'] !!}   |  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;  {{ $product['item']['price'] * $product['qty']}}   | &nbsp; &nbsp;   &nbsp; &nbsp; &nbsp; &nbsp; {!! $product['qty'] !!}   | &nbsp; &nbsp;   &nbsp; &nbsp; &nbsp; <?php $treintaP=$product['item']['price']*0.3; $calcularDiezP=($treintaP*0.1); $total=$treintaP+$calcularDiezP; echo $total*$product['qty'];?> | 
 @endforeach


<strong style="font-size: 12px;">IMPORTANTE:  * SE REALIZÓ EL PAGO DEL 30% DEL PRECIO TOTAL  + EL 10% POR COMISIÓN DE PAGO CON TARJETA. EL SALDO RESTANTE SE PAGARÁ A SU LLEGADA A CUSCO ANTES DE INICIAR EL PRIMER TOUR.<BR>
                    * APLICA A PARTIR DE DOS PERSONAS A MÁS.</strong></br>

@endcomponent
{{-- Footer --}}
@slot('footer')
@component('mail::footer')
	

© {{ date('Y') }} Todos los derechos reservados Empresa de turismo machupicchugolden.com.

[unsubscribe]: {{ url('/configuracion') }}
@endcomponent
@endslot

[logo]: https://www.machupicchugolden.com/plantilla/assets/images/logo.png
@endcomponent