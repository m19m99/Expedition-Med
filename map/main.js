const LatLong = {
  lat: 43.2965,
  long: 5.3698,
};

const zoom = 5;

let map = L.map("map").setView([LatLong.lat, LatLong.long], zoom);

L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
  maxZoom: 19,
  minZoom: 3,
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

// Exemple d'utilisation :
let latitude = "42°08.214 N";
let longitude = "11°36.646 E";

let coords = convertCoords(latitude, longitude);

let circle = L.circle([coords.latitude, coords.longitude], {
  color: "#1B3C60",
  fillColor: "#1B3C60",
  fillOpacity: 0.5,
  radius: 30000,
}).addTo(map);

let dates = document.querySelector(".dates");
let navBtn = document.querySelector(".nav-link");

let isDatesHidden = true; // La valeur par défaut est "caché"

navBtn.addEventListener("click", (event) => {
  event.preventDefault();

  if (isDatesHidden) {
    dates.classList.remove("hidden");
    isDatesHidden = false;
  } else {
    dates.classList.add("hidden");
    isDatesHidden = true;
  }
});
