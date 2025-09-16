<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Institucion extends Model
{
   use HasFactory;
   protected $table = "institucion_bn";

   protected $fillable = [
      'nombre',
   ];
   

}