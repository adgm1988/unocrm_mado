<?php

use Illuminate\Database\Seeder;
use App\Estatusproyecto;

class EstatusproyectosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos = ['Proyecto arquitectonico','En cimientos','Cimentando loza','Obra gris','Otros'];
        foreach ($tipos as $key => $tipo){
        	Estatusproyecto::create([
        	'estatus'=>$tipo,
        	'orden'=>($key+1)
        ]);
        }
    }
}
