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
        Schema::create('departamentos_bn', function (Blueprint $table) {
            $table->id();
            //$table->string('code', 3)->storedAs("LPAD(id, 3, '0')")->unique();
            $table->unsignedBigInteger('sucursal_id')->nullable();
            $table->string("nombre_depto", 255);
            $table->string("tel", 50);
            $table->string("tel_ext", 50);
            $table->string("fax", 50);
            $table->string('email', 255)->unique();
            $table->string("localidad", 255);
            $table->string("encargado", 255);

            $table->boolean('trabaja_sabado')->default(false);
            $table->boolean('trabaja_domingo')->default(false);
            $table->boolean('trabaja_feriado')->default(false);


            $table->foreign('sucursal_id')->references('id')->on('sucursal_bn')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departamento_bn');
    }
};
