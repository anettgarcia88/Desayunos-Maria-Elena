<!DOCTYPE html >
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Domicilio</title>
    <link rel="stylesheet" href="{{ asset('css/reserva.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Rambla:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>

    <div class="top-bar">.</div>
    <nav>
        <div class="titulo">
            <h1>Desayunos Maria Elena</h1>
            <h4>Tienda Desayunos</h4>
        </div>
        <img src="{{ asset('imgs/logo3.png') }}" alt="Logo" class="logo">
        <div style="margin-left:5%; font-weight:bolder; "> 
        <a href="{{ route('paghome') }}" class="navtabla">Inicio</a>
        </div>

        <a href="{{ route('carrito') }}" class="carrito"><img src="{{ asset('imgs/carrito.png') }}" alt="" ></a>
    </nav>

    <div class="cart-container">
        <h1>Domicilio</h1>
        <h3>Ingrese sus datos</h3>
        <div class="nombre">
            <p>Nombre:</p>
            <input type="text" id="nombreCliente">
            <p>Dirección:</p>
            <input type="text" id="dir">
            <p>Descripción:</p>
            <input type="text" class="descripcion" id="desc">
        </div>
    </div>

    <div class="cart-actions">
    
        <!-- <h1>Total del carrito:</h1> -->
        <button class="action-btn" onclick="ShowMessageAtHome(document.getElementById('nombreCliente').value, document.getElementById('desc').value, document.getElementById('dir').value)">Comprar</button>
   </div>
   <script src="{{ asset('js/carritoS.js') }}"></script>

    <footer>
        <div class="fondo2">
            <div class="texto-encima2">
                <h3>Desayunos Maria Elena</h3>
                <img src="{{ asset('imgs/logo3.png') }}" alt="">
            </div>
            <div class="imagen-adicional2">
                <img src="{{ asset('imgs/wa-removebg-preview (1).png') }}" alt="" class="imgfooter">
                <p>69431581</p>
                <img src="{{ asset('imgs/abed6cd354d56006bfb22b48c147c70b-removebg-preview.png') }}" alt="" class="imgfooter">
                <p>Av.Ayacucho</p>
                <img src="{{ asset('imgs/face-removebg-preview.png') }}" alt="" class="imgfooter">
                <p>Desayunos Maria Elena</p>
            </div>
        </div>
    </footer>
</body>
</html>
