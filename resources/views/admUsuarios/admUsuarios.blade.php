@extends('layouts.template')

@section('title', 'Adm. Usuarios')
@section('admUsuariosCss') 
<link rel="stylesheet" href="{{ asset('css/tablas.css') }}">
@endsection
@section('content')

<div class="container">
    <!-- titulos y subtitulos en card -->
    <div class="card  mx-5 text-center border-0">
      <div class="card-body ">
        <!-- TITULO Y SUBTITULO-->
        <div class="d-flex ">
          <h1 class="titulo">Administración</h1>
        </div>

        <hr id="linea" class="w-100 clearfix d-md m-0" />
        
        <div class="d-flex p-3">
          <h3 class="subtitulo">Usuarios</h3>
        </div>
      </div>
    </div>


    <!-- SELECCION USUARIOS  -->

    <div class="card mt-0 mx-5 text-center border-0">
      <div class="container text-center">
        <br>
        <div class="row">
          <div class="col-2">
            <!-- boton de añadir usuario -->
            <a class=" shadow btn btn-warning text-white rounded-3" href="#">
              <i class=" bi bi-plus-circle "></i>
              Nuevo usuario
            </a>
          </div>

          <!-- DESPLEGABLES DE ORDEN Y ACTIVOS  -->
          <div class="col-6">Columna vacia </div>
          <div class="col-2">
            <div class="form-floating">
              <select class="form-select rounded-4" id="floatingSelect" aria-label="Floating label select example">
                <option selected>Todos</option>
                <option value="1">A-Z</option>
                <option value="2">Z-A</option>
              </select>
              <label for="floatingSelect">Ordenar:</label>
            </div>
          </div>
          <div class="col-2">
            <div class="form-floating">
              <select class="form-select rounded-4" id="floatingSelect" aria-label="Floating label select example">
                <option selected>Todos</option>
                <option value="1">Activos</option>
                <option value="2">Desactivados</option>
              </select>
              <label for="floatingSelect">Mostrar:</label>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- EMPEZAMOS TABLA -->
    <div class="card mt-5 mx-5 text-center border-0">
      <div  class="card-body">
          <table  class="table table-striped border-3">
              <thead id="coltablas" class="shadow rounded text-white" >                
                <tr>
                  <th>UserName</th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Tipo</th>
                  <th>Creado</th>
                  <th></th>
              </tr>
            </thead>          
              <tr>
                   {{-- @foreach ($cursos as $curso) --}}
                      <td>nombre</td>
                      <td>nombre</td>
                      <td>apellido</td>                    
                      <td>operador</td>
                      <td>12-12-12</td>
                      <td>
                          <form
                              {{-- action="{{ action([App\Http\Controllers\CursController::class, 'destroy'], ['curso' => $curso->id]) }}" --}}
                              class="float-end mx-1" method="POST">
                               {{-- @csrf  --}}
                              {{-- @method('DELETE')  --}}
                              <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i>
                                  <!-- Esborrar -->
                              </button>
                          </form>
                         {{-- {{ action([App\Http\Controllers\CursController::class, 'edit'], ['curs' => $curso->id]) }} --}} 
                          <form action="" class="float-end" method="POST">
                               {{-- @csrf 
                              @method('GET')  --}}
                              <button type="submit" class="btn btn-secondary"><i class="bi bi-pen"></i>
                                  
                              </button>
                          </form>
                      </td>
              </tr>
              <tr>
                 {{-- @foreach ($cursos as $curso)  --}}
                    <td>nombre</td>
                    <td>nombre</td>
                    <td>apellido</td>                    
                    <td>operador</td>
                    <td>12-12-12</td>
                    <td>
                        <form
                            {{-- action="{{ action([App\Http\Controllers\CursController::class, 'destroy'], ['curso' => $curso->id]) }}" --}}
                            class="float-end mx-1" method="POST">
                             {{-- @csrf 
                             @method('DELETE')  --}}
                            <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i>
                                <!-- Esborrar -->
                            </button>
                        </form>
                        {{-- {{ action([App\Http\Controllers\CursController::class, 'edit'], ['curs' => $curso->id]) }} --}} 
                        <form action="" class="float-end" method="POST">
                             {{-- @csrf
                            @method('GET')  --}}
                            <button type="submit" class="btn btn-secondary"><i class="bi bi-pen"></i>
                                
                            </button>
                        </form>
                    </td>
            </tr>
            <tr>
              {{-- @foreach ($cursos as $curso) --}}
                  <td>nombre</td>
                  <td>nombre</td>
                  <td>apellido</td>                    
                  <td>operador</td>
                  <td>12-12-12</td>
                  <td>
                      <form
                          {{-- action="{{ action([App\Http\Controllers\CursController::class, 'destroy'], ['curso' => $curso->id]) }}" --}}
                          class="float-end mx-1" method="POST">
                           {{-- @csrf 
                           @method('DELETE') --}}
                          <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i>
                              <!-- Esborrar -->
                          </button>
                      </form>
                      {{-- {{ action([App\Http\Controllers\CursController::class, 'edit'], ['curs' => $curso->id]) }} --}} 
                      <form action="" class="float-end" method="POST">
                           {{-- @csrf 
                           @method('GET')  --}}
                          <button type="submit" class="btn btn-secondary"><i class="bi bi-pen"></i>
                              
                          </button>
                      </form>
                  </td>
          </tr>
 {{-- @endforeach 
 @endif --}}
    </table>


    <!-- paginación -->
    {{-- {{ $cursos->links() }} --}}

    </div>
</div>
</div>


@endsection