<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mis citas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    ¡Bienvenido a tu perfil de Fisioweb!
                </div>
            </div>
        </div>
    </div>
    <ul>
	@foreach ($reservas as $reserva)
		<li>{{$reserva->hora}}</li>
		<li>{{$reserva->dia}}</li>
	@endforeach
	</ul>

</x-app-layout>
