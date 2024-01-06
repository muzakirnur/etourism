let map;

async function initMap() {
    // The location of Uluru
    const position = { lat: 5.221809197503294, lng: 96.71791035533619 };
    // Request needed libraries.
    //@ts-ignore
    const { Map } = await google.maps.importLibrary("maps");
    const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");

    // The map, centered at Uluru
    map = new Map(document.getElementById("map"), {
        zoom: 15,
        center: position,
        mapId: "admin",
    });
    google.maps.event.addListener(map, "click", function (event) {
        placeMarker(event.latLng, map);
    });
}

initMap();
