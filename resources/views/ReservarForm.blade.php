@extends ('layout')

@section('contenido')
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <nav class="navbar navbar-expand-lg navba bg">
		  <a class="navbar-brand" style="color:grey;">Haz tu reserva con el doctor: XX</a>
		  </nav>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('reservar') }}">
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

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-3">
                    {{ __('Reservar') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
@stop