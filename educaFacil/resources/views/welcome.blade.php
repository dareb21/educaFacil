@extends('layouts.welcome')

@section('content')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EducaFácil - Aprende Gratis</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            text-align: center;
            background-color: #f4f4f4;
        }
        .header {
            background: linear-gradient(90deg, #0073e6, #00bfff);
            color: white;
            padding: 20px;
            font-size: 28px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .container {
            max-width: 900px;
            margin: auto;
            padding: 40px 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        .btn {
            display: inline-block;
            padding: 15px 30px;
            background: #0073e6;
            color: white;
            text-decoration: none;
            border-radius: 25px;
            font-weight: bold;
            transition: background 0.3s ease;
        }
        .btn:hover {
            background: #005bb5;
        }
        .footer {
            background: #333;
            color: white;
            padding: 15px;
            position: relative;
            width: 100%;
            font-size: 14px;
        }
        .section {
            padding: 40px 20px;
        }
        .course-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .course {
            background: white;
            padding: 20px;
            margin: 15px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            width: 250px;
            transition: transform 0.3s ease;
        }
        .course:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    
   
    
    <div class="container">
        <h1>Accede a cursos gratuitos de diversas categorías</h1>
        <p>Desarrolla nuevas habilidades con nuestros cursos en línea completamente gratis. Aprende a tu ritmo con contenido de calidad.</p>
        <a href="{{ route('courses') }}" class="btn">Explorar Cursos</a>
    </div>
    
    <div class="section">
        <h2>¿Por qué elegir EducaFácil?</h2>
        <ul>
            <li>✔ Cursos 100% gratuitos</li>
            <li>✔ Profesores expertos en cada materia</li>
            <li>✔ Accede desde cualquier dispositivo</li>
            <li>✔ Aprende a tu propio ritmo</li>
            <li>✔ Certificados de finalización</li>
        </ul>
    </div>
    
    <div class="section" id="cursos">
        <h2>Categorías de Cursos</h2>
        <div class="course-list">
            <div class="course">
                <h3>Programación</h3>
                <p>Aprende Python, JavaScript, HTML, CSS y más.</p>
            </div>
            <div class="course">
                <h3>Negocios</h3>
                <p>Marketing digital, administración, finanzas y liderazgo.</p>
            </div>
            <div class="course">
                <h3>Diseño</h3>
                <p>Edición de imágenes, diseño gráfico y UX/UI.</p>
            </div>
            <div class="course">
                <h3>Idiomas</h3>
                <p>Inglés, francés, alemán y otros idiomas populares.</p>
            </div>
        </div>
    </div>
    
    <div class="section">
        <h2>Testimonios de Estudiantes</h2>
        <p>"Gracias a EducaFácil, conseguí mi primer empleo en tecnología. ¡Los cursos son increíbles!" - Ana Pérez</p>
        <p>"Nunca pensé que podría aprender marketing digital gratis y con tanta calidad. ¡Recomendado!" - Juan López</p>
    </div>
    
    <div class="section">
        <h2>Únete a nuestra comunidad</h2>
        <p>Sé parte de miles de estudiantes que han mejorado sus habilidades con EducaFácil.</p>
        <a href="{{ route('register') }}" class="btn">Regístrate Gratis</a>
    </div>
    
    <div class="footer">© 2025 EducaFácil - Todos los derechos reservados</div>
</body>
</html>
@endsection