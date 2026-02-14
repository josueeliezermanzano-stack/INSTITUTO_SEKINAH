@component('mail::message')
# Solicitud de Pre-registro

Buen día,

@if($estatus == 1)
Su solicitud de **pre-registro ha sido ACEPTADA** ✅  

A continuación, se le proporcionan sus credenciales de acceso:

@component('mail::panel')
**Número usuario:** {{ $usuario }}  
**Contraseña:** {{ $contra }}
@endcomponent

Por favor, conserve esta información de manera segura.

@elseif($estatus == 2)
Lamentamos informarle que su solicitud de **pre-registro ha sido RECHAZADA** ❌  

Si considera que se trata de un error o requiere mayor información, puede comunicarse con el área correspondiente.

@endif

Bendiciones.<br>

@endcomponent