<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    
    <link rel="stylesheet" href="<?php echo e(asset('css/ProductosUsuarios.css')); ?>">
</head>
<body>


<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="titulo">Editar Producto</h1>
    <form class="contenido" action="<?php echo e(route('productos.update', $producto->id)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="<?php echo e($producto->nombre); ?>" required>
        </div>
        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" step="0.01" name="precio" class="form-control" value="<?php echo e($producto->precio); ?>" required>
        </div>
        <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input type="number" name="cantidad" class="form-control" value="<?php echo e($producto->cantidad); ?>" required>
        </div>
        <div class="form-group">
            <label for="image">Imagen</label>
            <input type="file" name="image" class="form-control">
            <br>
            <?php if($producto->image): ?>
                <img src="<?php echo e(asset('storage/images/' . $producto->image)); ?>" alt="<?php echo e($producto->nombre); ?>" style="width: 200px; border-radius: 15px;">
            <?php endif; ?>
       <br>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
<?php $__env->stopSection(); ?>


</body>
</html>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\59172\Downloads\Proyecto de Web II Final (1)\crudProductos\desayunosmariaelena\resources\views/productos/edit.blade.php ENDPATH**/ ?>