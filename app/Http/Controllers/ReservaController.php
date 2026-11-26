<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;

class ReservaController extends Controller
{
    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|max:255',
            'telefono' => 'required|string|max:30',
            'finca' => 'required|string|max:255',
            'precio' => 'required|integer',
            'fecha_entrada' => 'required|date',
            'fecha_salida' => 'required|date|after:fecha_entrada',
        ]);

        $datos['estado'] = 'Confirmada';

        Reserva::create($datos);

        return redirect('/index')->with('reserva_ok', true);
    }
}
