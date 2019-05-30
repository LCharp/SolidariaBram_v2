<?php

	$id = $_POST['selectTrace'];
	$idparcours = $_POST['changerId'];

include('../include/connect.php');
        $idc = connect();
        $sql="UPDATE parcours set id_parcours_carte = $id where id_p = $idparcours;";
        $rs=pg_exec($idc,$sql);

?>
<script type="text/javascript">
	//alert("Parcours modifié");
document.location.href='../gestion_parcours.php'
</script>
