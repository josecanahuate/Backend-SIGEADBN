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
        Schema::create('empleados_bn', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('institucion_id')->nullable();
            $table->unsignedBigInteger('direccion_id')->nullable();
            $table->unsignedBigInteger('departamento_id')->nullable();
            $table->unsignedBigInteger('sucursal_id')->nullable();

            $table->string('nombres', 255)->unique();;
            $table->enum('tipo_id', ['Cedula', 'Pasaporte']);
            $table->string('no_documento', 255);
            $table->string('usuario_empleado', 255)->unique();
            $table->string('email', 255)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            
            $table->string('puesto', 255);
            $table->enum('estatus_empleado', ['Activo', 'Inactivo']);
            
            // Relaciones
            $table->foreign('institucion_id')
                ->references('id')
                ->on('institucion_bn')
                ->onDelete('set null');

            $table->foreign('direccion_id')
                ->references('id')
                ->on('direccion_bn')
                ->onDelete('set null');

            $table->foreign('sucursal_id')
                ->references('id')
                ->on('sucursal_bn')
                ->onDelete('set null');

            $table->foreign('departamento_id')
                ->references('id')
                ->on('departamentos_bn')
                ->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
   /*  public function down(): void
    {
        Schema::dropIfExists('empleados');
    } */

    public function down()
    {
        Schema::table('empleados_bn', function (Blueprint $table) {
        $table->dropForeign(['institucion_id']);
        $table->dropForeign(['direccion_id']);
        $table->dropForeign(['sucursal_id']);
        $table->dropForeign(['departamento_id']);


        $table->dropColumn(['institucion_id','direccion_id','sucursal_id','departamento_id']);
    });
}
};
