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
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <style media="screen">
    #map { height: 470px; width: 590px;}
    #map2 { height: 470px; width: 590px; }
    </style>
  </head>

  <body>

    <?php
      $num = '3';
      print ($num);
      print ('num'.$num);
      print('<div id="map'.$num.'" style ="height: 470px; width: 590px;">
            </div> ');
     ?>

    <div id="map"></div>

    <script>

    var num = "<?php echo $num ?>";
    alert(num);
    var nummap = 1;

    while (nummap <= num) {
      var nommap = "map" + nummap;
      alert(nommap);
      var map = createMap(nommap);
      nummap = nummap + 1;
    }


    function createMap(nomCarte){
      var carte = nomCarte;
      alert(nomCarte);
      var str = nomCarte;
      var res = str.substr(3, 4);
      alert(res);

      var nomCarte = L.map('map').setView([43.24, 2.1134], 15);
      // add an OpenStreetMap tile layer
      L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
          attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
      }).addTo(nomCarte);
    	return (nomCarte);
    }

    // // create a map in the "map" div, set the view to a given place and zoom
    // var map2 = L.map('map2').setView([43.24, 2.1134], 18);
    // // add an OpenStreetMap tile layer
    // L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
    //     attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
    // }).addTo(map2);


    </script>

  </body>
</html>
