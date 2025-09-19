<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DireccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('direccion_bn')->insert([
        [      
            "institucion_id" =>  1,
            "razon_social" =>  "Ministerio de Bienes Nacionales 3",
            "nombre_direccion" =>  "Bienes Nacionales",
            "rnc" =>  "4-01-036983",
            "direccion_1" =>  "Av. México 45, Santo Domingo 10201",
            "direccion_2" =>  "Santo Domingo 10201",
            "tel_1" =>  "(809) 687-5131",
            "tel_2" =>  "(809) 687-5131",
            "fax" =>  "(809) 687-5131",
            "localidad" =>  "dasdasd",
            "email" =>  "hacienda@gmail.com",
            "encargado" =>  "CESAR JULIO",
            "cod_iso" =>  2,
            "cod_ministerio" =>  3,
            "tasa_itbis" =>  18.00,
            "dias_cobro_gracia" =>  2,
            "tipo_cuadre" =>  "General",
            "fecha_aniversario" =>  "1999/05/20",
            "trabaja_sabado" =>  true,
            'created_at' => now(),
            'updated_at' => now(),
        ]
    ]);
    }
}
