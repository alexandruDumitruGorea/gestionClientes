@extends('base')
@section('contenido')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row">
    <h1>Añadir Clientes</h1>
    <table class="table">
        <tbody>
            <form action="{{ url('cliente') }}" method="post">
                @csrf
                <tr>
                    <td>
                        <label for="nombre">Nombre</label>
                    </td>
                    <td>
                        <input type="text" name="nombre" placeholder="Nombre cliente" required value="{{ old('nombre') }}" minlenght="2" maxlenght="50"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="apellidos">Apellidos</label>
                    </td>
                    <td>
                        <input type="text" name="apellidos" placeholder="Apellidos cliente" required value="{{ old('apellidos') }}" minlenght="2" maxlenght="50"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="fechaNac">Fecha Nacimiento</label>
                    </td>
                    <td>
                        <input type="date" name="fechaNac" placeholder="Fecha Nac aaaa/mm/dd" required value="{{ old('fechaNac') }}"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="correo">Correo</label>
                    </td>
                    <td>
                        <input type="email" name="correo" placeholder="Correo cliente"  value="{{ old('correo') }}"  maxlenght="120"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="clave">Contraseña</label>
                    </td>
                    <td>
                        <input type="password" name="clave" placeholder="Contraseña cliente" required value="{{ old('clave') }}" pattern="[a-zA-Z0-9._ -]{6,10}" maxlength="10"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="telefono">Teléfono</label>
                    </td>
                    <td>
                        <input type="text" name="telefono" placeholder="Teléfono cliente"  lenght="9" value="{{ old('telefono') }}"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="direccion">Dirección</label>
                    </td>
                    <td>
                        <input type="text" name="direccion" placeholder="Dirección cliente" value="{{ old('direccion') }}"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="estadoCivil">Estado Civil</label>
                    </td>
                    <td>
                        <input type="text" name="estadoCivil" placeholder="Estado civil cliente" value="{{ old('estadoCivil') }}"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="sueldoAnual">Sueldo Anual</label>
                    </td>
                    <td>
                        <input type="number" name="sueldoAnual" placeholder="Sueldo anual cliente" value="{{ old('sueldoAnual') }}" min="0.000" max="9999999.999" step="0.001"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" class="btn btn-success" value="Añadir Cliente">
                    </td>
                </tr>
            </form>
        </tbody>
    </table>
    <a href="{{ route('cliente.index') }}" class='btn btn-info'>Volver</a>
</div>

@stop