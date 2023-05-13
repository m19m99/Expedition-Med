/// Génération Map ///

const LatLong = {
  lat: 41.78,
  long: 6.15,
};

const zoom = 5;

let map = L.map("map").setView([LatLong.lat, LatLong.long], zoom);

map.setMinZoom(3);

/// Fonction Convertion Coordonnées ///

L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
  maxZoom: 19,
  minZoom: 3,
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
  // { latitude: "42°08.214 N", longitude: "11°36.646 E" },
  // { latitude: "45°25.784 N", longitude: "12°20.643 E" },
  // { latitude: "41°53.716 N", longitude: "12°28.692 E" },
  // { latitude: "38°57,602 N", longitude: "08°26,600 E" },
  // { latitude: "43°26,770 N", longitude: "07°40,909 E" },
  // { latitude: "40°31,947 N", longitude: "08°18,193 E" },
  // { latitude: "43°31,844 N", longitude: "07°005,456 E" },
  { latitude: "39°44,414 N", longitude: "08°21,954 E" },
];

coordinates.forEach(function (coord) {
  let coords = convertCoords(coord.latitude, coord.longitude);

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

  let popupContent = `
  <section class="popup">

  <div>
      <p>42°07.843 N - 11°37.247 E - 42°08.214 N - 11°36.646 E</p>
  </div>

  <div>
      <p>EM22-01</p>
      <img class="logoMap" src="../pointer.jpg" alt="red logo pointer map">
      <p>Tyrrhenian sea</p>
  </div>

  <div class="listes">
      <div>
          <ul>
              <li>Date : 11/07/2022</li>
              <li>Start Time (UTC) : 17h22</li>
              <li>Size (mm) : '2.5 - 5</li>
              <li>Type : Line</li>
              <li>Color : Blue</li>
          </ul>
      </div>
      <div>
          <ul>
              <li>Number : 3</li>
              <li>Start flowmeter : 53827</li>
              <li>End flowmeter : 61885</li>
              <li>Filtered volume (m3) : 61885</li>
              <li>Filtered distance (m) : 2037</li>
          </ul>
      </div>
  </div>

      <div></div>

</section>
  `;

  circle.bindPopup(popupContent);
});

/// Point de prélévement ///

// Définir les coordonnées de la polyligne
let polylineCoords = [];

// Créer la polyligne
let polyline = L.polyline(polylineCoords, { color: "red" }).addTo(map);

/// Button Filtre ///

// Création d'un bouton personnalisé
// Créer un contrôle personnalisé
let customControl = L.Control.extend({
  options: {
    position: "bottomleft",
  },

  onAdd: function (map) {
    let container = L.DomUtil.create("div", "custom-control");
    let button1 = L.DomUtil.create("button", "", container);
    button1.id = "btn1";
    button1.textContent = "Entrer les données";
    button1.addEventListener("click", function () {
      window.location.href = "form.html";
    });
    let button2 = L.DomUtil.create("button", "", container);
    button2.id = "btn2";
    button2.textContent = "Filtres";
    button2.addEventListener("click", function () {
      // TODO mettre fonction affichage
    });
    L.DomEvent.disableClickPropagation(container);
    return container;
  },
});

// Ajouter le contrôle à la carte
map.addControl(new customControl());

// Ajout du bouton personnalisé à la carte
// map.addControl(new customButton());
