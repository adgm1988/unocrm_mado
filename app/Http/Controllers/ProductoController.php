<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    function index(){
        $productos = Producto::all();
        $productos = $productos->sortBy('orden');

        return view('catalogos.productos',compact('productos'));
    }

    function store(Request $request){
    	$validated = $request->validate([
    		'producto'=> 'required',
    		'orden'=> 'required',
    	]);

    	$producto = new Producto;
    	$producto->producto = $request->get('producto');
    	$producto->orden = $request->get('orden');

    	$producto->save();
    	
        return redirect()->back();
    }
}
