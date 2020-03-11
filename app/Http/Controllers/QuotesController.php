<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $quote->fecha = $request->get('fecha');
        $quote->monto = $request->get('monto');
        $quote->descripcion = $request->get('descripcion');

        $quote->save();

        return back();

    }
}
