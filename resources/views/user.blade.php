<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h2>Lokasi</h2>
        <div class="card">
            <div class="card-body">
                @if ($currentUserInfo)
                    <h4>IP: {{ $currentUserInfo->ip }}</h4>
                    <h4>Kode Negara: {{ $currentUserInfo->countryCode }}</h4>
                    <h4>Negara: {{ $currentUserInfo->countryName }}</h4>
                    <h4>Kode Provinsi: {{ $currentUserInfo->regionCode }}</h4>
                    <h4>Nama Provinsi: {{ $currentUserInfo->regionName }}</h4>
                    <h4>Nama Kota: {{ $currentUserInfo->cityName }}</h4>
                    <h4>Kode Pos: {{ $currentUserInfo->zipCode }}</h4>
                    <h4>Latitude: {{ $currentUserInfo->latitude }}</h4>
                    <h4>Longitude: {{ $currentUserInfo->longitude }}</h4>
                    <h4>Kode Area: {{ $currentUserInfo->areaCode }}</h4>
                    <h4>Timezone: {{ $currentUserInfo->timezone }}</h4>
                @else
                    <h2>Not Found</h2>
                @endif
            </div>


        </div>

       
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
