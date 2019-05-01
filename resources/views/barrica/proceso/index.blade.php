@extends('layouts.app2')
@section('content')
	{{-- expr --}}
	<div class="container-fluid">
		<div class="container">
			<div class="col">
				<h1>Proceso de la barrica tipo {{$barrica->tipo_bar.", tostado ".$barrica->tostado.", tipo de uva ".$barrica->uva." del productor ".$barrica->enologo->tipo." ".$barrica->enologo->nombre." ".$barrica->enologo->paterno." ".$barrica->enologo->materno}}</h1>
			</div>
			<div class="col-3 input-group input-group-lg mb-3">
		  		<a href="{{ route('barricas.procesos.index',['barrica'=>$barrica]) }}" class="btn btn-info">Regresar a barricas</a>
			</div>
			<div class="col-3 offset-6 input-group input-group-lg mb-3">
		  		<a href="{{ route('barricas.procesos.create',['barrica'=>$barrica]) }}" class="btn btn-primary">Agregar nuevo proceso</a>
			</div>
		</div>
		<br>
		<br>
		<br>
		<br>
		<div class="container-fluid">
			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th scope="col" style="width: 100px">Proceso</th>
						<th scope="col">Descripcion</th>
						<th scope="col">Fecha de inicio del proceso</th>
						<th scope="col">Fecha tentativa del fin del proceso </th>
						<th>Acción</th>
					</tr>
				</thead>
				<tbody>
					@forelse ($procesos as $proceso)
						<tr>
							<th scope="row">					{{$proceso->proceso}}
							</th>
							<th>
								
								{{$proceso->descripcion}}
							
							</th>
							<th>
								
								{{$proceso->inicio_proceso}}
							
							</th>
							<th>{{$proceso->fin_proceso}}</th>
							<th>
								<a class="btn btn-default" href="{{ route('barricas.procesos.edit',[$barrica,$proceso]) }}">Editar</a>
								<form action="{{ route('barricas.procesos.destroy',[$barrica,$proceso]) }}" method="POST">
									<input type="hidden" name="_method" value="DELETE">
									@csrf
									<button type="submit" class="btn btn-link" onclick="return confirm('¿Estás seguro que desea eliminar este proceso?');">Eliminar</button>
								</form>
							</th>
						</tr>
					@empty
						<div class="alert alert-danger" role="alert">
							<span>No hay procesos</span>
						</div>
					@endforelse
				</tbody>
			</table>
			<div>
				{{$procesos->links()}}
			</div>
		</div>
	</div>
@endsection