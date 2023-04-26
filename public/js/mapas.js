mapboxgl.accessToken = 'pk.eyJ1IjoiYWxleGlzcG9saXRlY25pY3MiLCJhIjoiY2xnZjI0bDhiMDlqMDNucXBwZ2tncjcwYiJ9.cyNA9AcMvwC8spRryojQlA';

const map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/streets-v11',
    center: [2.1589900, 41.3887900],
    zoom: 12,
});

const mapboxClient = mapboxSdk({ accessToken: mapboxgl.accessToken });

fetch('/EMT/public/api/mapa')
    .then(response => response.json())
    .then(data => {
        data.forEach(dato => {
            mapboxClient.geocoding.forwardGeocode({
                query: dato.carrer + ' ' + dato.codi_postal + ' Barcelona',
                autocomplete: false,
                limit: 1,
            })
            .send()
            .then(response => {
                const match = response.body.features[0];
                const popupContent = `<h3>${dato.nom}</h3><p>${dato.carrer}, ${dato.codi_postal}</p><button class="selec">Seleccionar</button>`;
                const popup = new mapboxgl.Popup().setHTML(popupContent);
                const marker = new mapboxgl.Marker()
                    .setLngLat(match.center)
                    .setPopup(popup)
                    .addTo(map);
            });
        });
    });

