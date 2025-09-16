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
        Schema::create('institucion_bn', function (Blueprint $table) {
            $table->id();
            $table->text("razon_social", 255);
            $table->string("rnc", 100);
            $table->string("direccion_1", 255);
            $table->string("direccion_2", 255)->nullable();
            $table->string("tel_1", 50);
            $table->string("tel_2", 50)->nullable();
            $table->string("fax", 50)->nullable();
            $table->string('email')->unique();
            $table->string('a_postal')->nullable();
            $table->string('localidad')->nullable();
            $table->string('encargado');
            
            $table->decimal('capital', 10, 2);
            $table->integer('registro_ind');
            $table->integer('idss');
            $table->integer('registro');
            $table->integer('poliza');

            $table->date('aniversario');
            $table->string('actividad');
            $table->string('clase_empresa');

            $table->integer('mes_inicio');
            $table->integer('mes_fin');
            $table->decimal('tasa_itbis', 8, 2);
            $table->string('cuenta_periodo');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institucion_bn');
    }
};
