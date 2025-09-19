<?php

namespace App\Modules\Departamentos\Models;

use App\Modules\Empleados\Models\Empleado;
use App\Modules\Sucursal\Models\Sucursal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Departamento extends Model
{
   use HasFactory;
   protected $table = "departamentos_bn";

   protected $fillable = [
      'sucursal_id',
      'nombre_depto',
      'tel',
      'tel_ext',
      'fax',
      'email',
      'localidad',
      'encargado',
      'trabaja_sabado',
      'trabaja_domingo',
      'trabaja_feriado',
   ];

   protected $casts = [
      'trabaja_sabado' => 'boolean',
      'trabaja_domingo' => 'boolean',
      'trabaja_feriado' => 'boolean',
   ];

   public function sucursal()
   {
      return $this->belongsTo(Sucursal::class);
   }

   public function empleados()
   {
      return $this->hasMany(Empleado::class);
   }
}