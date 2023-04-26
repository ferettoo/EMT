@extends('layouts.template')

@section('title', 'Mapa')
@section('carta')
    <a class="rounded-5 btn btn-warning text-white" style=" font-weight: 700;" type="submit" href="{{ url('/carta') }}">
        <i class="bi bi-plus-lg"></i>
        Call card
    </a>
@endsection

@section('hrefmap')
    <link rel="stylesheet" href="{{ asset('css/mapa.css') }}">
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css' rel='stylesheet' />
    <link href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.1/mapbox-gl-geocoder.css'
        rel='stylesheet' />
@endsection

@section('content')

    <body>
        <div id="map">

        </div>
        <script src='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js'></script>
        <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.1/mapbox-gl-geocoder.min.js'></script>
        <script src="{{ asset('js/mapas.js') }}"></script>
    </body>
@endsection
