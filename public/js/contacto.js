function submitForm() {
    const nombreCliente = document.getElementById('name').value.trim();
    const telefono = document.getElementById('phone').value.trim();
    const asunto = document.getElementById('subject').value.trim();
    const mensaje = document.getElementById('message').value.trim();

    if (!nombreCliente || !telefono || !asunto || !mensaje) {
        alert('Por favor, complete todos los campos del formulario.');
        return;
    }

    ShowMessageReservation(nombreCliente, telefono, asunto, mensaje);
}

function ShowMessageReservation(nombreCliente, telefono, asunto, mensaje) {
    let phoneNumber = '+59172209617';
    let text = `¡Hola! Le escribe ${nombreCliente.toUpperCase()}.\n` +
               `Teléfono: ${telefono}.\n` +
               `Asunto: ${asunto}.\n` +
               `Mensaje: ${mensaje}.\n\n` +
               `Por favor, comuníquese a este número lo antes posible. ¡Muchas gracias!`;

    let encodedText = encodeURIComponent(text);

    let whatsappLink = `https://api.whatsapp.com/send/?phone=${phoneNumber}&text=${encodedText}&type=phone_number&app_absent=0`;

    // Abrir WhatsApp
    window.open(whatsappLink, '_blank');

    // Limpiar formulario (opcional)
    document.getElementById('name').value = '';
    document.getElementById('phone').value = '';
    document.getElementById('subject').value = '';
    document.getElementById('message').value = '';
}

function submitForm() {
    // Obtén los valores de los campos
    const name = document.getElementById('name').value.trim();
    const phone = document.getElementById('phone').value.trim();
    const subject = document.getElementById('subject').value.trim();
    const message = document.getElementById('message').value.trim();

    // Variables para rastrear errores
    let isValid = true;

    // Validación del campo Nombre
    const nameError = document.getElementById('nameError');
    if (name.length < 3) {
        nameError.classList.remove('d-none');
        isValid = false;
    } else {
        nameError.classList.add('d-none');
    }

    // Validación del campo Teléfono
    const phoneError = document.getElementById('phoneError');
    const phoneRegex = /^[0-9]{8}$/; // Teléfono entre 8 y 15 dígitos
    if (!phoneRegex.test(phone)) {
        phoneError.classList.remove('d-none');
        isValid = false;
    } else {
        phoneError.classList.add('d-none');
    }

    // Validación del campo Asunto
    const subjectError = document.getElementById('subjectError');
    if (subject === '') {
        subjectError.classList.remove('d-none');
        isValid = false;
    } else {
        subjectError.classList.add('d-none');
    }

    // Validación del campo Mensaje
    const messageError = document.getElementById('messageError');
    if (message.length < 10) {
        messageError.classList.remove('d-none');
        isValid = false;
    } else {
        messageError.classList.add('d-none');
    }

   
}



