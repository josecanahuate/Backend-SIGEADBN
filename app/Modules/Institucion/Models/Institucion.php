<?php

namespace App\Modules\Institucion\Models;

use App\Modules\Direccion\Models\Direccion;
use App\Modules\Sucursal\Models\Sucursal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Institucion extends Model
{
   use HasFactory;
   protected $table = "institucion_bn";

   protected $fillable = [
      'razon_social',
      'nombre_institucion',
      'rnc',
      'direccion_1',
      'direccion_2',
      'tel_1',
      'tel_2',
      'fax',
      'email',
      'a_postal',
      'localidad',
      'encargado',
      'capital',
      'registro_ind',
      'idss',
      'registro',
      'poliza',
      'aniversario',
      'actividad',
      'clase_empresa',
      'mes_inicio',
      'mes_fin',
      'tasa_itbis',
      'cuenta_periodo',
   ];

   public function direcciones()
   {
      return $this->hasMany(Direccion::class);
   }  

   public function sucursales()
   {
      return $this->hasMany(Sucursal::class);
   }  
}