<!DOCTYPE html>
<html>

<head>
    <title>GPS Tracking</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>

<body>
    <div id="map" style="height: 400px;"></div>

    <script>
        var map = L.map('map').setView([0, 0], 13); // Initial center and zoom level
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        function getUserLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        var marker = L.marker([position.coords.latitude, position.coords.longitude]).addTo(map);
                        map.setView([position.coords.latitude, position.coords.longitude],
                            15); // Zoom to user's location

                        // Send location data to Laravel backend using jQuery AJAX
                        $.ajax({
                            url: '/store-location',
                            type: 'POST',
                            data: {
                                latitude: position.coords.latitude,
                                longitude: position.coords.longitude
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                // Handle successful response
                            },
                            error: function(error) {
                                // Handle errors
                            }
                        });
                    },
                    (error) => {
                        // Handle errors
                    }
                );
            } else {
                // Geolocation not supported
            }
        }

        getUserLocation(); // Get initial location
    </script>
</body>

</html>
