<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstitucionSeeder extends Seeder
{
    public function run(): void
    {
         DB::table('institucion_bn')->insert([
        	[
                'razon_social' => "HACIENDA",
                'nombre_institucion' => "MINISTERIO DE HACIENDA",
                'rnc' => "4-01-036983",
                'direccion_1' => "Av. México 45, Santo Domingo 10201",
                'direccion_2' => "Santo Domingo 10201",
                'tel_1' => "(809) 687-5131",
                'tel_2' => "(809) 687-5131",
                'fax' => "(809) 687-5131",
                'email' => "hacienda@gmail.com",
                'a_postal' => "dasda",
                'localidad' => "dasdasd",
                'encargado' => "CESAR JULIO",
                'capital' => 2.00,
                'registro_ind' => 0,
                'idss' => 0,
                'registro' => 0,
                'poliza' => 0,
                'aniversario' => "1999/05/20",
                'actividad' => "asdasd",
                'clase_empresa' => "GUBERNAMENTAL",
                'mes_inicio' => 1,
                'mes_fin' => 12,
                'tasa_itbis' => 18.00,
                'cuenta_periodo' => "dasdasd",
                'created_at' => now(),
                'updated_at' => now(),
        	]
        ]);
    }

}
