<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('hrefmap')
    <script src="https://kit.fontawesome.com/2cf292bb20.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/css.css') }}">
    <title>@yield('title')</title>
    @yield('admUsuariosCss')
    @vite(['resources/css/app.css', 'resources/css/app.scss', 'resources/js/app.js'])
</head>

<body>

    {{-- Navabar --}}
    <div class="shadow" id="cuadroNav" style="background-color: #0F9DB2;">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-body-tertiary  ">
                <div class="container">
                    <a class="navbar-brand text-white" href="{{ url('menu') }}"
                        style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">
                        <img class="justify-content-md-end" src="{{ asset('images/logotipo_final2.png') }}"
                            style="width:40px;
                height:30px;" class="  card-img-top" alt="...">  EMT
                    </a>
                    {{-- ESTO ES PARA CUANDO SE REDUZCA LA PANTALLA  --}}
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- en el "ul" el ajuste en medio es "mx-auto"  y en el lado izquierdo "me-auto" -->
                        <ul class="navbar-nav text-center mx-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active text-white" aria-current="page" href="#">GRÁFICOS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active text-white" aria-current="page" href="#">HELPBOX</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active text-white" aria-current="page" href="#">AYUDA</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active text-white" aria-current="page"
                                    href="{{ url('menu') }}">MENÚ</a>
                            </li>


                        </ul>
                        @yield('carta')

                        <div class="nav-item dropdown d-flex">
                            <ul class="nav justify-content-end">
                                <a style="color: #000000;" class="nav-link dropdown-toggle text-white" href="#"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->tipusUsuaris->nom }}
                                </a>

                                {{-- limitación segun tipo de usuario --}}
                                @if (Auth::check() && Auth::user()->tipus_usuaris_id == '3')
                                    <ul class="dropdown-menu" style="color: #be964c;">
                                        <li><a class="dropdown-item text-center disabled" href="#"
                                                aria-disabled="true"> {{ Auth::user()->username }}</a></li>
                                        <li><a class="dropdown-item text-center" href="{{ url('/admUsuarios') }}">Adm.
                                                Usuarios</a></li>
                                        <li><a class="dropdown-item text-center"
                                                href="{{ url('/expedientes') }}">Gest.Expedientes</a></li>
                                        <li><a class="dropdown-item text-center" href="{{ url('/logout') }}">Cerrar
                                                sesión</a></li>
                                    </ul>
                                @elseif(Auth::check() && Auth::user()->tipus_usuaris_id == '2')
                                    <ul class="dropdown-menu" style="color: #be964c;">
                                        <li><a class="dropdown-item text-center disabled"
                                                aria-disabled="true">{{ Auth::user()->username }}</a></li>
                                        <li><a class="dropdown-item text-center"
                                                href="{{ url('/expedientes') }}">Gest.Expedientes</a></li>
                                        <li><a class="dropdown-item text-center" href="{{ url('/logout') }}">Cerrar
                                                sesión</a></li>
                                    </ul>
                                @else
                                    <ul class="dropdown-menu" style="color: #be964c;">
                                        <li><a class="dropdown-item text-center disabled" aria-disabled="true"
                                                href="#" aria-disabled="true"> {{ Auth::user()->username }}</a>
                                        </li>
                                        <li><a class="dropdown-item text-center" href="{{ url('/logout') }}">Cerrar
                                                sesión</a></li>
                                    </ul>
                                @endif
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
{{-- script modal --}}
@yield('scripts')
@yield('jsFile')

</html>
