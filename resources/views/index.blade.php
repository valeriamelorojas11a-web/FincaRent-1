@extends('layouts.app')

@section('title', 'FincaRent - Inicio')

@section('content')

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/index">
            <i class="bi bi-house-heart-fill"></i>
            FincaRent
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menuNavbar">
            <ul class="navbar-nav ms-4">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#sobre">Sobre Nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#servicios">Servicios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#contacto">Contacto</a>
                </li>
            </ul>

            <div class="ms-auto">
                <button class="btn btn-light" onclick="cerrarSesion()">
                    Cerrar sesión
                </button>
            </div>
        </div>
    </div>
</nav>

<!-- HERO -->
<section class="hero">
    <div class="container text-center">
        <h1>La mejor página de fincas</h1>
        <p>Selecciona tu finca preferida</p>
        <a href="#fincas" class="btn btn-success btn-lg">
    Reserva ahora
</a>
    </div>
</section>

<!-- SOBRE NOSOTROS -->
<section id="sobre" class="container py-5">
    <h2 class="text-center mb-4">Sobre Nosotros</h2>
    <p class="text-center">
        En FincaRent conectamos personas con las mejores fincas para descansar,
        celebrar eventos y disfrutar momentos inolvidables. Nuestro objetivo es
        hacer que reservar una finca sea rápido, seguro y sencillo.
    </p>
</section>

<!-- SERVICIOS -->
<section id="servicios" class="container py-5">
    <h2 class="text-center mb-4">Nuestros Servicios</h2>
    <div class="row">
        <div class="col-md-4 text-center">
            <i class="bi bi-house-check-fill display-4 text-success"></i>
            <h4>Reservas</h4>
            <p>Reserva fincas en pocos minutos.</p>
        </div>
        <div class="col-md-4 text-center">
            <i class="bi bi-shield-check display-4 text-success"></i>
            <h4>Seguridad</h4>
            <p>Propiedades verificadas.</p>
        </div>
        <div class="col-md-4 text-center">
            <i class="bi bi-headset display-4 text-success"></i>
            <h4>Soporte</h4>
            <p>Atención 24/7.</p>
        </div>
    </div>
</section>

<!-- CONTACTO -->
<section id="contacto" class="container py-5">
    <h2 class="text-center mb-4">Contáctanos</h2>
    <form>
        <div class="mb-3">
            <input type="text" class="form-control" placeholder="Nombre">
        </div>
        <div class="mb-3">
            <input type="email" class="form-control" placeholder="Correo">
        </div>
        <div class="mb-3">
            <textarea class="form-control" rows="5" placeholder="Escribe tu mensaje"></textarea>
        </div>
        <button type="button" class="btn btn-success">Enviar</button>
    </form>
</section>

<!-- FINCAS -->
<section id="fincas" class="container mt-5 mb-5">
    <h2 class="text-center mb-4">Fincas Disponibles</h2>

    <!-- FILTROS -->
    <div class="row mb-4">
        <div class="col-md-4 mb-2">
            <input type="text" id="buscador" class="form-control" placeholder="Buscar finca...">
        </div>
        <div class="col-md-4 mb-2">
            <select id="filtroPrecio" class="form-select">
                <option value="">Filtrar por precio</option>
                <option value="300000">$300.000</option>
                <option value="500000">$500.000</option>
                <option value="800000">$800.000</option>
            </select>
        </div>
        <div class="col-md-4 mb-2">
            <button class="btn btn-success w-100" onclick="filtrarFincas()">Filtrar</button>
        </div>
    </div>

    <!-- TARJETAS -->
    <div class="row g-4">
        <!-- FINCA 1 -->
        <div class="col-md-4 finca" data-precio="300000">
            <div class="card shadow">
                <img src="https://images.unsplash.com/photo-1568605114967-8130f3a36994" class="card-img-top">
                <div class="card-body">
                    <h4>Finca Campestre</h4>
                    <p>Piscina, wifi y zonas verdes.</p>
                    <h5>$300.000</h5>
                    <button class="btn btn-success w-100"
        onclick="reservarFinca('Finca Campestre', 300000)">
    Reservar
</button>
                </div>
            </div>
        </div>

        <!-- FINCA 2 -->
        <div class="col-md-4 finca" data-precio="500000">
            <div class="card shadow">
                <img src="https://images.unsplash.com/photo-1570129477492-45c003edd2be" class="card-img-top">
                <div class="card-body">
                    <h4>Finca Premium</h4>
                    <p>Jacuzzi y vista panorámica.</p>
                    <h5>$500.000</h5>
                   <button class="btn btn-success w-100"
        onclick="reservarFinca('Finca Premium', 500000)">
    Reservar
