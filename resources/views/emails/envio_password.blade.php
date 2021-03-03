@component('mail::message')

# Estimado  {{$usuario->titulo}} {{$usuario->nombre}} {{$usuario->apellidoPaterno}},

Por este medio, le enviamos las credenciales de acceso a su cuenta como socio en el nuevo portal oficial de la SMACVE (smacve.org.mx),
por favor, apóyenos actualizando sus datos personales; si tiene alguna duda, contáctenos al correo atencionalsocio@smacve.org.mx.

Esta es la credencial de acceso a tu cuenta:

@component('mail::panel')
Usuario/E-Mail: **{{$usuario->email}}**

Password: **{{$usuario->passwordVisible}}**
@endcomponent


@component('mail::button', ['url' => route('login'), 'color' =>'blue'])
Iniciar Sesión
@endcomponent

La credencial de acceso es única y por seguridad sólo tú la conoces, por favor haz uso correcto de ella.

Muchas Gracias,<br>
**COMITE DIRECTIVO SMACVE 2019-2020**

@component('mail::subcopy')
Si tienes problemas con el click del boton "Iniciar Sesión", copia y pega la URL siguiente en tu explorador:
[{{ route('login') }}]({{ route('login') }})
@endcomponent

@endcomponent
