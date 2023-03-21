<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/2cf292bb20.js" crossorigin="anonymous"></script>
    <title>@yield('title')</title>
    @vite(["resources/css/app.css", "resources/css/app.scss", "resources/js/app.js",])
</head>
<body>

    {{-- Navabar --}}
<div class="shadow rounded-bottom " id="cuadroNav" style="background-color: #0F9DB2;">
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-body-tertiary  ">
            <div class="container-fluid ">
                <a class="navbar-brand" href="#"
                style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">EMT(LOGO)</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- en el "ul" el ajuste en medio es "mx-auto"  y en el lado izquierdo "me-auto" -->
                <ul class="navbar-nav text-center mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active"
                        aria-current="page" href="#"> EXPEDIENTES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active"
                        aria-current="page" href="#">GRAFICOS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active"
                        aria-current="page" href="#">HELPBOX</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active"
                        aria-current="page" href="#">AYUDA</a>
                    </li>
                </ul>
                <a>
                    <button class="rounded-5 btn btn-warning" style="color: #000000; font-weight: 700;" type="submit">
                        <i class="bi bi-plus-circle-dotted"></i>
                        Call card</button>
                    </a href="#">

                    <ul class="nav justify-content-end">
                        <div class="nav-item dropdown d-flex">

                            <a style="color: #000000;"
                            class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i id="person" class="bi bi-person-circle"></i>
                        </a>
                        <ul class="dropdown-menu" style="color: #be964c;">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Cerrar sesión</a></li>
                        </ul>
                    </div>
                </ul>
            </div>
        </div>
    </nav>
</div>

</div>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
