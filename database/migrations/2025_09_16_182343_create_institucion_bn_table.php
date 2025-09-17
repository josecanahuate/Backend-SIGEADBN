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
            //$table->string('codigo', 2)->storedAs("LPAD(id, 2, '0')")->unique();
            //$table->string('code', 2)->nullable()->unique();
            $table->text("razon_social", 255);
            $table->text("nombre_institucion", 255);
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
            
            $table->decimal('capital', 10, 2)->nullable();
            $table->integer('registro_ind')->nullable();
            $table->integer('idss')->nullable();
            $table->integer('registro')->nullable();
            $table->integer('poliza')->nullable();

            $table->date('aniversario')->nullable();
            $table->string('actividad')->nullable();
            $table->string('clase_empresa')->nullable();

            $table->integer('mes_inicio')->nullable();
            $table->integer('mes_fin')->nullable();
            $table->decimal('tasa_itbis', 8, 2)->nullable();
            $table->string('cuenta_periodo')->nullable();

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
