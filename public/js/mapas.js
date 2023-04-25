mapboxgl.accessToken = 'pk.eyJ1IjoiYWxleGlzcG9saXRlY25pY3MiLCJhIjoiY2xnZjI0bDhiMDlqMDNucXBwZ2tncjcwYiJ9.cyNA9AcMvwC8spRryojQlA';

const map = new mapboxgl.Map({
  container: 'map',
  style: 'mapbox://styles/mapbox/streets-v11',
  center: [-3.7037902, 40.4167754], // coordenadas del centro de Madrid
  zoom: 12,
});

fetch('/EMT/public/api/mapa')
  .then(response => response.json())
  .then(data => {
    const geocoder = new MapboxGeocoder({
      accessToken: mapboxgl.accessToken,
      mapboxgl: mapboxgl,
      marker: false, // desactivamos el marcador que muestra la posición del usuario
    });

    map.addControl(geocoder);

    data.forEach(dato => {
      geocoder.query(`${dato.carrer}, ${dato.codi_postal}`, (result) => {
        if (result && result.features && result.features.length > 0) {
          const feature = result.features[0];
          const popup = new mapboxgl.Popup().setHTML(
            `<h3>${dato.nom}</h3><p>${dato.carrer}, ${dato.codi_postal}</p>`
          );
          new mapboxgl.Marker()
            .setLngLat(feature.center)
            .setPopup(popup)
            .addTo(map);
        }
      });
    });
  });
