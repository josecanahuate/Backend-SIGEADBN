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
        Schema::create('departamento_bn', function (Blueprint $table) {
            $table->id();
            $table->text("nombre_depto", 255);
            $table->string("tel", 50);
            $table->string("tel_ext", 50);
            $table->string("fax", 50);
            $table->string('email', 255)->unique();
            $table->string("localidad", 255);
            $table->string("encargado", 255);

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
        Schema::dropIfExists('departamento_bn');
    }
};
