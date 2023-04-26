@extends('layouts.template')

@section('title', 'HelpBox')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="./terceros/bootstrap-5.2.1-dist/css/bootstrap.min.css">
  <script src="./terceros/bootstrap-5.2.1-dist/js/bootstrap.bundle.min.js"></script>

  <!-- montserrat -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&family=Roboto&display=swap" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css"  href="./css.css">



  <title>HelpBox</title>
</head>

<body>
  <div class="container">

    <h1 class="titulo">HelpBox</h1>

    <hr id="linea" class="w-100 clearfix d-md" />

    <h2 class="subtitulo">Traducciones</h2>


    <div class="container">
      <div class="row">
        <div class="col-sm">
          <div id="card_helpbox" class="card mt-0 mx-5 text-center border-0">
            <h4>INCIDENTES</h4>
            <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">ESPAÑOL</th>
                        <th scope="col">INGLES</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Apuñalamiento</td>
                        <td>Stabbing</td>
                      </tr>
                      <tr>
                        <td>Arbol caido</td>
                        <td>Fallen tree</td>
                      </tr>
                      <tr>
                        <td>Derrumbe</td>
                        <td>Collapse</td>
                      </tr>
                      <tr>
                        <td>Ahogamiento</td>
                        <td>Drowing</td>
                      </tr>
                      <tr>
                        <td>Arbol Caido</td>
                        <td>Fallen Tree</td>
                      </tr>
                      <tr>
                        <td>Incendio</td>
                        <td>Fire</td>
                        <tr>
                          <td>Explosion</td>
                          <td>Burst</td>
                        </tr>
                        <tr>
                          <td>Rescate</td>
                          <td>Rescue</td>
                        </tr>
                        <tr>
                          <td>Enfermedad</td>
                          <td>Collapse</td>
                        </tr>
                        <tr>
                          <td>Fallecimiento</td>
                          <td>Death</td>
                        </tr>
                        <tr>
                          <td>Desaparicion</td>
                          <td>Disappearance</td>
                        </tr>
                        <tr>
                          <td>Inundación</td>
                          <td>Flood</td>
                      </tr>
                    </tbody>
                  </table>
              </div>
           </div>
        </div>
        <div class="col-sm">
          <div id="card_helpbox" class="card mt-0 mx-5 text-center border-0">
            <h4>AGENCIAS</h4>
            <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">ESPAÑOL</th>
                        <th scope="col">INGLES</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Bomberos</td>
                        <td>Firefighters</td>
                      </tr>
                      <tr>
                        <td>Guardia Costera</td>
                        <td>Coast Guard</td>
                      </tr>
                      <tr>
                        <td>Policia</td>
                        <td>Police</td>
                      </tr>
                      <tr>
                        <td>Ambulancia</td>
                        <td>Ambulance</td>
                      </tr>
                    </tbody>
                  </table>
              </div>
           </div>

           <div id="card_helpbox" class="card mt-0 mx-5 text-center border-0">
            <h4>UBICACIONES</h4>
            <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">ESPAÑOL</th>
                        <th scope="col">INGLES</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Provincia</td>
                        <td>Province</td>
                      </tr>
                      <tr>
                        <td>Municipio</td>
                        <td>Municipality</td>
                      </tr>
                      <tr>
                        <td>Carretera</td>
                        <td>Road</td>
                      </tr>
                      <tr>
                        <td>Entidad Población</td>
                        <td>Entity Population</td>
                      </tr>
                    </tbody>
                  </table>
              </div>
           </div>
        </div>


        <div class="col-sm">
          <div id="card_helpbox_preguntas" class="card mt-0 mx-5 text-center border-0">
            <h4>PREGUNTAS</h4>
            <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">ESPAÑOL</th>
                        <th scope="col">INGLES</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Cual es tu nombre?</td>
                        <td>What's Your Name</td>
                      </tr>
                      <tr>
                        <td>Cual es tu emergencia?</td>
                        <td>What is your emergency</td>
                      </tr>
                      <tr>
                        <td>Donde ah ocurrido el incidente?</td>
                        <td>Where has the incident occurred?</td>
                      </tr>
                      <tr>
                        <td>Hay algún herido?</td>
                        <td>Is there anyone injured?</td>
                      </tr>
                      <tr>
                        <td>Esta dentro de cataluña?</td>
                        <td>Is it in Catalonia?</td>
                      </tr>
                      <tr>
                        <td>En que provincia se encuentra?</td>
                        <td>In which province is it located?</td>
                        <tr>
                          <td>Podria decirme la direccion?</td>
                          <td>Could you tell me the address?</td>
                        </tr>
                      </tr>
                    </tbody>
                  </table>
              </div>
           </div>
        </div>
      </div>
    </div>
</body>
</html>

@endsection
