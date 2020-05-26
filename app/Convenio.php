<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Convenio extends Model
{
    public function prospecto(){
    	return $this->belongsTo('App\Prospecto','_prospectoid');
    }
}
