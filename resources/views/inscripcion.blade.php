<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
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
                <li><a href="/">Inicio</a></li>
                <li><a href="/planes">Planes de Estudio</a></li>
                <!-- <li><a href="/contacto">Contacto</a></li>  -->
            </ul>

            <div id="menu-acceder">
                <a href="/registro" id="btn-acceder">Acceder</a>
            </div>

        </nav>
    </header>

   <section id="contenido">

    <h2>Solicitud de Pre-registro</h2>
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
    <div style="width:100%; display:flex; justify-content:flex-end; margin-bottom:15px;">
    <button id="btnExplicacion"
            style="padding:8px 16px; background:#1a2744; color:white;
                   border:none; border-radius:6px; cursor:pointer; font-size:15px;">
        Explicación
    </button>
</div>
    <form id="form-preregistro" method="POST" action="{{ route('preregistro.store') }}" enctype="multipart/form-data">
    @csrf

        <div class="form-group">
            <label>Nombre Completo:</label>
            <input type="text" name="nombre_completo" required>
        </div>

        <div class="form-group">
            <label>Fecha nacimiento:</label>
            <input type="date" name="fecha" required>
        </div>

        <div class="form-group">
            <label>Domicilio:</label>
            <input type="text" name="domicilio" required>
        </div>

        <div class="form-group">
            <label>Colonia:</label>
            <input type="text" name="colonia" required>
        </div>

        <div class="form-group">
            <label>Localidad:</label>
            <input type="text" name="localidad" required>
        </div>

        <div class="form-group">
            <label>Municipio:</label>
            <input type="text" name="municipio" required>
        </div>

        <div class="form-group">
            <label>Estado:</label>
            <input type="text" name="estado" required>
        </div>

        <div class="form-group">
            <label>Teléfono Celular:</label>
            <input type="text" name="telefono" required>
        </div>

        <div class="form-group">
            <label>Correo:</label>
            <input type="text" name="correo" required>
        </div>

        <div class="form-group">
            <label>Edad:</label>
            <input type="number" name="edad" required>
        </div>

        <div class="form-group">
            <label>Estado Civil:</label>
            <input type="text" name="estado_civil" required>
        </div>

        <div class="form-group">
            <label>Nombre de la Iglesia:</label>
            <input type="text" name="iglesia" required>
        </div>

        <div class="form-group">
            <label>Domicilio de la Iglesia:</label>
            <input type="text" name="domicilio_iglesia" required>
        </div>

        <div class="form-group">
            <label>Colonia de la Iglesia:</label>
            <input type="text" name="colonia_iglesia" required>
        </div>

        <div class="form-group">
            <label>Localidad de la Iglesia:</label>
            <input type="text" name="localidad_iglesia" required>
        </div>

        <div class="form-group">
            <label>Municipio de la Iglesia:</label>
            <input type="text" name="municipio_iglesia" required>
        </div>

        <div class="form-group">
            <label>Tiempo de congregarse:</label>
            <input type="text" name="tiempo_congregarse" required>
        </div>

        <div class="form-group">
            <label>Nombre del Pastor:</label>
            <input type="text" name="pastor" required>
        </div>

        <div class="form-group">
            <label>¿Desempeña algún cargo?</label><br>
            <input type="radio" name="cargo" value="si" id="cargoSi" required> Sí
            <input type="radio" name="cargo" value="no" id="cargoNo"> No
        </div>

        <div class="form-group" id="cargoDesem">
            <label>¿Cuál cargo?</label>
            <input type="text" name="cargo_nombre">
        </div>

        <div class="form-group">
            <label>Propósito de estudiar en el Instituto:</label>
            <textarea name="proposito" required></textarea>
        </div>

        <div class="form-group">
            <label>¿Tiene formación teológica?</label>
            <input type="text" name="formacion_teologica" required>
        </div>

        <div class="form-group">
            <label>Escolaridad:</label><br>
            Primaria <input type="radio" name="escolaridad" value="primaria">
            Secundaria <input type="radio" name="escolaridad" value="secundaria">
            Bachillerato <input type="radio" name="escolaridad" value="bachillerato">
            Otra <input type="radio" name="escolaridad" value="otra">
        </div>

        <div class="form-group" id="otraEscolaridad" >
            <label>Otra escolaridad:</label>
            <input type="text" name="otra_escolaridad">
        </div>

        <div class="form-group">
            <label>Sistema al que desea inscribirse:</label><br>
            Presencial <input type="checkbox" name="presencial" id="chkPresencial" required>
            Virtual <input type="checkbox" name="virtual" id="chkVirtual">
            Diplomado <input type="checkbox" name="diplomado" id="chkDiplomado">
        </div>

        <div class="form-group" id="motivoVirtual">
            <label>Motivo para sistema virtual:</label>
            <textarea name="motivo_virtual"></textarea>
        </div>
        <div class="form-group" id="RegionList" style="display:none;">
            <label>Region:</label>
            <select name="region" id="region" style="width:299px;" required>
                <option value="1">SAN MIGUEL</option>
                <option value="2">CUAUTLA</option>
                <option value="3">VIRTUAL</option>
                <option value="4">ZACATEPEC</option>
            </select>
        </div>
        
       <!-- <div class="form-group">
            <label>Archivos (PDF):</label>
            <input type="file" name="documento_pdf" accept="application/pdf" required>
        </div> -->

        <button type="submit">Enviar Solicitud</button>

    </form>

</section>

   <footer id="foot">
        <img src="img/icap_logo.png" alt="Logo Icap" id="logoi-img">
        <p>ICAP A.R.</p>

   </footer>
   <script src="{{ asset('js/inscripcion.js') }}"></script>
    <script src="{{ asset('js/index.js') }}"></script>
    <div id="modalExplicacion"
     style="display:none; position:fixed; top:0; left:0; width:100%; height:100%;
            background:rgba(0,0,0,0.45); justify-content:center; align-items:center; z-index:9999;">

        <div style="background:white; padding:25px; width:420px; border-radius:10px; box-shadow:0 4px 10px rgba(0,0,0,0.3);">
        <h2 style="margin-top:0;">Explicación</h2>
        <p>
            Dios le bendiga herman@.
        </p>
       
        <p>
            El presente formulario se utiliza con el fin de recaudar información necesaria para su inscripción, favor de llenar todos los campos que se presentan.
        </p>
        <p>
            Al final de este formulario se solicitará un archivo pdf, en el cual deberán ir los siguientes archivos:
        </p>
        <ul>
            <li>Copia del INE.</li>
            <li>Copia de credencial de I.C.A.P. (Ministerios de oficio).</li>
            <li>Copia de certificado de bautizo.</li>
            <li>Copia del certificado de matrimonio (en caso de ser casado).</li>
            <li>Carta de recomendación del pastor del Área y del pastor local.</li>
            <li>Carta de exposición de motivos.</li>
        </ul>
        <p>
            Es importante anexar todos los archivos solicitados, ya que se validarán.
        </p>
         <p>
            Bendiciones.
        </p>
        <button id="cerrarExplicacion"
                style="margin-top:15px; padding:8px 14px; background:#1a2744; 
                       color:white; border:none; border-radius:5px; cursor:pointer;">
            Cerrar
        </button>
    </div>

</div>
</body>
</html>