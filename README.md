# FincaRent

Plataforma web para la gestión y reserva de fincas campestres.

## Tecnologías utilizadas
- **Backend:** Java, Spring Boot (API REST), Spring Data JPA
- **Base de datos:** MySQL
- **Frontend:** HTML5, CSS3, Bootstrap 5, JavaScript (consumo con `fetch`)

## Funcionalidades principales
- **Gestión de Usuarios (`/api/usuarios`):** registro, consulta, actualización, eliminación y control de roles (`ADMINISTRADOR`, `PROPIETARIO`, `CLIENTE`).
- **Gestión de Reservas (`/api/reservas`):** creación de reservas desde el catálogo, validación de fechas, listado, edición, eliminación y cambio de estado (`Confirmada` / `Cancelada`) en el panel administrativo.
- **Control de acceso por rol:** validación de permisos en la capa de servicio mediante la cabecera `X-Rol`.
