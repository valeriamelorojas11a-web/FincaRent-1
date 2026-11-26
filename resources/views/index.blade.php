@extends('layouts.app')

@section('title', 'FincaRent - Inicio')

@section('content')

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg sticky-top">
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
                    <a class="nav-link" href="#">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#sobre">Sobre Nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#servicios">Servicios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#fincas">Catálogo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contacto">Contacto</a>
                </li>
            </ul>

            <div class="ms-auto d-flex align-items-center gap-2 mt-2 mt-lg-0">
                <button type="button" class="btn-theme-toggle" onclick="toggleDarkMode()">
                    <i id="iconoTema" class="bi bi-moon-stars-fill"></i>
                    <span id="textoTema">Modo oscuro</span>
                </button>

                <button type="button" class="btn btn-outline-success" onclick="cerrarSesion()">
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
        <p>Descubre fincas campestres, casas de descanso y espacios ideales para desconectarte con toda comodidad.</p>
        <a href="#fincas" class="btn btn-success btn-lg px-4">
            Explorar catálogo
        </a>
    </div>
</section>

<!-- SOBRE NOSOTROS -->
<section id="sobre" class="container py-5">
    <h2 class="text-center mb-3">Sobre Nosotros</h2>
    <p class="text-center text-muted mx-auto" style="max-width: 720px;">
        En FincaRent conectamos personas con las mejores fincas para descansar,
        celebrar eventos y disfrutar momentos inolvidables. Nuestro objetivo es
        hacer que reservar una finca sea rápido, seguro y sencillo.
    </p>
</section>

<!-- SERVICIOS -->
<section id="servicios" class="container py-4">
    <h2 class="text-center mb-4">Nuestros Servicios</h2>
    <div class="row g-4">
        <div class="col-md-4 text-center">
            <div class="card p-4 h-100">
                <i class="bi bi-house-check-fill display-4 text-success mb-2"></i>
                <h4>Reservas</h4>
                <p class="text-muted mb-0">Reserva fincas en pocos minutos con confirmación inmediata.</p>
            </div>
        </div>
        <div class="col-md-4 text-center">
            <div class="card p-4 h-100">
                <i class="bi bi-shield-check display-4 text-success mb-2"></i>
                <h4>Seguridad</h4>
                <p class="text-muted mb-0">Propiedades verificadas y protocolos confiables para tu estadía.</p>
            </div>
        </div>
        <div class="col-md-4 text-center">
            <div class="card p-4 h-100">
                <i class="bi bi-headset display-4 text-success mb-2"></i>
                <h4>Soporte</h4>
                <p class="text-muted mb-0">Atención 24/7 para acompañarte antes y durante tu viaje.</p>
            </div>
        </div>
    </div>
</section>

