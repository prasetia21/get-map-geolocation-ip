<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h2>Lokasi</h2>

        <div class="card">

            <form method="POST" action="{{ route('store.location') }}">
                @csrf
                <h3>Simpan Data Lokasi</h3>
                <div class="form-row">

                    <div class="card-body">
                       

                        <a href="https://www.google.com/maps/dir/{{ $lat1 }},{{ $lon1 }}/{{ $lat2 }},{{ $lon2 }}/"
                            target="_blank">Get Directions</a>


                        <div id = "map" style = "width: 900px; height: 580px"></div>



                    </div>

                    <input type="text" class="form-control" value="{{ $info->ip }}" name="ip" />
                    <input type="text" class="form-control" value="{{ $lat1 }}" name="latitude1" />
                    <input type="text" class="form-control" value="{{ $lat2 }}" name="latitude2" />
                    <input type="text" class="form-control" value="{{ $lon1 }}" name="longitude1" />
                    <input type="text" class="form-control" value="{{ $lon2 }}" name="longitude2" />
                    <input type="text" class="form-control" value="{{ $distance }}" name="distance" />
                    <input type="text" class="form-control" value="{{ $info->regionName }}" name="province_name" />
                    <input type="text" class="form-control" value="{{ $info->cityName }}" name="city_name" />
                    <input type="text" class="form-control" value="https://www.google.com/maps/dir/{{ $lat1 }},{{ $lon1 }}/{{ $lat2 }},{{ $lon2 }}/" name="url" />

                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9 text-secondary">
                            <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                        </div>
                    </div>

            </form>


        </div>
    </div>

    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
    <script>
        var langitude1 = {!! $lat1 !!};
        var longitude1 = {!! $lon1 !!};
        var langitude2 = {!! $lat2 !!};
        var longitude2 = {!! $lon2 !!};
        // Create a map instance
        var map = L.map('map').setView([langitude2, longitude2], 15);

        // Add a tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Define marker coordinates
        var marker1 = L.marker([langitude1, longitude1]).addTo(map);
        var marker2 = L.marker([langitude2, longitude2]).addTo(map);

        // Calculate distance and display it
        var distanceInMeters = marker1.getLatLng().distanceTo(marker2.getLatLng());
        var distanceInKilometers = Math.round(distanceInMeters / 1000);

        // Create a polyline and bind the popup with distance information
        var polyline = L.polyline([marker1.getLatLng(), marker2.getLatLng()], {
            color: 'red',
            weight: 3
        }).bindPopup("Distance: " + distanceInKilometers + " km");

        // Add the polyline to the map and open the popup immediately
        polyline.addTo(map).openPopup();

        var bounds = L.latLngBounds(marker1.getLatLng(), marker2.getLatLng());
        bounds.extend(bounds.getCenter()); // Expand slightly

        // Fit the map to the bounds
        map.fitBounds(bounds);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
