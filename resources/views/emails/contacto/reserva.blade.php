@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => config('app.url')])
 FORMULARIO DE CONTACTO<br>
@endcomponent
@endslot

![Logo de Programación y más][logo]

{{-- Body --}}

@component('mail::table')
|                   | DETALLE                  	  |
| ------------------|:----------------------------| 
| Tours            : | {{$nameTour}}               |
| Nombre           : | {{$detalle->name}}          |
| Email            : | {{$detalle->email}}         | 
| Teléfono         : | {{$detalle->phone}}         |
| Adultos          : | {{$detalle->cantidadAdultos}}|
| Niños            : | {{$detalle->cantidadNinios}}|
| Nacionalidad     : | {{$detalle->country}}       |
| Hotel Cusco      : | {{$detalle->hotel1}}        |
| Hotel Aguas calientes : | {{$detalle->hotel2}}|
| Tipo habitación  : | {{$detalle->tipo_habitacion}}|
| Fecha            : | {{$detalle->date}}          |

<strong>MENSAJE:</strong></br>
{{$detalle->message}}  
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