<!-- CATÁLOGO DE FINCAS -->
<section id="fincas" class="container mt-5 mb-5">
    <h2 class="text-center mb-4">Catálogo de Fincas Disponibles</h2>

    <!-- FILTROS -->
    <div class="row g-2 mb-4">
        <div class="col-md-4">
            <input type="text" id="buscador" class="form-control" placeholder="Buscar finca o característica..." oninput="filtrarFincas()">
        </div>
        <div class="col-md-3">
            <select id="filtroPrecio" class="form-select" onchange="filtrarFincas()">
                <option value="">Todos los precios</option>
                <option value="300000">$300.000</option>
                <option value="500000">$500.000</option>
                <option value="800000">$800.000</option>
            </select>
        </div>
        <div class="col-md-3">
            <select id="filtroCategoria" class="form-select" onchange="filtrarFincas()">
                <option value="">Todas las categorías</option>
                <option value="Campestre">Campestre</option>
                <option value="Premium">Premium</option>
                <option value="Luxury">Luxury</option>
            </select>
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-success w-100" onclick="filtrarFincas()">Filtrar</button>
        </div>
    </div>

    <!-- TARJETAS -->
    <div class="row g-4" id="listaFincas">
        <!-- 1 -->
        <div class="col-md-4 finca" data-precio="300000" data-categoria="Campestre">
            <div class="card h-100">
                <img src="https://images.unsplash.com/photo-1568605114967-8130f3a36994" class="card-img-top" alt="Finca Campestre">
                <div class="card-body d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-start gap-2 mb-1">
                        <h4 class="mb-0">Finca Campestre</h4>
                        <span class="badge bg-success-subtle text-success border border-success-subtle">Campestre</span>
                    </div>
                    <p class="text-muted small">Piscina, wifi y amplias zonas verdes ideales para descansar en familia.</p>
                    <div class="mb-3">
                        <span class="badge-servicio">Piscina</span>
                        <span class="badge-servicio">Wi-Fi</span>
                        <span class="badge-servicio">Zonas verdes</span>
                    </div>
                    <div class="mt-auto">
                        <div class="precio-tag">$300.000</div>
                        <button type="button" class="btn btn-success w-100" onclick="reservarFinca('Finca Campestre', 300000)">Reservar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- 2 -->
        <div class="col-md-4 finca" data-precio="500000" data-categoria="Premium">
            <div class="card h-100">
                <img src="https://images.unsplash.com/photo-1570129477492-45c003edd2be" class="card-img-top" alt="Finca Premium">
                <div class="card-body d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-start gap-2 mb-1">
                        <h4 class="mb-0">Finca Premium</h4>
                        <span class="badge bg-success-subtle text-success border border-success-subtle">Premium</span>
                    </div>
                    <p class="text-muted small">Jacuzzi climatizado, zona BBQ y vista panorámica a la montaña.</p>
                    <div class="mb-3">
                        <span class="badge-servicio">Jacuzzi</span>
                        <span class="badge-servicio">BBQ</span>
                        <span class="badge-servicio">Vista panorámica</span>
                    </div>
                    <div class="mt-auto">
                        <div class="precio-tag">$500.000</div>
                        <button type="button" class="btn btn-success w-100" onclick="reservarFinca('Finca Premium', 500000)">Reservar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3 -->
        <div class="col-md-4 finca" data-precio="800000" data-categoria="Luxury">
            <div class="card h-100">
                <img src="https://images.unsplash.com/photo-1600585154526-990dced4db0d" class="card-img-top" alt="Finca Luxury">
                <div class="card-body d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-start gap-2 mb-1">
                        <h4 class="mb-0">Finca Luxury</h4>
                        <span class="badge bg-success-subtle text-success border border-success-subtle">Luxury</span>
                    </div>
                    <p class="text-muted small">Cancha privada, piscina gigante y amplios espacios para eventos.</p>
                    <div class="mb-3">
                        <span class="badge-servicio">Cancha privada</span>
                        <span class="badge-servicio">Piscina</span>
                        <span class="badge-servicio">Eventos</span>
                    </div>
                    <div class="mt-auto">
                        <div class="precio-tag">$800.000</div>
                        <button type="button" class="btn btn-success w-100" onclick="reservarFinca('Finca Luxury', 800000)">Reservar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- 4 -->
        <div class="col-md-4 finca" data-precio="300000" data-categoria="Campestre">
            <div class="card h-100">
                <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750" class="card-img-top" alt="Villa El Mirador">
                <div class="card-body d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-start gap-2 mb-1">
                        <h4 class="mb-0">Villa El Mirador</h4>
                        <span class="badge bg-success-subtle text-success border border-success-subtle">Campestre</span>
                    </div>
                    <p class="text-muted small">Rodeada de árboles nativos, hamacas, fogata exterior y sendero ecológico.</p>
                    <div class="mb-3">
                        <span class="badge-servicio">Fogata</span>
                        <span class="badge-servicio">Hamacas</span>
                        <span class="badge-servicio">Naturaleza</span>
                    </div>
                    <div class="mt-auto">
                        <div class="precio-tag">$300.000</div>
                        <button type="button" class="btn btn-success w-100" onclick="reservarFinca('Villa El Mirador', 300000)">Reservar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- 5 -->
        <div class="col-md-4 finca" data-precio="500000" data-categoria="Premium">
            <div class="card h-100">
                <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9" class="card-img-top" alt="Hacienda La Esmeralda">
                <div class="card-body d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-start gap-2 mb-1">
                        <h4 class="mb-0">Hacienda La Esmeralda</h4>
                        <span class="badge bg-success-subtle text-success border border-success-subtle">Premium</span>
                    </div>
                    <p class="text-muted small">Arquitectura colonial, corredor amplio, cocina equipada y parqueadero.</p>
                    <div class="mb-3">
                        <span class="badge-servicio">Parqueadero</span>
                        <span class="badge-servicio">Cocina amplia</span>
                        <span class="badge-servicio">Descanso</span>
                    </div>
                    <div class="mt-auto">
                        <div class="precio-tag">$500.000</div>
                        <button type="button" class="btn btn-success w-100" onclick="reservarFinca('Hacienda La Esmeralda', 500000)">Reservar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- 6 -->
        <div class="col-md-4 finca" data-precio="800000" data-categoria="Luxury">
            <div class="card h-100">
                <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c" class="card-img-top" alt="Quinta Bosque Real">
                <div class="card-body d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-start gap-2 mb-1">
                        <h4 class="mb-0">Quinta Bosque Real</h4>
                        <span class="badge bg-success-subtle text-success border border-success-subtle">Luxury</span>
                    </div>
                    <p class="text-muted small">Terraza lounge, piscina infinita, sala de juegos y privacidad total.</p>
                    <div class="mb-3">
                        <span class="badge-servicio">Piscina infinita</span>
                        <span class="badge-servicio">Sala de juegos</span>
                        <span class="badge-servicio">Privada</span>
                    </div>
                    <div class="mt-auto">
                        <div class="precio-tag">$800.000</div>
                        <button type="button" class="btn btn-success w-100" onclick="reservarFinca('Quinta Bosque Real', 800000)">Reservar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- 7 -->
        <div class="col-md-4 finca" data-precio="300000" data-categoria="Campestre">
            <div class="card h-100">
                <img src="https://images.unsplash.com/photo-1580587771525-78b9dba3b914" class="card-img-top" alt="Finca Los Naranjos">
                <div class="card-body d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-start gap-2 mb-1">
                        <h4 class="mb-0">Finca Los Naranjos</h4>
                        <span class="badge bg-success-subtle text-success border border-success-subtle">Campestre</span>
                    </div>
                    <p class="text-muted small">Ambiente tranquilo con huerta frutal, kiosco y zona de descanso.</p>
                    <div class="mb-3">
                        <span class="badge-servicio">Kiosco</span>
                        <span class="badge-servicio">Tranquila</span>
                        <span class="badge-servicio">Familiar</span>
                    </div>
                    <div class="mt-auto">
                        <div class="precio-tag">$300.000</div>
                        <button type="button" class="btn btn-success w-100" onclick="reservarFinca('Finca Los Naranjos', 300000)">Reservar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- 8 -->
        <div class="col-md-4 finca" data-precio="500000" data-categoria="Premium">
            <div class="card h-100">
                <img src="https://images.unsplash.com/photo-1564013799919-ab600027ffc6" class="card-img-top" alt="Finca Vista del Valle">
                <div class="card-body d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-start gap-2 mb-1">
                        <h4 class="mb-0">Finca Vista del Valle</h4>
                        <span class="badge bg-success-subtle text-success border border-success-subtle">Premium</span>
                    </div>
                    <p class="text-muted small">Ideal para fines de semana con amigos, piscina iluminada y asador.</p>
                    <div class="mb-3">
                        <span class="badge-servicio">Asador</span>
                        <span class="badge-servicio">Piscina iluminada</span>
                        <span class="badge-servicio">Amigos</span>
                    </div>
                    <div class="mt-auto">
                        <div class="precio-tag">$500.000</div>
                        <button type="button" class="btn btn-success w-100" onclick="reservarFinca('Finca Vista del Valle', 500000)">Reservar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- 9 -->
        <div class="col-md-4 finca" data-precio="800000" data-categoria="Luxury">
            <div class="card h-100">
                <img src="https://images.unsplash.com/photo-1613490493576-7fde63acd811" class="card-img-top" alt="Reserva Paraíso Verde">
                <div class="card-body d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-start gap-2 mb-1">
                        <h4 class="mb-0">Reserva Paraíso Verde</h4>
                        <span class="badge bg-success-subtle text-success border border-success-subtle">Luxury</span>
                    </div>
                    <p class="text-muted small">Gran extensión de terreno, salón social, jacuzzi y vistas incomparables.</p>
                    <div class="mb-3">
                        <span class="badge-servicio">Salón social</span>
                        <span class="badge-servicio">Jacuzzi</span>
                        <span class="badge-servicio">Gran espacio</span>
                    </div>
                    <div class="mt-auto">
                        <div class="precio-tag">$800.000</div>
                        <button type="button" class="btn btn-success w-100" onclick="reservarFinca('Reserva Paraíso Verde', 800000)">Reservar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <p id="sinResultados" class="text-center text-muted mt-4 d-none">
        No se encontraron fincas con esos filtros.
    </p>
