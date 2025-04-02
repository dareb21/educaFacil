<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'EducaFácil - Aprende Gratis')</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        /* Estilos Globales */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f4f8;
            color: #333;
        }

        /* Encabezado */
        .header {
            background: #0073e6;
            color: white;
            padding: 20px;
            font-size: 30px;
            text-transform: uppercase;
            letter-spacing: 3px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .header nav {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-top: 15px;
        }

        .header a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            font-size: 18px;
            transition: color 0.3s ease;
        }

        .header a:hover {
            color: #ff9800;
        }

        /* Contenedor Principal */
        .container {
            max-width: 900px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .btn {
            display: inline-block;
            padding: 15px 30px;
            background: #0073e6;
            color: white;
            text-decoration: none;
            border-radius: 25px;
            font-weight: bold;
            text-align: center;
            transition: background 0.3s ease;
            margin-top: 20px;
        }

        .btn:hover {
            background: #005bb5;
        }

        /* Pie de Página */
        .footer {
            background: #333;
            color: white;
            padding: 15px;
            font-size: 14px;
            text-align: center;
            margin-top: 40px;
        }

        /* Sección de Cursos */
        .section {
            padding: 40px 20px;
        }

        .course-list {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .course {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            width: 250px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .course:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        /* Responsividad */
        @media (max-width: 768px) {
            .header nav {
                flex-direction: column;
                gap: 15px;
            }

            .course-list {
                flex-direction: column;
                gap: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        EducaFácil - Aprende de manera sencilla y gratuita
        <nav>
            @guest
                @if (Route::has('login'))
                    <a href="{{ route('login') }}">Iniciar sesión</a>
                @endif
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Registrarse</a>
                @endif
            @else
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar sesión</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endguest
        </nav>
    </div>
    
    @yield('content')

    <div class="footer">
        © 2025 EducaFácil - Todos los derechos reservados
    </div>
</body>
</html>
