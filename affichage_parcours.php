<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
?>
<head>
  <title>La Solidaria Bram</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php
    include("include/bootstrap.inc");
    ?>
  <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
  <link rel="stylesheet" href="css/navbar.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.3.1/leaflet.css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <style type="text/css">
    body {
       margin: 0 auto;
    }
    .gpx {
      border: 2px #aaa solid;
      border-radius: 5px;
      box-shadow: 0 0 3px 3px #ccc;
      width: 800px;
      margin: 1em auto;
    }
    .gpx header {
      padding: 0.5em;
    }
    .gpx h3 {
      margin: 0;
      padding: 0;
      font-weight: bold;
    }
    .gpx .start {
      font-size: smaller;
      color: #444;
    }
    .gpx .map {
      border: 1px #888 solid;
      border-left: none;
      border-right: none;
      width: 800px;
      height: 500px;
      margin: 0;
    }
    .gpx footer {
      background: #f0f0f0;
      padding: 0.5em;
    }
    .gpx ul.info {
      list-style: none;
      margin: 0;
      padding: 0;
      font-size: smaller;
    }
    .gpx ul.info li {
      color: #666;
      padding: 2px;
      display: inline;
    }
    .gpx ul.info li span {
      color: black;
    }
  </style>
</head>
<body>
  <?php
      //include('include/nav.inc');
      include('nav.php');
   ?>


<div class="container">
  <h3>Les différents parcours de la Solidaria Bram 2019</h3>
</div>

<?php
  $gpx = 'gpx/demo.gpx';
  $gpx2 = 'gpx/demo2.gpx';
?>
<section id="demo" class="gpx" data-gpx-source="<?php echo($gpx) ?>" data-map-target="demo-map">
  <header>
    <h5><b>Parcours n°1</b>: 9km500 - Heure: 10h - Prix: 10€</h5>
    <span class="start"></span>
  </header>

  <article>
    <div class="map" id="demo-map"></div>
  </article>

  <footer>
    <ul class="info">
      <form class="" action="inscription.php" method="post">
        <input type="submit" class="btn btn-info" name="p1" value="🏃 S'inscrire">
      </form>
  </footer>
</section>

<section id="demo2" class="gpx" data-gpx-source="<?php echo($gpx2) ?>" data-map-target="demo-map">
  <header>
    <h5><b>Parcours n°2</b>: 5km - Heure: 10h30 - Prix: 5€</h5>
    <span class="start"></span>
  </header>

  <article>
    <div class="map" id="demo2-map"></div>
  </article>

  <footer>
    <ul class="info">
      <form class="" action="inscription.php" method="post">
        <input type="submit" class="btn btn-info" name="p1" value="S'inscrire">
      </form>
  </footer>
</section>



<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.3.1/leaflet.js"></script>
<script src="https://rawgithub.com/mpetazzoni/leaflet-gpx/master/gpx.js"></script>
<script type="application/javascript">
// create a map in the "map" div, set the view to a given place and zoom
var map = L.map('map').setView([48.858190, 2.294470], 16);

// add an OpenStreetMap tile layer
L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

// add a marker in the given location, attach some popup content to it and open the popup
L.marker([48.858190, 2.294470]).addTo(map)
    .bindPopup('This is the Eiffel Tower<br> Easily customizable.')
    .openPopup();


// create a map in the "map" div, set the view to a given place and zoom
var map2 = L.map('map2').setView([48.858190, 2.294470], 16);

// add an OpenStreetMap tile layer
L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map2);
</script>

</body>
</html>
