mapboxgl.accessToken = 'pk.eyJ1IjoiYWxleGlzcG9saXRlY25pY3MiLCJhIjoiY2xmdG12b3ZuMDJocTN0cXp0ejkzZjNleSJ9.4T5Fr5iVCkm1v2tRNprgHw'

let map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/streets-v12',
    center: [1.8676800,41.8204600],
    zoom : 8
});

map.addControl(new MapboxGeocoder({
    accessToken: mapboxgl.accessToken
}));

var element = document.createElement('div');
element.innerHTML = 'Mi marcador';
element.style.color = '#FF0000';
element.style.fontSize = '16px';

var marker = new mapboxgl.Marker({
  color: '#FF0000',
  draggable: true,
  element: element
}).setLngLat([1.8676800,41.8204600])
  .addTo(map);