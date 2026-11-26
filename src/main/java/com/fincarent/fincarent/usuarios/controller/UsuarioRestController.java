package com.fincarent.fincarent.usuarios.controller;

import com.fincarent.fincarent.usuarios.model.TipoUsuario;
import com.fincarent.fincarent.usuarios.model.Usuario;
import com.fincarent.fincarent.usuarios.service.UsuarioService;
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
import java.util.Map;

@RestController
@RequestMapping("/api/usuarios")
public class UsuarioRestController {

    private final UsuarioService usuarioService;

    public UsuarioRestController(UsuarioService usuarioService) {
        this.usuarioService = usuarioService;
    }

    @GetMapping
    public List<Usuario> listar(@RequestParam(required = false) TipoUsuario tipo) {
        return usuarioService.listarUsuarios(tipo);
    }

    @GetMapping("/{id}")
    public ResponseEntity<Usuario> obtenerPorId(@PathVariable Long id) {
        return ResponseEntity.ok(usuarioService.obtenerPorId(id));
    }

    @PostMapping
    public ResponseEntity<Usuario> registrar(@Valid @RequestBody Usuario usuario) {
        Usuario creado = usuarioService.crearUsuario(usuario);
        return ResponseEntity.status(HttpStatus.CREATED).body(creado);
    }

    @PutMapping("/{id}")
    public ResponseEntity<Usuario> actualizar(
            @PathVariable Long id,
            @Valid @RequestBody Usuario usuario,
            @RequestHeader(value = "X-Rol", required = false) TipoUsuario rolSolicitante
    ) {
        Usuario actualizado = usuarioService.actualizarUsuario(id, usuario, rolSolicitante);
        return ResponseEntity.ok(actualizado);
    }

    @GetMapping("/{id}/rol")
    public ResponseEntity> consultarRol(@PathVariable Long id) {
        TipoUsuario rol = usuarioService.obtenerRol(id);
        return ResponseEntity.ok(Map.of(
                "id_usuario", id,
                "rol", rol
        ));
    }

    @PatchMapping("/{id}/rol")
    public ResponseEntity<Usuario> actualizarRol(
            @PathVariable Long id,
            @RequestParam TipoUsuario tipo,
            @RequestHeader(value = "X-Rol", required = false) TipoUsuario rolSolicitante
    ) {
        Usuario actualizado = usuarioService.cambiarRol(id, tipo, rolSolicitante);
        return ResponseEntity.ok(actualizado);
    }

    @DeleteMapping("/{id}")
    public ResponseEntity<Void> eliminar(
            @PathVariable Long id,
            @RequestHeader(value = "X-Rol", required = false) TipoUsuario rolSolicitante
    ) {
        usuarioService.eliminarUsuario(id, rolSolicitante);
        return ResponseEntity.noContent().build();
    }
}