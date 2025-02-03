<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo producto</title>
    
    <link rel="stylesheet" href="{{ asset('css/ProductosUsuarios.css') }}">
</head>
<body>
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="titulo">Nuevo producto</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="contenido" action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="text" class="form-control" id="precio" name="precio" required>
        </div>
        <div class="form-group">
            <label for="cantidad">Cantidad:</label>
            <input type="text" class="form-control" id="cantidad" name="cantidad" required>
        </div>
        <div class="form-group">
            <label for="image">Imagen:</label>
            <input type="file" class="form-control" id="image" name="image">
            <br><br>
        </div>
        
        <button type="submit" class="btn btn-primary">Crear Producto</button>
    </form>
</div>
@endsection

</body>
</html>
