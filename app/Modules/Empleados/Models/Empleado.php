<?php

namespace App\Modules\Empleados\Models;

use App\Modules\Departamentos\Models\Departamento;
use App\Modules\Direccion\Models\Direccion;
use App\Modules\Institucion\Models\Institucion;
use App\Modules\Sucursal\Models\Sucursal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Empleado extends Model
{
   use HasFactory;
   
   protected $table = "empleados_bn";

   protected $fillable = [
      'institucion_id',
      'direccion_id',
      'departamento_id',
      'sucursal_id',
      'nombres',
      'tipo_id',
      'no_documento',
      'usuario_empleado',
      'email',
      'email_verified_at',
      'password',
      'puesto',
      'estatus_empleado',
   ];


   public function institucion()
   {
      return $this->belongsTo(Institucion::class);
   }

   public function direccion()
   {
      return $this->belongsTo(Direccion::class);
   }

   public function departamento()
   {
      return $this->belongsTo(Departamento::class);
   }

   public function sucursal()
   {
      return $this->belongsTo(Sucursal::class);
   }
}