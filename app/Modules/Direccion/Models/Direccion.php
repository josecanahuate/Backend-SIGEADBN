<?php

namespace App\Modules\Direccion\Models;

use App\Modules\Departamento\Models\Departamento;
use App\Modules\Empleado\Models\Empleado;
use App\Modules\Institucion\Models\Institucion;
use App\Modules\Sucursal\Models\Sucursal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Direccion extends Model
{

   use HasFactory;
   protected $table = "direccion_bn";

   protected $fillable = [
      'institucion_id',
      'razon_social',
      'nombre_direccion',
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
      'tasa_itbis',
      'dias_cobro_gracia',
      'tipo_cuadre',
      'trabaja_sabado',
      'trabaja_domingo',
      'trabaja_feriado',
   ];

   protected $casts = [
      'trabaja_sabado' => 'boolean',
      'trabaja_domingo' => 'boolean',
      'trabaja_feriado' => 'boolean',
   ];

   public function institucion()
   {
      return $this->belongsTo(Institucion::class);
   }

   public function sucursales()
   {
      return $this->hasMany(Sucursal::class);
   }

   public function empleados()
   {
      return $this->hasMany(Empleado::class);
   }

   // todos los departamentos bajo esta dirección (via sucursales)
   public function departments()
   {
      return $this->hasManyThrough(Departamento::class, Sucursal::class, 'direction_id', 'branch_id', 'id', 'id');
   }

   protected $attributes = [
      'institucion_id' => 1,
   ];
}