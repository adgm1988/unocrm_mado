<?php

use Illuminate\Database\Seeder;
use App\Tipoproyecto;

class TipoproyectosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos = ['Desarrolo vivienda','Horizontal','Torre departamentos','Oficinas','Plaza comercial','Centro comercial','Escuela','Hospital','Hotel','Corporativo','Otros'];
        foreach ($tipos as $key => $tipo){
        	Tipoproyecto::create([
        	'tipo'=>$tipo,
        	'orden'=>($key+1)
        ]);
        }
    }
}
