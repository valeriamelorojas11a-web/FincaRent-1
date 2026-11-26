<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard - FincaRent</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-success">
    <div class="container-fluid">

        <span class="navbar-brand">
            <i class="bi bi-house-heart-fill"></i>
            Panel Administrativo FincaRent
        </span>

        <button class="btn btn-light" onclick="cerrarSesion()">
            Cerrar sesión
        </button>

    </div>
</nav>

<div class="container mt-4">

    <h2 class="mb-4">Registros</h2>

    <div class="row">

        <!-- FINCAS -->
        <div class="col-md-4 mb-3">

            <div class="card text-center shadow">

                <div class="card-body">

                    <i class="bi bi-house display-4 text-success"></i>

                    <h3>3</h3>

                    <p>Fincas Registradas</p>

                </div>

            </div>

        </div>


        <!-- RESERVAS -->
        <div class="col-md-4 mb-3">

            <div class="card text-center shadow">

                <div class="card-body">

                    <i class="bi bi-calendar-check display-4 text-primary"></i>

                    <h3>{{ $reservas->count() }}</h3>

                    <p>Reservas</p>

                </div>

            </div>

        </div>


        <!-- USUARIOS -->
        <div class="col-md-4 mb-3">

            <div class="card text-center shadow">

                <div class="card-body">

                    <i class="bi bi-people display-4 text-warning"></i>

                    <h3>5</h3>

                    <p>Usuarios</p>

                </div>

            </div>

        </div>

    </div>


    <!-- ÚLTIMAS RESERVAS -->

    <div class="card shadow mt-4">

        <div class="card-header bg-success text-white">

            Últimas Reservas

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-striped">

                    <thead>

                        <tr>

                            <th>Cliente</th>

                            <th>Finca</th>

                            <th>Fecha entrada</th>

                            <th>Fecha salida</th>

                            <th>Estado</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($reservas as $reserva)

                            <tr>

                                <td>
                                    {{ $reserva->nombre }}
                                </td>

                                <td>
                                    {{ $reserva->finca }}
                                </td>

                                <td>
                                    {{ $reserva->fecha_entrada->format('d/m/Y') }}
                                </td>

                                <td>
                                    {{ $reserva->fecha_salida->format('d/m/Y') }}
                                </td>

                                <td>

                                    <span class="badge bg-success">
                                        {{ $reserva->estado }}
                                    </span>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="5"
                                    class="text-center text-muted">

                                    No hay reservas registradas.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>


<script>

    function cerrarSesion() {

        window.location.href = "/login";

    }

</script>

</body>

</html>