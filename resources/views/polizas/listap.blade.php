@extends('adminlte::page')
@section('title', 'Lista de Polizas')
@section('content_header')
<h1>Polizas</h1>
@stop
@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h3 class="card-title">Polizas Registradas</h3>
    </div>

    <div class="card-body">

        <table id="users-table" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Cliente</th>
                    <th>Precio</th>
                    <th>Horas Totales</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Observaciones</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($polizas as $poli)
                    <tr>
                        <td>
                            @foreach ($clientes as $cliente)
                                @if ($poli->id_cliente == $cliente->id)
                                    {{ $cliente->name }}
                                @endif
                            @endforeach
                        </td>
                        <td>${{ $poli->precio }}</td>
                        <td>{{ $poli->total_horas }}</td>
                        <td>{{ $poli->fecha_inicio }}</td>
                        <td>{{ $poli->fecha_fin }}</td>
                        <td>{{ $poli->Observaciones }}</td>
                        <td>
                            <a href="{{route('polizas.editar', $poli->id)}}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{route('polizas.eliminar', $poli->id)}}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop
@section('css')
{{-- Add here extra stylesheets --}}
{{--
<link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop
@section('js')
<script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop