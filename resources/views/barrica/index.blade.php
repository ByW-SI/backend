@extends('layouts.app2')
@section('content')
{{-- expr --}}

<div class="container">

</div>

<div class="container">
	<div class="col-6">
		<h1>Barricas</h1>
	</div>
	<br>
	<div class="col-6">
		<a href="{{ route('barricas.create') }}" class="btn btn-primary float-right">
			<i class="fa fa-plus-circle" aria-hidden="true"></i>
			Barrica
		</a>
	</div>
	<br>
	<div class="col 12 mt-3">
		<div class="table-responsive">
			<table class="table shadow-sm">
				<thead class="thead-dark">
					<tr>
						<th nowrap scope="col">Tipo</th>
						<th nowrap scope="col">Tostado</th>
						<th nowrap scope="col">Uva</th>
						<th nowrap scope="col">Productor</th>
						<th nowrap scope="col">Bodega/Casa</th>
						<th nowrap scope="col">Fecha inicio</th>
						<th nowrap scope="col">Fecha embotellado</th>
						<th nowrap>Precio barrica</th>
						<th nowrap>Precio caja</th>
						<th nowrap>Precio vino</th>
						<th nowrap>Acción</th>
					</tr>
				</thead>
				<tbody class="bg-white">
					@forelse ($barricas as $barrica)
					{{-- expr --}}
					<tr>
						<td nowrap scope="row">
							{{$barrica->tipo_bar}}
						</td>
						<td nowrap>
							{{$barrica->tostado}}
						</td>
						<td nowrap>
							{{$barrica->uva}}
						</td>
						<td nowrap>
							{{$barrica->enologo->tipo}} {{$barrica->enologo->nombre}}
							{{$barrica->enologo->paterno}}
							{{$barrica->enologo->materno}}
						</td>
						<td nowrap>
							@if (isset($barrica->bodega))
							{{-- true expr --}}
							{{$barrica->bodega->nombre}}
							@else
							{{-- false expr --}}
							@endif
						</td>
						<td nowrap>{{$barrica->fecha_inicio}}</td>
						<td nowrap>{{$barrica->fecha_embotellado}}</td>
						<td nowrap>$ {{ number_format( $barrica->precio_venta_barrica, 2, '.', ',' ) }} USD
						</td>
						<td nowrap>$ {{ number_format( $barrica->precio_venta_caja, 2, '.', ',' ) }} USD
						</td>
						<td nowrap>$ {{ number_format( $barrica->precio_venta_botella, 2, '.', ',' ) }} USD
						</td>
						<td nowrap>
							<a class="btn btn-warning" href="{{ route('barricas.edit',[$barrica]) }}">Editar</a>
							<a class="btn btn-primary"
								href="{{ route('barricas.procesos.index',[$barrica]) }}">Proceso</a>
							<form action="{{ route('barricas.destroy',[$barrica]) }}" method="POST" class="form-inline"
								style="display: inline">
								<input type="hidden" name="_method" value="DELETE">
								@csrf
								<button type="submit" class="btn btn-danger"
									onclick="return confirm('¿Estás seguro que desea eliminar este barrica?');">Eliminar</button>
							</form>
						</td>
					</tr>
					@empty
					{{-- empty expr --}}
					<div class="alert alert-danger" role="alert">
						<span>No hay barricas</span>
					</div>
					@endforelse
				</tbody>
			</table>
			<div>
				{{$barricas->links()}}
			</div>
		</div>
	</div>
</div>
@endsection