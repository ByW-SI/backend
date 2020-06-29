@extends('layouts.app2')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="{{route('ofertas.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <p class="text-monospace pl-2">Sujeto a disponibilidad, no incluye gastos de envío.</p>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">

                    {{-- LEFT --}}
                    <div class="col-12 col-md-6">

                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 mt-2">
                                        <label for="" class="text-uppercase text-muted">Nombre del vino</label>
                                        <input type="text" class="form-control" name="nombre_vino"
                                            placeholder="Nombre del vino">
                                    </div>
                                    {{-- <div class="col-12 mt-2">
                                        <label for="" class="text-uppercase text-muted">Tipo de uva</label>
                                        <select name="uva_id" id="" class="form-control" required>
                                            <option value="">Seleccionar</option>
                                            @foreach ($uvas as $uva)
                                            <option value="{{$uva->id}}">{{$uva->title}}</option>
                                    @endforeach
                                    </select>
                                </div> --}}
                                <div class="col-12 mt-2">
                                    <label for="" class="text-uppercase text-muted">Añada</label>
                                    <input name="aniada" type="number" class="form-control" required value="0">
                                </div>
                                <div class="col-12 mt-2">
                                    <label for="" class="text-uppercase text-muted">Tipo de vino</label>
                                    <select name="tipo_vino" id="" class="form-control" required>
                                        <option value="">Seleccionar</option>
                                        <option value="tinto">tinto</option>
                                        <option value="rosado">rosado</option>
                                        <option value="blanco">blanco</option>
                                        <option value="postre">postre</option>
                                    </select>
                                </div>
                                <div class="col-12 mt-2">
                                    <label for="" class="text-uppercase text-muted">Comentario</label>
                                    <textarea name="comentario" rows="5" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-12 mt-2">

                                <select name="" id="inputUvas" class="form-control">
                                    <option value="">Seleccionar</option>
                                    @foreach ($uvas as $uva)
                                    <option value="{{$uva->id}}">{{$uva->title}}</option>
                                    @endforeach
                                </select>
                                {{-- BOTON ANADIR UVA --}}
                                <button type="button" class="btn btn-success" id="botonAnadirUva">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </button>
                                {{-- BOTON QUITAR UVA --}}
                                {{-- <button type="button" class="btn btn-danger" id="botonQuitarUva">
                                    <i class="fa fa-minus" aria-hidden="true"></i>
                                </button> --}}
                            </div>
                            <div class="col-12 mt-2" id="contenedorInputsNuevaUva">
                                {{--  --}}
                            </div>
                        </div>
                    </div>
                </div>

                {{-- RIGHT --}}
                <div class="col-12 col-md-6">
                    <div class="row">
                        <div class="col-12 mt-2">
                            <label for="logo" class="text-uppercase text-muted">Imagen:</label>
                            <input type="file" id="logo" name="imagen" class="file" required>
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                {{-- INPUT PRECIO BOTELLA--}}
                                <div class="col-12 col-md-4 mt-2">
                                    <label for="" class="text-uppercase text-muted">Costo botella</label>
                                    <input id="inputCostoBotella" name="costo_botella" type="number" step="any"
                                        class="form-control" min="0" value="0">
                                </div>
                                {{-- INPUT PRECIO PROVEEDOR CAJA--}}
                                <div class="col-12 col-md-4 mt-2">
                                    <label for="" class="text-uppercase text-muted">% transporte</label>
                                    <input id="inputPorcentajeTransporte" name="porcentaje_transporte" type="number"
                                        step="any" class="form-control" min="0" value="0">
                                </div>
                                {{-- INPUT PRECIO PROVEEDOR CAJA--}}
                                <div class="col-12 col-md-4 mt-2">
                                    <label for="" class="text-uppercase text-muted">% utilidad</label>
                                    <input id="inputPorcentajeUtilidad" name="porcentaje_utilidad" type="number"
                                        step="any" class="form-control" min="0" value="0">
                                </div>
                                {{-- INPUT PRECIO PROVEEDOR CAJA--}}
                                <div class="col-12 col-md-4 mt-2">
                                    <label for="" class="text-uppercase text-muted">Costo proveedor caja</label>
                                    <input id="inputCostoCaja" type="number" step="any" class="form-control" min="0"
                                        value="0" readonly>
                                </div>
                                {{-- INPUT SUBTOTAL VENTA--}}
                                <div class="col-12 col-md-4 mt-2">
                                    <label for="" class="text-uppercase text-muted">Subtotal venta</label>
                                    <input id="inputSubtotalVenta" type="number" step="any" class="form-control" min="0"
                                        value="0" readonly>
                                </div>
                                {{-- INPUT SUBTOTAL VENTA--}}
                                <div class="col-12 col-md-4 mt-2">
                                    <label for="" class="text-uppercase text-muted">Costo transporte</label>
                                    <input id="inputCostoTransporte" type="number" step="any" class="form-control"
                                        min="0" value="0" readonly>
                                </div>
                                {{-- INPUT SUBTOTAL VENTA--}}
                                <div class="col-12 col-md-4 mt-2">
                                    <label for="" class="text-uppercase text-muted">Precio público</label>
                                    <input id="inputPrecioPublico" type="number" step="any" class="form-control" min="0"
                                        value="0" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
        <div class="row mt-2">
            <div class="col-12">
                <button class="btn btn-success rounded-0 p-3 float-right"><small>GUARDAR</small></button>
            </div>
        </div>
        </form>
    </div>
</div>
</div>

@endsection

@section('script')

<script>
    function anadirInputsUva(){
        
        const id = $('#inputUvas option:selected').val()
        const title = $('#inputUvas option:selected').text()

        console.log({
            id,
            title,
        })

        $('#contenedorInputsNuevaUva').append(`
        
        <div class="form-group">
            <div class="input-group">
                <input type="hidden" class="form-control" value="${id}" name="uvas_ids[]" readonly>
                <input type="text" class="form-control" value="${title}" readonly>
                &nbsp;
                <input type="text" class="form-control" name="porcentajes[]" placeholder="Porcentaje">
            </div>
        </div>

        `);
    }

    function quitarUva(){
        console.log('quitar uva');
    }

    $(document).change('input', function(){

    $.ajax("/api/ofertas/cotizar", {
        data: {
            costo_botella: $("#inputCostoBotella").val(),
            porcentaje_transporte: $("#inputPorcentajeTransporte").val(),
            porcentaje_utilidad: $("#inputPorcentajeUtilidad").val()
        },
        success: function(response){
            console.log(response)
            $("#inputCostoCaja").val( response.costo_caja )
            $("#inputSubtotalVenta").val( response.subtotal_venta )
            $("#inputCostoTransporte").val( response.costo_transporte )
            $("#inputPrecioPublico").val( response.precio_publico )
        }
    });

})

    $(document).on('click', '#botonAnadirUva', function(){
        anadirInputsUva()
    });

    $(document).on('click', '#botonQuitarUva', function(){
        quitarUva()
    });

</script>

@endsection