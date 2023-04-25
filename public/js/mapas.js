mapboxgl.accessToken = 'pk.eyJ1IjoiYWxleGlzcG9saXRlY25pY3MiLCJhIjoiY2xnZjI0bDhiMDlqMDNucXBwZ2tncjcwYiJ9.cyNA9AcMvwC8spRryojQlA';
const map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/streets-v12',
    center: [-74.5, 40],
    zoom: 9
});

// 	mapboxgl.accessToken = 'pk.eyJ1IjoiYWxleGlzcG9saXRlY25pY3MiLCJhIjoiY2xnZjI0bDhiMDlqMDNucXBwZ2tncjcwYiJ9.cyNA9AcMvwC8spRryojQlA';
// const mapboxClient = mapboxSdk({ accessToken: mapboxgl.accessToken });
// mapboxClient.geocoding
// .forwardGeocode({
// query: 'Wellington, New Zealand',
// autocomplete: false,
// limit: 1
// })
// .send()
// .then((response) => {
// if (
// !response ||
// !response.body ||
// !response.body.features ||
// !response.body.features.length
// ) {
// console.error('Invalid response:');
// console.error(response);
// return;
// }
// const feature = response.body.features[0];

// const map = new mapboxgl.Map({
// container: 'map',
// // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
// style: 'mapbox://styles/mapbox/streets-v12',
// center: feature.center,
// zoom: 10
// });

// // Create a marker and add it to the map.
// new mapboxgl.Marker().setLngLat(feature.center).addTo(map);
// });

