
    <!DOCTYPE html>
    <html>
    <head>
        <title>Simple Map</title>
        <meta name="viewport" content="initial-scale=1.0">
        <meta charset="utf-8">
        <style>
            /* Always set the map height explicitly to define the size of the div
             * element that contains the map. */
            #map {
                height: 100%;
            }
            /* Optional: Makes the sample page fill the window. */
            html, body {
                height: 100%;
                margin: 0;
                padding: 0;
            }
            #floating-panel {
                position: absolute;
                top: 10px;
                left: 25%;
                z-index: 5;
                background-color: #fff;
                padding: 5px;
                border: 1px solid #999;
                text-align: center;
                font-family: 'Roboto','sans-serif';
                line-height: 30px;
                padding-left: 10px;
            }
            #floating-panel {
                margin-left: -52px;
            }
        </style>
    </head>
    <body>
    <div id="floating-panel">
        <button id="drop" onclick="drop()">Drop Markers</button>
    </div>
    <div id="map"></div>
    <script>

        // If you're adding a number of markers, you may want to drop them on the map
        // consecutively rather than all at once. This example shows how to use
        // window.setTimeout() to space your markers' animation.

        var neighborhoods = [
            {lat: 10.758, lng: 106.688},
            {lat: 10.759131, lng: 106.687581},
            {lat: 10.765308, lng: 106.692945},
            {lat: 10.767989, lng: 106.695499},
            {lat: 10.771351, lng: 106.693428},
            {lat: 10.773944, lng: 106.697097},
            {lat: 10.777447, lng: 106.693028},
            {lat: 10.778486, lng: 106.693866},
            {lat: 10.780315, lng: 106.691844},
            {lat: 10.778523, lng: 106.690186}
        ];


        var markers = [];
        var map;

        function initMap() {

            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 16,
                center: {lat: 10.77, lng: 106.69}
            });
            bounds  = new google.maps.LatLngBounds();
        }

        function drop() {

            for (var i = 0; i < neighborhoods.length; i++) {

                addMarkerWithTimeout(neighborhoods[i], i * 400);

            }
            map.fitBounds(bounds);
            map.panToBounds(bounds);
        }

        function addMarkerWithTimeout(position, timeout) {
            window.setTimeout(function() {
                clearMarkers();
                markers.push(
                        new google.maps.Marker({
                    position: position,
                    map: map,
                    animation: google.maps.Animation.DROP
                })
                );
                loc = new google.maps.LatLng(marker.position.lat(), marker.position.lng());
                bounds.extend(loc);
            }, timeout);

        }

        function clearMarkers() {
            for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(null);
            }
            markers = [];
        }
        </script>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCoFJ5Pk5QacylixIErjoOhyHXpl2l0MHA&callback=initMap"
            async defer></script>
    </body>
    </html>
