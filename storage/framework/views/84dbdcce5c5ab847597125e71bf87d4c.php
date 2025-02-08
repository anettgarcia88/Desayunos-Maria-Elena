<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Usuarios</title>
        <!-- Fonts -->
     <link rel="dns-prefetch" href="//fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

  <link rel="stylesheet" href="<?php echo e(asset('css/modals.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('css/indexPU.css')); ?>">
</head>
<body>


<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="AcercaTitulo">Mis usuarios</h1>
        <button type="button" class="btn btn-primary" id="openModalBtn"> 
            <i class="fas fa-user-plus"></i> Nuevo usuario
        </button>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover shadow-sm">
            <thead class="bg-secondary text-light">
                <tr>
                    <th>#</th>
                    <th>Nombres</th>
                    <th>Primer apellido</th>
                    <th>Segundo apellido</th>
                    <th>Correo electrónico</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($index + 1); ?></td>
                        <td><?php echo e($user->firstName); ?></td>
                        <td><?php echo e($user->lastName); ?></td>
                        <td><?php echo e($user->secondLastName); ?></td>
                        <td><?php echo e($user->email); ?></td>
                        <td class="text-center">
                            <button class="btn btn-warning btn-sm editUserBtn" id="" data-id="<?php echo e($user->id); ?>" title="Editar">
    <i class="fas fa-edit"></i>
</button>

                            <form action="<?php echo e(route('users.destroy', $user->id)); ?>" method="POST" class="d-inline-block">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger btn-sm" title="Eliminar" onclick="return confirm('¿Seguro que deseas eliminar este usuario?');">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>


<!-- Modal -->
<div id="userModal" class="modal-overlay">
    <div class="modal-content">
        <span class="close-btn" id="closeModalBtn">&times;</span>
        <h2 id="modalTitle">Crear usuario</h2>
        <form id="userForm">
            <input type="hidden" id="userId">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="_method" id="methodField" value="POST">

            <div class="form-group">
                <label for="firstName">Nombre(s)</label>
                <input type="text" id="firstName" name="firstName" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="lastName">Apellido Paterno</label>
                <input type="text" id="lastName" name="lastName" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="secondLastName">Apellido Materno</label>
                <input type="text" id="secondLastName" name="secondLastName" class="form-control" >
            </div>
            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input type="email" id="email" name="email" class="form-control">
            </div>
            <button type="submit" id="modalSubmitBtn" class="btn btn-primary">Confirmar</button>
        </form>
    </div>
</div>

<script src="Credentials.js" ></script>
<script>
   // ABRIR MODAL PARA CREAR
document.getElementById("openModalBtn").addEventListener("click", function() {
    document.getElementById("modalTitle").textContent = "Crear Usuario";
    document.getElementById("modalSubmitBtn").textContent = "Crear";
    document.getElementById("userForm").setAttribute("data-mode", "create");

    // Resetear campos
    document.getElementById("userId").value = "";
    document.getElementById("methodField").value = "POST";

    document.getElementById("firstName").value = "";
    document.getElementById("lastName").value = "";
    document.getElementById("secondLastName").value = "";
    document.getElementById("email").value = "";

    document.getElementById("userModal").style.display = "flex";
});

// ABRIR MODAL PARA EDITAR
function openEditModal(user) {
    document.getElementById("modalTitle").textContent = "Editar Usuario";
    document.getElementById("modalSubmitBtn").textContent = "Guardar Cambios";
    document.getElementById("userForm").setAttribute("data-mode", "edit");

    // Llenar datos
    document.getElementById("userId").value = user.id;
    document.getElementById("methodField").value = "PUT";
    document.getElementById("firstName").value = user.firstName;
    document.getElementById("lastName").value = user.lastName;
    document.getElementById("secondLastName").value = user.secondLastName;
    document.getElementById("email").value = user.email;

    document.getElementById("userModal").style.display = "flex";
}

// CERRAR MODAL
document.getElementById("closeModalBtn").addEventListener("click", function() {
    document.getElementById("userModal").style.display = "none";
});

// OBTENER DATOS AL HACER CLICK EN EDITAR
document.querySelectorAll('.editUserBtn').forEach(button => {
    button.addEventListener('click', function () {
        let userId = this.getAttribute('data-id');

        fetch(`/users/${userId}/edit`)
            .then(response => response.json())
            .then(user => {
                openEditModal(user);
            });
    });
});

// SUBMIT FORM (CREAR/EDITAR)
document.getElementById("userForm").addEventListener("submit", function(event) {
    event.preventDefault();

    let mode = this.getAttribute("data-mode");
    let userId = document.getElementById("userId").value;
    let userData = {
        firstName: document.getElementById("firstName").value,
        lastName: document.getElementById("lastName").value,
        secondLastName: document.getElementById("secondLastName").value,
        email: document.getElementById("email").value,
        _token: document.querySelector('input[name="_token"]').value, // CSRF
    };

    let url = "/users";
    let method = "POST";

    if (mode === "edit") {
        url = `/users/${userId}`;
        method = "POST"; // Laravel espera POST con _method = PUT
        userData._method = "PUT";
    }

    fetch(url, { 
        method: method,
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(userData)
    }).then(response => response.json())
      .then(data => {
          alert(mode === "create" ? "Usuario creado!" : "Usuario actualizado!");
          document.getElementById("userModal").style.display = "none";
      });
});
</script>

<?php $__env->stopSection(); ?>

</body>
</html>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\59172\Downloads\Proyecto de Web II Final (1)\crudProductos\apis_elena\resources\views/users/index.blade.php ENDPATH**/ ?>