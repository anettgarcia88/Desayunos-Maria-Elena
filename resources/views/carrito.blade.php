<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link rel="stylesheet" href="{{ asset('css/carrito.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
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
            <a href="{{ route('paghome') }}" class="back-button me-3">
                <i class="fas fa-arrow-left"></i>
            </a>

            <!-- Logo y título en la misma línea -->
            <a class="navbar-brand d-flex align-items-center" href="{{ route('paghome') }}">
                <img src="{{ asset('imgs/logo3.png') }}" id="imagL" alt="Logo">
               
            </a>
        </div>
    </nav>
    <div class="container cart-container">
        <h1 class="AcercaTitulo text-center mb-4">Mi carrito</h1>
        <div class="table-responsive">
            <table id="cart-table" class="table table-bordered table-hover">
                <thead class="table-dark">
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
        </div>
        <p id="total" class="fw-bold text-end">Total: Bs 0.00</p>
        <div class="cart-actions d-flex justify-content-between align-items-center gap-3">
    <button type="button" class="btn btn-custom" id="Reservar" data-bs-toggle="modal" data-bs-target="#modalReservar">
    <i class="fa-solid fa-clipboard-list"></i> Reservar
    </button>
    <button type="button" class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#modalDomicilio">
    <i class="fa-solid fa-house"></i> Domicilio
    </button>
</div>
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


    <script src="{{ asset('js/carritoS.js') }}"></script>
    
    <br>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>

