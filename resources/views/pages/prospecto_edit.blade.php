@extends('layout')
@section('content')



<h3 class='text-center'>{{ $prospecto->empresa }}</h3>
<h5 class='text-center'>{{ ucfirst($prospecto->estatus) }}</h5>
<!-- Trigger the modal with a button -->

@if ($errors->any())
<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif

<form method="post" action="/prospectos/{{ $prospecto->id}}" id="form">
	@csrf
	<div class="row">
		<div class="form-group col-md-6">
			<label for="empresa">Empresa:</label>
			<input type="text" class="form-control" name="empresa" {{$prospecto->nuevo}} value="{{ $prospecto->empresa }}">
		</div>
		<div class="form-group col-md-3">
			<label for="contacto">Situación:</label>
			<select class="custom-select mb-3" name="estatus_disabled" disabled>
				<option {{ $prospecto->estatus == 'perdido' ? 'selected' : ''}} value='perdido'>Perdido</option>
				<option {{ $prospecto->estatus == 'prospecto' ? 'selected' : ''}} value='prospecto'>Prospecto</option>
				<option {{ $prospecto->estatus == 'ganado' ? 'selected' : ''}} value='ganado'>Ganado</option>
			</select>
		</div>
		<div class="form-group col-md-3 pt-4">
			<a href="/perdido/{{ $prospecto->id }}"><button type="button" style="box-shadow: 2px 2px 2px grey; color:white; background-color:#ff0000;" class="btn btn-md p3" >Perdido</button></a>
			
			<a href="/activarprospecto/{{ $prospecto->id }}"><button type="button" style="box-shadow: 2px 2px 2px grey; color:white; background-color:#007bff;" class="btn btn-md p3" > Prospecto</button></a>
			
			<a href="/ganado/{{ $prospecto->id }}"><button type="button" style="box-shadow: 2px 2px 2px grey; color:white; background-color:#45bd17;" class="btn btn-md p3" > Ganado</button></a>
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-4">
			<label for="contacto">Contacto y puesto:</label>
			<input type="text" class="form-control" name="contacto" value="{{ $prospecto->contacto }}">
		</div>
		<input type="hidden" name="estatus" value="{{  $prospecto->estatus  }}" />
		<div class="form-group col-md-4">
			<label for="telefono">Teléfono:</label>
			<input type="text" class="form-control" name="telefono" value="{{ $prospecto->telefono }}">
		</div>
		<div class="form-group col-md-4">
			<label for="correo">Correo:</label>
			<input type="text" class="form-control" name="correo" value="{{ $prospecto->correo }}">
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-3">
			<label for="procedencia">Procedencia:</label>
			<select class="custom-select" name="procedencia">
				@foreach($procedencias as $procedencia)
				<option {{ $procedencia->id === $prospecto->procedencia ? "selected" : "" }} value='{{ $procedencia->id }}'>{{ $procedencia->procedencia }}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group col-md-3">
			<label for="procedencia">Industria:</label>
			<select class="custom-select" name="industria">
				@foreach($industrias as $industria)
				<option {{ $industria->id === $prospecto->industria ? "selected" : "" }} value='{{ $industria->id }}'>{{ $industria->industria }}</option>
				@endforeach
			</select>
		</div>
	    <div class="form-group col-md-3">
	        <label for="procedencia">Tipo de proyecto:</label>
	        <select class="custom-select" name="tipo_proyecto">
	            <option disabled selected value> -- </option>
	            @foreach($tiposproyecto as $tipos)
	            <option {{ $tipos->id === $prospecto->tipo_proyecto ? "selected" : "" }} value='{{ $tipos->id }}'>{{ $tipos->tipo }}</option>
	            @endforeach
	        </select>
	    </div>
	    <div class="form-group col-md-3">
	        <label for="procedencia">Estatus de proyecto:</label>
	        <select class="custom-select" name="estatus_proyecto">
	            <option disabled selected value> -- </option>
	            @foreach($estatusproyecto as $estatus)
	            <option {{ $estatus->id === $prospecto->estatus_proyecto ? "selected" : "" }} value='{{ $estatus->id }}'>{{ $estatus->estatus }}</option>
	            @endforeach
	        </select>
	    </div>
	</div>
	<div class="row">
		<div class="form-group col-md-4">
			<label for="procedencia">Etapa:</label>
			<select class="custom-select" name="etapa_disabled" disabled>
				@foreach($etapas as $etapa)
				<option {{ $etapa->id === $prospecto->etapa_id ? "selected" : "" }} value='{{ $etapa->id }}'>{{ $etapa->etapa }}</option>
				@endforeach
			</select>
		</div>
		<input type="hidden" name="etapa" value="{{  $prospecto->etapa_id  }}" />
		<div class="form-group col-md-4">
			<label for="valor">Valor de oportunidad:</label>
			<input type="number" step=".01" class="form-control" name="valor" value="{{ $prospecto->valor }}">
		</div>
		<div class="form-group col-md-4">
			<label for="fecha_estimada">Fecha estimada de cierre:</label>
			<input type="date" class="form-control" name="fecha_estimada" value="{{ $prospecto->valor }}">
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-6">
			<label for="notas">Involucrados</label>
			<textarea class="form-control" name="involucrados" rows="3">{{$prospecto->involucrados}}</textarea>
		</div>
		<div class="form-group col-md-6">
			<label for="notas">Notas</label>
			<textarea class="form-control" name="notas" rows="3">{{$prospecto->notas}}</textarea>
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-12">
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="/prospectos/{{ $prospecto->id }}"><button type="button" class="btn btn-secondary p-2 btn-sm">Cancelar</button></a>
   		</div>
   		
	</div>
	
	

</form>








@endsection