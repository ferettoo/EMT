@extends('layouts.template')

@section('title', 'Adm. Usuarios')
@section('admUsuariosCss')
    <link rel="stylesheet" href="{{ asset('css/tablas.css') }}">
@endsection

@section('carta')
    <a class="rounded-5 btn btn-warning text-white" style=" font-weight: 700;" type="submit" href="{{ url('/carta') }}">
        <i class="bi bi-plus-lg"></i>
        Call card
    </a>

@endsection

@section('content')

    <div class="container mt-0">
        {{-- mensajes de error --}}
        <br>
        @include('partials.mensajes')

        <!-- titulos y subtitulos en card -->
        {{-- <div class="card  mx-5 text-center border-0"> --}}
        <div class="card-body mx-5 text-center border-0 ">
            <!-- TITULO Y SUBTITULO-->
            <div class="d-flex ">
                <h1 class="titulo">Administración  <i class="bi bi-person-fill"></i></h1>
            </div>

            <hr id="linea" class="w-100 clearfix d-md m-0" />

            <div class="d-flex p-3">
                <h3 class="subtitulo">Usuarios</h3>
            </div>
        </div>
        {{-- </div> --}}

        <!-- SELECCION USUARIOS  -->

        <div class="card mt-3 mx-5 text-center border-0">
            <div class="container text-center">
                <br>
                <form class=" form-row "
                    action="{{ action([App\Http\Controllers\AdmUsuariosController::class, 'index']) }}">
                    <div class="row">
                        <div class="col-2">
                            <!-- boton de añadir usuario -->
                            <a href="{{ route('admUsuarios.create') }}"
                                class=" shadow btn btn-warning text-white rounded-3">
                                <i class=" bi bi-plus-circle "></i>
                                Nuevo usuario
                            </a>
                        </div>

                        <div class="col-6">
                        </div>

                        <form action="{{ action([App\Http\Controllers\AdmUsuariosController::class, 'index']) }}">
                            <!-- DESPLEGABLES-->
                            <div class="col-3">
                                <div class="form-floating">
                                    <select class="form-select rounded-4" id="selecTipo" name="selecTipo"
                                        aria-label="Floating label select example">
                                        <option value="todos">Todos</option>
                                        {{-- mostrar por tipo de usuario --}}
                                        @foreach ($tipoUsuarios as $tipo)
                                            @if (old('selecTipo') == $tipo->id)
                                                <option value="{{ $tipo->id }}" selected>{{ $tipo->nom }}</option>
                                            @else
                                                <option value="{{ $tipo->id }}">{{ $tipo->nom }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <label for="floatingSelect">Mostrar:</label>
                                </div>
                            </div>

                            <div class="col-1">
                                <button type="submit" id="coltablas"
                                    class="shadow border border-0 rounded-3 text-white btn btn-primary mb-3 ">
                                    Buscar</button>
                            </div>


                        </form>
                    </div>
            </div>
        </div>

        <!-- EMPEZAMOS TABLA -->
        <div class="card mt-3 mx-5 text-center border-0">
            <div class="card-body">
                <table class="table table-striped border-3">
                    <thead id="coltablas" class="shadow rounded text-white">
                        <tr>
                            <th>ID</th>
                            <th>UserName</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Tipo</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tr>
                        {{-- array con los usuarios --}}
                        @foreach ($usuaris as $usuari)
                            <td>{{ $usuari->id }}</td>
                            <td>{{ $usuari->username }}</td>
                            <td>{{ $usuari->nom }}</td>
                            <td>{{ $usuari->cognoms }}</td>
                            <td>{{ $usuari->tipusUsuaris->nom }}</td>
                            <td>

                                {{-- Borrado con modal --}}
                                <button type="button" class="btn btn-danger float-end mx-1" data-bs-toggle="modal"
                                    data-bs-target="#modal" data-bs-username="{{ $usuari->username }}"
                                    data-bs-action="{{ action([App\Http\Controllers\AdmUsuariosController::class, 'destroy'], $usuari->id) }}"><i
                                        class="bi bi-trash-fill"></i>
                                </button>



                                {{-- editar --}}
                                <form
                                    action="{{ action([App\Http\Controllers\AdmUsuariosController::class, 'edit'], ['admUsuario' => $usuari->id]) }}"
                                    class="float-end mx-1" method="POST">
                                    @csrf
                                    @method('GET')
                                    <button type="submit" class="btn btn-secondary"><i class="bi bi-pen"></i>
                                    </button>
                                </form>

                                {{-- contraseña --}}
                                <form
                                    action="{{ action([App\Http\Controllers\AdmUsuariosController::class, 'editContrasenya'], ['admUsuario' => $usuari->id]) }}"
                                    class="float-end mx-1 " method="POST">
                                    @csrf
                                    @method('GET')
                                    <button type="submit" class="btn btn-primary text-white"><i class="bi bi-asterisk"></i>
                                    </button>
                                </form>



                            </td>
                    </tr>
                    @endforeach
                </table>

                <!-- paginación -->
                <div class="col-1">
                    {{ $usuaris->links() }}
                </div>


            </div>
        </div>


        {{-- MODAL --}}
        <div class="modal fade modalUsuarios" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        {{-- TITULO --}}
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Borrar usuario</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    {{-- CONTENIDO BODY --}}
                    <div class="modal-body">
                    </div>
                    {{-- BOTONES --}}
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-lg">
                            </i> Cancelar</button>
                        <form method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-trash-fill"></i> Borrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    <script src="{{ asset('js1/modal2.js') }}"></script>
@endsection
