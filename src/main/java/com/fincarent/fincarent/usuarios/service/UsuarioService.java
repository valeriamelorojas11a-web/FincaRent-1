package com.fincarent.fincarent.usuarios.service;

import com.fincarent.fincarent.usuarios.model.TipoUsuario;
import com.fincarent.fincarent.usuarios.model.Usuario;
import com.fincarent.fincarent.usuarios.repository.UsuarioRepository;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public class UsuarioService {

    private final UsuarioRepository usuarioRepository;

    public UsuarioService(UsuarioRepository usuarioRepository) {
        this.usuarioRepository = usuarioRepository;
    }

    public List<Usuario> listarUsuarios(TipoUsuario tipo) {
        if (tipo != null) {
            return usuarioRepository.findByTipo(tipo);
        }
        return usuarioRepository.findAll();
    }

    public Usuario obtenerPorId(Long id) {
        return usuarioRepository.findById(id)
                .orElseThrow(() -> new IllegalArgumentException("Usuario no encontrado con id: " + id));
    }

    public Usuario crearUsuario(Usuario usuario) {
        if (usuario.getTipo() == null) {
            usuario.setTipo(TipoUsuario.CLIENTE);
        }
        return usuarioRepository.save(usuario);
    }

    public Usuario actualizarUsuario(Long id, Usuario datosActualizados, TipoUsuario rolSolicitante) {
        if (rolSolicitante != TipoUsuario.ADMINISTRADOR) {
            throw new IllegalArgumentException("Solo un ADMINISTRADOR puede actualizar un usuario");
        }

        Usuario existente = usuarioRepository.findById(id)
                .orElseThrow(() -> new IllegalArgumentException("Usuario no encontrado con id: " + id));

        existente.setNombre(datosActualizados.getNombre());
        existente.setEmail(datosActualizados.getEmail());

        if (datosActualizados.getContrasena() != null && !datosActualizados.getContrasena().isBlank()) {
            existente.setContrasena(datosActualizados.getContrasena());
        }

        if (datosActualizados.getTipo() != null) {
            existente.setTipo(datosActualizados.getTipo());
        }

        return usuarioRepository.save(existente);
    }

    public TipoUsuario obtenerRol(Long id) {
        Usuario usuario = usuarioRepository.findById(id)
                .orElseThrow(() -> new IllegalArgumentException("Usuario no encontrado con id: " + id));
        return usuario.getTipo();
    }

    public Usuario cambiarRol(Long id, TipoUsuario nuevoTipo, TipoUsuario rolSolicitante) {
        if (rolSolicitante != TipoUsuario.ADMINISTRADOR) {
            throw new IllegalArgumentException("Solo un ADMINISTRADOR puede cambiar el rol de un usuario");
        }
        if (nuevoTipo == null) {
            throw new IllegalArgumentException("El nuevo tipo de usuario es obligatorio");
        }
        Usuario usuario = usuarioRepository.findById(id)
                .orElseThrow(() -> new IllegalArgumentException("Usuario no encontrado con id: " + id));
        usuario.setTipo(nuevoTipo);
        return usuarioRepository.save(usuario);
    }

    public void eliminarUsuario(Long id, TipoUsuario rolSolicitante) {
        if (rolSolicitante != TipoUsuario.ADMINISTRADOR) {
            throw new IllegalArgumentException("Solo un ADMINISTRADOR puede eliminar un usuario");
        }
        Usuario existente = usuarioRepository.findById(id)
                .orElseThrow(() -> new IllegalArgumentException("Usuario no encontrado con id: " + id));
        usuarioRepository.delete(existente);
    }
}