<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Sucursal extends Model
{
   use HasFactory;
   protected $table = "sucursal_bn";

   protected $fillable = [
      'nombre',
   ];
   

   public function empleados()
   {
      return $this->hasMany(Empleado::class);
   }

   public function sucursales()
   {
      return $this->hasMany(Direccion::class);
   }

   public function institucion()
   {
      return $this->belongsTo(Institucion::class);
   }

   public function direccion()
   {
      return $this->belongsTo(Direccion::class);
   }

}