<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipoact extends Model
{
    //
    public function actividades(){
    	return $this->hasMany('App\Actividad');
    }
}
