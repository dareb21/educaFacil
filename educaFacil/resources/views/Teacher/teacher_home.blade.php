<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido Maestro</title>
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 800px;
            text-align: center;
        }

        h2 {
            font-size: 26px;
            margin-bottom: 30px;
            color: #333;
        }

        .course-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
            align-items: flex-start;
        }

        .course-card {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            width: 100%;
            box-sizing: border-box;
            transition: background-color 0.3s, transform 0.3s;
        }

        .course-card:hover {
            background-color: #e8e8e8;
            transform: translateY(-5px);
        }

        .course-card .course-title {
            font-size: 20px;
            color: #333;
            margin-bottom: 10px;
        }

        .course-card .course-info {
            font-size: 14px;
            color: #555;
        }

        .course-card .course-info span {
            font-weight: bold;
            color: #333;
        }

        .footer {
            margin-top: 30px;
            font-size: 14px;
            color: #777;
        }

        .footer a {
            color: #5e72e4;
            text-decoration: none;
            font-weight: bold;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Bienvenido Maestro</h2>
        <div class="course-list">
            <!-- Curso 1 -->
            <div class="course-card">
                <div class="course-title">Matemáticas Avanzadas</div>
                <div class="course-info">
                    <span>Duración:</span> 4 meses<br>
                    <span>Estudiantes inscritos:</span> 25<br>
                    <span>Horario:</span> Lunes y Miércoles, 10:00 - 12:00
                </div>
            </div>

            <!-- Curso 2 -->
            <div class="course-card">
                <div class="course-title">Física para Principiantes</div>
                <div class="course-info">
                    <span>Duración:</span> 6 meses<br>
                    <span>Estudiantes inscritos:</span> 30<br>
                    <span>Horario:</span> Martes y Jueves, 14:00 - 16:00
                </div>
            </div>

            <!-- Curso 3 -->
            <div class="course-card">
                <div class="course-title">Programación Básica</div>
                <div class="course-info">
                    <span>Duración:</span> 3 meses<br>
                    <span>Estudiantes inscritos:</span> 15<br>
                    <span>Horario:</span> Viernes, 09:00 - 11:00
                </div>
            </div>

            <!-- Curso 4 -->
            <div class="course-card">
                <div class="course-title">Química General</div>
                <div class="course-info">
                    <span>Duración:</span> 5 meses<br>
                    <span>Estudiantes inscritos:</span> 28<br>
                    <span>Horario:</span> Lunes y Miércoles, 16:00 - 18:00
                </div>
            </div>

            <!-- Curso 5 -->
            <div class="course-card">
                <div class="course-title">Historia Universal</div>
                <div class="course-info">
                    <span>Duración:</span> 4 meses<br>
                    <span>Estudiantes inscritos:</span> 22<br>
                    <span>Horario:</span> Jueves, 10:00 - 12:00
                </div>
            </div>
        </div>

        <div class="footer">
            <p>¿Necesitas ayuda? <a href="#">Contáctanos</a></p>
        </div>
    </div>

</body>
</html>
