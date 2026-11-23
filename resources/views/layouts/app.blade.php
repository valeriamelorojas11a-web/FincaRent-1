<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'FincaRent')</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- CSS Personalizado -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <!-- Contenido dinámico inyectado desde las vistas -->
    @yield('content')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Script -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Script Modo Oscuro -->
    <script>
        function aplicarTema(esOscuro) {
            document.body.classList.toggle('dark-mode', esOscuro);
            localStorage.setItem('fincarent_dark_mode', esOscuro ? '1' : '0');

            const icono = document.getElementById('iconoTema');
            const texto = document.getElementById('textoTema');
            if (icono && texto) {
                icono.className = esOscuro ? 'bi bi-sun-fill' : 'bi bi-moon-stars-fill';
                texto.textContent = esOscuro ? 'Modo claro' : 'Modo oscuro';
            }
        }

        function toggleDarkMode() {
            const esOscuroActual = document.body.classList.contains('dark-mode');
            aplicarTema(!esOscuroActual);
        }

        document.addEventListener('DOMContentLoaded', function () {
            const guardado = localStorage.getItem('fincarent_dark_mode') === '1';
            aplicarTema(guardado);
        });
    </script>
</body>
</html>