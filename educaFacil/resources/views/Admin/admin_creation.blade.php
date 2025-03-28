<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Administrador</title>
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

        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }

        h2 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            font-size: 14px;
            color: #333;
            margin-bottom: 8px;
            display: block;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: #5e72e4;
            outline: none;
        }

        button.submit-btn {
            width: 100%;
            padding: 12px;
            background-color: #5e72e4;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button.submit-btn:hover {
            background-color: #4e60d0;
        }

        button.submit-btn:active {
            background-color: #3e50a1;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Registro de Administrador</h2>
        <form action="{{ route('createAdmin') }}" method="POST">
        @csrf
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" required placeholder="Introduce tu nombre">
            </div>

            <div class="form-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required placeholder="Introduce tu correo">
            </div>

            <div class="form-group">
                <label for="phone">Teléfono:</label>
                <input type="tel" id="phone" name="phone" required placeholder="Introduce tu teléfono">
            </div>

            <div class="form-group">
                <label for="gender">Género:</label>
                <select id="gender" name="gender" required>
                    <option value="">Selecciona tu género</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                </select>
            </div>

            <div class="form-group">
                <label for="subrol">Subrol:</label>
                <input type="text" id="subrol" name="subrol" required placeholder="">
            </div>


            <div class="form-group">
                <label for="birthday">Fecha de Nacimiento:</label>
                <input type="date" id="birthday" name="birthday" required>
            </div>

            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required placeholder="Introduce tu contraseña">
            </div>

            <button type="submit" class="submit-btn">Registrar</button>
        </form>
    </div>

</body>
</html>
@if(session('mensaje'))
    <script>
        Swal.fire({
            title: "Exito",
            text: "{{ session('mensaje') }}",
            icon: "success"
        });
    </script>
@endif

@if(session('Error'))
    <script>
        Swal.fire({
            title: "Error",
            text: "{{ session('Error') }}",
            icon: "error"
        });
    </script>
@endif