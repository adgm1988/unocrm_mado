@extends('layout')
@section('content')

<!-- Modal cierre -->



<div class="table-responsive">
	<table class="table table-bordered ">
		<thead>
			
			<tr style="background-color:gray; color:white;">
				<th>Empresa</th>
				<th>Semestre</th>
				<th>{{$cinco}}</th>
				<th>{{$cuatro}}</th>
				<th>{{$tres}}</th>
				<th>{{$dos}}</th>
				<th>{{$uno}}</th>
				<th>{{$presente}}</th>
			</tr>
			
		</thead>			
				@foreach($ventas->groupBy('id') as $clienteid)
					<tr class="text-center">

						<td style="text-align:left;"><a href="/prospectos/{{ $clienteid[0]->id }}">{{$clienteid[0]->empresa}}</a> 
						</td>
						<td style="background-color:lightgray; font-weight:bold;">
							${{number_format($clienteid->sum('monto'))}}
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



@endsection