<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Direccion extends Model
{

   use HasFactory;
   protected $table = "direccion_bn";
   protected $fillable = [
      'nombre',
   ];


   //Relacion con empleado
   public function empleados()
   {
      return $this->belongsTo(Empleado::class, 'empleado_id', 'id');
   }
}