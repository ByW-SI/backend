@extends('layouts.app2')
@section('content')
	{{-- expr --}}
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						{{$edit ? $post->title : "Nueva noticia"}}
					</div>
					<div class="card-body">
						<form method="POST" enctype="multipart/form-data" action="{{ $edit ? route('posts.update',['post'=>$post]) : route('posts.store') }}">
							@csrf
							{{-- {{dd($uva)}} --}}
							@if ($edit)
								@method('PUT')
							@endif
							<div class="form-group row">
								<label for="title" class="col-md-4 col-form-label text-md-right">Titulo:</label>
								<div class="col-md-6">
									<input class="form-control {{ $errors->has('title') ? ' is-invalid' : ''  }}" id="title" {{-- {{$edit ? 'disabled' : ""}} --}} type="text" name="title" value="{{ $edit ? $post->title : old('title') }}" required>
									@if ($errors->has('title'))
										{{-- expr --}}
										<span class="invalid-feedback">
											<strong>{{ $errors->first("title")}}</strong>
										</span>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<label for="subtitle" class="col-md-4 col-form-label text-md-right">Subtitulo:</label>
								<div class="col-md-6">
									<input class="form-control {{ $errors->has('subtitle') ? ' is-invalid' : ''  }}" {{-- {{$edit ? 'disabled' : ""}} --}} id="subtitle" type="text" name="subtitle" value="{{ $edit ? $post->subtitle : old('subtitle') }}">
									@if ($errors->has('subtitle'))
										{{-- expr --}}
										<span class="invalid-feedback">
											<strong>{{ $errors->first("subtitle")}}</strong>
										</span>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<label for="slug" class="col-md-4 col-form-label text-md-right">Liga de la pagina:</label>
								<div class="col-md-6">
									<input type="text" class="form-control {{ $errors->has('slug') ? ' is-invalid' : ''  }}" {{-- {{$edit ? 'disabled' : ""}} --}} id="slug" name="slug" value="{{$edit ? $post->slug : old('slug')}}">
									@if ($errors->has('slug'))
										<span class="invalid-feedback">
											<strong>{{ $errors->first("slug")}}</strong>
										</span>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<label for="categorias" class="col-md-4 col-form-label text-md-right">Categorias:</label>
								<div class="col-md-6">
									<select name="categorias[]" id="categorias" class="form-control multiple-select{{ $errors->has('categorias') ? ' is-invalid' : ''  }}" multiple="multiple">
										@forelse ($categorias as $categoria)
											<option value="{{$categoria->name}}" {{!isset($mis_categorias) && in_array($categoria->name , $mis_categorias) ? 'selected="selected"' : ''}}>{{$categoria->name}}</option>
										@empty
										@endforelse
									</select>
									@if ($errors->has('categorias'))
										<span class="invalid-feedback">
											<strong>{{ $errors->first("categorias")}}</strong>
										</span>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<label for="etiquetas" class="col-md-4 col-form-label text-md-right">Etiquetas:</label>
								<div class="col-md-6">
									<select name="etiquetas[]" id="etiquetas" class="form-control multiple-select{{ $errors->has('etiquetas') ? ' is-invalid' : ''  }}" multiple="multiple">
										@forelse ($etiquetas as $etiqueta)
											<option value="{{$etiqueta->name}}" {{!isset($mis_etiquetas) && in_array($etiqueta->name , $mis_etiquetas) ? 'selected="selected"' : ''}}>{{$etiqueta->name}}</option>
										@empty
										@endforelse
									</select>
									@if ($errors->has('etiquetas'))
										<span class="invalid-feedback">
											<strong>{{ $errors->first("etiquetas")}}</strong>
										</span>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<label for="image" class="col-md-4 col-form-label text-md-right">Imagen:</label>
								<div class="col-md-6">
									<input name="image" type="file" id="image" class="form-control{{ $errors->has('image') ? ' is-invalid' : ''  }} file" accept="image/jpeg, image/png, image/jpg, image/gif">
									@if ($errors->has('image'))
										<span class="invalid-feedback">
											<strong>{{ $errors->first("image")}}</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="form-group row">
								<div class="col-md-12">
									<textarea name="body" id="body">{{$edit ? $post->body : old('body')}}</textarea>
									@if ($errors->has('body'))
										<span class="invalid-feedback">
											<strong>{{ $errors->first("body")}}</strong>
										</span>
									@endif
								</div>
							</div>
							<div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Guardar
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
@section('script')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
<script type="text/javascript">
	$("#title").keyup(function(){
        var Text = $(this).val();
        Text = Text.toLowerCase();
        var regExp = /\s+/g;
        Text = Text.replace(regExp,'-');
        $("#slug").val(Text);        
	});
	$(".multiple-select").select2({
	  tags: true
	});
</script>

@endsection