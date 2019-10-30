@extends('base')
@section('contenido')

@isset($tipo)
    <div class="alert alert-{{ $tipo }}" role="alert">
      {{ $mensaje }}
    </div>
@endisset

<div class="row">
    <h1>Clientes</h1>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Correo</th>
                <th scope="col">Telefono</th>
                <th scope="col" colspan="3">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($clientes as $cliente)
            <tr>
                <th scope="row">{{ $cliente->id }}</th>
                <td>{{ $cliente->nombre }}</td>
                <td>{{ $cliente->apellidos }}</td>
                <td>{{ $cliente->correo }}</td>
                <td>{{ $cliente->telefono }}</td>
                <td><a href="{{ url('cliente/' . $cliente->id ) }}" class="btn btn-primary">Ver</a></td>
                <td><a href="{{ url('cliente/' . $cliente->id . '/edit') }}" class="btn btn-info">Editar</a></td>
                <td>
                    <form action="{{ url('cliente/' . $cliente->id) }}" method="POST" class="destroy">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger" value="Eliminar"/>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href="{{ url('cliente/create') }}" class="btn btn-info">Agregar cliente</a>
</div>

@stop