package com.fincarent.fincarent.reservas.controller;

import com.fincarent.fincarent.reservas.entity.Reserva;
import com.fincarent.fincarent.reservas.service.ReservaService;
import com.fincarent.fincarent.usuarios.model.TipoUsuario;
import jakarta.validation.Valid;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PatchMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestHeader;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;

import java.util.List;

@RestController
@RequestMapping("/api/reservas")
public class ReservaRestController {

    private final ReservaService reservaService;

    public ReservaRestController(ReservaService reservaService) {
        this.reservaService = reservaService;
    }

    @GetMapping
    public ResponseEntity<List<Reserva>> listar(
            @RequestHeader(value = "X-Rol", required = false) TipoUsuario rolSolicitante
    ) {
        return ResponseEntity.ok(reservaService.listarReservas(rolSolicitante));
    }

    @GetMapping("/{id}")
    public ResponseEntity<Reserva> obtenerPorId(
            @PathVariable Long id,
            @RequestHeader(value = "X-Rol", required = false) TipoUsuario rolSolicitante
    ) {
        return ResponseEntity.ok(reservaService.obtenerPorId(id, rolSolicitante));
    }

    @PostMapping
    public ResponseEntity<Reserva> crear(
            @Valid @RequestBody Reserva reserva,
            @RequestHeader(value = "X-Rol", required = false) TipoUsuario rolSolicitante
    ) {
        Reserva creada = reservaService.crearReserva(reserva, rolSolicitante);
        return ResponseEntity.status(HttpStatus.CREATED).body(creada);
    }

    @PutMapping("/{id}")
    public ResponseEntity<Reserva> actualizar(
            @PathVariable Long id,
            @Valid @RequestBody Reserva reserva,
            @RequestHeader(value = "X-Rol", required = false) TipoUsuario rolSolicitante
    ) {
        Reserva actualizada = reservaService.actualizarReserva(id, reserva, rolSolicitante);
        return ResponseEntity.ok(actualizada);
    }

    @PatchMapping("/{id}/estado")
    public ResponseEntity<Reserva> actualizarEstado(
            @PathVariable Long id,
            @RequestParam String estado,
            @RequestHeader(value = "X-Rol", required = false) TipoUsuario rolSolicitante
    ) {
        Reserva actualizada = reservaService.actualizarEstado(id, estado, rolSolicitante);
        return ResponseEntity.ok(actualizada);
    }

    @DeleteMapping("/{id}")
    public ResponseEntity<Void> eliminar(
            @PathVariable Long id,
            @RequestHeader(value = "X-Rol", required = false) TipoUsuario rolSolicitante
    ) {
        reservaService.eliminarReserva(id, rolSolicitante);
        return ResponseEntity.noContent().build();
    }
}