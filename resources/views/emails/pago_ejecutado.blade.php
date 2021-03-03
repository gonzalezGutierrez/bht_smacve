@component('mail::message')
# Estimado  {{$usuario->titulo}} {{$usuario->nombre}} {{$usuario->apellidoPaterno}} {{$usuario->apellidoMaterno}}

Hemos recibido la notificación de tu pago, muchas gracias por contribuir con el beneficio de esta sociedad, por favor se paciente, en breve nos estaremos comunicando contigo,
para confirmarte que tu pago ha sido aprobado.

Forma de Pago: **{{strtoupper($metodoPago->tipoPago)}}**

@component('mail::table')
| Anualidad | Costo |
|:--------|-------:|
| ANUALIDAD {{ $anualidad->anualidad }}                     | $ {{ number_format( $anualidad->costo,2) }}       |
|                                                           |-------------------------------                    |
| <span style="color:#449D44;">**TOTAL PAGADO**</span>      | <span style="color:#449D44;">**$ {{number_format($pago->monto,2)}}**</span>|
@endcomponent

@component('mail::button', ['url' => route('login'), 'color' =>'blue'])
Iniciar Sesión
@endcomponent

Para cualquier duda, aclaración ó sugerencia, por favor escríbenos al siguiente correo: atencionalsocio@smacve.org.mx, lo más pronto posible te contestaremos.

Muchas Gracias,<br>
**SMACVE**

@component('mail::subcopy')
Si tienes problemas con el click del boton "Iniciar Sesión", copia y pega la URL siguiente en tu explorador:
[{{ route('login') }}]({{ route('login') }})
@endcomponent

@endcomponent
