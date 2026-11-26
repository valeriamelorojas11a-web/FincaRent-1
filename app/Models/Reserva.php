<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = 'reservas';

    protected $fillable = [
    'nombre',
    'correo',
    'telefono',
    'finca',
    'precio',
    'fecha_entrada',
    'fecha_salida',
    'estado',
];

    protected $casts = [
        'fecha_entrada' => 'date',
        'fecha_salida' => 'date',
    ];
}
