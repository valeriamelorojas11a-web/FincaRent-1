function iniciarSesion(){

let usuario = document.getElementById("usuario").value;
let password = document.getElementById("password").value;

if(usuario === "admin" && password === "1234"){

localStorage.setItem("sesion", "activa");

window.location.href = "index.html";

}else{

document.getElementById("mensaje").innerHTML =
"Usuario o contraseña incorrectos";

}

}

/* VERIFICAR SESION */

    if(
    window.location.pathname.includes("index.html") 
){

    let sesion = localStorage.getItem("sesion");

    if(sesion !== "activa"){
        window.location.href = "login.html";
    }

}

/* CERRAR SESION */

function cerrarSesion(){

localStorage.removeItem("sesion");

window.location.href = "login.html";

}

/* FILTRO */

function filtrarFincas(){

let texto =
document.getElementById("buscador").value.toLowerCase();

let precio =
document.getElementById("filtroPrecio").value;

let fincas =
document.querySelectorAll(".finca");

fincas.forEach(function(finca){

let nombre =
finca.innerText.toLowerCase();

let precioFinca =
finca.getAttribute("data-precio");

let coincideTexto =
nombre.includes(texto); 

let coincidePrecio =
precio === "" || precioFinca === precio;

if(coincideTexto && coincidePrecio){

finca.style.display = "block";

}else{

finca.style.display = "none";

}

});

}

/* RESERVAR FINCA */

function reservarFinca(){

let modal = new bootstrap.Modal(
document.getElementById("modalReserva")
);

modal.show();

}