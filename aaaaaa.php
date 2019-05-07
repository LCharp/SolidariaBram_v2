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
      include("include/scripts_draw.php");
      include("include/easybutton.inc");
    ?>
    <link rel="stylesheet" href="css/navbar.css">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
  </head>

  <body>
<div id="map"style ="height: 400px; width: 400px;">
    </div>

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
      }, { 'Parcours': drawnItems }, { position: 'topright', collapsed: true }).addTo(map);


    </script>

  </body>
</html>
