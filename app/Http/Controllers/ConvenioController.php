<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Convenio;

class ConvenioController extends Controller
{
    function storeprosp($id, Request $request){

        $validated= $request->validate([
            'fecha'=>'required',
            'name'=>'required',
            'descripcion'=>'required',

        ]);

        $convenio = new Convenio;
        $convenio->prospecto_id = $id;
        $convenio->name = $request->get('name');
        $convenio->fecha = $request->get('fecha');
        $convenio->descripcion = $request->get('descripcion');

        

        $path = $request->file('archivo')->store('public/convenios');
        
        $path = str_replace("public/","",$path);

        $convenio->ruta_archivo = $path;

        $convenio->save();

        return back();

    }

    function destroy($id){
        $convenio = Convenio::find($id);
        $prospecto = $convenio->prospecto->id;

        $convenio->delete();

        return redirect('/prospectos/'.$prospecto_id);
        

        
    }
}
