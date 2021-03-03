@component('mail::message')

#HOLA {{$usuario->titulo}} {{$usuario->nombre}} {{$usuario->apellidoPaterno}} {{$usuario->apellidoMaterno}}

Gracias por enviar su solicitud de voluntariado en la Sociedad Mexicana de Angiología, Cirugía Vascular y Endovascular. Revisaremos su solicitud y le proporcionaremos una actualización
una vez que se hayan revisado todas las solicitudes.

<strong>Comités Seleccionados:</strong><br/>
<ul>
    @if(!empty($detalleSolicitud))
    @foreach($detalleSolicitud as $detalle)
        <li>{{$detalle->puestoVoluntariado}}</li>
    @endforeach
    @endif
</ul>
<br>
<br>
Sinceramente,<br>
**Astrid Carreño**<br/>
Dirección Administrativa<br/>
SMACVE

@component('mail::subcopy')
    Para cualquier duda, aclaración ó sugerencia, por favor escríbenos al siguiente correo: atencionalsocio@smacve.org.mx o bien a astrid.carreno@smacve.org.mx, lo más pronto posible te contestaremos.
@endcomponent

@endcomponent
