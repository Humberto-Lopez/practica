@extends('adminlte::page')

@section('title', 'Nuevos Usuarios')

@section('content_header')
    <h1>Usuarios</h1>
@stop

@section('content')
    
<div class="container">
    <div class="heading"><?php
    if($cliente->name == null){
      echo "Registro de Usuarios";
    }else{
      echo "Actualizar datos del Usuario";
    }
    ?>
      </div>
    <form class="form" action="{{route('clientes.guardar')}}" method="POST">
      @csrf
      <input type="hidden" name="id" value="{{$cliente->id}}">
      <div class="input-field">
        <input required autocomplete="off" type="text" value="{{$cliente->name}}" name="name" id="nombre">
        <label for="username">Nombre Completo</label>
      </div>
      <div class="input-field">
        <input required autocomplete="off" type="email" value="{{$cliente->email}}" name="em" id="email">
        <label for="username">Correo Eléctronico</label>
      </div>
      <div class="input-field">
        <input  autocomplete="off" minlength="8" type="password" required  name="ps" id="password">
        <label for="username">Contraseña</label>
      </div>
      <div class="input-field">
        <input required maxlength="13" minlength="13" autocomplete="off" type="text" value="{{$cliente->rfc}}" name="rfc" id="rfc">
        <label for="email">RFC</label>
      </div>
      <div class="input-field">
        <input required="" autocomplete="off" type="text" value="{{$cliente->contacto}}" name="cont" id="contacto"/>
        <label for="username">Contacto</label>
      </div>
      <div class="input-field">
        <input required maxlength="10" minlength="10" autocomplete="off" type="tel" value="{{$cliente->telefono_contacto}}" name="telc" id="tel"/>
        <label for="username">Telefono de Contacto</label>
      </div>
      <div class="input-field">
        <input required="" autocomplete="off" type="text" value="{{$cliente->direccion}}" name="dir" id="dir"/>
        <label for="username">Dirección</label>
      </div>
      <div class="input-field">
        <label for="rol">Rol de usuario</label><br><br>
        <select name="rol" id="rol">
          <option disabled selected>Elige un rol</option>
          <option value="C" <?php if($cliente->rol == 'C'){ echo "selected";}?> >Cliente</option>
          <option value="T" <?php if($cliente->rol == 'T'){ echo "selected";}?> >Técnico</option>
          <option value="A" <?php if($cliente->rol == 'A'){ echo "selected";}?> >Admistrador</option>
        </select>
      </div>
  
      <div class="btn-container">
        <button class="btn" type="submit">Guardar Usuario</button>
      </div>
    </form>
  </div>
  
@stop

@section('css')
<style>
        /* From Uiverse.io by Spacious74 */ 
.container {
  border: solid 1px #8d8d8d;
  padding: 20px;
  border-radius: 20px;
  background-color: #fff;
}

.container .heading {
  font-size: 1.3rem;
  margin-bottom: 20px;
  font-weight: bolder;
}

.form {
  max-width: 300px;
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.form .btn-container {
  width: 100%;
  display: flex;
  align-items: center;
  gap: 20px;
}

.form .btn {
  padding: 10px 20px;
  font-size: 1rem;
  text-transform: uppercase;
  letter-spacing: 3px;
  border-radius: 10px;
  border: solid 1px #000000;
  border-bottom: solid 1px #90c2ff;
  background: linear-gradient(135deg, #252525, #252525);
  color: #fff;
  font-weight: bolder;
  transition: all 0.2s ease;
  box-shadow: 0px 2px 3px #000d3848, inset 0px 4px 5px #7e7e7e,
    inset 0px -4px 5px #5f5f5f;
}

.form .btn:active {
  box-shadow: inset 0px 4px 5px #0070f0, inset 0px -4px 5px #002cbb;
  transform: scale(0.995);
}

.input-field {
  position: relative;
}

.input-field label {
  position: absolute;
  color: #8d8d8d;
  pointer-events: none;
  background-color: transparent;
  left: 15px;
  transform: translateY(0.6rem);
  transition: all 0.3s ease;
}

.input-field input, select {
  padding: 10px 15px;
  font-size: 1rem;
  border-radius: 8px;
  border: solid 1px #8d8d8d;
  letter-spacing: 1px;
  width: 100%;
}

.input-field input:focus,
.input-field input:valid {
  outline: none;
  border: solid 1px #0034de;
}

.input-field input:focus ~ label,
.input-field input:valid ~ label {
  transform: translateY(-51%) translateX(-10px) scale(0.8);
  background-color: #fff;
  padding: 0px 5px;
  color: #0034de;
  font-weight: bold;
  letter-spacing: 1px;
  border: none;
  border-radius: 100px;
}

.form .passicon {
  cursor: pointer;
  font-size: 1.3rem;
  position: absolute;
  top: 6px;
  right: 8px;
}

.form .close {
  display: none;
}

    </style>
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop