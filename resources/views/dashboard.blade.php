
<!DOCTYPE html>
<html>
<head>
    <title>Bienvenido al Panel de Control</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
@extends('layouts.app')
@section('content')
<div class="container py-5" id="cont">
    <!-- Título -->
    <div class="text-center mb-4">
        <h1 class="fw-bold text-white">Desayunos Maria Elena</h1>
        <p class="fs-4 text-secondary">INICIO</p>
    </div>

    <!-- Sección de opciones -->
    <div class="row justify-content-center g-4">
        <!-- Tarjeta de Productos -->
        <div class="col-md-4">
            <div class="card shadow-sm h-100 text-center border-0">
                <div class="card-body">
                    <a href="{{ route('productos.index') }}" class="btn btn-light p-3 border rounded-circle mb-3 shadow-sm">
                        <img src="assets/desayuno (1).png" alt="Productos" class="img-fluid" style="width: 80px;">
                    </a>
                    <h3 class="fw-semibold text-dark">Administrar Productos</h3>
                </div>
            </div>
        </div>

        <!-- Tarjeta de Usuarios -->
        <div class="col-md-4">
            <div class="card shadow-sm h-100 text-center border-0">
                <div class="card-body">
                    <a href="{{ route('users.index') }}" class="btn btn-light p-3 border rounded-circle mb-3 shadow-sm">
                        <img src="assets/usuario.png" alt="Usuarios" class="img-fluid" style="width: 80px;">
                    </a>
                    <h3 class="fw-semibold text-dark">Administrar Usuarios</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection   
</body>
</html>