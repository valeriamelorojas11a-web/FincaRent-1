<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();

            $table->string('nombre');
            $table->string('correo');
            $table->string('telefono');

            $table->string('finca');
            $table->integer('precio');

            $table->date('fecha_entrada');
            $table->date('fecha_salida');

            $table->string('estado')->default('Confirmada');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
