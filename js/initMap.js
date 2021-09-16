var mymap = L.map('leafletjs-map').setView([52.63054887527253, 1.2930625839916072], 16);

L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1IjoicGVyc2lzdGVudGdvYXRpbnZlc3RvciIsImEiOiJja3Rtejc0aDUwZ2dvMm9yMGl4eHc4eXY0In0.Cx7zz2nJMW2W9Eiy0NKgAg'
}).addTo(mymap);

var marker = L.marker([52.63054887527253, 1.2930625839916072]).addTo(mymap);
marker.bindPopup("<b>Inspire Norfolk</b><br> Norwich.").openPopup();

