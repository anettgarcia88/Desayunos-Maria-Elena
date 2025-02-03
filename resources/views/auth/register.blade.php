<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Registro</title>
  </head>
  <body>
  <section class="h-100 gradient-form" style="background-color: #eee;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10 col-lg-12">
                <div class="card text-black shadow-lg rounded-4 overflow-hidden">
                    <div class="row g-0">
                        <!-- Sección del formulario -->
                        <div class="col-md-6 d-flex flex-column align-items-center justify-content-center">
                            <div class="card-body p-4 p-md-5 mx-md-4">
                                <div class="text-center mb-4">
                                    <img src="{{ asset('assets/user.png') }}" class="img-fluid" style="width: 150px;" alt="logo">
                                </div>
                                <form action="{{ route('register') }}" method="post">
                                    @csrf
                                    <div class="form-outline mb-3">
                                        <label class="form-label" for="name">Nombre</label>
                                        <input type="text" name="name" id="name" class="form-control" required />
                                    </div>
                                    <div class="form-outline mb-3">
                                        <label class="form-label" for="email">Correo</label>
                                        <input type="email" name="email" id="email" class="form-control" required />
                                    </div>
                                    <div class="form-outline mb-3">
                                        <label class="form-label" for="password">Contraseña</label>
                                        <input type="password" name="password" id="password" class="form-control" required />
                                    </div>
                                    <div class="form-outline mb-3">
                                        <label class="form-label" for="password_confirmation">Confirmar Contraseña</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required />
                                    </div>
                                    <div class="text-center pt-1 mb-4">
                                        <button class="btn btn-primary w-100 gradient-custom-2" type="submit">Registrarse</button>
                                    </div>
                                    <div class="text-center">
                                        <p class="mb-2">¿Ya tienes una cuenta?</p>
                                        <a href="{{ route('login') }}" class="btn btn-outline-danger">Iniciar Sesión</a>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Sección de imagen / branding -->
                        <div class="col-md-6 d-flex align-items-center gradient-custom-2 justify-content-center">
                            <div class="text-white text-center px-4 py-4">
                                <img src="{{ asset('assets/logo1.png') }}" class="img-fluid" style="max-width: 80%;" alt="logo">
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
