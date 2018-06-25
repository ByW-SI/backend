@extends('layouts.app2')
@section('content')
	{{-- expr --}}
	<div class="container-fluid">
		<div class="col-6 input-group input-group-lg mb-3">
		  <div class="input-group-prepend">
		    <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
		  </div>
		  <input type="text" class="form-control" placeholder="Buscar.." aria-label="Buscar.." aria-describedby="basic-addon1">
		</div>
		<div class="col-3 input-group input-group-lg mb-3">
		  <a href="{{ route('uvas.create') }}" class="btn btn-primary">Agregar Nueva Uva</a>
		</div>
		<br>
		<br>
		<div class="container-fluid">
			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th scope="col">Nombre de la uva</th>
						<th scope="col">Otros nombres</th>
						<th scope="col">Al olfato</th>
						<th scope="col">Al gusto</th>
						<th scope="col">A la vista</th>
						<th scope="col">Maridajes</th>
						<th scope="col">Acciones</th>
					</tr>
				</thead>
				<tbody>
					@forelse ($uvas as $uva)
						{{-- expr --}}
					<tr>
						<th scope="row">{{$uva->title}}</th>
						<th>{{$uva->subtitle}}</th>
						<th>{{$uva->olfato}}</th>
						<th>{{$uva->gusto}}</th>
						<th>{{$uva->vista}}</th>
						<th>{{$uva->maridaje}}</th>
						<th>
							<a href="{{ route('uvas.edit',['uva'=>$uva]) }}" class="btn btn-primary">Editar</a>
							<form method="POST" action="{{ route('uvas.destroy',['uva'=>$uva]) }}">
								@csrf
								<input type="hidden" name="_method" value="DELETE">
								<button action="submit" onclick="return confirm('¿Estás seguro que desea eliminar esta uva?');" class="btn btn-danger">Borrar</button>
								
							</form>
						</th>
					</tr>
					@empty
						{{-- empty expr --}}
						No hay uvas 
					@endforelse
					
				</tbody>
			</table>
			{{ $uvas->links() }}
		</div>
	</div>
@endsection