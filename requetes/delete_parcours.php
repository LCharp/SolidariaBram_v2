<?php

	$idparcours = $_POST['deleteId'];

    include('../include/connect.php');
    $idc = connect();
    $sql="DELETE FROM parcours where id_p = $idparcours;";
    $rs=pg_exec($idc,$sql);

?>
<script type="text/javascript">
	//alert("Parcours modifié");
    document.location.href='../gestion_parcours.php'
</script>
