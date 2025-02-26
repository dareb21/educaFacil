<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área del Curso</title>
    <style>
        /* Reset de márgenes y padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Estilo general */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 20px;
        }

        /* Contenedor principal */
        .container {
            max-width: 900px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        /* Título */
        h1 {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #333;
        }

        /* Grid de tarjetas */
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            justify-content: center;
        }

        /* Tarjeta */
        .card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        /* Iconos */
        .card img {
            width: 80px;
            height: 80px;
            margin-bottom: 15px;
        }

        /* Títulos de cada bloque */
        .card h3 {
            font-size: 1.4rem;
            margin-bottom: 10px;
            color: #333;
        }

        /* Descripción */
        .card p {
            font-size: 1rem;
            color: #666;
            margin-bottom: 15px;
        }

        /* Botones */
        .btn {
            display: inline-block;
            background-color: #3498db;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 1rem;
            transition: background 0.3s;
        }

        .btn:hover {
            background-color: #2980b9;
        }

        /* Botón especial para WhatsApp */
        .btn.whatsapp {
            background-color: #25D366;
        }

        .btn.whatsapp:hover {
            background-color: #1da851;
        }
    </style>
</head>
<body>   
    <div class="container">
        <h1>Bienvenido al Curso</h1>
        
        <div class="grid">
            <!-- Clases -->
            <div class="card">
                <h3>Clases en Vivo</h3>
                <p>Únete a las sesiones en vivo del curso.</p>
                <a href="#" class="btn">Ingresar</a>
            </div>

            <!-- Asignaciones -->
            <div class="card">
               <h3>Asignaciones</h3>
                <p>Sube tus tareas y revisa tus calificaciones.</p>
                <a href="#" class="btn">Ver tareas</a>
            </div>

            <!-- Recursos -->
            <div class="card">
               <h3>Recursos</h3>
                <p>Accede al material didáctico del curso.</p>
                <a href="#" class="btn">Ver recursos</a>
            </div>

            <!-- Grupo de WhatsApp -->
            <div class="card">
                <h3>Grupo de WhatsApp</h3>
                <p>Únete al grupo para resolver dudas y estar informado.</p>
                <a href="https://chat.whatsapp.com/TU-LINK-AQUI" class="btn whatsapp">Unirme</a>
            </div>
        </div>
    </div>
</body>
</html>
