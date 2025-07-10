@extends('adminlte::page')
@section('title', 'Lista de Usuarios')
@section('content_header')
    <h1>Usuarios</h1>
@stop
@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h3 class="card-title">Usuarios Registrados</h3>
    </div>
        
    <div class="card-body">
    <form action="{{ route('clientes') }}" method="GET" class="mb-3">
        <label for="roles">Filtrar por Rol:</label>
        <select name="rol" id="roles" class="form-control" onchange="this.form.submit()">
            <option value="" {{ request('rol') == '' ? 'selected' : '' }}>Todos</option>
            <option value="A" {{ request('rol') == 'A' ? 'selected' : '' }}>Administradores</option>
            <option value="T" {{ request('rol') == 'T' ? 'selected' : '' }}>Técnicos</option>
            <option value="C" {{ request('rol') == 'C' ? 'selected' : '' }}>Clientes</option>
        </select>
    </form>
        <table id="users-table" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo Electrónico</th>
                    <th>RFC</th>
                    <th>Contacto</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->rfc }}</td>
                    <td>{{ $user->contacto }}</td>
                    <td>{{ $user->telefono_contacto }}</td>
                    <td>{{ $user->direccion }}</td>
                    <td>
                    <?php
                    switch ($user->rol) {
                        case 'A':
                            echo 'Administrador';
                            break;
                        case 'C':
                            echo 'Cliente';
                            break;
                        case 'T':
                            echo 'Técnico';
                            break;
                        default:
                            echo 'Sin Rol';
                            break;
                    }
                    ?>
                    </td>
                    <td>
                        <a href="{{route('clientes.editar',$user->id)}}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{route('clientes.eliminar',$user->id)}}" method="POST" style="display:inline-block;">
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
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop
@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop