<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('css/indexPU.css') }}">
    <title>Administrar Productos</title>
    
</head>
<body>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="encabezado">
        <div class="texto">
            <h1>Mis productos</h2>
           
        </div>
        <br>
        <br>
        <div class="CrearProducto">
            <a href="{{ route('productos.create') }}" class="btnCrear">Nuevo producto</a>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>  
    </div>

    <table class="table">
        <thead >
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Cantidad comprada</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
                <tr>
                    <td>{{ $producto->id }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->precio }}</td>
                    <td>{{ $producto->cantidad }}</td>
                    <td>
                        @if($producto->image)
                            <img src="{{ asset('storage/images/' . $producto->image) }}" alt="{{ $producto->nombre }}" class="imgS">
                        @else
                            No hay imagen
                        @endif
                    </td>
                    <td>
    

    <!-- Icono Editar -->
    <a href="{{ route('productos.edit', $producto->id) }}" class="btn icon-btn" title="Editar">
        <i class="fas fa-edit"></i>
    </a>

    <!-- Icono Eliminar -->
    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn icon-btn" title="Eliminar">
            <i class="fas fa-trash-alt"></i>
        </button>
    </form>
</td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
</body>
</html>
