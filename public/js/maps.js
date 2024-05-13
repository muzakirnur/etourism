let map;

async function initMap() {
    // The location of Uluru
    const position = { lat: 5.221809197503294, lng: 96.71791035533619 };
    // Request needed libraries.
    //@ts-ignore
    const { Map } = await google.maps.importLibrary("maps");
    const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");
    const { Autocomplete } = await google.maps.importLibrary("places");
    const autocomplete = new google.maps.places.Autocomplete(
        document.getElementById("pac-input")
    );

    // The map, centered at Uluru
    map = new Map(document.getElementById("map"), {
        zoom: 15,
        center: position,
        mapId: "admin",
    });

    autocomplete.bindTo("bounds", map);
    // autocomplete = new AutocompleteService.getPlacePredictions(
    //     document.getElementById("pac-input")
    // );
    /* Search Input */
    var input = document.getElementById("pac-input");
    var card = document.getElementById("pac-card");
    map.controls[google.maps.ControlPosition.TOP_CENTER].push(card);

    autocomplete.bindTo("bounds", map);

    const marker = new google.maps.Marker({
        map,
        anchorPoint: new google.maps.Point(0, -29),
    });

    autocomplete.addListener("place_changed", () => {
        marker.setVisible(false);

        const place = autocomplete.getPlace();

        if (!place.geometry || !place.geometry.location) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert(
                "No details available for input: '" + place.name + "'"
            );
            return;
        }

        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
        }

        placeMarker(place.geometry.location, map);
    });

    /* Click Marker */
    google.maps.event.addListener(map, "click", function (event) {
        placeMarker(event.latLng, map);
    });
}

initMap();
