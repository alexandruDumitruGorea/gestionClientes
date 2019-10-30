@extends('base')
@section('contenido')

<div class="row">
    <h1>Cliente: {{ $cliente->id }}</h1>
    <table class="table table-striped table-hover">
        <tr>
            <td>Nombre</td>
            <td>{{ $cliente->nombre }}</td>
        </tr>
        <tr>
            <td>Apellidos</td>
            <td>{{ $cliente->apellidos }}</td>
        </tr>
        <tr>
            <td>Fecha Nacimiento</td>
            <td>{{ $cliente->fechaNac }}</td>
        </tr>
        <tr>
            <td>Correo</td>
            <td>{{ $cliente->correo }}</td>
        </tr>
        <tr>
            <td>Clave</td>
            <td>{{ $cliente->clave }}</td>
        </tr>
        <tr>
            <td>Teléfono</td>
            <td>{{ $cliente->telefono }}</td>
        </tr>
        <tr>
            <td>Dirección</td>
            <td>{{ $cliente->direccion }}</td>
        </tr>
        <tr>
            <td>IP</td>
            <td>{{ $cliente->ip }}</td>
        </tr>
        <tr>
            <td>Estado Civil</td>
            <td>{{ $cliente->estadoCivil }}</td>
        </tr>
        <tr>
            <td>Sueldo Anual</td>
            <td>{{ $cliente->sueldoAnual }}</td>
        </tr>
    </table>
    <a href="{{ route('cliente.index') }}" class='btn btn-info'>Volver</a>
</div>

@stop