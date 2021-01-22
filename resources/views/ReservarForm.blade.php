@extends ('layout')
<?php
    use App\Http\Controllers\ReservasController;
    use App\Http\Controllers\TrabajadoresController;
    $controlador = new ReservasController();

    $trabajador = new TrabajadoresController();
    $arrayLibres = $controlador->obtenerDiasLibres();
    $arrayDias = $controlador->obtenerDiasSemana();
?>
@section('contenido')
    <div class="container">
		  <h2 style="color:grey;">Haz tu reserva con {{$trabajador->obtenerNombre($trabajador_id)}}</h2>


		@if (\Session::has('error'))
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
                {!! \Session::get('error') !!}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
			</div>
		@endif
        <div style="align:center;">
        <div style="background:grey;
                    position:relative;
                    display:table;
                    padding:10px; 
                    border-radius:10px;
                    margin-bottom:25px;">
            <form id="reservaForm" name="reservaForm" method="POST" action="{{route('reservar')}}">
                @csrf

                <!-- Tratamientos -->
                <div class="mt-4">
                    <label>Tratamiento</label></br>
                    <select name="tratamiento_id" id="tratamiento_id" required>
                    @foreach($tratamientos as $tratamiento)
                    <option label="{{$tratamiento->nombre}}" value="{{$tratamiento->id}}"></option>
                    @endforeach
                    </select>
                </div>

                <!-- Días -->
                <div class="mt-4">
                    <label>Dia</label></br>
                    <!-- Muestra en rojo los días no disponibles -->
                    <select id="dia" name="dia">
                    @foreach($arrayDias as $dia)
                        @if( in_array($dia, $arrayLibres) )
                        <option style="color:red">{{$dia}}</option>
                        @else
                        <option>{{$dia}}</option>
                        @endif
                    @endforeach
                    </select>
                </div>

                <!-- Hora -->
                <div class="mt-4">
                    <label>Hora</label></br>
                    <x-input id="hora" class="block mt-1 w-full" type="time" name="hora" :value="old('hora')" required autofocus />
                </div>
                <!-- Campos ocultos -->
                <x-input id="trabajador_id" type="hidden" name="trabajador_id" value="{{$trabajador_id}}"/>
                <x-input id="cliente_id" type="hidden" name="cliente_id" value="{{Auth::user() ->id}}"/>
                <span id="spanMensaje" style="color:green;"></span>

                <!-- Botón reservar -->
                <div class="mt-4">
                    <input type="submit" value="Reservar cita">
                </div>
            </form>
        </div>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
@section('js')
    function reservar() {
        console.log('funciona');

        var formDataValues = document.forms.namedItem("reservaForm");
        var formValues = new FormData(formDataValues);

            $.ajax({
                type: 'POST',
                url: 'http://localhost:8000/reservar',
                processData: false,
                contentType: false,
                dataType: 'json',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                data: formValues,

                success: function (data) {
                    $("#spanMensaje").html('OK');
                },
                error: function (data) {
                    $("#spanMensaje").html('KO');
                }
            });
    }
@endsection
@stop

