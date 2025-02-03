

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INICIO</title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Rambla:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo e(asset('css/index.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/footer.css')); ?>">
</head>

<body>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <!-- Logo y título -->
    <a class="navbar-brand" href="#">
      <img src="<?php echo e(asset('imgs/logo3.png')); ?>" alt="Logo" class="logo" style="height: 50px;">
      <h1 class="d-inline-block align-middle">Desayunos Maria Elena</h1>
    </a>
    <!-- Toggle Button para pantallas pequeñas -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Menú de navegación -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
             <!-- Carrito -->
             <li class="nav-item">
          <a class="nav-link" href="<?php echo e(route('carrito')); ?>">
            <img src="<?php echo e(asset('imgs/carrito.png')); ?>" alt="Carrito" class="carrito" style="height: 35px;">
          </a>
        </li>
       
        <!-- Enlace Productos -->
        <li class="nav-item">
          <a class="nav-link" href="#productos">Productos</a>
        </li>
        <!-- Dropdown Acerca de -->
        <li class="nav-item">
          <a class="nav-link " href="#acercade" >
          Acerca de Nosotros
          </a>
          
        </li>
    
        <!-- Dropdown Contáctenos -->
        <li class="nav-item ">
          <a class="nav-link " href="#contactenos" >
            Contáctenos
          </a>
          
        </li>
       
      </ul>
    </div>
  </div>
</nav>

<br>
<div class="d-flex justify-content-center align-items-center">
    <img src="<?php echo e(asset('imgs/maices.gif')); ?>" class="img-fluid rounded-5" alt="maices">
</div>
 <br>
    
    <div class="productos" id="productos">
        <h1 class="pTitulo" id="pTitulo2">Productos</h1>
        <h3 class="pTitulo" id="pTitulo3">¡Pedí ahora tu Producto!</h3>
        <!-- <input type="text" class="buscador" placeholder="Buscador de productos..."> -->

        <!-- <h2 class="pTitulo4">Bebidas y Masas</h2> -->

     <div class="section">
  
        <div class="card-container">
        <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               
        <div class="card" 
                 data-id="<?php echo e($producto->id); ?>"
                 data-nombre="<?php echo e($producto->nombre); ?>"
                 data-precio="<?php echo e($producto->precio); ?>"
                 data-cantidad-total="<?php echo e($producto->cantidad); ?>">
                <img src="<?php echo e(asset('storage/images/' . $producto->image)); ?>" alt="Product Image" class="product-image">
                <h2 class="product-name"><?php echo e($producto->nombre); ?></h2>
                <p class="product-price">Bs <?php echo e($producto->precio); ?></p>
                <p class="product-quantity">Cantidad Total: <span id="total-quantity-<?php echo e($producto->id); ?>"><?php echo e($producto->cantidad); ?></span></p>
                <p class="temporary-quantity"><span id="temp-quantity-<?php echo e($producto->id); ?>">0</span></p>
                <button class="increment-button" onclick="incrementQuantity('<?php echo e($producto->id); ?>')">
                    <i class="fas fa-cart-plus"></i> Agregar al carrito
                </button>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <script src="<?php echo e(asset('js/carritoS.js')); ?>">
         
        </script>
    </div>

    </div>

    <h1 class="AcercaTitulo text-center" id="acercade">Nosotros</h1>
    <div id="mascerca">
    <div class="about-section row d-flex justify-content-center align-items-center">
        <div class="content col-md-6 text-center">
            <h2>Nuestra Oferta</h2>
            <p>En Desayunos Maria Elena, nos dedicamos a proporcionar una experiencia culinaria auténtica que celebra la rica herencia gastronómica de Bolivia. Nuestra tienda ofrece una selección limitada pero cuidadosamente elegida de desayunos con bebidas elaboradas con maíz.</p>
        </div>
        <div class="image col-md-6 d-flex justify-content-center">
            <img class="img-fluid rounded-3" src="<?php echo e(asset('imgs/apipastel.png')); ?>" alt="Desayuno">
        </div>
    </div>
    </div>


    <div>
    <h1 class="AcercaTitulo" id="contactenos">Contáctenos</h1>
    <div class="contact-container">
        <!-- Formulario de contacto -->
        <div class="contact-form">
            <h2>Envíanos un mensaje</h2>
       <form id="contactForm">
    <div class="mb-3">
        <input type="text" id="name" name="name" class="form-control" placeholder="Nombre" required>
        <small class="text-danger d-none" id="nameError">El nombre es obligatorio y debe tener al menos 3 caracteres.</small>
    </div>
    <div class="mb-3">
        <input type="tel" id="phone" name="phone" class="form-control" placeholder="Celular" required>
        <small class="text-danger d-none" id="phoneError">El teléfono debe ser numérico y tener entre 8 dígitos.</small>
    </div>
    <div class="mb-3">
        <input type="text" id="subject" name="subject" class="form-control" placeholder="Asunto" required>
        <small class="text-danger d-none" id="subjectError">El asunto es obligatorio y no puede estar vacío.</small>
    </div>
    <div class="mb-3">
        <textarea id="message" name="message" class="form-control" rows="4" placeholder="Escribe tu mensaje aquí..." required></textarea>
        <small class="text-danger d-none" id="messageError">El mensaje es obligatorio y debe tener al menos 10 caracteres.</small>
    </div>
    <button type="button" class="btn btn-primary w-100" onclick="submitForm()">Enviar</button>
</form> 

        </div>
        <script src="<?php echo e(asset('js/contacto.js')); ?>"></script>
        <!-- Información de contacto -->
     <div class="contact-info text-center">
    <img src="<?php echo e(asset('imgs/logo3.png')); ?>" alt="Desayunos Maria Elena" class="infoimg img-fluid">
     </div>

    </div>
</div>

<br>
<div class="footer">
    <div class="footer-content">
        <!-- Sección de marca -->
        <div class="footer-section brand">
            <h3>Desayunos Maria Elena</h3>
            <img src="<?php echo e(asset('imgs/logo3.png')); ?>" alt="Logo de Desayunos Maria Elena" class="logo-footer">
        </div>

        <!-- Sección de contacto -->
        <div class="footer-section contact">
            <!-- WhatsApp -->
            <div class="contact-item">
                <img src="<?php echo e(asset('imgs/wa-removebg-preview (1).png')); ?>" alt="WhatsApp" class="contact-icon">
                <p>+59172209617</p>
            </div>

            <!-- Ubicación con enlace a Google Maps -->
            <div class="contact-item">
                <a href="https://maps.app.goo.gl/56mBSRqQqFuqr1LP6" class="alink" target="_blank" rel="noopener noreferrer">
                    <img src="<?php echo e(asset('imgs/abed6cd354d56006bfb22b48c147c70b-removebg-preview.png')); ?>" alt="Ubicación" class="contact-icon">
                    <p>Av. Villazón km. 4</p>
                </a>
            </div>

            <!-- Facebook con enlace a la página oficial -->
            <div class="contact-item">
                <a href="https://www.facebook.com/DesayunosMariaElena" target="_blank" class="alink" rel="noopener noreferrer">
                    <img src="<?php echo e(asset('imgs/face-removebg-preview.png')); ?>" alt="Facebook" class="contact-icon">
                    <p>Desayunos Maria Elena</p>
                </a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html><?php /**PATH C:\Users\59172\Downloads\Proyecto de Web II Final (1)\crudProductos\desayunosmariaelena\resources\views/paginicio.blade.php ENDPATH**/ ?>