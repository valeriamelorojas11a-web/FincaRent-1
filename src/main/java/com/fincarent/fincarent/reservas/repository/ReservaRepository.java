package com.fincarent.fincarent.reservas.repository;

import com.fincarent.fincarent.reservas.entity.Reserva;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.query.Param;

import java.time.LocalDate;

public interface ReservaRepository extends JpaRepository<Reserva, Long> {

    @Query("""
            SELECT COUNT(r) > 0
            FROM Reserva r
            WHERE LOWER(TRIM(r.finca)) = LOWER(TRIM(:finca))
              AND (r.estado IS NULL OR LOWER(TRIM(r.estado)) NOT LIKE 'cancel%')
              AND r.fechaEntrada < :fechaSalida
              AND r.fechaSalida > :fechaEntrada
              AND (:excluirId IS NULL OR r.id <> :excluirId)
            """)
    boolean existeCruceReserva(
            @Param("finca") String finca,
            @Param("fechaEntrada") LocalDate fechaEntrada,
            @Param("fechaSalida") LocalDate fechaSalida,
            @Param("excluirId") Long excluirId
    );
}