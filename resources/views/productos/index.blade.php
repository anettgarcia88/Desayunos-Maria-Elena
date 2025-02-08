<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('css/indexPU.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modals.css') }}">
    <title>Administrar Productos</title>
    
</head>
<body>
@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="AcercaTitulo">Mis productos</h1>
        <button type="button" class="btn btn-primary" id="openModalBtn"> 
            <i class="fas fa-plus"></i> Nuevo producto 
        </button>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover shadow-sm">
            <thead class="bg-secondary text-light">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Cantidad comprada</th>
                <th>Imagen</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $index => $producto)
                <tr>
                    <td>{{ $index + 1 }}</td>
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
