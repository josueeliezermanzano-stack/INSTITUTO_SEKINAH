<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('img/shekina_logo.png') }}">
    <title>Inicio</title>
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
                <li><a href="/informacion">Información</a></li>
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

        
    
    
    
    </section>

   <footer id="foot">
        <img src="img/icap_logo.png" alt="Logo Icap" id="logoi-img">
        <p>ICAP A.R.</p>
   </footer>
   <script src="{{ asset('js/inicio.js') }}"></script>
    <script src="{{ asset('js/index.js') }}"></script>
    

</div>
</body>
</html>