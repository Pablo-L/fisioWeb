@extends ('layout')

@section('contenido')

<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
			<br><br>
            <div>
                <x-label style="color:white" for="nombre" :value="__('Nombre')" />

                <x-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus />
            </div>
			
			<!-- Apellidos -->
			<div>
                <x-label style="color:white" for="apellidos" :value="__('Apellidos')" />

                <x-input id="apellidos" class="block mt-1 w-full" type="text" name="apellidos" :value="old('apellidos')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label style="color:white" for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>
			
			<!-- Telefono -->
            <div class="mt-4">
                <x-label style="color:white" for="telefono" :value="__('Teléfono')" />

                <x-input id="telefono" class="block mt-1 w-full" type="text" name="telefono" :value="old('telefono')" required />
            </div>
			
			<!-- Sexo -->
            <div class="mt-4">
                <x-label style="color:white" for="telefono" :value="__('Sexo')" />
                <x-input id="sexoMujer" class="block mt-1" type="radio" name="sexo" :value="old('M')" value="M" required />
				<label style="color:white" for="sexoMujer">Mujer</label>
                <x-input id="sexoHombre" class="block mt-1" type="radio" name="sexo" :value="old('H')" value="H" required />
				<label  style="color:white" for="sexoHombre">Hombre</label>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label style="color:white" for="password" :value="__('Contraseña')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label style="color:white" for="password_confirmation" :value="__('Confirmar Contraseña')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a style="color:white" class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('¿Ya estás registrado?') }}
                </a>

                <x-button style="color:white" class="ml-4">
                    {{ __('Registrarse') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
@stop
