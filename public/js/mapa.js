mapboxgl.accessToken = 'pk.eyJ1IjoiYWxleGlzcG9saXRlY25pY3MiLCJhIjoiY2xnZjI0bDhiMDlqMDNucXBwZ2tncjcwYiJ9.cyNA9AcMvwC8spRryojQlA';
var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/streets-v11',
    center: [-74.5, 40],
    zoom: 9
});

// fetch('/EMT/public/api/mapVista')
//     .then(response => response.json())
//     .then(data => {

//         datos = data;



//     })
