<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('img/shekina_logo.png') }}">
    <title>Formulario Inscripción</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: 
                linear-gradient(rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.9)),
                url('/img/shekina_logo.png');
            background-size: contain;  
            background-repeat: no-repeat;
            background-position: center;
        }
        
    </style>
</head>
<body>

    <header id="header">
        <nav id="menu">
            
            <div id="menu-logo">
                <img src="img/shekina_logo.png" alt="Logo Shekina" id="logo-img">
            </div>

            <ul id="menu-links">
                <li><a href="/inicio">Inicio</a></li>
                <li><a href="/informacion">Información</a></li>
                @if(session('perfil') == 3)
                    <li><a href="/periodo">Periodo</a></li>
                @endif
                <li><a href="/materias">Materias</a></li>
            </ul>

            <div id="menu-acceder">
                <a href="/logout" id="btn-acceder">Cerrar Sesion</a>
            </div>

        </nav>
    </header>
    @if(session('perfil') == 3)
    
        <section id="contenido">

            <h2>Solicitudes de Pre-registro</h2>
            @if(session('success'))
                <div style="background-color:#d4edda; color:#155724; padding:10px; border-radius:5px; margin-bottom:20px;">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div style="color:red; margin-bottom:20px;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="tabla-wrapper">
            <table class="tabla-registros">
                <thead>
                    <tr>
                        <th>Nombre Completo</th>
                        <th>Fecha Nacimiento</th>
                        <th>Domicilio</th>
                        <th>Colonia</th>
                        <th>Localidad</th>
                        <th>Municipio</th>
                        <th>Estado</th>
                        <th>Teléfono</th>
                        <th>Edad</th>
                        <th>Estado Civil</th>
                        <th>Iglesia</th>
                        <th>Domicilio Iglesia</th>
                        <th>Colonia Iglesia</th>
                        <th>Localidad Iglesia</th>
                        <th>Municipio Iglesia</th>
                        <th>Tiempo Congregarse</th>
                        <th>Pastor</th>
                        <th>Cargo</th>
                        <th>Nombre Cargo</th>
                        <th>Propósito</th>
                        <th>Formación Teológica</th>
                        <th>Primaria</th>
                        <th>Secundaria</th>
                        <th>Bachillerato</th>
                        <th>Otra Escolaridad</th>
                        <th>Presencial</th>
                        <th>Región</th>
                        <th>Virtual</th>
                        <th>Motivo Virtual</th>
                        <th>Diplomado</th>
                        <th>Fecha Registro</th>
                        <th>Archivos</th>
                        <th>Aprobar</th>
                        <th>Rechazar</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($registros as $r)
                        <tr>
                            <td>{{ $r->nombre_completo }}</td>
                            <td>{{ $r->fecha_nacimiento }}</td>
                            <td>{{ $r->domicilio }}</td>
                            <td>{{ $r->colonia }}</td>
                            <td>{{ $r->localidad }}</td>
                            <td>{{ $r->municipio }}</td>
                            <td>{{ $r->estado }}</td>
                            <td>{{ $r->telefono }}</td>
                            <td>{{ $r->edad }}</td>
                            <td>{{ $r->estado_civil }}</td>

                            <td>{{ $r->iglesia }}</td>
                            <td>{{ $r->domicilio_iglesia }}</td>
                            <td>{{ $r->colonia_iglesia }}</td>
                            <td>{{ $r->localidad_iglesia }}</td>
                            <td>{{ $r->municipio_iglesia }}</td>

                            <td>{{ $r->tiempo_congregarse }}</td>
                            <td>{{ $r->pastor }}</td>

                            <td>{{ $r->cargo }}</td>
                            <td>{{ $r->cargo_nombre }}</td>

                            <td>{{ $r->proposito }}</td>
                            <td>{{ $r->formacion_teologica }}</td>

                            <td>{{ $r->primaria }}</td>
                            <td>{{ $r->secundaria }}</td>
                            <td>{{ $r->bachillerato }}</td>
                            <td>{{ $r->otra_escolaridad }}</td>

                            <td>{{ $r->presencial == 1 ? 'Sí' : 'No' }}</td>
                            <td>{{ $r->region }}</td>
                            <td>{{ $r->virtual1 == 1 ? 'Sí' : 'No' }}</td>

                            <td>{{ $r->motivo_virtual }}</td>
                            <td>{{ $r->diplomado }}</td>

                            <td>{{ $r->fecha_registro }}</td>

                            <td>
                                @if($r->archivos)
                                    <a href="{{ asset('storage/'.$r->archivos) }}" target="_blank">Ver</a>
                                @else
                                    —
                                @endif
                            </td>
                            <td style="text-align:center;">
                                <button class="btn-aprobar" data-id="{{ $r->id_encuesta }}">✔</button>
                            </td>

                            <td style="text-align:center;">
                                <button class="btn-rechazar" data-id="{{ $r->id_encuesta }}">✖</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="34" style="text-align:center;">No hay registros</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </section>
        <div id="modalAprobar"
        style="display:none; position:fixed; top:0; left:0; width:100%; height:100%;
                background:rgba(0,0,0,0.45); justify-content:center; align-items:center; z-index:9999;">

            <div style="background:white; padding:25px; width:420px; border-radius:10px; box-shadow:0 4px 10px rgba(0,0,0,0.3);">
            <h2 style="margin-top:0;">Aprobación de solicitud</h2>
            <h1 id="hAprob" style="display:none;"></h1>
            <p>
                ¿Estas seguro de que quieres aprobar la solicitud?
            </p>
            
            <p>
                Nota: Al dar clic en Aceptar se dará de alta como alumno al usuario seleccionado.
            </p>
            
            <button id="cerrarAprobar"
                    style="margin-top:15px; padding:8px 14px; background:#1a2744; 
                        color:white; border:none; border-radius:5px; cursor:pointer;">
                Cancelar
            </button>
            <button id="aprobarSolicitud"
                    style="margin-top:15px; padding:8px 14px; background:#1a2744; 
                        color:white; border:none; border-radius:5px; cursor:pointer;">
                Aprobar
            </button>
            </div>
        </div>

        <div id="modalRechazar"
        style="display:none; position:fixed; top:0; left:0; width:100%; height:100%;
                background:rgba(0,0,0,0.45); justify-content:center; align-items:center; z-index:9999;">
            <div style="background:white; padding:25px; width:420px; border-radius:10px; box-shadow:0 4px 10px rgba(0,0,0,0.3);">
                <h2 style="margin-top:0;">Rechazo de solicitud</h2>
                <h1 id="hRecha" style="display:none;"></h1>
                <p>
                    ¿Estas seguro de que quieres rechazar la solicitud?
                </p>
                
                <p>
                    Nota: Al dar clic en Rechazar se dará de baja la solicitud.
                </p>
                
                <button id="cerrarRechazar"
                        style="margin-top:15px; padding:8px 14px; background:#1a2744; 
                            color:white; border:none; border-radius:5px; cursor:pointer;">
                    Cancelar
                </button>
                <button id="rechazarSolicitud"
                        style="margin-top:15px; padding:8px 14px; background:#1a2744; 
                            color:white; border:none; border-radius:5px; cursor:pointer;">
                    Rechazar
                </button>
            </div>
        </div>
    @endif
    @unless(session('logueado')) 
        <section id="contenido">
            <h2>Solicitudes de Pre-registro</h2>
        </section>
    @endunless
    
    
    <footer id="foot">
        <img src="img/icap_logo.png" alt="Logo Icap" id="logoi-img">
        <p>ICAP A.R.</p>
    </footer>
    <script src="{{ asset('js/admininscripcion.js') }}"></script>
    <script src="{{ asset('js/index.js') }}"></script>
</body>
</html>