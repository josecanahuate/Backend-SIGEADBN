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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('institucion_id');
            $table->unsignedBigInteger('direccion_id'); 
            $table->unsignedBigInteger('departamento_id');
            $table->unsignedBigInteger('sucursal_id'); 

            $table->string('nombres', 255);
            $table->enum('tipo_id', ['Cedula', 'Pasaporte']);
            $table->string('no_documento', 255);
            $table->string('usuario_empleado')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            
            $table->string('puesto', 255);
            $table->enum('estatus_empleado', ['Activo', 'Inactivo']);
            
            //$table->foreign('institucion_id')->references('id')->on('institucion_bn')->onDelete('set null');
            //$table->foreign('direccion_id')->references('id')->on('direccion_bn')->onDelete('set null');
            //$table->foreign('departamento_id')->references('id')->on('departamento_bn')->onDelete('set null');
            //$table->foreign('sucursal_id')->references('id')->on('sucursal_bn')->onDelete('set null');

            // Relaciones
            $table->foreignId('institucion_id')->constrained('institucion_bn')->onDelete('set null');
            $table->foreignId('direccion_id')->constrained('direccion_bn')->onDelete('set null');
            $table->foreignId('departamento_id')->constrained('departamento_bn')->onDelete('set null');
            $table->foreignId('sucursal_id')->constrained('sucursal_bn')->onDelete('set null');
            
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
