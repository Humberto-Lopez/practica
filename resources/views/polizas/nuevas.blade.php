@extends('adminlte::page')

@section('title', 'Nuevos Polizas')

@section('content_header')
<h1>Polizas</h1>
@stop

@section('content')

<div class="container">
  <div class="heading">
  @if ($polizas->id == null)
  Registro de Polizas
  @else
  Actualizar datos de Poliza
  @endif
  </div>
  <form class="form" action="{{route('polizas.guardar')}}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $polizas->id }}">
    <div class="input-field">
      <input required autocomplete="off" type="number" value="{{ $polizas->total_horas }}" name="total_horas" id="total_horas">
      <label for="username">Total de Horas</label>
    </div>
    <label for="fecha_inicio">Fecha de Inicio</label>
    <div class="input-field">
      <input required autocomplete="off" type="date" value="{{ $polizas->fecha_inicio }}" name="fecha_inicio" id="fecha_inicio">
    </div>
    <label for="fecha_fin">Fecha de Fin</label>
    <div class="input-field">
      <input required autocomplete="off" type="date" value="{{ $polizas->fecha_fin }}" name="fecha_fin" id="fecha_fin">
    </div>
    <div class="input-field">
      <input required autocomplete="off" type="text" value="{{ $polizas->precio }}" name="precio" id="precio" maxlength="8" onkeydown="soloNumeros(event)">
      <label for="username">Precio</label>
    </div>
    <div class="input-field">
      <select name="id_cliente" id="id_cliente">
        <option value="" selected>Cliente a asignar...</option>
        @foreach($clientes as $cliente)
      <option value="{{ $cliente->id }}" <?php if($polizas->id_cliente == $cliente->id){ echo "selected";}?> >{{ $cliente->name }}</option>
    @endforeach
      </select>
    </div>
    <label for="username">Observaciones</label>
    <div class="input-field">
      <textarea name="observaciones" id="observaciones" cols="8" rows="10">{{$polizas->Observaciones}}</textarea>
    </div>

    <div class="btn-container">
      <button class="btn" type="submit">Guardar Poliza</button>
    </div>
  </form>
</div>

@stop

@section('css')
<style>
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

  .input-field input,
  select,
  textarea {
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

  .input-field input:focus~label,
  .input-field input:valid~label {
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
<script>
  function soloNumeros(event) {
    const key = event.key;
    if (!/^[0-9]$/.test(key) && key !== "Backspace" && key !== "Delete") {
      event.preventDefault();
    }
  }
</script>
@stop