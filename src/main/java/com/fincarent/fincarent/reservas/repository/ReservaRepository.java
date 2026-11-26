package com.fincarent.fincarent.reservas.repository;

import com.fincarent.fincarent.reservas.entity.Reserva;
import org.springframework.data.jpa.repository.JpaRepository;

public interface ReservaRepository extends JpaRepository<Reserva, Long> {
}