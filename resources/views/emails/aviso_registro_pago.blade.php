@component('mail::message')
# Hola,

Te notificamos que el {{$usuario->titulo}} {{$usuario->nombre}} {{$usuario->apellidoPaterno}} {{$usuario->apellidoMaterno}}, ha realizado su pago vía {{$metodoPago->tipoPago}}, por concepto de
**ANUALIDAD {{ $anualidad->anualidad }}**, por un monto total de **$ {{number_format($pago->monto,2)}}** ; se ha cambiado automaticamente el estatus de su pago a **PENDIENTE DE VERIFICAR**
por favor, lo más breve posible verifica el pago y de ser efectiva la transacción no te olvides de cambiar el estatus de pago a **PAGADO**.


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
