@extends('layouts.app2')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<div class="card">
				<div class="card-header">
					Proceso
				</div>						
				<div class="card-body">
					@if ($errors->any())
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif
					<form method="POST" action="{{ $edit == false ? route('barricas.procesos.store',['barrica'=>$barrica]) : route('barricas.procesos.update',['barrica'=>$barrica,'proceso'=>$proceso]) }}" enctype="multipart/form-data">
						@csrf

						@if ($edit == true)
							{{-- expr --}}
							<input type="hidden" name="_method" value="PUT">
						@endif
						<div class="form-group row">
							<label for="proceso" class="col-md-4 col-form-label text-md-right">Proceso:</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="proceso" id="proceso" value="{{$edit ? $proceso->proceso : old('proceso')}}" placeholder="Nombre del proceso" required="">
							</div>
						</div>
						<div class="form-group row">
							<label for="descripcion" class="col-md-4 col-form-label text-md-right">Descripción:</label>
							<div class="col-md-6">
								<textarea name="descripcion" id="descripcion" cols="30" rows="5" class="form-control" placeholder="Describa el proceso">{{$edit ? $proceso->proceso : old('proceso')}}</textarea>
							</div>
						</div>
						<div class="form-group row">
							<label for="inicio_proceso" class="col-md-4 col-form-label text-md-right">Fecha del inicio del proceso:</label>
							<div class="col-md-6">
								<input type="date" class="form-control" name="inicio_proceso" id="inicio_proceso" value="{{$edit ? $proceso->inicio_proceso : old('inicio_proceso')}}" placeholder="Fecha de realización del proceso" required="">
							</div>
						</div>
						<div class="form-group row">
							<label for="fin_proceso" class="col-md-4 col-form-label text-md-right">Fecha tentativa del fin del proceso:</label>
							<div class="col-md-6">
								<input type="date" class="form-control" name="fin_proceso" id="fin_proceso" value="{{$edit ? $proceso->fin_proceso : old('fin_proceso')}}" placeholder="Fecha de realización del proceso" required="">
							</div>
						</div>
						<div class="form-group row">
							<label for="imagen_proceso" class="col-md-4 col-form-label text-md-right">Imagen del proceso:</label>
							<div class="col-md-6">
								<input type="file" id="imagen_proceso" name="imagen_proceso" class="file">
							</div>
						</div>
						<div class="form-group row mb-0 mt-3">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrar proceso
                                </button>
                            </div>
                        </div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
