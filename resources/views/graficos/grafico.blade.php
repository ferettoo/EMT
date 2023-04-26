@extends('layouts.template')

@section('title', 'Graficos')
@section('carta')
    <a class="rounded-5 btn btn-warning text-white" style=" font-weight: 700;" type="submit" href="{{ url('/carta') }}">
        <i class="bi bi-plus-lg"></i>
        Call card
    </a>
@endsection








@section('content')


    <h1 class="titulo" id="seccion1">Gráficos</h1>

    <hr class="w-100 clearfix d-md" />

    <span>
        <a href="#seccion2" class="btn btn-warning"><strong>Por provincias</strong></a>
    </span>

    <span class="mx-2">
        <a href="#seccion3" class="btn btn-warning"><strong>Por meses</strong></a>
    </span>

    <div class="row mt-5">
        <!-- En este div pondremos los objetos alineados -->

        <div class="col-3">
            <!-- En esta primera columna pondremos los datos con el porcentage -->

            <div class="container porcentages">

                @foreach ($incidentes as $key => $incident)
                    <h5 class="incidentes">{{ $incident->nom . ' ' . $porcentages[$key] . '%' }}</h5>
                @endforeach

            </div>

        </div>

        <div class="col-7">
            <!-- Segunda columna donde queremos poner el gráfico -->

            <div width="" heigth="" class="pepe">
                <canvas id="grafico"></canvas>
            </div>

        </div>

        <div class="col-2">
            <!-- Tercera columna donde pondremos el número de llamadas y el filtro de los incidentes -->

            <h2 class="subtitulo">Llamadas: {{ $llamadas }}</h2>

        </div>



        <div id="seccion2" style="padding-top: 50px">
            <span>
                <a href="#seccion1" class="btn btn-warning"><strong>Global</strong></a>
            </span>

            <span class="mx-2">
                <a href="#seccion3" class="btn btn-warning"><strong>Por meses</strong></a>
            </span>
        </div>
        <!-- Gràfics BCN -->
        <div class="col-2" id="seccion1">

            <div class="container porcentagesProvincia">

                @foreach ($incidentesBcn as $key => $incident)
                    <h5 class="incidentesProvincia">{{ $incident->nom . ' ' . $porcentagesBcn[$key] . '%' }}</h5>
                @endforeach

            </div>

            <div>
                <h5 class="incidentes">Llamadas: {{ $llamadasBcn }}</h2>
            </div>
        </div>

        <div class="col-4 mt-5">
            <h2 class="subtituloDelGrafico">Barcelona</h2>
            <div width="" heigth="">
                <canvas id="graficoBcn"></canvas>
            </div>
        </div>

        <!-- Gràfics GIR  -->
        <div class="col-2">
            <div class="container porcentagesProvincia">

                @foreach ($incidentesGir as $key => $incident)
                    <h5 class="incidentesProvincia">{{ $incident->nom . ' ' . $porcentagesGir[$key] . '%' }}</h5>
                @endforeach

            </div>

            <div>
                <h5 class="incidentes">Llamadas: {{ $llamadasGir }}</h5>
            </div>
        </div>

        <div class="col-4 mt-5">
            <h2 class="subtituloDelGrafico">Girona</h2>
            <div width="" heigth="">
                <canvas id="graficoGir"></canvas>
            </div>
        </div>


        <!-- Gràfics LLEIDA -->
        <div class="col-2">
            <div class="container porcentagesProvincia">

                @foreach ($incidentesLlei as $key => $incident)
                    <h5 class="incidentesProvincia">{{ $incident->nom . ' ' . $porcentagesLlei[$key] . '%' }}</h5>
                @endforeach

            </div>

            <div>
                <h5 class="incidentes">Llamadas: {{ $llamadasLlei }}</h2>
            </div>
        </div>

        <div class="col-4 mt-5">
            <h2 class="subtituloDelGrafico">Lleida</h2>
            <div width="" heigth="" class="pepe">
                <canvas id="graficoLleida"></canvas>
            </div>
        </div>

        <!-- Gràfics TARR -->
        <div class="col-2">
            <div class="container porcentagesProvincia">

                @foreach ($incidentesTarr as $key => $incident)
                    <h5 class="incidentesProvincia">{{ $incident->nom . ' ' . $porcentagesTarr[$key] . '%' }}</h5>
                @endforeach

            </div>

            <div>
                <h5 class="incidentes">Llamadas: {{ $llamadasTarr }}</h5>
            </div>
        </div>

        <div class="col-4 mt-5">
            <h2 class="subtituloDelGrafico">Tarragona</h2>
            <div width="" heigth="" class="pepe">
                <canvas id="graficoTarr"></canvas>
            </div>
        </div>

        <div>
            <span>
                <a href="#seccion1" class="btn btn-warning" id="seccion3"><strong>Global</strong></a>
            </span>

            <span class="mx-2">
                <a href="#seccion2" class="btn btn-warning"><strong>Por provincias</strong></a>
            </span>

            <div id="margin">
                <canvas id="meses"></canvas>
            </div>
        </div>

    </div>

    <script>
        let pepe;
        let nombres = [];
        let datos = [];
        let nombresBcn = [];
        let datosBcn = [];
        let nombresGir = [];
        let datosGir = [];
        let nombresLlei = [];
        let datosLlei = [];
        let nombresTarr = [];
        let datosTarr = [];
        let incidentesMes = [];


        // Gráfico principal
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


        // Gráfico BCN
        fetch('/EMT/public/api/graficosBcn')
            .then(response => response.json())
            .then(data => {
                pepe = data;
                console.log(pepe);

                pepe.forEach(function(pepe) {
                    console.log(pepe);
                    //Ahora en estas variables tenemos los datos traídos de la Api
                    nombresBcn.push(pepe.nom);
                    datosBcn.push(pepe.numeros);
                });

                let grafica1 = document.getElementById("graficoBcn");
                let donut1 = new Chart(grafica1, {
                    type: 'doughnut',
                    data: {
                        labels: nombresBcn,
                        datasets: [{

                            label: "Número de incidentes",
                            data: datosBcn,
                            backgroundColor: ["#ff6384", "#36a2eb", "#ffcd56", "#FCED60", "#7EFC00",
                                "#0CD9F2", "#05F281", "#D13DFC", "#F2531B", "#FCC779"
                            ]
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        width: 400,
                        height: 350
                    }
                });
            })

        // Gráfico GIRONA
        fetch('/EMT/public/api/graficosGirona')
            .then(response => response.json())
            .then(data => {
                pepe = data;
                console.log(pepe);

                pepe.forEach(function(pepe) {
                    console.log(pepe);
                    //Ahora en estas variables tenemos los datos traídos de la Api
                    nombresGir.push(pepe.nom);
                    datosGir.push(pepe.numeros);
                });

                let grafica2 = document.getElementById("graficoGir");
                let donut2 = new Chart(grafica2, {
                    type: 'doughnut',
                    data: {
                        labels: nombresGir,
                        datasets: [{

                            label: "Número de incidentes",
                            data: datosGir,
                            backgroundColor: ["#ff6384", "#36a2eb", "#ffcd56", "#FCED60", "#7EFC00",
                                "#0CD9F2", "#05F281", "#D13DFC", "#F2531B", "#FCC779"
                            ]
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        width: 400,
                        height: 350
                    }
                });
            })


        // Gráfico LLEIDA
        fetch('/EMT/public/api/graficosLleida')
            .then(response => response.json())
            .then(data => {
                pepe = data;
                console.log(pepe);

                pepe.forEach(function(pepe) {
                    console.log(pepe);
                    //Ahora en estas variables tenemos los datos traídos de la Api
                    nombresLlei.push(pepe.nom);
                    datosLlei.push(pepe.numeros);
                });

                let grafica3 = document.getElementById("graficoLleida");
                let donut3 = new Chart(grafica3, {
                    type: 'doughnut',
                    data: {
                        labels: nombresLlei,
                        datasets: [{

                            label: "Número de incidentes",
                            data: datosLlei,
                            backgroundColor: ["#ff6384", "#36a2eb", "#ffcd56", "#FCED60", "#7EFC00",
                                "#0CD9F2", "#05F281", "#D13DFC", "#F2531B", "#FCC779"
                            ]
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        width: 400,
                        height: 350
                    }
                });
            })


        // Gráfico TARRAGONA
        fetch('/EMT/public/api/graficosTarragona')
            .then(response => response.json())
            .then(data => {
                pepe = data;
                console.log(pepe);

                pepe.forEach(function(pepe) {
                    console.log(pepe);
                    //Ahora en estas variables tenemos los datos traídos de la Api
                    nombresTarr.push(pepe.nom);
                    datosTarr.push(pepe.numeros);
                });

                let grafica4 = document.getElementById("graficoTarr");
                let donut4 = new Chart(grafica4, {
                    type: 'doughnut',
                    data: {
                        labels: nombresTarr,
                        datasets: [{

                            label: "Número de incidentes",
                            data: datosTarr,
                            backgroundColor: ["#ff6384", "#36a2eb", "#ffcd56", "#FCED60", "#7EFC00",
                                "#0CD9F2", "#05F281", "#D13DFC", "#F2531B", "#FCC779"
                            ]
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        width: 400,
                        height: 350
                    }
                });
            })


        // Gráfico incidentes por mes
        fetch('/EMT/public/api/graficosIncidentesMes')
            .then(response => response.json())
            .then(data => {
                pepe = data;
                console.log(pepe);

                pepe.forEach(function(pepe) {
                    console.log(pepe);
                    //Ahora en estas variables tenemos los datos traídos de la Api
                    incidentesMes.push(pepe.total);
                });

                const ctx = document.getElementById('meses');


                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto',
                            'Septiembre',
                            'Octubre', 'Noviembre', 'Diciembre'
                        ],
                        datasets: [{
                            label: 'Incidentes registrados',
                            data: incidentesMes,
                            fill: true,
                            borderColor: '#11ADC4',
                            tension: 0.1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            })
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

        .porcentages {

            /* background-color: #F9F9F9; */
            background-color: #9e999977;
            border-radius: 7px;
            padding-top: 8px;
            padding-bottom: 8px;
            width: 332px;
            padding-left: 1px
        }

        .porcentagesProvincia {

            /* background-color: #F9F9F9; */
            background-color: #9e999977;
            border-radius: 7px;
            padding-top: 8px;
            padding-bottom: 8px;
            width: 150px;
            padding-left: 1px;
            margin-top: 100px;
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
            margin-left: 24px;
            margin-bottom: 10px;
            margin-top: 10px;
        }

        h5.incidentesProvincia {
            font-weight: bold;
            margin-left: 20px;
            margin-bottom: 10px;
            margin-top: 10px;
            font-size: 12px;
        }

        #grafico {
            height: 600px;
            width: 766px;

        }

        .pepe {
            margin-bottom: 500px;
        }

        .subtituloDelGrafico {
            font-size: 40px;
            font-weight: bold;
            text-align: center;

        }

        #margin {
            margin-bottom: 100px
        }
    </style>



    </body>

    </html>

@endsection
