// VALIDACIONES MODAL


function validarReserva() {
    let nombre = document.getElementById('nombreCliente');
    if (nombre.value.trim() === "") {
        nombre.classList.add('is-invalid');
        return;
    } 
    nombre.classList.remove('is-invalid');
    ShowMessageReservation(nombre.value);
    document.getElementById('modalReservar').querySelector('.btn-close').click(); // Cierra el modal
}

function validarDomicilio() {
    let nombre = document.getElementById('nombreClienteDomicilio');
    let direccion = document.getElementById('dir');
    let descripcion = document.getElementById('desc');

    let campos = [nombre, direccion, descripcion];
    let valido = true;

    campos.forEach(campo => {
        if (campo.value.trim() === "") {
            campo.classList.add('is-invalid');
            valido = false;
        } else {
            campo.classList.remove('is-invalid');
        }
    });

    if (!valido) return;

    ShowMessageAtHome(nombre.value, descripcion.value, direccion.value);
    document.getElementById('modalDomicilio').querySelector('.btn-close').click(); // Cierra el modal
}
//CARRITO

document.addEventListener('DOMContentLoaded', function () {
    updateCartTable();
    const csrfToken = document.querySelector('meta[name="csrf-token"]');
    if (csrfToken) {
        localStorage.setItem('token', csrfToken.getAttribute('content'));
        // console.log('CSRF Token:', csrfToken.getAttribute('content'));
        console.log('CSRF Token:', token);
    } else {
        console.error('CSRF Token not found!');
    }
});
// let token=localStorage.getItem('token') || '';
let mensaje = localStorage.getItem('mensaje') || '';

function incrementQuantity(id) {
    let productCard = document.querySelector(`.card[data-id='${id}']`);
    
    if (productCard) {
        let name = productCard.getAttribute('data-nombre');
        let price = parseFloat(productCard.getAttribute('data-precio'));
        let totalQuantity = parseInt(productCard.getAttribute('data-cantidad-total'));
        let tempQuantityElement = document.getElementById(`temp-quantity-${id}`);
        let totalQuantityElement = document.getElementById(`total-quantity-${id}`);
        let tempQuantity = parseInt(tempQuantityElement.innerText);

          tempQuantity++;
            totalQuantity++;

            tempQuantityElement.innerText = tempQuantity;
            totalQuantityElement.innerText = totalQuantity;

            productCard.setAttribute('data-cantidad-total', totalQuantity);

            updateCart(id, name, price, tempQuantity);
            updateCartTable();
       
    }
}

function updateCart(id, name, price, tempQuantity) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    let product = cart.find(item => item.id === id);

    if (product) {
        product.tempQuantity = tempQuantity;
    } else {
        cart.push({ id, name, price, tempQuantity });
    }

    localStorage.setItem('cart', JSON.stringify(cart));
}

function removeProduct(id) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    cart = cart.filter(item => item.id !== id);

    localStorage.setItem('cart', JSON.stringify(cart));
    updateCartTable();
}

function updateCartTable() {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    let cartTableBody = document.querySelector('#cart-table tbody');
    
    if (!cartTableBody) {
        console.error('Cart table body not found');
        return;
    }

    cartTableBody.innerHTML = '';
    mensaje = '';

    cart.forEach(product => {
        let row = document.createElement('tr');

        let nameCell = document.createElement('td');
        nameCell.textContent = product.name;
        row.appendChild(nameCell);

        let priceCell = document.createElement('td');
        priceCell.textContent = `Bs ${product.price}`;
        row.appendChild(priceCell);

        let quantityCell = document.createElement('td');
        let quantityInput = document.createElement('input');
        quantityInput.type = 'number';
        quantityInput.value = product.tempQuantity;
        quantityInput.min = 1;
        quantityInput.addEventListener('change', function () {
            updateProductQuantity(product.id, parseInt(quantityInput.value));
        });
        quantityCell.appendChild(quantityInput);
        row.appendChild(quantityCell);

        mensaje += `   * ${product.name} -> ${product.tempQuantity} \n`;

        let subtotalCell = document.createElement('td');
        subtotalCell.textContent = `Bs ${product.price * product.tempQuantity}`;
        row.appendChild(subtotalCell);

        let removeButtonCell = document.createElement('td');
        let removeButton = document.createElement('button');
        removeButton.innerHTML = '<i class="fas fa-trash"></i>'; 
        removeButton.className = 'eliminar-btn';
        removeButton.onclick = () => removeProduct(product.id);
        removeButtonCell.appendChild(removeButton);
        row.appendChild(removeButtonCell);

        cartTableBody.appendChild(row);
        console.log("Ingreso de un registro");
    });

    localStorage.setItem('mensaje', mensaje);
    updateTotal();
}

