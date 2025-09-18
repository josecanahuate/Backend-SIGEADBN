<?php

namespace App\Modules\Sucursal\Models;

use App\Modules\Departamento\Models\Departamento;
use App\Modules\Direccion\Models\Direccion;
use App\Modules\Empleado\Models\Empleado;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Sucursal extends Model
{
   use HasFactory;
   protected $table = "sucursal_bn";

   protected $fillable = [
      'direccion_id',
      'razon_social',
      'rnc',
      'fecha_aniversario',
      'direccion_1',
      'direccion_2',
      'tel_1',
      'tel_2',
      'fax',
      'localidad',
      'email',
      'encargado',
      'cod_iso',
      'cod_ministerio',
      'trabaja_sabado',
      'trabaja_domingo',
      'trabaja_feriado',
      'tipo_cuadre',
   ];

   protected $casts = [
      'trabaja_sabado' => 'boolean',
      'trabaja_domingo' => 'boolean',
      'trabaja_feriado' => 'boolean',
   ];


   public function direccion()
   {
      return $this->belongsTo(Direccion::class);
   }

   public function departamentos()
   {
      return $this->hasMany(Departamento::class);
   }

   public function empleados()
   {
      return $this->hasMany(Empleado::class);
   }
}