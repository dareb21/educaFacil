@extends('layouts.app')

@section('content')


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Gracias por tu donación</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(to right, #d3ccff, #f2f6ff);
      color: #333;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    

    h1 {
      color: #3f51b5;
    }

    p {
      font-size: 1.1rem;
      margin-bottom: 1.5rem;
    }

    .donation-options button {
      background-color: #3f51b5;
      color: white;
      border: none;
      padding: 10px 20px;
      margin: 5px;
      border-radius: 10px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .donation-options button:hover {
      background-color: #5c6bc0;
    }

    .custom-donation {
      margin-top: 1rem;
    }

    .custom-donation input {
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 10px;
      width: 100%;
      margin-bottom: 10px;
    }

    .custom-donation button {
      background-color: #7e57c2;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 10px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .custom-donation button:hover {
      background-color: #9575cd;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>¡Gracias!</h1>
    <p>El equipo de <strong>Educafacil</strong> agradece de corazón su colaboración.</p>
   
    <div class="donation-options">
    <form action="{{ route('donation') }}" method="POST">
    @csrf
      <input type="hidden" name="monto" value="1">
      <button type="submit">Donar $1</button>
    </form>

    <form action="{{ route('donation') }}" method="POST">
    @csrf
      <input type="hidden" name="monto" value="5">
      <button type="submit">Donar $5</button>
    </form>

    <form action="{{ route('donation') }}" method="POST">
    @csrf
      <input type="hidden" name="monto" value="10">
      <button type="submit">Donar $10</button>
    </form>
  </div>

  <div class="custom-donation">

    <form action="{{ route('donation') }}" method="POST">
    @csrf
      <input type="number" name="monto" placeholder="Otra cantidad (USD)" min="1" required />
      <button type="submit">Donar</button>
    </form>
  </div>
  
</body>
</html>
@endsection