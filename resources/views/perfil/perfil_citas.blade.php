@extends('layout')
@section('contenido')
<?php 
    use App\Http\Controllers\UserController;
    use App\Http\Controllers\TrabajadoresController;
    $trabajador = new TrabajadoresController();
    $user = new UserController();
?>
@if(Session::has('success'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ Session::get('message', '') }}
    </div>
@endif

<div class="container">
<h2 style="color:#FFFF;">Tus citas</h2>
@if ($reservas != null && count($reservas)>0)
<table class="table table-bordered table-striped tablehover">
<thead>
<tr style="color:#FFFF; background:grey;">
<th>Dia</th>
<th>Hora</th>
    @if(Auth::User()->rol == 'trabajador')
        <th>Paciente</th>
    @else
        <th>Profesional</th>
    @endif
<th>Tratamiento</th>
<th>Precio</th>
<th>Estado</th>
</tr>
</thead>
<tbody>
 @foreach ($reservas as $reserva)
 <tr>
 
 @if ($reserva->dia > now()->toDateString())
 <td style="color:#FFFF;" >{{$reserva->dia}}</td>
 <td  style="color:#FFFF;"  >{{$reserva->hora}}</td>
    @if(Auth::User()->rol != 'trabajador')
    <td   style="color:#FFFF;" >{{$trabajador->obtenerNombre($reserva->trabajador_id)}}</td>
    @else
    <td   style="color:#FFFF;" >{{$user->obtenerNombre($reserva->cliente_id)}}</td>
    @endif
 <td  style="color:#FFFF;" >{{$reserva->nombre}}</td>
 <td  style="color:#FFFF;" >{{$reserva->tarifa}}</td>
 <td  style="color:#FFFF;" >Pendiente</td>
 @elseif ($reserva->dia == now()->toDateString())
 <td style="background:#FC8F03;">{{$reserva->dia}}</td>
 <td style="background:#FC8F03;">{{$reserva->hora}}</td>
    @if(Auth::User()->rol != 'trabajador')
    <td style="background:#FC8F03;">{{$trabajador->obtenerNombre($reserva->trabajador_id)}}</td>
    @else
    <td   style="background:#FC8F03;">{{$user->obtenerNombre($reserva->cliente_id)}}</td>
    @endif
 <td style="background:#FC8F03;">{{$reserva->nombre}}</td>
 <td style="background:#FC8F03;">{{$reserva->tarifa}}</td>
 <td style="background:#FC8F03;">Hoy</td>
 @endif
 </tr>
 @endforeach
 </tbody> </table>
@else
<div class="alert alert-warning">Todavía no tienes ninguna cita</div>
</div>
@endif
@stop
