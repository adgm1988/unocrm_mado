<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Prospecto;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReporteVentasController extends Controller
{
    //
    function index(){
    	$prospectos = Prospecto::all();
    	$cinco=Carbon::now()->modify('-5 months')->format('Y-m');
    	$cuatro=Carbon::now()->modify('-4 months')->format('Y-m');
    	$tres=Carbon::now()->modify('-3 months')->format('Y-m');
    	$dos=Carbon::now()->modify('-2 months')->format('Y-m');
    	$uno=Carbon::now()->modify('-1 months')->format('Y-m');
    	$presente=Carbon::now()->format('Y-m');
    	$semestre=Carbon::now()->modify('-5 months')->format('Ym');
    	
  		//dd($semestre);
    	$ventas = DB::table('prospectos')
	    			->join('ventas','prospectos.id','=','ventas._prospectoid')
	    			->select('prospectos.id','prospectos.empresa', DB::raw('sum(ventas.monto) as monto'), DB::raw('DATE_FORMAT(ventas.fecha, "%Y-%m") as mes'))
	    			->whereRaw('DATE_FORMAT(ventas.fecha, "%Y%m") >='.$semestre)
	    			->groupby('id','empresa','mes')
	    			->orderBy('id','asc')
	    			->orderBy('mes','asc')
	    			->get();
    	//dd($ventas);

    	return view('pages.reporte_ventas', compact('ventas','prospectos','cinco','cuatro','tres','dos','uno','presente'));

    	

    }
}
