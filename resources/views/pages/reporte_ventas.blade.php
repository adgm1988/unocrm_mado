@extends('layout')
@section('content')

<!-- Modal cierre -->


<div class="row mb-3">
	<div class="col-md-4">
		<input autocomplete="off" onkeyup="filtrar()" id="filtro" type="text" class="form-control form-control-sm" placeholder="Nombre de empresa" name="valor">
	</div>
</div>
<div class="table-responsive">
	<table class="table table-bordered ">
		<thead>
			
			<tr style="background-color:gray; color:white;">
				<th>Empresa</th>
				<!--<th>13 meses</th> ESTE LO QUITE PORQUE ME SUMABA TRECE MESES Y NO ES LO QUE QUERIAMOS-->
				<th style="font-size:10px;">{{$doce}}</th>
				<th style="font-size:10px;">{{$once}}</th>
				<th style="font-size:10px;">{{$diez}}</th>
				<th style="font-size:10px;">{{$nueve}}</th>
				<th style="font-size:10px;">{{$ocho}}</th>
				<th style="font-size:10px;">{{$siete}}</th>
				<th style="font-size:10px;">{{$seis}}</th>
				<th style="font-size:10px;">{{$cinco}}</th>
				<th style="font-size:10px;">{{$cuatro}}</th>
				<th style="font-size:10px;">{{$tres}}</th>
				<th style="font-size:10px;">{{$dos}}</th>
				<th style="font-size:10px;">{{$uno}}</th>
				<th style="font-size:10px;">{{$presente}}</th>
			</tr>
			
		</thead>			
				@foreach($ventas->groupBy('id') as $clienteid)
					<tr class="text-center">

						<td class="cliente" style="text-align:left;"><a href="/prospectos/{{ $clienteid[0]->id }}">{{$clienteid[0]->empresa}}</a> 
						</td>
						<!-- ESTE TAMBIEN LO AL IGUAL QUE SU HEADER PORQUE SUMABA 13 MESES EN VEZ DE 12 Y NO TIENE SENTIDO EN EL REPORTE
						<td style="background-color:lightgray; font-weight:bold;">
							${{number_format($clienteid->sum('monto'))}}
						</td>
						-->
						<td>
							@for ($i = 0; $i < $clienteid->count(); $i++)
							    @if($clienteid[$i]->mes == $doce)
							    	${{number_format($clienteid[$i]->monto,0)}}
							    @endif
							@endfor
						</td>
						<td>
							@for ($i = 0; $i < $clienteid->count(); $i++)
							    @if($clienteid[$i]->mes == $once)
							    	${{number_format($clienteid[$i]->monto,0)}}
							    @endif
							@endfor
						</td>
						<td>
							@for ($i = 0; $i < $clienteid->count(); $i++)
							    @if($clienteid[$i]->mes == $diez)
							    	${{number_format($clienteid[$i]->monto,0)}}
							    @endif
							@endfor
						</td>
						<td>
							@for ($i = 0; $i < $clienteid->count(); $i++)
							    @if($clienteid[$i]->mes == $nueve)
							    	${{number_format($clienteid[$i]->monto,0)}}
							    @endif
							@endfor
						</td>
						<td>
							@for ($i = 0; $i < $clienteid->count(); $i++)
							    @if($clienteid[$i]->mes == $ocho)
							    	${{number_format($clienteid[$i]->monto,0)}}
							    @endif
							@endfor
						</td>
						<td>
							@for ($i = 0; $i < $clienteid->count(); $i++)
							    @if($clienteid[$i]->mes == $siete)
							    	${{number_format($clienteid[$i]->monto,0)}}
							    @endif
							@endfor
						</td>
						<td>
							@for ($i = 0; $i < $clienteid->count(); $i++)
							    @if($clienteid[$i]->mes == $seis)
							    	${{number_format($clienteid[$i]->monto,0)}}
							    @endif
							@endfor
						</td>
						<td>
							@for ($i = 0; $i < $clienteid->count(); $i++)
							    @if($clienteid[$i]->mes == $cinco)
							    	${{number_format($clienteid[$i]->monto,0)}}
							    @endif
							@endfor
						</td>
						<td>
							@for ($i = 0; $i < $clienteid->count(); $i++)
							    @if($clienteid[$i]->mes == $cuatro)
							    	${{number_format($clienteid[$i]->monto,0)}}
							    @endif
							@endfor
						</td>


						<td>
							@for ($i = 0; $i < $clienteid->count(); $i++)
							    @if($clienteid[$i]->mes == $tres)
							    	${{number_format($clienteid[$i]->monto,0)}}
							    @endif
							@endfor
						</td>
						<td>
							@for ($i = 0; $i < $clienteid->count(); $i++)
							    @if($clienteid[$i]->mes == $dos)
							    	${{number_format($clienteid[$i]->monto,0)}}
							    @endif
							@endfor
						</td>
						<td>
							@for ($i = 0; $i < $clienteid->count(); $i++)
							    @if($clienteid[$i]->mes == $uno)
							    	${{number_format($clienteid[$i]->monto,0)}}
							    @endif
							@endfor
						</td>
						<td style="background-color:lightblue; font-weight:bold;">
							@for ($i = 0; $i < $clienteid->count(); $i++)
							    @if($clienteid[$i]->mes == $presente)
							    	${{number_format($clienteid[$i]->monto,0)}}
							    @endif
							@endfor
						</td>
						
					</tr>

				@endforeach
						
		</tr>
	</table>
</div>

<script>
	var filtrar = function(){
		var valor = document.getElementById('filtro').value.toUpperCase();
		var clientes = document.getElementsByClassName('cliente');
		for(var i=0; i<clientes.length; i++){
			var empresa = clientes[i].textContent.toUpperCase();
			var filtro = empresa;

			if(filtro.includes(valor)){
				clientes[i].parentElement.style.display='table-row';
			}else{
				clientes[i].parentElement.style.display='none';
			}
		}

	}

</script>


@endsection