<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Departamento extends Model
{
   use HasFactory;
   protected $table = "departamento_bn";

   protected $fillable = [
      'nombre',
   ];
   

   public function institucion()
   {
      return $this->belongsTo(Institucion::class);
   }

   public function empleados()
   {
      return $this->hasMany(Empleado::class);
   }

}