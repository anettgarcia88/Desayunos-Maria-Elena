<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <title>Inicio de Sesión</title>
  </head>
  <body>
  <section class="h-100 gradient-form" style="background-color: #eee;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10 col-lg-12">
                <div class="card rounded-3 text-black">
                    <div class="row g-0">
                        <div class="col-md-6 d-flex flex-column align-items-center justify-content-center">
                            <div class="card-body p-md-5 mx-md-4">
                                <div class="text-center mb-4">
                                    <img src="<?php echo e(asset('assets/user.png')); ?>" style="width: 150px;" alt="logo">
                                </div>
                                <form action="<?php echo e(route('login')); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form2Example11">Correo:</label>
                                        <input type="email" name="email" id="form2Example11" class="form-control" required/>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form2Example22">Contraseña</label>
                                        <input type="password" name="password" id="form2Example22" class="form-control" required/>
                                    </div>
                                    <div class="text-center pt-1 mb-5 pb-1">
                                        <button class="btn btn-primary btn-block gradient-custom-2 mb-3 w-100" type="submit">Iniciar Sesión</button>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center pb-4 flex-column flex-md-row">
                                        <!-- <p class="mb-2 me-md-2">¿No tienes una cuenta?</p> -->
                                        <!-- <a href="<?php echo e(route('register')); ?>" class="btn btn-outline-danger">Registrarse</a> -->
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex align-items-center gradient-custom-2 justify-content-center">
                            <div class="text-white text-center px-4 py-4">
                                <img src="<?php echo e(asset('assets/logo1.png')); ?>" class="img-fluid" alt="logo">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
<?php /**PATH C:\Users\59172\Downloads\Proyecto de Web II Final (1)\crudProductos\desayunosmariaelena\resources\views/auth/login.blade.php ENDPATH**/ ?>