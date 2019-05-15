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
           $sql="SELECT p.id_p, longueur_p, date_p, heure_p, cp.id_parcours_carte, forme_p FROM parcours p INNER JOIN c_parcours cp ON p.id_p = cp.id_p WHERE date_p LIKE '2019%' ORDER BY id_p";
           $rs=pg_exec($idc,$sql);
           $num = 0;
           while($ligne=pg_fetch_assoc($rs)){
            $num = $num + 1;
            $numparcours = $ligne['id_p'];
            $forme = $ligne['forme_p'];
            ${'geojson'.$num} = $forme . ";";
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
                <button type="submit" class="btn btn-info" name="parcours" value='.$numparcours.'>🏃 Inscription au Parcours n°'.$num.'</button>
              </form>
            </div>
          </div>
        </div>
      </div>');
              };
     ?>
    </div>

    <script>
    var data = <?php echo ${'geojson'.$num} ?>;
    // alert ("test = "+ text );
    var num = "<?php echo $num ?>";
    //alert ("num = " + num);
    var nummap = 1;

    while (nummap <= num) {
      //alert("boucle");
      var nomCarte = "map"+ nummap;
      //alert (nomCarte);
      var map = createMap(nomCarte);
      nummap = nummap + 1;
    }

    function createMap(nomCarte){
      var carte = nomCarte;
      //alert("Fonction "+nomCarte);
      var str = nomCarte;
      var res = str.substr(3, 4);
      //alert(res);

      var geoJsonLayer = L.geoJson(data, {
        onEachFeature: function (feature, layer) {
          if (layer instanceof L.Polyline) {
            layer.setStyle({
              'color': "#08B995"
            });
          }
        }
      });


      var laCarte = L.map('map'+res).setView([43.24, 2.1134], 15);
      // add an OpenStreetMap tile layer
      L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
          attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
      }).addTo(laCarte );
      geoJsonLayer.addTo(laCarte );
    	return (laCarte );
    };


    </script>
  </body>
</html>
