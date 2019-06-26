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
| Nombre completo   | {{$detalle->name}}  {{$detalle->apellido}}|
| Email             | {{$detalle->email}}         | 
| Teléfono          | {{$detalle->phone}}         |
| Nacionalidad      | {{$detalle->nacionalidad}}  |

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