function updateProductQuantity(id, newQuantity) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    let product = cart.find(item => item.id === id);

    if (product) {
        product.tempQuantity = newQuantity;
    }

    localStorage.setItem('cart', JSON.stringify(cart));
    updateCartTable();
}

function updateTotal() {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    let total = cart.reduce((acc, product) => acc + (product.price * product.tempQuantity), 0);
    document.getElementById('total').textContent = `Total: Bs ${total.toFixed(2)}`;
    let mensaje = localStorage.getItem('mensaje');
    mensaje +=` \n \nTOTAL BS. ES: `+total;
}

function updateProductQuantityInDB(id, newQuantity) {
    alert("Ingreso a la funcion " + newQuantity );
    fetch('/productos/update-quantity', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '1PJPG5bS8eCfLdYUoOSe71p32dxNybuxulitSC1n'
   
         },
        
        body: JSON.stringify({
            id: id,
            cantidad: newQuantity
           
        }),
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            console.log('Quantity updated successfully in the database');
        } else {
            console.error('Failed to update quantity in the database');
        }
    })
    .catch(error => {
        console.error('Error updating quantity in the database:', error);
    });
}



function reserveProduct(productId, cantidad) {
    let tok = localStorage.getItem('token');
  //  alert("   EL NUEVO TOKEN REGISTRADO : " + tok);
    fetch('/productos/reserve', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': tok
        },
        body: JSON.stringify({ id: productId, cantidad: cantidad })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            console.log(`Reserva exitosa. Nueva cantidad: ${data.new_quantity}`);
        } else {
            console.error(`Error: ${data.message}`);
        }
    })
    .catch(error => console.error('Error:', error));
}
function ShowMessageReservation(nombreCliente) {
    let mensaje = localStorage.getItem('mensaje');
    let phoneNumber = '+59172209617';
    let text = `Buenos días, quisiera hacer una reserva a nombre: ${nombreCliente.toUpperCase()}.\nMis desayunos son:\n${mensaje}`;

    let encodedText = encodeURIComponent(text);

    let whatsappLink = `https://api.whatsapp.com/send/?phone=${phoneNumber}&text=${encodedText}&type=phone_number&app_absent=0`;

    window.open(whatsappLink, '_blank');

    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    cart.forEach(product => {
        reserveProduct(product.id, product.tempQuantity);
    });

    localStorage.removeItem('cart');
    localStorage.removeItem('mensaje');

    updateCartTable();
    window.location.href = '/inicio';
}

function ShowMessageAtHome(nombreCliente, desc, dir) {
    let mensaje = localStorage.getItem('mensaje');
    let phoneNumber = '+59172209617';
    let text = `Hola, soy ${nombreCliente}.\nLa entrega es: ${dir}.\nLa casa es: ${desc}.\nMis desayunos son:\n${mensaje}`;

    let encodedText = encodeURIComponent(text);

    let whatsappLink = `https://api.whatsapp.com/send/?phone=${phoneNumber}&text=${encodedText}&type=phone_number&app_absent=0`;

    window.open(whatsappLink, '_blank');

    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    cart.forEach(product => {
        reserveProduct(product.id, product.tempQuantity);
    });

    localStorage.removeItem('cart');
    localStorage.removeItem('mensaje');

    updateCartTable();

    window.location.href = '/inicio';
}