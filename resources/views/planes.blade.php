<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('img/shekina_logo.png') }}">
    <title>Planes de Estudio</title>
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
                <li><a href="/inscripcion">Inscripción</a></li>
                <!-- <li><a href="/contacto">Contacto</a></li>  -->
            </ul>

            <div id="menu-acceder">
                <a href="/registro" id="btn-acceder">Acceder</a>
            </div>

        </nav>
    </header>

    <section id="contenido">
        
       <section id="Pcuatrimestre">
            <h2>Primer Cuatrimestre</h2>
            <ul>
                <li>Bibliología.</li>
                <li>Introducción a la Teología.</li>
                <li>Pentateuco.</li>
                <li>Historia Eclesiástica.</li>
            </ul>
        </section>
        <section id="Scuatrimestre">
            <h2>Segundo Cuatrimestre</h2>
            <ul>
                <li>Homilética.</li>
                <li>Teología Sistemática II.</li>
                <li>Hermenéutica.</li>
                <li>Evangelios Sinópticos.</li>
            </ul>
        </section>
        <section id="Tcuatrimestre">
            <h2>Tercer Cuatrimestre</h2>
            <ul>
                <li>Teología Sistemática.</li>
                <li>    Sermón Expositivo.</li>
                <li>    Hechos de los Apóstoles.</li>
                <li>    Liderazgo.</li>
            </ul>
        </section>
        <section id="Ccuatrimestre">
            <h2>Cuarto Cuatrimestre</h2>
            <ul>
                <li>Teología Sistemática IV.</li>
                <li>    Escatología.</li>
                <li>    Epístolas Paulinas.</li>
                <li>    Libros Sapienciales.</li>
            </ul>
        </section>
        <section id="Qcuatrimestre">
            <h2>Quinto Cuatrimestre</h2>
            <ul>
                <li>Ejercicios ministeriales.</li>
                <li>    Teología Sistemática V.</li>
                <li>    Evangelismo.</li>
                <li>    Libros Históricos.</li>
            </ul>
        </section>
        <section id="Secuatrimestre">
            <h2>Sexto Cuatrimestre</h2>
            <ul>
                <li>Evangelio de Juan.</li>
                <li>    Apologética.</li>
                <li>    Consejería pastoral.</li>
                <li>    Ética ministerial.</li>
            </ul>
        </section>
        <section id="Diplomado">
            <h2>Diplomado (20 semanas)</h2>
            <ul>
                <li>Eclesiología.</li>
                <li>    Apocalipsis.</li>
                <li>    Neumatología.</li>
                <li>    Administración pastoral.</li>
            </ul>
        </section>
    </section>

   <footer id="foot">
        <img src="img/icap_logo.png" alt="Logo Icap" id="logoi-img">
        <p>ICAP A.R.</p>

   </footer>
    <script src="{{ asset('js/index.js') }}"></script>
    <script src="{{ asset('js/planes.js') }}"></script>
</body>
</html>