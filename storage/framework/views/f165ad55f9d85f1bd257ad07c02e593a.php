<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?php echo e(asset('css/indexPU.css')); ?>">
    <title>Administrar Productos</title>
    
</head>
<body>


<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="encabezado">
        <div class="texto">
            <h1>Mis productos</h2>
           
        </div>
        <br>
        <br>
        <div class="CrearProducto">
            <a href="<?php echo e(route('productos.create')); ?>" class="btnCrear">Nuevo producto</a>
            <?php if(session('success')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>
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
            <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($producto->id); ?></td>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\59172\Downloads\Proyecto de Web II Final (1)\crudProductos\desayunosmariaelena\resources\views/productos/index.blade.php ENDPATH**/ ?>