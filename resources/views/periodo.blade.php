<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('img/shekina_logo.png') }}">
    <title>Periodo</title>
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
                    <li><a href="/adminInscripcion">Inscripciones</a></li>
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

            <h2>Registrar periodo</h2>
            @if(isset($periodo[0]))
                <div id="info-periodo-linea">
                    <h3><strong>Periodo actual:</strong> {{ $periodo[0]->PERIODO }}</h3>
                    <h3><strong>Descripción:</strong> {{ $periodo[0]->DESCRIPCION }}</h3>
                </div>
            @else
                <p class="text-center text-muted">
                    No hay periodo activo
                </p>
            @endif
            <form method="POST"
                action="{{ route('periodo.store') }}"
                class="form-periodo"
                onsubmit="return confirmarPeriodo();">
                @csrf

                <div class="form-group">
                    <label>Periodo</label>
                    <input
                        type="number"
                        name="PERIODO"
                        class="form-control"
                        placeholder="Ej. 202603"
                        required
                    >
                </div>

                <div class="form-group">
                    <label>Descripción</label>
                    <input
                        type="text"
                        name="DESCRIPCION"
                        class="form-control"
                        placeholder="Ej. Marzo - Junio 2026"
                        required
                    >
                </div>

                <br>

                <button type="submit" class="btn-guardar">
                    Registrar periodo
                </button>
            </form>
        </section>
        
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
    <script src="{{ asset('js/periodo.js') }}"></script>
    <script src="{{ asset('js/index.js') }}"></script>
</body>
</html>