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
@endsection

@section('content')

    <body>
        <link href="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.css" rel="stylesheet">
        <script src="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.js"></script>
        <div id="map" style="width: 100%; height: 1200px;"></div>
        <script src="https://unpkg.com/@mapbox/mapbox-sdk/umd/mapbox-sdk.min.js"></script>
        <script src="{{ asset('js/mapas.js') }}"></script>
    </body>
@endsection
