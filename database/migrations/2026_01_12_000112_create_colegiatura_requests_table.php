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
        Schema::create('colegiatura_requests', function (Blueprint $table) {
            $table->id();
            
            // Datos personales
            $table->string('apellidos_nombres');
            $table->string('correo');
            $table->string('celular', 15);
            $table->string('dni', 8);
            
            // Rutas de documentos (archivos guardados en storage)
            $table->string('solicitud_incorporacion_path')->nullable();
            $table->string('ficha_personal_path')->nullable();
            $table->string('compromiso_honor_path')->nullable();
            $table->string('declaracion_jurada_path')->nullable();
            $table->string('ficha_carnet_path')->nullable();
            
            // Estado de la solicitud
            $table->enum('status', ['pendiente', 'aprobado', 'rechazado'])->default('pendiente');
            $table->text('notas_admin')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colegiatura_requests');
    }
};
