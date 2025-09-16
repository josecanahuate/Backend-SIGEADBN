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
        Schema::create('direccion_bn', function (Blueprint $table) {
            $table->id();
            
            $table->text("razon_social", 255);
            $table->string("rnc", 100);
            $table->date('fecha_aniversario');
            $table->text("direccion_1");
            $table->string("direccion_2", 255)->nullable();
            $table->string("tel_1", 50);
            $table->string("tel_2", 50)->nullable();
            $table->string("fax", 50)->nullable();
            $table->string('localidad', 200)->nullable();
            $table->string('email', 200)->unique();
            $table->string('encargado', 150);

            $table->integer('cod_iso');
            $table->integer('cod_ministerio');
            
            $table->decimal('tasa_itbis', 10, 2);
            $table->integer('dias_cobro_gracia');
            $table->enum('tipo_cuadre', ['Individual', 'General'])->nullable();

            $table->boolean('trabaja_sabado')->default(false);
            $table->boolean('trabaja_domingo')->default(false);
            $table->boolean('trabaja_feriado')->default(false);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('direccion_bn');
    }
};
