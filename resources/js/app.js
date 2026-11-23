// INICIAR SESIÓN
function iniciarSesion() {
    let user = document.getElementById("usuario").value;
    let pass = document.getElementById("password").value;
    let mensaje = document.getElementById("mensaje");

    if (user === "admin" && pass === "1234") {
        localStorage.setItem("sesion", "activa");
        window.location.href = "/index"; 
    } else {
        mensaje.textContent = "Usuario o contraseña incorrectos";
    }
}
// CERRAR SESIÓN
function cerrarSesion() {
    localStorage.removeItem("sesion");
    window.location.href = "/login"; 
}

// VERIFICACIÓN DE SESIÓN EN RUTAS PROTEGIDAS
if (window.location.pathname.includes("/index") || window.location.pathname.includes("/dashboard")) {
    let sesion = localStorage.getItem("sesion");

    if (sesion !== "activa") {
        window.location.href = "/login";
    }
}

// FILTRAR FINCAS
function filtrarFincas() {
    let buscador = document.getElementById("buscador").value.toLowerCase();
    let filtroPrecio = document.getElementById("filtroPrecio").value;
    let fincas = document.querySelectorAll(".finca");

    fincas.forEach(finca => {
        let titulo = finca.querySelector("h4").textContent.toLowerCase();
        let precio = finca.getAttribute("data-precio");

        let coincideNombre = titulo.includes(buscador);
        let coincidePrecio = (filtroPrecio === "" || precio === filtroPrecio);

        if (coincideNombre && coincidePrecio) {
            finca.style.display = "block";
        } else {
            finca.style.display = "none";
        }
    });
}

// RESERVAR FINCA
function reservarFinca() {
    let modalElement = document.getElementById("modalReserva");
    if (modalElement) {
        let modal = new bootstrap.Modal(modalElement);
        modal.show();
    }
}