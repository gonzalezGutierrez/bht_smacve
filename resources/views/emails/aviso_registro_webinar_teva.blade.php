@component('mail::message')
# Hola,

Te notificamos que el C. {{$nombre}} , ha solicitado unirse al Webinar SMACVE-TEVA
por favor, lo más breve posible ponerse en contacto con el interesado para enviarle link de acceso al evento.

@component('mail::panel')
Nombre Completo: **{{$nombre}}**

E-Mail: **{{$email}}**

Especialidad: **{{$especialidad}}**

Teléfono: **{{$telefono}}**
@endcomponent


Muchas Gracias,<br>
**SMACVE**

@endcomponent
