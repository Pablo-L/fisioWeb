@extends ('layout')
<?php
    use App\Http\Controllers\ReservasController;

    $controlador = new ReservasController();

    $arrayLibres = $controlador->obtenerDiasLibres();
    $arrayDias = $controlador->obtenerDiasSemana();
?>
@section('contenido')
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <nav class="navbar navbar-expand-lg navba bg">
		  <a class="navbar-brand" style="color:grey;">Haz tu reserva con el doctor: {{$trabajador_id}}</a>
		  </nav>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form id="reservaForm" name="reservaForm" method="POST" action="{{route('reservar')}}">
            @csrf

            <!-- Tratamientos -->
            <div class="mt-4">
                <label>Tratamiento</label>
                <select name="tratamiento_id" id="tratamiento_id" required>
                @foreach($tratamientos as $tratamiento)
                <option label="{{$tratamiento->nombre}}" value="{{$tratamiento->id}}"></option>
                @endforeach
                </select>
            </div>

            <!-- Días -->
            <div class="mt-4">
                <x-label for="dia" :value="__('Dia')" />
                <!--<x-input id="dia" class="block mt-1 w-full" type="date" name="dia" :value="old('dia')" required autofocus />-->
                <select id="dia" name="dia">
                @foreach($arrayDias as $dia)
                    @if( in_array($dia, $arrayLibres) )
                    <option style="color:red">{{$dia}}</option>
                    @else
                    <option>{{$dia}}</option>
                    @endif
                @endforeach
                </ul>
            </div>

            <!-- Hora -->
            <div class="mt-4">
                <x-label for="hora" :value="__('Hora')" />
                <x-input id="hora" class="block mt-1 w-full" type="time" name="hora" :value="old('hora')" required autofocus />
            </div>
            <x-input id="trabajador_id" type="hidden" name="trabajador_id" value="{{$trabajador_id}}"/>
            <x-input id="cliente_id" type="hidden" name="cliente_id" value="{{Auth::user() ->id}}"/>
            <span id="spanMensaje" style="color:green;"></span>
            <div class="flex items-center justify-end mt-4">
                <input type="submit" value="Reservar cita" class="ml-3" onclick="">
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
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

