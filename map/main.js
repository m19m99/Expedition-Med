/// Génération Map ///


const LatLong = {
  lat: 35.8575,
  long: 18.8530,
};

const zoom = 3;

let map = L.map("map").setView([LatLong.lat, LatLong.long], zoom);

let mediterraneanBounds = L.latLngBounds(
  L.latLng(30, -20), // coin sud-ouest de la Méditerranée
  L.latLng(46, 36) // coin nord-est de la Méditerranée
);

map.setMaxBounds(mediterraneanBounds);

map.setMinZoom(3); 





/// Fonction Convertion Coordonnées ///


L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
  maxZoom: 10,
  attribution:
    '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
}).addTo(map);

function convertCoordToDecimal(coord) {
  let degrees = parseInt(coord.substring(0, coord.indexOf("°")));
  let minutes = parseInt(
    coord.substring(coord.indexOf("°") + 1, coord.indexOf("'"))
  );
  let seconds = parseFloat(coord.substring(coord.indexOf("'") + 1));
  let decimal = degrees + minutes / 60 + seconds / 3600;
  return decimal;
}

function convertCoords(latitude, longitude) {
  let latDecimal = convertCoordToDecimal(latitude);
  let lonDecimal = convertCoordToDecimal(longitude);
  return {
    latitude: latDecimal,
    longitude: lonDecimal,
  };
}




/// ZONE PLASTIQUE ///


// Exemple d'utilisation :
let coordinates = [
  { latitude: "42°08.214 N", longitude: "11°36.646 E" },
  { latitude: "45°25.784 N", longitude: "12°20.643 E" },
  { latitude: "41°53.716 N", longitude: "12°28.692 E" }
];

coordinates.forEach(function(coord) {
  let coords = convertCoords(coord.latitude, coord.longitude);

  let circle = L.circle([coords.latitude, coords.longitude], {
    color: "#1B3C60",
    fillColor: "#1B3C60",
    fillOpacity: 0.5,
    radius: 30000,
  }).addTo(map);

  circle.bindPopup("I am a circle.", {
    className: "myPopup"
  });
});

let popupContent = `
  <div class="my-popup">
    <h3>Mon titre de popup</h3>
    <p>Je suis un contenu de popup personnalisé.</p>
  </div>
`;

circle.bindPopup(popupContent);




/// Point de prélévement ///


// Définir les coordonnées de la polyligne
let polylineCoords = [
  
];

// Créer la polyligne
let polyline = L.polyline(polylineCoords, {color: 'red'}).addTo(map);