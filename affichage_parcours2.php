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
    <?php
      include('include/nav.inc');
      include('include/connect.php');
      $idc = connect();
    ?>

    <h3>Les parcours de l'edition 2019</h5>
      <div class="row" style="">
      <?php
          $sql="SELECT longueur_p, date_p, heure_p FROM parcours ORDER BY id_p";
          $rs=pg_exec($idc,$sql);

          while($ligne=pg_fetch_assoc($rs)){
            i = 1;
            i = i + 1;
            print('<div class="col-md-4">
            <div class="panel-group">
            <div class="panel panel-default">
            <div class="panel-heading">');
            print('<b>Parcours n°1:</b> Distance : '.$ligne['longueur_p'].'km - Heure du départ: '.$ligne['heure_p']);
            print('</div>
            <div class="panel-body" style="height:500px;">
                    <div id="map"style ="height: 470px; width: 590px;">
                    </div>
                    </div>
            <div class="panel-footer">
              <form class="" action="page_inscription.php" method="post">
                <input type="submit" class="btn btn-info" name="p1" value="🏃 Inscription">
              </form>
            </div>
          </div>
        </div>
      </div>');
              };
      ?>
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
