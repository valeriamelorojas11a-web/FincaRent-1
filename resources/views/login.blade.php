<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - FincaRent</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <div id="loginPage">
        <div class="login-box">
            <h2 class="text-center mb-4">
                <i class="bi bi-house-heart-fill"></i>
                FincaRent
            </h2>

            <input type="text" id="usuario" class="form-control mb-3" placeholder="Usuario">
            <input type="password" id="password" class="form-control mb-3" placeholder="Contraseña">

 <a href="{{ url('/index') }}" class="btn btn-success w-100">
    Iniciar Sesión
</a>

            <p id="mensaje" class="text-danger mt-3 text-center"></p>
        </div>
    </div>



</body>
</html>