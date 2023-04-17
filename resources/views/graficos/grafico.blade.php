@extends('layouts.template')

@section('title', 'Graficos')
@section('carta')
<a class="rounded-5 btn btn-warning text-white" style=" font-weight: 700;" type="submit" href="{{ url('/carta') }}">
<i class="bi bi-plus-lg"></i>
    Call card
</a>
@endsection

@section('content')

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
        </script>
        <title>Gráficos</title>
    </head>

    <body>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Esta es la etiqueta CDN para poder utilizar los gráficos -->

        </div>
        </div>
        </nav>
        </div>

        </div>
        <div class="container">

            <h1 class="titulo">Gráficos</h1>

            <hr class="w-100 clearfix d-md" />

            <div class="row mt-5">
                <!-- En este div pondremos los objetos alineados -->

                <div class="col-3">
                    <!-- En esta primera columna pondremos los datos con el porcentage -->

                    <div class="container" id="porcentages">

                        @foreach ($incidentes as $key => $incident)
                            <h5 class="incidentes">{{ $incident->nom . ' ' . $porcentages[$key] . '%' }}</h5>
                        @endforeach

                    </div>

                </div>

                <div class="col-7">
                    <!-- Segunda columna donde queremos poner el gráfico -->

                    <div width="" heigth="">
                        <canvas id="grafico"></canvas>
                    </div>

                </div>

                <div class="col-2">
                    <!-- Tercera columna donde pondremos el número de llamadas y el filtro de los incidentes -->

                    <h2 class="subtitulo">Llamadas: {{ $llamadas }}</h2>

                </div>

            </div>

            <script>
                let pepe;
                let nombres = [];
                let datos = [];

                fetch('/EMT/public/api/graficos')
                    .then(response => response.json())
                    .then(data => {
                        pepe = data;
                        console.log(pepe);

                        pepe.forEach(function(pepe) {
                            console.log(pepe);
                            //Ahora en estas variables tenemos los datos traídos de la Api
                            nombres.push(pepe.nom);
                            datos.push(pepe.numeros);
                        });
                        console.log(nombres);
                        console.log(datos);


                        //Hacer dos arrays y poner los datos para poderlos recorrer tanto en el label como en el data

                        let grafica = document.getElementById("grafico");
                        let donut = new Chart(grafica, {
                            type: 'doughnut',
                            data: {
                                labels: nombres,
                                datasets: [{

                                    label: "Número de incidentes",
                                    data: datos,
                                    backgroundColor: ["#ff6384", "#36a2eb", "#ffcd56", "#FCED60", "#7EFC00",
                                        "#0CD9F2", "#05F281", "#D13DFC", "#F2531B", "#FCC779"
                                    ]
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                width: 800,
                                height: 700
                            }
                        });
                    })

                // let grafica = document.getElementById("grafico");
                // let donut = new Chart(grafica, {
                //     type: 'doughnut',
                //     data: {
                //         labels: ['Accident', 'Altres incidències', 'Assistència sanitària', 'Civisme',
                //             'Fuita (Aigua, gas, altres)', 'Incendi', 'Medi ambient', 'Meteorologia',
                //             'Seguretat',
                //             'Trànsit'
                //         ],
                //         datasets: [{
                //             label: "Número de incidentes",
                //             data: [500, 200, 300, 300, 300, 300, 300, 300, 300, 300],
                //             backgroundColor: ["#ff6384", "#36a2eb", "#ffcd56"]
                //         }]
                //     },
                //     options: {
                //         responsive: true,
                //         maintainAspectRatio: false,
                //         width: 800,
                //         height: 700
                //     }
                // });
            </script>

            <style>
                @import url('https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap');

                /* PLANTILLA PARA TODAS LAS PAGINAS */
                /* PLANTILLA PARA TODAS LAS PAGINAS */
                * {
                    font-family: 'Roboto', sans-serif;
                }

                /* FONDO BLANCO PARA TODAS LAS PAGINAS */
                body {
                    background-color: rgb(255, 255, 255);
                }

                #person {
                    width: 32;
                    height: 32;
                }

                /* NAVBAR MAS GRANDE */
                #cuadroNav {
                    height: 58px;
                }

                /* TITULO PRINCIAPL DE LA PAGINA */
                h1.titulo {
                    margin-top: 70px;
                    margin-bottom: 30px;
                    font-family: 'Lato', sans-serif;
                    font-weight: bold;
                }


                #linea {
                    color: #BB1167;
                }

                .dropdown-menu {
                    width: 20px;
                    font-size: 2px;
                }

                .dropdown-item {
                    font-size: 17px;
                }

                li {
                    width: 150px;
                }


                li.nav-item {
                    font-weight: bold;
                }

                #porcentages {

                    background-color: #F9F9F9;
                    border-radius: 7px;
                    padding-top: 8px;
                    padding-bottom: 8px;
                    width: 332px;
                    padding-left: 1px
                }

                /* SUBTITULO PRINCIAPL DE LA PAGINA */
                h2.subtitulo {
                    margin-top: 35px;
                    margin-bottom: 40px;
                    font-weight: bold;
                    font-family: 'Lato', sans-serif;
                    text-align: right;
                }

                h2.subtitulo2 {
                    margin-top: 35px;
                    margin-bottom: 40px;
                    font-weight: bold;
                    font-family: 'Lato', sans-serif;
                    text-align: left;
                }

                h2.subtitulo3 {
                    margin-top: 35px;
                    margin-bottom: 40px;
                    font-weight: bold;
                    font-family: 'Lato', sans-serif;
                    text-align: right;
                }

                /* SEPARACION ENTRE ELEMNTOS EN LA NAVBAR */
                li {

                    font-size: 15px;
                    color: white;
                }

                /* Nuevos elementos */
                h5.incidentes {
                    font-weight: bold;
                    margin-left: 30px;
                    margin-bottom: 10px;
                    margin-top: 10px;
                }

                #grafico {
                    height: 600px !important;
                    width: 766px !important;
                }
            </style>



    </body>

    </html>

@endsection
