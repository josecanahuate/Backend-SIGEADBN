<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Empleado extends Model
{
   use HasFactory;
   protected $table = "empleados_bn";

   protected $fillable = [
      'nombre',
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