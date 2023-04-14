@extends('layouts.template')

@section('title', 'Mapa')

@section('hrefmap')
<link rel="stylesheet" href="{{ asset('css/mapa.css') }}">
<link rel="stylesheet" href="{{ asset('js/mapa.js') }}">
<link href='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css' rel='stylesheet' />
<script src='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js'></script>
@endsection

@section('content')
<body>
    <div id="map">

    </div>
</body>
@endsection
