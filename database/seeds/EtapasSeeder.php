<?php

use Illuminate\Database\Seeder;
use App\Etapa;
use Faker\Generator as Faker;

class EtapasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $etapas = ['Prospectos MB','Cotizacion MB','Cierre MB','Detenido MB','Prospectos COC','Cotizacion COC','Cierre COC','Detenido COC','Prospectos CUB','Cotizacion CUB','Cierre CUB','Detenido CUB'];
        foreach ($etapas as $key => $etapa){
        	Etapa::create([
        	'etapa'=>$etapa,
        	'orden'=>($key+1),
            'dias'=>$faker->numberBetween(2,25),
        	'color'=>$faker->hexcolor
        ]);
        }
    }
}
