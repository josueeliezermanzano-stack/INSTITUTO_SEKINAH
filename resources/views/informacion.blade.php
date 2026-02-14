<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('img/shekina_logo.png') }}">
    <title>Información</title>
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
    @unless(session('logueado')) 
        <section id="contenido">
            <h2>Solicitudes de Pre-registro</h2>
        </section>
    @endunless
    <header id="header">
        <nav id="menu">
            
            <div id="menu-logo">
                <img src="img/shekina_logo.png" alt="Logo Shekina" id="logo-img">
            </div>

            <ul id="menu-links">
                
                <li><a href="/inicio">Inicio</a></li>
                @if(session('perfil') == 3)
                    <li><a href="/adminInscripcion">Inscripciones</a></li>
                    <li><a href="/periodo">Periodo</a></li>
                @endif
                <li><a href="/materias">Materias</a></li>
            </ul>

            <div id="menu-acceder">
                <a href="/logout" id="btn-acceder">Cerrar Sesion</a>
            </div>

        </nav>
    </header>
    
        <section id="contenido">
            @if(session('success'))
                <div style="background-color:#d4edda; color:#155724; padding:10px; border-radius:5px; margin-bottom:20px;">
                    {{ session('success') }}
                </div>
            @endif
            <h2>Información personal</h2>
            
            <form method="POST" action="{{ route('informacion.store') }}"
                class="form-informacion">
                @csrf
                
                <input type="hidden" name="idEncuesta" value="{{ $informacion->id_encuesta }}">
                <div class="form-group">
                    <label>Nombre completo</label>
                    <input type="text" name="nombre_completo" class="form-control" value="{{ $informacion->nombre_completo }}" required>
                </div>

                <div class="form-group">
                    <label>Correo</label>
                    <input type="email" name="correo" class="form-control" value="{{ $informacion->correo }}" required>
                </div>

                <div class="form-group">
                    <label>Fecha de nacimiento</label>
                    <input type="date" name="fecha_nacimiento" class="form-control" value="{{ $informacion->fecha_nacimiento }}" required>
                </div>

                <div class="form-group">
                    <label>Edad</label>
                    <input type="number" name="edad" class="form-control" value="{{ $informacion->edad }}" required>
                </div>

                <div class="form-group">
                    <label>Estado civil</label>
                    <input type="text" name="estado_civil" class="form-control" value="{{ $informacion->estado_civil }}" required>
                </div>

                <div class="form-group">
                    <label>Teléfono</label>
                    <input type="text" name="telefono" class="form-control" value="{{ $informacion->telefono }}" required>
                </div>

                <div class="form-group">
                    <label>Domicilio</label>
                    <input type="text" name="domicilio" class="form-control" value="{{ $informacion->domicilio }}" required>
                </div>

                <div class="form-group">
                    <label>Colonia</label>
                    <input type="text" name="colonia" class="form-control" value="{{ $informacion->colonia }}" required>
                </div>

                <div class="form-group">
                    <label>Localidad</label>
                    <input type="text" name="localidad" class="form-control" value="{{ $informacion->localidad }}" required>
                </div>

                <div class="form-group">
                    <label>Municipio</label>
                    <input type="text" name="municipio" class="form-control" value="{{ $informacion->municipio }}" required>
                </div>

                <div class="form-group">
                    <label>Estado</label>
                    <input type="text" name="estado" class="form-control" value="{{ $informacion->estado }}" required>
                </div>
                <div class="form-group">
                    <label>Iglesia</label>
                    <input type="text" name="iglesia" class="form-control" value="{{ $informacion->iglesia }}" required>
                </div>

                <div class="form-group">
                    <label>Domicilio Iglesia</label>
                    <input type="text" name="domicilio_iglesia" class="form-control" value="{{ $informacion->domicilio_iglesia }}" required>
                </div>

                <div class="form-group">
                    <label>Colonia Iglesia</label>
                    <input type="text" name="colonia_iglesia" class="form-control" value="{{ $informacion->colonia_iglesia }}" required>
                </div>

                <div class="form-group">
                    <label>Localidad Iglesia</label>
                    <input type="text" name="localidad_iglesia" class="form-control" value="{{ $informacion->localidad_iglesia }}" required>
                </div>

                <div class="form-group">
                    <label>Municipio Iglesia</label>
                    <input type="text" name="municipio_iglesia" class="form-control" value="{{ $informacion->municipio_iglesia }}" required>
                </div>

                <div class="form-group">
                    <label>Tiempo congregándose</label>
                    <input type="text" name="tiempo_congregarse" class="form-control" value="{{ $informacion->tiempo_congregarse }}" required>
                </div>

                <div class="form-group">
                    <label>Pastor</label>
                    <input type="text" name="pastor" class="form-control" value="{{ $informacion->pastor }}" required>
                </div>

                <div class="form-group">
                    <label>Cargo</label>
                    <input type="text" name="cargo" class="form-control" value="{{ $informacion->cargo }}" required>
                </div>

                <div class="form-group">
                    <label>Nombre del cargo</label>
                    <input type="text" name="cargo_nombre" class="form-control" value="{{ $informacion->cargo_nombre }}">
                </div>
                <br>
                <button type="submit" class="btn-guardar">
                    Actualizar datos
                </button>
            </form>
        </section>
    
    <footer id="foot">
        <img src="img/icap_logo.png" alt="Logo Icap" id="logoi-img">
        <p>ICAP A.R.</p>
    </footer>
    <script src="{{ asset('js/informacion.js') }}"></script>
    <script src="{{ asset('js/index.js') }}"></script>
</body>
</html>