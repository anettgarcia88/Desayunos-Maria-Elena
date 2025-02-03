<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/carrito.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/footer.css')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Rambla:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>

<nav class="navbar navbar-light">
        <div class="container d-flex align-items-center">
            <!-- Botón de atrás -->
            <a href="<?php echo e(route('paghome')); ?>" class="back-button me-3">
                <i class="fas fa-arrow-left"></i>
            </a>

            <!-- Logo y título en la misma línea -->
            <a class="navbar-brand d-flex align-items-center" href="<?php echo e(route('paghome')); ?>">
                <img src="<?php echo e(asset('imgs/logo3.png')); ?>" id="imagL" alt="Logo">
                <div>
                    <h4>Desayunos Maria Elena</h4>
                    <p class="navbar-text">Tienda Desayunos</p>
                </div>
            </a>
        </div>
    </nav>

    <div class="cart-container">
        <h1>Carrito</h1>
        <table id="cart-table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th>Quitar</th>
                </tr>
            </thead>
            <tbody>
                <!-- Filas del carrito se llenarán dinámicamente con JavaScript -->
            </tbody>
        </table>
        <p id="total">Total: Bs 0.00</p>
        <div class="cart-actions">
        <!-- Botón para abrir modal de Reservar -->
    <button type="button" class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#modalReservar">
        Reservar
    </button>

    <!-- Botón para abrir modal de A Domicilio -->
    <button type="button" class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#modalDomicilio">
        Domicilio
    </button>
    </div>  <!--  fin de cart-actions -->
    </div>

    <!-- Modal de Reservar -->
    <div class="modal fade" id="modalReservar" tabindex="-1" aria-labelledby="reservarLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reservarLabel">Reservar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6 class="text-muted">Reserva para hoy</h6>
                    <div class="mb-3">
                        <label for="nombreCliente" class="form-label">Nombre Completo</label>
                        <input type="text" class="form-control" id="nombreCliente" required>
                        <div class="invalid-feedback">Por favor, ingrese su nombre.</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-custom" onclick="validarReserva()">
                        Aceptar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de A Domicilio -->
    <div class="modal fade" id="modalDomicilio" tabindex="-1" aria-labelledby="domicilioLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="domicilioLabel">Pedido a Domicilio</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6 class="text-muted">Entrega a domicilio</h6>
                    <div class="mb-3">
                        <label for="nombreClienteDomicilio" class="form-label">Nombre Completo</label>
                        <input type="text" class="form-control" id="nombreClienteDomicilio" required>
                        <div class="invalid-feedback">Por favor, ingrese su nombre.</div>
                    </div>
                    <div class="mb-3">
                        <label for="dir" class="form-label">Dirección</label>
                        <input type="text" class="form-control" id="dir" required>
                        <div class="invalid-feedback">Por favor, ingrese la dirección.</div>
                    </div>
                    <div class="mb-3">
                        <label for="desc" class="form-label">Descripción del Lugar</label>
                        <textarea class="form-control" id="desc" rows="2" required></textarea>
                        <div class="invalid-feedback">Por favor, ingrese una descripción.</div>
                    </div>
                </div>
                <div class="modal-footer">
                     <button type="button" class="btn btn-custom" onclick="validarDomicilio()">
                       Aceptar
                    </button>
                </div>
            </div>
        </div>
    </div>


    <script src="<?php echo e(asset('js/carritoS.js')); ?>"></script>
    
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
</html>

<?php /**PATH C:\Users\59172\Downloads\Proyecto de Web II Final (1)\crudProductos\desayunosmariaelena\resources\views/carrito.blade.php ENDPATH**/ ?>