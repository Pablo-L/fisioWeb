@extends('layout')
@section('contenido')
<div class="container">
<h2>Tus citas</h2>
@if ($reservas != null && count($reservas)>0)
<table class="table table-bordered table-striped tablehover">
<thead>
<tr>
<th>Dia</th> <th>Hora</th>
<th>Profesional</th> <th>Estado</th>
</tr>
</thead>
<tbody>
 @foreach ($reservas as $reserva)
 <tr>
 
 @if ($reserva->dia > now()->toDateString())
 <td >{{$reserva->dia}}</td> <td >{{$reserva->hora}}</td>
 <td >{{$reserva->trabajador_id}}</td>
 <td>Pendiente</td>
 @elseif ($reserva->dia == now()->toDateString())
 <td style="background:#FC8F03;">{{$reserva->dia}}</td> <td style="background:#FC8F03;">{{$reserva->hora}}</td>
 <td style="background:#FC8F03;">{{$reserva->trabajador_id}}</td>
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
