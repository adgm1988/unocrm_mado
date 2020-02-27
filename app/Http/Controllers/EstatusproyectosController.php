<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estatusproyecto;

class EstatusproyectosController extends Controller
{
    function index(){

        $estatusproyectos = Estatusproyecto::all();
        $estatusproyectos = $estatusproyectos->sortBy('orden');
        return view('catalogos.estatusproyectos',compact('estatusproyectos'));
    }

    function store(Request $request){
    	$validated = $request->validate([
    		'estatus'=> 'required',
    		'orden'=> 'required',
    	]);

    	$estatusproyectos = new Estatusproyecto;
    	$estatusproyectos->estatus = $request->get('estatus');
    	$estatusproyectos->orden = $request->get('orden');

    	$estatusproyectos->save();
    	
        return redirect()->back();
    }

    function update(Request $request, $id){
        $validated = $request->validate([
            'tipo'=> 'required',
            'orden'=> 'required',
        ]);

        $estatusproyectos = Estatusproyecto::find($id);
        $estatusproyectos->tipo = $request->get('tipo');
        $estatusproyectos->orden = $request->get('orden');

        $estatusproyectos->save();
        
        return redirect('estatusproyectos');
    }

    function form($id){
        $estatusproyectos = Estatusproyecto::find($id);
        return view('pages.estatusproyectos_edit',compact('estatusproyectos'));
    }

    function destroy($id){
    	$estatusproyectos = Estatusproyecto::find($id);

    	$estatusproyectos->delete();
    	
        return redirect()->back();
    }
}
