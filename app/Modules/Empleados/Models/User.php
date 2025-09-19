<?php

namespace App\Modules\Empleados\Models;

use App\Modules\Departamentos\Models\Departamento;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Modules\Direccion\Models\Direccion;
use App\Modules\Institucion\Models\Institucion;
use App\Modules\Sucursal\Models\Sucursal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
   use HasApiTokens, HasFactory, Notifiable;

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


   protected $hidden = [
      #'password',
      'remember_token',
   ];

   protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
   ];

   public function institucion()
    {
      return $this->belongsTo(Institucion::class, 'institucion_id');
    }

   public function direccion()
   {
      return $this->belongsTo(Direccion::class, 'direccion_id');
   }

   public function departamento()
   {
      return $this->belongsTo(Departamento::class, 'sucursal_id');
   }

   public function sucursal()
   {
      return $this->belongsTo(Sucursal::class, 'departamento_id');
   }
}