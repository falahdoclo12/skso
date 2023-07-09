let map;
let markers = [];
let polygon;
let drawingManager;

function initMap() {
    map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: -6.9175, lng: 107.6191 },
        zoom: 8,
    });

    infoWindow = new google.maps.InfoWindow();

    const locationButton = document.createElement("button");

    locationButton.textContent = "Pan to Current Location";
    locationButton.classList.add("custom-map-control-button");
    map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
    locationButton.addEventListener("click", () => {
        // Try HTML5 geolocation.
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                (position) => {
                    const pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude,
                    };

                    infoWindow.setPosition(pos);
                    infoWindow.setContent("Location found.");
                    infoWindow.open(map);
                    map.setCenter(pos);
                },
                () => {
                    handleLocationError(true, infoWindow, map.getCenter());
                }
            );
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
        }
    });

    var kmlLayer = new google.maps.KmlLayer({
        url: kmlFilePath,
        map: map,
    });
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(
        browserHasGeolocation
            ? "Error: The Geolocation service failed."
            : "Error: Your browser doesn't support geolocation."
    );
    infoWindow.open(map);
}

window.initMap = initMap;

drawingManager = new google.maps.drawing.DrawingManager({
    drawingMode: null,
    drawingControlOptions: {
        position: google.maps.ControlPosition.TOP_CENTER,
        drawingModes: [
            google.maps.drawing.OverlayType.MARKER,
            google.maps.drawing.OverlayType.POLYGON,
        ],
    },
    markerOptions: {
        draggable: true,
    },
    polygonOptions: {
        editable: true,
    },
});

drawingManager.setMap(map);

google.maps.event.addListener(drawingManager, "overlaycomplete", (event) => {
    if (event.type === google.maps.drawing.OverlayType.MARKER) {
        markers.push(event.overlay);
    } else if (event.type === google.maps.drawing.OverlayType.POLYGON) {
        deletePolygon();
        polygon = event.overlay;
    }
});

google.maps.event.addListener(drawingManager, "markercomplete", (marker) => {
    markers.push(marker);
});

google.maps.event.addListener(drawingManager, "drawingmode_changed", () => {
    deletePolygon();
    clearMarkers();
});

document.getElementById("import-form").addEventListener("submit", (e) => {
    e.preventDefault();
    importKml();
});

document.getElementById("update-button").addEventListener("click", () => {
    updateKml();
});

document
    .getElementById("delete-tagging-button")
    .addEventListener("click", () => {
        deleteTagging();
    });

document
    .getElementById("delete-polygon-button")
    .addEventListener("click", deletePolygon);

function clearMarkers() {
    markers.forEach((marker) => {
        marker.setMap(null);
    });
    markers = [];
}

function deletePolygon() {
    if (polygon) {
        polygon.setMap(null);
        polygon = null;
    }
}

function importKml() {
    const form = document.getElementById("import-form");
    const formData = new FormData(form);

    fetch(form.action, {
        method: "POST",
        body: formData,
    })
        .then((response) => response.json())
        .then((data) => {
            const kmlFilePath = data.file_path;
            if (kmlFilePath) {
                loadKmlLayer(kmlFilePath);
            }
        })
        .catch((error) => {
            console.error("Error importing KML:", error);
        });
}

function loadKmlLayer(kmlFilePath) {
    const kmlLayer = new google.maps.KmlLayer({
        url: kmlFilePath,
        map: map,
    });
    kmlLayer.addListener("status_changed", () => {
        if (kmlLayer.getStatus() !== "OK") {
            console.error("KML layer could not be loaded.");
        }
    });
}

document.addEventListener("DOMContentLoaded", () => {
    document
        .getElementById("delete-polygon-button")
        .addEventListener("click", deletePolygon);
});

google.maps.event.addDomListener(window, "load", initMap);
