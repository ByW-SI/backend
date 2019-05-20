
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
		  <a href="{{ route('posts.create') }}" class="btn btn-primary">Agregar Nueva Noticia</a>
		</div>
		<br>
		<br>
		<div class="container-fluid">
			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th scope="col">Titulo</th>
						<th scope="col">Subtitulo</th>
						<th scope="col">Categorias</th>
						<th scope="col">etiquetas</th>
						<th scope="col">Liga</th>
						<th scope="col">Acciones</th>
					</tr>
				</thead>
				<tbody>
					@forelse ($posts as $post)
						{{-- expr --}}
					<tr>
						<th scope="row">{{$post->title}}</th>
						<th>{{$post->subtitle}}</th>
						<th>
							@forelse ($post->categorias as $categoria)
								<a href="{{ route('posts.categorias.slug',['slug'=>$categoria->slug]) }}" class="btn btn-primary" target="_blank">{{$categoria->name}}</a>
								{{-- expr --}}
							@empty
								No tiene categorias
							@endforelse
						</th>
						<th>
							@forelse ($post->tags as $tag)
								<a href="{{ route('posts.etiquetas.slug',['slug'=>$tag->slug]) }}" class="btn btn-primary" target="_blank">{{$tag->name}}</a>
								{{-- expr --}}
							@empty
								No tiene etiquetas
							@endforelse
						</th>
						<th><a href="{{ route('posts.slug',['slug'=>$post->slug]) }}" class="btn btn-info" target="_blank">Abrir</a></th>
						<th>
							<div class="d-flex justify-content-around">
								<a href="{{ route('posts.show',['post'=>$post]) }}" class="btn btn-info">Ver</a>
								<a href="{{ route('posts.edit',['post'=>$post]) }}" class="btn btn-success">Editar</a>
								<form action="{{ route('posts.destroy',[$post]) }}" method="POST">
									@method('DELETE')
									@csrf
									<button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro que desea eliminar este post?');">Eliminar</button>
								</form>
								
							</div>
						</th>
					</tr>
					@empty
						{{-- empty expr --}}
						No hay Noticias 
					@endforelse
					
				</tbody>
			</table>
			{{ $posts->links() }}
		</div>
	</div>
@endsection