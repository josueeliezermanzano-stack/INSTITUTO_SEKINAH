@component('mail::message')
# Nueva Solicitud de Pre-registro

Se ha recibido una nueva solicitud con los siguientes datos:

- **Nombre Completo:** {{ $data['nombre_completo'] }}
- **Fecha de Nacimiento:** {{ $data['fecha'] }}
- **Domicilio:** {{ $data['domicilio'] }}
- **Colonia:** {{ $data['colonia'] }}
- **Localidad:** {{ $data['localidad'] }}
- **Municipio:** {{ $data['municipio'] }}
- **Estado:** {{ $data['estado'] }}
- **Teléfono:** {{ $data['telefono'] }}
- **Edad:** {{ $data['edad'] }}
- **Estado Civil:** {{ $data['estado_civil'] }}

**Datos de la Iglesia:**
- **Nombre de la Iglesia:** {{ $data['iglesia'] }}
- **Domicilio de la Iglesia:** {{ $data['domicilio_iglesia'] }}
- **Colonia de la Iglesia:** {{ $data['colonia_iglesia'] }}
- **Localidad de la Iglesia:** {{ $data['localidad_iglesia'] }}
- **Municipio de la Iglesia:** {{ $data['municipio_iglesia'] }}
- **Tiempo de Congregarse:** {{ $data['tiempo_congregarse'] }}
- **Nombre del Pastor:** {{ $data['pastor'] }}

**Información adicional:**
- **¿Desempeña algún cargo?:** {{ ucfirst($data['cargo']) }}
- **Nombre del cargo:** {{ $data['cargo_nombre'] ?? 'No aplica' }}
- **Propósito de estudiar en el Instituto:** {{ $data['proposito'] }}
- **Formación teológica:** {{ $data['formacion_teologica'] }}
- **Escolaridad:** {{ ucfirst($data['escolaridad']) }}
- **Otra escolaridad:** {{ $data['otra_escolaridad'] ?? 'No proporcionada' }}

**Sistema al que desea inscribirse:**
- Presencial: {{ isset($data['presencial']) && $data['presencial'] ? 'Sí' : 'No' }}
- Región: {{ $data['region'] ?? 'No proporcionada' }}
- Virtual: {{ isset($data['virtual']) && $data['virtual'] ? 'Sí' : 'No' }}
- Motivo para sistema virtual: {{ $data['motivo_virtual'] ?? 'No proporcionado' }}

- **Diplomado (solo ministerios de oficio):** {{ isset($data['diplomado']) && $data['diplomado'] ? 'Sí' : 'No' }}

@isset($urlArchivo)
@component('mail::button', ['url' => $urlArchivo])
Descargar Documento PDF
@endcomponent
@endisset



Bendiciones.<br>

@endcomponent