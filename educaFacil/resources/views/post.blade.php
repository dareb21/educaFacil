@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anuncios Importantes</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f1f6;
            color: #333;
            padding: 40px;
            line-height: 1.6;
        }

        .anuncios {
            background-color: #fff;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: 0 auto;
        }

        .anuncios h2 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #004085;
            text-align: center;
            font-weight: 700;
            text-transform: uppercase;
            border-bottom: 3px solid #004085;
            padding-bottom: 10px;
        }

        .anuncio {
            background-color: #fafafa;
            border-left: 6px solid #ff6347;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .anuncio:hover {
            background-color: #f1f1f1;
            transform: translateY(-5px);
        }

        .anuncio p {
            font-size: 18px;
            line-height: 1.6;
        }

        .anuncio strong {
            color: #d9534f;
            font-size: 18px;
        }

        .anuncio small {
            font-size: 14px;
            color: #777;
            display: block;
            margin-top: 10px;
        }

    </style>
</head>
<body>
    <section class="anuncios">
        <h2>Anuncios Importantes</h2>
        <div class="anuncio">
            <p><strong>¡Nuevo horario de atención!</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed luctus odio et dui lacinia, et tincidunt enim euismod. Praesent ullamcorper ligula eget felis vehicula tincidunt. Cras maximus purus eu orci auctor, ac luctus mi egestas.</p>
            <small>Publicado: 20 de febrero de 2025</small>
        </div>
        <div class="anuncio">
            <p><strong>Recordatorio importante:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus suscipit euismod malesuada. Vivamus bibendum, ipsum et faucibus sollicitudin, nunc erat gravida purus, sit amet varius nunc nisi et risus. Aenean lobortis velit ac ante convallis, nec egestas libero viverra.</p>
            <small>Publicado: 19 de febrero de 2025</small>
        </div>
        <div class="anuncio">
            <p><strong>Suspensión temporal del servicio:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ut mi sed lorem condimentum sollicitudin. Aliquam non magna ipsum. Vivamus vitae risus ut ante feugiat mollis a at eros. Nam non nulla vitae risus egestas viverra.</p>
            <small>Publicado: 18 de febrero de 2025</small>
        </div>
    </section>
</body>
</html>
@endsection