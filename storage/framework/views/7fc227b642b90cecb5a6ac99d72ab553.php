
<!DOCTYPE html>
<html>
<head>
    <title>Bienvenido al Panel de Control</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/dashboard.css')); ?>">
</head>
<body>

<?php $__env->startSection('content'); ?>
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
                    <a href="<?php echo e(route('productos.index')); ?>" class="btn btn-light p-3 border rounded-circle mb-3 shadow-sm">
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
                    <a href="<?php echo e(route('users.index')); ?>" class="btn btn-light p-3 border rounded-circle mb-3 shadow-sm">
                        <img src="assets/usuario.png" alt="Usuarios" class="img-fluid" style="width: 80px;">
                    </a>
                    <h3 class="fw-semibold text-dark">Administrar Usuarios</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>   
</body>
</html>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\59172\Downloads\Proyecto de Web II Final (1)\crudProductos\desayunosmariaelena\resources\views/dashboard.blade.php ENDPATH**/ ?>