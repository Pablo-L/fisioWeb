@extends ('layout')

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

        <form id="reservaForm" name="reservaForm">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="dia" :value="__('Dia')" />
                <x-input id="dia" class="block mt-1 w-full" type="date" name="dia" :value="old('dia')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="hora" :value="__('Hora')" />
                <x-input id="hora" class="block mt-1 w-full" type="time" name="hora" :value="old('hora')" required autofocus />
            </div>
            <x-input id="trabajador_id" type="hidden" name="trabajador_id" value="{{$trabajador_id}}"/>
            <x-input id="cliente_id" type="hidden" name="cliente_id" value="{{$cliente_id}}"/>
            <span id="spanMensaje" style="color:green;"></span>
            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-3" onclick="reservar()">
                    {{ __('Reservar') }}
                </x-button>
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