</button>
                </div>
            </div>
        </div>

        <!-- FINCA 3 -->
        <div class="col-md-4 finca" data-precio="800000">
            <div class="card shadow">
                <img src="https://images.unsplash.com/photo-1600585154526-990dced4db0d" class="card-img-top">
                <div class="card-body">
                    <h4>Finca Luxury</h4>
                    <p>Cancha privada y piscina gigante.</p>
                    <h5>$800.000</h5>
                    <button class="btn btn-success w-100"
        onclick="reservarFinca('Finca Luxury', 800000)">
    Reservar
</button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal Reserva Exitosa -->
<!-- MODAL DE RESERVA -->
<div class="modal fade" id="modalReserva" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">Datos de la reserva</h5>

                <button type="button"
                        class="btn-close btn-close-white"
                        data-bs-dismiss="modal">
                </button>
            </div>

            <form method="POST" action="{{ route('reservas.store') }}">

                @csrf

                <div class="modal-body">

                    <!-- Finca seleccionada -->
                    <input type="hidden"
                           id="fincaReserva"
                           name="finca">

                    <input type="hidden"
                           id="precioReserva"
                           name="precio">

                    <div class="mb-3">
                        <label class="form-label">Nombre completo</label>
                        <input type="text"
                               id="nombreReserva"
                               name="nombre"
                               class="form-control"
                               placeholder="Ingresa tu nombre"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Correo electrónico</label>
                        <input type="email"
                               id="correoReserva"
                               name="correo"
                               class="form-control"
                               placeholder="ejemplo@correo.com"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Teléfono</label>
                        <input type="text"
                               id="telefonoReserva"
                               name="telefono"
                               class="form-control"
                               placeholder="Ingresa tu teléfono"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Fecha de entrada</label>
                        <input type="date"
                               id="fechaEntrada"
                               name="fecha_entrada"
                               class="form-control"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Fecha de salida</label>
                        <input type="date"
                               id="fechaSalida"
                               name="fecha_salida"
                               class="form-control"
                               required>
                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal">
                        Cancelar
                    </button>

                    <button type="submit"
                            class="btn btn-success">
                        Confirmar reserva
                    </button>

                </div>

            </form>

        </div>
    </div>
</div>

<!-- MODAL RESERVA EXITOSA -->
<div class="modal fade" id="modalExito" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">
                    Reserva confirmada
                </h5>

                <button type="button"
                        class="btn-close btn-close-white"
                        data-bs-dismiss="modal">
                </button>
            </div>

            <div class="modal-body text-center py-4">

                <i class="bi bi-check-circle-fill text-success"
                   style="font-size: 70px;"></i>

                <h4 class="mt-3">
                    ¡Reserva realizada exitosamente!
                </h4>

                <p class="text-muted">
                    Gracias por elegir <strong>FincaRent</strong>.
                </p>

            </div>

            <div class="modal-footer">
                <button type="button"
                        class="btn btn-success"
                        data-bs-dismiss="modal">
                    Aceptar
                </button>
            </div>

        </div>
    </div>
</div>

@endsection

@if(session('reserva_ok'))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modalExito = new bootstrap.Modal(
            document.getElementById('modalExito')
        );

        modalExito.show();
    });
</script>
@endif

<script>
    function cerrarSesion() {
        window.location.href = "/login";
    }

    function filtrarFincas() {

        const buscador = document.getElementById("buscador").value.toLowerCase();
        const precio = document.getElementById("filtroPrecio").value;

        const fincas = document.querySelectorAll(".finca");

        fincas.forEach(function(finca) {

            const nombre = finca.querySelector("h4").textContent.toLowerCase();
            const precioFinca = finca.getAttribute("data-precio");

            const coincideNombre = nombre.includes(buscador);
            const coincidePrecio = precio === "" || precioFinca === precio;

            if (coincideNombre && coincidePrecio) {
                finca.style.display = "";
            } else {
                finca.style.display = "none";
            }

        });
    }

    function reservarFinca(nombreFinca, precioFinca) {

        // Guardar la finca seleccionada
        document.getElementById("fincaReserva").value = nombreFinca;
        document.getElementById("precioReserva").value = precioFinca;

        // Abrir formulario de reserva
        const modal = new bootstrap.Modal(
            document.getElementById("modalReserva")
        );

        modal.show();
    }
</script>