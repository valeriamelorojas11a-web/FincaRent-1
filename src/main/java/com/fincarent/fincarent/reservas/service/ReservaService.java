package com.fincarent.fincarent.reservas.service;

import com.fincarent.fincarent.reservas.entity.Reserva;
import com.fincarent.fincarent.reservas.repository.ReservaRepository;
import com.fincarent.fincarent.usuarios.model.TipoUsuario;
import org.springframework.stereotype.Service;

import java.time.LocalDate;
import java.util.List;

@Service
public class ReservaService {

    private final ReservaRepository reservaRepository;

    public ReservaService(ReservaRepository reservaRepository) {
        this.reservaRepository = reservaRepository;
    }

    public List<Reserva> listarReservas(TipoUsuario rolSolicitante) {
        if (rolSolicitante != TipoUsuario.ADMINISTRADOR && rolSolicitante != TipoUsuario.PROPIETARIO) {
            throw new IllegalArgumentException("Solo un ADMINISTRADOR o PROPIETARIO puede listar todas las reservas");
        }
        return reservaRepository.findAll();
    }

    public Reserva obtenerPorId(Long id, TipoUsuario rolSolicitante) {
        if (rolSolicitante != TipoUsuario.ADMINISTRADOR && rolSolicitante != TipoUsuario.PROPIETARIO) {
            throw new IllegalArgumentException("Solo un ADMINISTRADOR o PROPIETARIO puede consultar una reserva por ID");
        }
        return reservaRepository.findById(id)
                .orElseThrow(() -> new IllegalArgumentException("Reserva no encontrada con id: " + id));
    }

    public Reserva crearReserva(Reserva reserva, TipoUsuario rolSolicitante) {
        TipoUsuario rolEfectivo = (rolSolicitante != null) ? rolSolicitante : TipoUsuario.CLIENTE;
        if (rolEfectivo != TipoUsuario.CLIENTE && rolEfectivo != TipoUsuario.ADMINISTRADOR) {
            throw new IllegalArgumentException("Solo un CLIENTE o ADMINISTRADOR puede crear una reserva");
        }

        validarFechas(reserva.getFechaEntrada(), reserva.getFechaSalida());

        if (reserva.getEstado() == null || reserva.getEstado().isBlank()) {
            reserva.setEstado("Confirmada");
        }

        return reservaRepository.save(reserva);
    }

    public Reserva actualizarReserva(Long id, Reserva datosActualizados, TipoUsuario rolSolicitante) {
        if (rolSolicitante != TipoUsuario.ADMINISTRADOR && rolSolicitante != TipoUsuario.PROPIETARIO) {
            throw new IllegalArgumentException("Solo un ADMINISTRADOR o PROPIETARIO puede actualizar una reserva");
        }

        Reserva existente = reservaRepository.findById(id)
                .orElseThrow(() -> new IllegalArgumentException("Reserva no encontrada con id: " + id));

        LocalDate entrada = (datosActualizados.getFechaEntrada() != null)
                ? datosActualizados.getFechaEntrada()
                : existente.getFechaEntrada();
        LocalDate salida = (datosActualizados.getFechaSalida() != null)
                ? datosActualizados.getFechaSalida()
                : existente.getFechaSalida();

        validarFechas(entrada, salida);

        existente.setNombre(datosActualizados.getNombre());
        existente.setCorreo(datosActualizados.getCorreo());
        existente.setTelefono(datosActualizados.getTelefono());
        existente.setFinca(datosActualizados.getFinca());
        existente.setPrecio(datosActualizados.getPrecio());
        existente.setFechaEntrada(entrada);
        existente.setFechaSalida(salida);

        if (datosActualizados.getEstado() != null && !datosActualizados.getEstado().isBlank()) {
            existente.setEstado(datosActualizados.getEstado().trim());
        }

        return reservaRepository.save(existente);
    }

    public Reserva actualizarEstado(Long id, String nuevoEstado, TipoUsuario rolSolicitante) {
        if (rolSolicitante != TipoUsuario.ADMINISTRADOR && rolSolicitante != TipoUsuario.PROPIETARIO) {
            throw new IllegalArgumentException("Solo un ADMINISTRADOR o PROPIETARIO puede cambiar el estado de una reserva");
        }
        if (nuevoEstado == null || nuevoEstado.isBlank()) {
            throw new IllegalArgumentException("El nuevo estado es obligatorio");
        }
        Reserva reserva = reservaRepository.findById(id)
                .orElseThrow(() -> new IllegalArgumentException("Reserva no encontrada con id: " + id));
        reserva.setEstado(nuevoEstado.trim());
        return reservaRepository.save(reserva);
    }

    public void eliminarReserva(Long id, TipoUsuario rolSolicitante) {
        if (rolSolicitante != TipoUsuario.ADMINISTRADOR) {
            throw new IllegalArgumentException("Solo un ADMINISTRADOR puede eliminar una reserva");
        }
        Reserva existente = reservaRepository.findById(id)
                .orElseThrow(() -> new IllegalArgumentException("Reserva no encontrada con id: " + id));
        reservaRepository.delete(existente);
    }

    private void validarFechas(LocalDate fechaEntrada, LocalDate fechaSalida) {
        if (fechaEntrada != null && fechaSalida != null && !fechaSalida.isAfter(fechaEntrada)) {
            throw new IllegalArgumentException("La fecha de salida debe ser posterior a la fecha de entrada");
        }
    }
}