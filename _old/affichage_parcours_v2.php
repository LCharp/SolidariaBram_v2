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

    <h3 style="align-items: center;">Les parcours de l'edition 2019</h5>
      <div class="row">
      <?php
          $sql="SELECT longueur_p, date_p, heure_p FROM parcours WHERE date_p LIKE '2019%' ORDER BY id_p";
          $rs=pg_exec($idc,$sql);
          $num = 0;
          while($ligne=pg_fetch_assoc($rs)){
            $num = $num + 1;
            print('<div class="col-md-4">
            <div class="panel-group">
            <div class="panel panel-default">
            <div class="panel-heading">');
            print('<b>Parcours n°'.$num.':</b> Distance : '.$ligne['longueur_p'].'km - Heure du départ: '.$ligne['heure_p']);
            print('</div>
            <div class="panel-body" style="height:500px;">
                    <div id="map'.$num.'" style ="height: 470px; width: 590px;">
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




        // create a map in the "map" div, set the view to a given place and zoom
        var map1 = L.map('map1').setView([43.24, 2.1134], 15);
        // add an OpenStreetMap tile layer
        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map1);


        // create a map in the "map" div, set the view to a given place and zoom
        var map2 = L.map('map2').setView([43.24, 2.1134], 18);
        // add an OpenStreetMap tile layer
        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map2);

        // create a map in the "map" div, set the view to a given place and zoom
        var map3 = L.map('map3').setView([43.24, 2.1134], 10);
        // add an OpenStreetMap tile layer
        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map3);

    </script>

  </body>
</html>
