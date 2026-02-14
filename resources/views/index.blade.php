<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('img/shekina_logo.png') }}">
    <title>Página de Inicio</title>
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
        .texto-inap {
            font-family: "Segoe UI", Arial, sans-serif;
            font-size: 17px;
            color: #3a3a3a;
            line-height: 1.65;
            letter-spacing: 0.3px;
            font-weight: 400;
        }

        .titulo-inap {
            font-family: "Segoe UI", Arial, sans-serif;
            font-size: 30px;
            color: #1a2744;
            text-align: left;
            margin-bottom: 10px;
            font-weight: 700;
        }

        .conocenos-container {
            display: flex;
            align-items: center;
            gap: 30px;
            padding: 40px;
            max-width: 1100px;
            margin: 40px auto;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .conocenos-container img {
            width: 45%;
            border-radius: 12px;
        }

        .bloque-texto {
            max-width: 1100px;
            background: white;
            padding: 40px;
            margin: 40px auto;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .carrusel {
            max-width: 1100px;
            margin: 50px auto;
            position: relative;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
        }

        .carrusel img {
            width: 100%;
            display: none;
        }

        .carrusel img.activa {
            display: block;
        }

        .carrusel .flecha {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            color: white;
            font-size: 30px;
            background: rgba(0,0,0,0.4);
            padding: 10px 15px;
            cursor: pointer;
            user-select: none;
        }

        .flecha.izq { left: 10px; }
        .flecha.der { right: 10px; }


        @media (max-width: 900px) {
            .conocenos-container {
                flex-direction: column;
                text-align: center;
            }

            .conocenos-container img {
                width: 80%;
            }
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
            <li><a href="/inscripcion">Inscripción</a></li>
            <li><a href="/planes">Planes de Estudio</a></li>
           <!-- <li><a href="/contacto">Contacto</a></li>  -->
        </ul>

        <div id="menu-acceder">
            <a href="/registro" id="btn-acceder">Acceder</a>
        </div>

    </nav>
</header>

    <section id="contenido">
        
       <div class="conocenos-container">
            <img src="img/instituto1.jpg" alt="Instituto">
            <div class="texto-inap">
            <h2 class="titulo-inap">Conocenos</h2>
                <p>
                    Somos un instituto dedicado a la formación y capacitación bíblica y ministerial.
                    Creemos en la enseñanza sólida de la Palabra de Dios y en el desarrollo espiritual
                    de todo creyente.
                </p>
                <p>
                    Desde nuestra fundación, nuestro objetivo ha sido formar siervos comprometidos con
                    la obra del Señor y con un corazón dispuesto al servicio.
                </p>
            </div>
        </div>


        <div class="bloque-texto">
            <div class="texto-inap">
                <h2 class="titulo-inap" style="text-align:center;">Misión</h2>
                <p>
                    Capacitar y formar líderes fieles siervos de Dios, en el estudio de las sagradas Escrituras
                    y mantener una Sana Doctrina.
                </p>
            </div>
        </div>


        <div class="conocenos-container" style="flex-direction: row-reverse;">
            <img src="img/instituto2.jpg" alt="Ofrecemos">

            <div class="texto-inap">
                <h2 class="titulo-inap">Ofrecemos</h2>

                <p>
                    En nuestro instituto brindamos una formación sólida, basada en la Biblia y orientada
                    al crecimiento espiritual, doctrinal y ministerial.
                </p>

                <ul>
                    <li>Formación teológica estructurada.</li>
                    <li>Desarrollo de habilidades ministeriales.</li>
                    <li>Preparación para la obra y el servicio en la iglesia.</li>
                    <li>Acompañamiento espiritual continuo.</li>
                </ul>
            </div>
        </div>
        <div class="bloque-texto">
            <div class="texto-inap">
                <h2 class="titulo-inap" style="text-align:center;">Dirigido a</h2>
                <ul>
                    <li>Siervos de Dios que aún no han cursado el Instituto.</li>
                    <li>Ministerios de oficio interesados en formación continua.</li>
                    <li>Ayudas, gobernaciones y la iglesia en general.</li>
                    <li>Zonas donde no se imparte enseñanza presencial.</li>
                </ul>
            </div>
        </div>

        <div class="carrusel">
            <span class="flecha izq" onclick="cambiarImg(-1)">&#10094;</span>
            <span class="flecha der" onclick="cambiarImg(1)">&#10095;</span>

            <img src="img/instituto5.jpg" class="activa">
            <img src="img/instituto6.jpg">
            <img src="img/instituto3.jpg">
            <img src="img/omstituto4.jpg">
            <img src="img/instituto7.jpg">
            <img src="img/instituto8.jpg">
        </div>

        
    </section>

   <footer id="foot">
        <img src="img/icap_logo.png" alt="Logo Icap" id="logoi-img">
        <p>ICAP A.R.</p>

   </footer>
    <script src="{{ asset('js/index.js') }}"></script>
    <script>
        let indice = 0;
        const imagenes = document.querySelectorAll(".carrusel img");

        function cambiarImg(dir) {
            imagenes[indice].classList.remove("activa");
            indice = (indice + dir + imagenes.length) % imagenes.length;
            imagenes[indice].classList.add("activa");
        }
    </script>
</body>
</html>