</section>

<!-- CONTACTO -->
<section id="contacto" class="container py-5">
    <div class="card p-4 p-md-5 mx-auto" style="max-width: 720px;">
        <h2 class="text-center mb-4">Contáctanos</h2>
        <form>
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Nombre">
            </div>
            <div class="mb-3">
                <input type="email" class="form-control" placeholder="Correo">
            </div>
            <div class="mb-3">
                <textarea class="form-control" rows="4" placeholder="Escribe tu mensaje"></textarea>
            </div>
            <button type="button" class="btn btn-success w-100">Enviar</button>
        </form>
    </div>
</section>

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
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

            <form method="POST" action="{{ route('reservas.store') }}">

                @csrf

                <div class="modal-body">

                    <input type="hidden" id="fincaReserva" name="finca">
                    <input type="hidden" id="precioReserva" name="precio">

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

<script>
    window.cerrarSesion = function () {
        window.location.href = "/login";
    };

    window.filtrarFincas = function () {
        const buscador = document.getElementById("buscador").value.toLowerCase().trim();
        const precio = document.getElementById("filtroPrecio").value;
        const categoria = document.getElementById("filtroCategoria").value;

        const fincas = document.querySelectorAll(".finca");
        let visibles = 0;

        fincas.forEach(function (finca) {
            const textoTarjeta = finca.textContent.toLowerCase();
            const precioFinca = finca.getAttribute("data-precio");
            const categoriaFinca = finca.getAttribute("data-categoria");

            const coincideTexto = buscador === "" || textoTarjeta.includes(buscador);
            const coincidePrecio = precio === "" || precioFinca === precio;
            const coincideCategoria = categoria === "" || categoriaFinca === categoria;

            if (coincideTexto && coincidePrecio && coincideCategoria) {
                finca.style.display = "";
                visibles++;
            } else {
                finca.style.display = "none";
            }
        });

        const sinResultados = document.getElementById("sinResultados");
        if (sinResultados) {
            sinResultados.classList.toggle("d-none", visibles > 0);
        }
    };

    window.reservarFinca = function (nombreFinca, precioFinca) {
        const inputFinca = document.getElementById("fincaReserva");
        const inputPrecio = document.getElementById("precioReserva");
        const modalEl = document.getElementById("modalReserva");

        if (inputFinca) inputFinca.value = nombreFinca;
        if (inputPrecio) inputPrecio.value = precioFinca;

        if (modalEl && typeof bootstrap !== "undefined") {
            const modal = bootstrap.Modal.getOrCreateInstance(modalEl);
            modal.show();
        }
    };
</script>

@if(session('reserva_ok'))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modalExitoEl = document.getElementById('modalExito');
        if (modalExitoEl && typeof bootstrap !== 'undefined') {
            const modalExito = bootstrap.Modal.getOrCreateInstance(modalExitoEl);
            modalExito.show();
        }
    });
</script>
@endif

@endsection