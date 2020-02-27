@extends('layout')
@section('content')


<h3 class='text-center'>Estatus de proyecto</h3>
<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalprocedencia" id="open">Agregar estatus</button>
@if ($errors->any())
<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif
<div class="table-responsive">
	<table class="table">
		<thead>
			<tr>
				<th></th>
				<th>Estatus de proyecto</th>
				<th>Orden</th>
			</tr>
		</thead>
		@foreach($estatusproyectos as $estatus)
		<tr>
			<td>
				<!--<a href="/estatusproyectos/{{ $estatus->id }}/form"><i class="far fa-edit"></i></a>&nbsp;
				<a href="/estatusproyectos/delete/{{ $estatus->id }}"><i class="far fa-trash-alt"></i></a>-->
			</td>
			<td>{{ $estatus->estatus }}</td>
			<td>{{ $estatus->orden }}</td>
		</tr>
		@endforeach
	</table>
</div>
<!--Modal procedencia-->
<form method="post" action="{{url('estatusproyectos')}}" id="form">
@csrf
	<div class="modal" tabindex="-1" role="dialog" id="modalprocedencia">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="alert alert-danger" style="display:none"></div>
				<div class="modal-header">

					<h5 class="modal-title">Agregar estatus de proyecto</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="form-group col-md-12">
							<label for="estatus">Estatus de proyecto:</label>
							<input type="text" class="form-control" name="estatus">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label for="orden">Orden:</label>
							<input type="text" class="form-control" name="orden">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					<button  class="btn btn-success" >Guardar</button>
				</div>
			</div>
		</div>
	</div>
</form>


@endsection