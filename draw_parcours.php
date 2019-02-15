<!DOCTYPE html>
<?php
session_start();
?>
<html lang="fr" dir="ltr">
<head>
    <title>La Solidaria Bram</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
        include("include/bootstrap.inc");
        include("include/fontawesome.inc");
        include("scripts_draw.php");
        include("include/easybutton.inc");
    ?>
<link rel="stylesheet" href="css/css_drawmap.css"/>
<link rel="stylesheet" href="css/navbar.css">
<link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">

</head>

<body>
    <?php
    //include('include/nav.inc');
    include('nav.php');
    ?>
    <h3> Dessiner votre parcours</h5>
            <div id="map"></div>
            <script>
                var osmUrl = 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
                osmAttrib = '&copy; <a href="http://openstreetmap.org/copyright">OpenStreetMap</a> contributors',
                osm = L.tileLayer(osmUrl, { maxZoom: 18, attribution: osmAttrib
                }),
                map = new L.Map('map', { center: new L.LatLng(43.24, 2.1134), zoom: 15 }),
                drawnItems = L.featureGroup().addTo(map);
                L.control.layers({
                    'Standard': osm.addTo(map),
                    "Satellite": L.tileLayer('http://www.google.cn/maps/vt?lyrs=s@189&gl=cn&x={x}&y={y}&z={z}', {
                        attribution: 'Google'
                    })
                }, { 'Parcours': drawnItems }, { position: 'topright', collapsed: false }).addTo(map);
                map.addControl(new L.Control.Draw({
                    edit: {
                        featureGroup: drawnItems
                    },
                    draw: {
                        polygon: false,
                        circle: false,
                        marker: false,
                        rectangle: false,
                        circlemarker: false
                    }
                }));

                // Contient le JSON des parcours tracés sur la carte
                dataJSON = [];

                map.on(L.Draw.Event.CREATED, function (event) {
                    drawnItems.addLayer(event.layer);

                    // Enregistre les coordonnées des parcours dans un tableau
                    dataJSON.push( (event.layer).getLatLngs() );
                });

                // Permet de télécharger les parcours en JSON
              /*  L.easyButton('fa-download', function(){
                    $.each(dataJSON, function(key, value) {
                        var dataStr = "data:text/json;charset=utf-8," + encodeURIComponent(JSON.stringify(value));
                        var downloadAnchorNode = document.createElement('a');
                        downloadAnchorNode.setAttribute("href", dataStr);
                        downloadAnchorNode.setAttribute("download", "parcours"+ (key + 1) +".json");
                        document.body.appendChild(downloadAnchorNode); // required for firefox
                        downloadAnchorNode.click();
                        downloadAnchorNode.remove();

                                        });
                }).addTo(map);*/

                L.easyButton('fa-download', function(){
                    $.each(dataJSON, function(key, value) {
                      var data = drawnItems.toGeoJSON();
                      var dataStr = "data:text/json;charset=utf-8," + encodeURIComponent(JSON.stringify(data));
                      var downloadAnchorNode = document.createElement('a');
                      downloadAnchorNode.setAttribute("href", dataStr);
                      downloadAnchorNode.setAttribute("download", "parcours"+ (key + 1) +".geojson");
                      document.body.appendChild(downloadAnchorNode); // required for firefox
                      downloadAnchorNode.click();
                      downloadAnchorNode.remove();
                    });
                }).addTo(map);


                L.easyButton('fa-server', function(){
                    $.each(dataJSON, function(key, value) {
                      var data = drawnItems.toGeoJSON();
                      var insertBD = encodeURIComponent(JSON.stringify(data));
                      var dataStr = "data:text/json;charset=utf-8," + encodeURIComponent(JSON.stringify(data));
                      var downloadAnchorNode = document.createElement('a');
                      downloadAnchorNode.setAttribute("href", dataStr);
                      downloadAnchorNode.setAttribute("download", "parcours"+ (key + 1) +".geojson");
                      document.body.appendChild(downloadAnchorNode); // required for firefox
                      downloadAnchorNode.click();
                      downloadAnchorNode.remove();
                    });

                }).addTo(map);




        </script>
    </body>
    </html>
