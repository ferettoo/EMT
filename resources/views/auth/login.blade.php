<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/2cf292bb20.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/css.css') }}">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/css/app.scss', 'resources/js/app.js'])

    <title>Document</title>
</head>

  <body class="row justify-content-center align-items-center vh-100" id="fondoLogin">
    {{-- style="background-image: url{{ asset('images/fondoVerdePetroleo.jpg') }}; " --}}
    <div class="container d-flex align-items-center">
        <div class="container  px-4 py-5 px-md-5 text-center text-lg-start my-5">
            <div class="row gx-lg-5 align-items-center mb-5">
                <div class="col-lg-6 mb-5 b-lg-0" style="z-index: 10">
                  {{-- Descripción programa --}}
                    <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(0, 0%, 100%)">
                        Bienvenido a EMT <br />
                        <span id="amarillo">Empecemos</span>
                    </h1>
                    <p class="mb-4 opacity-70" style="color: hsl(0, 0%, 100%)">
                        Bienvenido a EMT, una aplicación diseñada para crear y gestionar expedientes de emergencias de
                        manera
                        fácil y eficiente. Con EMT, puedes registrar información vital de emergencias, incluyendo
                        información
                        de contacto, acceso a los recursos y detalles del incidente. Además, la aplicación permite a los
                        equipos de
                        respuesta en tiempo real acceder a esta información crucial durante una emergencia.
                    </p>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                    <div class="card bg-glass" style="border-radius: 30px; ">
                        <div class="card-body px-4 py-5 px-md-5">
                            {{-- INPUTS LOGIN --}}
                            <form action="{{ action([App\Http\Controllers\UsuarioController::class, 'login']) }}"
                                method="POST">
                                @csrf
                                <!-- Usuario input -->
                                <div class="form-outline mb-4">
                                    <input type="text" id="username" name="username" class="form-control"
                                        value="{{ old('username') }}" />

                                    <label class="form-label" for="form3Example3"
                                        style="color:hsl(218, 59%, 68%)">Usuario</label>
                                </div>
                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <input type="password" id="contrasenya" name="contrasenya" class="form-control"
                                        value="{{ old('contrasenya') }}" />
                                    <label class="form-label" for="form3Example4"
                                        style="color: hsl(218, 59%, 68%)">Password</label>
                                </div>
                                <!-- Submit button -->
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary  mb-4">
                                        Aceptar
                                    </button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </body>

</html>
