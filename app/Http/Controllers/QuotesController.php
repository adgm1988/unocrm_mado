<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quote;

class QuotesController extends Controller
{
    function storeprosp($id, Request $request){

        $validated= $request->validate([
            'fecha'=>'required',
            'monto'=>'required',
            'name'=>'required',
            'descripcion'=>'required',

        ]);

        $quote = new Quote;
        $quote->prospecto_id = $id;
        $quote->name = $request->get('name');
        $quote->fecha = $request->get('fecha');
        $quote->monto = $request->get('monto');
        $quote->descripcion = $request->get('descripcion');

        

        $path = $request->file('archivo')->store('public/quotes');
        
        $path = str_replace("public/","",$path);

        $quote->ruta_archivo = $path;

        $quote->save();

        return back();

    }

    function destroy($id){
        $quote = Quote::find($id);

        $quote->delete();

        return redirect('/prospectos/'.$quote->prospecto_id);
        

        
    }
}
