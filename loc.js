var map;

function initMap() {
    var pyrmont = {
        lat: 23.8701334,
        lng: 90.2713944
    };
    if (navigator.geolocation) {
        try {
            navigator.geolocation.getCurrentPosition(function(position) {
                var pyrmont = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
            });
        } catch (err) {

        }
    }
    map = new google.maps.Map(document.getElementById('map'), {
        center: pyrmont,
        zoom: 17
    });

    var service = new google.maps.places.PlacesService(map);

    service.nearbySearch({
            location: pyrmont,
            radius: 4000,
            type: ['hospital']
        },
        function(results, status, pagination) {
            if (status !== 'OK') return;

            createMarkers(results);
            getNextPage = pagination.hasNextPage && function() {
                pagination.nextPage();
            };
        });
}

function createMarkers(places) {
    var bounds = new google.maps.LatLngBounds();
    for (var i = 0, place; place = places[i]; i++) {
        var image = {
            url: place.icon,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(25, 25)
        };

        var marker = new google.maps.Marker({
            map: map,
            icon: image,
            title: place.name,
            position: place.geometry.location
        });
        bounds.extend(place.geometry.location);
    }
    map.fitBounds(bounds);
}
