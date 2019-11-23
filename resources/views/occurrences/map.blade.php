@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="float-right page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">SmartVias</a></li>
                        <li class="breadcrumb-item"><a href="#">Ocorrências</a></li>
                        <li class="breadcrumb-item active">Mapa</li>
                    </ol>
                </div>
                <h5 class="page-title">Mapa de Ocorrências</h5>

            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body card-map">
                        <div id="map" class="card-map"></div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- container fluid -->
@endsection

@push('extra-css')
    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 100%;
        }

        .card-map {
            min-height: 700px;
        }
    </style>
@endpush

@push('extra-js')
    <script>
        var map;
        var occurrences = {!! json_encode($ocLatLongs) !!}
            var markers = [];
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: parseFloat(occurrences[0].coord.lat), lng: parseFloat(occurrences[0].coord.lng)},
                zoom: 12
            });
            occurrences.map(function(occ){
                var marker = new google.maps.Marker({
                    position: {lat: parseFloat(occ.coord.lat), lng: parseFloat(occ.coord.lng)},
                    map: map,
                    title: occ.label
                });

                markers.push(marker);

                var contentString = `<div id="content">
                    <h5 id="firstHeading" class="firstHeading">${occ.label}</h5>
                    <div id="bodyContent">
                    <p>${occ.label}
                    <br>
                    Código da ocorrência: ${occ.occurrence}
                    </p>
                    <a class="btn btn-primary" href="/occurrences/${occ.occurrence}/details"> Ver detalhes </a>
                    </div>
                    </div>`;

                var infowindow = new google.maps.InfoWindow({
                    content: contentString
                });

                google.maps.event.addListener(marker, 'click', function() {
                    infowindow.open(map, marker);
                });

                // Add a marker clusterer to manage the markers.
                var markerCluster = new MarkerClusterer(map, markers,
                    {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});

            });
        }
    </script>
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD0SlzjJXJA5_O_scHH74g_wuqrwhgdbqk&callback=initMap"
            async defer></script>
@endpush
