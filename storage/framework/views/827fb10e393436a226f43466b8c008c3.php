<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?php echo e(asset('css/indexPU.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/modals.css')); ?>">
    <title>Administrar Productos</title>
    
</head>
<body>


<?php $__env->startSection('content'); ?>
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
            <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($index + 1); ?></td>
                    <td><?php echo e($producto->nombre); ?></td>
                    <td><?php echo e($producto->precio); ?></td>
                    <td><?php echo e($producto->cantidad); ?></td>
                    <td>
                        <?php if($producto->image): ?>
                            <img src="<?php echo e(asset('storage/images/' . $producto->image)); ?>" alt="<?php echo e($producto->nombre); ?>" class="imgS">
                        <?php else: ?>
                            No hay imagen
                        <?php endif; ?>
                    </td>
                    <td>
    

    <!-- Icono Editar -->
    <a href="<?php echo e(route('productos.edit', $producto->id)); ?>" class="btn icon-btn" title="Editar">
        <i class="fas fa-edit"></i>
    </a>

    <!-- Icono Eliminar -->
    <form action="<?php echo e(route('productos.destroy', $producto->id)); ?>" method="POST" style="display:inline;">
        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>
        <button type="submit" class="btn icon-btn" title="Eliminar">
            <i class="fas fa-trash-alt"></i>
        </button>
    </form>
</td>

                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>
</body>
</html>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\59172\Downloads\Proyecto de Web II Final (1)\crudProductos\apis_elena\resources\views/productos/index.blade.php ENDPATH**/ ?>