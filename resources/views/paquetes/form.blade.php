@extends('layouts.app2')
@section('content')

<div class="container">
    <p class="text-uppercase text-muted">CREAR PAQUETE</p>
    <div class="col-12 col-md-3"></div>
    <div class="col-12 col-md-6">
        <div class="card">
            <div class="card-body">
                <form action="{{route('paquetes.store')}}" method="POST">
                    @csrf
                    <div class="col-12">
                        <label for="" class="text-uppercase text-muted"><small>BOTELLAS</small></label>
                        <div class="card">
                            <div class="card-body">
                                {{--  --}}
                                <div class="input-group mb-3">
                                    <select name="oferta_id" id="inputIdVino" class="form-control">
                                        <option value="">seleccionar</option>
                                        @foreach ($ofertas as $oferta)
                                            <option value="{{$oferta->id}}" precio="{{$oferta->precio_publico}}">{{$oferta->nombre_vino}}</option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-append">
                                        <a href="#" class="btn btn-success" id="botonAnadirBotella">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                                {{--  --}}
                                <div id="contenedorInputsBotellas">
        
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="" class="text-uppercase text-muted"><small>COSTO</small></label>
                        <div class="card">
                            <div class="card-body">
                                <label for="" class="text-uppercase text-muted" style="text-decoration: line-through">9999</label>
                                <input type="text" name="precio" class="form-control" placeholder="Nuevo costo">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-2">
                        <button class="btn btn-success">GUARDAR</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-3"></div>
</div>

@endsection

@section('script')

<script>

function anadirBotella(){
    vinoId = $('#inputIdVino option:selected').val()
    nombreVino = $('#inputIdVino option:selected').text()
    precio = $('#inputIdVino option:selected').attr('precio')

    console.table({
        vinoId,
        nombreVino,
        precio
    })

    $('#contenedorInputsBotellas').append(`
        <input type="hidden" class="form-control" value="${vinoId}" name="vinos_ids[]" readonly>
        <label for="" class="text-uppercase text-muted">VINO</label>
        <input type="text" class="form-control mb-3" value="${nombreVino}" readonly>
        <label for="" class="text-uppercase text-muted">PRECIO</label>
        <input type="text" class="form-control" value="${precio}" readonly>
        <hr>
    `)

}

$(document).on('click', '#botonAnadirBotella', function(){
    anadirBotella()
})

</script>

@endsection