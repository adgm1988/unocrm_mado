<?php

namespace App\Http\Controllers;
use App\Tipoproyecto;

use Illuminate\Http\Request;

class TipoproyectosController extends Controller
{
    function index(){
        $tiposproyecto = Tipoproyecto::all();
        $tiposproyecto = $tiposproyecto->sortBy('orden');

        return view('catalogos.tipoproyectos',compact('tiposproyecto'));
    }

    function store(Request $request){
    	$validated = $request->validate([
    		'tipo'=> 'required',
    		'orden'=> 'required',
    	]);

    	$tipoproyectos = new Tipoproyecto;
    	$tipoproyectos->tipo = $request->get('tipo');
    	$tipoproyectos->orden = $request->get('orden');

    	$tipoproyectos->save();
    	
        return redirect()->back();
    }

    function update(Request $request, $id){
        $validated = $request->validate([
            'tipo'=> 'required',
            'orden'=> 'required',
        ]);

        $tipoproyectos = Tipoproyecto::find($id);
        $tipoproyectos->tipo = $request->get('tipo');
        $tipoproyectos->orden = $request->get('orden');

        $tipoproyectos->save();
        
        return redirect('tipoproyectos');
    }

    function form($id){
        $tipoproyectos = Tipoproyecto::find($id);
        return view('pages.tiposproyectos_edit',compact('tipoproyectos'));
    }

    function destroy($id){
    	$tipoproyectos = Tipoproyecto::find($id);

    	$tipoproyectos->delete();
    	
        return redirect()->back();
    }
}
