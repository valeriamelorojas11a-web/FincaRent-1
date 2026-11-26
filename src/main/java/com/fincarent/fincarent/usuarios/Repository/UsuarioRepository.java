package com.fincarent.fincarent.usuarios.repository;

import com.fincarent.fincarent.usuarios.model.TipoUsuario;
import com.fincarent.fincarent.usuarios.model.Usuario;
import org.springframework.data.jpa.repository.JpaRepository;

import java.util.List;
import java.util.Optional;

public interface UsuarioRepository extends JpaRepository<Usuario, Long> {
    Optional<Usuario> findByEmail(String email);
    List<Usuario> findByTipo(TipoUsuario tipo);
}