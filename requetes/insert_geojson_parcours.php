<?php

    $geojson = $_GET['insertBD'];
	   $idgeojson = 2;
    $idparcours = 8;

	include('../include/connect.php');
	$idc = connect();
	$sql="INSERT INTO c_parcours(id_parcours_carte, forme_p, id_p) values ($idgeojson,'$geojson',$idparcours);";
	$rs=pg_exec($idc,$sql);

    $sql="UPDATE parcours SET id_parcours_carte = $idgeojson WHERE id_p = $idparcours;";
	$rs=pg_exec($idc,$sql);

?>
<!-- <script type="text/javascript">
	//alert("Parcours enregistré")
	document.location.href='../gestion_parcours.php'
</script> -->
